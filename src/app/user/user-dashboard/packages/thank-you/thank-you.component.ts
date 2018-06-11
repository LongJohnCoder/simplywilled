import {Component, Input, OnInit} from '@angular/core';
import {timer} from 'rxjs/observable/timer';
import {map, take} from 'rxjs/operators';

@Component({
  selector: 'app-thank-you',
  templateUrl: './thank-you.component.html',
  styleUrls: ['./thank-you.component.css']
})
export class ThankYouComponent implements OnInit {
  @Input() data: any;
    countDown;
    count = 20;
  constructor() {
      this.countDown = timer(0, 1000).pipe(
          take(this.count),
          map(() => --this.count)
      );
      setTimeout(function () {
          console.log(123);
      }, 20000);
  }

  ngOnInit() {
  }

}
