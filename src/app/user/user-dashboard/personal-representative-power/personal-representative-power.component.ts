import { Component, OnInit } from '@angular/core';
import {NgForm} from '@angular/forms';
import {PersonalRepresentativePowerService} from './services/personal-representative-power.service';
import {Observable} from 'rxjs/Observable';
import {UserService} from '../../user.service';
import {LovedOnesInfo} from './models/lovedOnesInfo';
import {Router} from '@angular/router';
@Component({
  selector: 'app-personal-representative-power',
  templateUrl: './personal-representative-power.component.html',
  styleUrls: ['./personal-representative-power.component.css']
})
export class PersonalRepresentativePowerComponent implements OnInit {

  constructor(private prService: PersonalRepresentativePowerService, private usrService: UserService, private router: Router) { }
  businessInterestClassFlag: boolean;
  farmRanchFlag: boolean;
  personalRepresentativeFlag: boolean;
  amountTypeFlag: boolean;
  isNetValueFlag: boolean;
  access_token: string;
  errFlag: boolean;
  errString: string;
  savePersonalRepresentativeDB: Observable<any>;
  fetchPersonalRepresentativeDB: any;
  session_user_id: number;
  fetchedUserData: LovedOnesInfo;
  fetchInfo: boolean;
  compensation_value_data: any;
  ngOnInit() {
    this.getStepDetails();
    this.fetchInfo = false;
    if (JSON.parse(localStorage.getItem('loggedInUser')).hasOwnProperty('token')) {
      this.access_token = JSON.parse(localStorage.getItem('loggedInUser')).token;
    } else {
      this.access_token = '';
    }

  }

  /**
   * get step user details
   */
  getStepDetails(): void {
    this.session_user_id = JSON.parse(localStorage.getItem('loggedInUser')).user.id;
    if (this.session_user_id) {
      this.fetchPersonalRepresentativeDB = this.usrService.getUserDetails(this.session_user_id);
      this.fetchPersonalRepresentativeDB.subscribe(data => {
        if (data.status && data.status === 200) {
          if (data.data.hasOwnProperty(3)) {
            if (data.data[3].hasOwnProperty('data') && data.data[3].data) {
              this.fetchedUserData = data.data[3].data.lovedOnesInfo[0];
            } else {
              console.log('No records found. Please fill up the form');
              this.errFlag = true;
              this.errString = 'No records found. Please fill up the form';
            }
          } else {
            this.errFlag = true;
            this.errString = 'No array index exists for this step';
          }
        } else {
          this.errFlag = true;
          this.errString = 'Error while fetching records';
        }
      }, error => {
        this.errFlag = true;
        this.errString = error.error.message;
      }, () => {
        this.fetchInfo = true;
        // set dynamic values to the form
        if (this.fetchedUserData) {
          if (this.fetchedUserData.business_interest === '1') {
            this.businessInterestClassFlag = true;
          } else {
            this.businessInterestClassFlag = false;
          }
          if (this.fetchedUserData.farm_or_ranch === '1') {
            this.farmRanchFlag = true;
          } else {
            this.farmRanchFlag = false;
          }
          if (this.fetchedUserData.is_getcompensate === '1') {
            this.personalRepresentativeFlag = true;
          } else {
            this.personalRepresentativeFlag  = false;
          }
          // if (this.fetchedUserData.is_percentage !== '1') {
          //   this.amountTypeFlag = false;
          //   this.compensation_value_data = this.fetchedUserData.compensation_percent_amount;
          // } else {
          //   this.amountTypeFlag  = true;
          //   this.compensation_value_data = this.fetchedUserData.compensation_specific_amount;
          // }
          // if (this.fetchedUserData.net_value_percent === '1') {
          //   this.isNetValueFlag = true;
          // } else {
          //   this.isNetValueFlag  = false;
          // }
        } else {
          this.businessInterestClassFlag = false;
          this.farmRanchFlag = false;
          this.personalRepresentativeFlag = false;
          this.amountTypeFlag = false;
          this.isNetValueFlag  = false;
        }
      });
    } else {
      this.errFlag = true;
      this.errString = 'We are unable to log you in. Please login to continue';
    }
  }
  /**
   * this function update the record in database
   * @param {NgForm} formData
   * @returns {any}
   */
  savePersonalRepresentative(formData: NgForm): any {
    if (this.access_token.length) {
      const dataset = {'step': 4, 'user_id': JSON.parse(localStorage.getItem('loggedInUser')).user.id, 'lovedOnesInfo': [{'user_id': JSON.parse(localStorage.getItem('loggedInUser')).user.id, 'business_interest': formData.value.business_interest_val ? '1' : '0', 'farm_or_ranch': formData.value.farm_or_ranch_val ? '1' : '0', 'is_getcompensate': formData.value.percentage_compensation_val ? '1' : '0'}]};
      this.savePersonalRepresentativeDB = this.prService.savePersonalRepresentativePower(this.access_token, dataset);
      this.savePersonalRepresentativeDB.subscribe(data => {
        if (data.status) {
          // router link to next page
          this.router.navigate(['/dashboard/personal-representative-details']);
        } else {
          this.errFlag = true;
          this.errString = 'Something went wrong while updating the dataset. Please try again later!';
        }
      }, error => {
        this.errFlag = true;
        this.errString = error.error.message;
      });
    } else {
      this.errFlag = true;
      this.errString = 'No access token found. Please login to continue!';
    }
  }

  /**
   * this function change the state of the radio buttons
   * @param {string} identifier_string
   * @param {boolean} identifier_flag
   */
  changeState(identifier_string: string, identifier_flag: boolean): void {
    switch (identifier_string) {
      case 'BI':
        this.businessInterestClassFlag = identifier_flag;
        break;
      case 'FR':
        this.farmRanchFlag = identifier_flag;
        break;
      case 'PR':
        this.personalRepresentativeFlag = identifier_flag;
        break;
      case 'AT':
        this.amountTypeFlag = identifier_flag;
        break;
      case 'NV':
        this.isNetValueFlag = identifier_flag;
        break;
      default :
        console.log('Something went wrong. Please try again later');
    }
  }
}
