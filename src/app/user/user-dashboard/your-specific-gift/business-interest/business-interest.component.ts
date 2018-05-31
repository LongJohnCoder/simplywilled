import {Component, Input, OnDestroy, OnInit, ViewChild} from '@angular/core';
import {FormArray, FormBuilder, FormControl, FormGroup, Validators} from '@angular/forms';
import {Subscription} from 'rxjs/Subscription';
import {YourSpecificGiftService} from '../services/your-specific-gift.service';
import {EditGiftService} from '../services/edit-gift.service';
import {YourSpecificGiftComponent} from '../your-specific-gift.component';

@Component({
  selector: 'app-business-interest',
  templateUrl: './business-interest.component.html',
  styleUrls: ['./business-interest.component.css']
})

export class BusinessInterestComponent implements OnInit, OnDestroy {

  /**Variable declaration*/
  @Input() giftCount: any;
  @ViewChild(YourSpecificGiftComponent) YourSpecificGiftComponent: YourSpecificGiftComponent;
  businessInterestForm: FormGroup;
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
    survivingGiftBeneficiariesFlag: false,
    toTheirIssueFlag: false,
    residueEstateFlag: false,
    someoneElseFlag: false,
    residueEstateChildFlag: false,
    someoneElseChildFlag: false,
    setValidationFlag: false,
  };
  formEditDataSet: any;
  giftData = [];
  giftId = 0;

  /**Calls the constructor*/
  constructor (
    private _fb: FormBuilder,
    private ysgService: YourSpecificGiftService,
    private editService: EditGiftService,
    private ysgComponent: YourSpecificGiftComponent
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
        let parsedDataSet = JSON.parse(this.formEditDataSet.business_details)[0];
        this.giftId = this.formEditDataSet.id;
        console.log(this.giftId);
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
        this.setValidatorsGiftTo(parsedDataSet === null ? '' : parsedDataSet.gift_to);
        this.setValidatorsBeneficiary(parsedDataSet === null ? '' : parsedDataSet.beneficiary);
        this.setValidatorsPassedBy(parsedDataSet === null ? '' : parsedDataSet.passed_by);
        this.setValidatorsPassedByChild(parsedDataSet === null ? '' : parsedDataSet.passed_by_child);
      }
    }
  }

  /**Initialises the form*/
  createForm(editFlag = false, data = null) {
    this.businessInterestForm = this._fb.group( {
      'full_legal_name': new FormControl(data === null ? '' : data.full_legal_name, [Validators.required]),
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
      this.businessInterestForm.setControl('multiple_beneficiaries',
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
    this.giftInfoSubscription = this.businessInterestForm.get('gift_to').valueChanges.subscribe(
      (gift_to: string) => {
         this.setValidatorsGiftTo(gift_to);
      }
    );

    this.beneficiarySubscription = this.businessInterestForm.get('beneficiary').valueChanges.subscribe(
      (beneficiary: string) => {
          this.setValidatorsBeneficiary(beneficiary);
      }
    );

    this.passedBySubscription = this.businessInterestForm.get('passed_by').valueChanges.subscribe(
      (passedBy: string) => {
          this.setValidatorsPassedBy(passedBy);
      }
    );

    this.passedByChildSubscription = this.businessInterestForm.get('passed_by_child').valueChanges.subscribe(
      (passedByChildren: string) => {
        this.setValidatorsPassedByChild(passedByChildren);
      }
    );
  }

  /**Set validators when gift to is selected*/
  setValidatorsGiftTo(gift_to) {
    switch (gift_to) {
      case 'IN':  console.log("IN");
        this.businessInterestForm.get('beneficiary').setValidators([Validators.required]);
        this.businessInterestForm.get('beneficiary').updateValueAndValidity();
        this.clearValidationFor([
          'organization_name',
          'organization_address',
          'multiple_beneficiaries',
          'beneficiary_legal_name',
          'passed_by',
          'passed_by_child',
          'individual_name']);
        this.clearValidationForFormArray((this.businessInterestForm.get('multiple_beneficiaries') as FormArray).controls);
        break;
      case 'CH':  console.log("CH");
        this.businessInterestForm.get('organization_name').setValidators([Validators.required]);
        this.businessInterestForm.get('organization_address').setValidators([Validators.required]);
        this.businessInterestForm.get('organization_name').updateValueAndValidity();
        this.businessInterestForm.get('organization_address').updateValueAndValidity();
        this.clearValidationFor([
          'beneficiary',
          'multiple_beneficiaries',
          'beneficiary_legal_name',
          'passed_by',
          'passed_by_child',
          'individual_name']);
        this.clearValidationForFormArray((this.businessInterestForm.get('multiple_beneficiaries') as FormArray).controls);
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
        this.clearValidationForFormArray((this.businessInterestForm.get('multiple_beneficiaries') as FormArray).controls);
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
        this.clearValidationForFormArray((this.businessInterestForm.get('multiple_beneficiaries') as FormArray).controls);
        break;
    }
  }

  /**Set validators when passed by is selected*/
  setValidatorsPassedBy(passedBy) {
    switch (passedBy) {
      case '_tti':   console.log('tth');
        this.businessInterestForm.get('individual_name').clearValidators();
        this.businessInterestForm.get('passed_by_child').setValidators([Validators.required]);
        this.businessInterestForm.get('individual_name').updateValueAndValidity();
        this.businessInterestForm.get('passed_by_child').updateValueAndValidity();
        break;
      case '_re':    console.log('re');
        this.businessInterestForm.get('individual_name').clearValidators();
        this.businessInterestForm.get('passed_by_child').clearValidators();
        this.businessInterestForm.get('individual_name').updateValueAndValidity();
        this.businessInterestForm.get('passed_by_child').updateValueAndValidity();
        break;
      case '_se':    console.log('Se');
        this.businessInterestForm.get('individual_name').setValidators([Validators.required, Validators.pattern(/\s+(?=\S{2})/ )]);
        this.businessInterestForm.get('passed_by_child').clearValidators();
        this.businessInterestForm.get('individual_name').updateValueAndValidity();
        this.businessInterestForm.get('passed_by_child').updateValueAndValidity();
        break;
      /* case '':       console.log('passed_by_empty');
                      this.businessInterestForm.get('individual_name').clearValidators();
                      this.businessInterestForm.get('passed_by_child').clearValidators();
                      break;*/
    }
  }

  /**Set validators when beneficiary is selected*/
  setValidatorsBeneficiary(beneficiary) {
    switch (beneficiary) {
      case '_si':  console.log('si');
        this.businessInterestForm.get('beneficiary_legal_name').setValidators([Validators.required, Validators.pattern(/\s+(?=\S{2})/ )]);
        this.businessInterestForm.get('passed_by').setValidators([Validators.required]);
        this.businessInterestForm.get('beneficiary_legal_name').updateValueAndValidity();
        this.businessInterestForm.get('passed_by').updateValueAndValidity();
        this.clearValidationForFormArray((this.businessInterestForm.get('multiple_beneficiaries') as FormArray).controls);
        //this.businessInterestForm.get('multiple_beneficiaries').clearValidators();
        break;
      case '_mu':   console.log('mu');
        //console.log(this.businessInterestForm.get('multiple_beneficiaries'));
        //this.businessInterestForm.get('multiple_beneficiaries').setValidators([Validators.required]);
        this.setValidation((this.businessInterestForm.get('multiple_beneficiaries') as FormArray).controls);
        this.businessInterestForm.get('passed_by').setValidators([Validators.required]);
        this.businessInterestForm.get('passed_by').updateValueAndValidity();
        this.businessInterestForm.get('beneficiary_legal_name').clearValidators();
        this.businessInterestForm.get('beneficiary_legal_name').updateValueAndValidity();
        break;
      /*case '':     console.log('ben_empty');
                    this.businessInterestForm.get('multiple_beneficiaries').clearValidators();
                    this.businessInterestForm.get('beneficiary_legal_name').clearValidators();
                    this.businessInterestForm.get('passed_by').clearValidators();
                    break;*/
    }
  }

  /**Set validators when beneficiary is selected*/
  setValidatorsPassedByChild(passedByChildren) {
    switch (passedByChildren) {
      case '_re':   console.log('_rechi');
        this.businessInterestForm.get('individual_name').clearValidators();
        this.businessInterestForm.get('individual_name').updateValueAndValidity();
        break;
      case '_se':   console.log('_sechi');
        this.businessInterestForm.get('individual_name').setValidators([Validators.required, Validators.pattern(/\s+(?=\S{2})/ )]);
        this.businessInterestForm.get('individual_name').updateValueAndValidity();
        break;
      /*case '':      console.log('_remoty');
                    this.businessInterestForm.get('individual_name').clearValidators();
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
    this.multipleBeneficiaries = this.businessInterestForm.get('multiple_beneficiaries') as FormArray;
    this.multipleBeneficiaries.push(this.createMultipleBeneficiaryForm());
  }

  /**Remove beneficiary from index*/
  removeBeneficiary(index: number) {
    this.multipleBeneficiaries = this.businessInterestForm.get('multiple_beneficiaries') as FormArray;
    this.multipleBeneficiaries.removeAt(index);
  }

  /**Submit the form*/
  submit() {
    if (this.businessInterestForm.valid) {
      let user = this.parseUserId();
      let token = this.parseToken();
      this.giftData.push(this.businessInterestForm.value);
      if (token) {
        let cashGiftDataSet = this.flags.editFlag ? {'id': this.giftId, 'step': 7, 'user_id': user, 'giftType': 3, 'giftData': this.giftData} : {'step': 7, 'user_id': user, 'giftType': 3, 'giftData': this.giftData};
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
      this.markFormGroupTouched(this.businessInterestForm);
    }
  }

  /**Calls update gift data api*/
  editGiftData(token: string, cashGiftDataSet) {
    this.ysgService.updateGift(token, cashGiftDataSet).subscribe((data) => {
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

    this.checkValidation((this.businessInterestForm.get('multiple_beneficiaries') as FormArray).controls);
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
      this.businessInterestForm.get(control).clearValidators();
      this.businessInterestForm.get(control).updateValueAndValidity();
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
