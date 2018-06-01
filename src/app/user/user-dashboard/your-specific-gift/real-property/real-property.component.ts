import {Component, Input, OnInit, ViewChild} from '@angular/core';
import {FormArray, FormBuilder, FormGroup, FormControl, Validators} from '@angular/forms';
import {RealPropertyService} from '../services/real-property.service';
import {Observable} from 'rxjs/Observable';
import {SaveRealProperty} from '../models/saveRealProperty';
import {YourSpecificGiftService} from '../services/your-specific-gift.service';
import {EditGiftService} from '../services/edit-gift.service';
import {MyGifts} from '../models/myGifts';
import {YourSpecificGiftComponent} from '../your-specific-gift.component';
import {Subscription} from 'rxjs/Subscription';

@Component({
  selector: 'app-real-property',
  templateUrl: './real-property.component.html',
  styleUrls: ['./real-property.component.css']
})
export class RealPropertyComponent implements OnInit {
  /**Variable declaration*/
  @Input() giftCount: any;
  @ViewChild(YourSpecificGiftComponent) YourSpecificGiftComponent: YourSpecificGiftComponent;
  realPropertyForm: FormGroup;
  multipleBeneficiaries: FormArray;
  giftInfoSubscription: Subscription;
  beneficiarySubscription: Subscription;
  passedBySubscription: Subscription;
  passedByChildSubscription: Subscription;
  errors = {
    errorFlag: false,
    errorMsg: ''
  };
  flags = {
    editFlag: false,
    individualFlag: false,
    charityFlag: false,
    singleBeneficiaryFlag: false,
    multipleBeneficiaryFlag: false,
    maleFlag: true,
    femaleFlag: false,
    toTheirIssueFlag: false,
    survivingGiftBeneficiariesFlag: false,
    residueEstateFlag: false,
    someoneElseFlag: false,
    residueEstateChildFlag: false,
    someoneElseChildFlag: false,
    setValidationFlag: false,
    residenceYesFlag: false,
    residenceNoFlag: true,
    mortageYesFlag: true,
    mortageNoFlag: false
  };
  formEditDataSet: any;
  giftData = [];
  giftId = 0;

  /**Calls the constructor*/
  constructor (
    private _fb: FormBuilder,
    private ysgService: YourSpecificGiftService,
    private editService: EditGiftService,
    private ysgComponent: YourSpecificGiftComponent,
    private rpService: RealPropertyService
  ) { this.createForm(); }

  /**Checks for authorization user id.*/
  parseUserId() {
    if (JSON.parse(localStorage.getItem('loggedInUser')).hasOwnProperty('user')) {
      return JSON.parse(localStorage.getItem('loggedInUser')).user.id;
    }
    return null;
  }

  /**Checks for authorization user id.*/
  parseToken() {
    if (JSON.parse(localStorage.getItem('loggedInUser')).hasOwnProperty('token')) {
      return JSON.parse(localStorage.getItem('loggedInUser')).token;
    }
    return null;
  }

  /**Set the form after edit*/
  setFormData(): void {
    if (this.editService.getData()) {
      if (Object.keys(this.editService.getData()).length) {
        this.flags.editFlag = true;
        this.formEditDataSet = this.editService.getData();
        let parsedDataSet = JSON.parse(this.formEditDataSet.property_details)[0];
        this.giftId = this.formEditDataSet.id;
        this.createForm(this.flags.editFlag, parsedDataSet);
        this.flags.individualFlag = parsedDataSet.gift_to === 'IN';
        this.flags.charityFlag = parsedDataSet.gift_to === 'CH';
        this.flags.singleBeneficiaryFlag = parsedDataSet.beneficiary === '_si';
        this.flags.multipleBeneficiaryFlag = parsedDataSet.beneficiary === '_mu';
        this.flags.maleFlag = parsedDataSet.gender === 'Male';
        this.flags.femaleFlag = parsedDataSet.gender === 'Female';
        this.flags.survivingGiftBeneficiariesFlag = parsedDataSet.passed_by === '_sgb';
        this.flags.toTheirIssueFlag = parsedDataSet.passed_by === '_tti';
        this.flags.residueEstateFlag = parsedDataSet.passed_by === '_re';
        this.flags.someoneElseFlag = parsedDataSet.passed_by === '_se';
        this.flags.residueEstateChildFlag = parsedDataSet.passed_by_child === '_re';
        this.flags.someoneElseChildFlag = parsedDataSet.passed_by_child === '_se';
        this.showDataMultipleBeneficiaries(parsedDataSet);
        this.setValidatorGift(parsedDataSet === null ? '' : parsedDataSet.gift_to);
        this.setValidationBeneficiary(parsedDataSet === null ? '' : parsedDataSet.beneficiary);
        this.setValidationPassedBy(parsedDataSet === null ? '' : parsedDataSet.passed_by);
        this.setValidationPassedByChild(parsedDataSet === null ? '' : parsedDataSet.passed_by_child);
      }
    }
  }

