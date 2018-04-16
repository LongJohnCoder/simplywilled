import { Component, OnInit } from '@angular/core';
import { AuthService } from '../auth/auth.service';
import { Router } from '@angular/router';
import { DashboardService } from './dashboard.service';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {

  blogs:any;

  constructor(
    private authService : AuthService, 
    private router:Router, 
    private dashService : DashboardService
  ) { }

  ngOnInit() {
    this.dashService.blogView().subscribe(
      (data:any)=> {
        this.blogs = data.data;
        console.log('blog',this.blogs)
    }
    )
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
