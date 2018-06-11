import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-paypal-failed',
  templateUrl: './paypal-failed.component.html',
  styleUrls: ['./paypal-failed.component.css']
})
export class PaypalFailedComponent implements OnInit {
    respType: boolean;
    respMsg: string;
  constructor() { }

  ngOnInit() {
      this.respType = true;
      this.respMsg = 'Payment not done, Please try again later.';
  }

}
