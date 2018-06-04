import { Injectable} from '@angular/core';
import {Progressbar} from '../models/progressbar';
import {BehaviorSubject} from 'rxjs/BehaviorSubject';


@Injectable()
export class ProgressbarService {
  /**Variable declaration*/
  width: Progressbar;
  messageSource = new BehaviorSubject( this.width );
  currentMessage = this.messageSource.asObservable();
  constructor() { }

  /**Sets the progressbar value*/
  setWidth(width: Progressbar) {
    this.width = width;
  }
  /**gets the progressbar width*/
  getWidth() {
    return this.width;
  }

  changeWidth(width: Progressbar) {
    this.messageSource.next(width);
  }

}
