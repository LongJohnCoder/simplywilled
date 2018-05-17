import {Component, Input, OnInit} from '@angular/core';

@Component({
  selector: 'app-business-interest',
  templateUrl: './business-interest.component.html',
  styleUrls: ['./business-interest.component.css']
})
export class BusinessInterestComponent implements OnInit {
  @Input() giftCount: any;
  constructor() { }

  ngOnInit() {
  }

}
