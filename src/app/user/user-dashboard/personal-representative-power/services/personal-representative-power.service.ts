import { Injectable } from '@angular/core';
import {SavePersonalRepresentativePower} from '../models/savePersonalRepresentativePower';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import {environment} from '../../../../../environments/environment';

@Injectable()
export class PersonalRepresentativePowerService {

  constructor(private http: HttpClient) { }

  /**
   * this function saves representative power in database
   * @param {string} token
   * @param {SavePersonalRepresentativePower} data
   * @returns {Observable<Object>}
   */
  savePersonalRepresentativePower(token: string, data: SavePersonalRepresentativePower) {
    return this.http.post(environment.API_URL + 'user/edit-profile', data, {headers: new HttpHeaders(
        {'Authorization': token})});
  }
}
