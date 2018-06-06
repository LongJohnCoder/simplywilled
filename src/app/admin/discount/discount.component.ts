import {ChangeDetectorRef, Component, OnInit, TemplateRef} from '@angular/core';
import {BsModalRef, BsModalService} from 'ngx-bootstrap/modal';
import {FormBuilder, FormControl, Validators} from '@angular/forms';
import {DiscountService} from './discount.service';
import * as $ from 'jquery';
import 'datatables.net';
import 'datatables.net-bs4';

@Component({
  selector: 'app-discount',
  templateUrl: './discount.component.html',
  styleUrls: ['./discount.component.css']
})
export class DiscountComponent implements OnInit {
    couponCount: number;
    couponList: any[] = [];
    public modalRef: BsModalRef;
    couponForm: any;
    couponID: string;
    editMode: boolean;
    respType: boolean;
    respMsg: string;
    dataTable: any;

    constructor(
      private modalService: BsModalService,
      private fb: FormBuilder,
      private discountService: DiscountService,
      private chRef: ChangeDetectorRef,

    ) { }

  ngOnInit() {
      this.respType = false;
      this.couponCount = 0;
      this.editMode = false;
      this.getCoupons();
  }

    getCoupons() {
        this.discountService.getCoupons().subscribe(
            (res: any) => {
                this.couponList = res.data;
                this.couponCount = res.data.length;
                this.chRef.detectChanges();
                const table: any = $('table');
                this.dataTable = table.DataTable();
            }, (err: any) => {
                console.log(err);
            }
        );
    }

    genCouponForm() {
        this.couponForm = this.fb.group({
            title: new FormControl('', [Validators.required]),
            description: new FormControl('', [Validators.required]),
            amount: new FormControl(0.00, [Validators.required, Validators.pattern('^\\d+(\\.\\d+)?$')]),
            max_user: new FormControl(0, [Validators.required, Validators.pattern('^\\d+(\\.\\d+)?$')]),
            expired_on: new FormControl('', [Validators.required]),
            flag: new FormControl('0', [Validators.required]),
        });
    }

    public addCoupon(template:  TemplateRef<any>) {
        this.genCouponForm();
        this.editMode = false;
        this.respType = false;
        this.modalRef = this.modalService.show(template);
    }

    editCoupon(template:  TemplateRef<any>, i) {
        this.couponForm = this.fb.group({
            id: new FormControl(this.couponList[i].id, [Validators.required]),
            title: new FormControl(this.couponList[i].title, [Validators.required]),
            description: new FormControl(this.couponList[i].description, [Validators.required]),
            amount: new FormControl(this.couponList[i].amount, [Validators.required, Validators.pattern('^\\d+(\\.\\d+)?$')]),
            max_user: new FormControl(this.couponList[i].max_user, [Validators.required, Validators.pattern('^\\d+(\\.\\d+)?$')]),
            expired_on: new FormControl(this.couponList[i].expired_on, [Validators.required]),
            flag: new FormControl(this.couponList[i].flag, [Validators.required]),
        });
        this.respType = false;
        this.editMode = true;
        this.modalRef = this.modalService.show(template);
    }

    // Date.prototype.toJSON = function(){
    //     return DateService.formatDate(this);
    // };
    update() {
        this.respType = true;
        this.respMsg = 'Please wait...';
        // console.log(this.couponForm.value.expired_on);
        if (this.editMode === false) {
            // Add Coupon
            this.discountService.addCoupon(this.couponForm.value).subscribe(
                (res: any) => {
                    this.respMsg = res.message;
                    setTimeout( function () {
                        location.reload();
                    }, 2000);
                }, (err: any) => {
                    const messageType = typeof err.error.message;
                    if (messageType === 'object') {
                        const messages = [];
                        for (const prop in err.error.message) {
                            messages.push(err.error.message[prop]);
                        }
                        this.respMsg = messages.toString();
                    } else {
                        this.respMsg = err.error.message;
                    }
                }
            );
        } else {
            // Update Coupon
            this.discountService.updateCoupon(this.couponForm.value).subscribe(
                (res: any) => {
                    this.respMsg = res.message;
                    setTimeout( function () {
                        location.reload();
                    }, 2000);
                }, (err: any) => {
                    const messageType = typeof err.error.message;
                    if (messageType === 'object') {
                        const messages = [];
                        for (const prop in err.error.message) {
                            messages.push(err.error.message[prop]);
                        }
                        this.respMsg = messages.toString();
                    } else {
                        this.respMsg = err.error.message;
                    }
                }
            );
        }
    }

    delCoupon(template:  TemplateRef<any>, i) {
        this.respType = false;
        this.respMsg = 'Are you sure???';
        this.couponID = this.couponList[i].id;
        this.modalRef = this.modalService.show(template);
    }

    onitemDel() {
        this.respType = true;
        this.respMsg = 'Please wait...';
        this.discountService.deleteCoupon(this.couponID).subscribe(
            (res: any) => {
                this.respMsg = res.message;
                setTimeout( function () {
                    location.reload();
                }, 2000);
            }, (err: any) => {
                const messageType = typeof err.error.message;
                if (messageType === 'object') {
                    const messages = [];
                    for (const prop in err.error.message) {
                        messages.push(err.error.message[prop]);
                    }
                    this.respMsg = messages.toString();
                } else {
                    this.respMsg = err.error.message;
                }
            }
        );
    }
}
