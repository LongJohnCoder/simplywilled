import {Component, OnDestroy, OnInit} from '@angular/core';
import {Router} from '@angular/router';
import {Validators, FormGroup, FormBuilder, FormControl, FormArray, Form} from '@angular/forms';
import {UserAuthService} from '../../user-auth/user-auth.service';
import {UserService} from '../../user.service';
import {Subscription} from 'rxjs/Subscription';
import {Location} from '@angular/common';
import {ProgressbarService} from '../shared/services/progressbar.service';

@Component({
  selector: 'app-your-estate-distributed',
  templateUrl: './your-estate-distributed.component.html',
  styleUrls: ['./your-estate-distributed.component.css']
})
export class YourEstateDistributedComponent implements OnInit, OnDestroy {
  /**Variable declaration*/
  public estateDistributedForm: FormGroup;
  columnFormArray: FormArray;
  fullUserInfo: any;
  singleBeneficiary: boolean;
  errorMessage: any;
  editFlag = false;
  beneficiaryNoFormArray: FormArray;
  inputCheck: boolean;
  showErrorMessage: boolean;
  setValidationFlagYes = false;
  setValidationFlagNo = false;
  editProfileSubscription: Subscription;
  getUserDetailsSubscription: Subscription;
  loading = true;

  /**Constructor call*/
  constructor( private  authService: UserAuthService,
               private userService: UserService,
               private router: Router,
               private fb: FormBuilder,
               private progressBarService: ProgressbarService,
               private location: Location
              ) {
      this.progressBarService.changeWidth({width: 62.5});
      this.createForm(); }

  /**When the component initialises*/
  ngOnInit() {
      this.getUserData();
      this.inputCheck = true;
      this.showErrorMessage = false;
  }

