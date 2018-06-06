import { Component, OnInit } from '@angular/core';
import {Router} from '@angular/router';
import {UserService} from '../../../user.service';
import {UserAuthService} from '../../../user-auth/user-auth.service';
import {Validators, FormGroup, FormArray, FormBuilder, FormControl} from '@angular/forms';
import * as States from '../../../shared/models/states.model' ;
import {ProgressbarService} from '../../shared/services/progressbar.service';

@Component({
  selector: 'app-gaurdian-for-minor-children',
  templateUrl: './gaurdian-for-minor-children.component.html',
  styleUrls: ['./gaurdian-for-minor-children.component.css']
})
export class GaurdianForMinorChildrenComponent implements OnInit {

  public myForm: FormGroup; // our form model
  errorMessage: any = '';
  userInfo: any;
  states: string[] = [];
  loading = true;

  constructor(
      private userService: UserService,
      private router: Router,
      private authService: UserAuthService,
      private progressBarService: ProgressbarService,
      private fb: FormBuilder,
  ) {
      this.states = States.States;
  }

  ngOnInit() {
    this.createForm();
    this.getUserData();
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
          this.router.navigate(['/dashboard']);
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
              // set values to myForm
              this.myForm.patchValue({
                  isGuardianMinorChildren: this.userInfo.isGuardianMinorChildren || 'No',
                  isBackUpGuardian: this.userInfo.isBackUpGuardian || 'No'
              });
              console.log(this.userInfo.guardian);
              if (!!this.userInfo.guardian.length) {
                  // reactive form data sets for guardian
                  const guardianFGs = this.userInfo.guardian.map(gr => this.fb.group(gr));
                  const guardianFormArray = this.fb.array(guardianFGs);
                  this.myForm.setControl('guardian', guardianFormArray);

                  if ( this.userInfo.backupGuardian.length) {
                      // reactive form data sets for backUpGuardian
                      const backUpGuardianFGs = this.userInfo.backupGuardian.map(gr => this.fb.group(gr));
                      const backUpGuardianFormArray = this.fb.array(backUpGuardianFGs);
                      this.myForm.setControl('backUpGuardian', backUpGuardianFormArray);
                  }
                  if (this.myForm.value.isGuardianMinorChildren === 'Yes') {
                      this.addValidationGaurdianToForm();
                  }
                  if (this.myForm.value.isBackUpGuardian === 'Yes') {
                      this.addValidationBackUpGaurdianToForm();
                  }
              }
              this.progressBarService.changeWidth({width: 66.66});
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
      this.myForm.get(`guardian.0.email`).setValidators([Validators.required, Validators.pattern(/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/)]);
      this.myForm.get(`guardian.0.email`).updateValueAndValidity();
    } else {
      this.myForm.get(`guardian.0.email`).clearValidators();
      this.myForm.get(`guardian.0.email`).updateValueAndValidity();
    }
  }

  changeNotificationBackup(control: string, value: string) {
    this.myForm.get(control).setValue(value);
    if (value === '1') {
      this.myForm.get(`backUpGuardian.0.email`).setValidators([Validators.required, Validators.pattern(/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/)]);
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
}
