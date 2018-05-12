import { Component, OnInit } from '@angular/core';
import {UserService} from '../../user.service';
import {Router} from '@angular/router';
import {UserAuthService} from '../../user-auth/user-auth.service';
import {UserDashboardService} from '../user-dashboard.service';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {
    loggedInUser: any;
    userDetails: any = {};
    step1Data: any = {}

    constructor(
      private userService: UserService,
      private router: Router,
      private userAuth: UserAuthService,
      private userDashboardService: UserDashboardService,
    ) { }

    ngOnInit() {
      this.loggedInUser = this.userAuth.getUser();
      this.getUserDetails();
      this.userDashboardService.step1Data.subscribe(
          (data: any) => {
              this.step1Data = data;
          }
      );
    }

    onLogOut() {
      this.userService.logout().subscribe(
          (data: any) => {
              localStorage.removeItem('loggedInUser');
              this.router.navigate(['/']);
          },
          (error: any) => {
              console.log(error);
          }
      );
    }
    getUserDetails() {
        this.userService.getUserDetails(this.loggedInUser.id).subscribe(
            (response: any ) => {
                this.userDetails = response.data;
                this.userDashboardService.updateUserDetails(this.userDetails);
                const step1 = this.userDetails[0];
                if (step1.data === null) {
                   this.router.navigate(['/dashboard/will']);
                }
            },
            (error: any) => {
                console.log(error);
            }
        );
    }
    userDasboardRoute(link: string) {
        this.router.navigate([link]);
    }

}
