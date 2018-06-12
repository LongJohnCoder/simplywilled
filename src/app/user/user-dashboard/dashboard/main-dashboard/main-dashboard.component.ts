import {Component, OnDestroy, OnInit} from '@angular/core';

import {Router} from '@angular/router';
import { Subscription } from 'rxjs/Subscription';
import {UserAuthService} from '../../../user-auth/user-auth.service';
import {UserDashboardService} from '../../user-dashboard.service';
import {UserService} from '../../../user.service';
import {MedicalEmergencyService} from '../../plan-for-medical-emergency/medical-emergency.service';
import {ProgressbarService} from '../../shared/services/progressbar.service';

@Component({
  selector: 'app-main-dashboard',
  templateUrl: './main-dashboard.component.html',
  styleUrls: ['./main-dashboard.component.css']
})
export class MainDashboardComponent implements OnInit, OnDestroy {
  /**Variable declartion*/
  subscription: Subscription;
  userDetails: any = [];
  step1Data: any = {};
  step2: boolean;
  token: string;
  getUserDetailsSubscription: Subscription;
  getmedicalEmergencySubscription: Subscription;
  progressSubscription: Subscription;
  loading = true;
  progressBar = {
    finalArrangements: false,
    healthFinance: false,
    protectYourFinance: false,
    provideYourLovedOnes: false,
    tellUsAboutYou: false
  };
  /**Constructor call*/
  constructor(private router: Router,
              private userDashboardService: UserDashboardService,
              private medicalEmergencyService: MedicalEmergencyService,
              private userService: UserService,
              private progressbarService: ProgressbarService,
              private userAuth: UserAuthService) { }

  /**When the component initialises*/
  ngOnInit() {
      this.token = JSON.parse(localStorage.getItem('loggedInUser')).token;
      let user = this.userAuth.getUser();
      this.progressSubscription = this.progressbarService.fetchTotalCompletion(this.token).subscribe(
        (progress: any) => {
            if (progress.status !== undefined) {
              let count = 0;
              this.progressBar = {
                finalArrangements: progress.data !== null && progress.data.final_arrangements !== undefined && progress.data.final_arrangements,
                healthFinance: progress.data !== null && progress.data.health_finance !== undefined && progress.data.health_finance,
                protectYourFinance: progress.data !== null && progress.data.protect_your_finance !== undefined && progress.data.protect_your_finance,
                provideYourLovedOnes: progress.data !== null && progress.data.provide_your_loved_ones !== undefined && progress.data.provide_your_loved_ones,
                tellUsAboutYou: progress.data !== null && progress.data.tell_us_about_you !== undefined && progress.data.tell_us_about_you
              };
              this.setProgress(this.progressBar, count);
            } else {
              console.log('Oops, something went wrong with the progress bar.');
            }
        },
        (error) => { console.log(error); },
        () => {}
      );
      this.getUserDetailsSubscription = this.userService.getUserDetails(user.id).subscribe(
          (response: any) => {
            this.userDetails = response.data;
            this.step1Data = this.userDetails[0];
            this.userDashboardService.updateUserDetails(response.data);
          },
          (error: any) => {
            console.log(error);
          }, () => {this.loading = false;}
      );

    this.step2 = false;
    this.getmedicalEmergencySubscription = this.medicalEmergencyService.getmedicalEmergency(this.token, {user_id: user.id}).subscribe(
          (response: any) => {
              this.step2 = true;
          }, (error: any) => {
              this.step2 = false;
          },
      () => {}
     );
  }

  toTuayPdf(e: any) {
    e.stopPropagation();
    console.log('comes here');
  }

  /**Sets the progress count**/
  setProgress(progressBar: Object, count = 0) {
    if (this.progressBar.finalArrangements) {
      count++;
    }
    if (this.progressBar.healthFinance) {
      count++;
    }
    if (this.progressBar.protectYourFinance) {
      count++;
    }
    if (this.progressBar.provideYourLovedOnes) {
      count++;
    }
    if (this.progressBar.tellUsAboutYou) {
      count++;
    }
    this.progressbarService.changeWidth({width: count !== 0 ? ((count / 5) * 100) : 0 });
  }

  /**When the component is destroyed**/
  ngOnDestroy() {
    if (this.getUserDetailsSubscription !== undefined) {
      this.getUserDetailsSubscription.unsubscribe();
    }
    if (this.getmedicalEmergencySubscription !== undefined) {
      this.getmedicalEmergencySubscription.unsubscribe();
    }
    if (this.progressSubscription !== undefined) {
      this.progressSubscription.unsubscribe();
    }
  }

}
