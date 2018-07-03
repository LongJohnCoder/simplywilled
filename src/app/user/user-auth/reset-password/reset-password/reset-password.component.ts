import { Component, OnInit } from '@angular/core';
import {ActivatedRoute, Router} from '@angular/router';
import {UserService} from '../../../user.service';

@Component({
  selector: 'app-reset-password',
  templateUrl: './reset-password.component.html',
  styleUrls: ['./reset-password.component.css']
})
export class ResetPasswordComponent implements OnInit {
  email: string;
  token: string;
  password: string;
  confirmPassword: string;
  respType: boolean;
  respMsg: string;
    showLoader: boolean;

    constructor(
      private route: ActivatedRoute,
      private userService: UserService,
      private router: Router,

  ) { }

  ngOnInit() {
      this.showLoader  = false;
      this.email = this.route.snapshot.paramMap.get('email');
      this.token = this.route.snapshot.paramMap.get('token');
  }

    resetSubmit() {
        this.showLoader = true;
      const data = {
          email: this.email, token: this.token,
          password: this.password, confirm_password: this.confirmPassword
      };
        this.userService.resetPasswordSubmit(data).subscribe(
            (response: any) => {
                this.respType = true;
                this.respMsg = response.message;
                this.showLoader = false;

                setTimeout(() => {
                    this.router.navigate(['/sign-in']);
                }, 2000);

            }, (error: any) => {
                this.respType = false;
                this.respMsg = error.error.message;
                this.showLoader = false;

            }
        );
    }

}
