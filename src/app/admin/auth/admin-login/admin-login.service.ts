import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs/Observable';

import { environment } from '../../../../environments/environment.prod';

@Injectable()
export class AdminLoginService {

  constructor( private httpClient: HttpClient ) { }

  login( body: { email: string, password: string } ): Observable<any> {
    return this.httpClient.post( environment.API_URL + 'admin-panel/sign-in', body );
  }
};