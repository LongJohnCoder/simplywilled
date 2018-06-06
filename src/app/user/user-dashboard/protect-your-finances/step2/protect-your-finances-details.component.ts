import {Component, OnDestroy, OnInit} from '@angular/core';
import { ProtectYourFinancesService } from '../services/protect-your-finances.service';
import { Router, ActivatedRoute, Route } from '@angular/router';
import { UserAuthService } from '../../../user-auth/user-auth.service';
import { UserService } from '../../../user.service';
import { NgForm, Validators, FormGroup, FormBuilder, FormControl} from '@angular/forms';
import {Subscription} from 'rxjs/Subscription';
import {ProgressbarService} from '../../shared/services/progressbar.service';
import * as States from '../../../shared/models/states.model' ;

@Component({
  selector: 'app-protect-your-finances-details',
  templateUrl: './protect-your-finances-details.component.html',
  styleUrls: ['./protect-your-finances-details.component.css']
})
export class ProtectYourFinancesDetailsComponent implements OnInit, OnDestroy {
  public poaDetailsForm: FormGroup;
  public response: any;
  data = {
    poaDetailsPowers: null,
    poaDetailsHolders: null,
    poaDetailsBackup: null,
    isBackupattorney: 0
  };
  accessToken: string;
  mainSubscription: Subscription;
  isInformSubscription: Subscription;
  isBackupAttorneySubscription: Subscription;
  isBackupInformSubscription: Subscription;
  statesSubscription: Subscription;
  loading = true;
  states: string[] = [];
  trackPage = false;

  constructor(
    private protectYourFinancesService: ProtectYourFinancesService,
    private fb: FormBuilder,
    private authService: UserAuthService,
    private userService: UserService,
    private progressBarService: ProgressbarService,
    private router: Router
  ) {
    this.states = States.States;
    this.accessToken = this.parseToken();
  }

  /**When the component initialises*/
  ngOnInit() {
    this.getPoaDetailsData();
  }

  /**Checks for authorization user id.*/
  parseToken() {
    if (JSON.parse(localStorage.getItem('loggedInUser')).hasOwnProperty('token')) {
      return JSON.parse(localStorage.getItem('loggedInUser')).token;
    }
    return null;
  }
  /**
   * get the power of attorney details in a json object
   */
  getPoaDetailsData(): void {
    this.mainSubscription = this.protectYourFinancesService.getPoaDetails(this.accessToken).subscribe(
      (response: any) => {
        console.log(response);
        this.response = response.data;
        this.data.poaDetailsPowers  = response.data !== null ? JSON.parse(this.response.attorney_powers) : null;
        this.data.poaDetailsHolders = response.data !== null ? JSON.parse(this.response.attorney_holders) : null;
        this.data.poaDetailsBackup  = response.data !== null ? JSON.parse(this.response.attorney_backup) : null;
        this.data.isBackupattorney  = response.data !== null ?  parseInt(this.response.is_backupattorney, 10) : 0;
      },
      (error: any) => {
        console.log('error in protectYourFinancesService: ', error);
      }, () => {
        this.createForm(this.data);
        this.addConditionalValidators();
      }
    );

    this.statesSubscription = this.protectYourFinancesService.getStates(this.accessToken).subscribe(
      (data: any) => {
        let stateName = data !== null && data.stateInfo !== null ? data.stateInfo.name : '';
        switch (stateName) {
          case 'Florida':
          case 'Maryland':
          case 'Minnesota':
          case 'New York':  this.progressBarService.changeWidth({width: 0});
                            this.router.navigate(['/dashboard/protect-your-finances-details']);
                            this.trackPage = true;
                            break;
          default:          this.progressBarService.changeWidth({width: 50});
                            this.trackPage = false;
                            break;
        }
      }, (error: any) => {
        console.log(error);
      }, () => {}
    );
  }

