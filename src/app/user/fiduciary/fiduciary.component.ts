import { Component, OnInit } from '@angular/core';
import {ActivatedRoute, Router} from '@angular/router';
import {UserService} from '../user.service';
import {NgForm} from '@angular/forms';
import {HttpErrorResponse} from '@angular/common/http';

@Component({
  selector: 'app-fiduciary',
  templateUrl: './fiduciary.component.html',
  styleUrls: ['./fiduciary.component.css']
})
export class FiduciaryComponent implements OnInit {
  isAccepted: boolean;
  userName: string;
    showLoader: boolean;
    responseReceived: boolean;
    setRequestStatus: boolean;
    setResponseMsg: string;

  constructor(
      private route: ActivatedRoute,
      private userService: UserService,
      private router: Router
  ) { }

  ngOnInit() {
      const statusType = this.route.snapshot.paramMap.get('type');
      const token = this.route.snapshot.paramMap.get('token');
      this.isAccepted = statusType === 'accept';
      this.userService.fiduciaryOfUser({'token': token}).subscribe(
          (resp: any) => {
            this.userName = resp.data.userName;
          }, (err: any) => {
            this.userName = '';
          }
      );
      this.showLoader =  false;
      this.responseReceived = false;
      this.setRequestStatus = false;
      this.setResponseMsg = '';
  }

    onSubmit( formRegister: NgForm ) {
        this.showLoader = true;
        this.userService.register( formRegister.value )
            .subscribe(
                ( response: any ) => {
                    this.showLoader = false;
                    if (response.status) {
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

}
