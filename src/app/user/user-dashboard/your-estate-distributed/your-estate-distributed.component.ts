import { Component, OnInit } from '@angular/core';
import {Router} from '@angular/router';
import {Validators, FormGroup, FormBuilder, FormControl, FormArray} from '@angular/forms';
import {UserAuthService} from '../../user-auth/user-auth.service';
import {UserService} from '../../user.service';

@Component({
  selector: 'app-your-estate-distributed',
  templateUrl: './your-estate-distributed.component.html',
  styleUrls: ['./your-estate-distributed.component.css']
})
export class YourEstateDistributedComponent implements OnInit {
  public estateDistributedForm: FormGroup;
  columnFormArray: FormArray;
  fullUserInfo: any;
  singleBeneficiary: boolean;
  errorMessage: any;
  editFlag = false;
  beneficiaryNoFormArray: FormArray;
  inputCheck: boolean;
  showErrorMessage: boolean;
  constructor( private  authService: UserAuthService,
               private userService: UserService,
               private router: Router,
               private fb: FormBuilder, ) {
      this.createForm(); }

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
    /**
     *function get user data
     */
    getUserData() {
        this.userService.getUserDetails(this.authService.getUser()['id']).subscribe(
            (response: any) => {
                this.fullUserInfo = response.data[9].data;
                this.estateDistributedForm.controls['disrtibuteType'].setValue( this.fullUserInfo.type);
                if (this.fullUserInfo.type === '1') {
                    // set value to the singleBeneficiary Form
                    this.estateDistributedForm.patchValue({
                        singleBeneficiary: 'Yes',
                        multiBeneficiary: 'No',
                        someOtherWay: 'No'
                    });
                    const estactInfo = JSON.parse(this.fullUserInfo.totalInfo);
                    const toASingleBeneficiaryFGs = estactInfo.map(gr => this.fb.group(gr));
                    const toASingleBeneficiaryFormArray = this.fb.array(toASingleBeneficiaryFGs);
                    this.estateDistributedForm.setControl('toASingleBeneficiary', toASingleBeneficiaryFormArray);
                } if (this.fullUserInfo.type === '2') {
                    // set value to the multiBeneficiary Form
                    this.estateDistributedForm.patchValue({
                        singleBeneficiary: 'No',
                        multiBeneficiary: 'Yes',
                        someOtherWay: 'No',
                    });
                    const estactInfo = JSON.parse(this.fullUserInfo.totalInfo);
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
                    } if (this.fullUserInfo.type === '4') {
                    // set value to the someOtherWay Form
                    this.estateDistributedForm.patchValue({
                        singleBeneficiary: 'No',
                        multiBeneficiary: 'No',
                        someOtherWay: 'Yes'
                    });
                    const estactInfo = JSON.parse(this.fullUserInfo.totalInfo);
                    const toSomeOtherWayFGs = estactInfo.map(gr => this.fb.group(gr));
                    const toSomeOtherWayFormArray = this.fb.array(toSomeOtherWayFGs);
                    this.estateDistributedForm.setControl('toSomeOtherWay', toSomeOtherWayFormArray);
                }
            },
            (error: any) => {
                console.log(error.error);
            }
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
        const modelData = model.value;
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
        this.estateDistributedForm.get(`toASingleBeneficiary.0.fullName`).setValidators([Validators.required]);
        this.estateDistributedForm.get(`toASingleBeneficiary.0.fullName`).updateValueAndValidity();
        this.estateDistributedForm.get(`toASingleBeneficiary.0.relationship`).setValidators([Validators.required]);
        this.estateDistributedForm.get(`toASingleBeneficiary.0.relationship`).updateValueAndValidity();
        this.estateDistributedForm.get(`toASingleBeneficiary.0.gender`).setValidators([Validators.required]);
        this.estateDistributedForm.get(`toASingleBeneficiary.0.gender`).updateValueAndValidity();
        this.estateDistributedForm.get(`toASingleBeneficiary.0.ifPassesbeforeyou`).setValidators([Validators.required]);
        this.estateDistributedForm.get(`toASingleBeneficiary.0.ifPassesbeforeyou`).updateValueAndValidity();

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
        if ( this.estateDistributedForm.get('toMultipleBeneficiary.0.isEstateIntoEqualShares').value === 'No' ) {
            this.estateDistributedForm.get(`toMultipleBeneficiary.0.deceasedBeneficiarieShare`).setValidators([Validators.required]);
            this.estateDistributedForm.get(`toMultipleBeneficiary.0.deceasedBeneficiarieShare`).updateValueAndValidity();
        } else {
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
        const checkValue = this.estateDistributedForm.get('toMultipleBeneficiary.0.beneficiaryNo').value;
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

}
