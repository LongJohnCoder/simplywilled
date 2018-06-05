import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Observable} from 'rxjs/Observable';
import {environment} from '../../../environments/environment';

@Injectable()
export class DiscountService {

  constructor(
      private httpClient: HttpClient
  ) { }

    getCoupons(): Observable<any> {
        const url = `${environment.API_URL + 'admin-panel/view-coupons'}`;
        return this.httpClient.get(url);
    }

}