  /**Initialises the form*/
  createForm(editFlag = false, data = null) {
    this.realPropertyForm = this._fb.group( {
      'street_address': new FormControl(data === null ? '' : data.street_address, [Validators.required]),
      'city': new FormControl(data === null ? '' : data.city, [Validators.required]),
      'state': new FormControl(data === null ? '' : data.city, [Validators.required]),
      'residence': new FormControl(data === null ? '0' : data.residence, [Validators.required]),
      'gift_to': new FormControl(data === null ? '' : data.gift_to , [Validators.required]),
      'organization_name': new FormControl(data === null ? '' : data.organization_name),
      'organization_address': new FormControl(data === null ? '' : data.organization_address),
      'multiple_beneficiaries': this._fb.array([this.createMultipleBeneficiaryForm()]),
      'beneficiary': new FormControl(data === null ? '' : data.beneficiary),
      'beneficiary_legal_name': new FormControl(data === null ? '' : data.beneficiary_legal_name),
      'beneficiary_legal_relation': new FormControl(data === null ? '' : (data.beneficiary_legal_relation === null ? '' : data.beneficiary_legal_relation)),
      'beneficiary_legal_relation_other': new FormControl(data === null ? '' : (data.beneficiary_legal_relation_other === null ? '' : data.beneficiary_legal_relation_other)),
      'gender': new FormControl(data === null ? 'Male' : data.gender),
      'passed_by': new FormControl(data === null ? '' : data.passed_by),
      'passed_by_child': new FormControl(data === null ? '' : data.passed_by_child),
      'individual_name': new FormControl(data === null ? '' : data.individual_name),
      'individual_relationship': new FormControl(data === null ? '' : (data.individual_relationship === null ? '' : data.individual_relationship)),
      'individual_relationship_other': new FormControl(data === null ? '' : (data.individual_relationship_other === null ? '' : data.individual_relationship_other)),
      'free_mortgage': new FormControl(data === null ? '1' : (data.free_mortage === null ? '0' : data.free_mortage), [Validators.required]),
    });
  }

  /**Initialises the multiple beneficiary forms*/
  createMultipleBeneficiaryForm() {
    return this._fb.group({
      'multiple_beneficiary_name': new FormControl( '', [Validators.required]),
      'multiple_beneficiary_relationship': new FormControl('', [Validators.required]),
    });
  }

  /**Show all the multiple beneficiaries*/
  showDataMultipleBeneficiaries(data) {
    if (data.multiple_beneficiaries.length > 0 ) {
      this.realPropertyForm.setControl('multiple_beneficiaries',
        this._fb.array((data.multiple_beneficiaries || []).map((x) => this._fb.group(x))));
    }
  }

  /**When component initialises*/
  ngOnInit() {
    this.setFormData();
    this.addConditionalValidators();
  }

  /**Set dynamic validations*/
  addConditionalValidators() {
    this.giftInfoSubscription = this.realPropertyForm.get('gift_to').valueChanges.subscribe(
      (gift_to: string) => {
        this.setValidatorGift(gift_to);
      }
    );

    this.beneficiarySubscription = this.realPropertyForm.get('beneficiary').valueChanges.subscribe(
      (beneficiary: string) => {
        this.setValidationBeneficiary(beneficiary);
      }
    );

    this.passedBySubscription = this.realPropertyForm.get('passed_by').valueChanges.subscribe(
      (passedBy: string) => {
        this.setValidationPassedBy(passedBy);
      }
    );

    this.passedByChildSubscription = this.realPropertyForm.get('passed_by_child').valueChanges.subscribe(
      (passedByChild: string) => {
        this.setValidationPassedByChild(passedByChild);
      }
    );
  }

