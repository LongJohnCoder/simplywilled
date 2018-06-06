import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import {environment} from '../../../../environments/environment';
import {Observable} from 'rxjs/Observable';

@Injectable()
export class PackagesService {

  constructor(
      private http: HttpClient
  ) { }

  /**
   * this function get all packages from database
   * @param {string} token
   * @returns {Observable<Object>}
   */
  getPackages() {
      return this.http.get(environment.API_URL + 'user/get-packages');
  }

  /**
   * this function get all packages from database
   * @param {string} token
   * @param {string} package_id
   * @param {string} user_id
   * @returns {Observable<Object>}
   */
  purchasePackage(body: any): Observable<any> {
      return this.http.post(environment.API_URL + 'user/purchase-package', body);
  }

    purchasePackagePaypalDirect(body: any): Observable<any> {
        return this.http.post(environment.API_URL + 'user/paypal-direct-payment', body);
    }

    applyCoupon(body: any): Observable<any> {
        return this.http.post(environment.API_URL + 'user/check-coupon', body);
    }

    checkPackage(body: any): Observable<any> {
        return this.http.post(environment.API_URL + 'user/check-package', body);
    }
}
