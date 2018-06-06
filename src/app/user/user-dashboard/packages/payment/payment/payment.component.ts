import {Component, OnInit, TemplateRef} from '@angular/core';
import {ActivatedRoute, Router} from '@angular/router';
import {PackagesService} from '../../packages.service';
import { BsModalRef, BsModalService } from 'ngx-bootstrap/modal';

@Component({
  selector: 'app-payment',
  templateUrl: './payment.component.html',
  styleUrls: ['./payment.component.css']
})
export class PaymentComponent implements OnInit {

  cardtype: string;
  data: any;
  userData: any;
  cardPinch: string;
  userId: string;
  pkgID: string;
  respType: boolean;
  respMsg: string;
  pageLoad: boolean;
  public modalRef : BsModalRef;

  constructor(
      private route: ActivatedRoute,
      private router: Router,
      private packageService: PackagesService,
      private modalService : BsModalService,
  ) { }

  ngOnInit() {
      this.pkgID = this.route.snapshot.paramMap.get('id');
      this.userData = JSON.parse(localStorage.getItem('loggedInUser'));
      this.userId = this.userData['user'].id;
      this.respType = false;
      this.respMsg = 'Your transaction is being processed. Please do not refresh the page or click on browser back button';
        this.pageLoad = false;
      this.cardtype = '';
      this.data = {
          'firstName': '',
          'lastname': '',
          'cardFirstName': '',
          'cardLastName': '',
          'phone': '',
          'address1': '',
          'city': '',
          'state': '',
          'zip': '',
          'country': '',
          'cardNumber': '',
          'expDate': '',
          'cvv': ''
      };
  }

  public openModal(template :  TemplateRef<any>, index){
    this.modalRef = this.modalService.show(template);
  }

  GetCardType(number) {
    // visa
    if (number.value.match(new RegExp("^4")) != null){
      this.cardtype = "visa";
      this.cardPinch = 'Visa';
      if (number.value.match(new RegExp("^(4026|417500|4508|4844|491(3|7))")) != null) {
        // Visa Electron
        this.cardtype = "visa2";
          this.cardPinch = 'Visa';
      }
    }
    else if (number.value.match(new RegExp("^5[1-5]")) != null) {
    // Mastercard
      this.cardtype = "master";
        this.cardPinch = 'MasterCard';

    }
     else if (number.value.match(new RegExp("^3[47]")) != null){
    // AMEX
      this.cardtype = "amex";
        this.cardPinch = 'Amex';

    }
    else if (number.value.match(new RegExp("^(6011|622(12[6-9]|1[3-9][0-9]|[2-8][0-9]{2}|9[0-1][0-9]|92[0-5]|64[4-9])|65)")) != null){
    // Discover
      this.cardtype = "discover";
        this.cardPinch = 'Discover';

    }
    else if (number.value.match(new RegExp("^36")) != null){
    // Diners
      this.cardtype = "diners";
        this.cardPinch = 'diners';

    }
    else if (number.value.match(new RegExp("^30[0-5]")) != null){
    // Diners - Carte Blanche
      this.cardtype = "diners2";
        this.cardPinch = 'diners2';

    }
    else if (number.value.match(new RegExp("^35(2[89]|[3-8][0-9])")) != null){
    // JCB
      this.cardtype = "jcb";
        this.cardPinch = 'JCB';

    }
    else{
      if(number.value != ""){
        this.cardtype = "unknown";
          this.cardPinch = 'unknown';

      }else{
        this.cardtype = "null";
          this.cardPinch = 'null';

      }
    }
  }

    checkout() {
      this.pageLoad = true;
      const form = new FormData();
        form.append('user_id', this.userId);
        form.append('pkg_id', this.pkgID);
        form.append('coupon_id', '');
        form.append('credit_card_type', this.cardPinch);
        form.append('card_no', this.data.cardNumber);
        form.append('exp_date', this.data.expDate);
        form.append('cvv2', this.data.cvv);
        form.append('firstName', this.data.firstName);
        form.append('lastname', this.data.lastname);
        form.append('cardFirstName', this.data.cardFirstName);
        form.append('cardLastName', this.data.cardLastName);
        form.append('phone', this.data.phone);
        form.append('address1', this.data.address1);
        form.append('city', this.data.city);
        form.append('state', this.data.state);
        form.append('zip', this.data.zip);
        form.append('country', this.data.country);

        this.packageService.purchasePackagePaypalDirect(form).subscribe(
            (resp: any) => {
                this.respMsg = resp.message;
                this.userData['user'].package = this.pkgID;
                localStorage.setItem('loggedInUser', JSON.stringify(this.userData));
                setTimeout(function () {
                    document.location.href = '/dashboard';
                }, 3000);
                // this.router.navigate(['/dashboard']);
            }, (error: any) => {
                this.respMsg = error.error.message;
                setTimeout(function () {
                    location.reload();
                }, 4000);
            }
        );
        this.respType = true;
        this.pageLoad = false;
    }
}
