import {Component, Input, OnInit} from '@angular/core';

@Component({
  selector: 'app-real-property',
  templateUrl: './real-property.component.html',
  styleUrls: ['./real-property.component.css']
})
export class RealPropertyComponent implements OnInit {
  @Input() giftCount: any;
  constructor() { }

  ngOnInit() {
  }

}