  /**
   * @param dt as a data array
   * @param dtBackup as a data array backup
   * creates the form structure of the html with the data comming from poaData
   * returns void
   */
  createForm(data = null) {
    this.poaDetailsForm = this.fb.group({
     /* is_backupattorney: new FormControl(isBackupattorney !== undefined && isBackupattorney !== null ? isBackupattorney : 0),
      is_inform           : new FormControl(formObj !== undefined && formObj !== null && formObj.is_inform !== undefined
                            ? formObj.is_inform : 0, [
                              Validators.required
                            ]),
      email               : new FormControl(formObj !== undefined && formObj !== null && formObj.email !== undefined
                            ? formObj.email : ''),
      phone               : new FormControl(formObj !== undefined && formObj !== null && formObj.phone !== undefined
                            ? formObj.phone : '', [Validators.required]),
      address             : new FormControl(formObj !== undefined && formObj !== null && formObj.address !== undefined
                            ? formObj.address : ''),
      fullname            : new FormControl(formObj !== undefined && formObj !== null && formObj.fullname !== undefined
                            ? formObj.fullname : ''),
      relationship        : new FormControl(formObj !== undefined && formObj !== null && formObj.relationship !== undefined
                            ? formObj.relationship : ''),
      other_relationship  : new FormControl(formObj !== undefined && formObj !== null && formObj.other_relationship !== undefined
                            ? formObj.other_relationship : ''),
      backup_is_inform    : new FormControl(formObjBackup !== undefined && formObjBackup !== null && formObjBackup.is_inform !== undefined
                                ? formObjBackup.is_inform : 0),
      backup_email        : new FormControl(formObjBackup !== undefined && formObjBackup !== null && formObjBackup.email !== undefined
                                ? formObjBackup.email : ''),
      backup_phone        : new FormControl(formObjBackup !== undefined && formObjBackup !== null && formObjBackup.phone !== undefined
                                ? formObjBackup.phone : ''),
      backup_address      : new FormControl(formObjBackup !== undefined && formObjBackup !== null && formObjBackup.address !== undefined
                                ? formObjBackup.address : ''),
      backup_fullname     : new FormControl(formObjBackup !== undefined && formObjBackup !== null && formObjBackup.fullname !== undefined
                                ? formObjBackup.fullname : ''),
      backup_relationship : new FormControl(formObjBackup !== undefined && formObjBackup !== null && formObjBackup.relationship !== undefined
                                ? formObjBackup.relationship : ''),
      backup_other_relationship  : new FormControl(formObjBackup !== undefined && formObjBackup !== null && formObjBackup.other_relationship !== undefined
                                ? formObjBackup.other_relationship : ''),*/
      is_backupattorney   : new FormControl(data !== null && data.isBackupattorney  !== null ? data.isBackupattorney : 0),
      is_inform           : new FormControl(data !== null && data.poaDetailsHolders !== null ? (data.poaDetailsHolders.is_inform !== null ? data.poaDetailsHolders.is_inform : 0) : 0, [Validators.required]),
      email               : new FormControl(data !== null && data.poaDetailsHolders !== null ? (data.poaDetailsHolders.email !== null ? data.poaDetailsHolders.email : '') : '' ),
      phone               : new FormControl(data !== null && data.poaDetailsHolders !== null ? (data.poaDetailsHolders.phone !== null ? data.poaDetailsHolders.phone : '') : '' , [Validators.required, Validators.minLength(10)]),
      address             : new FormControl(data !== null && data.poaDetailsHolders !== null ? (data.poaDetailsHolders.address !== null ? data.poaDetailsHolders.address : '') : '', [Validators.required]),
      city                : new FormControl(data !== null && data.poaDetailsHolders !== null ? (data.poaDetailsHolders.city !== null ? data.poaDetailsHolders.city : '') : '', [Validators.required]),
      state               : new FormControl(data !== null && data.poaDetailsHolders !== null ? (data.poaDetailsHolders.state !== null && data.poaDetailsHolders.state !== undefined ? data.poaDetailsHolders.state : '') : '', [Validators.required]),
      zip                 : new FormControl(data !== null && data.poaDetailsHolders !== null ? (data.poaDetailsHolders.zip !== null ? data.poaDetailsHolders.zip : '') : '', [Validators.required, Validators.pattern('^\\d{5}$')]),
      fullname            : new FormControl(data !== null && data.poaDetailsHolders !== null ? (data.poaDetailsHolders.fullname !== null ? data.poaDetailsHolders.fullname : '') : '', [Validators.required, Validators.pattern(/\s+(?=\S{2})/ )]),
      country             : new FormControl('United States'),
      relationship        : new FormControl(data !== null && data.poaDetailsHolders !== null ? (data.poaDetailsHolders.relationship !== null ? data.poaDetailsHolders.relationship : '')  : ''),
      other_relationship  : new FormControl(data !== null && data.poaDetailsHolders !== null ? (data.poaDetailsHolders.other_relationship !== null ? data.poaDetailsHolders.other_relationship : '')  : ''),
      backup_is_inform    : new FormControl(data !== null && data.poaDetailsBackup  !== null ? (data.poaDetailsBackup.is_inform !== null ? data.poaDetailsBackup.is_inform : 0)  : 0),
      backup_email        : new FormControl(data !== null && data.poaDetailsBackup  !== null ? (data.poaDetailsBackup.email !== null ? data.poaDetailsBackup.email : '')  : ''),
      backup_phone        : new FormControl(data !== null && data.poaDetailsBackup  !== null ? (data.poaDetailsBackup.phone !== null ? data.poaDetailsBackup.phone : '')  : ''),
      backup_address      : new FormControl(data !== null && data.poaDetailsBackup  !== null ? (data.poaDetailsBackup.address !== null ? data.poaDetailsBackup.address : '')  : ''),
      backup_fullname     : new FormControl(data !== null && data.poaDetailsBackup  !== null ? (data.poaDetailsBackup.fullname !== null ? data.poaDetailsBackup.fullname : '')  : ''),
      backup_city         : new FormControl(data !== null && data.poaDetailsBackup  !== null ? (data.poaDetailsBackup.city !== null ? data.poaDetailsBackup.city : '') : '' ),
      backup_state        : new FormControl(data !== null && data.poaDetailsBackup  !== null ? (data.poaDetailsBackup.state !== null && data.poaDetailsBackup.state !== undefined ? data.poaDetailsBackup.state : '') : ''),
      backup_zip          : new FormControl(data !== null && data.poaDetailsBackup  !== null ? (data.poaDetailsBackup.zip !== null ? data.poaDetailsBackup.zip : '') : ''),
      backup_relationship : new FormControl(data !== null && data.poaDetailsBackup  !== null ? (data.poaDetailsBackup.relationship !== null ? data.poaDetailsBackup.relationship : '')  : ''),
      backup_other_relationship  : new FormControl(data !== null && data.poaDetailsBackup  !== null ? (data.poaDetailsBackup.other_relationship !== null ? data.poaDetailsBackup.other_relationship : '')  : ''),
      backup_country             : new FormControl('United States'),
    });
    this.loading = false;
  }

