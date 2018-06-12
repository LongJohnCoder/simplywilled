import {Component, Input, OnInit} from '@angular/core';
import {Observable} from 'rxjs';
import {Subscription} from 'rxjs/Subscription';
import {Router} from '@angular/router';

@Component({
  selector: 'app-thank-you',
  templateUrl: './thank-you.component.html',
  styleUrls: ['./thank-you.component.css']
})
export class ThankYouComponent implements OnInit {
  @Input() data: any;
    countDown;
    count = 10;
    timerSubscription: Subscription;
  constructor(
      private router: Router
  ) {

      this.countDown = Observable.interval(1000).map((tick) => --this.count).share();
      this.timerSubscription = this.countDown.subscribe(
          (time) => {
              this.count = time;
              if (this.count === 0) {
                  this.router.navigate(['/dashboard/will']);
              }
          }
      );
  }

  ngOnInit() {
      // console.log(this.data);
  }

}
