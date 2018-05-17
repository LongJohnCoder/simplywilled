import {Component, Input, OnInit} from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import {Router} from '@angular/router';

@Component({
  selector: 'app-cash-gift',
  templateUrl: './cash-gift.component.html',
  styleUrls: ['./cash-gift.component.css']
})
export class CashGiftComponent implements OnInit {
  @Input() giftCount: any;
  isIndividual: boolean;
  isCharity: boolean;
  isOtherRelationship: boolean;
  cashGiftForm: FormGroup;
  constructor(private fb: FormBuilder, private router: Router) { this.createForm();}
  ngOnInit() {
    this.isIndividual = false;
    this.isCharity = false;
    this.isOtherRelationship = false;
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
            'b_gender': [''],
            'passed_by': ['']
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
  saveCashGift(fd): void {
    console.log(fd);
  }

  /**
   * this function show childs of form according to individual or charity
   * @param {string} identifier
   */
  showChild(identifier: string): void {
    if (identifier === 'IN') {
      this.isIndividual = true;
      this.isCharity = false;
      this.cashGiftForm.get('individualControls.0.full_legal_name').setValidators([Validators.required]);
      this.cashGiftForm.get('individualControls.0.full_legal_name').updateValueAndValidity();
      this.cashGiftForm.get('individualControls.0.relationship').setValidators([Validators.required]);
      this.cashGiftForm.get('individualControls.0.relationship').updateValueAndValidity();
      this.cashGiftForm.get('individualControls.0.gift_amt').setValidators([Validators.required]);
      this.cashGiftForm.get('individualControls.0.gift_amt').updateValueAndValidity();
      this.cashGiftForm.get('individualControls.0.b_gender').setValidators([Validators.required]);
      this.cashGiftForm.get('individualControls.0.b_gender').updateValueAndValidity();
      this.cashGiftForm.get('individualControls.0.passed_by').setValidators([Validators.required]);
      this.cashGiftForm.get('individualControls.0.passed_by').updateValueAndValidity();
    } else {
      this.isCharity = true;
      this.isIndividual = false;
      this.cashGiftForm.get('charityControls.0.organization_name').setValidators([Validators.required]);
      this.cashGiftForm.get('charityControls.0.organization_name').updateValueAndValidity();
      this.cashGiftForm.get('charityControls.0.organization_address').setValidators([Validators.required]);
      this.cashGiftForm.get('charityControls.0.organization_address').updateValueAndValidity();
      this.cashGiftForm.get('charityControls.0.charity_gift_amt').setValidators([Validators.required]);
      this.cashGiftForm.get('charityControls.0.charity_gift_amt').updateValueAndValidity();
    }
  }

  /**
   * if other relationship then this function helps to open up a text box
   * @param {string} value
   */
  handleChange(value: string): void {
    if (value === 'Other') {
      this.isOtherRelationship = true;
      this.cashGiftForm.get('individualControls.0.other_relationship_string').setValidators([Validators.required]);
      this.cashGiftForm.get('individualControls.0.other_relationship_string').updateValueAndValidity();
    } else {
      this.isOtherRelationship = false;
    }
  }
}
