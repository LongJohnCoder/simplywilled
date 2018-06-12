import {Component, Input, OnDestroy, OnInit, ViewChild} from '@angular/core';
import {FormArray, FormBuilder, FormControl, FormGroup, Validators} from '@angular/forms';
import {YourSpecificGiftService} from '../services/your-specific-gift.service';
import {EditGiftService} from '../services/edit-gift.service';
import {Subscription} from 'rxjs/Subscription';
import {YourSpecificGiftComponent} from '../your-specific-gift.component';

@Component({
  selector: 'app-specific-asset',
  templateUrl: './specific-asset.component.html',
  styleUrls: ['./specific-asset.component.css']
})
export class SpecificAssetComponent implements OnInit, OnDestroy {

  /**Variable declaration*/
  @Input() giftCount: any;
  @ViewChild(YourSpecificGiftComponent) YourSpecificGiftComponent: YourSpecificGiftComponent;
  specificAssetForm: FormGroup;
  multipleBeneficiaries: FormArray;
  giftInfoSubscription: Subscription;
  beneficiarySubscription: Subscription;
  passedBySubscription: Subscription;
  passedByChildSubscription: Subscription;
  fetchDataSubscription: Subscription;
  errors = {
    errorFlag: false,
    errorMsg: ''
  };
  flags = {
    editFlag: false,
    showIndividualAndCharity: true,
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
  };
  formEditDataSet: any;
  giftData = [];
  giftId = 0;
  loading = true;


