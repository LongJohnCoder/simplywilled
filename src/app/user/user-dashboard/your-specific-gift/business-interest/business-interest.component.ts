import {Component, Input, OnDestroy, OnInit} from '@angular/core';
import {FormArray, FormBuilder, FormControl, FormGroup, Validators} from '@angular/forms';
import {Subscription} from 'rxjs/Subscription';

@Component({
  selector: 'app-business-interest',
  templateUrl: './business-interest.component.html',
  styleUrls: ['./business-interest.component.css']
})

export class BusinessInterestComponent implements OnInit, OnDestroy {

  /**Variable declaration*/
  @Input() giftCount: any;
  businessInterestForm: FormGroup;
  multipleBeneficiaries: FormArray;
  giftInfoSubscription: Subscription;
  beneficiarySubscription: Subscription;
  passedBySubscription: Subscription;
  passedByChildSubscription: Subscription;
  flags = {
    individualFlag: false,
    charityFlag: false,
    singleBeneficiaryFlag: false,
    multipleBeneficiaryFlag: false,
    maleFlag: true,
    femaleFlag: false,
    toTheirIssueFlag: false,
    residueEstateFlag: false,
    someoneElseFlag: false,
    residueEstateChildFlag: false,
    someoneElseChildFlag: false
  };

  constructor (
    private _fb: FormBuilder
  ) { this.createForm(); }

  /**Initialises the form*/
  createForm() {
    this.businessInterestForm = this._fb.group( {
        'full_legal_name': new FormControl('', [Validators.required]),
        'gift_to': new FormControl('', [Validators.required]),
        'organization_name': new FormControl(''),
        'organization_address': new FormControl(''),
        'multiple_beneficiaries': this._fb.array([this.createMultipleBeneficiaryForm()]),
        'beneficiary': new FormControl(''),
        'beneficiary_legal_name': new FormControl(''),
        'beneficiary_legal_relation': new FormControl(''),
        'gender': new FormControl('Male'),
        'passed_by': new FormControl(''),
        'passed_by_child': new FormControl(''),
        'individual_name': new FormControl(''),
        'individual_relationship': new FormControl(''),
    });
  }

  /**Initialises the multiple beneficiary forms*/
  createMultipleBeneficiaryForm() {
      return this._fb.group({
        'multiple_beneficiary_name': new FormControl(''),
        'multiple_beneficiary_relationship': new FormControl(''),
      });
  }

  /**When component initialises*/
  ngOnInit() {
    this.addConditionalValidators();
  }

  /**Set dynamic validations*/
  addConditionalValidators() {
    this.giftInfoSubscription = this.businessInterestForm.get('gift_to').valueChanges.subscribe(
      (gift_to: string) => {
          switch (gift_to) {
            case 'IN':  this.businessInterestForm.get('beneficiary').setValidators([Validators.required]);
                        this.clearValidationFor([
                          'organization_name',
                          'organization_address',
                          'multiple_beneficiaries',
                          'beneficiary_legal_name',
                          'passed_by',
                          'passed_by_child',
                          'individual_name']);
                        break;
            case 'CH':  this.businessInterestForm.get('organization_name').setValidators([Validators.required]);
                        this.businessInterestForm.get('organization_address').setValidators([Validators.required]);
                        this.clearValidationFor([
                          'beneficiary',
                          'multiple_beneficiaries',
                          'beneficiary_legal_name',
                          'passed_by',
                          'passed_by_child',
                          'individual_name']);
                        break;
            case '':    this.clearValidationFor([
                          'organization_name',
                          'organization_address',
                          'beneficiary',
                          'multiple_beneficiaries',
                          'beneficiary_legal_name',
                          'passed_by',
                          'passed_by_child',
                          'individual_name']);
                        break;
            default:   this.clearValidationFor([
                          'organization_name',
                          'organization_address',
                          'beneficiary',
                          'multiple_beneficiaries',
                          'beneficiary_legal_name',
                          'passed_by',
                          'passed_by_child',
                          'individual_name']);
                        break;
          }
      }
    );

    this.beneficiarySubscription = this.businessInterestForm.get('beneficiary').valueChanges.subscribe(
      (beneficiary: string) => {
        switch (beneficiary) {
          case '_si':   this.businessInterestForm.get('beneficiary_legal_name').setValidators([Validators.required]);
                        this.businessInterestForm.get('passed_by').setValidators([Validators.required]);
                        this.businessInterestForm.get('multiple_beneficiaries').clearValidators();
                        break;
          case '_mu':   this.businessInterestForm.get('multiple_beneficiaries').setValidators([Validators.required]);
                        this.businessInterestForm.get('beneficiary_legal_name').clearValidators();
                        this.businessInterestForm.get('passed_by').setValidators([Validators.required]);
                        break;
          case '':      this.businessInterestForm.get('multiple_beneficiaries').clearValidators();
                        this.businessInterestForm.get('beneficiary_legal_name').clearValidators();
                        this.businessInterestForm.get('passed_by').clearValidators();
                        break;
        }
      }
    );

    this.passedBySubscription = this.businessInterestForm.get('passed_by').valueChanges.subscribe(
      (beneficiary: string) => {
        switch (beneficiary) {
          case '_tth':   this.businessInterestForm.get('individual_name').clearValidators();
                         this.businessInterestForm.get('passed_by_child').setValidators([Validators.required]);
                         break;
          case '_re':    this.businessInterestForm.get('individual_name').clearValidators();
                         this.businessInterestForm.get('passed_by_child').setValidators([Validators.required]);
                         break;
          case '_se':    this.businessInterestForm.get('individual_name').setValidators([Validators.required]);
                         this.businessInterestForm.get('passed_by_child').setValidators([Validators.required]);
                         break;
          case '':       this.businessInterestForm.get('individual_name').clearValidators();
                         this.businessInterestForm.get('passed_by_child').clearValidators();
                         break;
        }
      }
    );

    this.passedByChildSubscription = this.businessInterestForm.get('passed_by_child').valueChanges.subscribe(
      (beneficiary: string) => {
        switch (beneficiary) {
          case '_re':   this.businessInterestForm.get('individual_name').clearValidators();
                        break;
          case '_se':   this.businessInterestForm.get('individual_name').setValidators([Validators.required]);
                        break;
          case '':      this.businessInterestForm.get('individual_name').clearValidators();
                        break;
        }
      }
    );
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
      this.flags.toTheirIssueFlag = value === '_tth';
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

  submit() {
    this.markFormGroupTouched(this.businessInterestForm);
  }

  /**
   * Marks all controls in a form group as touched
   * @param formGroup
   */
  markFormGroupTouched (formGroup: FormGroup) {
    (<any>Object).values(formGroup.controls).forEach(control => {
      control.updateValueAndValidity();
      control.markAsTouched();
      control.markAsDirty();

      if (control.controls) {
        control.controls.forEach(c => this.markFormGroupTouched(c));
      }
    });
  }

  /**Clears validation except certain fields*/
  clearValidationFor(formControlArray: Array<string> = []) {
    formControlArray.forEach(control => {
      this.businessInterestForm.get(control).clearValidators();
      this.businessInterestForm.get(control).updateValueAndValidity();
    });
  }

  /**Clears validation except certain fields*/
  clearValidationForFromGroup(formGroup: FormGroup) {
    (<any>Object).values(formGroup.controls).forEach(control => {
      control.clearValidators();
      control.updateValueAndValidity();

      if (control.controls) {
        control.controls.forEach(c => this.clearValidationForFromGroup(c));
      }
    });
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
}
