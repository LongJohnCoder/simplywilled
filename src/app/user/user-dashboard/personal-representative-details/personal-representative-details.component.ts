import { GlobalTooltipComponent } from './../global-tooltip/global-tooltip.component';
import {Component, OnDestroy, OnInit} from '@angular/core';
import {Router} from '@angular/router';
import {Validators, FormGroup, FormBuilder, FormControl, FormArray} from '@angular/forms';
import {UserAuthService} from '../../user-auth/user-auth.service';
import {UserService} from '../../user.service';
import {Subscription} from 'rxjs/Subscription';
import {mod} from 'ngx-bootstrap/chronos/utils';
import {ProgressbarService} from '../shared/services/progressbar.service';

@Component({
    selector: 'app-personal-representative-details',
    templateUrl: './personal-representative-details.component.html',
    styleUrls: ['./personal-representative-details.component.css']
})
export class PersonalRepresentativeDetailsComponent implements OnInit, OnDestroy {
    /**Variable definition*/
    public personalRepresentativeDetailsForm: FormGroup;
    errorFlag = false;
    errorMessage: any = '';
    fullUserInfo: any;
    states: string[] = [];
    loading = true;
    userSubscription: Subscription;
    edituserSubscription: Subscription;
    checkUserSpouseStatusSubscription: Subscription;
    isBackupPersonalRepresentative: any;
    guardian: any;
    backupGuardian: any;
    checkValidationSubscription: Subscription;
    toolTipMessageList: any;
    /**Constructor call*/
    constructor(
        private  authService: UserAuthService,
        private userService: UserService,
        private router: Router,
        private progressBarService: ProgressbarService,
        private fb: FormBuilder,
    ) {
      this.progressBarService.changeWidth({width: 0});
        //this.createForm();
      this.getUserData();

      this.toolTipMessageList = {
        'personal_representative' : [{
            'q' : 'What is a Personal Representative?',
            // tslint:disable-next-line:max-line-length
            'a' : 'Your Personal Representative, also know as an executor or settlor in some jurisdictions, is the individual you appoint to administer your estate. Their duties include, filing your Will with the court, marshaling your assets, paying creditors, making distributions to heirs and settling your estate.'
          }, {
            'q' : 'Who Should I Select As My Personal Representative?',
            // tslint:disable-next-line:max-line-length
            'a' : 'Your Personal Representative should be an individual over the age of 18, that your trust, such as a spouse or partner, a relative, or a close friend. Please remember, using SimplyWilled.com you can choose to send your Personal Representative an email notification that you have selected them as a fiduciary of your estate.'
          }],
          'backup_personal_representative' : [{
            'q' : 'Do I need to appoint a backup Personal Representative?',
            // tslint:disable-next-line:max-line-length
            'a' : 'It\'s always a good idea to select a backup Personal Representative in the event that your first choice is unable or unwilling to act. Please remember, using SimplyWilled.com you can choose to send them an email notification that you have selected them as a fiduciary of your estate.'
          }]
        };
    }

    ngOnInit() {

    }

    toolTipClicked(str: string) {
      console.log(str);
      this.userService.changeCurrentToolTipType(str);
      // this.toolTipMessage = this.toolTipMessageList[str];
      // console.log('tooltip message :', this.toolTipMessage);
    }