  /**Set validators when gift to is selected*/
  setValidatorGift(gift_to) {
    switch (gift_to) {
      case 'IN':  console.log("IN");
        this.realPropertyForm.get('beneficiary').setValidators([Validators.required]);
        this.realPropertyForm.get('beneficiary').updateValueAndValidity();
        this.clearValidationFor([
          'organization_name',
          'organization_address',
          'multiple_beneficiaries',
          'beneficiary_legal_name',
          'passed_by',
          'passed_by_child',
          'individual_name']);
        this.clearValidationForFormArray((this.realPropertyForm.get('multiple_beneficiaries') as FormArray).controls);
        break;
      case 'CH':  console.log("CH");
        this.realPropertyForm.get('organization_name').setValidators([Validators.required]);
        this.realPropertyForm.get('organization_address').setValidators([Validators.required]);
        this.realPropertyForm.get('organization_name').updateValueAndValidity();
        this.realPropertyForm.get('organization_address').updateValueAndValidity();
        this.clearValidationFor([
          'beneficiary',
          'multiple_beneficiaries',
          'beneficiary_legal_name',
          'passed_by',
          'passed_by_child',
          'individual_name']);
        this.clearValidationForFormArray((this.realPropertyForm.get('multiple_beneficiaries') as FormArray).controls);
        break;
      case '':    console.log("empty");
        this.clearValidationFor([
          'organization_name',
          'organization_address',
          'beneficiary',
          'multiple_beneficiaries',
          'beneficiary_legal_name',
          'passed_by',
          'passed_by_child',
          'individual_name']);
        this.clearValidationForFormArray((this.realPropertyForm.get('multiple_beneficiaries') as FormArray).controls);
        break;
      default:   console.log("default");
        this.clearValidationFor([
          'organization_name',
          'organization_address',
          'beneficiary',
          'multiple_beneficiaries',
          'beneficiary_legal_name',
          'passed_by',
          'passed_by_child',
          'individual_name']);
        this.clearValidationForFormArray((this.realPropertyForm.get('multiple_beneficiaries') as FormArray).controls);
        break;
    }
  }

  /**Set validators when beneficiary is selected*/
  setValidationBeneficiary(beneficiary) {
    switch (beneficiary) {
      case '_si':  console.log('si');
        this.realPropertyForm.get('beneficiary_legal_name').setValidators([Validators.required, Validators.pattern(/\s+(?=\S{2})/ )]);
        this.realPropertyForm.get('passed_by').setValidators([Validators.required]);
        this.realPropertyForm.get('beneficiary_legal_name').updateValueAndValidity();
        this.realPropertyForm.get('passed_by').updateValueAndValidity();
        this.clearValidationForFormArray((this.realPropertyForm.get('multiple_beneficiaries') as FormArray).controls);
        //this.realPropertyForm.get('multiple_beneficiaries').clearValidators();
        break;
      case '_mu':   console.log('mu');
        //console.log(this.realPropertyForm.get('multiple_beneficiaries'));
        //this.realPropertyForm.get('multiple_beneficiaries').setValidators([Validators.required]);
        this.setValidation((this.realPropertyForm.get('multiple_beneficiaries') as FormArray).controls);
        this.realPropertyForm.get('passed_by').setValidators([Validators.required]);
        this.realPropertyForm.get('passed_by').updateValueAndValidity();
        this.realPropertyForm.get('beneficiary_legal_name').clearValidators();
        this.realPropertyForm.get('beneficiary_legal_name').updateValueAndValidity();
        break;
      /*case '':     console.log('ben_empty');
                    this.realPropertyForm.get('multiple_beneficiaries').clearValidators();
                    this.realPropertyForm.get('beneficiary_legal_name').clearValidators();
                    this.realPropertyForm.get('passed_by').clearValidators();
                    break;*/
    }
  }

  /**Set validators when passed by is selected*/
  setValidationPassedBy(passedBy) {
    switch (passedBy) {
      case '_tti':   console.log('tth');
        this.realPropertyForm.get('individual_name').clearValidators();
        this.realPropertyForm.get('passed_by_child').setValidators([Validators.required]);
        this.realPropertyForm.get('individual_name').updateValueAndValidity();
        this.realPropertyForm.get('passed_by_child').updateValueAndValidity();
        break;
      case '_re':    console.log('re');
        this.realPropertyForm.get('individual_name').clearValidators();
        this.realPropertyForm.get('passed_by_child').clearValidators();
        this.realPropertyForm.get('individual_name').updateValueAndValidity();
        this.realPropertyForm.get('passed_by_child').updateValueAndValidity();
        break;
      case '_se':    console.log('Se');
        this.realPropertyForm.get('individual_name').setValidators([Validators.required, Validators.pattern(/\s+(?=\S{2})/ )]);
        this.realPropertyForm.get('passed_by_child').clearValidators();
        this.realPropertyForm.get('individual_name').updateValueAndValidity();
        this.realPropertyForm.get('passed_by_child').updateValueAndValidity();
        break;
      /* case '':       console.log('passed_by_empty');
                      this.realPropertyForm.get('individual_name').clearValidators();
                      this.realPropertyForm.get('passed_by_child').clearValidators();
                      break;*/
    }
  }
  /**Set validators when passed by child is selected*/
  setValidationPassedByChild(passedByChild) {
    switch (passedByChild) {
      case '_re':   console.log('_rechi');
        this.realPropertyForm.get('individual_name').clearValidators();
        this.realPropertyForm.get('individual_name').updateValueAndValidity();
        break;
      case '_se':   console.log('_sechi');
        this.realPropertyForm.get('individual_name').setValidators([Validators.required, Validators.pattern(/\s+(?=\S{2})/ )]);
        this.realPropertyForm.get('individual_name').updateValueAndValidity();
        break;
      /*case '':      console.log('_remoty');
                    this.realPropertyForm.get('individual_name').clearValidators();
                    break;*/
    }
  }

