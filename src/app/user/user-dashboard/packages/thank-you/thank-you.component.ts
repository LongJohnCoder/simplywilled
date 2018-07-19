import {Component, Input, OnInit, OnDestroy} from '@angular/core';
import {Observable} from 'rxjs';
import {Subscription} from 'rxjs/Subscription';
import {Router} from '@angular/router';
import { UserService } from '../../../user.service';

declare function cartstack_updatecart(e): any;
declare var dataLayer: any;

@Component({
  selector: 'app-thank-you',
  templateUrl: './thank-you.component.html',
  styleUrls: ['./thank-you.component.css']
})
export class ThankYouComponent implements OnInit, OnDestroy {
  @Input() data: any;
  @Input() package_name: string;

    countDown;
    count = 10;
    timerSubscription: Subscription;
  constructor(
      private router: Router,
      private userService: UserService
  ) {}

  ngOnInit() {
      // console.log(this.data);
      this.initialize();
  }

  navigateTODashboard() {
    // localStorage.removeItem('newUser');
    this.router.navigate(['/dashboard']);
  }

  initialize() {
    window.scrollTo({ left: 0, top: 0, behavior: 'smooth' });
    /* for cartstack api  */
    const _cartstack_update = [];
    _cartstack_update.push(['setSiteID', 'k5FdWlhK']);
    _cartstack_update.push(['setAPI', 'confirmation']);
    _cartstack_update.push(['setCartTotal', this.data != null && this.data.amount != null ? this.data.amount : null]);
    cartstack_updatecart(_cartstack_update);
    // localStorage.setItem('newUser', '1');
    /* end */
    /* google tagmanager datalayer settings  */
    dataLayer.push({
        'transactionId': this.data != null && this.data.payment_token != null ? this.data.payment_token : '',
        'transactionAffiliation': 'Simply Willed',
        'transactionTotal': this.data != null && this.data.amount != null ? this.data.amount : null,
        'transactionTax': 0,
        'transactionShipping': 0,
        'transactionProducts': [{
            'sku': '1234',
            'name': this.package_name != null ? this.package_name : '',
            'price': this.data != null && this.data.amount != null ? this.data.amount : null,
            'quantity': 1
        }]
    });
    /* end  */
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

  changeTourState(type: string){
    this.userService.changeStepNumber(type);
  }

  ngOnDestroy() {
      if(this.timerSubscription !== undefined) {
        this.timerSubscription.unsubscribe();
      }
      this.changeTourState('forward');
  }

}
