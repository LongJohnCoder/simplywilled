import { Injectable } from '@angular/core';
import {ActivatedRouteSnapshot, CanActivate, CanActivateChild, Router, RouterStateSnapshot} from '@angular/router';
import { Observable } from 'rxjs/Observable';

import { AuthService } from './auth.service'

@Injectable()
export class AuthGuard implements CanActivate, CanActivateChild {

  constructor(private authService: AuthService, private router: Router ) { }

  canActivate(
    next: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean> | Promise<boolean> | boolean {
    if (this.authService.isAuthenticated()) {
			return true;
		} else {
			this.router.navigate(['/admin-panel/login']);
			return false;
		}
  }

  canActivateChild() {
		if (this.authService.isAuthenticated()) {
			return true;
		} else {
			this.router.navigate(['/admin-panel/login']);
			return false;
		}
	}

}
