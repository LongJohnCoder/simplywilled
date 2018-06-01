import {Component, OnDestroy, OnInit} from '@angular/core';

import {Router} from '@angular/router';
import { Subscription } from 'rxjs/Subscription';
import {UserAuthService} from '../../../user-auth/user-auth.service';
import {UserDashboardService} from '../../user-dashboard.service';
import {UserService} from '../../../user.service';
import {MedicalEmergencyService} from '../../plan-for-medical-emergency/medical-emergency.service';

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
  loading = true;
  /**Constructor call*/
  constructor(private router: Router,
              private userDashboardService: UserDashboardService,
              private medicalEmergencyService: MedicalEmergencyService,
              private userService: UserService,
              private userAuth: UserAuthService) { }

  /**When the component initialises*/
  ngOnInit() {
      this.token = JSON.parse(localStorage.getItem('loggedInUser')).token;
      let user = this.userAuth.getUser();
      this.getUserDetailsSubscription = this.userService.getUserDetails(user.id).subscribe(
          (response: any) => {
            console.log(response);
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

  /**When the component is destroyed**/
  ngOnDestroy() {
    if (this.getUserDetailsSubscription !== undefined) {
      this.getUserDetailsSubscription.unsubscribe();
    }
    if (this.getmedicalEmergencySubscription !== undefined) {
      this.getmedicalEmergencySubscription.unsubscribe();
    }
  }

}
