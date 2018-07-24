import {Component, Input, OnInit, TemplateRef} from '@angular/core';
import {PackagesService} from '../packages.service';
import {BsModalRef, BsModalService} from 'ngx-bootstrap/modal';
import {Router} from '@angular/router';

declare var _cartstack: any;

@Component({
  selector: 'app-payment-page',
  templateUrl: './payment-page.component.html',
  styleUrls: ['./payment-page.component.css']
})
export class PaymentPageComponent implements OnInit  {

  // headers = new Headers({
  //   'Cache-Control': 'no-cache',
  //   'Pragma': 'no-cache',
  //   'Expires': 'Sat, 01 Jan 2000 00:00:00 GMT'
  // });
  // @Input() paymentData: any;
    paymentData: any;
    respType: boolean;
    respMsg: string;
    data: any;
    cardtype: string;
    cardPinch: string;
    paymentMethod: string;
    loader: boolean;
    thankYou: boolean;
    addAnimate: boolean;
    package_name: string;
    cardLength: string;
    cvvLength: string;
    cardValid: boolean;
    card2length: boolean;
    cvv2length: boolean;
    public modalRef: BsModalRef;

    constructor(
      private packageService: PackagesService,
      private modalService: BsModalService,
      private router: Router

    ) {
        this.paymentData = JSON.parse(localStorage.getItem('pkgInfo'));
    }

  ngOnInit() {
        this.cardLength = '0000 0000 0000 0000';
        this.cvvLength = '000';
      this.thankYou = false;
      this.loader = true;

    // console.log(this.paymentData);
      this.cardtype = '';
      this.data = {
          'firstName': '',
          'lastname': '',
          'cardFirstName': '',
          'cardLastName': '',
          'phone': '',
          'email': '',
          'address1': '',
          'address2': '',
          'city': '',
          'state': '',
          'zip': '',
          'country': 'US',
          'cardNumber': '',
          'expDate': '',
          'cvv': ''
      };
      this.loader = false;
      this.addAnimate = false;
  }

    public openModal(template:  TemplateRef<any>, index){
        this.modalRef = this.modalService.show(template);
    }

    GetCardType(number) {
        this.cardValid = true;
        // visa
        if (number.value.match(new RegExp("^4")) != null){
            this.cardtype = "visa";
            this.cardPinch = 'Visa';
            if (number.value.match(new RegExp("^(4026|417500|4508|4844|491(3|7))")) != null) {
                // Visa Electron
                this.cardtype = "visa2";
                this.cardPinch = 'Visa';
            }
            this.cardLength = '0000 0000 0000 0000';
            this.cvvLength = '000';

        }
        else if (number.value.match(new RegExp("^5[1-5]")) != null) {
            // Mastercard
            this.cardtype = "master";
            this.cardPinch = 'MasterCard';
            this.cardLength = '0000 0000 0000 0000';
            this.cvvLength = '000';

        }
        else if (number.value.match(new RegExp("^3[47]")) != null){
            // AMEX
            this.cardtype = "amex";
            this.cardPinch = 'Amex';
            this.cardLength = '0000 0000 0000 000';
            this.cvvLength = '0000';

        }
        else if (number.value.match(new RegExp("^(6011|622(12[6-9]|1[3-9][0-9]|[2-8][0-9]{2}|9[0-1][0-9]|92[0-5]|64[4-9])|65)")) != null){
            // Discover
            this.cardtype = "discover";
            this.cardPinch = 'Discover';
            this.cardLength = '0000 0000 0000 0000';
            this.cvvLength = '000';

        }
        // else if (number.value.match(new RegExp("^3(?:0[0-5]|[68][0-9])[0-9]{11}$")) != null){
        //     // Diners
        //     this.cardtype = "diners";
        //     this.cardPinch = 'diners';
        //
        // }
        // else if (number.value.match(new RegExp("^389[0-9]{11}$")) != null){
        //     // Diners - Carte Blanche
        //     this.cardtype = "diners2";
        //     this.cardPinch = 'diners2';
        //
        // }
        // else if (number.value.match(new RegExp("^35(2[89]|[3-8][0-9])")) != null){
        //     // JCB
        //     this.cardtype = "jcb";
        //     this.cardPinch = 'JCB';
        //     this.cardLength = '0000 0000 0000 0000';
        //     this.cvvLength = '000';
        //
        // }
        else{
            if(number.value != ""){
                this.cardtype = "unknown";
                this.cardPinch = 'unknown';

            }else{
                this.cardtype = "null";
                this.cardPinch = 'null';

            }
            this.cardLength = '0000 0000 0000 0000';
            this.cardValid = false;

            // this.data.cardNumber.invalid = true;

        }
    }

