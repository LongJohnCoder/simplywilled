import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { HttpErrorResponse } from '@angular/common/http';
import { UserService } from '../../user.service';
import { Router } from '@angular/router';

declare var dataLayer: any;

@Component({
  selector: 'app-user-register',
  templateUrl: './user-register.component.html',
  styleUrls: ['./user-register.component.css']
})
export class UserRegisterComponent implements OnInit {

  constructor( private userService: UserService , private router: Router) { }

  showLoader: boolean;
  responseReceived: boolean;
  setRequestStatus: boolean;
  setResponseMsg: string;
  termsCheck: boolean;

  ngOnInit() {
    this.showLoader =  false;
    this.responseReceived = false;
    this.setRequestStatus = false;
    this.setResponseMsg = '';
    this.termsCheck = false;
  }

  /**
   * this function logs user in
   * @param {NgForm} formRegister
   */
  onSubmit( formRegister: NgForm ) {
    this.showLoader = true;
    this.userService.register( formRegister.value )
    .subscribe(
      ( response: any ) => {
        this.showLoader = false;
        if (response !== undefined && response.status !== undefined && response.status) {
            dataLayer.push({'event':'registered', 'userId': response.user.id});  
            localStorage.setItem( 'loggedInUser', JSON.stringify(response) );
            localStorage.setItem('_loggedInToken', response.token);
            this.router.navigate(['/dashboard']);
        } else {
            this.setRequestStatus = false;
            this.setResponseMsg = 'Some error occured';
        }
      },
      ( error: HttpErrorResponse ) => {
        this.setRequestStatus = false;
        this.setResponseMsg = error.error.error;
        this.showLoader = false;
        this.responseReceived = true;
        setTimeout( () => {
          this.responseReceived = false;
        }, 5000);
      },
      () => {

        formRegister.reset();
      }
    );
  }

  termsCondition() {
    console.log(123);
    console.log(this.termsCheck);
  }
}
