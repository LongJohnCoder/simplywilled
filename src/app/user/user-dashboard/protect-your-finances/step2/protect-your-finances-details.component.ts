import { Component, OnInit } from '@angular/core';
import { ProtectYourFinancesService } from '../services/protect-your-finances.service';
import { platformBrowserDynamic } from '@angular/platform-browser-dynamic';
import { Router, ActivatedRoute, Route } from '@angular/router';
import { HttpErrorResponse } from '@angular/common/http';

import { UserAuthService } from '../../../user-auth/user-auth.service';
import { UserService } from '../../../user.service';
import { NgForm, Validators, FormGroup, FormBuilder, FormControl, FormArray } from '@angular/forms';
// import { ProtectYourFinances } from './models/protectYourFinances';
import { PYFAttorneyPowers } from '../models/pyf-attorney-powers';
import { ProtectYourFinanceDetails } from '../models/protect-your-finance-details';
import {Subscription} from 'rxjs/Subscription';

@Component({
  selector: 'app-protect-your-finances-details',
  templateUrl: './protect-your-finances-details.component.html',
  styleUrls: ['./protect-your-finances-details.component.css']
})
export class ProtectYourFinancesDetailsComponent implements OnInit {
  public poaDetailsForm: FormGroup;
  public response: any;
  public relationshipOtherHolder: number;
  public relationshipOtherBackup: number;
  accessToken: string;
  isInformSubscription: Subscription;
  isBackupAttorneySubscription: Subscription;
  isBackupInformSubscription: Subscription;

  constructor(
    private protectYourFinancesService: ProtectYourFinancesService,
    private fb: FormBuilder,
    private authService: UserAuthService,
    private userService: UserService,
    private router: Router
  ) {
    this.accessToken = this.parseToken();
    this.createForm();
  }

  ngOnInit() {
    this.getPoaDetailsData();
    this.addConditionalValidators();
  }

  /**Checks for authorization user id.*/
  parseToken() {
    if (JSON.parse(localStorage.getItem('loggedInUser')).hasOwnProperty('token')) {
      return JSON.parse(localStorage.getItem('loggedInUser')).token;
    }
    return null;
  }
  /**
   * get the power of attorney details in a json object
   */
  getPoaDetailsData(): void {
    this.protectYourFinancesService.getPoaDetails(this.accessToken).subscribe(
      (response: any) => {
        this.response = response.data;
        let poaDetailsHolders = response.data !== null ? JSON.parse(this.response.attorney_holders) : null;
        let poaDetailsBackup  = response.data !== null ? JSON.parse(this.response.attorney_backup) : null;
        let isBackupattorney  = response.data !== null ?  parseInt(this.response.is_backupattorney, 10) : 0;
        this.createForm(poaDetailsHolders, poaDetailsBackup, isBackupattorney);
      },
      (error: any) => {
        console.log('error in protectYourFinancesService: ', error);
      }
    );
  }

  /**
   * @param dt as a data array
   * @param dtBackup as a data array backup
   * creates the form structure of the html with the data comming from poaData
   * returns void
   */
  createForm(dt: ProtectYourFinanceDetails = null , dtBackup: ProtectYourFinanceDetails = null , isBackupattorney = 0) {
    const formObj = dt !== undefined ? dt : null;
    const formObjBackup = dtBackup !== undefined ? dtBackup : null;
    this.poaDetailsForm = this.fb.group({
     /* is_backupattorney: new FormControl(isBackupattorney !== undefined && isBackupattorney !== null ? isBackupattorney : 0),
      is_inform           : new FormControl(formObj !== undefined && formObj !== null && formObj.is_inform !== undefined
                            ? formObj.is_inform : 0, [
                              Validators.required
                            ]),
      email               : new FormControl(formObj !== undefined && formObj !== null && formObj.email !== undefined
                            ? formObj.email : ''),
      phone               : new FormControl(formObj !== undefined && formObj !== null && formObj.phone !== undefined
                            ? formObj.phone : '', [Validators.required]),
      address             : new FormControl(formObj !== undefined && formObj !== null && formObj.address !== undefined
                            ? formObj.address : ''),
      fullname            : new FormControl(formObj !== undefined && formObj !== null && formObj.fullname !== undefined
                            ? formObj.fullname : ''),
      relationship        : new FormControl(formObj !== undefined && formObj !== null && formObj.relationship !== undefined
                            ? formObj.relationship : ''),
      other_relationship  : new FormControl(formObj !== undefined && formObj !== null && formObj.other_relationship !== undefined
                            ? formObj.other_relationship : ''),
      backup_is_inform    : new FormControl(formObjBackup !== undefined && formObjBackup !== null && formObjBackup.is_inform !== undefined
                                ? formObjBackup.is_inform : 0),
      backup_email        : new FormControl(formObjBackup !== undefined && formObjBackup !== null && formObjBackup.email !== undefined
                                ? formObjBackup.email : ''),
      backup_phone        : new FormControl(formObjBackup !== undefined && formObjBackup !== null && formObjBackup.phone !== undefined
                                ? formObjBackup.phone : ''),
      backup_address      : new FormControl(formObjBackup !== undefined && formObjBackup !== null && formObjBackup.address !== undefined
                                ? formObjBackup.address : ''),
      backup_fullname     : new FormControl(formObjBackup !== undefined && formObjBackup !== null && formObjBackup.fullname !== undefined
                                ? formObjBackup.fullname : ''),
      backup_relationship : new FormControl(formObjBackup !== undefined && formObjBackup !== null && formObjBackup.relationship !== undefined
                                ? formObjBackup.relationship : ''),
      backup_other_relationship  : new FormControl(formObjBackup !== undefined && formObjBackup !== null && formObjBackup.other_relationship !== undefined
                                ? formObjBackup.other_relationship : ''),*/
      is_backupattorney: new FormControl( 0),
      is_inform           : new FormControl(0, [
        Validators.required
      ]),
      email               : new FormControl(''),
      phone               : new FormControl('', [Validators.required, Validators.minLength(10)]),
      address             : new FormControl('', [Validators.required]),
      fullname            : new FormControl('', [Validators.required, Validators.pattern(/\s/ )]),
      relationship        : new FormControl(''),
      other_relationship  : new FormControl(''),
      backup_is_inform    : new FormControl(0),
      backup_email        : new FormControl(''),
      backup_phone        : new FormControl(''),
      backup_address      : new FormControl(''),
      backup_fullname     : new FormControl(''),
      backup_relationship : new FormControl(''),
      backup_other_relationship  : new FormControl(''),
    });
  }