  /**
   *function to create the form
   */
  createForm() {
      this.estateDistributedForm = this.fb.group({
          disrtibuteType: ['', Validators.required],
          toBeDistributedTo: [''],
          singleBeneficiary: ['No'],
          multiBeneficiary: ['No'],
          someOtherWay: ['No'],
          toASingleBeneficiary: this.fb.array([
              this.fb.group({
                  firstName: [''],
                  relationship: [''],
                  fullName: [''],
                  gender: [''],
                  ifPassesbeforeyou: [''],
                  someotherway: [''],
                  otherRelationship: [''],
                  }
              )
          ]),
          toMultipleBeneficiary: this.fb.array([
              this.fb.group({
                  beneficiaryYes: this.fb.array([
                      this.fb.group({
                          beneficiaryFullName: [''],
                          beneficiaryRelationship: [''],
                      })
                  ]),
                  beneficiaryNo: this.fb.array([
                      this.fb.group({
                          beneficiaryNoFullName: [''],
                          beneficiaryNoRelationship: [''],
                          beneficiaryNoPercentageToEstate: [''],
                      })
                  ]),
                      isEstateIntoEqualShares: [''],
                      deceasedBeneficiaryShareToKids: [''],
                      deceasedBeneficiarieShare: [''],
                      minorBeneficiaryShareToBeHeldInTrust : [''],
                      whatAgeMinorShareDistributed: [''],
                      minorParentsTrustee: [''],
                      whoServeAsTrusteeAccount: [''],
                  }
              )
          ]),
          toSomeOtherWay: this.fb.array([
              this.fb.group({
                  someOtherWayText: [''],
              })
          ]),
      });
  }
  /**Set progress bar width*/
  setProgress(response) {
    let isSpecificGift = response.data[7].data.isSpecificGift;
    let maritalStatus = response.data[0].data.userInfo.marital_status;
    switch (maritalStatus ) {
      case 'M':
      case 'R': if (isSpecificGift === 'Yes') {
                  this.progressBarService.changeWidth({width: 70});
                } else {
                  this.progressBarService.changeWidth({width: 62.5});
                }
                break;
      default:  if (isSpecificGift === 'Yes') {
                  this.progressBarService.changeWidth({width: 62.5});
                } else {
                  this.progressBarService.changeWidth({width: 53.13});
                }
                break;
    }
  }
  /**
   *function get user data
   */
  getUserData() {
      this.userService.getUserDetails(this.authService.getUser()['id']).subscribe(
          (response: any) => {
              this.setProgress(response);
              this.fullUserInfo = response.data[9].data;
              this.estateDistributedForm.controls['disrtibuteType'].setValue( this.fullUserInfo.type);
              if (this.fullUserInfo.type === '1') {
                  // set value to the singleBeneficiary Form
                  this.estateDistributedForm.patchValue({
                      singleBeneficiary: 'Yes',
                      multiBeneficiary: 'No',
                      someOtherWay: 'No'
                  });
                  let estactInfo = this.fullUserInfo !== null && this.fullUserInfo.totalInfo !== null && this.fullUserInfo.totalInfo !== undefined ? JSON.parse(this.fullUserInfo.totalInfo) : {};
                  if (estactInfo !== null && estactInfo !== undefined) {
                    let toASingleBeneficiaryFGs = estactInfo.map(gr => this.fb.group(gr));
                    let toASingleBeneficiaryFormArray = this.fb.array(toASingleBeneficiaryFGs);
                    this.estateDistributedForm.setControl('toASingleBeneficiary', toASingleBeneficiaryFormArray);
                    this.addValidationToASingleBeneficiaryForm();
                  }
              } if (this.fullUserInfo.type === '2') {
                  // set value to the multiBeneficiary Form
                  this.estateDistributedForm.patchValue({
                      singleBeneficiary: 'No',
                      multiBeneficiary: 'Yes',
                      someOtherWay: 'No',
                  });
                  let estactInfo = this.fullUserInfo !== null && this.fullUserInfo.totalInfo !== null && this.fullUserInfo.totalInfo !== undefined ? JSON.parse(this.fullUserInfo.totalInfo) : {};
                  this.editFlag = false;
                  this.columnFormArray = this.estateDistributedForm.get('toMultipleBeneficiary.0.beneficiaryYes') as FormArray;
                  this.beneficiaryNoFormArray = this.estateDistributedForm.get('toMultipleBeneficiary.0.beneficiaryNo') as FormArray;
                  if ( estactInfo[0].isEstateIntoEqualShares === 'Yes' && estactInfo[0].beneficiaryYes.length > 0 ) {
                      this.clearFormArray(true, this.columnFormArray);
                  }
                  if ( estactInfo[0].isEstateIntoEqualShares === 'No' && estactInfo[0].beneficiaryNo.length > 0 ) {
                      this.clearBeneficiaryNoFormArray(true, this.beneficiaryNoFormArray);
                  }
                  this.setValues(true, estactInfo);
                  this.addValidationtoMultipleBeneficiary();
              } if (this.fullUserInfo.type === '4') {
                    // set value to the someOtherWay Form
                    this.estateDistributedForm.patchValue({
                        singleBeneficiary: 'No',
                        multiBeneficiary: 'No',
                        someOtherWay: 'Yes'
                    });
                    let estactInfo = this.fullUserInfo !== null && this.fullUserInfo.totalInfo !== null && this.fullUserInfo.totalInfo !== undefined ?  JSON.parse(this.fullUserInfo.totalInfo) : {};
                    let toSomeOtherWayFGs = estactInfo.map(gr => this.fb.group(gr));
                    let toSomeOtherWayFormArray = this.fb.array(toSomeOtherWayFGs);
                    this.estateDistributedForm.setControl('toSomeOtherWay', toSomeOtherWayFormArray);
                    this.setValidationFormArray((this.estateDistributedForm.get('toSomeOtherWay') as FormArray).controls, 2);
              }
          },
          (error: any) => {
              console.log(error.error);
          }, () => { this.loading = false; }
      );
  }

   clearFormArray(editFlag, formArray: FormArray)  {
      while (formArray.length !== 0) {
          formArray.removeAt(0);
      }
  }

  clearBeneficiaryNoFormArray(editFlag, formArray: FormArray) {
      while (formArray.length !== 0) {
          formArray.removeAt(0);
      }
  }

