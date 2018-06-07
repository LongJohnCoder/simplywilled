import { Location } from '@angular/common';
import { States } from './../../shared/models/states.model';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router, NavigationEnd, NavigationStart } from '@angular/router';
import { UserService } from '../../user.service';
import { FormsModule } from '@angular/forms';
import 'rxjs/add/operator/pairwise';

@Component({
  selector: 'app-ch-password',
  templateUrl: './change-password.component.html',
  styleUrls: ['./change-password.component.css']
})
export class ChangePasswordComponent implements OnInit {
  successMsg: string;
  errorMsg: string;
  previousUrl: string;

  constructor(
      private userService: UserService,
      private router: Router,
      private loc: Location
  ) {
  }

  ngOnInit() {
      this.successMsg = null;
  }

  setStructure(): any {
    return {
      'new_password' : null,
      'old_password' : null,
      'confirm_passowrd' : null
    };
  }

  goBack() {
    this.loc.back();
  }

  submit(FormData: any) {
    console.log(FormData.value);
    this.userService.changePasswordSubmit(FormData.value).subscribe(
      (response: any) => {
        if (response.status) {
          console.log('response : ', response.message);
          this.successMsg = response.message;
          this.errorMsg = null;
          FormData.reset();
          // FormData.value = this.setStructure();
        } else {
          this.successMsg = null;
          this.errorMsg = response.message;
          FormData.reset();
          // FormData.value = this.setStructure();
        }
        console.log('response : ', response);
      }, (error: any) => {
        console.log('err : ', error.error.message);
        this.successMsg = null;
        this.errorMsg = error.error.message;
        FormData.reset();
        // console.log('err : ', error.HttpErrorResponse.error.message);
      }
    );
  }
}
