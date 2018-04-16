import {
HttpErrorResponse, HttpEvent, HttpHandler, HttpInterceptor, HttpRequest,
HttpResponse
} from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs/Observable';
import { Router } from "@angular/router";
import "rxjs/add/operator/do";

import { AuthService } from "./auth.service";

@Injectable()
export class AuthInterceptor implements HttpInterceptor {


    constructor( private router: Router, private authService: AuthService) { }

    intercept( req: HttpRequest<any>, next: HttpHandler ): Observable<HttpEvent<any>> {
        let copiedReq = req;
        if (this.authService.isAuthenticated()) {
            let token = this.authService.getToken().token;
            console.log('token',token);
            copiedReq = req.clone({ headers: req.headers.set('Authorization', "Bearer " + token) } );
        }
        return next.handle(copiedReq)
        .do(
            ( event: HttpEvent<any> ) => {
                if ( event instanceof HttpResponse ) {
                    // do stuff with response if you want
                }
            },
            ( err: any ) => {
                if ( err instanceof HttpErrorResponse ) {
                    if ( err.status === 401) {

                        localStorage.removeItem( 'loggedInAdminData' );
                        this.router.navigate( [ '/admin-panel/login' ] );
                    }
                }
            }
        );
    }

}