import { Injectable } from '@angular/core';

@Injectable()
export class UserAuthService {

  constructor() { }

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
  isAuthenticated() {
    const data = this.getToken();
    if ( data && (data.token !== null) ) {
      return true;
    } else {
      return false;
    }
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
