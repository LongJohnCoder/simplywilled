import {Component, OnDestroy, OnInit} from '@angular/core';
import {FormArray, FormBuilder, FormGroup, Validators} from '@angular/forms';
import {Observable} from 'rxjs/Observable';
import {GiftService} from './services/gift.service';
import {GiftModel} from './models/giftModel';
import {Router} from '@angular/router';
import {Subscription} from 'rxjs/Subscription';
import {ProgressbarService} from '../shared/services/progressbar.service';
import {UserService} from '../../user.service';
@Component({
  selector: 'app-gift',
  templateUrl: './gift.component.html',
  styleUrls: ['./gift.component.css']
})
export class GiftComponent implements OnInit, OnDestroy {
  /**Variable declaration*/
  giftFormStepOne: FormGroup;
  access_token: string;
  fetchGiftDB: Observable<any>;
  myUserId: number;
  errFlag: boolean;
  errString: string;
  giftStatus: string;
  saveDataInDb: Observable<any>;
  dataset: GiftModel;
  loading = true;
  saveDataInDbSubscription: Subscription;
  fetchGiftDBSubscription: Subscription;
  getUserDetailSubscription: Subscription;
  pageChange = false;
  toolTipMessageList: any;


  /**Constructor call*/
  constructor(
    private fb: FormBuilder,
    private gftService: GiftService,
    private router: Router,
    private progressBarService: ProgressbarService,
    private userService: UserService) {

      this.toolTipMessageList = {
        'gift' : [{
            'q' : 'What Is A Specific Gift?',
            // tslint:disable-next-line:max-line-length
            'a' : 'Specific Gifts are particular, itemized gifts that are distributed “off the top” of your estate. Examples could include particular items of personal property (“I leave my gold ring to my daughter”), real property (“I leave my house to my son”), a business interest (“my interest in XYZ LLC to my grandson Carter”), a specific amount of cash (“I leave the sum of $500 to my nephew Joe”), or a particular account (“I leave my bank account at Smith Bank to my cousin Joan”). Everything that is left over will be included in the residue of your estate.'
          }, {
            'q' : 'Should I make specific gifts?',
            // tslint:disable-next-line:max-line-length
            'a' : 'Using SimplyWilled.com you can make Specific Gifts of Cash, Real Estate, Business Interests, or Specific Assets. You can select if you would like to make these gifts to individual(s) or to Charities. If cash (“I leave the sum of $500 to my nephew Joe”), or a particular account (“I leave my bank account at Smith Bank to my cousin Joan”). Everything that is left over will be included in the residue of your estate.'
        }]
      };

    this.progressBarService.changeWidth({width: 50});
    this.giftFormStepOne = fb.group({
      'gift_status' : ['0', Validators.required],
      'gift_status_charity': ['0', Validators.required]
    });
  }

  /**When component initialises*/
  ngOnInit() {
    this.errFlag = false;
    this.errString = null;
    if (JSON.parse(localStorage.getItem('loggedInUser')).hasOwnProperty('token')) {
      this.access_token = JSON.parse(localStorage.getItem('loggedInUser')).token;
      this.myUserId = JSON.parse(localStorage.getItem('loggedInUser')).user.id;
    } else {
      this.access_token = '';
    }
    this.fetchGiftData();
  }

  toolTipClicked(str: string) {
    console.log(str);
    this.userService.changeCurrentToolTipType(str);
    // this.toolTipMessage = this.toolTipMessageList[str];
    // console.log('tooltip message :', this.toolTipMessage);
  }

  /**Calls the api*/
  makeSpecificGift(formData): void {
    if (formData.valid) {
      if (this.access_token) {
        this.dataset = {'user_id': this.myUserId, 'step': 8, 'data': {'isSpecificGift': formData.value.gift_status === '1' ? 'Yes' : 'No'}};
        this.saveDataInDb = this.gftService.saveData(this.access_token, this.dataset);
        this.saveDataInDbSubscription = this.saveDataInDb.subscribe(data => {
          if (data.status) {
            if (formData.value.gift_status === '1') {
              this.router.navigate(['/dashboard/your-specific-gifts']);
            } else {
              this.router.navigate(['/dashboard/your-estate-distributed']);
            }
          } else {
            this.errFlag = true;
            this.errString = 'Error while updating data';
            console.log(this.errString);
          }
        }, err => {
          this.errFlag = true;
          this.errString = err.error.message;
          console.log(this.errString);
        }, () => { });
      } else {
        this.errFlag = true;
        this.errString = 'Please login to continue';
        console.log(this.errString);
      }
    } else {
      alert('Please fill up the required fields');
      this.markFormGroupTouched(formData);
    }
  }

  /**
   * Marks all controls in a form group as touched
   * @param formGroup
   */
  markFormGroupTouched (formGroup: FormGroup) {
    (<any>Object).values(formGroup.controls).forEach(control => {
      control.markAsTouched();
      control.markAsDirty();
    });
  }

  /**
   * this function fetch presaved giftdata
   */
  fetchGiftData(): void {
    if (this.access_token) {
      this.fetchGiftDB = this.gftService.fetchData(this.access_token, this.myUserId);
      this.fetchGiftDBSubscription = this.fetchGiftDB.subscribe(data => {
        if (data.status === 200) {
          if (data.data) {
            if (data.data.hasOwnProperty(7)) {
                if (data.data[7].data.hasOwnProperty('isSpecificGift')) {
                  this.giftStatus = data.data[7].data.isSpecificGift === 'No' ? '0' : '1';
                } else {
                  this.errFlag = true;
                  this.errString = 'This step has no data yet! Please fill up the form';
                  console.log(this.errString);
                }
            } else {
              this.errFlag = true;
              this.errString = 'No Data Found! Please fill up the form';
              console.log(this.errString);
            }
          } else {
            this.errFlag = true;
            this.errString = 'No Data Found!';
            console.log(this.errString);
          }
        } else {
          this.errFlag = true;
          this.errString = 'Unable to fetch data pls try again later!';
          console.log(this.errString);
        }
      }, error => {
        this.errFlag = true;
        this.errString = error.error.message;
        console.log(this.errString);
      }, () => {
        // set form value here
        if (this.giftStatus) {
          console.log(this.giftStatus);
          this.giftFormStepOne.setValue({
            'gift_status' : this.giftStatus,
            'gift_status_charity': '0'
          });
        } else {
          this.giftFormStepOne.setValue({
            'gift_status' : '0',
            'gift_status_charity': '0'
          });
        }
        this.loading = false;
      });
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
          case 'R': this.pageChange = true;
                    this.progressBarService.changeWidth({width: 50});
                    break;
          default:  this.pageChange = false;
                    this.progressBarService.changeWidth({width: 37.5});
                    break;
        }
      },
      (error: any) => {
        console.log(error.error);
      }, () => { }
    );
  }

  /**When the component is destroyed*/
  ngOnDestroy() {
    if (this.saveDataInDbSubscription !== undefined) {
      this.saveDataInDbSubscription.unsubscribe();
    }
    if (this.fetchGiftDBSubscription !== undefined) {
      this.fetchGiftDBSubscription.unsubscribe();
    }
    if (this.getUserDetailSubscription !== undefined) {
      this.getUserDetailSubscription.unsubscribe();
    }
  }

  /**Go back*/
  goBack() {
    if (this.pageChange) {
      this.router.navigate(['/dashboard/personal-property-distributed']);
    } else {
      this.router.navigate(['/dashboard/provide-user-spouse']);
    }
  }
}
