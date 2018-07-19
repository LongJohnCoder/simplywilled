import { Injectable } from '@angular/core';
import { Observable } from 'rxjs/Observable';
import { HttpClient } from '@angular/common/http';
import {environment} from '../../environments/environment';
import { Subject,  } from 'rxjs/Subject';
import { BehaviorSubject } from 'rxjs';
import { Router } from '@angular/router';

@Injectable()
export class UserService {

  public currentToolTipType = new Subject<string>();
  public stepNumForTourGuide = new BehaviorSubject<number>(0);

  constructor( private httpClient: HttpClient, public router: Router) {
   }

  /** Function call for logging in*/

  login( body: { email: string, password: string } ): Observable<any> {
    return this.httpClient.post( environment.API_URL + 'sign-in', body );
  }

  /** Function call to register */

  register( body: any ): Observable<any> {
    return this.httpClient.post( environment.API_URL + 'sign-up', body );
  }

  /** Function call to logout */

  logout(  ): Observable<any> {
      return this.httpClient.post( environment.API_URL + 'user/sign-out', { });
  }
  /** Function to edit profile */

  editProfile(body): Observable<any> {
      return this.httpClient.post( environment.API_URL + 'user/edit-profile', body);
  }

  /** Function to get users details */
  getUserDetails(userId): Observable<any> {
    return this.httpClient.get(environment.API_URL + 'user/get-user-details/' + userId);
  }

  /** Function for contact us*/
  contactUs(formBody): Observable<any> {
      return this.httpClient.post(environment.API_URL + 'contact-us', formBody);
  }

  /** Function for forget-password*/
  forgetPassword(formBody): Observable<any> {
      return this.httpClient.post(environment.API_URL + 'forgot-password', formBody);
  }

  /** Function for reset-password-form*/
  resetPasswordSubmit(formBody): Observable<any> {
      return this.httpClient.post(environment.API_URL + 'reset-password', formBody);
  }

    /** Function for change-password-form*/
    changePasswordSubmit(formBody): Observable<any> {
        return this.httpClient.post(environment.API_URL + 'user/change-password', formBody);
    }

    /** Function to set current Tool Tip Type */
    changeCurrentToolTipType(value: string) {
        this.currentToolTipType.next(value);
    }

    fiduciaryOfUser(body: any): Observable<any> {
        return this.httpClient.post( environment.API_URL + 'fiduciary-user', body );
    }

    /** Function to send tour value*/
    changeStepNumber(type: string) {
        let newVal = 0;
        if (type === 'forward') {
            newVal = this.stepNumForTourGuide.value + 1;
        } else if (type === 'backward') {
            newVal = this.stepNumForTourGuide.value - 1;
        } else {
            newVal = 0;
        }

        if (newVal < 1 || newVal > 11) {
            this.stepNumForTourGuide.next(0);
            this.router.navigate(['/dashboard']);
        } else {
            if (newVal === 2) {
                this.router.navigate(['/dashboard/will']);
            } else if (newVal === 4) {
                this.router.navigate(['/dashboard/documents/signing-instruction']);
            } else if (newVal === 5) {
                this.router.navigate(['/dashboard/documents/last-will-and-testament']);
            }
            this.stepNumForTourGuide.next(newVal);
        }
    }
}
