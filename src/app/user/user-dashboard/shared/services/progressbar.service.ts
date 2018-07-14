import { Injectable} from '@angular/core';
import {Progressbar} from '../models/progressbar';
import {BehaviorSubject} from 'rxjs/BehaviorSubject';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import {environment} from '../../../../../environments/environment';


@Injectable()
export class ProgressbarService {
  /**Variable declaration*/
  width: Progressbar;
  messageSource = new BehaviorSubject( this.width );
  currentMessage = this.messageSource.asObservable();
  constructor (private _http: HttpClient) { }

  /**Sets the progressbar value*/
  setWidth(width: Progressbar) {
    this.width = width;
  }
  /**gets the progressbar width*/
  getWidth() {
    return this.messageSource.getValue();
  }

  changeWidth(width: Progressbar) {
    this.messageSource.next(width);
  }

  /**Fetch overall progress*/
  fetchTotalCompletion(token: string) {
    // setTimeout(() => {
      return this._http.get(environment.API_URL + 'user/fetchTotalCompletion', {headers: new HttpHeaders(
        {'Authorization': token})});
    // }, 2000);
  }

}
