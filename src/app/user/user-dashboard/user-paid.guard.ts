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
        console.log(this.authService.isPaid());
      if (this.authService.isPaid()) {
          console.log(111);
          return true;
      } else {
          console.log(222);

          this.router.navigate(['/dashboard/packages']);
          return false;
      }
  }


}