  /**Function call when radio button for individual/charity is toggled*/
  giftIndividualOrCharity(value: string) {
    this.flags.individualFlag = value === 'IN';
    this.flags.charityFlag = value === 'CH';
  }

  /**Function call when radio button for single/multiple beneficiary is toggled*/
  changeSingleOrMultipleBeneficiaries(value: string) {
    this.flags.singleBeneficiaryFlag = value === '_si';
    this.flags.multipleBeneficiaryFlag = value === '_mu';
  }

  /**Function call when radio button for single/multiple beneficiary is toggled*/
  changeMaleOrFemale(value: string) {
    this.flags.maleFlag = value === 'Male';
    this.flags.femaleFlag = value === 'Female';
  }

  /**Function call when radio button when property is toggled*/
  changeProperty(value: string) {
    this.flags.survivingGiftBeneficiariesFlag = value === '_sgb';
    this.flags.toTheirIssueFlag = value === '_tti';
    this.flags.residueEstateFlag = value === '_re';
    this.flags.someoneElseFlag = value === '_se';
  }

  /**Function call when radio button when property child is toggled*/
  changePropertyChild (value: string) {
    this.flags.residueEstateChildFlag = value === '_re';
    this.flags.someoneElseChildFlag = value === '_se';
  }

  /**Adds new row for the multiple beneficiary*/
  addNewRow() {
    this.multipleBeneficiaries = this.realPropertyForm.get('multiple_beneficiaries') as FormArray;
    this.multipleBeneficiaries.push(this.createMultipleBeneficiaryForm());
  }

  /**Remove beneficiary from index*/
  removeBeneficiary(index: number) {
    this.multipleBeneficiaries = this.realPropertyForm.get('multiple_beneficiaries') as FormArray;
    this.multipleBeneficiaries.removeAt(index);
  }

  /**change residence radio button*/
  changeResidence (value) {
    this.flags.residenceYesFlag = value === '1';
    this.flags.residenceNoFlag  = value === '0';
    let user = this.parseUserId();
    let token = this.parseToken();
    if (this.flags.residenceYesFlag) {
      this.rpService.fetchUserData(token, user).subscribe(data => {
          if (data.status === 200) {
            if (data.data[0].data !== null) {
              if (data.data[0].data.hasOwnProperty('userInfo')) {
                this.realPropertyForm.patchValue({
                  'street_address': data.data[0].data.userInfo.address,
                  'city': data.data[0].data.userInfo.city,
                  'state': data.data[0].data.userInfo.state
                });
              } else {
                this.errors.errorFlag = true;
                this.errors.errorMsg = 'Something went wrong could not be able to find User Info';
                console.log(this.errors.errorMsg);
              }
            } else {
              this.errors.errorFlag = true;
              this.errors.errorMsg = 'Please fill the tell us about you form!';
              console.log(this.errors.errorMsg);
            }
          } else {
            this.errors.errorFlag = true;
            this.errors.errorMsg = 'Something went wrong while fetching the information. Please try again later!';
            console.log(this.errors.errorMsg);
          }
        },
        error => {
          this.errors.errorFlag = true;
          this.errors.errorMsg = error.error.message;
          console.log(this.errors.errorMsg);
        }, () => {});
    } else {
      this.realPropertyForm.patchValue({
        'street_address': '',
        'city': '',
        'state': ''
      });
    }
  }

  /**change mortage radio button*/
  changeMortage (value) {
    this.flags.mortageYesFlag = value === '1';
    this.flags.mortageNoFlag  = value === '0';
  }

