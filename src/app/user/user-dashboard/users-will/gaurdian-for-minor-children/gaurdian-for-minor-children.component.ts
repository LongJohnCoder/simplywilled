import {Component, OnDestroy, OnInit} from '@angular/core';
import {Router} from '@angular/router';
import {UserService} from '../../../user.service';
import {UserAuthService} from '../../../user-auth/user-auth.service';
import {Validators, FormGroup, FormArray, FormBuilder, FormControl} from '@angular/forms';
import * as States from '../../../shared/models/states.model' ;
import {ProgressbarService} from '../../shared/services/progressbar.service';
import {Subscription} from 'rxjs/Subscription';

@Component({
  selector: 'app-gaurdian-for-minor-children',
  templateUrl: './gaurdian-for-minor-children.component.html',
  styleUrls: ['./gaurdian-for-minor-children.component.css']
})
export class GaurdianForMinorChildrenComponent implements OnInit, OnDestroy {

  public myForm: FormGroup; // our form model
  errorMessage: any = '';
  userInfo: any;
  states: string[] = [];
  loading = true;
  toolTipMessageList: any;
  getUserDetailSubscription: Subscription;


  constructor(
      private userService: UserService,
      private router: Router,
      private authService: UserAuthService,
      private progressBarService: ProgressbarService,
      private fb: FormBuilder,
  ) {
      this.states = States.States;

      this.toolTipMessageList = {
        'guardian' : [{
              'q' : 'What is a Guardian For Minor Children?',
              // tslint:disable-next-line:max-line-length
              'a' : 'A guardian for minor children is the person you choose to have legal custody of your minor children in the event that both o the child’s parents pass away.',
            }, {
              'q' : 'Why is appointing a guardian for minor children important?',
              // tslint:disable-next-line:max-line-length
              'a' : 'Appointing a guardian for minor children is important because it can avoid court delays and custody battles, and can help you to control who cares for your children upon your passing.'
            }],
            'first_guardian' : [{
              'q' : 'Who should I select as guardian for minor children?',
              // tslint:disable-next-line:max-line-length
              'a' : 'Your first choice for guardian should be the person your would like to have legal custody of your children in the event that both of the child’s parents have passed away.',
            }, {
              'q' : 'Who should I select as the backup guardian?',
              // tslint:disable-next-line:max-line-length
              'a' : 'During the interview, you will also have the opportunity in the interview to choose a “backup” guardian in the event your first choice cannot serve in this fiduciary role. Also, you will have the opportunity to send the person you appoint an email notification through simplywilled.com that you have selected them as a fiduciary of your estate.'
            }],
            'backup_guardian' : [{
              'q' : 'Do I need to appoint a backup guardian?',
              // tslint:disable-next-line:max-line-length
              'a' : 'Yes, you should have a backup guardian in the event that your first choice is unable or unwilling to serve in this role.',
            }, {
              'q' : 'Who should I select?',
              // tslint:disable-next-line:max-line-length
              'a' : 'Your second choice for guardian should be the person your would like to have legal custody of your children in the event that both of the child’s parents have passed away.'
            }],
        };
  }

  ngOnInit() {
    this.createForm();
    this.getUserData();
  }

  toolTipClicked(str: string) {
    console.log(str);
    this.userService.changeCurrentToolTipType(str);
    // this.toolTipMessage = this.toolTipMessageList[str];
    // console.log('tooltip message :', this.toolTipMessage);
  }

  createForm () {
      this.myForm = this.fb.group({
          isGuardianMinorChildren: ['No', Validators.required],
          isBackUpGuardian: ['No', Validators.required],
          guardian: this.fb.array([
              this.fb.group({
                      user_id: this.authService.getUser()['id'],
                      fullname: [''],
                      relationship_with: [''],
                      relationship_other: [''],
                      address: [''],
                      country: new FormControl('United States'),
                      city: [''],
                      state: [''],
                      zip: [''],
                      phone: [''],
                      email_notification: ['0'],
                      email: [''],
                      is_backup: ['']
                  }
              )
          ]),
          backUpGuardian: this.fb.array([
              this.fb.group({
                      user_id: this.authService.getUser()['id'],
                      fullname: [''],
                      relationship_with: [''],
                      relationship_other: [''],
                      address: [''],
                      country: new FormControl('United States'),
                      city: [''],
                      state: [''],
                      zip: [''],
                      phone: [''],
                      email_notification: ['0'],
                      email: [''],
                      is_backup: ['']
                  }
              )
          ])
      });
  }

