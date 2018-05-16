import {Component, OnInit} from '@angular/core';
import {Router} from '@angular/router';
import {Validators, FormGroup, FormBuilder, FormControl, FormArray} from '@angular/forms';
import {UserAuthService} from '../../user-auth/user-auth.service';
import {UserService} from '../../user.service';

@Component({
    selector: 'app-provide-user-spouse',
    templateUrl: './provide-user-spouse.component.html',
    styleUrls: ['./provide-user-spouse.component.css']
})
export class ProvideUserSpouseComponent implements OnInit {
    public provideYourSpouseForm: FormGroup;
    pageText: string;
    fullUserInfo: any;
    errorMessage: any;

    constructor(private  authService: UserAuthService,
                private userService: UserService,
                private router: Router,
                private fb: FormBuilder, ) {
        this.createForm();
    }

    ngOnInit() {
        this.getUserData();
        this.checkMaritalStatus();
    }

    /**
     *function get user data
     */
    getUserData() {
        this.userService.getUserDetails(this.authService.getUser()['id']).subscribe(
            (response: any) => {
                this.fullUserInfo = response.data[5].data;
                this.provideYourSpouseForm.controls['residue_to_partner_first'].setValue( this.fullUserInfo.residue_to_partner_first);
            },
            (error: any) => {
                console.log(error.error);
            }
        );
    }

    /**
     *function to go back to the previous page
     */
    goBack() {
        this.router.navigate(['/dashboard/personal-representative-details']);
    }

    /**
     *function to create the form
     */
    createForm() {
        this.provideYourSpouseForm = this.fb.group({
            residue_to_partner_first: ['0', Validators.required],
        });
    }

    /**
     *function save/update data
     */
    onSubmit(model: any) {
        let modelData = model.value;
        modelData.step = 6;
        modelData.user_id = this.authService.getUser()['id'];
        this.userService.editProfile(modelData).subscribe(
            (response: any) => {
                this.router.navigate(['/dashboard/personal-property-distributed']);
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
     *function to check marital Status of the user for a textFlag
     */
    checkMaritalStatus() {
        this.userService.getUserDetails(this.authService.getUser()['id']).subscribe(
            (response: any) => {
                if (response.data[0].data.userInfo.marital_status === 'M') {
                    this.pageText = 'Spouse';
                }
                if (response.data[0].data.userInfo.marital_status === 'R') {
                    this.pageText = 'Partner';
                }
            },
            (error: any) => {
                console.log(error.error);
            }
        );
    }
}