  /**Calls the constructor*/
  constructor (
    private _fb: FormBuilder,
    private ysgService: YourSpecificGiftService,
    private editService: EditGiftService,
    private ysgComponent: YourSpecificGiftComponent
  ) {
    this.createForm();
    let userId = this.parseUserId();
    let token = this.parseToken();
    this.fetchDataSubscription = this.ysgService.fetchData(token, userId)
      .subscribe(
        (response) => {
          console.log(response);
          if (response.data[7] !== undefined && response.data[7] !== null && response.data[7].data !== null && response.data[7].data !== undefined) {
            if (response.data[7].data.charity === 1 && response.data[7].data.individual === 1) {
              this.flags.showIndividualAndCharity = true;
            } else if (response.data[7].data.charity === 1 && response.data[7].data.individual === 0) {
              this.flags.showIndividualAndCharity = false;
              this.flags.charityFlag = true;
              this.flags.individualFlag = false;
              if (!this.flags.editFlag) {
                this.clearValidationFor(['gift_to']);
                this.setValidatorGift('CH');
              }
            } else if (response.data[7].data.charity === 0 && response.data[7].data.individual === 1) {
              this.flags.showIndividualAndCharity = false;
              this.flags.charityFlag = false;
              this.flags.individualFlag = true;
              if (!this.flags.editFlag) {
                this.clearValidationFor(['gift_to']);
                this.setValidatorGift('IN');
              }
            }
          } else {
            this.flags.showIndividualAndCharity = true;
          }
      }, (error) => { console.log(error); }, () => { this.loading = false; });
  }

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
    if (this.editService.getData() && this.editService.getData() !== null && this.editService.getData() !== undefined) {
      if (Object.keys(this.editService.getData()).length) {
        this.flags.editFlag = true;
        this.formEditDataSet = this.editService.getData();
        let parsedDataSet = JSON.parse(this.formEditDataSet.asset_details)[0];
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

    /*if (!this.flags.editFlag) {
      if  (!this.flags.showIndividualAndCharity && this.flags.charityFlag && !this.flags.individualFlag) {
        console.log('here');
        this.clearValidationFor(['gift_to']);
        this.setValidatorGift('CH');
      } else if (!this.flags.showIndividualAndCharity && !this.flags.charityFlag && this.flags.individualFlag ) {
        console.log('there');
        this.clearValidationFor(['gift_to']);
        this.setValidatorGift('IN');
      }
    }*/
  }

  /**Initialises the form*/
  createForm(editFlag = false, data = null) {
    this.specificAssetForm = this._fb.group( {
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
      this.specificAssetForm.setControl('multiple_beneficiaries',
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
    this.giftInfoSubscription = this.specificAssetForm.get('gift_to').valueChanges.subscribe(
      (gift_to: string) => {
        this.setValidatorGift(gift_to);
      }
    );

    this.beneficiarySubscription = this.specificAssetForm.get('beneficiary').valueChanges.subscribe(
      (beneficiary: string) => {
        this.setValidationBeneficiary(beneficiary);
      }
    );

    this.passedBySubscription = this.specificAssetForm.get('passed_by').valueChanges.subscribe(
      (passedBy: string) => {
        this.setValidationPassedBy(passedBy);
      }
    );

    this.passedByChildSubscription = this.specificAssetForm.get('passed_by_child').valueChanges.subscribe(
      (passedByChild: string) => {
        this.setValidationPassedByChild(passedByChild);
      }
    );
  }

  /**Set validators when gift to is selected*/
  setValidatorGift(gift_to) {
    switch (gift_to) {
      case 'IN':  console.log("IN");
        this.specificAssetForm.get('beneficiary').setValidators([Validators.required]);
        this.specificAssetForm.get('beneficiary').updateValueAndValidity();
        this.clearValidationFor([
          'organization_name',
          'organization_address',
          'multiple_beneficiaries',
          'beneficiary_legal_name',
          'passed_by',
          'passed_by_child',
          'individual_name']);
        this.clearValidationForFormArray((this.specificAssetForm.get('multiple_beneficiaries') as FormArray).controls);
        break;
      case 'CH':  console.log("CH");
        this.specificAssetForm.get('organization_name').setValidators([Validators.required]);
        this.specificAssetForm.get('organization_address').setValidators([Validators.required]);
        this.specificAssetForm.get('organization_name').updateValueAndValidity();
        this.specificAssetForm.get('organization_address').updateValueAndValidity();
        this.clearValidationFor([
          'beneficiary',
          'multiple_beneficiaries',
          'beneficiary_legal_name',
          'passed_by',
          'passed_by_child',
          'individual_name']);
        this.clearValidationForFormArray((this.specificAssetForm.get('multiple_beneficiaries') as FormArray).controls);
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
        this.clearValidationForFormArray((this.specificAssetForm.get('multiple_beneficiaries') as FormArray).controls);
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
        this.clearValidationForFormArray((this.specificAssetForm.get('multiple_beneficiaries') as FormArray).controls);
        break;
    }
  }

  /**Set validators when beneficiary is selected*/
  setValidationBeneficiary(beneficiary) {
    switch (beneficiary) {
      case '_si':  console.log('si');
        this.specificAssetForm.get('beneficiary_legal_name').setValidators([Validators.required, Validators.pattern(/\s+(?=\S{2})/ )]);
        this.specificAssetForm.get('passed_by').setValidators([Validators.required]);
        this.specificAssetForm.get('beneficiary_legal_name').updateValueAndValidity();
        this.specificAssetForm.get('passed_by').updateValueAndValidity();
        this.clearValidationForFormArray((this.specificAssetForm.get('multiple_beneficiaries') as FormArray).controls);
        //this.specificAssetForm.get('multiple_beneficiaries').clearValidators();
        break;
      case '_mu':   console.log('mu');
        //console.log(this.specificAssetForm.get('multiple_beneficiaries'));
        //this.specificAssetForm.get('multiple_beneficiaries').setValidators([Validators.required]);
        this.setValidation((this.specificAssetForm.get('multiple_beneficiaries') as FormArray).controls);
        this.specificAssetForm.get('passed_by').setValidators([Validators.required]);
        this.specificAssetForm.get('passed_by').updateValueAndValidity();
        this.specificAssetForm.get('beneficiary_legal_name').clearValidators();
        this.specificAssetForm.get('beneficiary_legal_name').updateValueAndValidity();
        break;
      /*case '':     console.log('ben_empty');
                    this.specificAssetForm.get('multiple_beneficiaries').clearValidators();
                    this.specificAssetForm.get('beneficiary_legal_name').clearValidators();
                    this.specificAssetForm.get('passed_by').clearValidators();
                    break;*/
    }
  }

  /**Set validators when passed by is selected*/
  setValidationPassedBy(passedBy) {
    switch (passedBy) {
      case '_tti':   console.log('tth');
        this.specificAssetForm.get('individual_name').clearValidators();
        this.specificAssetForm.get('passed_by_child').setValidators([Validators.required]);
        this.specificAssetForm.get('individual_name').updateValueAndValidity();
        this.specificAssetForm.get('passed_by_child').updateValueAndValidity();
        break;
      case '_re':    console.log('re');
        this.specificAssetForm.get('individual_name').clearValidators();
        this.specificAssetForm.get('passed_by_child').clearValidators();
        this.specificAssetForm.get('individual_name').updateValueAndValidity();
        this.specificAssetForm.get('passed_by_child').updateValueAndValidity();
        break;
      case '_se':    console.log('Se');
        this.specificAssetForm.get('individual_name').setValidators([Validators.required, Validators.pattern(/\s+(?=\S{2})/ )]);
        this.specificAssetForm.get('passed_by_child').clearValidators();
        this.specificAssetForm.get('individual_name').updateValueAndValidity();
        this.specificAssetForm.get('passed_by_child').updateValueAndValidity();
        break;
      /* case '':       console.log('passed_by_empty');
                      this.specificAssetForm.get('individual_name').clearValidators();
                      this.specificAssetForm.get('passed_by_child').clearValidators();
                      break;*/
    }
  }
  /**Set validators when passed by child is selected*/
  setValidationPassedByChild(passedByChild) {
    switch (passedByChild) {
      case '_re':   console.log('_rechi');
        this.specificAssetForm.get('individual_name').clearValidators();
        this.specificAssetForm.get('individual_name').updateValueAndValidity();
        break;
      case '_se':   console.log('_sechi');
        this.specificAssetForm.get('individual_name').setValidators([Validators.required, Validators.pattern(/\s+(?=\S{2})/ )]);
        this.specificAssetForm.get('individual_name').updateValueAndValidity();
        break;
      /*case '':      console.log('_remoty');
                    this.specificAssetForm.get('individual_name').clearValidators();
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
    this.multipleBeneficiaries = this.specificAssetForm.get('multiple_beneficiaries') as FormArray;
    this.multipleBeneficiaries.push(this.createMultipleBeneficiaryForm());
  }

  /**Remove beneficiary from index*/
  removeBeneficiary(index: number) {
    this.multipleBeneficiaries = this.specificAssetForm.get('multiple_beneficiaries') as FormArray;
    this.multipleBeneficiaries.removeAt(index);
  }

  /**Submit the form*/
  submit() {
    if (this.specificAssetForm.valid) {
      let user = this.parseUserId();
      let token = this.parseToken();
      let data = this.prepareData();
      this.giftData.push(data);
      if (token) {
        let cashGiftDataSet = this.flags.editFlag ? {'id': this.giftId, 'step': 7, 'user_id': user, 'giftType': 4,  'individual': this.flags.individualFlag ? 1 : 0, 'charity': this.flags.charityFlag ? 1 : 0,  'giftData': this.giftData} : {'step': 7, 'user_id': user, 'giftType': 4,  'individual': this.flags.individualFlag ? 1 : 0, 'charity': this.flags.charityFlag ? 1 : 0, 'giftData': this.giftData};
        if (this.flags.editFlag) {
          console.log('edit');
          this.editGiftData(token, cashGiftDataSet);
        } else {
          console.log('add');
          this.createGiftData(token, cashGiftDataSet);
        }
      } else {
        this.errors.errorFlag = true;
        this.errors.errorMsg = 'Please login again.';
        console.log(this.errors.errorMsg);
      }
    } else {
      alert('Please fill up all the fields');
      this.markFormGroupTouched(this.specificAssetForm);
    }
  }

  /**Prepares the request*/
  prepareData() {
    let data = {
  /*    beneficiary: this.specificAssetForm.value.gift_to === 'IN' ? this.specificAssetForm.value.beneficiary : '',
      full_legal_name: this.specificAssetForm.value.full_legal_name,
      beneficiary_legal_name: this.specificAssetForm.value.gift_to === 'IN' && this.specificAssetForm.value.beneficiary === '_si' ? this.specificAssetForm.value.beneficiary_legal_name : '',
      beneficiary_legal_relation: this.specificAssetForm.value.gift_to === 'IN' && this.specificAssetForm.value.beneficiary === '_si' ? this.specificAssetForm.value.beneficiary_legal_relation : '',
      beneficiary_legal_relation_other: this.specificAssetForm.value.gift_to === 'IN' && this.specificAssetForm.value.beneficiary === '_si' ? this.specificAssetForm.value.beneficiary_legal_relation_other : '',
      gender: this.specificAssetForm.value.gift_to === 'IN' && this.specificAssetForm.value.beneficiary === '_si' ? this.specificAssetForm.value.gender : 'Male',
      gift_to: this.specificAssetForm.value.gift_to,
      multiple_beneficiaries: this.specificAssetForm.value.gift_to === 'IN' && this.specificAssetForm.value.beneficiary === '_mu' ? this.specificAssetForm.value.multiple_beneficiaries : [],
      organization_address: this.specificAssetForm.value.gift_to === 'CH' ? this.specificAssetForm.value.organization_address : '',
      organization_name: this.specificAssetForm.value.gift_to === 'CH' ? this.specificAssetForm.value.organization_name : '',
      passed_by: this.specificAssetForm.value.gift_to === 'IN' ? this.specificAssetForm.value.passed_by : '',
      passed_by_child: this.specificAssetForm.value.gift_to === 'IN' ? this.specificAssetForm.value.passed_by_child : '',
      individual_name: this.specificAssetForm.value.gift_to === 'IN' && (this.specificAssetForm.value.passed_by === '_se' || (this.specificAssetForm.value.passed_by === '_tti' && this.specificAssetForm.value.passed_by_child === '_se')) ? this.specificAssetForm.value.individual_name : '',
      individual_relationship: this.specificAssetForm.value.gift_to === 'IN' && (this.specificAssetForm.value.passed_by === '_se' || (this.specificAssetForm.value.passed_by === '_tti' && this.specificAssetForm.value.passed_by_child === '_se')) ? this.specificAssetForm.value.individual_relationship : '',
      individual_relationship_other: this.specificAssetForm.value.gift_to === 'IN' && (this.specificAssetForm.value.passed_by === '_se' || (this.specificAssetForm.value.passed_by === '_tti' && this.specificAssetForm.value.passed_by_child === '_se')) ? this.specificAssetForm.value.individual_relationship_other : '',*/
      beneficiary: this.specificAssetForm.value.gift_to === 'IN' ? this.specificAssetForm.value.beneficiary : (!this.flags.showIndividualAndCharity && this.flags.individualFlag ? this.specificAssetForm.value.beneficiary : ''),
      full_legal_name: this.specificAssetForm.value.full_legal_name,
      beneficiary_legal_name: this.specificAssetForm.value.gift_to === 'IN' && this.specificAssetForm.value.beneficiary === '_si' ? this.specificAssetForm.value.beneficiary_legal_name : (!this.flags.showIndividualAndCharity && this.flags.individualFlag && this.specificAssetForm.value.beneficiary === '_si' ? this.specificAssetForm.value.beneficiary_legal_name : ''),
      beneficiary_legal_relation: this.specificAssetForm.value.gift_to === 'IN' && this.specificAssetForm.value.beneficiary === '_si' ? this.specificAssetForm.value.beneficiary_legal_relation : (!this.flags.showIndividualAndCharity && this.flags.individualFlag && this.specificAssetForm.value.beneficiary === '_si' ? this.specificAssetForm.value.beneficiary_legal_relation : ''),
      beneficiary_legal_relation_other: this.specificAssetForm.value.gift_to === 'IN' && this.specificAssetForm.value.beneficiary === '_si' ? this.specificAssetForm.value.beneficiary_legal_relation_other : (!this.flags.showIndividualAndCharity && this.flags.individualFlag && this.specificAssetForm.value.beneficiary === '_si' ? this.specificAssetForm.value.beneficiary_legal_relation_other : ''),
      gender: this.specificAssetForm.value.gift_to === 'IN' && this.specificAssetForm.value.beneficiary === '_si' ? this.specificAssetForm.value.gender : (!this.flags.showIndividualAndCharity && this.flags.individualFlag && this.specificAssetForm.value.beneficiary === '_si' ? this.specificAssetForm.value.gender : 'Male'),
      gift_to: this.flags.showIndividualAndCharity ? this.specificAssetForm.value.gift_to : (!this.flags.showIndividualAndCharity && this.flags.charityFlag ? 'CH' : 'IN'),
      multiple_beneficiaries: this.specificAssetForm.value.gift_to === 'IN' && this.specificAssetForm.value.beneficiary === '_mu' ? this.specificAssetForm.value.multiple_beneficiaries : (!this.flags.showIndividualAndCharity && this.flags.individualFlag && this.specificAssetForm.value.beneficiary === '_mu' ? this.specificAssetForm.value.multiple_beneficiaries : []),
      organization_address: this.specificAssetForm.value.gift_to === 'CH' ? this.specificAssetForm.value.organization_address : (!this.flags.showIndividualAndCharity && this.flags.charityFlag ? this.specificAssetForm.value.organization_address : ''),
      organization_name: this.specificAssetForm.value.gift_to === 'CH' ? this.specificAssetForm.value.organization_name : (!this.flags.showIndividualAndCharity && this.flags.charityFlag ? this.specificAssetForm.value.organization_name : ''),
      passed_by: this.specificAssetForm.value.gift_to === 'IN' ? this.specificAssetForm.value.passed_by : (!this.flags.showIndividualAndCharity && this.flags.individualFlag ? this.specificAssetForm.value.passed_by : ''),
      passed_by_child: this.specificAssetForm.value.gift_to === 'IN' ? this.specificAssetForm.value.passed_by_child : (!this.flags.showIndividualAndCharity && this.flags.individualFlag ? this.specificAssetForm.value.passed_by_child : ''),
      individual_name: this.specificAssetForm.value.gift_to === 'IN' && (this.specificAssetForm.value.passed_by === '_se' || (this.specificAssetForm.value.passed_by === '_tti' && this.specificAssetForm.value.passed_by_child === '_se')) ? this.specificAssetForm.value.individual_name : (!this.flags.showIndividualAndCharity && this.flags.individualFlag && (this.specificAssetForm.value.passed_by === '_se' || (this.specificAssetForm.value.passed_by === '_tti' && this.specificAssetForm.value.passed_by_child === '_se')) ? this.specificAssetForm.value.individual_name : ''),
      individual_relationship: this.specificAssetForm.value.gift_to === 'IN' && (this.specificAssetForm.value.passed_by === '_se' || (this.specificAssetForm.value.passed_by === '_tti' && this.specificAssetForm.value.passed_by_child === '_se')) ? this.specificAssetForm.value.individual_relationship : (!this.flags.showIndividualAndCharity && this.flags.individualFlag && (this.specificAssetForm.value.passed_by === '_se' || (this.specificAssetForm.value.passed_by === '_tti' && this.specificAssetForm.value.passed_by_child === '_se')) ? this.specificAssetForm.value.individual_relationship  : ''),
      individual_relationship_other: this.specificAssetForm.value.gift_to === 'IN' && (this.specificAssetForm.value.passed_by === '_se' || (this.specificAssetForm.value.passed_by === '_tti' && this.specificAssetForm.value.passed_by_child === '_se')) ? this.specificAssetForm.value.individual_relationship_other : (!this.flags.showIndividualAndCharity && this.flags.individualFlag && (this.specificAssetForm.value.passed_by === '_se' || (this.specificAssetForm.value.passed_by === '_tti' && this.specificAssetForm.value.passed_by_child === '_se')) ? this.specificAssetForm.value.individual_relationship_other : ''),
    };
    return data;
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

    this.checkValidation((this.specificAssetForm.get('multiple_beneficiaries') as FormArray).controls);
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
      this.specificAssetForm.get(control).clearValidators();
      this.specificAssetForm.get(control).updateValueAndValidity();
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
    if (this.fetchDataSubscription !== undefined) {
      this.fetchDataSubscription.unsubscribe();
    }
  }

  /**Deletes the gift*/
  popUpDelete(id: number): void {
    this.ysgComponent.deleteGift(id);
    this.ysgComponent.changeViewState();
    this.editService.unsetData();
    window.location.reload();
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