  setValues(editFlag, data = null) {
      this.estateDistributedForm.get('toMultipleBeneficiary.0.isEstateIntoEqualShares').setValue(data[0].isEstateIntoEqualShares);
      this.estateDistributedForm.get('toMultipleBeneficiary.0.deceasedBeneficiarieShare').setValue(data[0].deceasedBeneficiarieShare);
      this.estateDistributedForm.get('toMultipleBeneficiary.0.deceasedBeneficiaryShareToKids').setValue(data[0].deceasedBeneficiaryShareToKids);
      this.estateDistributedForm.get('toMultipleBeneficiary.0.minorBeneficiaryShareToBeHeldInTrust').setValue(data[0].minorBeneficiaryShareToBeHeldInTrust);
      this.estateDistributedForm.get('toMultipleBeneficiary.0.whatAgeMinorShareDistributed').setValue(data[0].whatAgeMinorShareDistributed);
      this.estateDistributedForm.get('toMultipleBeneficiary.0.minorParentsTrustee').setValue(data[0].minorParentsTrustee);
      this.estateDistributedForm.get('toMultipleBeneficiary.0.whoServeAsTrusteeAccount').setValue(data[0].whoServeAsTrusteeAccount);
      if (data[0].isEstateIntoEqualShares === 'Yes') {
          for (let i = 0; i < data[0].beneficiaryYes.length ; i++) {
              this.columnFormArray.push(this.createItem(true, data[0].beneficiaryYes[i]));
          }
      }
      if (data[0].isEstateIntoEqualShares === 'No') {
          for (let i = 0; i < data[0].beneficiaryNo.length ; i++) {
              this.beneficiaryNoFormArray.push(this.createBeneficiaryNoItem(true, data[0].beneficiaryNo[i]));
          }
      }
  }

  createBeneficiaryNoItem(editFlag = false, beneficiaryNoFormArray = null) {
      return this.fb.group({
          // beneficiaryNo
          beneficiaryNoFullName: [beneficiaryNoFormArray.beneficiaryNoFullName],
          beneficiaryNoRelationship: [beneficiaryNoFormArray.beneficiaryNoRelationship],
          beneficiaryNoPercentageToEstate: [beneficiaryNoFormArray.beneficiaryNoPercentageToEstate],
      });
  }

  createItem(editFlag = false, beneficiaryYesFormArray = null) {
      return this.fb.group({
          // beneficiaryYes
          beneficiaryFullName: [beneficiaryYesFormArray.beneficiaryFullName],
          beneficiaryRelationship: [beneficiaryYesFormArray.beneficiaryRelationship],
      });
  }

  /**
   *submit the form data
   * @param model
   */
  onSubmit(model: any) {
      if (model.valid) {
        let modelData = model.value;
        modelData.step = 10;
        modelData.user_id = this.authService.getUser()['id'];
        const disrtibuteData = [];
        if(modelData.singleBeneficiary === 'Yes') {
          modelData.disrtibuteData = modelData.toASingleBeneficiary;
        }
        if(modelData.multiBeneficiary === 'Yes') {
          modelData.disrtibuteData = modelData.toMultipleBeneficiary;
        }
        if(modelData.someOtherWay === 'Yes') {
          modelData.disrtibuteData = modelData.toSomeOtherWay;
        }
        this.userService.editProfile(modelData).subscribe(
          (response: any) => {
            this.router.navigate(['/dashboard/contingent-beneficiaries']);
          },
          (error: any) => {
            for (let prop in error.error.message) {
              this.errorMessage = error.error.message[prop];
              break;
            }
            setTimeout(() => {
              this.errorMessage = '';
            }, 3000);
          }
        );
      } else {
        alert('Please fill up the required fields');
        this.markFormGroupTouched(model);
      }

  }

  /**
   * Marks all controls in a form group as touched
   * @param formGroup
   */
  markFormGroupTouched (formGroup: FormGroup) {
    (<any>Object).values(formGroup.controls).forEach(control => {
      control.markAsTouched();
      control.markAsDirty();
    });

    this.checkValidation((this.estateDistributedForm.get('toASingleBeneficiary') as FormArray).controls);
    this.checkValidation((this.estateDistributedForm.get('toMultipleBeneficiary') as FormArray).controls);
    this.checkValidationFormArray((this.estateDistributedForm.get('toMultipleBeneficiary.0.beneficiaryNo') as FormArray).controls, 0);
    this.checkValidationFormArray((this.estateDistributedForm.get('toMultipleBeneficiary.0.beneficiaryYes') as FormArray).controls, 1);
  }

  /**Checks validation for form arrays*/
  checkValidation(formArray) {
    for (let item of formArray) {
      (<any>Object).values(item.controls).forEach(control => {
        control.markAsTouched();
        control.markAsDirty();
        if (control.controls) {
          (<any>Object).values(control.controls).forEach(controlchild => {
            controlchild.markAsTouched();
            controlchild.markAsDirty();
          });
        }
      });
      /*if (item.controls['multiple_beneficiary_name'].hasError('required') || item.controls['multiple_beneficiary_relationship'].hasError('required')) {
      //  this.flags.setValidationFlag = true;
        break;
      }*/
      //this.flags.setValidationFlag = false;
    }
  }

