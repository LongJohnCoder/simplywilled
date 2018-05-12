import { Component, OnInit } from '@angular/core';
import {Router} from '@angular/router';
import { Subscription } from 'rxjs/Subscription';
import {UserDashboardService} from '../../user-dashboard.service';
import {UserService} from '../../../user.service';
import {UserAuthService} from '../../../user-auth/user-auth.service';

@Component({
  selector: 'app-main-dashboard',
  templateUrl: './main-dashboard.component.html',
  styleUrls: ['./main-dashboard.component.css']
})
export class MainDashboardComponent implements OnInit{
  subscription: Subscription;
  userDetails: any = [];
  step1Data: any = {};
  constructor(private router: Router,
              private userDashboardService: UserDashboardService,
              private userService: UserService,
              private userAuth: UserAuthService) { }

  ngOnInit() {
    let user = this.userAuth.getUser();
    this.userService.getUserDetails(user.id).subscribe(
        (response: any) => {
          this.userDetails = response.data;
          this.step1Data = this.userDetails[0];
          this.userDashboardService.updateUserDetails(response.data);
        },
        (error: any) => {
          console.log(error);
        }
    );
  }


}
