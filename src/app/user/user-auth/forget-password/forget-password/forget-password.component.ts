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
    showLoader: boolean;
  constructor(
      private userService: UserService
  ) { }

  ngOnInit() {
      this.showLoader = false;
  }

  resetPassSubmit() {
      this.showLoader = true;
      this.userService.forgetPassword({email: this.email}).subscribe(
          (response: any) => {
                  this.responseType = true;
                  this.responseMsg = response.message;
              this.showLoader = false;

          }, (error: any) => {
            this.responseType = false;
            this.responseMsg = error.error.message;
              this.showLoader = false;

          }
      );
  }
}