  /**Submit the form*/
  submit() {
    if (this.realPropertyForm.valid) {
      let user = this.parseUserId();
      let token = this.parseToken();
      this.giftData.push(this.realPropertyForm.value);
      if (token) {
        let cashGiftDataSet = this.flags.editFlag ? {'id': this.giftId, 'step': 7, 'user_id': user, 'giftType': 2, 'giftData': this.giftData} : {'step': 7, 'user_id': user, 'giftType': 2, 'giftData': this.giftData};
        if (this.flags.editFlag) {
          this.editGiftData(token, cashGiftDataSet);
        } else {
          this.createGiftData(token, cashGiftDataSet);
        }
      } else {
        this.errors.errorFlag = true;
        this.errors.errorMsg = 'Please login again.';
        console.log(this.errors.errorMsg);
      }
    } else {
      alert('Please fill up all the fields');
      this.markFormGroupTouched(this.realPropertyForm);
    }
  }

  /**Calls update gift data api*/
  editGiftData(token: string, cashGiftDataSet) {
    this.ysgService.saveCashGiftData(token, cashGiftDataSet).subscribe((data) => {
      if (data.status) {
        window.location.reload();
      } else {
        this.errors.errorFlag = true;
        this.errors.errorMsg = 'Something went wrong while updating data';
        console.log(this.errors.errorMsg);
      }
    }, (error) => {
      this.errors.errorFlag = true;
      this.errors.errorMsg = error.error.message;
      console.log(this.errors.errorMsg);
    });
  }

  /**Calls create gift data api*/
  createGiftData(token: string, cashGiftDataSet) {
    this.ysgService.saveCashGiftData(token, cashGiftDataSet).subscribe((data) => {
      if (data.status) {
        window.location.reload();
      } else {
        this.errors.errorFlag = true;
        this.errors.errorMsg = 'Something went wrong while updating data';
        console.log(this.errors.errorMsg);
      }
    }, (error) => {
      this.errors.errorFlag = true;
      this.errors.errorMsg = error.error.message;
      console.log(this.errors.errorMsg);
    });
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

    this.checkValidation((this.realPropertyForm.get('multiple_beneficiaries') as FormArray).controls);
  }

  /**Checks validation for form arrays*/
  checkValidation(formArray) {
    console.log(formArray);
    for (let item of formArray) {
      if (item.controls['multiple_beneficiary_name'].hasError('required') || item.controls['multiple_beneficiary_relationship'].hasError('required')) {
        this.flags.setValidationFlag = true;
        break;
      }
      this.flags.setValidationFlag = false;
    }
  }

  /**Clears validation except certain fields*/
  clearValidationFor(formControlArray: Array<string> = []) {
    formControlArray.forEach(control => {
      this.realPropertyForm.get(control).clearValidators();
      this.realPropertyForm.get(control).updateValueAndValidity();
    });
  }

  /**Clears validation for form arrays*/
  clearValidationForFormArray(formArray) {
    for (let item of formArray) {
      item.controls['multiple_beneficiary_name'].clearValidators();
      item.controls['multiple_beneficiary_relationship'].clearValidators();
      item.controls['multiple_beneficiary_name'].updateValueAndValidity();
      item.controls['multiple_beneficiary_relationship'].updateValueAndValidity();
    }
  }

  /**Set validation for form array*/
  setValidation(formArray) {
    for (let item of formArray) {
      item.controls['multiple_beneficiary_name'].setValidators([Validators.required]);
      item.controls['multiple_beneficiary_relationship'].setValidators([Validators.required]);
      item.controls['multiple_beneficiary_name'].updateValueAndValidity();
      item.controls['multiple_beneficiary_relationship'].updateValueAndValidity();
    }
  }
  /**When component is destroyed*/
  ngOnDestroy() {
    this.unsubscriptions();
  }

  /**unsubscribe from subscriptions*/
  unsubscriptions() {
    if (this.giftInfoSubscription !== undefined) {
      this.giftInfoSubscription.unsubscribe();
    }
    if (this.beneficiarySubscription !== undefined) {
      this.beneficiarySubscription.unsubscribe();
    }
    if (this.passedBySubscription !== undefined) {
      this.passedBySubscription.unsubscribe();
    }
    if (this.passedByChildSubscription !== undefined) {
      this.passedByChildSubscription .unsubscribe();
    }
  }

  /**Deletes the gift*/
  popUpDelete(id: number): void {
    this.ysgComponent.deleteGift(id);
    this.ysgComponent.changeViewState();
    this.editService.unsetData();
  }

  /**
   * this function for get back to the main gift page
   */
  popUp(): void {
    if (confirm('Are you sure you want to delete this gift?')) {
      window.location.reload();
    }
  }
}
