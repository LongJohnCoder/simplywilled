import {Component, OnInit, ɵNOT_FOUND_CHECK_ONLY_ELEMENT_INJECTOR} from '@angular/core';
import {Router} from '@angular/router';
import {Validators, FormGroup, FormBuilder, FormControl} from '@angular/forms';
import {UserAuthService} from '../../user-auth/user-auth.service';
import {UserService} from '../../user.service';

@Component({
    selector: 'app-personal-representative-details',
    templateUrl: './personal-representative-details.component.html',
    styleUrls: ['./personal-representative-details.component.css']
})
export class PersonalRepresentativeDetailsComponent implements OnInit {
    public personalRepresentativeDetailsForm: FormGroup;
    errorMessage: any = '';
    userInfo: any;
    states: string[] = [];

    constructor(
        private  authService: UserAuthService,
        private userService: UserService,
        private router: Router,
        private fb: FormBuilder,
    ) {
        this.createForm();
    }

    ngOnInit() {
        this.getUserData();
    }

    /**
     *This function is fetching user data
     */
    getUserData() {
        this.userService.getUserDetails(this.authService.getUser()['id']).subscribe(
            (response: any) => {
                this.userInfo = response.data[4];
                console.log(this.userInfo);
                this.personalRepresentativeDetailsForm.controls['isBackupPersonalRepresentative'].setValue( this.userInfo.isBackupPersonalRepresentative);
                if (this.userInfo.personalRepresentative[0]) {
                    const guardianFGs = this.userInfo.personalRepresentative.map(gr => this.fb.group(gr));
                    const guardianFormArray = this.fb.array(guardianFGs);
                    this.personalRepresentativeDetailsForm.setControl('personalRepresentative', guardianFormArray);
                }
                if (this.userInfo.backupPersonalRepresentative[0]) {
                    const guardianFGs = this.userInfo.backupPersonalRepresentative.map(gr => this.fb.group(gr));
                    const guardianFormArray = this.fb.array(guardianFGs);
                    this.personalRepresentativeDetailsForm.setControl('backupPersonalRepresentative', guardianFormArray);
                }
            },
            (error: any) => {
                console.log(error.error);
            }
        );
    }

    /**
     * function to create the Reactive form
     */
    createForm() {
        this.personalRepresentativeDetailsForm = this.fb.group({
            isPersonalRepresentative: ['Yes', Validators.required],
            isBackupPersonalRepresentative: ['No', Validators.required],
            personalRepresentative: this.fb.array([
                this.fb.group({
                        user_id: new FormControl(this.authService.getUser()['id'], [Validators.required]),
                        fullname: new FormControl('', [Validators.required]),
                        relationship_with: new FormControl('', [Validators.required]),
                        address: new FormControl('', [Validators.required]),
                        country: new FormControl('United States', [Validators.required]),
                        city: new FormControl('', [Validators.required]),
                        state: new FormControl('', [Validators.required]),
                        zip: new FormControl('', [Validators.required]),
                        email_notification: new FormControl('', [Validators.required]),
                        email: new FormControl('', [Validators.required]),
                        is_backuprepresentative: new FormControl('0'),
                    }
                )
            ]),
            backupPersonalRepresentative: this.fb.array([
                this.fb.group({
                        user_id: this.authService.getUser()['id'],
                        fullname: [''],
                        relationship_with: [''],
                        address: [''],
                        country: ['United States'],
                        city: [''],
                        state: [''],
                        zip: [''],
                        email_notification: [''],
                        email: [''],
                        is_backuprepresentative: ['1']
                    }
                )
            ])
        });
    }

    /**
     *This function is for getting the back page link
     */
    goBack() {
        this.router.navigate(['/dashboard/your-personal-representative-powers']);
    }

    /**
     * submit the data to save
     * @param model
     */
    onSubmit(model: any) {
        let modelData = model.value;
        modelData.step = 5 ;
        modelData.user_id = this.authService.getUser()['id'];
        console.log(modelData);
        this.userService.editProfile(modelData).subscribe(
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
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.fullname`).setValidators([Validators.required]);
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
        // this.myForm.get(`guardian.0.email`).setValidators([Validators.email]);
        // this.myForm.get(`guardian.0.email`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.email_notification`).setValidators([Validators.required]);
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.email_notification`).updateValueAndValidity();

    }

    /**
     *Function to remove validation from the backup representative form
     * */
    removeValidationToBackupRepresentativeForm() {
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.fullname`).setValidators([]);
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.fullname`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.relationship_with`).setValidators([]);
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.relationship_with`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.address`).setValidators([]);
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.address`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.city`).setValidators([]);
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.city`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.state`).setValidators([]);
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.state`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.zip`).setValidators([]);
        this.personalRepresentativeDetailsForm.get(`backupPersonalRepresentative.0.zip`).updateValueAndValidity();
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
        // this.myForm.get(`guardian.0.email`).setValidators([Validators.email]);
        // this.myForm.get(`guardian.0.email`).updateValueAndValidity();
        this.personalRepresentativeDetailsForm.get(`personalRepresentative.0.email_notification`).setValidators([Validators.required]);
        this.personalRepresentativeDetailsForm.get(`personalRepresentative.0.email_notification`).updateValueAndValidity();
    }

}
