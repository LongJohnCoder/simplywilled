import { Injectable } from '@angular/core';
import { Observable } from 'rxjs/Observable';
import { environment } from '../../environments/environment.prod';
import { HttpClient } from '@angular/common/http';

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
}
