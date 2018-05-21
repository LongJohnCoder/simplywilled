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

  public poaDetailsHolders: any;
  public poaDetailsBackup: any;
  public poaDetailsForm: FormGroup;
  public response: any;

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

  getPoaDetailsData(): void {
    this.protectYourFinancesService.getPoaDetails().subscribe(
      (response: any) => {
        this.response = response.data;
        this.poaDetailsHolders = JSON.parse(this.response.attorney_holders);
        this.poaDetailsBackup = JSON.parse(this.response.attorney_backup);

        console.log('response received : ', this.poaDetailsHolders);
        // this.pyfData = JSON.parse(response.data.attorney_powers);
        // this.poaData = new Array(this.pyfData).map(gr => gr );
        this.createForm(this.poaDetailsHolders, this.poaDetailsBackup);
      },
      (error: any) => {
        console.log('response received lkjiiuyib: ');
      }
    );
  }

  /**
   * @param dt as a data array
   * @param dtBackup as a data array backup
   * creates the form structure of the html with the data comming from poaData
   * returns void
   */
  createForm(dt: Array<ProtectYourFinanceDetails> = [], dtBackup: Array<ProtectYourFinanceDetails> = []): void {
    console.log('this is called');
    const formObj = typeof dt[0] !== undefined ? dt[0] : null;
    const formObjBackup = typeof dtBackup[0] !== undefined ? dtBackup[0] : null;

    this.poaDetailsForm = this.fb.group({
          attorney_holders : this.fb.group({
              // this are 2 inter dependant fields
              is_inform           : new FormControl(formObj !== undefined && formObj !== null && formObj.is_inform !== undefined
                ? formObj.is_inform : 0),
              email               : new FormControl(formObj !== undefined && formObj !== null && formObj.email !== undefined
                      ? formObj.email : 0),

              // this are 2 inter dependant fields
              phone     : new FormControl(formObj !== undefined && formObj !== null && formObj.phone !== undefined
                      ? formObj.phone : 0),
              // tslint:disable-next-line:max-line-length
              address  : new FormControl(formObj !== undefined && formObj !== null && formObj.address !== undefined
                      ? formObj.address : 0),

              // this fields are only supposed to show up if the state is non-uniform
              fullname        : new FormControl(formObj !== undefined && formObj !== null && formObj.fullname !== undefined
                      ? formObj.fullname : 0),
              // tslint:disable-next-line:max-line-length
              relationship : new FormControl(formObj !== undefined && formObj !== null && formObj.relationship !== undefined
                      ? formObj.relationship : 0),
              // tslint:disable-next-line:max-line-length
              other_relationship : new FormControl(formObj !== undefined && formObj !== null && formObj.other_relationship !== undefined
                      ? formObj.other_relationship : 0),
          }),
          // is_backup : new FormControl(),
          attorney_backup : this.fb.group({
              // this are 2 inter dependant fields
              // tslint:disable-next-line:max-line-length
              is_inform           : new FormControl(formObjBackup !== undefined && formObjBackup !== null && formObjBackup.is_inform !== undefined
                ? formObjBackup.is_inform : 0),
              // tslint:disable-next-line:max-line-length
              email               : new FormControl(formObjBackup !== undefined && formObjBackup !== null && formObjBackup.email !== undefined
                      ? formObjBackup.email : 0),

              // this are 2 inter dependant fields
              phone     : new FormControl(formObjBackup !== undefined && formObjBackup !== null && formObjBackup.phone !== undefined
                      ? formObjBackup.phone : 0),
              // tslint:disable-next-line:max-line-length
              address  : new FormControl(formObjBackup !== undefined && formObjBackup !== null && formObjBackup.address !== undefined
                      ? formObjBackup.address : 0),

              // this fields are only supposed to show up if the state is non-uniform
              // tslint:disable-next-line:max-line-length
              fullname        : new FormControl(formObjBackup !== undefined && formObjBackup !== null && formObjBackup.fullname !== undefined
                      ? formObjBackup.fullname : 0),
              // tslint:disable-next-line:max-line-length
              relationship : new FormControl(formObjBackup !== undefined && formObjBackup !== null && formObjBackup.relationship !== undefined
                      ? formObjBackup.relationship : 0),
              // tslint:disable-next-line:max-line-length
              other_relationship : new FormControl(formObjBackup !== undefined && formObjBackup !== null && formObjBackup.other_relationship !== undefined
                      ? formObjBackup.other_relationship : 0),
          })
    });
  }
}