  /**Set dynamic validations*/
  addConditionalValidators() {
    this.isInformSubscription = this.poaDetailsForm.get('is_inform').valueChanges.subscribe(
      (is_inform) => { console.log(is_inform);
        switch (is_inform) {
          case 0:   if (this.poaDetailsForm.get('is_backupattorney').value === 1) {
                      this.clearValidationFor([
                        'email', 'backup_phone', 'backup_fullname', 'backup_address', 'backup_email', 'backup_city', 'backup_zip', 'backup_state'
                      ]);
                    } else {
                      this.clearValidationFor([
                        'email'
                      ]);
                    }
                   break;
          case 1:  this.poaDetailsForm.get('email').setValidators([Validators.required, Validators.pattern(/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/)]);
                   this.poaDetailsForm.get('email').updateValueAndValidity();
                   break;
          default: this.clearValidationFor([
                    'email', 'backup_phone', 'backup_fullname', 'backup_address', 'backup_email', 'backup_city', 'backup_zip', 'backup_state'
                  ]);
                   break;
        }
      }
    );

    this.isBackupAttorneySubscription = this.poaDetailsForm.get('is_backupattorney').valueChanges.subscribe(
      (is_backupattorney) => {
        console.log(is_backupattorney);
        switch (is_backupattorney) {
          case 0:   this.clearValidationFor([
                       'backup_phone', 'backup_fullname', 'backup_address', 'backup_email', 'backup_city', 'backup_zip', 'backup_state'
                    ]);
                    break;
          case 1:   this.poaDetailsForm.get('backup_phone').setValidators([Validators.required, Validators.minLength(10)]);
                    this.poaDetailsForm.get('backup_address').setValidators([Validators.required]);
                    this.poaDetailsForm.get('backup_fullname').setValidators([Validators.required, Validators.pattern(/\s+(?=\S{2})/ )]);
                    this.poaDetailsForm.get('backup_zip').setValidators([Validators.required, Validators.pattern('^\\d{5}$')]);
                    this.poaDetailsForm.get('backup_city').setValidators([Validators.required]);
                    this.poaDetailsForm.get('backup_state').setValidators([Validators.required]);
                    this.poaDetailsForm.get('backup_phone').updateValueAndValidity();
                    this.poaDetailsForm.get('backup_address').updateValueAndValidity();
                    this.poaDetailsForm.get('backup_fullname').updateValueAndValidity();
                    this.poaDetailsForm.get('backup_zip').updateValueAndValidity();
                    this.poaDetailsForm.get('backup_city').updateValueAndValidity();
                    this.poaDetailsForm.get('backup_state').updateValueAndValidity();
                    break;
          default:  this.clearValidationFor([
                      'backup_phone', 'backup_fullname', 'backup_address', 'backup_email', 'backup_city', 'backup_zip', 'backup_state'
                    ]);
                    break;
        }
      }
    );

    this.isBackupInformSubscription = this.poaDetailsForm.get('backup_is_inform').valueChanges.subscribe(
      (backup_is_inform) => {
        switch (backup_is_inform) {
          case 0:  this.clearValidationFor([
                      'backup_email'
                    ]);
                   break;
          case 1:  this.poaDetailsForm.get('backup_email').setValidators([Validators.required, Validators.pattern(/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/)]);
                   this.poaDetailsForm.get('backup_email').updateValueAndValidity();
                   break;
          default: this.clearValidationFor([
                     'backup_email'
                   ]);
                   break;
        }
      }
    );
  }

