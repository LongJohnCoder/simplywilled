import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs/Observable';
import { environment } from '../../../../../environments/environment.prod';

@Injectable()
export class ProtectYourFinancesService {

  constructor(
      private httpClient: HttpClient
  ) { }

    /**
     * API to get states information during the tellUsAboutYou 1st section
     */
    getStates(): Observable<any> {
        return this.httpClient.get(`${environment.API_URL + 'user/get-state-info'}`);
    }

    /**
     * API to get power of attorney data for the user
     */
    getPoaDetails(): Observable<any> {
        return this.httpClient.get(`${environment.API_URL + 'user/get-poa-user-data'}`);
    }

    /**
     * API to post power of attorney data for the user
     * this single API can be used for all post request for power-of-attorney
     */
    postPoaDetails(data): Observable<any> {
        return this.httpClient.post(`${environment.API_URL + 'user/post-poa-user-data'}` , data);
    }
}
