import { Injectable } from '@angular/core';
import { ActivatedRouteSnapshot, CanActivate, Router, RouterStateSnapshot } from '@angular/router';
import { Observable } from 'rxjs/Observable';
import { UserAuthService } from './user-auth.service';

@Injectable()
export class NotUserAuthGuard implements CanActivate {

  constructor( private authService: UserAuthService, private router: Router ) { }

  canActivate(next: ActivatedRouteSnapshot,
              state: RouterStateSnapshot  ): Observable<boolean> | Promise<boolean> | boolean {
    if ( this.authService.isAuthenticated() ) {
      this.router.navigate( [ '/dashboard' ] );
      return false;
    } else {
      return true;
    }
  }
}
