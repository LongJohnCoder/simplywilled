import {Component, OnDestroy, OnInit} from '@angular/core';
import {Observable} from 'rxjs/Observable';
import {YourSpecificGiftService} from './services/your-specific-gift.service';
import {MyGifts} from './models/myGifts';
import {EditGiftService} from './services/edit-gift.service';
import {Subscription} from 'rxjs/Subscription';
import {UserService} from '../../user.service';
import {ProgressbarService} from '../shared/services/progressbar.service';

@Component({
  selector: 'app-your-specific-gift',
  templateUrl: './your-specific-gift.component.html',
  styleUrls: ['./your-specific-gift.component.css']
})
export class YourSpecificGiftComponent implements OnInit, OnDestroy {
  access_token: string;
  myUserId: any;
  errFlag: boolean;
  errString: string;
  fetchGiftDataDB: Observable<any>;
  isAnyGift: boolean;
  giftCount: number;
  giftResp: MyGifts[];
  showAddGift: boolean;
  onNewModule: boolean;
  cash_module: boolean;
  real_property_module: boolean;
  business_interest: boolean;
  specific_asset: boolean;
  deleteGiftDb: Observable<any>;
  loading = true;
  fetchGiftDataDBSubscription: Subscription;
  deleteGiftDbSubscription: Subscription;
  getUserDetailSubscription: Subscription;

  constructor(private ysgService: YourSpecificGiftService, private editService: EditGiftService, private userService: UserService, private progressBarService: ProgressbarService) { }
  ngOnInit() {
    this.errFlag = false;
    this.errString = null;
    this.isAnyGift = false;
    this.giftCount = 0;
    this.showAddGift = false;
    this.onNewModule = false;
    this.cash_module = false;
    this.real_property_module = false;
    this.business_interest = false;
    this.specific_asset = false;

    if (JSON.parse(localStorage.getItem('loggedInUser')).hasOwnProperty('token')) {
      this.access_token = JSON.parse(localStorage.getItem('loggedInUser')).token;
      this.myUserId = JSON.parse(localStorage.getItem('loggedInUser')).user.id;
    } else {
      this.access_token = '';
    }
    this.fetchGiftData();
  }
  /**
   * this function fetch pre generated gifts
   */
  fetchGiftData(): void {
    if (this.access_token) {
      this.fetchGiftDataDB = this.ysgService.fetchData(this.access_token, this.myUserId);
      this.fetchGiftDataDBSubscription = this.fetchGiftDataDB.subscribe(data => {
        if (data.status === 200) {
          if (data.data[6].data.isGift >= 1) {
            this.isAnyGift = true;
            this.giftCount = data.data[6].data.isGift;
            this.giftResp  = data.data[6].data.gift;
          } else if (data.data[6].data.isGift === 0) {
              this.onNewModule = true;
              this.showAddGift = true;
          } else {
            this.isAnyGift = false;
            this.giftCount = 0;
            this.showAddGift = true;
          }
        } else {
          this.errFlag = true;
          this.errString = 'Something went wrong while fetching the data. Please try again later!';
          console.log(this.errString);
        }
      }, err => {
        this.errFlag = true;
        this.errString = err.error.message;
        console.log(this.errString);
      }, () => {this.loading = false;});
    } else {
      this.errFlag = true;
      this.errString = 'Please login to continue';
      console.log(this.errString);
    }

    this.getUserDetailSubscription = this.userService.getUserDetails(this.myUserId).subscribe(
      (response: any) => {
        let maritalStatus = response.data[0].data.userInfo.marital_status;
        switch (maritalStatus ) {
          case 'M':
          case 'R': this.progressBarService.changeWidth({width: 60});
                    break;
          default:  this.progressBarService.changeWidth({width: 50});
                    break;
        }
      },
      (error: any) => {
        console.log(error.error);
      }, () => { }
    );
  }

  /**
   * if clicks on add more then this flag helps to generate a view
   */
  showAddGiftSection(): void {
    this.showAddGift = true;
  }

  /**
   * this function opens up the views according to options selected
   * @param {string} module_name
   */
  openModule(module_name: string): void {
    this.showAddGift = false;
    this.onNewModule = true;
    switch (module_name) {
      case '_ca':
        this.cash_module = true;
        break;
      case '_rp':
        this.real_property_module = true;
        break;
      case '_bi':
        this.business_interest = true;
        break;
      case '_sa':
        this.specific_asset = true;
        break;
      default :
        this.errFlag = true;
        this.errString = 'Something went wrong. Please try again later';
        console.log(this.errString);
    }
  }

  /**
   * this function delete one gift from database
   * @param {number} id
   */
  deleteGift(id: number): any {
    if (this.access_token) {
      if (id) {
        const confirmation = confirm('Are You Sure?');
        if (confirmation) {
          this.deleteGiftDb = this.ysgService.deleteGift(this.access_token, id);
          this.deleteGiftDbSubscription = this.deleteGiftDb.subscribe(data => {
            if (data.status) {
              this.fetchGiftData();
            } else {
              this.errFlag = true;
              this.errString = 'Something went wrong while deleting the data';
              console.log(this.errString);
            }
          }, error => {
            this.errFlag = true;
            this.errString = error.error.message;
            console.log(this.errString);
          }, () => {});
        } else {
          window.location.reload();
        }
      } else {
        this.errFlag = true;
        this.errString = 'Unable to find the gift.';
        console.log(this.errString);
      }
    } else {
      this.errFlag = true;
      this.errString = 'Please login to continue';
      console.log(this.errString);
    }
  }

  /**
   * this function sets data to a service for editing
   * @param {MyGifts} giftData
   */
  editGift(giftData: MyGifts): void {
    this.giftCount -= 1;
    this.showAddGift = false;
    this.onNewModule = true;
    switch (giftData.type ) {
      // cash gift
      case '1': this.cash_module = true;
                this.real_property_module = false;
                this.business_interest = false;
                this.specific_asset = false;
                this.editService.setData(giftData);
                break;
      case '2': this.cash_module = false;
                this.real_property_module = true;
                this.business_interest = false;
                this.specific_asset = false;
                this.editService.setData(giftData);
                break;
      case '3': this.business_interest = true;
                this.cash_module = false;
                this.specific_asset = false;
                this.editService.setData(giftData);
                break;
      case '4': this.specific_asset = true;
                this.business_interest = false;
                this.cash_module = false;
                this.editService.setData(giftData);
                break;
      default: this.cash_module = false;
               this.cash_module = false;
               this.real_property_module = false;
               this.business_interest = false;
               this.specific_asset = false;
               console.log('something went wrong');
               break;
    }
  }

  /**
   * this function helps on delete when get called from childs like cash gift business gift etc
   */
  changeViewState(): void {
    this.cash_module = false;
    this.real_property_module = false;
    this.business_interest = false;
    this.specific_asset = false;
  }

  ngOnDestroy() {
    if (this.fetchGiftDataDBSubscription !== undefined) {
      this.fetchGiftDataDBSubscription.unsubscribe();
    }
    if (this.deleteGiftDbSubscription !== undefined) {
      this.deleteGiftDbSubscription.unsubscribe();
    }
    if (this.getUserDetailSubscription !== undefined) {
      this.getUserDetailSubscription.unsubscribe();
    }
    this.editService.unsetData();
  }
}
