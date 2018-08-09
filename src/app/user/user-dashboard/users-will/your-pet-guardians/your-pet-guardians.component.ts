import { Component, OnInit } from '@angular/core';
import {FormArray, FormBuilder, FormControl, FormGroup, Validators} from '@angular/forms';
import * as States from '../../../shared/models/states.model';
import {UserAuthService} from '../../../user-auth/user-auth.service';
import {UserService} from '../../../user.service';
import {ProgressbarService} from '../../shared/services/progressbar.service';
import {Router} from '@angular/router';

@Component({
  selector: 'app-your-pet-guardians',
  templateUrl: './your-pet-guardians.component.html',
  styleUrls: ['./your-pet-guardians.component.css']
})
export class YourPetGuardiansComponent implements OnInit {

  public petGuardianForm: FormGroup; // our form model
  errorMessage: any = '';
  errorFlag = false;
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
    this.addValidationGaurdianToForm();
  }

  createForm () {
    this.petGuardianForm = this.fb.group({
      isPetGuardian: ['No', Validators.required],
      isBackUpPetGuardian: ['No', Validators.required],
      petGuardian: this.fb.array([
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
      backUpPetGuardian: this.fb.array([
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
      this.loading = true;
      let data = model.value;
      data.step = 12;
      data.user_id = this.authService.getUser()['id'];
      if (data.isBackUpPetGuardian === 'Yes') {
        data.petGuardian[0].is_backup = '0';
        data.backUpPetGuardian[0].is_backup = '1';
      } else {
        data.petGuardian[0].is_backup = '0';
        data.backUpPetGuardian[0].is_backup = '0';
      }
      //console.log(data);
      this.userService.editProfile(data).subscribe(
        (response: any) => {
          if (response.status) {
            this.router.navigate(['/dashboard']);
          }
        },
        (error: any) => {
          this.errorFlag = true;
          for(let prop in error.error.message) {
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
      this.markFormGroupTouched(this.petGuardianForm);
    }
  }

  /**Mark all form controls as touched*/
  markFormGroupTouched (formGroup) {
    (<any>Object).values(formGroup.controls).forEach(control => {
      control.markAsTouched();
      control.markAsDirty();
    });
    this.checkValidation((formGroup.get('petGuardian') as FormArray).controls);
    this.checkValidation((formGroup.get('backUpPetGuardian') as FormArray).controls);
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
        this.userInfo = response.data[11].data;
        console.log(this.userInfo);
        let totalChildrenData = response.data[1].data;
        // set values to petGuardianForm
        this.petGuardianForm.patchValue({
          //isPetGuardian: this.userInfo.isPetGuardian || 'No',
          isPetGuardian: 'Yes',
          isBackUpPetGuardian: this.userInfo.isBackUpPetGuardian || 'No'
        });
        if (!!this.userInfo.petGuardian.length) {
          // reactive form data sets for petGuardian
          this.userInfo.petGuardian[0].relationship_other = this.userInfo.petGuardian[0].relationship_with === 'Other' ? this.userInfo.petGuardian[0].relationship_other : '';
          const guardianFGs = this.userInfo.petGuardian.map(gr => this.fb.group(gr));
          const guardianFormArray = this.fb.array(guardianFGs);
          console.log(guardianFormArray);
          this.petGuardianForm.setControl('petGuardian', guardianFormArray);

          if ( this.userInfo.backUpPetGuardian.length) {
            this.userInfo.backUpPetGuardian[0].relationship_other = this.userInfo.backUpPetGuardian[0].relationship_with === 'Other' ? this.userInfo.backUpPetGuardian[0].relationship_other : '';
            // reactive form data sets for backUpGuardian
            const backUpGuardianFGs = this.userInfo.backUpPetGuardian.map(gr => this.fb.group(gr));
            const backUpGuardianFormArray = this.fb.array(backUpGuardianFGs);
            console.log(backUpGuardianFormArray);
            this.petGuardianForm.setControl('backUpPetGuardian', backUpGuardianFormArray);
          }
          if (this.petGuardianForm.value.isPetGuardian === 'Yes') {
            this.addValidationGaurdianToForm();
            if (this.petGuardianForm.get(`petGuardian.0.email_notification`).value === '1') {
              this.petGuardianForm.get(`petGuardian.0.email`).setValidators([Validators.required, Validators.pattern(/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/)]);
              this.petGuardianForm.get(`petGuardian.0.email`).updateValueAndValidity();
            } else {
              this.petGuardianForm.get(`petGuardian.0.email`).clearValidators();
              this.petGuardianForm.get(`petGuardian.0.email`).updateValueAndValidity();
            }
          }
          if (this.petGuardianForm.value.isBackUpPetGuardian === 'Yes') {
            this.addValidationBackUpGaurdianToForm();
            if (this.petGuardianForm.get(`backUpPetGuardian.0.email_notification`).value === '1') {
              this.petGuardianForm.get(`backUpPetGuardian.0.email`).setValidators([Validators.required, Validators.pattern(/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/)]);
              this.petGuardianForm.get(`backUpPetGuardian.0.email`).updateValueAndValidity();
            } else {
              this.petGuardianForm.get(`backUpPetGuardian.0.email`).clearValidators();
              this.petGuardianForm.get(`backUpPetGuardian.0.email`).updateValueAndValidity();
            }
          }
        }

        // tslint:disable-next-line:max-line-length
        const progress = this.progressBarService.checkProgress(response.data[0].data.userInfo.children, response.data[0].data.userInfo.has_pet, 5);
        this.progressBarService.changeWidth({'width': progress});
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
    this.petGuardianForm.get(control).setValue(value);
    if (value === '1') {
      this.petGuardianForm.get(`petGuardian.0.email`).setValidators([Validators.required, Validators.pattern(/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/)]);
      this.petGuardianForm.get(`petGuardian.0.email`).updateValueAndValidity();
    } else {
      this.petGuardianForm.get(`petGuardian.0.email`).clearValidators();
      this.petGuardianForm.get(`petGuardian.0.email`).updateValueAndValidity();
    }
  }

  changeNotificationBackup(control: string, value: string) {
    this.petGuardianForm.get(control).setValue(value);
    if (value === '1') {
      this.petGuardianForm.get(`backUpPetGuardian.0.email`).setValidators([Validators.required, Validators.pattern(/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/)]);
      this.petGuardianForm.get(`backUpPetGuardian.0.email`).updateValueAndValidity();
    } else {
      this.petGuardianForm.get(`backUpPetGuardian.0.email`).clearValidators();
      this.petGuardianForm.get(`backUpPetGuardian.0.email`).updateValueAndValidity();
    }
  }

  goBack() {
    this.router.navigate(['/dashboard/will/4']);
  }
  addRemoveValidation() {

    if (this.petGuardianForm.value.isPetGuardian === 'No') {
      this.removeValidationGaurdianToForm();
      this.petGuardianForm.patchValue({
        isBackUpPetGuardian : 'No'
      });
    } else {
      this.addValidationGaurdianToForm();
    }
    if (this.petGuardianForm.value.isBackUpPetGuardian === 'No') {
      console.log('no');
      this.removeValidationBackUpGaurdianToForm();
    } else {
      console.log('yes');
      this.addValidationBackUpGaurdianToForm();
    }
  }
  addValidationGaurdianToForm() {

    this.petGuardianForm.get(`petGuardian.0.fullname`).setValidators([Validators.required, Validators.pattern(/\s+(?=\S{2})/ )]);
    this.petGuardianForm.get(`petGuardian.0.fullname`).updateValueAndValidity();
    this.petGuardianForm.get(`petGuardian.0.relationship_with`).setValidators([Validators.required]);
    this.petGuardianForm.get(`petGuardian.0.relationship_with`).updateValueAndValidity();
    this.petGuardianForm.get(`petGuardian.0.address`).setValidators([Validators.required]);
    this.petGuardianForm.get(`petGuardian.0.address`).updateValueAndValidity();
    this.petGuardianForm.get(`petGuardian.0.city`).setValidators([Validators.required]);
    this.petGuardianForm.get(`petGuardian.0.city`).updateValueAndValidity();
    this.petGuardianForm.get(`petGuardian.0.state`).setValidators([Validators.required]);
    this.petGuardianForm.get(`petGuardian.0.state`).updateValueAndValidity();
    this.petGuardianForm.get(`petGuardian.0.zip`).setValidators([Validators.required, Validators.pattern('^\\d{5}$')]);
    this.petGuardianForm.get(`petGuardian.0.zip`).updateValueAndValidity();
    this.petGuardianForm.get(`petGuardian.0.phone`).setValidators([Validators.required, Validators.pattern(/^\d{10}$/)]);
    this.petGuardianForm.get(`petGuardian.0.phone`).updateValueAndValidity();
    // this.petGuardianForm.get(`petGuardian.0.email`).setValidators([Validators.email]);
    // this.petGuardianForm.get(`petGuardian.0.email`).updateValueAndValidity();
    this.petGuardianForm.get(`petGuardian.0.email_notification`).setValidators([Validators.required]);
    this.petGuardianForm.get(`petGuardian.0.email_notification`).updateValueAndValidity();

  }

  addValidationBackUpGaurdianToForm() {

    this.petGuardianForm.get(`backUpPetGuardian.0.fullname`).setValidators([Validators.required, Validators.pattern(/\s+(?=\S{2})/ )]);
    this.petGuardianForm.get(`backUpPetGuardian.0.fullname`).updateValueAndValidity();
    this.petGuardianForm.get(`backUpPetGuardian.0.relationship_with`).setValidators([Validators.required]);
    this.petGuardianForm.get(`backUpPetGuardian.0.relationship_with`).updateValueAndValidity();
    this.petGuardianForm.get(`backUpPetGuardian.0.address`).setValidators([Validators.required]);
    this.petGuardianForm.get(`backUpPetGuardian.0.address`).updateValueAndValidity();
    this.petGuardianForm.get(`backUpPetGuardian.0.city`).setValidators([Validators.required]);
    this.petGuardianForm.get(`backUpPetGuardian.0.city`).updateValueAndValidity();
    this.petGuardianForm.get(`backUpPetGuardian.0.state`).setValidators([Validators.required]);
    this.petGuardianForm.get(`backUpPetGuardian.0.state`).updateValueAndValidity();
    this.petGuardianForm.get(`backUpPetGuardian.0.zip`).setValidators([Validators.required, Validators.pattern('^\\d{5}$')]);
    this.petGuardianForm.get(`backUpPetGuardian.0.zip`).updateValueAndValidity();
    this.petGuardianForm.get(`backUpPetGuardian.0.phone`).setValidators([Validators.required, Validators.pattern(/^\d{10}$/)]);
    this.petGuardianForm.get(`backUpPetGuardian.0.phone`).updateValueAndValidity();
    // this.petGuardianForm.get(`backUpPetGuardian.0.email`).setValidators([Validators.email]);
    // this.petGuardianForm.get(`backUpPetGuardian.0.email`).updateValueAndValidity();
    this.petGuardianForm.get(`backUpPetGuardian.0.email_notification`).setValidators([Validators.required]);
    this.petGuardianForm.get(`backUpPetGuardian.0.email_notification`).updateValueAndValidity();
  }

  removeValidationGaurdianToForm() {
    this.petGuardianForm.get(`petGuardian.0.fullname`).setValidators([]);
    this.petGuardianForm.get(`petGuardian.0.fullname`).updateValueAndValidity();
    this.petGuardianForm.get(`petGuardian.0.relationship_with`).setValidators([]);
    this.petGuardianForm.get(`petGuardian.0.relationship_with`).updateValueAndValidity();
    this.petGuardianForm.get(`petGuardian.0.relationship_other`).clearValidators();
    this.petGuardianForm.get(`petGuardian.0.relationship_other`).updateValueAndValidity();
    this.petGuardianForm.get(`petGuardian.0.address`).setValidators([]);
    this.petGuardianForm.get(`petGuardian.0.address`).updateValueAndValidity();
    this.petGuardianForm.get(`petGuardian.0.city`).setValidators([]);
    this.petGuardianForm.get(`petGuardian.0.city`).updateValueAndValidity();
    this.petGuardianForm.get(`petGuardian.0.state`).setValidators([]);
    this.petGuardianForm.get(`petGuardian.0.state`).updateValueAndValidity();
    this.petGuardianForm.get(`petGuardian.0.zip`).setValidators([]);
    this.petGuardianForm.get(`petGuardian.0.zip`).updateValueAndValidity();
    this.petGuardianForm.get(`petGuardian.0.phone`).clearValidators();
    this.petGuardianForm.get(`petGuardian.0.phone`).updateValueAndValidity();
    this.petGuardianForm.get(`petGuardian.0.email`).clearValidators();
    this.petGuardianForm.get(`petGuardian.0.email`).updateValueAndValidity();
    // this.petGuardianForm.get(`petGuardian.0.email`).setValidators([]);
    // this.petGuardianForm.get(`petGuardian.0.email`).updateValueAndValidity();
    this.petGuardianForm.get(`petGuardian.0.email_notification`).setValidators([]);
    this.petGuardianForm.get(`petGuardian.0.email_notification`).updateValueAndValidity();
  }

  removeValidationBackUpGaurdianToForm() {
    this.petGuardianForm.get(`backUpPetGuardian.0.fullname`).setValidators([]);
    this.petGuardianForm.get(`backUpPetGuardian.0.fullname`).updateValueAndValidity();
    this.petGuardianForm.get(`backUpPetGuardian.0.relationship_with`).setValidators([]);
    this.petGuardianForm.get(`backUpPetGuardian.0.relationship_with`).updateValueAndValidity();
    this.petGuardianForm.get(`backUpPetGuardian.0.relationship_other`).clearValidators();
    this.petGuardianForm.get(`backUpPetGuardian.0.relationship_other`).updateValueAndValidity();
    this.petGuardianForm.get(`backUpPetGuardian.0.address`).setValidators([]);
    this.petGuardianForm.get(`backUpPetGuardian.0.address`).updateValueAndValidity();
    this.petGuardianForm.get(`backUpPetGuardian.0.city`).setValidators([]);
    this.petGuardianForm.get(`backUpPetGuardian.0.city`).updateValueAndValidity();
    this.petGuardianForm.get(`backUpPetGuardian.0.state`).setValidators([]);
    this.petGuardianForm.get(`backUpPetGuardian.0.state`).updateValueAndValidity();
    this.petGuardianForm.get(`backUpPetGuardian.0.zip`).setValidators([]);
    this.petGuardianForm.get(`backUpPetGuardian.0.zip`).updateValueAndValidity();
    this.petGuardianForm.get(`backUpPetGuardian.0.phone`).clearValidators();
    this.petGuardianForm.get(`backUpPetGuardian.0.phone`).updateValueAndValidity();
    this.petGuardianForm.get(`backUpPetGuardian.0.email`).clearValidators();
    this.petGuardianForm.get(`backUpPetGuardian.0.email`).updateValueAndValidity();
    // this.petGuardianForm.get(`backUpPetGuardian.0.email`).setValidators([]);
    // this.petGuardianForm.get(`backUpPetGuardian.0.email`).updateValueAndValidity();
    this.petGuardianForm.get(`backUpPetGuardian.0.email_notification`).setValidators([]);
    this.petGuardianForm.get(`backUpPetGuardian.0.email_notification`).updateValueAndValidity();
  }

  /**Change validation on relationship change**/
  changeRelationshipValidation(value) {
    if (value === 'Other') {
      this.petGuardianForm.get(`petGuardian.0.relationship_other`).setValidators([Validators.required]);
      this.petGuardianForm.get(`petGuardian.0.relationship_other`).updateValueAndValidity();
    } else {
      this.petGuardianForm.get(`petGuardian.0.relationship_other`).clearValidators();
      this.petGuardianForm.get(`petGuardian.0.relationship_other`).updateValueAndValidity();
    }
  }

  /**Change validation on backup relationship change**/
  changeBackupRelationshipValidation(value) {
    if (value === 'Other') {
      this.petGuardianForm.get(`backUpPetGuardian.0.relationship_other`).setValidators([Validators.required]);
      this.petGuardianForm.get(`backUpPetGuardian.0.relationship_other`).updateValueAndValidity();
    } else {
      this.petGuardianForm.get(`backUpPetGuardian.0.relationship_other`).clearValidators();
      this.petGuardianForm.get(`backUpPetGuardian.0.relationship_other`).updateValueAndValidity();
    }
  }
}
