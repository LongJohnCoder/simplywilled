import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Response } from '@angular/http';
import { Router, ActivatedRoute } from '@angular/router';

import { ResetPasswordService } from "./reset-password.service";

@Component({
  selector: 'app-reset-password',
  templateUrl: './reset-password.component.html',
  styleUrls: ['./reset-password.component.css']
})
export class ResetPasswordComponent implements OnInit {


   constructor( private resetPassService: ResetPasswordService,
              private router: ResetPasswordService,
              private route: ActivatedRoute 
  ) { }

  ngOnInit() {
  }

  formResetPass       : string  = '';

  onSubmit( formResetPass: NgForm ) {
        //this.showLoader = true;
        console.log(formResetPass);
     
          
          this.route.params.subscribe(params => { this.formResetPass = params['token'] });
          formResetPass.value.token = this.formResetPass;
      
        this.resetPassService.resetPass( formResetPass.value )
        .subscribe(
          ( response: Response ) => {
            //console.log(body);
            if(response.json().status){
					    //localStorage.setItem( 'loggedInAdminData', JSON.stringify(response.json()) );
              //this.loginRequestStatus = true;
					    //this.loginRequestResponseMsg = response.json().message;


            }else {
					    //this.loginRequestStatus = false;
					    //this.loginRequestResponseMsg = response.json().error;
				    }
    
              formResetPass.reset();
              //this.router.navigate( [ '/admin-panel/login' ] );
            
          }
        );
   }

}