  checkValidationFormArray(formArray, flag = 0) {
    //this.setValidationFlagNo = false;
    //this.setValidationFlagYes = false;
    if (flag === 0) {
      for (let item of formArray) {
        console.log(item.controls['beneficiaryNoFullName'].hasError('required'));
        if (
          item.controls['beneficiaryNoFullName'].hasError('required') || item.controls['beneficiaryNoPercentageToEstate'].hasError('required') || item.controls['beneficiaryNoRelationship'].hasError('required')) {
          this.setValidationFlagNo = true;
          break;
        }
        this.setValidationFlagNo = false;
      }
    } else {
      for (let item of formArray) {
        if (item.controls['beneficiaryFullName'].hasError('required') || item.controls['beneficiaryRelationship'].hasError('required')) {
          this.setValidationFlagYes = true;
          break;
        }
        this.setValidationFlagYes = false;
      }
    }
  }

  /**Set validation for form array*/
  setValidationFormArray(formArray, flag = 0) {
    if (flag === 1) {
      for (let item of formArray) {
          item.controls['beneficiaryFullName'].setValidators([Validators.required]);
          item.controls['beneficiaryRelationship'].setValidators([Validators.required]);
          item.controls['beneficiaryFullName'].updateValueAndValidity();
          item.controls['beneficiaryRelationship'].updateValueAndValidity();
      }
    } else if (flag === 0) {
      for (let item of formArray) {
        item.controls['beneficiaryNoPercentageToEstate'].setValidators([Validators.required]);
        item.controls['beneficiaryNoFullName'].setValidators([Validators.required]);
        item.controls['beneficiaryNoRelationship'].setValidators([Validators.required]);
        item.controls['beneficiaryNoFullName'].updateValueAndValidity();
        item.controls['beneficiaryNoRelationship'].updateValueAndValidity();
        item.controls['beneficiaryNoPercentageToEstate'].updateValueAndValidity();
        console.log(item.controls['beneficiaryNoPercentageToEstate']);
      }
    } else {
      for (let item of formArray) {
        item.controls['someOtherWayText'].setValidators([Validators.required]);
        item.controls['someOtherWayText'].updateValueAndValidity();
      }
    }
  }

  /**Clears validation for form arrays*/
  clearValidationForFormArray(formArray, flag = 0) {
    if (flag === 1) {
      for (let item of formArray) {
        item.controls['beneficiaryFullName'].clearValidators();
        item.controls['beneficiaryRelationship'].clearValidators();
        item.controls['beneficiaryFullName'].updateValueAndValidity();
        item.controls['beneficiaryRelationship'].updateValueAndValidity();
      }
    } else {
      for (let item of formArray) {
        item.controls['beneficiaryNoPercentageToEstate'].clearValidators();
        item.controls['beneficiaryNoFullName'].clearValidators();
        item.controls['beneficiaryNoRelationship'].clearValidators();
        item.controls['beneficiaryNoPercentageToEstate'].updateValueAndValidity();
        item.controls['beneficiaryNoFullName'].updateValueAndValidity();
        item.controls['beneficiaryNoRelationship'].updateValueAndValidity();
      }
    }
  }
  /**
   *function to add remove  validation
   */
  addRemoveValidation() {
      if (this.estateDistributedForm.value.disrtibuteType === '1') {
          this.estateDistributedForm.patchValue({
              singleBeneficiary: 'Yes',
              multiBeneficiary: 'No',
              someOtherWay: 'No'
          });
          this.addValidationToASingleBeneficiaryForm();
          this.removeValidationToSomeOtherWay();
          this.removeValidationtoMultipleBeneficiary();
      } if (this.estateDistributedForm.value.disrtibuteType === '2') {
          this.estateDistributedForm.patchValue({
              multiBeneficiary: 'Yes',
              singleBeneficiary: 'No',
              someOtherWay: 'No'
          });
          this.addValidationtoMultipleBeneficiary();
          this.removeValidationToASingleBeneficiaryForm();
          this.removeValidationToSomeOtherWay();
      } if (this.estateDistributedForm.value.disrtibuteType === '3') {
          this.estateDistributedForm.patchValue({
              multiBeneficiary: 'No',
              singleBeneficiary: 'No',
              someOtherWay: 'No'
          });
          this.removeValidationToASingleBeneficiaryForm();
          this.removeValidationToSomeOtherWay();
          this.removeValidationtoMultipleBeneficiary();
      } if (this.estateDistributedForm.value.disrtibuteType === '4') {
          this.estateDistributedForm.patchValue({
              multiBeneficiary: 'No',
              singleBeneficiary: 'No',
              someOtherWay: 'Yes'
          });
          this.addValidationToSomeOtherWay();
          this.removeValidationToASingleBeneficiaryForm();
          this.removeValidationtoMultipleBeneficiary();
      }
  }

