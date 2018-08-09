import { Injectable} from '@angular/core';
import {Progressbar} from '../models/progressbar';
import {BehaviorSubject} from 'rxjs/BehaviorSubject';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import {environment} from '../../../../../environments/environment';


@Injectable()
export class ProgressbarService {
  /**Variable declaration*/
  width: Progressbar;
  // tellUsAboutYouProgress = new BehaviorSubject( this.width );
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

  checkProgress(children: number, pet: number, step: number): number {
    console.log('children : ', children, 'pet : ', pet, 'step : ', step);
    const hasChildren = children > 0 ? true : false;
    const hasPet = pet > 0 ? true : false;
    return this.changeTellUsAboutYouWidth(hasChildren, hasPet, step);
  }

  changeTellUsAboutYouWidth(hasChildren: boolean, hasPet: boolean, currentStep: number): number {
    let baseProgress = 3;

    if (hasChildren) {
      baseProgress ++;
    } else {
      if (currentStep > 2) {
        currentStep--;
      }
    }

    if (hasPet) {
      baseProgress ++;
    } else {
      if (currentStep > 4) {
        currentStep--;
      }
    }

    console.log(hasPet, hasChildren, currentStep, baseProgress);
    // tslint:disable-next-line:whitespace
    // baseProgress = (baseProgress / (currentStep > 1 ? (currentStep - 1) : (baseProgress))) * 100;
    baseProgress = ((currentStep - 1) / baseProgress) * 100;
    console.log(baseProgress);
    return baseProgress;
    // this.tellUsAboutYouProgress.next({'width': baseProgress});
  }

  /**Fetch overall progress*/
  fetchTotalCompletion(token: string) {
    // setTimeout(() => {
      return this._http.get(environment.API_URL + 'user/fetchTotalCompletion', {headers: new HttpHeaders(
        {'Authorization': token})});
    // }, 2000);
  }

}
