import { Component, OnInit } from '@angular/core';
import { AuthService } from './../../auth/auth.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {

  constructor(
    private authService : AuthService, 
    private router:Router, 
  ) { }

  ngOnInit() {
    
  }

  signOut(){
    this.authService.logOut().subscribe(
      (response: any) => {
        if(response.status){
          localStorage.removeItem('loggedInAdminData');
          this.router.navigate(['/admin-panel/login'])
        }
      }
    );
  }

}
