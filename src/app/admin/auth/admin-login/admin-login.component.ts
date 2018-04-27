import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Response } from '@angular/http';
import { Router } from '@angular/router';

import { LoginService } from './admin-login.service';
import {AuthService} from "../auth.service";

@Component({
  selector: 'app-admin-login',
  templateUrl: './admin-login.component.html',
  styleUrls: ['./admin-login.component.css'],
  
})
export class AdminLoginComponent implements OnInit {




  responseReceived = false; // Track is some response has been recieved or not
	loginRequestStatus = false; // Track response of login request
	showLoader = false; // Track if loader should be shown or not
	loginRequestResponseMsg: string; // Store success or error message from backend depending on response

  //public showLoader : boolean = false;
  constructor( private loginService: LoginService,
              private router: Router,
  
  ) { }

  ngOnInit() {}

    onSubmit( formSignIn: NgForm ) {
        this.showLoader = true;
        //console.log(formSignIn);

        const body = {
          email : formSignIn.value.email,
          password : formSignIn.value.password
        };

        this.loginService.login( body )
        .subscribe(
          ( response: any ) => {
            //console.log(response);
            if(response.status){
					    localStorage.setItem( 'loggedInAdminData', JSON.stringify(response) );
              this.loginRequestStatus = true;
					    this.loginRequestResponseMsg = response.message;

              formSignIn.reset();
              this.router.navigate( [ '/admin-panel/dashboard' ] );

            }else {
					      this.loginRequestStatus = false;
					      this.loginRequestResponseMsg = response.error;
				    }
    
              
            
          }
        );
   }
}
