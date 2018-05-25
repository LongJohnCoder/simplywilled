import {Component, OnDestroy, OnInit} from '@angular/core';
import { ProtectYourFinancesService } from '../services/protect-your-finances.service';
import { Router, ActivatedRoute, Route } from '@angular/router';

import { UserAuthService } from '../../../user-auth/user-auth.service';
import { UserService } from '../../../user.service';
import { Validators, FormGroup, FormBuilder, FormControl, FormArray } from '@angular/forms';
import { PYFAttorneyPowers } from '../models/pyf-attorney-powers';
import {Subscription} from 'rxjs/Subscription';

@Component({
  selector: 'app-protect-your-finances',
  templateUrl: './protect-your-finances.component.html',
  styleUrls: ['./protect-your-finances.component.css']
})
export class ProtectYourFinancesComponent implements OnInit, OnDestroy {

  poaData: any;
  myForm: FormGroup;
  pyfData: any; // PYFAttorneyPowers;
  response: any;
  errors = {
    errorFlag: false,
    errorMessage: '',
  };
  stateInfo: string;
  accessToken: string;
  poaSubscription: Subscription;
  stateInfoSubscription: Subscription;

  constructor(
    private protectYourFinancesService: ProtectYourFinancesService,
    private fb: FormBuilder,
    private authService: UserAuthService,
    private userService: UserService,
    private router: Router
  ) {
    this.accessToken = this.parseToken();
    this.getStates();
    this.createForm();
  }

  ngOnInit() {
    this.getPoaData();
  }

  /**Checks for authorization user id.*/
  parseToken() {
    if (JSON.parse(localStorage.getItem('loggedInUser')).hasOwnProperty('token')) {
      return JSON.parse(localStorage.getItem('loggedInUser')).token;
    }
    return null;
  }


  /**
   * Function to get power of attorney data as a JSON response
   */
  getPoaData(): void {
    this.protectYourFinancesService.getPoaDetails(this.accessToken).subscribe(
      (response: any) => {
        console.log(response);
        this.response = response.data;
        this.pyfData = response.data === null || response.data.attorney_powers === null ? null : JSON.parse(response.data.attorney_powers);
        this.poaData = new Array(this.pyfData).map(gr => gr );
        this.createForm(this.poaData);
      },
      (error: any) => {
        console.log(error);
      }
    );
  }

  /* *
    *   Get data object from api
    *   slice that in 2 parts : categories as faqData , q & a from categories as faqDetails
    * */
  getStates(): void {
    this.protectYourFinancesService.getStates(this.accessToken).subscribe(
        (data: any) => {
            this.stateInfo = data !== null ? data.stateInfo.type : 'uniform';
            let stateName = data !== null ? data.stateInfo.name : '';
            switch (stateName) {
                case 'Florida':
                case 'Maryland':
                case 'Minnesota':
                case 'New York': this.router.navigate(['/dashboard/protect-your-finances-details']);
                                 break;
                default: break;
            }
        }, (error: any) => {
          console.log(error);
        }, () => {}
    );
  }

  /**
   * @param dt as a data array
   * creates the form structure of the html with the data comming from poaData
   * returns void
   */
  createForm(dt: Array<PYFAttorneyPowers> = []): void {
    let formObj = dt[0] !== undefined ? dt[0] : null;
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
      this.myForm.get(field).setValue(parseInt(value, 10));
  }

  /**
   * send request to backend
   */
  send(): void {
      this.response = this.response === null ? {} : this.response;
      let userId = this.authService.getUser().id;
      this.response.user_id = this.response.user_id == null ? parseInt(userId, 10) : parseInt(this.response.user_id, 10);
      this.response.is_backupattorney = this.response.is_backupattorney == null ? '0' : this.response.is_backupattorney;
      this.response.attorney_powers   = this.myForm.value;
      this.response.attorney_holders  = typeof this.response.attorney_holders === 'string' ? JSON.parse(this.response.attorney_holders) : null;
      this.response.attorney_backup   = typeof this.response.attorney_backup === 'string' ? JSON.parse(this.response.attorney_backup) : null;
      this.protectYourFinancesService.postPoaDetails(this.accessToken, this.response).subscribe(
        (data) => {
          this.router.navigate(['/dashboard/protect-your-finances-details']);
        }, (error) => {
          console.log('error to send data : ', error);
        }
      );
    }

  /**When the component is destroyed.*/
  ngOnDestroy() {
    if (this.poaSubscription) {
      this.poaSubscription.unsubscribe();
    }
    if (this.stateInfoSubscription) {
      this.stateInfoSubscription.unsubscribe();
    }
  }
}