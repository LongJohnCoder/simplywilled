import { Component, OnInit } from '@angular/core';
import {UserAuthService} from '../../user-auth/user-auth.service';

@Component({
  selector: 'app-full-layout',
  templateUrl: './full-layout.component.html',
  styleUrls: ['./full-layout.component.css']
})
export class FullLayoutComponent implements OnInit {

  isLogIn: boolean = false;

  constructor( private authService: UserAuthService) { }

  ngOnInit() {

    this.isLogIn = this.authService.isAuthenticated();
  }

}
