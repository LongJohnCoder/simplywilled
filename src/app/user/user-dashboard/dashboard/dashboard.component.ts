import { Component, OnInit } from '@angular/core';
import {UserService} from '../../user.service';
import {Router} from '@angular/router';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {
    loggedInUser: any;
  constructor(
      private userService: UserService,
      private router: Router
  ) { }

  ngOnInit() {
      this.loggedInUser = JSON.parse(localStorage.getItem('loggedInUser'));
  }

    onLogOut() {
      this.userService.logout().subscribe(
          (data: any) => {
              localStorage.removeItem('loggedInUser');
              this.router.navigate(['/']);
          },
          (error: any) => {
              console.log(error);
          }
      );
    }

}