    /**
     *This function is fetching user data
     */
    getUserData() {
        this.userSubscription = this.userService.getUserDetails(this.authService.getUser()['id']).subscribe(
          (response: any) => {
              this.fullUserInfo = response.data[4];
              this.isBackupPersonalRepresentative = this.fullUserInfo.isBackupPersonalRepresentative;
              this.guardian = this.fullUserInfo.personalRepresentative[0];
              this.backupGuardian = this.fullUserInfo.backupPersonalRepresentative[0];
              console.log(this.guardian);
              /*this.personalRepresentativeDetailsForm.controls['isBackupPersonalRepresentative'].setValue( this.fullUserInfo.isBackupPersonalRepresentative);
              if (this.fullUserInfo.personalRepresentative[0]) {
                  let guardianFGs = this.fullUserInfo.personalRepresentative.map(gr => this.fb.group(gr));
                  let guardianFormArray = this.fb.array(guardianFGs);
                  this.personalRepresentativeDetailsForm.setControl('personalRepresentative', guardianFormArray);
              }
              if (this.fullUserInfo.backupPersonalRepresentative[0]) {
                  let guardianFGs = this.fullUserInfo.backupPersonalRepresentative.map(gr => this.fb.group(gr));
                  let guardianFormArray = this.fb.array(guardianFGs);
                  this.personalRepresentativeDetailsForm.setControl('backupPersonalRepresentative', guardianFormArray);
              }*/
          },
          (error: any) => {
              console.log(error.error);
          },
        () => {
            this.createForm(this.isBackupPersonalRepresentative, this.guardian, this.backupGuardian);
            this.addConditionalValidators();
            this.loading = false;
          }
      );
    }

    /**
     * function to create the Reactive form
     */
    createForm(isBackupPersonalRepresentative = null, guardian = null, backupGuardian = null) {
        this.personalRepresentativeDetailsForm = this.fb.group({
            isPersonalRepresentative: ['Yes', Validators.required],
            // tslint:disable-next-line:max-line-length
            isBackupPersonalRepresentative: [isBackupPersonalRepresentative !== null ? isBackupPersonalRepresentative : 'No', Validators.required],
            personalRepresentative: this.fb.array([
              this.fb.group({
                    user_id: new FormControl(this.authService.getUser()['id'], [Validators.required]),
                    // tslint:disable-next-line:max-line-length
                    fullname: new FormControl(  guardian !== null && guardian.fullname !== null ?  guardian.fullname : '', [Validators.required,  Validators.pattern(/\s+(?=\S{2})/)]),
                    // tslint:disable-next-line:max-line-length
                    relationship_with: new FormControl(guardian !== null && guardian.relationship_with !== null ?  guardian.relationship_with : '', [Validators.required]),
                    // tslint:disable-next-line:max-line-length
                    relationship_other: new FormControl(guardian !== null && guardian.relationship_other !== null ?  (guardian !== null && guardian.relationship_with === 'Other' ? guardian.relationship_other : '') : '', guardian !== null && guardian.relationship_with === 'Other' ? [Validators.required] : []),
                    // tslint:disable-next-line:max-line-length
                    address: new FormControl(guardian !== null && guardian.address !== null ?  guardian.address : '', [Validators.required]),
                    country: new FormControl('United States', [Validators.required]),
                    // tslint:disable-next-line:max-line-length
                    phone:  new FormControl(guardian !== null && guardian.phone !== null && guardian.phone !== undefined ?  guardian.phone : '', [Validators.required, Validators.pattern(/^\d{10}$/)]),
                    city: new FormControl(guardian !== null && guardian.city !== null ?  guardian.city : '', [Validators.required]),
                    state: new FormControl(guardian !== null && guardian.state !== null ?  guardian.state : '', [Validators.required]),
                    // tslint:disable-next-line:max-line-length
                    zip: new FormControl(guardian !== null && guardian.zip !== null ?  guardian.zip : '', [Validators.required, Validators.pattern(/^\d{5}$/)]),
                    // tslint:disable-next-line:max-line-length
                    email_notification: new FormControl(guardian !== null && guardian.email_notification !== null ?  guardian.email_notification : '0', [Validators.required]),
                    email: new FormControl(guardian !== null && guardian.email !== null ?  guardian.email : '', ),
                    // tslint:disable-next-line:max-line-length
                    is_backuprepresentative: new FormControl(guardian !== null && guardian.is_backuprepresentative !== null ?  guardian.is_backuprepresentative : '0'),
                }
              )
            ]),
            backupPersonalRepresentative: this.fb.array([
              this.fb.group({
                  user_id: this.authService.getUser()['id'],
                  fullname: [backupGuardian !== null && backupGuardian.fullname !== null ?  backupGuardian.fullname : ''],
                  // tslint:disable-next-line:max-line-length
                  relationship_with: [backupGuardian !== null && backupGuardian.relationship_with !== null ?  backupGuardian.relationship_with : ''],
                  // tslint:disable-next-line:max-line-length
                  relationship_other: new FormControl(backupGuardian !== null && backupGuardian.relationship_other !== null ?  ( backupGuardian !== null && backupGuardian.relationship_with === 'Other' ? backupGuardian.relationship_other : '') : ''),
                  address: [backupGuardian !== null && backupGuardian.address !== null ?  backupGuardian.address : ''],
                  country: ['United States'],
                  // tslint:disable-next-line:max-line-length
                  phone:  new FormControl(backupGuardian !== null && backupGuardian.phone !== null && backupGuardian.phone !== undefined ?  backupGuardian.phone : ''),
                  city: [backupGuardian !== null && backupGuardian.city !== null ?  backupGuardian.city : ''],
                  state: [backupGuardian !== null && backupGuardian.state !== null ?  backupGuardian.state : ''],
                  zip: [backupGuardian !== null && backupGuardian.zip !== null ?  backupGuardian.zip : ''],
                  // tslint:disable-next-line:max-line-length
                  email_notification: [backupGuardian !== null && backupGuardian.email_notification !== null ?  backupGuardian.email_notification : '0'],
                  email: [backupGuardian !== null && backupGuardian.email !== null ?  backupGuardian.email : ''],
                  // tslint:disable-next-line:max-line-length
                  is_backuprepresentative: [backupGuardian !== null && backupGuardian.is_backuprepresentative !== null ?  backupGuardian.is_backuprepresentative : '1']
                }
              )
            ])
        });
        if (isBackupPersonalRepresentative === 'Yes') {
          this.addValidationToBackupRepresentativeForm();
        } else {
          this.removeValidationToBackupRepresentativeForm();
        }
        if (guardian !== null && guardian.email_notification !== null) {
          this.changeValidationEmail(guardian.email_notification);
        }
        if (backupGuardian !== null && backupGuardian.is_backuprepresentative !== null) {
          this.changeValidation(backupGuardian.email_notification);
        }
    }

