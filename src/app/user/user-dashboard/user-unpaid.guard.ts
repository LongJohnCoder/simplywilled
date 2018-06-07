import { Injectable } from '@angular/core';
import {CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, Router} from '@angular/router';
import { Observable } from 'rxjs/Observable';
import {UserAuthService} from '../user-auth/user-auth.service';
import * as jwt_decode from 'jwt-decode';

@Injectable()
export class UserUnPaidGuard implements CanActivate {
    constructor(private authService: UserAuthService, private router: Router ) { }

    canActivate(
        next: ActivatedRouteSnapshot,
        state: RouterStateSnapshot): Observable<boolean> | Promise<boolean> | boolean {
        // return true;

        const token = JSON.parse(localStorage.getItem('loggedInUser')).token;
        const userPackage = jwt_decode(token).package;
        // console.log(userPackage);
        if (userPackage === null || userPackage === undefined) {
            return true;
        } else {
            this.router.navigate(['/dashboard']);
            return false;
        }
    }


}
