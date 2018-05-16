import { Injectable } from '@angular/core';
import {GiftModel} from '../models/giftModel';
import {environment} from '../../../../../environments/environment';
import {HttpClient, HttpHeaders} from '@angular/common/http';

@Injectable()
export class GiftService {

  constructor(private http: HttpClient) { }

  /**
   * this function fetch the data if there is any
   * @param {string} token
   * @param {GiftModel} data
   * @returns {any}
   */
  fetchData(token: string, userID: number): any {
    return this.http.get(environment.API_URL + 'user/get-user-details/' + userID, {headers: new HttpHeaders(
        {'Authorization': token})});
  }

  /**
   * this function saves data in database
   * @param {string} token
   * @param {GiftModel} data
   * @returns {any}
   */
  saveData(token: string, data: GiftModel): any {
    return this.http.post(environment.API_URL + 'user/edit-profile', data,{headers: new HttpHeaders(
        {'Authorization': token})});
  }
}
