import {Component, Input, OnInit, ViewChild} from '@angular/core';
import {FormArray, FormBuilder, FormGroup, Validators} from '@angular/forms';
import {RealPropertyService} from '../services/real-property.service';
import {Observable} from 'rxjs/Observable';
import {SaveRealProperty} from '../models/saveRealProperty';
import {YourSpecificGiftService} from '../services/your-specific-gift.service';
import {EditGiftService} from '../services/edit-gift.service';
import {MyGifts} from '../models/myGifts';
import {YourSpecificGiftComponent} from '../your-specific-gift.component';

@Component({
  selector: 'app-real-property',
  templateUrl: './real-property.component.html',
  styleUrls: ['./real-property.component.css']
})
export class RealPropertyComponent implements OnInit {
  @Input() giftCount: any;
  @ViewChild(YourSpecificGiftComponent) YourSpecificGiftComponent: YourSpecificGiftComponent;
  isIndividualRP: boolean;
  isCharityRP: boolean;
  singleBeneficiaryRP: boolean;
  multipleBeneficiaryRP: boolean;
  otherRelationshipRp: boolean;
  toTheirIssue: boolean;
  isSomeoneElse: boolean;
  otherRelationshipRpSomeOneElse: boolean;
  toTheirIssueMB: boolean;
  isSomeoneElseMB: boolean;
  otherRelationshipRpSomeOneElseMB: boolean;
  isSomeoneElseMBChild: boolean;
  realPropertyForm: FormGroup;
  access_token: string;
  myUserId: number;
  userDataResponse: Observable<any>;
  errFlag: boolean;
  errString: string;
  realPropertyDataSet: any;
  saveRealPropertyDB: Observable<any>;
  isEdit: boolean;
  formEditDataSet: MyGifts;
  parsedDataSet: any;
  myArray: FormArray;
  constructor(private fb: FormBuilder, private rpService: RealPropertyService, private ysgService: YourSpecificGiftService, private editService: EditGiftService, private ysgComponent: YourSpecificGiftComponent) { this.createForm(); }

