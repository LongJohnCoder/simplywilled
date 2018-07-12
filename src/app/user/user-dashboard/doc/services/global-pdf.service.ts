import { Injectable} from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import {environment} from '../../../../../environments/environment';
import { Subject } from 'rxjs/Subject';

@Injectable()
export class GlobalPdfService {

  constructor (
    private _http: HttpClient,
  ) {}

  public totalFcpoaPages = new Subject<any>();
  public totalHcpoaPages = new Subject<number>();
  public totalLastWillPages = new Subject<number>();

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

  healthcarepoa(token: string) {
    return this._http.get(environment.API_URL + 'user/states-doc', {headers: new HttpHeaders(
        {'Authorization': token})});
  }

  financialpoaPDF(token: string) {
    return this._http.get(environment.API_URL + 'user/finances-doc', {headers: new HttpHeaders(
        {'Authorization': token})});
  }

  downloadFile(userId: number, docname: string) {
    let headers = new HttpHeaders();
    headers = headers.set('Accept', 'application/pdf');
    return this._http.get(environment.base_url + 'documents/' + userId + '/' + docname, { headers: headers, responseType: 'blob' });
  }

  finalSigningsInstructionsEmail() {
    return this._http.get(environment.API_URL + 'user/final-signing-instructions-email');
  }

  willTemplateEmail() {
    return this._http.get(environment.API_URL + 'user/will-template-email');
  }

  hcpoaEmail() {
    return this._http.get(environment.API_URL + 'user/statesDoc-email');
  }

  fpoaEmail() {
    return this._http.get(environment.API_URL + 'user/fpoa-email');
  }

  finalDispositionEmail() {
    return this._http.get(environment.API_URL + 'user/final-disposition-email');
  }

  printFile (userId: number, docname: string) {
    return environment.base_url + 'documents/' + userId + '/' + docname;
  }

  /**
   * Subscription to broadcast totalPages which is dynamic in child component financial-poa-doc
   * @param value
   */
  fcpoaPages(arr: any) {
    this.totalFcpoaPages.next(arr);
  }

  /**
   * Subscription to broadcast totalPages which is dynamic in child component healthcare-poa-doc
   * @param value
   */
  hcpoaPages(value: number) {
    this.totalHcpoaPages.next(value);
  }

  /**
   * Subscription to broadcast totalPages which is dynamic in child component last-will-and-testament
   * @param value
   */
  lastWillPages(value: number) {
    this.totalLastWillPages.next(value);
  }

  getAccurateScrollPosition(x: number , list: Array<number>): number {
    let min = 0;
    let max = list.length - 1;
    if (x <= list[min] ) {
      return 1;
    }
    if (x >= list[max]) {
      return list.length;
    }
    let index = Math.floor((list.length - 1) / 2);

    while (index > 0) {
      if (max < min) {
        min = min + max;
        max = min - max;
        min = min - max;
      }
      if (min + 1 === max || min === max) {
        index = min;
        break;
      }
      if (x > list[index]) {
        min = index;
        index = Math.floor((max + min) / 2);
      } else if (x < list[index]) {
        max = index;
        index = Math.floor((min + max) / 2);
      } else {
        break;
      }
    }
    return index + 1;
  }

  getDynamicPages(): any {
    let x = document.getElementsByClassName('pageCount');
    let totalPages = 0;
    let heightArr = [];
    if (x === undefined || x === null || x[0] === undefined || x[0].children === undefined) {} else {
        x = x[0].children;
        if (x.length !== totalPages) {
          totalPages = x.length;
          heightArr = Object.keys(x).map(function(key) {
            return x[key].offsetTop - 20;
          });
        }
    }
    return {
      'totalPages'  : totalPages,
      'heightArr'   : heightArr
    };
  }

}