  /**Clears validation except certain fields*/
  clearValidationFor(formControlArray: Array<string> = []) {
    formControlArray.forEach(control => {
      this.poaDetailsForm.get(control).clearValidators();
      this.poaDetailsForm.get(control).updateValueAndValidity();
    });
  }

  /**
   * @param field : field name
   * @param relationship : relationship name
   * sets form relationship value with the option value that comes
   */
  relationshipChange(field, relationship) {
    this.poaDetailsForm.get(field).setValue(relationship);
  }

  /**
   * sends the data to the server
   */
  send() {
    console.log(this.poaDetailsForm.valid);
    if (this.poaDetailsForm.valid) {
      let request = this.createRequest();
      console.log(request);
      /*
      console.log('type : ', typeof JSON.parse(this.response.attorney_powers));
      this.response.is_backupattorney = this.poaDetailsForm.get('is_backupattorney').value;
      this.response.attorney_holders = this.poaDetailsForm.get('attorney_holders').value;
      this.response.attorney_backup = this.poaDetailsForm.get('attorney_backup').value;
      this.response.attorney_powers = JSON.parse(this.response.attorney_powers);*/
      this.protectYourFinancesService.postPoaDetails(this.accessToken, request).subscribe(
        (data) => {
          if (data.status) {
            this.router.navigate(['/dashboard']);
          }
        }, (error) => {
          console.log(error);
        }
      );
    } else {
      alert('Please up the required fields.');
      this.markValidity();
    }
  }

  /**Creates the request dataset*/
  createRequest() {
    let userId =  this.parseUserId();
    let request = {
      user_id: userId,
      is_backupattorney: this.poaDetailsForm.get('is_backupattorney').value,
      attorney_powers:   this.data.poaDetailsPowers,
      attorney_holders: {
        is_inform           : this.poaDetailsForm.get('is_inform').value,
        email               : this.poaDetailsForm.get('email').value,
        phone               : this.poaDetailsForm.get('phone').value,
        address             : this.poaDetailsForm.get('address').value,
        state               : this.poaDetailsForm.get('state').value,
        city                : this.poaDetailsForm.get('city').value,
        zip                 : this.poaDetailsForm.get('zip').value,
        fullname            : this.poaDetailsForm.get('fullname').value,
        relationship        : this.poaDetailsForm.get('relationship').value,
        other_relationship  : this.poaDetailsForm.get('other_relationship').value,
      },
      attorney_backup: {
        is_inform           : this.poaDetailsForm.get('is_backupattorney').value === 1 ? this.poaDetailsForm.get('backup_is_inform').value : '',
        email               : this.poaDetailsForm.get('is_backupattorney').value === 1 ? this.poaDetailsForm.get('backup_email').value : '',
        phone               : this.poaDetailsForm.get('is_backupattorney').value === 1 ? this.poaDetailsForm.get('backup_phone').value : '',
        address             : this.poaDetailsForm.get('is_backupattorney').value === 1 ? this.poaDetailsForm.get('backup_address').value : '',
        state               : this.poaDetailsForm.get('is_backupattorney').value === 1 ? this.poaDetailsForm.get('backup_state').value : '',
        city                : this.poaDetailsForm.get('is_backupattorney').value === 1 ? this.poaDetailsForm.get('backup_city').value : '',
        zip                 : this.poaDetailsForm.get('is_backupattorney').value === 1 ? this.poaDetailsForm.get('backup_zip').value : '',
        fullname            : this.poaDetailsForm.get('is_backupattorney').value === 1 ? this.poaDetailsForm.get('backup_fullname').value : '',
        relationship        : this.poaDetailsForm.get('is_backupattorney').value === 1 ? this.poaDetailsForm.get('backup_relationship').value : '',
        other_relationship  : this.poaDetailsForm.get('is_backupattorney').value === 1 ? this.poaDetailsForm.get('backup_other_relationship').value : '',
      },
      is_complete: 1
    };
    return request;
  }

