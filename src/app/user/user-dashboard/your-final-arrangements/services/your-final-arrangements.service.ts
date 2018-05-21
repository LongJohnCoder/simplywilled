import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import {environment} from '../../../../../environments/environment';
import {Arrangement} from '../models/arrangement';

@Injectable()
export class YourFinalArrangementsService {

  constructor(private http: HttpClient) { }

  /**
   * this function fetch the data if there is any
   * @param {string} token
   * @param {GiftModel} data
   * @returns {any}
   */
  fetchData(token: string): any {
    return this.http.get(environment.API_URL + 'user/final-arrangement', {headers: new HttpHeaders(
        {'Authorization': token})});
  }
  /**
   * this function saves final agreement in database
   * @param {string} token
   * @param data
   * @returns {Observable<Object>}
   */
  submitfinalAgreement (token: string, data: Arrangement): any {
    return this.http.post(environment.API_URL + 'user/final-arrangement', data, {headers: new HttpHeaders(
        {'Authorization': token})});
  }
}
