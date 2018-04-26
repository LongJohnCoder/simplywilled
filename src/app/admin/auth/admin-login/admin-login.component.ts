import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Router } from '@angular/router';

import { LoginService } from './admin-login.service';
import { HttpErrorResponse } from '@angular/common/http';

@Component({
  selector: 'app-admin-login',
  templateUrl: './admin-login.component.html',
  styleUrls: ['./admin-login.component.css'],
})
export class AdminLoginComponent implements OnInit {

  showLoader              = false; // Track if loader should be shown or not
  responseReceived        = false; // Track is some response has been recieved or not
  loginRequestStatus      = false; // Track response of login request
  loginRequestResponseMsg = ''; // Store success or error message from backend depending on response

  constructor( private loginService: LoginService, private router: Router) { }

  ngOnInit() {}

  onSubmit( formSignIn: NgForm ) {
    this.showLoader = true;
    console.log(formSignIn);

    const body = {
      email : formSignIn.value.email,
      password : formSignIn.value.password
    };

    this.loginService.login( body )
    .subscribe(
      ( response: any ) => {
        this.responseReceived = true;
        if ( response.status ) {
          localStorage.setItem( 'loggedInAdminData', JSON.stringify(response) );
          this.loginRequestStatus = true;
          this.loginRequestResponseMsg = response.message;
          this.router.navigate( [ '/admin-panel/dashboard'] );
        } else {
          this.loginRequestStatus = true;
          this.loginRequestResponseMsg = response.message;
        }
      }, ( error: HttpErrorResponse ) => {
        this.loginRequestStatus = false;
        this.loginRequestResponseMsg = error.error.error;
        this.showLoader = false;
        this.responseReceived = true;
        setTimeout( () => {
          this.responseReceived = false;
        }, 5000);
      },
      () => {

        formSignIn.reset();
      }
    );
  }
}
