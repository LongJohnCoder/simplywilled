import { Injectable } from '@angular/core';
import {CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, Router, CanDeactivate} from '@angular/router';
import { Observable } from 'rxjs/Observable';
import {UserAuthService} from '../user-auth/user-auth.service';

@Injectable()
export class UserPaidGuard implements CanActivate {
    constructor(private authService: UserAuthService, private router: Router ) { }

    canActivate(
    next: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean> | Promise<boolean> | boolean {
    // return true;
      if (this.authService.isPaid()) {
          return true;
      } else {
          this.router.navigate(['/dashboard/packages']);
          return false;
      }
  }


}
