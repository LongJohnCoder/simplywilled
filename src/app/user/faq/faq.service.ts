import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Observable} from 'rxjs/Observable';
import {environment} from '../../../environments/environment';

@Injectable()
export class FaqService {

  constructor(
      private httpClient: HttpClient
  ) { }

    getFaqCategories(search : string = null): Observable<any>{
        console.log('search : '+search)
        let url = `${environment.API_URL}user/faq-category-list`;
        url = search != null ? `${url}/?query=${search}` : url;
        console.log('url is : ',url);
        return this.httpClient.get(url);
    }

    getFaqQuestions(): Observable<any>{
        let url = `${environment.API_URL + 'user/all-faq-questions'}`;
        console.log('url is : ',url);
        return this.httpClient.get(url);
    }

    // getFaqCategoriesQa( search: string ): Observable<any> {
    //     let url = `${environment.API_URL + 'user/faq-category-list/?query='+${search}}`;
    //     //url = search != '' ? `${url}/?query=${search}'}` : url;
    //     console.log('search url is : ',url);
    //     return this.httpClient.get(url);
    //   }


}
