import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs/Observable';

import { environment } from '../../../environments/environment.prod';

@Injectable()
export class AuthService {

  constructor(private httpClient: HttpClient) { }


  // logout(token: string): Observable<any> {
	// 	const header = new Headers({
	// 		'X-Requested-With': 'XMLHttpRequest',
	// 		'Authorization': 'Bearer '+ token
	// 	});
	// 	return this.http.post( environment.API_URL + 'sign-out', '', {headers: header} );
	// }


  getToken() {
		const data = localStorage.getItem('loggedInAdminData');
		return JSON.parse(data);
	}

	removeToken() {
		localStorage.removeItem('loggedInAdminData');
	}

	getUserType(){
      let data :any= JSON.parse(localStorage.getItem('loggedInAdminData'));
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
