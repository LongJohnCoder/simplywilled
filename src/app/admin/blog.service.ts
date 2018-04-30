import { Injectable } from '@angular/core';
import { HttpClient } from "@angular/common/http";
import { environment } from './../../environments/environment.prod';
import { Observable } from 'rxjs/Observable';

@Injectable()
export class BlogService {

  constructor( private httpClient: HttpClient ) {

  }

    createBlogCategory(createBlogCategoryBody):Observable<any>{
        return this.httpClient.post(environment.API_URL + 'admin-panel/create-category', createBlogCategoryBody);
    }



}
