import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Response } from '@angular/http';
import { Router, ActivatedRoute } from '@angular/router';

import { ChangePasswordService } from "./change-password.service";

@Component({
  selector: 'app-change-password',
  templateUrl: './change-password.component.html',
  styleUrls: ['./change-password.component.css']
})
export class ChangePasswordComponent implements OnInit {


   constructor( private changePassService: ChangePasswordService,
              private router: Router,
              private route: ActivatedRoute 
  ) { }

  ngOnInit() {
  }


  onSubmit( formChangePass: NgForm ) {
        //this.showLoader = true;
        
        const body1 = {
          new_password : formChangePass.value.newPassword,
          confirm_password : formChangePass.value.cnfPassword
        };
        
      
        this.changePassService.resetPass( body1 )
        .subscribe(
          ( response: Response ) => {
            //console.log(body);
            if(response.status){


            }else {
					    
				    }
    
              formChangePass.reset();
              localStorage.removeItem('loggedInAdminData');
              this.router.navigate( [ '/admin-panel/login' ] );
            
          }
        );
   }

}
