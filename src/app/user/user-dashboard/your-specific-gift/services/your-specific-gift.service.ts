import { Injectable } from '@angular/core';
import {environment} from '../../../../../environments/environment';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import {SaveCashGift} from '../models/saveCashGift';
@Injectable()
export class YourSpecificGiftService {

  constructor(private http: HttpClient) { }

  /**
   * this function fetch data according to user id from database
   * @param {string} token
   * @param {number} userID
   * @returns {any}
   */
  fetchData(token: string, userID: number): any {
    return this.http.get(environment.API_URL + 'user/get-user-details/' + userID, {headers: new HttpHeaders(
        {'Authorization': token})});
  }

  /**
   * this function save cash gift in database
   * @param {string} token
   * @param {SaveCashGift} data
   * @returns {any}
   */
  saveCashGiftData(token: string, data: SaveCashGift): any {
    return this.http.post(environment.API_URL + 'user/edit-profile', data, {headers: new HttpHeaders(
        {'Authorization': token})});
  }

  /**
   * this function remove gift from database
   * @param {string} token
   * @param {number} gift_id
   * @returns {any}
   */
  deleteGift(token: string, gift_id: number): any {
    return this.http.delete(environment.API_URL + 'user/delete-gift/' + gift_id, {headers: new HttpHeaders(
        {'Authorization': token})});
  }
}
