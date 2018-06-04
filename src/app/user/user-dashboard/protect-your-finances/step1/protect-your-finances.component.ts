import {Component, OnDestroy, OnInit} from '@angular/core';
import { ProtectYourFinancesService } from '../services/protect-your-finances.service';
import { Router, ActivatedRoute, Route } from '@angular/router';

import { UserAuthService } from '../../../user-auth/user-auth.service';
import { UserService } from '../../../user.service';
import { Validators, FormGroup, FormBuilder, FormControl, FormArray } from '@angular/forms';
import { PYFAttorneyPowers } from '../models/pyf-attorney-powers';
import {Subscription} from 'rxjs/Subscription';
import {ProgressbarService} from '../../shared/services/progressbar.service';

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
  mainSubscription: Subscription;
  postPOASubscription: Subscription;
  loading = true;

  constructor(
    private protectYourFinancesService: ProtectYourFinancesService,
    private fb: FormBuilder,
    private authService: UserAuthService,
    private userService: UserService,
    private progressBarService: ProgressbarService,
    private router: Router
  ) {
    this.accessToken = this.parseToken();
    this.getStates();
    this.getPoaData();
    //this.createForm();
  }

  ngOnInit() {
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
        this.response = response.data;
        this.pyfData = response === null || response.data === null || response.data.attorney_powers === null ? null : JSON.parse(response.data.attorney_powers);
        this.poaData = new Array(this.pyfData).map(gr => gr );
      },
      (error: any) => {
        console.log(error);
      }, () => {this.createForm(this.poaData); }
    );
  }

  /* *
    *   Get data object from api
    *   slice that in 2 parts : categories as faqData , q & a from categories as faqDetails
    * */
  getStates(): void {
    this.protectYourFinancesService.getStates(this.accessToken).subscribe(
        (data: any) => {
            this.stateInfo = data !== null && data.stateInfo !== null ? data.stateInfo.type : 'uniform';
            const stateName = data !== null && data.stateInfo !== null ? data.stateInfo.name : '';
            switch (stateName) {
                case 'Florida':
                case 'Maryland':
                case 'Minnesota':
                case 'New York': this.router.navigate(['/dashboard/protect-your-finances-details']);
                                 break;
                default:         this.progressBarService.changeWidth({width: 50});
                                 break;
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
    const formObj = dt[0] !== undefined ? dt[0] : null;
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
    this.loading = false;
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
      const userId = this.authService.getUser().id;
      this.response.user_id = this.response.user_id == null ? parseInt(userId, 10) : parseInt(this.response.user_id, 10);
      this.response.is_backupattorney = this.response.is_backupattorney == null ? '0' : this.response.is_backupattorney;
      this.response.attorney_powers   = this.myForm.value;
      this.response.attorney_holders  = typeof this.response.attorney_holders === 'string' ? JSON.parse(this.response.attorney_holders) : null;
      this.response.attorney_backup   = typeof this.response.attorney_backup === 'string' ? JSON.parse(this.response.attorney_backup) : null;
      const request = this.createRequest(userId);
      this.postPOASubscription = this.protectYourFinancesService.postPoaDetails(this.accessToken, request).subscribe(
        (data) => {
          if (data.status) {
            this.router.navigate(['/dashboard/protect-your-finances-details']);
          } else {
            console.log(data.message);
          }
        }, (error) => {
          console.log('error to send data : ', error);
        }
      );
    }

  /**Creates the request*/
  createRequest(userId) {
    const request = {
      user_id : this.response.user_id == null ? parseInt(userId, 10) : parseInt(this.response.user_id, 10),
      attorney_powers: this.myForm.value,
      is_complete: this.response.is_complete !== null ? this.response.is_complete : '0'
    };
    return request;
  }
  /**When the component is destroyed.*/
  ngOnDestroy() {
    if (this.mainSubscription !== undefined) {
      this.mainSubscription.unsubscribe();
    }
    if (this.poaSubscription) {
      this.poaSubscription.unsubscribe();
    }
    if (this.stateInfoSubscription) {
      this.stateInfoSubscription.unsubscribe();
    }
    if(this.postPOASubscription !== undefined) {
      this.postPOASubscription.unsubscribe();
    }
  }
}
