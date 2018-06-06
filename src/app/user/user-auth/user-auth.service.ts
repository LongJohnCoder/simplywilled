import { BehaviorSubject } from 'rxjs/BehaviorSubject';
import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import { Observable } from 'rxjs/Observable';
import { environment } from '../../../environments/environment';
import * as jwt_decode from 'jwt-decode';

@Injectable()
export class UserAuthService {

  constructor(private httpClient: HttpClient) { }

  getToken() {
    const data = localStorage.getItem('loggedInUser');
    return JSON.parse(data);
  }

  removeToken() {
    localStorage.removeItem('loggedInUser');
  }

  getUser() {
    const data: any = JSON.parse(localStorage.getItem('loggedInUser'));
    return data['user'];
  }
  isAuthenticated(): any {
    const data = this.getToken();
    // if ( data && (data.token !== null) ) {
    //   return true;
    // } else {
    //   return false;
    // }

    const token = data && data.token !== undefined ? data.token : null;
    if (token === null) {
      return false;
    }

    const date  = this.getTokenExpirationDate(token);
    if (date === undefined || date === null) {
      return false;
    }
    if (!(date.valueOf() < new Date().valueOf())) {
      return true;
    } else {
      return false;
    }
    // this.httpClient.get(environment.API_URL + 'user/isAuthenticated').subscribe(
    //   (data) => {
    //     return true;
    //   }, (error) => {
    //     return false;
    //   }
    // );
  }

  getTokenExpirationDate(token: string): Date {
    const decoded = jwt_decode(token);

    if (decoded.exp === undefined) {
      return null;
    }

    const date = new Date(0);
    date.setUTCSeconds(decoded.exp);
    return date;
  }

  isTokenExpired(token?: string): boolean {
    const data = this.getToken();
    token = !token ? data.token : null;
    if (!token) {
      return true;
    }

    const date = this.getTokenExpirationDate(token);
    if (date === undefined) {
      return false;
    }
    return !(date.valueOf() > new Date().valueOf());
  }

  isAuthenticatedFromServer(): any {
    return this.httpClient.get(environment.API_URL + 'user/isAuthenticated').subscribe(
      (data) => {
        return false;
      }, (error) => {
        return true;
      }
    );
    //return res.status !== undefined ? true : 
  }

  getStates(token: string): Observable<any> {
    return this.httpClient.get(environment.API_URL + 'user/get-state-info', {headers: new HttpHeaders(
        {'Authorization': token})});
  }

  isPaid() {
      const data = this.getToken();
      if ( data && (data.user.package !== null && data.user.package !== '') ) {
          return true;
      } else {
          return false;
      }
  }
}
