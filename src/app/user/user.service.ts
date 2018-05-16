import { Injectable } from '@angular/core';
import { Observable } from 'rxjs/Observable';
import { HttpClient } from '@angular/common/http';
import {environment} from '../../environments/environment';

@Injectable()
export class UserService {

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
}
