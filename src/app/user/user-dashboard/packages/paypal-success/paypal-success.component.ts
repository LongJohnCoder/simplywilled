import { Component, OnInit } from '@angular/core';
import {ActivatedRoute, Router} from '@angular/router';
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
    package_name: string;
  constructor(
      private activatedRoute: ActivatedRoute,
      private packagesService: PackagesService,
      private router: Router
  ) {

      this.respType = false;
      this.thankYou = false;
      this.activatedRoute.queryParams.subscribe(params => {
          const paymentID = params['paymentId'];
          this.packagesService.paypalSuccess({'paymentId': paymentID}).subscribe(
              (res: any) => {
                this.jwtToken = res.data.jwtToken;
                this.data = res.data.payment;
                this.package_name = res.data.package_name;
                // console.log(this.data);
                this.thankYou = true;
                this.respType = true;
                  const pkgInfo = {'data': this.data, 'package_name': this.package_name, 'token': this.jwtToken};
                  localStorage.setItem('pkgInfo', JSON.stringify(pkgInfo));
                  this.router.navigate(['/dashboard/packages/thank-you']);

                // const storeContent = JSON.parse(localStorage.getItem('loggedInUser'));
                // storeContent.token = this.jwtToken;
                // localStorage.setItem('loggedInUser', JSON.stringify(storeContent));
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
