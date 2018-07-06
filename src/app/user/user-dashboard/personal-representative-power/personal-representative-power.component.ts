import { GlobalTooltipComponent } from './../global-tooltip/global-tooltip.component';
import {Component, OnDestroy, OnInit} from '@angular/core';
import {NgForm} from '@angular/forms';
import {PersonalRepresentativePowerService} from './services/personal-representative-power.service';
import {Observable} from 'rxjs/Observable';
import {UserService} from '../../user.service';
import {LovedOnesInfo} from './models/lovedOnesInfo';
import {Router} from '@angular/router';
import {Subscription} from 'rxjs/Subscription';
import {ProgressbarService} from '../shared/services/progressbar.service';
import {UserAuthService} from '../../user-auth/user-auth.service';
@Component({
  selector: 'app-personal-representative-power',
  templateUrl: './personal-representative-power.component.html',
  styleUrls: ['./personal-representative-power.component.css']
})
export class PersonalRepresentativePowerComponent implements OnInit, OnDestroy {

  /**Variable declaration*/
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
  loading = true;
  userSubscription: Subscription;
  savePersonalRepresentativeDBSubscription: Subscription;
  toolTipMessageList: any;
  checkUserSpouseStatusSubscription: Subscription;

  /**Constructor call*/
  constructor(
    private  authService: UserAuthService,
    private prService: PersonalRepresentativePowerService,
    private usrService: UserService, private router: Router,
    private progressBarService: ProgressbarService) {
    this.progressBarService.changeWidth({width: 12.5});
    this.toolTipMessageList = {
      'personal_representative' : [{
          'q' : 'What is a Personal Representative?',
          // tslint:disable-next-line:max-line-length
          'a' : 'Your Personal Representative, also know as an executor or settlor in some jurisdictions, is the individual you appoint to administer your estate. Their duties include, filing your Will with the court, marshaling your assets, paying creditors, making distributions to heirs and settling your estate.'
        }, {
          'q' : 'What are Special Powers?',
          // tslint:disable-next-line:max-line-length
          'a' : 'This question asks you to provide for any special powers, beyond the traditional general powers, that you would like your personal representative to have. For instance, the ability to operate a farm or run a business. In addition, if you wish, you can provide compensation for your personal representative for administering your estate.'
        }]
      };
  }

  toolTipClicked(str: string) {
    console.log(str);
    this.usrService.changeCurrentToolTipType(str);
    // this.toolTipMessage = this.toolTipMessageList[str];
    // console.log('tooltip message :', this.toolTipMessage);
  }

  /**When component initialises*/
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
      this.userSubscription = this.fetchPersonalRepresentativeDB.subscribe((data) => {
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
      }, (error) => {
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
        this.loading = false;
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
      this.savePersonalRepresentativeDBSubscription = this.savePersonalRepresentativeDB.subscribe(data => {
        if (data.status) {
          this.checkUserSpouseStatus();
          // router link to next page
         // this.router.navigate(['/dashboard/personal-representative-details']);
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

  /**
   *check User Spouse status for Routing
   */
  checkUserSpouseStatus() {
    this.checkUserSpouseStatusSubscription = this.usrService.getUserDetails(this.authService.getUser()['id']).subscribe(
      (response: any) => {
        if ( response.data[0].data.userInfo.marital_status === 'M' || response.data[0].data.userInfo.marital_status === 'R' ) {
          // move to spouse page
          this.router.navigate(['/dashboard/provide-user-spouse']);
        } else {
          // move to personal property page
          this.router.navigate(['/dashboard/personal-property-distributed']);
        }
      }, ( error: any ) => {
        console.log(error.error);
      });
  }

  /**When the component is destroyed*/
  ngOnDestroy() {
    if (this.savePersonalRepresentativeDBSubscription !== undefined) {
      this.savePersonalRepresentativeDBSubscription.unsubscribe();
    }
    if (this.userSubscription !== undefined) {
      this.userSubscription.unsubscribe();
    }
    if (this.checkUserSpouseStatusSubscription !== undefined) {
      this.checkUserSpouseStatusSubscription.unsubscribe();
    }
  }
}