  /**Checks for authorization user id.*/
  parseUserId() {
    if (JSON.parse(localStorage.getItem('loggedInUser')).hasOwnProperty('user')) {
      return JSON.parse(localStorage.getItem('loggedInUser')).user.id;
    }
    return null;
  }

  /**Checks the validity when the form is submitted*/
  markValidity() {
    this.poaDetailsForm.get('fullname').markAsTouched();
    this.poaDetailsForm.get('fullname').markAsDirty();
    this.poaDetailsForm.get('address').markAsTouched();
    this.poaDetailsForm.get('address').markAsDirty();
    this.poaDetailsForm.get('phone').markAsTouched();
    this.poaDetailsForm.get('phone').markAsDirty();
    this.poaDetailsForm.get('city').markAsTouched();
    this.poaDetailsForm.get('city').markAsDirty();
    this.poaDetailsForm.get('state').markAsTouched();
    this.poaDetailsForm.get('state').markAsDirty();
    this.poaDetailsForm.get('zip').markAsTouched();
    this.poaDetailsForm.get('zip').markAsDirty();
    if (this.poaDetailsForm.get('is_inform').value === 1) {
      this.poaDetailsForm.get('email').markAsTouched();
      this.poaDetailsForm.get('email').markAsDirty();
    }
    if (this.poaDetailsForm.get('is_backupattorney').value === 1) {
      this.poaDetailsForm.get('backup_fullname').markAsTouched();
      this.poaDetailsForm.get('backup_fullname').markAsDirty();
      this.poaDetailsForm.get('backup_address').markAsTouched();
      this.poaDetailsForm.get('backup_address').markAsDirty();
      this.poaDetailsForm.get('backup_phone').markAsTouched();
      this.poaDetailsForm.get('backup_phone').markAsDirty();
      this.poaDetailsForm.get('backup_city').markAsTouched();
      this.poaDetailsForm.get('backup_city').markAsDirty();
      this.poaDetailsForm.get('backup_state').markAsTouched();
      this.poaDetailsForm.get('backup_state').markAsDirty();
      this.poaDetailsForm.get('backup_zip').markAsTouched();
      this.poaDetailsForm.get('backup_zip').markAsDirty();
    }
    if (this.poaDetailsForm.get('backup_is_inform').value === 1) {
      this.poaDetailsForm.get('backup_email').markAsTouched();
      this.poaDetailsForm.get('backup_email').markAsDirty();
    }
  }

  /**
   * @param field change yes no fields
   * @param newValue this new value gets inserted
   */
  changeMe(field, newValue) {
    this.poaDetailsForm.get(field).setValue(parseInt(newValue, 10));
  }

  /**When the component is destroyed*/
  ngOnDestroy() {
    if (this.mainSubscription  !== undefined) {
      this.mainSubscription.unsubscribe();
    }
    if (this.isInformSubscription  !== undefined) {
      this.isInformSubscription.unsubscribe();
    }
    if (this.isBackupAttorneySubscription  !== undefined) {
      this.isBackupAttorneySubscription.unsubscribe();
    }
    if (this.isBackupInformSubscription  !== undefined) {
      this.isBackupInformSubscription.unsubscribe();
    }
    if (this.statesSubscription !== undefined) {
      this.statesSubscription.unsubscribe();
    }
  }
  /**Return back to previous step*/
  goBack() {
    if (this.trackPage) {
      this.router.navigate(['/dashboard']);
    } else {
      this.router.navigate(['/dashboard/protect-your-finances']);
    }
  }
}
