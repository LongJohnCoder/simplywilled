import { HttpErrorResponse } from '@angular/common/http';
import { Subscription } from 'rxjs/Subscription';
import { AuthService } from './../admin/auth/auth.service';
import { UserAuthService } from './user-auth/user-auth.service';
import { Component, OnInit, OnDestroy } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-user',
  templateUrl: './user.component.html',
  styleUrls: ['./user.component.css']
})
export class UserComponent implements OnInit, OnDestroy {

  constructor(private authService: UserAuthService, private router: Router) {
    if (!this.authService.isAuthenticated()) {
      localStorage.removeItem( 'loggedInUser' );
      this.router.navigate( [ '/register' ] );
    }
   }

  ngOnInit() {
  }

  ngOnDestroy() {
  }
}
