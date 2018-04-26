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

  getUserType() {
    const data: any = JSON.parse(localStorage.getItem('loggedInUser'));
    console.log(data);
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
}