  /**
   *add more textbox
   */
  addMoreOption(control, type) {
      if ( type === 1 ) {
          control.push(
              this.fb.group({
                  beneficiaryFullName: ['', Validators.required],
                  beneficiaryRelationship: ['', Validators.required],
              }));
      } if ( type === 2 ) {
          control.push(
              this.fb.group({
                  beneficiaryNoFullName: ['', Validators.required],
                  beneficiaryNoRelationship: ['', Validators.required],
                  beneficiaryNoPercentageToEstate: ['', Validators.required],
              }));
      }
  }

  /**
   *remove the textbox
   */
  removeOption(control, index) {
      control.removeAt(index);
      this.checkInput();
  }

  /**
   *Add validation to the  SingleBeneficiaryForm
   */
  addValidationToASingleBeneficiaryForm() {
      this.estateDistributedForm.get(`toASingleBeneficiary.0.firstName`).setValidators([Validators.required]);
      this.estateDistributedForm.get(`toASingleBeneficiary.0.firstName`).updateValueAndValidity();
      this.estateDistributedForm.get(`toASingleBeneficiary.0.fullName`).setValidators([Validators.required, Validators.pattern(/\s+(?=\S{2})/ )]);
      this.estateDistributedForm.get(`toASingleBeneficiary.0.fullName`).updateValueAndValidity();
      this.estateDistributedForm.get(`toASingleBeneficiary.0.relationship`).setValidators([Validators.required]);
      this.estateDistributedForm.get(`toASingleBeneficiary.0.relationship`).updateValueAndValidity();
      this.estateDistributedForm.get(`toASingleBeneficiary.0.gender`).setValidators([Validators.required]);
      this.estateDistributedForm.get(`toASingleBeneficiary.0.gender`).updateValueAndValidity();
      this.estateDistributedForm.get(`toASingleBeneficiary.0.ifPassesbeforeyou`).setValidators([Validators.required]);
      this.estateDistributedForm.get(`toASingleBeneficiary.0.ifPassesbeforeyou`).updateValueAndValidity();
      if (this.estateDistributedForm.get('toASingleBeneficiary.0.ifPassesbeforeyou').value === '3') {
        this.estateDistributedForm.get('toASingleBeneficiary.0.someotherway').setValidators([Validators.required]);
      } else {
        this.estateDistributedForm.get('toASingleBeneficiary.0.someotherway').clearValidators();
      }
      this.estateDistributedForm.updateValueAndValidity();
  }

  /**
   *Remove validation to the  SingleBeneficiaryForm
   */
  removeValidationToASingleBeneficiaryForm() {
      this.estateDistributedForm.get(`toASingleBeneficiary.0.firstName`).setValidators([]);
      this.estateDistributedForm.get(`toASingleBeneficiary.0.firstName`).updateValueAndValidity();
      this.estateDistributedForm.get(`toASingleBeneficiary.0.fullName`).setValidators([]);
      this.estateDistributedForm.get(`toASingleBeneficiary.0.fullName`).updateValueAndValidity();
      this.estateDistributedForm.get(`toASingleBeneficiary.0.relationship`).setValidators([]);
      this.estateDistributedForm.get(`toASingleBeneficiary.0.relationship`).updateValueAndValidity();
      this.estateDistributedForm.get(`toASingleBeneficiary.0.gender`).setValidators([]);
      this.estateDistributedForm.get(`toASingleBeneficiary.0.gender`).updateValueAndValidity();
      this.estateDistributedForm.get(`toASingleBeneficiary.0.ifPassesbeforeyou`).setValidators([]);
      this.estateDistributedForm.get(`toASingleBeneficiary.0.ifPassesbeforeyou`).updateValueAndValidity();
      this.estateDistributedForm.get(`toASingleBeneficiary.0.otherRelationship`).setValidators([]);
      this.estateDistributedForm.get(`toASingleBeneficiary.0.otherRelationship`).updateValueAndValidity();
      this.estateDistributedForm.get(`toASingleBeneficiary.0.someotherway`).setValidators([]);
      this.estateDistributedForm.get(`toASingleBeneficiary.0.someotherway`).updateValueAndValidity();
  }

