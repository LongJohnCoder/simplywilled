import {Component, OnDestroy, OnInit} from '@angular/core';
import {UserService} from '../../user.service';
import {Router, NavigationEnd} from '@angular/router';
import {UserAuthService} from '../../user-auth/user-auth.service';
import {UserDashboardService} from '../user-dashboard.service';
import {Subscription} from 'rxjs/Subscription';
import {ProgressbarService} from '../shared/services/progressbar.service';
import {Progressbar} from '../shared/models/progressbar';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit, OnDestroy {
    /**Variable  declaration*/
    loggedInUser: any;
    userDetails: any = {};
    step1Data: any = {};
    logoutSubscription: Subscription;
    step1DataSubscription: Subscription;
    getUserDetailsSubscription: Subscription;
    showLeft = true;
    progressBar: Progressbar;
    progressBarSubscription: Subscription;

    /**Constructor call*/
    constructor(
      private userService: UserService,
      private router: Router,
      private userAuth: UserAuthService,
      private userDashboardService: UserDashboardService,
      private progressbarService: ProgressbarService
    ) {
      this.progressbarService.changeWidth({width: 0});
      this.progressBarSubscription = this.progressbarService.currentMessage.subscribe(
        (progressBar) => {
            this.progressBar = progressBar;
            console.log(this.progressBar);
        }
      );
      router.events
        .filter(event => event instanceof NavigationEnd)
        .subscribe((event: NavigationEnd) => {
          window.scroll(0, 0);
          if (event.urlAfterRedirects === '/dashboard/packages'){
            this.showLeft = false;
          }

        });
    }

    ngOnInit() {
      this.loggedInUser = this.userAuth.getUser();
      this.getUserDetails();
      this.step1DataSubscription = this.userDashboardService.step1Data.subscribe(
          (data: any) => {
              this.step1Data = data;
          },
        (error) =>  {console.log(error);}
      );
    }

    onLogOut() {
      this.logoutSubscription = this.userService.logout().subscribe(
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
        this.getUserDetailsSubscription = this.userService.getUserDetails(this.loggedInUser.id).subscribe(
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

    ngOnDestroy() {
      if (this.logoutSubscription !== undefined) {
        this.logoutSubscription.unsubscribe();
      }
      if (this.step1DataSubscription !== undefined) {
        this.step1DataSubscription.unsubscribe();
      }
      if (this.getUserDetailsSubscription !== undefined) {
        this.getUserDetailsSubscription.unsubscribe();
      }
      if (this.progressBarSubscription !== undefined) {
        this.progressBarSubscription.unsubscribe();
      }
    }
}
