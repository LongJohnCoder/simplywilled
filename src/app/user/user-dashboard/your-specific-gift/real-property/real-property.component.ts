import {Component, Input, OnInit} from '@angular/core';
import {FormArray, FormBuilder, FormGroup, Validators} from '@angular/forms';
import {RealPropertyService} from '../services/real-property.service';
import {Observable} from 'rxjs/Observable';

@Component({
  selector: 'app-real-property',
  templateUrl: './real-property.component.html',
  styleUrls: ['./real-property.component.css']
})
export class RealPropertyComponent implements OnInit {
  @Input() giftCount: any;
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
  constructor(private fb: FormBuilder, private rpService: RealPropertyService) { this.createForm(); }

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
    if (JSON.parse(localStorage.getItem('loggedInUser')).hasOwnProperty('token')) {
      this.access_token = JSON.parse(localStorage.getItem('loggedInUser')).token;
      this.myUserId = JSON.parse(localStorage.getItem('loggedInUser')).user.id;
    } else {
      this.access_token = '';
    }
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
  saveRealProperty(fd): void {
    console.log(fd);
  }

  /**
   * this function add multiple beneficiary line items
   */
  addLineItems(): void {
    const control = <FormArray>this.realPropertyForm.get('individualControls.0.multipleBeneficiaryControls.0.itemRows');
    control.push(this.initItemRows());
  }

  /**
   * this helper function add line item controls
   * @returns {FormGroup}
   */
  initItemRows() {
    return this.fb.group({
      // list all your form controls here, which belongs to your form array
      'full_legal_name_l_item': [''],
      'relationship_l_item': ['']
    });
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
}
