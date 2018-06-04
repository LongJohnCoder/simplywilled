import {Component, OnDestroy, OnInit} from '@angular/core';
import {FormArray, FormGroup, NgForm} from '@angular/forms';
import * as moment from 'moment';
import {UserService} from '../../../user.service';
import {Router} from '@angular/router';
import {UserAuthService} from '../../../user-auth/user-auth.service';
import {UserDashboardService} from '../../user-dashboard.service';
import {Subscription} from 'rxjs/Subscription';
import {ProgressbarService} from '../../shared/services/progressbar.service';
import {Progressbar} from '../../shared/models/progressbar';


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

  /**Constructor call*/
  constructor(
      private userService: UserService,
      private router: Router,
      private authService: UserAuthService,
      private dashboardService: UserDashboardService
  ) {
      this.months = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

  }

  /**When the component is initialised*/
  ngOnInit() {
    this.user = this.authService.getUser();
    this.userSubscription = this.userService.getUserDetails(this.user.id).subscribe(
        (response: any) => {
            this.dashboardService.updateUserDetails(response.data);
            if ( response.data[0].data) {
                this.userInfo = response.data[0].data.userInfo;
                let dobData = this.userInfo.dob !== null ? this.userInfo.dob.split('-') : '';
                let partnerDob = this.userInfo.partner_dob !== null ? this.userInfo.partner_dob.split('-') : '';
                this.userInfo.year =  dobData !== '' ? dobData[0] : '';
                this.userInfo.month = dobData !== '' ? dobData[1] : '';
                this.userInfo.day = dobData !== '' ? dobData[2] : '';
                this.userInfo.spouseYear = partnerDob !== '' ? partnerDob[0] : '';
                this.userInfo.spouseMonth = partnerDob !== '' ?  partnerDob[1] : '';
                this.userInfo.spouseDay = partnerDob !== '' ?  partnerDob[2] : '';
                this.userInfo.partner_invitation = this.userInfo !== null && this.userInfo.partner_invitation !== null ? this.userInfo.partner_invitation : 0;
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
      let day = (i / 10) < 1 ? '0' + String(i) : String(i);
      this.days.push(day);
    }
  }

  /**When the form submits*/
  onSubmit(form: NgForm) {
    if (form.valid) {
      let formData = form.value;
      formData.dob = formData.year + '-' + formData.month + '-' + formData.day ;
      formData.partner_dob = formData.spouseYear + '-' + formData.spouseMonth + '-' + formData.spouseDay ;
      formData.user_id = this.user.id ;
      formData.step = 1;
      if ( formData.registered_partner !== 'D') {
        formData.registered_partner = '0' ;
        formData.legal_married = '0';
      }
      this.editSubscription = this.userService.editProfile(formData).subscribe(
        (data: any) =>  {
          this.router.navigate(['/dashboard/will/2']);
        },
        (error: any) => {
          this.errors.errorFlag = true;
          for (let prop in error.error.message) {
            this.errors.errorMessage = error.error.message[prop];
            break;
          }
        }
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
  }
}
