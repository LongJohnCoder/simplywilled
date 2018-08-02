import { Observable } from 'rxjs/Observable';
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
  public totalHcpoaPages = new Subject<any>();
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
  hcpoaPages(arr: any) {
    this.totalHcpoaPages.next(arr);
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

  // getScrollEvent(scrollVal: number, heightArr: Array<number>, docThumbImg: Array<string>, e: any): any {
  //   if (heightArr === undefined || heightArr === null || heightArr.length === 0) {
  //     console.log('srcoll : ',  scrollVal, heightArr);
  //     return;
  //   }
  //   const thumbIndex = this.getAccurateScrollPosition(scrollVal, heightArr);
  //   const dx = e.target.offsetWidth + (docThumbImg.length * 7);
  //   const u = dx / docThumbImg.length;
  //   const scrollLeft = u * (thumbIndex - 1);
  //   console.log('srcoll : ', thumbIndex, scrollVal, heightArr, 'scroll left: ', scrollLeft);
  //   // thumbContainer.nativeElement.scrollLeft = u * (thumbIndex - 1);
  //   return {
  //     'scrollLeft': scrollLeft,
  //     'thumbIndex': thumbIndex
  //   };
  // }

  getScrollPosition(scrollVal: number = 0, index: number = null, heightArr: Array<number>, totalScroll): any {
    if (index === null) {
      index = this.getAccurateScrollPosition(scrollVal, heightArr) - 1;
    }
    const length = heightArr.length;
    const u = totalScroll / (length - 1);
    let scrollLeft = u * index;
    const buffer = 100;
    if (scrollLeft - 0 <= buffer) {
      scrollLeft = 0;
    } else if (totalScroll - scrollLeft <= buffer) {
      scrollLeft = totalScroll;
    }
    return {
      'scrollLeft': scrollLeft,
      'index': (index + 1)
    };
  }

  getScrollEvent(scrollVal: number, heightArr: Array<number>, docThumbImg: Array<string>, docBox, thumbFilm): any {
    if (heightArr === undefined || heightArr === null || heightArr.length === 0) {
      console.log('srcoll : ',  scrollVal, heightArr);
      return;
    }
    const totalScroll = Math.abs(docBox.nativeElement.offsetWidth - thumbFilm.nativeElement.offsetWidth);
    const resp = this.getScrollPosition(scrollVal, null, heightArr, totalScroll);
    return {
      'scrollLeft': resp.scrollLeft,
      'thumbIndex': resp.index
    };
  }

  getScrollThumbEvent(index: number, heightArr: Array<number>, docBox: any, thumbFilm: any): any {
    console.log(index);
    if (heightArr === undefined || heightArr === null || heightArr.length === 0 || heightArr[index] === undefined) {
      console.log('srcoll : ',  index, heightArr);
      return;
    }
    const totalScroll = Math.abs(docBox.nativeElement.offsetWidth - thumbFilm.nativeElement.offsetWidth);
    const resp = this.getScrollPosition(null, index , heightArr, totalScroll);
    const scrollTop = heightArr[index];
    return {
      'scrollLeft': resp.scrollLeft,
      'scrollTop': scrollTop
    };
  }

}
