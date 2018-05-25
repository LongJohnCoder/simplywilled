import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {environment} from '../../../environments/environment';
import {Observable} from 'rxjs/Observable';

@Injectable()
export class PackageService {

  constructor(
      private httpClient: HttpClient
  ) { }

    packages(): Observable<any> {
        const url = `${environment.API_URL + 'admin-panel/get-packages'}`;
        return this.httpClient.get(url);
    }

    updatePackage(data: any): Observable<any> {
        return this.httpClient.post(environment.API_URL + 'admin-panel/edit-package', data);
    }

    deletePackage(id: number): Observable<any> {
        return this.httpClient.delete(environment.API_URL + 'admin-panel/delete-package/' + id);
    }

    addPackage(data: any): Observable<any> {
        return this.httpClient.post(environment.API_URL + 'admin-panel/create-package', data);
    }
}
