import { Component, OnInit } from '@angular/core';
import {UserAuthService} from '../../user-auth/user-auth.service';
import {Router} from '@angular/router';

@Component({
  selector: 'app-full-layout',
  templateUrl: './full-layout.component.html',
  styleUrls: ['./full-layout.component.css']
})
export class FullLayoutComponent implements OnInit {

  isLogIn: boolean = false;
  menutogle: boolean = false;

  constructor( private authService: UserAuthService, private router: Router) { }

  ngOnInit() {

    this.isLogIn = this.authService.isAuthenticated();
  }
  onLogout() {
    localStorage.removeItem('loggedInUser');
    this.router.navigate(['/']);
    this.isLogIn = false ;
  }

  menuOpen(){
    this.menutogle = !this.menutogle;
  }

}
