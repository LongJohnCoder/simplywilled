
import { HttpClient } from "@angular/common/http";
import { Injectable } from '@angular/core';

import { environment } from './../../environments/environment.prod';
import { Observable } from 'rxjs/Observable';

@Injectable()
export class DashboardService {
	

	constructor( private httpClient: HttpClient ) { }

	dashboard():Observable<any>{
		return this.httpClient.get(environment.API_URL + 'admin-panel/dashboard');
	}

	blogList():Observable<any>{
		return this.httpClient.get(environment.API_URL + 'admin-panel/blog-list');
	}

	deleteBlog(delBlogId):Observable<any>{
		return this.httpClient.delete(environment.API_URL + 'admin-panel/delete-blog/' + delBlogId);
	}

	createBlog(createBlogBody):Observable<any>{
		return this.httpClient.post(environment.API_URL + 'admin-panel/create-blog', createBlogBody);
	}

    blogCategoryList():Observable<any>{
		return this.httpClient.get(environment.API_URL + 'admin-panel/category-list');
	}


    editBlog(createBlogBody):Observable<any>{
        return this.httpClient.post(environment.API_URL + 'admin-panel/edit-blog', createBlogBody);
    }

}


