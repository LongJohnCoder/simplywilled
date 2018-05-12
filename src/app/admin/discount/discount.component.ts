import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-discount',
  templateUrl: './discount.component.html',
  styleUrls: ['./discount.component.css']
})
export class DiscountComponent implements OnInit {
    couponCount: number = 0;
    couponList: any[] = [];
  constructor() { }

  ngOnInit() {
  }

}
