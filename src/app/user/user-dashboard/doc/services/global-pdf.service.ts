import { Injectable} from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import {environment} from '../../../../../environments/environment';


@Injectable()
export class GlobalPdfService {

  constructor (private _http: HttpClient) { }

  /**Fetch overall progress*/
  fetchData(token: string) {
    return this._http.get(environment.API_URL + 'user/doc-info', {headers: new HttpHeaders(
        {'Authorization': token})});
  }

  signingInstructions(token: string) {
    return this._http.get(environment.API_URL + 'user/final-signing-instructions-pdf', {headers: new HttpHeaders(
        {'Authorization': token})});
  }

  willTemplate(token: string) {
    return this._http.get(environment.API_URL + 'user/will-template', {headers: new HttpHeaders(
        {'Authorization': token})});
  }

  finalDisposition(token: string) {
    return this._http.get(environment.API_URL + 'user/final-disposition-pdf', {headers: new HttpHeaders(
        {'Authorization': token})});
  }

  downloadFile(userId: number, docname: string) {
    let headers = new HttpHeaders();
    headers = headers.set('Accept', 'application/pdf');
    return this._http.get(environment.base_url + 'documents/' + userId + '/' + docname, { headers: headers, responseType: 'blob' });
  }
}
