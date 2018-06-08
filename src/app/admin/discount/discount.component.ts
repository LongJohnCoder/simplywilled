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
    usageType: number;
    couponVal: any;

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
            description: new FormControl('description', [Validators.required]),
            amount: new FormControl(0.00, [Validators.required, Validators.pattern('^\\d+(\\.\\d+)?$')]),
            useType: new FormControl(1, [Validators.required]),
            usageType: new FormControl(1, [Validators.required]),
            max_user: new FormControl(2),
            expired_on: new FormControl(''),
            flag: new FormControl('0', [Validators.required]),
        });

    }

    maxUserValid() {
        if (+this.couponForm.value.usageType === 2) {
            this.couponForm.get('max_user').setValidators([Validators.required, Validators.min(2)]);
            this.couponForm.get('max_user').updateValueAndValidity();
        } else {
            this.couponForm.get('max_user').clearValidators();
            this.couponForm.get('max_user').updateValueAndValidity();
        }
    }

    usageTypeValid() {
        this.couponForm.controls['usageType'].setValue(1);
        this.maxUserValid();
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
            useType: new FormControl(+this.couponList[i].max_user > 1 ? 2 : 1, [Validators.required]),
            usageType: new FormControl(+this.couponList[i].max_user === 9999999 ? 1 : 2, [Validators.required]),
            max_user: new FormControl(+this.couponList[i].max_user, [Validators.min(1)]),
            expired_on: new FormControl(this.couponList[i].expired_on),
            flag: new FormControl(this.couponList[i].flag, [Validators.required]),
        });
        this.respType = false;
        this.editMode = true;
        this.modalRef = this.modalService.show(template);
    }


    update() {
        this.respType = true;
        this.respMsg = 'Please wait...';
        // this.couponForm.value.max_user = +this.couponForm.value.usageType === 1 ? 999999 : +this.couponForm.value.max_user;
        // console.log(this.couponForm.value);
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

    public viewUserModal(template:  TemplateRef<any>, i) {
        this.couponVal = this.couponList[i];
        this.modalRef = this.modalService.show(template);

    }
}
