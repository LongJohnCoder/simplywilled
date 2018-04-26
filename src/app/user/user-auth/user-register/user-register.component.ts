import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { HttpErrorResponse } from '@angular/common/http';
import { UserService } from '../../user.service';

@Component({
  selector: 'app-user-register',
  templateUrl: './user-register.component.html',
  styleUrls: ['./user-register.component.css']
})
export class UserRegisterComponent implements OnInit {

  constructor( private userService: UserService ) { }

  showLoader: boolean              = false;
  responseReceived: boolean        = false;
  loginRequestStatus: boolean      = false;
  loginRequestResponseMsg: string  = '';


  ngOnInit() {
  }

  /** Function call on submit of register */

  onSubmit( formRegister: NgForm ) {
    this.showLoader = true;
    console.log(formRegister.value);
    this.userService.register( formRegister.value )
    .subscribe(
      ( response: any ) => {

        this.showLoader = false;
        if(response.status){

          localStorage.setItem( 'loggedInUser', JSON.stringify(response) );
        } else {

          this.loginRequestStatus = false;
          this.loginRequestResponseMsg = 'error';
        }
      },
      ( error: HttpErrorResponse ) => {
        console.log(error);
        this.loginRequestStatus = false;
        this.loginRequestResponseMsg = 'error';
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

}