  /**Set dynamic validations*/
  addConditionalValidators() {
    this.isInformSubscription = this.poaDetailsForm.get('is_inform').valueChanges.subscribe(
      (is_inform: number) => {
        switch (is_inform) {
          case 0:   if (this.poaDetailsForm.get('is_backupattorney').value === 1) {
                      this.clearValidationFor([
                        'email', 'backup_phone', 'backup_fullname', 'backup_address', 'backup_email'
                      ]);
                    } else {
                      this.clearValidationFor([
                        'email'
                      ]);
                    }
                   break;
          case 1:  this.poaDetailsForm.get('email').setValidators([Validators.required, Validators.email]);
                   this.poaDetailsForm.get('email').updateValueAndValidity();
                   break;
          default: this.clearValidationFor([
                    'email', 'backup_phone', 'backup_fullname', 'backup_address', 'backup_email'
                  ]);
                   break;
        }
      }
    );

    this.isBackupAttorneySubscription = this.poaDetailsForm.get('is_backupattorney').valueChanges.subscribe(
      (is_backupattorney: number) => {
        switch (is_backupattorney) {
          case 0:   this.clearValidationFor([
                       'backup_phone', 'backup_fullname', 'backup_address', 'backup_email'
                    ]);
                    break;
          case 1:   this.poaDetailsForm.get('backup_phone').setValidators([Validators.required, Validators.minLength(10)]);
                    this.poaDetailsForm.get('backup_address').setValidators([Validators.required]);
                    this.poaDetailsForm.get('backup_fullname').setValidators([Validators.required, Validators.pattern(/\s/ )]);
                    this.poaDetailsForm.get('backup_phone').updateValueAndValidity();
                    this.poaDetailsForm.get('backup_address').updateValueAndValidity();
                    this.poaDetailsForm.get('backup_fullname').updateValueAndValidity();
                    break;
          default:  this.clearValidationFor([
                      'backup_phone', 'backup_fullname', 'backup_address', 'backup_email'
                    ]);
                    break;
        }
      }
    );

    this.isBackupInformSubscription = this.poaDetailsForm.get('backup_is_inform').valueChanges.subscribe(
      (backup_is_inform: number) => {
        switch (backup_is_inform) {
          case 0:  this.clearValidationFor([
                      'backup_email'
                    ]);
                   break;
          case 1:  this.poaDetailsForm.get('backup_email').setValidators([Validators.required, Validators.email]);
                   this.poaDetailsForm.get('backup_email').updateValueAndValidity();
                   break;
          default: this.clearValidationFor([
                     'backup_email'
                   ]);
                   break;
        }
      }
    );
  }

  /**Clears validation except certain fields*/
  clearValidationFor(formControlArray: Array<string> = []) {
    formControlArray.forEach(control => {
      this.poaDetailsForm.get(control).clearValidators();
      this.poaDetailsForm.get(control).updateValueAndValidity();
    });
  }

  /**
   * @param field : field name
   * @param relationship : relationship name
   * sets form relationship value with the option value that comes
   */
  relationshipChange(field, relationship) {
    this.poaDetailsForm.get(field).setValue(relationship);
  }

  /**
   * sends the data to the server
   */
  send() {
    console.log('type : ', typeof JSON.parse(this.response.attorney_powers));
    this.response.is_backupattorney = this.poaDetailsForm.get('is_backupattorney').value;
    this.response.attorney_holders = this.poaDetailsForm.get('attorney_holders').value;
    this.response.attorney_backup = this.poaDetailsForm.get('attorney_backup').value;
    this.response.attorney_powers = JSON.parse(this.response.attorney_powers);
    this.protectYourFinancesService.postPoaDetails(this.accessToken, this.response).subscribe(
      (data) => {
        this.router.navigate(['/dashboard']);
      }, (error) => {

      }
    );
  }

  /**
   * @param field change yes no fields
   * @param newValue this new value gets inserted
   */
  changeMe(field, newValue) {
    this.poaDetailsForm.get(field).setValue(parseInt(newValue, 10));
  }
}
