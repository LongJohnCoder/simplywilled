import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Observable} from 'rxjs/Observable';
import {environment} from '../../../environments/environment';

@Injectable()
export class UsersService {

  constructor(
      private http: HttpClient
  ) { }

    users(): Observable<any> {
        const url = `${environment.API_URL + 'admin-panel/users-list'}`;
        return this.http.get(url);
    }

}
