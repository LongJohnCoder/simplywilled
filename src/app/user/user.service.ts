import { Injectable } from '@angular/core';
import { Observable } from 'rxjs/Observable';
import { HttpClient } from '@angular/common/http';
import {environment} from '../../environments/environment';
import { Subject } from 'rxjs/Subject';

@Injectable()
export class UserService {

  public currentToolTipType = new Subject<string>();
  constructor( private httpClient: HttpClient ) { }

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
}
