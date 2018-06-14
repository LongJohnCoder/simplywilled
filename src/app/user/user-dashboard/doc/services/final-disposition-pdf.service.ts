import { Injectable} from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import {environment} from '../../../../../environments/environment';


@Injectable()
export class FinalDispositionPdfService {

  constructor (private _http: HttpClient) { }

  /**Fetch overall progress*/
  fetchData(token: string) {
    return this._http.get(environment.API_URL + 'user/final-disposition-pdf', {headers: new HttpHeaders(
        {'Authorization': token})});
  }

}