  /**
   *add validation to the  someOtherWayText
   */
  addValidationToSomeOtherWay() {
      this.estateDistributedForm.get(`toSomeOtherWay.0.someOtherWayText`).setValidators([Validators.required]);
      this.estateDistributedForm.get(`toSomeOtherWay.0.someOtherWayText`).updateValueAndValidity();
  }
  /**
   *Remove validation to the  someOtherWayText
   */
  removeValidationToSomeOtherWay() {
      this.estateDistributedForm.get(`toSomeOtherWay.0.someOtherWayText`).setValidators([]);
      this.estateDistributedForm.get(`toSomeOtherWay.0.someOtherWayText`).updateValueAndValidity();
  }

  /**
   *add / Remove validation to the  someOtherWayText depending on the ifPassesbeforeyou value
   */
  addRemoveValidationToSomeotherway() {
      if (this.estateDistributedForm.get('toASingleBeneficiary.0.ifPassesbeforeyou').value === '3') {
          this.estateDistributedForm.get(`toASingleBeneficiary.0.someotherway`).setValidators([Validators.required]);
          this.estateDistributedForm.get(`toASingleBeneficiary.0.someotherway`).updateValueAndValidity();
      } else {
          this.estateDistributedForm.get(`toASingleBeneficiary.0.someotherway`).setValidators([]);
          this.estateDistributedForm.get(`toASingleBeneficiary.0.someotherway`).updateValueAndValidity();
      }
  }

  /**
   * add Validationto to MultipleBeneficiary form
   */
  addValidationtoMultipleBeneficiary() {
      this.estateDistributedForm.get(`toMultipleBeneficiary.0.isEstateIntoEqualShares`).setValidators([Validators.required]);
      this.estateDistributedForm.get(`toMultipleBeneficiary.0.isEstateIntoEqualShares`).updateValueAndValidity();
      this.estateDistributedForm.get(`toMultipleBeneficiary.0.deceasedBeneficiaryShareToKids`).setValidators([Validators.required]);
      this.estateDistributedForm.get(`toMultipleBeneficiary.0.deceasedBeneficiaryShareToKids`).updateValueAndValidity();
      this.estateDistributedForm.get(`toMultipleBeneficiary.0.minorBeneficiaryShareToBeHeldInTrust`).setValidators([Validators.required]);
      this.estateDistributedForm.get(`toMultipleBeneficiary.0.minorBeneficiaryShareToBeHeldInTrust`).updateValueAndValidity();
      if ( this.estateDistributedForm.get('toMultipleBeneficiary.0.isEstateIntoEqualShares').value === 'No' ) {
        this.setValidationFormArray((this.estateDistributedForm.get('toMultipleBeneficiary.0.beneficiaryNo') as FormArray).controls, 0);
        this.clearValidationForFormArray((this.estateDistributedForm.get('toMultipleBeneficiary.0.beneficiaryYes') as FormArray).controls, 1);
        this.estateDistributedForm.get(`toMultipleBeneficiary.0.deceasedBeneficiarieShare`).setValidators([Validators.required]);
        this.estateDistributedForm.get(`toMultipleBeneficiary.0.deceasedBeneficiarieShare`).updateValueAndValidity();
      } else {
        this.setValidationFormArray((this.estateDistributedForm.get('toMultipleBeneficiary.0.beneficiaryYes') as FormArray).controls, 1);
        this.clearValidationForFormArray((this.estateDistributedForm.get('toMultipleBeneficiary.0.beneficiaryNo') as FormArray).controls, 0);
        this.estateDistributedForm.get(`toMultipleBeneficiary.0.deceasedBeneficiarieShare`).setValidators([]);
        this.estateDistributedForm.get(`toMultipleBeneficiary.0.deceasedBeneficiarieShare`).updateValueAndValidity();
      }
  }

