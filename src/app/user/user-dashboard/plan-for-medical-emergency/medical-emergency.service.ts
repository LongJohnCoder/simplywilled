import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import {environment} from '../../../../environments/environment';


@Injectable()
export class MedicalEmergencyService {

  constructor(
      private http: HttpClient
  ) { }

  /**
   * this function get medical emergency agents from database
   * @param {string} token
   * @param {user_id} data
   * @returns {Observable<Object>}
   */
  getmedicalEmergency(token: string, data: any) {
      return this.http.post(environment.API_URL + 'user/fetch-health-finance', data, {headers: new HttpHeaders(
              {'Authorization': token})});
  }

    /**
     * this function update medical emergency agents to database
     * @param {string} token
     * @param {user_id} form data of medical emergency agent form
     * @returns {Observable<Object>}
     */
  updatemedicalEmergency(token: string, data: any) {
      return this.http.post(environment.API_URL + 'user/health-finance', data, {headers: new HttpHeaders(
              {'Authorization': token})});
  }

}
