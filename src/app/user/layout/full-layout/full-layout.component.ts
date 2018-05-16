import { Component, OnInit } from '@angular/core';
import {UserAuthService} from '../../user-auth/user-auth.service';
import { Router, NavigationEnd } from '@angular/router';

@Component({
  selector: 'app-full-layout',
  templateUrl: './full-layout.component.html',
  styleUrls: ['./full-layout.component.css']
})
export class FullLayoutComponent implements OnInit {

  isLogIn: boolean;
  menutogle: boolean;
  goUp:boolean = false;

  constructor( private authService: UserAuthService, private router: Router) { 
    router.events
      .filter(event => event instanceof NavigationEnd)
      .subscribe((event: NavigationEnd) => {
        window.scroll(0, 0);
        if(event.urlAfterRedirects == '/about-us?id=our-team'){
          let h:any = document.getElementById('ourTeam').offsetTop;
          window.scroll(0, h);
        }
      });
  }

  ngOnInit() {
    this.isLogIn = this.authService.isAuthenticated();
    this.menutogle = false;
    window.addEventListener('scroll', this.scroll, true);
  }

  scroll = (): void => {
    if(window.scrollY > 500){
      this.goUp = true;
    }else{
      this.goUp = false;
    }
  };

  goToTop(){
    window.scroll(0, 0);
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

  /**
   * function for toggeling the nav bar in modile view
   */
  menuOpen() {
    this.menutogle = !this.menutogle;
  }

  

}