  ngOnInit() {
    this.isIndividualRP = false;
    this.isCharityRP = false;
    this.singleBeneficiaryRP = false;
    this.multipleBeneficiaryRP = false;
    this.otherRelationshipRp = false;
    this.toTheirIssue = false;
    this.isSomeoneElse = false;
    this.otherRelationshipRpSomeOneElse = false;
    this.toTheirIssueMB = false;
    this.isSomeoneElseMB = false;
    this.otherRelationshipRpSomeOneElseMB = false;
    this.isSomeoneElseMBChild = false;
    this.access_token = null;
    this.myUserId = 0;
    this.errFlag = false;
    this.errString = null;
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
  toggleRelationship(event: any): void {
    if (this.isIndividualRP && this.singleBeneficiaryRP) {
      if (event.target.value === 'Other') {
        this.otherRelationshipRp = true;
      } else {
        this.otherRelationshipRp = false;
      }
    }
  }

  /**
   * this function is used for creating the reactive form
   * @returns {any}
   */
  createForm(): any {
    this.realPropertyForm = this.fb.group({
      'primary_residence': [null, Validators.required],
      'street_address': [null, Validators.required],
      'city': [null, Validators.required],
      'state': [null, Validators.required],
      'free_clear_mortgage': [null, Validators.required],
      'gift_type': [null, Validators.required],
      charityControls: this.fb.array([
        this.fb.group({
          'organization_name': [''],
          'organization_address': ['']
        })
      ]),
      individualControls: this.fb.array([
        this.fb.group({
          'beneficiary': [''],
          singleBeneficiaryControls: this.fb.array([
            this.fb.group({
              'full_legal_name': [''],
              'relationship_single_b_parent': [''],
              'relationship_single_b_parent_other': [''],
              'single_beneficiary_gender': [''],
              'property_distributed_single_beneficiary': [''],
              'issue_survival': [''],
              'issue_survival_full_name': [''],
              'issue_survival_relationship': [''],
              'issue_survival_other_relationship': ['']
            })
          ]),
          multipleBeneficiaryControls: this.fb.array([
            this.fb.group({
              'itemRows': this.fb.array([this.initItemRows()]),
              'property_distributed_multiple_beneficiary': [''],
              'issue_survival_mb': [''],
              'individual_name': [''],
              'relationship_mb': [''],
              'other_relationship_mb': ['']
            })
          ])
        })
      ])
    });
  }

  /**
   * this function sets the data while edit
   */
  setFormData(): void {
    if (this.editService.getData()) {
      if (Object.keys(this.editService.getData()).length) {
       this.isEdit = true;
       // console.log(this.editService.getData());
       this.formEditDataSet = this.editService.getData();
       this.parsedDataSet = JSON.parse(this.formEditDataSet.property_details)[0];
       // console.log(this.parsedDataSet);
        this.realPropertyForm.controls['primary_residence'].setValue(this.parsedDataSet.primary_residence);
        this.realPropertyForm.controls['street_address'].setValue(this.parsedDataSet.street_address);
        this.realPropertyForm.controls['city'].setValue(this.parsedDataSet.city);
        this.realPropertyForm.controls['state'].setValue(this.parsedDataSet.state);
        this.realPropertyForm.controls['free_clear_mortgage'].setValue(this.parsedDataSet.free_clear_mortgage);
        this.realPropertyForm.controls['gift_type'].setValue(this.parsedDataSet.gift_to);
       if (this.parsedDataSet.gift_to === 'Individual') {
         // Individual
         this.isIndividualRP = true;
         this.isCharityRP = false;
         this.realPropertyForm.get('individualControls.0.beneficiary').setValue(this.parsedDataSet.beneficiary);
         if (this.parsedDataSet.beneficiary === 'single_beneficiary') {
           // single beneficiary
           this.singleBeneficiaryRP = true;
           this.multipleBeneficiaryRP = false;
           this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.full_legal_name').setValue(this.parsedDataSet.singleBeneficiaryControls[0].full_legal_name);

           this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.relationship_single_b_parent').setValue(this.parsedDataSet.singleBeneficiaryControls[0].relationship_single_b_parent);

            // normal relationship other relationship
           if (this.parsedDataSet.singleBeneficiaryControls[0].relationship_single_b_parent === 'Other') {
             this.otherRelationshipRp = true;
             this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.relationship_single_b_parent_other').setValue(this.parsedDataSet.singleBeneficiaryControls[0].relationship_single_b_parent_other);
           } else {
             this.otherRelationshipRp = false;
           }
           this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.single_beneficiary_gender').setValue(this.parsedDataSet.singleBeneficiaryControls[0].single_beneficiary_gender);
           this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.property_distributed_single_beneficiary').setValue(this.parsedDataSet.singleBeneficiaryControls[0].property_distributed_single_beneficiary);
           if (this.parsedDataSet.singleBeneficiaryControls[0].property_distributed_single_beneficiary === 'to_their_issue') {
             // to their issue
             this.toTheirIssue = true;
             this.isSomeoneElse = false;
             this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.issue_survival').setValue(this.parsedDataSet.singleBeneficiaryControls[0].issue_survival);
           } else if (this.parsedDataSet.singleBeneficiaryControls[0].property_distributed_single_beneficiary === 'residue_of_estate') {
             // residue of estate
             this.toTheirIssue = false;
             this.isSomeoneElse = false;
           } else {
              // to someone else
             this.toTheirIssue = false;
             this.isSomeoneElse = true;
             this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.issue_survival_full_name').setValue(this.parsedDataSet.singleBeneficiaryControls[0].issue_survival_full_name);
             this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.issue_survival_relationship').setValue(this.parsedDataSet.singleBeneficiaryControls[0].issue_survival_relationship);
             if (this.parsedDataSet.singleBeneficiaryControls[0].issue_survival_relationship === 'Other') {
               // other relationship
               this.otherRelationshipRpSomeOneElse = true;
               this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.issue_survival_other_relationship').setValue(this.parsedDataSet.singleBeneficiaryControls[0].issue_survival_other_relationship);
             } else {
               this.otherRelationshipRpSomeOneElse = false;
             }
           }
         } else {
           // multiple beneficiary
           this.singleBeneficiaryRP = false;
           this.multipleBeneficiaryRP = true;
           this.myArray = this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.itemRows') as FormArray;
           this.clearFormArray(this.myArray);
           for (let i = 0; i < this.parsedDataSet.multipleBeneficiaryControls[0].itemRows.length; i++) {
             this.addLineItems(this.parsedDataSet.multipleBeneficiaryControls[0].itemRows[i]);
           }
           this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.property_distributed_multiple_beneficiary').setValue(this.parsedDataSet.multipleBeneficiaryControls[0].property_distributed_multiple_beneficiary);
           // check condition
           if (this.parsedDataSet.multipleBeneficiaryControls[0].property_distributed_multiple_beneficiary === 'to_the_surviving') {
              // to the surviving
             this.toTheirIssueMB = false;
             this.isSomeoneElseMB = false;
           } else if (this.parsedDataSet.multipleBeneficiaryControls[0].property_distributed_multiple_beneficiary === 'to_their_issue_mb') {
             // to their issue
             this.toTheirIssueMB = true;
             this.isSomeoneElseMB = false;
             this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.issue_survival_mb').setValue(this.parsedDataSet.multipleBeneficiaryControls[0].issue_survival_mb);
             // condition
             if (this.parsedDataSet.multipleBeneficiaryControls[0].issue_survival_mb === 'residue_of_estate') {
                // residue of estate
               this.isSomeoneElseMB = false;
             } else {
                // someone else
               this.isSomeoneElseMB = true;
               this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.individual_name').setValue(this.parsedDataSet.multipleBeneficiaryControls[0].individual_name);
               this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.relationship_mb').setValue(this.parsedDataSet.multipleBeneficiaryControls[0].relationship_mb);
               // condition for other
               if (this.parsedDataSet.multipleBeneficiaryControls[0].relationship_mb === 'Other') {
                 this.otherRelationshipRpSomeOneElseMB = true;
                 this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.other_relationship_mb').setValue(this.parsedDataSet.multipleBeneficiaryControls[0].other_relationship_mb);
               } else {
                 this.otherRelationshipRpSomeOneElseMB = false;
               }
             }
           } else if (this.parsedDataSet.multipleBeneficiaryControls[0].property_distributed_multiple_beneficiary === 'residue_of_estate_mb') {
             // residue of estate
             this.toTheirIssueMB = false;
             this.isSomeoneElseMB = false;
           } else {
             // to someone else
             this.toTheirIssueMB = false;
             this.isSomeoneElseMB = true;
             this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.individual_name').setValue(this.parsedDataSet.multipleBeneficiaryControls[0].individual_name);
             this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.relationship_mb').setValue(this.parsedDataSet.multipleBeneficiaryControls[0].relationship_mb);
             // condition for other
             if (this.parsedDataSet.multipleBeneficiaryControls[0].relationship_mb === 'Other') {
               this.otherRelationshipRpSomeOneElseMB = true;
               this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.other_relationship_mb').setValue(this.parsedDataSet.multipleBeneficiaryControls[0].other_relationship_mb);
             } else {
               this.otherRelationshipRpSomeOneElseMB = false;
             }
           }
         }
       } else {
         // charity
         this.isIndividualRP = false;
         this.isCharityRP = true;
         this.realPropertyForm.get('charityControls.0.organization_name').setValue(this.parsedDataSet.organization_name);
         this.realPropertyForm.get('charityControls.0.organization_address').setValue(this.parsedDataSet.organization_address);
       }
      }
    }
  }

  /**
   * this function patch the value to address fields
   * @param {boolean} identifier
   */
  getUsrData(identifier: boolean): void {
    if (identifier) {
      if (this.access_token && this.myUserId) {
        this.userDataResponse = this.rpService.fetchUserData(this.access_token, this.myUserId);
        this.userDataResponse.subscribe(data => {
            if (data.status === 200) {
              if (data.data[0].data !== null) {
                if (data.data[0].data.hasOwnProperty('userInfo')) {
                  this.realPropertyForm.patchValue({
                    'street_address' : data.data[0].data.userInfo.address,
                    'city' : data.data[0].data.userInfo.city,
                    'state' : data.data[0].data.userInfo.state
                  });
                } else {
                  this.errFlag = true;
                  this.errString = 'Something went wrong could not be able to find User Info';
                  console.log(this.errString);
                }
              } else {
                this.errFlag = true;
                this.errString = 'Please fill the tell us about you form!';
                console.log(this.errString);
              }
            } else {
              this.errFlag = true;
              this.errString = 'Something went wrong while fetching the information. Please try again later!';
              console.log(this.errString);
            }
          },
          error => {
            this.errFlag = true;
            this.errString = error.error.message;
            console.log(this.errString);
          },
          () => {});
      } else {
        this.errFlag = true;
        this.errString = 'Please login to continue!';
        console.log(this.errString);
      }
    } else {
      this.realPropertyForm.patchValue({
        'street_address' : '',
        'city' : '',
        'state' : ''
      });
    }
  }
  /**
   * this function decides wheather the gift for individual or charity
   * @param {string} identifier
   */
  showSectionInOrCh(identifier: string): void {
    if (identifier === 'IN') {
      // Individual
      this.isIndividualRP = true;
      this.isCharityRP = false;
      // remove validations for charity form
      this.realPropertyForm.get('charityControls.0.organization_name').setValidators([]);
      this.realPropertyForm.get('charityControls.0.organization_name').updateValueAndValidity();
      this.realPropertyForm.get('charityControls.0.organization_address').setValidators([]);
      this.realPropertyForm.get('charityControls.0.organization_address').updateValueAndValidity();
      this.realPropertyForm.get('individualControls.0.beneficiary').setValidators([Validators.required]);
      this.realPropertyForm.get('individualControls.0.beneficiary').updateValueAndValidity();
    } else {
      /// charity
      this.isIndividualRP = false;
      this.isCharityRP = true;
      this.singleBeneficiaryRP = false;
      this.multipleBeneficiaryRP = false;
      this.otherRelationshipRp = false;
      this.toTheirIssue = false;
      this.isSomeoneElse = false;
      this.toTheirIssueMB = false;
      this.isSomeoneElseMB = false;
      // set validations for charity form
      this.realPropertyForm.get('charityControls.0.organization_name').setValidators([Validators.required]);
      this.realPropertyForm.get('charityControls.0.organization_name').updateValueAndValidity();
      this.realPropertyForm.get('charityControls.0.organization_address').setValidators([Validators.required]);
      this.realPropertyForm.get('charityControls.0.organization_address').updateValueAndValidity();
      this.realPropertyForm.get('individualControls.0.beneficiary').setValidators([]);
      this.realPropertyForm.get('individualControls.0.beneficiary').updateValueAndValidity();
    }
  }

  /**
   * select between single beneficiary or multiple beneficiary according to the identifier
   * @param {string} identifier
   */
  beneficiaryToggle(identifier: string): void {
    if (this.isIndividualRP) {
      if (identifier === 'S') {
        this.singleBeneficiaryRP = true;
        this.multipleBeneficiaryRP = false;
        // set validations single beneficiary
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.full_legal_name').setValidators([Validators.required]);
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.full_legal_name').updateValueAndValidity();
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.relationship_single_b_parent').setValidators([Validators.required]);
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.relationship_single_b_parent').updateValueAndValidity();
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.single_beneficiary_gender').setValidators([Validators.required]);
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.single_beneficiary_gender').updateValueAndValidity();
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.property_distributed_single_beneficiary').setValidators([Validators.required]);
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.property_distributed_single_beneficiary').updateValueAndValidity();
        // remove multiple beneficiary validations
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.property_distributed_multiple_beneficiary').setValidators([]);
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.property_distributed_multiple_beneficiary').updateValueAndValidity();
      } else {
        this.singleBeneficiaryRP = false;
        this.multipleBeneficiaryRP = true;
        // remove validations single beneficiary
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.full_legal_name').setValidators([]);
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.full_legal_name').updateValueAndValidity();
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.relationship_single_b_parent').setValidators([]);
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.relationship_single_b_parent').updateValueAndValidity();
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.single_beneficiary_gender').setValidators([]);
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.single_beneficiary_gender').updateValueAndValidity();
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.property_distributed_single_beneficiary').setValidators([]);
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.property_distributed_single_beneficiary').updateValueAndValidity();
        // multiple beneficiary validations
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.property_distributed_multiple_beneficiary').setValidators([Validators.required]);
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.property_distributed_multiple_beneficiary').updateValueAndValidity();
      }
    }
  }

  /**
   * this function helps to show option according to property distribution
   * @param identifier
   */
  propertyDistibutionToggle(identifier: any): void {
    if (this.isIndividualRP && this.singleBeneficiaryRP) {
      if (identifier === 'TTI') {
        this.toTheirIssue = true;
        this.isSomeoneElse = false;
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.issue_survival').setValidators([Validators.required]);
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.issue_survival').updateValueAndValidity();
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.issue_survival_full_name').setValidators([]);
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.issue_survival_full_name').updateValueAndValidity();
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.issue_survival_relationship').setValidators([]);
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.issue_survival_relationship').updateValueAndValidity();
      } else if (identifier === 'RE') {
        this.toTheirIssue = false;
        this.isSomeoneElse = false;
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.issue_survival').setValidators([]);
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.issue_survival').updateValueAndValidity();
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.issue_survival_full_name').setValidators([]);
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.issue_survival_full_name').updateValueAndValidity();
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.issue_survival_relationship').setValidators([]);
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.issue_survival_relationship').updateValueAndValidity();
      } else {
        this.toTheirIssue = false;
        this.isSomeoneElse = true;
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.issue_survival').setValidators([]);
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.issue_survival').updateValueAndValidity();
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.issue_survival_full_name').setValidators([Validators.required]);
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.issue_survival_full_name').updateValueAndValidity();
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.issue_survival_relationship').setValidators([Validators.required]);
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.issue_survival_relationship').updateValueAndValidity();
      }
    }
  }

  /**
   * this function helps to show child data in property distribution
   * @param identifier
   */
  propertyDistibutionToggleChild(identifier: any): void {
    if (this.isIndividualRP && this.singleBeneficiaryRP) {
      if (identifier === 'TSE') {
        this.isSomeoneElse = true;
      } else {
        this.isSomeoneElse = false;
      }
    }
  }
  /**
   * this function toggles between relationship someone else in case of issue survival
   * @param event
   */
  toggleRelationshipSomeOneElse(event: any): void {
    if (this.isIndividualRP && this.singleBeneficiaryRP) {
      if (event.target.value === 'Other') {
        this.otherRelationshipRpSomeOneElse = true;
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.issue_survival_other_relationship').setValidators([Validators.required]);
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.issue_survival_other_relationship').updateValueAndValidity();
      } else {
        this.otherRelationshipRpSomeOneElse = false;
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.issue_survival_other_relationship').setValidators([]);
        this.realPropertyForm.get('individualControls.0.singleBeneficiaryControls.0.issue_survival_other_relationship').updateValueAndValidity();
      }
    }
  }

  /**
   * this function saves data in database
   * @param fd
   */
  saveRealProperty(fd): void {
    if (this.access_token) {
      if (fd.gift_type === 'Individual') {
        // individual
        fd.individualControls[0].gift_to = fd.gift_type;
        fd.individualControls[0].primary_residence = fd.primary_residence;
        fd.individualControls[0].street_address = fd.street_address;
        fd.individualControls[0].city = fd.city;
        fd.individualControls[0].state = fd.state;
        fd.individualControls[0].primary_residence = fd.primary_residence;
        fd.individualControls[0].free_clear_mortgage = fd.free_clear_mortgage;
        if (this.isEdit) {
          this.realPropertyDataSet = {'id': this.editService.getData().id, 'step': 7, 'user_id': this.myUserId, 'giftType': 2, 'giftData': fd.individualControls};
        } else {
          this.realPropertyDataSet = {'step': 7, 'user_id': this.myUserId, 'giftType': 2, 'giftData': fd.individualControls};
        }
      } else {
        // charity
        fd.charityControls[0].gift_to = fd.gift_type;
        fd.charityControls[0].primary_residence = fd.primary_residence;
        fd.charityControls[0].street_address = fd.street_address;
        fd.charityControls[0].city = fd.city;
        fd.charityControls[0].state = fd.state;
        fd.charityControls[0].primary_residence = fd.primary_residence;
        fd.charityControls[0].free_clear_mortgage = fd.free_clear_mortgage;
        if (this.isEdit) {
          this.realPropertyDataSet = {'id': this.editService.getData().id, 'step': 7, 'user_id': this.myUserId, 'giftType': 2 , 'giftData': fd.charityControls};
        } else {
          this.realPropertyDataSet = {'step': 7, 'user_id': this.myUserId, 'giftType': 2 , 'giftData': fd.charityControls};
        }
      }
      if (this.isEdit) {
        this.saveRealPropertyDB = this.ysgService.updateGift(this.access_token, this.realPropertyDataSet);
      } else {
        this.saveRealPropertyDB = this.ysgService.saveRealPropertyData(this.access_token, this.realPropertyDataSet);
      }
       this.saveRealPropertyDB.subscribe(data => {
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
  }

  /**
   * this function add multiple beneficiary line items
   */
  addLineItems(i = null): void {
    const control = <FormArray>this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.itemRows');
    control.push(this.initItemRows(i));
  }

  /**
   * this helper function add line item controls
   * @returns {FormGroup}
   */
  initItemRows(i = null) {
    return this.fb.group({
      // list all your form controls here, which belongs to your form array
      'full_legal_name_l_item': [i === null ? '' : i.full_legal_name_l_item],
      'relationship_l_item': [i === null ? '' : i.relationship_l_item]
    });
  }

  /**
   * to get rid of that extra field while update
   * @param {FormArray} formArray
   */
  clearFormArray(formArray: FormArray) {
    while (formArray.length !== 0) {
      formArray.removeAt(0);
    }
  }
  /**
   *this function removes the control
   * @param {number} index
   */
  deleteRow(index: number) {
    // control refers to your formarray
    const control = <FormArray>this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.itemRows');
    // remove the chosen row
    control.removeAt(index);
  }

  /**
   * for multiple beneficiary this function shows the controls
   * @param {string} identifier
   * @returns {any}
   */
  propertyDistributionToggleMB(identifier: string): any {
    if (this.isIndividualRP && this.multipleBeneficiaryRP) {
      if (identifier === 'TTI') {
        this.toTheirIssueMB = true;
        this.isSomeoneElseMB = false;
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.issue_survival_mb').setValidators([Validators.required]);
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.issue_survival_mb').updateValueAndValidity();
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.individual_name').setValidators([]);
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.individual_name').updateValueAndValidity();
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.relationship_mb').setValidators([]);
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.relationship_mb').updateValueAndValidity();
      } else if (identifier === 'TSE') {
        this.toTheirIssueMB = false;
        this.isSomeoneElseMB = true;
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.issue_survival_mb').setValidators([]);
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.issue_survival_mb').updateValueAndValidity();
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.individual_name').setValidators([Validators.required]);
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.individual_name').updateValueAndValidity();
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.relationship_mb').setValidators([Validators.required]);
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.relationship_mb').updateValueAndValidity();
      } else if (identifier === 'TTS') {
        this.toTheirIssueMB = false;
        this.isSomeoneElseMB = false;
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.issue_survival_mb').setValidators([]);
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.issue_survival_mb').updateValueAndValidity();
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.individual_name').setValidators([]);
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.individual_name').updateValueAndValidity();
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.relationship_mb').setValidators([]);
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.relationship_mb').updateValueAndValidity();
      } else {
        this.toTheirIssueMB = false;
        this.isSomeoneElseMB = false;
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.issue_survival_mb').setValidators([]);
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.issue_survival_mb').updateValueAndValidity();
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.individual_name').setValidators([]);
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.individual_name').updateValueAndValidity();
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.relationship_mb').setValidators([]);
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.relationship_mb').updateValueAndValidity();
      }
    }
  }

  /**
   * this function toggles relationship in multiple beneficiary parent
   * @param event
   */
  toggleRelationshipSomeOneElseMB(event: any): void {
    if (this.isIndividualRP && this.multipleBeneficiaryRP) {
      if (event.target.value === 'Other') {
        this.otherRelationshipRpSomeOneElseMB = true;
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.other_relationship_mb').setValidators([Validators.required]);
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.other_relationship_mb').updateValueAndValidity();
      } else {
        this.otherRelationshipRpSomeOneElseMB = false;
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.other_relationship_mb').setValidators([]);
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.other_relationship_mb').updateValueAndValidity();
      }
    }
  }
  /**
   * this function toggles relationship in multiple beneficiary child
   * @param event
   */
  toggleRelationshipSomeOneElseMBChild(event: any): void {
    if (this.isIndividualRP && this.multipleBeneficiaryRP) {
      if (event.target.value === 'Other') {
        this.otherRelationshipRpSomeOneElseMB = true;
      } else {
        this.otherRelationshipRpSomeOneElseMB = false;
      }
    }
  }
  propertyDistibutionToggleChildMB(identifier: any): void {
    if (this.isIndividualRP && this.multipleBeneficiaryRP) {
      if (identifier === 'TSE') {
        // this.isSomeoneElseMBChild = true;
        this.isSomeoneElseMB = true;
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.individual_name').setValidators([Validators.required]);
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.individual_name').updateValueAndValidity();
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.relationship_mb').setValidators([Validators.required]);
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.relationship_mb').updateValueAndValidity();
      } else {
        // this.isSomeoneElseMBChild = false;
        this.isSomeoneElseMB = false;
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.individual_name').setValidators([]);
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.individual_name').updateValueAndValidity();
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.relationship_mb').setValidators([]);
        this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.relationship_mb').updateValueAndValidity();
      }
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
}