  /**
   * remove Validationto to MultipleBeneficiary form
   */
  removeValidationtoMultipleBeneficiary() {
      this.estateDistributedForm.get(`toMultipleBeneficiary.0.isEstateIntoEqualShares`).setValidators([]);
      this.estateDistributedForm.get(`toMultipleBeneficiary.0.isEstateIntoEqualShares`).updateValueAndValidity();
      this.estateDistributedForm.get(`toMultipleBeneficiary.0.deceasedBeneficiaryShareToKids`).setValidators([]);
      this.estateDistributedForm.get(`toMultipleBeneficiary.0.deceasedBeneficiaryShareToKids`).updateValueAndValidity();
      this.estateDistributedForm.get(`toMultipleBeneficiary.0.minorBeneficiaryShareToBeHeldInTrust`).setValidators([]);
      this.estateDistributedForm.get(`toMultipleBeneficiary.0.minorBeneficiaryShareToBeHeldInTrust`).updateValueAndValidity();
      this.estateDistributedForm.get(`toMultipleBeneficiary.0.whatAgeMinorShareDistributed`).setValidators([]);
      this.estateDistributedForm.get(`toMultipleBeneficiary.0.whatAgeMinorShareDistributed`).updateValueAndValidity();
      this.estateDistributedForm.get(`toMultipleBeneficiary.0.minorParentsTrustee`).setValidators([]);
      this.estateDistributedForm.get(`toMultipleBeneficiary.0.minorParentsTrustee`).updateValueAndValidity();
      this.estateDistributedForm.get(`toMultipleBeneficiary.0.whoServeAsTrusteeAccount`).setValidators([]);
      this.estateDistributedForm.get(`toMultipleBeneficiary.0.whoServeAsTrusteeAccount`).updateValueAndValidity();
      this.estateDistributedForm.get(`toMultipleBeneficiary.0.deceasedBeneficiarieShare`).setValidators([]);
      this.estateDistributedForm.get(`toMultipleBeneficiary.0.deceasedBeneficiarieShare`).updateValueAndValidity();
      this.clearValidationForFormArray((this.estateDistributedForm.get('toMultipleBeneficiary.0.beneficiaryYes') as FormArray).controls, 1);
      this.clearValidationForFormArray((this.estateDistributedForm.get('toMultipleBeneficiary.0.beneficiaryNo') as FormArray).controls, 0);
      this.setValidationFlagNo = false;
      this.setValidationFlagYes = false;
  }

  /**
   * add / remove Validation To Minor Beneficiary Share To BeHeld In Trust depending on the  minorBeneficiaryShareToBeHeldInTrust value
   */
  addValidationToMinorBeneficiaryShareToBeHeldInTrust() {
      if (this.estateDistributedForm.get('toMultipleBeneficiary.0.minorBeneficiaryShareToBeHeldInTrust').value === 'Yes') {
          this.estateDistributedForm.get(`toMultipleBeneficiary.0.whatAgeMinorShareDistributed`).setValidators([Validators.required]);
          this.estateDistributedForm.get(`toMultipleBeneficiary.0.whatAgeMinorShareDistributed`).updateValueAndValidity();
          this.estateDistributedForm.get(`toMultipleBeneficiary.0.minorParentsTrustee`).setValidators([Validators.required]);
          this.estateDistributedForm.get(`toMultipleBeneficiary.0.minorParentsTrustee`).updateValueAndValidity();
      } else {
          this.estateDistributedForm.get(`toMultipleBeneficiary.0.whatAgeMinorShareDistributed`).setValidators([]);
          this.estateDistributedForm.get(`toMultipleBeneficiary.0.whatAgeMinorShareDistributed`).updateValueAndValidity();
          this.estateDistributedForm.get(`toMultipleBeneficiary.0.minorParentsTrustee`).setValidators([]);
          this.estateDistributedForm.get(`toMultipleBeneficiary.0.minorParentsTrustee`).updateValueAndValidity();
      }
  }

