import { Component, OnInit } from '@angular/core';
import {NgForm} from '@angular/forms';
import {PersonalRepresentativePowerService} from './services/personal-representative-power.service';
import {Observable} from 'rxjs/Observable';

@Component({
  selector: 'app-personal-representative-power',
  templateUrl: './personal-representative-power.component.html',
  styleUrls: ['./personal-representative-power.component.css']
})
export class PersonalRepresentativePowerComponent implements OnInit {

  constructor(private prService: PersonalRepresentativePowerService) { }
  businessInterestClassFlag: boolean;
  farmRanchFlag: boolean;
  personalRepresentativeFlag: boolean;
  amountTypeFlag: boolean;
  isNetValueFlag: boolean;
  access_token: string;
  errFlag: boolean;
  errString: string;
  savePersonalRepresentativeDB: Observable<any>;
  ngOnInit() {
    this.businessInterestClassFlag = false;
    this.farmRanchFlag = false;
    this.personalRepresentativeFlag = false;
    this.amountTypeFlag = false;
    this.isNetValueFlag = false;
    if (JSON.parse(localStorage.getItem('loggedInUser')).hasOwnProperty('token')) {
      this.access_token = JSON.parse(localStorage.getItem('loggedInUser')).token;
    } else {
      this.access_token = '';
    }
  }
  savePersonalRepresentative(formData: NgForm): any {
    if (this.access_token.length) {
      const dataset = {'step': 4, 'user_id': JSON.parse(localStorage.getItem('loggedInUser')).user.id, 'lovedOnesInfo': [{'user_id': JSON.parse(localStorage.getItem('loggedInUser')).user.id, 'business_interest': formData.value.business_interest ? '1' : '0', 'farm_or_ranch': formData.value.farm_or_ranch ? '1' : '0', 'is_percentage': formData.value.percentage_estate ? '1' : '0', 'is_getcompensate': formData.value.percentage_compensation ? '1' : '0' , 'compensation_specific_amount' : formData.value.percentage_estate ? formData.value.compensation_value : 0 , 'compensation_percent_amount' : !formData.value.percentage_estate ? formData.value.compensation_value : 0, 'net_value_percent' : formData.value.net_value ? '1' : '0'}]};
      this.savePersonalRepresentativeDB = this.prService.savePersonalRepresentativePower(this.access_token, dataset);
      this.savePersonalRepresentativeDB.subscribe(data => {
        if (data.status) {
          // router link to next page
          console.log('updated');
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
