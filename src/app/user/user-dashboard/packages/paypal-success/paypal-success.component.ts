import { Component, OnInit } from '@angular/core';
import {ActivatedRoute} from '@angular/router';
import {PackagesService} from '../packages.service';
import {timer} from 'rxjs/observable/timer';
import {map, take} from 'rxjs/operators';

@Component({
  selector: 'app-paypal-success',
  templateUrl: './paypal-success.component.html',
  styleUrls: ['./paypal-success.component.css']
})
export class PaypalSuccessComponent implements OnInit {
    respType: boolean;
    respMsg: string;
    jwtToken: string;
    data: any;
    thankYou: boolean;
  constructor(
      private activatedRoute: ActivatedRoute,
      private packagesService: PackagesService
  ) {

      this.respType = false;
      this.thankYou = false;
      this.activatedRoute.queryParams.subscribe(params => {
          const paymentID = params['paymentId'];
          this.packagesService.paypalSuccess({'paymentId': paymentID}).subscribe(
              (res: any) => {
                this.jwtToken = res.data.jwtToken;
                this.data = res.data.payment;
                // console.log(this.data);
                this.thankYou = true;
                this.respType = true;
                const storeContent = JSON.parse(localStorage.getItem('loggedInUser'));
                storeContent.token = this.jwtToken;
                localStorage.setItem('loggedInUser', JSON.stringify(storeContent));
              }, (err: any) => {
                this.respMsg = err.error.error;
                this.respType = true;
              }
          );
          // console.log(paymentID);
      });
  }

  ngOnInit() {
  }

}
