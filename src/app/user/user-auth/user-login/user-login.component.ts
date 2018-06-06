import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Router } from '@angular/router';
import { HttpErrorResponse } from '@angular/common/http';
import { UserService } from '../../user.service';

@Component({
  selector: 'app-user-login',
  templateUrl: './user-login.component.html',
  styleUrls: ['./user-login.component.css']
})
export class UserLoginComponent implements OnInit {

  constructor( private loginService: UserService , private router: Router ) { }

  showLoader: boolean;
  responseReceived: boolean;
  loginRequestStatus: boolean;
  loginRequestResponseMsg: string;

  ngOnInit() {
    this.showLoader  = false;
    this.responseReceived = false;
    this.loginRequestStatus = false;
    this.loginRequestResponseMsg = '';
  }

  /**
   * this function logs user in
   * @param {NgForm} formSignIn
   */
  onSubmit( formSignIn: NgForm ) {
    this.showLoader = true;
    const body = {
      email: formSignIn.value.email,
      password: formSignIn.value.password
    };


    this.loginService.login( body )
    .subscribe(
      ( response: any ) => {

        this.showLoader = false;
        if (response.status) {
          localStorage.setItem( 'loggedInUser', JSON.stringify(response) );
          this.router.navigate(['/dashboard']);
        } else {
          this.loginRequestStatus = false;
          this.loginRequestResponseMsg = 'error';
        }
      },
      ( error: HttpErrorResponse ) => {
        console.log(error);
        this.loginRequestStatus = false;
        //this.loginRequestResponseMsg = error.error.message;
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
