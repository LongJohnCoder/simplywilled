import { HttpClient } from "@angular/common/http";
import { Injectable } from '@angular/core';

import { environment } from '../../../../environments/environment.prod';
import { Observable } from 'rxjs/Observable';

@Injectable()
export class ChangePasswordService {
	

	constructor( private httpClient: HttpClient ) { }
	

	resetPass( body1: { new_password: string, confirm_password: string } ): Observable<any> {
		return this.httpClient.post( environment.API_URL + 'admin-panel/change-password', body1  );
	}

}