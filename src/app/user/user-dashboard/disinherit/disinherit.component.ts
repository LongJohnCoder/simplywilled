import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormGroup, Validators, FormControl, FormArray} from '@angular/forms';
import {UserAuthService} from '../../user-auth/user-auth.service';
import {UserService} from '../../user.service';
import {Router} from '@angular/router';
import {ProgressbarService} from '../shared/services/progressbar.service';

@Component({
  selector: 'app-disinherit',
  templateUrl: './disinherit.component.html',
  styleUrls: ['./disinherit.component.css']
})
export class DisinheritComponent implements OnInit {
    /**Variable declaration*/
    disinheritForm: FormGroup;
    errorFlag = false;
    errorMessage: any;
    fullUserInfo: any;
    loading = true;
    warningFlag = false;
  /**Constructor call*/
  constructor( private authService: UserAuthService,
               private userService: UserService,
               private router: Router,
               private progressBarService: ProgressbarService,
               private fb: FormBuilder, ) { this.progressBarService.changeWidth({width: 87.5}); this.createForm(); }

  /**When the component initialises*/
  ngOnInit() {
      this.getUserData();
  }

  /**Initialises the form*/
  createForm() {
      this.disinheritForm = this.fb.group({
          disinherit: ['', Validators.required],
          fullname: [''],
          relationship: new FormControl(''),
          other_relationship: [''],
          gender: ['']
      });
  }

  /**
   *function to add/ upadte user data
   * @param model
   */
  onSubmit(model: any) {
    if (model.valid) {
      let modelData = model.value;
      modelData.step = 11;
      modelData.user_id = this.authService.getUser()['id'];
      console.log(modelData);
      this.userService.editProfile(modelData).subscribe(
        (response: any) => {
          // go to dashboard section
          this.router.navigate(['/dashboard']);
        },
        (error: any) => {
          this.errorFlag = true;
          for (let prop in error.error.message) {
            this.errorMessage = error.error.message[prop];
            break;
          }
          setTimeout(() => {
            this.errorFlag = false;
            this.errorMessage = '';
          }, 3000);
        }
      );
    } else {
      alert('Please fill up the required fields');
      this.markFormGroupTouched(model);
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
     *Function to get User Data
     */
    getUserData() {
        this.userService.getUserDetails(this.authService.getUser()['id']).subscribe(
            (response: any) => {
                this.setProgress(response);
                this.fullUserInfo = response.data[10].data;
                console.log(this.fullUserInfo);
                this.disinheritForm.get('disinherit').setValue(this.fullUserInfo.disinherit !== null && this.fullUserInfo.disinherit !== undefined ? this.fullUserInfo.disinherit : '');
                this.disinheritForm.get('fullname').setValue(this.fullUserInfo.fullname !== null && this.fullUserInfo.fullname !== undefined ? this.fullUserInfo.fullname : '');
                this.disinheritForm.get('relationship').setValue(this.fullUserInfo.relationship !== null && this.fullUserInfo.relationship !== undefined ? this.fullUserInfo.relationship : '');
                this.disinheritForm.get('other_relationship').setValue(this.fullUserInfo.other_relationship !== null && this.fullUserInfo.other_relationship !== undefined ? this.fullUserInfo.other_relationship : '');
                this.disinheritForm.get('gender').setValue(this.fullUserInfo.gender !== null && this.fullUserInfo.gender !== undefined ?  this.fullUserInfo.gender : '');
                this.addRemoveOprions(this.fullUserInfo.relationship);
            },
            (error: any) => {
                console.log(error.error);
            }, () => {this.loading = false;}
        );
    }
    /**Set progress bar width*/
    setProgress(response) {
      let isSpecificGift = response.data[7].data.isSpecificGift;
      let maritalStatus = response.data[0].data.userInfo.marital_status;
      switch (maritalStatus ) {
        case 'M':
        case 'R': if (isSpecificGift === 'Yes') {
          this.progressBarService.changeWidth({width: 90});
        } else {
          this.progressBarService.changeWidth({width: 87.5});
        }
          break;
        default:  if (isSpecificGift === 'Yes') {
          this.progressBarService.changeWidth({width: 87.5});
        } else {
          this.progressBarService.changeWidth({width: 84.38});
        }
          break;
      }
    }
    /**
     *Function to add remove form action depending on the disinherit values
     */
    addRemoveOprions(value: string) {
        if (value === 'Wife' || value === 'Husband') {
          this.warningFlag = true;
        } else {
          this.warningFlag = false;
        }
        if (this.disinheritForm.value.disinherit === '1') {
                // add validation to rest of the sections
            this.disinheritForm.get(`fullname`).setValidators([Validators.required, Validators.pattern(/\s+(?=\S{2})/ )]);
            this.disinheritForm.get(`fullname`).updateValueAndValidity();
            this.disinheritForm.get(`relationship`).setValidators([Validators.required]);
            this.disinheritForm.get(`relationship`).updateValueAndValidity();
            this.disinheritForm.get(`gender`).setValidators([Validators.required]);
            this.disinheritForm.get(`gender`).updateValueAndValidity();
        } else {
            // remove validation to rest of the sections
            this.disinheritForm.get(`fullname`).setValidators([]);
            this.disinheritForm.get(`fullname`).updateValueAndValidity();
            this.disinheritForm.get(`relationship`).setValidators([]);
            this.disinheritForm.get(`relationship`).updateValueAndValidity();
            this.disinheritForm.get(`gender`).setValidators([]);
            this.disinheritForm.get(`gender`).updateValueAndValidity();
        }
        if (this.disinheritForm.value.relationship === 'Other') {
            // add validation for the other_relationship field
            this.disinheritForm.get(`other_relationship`).setValidators([Validators.required]);
            this.disinheritForm.get(`other_relationship`).updateValueAndValidity();
        } else {
            // add validation for the other_relationship field
            this.disinheritForm.get(`other_relationship`).setValidators([]);
            this.disinheritForm.get(`other_relationship`).updateValueAndValidity();
        }
    }

}
