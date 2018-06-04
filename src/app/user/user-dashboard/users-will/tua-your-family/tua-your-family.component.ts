import {Component, OnDestroy, OnInit} from '@angular/core';
import { Router } from '@angular/router';
import { UserService } from '../../../user.service';
import { UserAuthService } from '../../../user-auth/user-auth.service';
import * as moment from 'moment';
import { FormBuilder, FormControl, FormGroup, Validators, FormArray } from '@angular/forms';
import {UserDashboardService} from '../../user-dashboard.service';
import {Subscription} from 'rxjs/Subscription';
import {ProgressbarService} from '../../shared/services/progressbar.service';


@Component({
    selector: 'app-tua-your-family',
    templateUrl: './tua-your-family.component.html',
    styleUrls: ['./tua-your-family.component.css']
})
export class TuaYourFamilyComponent implements OnInit, OnDestroy {
  /**Variable declaration*/
  columnFormArray: FormArray;
  days: string[] = [];
  months: string[];
  years: string[] = [];
  user: any;
  userInfo: any;
  today: any;
  errorMessage: string;
  chidrenForm: FormGroup;
  showTable = false;
  editFlag = false;
  otherChildren = false;
  deceasedChildrenNames = false;
  maxChidren = '';
  loading = true;
  totalChildrenSubscription: Subscription;
  deceasedChildrenNameSubscription: Subscription;
  userSubscription: Subscription;
  editSubscription: Subscription;
  setValidationFlag = false;
  errors = {
    errorFlag: false,
    errorMessage: ''
  };

