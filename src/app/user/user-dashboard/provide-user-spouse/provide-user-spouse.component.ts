import {Component, OnDestroy, OnInit} from '@angular/core';
import {Router} from '@angular/router';
import {Validators, FormGroup, FormBuilder, FormControl, FormArray} from '@angular/forms';
import {UserAuthService} from '../../user-auth/user-auth.service';
import {UserService} from '../../user.service';
import {Subscription} from 'rxjs/Subscription';

@Component({
    selector: 'app-provide-user-spouse',
    templateUrl: './provide-user-spouse.component.html',
    styleUrls: ['./provide-user-spouse.component.css']
})
export class ProvideUserSpouseComponent implements OnInit, OnDestroy {
    /**Variable declaration*/
    public provideYourSpouseForm: FormGroup;
    pageText: string;
    fullUserInfo: any;
    errorMessage: any;
    userSubscription: Subscription;
    editprofileSubscription: Subscription;
    getUserDetailsSubscription: Subscription;
    loading = true;

    /**Constructor call*/
    constructor(private  authService: UserAuthService,
                private userService: UserService,
                private router: Router,
                private fb: FormBuilder, ) {
        this.createForm();
    }

    /**When component initialises*/
    ngOnInit() {
        this.getUserData();
       // this.checkMaritalStatus();
    }

    /**
     *function get user data
     */
    getUserData() {
        this.userSubscription = this.userService.getUserDetails(this.authService.getUser()['id']).subscribe(
            (response: any) => {
                this.fullUserInfo = response.data[5].data;
                this.provideYourSpouseForm.controls['residue_to_partner_first'].setValue( this.fullUserInfo.residue_to_partner_first);
                if (response.data[0].data.userInfo.marital_status === 'M') {
                  this.pageText = 'Spouse';
                }
                if (response.data[0].data.userInfo.marital_status === 'R') {
                  this.pageText = 'Partner';
                }
            },
            (error: any) => {
                console.log(error.error);
            }, () => { this.loading = false; }
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
        if (this.provideYourSpouseForm.valid) {
          let modelData = model.value;
          modelData.step = 6;
          modelData.user_id = this.authService.getUser()['id'];
          this.editprofileSubscription = this.userService.editProfile(modelData).subscribe(
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
        } else {
          alert ('Please fill up the required fields');
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
     *function to check marital Status of the user for a textFlag
     */
    checkMaritalStatus() {
        this.getUserDetailsSubscription = this.userService.getUserDetails(this.authService.getUser()['id']).subscribe(
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

    /**When the component is destroyed*/
    ngOnDestroy() {
      if (this.userSubscription !== undefined) {
        this.userSubscription.unsubscribe();
      }
      if (this.editprofileSubscription !== undefined) {
        this.editprofileSubscription.unsubscribe();
      }
      if (this.getUserDetailsSubscription !== undefined) {
        this.getUserDetailsSubscription.unsubscribe();
      }
    }
}
