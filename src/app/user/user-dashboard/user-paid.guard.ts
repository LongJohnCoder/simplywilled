import { Injectable } from '@angular/core';
import {CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, Router, CanDeactivate} from '@angular/router';
import { Observable } from 'rxjs/Observable';
import * as jwt_decode from 'jwt-decode';

@Injectable()
export class UserPaidGuard implements CanActivate {
    constructor( private router: Router ) { }

    canActivate(
    next: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean> | Promise<boolean> | boolean {
    // return true;

        const token = JSON.parse(localStorage.getItem('loggedInUser')).token;
        const userPackage = jwt_decode(token).package;
        console.log(userPackage);
        if (userPackage === null || userPackage === undefined) {
            this.router.navigate(['/dashboard/packages']);
            return false;
        } else {
            return true;
        }

    }


}
