import {Component, OnInit} from '@angular/core';
import {UserAuthService} from '../../user-auth/user-auth.service';
import {UserService} from '../../user.service';
import {FormBuilder, FormGroup, Validators, FormControl, FormArray} from '@angular/forms';
import {Router} from '@angular/router';

@Component({
    selector: 'app-personal-property-distributed',
    templateUrl: './personal-property-distributed.component.html',
    styleUrls: ['./personal-property-distributed.component.css']
})
export class PersonalPropertyDistributedComponent implements OnInit {
    personalPropertyDistributedForm: FormGroup;
    fullUserInfo: any;
    showChildRadio: boolean;
    showSpouseRadio: boolean;
    errorMessage: any;
    pageText: string;
    maritalStatus: any;

    constructor(private  authService: UserAuthService,
                private userService: UserService,
                private router: Router,
                private fb: FormBuilder, ) {
        this.createForm();
    }

    ngOnInit() {
        this.showChildRadio = false;
        this.showSpouseRadio = false;
        this.getUserData();
    }

    /**
     *function to create the form
     */
    createForm() {
        this.personalPropertyDistributedForm = this.fb.group({
            is_tangible_property_distribute: ['', Validators.required],
            tangible_property_distribute: [''],
        });
    }

    /**
     *function to get user data
     */
    getUserData() {
        this.userService.getUserDetails(this.authService.getUser()['id']).subscribe(
            (response: any) => {
                this.fullUserInfo = response.data[5].data;
                this.maritalStatus = response.data[0].data.userInfo.marital_status;
                this.personalPropertyDistributedForm.controls['is_tangible_property_distribute'].setValue( this.fullUserInfo.is_tangible_property_distribute);
                this.personalPropertyDistributedForm.controls['tangible_property_distribute'].setValue( this.fullUserInfo.tangible_property_distribute);
                if (response.data[0].data.userInfo.marital_status === 'M' || response.data[0].data.userInfo.marital_status === 'R') {
                    this.showSpouseRadio = true;
                    this.checkMaritalStatus();
                }
                if (response.data[0].data.userInfo.children !== 0) {
                    this.showChildRadio = true;
                }
            },
            (error: any) => {
                console.log(error.error);
            }
        );
    }

    /**
     *function to add remove validation
     */
    addRemoveValidation() {
        if (this.personalPropertyDistributedForm.value.is_tangible_property_distribute === '4') {
            this.addValidationTotangiblePropertyDistribute();
        } else {
            this.removeValidationTotangiblePropertyDistribute();
        }
    }

    /**
     *function to add validation tangiblePropertyDistribute field
     */
    addValidationTotangiblePropertyDistribute() {
        this.personalPropertyDistributedForm.get(`tangible_property_distribute`).setValidators([Validators.required]);
        this.personalPropertyDistributedForm.get(`tangible_property_distribute`).updateValueAndValidity();
    }

    /**
     *function tot remove validation tangiblePropertyDistribute field
     */
    removeValidationTotangiblePropertyDistribute() {
        this.personalPropertyDistributedForm.get(`tangible_property_distribute`).setValidators([]);
        this.personalPropertyDistributedForm.get(`tangible_property_distribute`).updateValueAndValidity();
    }

    /**
     *function to save/update form
     * @param model
     */
    onSubmit(model: any) {
        let modelData = model.value;
        modelData.step = 6;
        modelData.user_id = this.authService.getUser()['id'];
        this.userService.editProfile(modelData).subscribe(
            (response: any) => {
                // go to gift section
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
     *function to navigate to last page
     */
    goBack() {
        if (this.maritalStatus === 'M' || this.maritalStatus === 'R') {
            this.router.navigate(['/dashboard/provide-user-spouse']);
        } else {
            this.router.navigate(['/dashboard/personal-representative-details']);
        }
    }
    /**
     *function to check marital Status of the user for a textFlag
     */
    checkMaritalStatus() {
        if ( this.maritalStatus === 'M' ) {
            this.pageText = 'Spouse';
        } if ( this.maritalStatus === 'R' ) {
            this.pageText = 'Partner';
        }
    }
}
