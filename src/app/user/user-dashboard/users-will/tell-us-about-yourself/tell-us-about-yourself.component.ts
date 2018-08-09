import { States } from './../../../shared/models/states.model';
import { GlobalTourComponent } from './../../global-tour/global-tour.component';
import { GlobalTooltipComponent } from './../../global-tooltip/global-tooltip.component';
import {Component, OnDestroy, OnInit} from '@angular/core';
import {FormArray, FormGroup, NgForm} from '@angular/forms';
import * as moment from 'moment';
import {UserService} from '../../../user.service';
import {Router} from '@angular/router';
import {UserAuthService} from '../../../user-auth/user-auth.service';
import {UserDashboardService} from '../../user-dashboard.service';
import {Subscription} from 'rxjs/Subscription';
import {ProgressbarService} from '../../shared/services/progressbar.service';

@Component({
  selector: 'app-tell-us-about-yourself',
  templateUrl: './tell-us-about-yourself.component.html',
  styleUrls: ['./tell-us-about-yourself.component.css']
})
export class TellUsAboutYourselfComponent implements OnInit, OnDestroy {
  /**Variable declaration*/
  days: string[] = [];
  months: string[];
  years: string[] = [];
  errors = {
    errorFlag: false,
    errorMessage: ''
  };
  user: any;
  today: any;
  userInfo: any;
  typeOfPartner: string[] = ['Spouse', 'Partner'];
  loading = true;
  userSubscription: Subscription;
  editSubscription: Subscription;
  classId: number;
  toolTipMessageList: any;
  toolTipMessage: any;
  tourSubscription: Subscription;

  stepNumber: number;
  tourSub: Subscription;
  states: any;
  sourceOfInfo: ['Google Search', 'Blog Post', 'Social Media', 'Friend', 'Colleague', 'Other'];

  /**Constructor call*/
  constructor(
      private userService: UserService,
      private router: Router,
      private authService: UserAuthService,
      private progressbarService: ProgressbarService,
      private dashboardService: UserDashboardService
  ) {

      this.months = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
      
      this.states = States;
      this.toolTipMessageList = {
      'name' : [{
          'q' : 'What is my full legal name?',
          // tslint:disable-next-line:max-line-length
          'a' : 'Please remember to use your name as it appears on your driver’s license or government issued photo identification and provide accordingly. If you don\'t have a middle name leave it blank'
        }],
      'maritial_status' : [{
            'q' : 'What if I am legally separated from my spouse?',
            // tslint:disable-next-line:max-line-length
            'a' : 'Your estate plan documents need to be as accurate as possible as of the date you sign them. If you are currently married, and not legally divorced, you should select Married. Once you are legally divorced, you should use SimplyWilled.com to update your marital status on your estate documents.',
          }, {
            'q' : 'What if I am engaged to be married?',
            // tslint:disable-next-line:max-line-length
            'a' : 'If you are engaged to be married at the time you are preparing your estate documents you should select Single. Once you are legally married, you should update your your marital status on your estate documents.'
          }, {
            'q' : 'What If I am in a domestic relationship?',
            // tslint:disable-next-line:max-line-length
            'a' : 'If you are in a domestic relationship registered or otherwise recognized under the laws of your state, you should select Domestic Relationship for your marital status.'
          }],
        'partner' : [{
          'q' : 'What is your spouse’s full legal name?',
          // tslint:disable-next-line:max-line-length
          'a' : 'Please remember to use the full legal name of your spouse or partner as it appears on their driver’s license or government issued photo identification.'
        }],
        'address' : [{
          'q' : 'Why Is my home address important?',
          'a' : 'Remember, the home address you provide will determine which state’s laws are used to prepare your estate plan documents.',
        }, {
          'q' : 'What If I have more than one home address?',
          // tslint:disable-next-line:max-line-length
          'a' : `If you have more than one home, use the place that you consider your primary and permanent residence. If you have more than one home, and aren’t sure which address to use consider the following things
          -What address is listed on your driver’s license?
          -What address is listed on your voter registration card?
          -What address is listed on your bank checking account?
          -What address is listed on your federal tax return?`
        }]
      };

      this.tourSub = this.userService.stepNumForTourGuide.subscribe(value => {
        this.stepNumber = value;
      });
  }

