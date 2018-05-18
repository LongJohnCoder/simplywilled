import { Injectable } from '@angular/core';
import {MyGifts} from '../models/myGifts';
import {MyGiftsInterface} from '../interface/myGiftsInterface';

@Injectable()
export class EditGiftService {
  editable_object: any;
  constructor() { }

  /**
   * this function sets the variable which contents are needed to edit
   * @param {MyGifts} giftData
   */
  setData(giftData: MyGifts): void {
    this.editable_object = giftData;
  }

  /**
   * to access those objects in edit page this function comes to play
   * @returns {MyGifts}
   */
  getData(): MyGifts {
    return this.editable_object;
  }

  /**
   * this function unset the data
   * @returns {any}
   */
  unsetData(): any {
    this.editable_object = <MyGiftsInterface>{};
    return this.editable_object;
  }
}
