import {Component, OnInit, TemplateRef} from '@angular/core';
import {BsModalRef, BsModalService} from 'ngx-bootstrap/modal';
import {FormBuilder, FormControl, Validators} from '@angular/forms';
import {DiscountService} from './discount.service';

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
    constructor(
      private modalService: BsModalService,
      private fb: FormBuilder,
      private discountService: DiscountService

  ) { }

  ngOnInit() {
      this.couponCount = 0;
      this.editMode = false;
      this.getCoupons();
  }

    // onCancel() {
    //     this.modalRef.hide();
    //     this.couponID = null;
    // }
    getCoupons() {
        this.discountService.getCoupons().subscribe(
            (res: any) => {
                this.couponList = res.data;
                this.couponCount = res.data.length;
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
            expired_on: new FormControl('cs', [Validators.required]),
            flag: new FormControl('0', [Validators.required]),
        });
    }

    public addCoupon(template:  TemplateRef<any>) {
        this.genCouponForm();
        this.editMode = false;
        this.modalRef = this.modalService.show(template);
    }

    update() {

    }
}