  /**Set dynamic validations*/
  addConditionalValidators() {
    this.checkValidationSubscription = this.personalRepresentativeDetailsForm.get('isBackupPersonalRepresentative').valueChanges.subscribe(
      (isBackupPersonalRepresentative) => {
        switch (isBackupPersonalRepresentative) {
          case 'No': this.removeValidationToBackupRepresentativeForm();
                     break;
          case 'Yes': this.addValidationToBackupRepresentativeForm();
                      break;
        }
      }
    );
  }
    /**
     *This function is for getting the back page link
     */
    goBack() {
        this.router.navigate(['/dashboard']);
    }

    /**
     * submit the data to save
     * @param model
     */
    onSubmit(model: any) {
       if (model.valid) {
        this.loading = true;
        let modelData = model.value;
        modelData.step = 5 ;
        modelData.user_id = this.authService.getUser()['id'];
        this.edituserSubscription = this.userService.editProfile(modelData).subscribe(
          (response: any) => {
            this.router.navigate(['/dashboard/your-personal-representative-powers']);
            //this.checkUserSpouseStatus();
          },
          (error: any) => {
            this.errorFlag = true;
            for (const prop in error.error.message) {
              this.errorMessage = error.error.message[prop];
              break;
            }
            this.loading = false;
            setTimeout(() => {
              this.errorFlag = false;
              this.errorMessage = '';
            }, 3000);
          }, () => { this.loading = false; }
        );
      } else {
        alert('Please fill up the required fields');
        console.log(this.personalRepresentativeDetailsForm.get('errors'));
        this.markFormGroupTouched(model);
      }
    }

