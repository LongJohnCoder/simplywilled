import { Component, OnInit } from '@angular/core';
import { ProtectYourFinancesService } from '../services/protect-your-finances.service';
import { platformBrowserDynamic } from '@angular/platform-browser-dynamic';
import { Router, ActivatedRoute, Route } from '@angular/router';
import { HttpErrorResponse } from '@angular/common/http';
import { NgForm } from '@angular/forms';

import { UserAuthService } from '../../../user-auth/user-auth.service';
import { UserService } from '../../../user.service';
import { Validators, FormGroup, FormBuilder, FormControl, FormArray } from '@angular/forms';
// import { ProtectYourFinances } from './models/protectYourFinances';
import { PYFAttorneyPowers } from '../models/pyf-attorney-powers';

@Component({
  selector: 'app-protect-your-finances',
  templateUrl: './protect-your-finances.component.html',
  styleUrls: ['./protect-your-finances.component.css']
})
export class ProtectYourFinancesComponent implements OnInit {

  public poaData: any;
  public myForm: FormGroup;
  public pyfData: any; // PYFAttorneyPowers;
  public response: any;
  public errorMessage: string;
  public stateInfo: string;

  constructor(
    private protectYourFinancesService: ProtectYourFinancesService,
    private fb: FormBuilder,
    private authService: UserAuthService,
    private userService: UserService,
    private router: Router
  ) {
    this.createForm();
    this.getStates();
  }

  ngOnInit() {
    this.getPoaData();
  }

  /**
   * Function to get power of attorney data as a JSON response
   */
  getPoaData(): void {
    this.protectYourFinancesService.getPoaDetails().subscribe(
      (response: any) => {
        this.response = response.data;
        // console.log('response received : ', this.response);
        this.pyfData = JSON.parse(response.data.attorney_powers);
        this.poaData = new Array(this.pyfData).map(gr => gr );
        this.createForm(this.poaData);
      },
      (error: any) => {
      }
    );
  }

  /* *
    *   Get data object from api
    *   slice that in 2 parts : categories as faqData , q & a from categories as faqDetails
    * */
  getStates(): void {
    this.protectYourFinancesService.getStates().subscribe(
        (data: any) => {
            this.stateInfo = data.stateInfo.type;
            // this.stateInfo = 'trans';
            // switch(this.stateInfo) {
            //   case 'trans': this.router.navigate(['/dashboard']);
            //         break;
            //   default: break;
            // }
            console.log('state : ', this.stateInfo);
        }, (error: any) => {
            console.log(error);
            setTimeout(() => {
              this.errorMessage = '';
          }, 3000);
        }
    );
  }

  /**
   * @param dt as a data array
   * creates the form structure of the html with the data comming from poaData
   * returns void
   */
  createForm(dt: Array<PYFAttorneyPowers> = []): void {
    const formObj = typeof dt[0] !== undefined ? dt[0] : null;

    this.myForm = this.fb.group({
      // this are 2 inter dependant fields
      isDurable                 : new FormControl(formObj !== undefined && formObj !== null && formObj.isDurable !== undefined
                                      ? formObj.isDurable : 0),
      isIncapacity              : new FormControl(formObj !== undefined && formObj !== null && formObj.isIncapacity !== undefined
                                      ? formObj.isIncapacity : 0),

      // this are 2 inter dependant fields
      isAuthorizeToMakeGift     : new FormControl(formObj !== undefined && formObj !== null && formObj.isAuthorizeToMakeGift !== undefined
                                      ? formObj.isAuthorizeToMakeGift : 0),
      // tslint:disable-next-line:max-line-length
      isAuthorizeToOperategift  : new FormControl(formObj !== undefined && formObj !== null && formObj.isAuthorizeToOperategift !== undefined
                                      ? formObj.isAuthorizeToOperategift : 0),

      // this fields are only supposed to show up if the state is non-uniform
      isAuthorizeTotrade        : new FormControl(formObj !== undefined && formObj !== null && formObj.isAuthorizeTotrade !== undefined
                                      ? formObj.isAuthorizeTotrade : 0),
      // tslint:disable-next-line:max-line-length
      isAuthorisedToOperateBusiness : new FormControl(formObj !== undefined && formObj !== null && formObj.isAuthorisedToOperateBusiness !== undefined
                                      ? formObj.isAuthorisedToOperateBusiness : 0),
      // tslint:disable-next-line:max-line-length
      isAuthorizeToAccessOthers : new FormControl(formObj !== undefined && formObj !== null && formObj.isAuthorizeToAccessOthers !== undefined
                                      ? formObj.isAuthorizeToAccessOthers : 0),
    });
  }

  /**
   * @param field : has the field names
   * @param value : has the field values
   * @returns void : just sets the form element value to 1 or 0
   */
  changeMe(field: string , value): void {
      console.log('field : ', field, 'value', value);
      this.myForm.get(field).setValue(parseInt(value, 10));
  }

  /**
   * send request to backend
   */
  send(): void {
      this.response.attorney_powers   = this.myForm.value;
      this.response.attorney_holders  = JSON.parse(this.response.attorney_holders);
      this.response.attorney_backup   = JSON.parse(this.response.attorney_backup);
      this.protectYourFinancesService.postPoaDetails(this.response).subscribe(
        (data) => {
          console.log('form data after submit response :', data);
          this.router.navigate(['/dashboard/protect-your-finances-details']);
        }, (error) => {
          console.log('form data after submit error :', error);
        }
      );
    }
}
