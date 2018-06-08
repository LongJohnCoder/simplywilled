import {Component, OnInit, TemplateRef} from '@angular/core';
import {PackagesService} from '../packages.service';
import {BsModalRef, BsModalService} from 'ngx-bootstrap/modal';

@Component({
  selector: 'app-packages',
  templateUrl: './packages.component.html',
  styleUrls: ['./packages.component.css']
})
export class PackagesComponent implements OnInit {
  whatIncl: boolean;
  userId: string;
  token: string;
  data: any;
  public modalRef: BsModalRef;
  respType: boolean;
  respMsg: string;
  discountAmount: number;
  totalAmount: number;
  couponToken: string;
  paymentData: any;
  couponInfo: any;
  paymentPageDisplay: boolean;
  constructor(
      private packageService: PackagesService,
      private modalService: BsModalService,

  ) { }

  ngOnInit() {
      this.paymentPageDisplay = false;
      this.data = {
        'id': '',
        'name': '',
        'description': '',
        'status': '',
        'key_benefits': '',
        'amount': 0.00,
        'included': '',
        'slug': ''
      };
      this.couponInfo = null;
      this.whatIncl = false;
      this.userId = JSON.parse(localStorage.getItem('loggedInUser')).user.id;
      this.token = JSON.parse(localStorage.getItem('loggedInUser')).token;
      this.getPackages();
      this.respType = false;
  }

  showIncluded() {
    this.whatIncl = !this.whatIncl;
  }

  getPackages() {
    this.packageService.getPackages().subscribe(
        (resp: any) => {
            this.data.id = resp.data[0].id;
            this.data.name = resp.data[0].name;
            this.data.description = resp.data[0].description;
            this.data.status = resp.data[0].status;
            this.data.amount = resp.data[0].amount;
            this.data.key_benefits = JSON.parse(resp.data[0].key_benefits);
            this.data.included = JSON.parse(resp.data[0].included);
            this.data.slug = resp.data[0].slug;
            this.discountAmount = 0.00;
            this.totalAmount = this.data.amount - this.discountAmount;
            this.respType = true;

        }, (error: any) => {
            console.log(error.error);
        }
    );
  }

  public openModal(template:  TemplateRef<any>) {
      this.modalRef = this.modalService.show(template);
  }

    checkCoupon() {
        const couponReq = {
          'token': this.couponToken,
          'amount': this.data.amount
        };
        this.packageService.applyCoupon(couponReq).subscribe(
        (resp: any) => {
            this.respMsg = resp.message;
            this.couponInfo = resp.data.coupon;
            this.discountAmount = resp.data.savedAmount;
            this.totalAmount = this.data.amount - this.discountAmount;
        }, (error: any) => {
            this.respMsg = error.error.message;
            this.couponInfo = null;
            this.discountAmount = 0.00;
            this.totalAmount = this.data.amount - this.discountAmount;
        });
    }

    paymentPage() {
        this.paymentData = {
            'totalAmount': this.totalAmount,
            'couponID': this.couponInfo === null ? null : this.couponInfo.id,
            'discountAmount': this.discountAmount,
            'package': this.data,
            'userID': this.userId
        };
        this.paymentPageDisplay = true;

        console.log(this.paymentData);
    }

  // purchase(id: string) {
  //     // this.openModal('loading');
  //     const body = new FormData();
  //     body.append('pkg_id', id);
  //     body.append('user_id', this.userId);
  //     body.append('token', this.token);
  //   this.packageService.purchasePackage(body).subscribe(
  //       (resp: any) => {
  //           window.location.href = resp.approval_url;
  //       }, (error: any) => {
  //           this.respMsg = error.error.error;
  //       }
  //   );
  // }

}