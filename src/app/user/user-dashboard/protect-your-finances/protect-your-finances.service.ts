import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs/Observable';
import { environment } from '../../../../environments/environment.prod';

@Injectable()
export class ProtectYourFinancesService {

  constructor(
      private httpClient: HttpClient
  ) { }

    getStates() : Observable<any>{
        let url = `${environment.API_URL + 'user/get-state-info'}`;
        return this.httpClient.get(url);
    }

    getPoaDetails() : Observable<any>{
        let url = `${environment.API_URL + 'user/get-poa-user-data'}`;
        return this.httpClient.get(url);
    }

    postPoaDetails(data) : Observable<any>{
        let url = `${environment.API_URL + 'user/post-poa-user-data'}`;
        return this.httpClient.post(url,data);
    }
}
