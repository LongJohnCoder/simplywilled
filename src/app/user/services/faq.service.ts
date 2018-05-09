import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Observable} from 'rxjs/Observable';
import {environment} from '../../../environments/environment.prod';

@Injectable()
export class FaqService {

  constructor(
      private httpClient: HttpClient
  ) { }

    getFaqCategories(): Observable<any>{
        let url = `${environment.API_URL + 'user/faq-category-list'}`;
        console.log('url is : ',url);
        return this.httpClient.get(url);
    }

    getFaqQuestions(): Observable<any>{
        let url = `${environment.API_URL + 'user/all-faq-questions'}`;
        console.log('url is : ',url);
        return this.httpClient.get(url);
    }
}
