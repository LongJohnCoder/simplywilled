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
      const url = `${environment.API_URL + 'admin-panel/faq-category-list'}`;
      return this.httpClient.get(url);
  }

    getCategory(id: number): Observable<any> {
        const url = `${environment.API_URL + 'admin-panel/view-faq-category'}/${id}`;
        return this.httpClient.get(url);
    }

    createBlogCategory(createFAQCategoryBody): Observable<any> {
        return this.httpClient.post(environment.API_URL + 'admin-panel/create-faq-category', createFAQCategoryBody);
    }

    updateFAQCategory(updateFAQCategoryBody): Observable<any> {
        return this.httpClient.post(environment.API_URL + 'admin-panel/edit-faq-category', updateFAQCategoryBody);
    }

    deleteFaqCat(id: number): Observable<any> {
        return this.httpClient.delete(environment.API_URL + 'admin-panel/delete-faq-category/' + id);
    }

    faqList(): Observable<any> {
        const url = `${environment.API_URL + 'admin-panel/faq-list'}`;
        return this.httpClient.get(url);
    }

    deletefaq(id: number): Observable<any> {
        return this.httpClient.delete(environment.API_URL + 'admin-panel/delete-faq/' + id);
    }

    faqDetails(id: number): Observable<any> {
        const url = `${environment.API_URL + 'admin-panel/view-faq'}/${id}`;
        return this.httpClient.get(url);
    }
}
