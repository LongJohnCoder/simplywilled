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


    getCategory(id: number): Observable<any> {
        const url = `${environment.API_URL+'admin-panel/view-category'}/${id}`;
        return this.httpClient.get(url);
    }



    updateBlogCategory(updateBlogCategoryBody):Observable<any>{
        return this.httpClient.post(environment.API_URL + 'admin-panel/edit-category', updateBlogCategoryBody);
    }

    getBlog(id: number): Observable<any> {
        const url = `${environment.API_URL+'admin-panel/view-blog'}/${id}`;
        return this.httpClient.get(url);
    }

    deleteBlogCat(id: number): Observable<any>{
        return this.httpClient.delete(environment.API_URL + 'admin-panel/delete-category/' + id);
    }

    comments(): Observable<any> {
        return this.httpClient.get(environment.API_URL + 'admin-panel/comments-list/');
    }

    deleteComment(id: number): Observable<any> {
        return this.httpClient.delete(environment.API_URL + 'admin-panel/delete-comment/' + id);
    }

    updateComment(createcomment): Observable<any> {
        return this.httpClient.post(environment.API_URL + 'admin-panel/edit-comment', createcomment);
    }

}