    checkout() {
        this.loader = true;
        const form = new FormData();
        form.append('user_id', this.paymentData.userID);
        form.append('pkg_id', this.paymentData.package.id);
        form.append('coupon_id', this.paymentData.couponID);
        form.append('credit_card_type', this.cardPinch);
        form.append('card_no', this.data.cardNumber);
        form.append('exp_date', this.data.expDate);
        form.append('cvv2', this.data.cvv);
        form.append('firstName', this.data.firstName);
        form.append('lastname', this.data.lastname);
        form.append('cardFirstName', this.data.cardFirstName);
        form.append('cardLastName', this.data.cardLastName);
        form.append('phone', this.data.phone);
        form.append('email', this.data.email);
        form.append('address1', this.data.address1);
        form.append('address2', this.data.address2);
        form.append('city', this.data.city);
        form.append('state', this.data.state);
        form.append('zip', this.data.zip);
        form.append('country', this.data.country);

        if (this.paymentMethod === 'paypal-payment') {
            this.respMsg = 'You are being redirected to paypal website. Please do not refresh the page or press back button';
            this.packageService.purchasePackagePaypalExpress(form).subscribe(
                (resp: any) => {
                    // console.log(resp.approval_url);
                    window.location.href = resp.approval_url;
                }, (error: any) => {
                    this.thankYou = false;
                    this.respMsg = error.error.error;
                    this.respType = true;
                    this.loader = false;
                    console.log(error.error.error);

                });
        } else {
            this.respMsg = 'Your transaction is being processed. Please do not refresh the page or press back button';
                this.packageService.purchasePackagePaypalDirect(form).subscribe(
                (resp: any) => {
                    // console.log(resp.message);
                    // this.respMsg = resp.message;
                    this.data = resp.data.payment;
                    this.package_name = resp.data.package_name;
                    // const store = JSON.parse(localStorage.getItem('loggedInUser'));
                    // store.token = resp.data.jwtToken;
                    // localStorage.setItem('loggedInUser', JSON.stringify(store));
                    this.thankYou = true;
                    this.respType = true;
                    const pkgInfo = {'data': this.data, 'package_name': this.package_name, 'token': resp.data.jwtToken};
                    localStorage.setItem('pkgInfo', JSON.stringify(pkgInfo));
                    this.router.navigate(['/dashboard/packages/thank-you']);
                    this.loader = false;
                    // setTimeout(function () {
                    //     document.location.href = '/dashboard';
                    // }, 3000);
                    // this.router.navigate(['/dashboard']);
                }, (error: any) => {
                    console.log(error.error);
                    this.thankYou = false;
                    this.respMsg = error.error.error;
                    this.respType = true;
                    this.loader = false;
                    // setTimeout(function () {
                    //     location.reload();
                    // }, 4000);
                    // setTimeout(function () {
                    //   this.addAnimate = true;
                    //  }, 2000);

                }
            );
        }
        console.log(this.thankYou);
        if(!this.thankYou){
          const an = this;
          setTimeout(function () {
            an.addAnimate = true;
           }, 3000);
        }


    }
    
    cartstackSetEmailAddressInput(ev: any){
        _cartstack.push(['setEmailAddressInput', ev.target.value]);
        _cartstack.push(['setCartTotal', '199.00']);
    }
}