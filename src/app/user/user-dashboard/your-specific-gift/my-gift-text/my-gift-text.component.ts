import {Component, Input, OnInit} from '@angular/core';

@Component({
  selector: 'app-my-gift-text',
  templateUrl: './my-gift-text.component.html',
  styleUrls: ['./my-gift-text.component.css']
})
export class MyGiftTextComponent implements OnInit {
  @Input() dataSet: any;
  constructor() { }

  ngOnInit() {
  }

}
