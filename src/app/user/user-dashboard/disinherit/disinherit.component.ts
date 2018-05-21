import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormGroup, Validators, FormControl, FormArray} from '@angular/forms';
import {UserAuthService} from '../../user-auth/user-auth.service';
import {UserService} from '../../user.service';
import {Router} from '@angular/router';

@Component({
  selector: 'app-disinherit',
  templateUrl: './disinherit.component.html',
  styleUrls: ['./disinherit.component.css']
})
export class DisinheritComponent implements OnInit {
    disinheritForm: FormGroup;
    errorMessage: any;
    fullUserInfo: any;
  constructor( private authService: UserAuthService,
               private userService: UserService,
               private router: Router,
               private fb: FormBuilder, ) { this.createForm(); }

  ngOnInit() {
      this.getUserData();
  }

  createForm() {
      this.disinheritForm = this.fb.group({
          disinherit: ['', Validators.required],
          fullname: [''],
          relationship: [''],
          other_relationship: [''],
          gender: ['']
      });
  }

    /**
     *function to add/ upadte user data
     * @param model
     */
    onSubmit(model: any) {
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
                for (let prop in error.error.message) {
                    this.errorMessage = error.error.message[prop];
                    break;
                }
                setTimeout(() => {
                    this.errorMessage = '';
                }, 3000);
            }
        );
    }

    /**
     *Function to get User Data
     */
    getUserData() {
        this.userService.getUserDetails(this.authService.getUser()['id']).subscribe(
            (response: any) => {
                this.fullUserInfo = response.data[10].data;
                this.disinheritForm.get('disinherit').setValue(this.fullUserInfo.disinherit);
                this.disinheritForm.get('fullname').setValue(this.fullUserInfo.fullname);
                this.disinheritForm.get('relationship').setValue(this.fullUserInfo.relationship);
                this.disinheritForm.get('other_relationship').setValue(this.fullUserInfo.other_relationship);
                this.disinheritForm.get('gender').setValue(this.fullUserInfo.gender);
            },
            (error: any) => {
                console.log(error.error);
            }
        );
    }
    /**
     *Function to add remove form action depending on the disinherit values
     */
    addRemoveOprions() {
        if (this.disinheritForm.value.disinherit === '1') {
                // add validation to rest of the sections
            this.disinheritForm.get(`fullname`).setValidators([Validators.required]);
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
