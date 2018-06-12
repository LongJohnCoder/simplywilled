import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, Router } from '@angular/router';
import { Observable } from 'rxjs/Observable';
import { UserAuthService } from './user-auth.service';

@Injectable()
export class UserAuthGuard implements CanActivate {
  constructor(private authService: UserAuthService, private router: Router ) { }

  canActivate(
    next: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean> | Promise<boolean> | boolean {
    if (this.authService.isAuthenticated()) {
        // if (this.authService.isPaid()) {
        //     return true;
        // } else {
        //     this.router.navigate(['/dashboard/packages']);
        //     return false;
        // }
      return true;
    } else {
      this.router.navigate(['/']);
      return false;
    }
  }

    canActivateChild() {
        if (this.authService.isAuthenticated()) {
            return true;
        } else {
            this.router.navigate(['/']);
            return false;
        }
    }
}