  /**Constructor call*/
  constructor(private router: Router,
              private userService: UserService,
              private authService: UserAuthService,
              private dashboardService: UserDashboardService,
              private progressBarService: ProgressbarService,
              private fb: FormBuilder) {
    this.createForm();
    this.months = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '11', '12'];
    this.user = this.authService.getUser();

  }

  /**Creates the form*/
  createForm() {
    this.chidrenForm = this.fb.group({
      'totalChildren': new FormControl('0', [Validators.required]),
      'totalChildrenOther': new FormControl(''),
      'user_id': new FormControl(''),
      'step': new FormControl('2'),
      'childrenInfo': this.fb.array([]),
      'deceasedChildren': new FormControl('0'),
      'deceasedChildrenNames': new FormControl(''),
    });
  }

  /**creates the form array*/
  createItem(editFlag = false, userInfo = null): FormGroup {
    let dobSplit = userInfo !== null && userInfo.dob !== null ? userInfo.dob.split('-') : '';
    return this.fb.group({
      fullname: new FormControl(editFlag && userInfo !== null && userInfo !== undefined ? userInfo.fullname : '', [Validators.required]),
      gender: new FormControl(editFlag && userInfo !== null && userInfo !== undefined ? userInfo.gender : '', [Validators.required]),
      user_id: new FormControl(editFlag && userInfo !== null && userInfo !== undefined ? userInfo.user_id : this.user.id, [Validators.required]),
      spouseMonth: new FormControl(editFlag && userInfo !== null && userInfo !== undefined && dobSplit[1] !== undefined ? dobSplit[1] : '', [Validators.required]),
      spouseDay: new FormControl(editFlag && userInfo !== null && userInfo !== undefined && dobSplit[2] !== undefined ? dobSplit[2] : '', [Validators.required]),
      spouseYear: new FormControl(editFlag && userInfo !== null && userInfo !== undefined && dobSplit[0] !== undefined ? dobSplit[0] : '', [Validators.required])
    });
  }

  /**get childreninfo form array*/
  get childrenInfo(): FormArray {
    return this.chidrenForm.get('childrenInfo') as FormArray;
  }

  /**When the component initialises*/
  ngOnInit() {
    this.chidrenForm.controls['user_id'].setValue(this.user.id);
    this.userSubscription = this.userService.getUserDetails(this.user.id).subscribe(
      (response: any) => {
        this.dashboardService.updateUserDetails(response.data);
        if (response.data[1].data) {
          this.editFlag = true;
          this.userInfo = response.data[1].data;
          this.userInfo.totalChildren = response.data[1].data.totalChildren;
          this.userInfo.isDesceasedChildren = response.data[1].data.desceasedChildren;
          this.userInfo.deceasedChildreNames = response.data[1].data.deceasedChildrenNames;
          this.userInfo.childrenInformation = response.data[1].data.childrenInformation;
          this.setData(this.editFlag, this.userInfo);
          if (this.userInfo.totalChildren === undefined || this.userInfo.totalChildren === null || this.userInfo.totalChildren === 0) {
            this.progressBarService.changeWidth({width: 50});
          } else {
            this.progressBarService.changeWidth({width: 33.33});
          }
        }
      },
      (error: any) => {
        console.log(error);
      }, () => {
        this.loading = false;
        this.addConditionalValidators();
      }
    );
    this.today = new Date;
    const currentYear = moment(this.today).year();
    for (let i = currentYear; i > (currentYear - 101); i--) {
      this.years.push(String(i));
    }
    for (let i = 1; i <= 31; i++) {
      let day = (i / 10) < 1 ? '0' + String(i) : String(i);
      this.days.push(day);
    }
  }

  /**Set dynamic validations*/
  addConditionalValidators() {
    this.totalChildrenSubscription = this.chidrenForm.get('totalChildren').valueChanges.subscribe(
      (totalChildren: string) => {
        if (totalChildren === 'other') {
            this.chidrenForm.get('totalChildrenOther').setValidators([Validators.required]);
            this.chidrenForm.get('totalChildrenOther').updateValueAndValidity();
        } else {
          this.chidrenForm.get('totalChildrenOther').clearValidators();
          this.chidrenForm.get('totalChildrenOther').updateValueAndValidity();
        }
      }
    );
    this.deceasedChildrenNameSubscription = this.chidrenForm.get('deceasedChildren').valueChanges.subscribe(
      (deceasedChildren) => {
        if (deceasedChildren === 'Yes') {
          this.chidrenForm.get('deceasedChildrenNames').setValidators([Validators.required]);
          this.chidrenForm.get('deceasedChildrenNames').updateValueAndValidity();
        } else {
          this.chidrenForm.get('deceasedChildrenNames').clearValidators();
          this.chidrenForm.get('deceasedChildrenNames').updateValueAndValidity();
        }
      }
    );
  }

  /**Sets the form values*/
  setData(editFlag, userInfo) {
    this.deceasedChildrenNames = this.userInfo.isDesceasedChildren === 'Yes';
    this.chidrenForm.controls['totalChildren'].setValue(this.userInfo.totalChildren);
    this.chidrenForm.controls['deceasedChildren'].setValue(this.userInfo.isDesceasedChildren);
    this.chidrenForm.controls['deceasedChildrenNames'].setValue(this.userInfo.deceasedChildreNames);
    this.columnFormArray = this.chidrenForm.get('childrenInfo') as FormArray;
    for (let i = 0; i < userInfo.childrenInformation.length; i++) {
      this.columnFormArray.push(this.createItem(editFlag, userInfo.childrenInformation[i]));
    }
    this.showTable = true;
  }

  /**On select total number of children*/
  selectedNumberOfChildren(totalNumberOfChildren) {
    this.setValidationFlag = false;
    this.showTable = false;
    this.columnFormArray = this.chidrenForm.get('childrenInfo') as FormArray;
    this.clearFormArray(this.columnFormArray);
    let numberofChild = totalNumberOfChildren;
    if (Number(numberofChild) > 20) {
      this.maxChidren = 'Max';
      return;
    }
    this.maxChidren = '';
    if (numberofChild !== '0' && numberofChild !== '') {
      this.otherChildren = false;
      //   this.columns = [];
      for (let i = 0; i < numberofChild; i++) {
        this.columnFormArray.push(this.createItem(this.editFlag, this.userInfo.childrenInformation[i]));
      }
      this.showTable = true;
    }
    if (numberofChild === 'other') {
      this.chidrenForm.controls['totalChildrenOther'].setValue('');
      this.otherChildren = true;
    } else {
      this.otherChildren = false;
    }
  }

  /**clears the form array*/
  clearFormArray(formArray: FormArray) {
    while (formArray.length !== 0) {
      formArray.removeAt(0);
    }
  }

  /**checks the deceased children radio button value*/
  checkIsDeceasedChildren(event: any) {
    const IsDeceasedChildrenValue = event.target.value;
    if (IsDeceasedChildrenValue === '1') {
      this.deceasedChildrenNames = true;
    } else {
      this.deceasedChildrenNames = false;
    }
  }

  /**Go back to previous window*/
  goBack() {
    this.router.navigate(['/dashboard/will']);
  }

  /**When the form is submitted*/
  onSubmit() {
    if (this.chidrenForm.valid) {
      if (this.chidrenForm.value.totalChildren === 'other') {
        this.chidrenForm.value.totalChildren = this.chidrenForm.value.totalChildrenOther;
      }
      for (let i = 0; i < this.chidrenForm.value.childrenInfo.length; i++) {
        let dob = this.chidrenForm.value.childrenInfo[i].spouseYear + '-' + this.chidrenForm.value.childrenInfo[i].spouseMonth + '-' + this.chidrenForm.value.childrenInfo[i].spouseDay;
        this.chidrenForm.value.childrenInfo[i].dob = dob;
      }
      this.editSubscription = this.userService.editProfile(this.chidrenForm.value).subscribe(
        (data: any) => {
          console.log(data.data);
          if (!data.data.childrenData.length) {
            this.router.navigate(['/dashboard']);
          } else {
            this.router.navigate(['/dashboard/will/3']);
          }
        },
        (error: any) => {
          this.errors.errorFlag = true;
          for (let prop in error.error.message) {
            this.errors.errorMessage = error.error.message[prop];
            break;
          }
        }
      );
    } else {
      alert('Please fill up all the fields');
      this.markFormGroupTouched(this.chidrenForm);
    }
  }

  /**
   * Marks all controls in a form group as touched
   * @param formGroup
   */
  markFormGroupTouched(formGroup: FormGroup) {
    (<any>Object).values(formGroup.controls).forEach(control => {
      control.markAsTouched();
      control.markAsDirty();
    });

    this.checkValidation((this.chidrenForm.get('childrenInfo') as FormArray).controls);
  }

  /**Checks validation for form arrays*/
  checkValidation(formArray) {
    for (let item of formArray) {
      if (item.controls['fullname'].hasError('required') || item.controls['gender'].hasError('required')
        || item.controls['user_id'].hasError('required') || item.controls['spouseMonth'].hasError('required')
        || item.controls['spouseYear'].hasError('required') || item.controls['spouseDay'].hasError('required')
      ) {
        this.setValidationFlag = true;
        break;
      }
      this.setValidationFlag = false;
    }
  }

  /**When the component is destroyed*/
  ngOnDestroy() {
    if (this.userSubscription !== undefined) {
      this.userSubscription.unsubscribe();
    }
    if (this.editSubscription !== undefined) {
      this.editSubscription.unsubscribe();
    }
    if (this.totalChildrenSubscription !== undefined) {
      this.totalChildrenSubscription.unsubscribe();
    }
    if (this.deceasedChildrenNameSubscription !== undefined) {
      this.deceasedChildrenNameSubscription.unsubscribe();
    }
  }
}
