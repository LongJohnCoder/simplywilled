import {Component, OnDestroy, OnInit} from '@angular/core';
import {FormBuilder, FormControl, FormGroup} from '@angular/forms';
import {YourFinalArrangementsService} from './services/your-final-arrangements.service';
import {Subscription} from 'rxjs/Subscription';
import {Router} from '@angular/router';
import {Location} from '@angular/common';
import {ProgressbarService} from '../shared/services/progressbar.service';
import {UserService} from '../../user.service';

@Component({
  selector: 'app-your-final-arrangements',
  templateUrl: './your-final-arrangements.component.html',
  styleUrls: ['./your-final-arrangements.component.css']
})
export class YourFinalArrangementsComponent implements OnInit, OnDestroy {

  /**Variable declaration*/
  finalarrangementForm: FormGroup;
  finalarrangementgetdataSubscription: Subscription;
  finalarrangementsubmitdataSubscription: Subscription;
  flags = {
    burial: true,
    cremation: false,
    someOtherWay: false,
  };
  errors = {
    errorFlag: false,
    errorMessage: ''
  };
  loading = true;
  toolTipMessageList: any;

  /**When constructor is called*/
  constructor (
              private _fb: FormBuilder,
              private finalarrangementService: YourFinalArrangementsService,
              private router: Router,
              private progressBarService: ProgressbarService,
              private location: Location,
              private userService: UserService
  ) {
    let token = this.parseToken();
    this.progressBarService.changeWidth({width: 0});
    this.createForm();
    this.getData(token);
    this.toolTipMessageList = {
        'final_arrangement' : [{
            'q' : 'What does selecting buried means?',
            'a' : 'If you select buried, this will instruct your Personal Representative that you wish your remains to be buried. You can then provide instructions on how you would like your remains interred and any finals arrangements that you have made.'
        }, {
            'q' : 'What does selecting cremated means?',
            'a' : 'If you select cremated, this will instruct your Personal Representative that you wish your remains to be cremated. You can then provide instructions on how you would like your remains handled and any final arrangements that you have made.'
        }, {
            'q' : 'What if I want something else done with my remains?',
            'a' : 'If you would like something other than to be buried or cremated, please select the “Some Other Way” option. Please provide your instructions in the provided space so your Personal Representative will be informed.'
        }, {
            'q' : 'What if I am not sure?',
            'a' : 'If you are not sure whether you want to be buried or cremated please select the “Some Other Way” option. Please write “Undecided” in the provided space so your Personal Representative will be informed'
        }]
    };
  }

  /**Initialise the form*/
  createForm() {
      this.finalarrangementForm = this._fb.group({
          'type' : new FormControl('0'),
          'ashes'  : new FormControl(''),
          'creamation_arrangements'  : new FormControl(''),
          'burial'  : new FormControl(''),
          'burial_arrangements'  : new FormControl(''),
          'some_other_way': new FormControl('')
      });
  }

  /**Fetching the data from database*/
  getData(token: string) {
    this.finalarrangementgetdataSubscription = this.finalarrangementService.fetchData(token).subscribe(
      (arrangementResponse) => {
        console.log(arrangementResponse);
        this.setData(arrangementResponse !== undefined ? arrangementResponse.data : null);
      },
      (errors) => {
        this.errors = {
          errorFlag: true,
          errorMessage: errors.message !== undefined && errors.message !== '' ? errors.message : errors.error.message
        };
        console.log(errors);
      }, () => { this.loading = false; }
    );
  }

  /**Sets the form data.*/
  setData(response = null) {
    this.finalarrangementForm.setValue({
      'type'  : response !== null ? response.type : '0',
      'ashes' : response !== null && parseInt(response.type, 10) === 1 ? response.ashes : '',
      'creamation_arrangements' : response !== null && parseInt(response.type, 10) === 1 ? response.arrangements : '',
      'burial' : response !== null && parseInt(response.type, 10) === 0 ? response.ashes : '',
      'burial_arrangements' : response !== null && parseInt(response.type, 10) === 0 ? response.arrangements : '',
      'some_other_way' : response !== null && parseInt(response.type, 10) === 2 ? response.some_other_way : '',
    });
    this.changeWish(response !== null ? response.type : null);
  }

  toolTipClicked(str: string) {
      console.log(str);
      this.userService.changeCurrentToolTipType(str);
      // this.toolTipMessage = this.toolTipMessageList[str];
      // console.log('tooltip message :', this.toolTipMessage);
  }


  /**When the component initialises*/
  ngOnInit() {}

  /**Checks for authorization token.*/
  parseToken() {
    if (JSON.parse(localStorage.getItem('loggedInUser')).hasOwnProperty('token')) {
      return JSON.parse(localStorage.getItem('loggedInUser')).token;
    }
    return null;
  }

  /**On toggle the radiobutton*/
  changeWish(value = '0') {
    this.flags = {
      burial: parseInt(value, 10) === 0,
      cremation: parseInt(value, 10) === 1,
      someOtherWay: parseInt(value, 10) === 2,
    };
  }

  /**On form submit*/
  submit() {
    let token = this.parseToken();
    let data = this.preparedatabeforeSubmit();
    this.finalarrangementsubmitdataSubscription = this.finalarrangementService.submitfinalAgreement(token, data).subscribe(
      (response) => {
        console.log(response);
        if (response.status) {
          this.router.navigate(['/dashboard']);
        }
      },
      (error) => {
        this.errors = {
          errorFlag: true,
          errorMessage: error.message !== undefined && error.message !== '' ? error.message : error.error.message
        };
        console.log(error);
      }
    );
  }

  /**Prepare form data before submit to database*/
  preparedatabeforeSubmit() {
    let data = {
      user_id: localStorage.getItem('loggedInUser') !== null && localStorage.getItem('loggedInUser') !== undefined ? JSON.parse(localStorage.getItem('loggedInUser')).user.id : null,
      type: this.finalarrangementForm.value.type,
      arrangements: parseInt(this.finalarrangementForm.value.type,  10) === 1 ? this.finalarrangementForm.value.creamation_arrangements : (parseInt(this.finalarrangementForm.value.type,  10) === 0 ? this.finalarrangementForm.value.burial_arrangements : null),
      ashes: parseInt(this.finalarrangementForm.value.type,  10) === 1 ? this.finalarrangementForm.value.ashes : (parseInt(this.finalarrangementForm.value.type,  10) === 0 ? this.finalarrangementForm.value.burial : null),
      some_other_way: parseInt(this.finalarrangementForm.value.type,  10) === 2 ? this.finalarrangementForm.value.some_other_way : (parseInt(this.finalarrangementForm.value.type,  10) === 0 ? this.finalarrangementForm.value.burial : null),
    };
    return data;
  }

  /**Go back to the previous page*/
  goBack() {
    this.location.back();
  }

  /**When the component is destroyed*/
  ngOnDestroy() {
    if (this.finalarrangementgetdataSubscription !== undefined) {
      this.finalarrangementgetdataSubscription.unsubscribe();
    }
    if (this.finalarrangementsubmitdataSubscription !== undefined) {
      this.finalarrangementsubmitdataSubscription.unsubscribe();
    }
  }

}
