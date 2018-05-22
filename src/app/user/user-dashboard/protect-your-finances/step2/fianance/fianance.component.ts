import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-fianance',
  templateUrl: './fianance.component.html',
  styleUrls: ['./fianance.component.css']
})
export class FiananceComponent implements OnInit {

  // tslint:disable-next-line:no-input-rename
  @Input('data') data: any;
  constructor() { }

  ngOnInit() {
  }

}