    /**Mark all form controls as touched*/
    markFormGroupTouched (formGroup) {
      (<any>Object).values(formGroup.controls).forEach(control => {
        control.markAsTouched();
        control.markAsDirty();
      });
      this.checkValidation((formGroup.get('personalRepresentative') as FormArray).controls);
      this.checkValidation((formGroup.get('backupPersonalRepresentative') as FormArray).controls);
    }

    /**Checks validation for form arrays*/
    checkValidation(formArray) {
      for (let item of formArray) {
        (<any>Object).values(item.controls).forEach(control => {
          control.markAsTouched();
          control.markAsDirty();
        });
      }
    }
    /**
     *function for add or remove backup personal representative form
     */
    addRemoveValidation() {
        if (this.personalRepresentativeDetailsForm.value.isBackupPersonalRepresentative === 'No') {
            this.removeValidationToBackupRepresentativeForm();
        } else {
            this.addValidationToBackupRepresentativeForm();
        }
    }

    /**
     *This function is uses to add validation to the backup personal representative form
     */
    addValidationToBackupRepresentativeForm() {
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.fullname`).setValidators([Validators.required, Validators.pattern(/\s+(?=\S{2})/)]);
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.fullname`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.relationship_with`).setValidators([Validators.required]);
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.relationship_with`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.address`).setValidators([Validators.required]);
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.address`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.city`).setValidators([Validators.required]);
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.city`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.state`).setValidators([Validators.required]);
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.state`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.zip`).setValidators([Validators.required, Validators.pattern('^\\d{5}$')]);
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.zip`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.phone`).setValidators([Validators.required, Validators.pattern(/^\d{10}$/)]);
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.phone`).updateValueAndValidity();
        // this.myForm.get(`guardian.0.email`).setValidators([Validators.email]);
        // this.myForm.get(`guardian.0.email`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.email_notification`).setValidators([Validators.required]);
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.email_notification`).updateValueAndValidity();
        if (this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.relationship_with`).value === 'Other') {
          this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.relationship_other`).setValidators([Validators.required]);
          this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.relationship_other`).updateValueAndValidity();
        }

    }

    /**
     *Function to remove validation from the backup representative form
     * */
    removeValidationToBackupRepresentativeForm() {
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.fullname`).setValidators([]);
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.fullname`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.relationship_with`).setValidators([]);
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.relationship_with`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.relationship_other`).clearValidators();
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.relationship_other`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.address`).setValidators([]);
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.address`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.city`).setValidators([]);
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.city`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.state`).setValidators([]);
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.state`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.zip`).setValidators([]);
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.zip`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.phone`).clearValidators();
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.phone`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.email`).clearValidators();
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.email`).updateValueAndValidity();
        // this.myForm.get(`backUpGuardian.0.email`).setValidators([]);
        // this.myForm.get(`backUpGuardian.0.email`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.email_notification`).setValidators([]);
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.email_notification`).updateValueAndValidity();
    }

    /**
     *function to add validation to the personal representative form
     */
    addFormValidation() {
        this.personalRepresentativeDetailsForm.get(`personalRepresentative.0.fullname`).setValidators([Validators.required]);
        this.personalRepresentativeDetailsForm.get(`personalRepresentative.0.fullname`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`personalRepresentative.0.relationship_with`).setValidators([Validators.required]);
        this.personalRepresentativeDetailsForm.get(`personalRepresentative.0.relationship_with`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`personalRepresentative.0.address`).setValidators([Validators.required]);
        this.personalRepresentativeDetailsForm.get(`personalRepresentative.0.address`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`personalRepresentative.0.city`).setValidators([Validators.required]);
        this.personalRepresentativeDetailsForm.get(`personalRepresentative.0.city`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`personalRepresentative.0.state`).setValidators([Validators.required]);
        this.personalRepresentativeDetailsForm.get(`personalRepresentative.0.state`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`personalRepresentative.0.zip`).setValidators([Validators.required, Validators.pattern('^\\d{5}$')]);
        this.personalRepresentativeDetailsForm.get(`personalRepresentative.0.zip`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`personalRepresentative.0.phone`).setValidators([Validators.required, Validators.pattern(/^\d{10}$/)]);
        this.personalRepresentativeDetailsForm.get(`personalRepresentative.0.phone`).updateValueAndValidity();
        // this.myForm.get(`guardian.0.email`).setValidators([Validators.email]);
        // this.myForm.get(`guardian.0.email`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`personalRepresentative.0.email_notification`).setValidators([Validators.required]);
        this.personalRepresentativeDetailsForm.get(`personalRepresentative.0.email_notification`).updateValueAndValidity();
        if (this.personalRepresentativeDetailsForm.get(`personalRepresentative.0.relationship_with`).value === 'Other') {
          this.personalRepresentativeDetailsForm.get(`personalRepresentative.0.relationship_other`).setValidators([Validators.required]);
          this.personalRepresentativeDetailsForm.get(`personalRepresentative.0.relationship_other`).updateValueAndValidity();
        }
    }

    /**Change validation on relationship change**/
    changeRelationshipValidation(value) {
      if (value === 'Other') {
        this.personalRepresentativeDetailsForm.get(`personalRepresentative.0.relationship_other`).setValidators([Validators.required]);
        this.personalRepresentativeDetailsForm.get(`personalRepresentative.0.relationship_other`).updateValueAndValidity();
      } else {
        this.personalRepresentativeDetailsForm.get(`personalRepresentative.0.relationship_other`).clearValidators();
        this.personalRepresentativeDetailsForm.get(`personalRepresentative.0.relationship_other`).updateValueAndValidity();
      }
    }

    /**Change validation on backup relationship change**/
    changeBackupRelationshipValidation(value) {
      if (value === 'Other') {
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.relationship_other`).setValidators([Validators.required]);
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.relationship_other`).updateValueAndValidity();
      } else {
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.relationship_other`).clearValidators();
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.relationship_other`).updateValueAndValidity();
      }
    }
    /**
     *check User Spouse status for Routing
     */
     checkUserSpouseStatus() {
        this.checkUserSpouseStatusSubscription = this.userService.getUserDetails(this.authService.getUser()['id']).subscribe(
            (response: any) => {
                   if ( response.data[0].data.userInfo.marital_status === 'M' || response.data[0].data.userInfo.marital_status === 'R' ) {
                       // move to spouse page
                       this.router.navigate(['/dashboard/provide-user-spouse']);
                   } else {
                      // move to personal property page
                       this.router.navigate(['/dashboard/personal-property-distributed']);
                   }
                }, ( error: any ) => {
                    console.log(error.error);
                });
    }

    /**Change validation on  email notification change for backup*/
    changeValidation(value) {
       if (value === '1') {
         this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.email`).setValidators([Validators.required, Validators.pattern(/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/)]);
         this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.email`).updateValueAndValidity();
       } else {
         this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.email`).clearValidators();
         this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.email`).updateValueAndValidity();
       }
    }

    /**Change validation on  email notification change for normal*/
    changeValidationEmail(value) {
      if (value === '1') {
        this.personalRepresentativeDetailsForm.get(`personalRepresentative.0.email`).setValidators([Validators.required, Validators.pattern(/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/)]);
        this.personalRepresentativeDetailsForm.get(`personalRepresentative.0.email`).updateValueAndValidity();
      } else {
        this.personalRepresentativeDetailsForm.get(`personalRepresentative.0.email`).clearValidators();
        this.personalRepresentativeDetailsForm.get(`personalRepresentative.0.email`).updateValueAndValidity();
      }
    }

    /**When the component is destroyed*/
    ngOnDestroy() {
        if (this.userSubscription !== undefined) {
          this.userSubscription.unsubscribe();
        }
        if (this.edituserSubscription !== undefined) {
          this.edituserSubscription.unsubscribe();
        }
        if (this.checkUserSpouseStatusSubscription !== undefined) {
          this.checkUserSpouseStatusSubscription.unsubscribe();
        }
        if (this.checkValidationSubscription !== undefined) {
          this.checkValidationSubscription.unsubscribe();
        }
    }
}
