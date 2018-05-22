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

  constructor(
    private protectYourFinancesService: ProtectYourFinancesService,
    private fb: FormBuilder,
    private authService: UserAuthService,
    private userService: UserService,
    private router: Router
  ) {
    this.createForm();
  }

  ngOnInit() {
    this.getPoaDetailsData();
  }

  /**
   * get the power of attorney details in a json object
   */
  getPoaDetailsData(): void {
    this.protectYourFinancesService.getPoaDetails().subscribe(
      (response: any) => {
        this.response = response.data;
        const poaDetailsHolders = JSON.parse(this.response.attorney_holders);
        const poaDetailsBackup = JSON.parse(this.response.attorney_backup);
        const isBackupattorney = parseInt(this.response.is_backupattorney, 10);
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
  createForm(dt: ProtectYourFinanceDetails = null , dtBackup: ProtectYourFinanceDetails = null , isBackupattorney: number = null): void {
    const formObj = dt !== undefined ? dt : null;
    const formObjBackup = dtBackup !== undefined ? dtBackup : null;

    this.poaDetailsForm = this.fb.group({
      is_backupattorney: new FormControl(isBackupattorney !== undefined && isBackupattorney !== null ? isBackupattorney : 0),
          attorney_holders : this.fb.group({
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
          }),
          // this data is required if is_backupattorney is 1
          attorney_backup : this.fb.group({
              // tslint:disable-next-line:max-line-length
              is_inform           : new FormControl(formObjBackup !== undefined && formObjBackup !== null && formObjBackup.is_inform !== undefined
                                    ? formObjBackup.is_inform : 0),
              // tslint:disable-next-line:max-line-length
              email               : new FormControl(formObjBackup !== undefined && formObjBackup !== null && formObjBackup.email !== undefined
                                    ? formObjBackup.email : ''),

              // tslint:disable-next-line:max-line-length
              phone               : new FormControl(formObjBackup !== undefined && formObjBackup !== null && formObjBackup.phone !== undefined
                                    ? formObjBackup.phone : ''),
              // tslint:disable-next-line:max-line-length
              address             : new FormControl(formObjBackup !== undefined && formObjBackup !== null && formObjBackup.address !== undefined
                                    ? formObjBackup.address : ''),

              // tslint:disable-next-line:max-line-length
              fullname            : new FormControl(formObjBackup !== undefined && formObjBackup !== null && formObjBackup.fullname !== undefined
                                    ? formObjBackup.fullname : ''),
              // tslint:disable-next-line:max-line-length
              relationship        : new FormControl(formObjBackup !== undefined && formObjBackup !== null && formObjBackup.relationship !== undefined
                                    ? formObjBackup.relationship : ''),
              // tslint:disable-next-line:max-line-length
              other_relationship  : new FormControl(formObjBackup !== undefined && formObjBackup !== null && formObjBackup.other_relationship !== undefined
                                    ? formObjBackup.other_relationship : ''),
          })
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
    this.protectYourFinancesService.postPoaDetails(this.response).subscribe(
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
