import {Component, Input, OnDestroy, OnInit, ViewChild} from '@angular/core';
import {FormArray, FormBuilder, FormGroup, Validators} from '@angular/forms';
import {Router} from '@angular/router';
import {Observable} from 'rxjs/Observable';
import {YourSpecificGiftService} from '../services/your-specific-gift.service';
import {SaveCashGift} from '../models/saveCashGift';
import {EditGiftService} from '../services/edit-gift.service';
import {MyGifts} from '../models/myGifts';
import {YourSpecificGiftComponent} from '../your-specific-gift.component';
import {Subscription} from 'rxjs/Subscription';

@Component({
  selector: 'app-cash-gift',
  templateUrl: './cash-gift.component.html',
  styleUrls: ['./cash-gift.component.css']
})
export class CashGiftComponent implements OnInit, OnDestroy {
  /**Variable declaration*/
  @Input() giftCount: any;
  @ViewChild(YourSpecificGiftComponent) YourSpecificGiftComponent: YourSpecificGiftComponent;
  isIndividual: boolean;
  isCharity: boolean;
  isOtherRelationship: boolean;
  cashGiftForm: FormGroup;
  saveCashGiftDB: Observable<any>;
  access_token: string;
  myUserId: any;
  errFlag: boolean;
  errString: string;
  cashGiftDataSet: any;
  value: string;
  formEditDataSet: MyGifts;
  parsedDataSet: any;
  isEdit: boolean;
  saveCashGiftDBSubscription: Subscription;
  /**Constructor call*/
  constructor(private fb: FormBuilder, private router: Router, private ysgService: YourSpecificGiftService, private editService: EditGiftService, private ysgComponent: YourSpecificGiftComponent) { this.createForm(); }
 /**When the component is intialised*/
  ngOnInit() {
    this.isIndividual = false;
    this.isCharity = false;
    this.isOtherRelationship = false;
    this.errFlag = false;
    this.errString = null;
    this.value = null;
    this.isEdit = false;
    if (JSON.parse(localStorage.getItem('loggedInUser')).hasOwnProperty('token')) {
      this.access_token = JSON.parse(localStorage.getItem('loggedInUser')).token;
      this.myUserId = JSON.parse(localStorage.getItem('loggedInUser')).user.id;
    } else {
      this.access_token = '';
    }
    this.setFormData();
    // console.log(this.isEdit);
  }
  /**
   * this function create the form controls of reactive form
   */
  createForm(): void {
    this.cashGiftForm = this.fb.group({
      'gift_to' : [null, Validators.required],
      individualControls: this.fb.array([
        this.fb.group({
            'full_legal_name': [''],
            'relationship': [''],
            'other_relationship_string' : [''],
            'gift_amt': [''],
            'b_gender': ['Male'],
            'passed_by': ['Yes']
          })
        ]),
      charityControls: this.fb.array([
        this.fb.group({
          'organization_name': [''],
          'organization_address': [''],
          'charity_gift_amt': ['']
        })
      ])
    });
  }
  setFormData(): void {
    if (this.editService.getData() && this.editService.getData() !== null && this.editService.getData() !== undefined) {
      if (Object.keys(this.editService.getData()).length) {
        this.isEdit = true;
        this.formEditDataSet = this.editService.getData();
        this.parsedDataSet = JSON.parse(this.formEditDataSet.cash_description)[0];
        if (JSON.parse(this.formEditDataSet.cash_description)[0].gift_to === 'IN') {
          // Individual
          this.cashGiftForm.controls['gift_to'].setValue('IN');
          this.isIndividual = true;
          this.isCharity = false;
          this.cashGiftForm.get('individualControls.0.full_legal_name').setValue(this.parsedDataSet.full_legal_name);
          if (this.parsedDataSet.relationship === 'Other') {
            this.cashGiftForm.get('individualControls.0.relationship').setValue(this.parsedDataSet.relationship);
            this.cashGiftForm.get('individualControls.0.other_relationship_string').setValue(this.parsedDataSet.other_relationship_string);
            this.isOtherRelationship = true;
          } else {
            this.cashGiftForm.get('individualControls.0.relationship').setValue(this.parsedDataSet.relationship);
            this.isOtherRelationship = false;
          }
          this.cashGiftForm.get('individualControls.0.gift_amt').setValue(this.parsedDataSet.gift_amt);
          this.cashGiftForm.get('individualControls.0.b_gender').setValue(this.parsedDataSet.b_gender);
          this.cashGiftForm.get('individualControls.0.passed_by').setValue(this.parsedDataSet.passed_by);
          this.setIndividualValidation();
        } else {
          // charity
          this.cashGiftForm.controls['gift_to'].setValue('CH');
          this.isIndividual = false;
          this.isCharity = true;
          this.cashGiftForm.get('charityControls.0.organization_name').setValue(this.parsedDataSet.organization_name);
          this.cashGiftForm.get('charityControls.0.organization_address').setValue(this.parsedDataSet.organization_address);
          this.cashGiftForm.get('charityControls.0.charity_gift_amt').setValue(this.parsedDataSet.charity_gift_amt);
          this.setCharityValidation();
        }
      }
    }
  }
  /**
   * this function saves data in database
   * @param fd
   */
  saveCashGift(fd): void {
    if (this.cashGiftForm.valid) {
      if (this.access_token) {
        if (fd.gift_to === 'IN') {
          // individual
          fd.individualControls[0].gift_to = fd.gift_to;
          if (this.isEdit) {
            this.cashGiftDataSet = {'id': this.editService.getData().id, 'step': 7, 'user_id': this.myUserId, 'giftType': 1, 'giftData': fd.individualControls};
          } else {
            this.cashGiftDataSet = {'step': 7, 'user_id': this.myUserId, 'giftType': 1, 'giftData': fd.individualControls};
          }
        } else {
          // charity
          fd.charityControls[0].gift_to = fd.gift_to;
          if (this.isEdit) {
            this.cashGiftDataSet = {'id': this.editService.getData().id, 'step': 7, 'user_id': this.myUserId, 'giftType': 1 , 'giftData': fd.charityControls};
          } else {
            this.cashGiftDataSet = {'step': 7, 'user_id': this.myUserId, 'giftType': 1 , 'giftData': fd.charityControls};
          }
        }
        if (this.isEdit) {
          this.saveCashGiftDB = this.ysgService.updateGift(this.access_token, this.cashGiftDataSet);
        } else {
          this.saveCashGiftDB = this.ysgService.saveCashGiftData(this.access_token, this.cashGiftDataSet);
        }
        this.saveCashGiftDBSubscription = this.saveCashGiftDB.subscribe(data => {
          if (data.status) {
            window.location.reload();
          } else {
            this.errFlag = true;
            this.errString = 'Something went wrong while updating data';
            console.log(this.errString);
          }
        }, error => {
          this.errFlag = true;
          this.errString = error.error.message;
          console.log(this.errString);
        }, () => {});
      } else {
        this.errFlag = true;
        this.errString = 'Please login to continue';
        console.log(this.errString);
      }
    } else {
      alert('Please fill up the required fields');
      this.markFormGroupTouched(this.cashGiftForm);
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

    this.checkValidation((this.cashGiftForm.get('individualControls') as FormArray).controls);
    this.checkValidation((this.cashGiftForm.get('charityControls') as FormArray).controls);
  }

  /**Checks validation for form arrays*/
  checkValidation(formArray) {
    for (let item of formArray) {
      (<any>Object).values(item.controls).forEach(control => {
        control.markAsTouched();
        control.markAsDirty();
      });
    }
  }
  /**
   * this function show childs of form according to individual or charity
   * @param {string} identifier
   */
  showChild(identifier: string): void {
    if (identifier === 'IN') {
      this.isIndividual = true;
      this.isCharity = false;
      this.setIndividualValidation();
      this.removeCharityValidation();
    } else {
      this.isCharity = true;
      this.isIndividual = false;
      this.setCharityValidation();
      this.removeIndividualValidation();
    }
  }
  /**Set validation if individual is selected.*/
  setIndividualValidation() {
    this.cashGiftForm.get('individualControls.0.full_legal_name').setValidators([Validators.required, Validators.pattern(/\s+(?=\S{2})/ )]);
    this.cashGiftForm.get('individualControls.0.full_legal_name').updateValueAndValidity();
    //this.cashGiftForm.get('individualControls.0.relationship').setValidators([Validators.required]);
    //this.cashGiftForm.get('individualControls.0.relationship').updateValueAndValidity();
    this.cashGiftForm.get('individualControls.0.gift_amt').setValidators([Validators.required, Validators.pattern(/^[0-9]+(\.[0-9]{1,2})?$/)]);
    this.cashGiftForm.get('individualControls.0.gift_amt').updateValueAndValidity();
    this.cashGiftForm.get('individualControls.0.b_gender').setValidators([Validators.required]);
    this.cashGiftForm.get('individualControls.0.b_gender').updateValueAndValidity();
    this.cashGiftForm.get('individualControls.0.passed_by').setValidators([Validators.required]);
    this.cashGiftForm.get('individualControls.0.passed_by').updateValueAndValidity();
  }

  /**Set validation if individual is selected.*/
  removeIndividualValidation() {
    this.cashGiftForm.get('individualControls.0.full_legal_name').clearValidators();
    this.cashGiftForm.get('individualControls.0.full_legal_name').updateValueAndValidity();
    this.cashGiftForm.get('individualControls.0.relationship').clearValidators();
    this.cashGiftForm.get('individualControls.0.relationship').updateValueAndValidity();
    this.cashGiftForm.get('individualControls.0.gift_amt').clearValidators();
    this.cashGiftForm.get('individualControls.0.gift_amt').updateValueAndValidity();
    this.cashGiftForm.get('individualControls.0.b_gender').clearValidators();
    this.cashGiftForm.get('individualControls.0.b_gender').updateValueAndValidity();
    this.cashGiftForm.get('individualControls.0.passed_by').clearValidators();
    this.cashGiftForm.get('individualControls.0.passed_by').updateValueAndValidity();
  }
  /**Set validation if charity is selected*/
  setCharityValidation() {
    this.cashGiftForm.get('charityControls.0.organization_name').setValidators([Validators.required]);
    this.cashGiftForm.get('charityControls.0.organization_name').updateValueAndValidity();
    this.cashGiftForm.get('charityControls.0.organization_address').setValidators([Validators.required]);
    this.cashGiftForm.get('charityControls.0.organization_address').updateValueAndValidity();
    this.cashGiftForm.get('charityControls.0.charity_gift_amt').setValidators([Validators.required, Validators.pattern(/^[0-9]+(\.[0-9]{1,2})?$/)]);
    this.cashGiftForm.get('charityControls.0.charity_gift_amt').updateValueAndValidity();
  }
  /**Set validation if individual is selected.*/
  removeCharityValidation() {
    this.cashGiftForm.get('charityControls.0.organization_name').clearValidators();
    this.cashGiftForm.get('charityControls.0.organization_name').updateValueAndValidity();
    this.cashGiftForm.get('charityControls.0.organization_address').clearValidators();
    this.cashGiftForm.get('charityControls.0.organization_address').updateValueAndValidity();
    this.cashGiftForm.get('charityControls.0.charity_gift_amt').clearValidators();
    this.cashGiftForm.get('charityControls.0.charity_gift_amt').updateValueAndValidity();
  }
  /**
   * if other relationship then this function helps to open up a text box
   * @param {string} value
   */
  handleChange(value: string): void {
    if (value === 'Other') {
      this.isOtherRelationship = true;
     // this.cashGiftForm.get('individualControls.0.other_relationship_string').setValidators([Validators.required]);
     // this.cashGiftForm.get('individualControls.0.other_relationship_string').updateValueAndValidity();
    } else {
      this.isOtherRelationship = false;
    }
  }

  /**
   * this function for get back to the main gift page
   */
  popUp(): void {
    const confirm1 = confirm('Are you sure you want to delete this gift?');
    if (confirm1) {
      window.location.reload();
    }
  }

  /**
   * this function delete the gift from database
   * @param {number} id
   */
  popUpDelete(id: number): void {
    this.ysgComponent.deleteGift(id);
    this.ysgComponent.changeViewState();
    this.editService.unsetData();
  }

  /**When the component is destroyed*/
  ngOnDestroy() {
    if (this.saveCashGiftDBSubscription !== undefined) {
      this.saveCashGiftDBSubscription.unsubscribe();
    }
  }
}
