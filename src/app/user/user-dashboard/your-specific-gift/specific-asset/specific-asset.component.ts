import {Component, Input, OnDestroy, OnInit} from '@angular/core';
import {FormArray, FormBuilder, FormControl, FormGroup, Validators} from '@angular/forms';

@Component({
  selector: 'app-specific-asset',
  templateUrl: './specific-asset.component.html',
  styleUrls: ['./specific-asset.component.css']
})
export class SpecificAssetComponent implements OnInit, OnDestroy {

  /**Variable declaration*/
  @Input() giftCount: any;
  businessInterestForm: FormGroup;
  multipleBeneficiaries: FormArray;
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

  ngOnInit() {
    this.addConditionalValidators();
  }

  addConditionalValidators() {
    this.businessInterestForm.get('gift_to').valueChanges.subscribe(
      (gift_to: string) => {
        switch (gift_to) {
          case 'IN':  this.businessInterestForm.get('beneficiary').setValidators([Validators.required]);
            this.businessInterestForm.get('organization_name').clearValidators();
            this.businessInterestForm.get('organization_address').clearValidators();
            break;
          case 'CH':  this.businessInterestForm.get('organization_name').setValidators([Validators.required]);
            this.businessInterestForm.get('organization_address').setValidators([Validators.required]);
            this.businessInterestForm.get('beneficiary').clearValidators();
            break;
          case '':    this.businessInterestForm.get('organization_name').clearValidators();
            this.businessInterestForm.get('organization_address').clearValidators();
            this.businessInterestForm.get('beneficiary').clearValidators();
            break;
        }
        // this.businessInterestForm.get('organization_name').updateValueAndValidity();
        // this.businessInterestForm.get('organization_address').updateValueAndValidity();
        // this.businessInterestForm.get('beneficiary').updateValueAndValidity();
      }
    );

    this.businessInterestForm.get('beneficiary').valueChanges.subscribe(
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
        // this.businessInterestForm.get('multiple_beneficiaries').updateValueAndValidity();
        // this.businessInterestForm.get('beneficiary_legal_name').updateValueAndValidity();
        // this.businessInterestForm.get('passed_by').updateValueAndValidity();
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
  markFormGroupTouched(formGroup: FormGroup) {
    (<any>Object).values(formGroup.controls).forEach(control => {
      control.updateValueAndValidity();
      control.markAsTouched();
      control.markAsDirty();

      if (control.controls) {
        control.controls.forEach(c => this.markFormGroupTouched(c));
      }
    });
  }

  clearValidationsExcept(formGroup: FormGroup) {
    (<any>Object).values(formGroup.controls).forEach(control => {
      control.markAsTouched();
      control.markAsDirty();

      if (control.controls) {
        control.controls.forEach(c => this.markFormGroupTouched(c));
      }
    });
  }

  ngOnDestroy() {}

}
