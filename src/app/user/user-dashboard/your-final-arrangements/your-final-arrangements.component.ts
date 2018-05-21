import {Component, OnDestroy, OnInit} from '@angular/core';
import {FormBuilder, FormControl, FormGroup} from '@angular/forms';
import {YourFinalArrangementsService} from './services/your-final-arrangements.service';
import {Subscription} from 'rxjs/Subscription';
import {Router} from '@angular/router';
import {Location} from '@angular/common';

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
    cremation: false
  };
  errors = {
    errorFlag: false,
    errorMessage: ''
  };

  /**When constructor is called*/
  constructor (
              private _fb: FormBuilder,
              private finalarrangementService: YourFinalArrangementsService,
              private router: Router,
              private location: Location
  ) {
    let token = this.parseToken();
    this.createForm();
    this.getData(token);
  }

  /**Initialise the form*/
  createForm() {
      this.finalarrangementForm = this._fb.group({
          'type' : new FormControl('0'),
          'ashes'  : new FormControl(''),
          'creamation_arrangements'  : new FormControl(''),
          'burial'  : new FormControl(''),
          'burial_arrangements'  : new FormControl(''),
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
      }
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
    });
    this.changeWish(response !== null ? response.type : null);
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
