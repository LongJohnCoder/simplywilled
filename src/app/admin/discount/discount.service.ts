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

    addCoupon(data: any): Observable<any> {
        return this.httpClient.post(environment.API_URL + 'admin-panel/create-coupon', data);
    }

    updateCoupon(data: any): Observable<any> {
        return this.httpClient.post(environment.API_URL + 'admin-panel/edit-coupon', data);
    }

    deleteCoupon(id: string): Observable<any> {
        return this.httpClient.delete(environment.API_URL + 'admin-panel/delete-coupon/' + id);
    }

    getNewCoupon(): Observable<any> {
        const url = `${environment.API_URL + 'admin-panel/get-coupon'}`;
        return this.httpClient.get(url);
    }

    checkCoupon(code: string): Observable<any> {
        const url = `${environment.API_URL + 'admin-panel/check-coupon/' + code}`;
        return this.httpClient.get(url);
    }

}
