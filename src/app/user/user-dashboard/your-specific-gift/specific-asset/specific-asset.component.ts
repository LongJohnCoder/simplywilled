import {Component, Input, OnInit} from '@angular/core';

@Component({
  selector: 'app-specific-asset',
  templateUrl: './specific-asset.component.html',
  styleUrls: ['./specific-asset.component.css']
})
export class SpecificAssetComponent implements OnInit {
  @Input() giftCount: any;
  constructor() { }

  ngOnInit() {
  }

}
