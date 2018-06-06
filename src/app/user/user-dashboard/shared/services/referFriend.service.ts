import { Injectable} from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import {environment} from '../../../../../environments/environment';
import {FormGroup} from '@angular/forms';


@Injectable()
export class ReferFriendService {
  /**Constructor call*/
  constructor (private _http: HttpClient) { }

  /**Fetch overall progress*/
  referAFriend(token: string, data: FormGroup) {
    return this._http.post(environment.API_URL + 'user/mail-a-friend', data);
  }

}
