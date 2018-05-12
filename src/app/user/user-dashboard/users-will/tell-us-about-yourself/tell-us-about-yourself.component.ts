import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import * as moment from 'moment';
import {UserService} from '../../../user.service';
import {Router} from '@angular/router';
import {UserAuthService} from '../../../user-auth/user-auth.service';
import {UserDashboardService} from '../../user-dashboard.service';


@Component({
  selector: 'app-tell-us-about-yourself',
  templateUrl: './tell-us-about-yourself.component.html',
  styleUrls: ['./tell-us-about-yourself.component.css']
})
export class TellUsAboutYourselfComponent implements OnInit {
  days: string[] = [];
  months: string[];
  years: string[] = [];
  errorMessage: string;
  user: any;
  today: any;
  userInfo: any;
  typeOfPartner: string[] = ['Spouse', 'Partner']


  constructor(
      private userService: UserService,
      private router: Router,
      private authService: UserAuthService,
      private dashboardService: UserDashboardService
  ) {
      this.months = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '11', '12'];

  }
  ngOnInit() {
    this.user = this.authService.getUser();
    this.userService.getUserDetails(this.user.id).subscribe(
        (response: any) => {
            this.dashboardService.updateUserDetails(response.data);
            if ( response.data[0].data) {
                this.userInfo = response.data[0].data.userInfo;
                const dobData = this.userInfo.dob.split('-');
                const partnerDob = this.userInfo.partner_dob.split('-');
                this.userInfo.year = dobData[0];
                this.userInfo.month = dobData[1];
                this.userInfo.day = dobData[2];
                this.userInfo.spouseYear = partnerDob[0];
                this.userInfo.spouseMonth = partnerDob[1];
                this.userInfo.spouseDay = partnerDob[2];
            }
        },
        (error: any) => {
          console.log(error);
        }
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

  onSubmit(form: NgForm) {
    const formData = form.value;
    formData.dob = formData.year + '-' + formData.month + '-' + formData.day ;
    formData.partner_dob = formData.spouseYear + '-' + formData.spouseMonth + '-' + formData.spouseDay ;
    formData.user_id = this.user.id ;
    formData.step = 1;
    this.userService.editProfile(formData).subscribe(
        (data: any) =>  {
          this.router.navigate(['/dashboard/will/2']);
        },
        (error: any) => {
          for(let prop in error.error.message) {
            this.errorMessage = error.error.message[prop];
            break;
          };
          setTimeout(() => {
            this.errorMessage = '';
          },3000)

        }
    );
  }

}
