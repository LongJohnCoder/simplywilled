import { Component, OnInit } from '@angular/core';
import {UserService} from '../../../user.service';

@Component({
  selector: 'app-forget-password',
  templateUrl: './forget-password.component.html',
  styleUrls: ['./forget-password.component.css']
})
export class ForgetPasswordComponent implements OnInit {
  email: string;
  responseType: boolean;
  responseMsg: string;
  constructor(
      private userService: UserService
  ) { }

  ngOnInit() {
  }

  resetPassSubmit() {
      this.userService.forgetPassword({email: this.email}).subscribe(
          (response: any) => {
              if (response.status === 'true' ) {
                  this.responseType = true;
                  this.responseMsg = response.message;
              } else {
                  this.responseType = false;
                  this.responseMsg = response.message;
              }
          }, (error: any) => {
            this.responseType = false;
            this.responseMsg = error.error.message;
          }
      );
  }
}
