import {Component, OnDestroy, OnInit} from '@angular/core';
import {UserService} from '../../user.service';
import {Router, NavigationEnd} from '@angular/router';
import {UserAuthService} from '../../user-auth/user-auth.service';
import {UserDashboardService} from '../user-dashboard.service';
import {Subscription} from 'rxjs/Subscription';
import {ProgressbarService} from '../shared/services/progressbar.service';
import {Progressbar} from '../shared/models/progressbar';
import {SlideInOutAnimation} from '../shared/animations/slideDown';
import {FormBuilder, FormControl, FormGroup, Validators} from '@angular/forms';
import {ValidateFn} from 'codelyzer/walkerFactory/walkerFn';
import {ReferFriendService} from '../shared/services/referFriend.service';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css'],
  animations: [SlideInOutAnimation]
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
    showProgressBar = true;
    routerSubscription: Subscription;
    userName = '';
    animationState = 'out';
    referAFriendForm: FormGroup;
    referAFriendSubscription: Subscription;
    message = {
      errorMessage: '',
      successMessage: ''
    };
    loading = false;
    isMyAccountClickedVal: boolean;

    /**Constructor call*/
    constructor(
      private userService: UserService,
      private router: Router,
      private userAuth: UserAuthService,
      private userDashboardService: UserDashboardService,
      private _fb: FormBuilder,
      private referAFriendService: ReferFriendService,
      private progressbarService: ProgressbarService
    ) {
      this.createForm();
      this.progressbarService.changeWidth({width: 0});
      this.progressBarSubscription = this.progressbarService.currentMessage.subscribe(
        (progressBar) => {
            this.progressBar = progressBar;
        }
      );
      this.routerSubscription = router.events
        .filter(event => event instanceof NavigationEnd)
        .subscribe((event: NavigationEnd) => {
          // window.scroll(0, 0);
          if (event.urlAfterRedirects.includes('/dashboard/packages')) {
            this.showLeft = false;
            this.showProgressBar = false;
          } else {
              this.showLeft = true;
            this.showProgressBar = true;
          }
        });
    }

    /**Initialises the form**/
    createForm() {
      this.referAFriendForm = this._fb.group({
        'firstname': new FormControl(''),
        'lastname': new FormControl(''),
        'email': new FormControl(''),
      });
    }

    /**When the component is initialised*/
    ngOnInit() {
      this.isMyAccountClickedVal = false;
      this.loggedInUser = this.userAuth.getUser();
      this.getUserDetails();
      this.step1DataSubscription = this.userDashboardService.step1Data.subscribe(
          (data: any) => {
              this.step1Data = data;
              this.userName = this.step1Data !== null && this.step1Data.data !== null && this.step1Data.data.userInfo !== null &&  this.step1Data.data.userInfo !== undefined ? this.step1Data.data.userInfo.firstname : 'Your';
          },
        (error) =>  {console.log(error);}
      );
    }

    /**Checks for authorization user id.*/
    parseToken() {
      if (JSON.parse(localStorage.getItem('loggedInUser')).hasOwnProperty('token')) {
        return JSON.parse(localStorage.getItem('loggedInUser')).token;
      }
      return null;
    }
    onEditProfile() {
      this.router.navigate(['/dashboard/will']);
    }

    onChangePassword() {
      this.router.navigate(['/']);
    }

    /**When the user logs out*/
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
    /**Get the user details*/
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
    /**Navigate to user dashboard route*/
    userDasboardRoute(link: string) {
        this.router.navigate([link]);
    }

    /**Slide down animation**/
    toggleShowDiv() {
        this.animationState = this.animationState === 'out' ? 'in' : 'out';
        if (this.animationState === 'in') {
          this.referAFriendForm.get('firstname').setValidators([Validators.required]);
          this.referAFriendForm.get('lastname').setValidators([Validators.required]);
          this.referAFriendForm.get('email').setValidators([Validators.required, Validators.pattern(/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/)]);
          this.referAFriendForm.get('firstname').updateValueAndValidity();
          this.referAFriendForm.get('lastname').updateValueAndValidity();
          this.referAFriendForm.get('email').updateValueAndValidity();
        } else {
          this.referAFriendForm.get('firstname').clearValidators();
          this.referAFriendForm.get('lastname').clearValidators();
          this.referAFriendForm.get('email').clearValidators();
          this.referAFriendForm.get('email').updateValueAndValidity();
          this.referAFriendForm.get('firstname').updateValueAndValidity();
          this.referAFriendForm.get('lastname').updateValueAndValidity();
        }
    }

  /**Refer a friend**/
    sendMail() {
      this.loading = true;
      let token = this.parseToken();
      console.log(this.referAFriendForm.value);
      this.referAFriendSubscription = this.referAFriendService.referAFriend(token, this.referAFriendForm.value).subscribe(
        (response: any) => {
          console.log(response);
          if (response.status) {
            this.message.errorMessage = '';
            this.message.successMessage = 'They’ll be notified via e-mail at the address you provided.';
          } else {
            this.message.errorMessage = response.message;
            this.message.successMessage = '';
          }
        }, (error) => {
          console.log(error);
          this.message.errorMessage = 'Oops, something went wrong';
        }, () => {
          this.loading = false;
          this.referAFriendForm.reset();
          setTimeout( () => {
            this.message.errorMessage = '';
            this.message.successMessage = '';
            this.animationState = 'out';
          }, 3000);
        }
      );
    }

      isMyAccountClicked(): void {
        this.isMyAccountClickedVal = this.isMyAccountClickedVal === true ? false : true;
        console.log('clicked value : ', this.isMyAccountClickedVal);
      }

    /**When the component is destroyed*/
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
      if (this.routerSubscription !== undefined) {
        this.routerSubscription.unsubscribe();
      }
      if (this.referAFriendSubscription !== undefined) {
        this.referAFriendSubscription.unsubscribe();
      }
    }
}