  onSubmit(model: any) {
    if (model.valid) {
      let data = model.value;
      data.step = 3 ;
      data.user_id = this.authService.getUser()['id'];
      if (data.isBackUpGuardian === 'Yes') {
        data.guardian[0].is_backup = '0';
        data.backUpGuardian[0].is_backup = '1';
      } else {
        data.guardian[0].is_backup = '0';
        data.backUpGuardian[0].is_backup = '0';
      }
      this.userService.editProfile(data).subscribe(
        (response: any) => {
          this.router.navigate(['/dashboard/will/4']);
        },
        (error: any) => {
          for(let prop in error.error.message) {
            this.errorMessage = error.error.message[prop];
            break;
          }
          setTimeout(() => {
            this.errorMessage = '';
          }, 3000);
        }
      );
    } else {
      alert('Please fill up the required fields');
      this.markFormGroupTouched(this.myForm);
    }
  }

  /**Mark all form controls as touched*/
  markFormGroupTouched (formGroup) {
    (<any>Object).values(formGroup.controls).forEach(control => {
      control.markAsTouched();
      control.markAsDirty();
    });
    this.checkValidation((formGroup.get('guardian') as FormArray).controls);
    this.checkValidation((formGroup.get('backUpGuardian') as FormArray).controls);
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

  getUserData() {

      this.userService.getUserDetails(this.authService.getUser()['id']).subscribe(
          (response: any) => {
              this.userInfo = response.data[2].data;
              let totalChildrenData = response.data[1].data;
              // set values to myForm
              this.myForm.patchValue({
                  isGuardianMinorChildren: this.userInfo.isGuardianMinorChildren || 'No',
                  isBackUpGuardian: this.userInfo.isBackUpGuardian || 'No'
              });
              if (!!this.userInfo.guardian.length) {
                  // reactive form data sets for guardian
                  this.userInfo.guardian[0].relationship_other = this.userInfo.guardian[0].relationship_with === 'Other' ? this.userInfo.guardian[0].relationship_other : '';
                  const guardianFGs = this.userInfo.guardian.map(gr => this.fb.group(gr));
                  const guardianFormArray = this.fb.array(guardianFGs);
                  this.myForm.setControl('guardian', guardianFormArray);

                  if ( this.userInfo.backupGuardian.length) {
                      this.userInfo.backupGuardian[0].relationship_other = this.userInfo.backupGuardian[0].relationship_with === 'Other' ? this.userInfo.backupGuardian[0].relationship_other : '';
                      // reactive form data sets for backUpGuardian
                      const backUpGuardianFGs = this.userInfo.backupGuardian.map(gr => this.fb.group(gr));
                      const backUpGuardianFormArray = this.fb.array(backUpGuardianFGs);
                      console.log(backUpGuardianFormArray);
                      this.myForm.setControl('backUpGuardian', backUpGuardianFormArray);
                  }
                  if (this.myForm.value.isGuardianMinorChildren === 'Yes') {
                      this.addValidationGaurdianToForm();
                  }
                  if (this.myForm.value.isBackUpGuardian === 'Yes') {
                      this.addValidationBackUpGaurdianToForm();
                  }
              }
              this.progressBarService.changeWidth({width: 40});
          },
          (error: any) => {
              console.log(error.error);
          },
          () => {
            this.loading = false;
          }
      );
  }

  changeNotification(control: string, value: string) {
    this.myForm.get(control).setValue(value);
    if (value === '1') {
      this.myForm.get(`guardian.0.email`).setValidators([Validators.required, Validators.pattern(/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/)]);
      this.myForm.get(`guardian.0.email`).updateValueAndValidity();
    } else {
      this.myForm.get(`guardian.0.email`).clearValidators();
      this.myForm.get(`guardian.0.email`).updateValueAndValidity();
    }
  }

  changeNotificationBackup(control: string, value: string) {
    this.myForm.get(control).setValue(value);
    if (value === '1') {
      this.myForm.get(`backUpGuardian.0.email`).setValidators([Validators.required, Validators.pattern(/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/)]);
      this.myForm.get(`backUpGuardian.0.email`).updateValueAndValidity();
    } else {
      this.myForm.get(`backUpGuardian.0.email`).clearValidators();
      this.myForm.get(`backUpGuardian.0.email`).updateValueAndValidity();
    }
  }

  goBack() {
      this.router.navigate(['/dashboard/will/2']);
  }
  addRemoveValidation() {

    if (this.myForm.value.isGuardianMinorChildren === 'No') {
        this.removeValidationGaurdianToForm();
        this.myForm.patchValue({
            isBackUpGuardian : 'No'
        });
    } else {
        this.addValidationGaurdianToForm();
    }
    if (this.myForm.value.isBackUpGuardian === 'No') {
        console.log('no');
        this.removeValidationBackUpGaurdianToForm();
    } else {
        console.log('yes');
        this.addValidationBackUpGaurdianToForm();
    }
  }
  addValidationGaurdianToForm() {

      this.myForm.get(`guardian.0.fullname`).setValidators([Validators.required, Validators.pattern(/\s+(?=\S{2})/ )]);
      this.myForm.get(`guardian.0.fullname`).updateValueAndValidity();
      this.myForm.get(`guardian.0.relationship_with`).setValidators([Validators.required]);
      this.myForm.get(`guardian.0.relationship_with`).updateValueAndValidity();
      this.myForm.get(`guardian.0.address`).setValidators([Validators.required]);
      this.myForm.get(`guardian.0.address`).updateValueAndValidity();
      this.myForm.get(`guardian.0.city`).setValidators([Validators.required]);
      this.myForm.get(`guardian.0.city`).updateValueAndValidity();
      this.myForm.get(`guardian.0.state`).setValidators([Validators.required]);
      this.myForm.get(`guardian.0.state`).updateValueAndValidity();
      this.myForm.get(`guardian.0.zip`).setValidators([Validators.required, Validators.pattern('^\\d{5}$')]);
      this.myForm.get(`guardian.0.zip`).updateValueAndValidity();
      this.myForm.get(`guardian.0.phone`).setValidators([Validators.required, Validators.pattern(/^\d{10}$/)]);
      this.myForm.get(`guardian.0.phone`).updateValueAndValidity();
      // this.myForm.get(`guardian.0.email`).setValidators([Validators.email]);
      // this.myForm.get(`guardian.0.email`).updateValueAndValidity();
      this.myForm.get(`guardian.0.email_notification`).setValidators([Validators.required]);
      this.myForm.get(`guardian.0.email_notification`).updateValueAndValidity();

  }

  addValidationBackUpGaurdianToForm() {

      this.myForm.get(`backUpGuardian.0.fullname`).setValidators([Validators.required, Validators.pattern(/\s+(?=\S{2})/ )]);
      this.myForm.get(`backUpGuardian.0.fullname`).updateValueAndValidity();
      this.myForm.get(`backUpGuardian.0.relationship_with`).setValidators([Validators.required]);
      this.myForm.get(`backUpGuardian.0.relationship_with`).updateValueAndValidity();
      this.myForm.get(`backUpGuardian.0.address`).setValidators([Validators.required]);
      this.myForm.get(`backUpGuardian.0.address`).updateValueAndValidity();
      this.myForm.get(`backUpGuardian.0.city`).setValidators([Validators.required]);
      this.myForm.get(`backUpGuardian.0.city`).updateValueAndValidity();
      this.myForm.get(`backUpGuardian.0.state`).setValidators([Validators.required]);
      this.myForm.get(`backUpGuardian.0.state`).updateValueAndValidity();
      this.myForm.get(`backUpGuardian.0.zip`).setValidators([Validators.required, Validators.pattern('^\\d{5}$')]);
      this.myForm.get(`backUpGuardian.0.zip`).updateValueAndValidity();
      this.myForm.get(`backUpGuardian.0.phone`).setValidators([Validators.required, Validators.pattern(/^\d{10}$/)]);
      this.myForm.get(`backUpGuardian.0.phone`).updateValueAndValidity();
      // this.myForm.get(`backUpGuardian.0.email`).setValidators([Validators.email]);
      // this.myForm.get(`backUpGuardian.0.email`).updateValueAndValidity();
      this.myForm.get(`backUpGuardian.0.email_notification`).setValidators([Validators.required]);
      this.myForm.get(`backUpGuardian.0.email_notification`).updateValueAndValidity();
  }

  removeValidationGaurdianToForm() {
      this.myForm.get(`guardian.0.fullname`).setValidators([]);
      this.myForm.get(`guardian.0.fullname`).updateValueAndValidity();
      this.myForm.get(`guardian.0.relationship_with`).setValidators([]);
      this.myForm.get(`guardian.0.relationship_with`).updateValueAndValidity();
      this.myForm.get(`guardian.0.address`).setValidators([]);
      this.myForm.get(`guardian.0.address`).updateValueAndValidity();
      this.myForm.get(`guardian.0.city`).setValidators([]);
      this.myForm.get(`guardian.0.city`).updateValueAndValidity();
      this.myForm.get(`guardian.0.state`).setValidators([]);
      this.myForm.get(`guardian.0.state`).updateValueAndValidity();
      this.myForm.get(`guardian.0.zip`).setValidators([]);
      this.myForm.get(`guardian.0.zip`).updateValueAndValidity();
      this.myForm.get(`guardian.0.phone`).clearValidators();
      this.myForm.get(`guardian.0.phone`).updateValueAndValidity();
      // this.myForm.get(`guardian.0.email`).setValidators([]);
      // this.myForm.get(`guardian.0.email`).updateValueAndValidity();
      this.myForm.get(`guardian.0.email_notification`).setValidators([]);
      this.myForm.get(`guardian.0.email_notification`).updateValueAndValidity();
  }

    removeValidationBackUpGaurdianToForm() {
        this.myForm.get(`backUpGuardian.0.fullname`).setValidators([]);
        this.myForm.get(`backUpGuardian.0.fullname`).updateValueAndValidity();
        this.myForm.get(`backUpGuardian.0.relationship_with`).setValidators([]);
        this.myForm.get(`backUpGuardian.0.relationship_with`).updateValueAndValidity();
        this.myForm.get(`backUpGuardian.0.address`).setValidators([]);
        this.myForm.get(`backUpGuardian.0.address`).updateValueAndValidity();
        this.myForm.get(`backUpGuardian.0.city`).setValidators([]);
        this.myForm.get(`backUpGuardian.0.city`).updateValueAndValidity();
        this.myForm.get(`backUpGuardian.0.state`).setValidators([]);
        this.myForm.get(`backUpGuardian.0.state`).updateValueAndValidity();
        this.myForm.get(`backUpGuardian.0.zip`).setValidators([]);
        this.myForm.get(`backUpGuardian.0.zip`).updateValueAndValidity();
        this.myForm.get(`backUpGuardian.0.phone`).clearValidators();
        this.myForm.get(`backUpGuardian.0.phone`).updateValueAndValidity();
        // this.myForm.get(`backUpGuardian.0.email`).setValidators([]);
        // this.myForm.get(`backUpGuardian.0.email`).updateValueAndValidity();
        this.myForm.get(`backUpGuardian.0.email_notification`).setValidators([]);
        this.myForm.get(`backUpGuardian.0.email_notification`).updateValueAndValidity();
    }

  /**Change validation on relationship change**/
  changeRelationshipValidation(value) {
    if (value === 'Other') {
      this.myForm.get(`guardian.0.relationship_other`).setValidators([Validators.required]);
      this.myForm.get(`guardian.0.relationship_other`).updateValueAndValidity();
    } else {
      this.myForm.get(`guardian.0.relationship_other`).clearValidators();
      this.myForm.get(`guardian.0.relationship_other`).updateValueAndValidity();
    }
  }

  /**Change validation on backup relationship change**/
  changeBackupRelationshipValidation(value) {
    if (value === 'Other') {
      this.myForm.get(`backUpGuardian.0.relationship_other`).setValidators([Validators.required]);
      this.myForm.get(`backUpGuardian.0.relationship_other`).updateValueAndValidity();
    } else {
      this.myForm.get(`backUpGuardian.0.relationship_other`).clearValidators();
      this.myForm.get(`backUpGuardian.0.relationship_other`).updateValueAndValidity();
    }
  }

  /**When the component is destroyed*/
  ngOnDestroy() {
    if (this.getUserDetailSubscription !== undefined) {
      this.getUserDetailSubscription.unsubscribe();
    }
  }
}