  /**
   * add / remove Validation add Validation To Minor Parents Trustee depending on the  minorParentsTrustee value
   */
  addValidationToMinorParentsTrustee() {
      if (this.estateDistributedForm.get('toMultipleBeneficiary.0.minorParentsTrustee').value === 'Yes') {
          this.estateDistributedForm.get(`toMultipleBeneficiary.0.whoServeAsTrusteeAccount`).setValidators([Validators.required]);
          this.estateDistributedForm.get(`toMultipleBeneficiary.0.whoServeAsTrusteeAccount`).updateValueAndValidity();
      } else {
          this.estateDistributedForm.get(`toMultipleBeneficiary.0.whoServeAsTrusteeAccount`).setValidators([]);
          this.estateDistributedForm.get(`toMultipleBeneficiary.0.whoServeAsTrusteeAccount`).updateValueAndValidity();
      }
  }

  /**
   * add / remove Validation Is Estate Into Equal Shares depending on the isEstateIntoEqualShares value
   */
  addValidationIsEstateIntoEqualShares() {
      alert('Are you sure you want to continue ?');
      if ( this.estateDistributedForm.get('toMultipleBeneficiary.0.isEstateIntoEqualShares').value === 'No' ) {
          this.setValidationFormArray((this.estateDistributedForm.get('toMultipleBeneficiary.0.beneficiaryNo') as FormArray).controls, 0);
          this.clearValidationForFormArray((this.estateDistributedForm.get('toMultipleBeneficiary.0.beneficiaryYes') as FormArray).controls, 1);
          this.estateDistributedForm.get(`toMultipleBeneficiary.0.deceasedBeneficiarieShare`).setValidators([Validators.required]);
          this.estateDistributedForm.get(`toMultipleBeneficiary.0.deceasedBeneficiarieShare`).updateValueAndValidity();
      } else {
          this.setValidationFormArray((this.estateDistributedForm.get('toMultipleBeneficiary.0.beneficiaryYes') as FormArray).controls, 1);
          this.clearValidationForFormArray((this.estateDistributedForm.get('toMultipleBeneficiary.0.beneficiaryNo') as FormArray).controls, 0);
          this.estateDistributedForm.get(`toMultipleBeneficiary.0.deceasedBeneficiarieShare`).setValidators([]);
          this.estateDistributedForm.get(`toMultipleBeneficiary.0.deceasedBeneficiarieShare`).updateValueAndValidity();
      }
  }

  /**
   *Add/Remove validation to the Other Relationship textbox
   */
  addRemoveValidationToOtherRelationship() {
      if ( this.estateDistributedForm.get('toASingleBeneficiary.0.relationship').value === 'Other' ) {
          this.estateDistributedForm.get(`toASingleBeneficiary.0.otherRelationship`).setValidators([Validators.required]);
          this.estateDistributedForm.get(`toASingleBeneficiary.0.otherRelationship`).updateValueAndValidity();
      } else {
          this.estateDistributedForm.get(`toASingleBeneficiary.0.otherRelationship`).setValidators([]);
          this.estateDistributedForm.get(`toASingleBeneficiary.0.otherRelationship`).updateValueAndValidity();
      }
  }

  /**
   * function to allow only number and period
   * @param e
   * @returns {boolean}
   */
  checkOnlyNumbers(e) {
      let input;
      if (e.metaKey || e.ctrlKey) {
          return true;
      }
      if (e.which === 32) {
          return false;
      }
      if (e.which === 0) {
          return true;
      }
      if (e.which === 46) {
          return true;
      }
      if (e.which < 33) {
          return true;
      }
      input = String.fromCharCode(e.which);
      return !!/[\d\s]/.test(input);
  }

  /**
   *function to check validation of percentage
   */
  checkInput() {
      this.setValidationFlagNo = false;
      this.setValidationFlagYes = false;
      let checkValue = this.estateDistributedForm.get('toMultipleBeneficiary.0.beneficiaryNo').value;
      let percentage = 0;
      for (let i = 0; i < checkValue.length; i++) {
          percentage += parseFloat(checkValue[i].beneficiaryNoPercentageToEstate);
      }
      // console.log(percentage);
      if ( percentage > 100 ) {
          this.showErrorMessage = true;
          this.inputCheck = false;
      } else {
          this.showErrorMessage = false;
          this.inputCheck = true;
      }
  }

  /**When the component is destroyed*/
  ngOnDestroy() {
    if (this.editProfileSubscription !== undefined) {
        this.editProfileSubscription.unsubscribe();
    }
    if (this.getUserDetailsSubscription !== undefined) {
        this.getUserDetailsSubscription.unsubscribe();
    }
  }

  /**Previous page*/
  goBack() {
    this.location.back();
  }
}
