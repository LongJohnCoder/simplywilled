import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Observable} from 'rxjs/Observable';
import {environment} from '../../../environments/environment.prod';

@Injectable()
export class BlogService {

    constructor(
        private httpClient: HttpClient
    ) { }

    blogList():Observable<any>{
        return this.httpClient.get(environment.API_URL + 'user/blog-list');
    }

    getBlogDetails(slug: string):Observable<any>{
        return this.httpClient.get(environment.API_URL + 'user/view-blog/?query='+slug );
    }

    getBlogCategoryList():Observable<any>{
        return this.httpClient.get(environment.API_URL + 'user/blog-category-list');
    }

    getBlogDetailsFromCategory(slug: string):Observable<any>{
        return this.httpClient.get(environment.API_URL + 'user/get-blog-details/?query='+slug );
    }

    getPopularBlogPosts():Observable<any>{
        return this.httpClient.get(environment.API_URL + 'user/popular-post');
    }

    getRecentBlogPosts():Observable<any>{
        return this.httpClient.get(environment.API_URL + 'user/latest-post');
    }

}
