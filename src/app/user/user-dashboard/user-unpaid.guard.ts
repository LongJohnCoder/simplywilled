import { Injectable } from '@angular/core';
import {CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, Router} from '@angular/router';
import { Observable } from 'rxjs/Observable';
import {UserAuthService} from '../user-auth/user-auth.service';

@Injectable()
export class UserUnPaidGuard implements CanActivate {
    constructor(private authService: UserAuthService, private router: Router ) { }

    canActivate(
        next: ActivatedRouteSnapshot,
        state: RouterStateSnapshot): Observable<boolean> | Promise<boolean> | boolean {
        // return true;
        console.log(this.authService.isPaid());
        if (this.authService.isPaid()) {
            this.router.navigate(['/dashboard']);
            return false;
        } else {
            return true;
        }
    }


}
