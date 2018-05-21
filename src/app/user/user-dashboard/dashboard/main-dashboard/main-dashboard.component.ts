import { Component, OnInit } from '@angular/core';

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
export class MainDashboardComponent implements OnInit{
  subscription: Subscription;
  userDetails: any = [];
  step1Data: any = {};
  step2: boolean;
  token: string;
  constructor(private router: Router,
              private userDashboardService: UserDashboardService,
              private medicalEmergencyService: MedicalEmergencyService,
              private userService: UserService,
              private userAuth: UserAuthService) { }

  ngOnInit() {
      this.token = JSON.parse(localStorage.getItem('loggedInUser')).token;
      let user = this.userAuth.getUser();
    this.userService.getUserDetails(user.id).subscribe(
        (response: any) => {
          console.log(response);
          this.userDetails = response.data;
          this.step1Data = this.userDetails[0];
          this.userDashboardService.updateUserDetails(response.data);
        },
        (error: any) => {
          console.log(error);
        }
    );

    this.step2 = false;
    this.medicalEmergencyService.getmedicalEmergency(this.token, {user_id: user.id}).subscribe(
          (response: any) => {
              this.step2 = true;
          }, (error: any) => {
              this.step2 = false;
          });
  }


}
