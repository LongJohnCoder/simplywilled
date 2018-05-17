import { Injectable } from '@angular/core';
import {environment} from '../../../../../environments/environment';
import {HttpClient, HttpHeaders} from '@angular/common/http';
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
}