  /**When the component is initialised*/
  ngOnInit() {
    this.user = this.authService.getUser();
    this.userSubscription = this.userService.getUserDetails(this.user.id).subscribe(
        (response: any) => { console.log(response);
            this.dashboardService.updateUserDetails(response.data);
            if ( response.data[0].data) {
                console.log('user info ::', response.data[0].data.userInfo);
                this.userInfo = response.data[0].data.userInfo;
                const dobData = this.userInfo.dob !== null ? this.userInfo.dob.split('-') : '';
                const partnerDob = this.userInfo.partner_dob !== null ? this.userInfo.partner_dob.split('-') : '';
                this.userInfo.year =  dobData !== '' ? dobData[0] : '';
                this.userInfo.month = dobData !== '' ? dobData[1] : '';
                this.userInfo.day = dobData !== '' ? dobData[2] : '';
                this.userInfo.spouseYear = partnerDob !== '' ? partnerDob[0] : '';
                this.userInfo.spouseMonth = partnerDob !== '' ?  partnerDob[1] : '';
                this.userInfo.spouseDay = partnerDob !== '' ?  partnerDob[2] : '';
                // tslint:disable-next-line:max-line-length
                this.userInfo.partner_invitation = this.userInfo !== null && this.userInfo.partner_invitation !== null ? this.userInfo.partner_invitation : 0;
                // tslint:disable-next-line:max-line-length
                const progress = this.progressbarService.checkProgress(response.data[0].data.userInfo.children, response.data[0].data.userInfo.has_pet, 1);
                this.progressbarService.changeWidth({'width': progress});
            }
        },
        (error: any) => {
          console.log(error);
        }, () => { this.loading = false; }
    );
    this.today = new Date ;
    const currentYear = moment(this.today).year();
    for (let i = currentYear; i > (currentYear - 101) ; i--) {
      this.years.push(String(i));
    }
    for (let i = 1; i <= 31 ; i++) {
      const day = (i / 10) < 1 ? '0' + String(i) : String(i);
      this.days.push(day);
    }
    // this.tourStapes = +localStorage.getItem('tourStapes');
    setTimeout(() => {
      if (localStorage.getItem('newUser') === '1') {
        this.changeTourState('forward');
        localStorage.removeItem('newUser');
      }
    } , 300);
  }

  changeTourState(type: string) {
    this.userService.changeStepNumber(type);
  }

  /**When the form submits*/
  onSubmit(form: NgForm) {
    if (form.valid) {
      this.loading = true;
      const formData = form.value;
      formData.dob = formData.year + '-' + formData.month + '-' + formData.day ;
      formData.partner_dob = formData.spouseYear + '-' + formData.spouseMonth + '-' + formData.spouseDay ;
      formData.user_id = this.user.id ;
      formData.step = 1;
      formData.referral_other  = formData.referal !== 'Other' ? formData.referal : formData.referralOther;
      if ( formData.marital_status !== 'R') {
        formData.registered_partner = '0';
        formData.legal_married = '0';
      }

      console.log('form data :', formData, formData.referral, formData.referralOther);
      this.editSubscription = this.userService.editProfile(formData).subscribe(
        (data: any) =>  {
          this.router.navigate(['/dashboard/will/2']);
        },
        (error: any) => {
          this.errors.errorFlag = true;
          // tslint:disable-next-line:forin
          for (const prop in error.error.message) {
            this.errors.errorMessage = error.error.message[prop];
            break;
          }
          this.loading = false;
          setTimeout(() => {
            this.errors.errorFlag = false;
            this.errors.errorMessage = '';
          }, 3000);
        }, () => {this.loading = false; }
      );
    } else {
      alert('Please fill up all the fields');
      this.markFormGroupTouched(form);
    }
  }

  /**Mark all form controls as touched*/
  markFormGroupTouched (formGroup) {
    (<any>Object).values(formGroup.controls).forEach(control => {
      control.markAsTouched();
      control.markAsDirty();
    });
  }

  /**When the component is destroyed*/
  ngOnDestroy() {
    if (this.userSubscription !== undefined) {
      this.userSubscription.unsubscribe();
    }
    if (this.editSubscription !== undefined) {
      this.editSubscription.unsubscribe();
    }
    if (this.tourSubscription !== undefined) {
      this.tourSubscription.unsubscribe();
    }
  }

  tooltip(classNumber: number) {
    this.classId = classNumber;
  }

  toolTipClicked(str: string) {
    console.log(str);
    this.userService.changeCurrentToolTipType(str);
    // this.toolTipMessage = this.toolTipMessageList[str];
    // console.log('tooltip message :', this.toolTipMessage);
  }

  closeToolTip() {

  }
}
