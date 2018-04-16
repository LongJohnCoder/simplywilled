
import { HttpClient } from "@angular/common/http";
import { Injectable } from '@angular/core';

import { environment } from '../../../environments/environment.prod';
import { Observable } from 'rxjs/Observable';

@Injectable()
export class DashboardService {
	

	constructor( private httpClient: HttpClient ) { }

	blogView():Observable<any>{
		return this.httpClient.get(environment.API_URL + 'admin-panel/blog-list', {});
	}

}