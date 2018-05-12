import { Component, OnInit } from '@angular/core';
import {UserAuthService} from '../../user-auth/user-auth.service';
import {Router} from '@angular/router';

@Component({
  selector: 'app-full-layout',
  templateUrl: './full-layout.component.html',
  styleUrls: ['./full-layout.component.css']
})
export class FullLayoutComponent implements OnInit {

  isLogIn: boolean;
  menutogle: boolean;

  constructor( private authService: UserAuthService, private router: Router) { }

  ngOnInit() {
    this.isLogIn = this.authService.isAuthenticated();
    this.isLogIn = false;
    this.menutogle = false;
  }
  /**
   * this function hits when user log out
   */
  onLogout() {
    localStorage.removeItem('loggedInUser');
    localStorage.removeItem('_loggedInToken');
    this.router.navigate(['/']);
    this.isLogIn = false ;
  }

  menuOpen() {
    this.menutogle = !this.menutogle;
  }

}
