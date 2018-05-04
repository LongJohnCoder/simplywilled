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


<<<<<<< HEAD
    getBlog(id: number): Observable<any> {
        const url = `${environment.API_URL+'admin-panel/view-blog'}/${id}`;
        return this.httpClient.get(url);
    }


=======
>>>>>>> 1f808132402bdbc22ecaebe55a3b7aab03b59ddf

}
