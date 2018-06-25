import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Observable} from 'rxjs/Observable';
import {environment} from '../../../environments/environment';

@Injectable()
export class BlogService {

    constructor(
        private httpClient: HttpClient
    ) { }

    blogList(page: number): Observable <any> {
        return this.httpClient.get(environment.API_URL + 'user/blog-list?page=' + page);
    }

    getBlogDetails(slug: string): Observable <any> {
        return this.httpClient.get(environment.API_URL + 'user/view-blog/?query=' + slug );
    }

    getBlogCategoryList(): Observable <any> {
        return this.httpClient.get(environment.API_URL + 'user/blog-category-list');
    }

    getBlogDetailsFromCategory(slug: string, page: number): Observable <any> {
        return this.httpClient.get(environment.API_URL + 'user/get-blog-details?query=' + slug + '&page=' + page);
    }

    getPopularBlogPosts(): Observable <any> {
        return this.httpClient.get(environment.API_URL + 'user/popular-post');
    }

    getRecentBlogPosts(): Observable <any> {
        return this.httpClient.get(environment.API_URL + 'user/latest-post');
    }

    makeBlogComment(commentData): Observable <any> {
        return this.httpClient.post(environment.API_URL + 'user/comment', commentData);
    }

    subscribeEmailNewsletter(subscriberEmail): Observable <any> {
        return this.httpClient.post(environment.API_URL + 'user/create-newsletter-subscriber', subscriberEmail);
    }
}
