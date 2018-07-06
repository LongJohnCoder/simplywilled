import {Component, OnDestroy, OnInit} from '@angular/core';
import {UserAuthService} from '../../user-auth/user-auth.service';
import {UserService} from '../../user.service';
import {FormBuilder, FormGroup, Validators, FormControl, FormArray} from '@angular/forms';
import {Router} from '@angular/router';
import {Subscription} from 'rxjs/Subscription';
import {ProgressbarService} from '../shared/services/progressbar.service';

@Component({
    selector: 'app-personal-property-distributed',
    templateUrl: './personal-property-distributed.component.html',
    styleUrls: ['./personal-property-distributed.component.css']
})
export class PersonalPropertyDistributedComponent implements OnInit, OnDestroy {
    /**Variable declaration*/
    personalPropertyDistributedForm: FormGroup;
    fullUserInfo: any;
    showChildRadio = false;
    showSpouseRadio = false;
    errorMessage: any;
    pageText: string;
    maritalStatus: any;
    getUserDetailSubscription: Subscription;
    editProfileSubscription: Subscription;
    loading = true;
    toolTipMessageList: any;
    errorFlag = false;

    /**Constructor call*/
    constructor(private  authService: UserAuthService,
                private userService: UserService,
                private router: Router,
                private progressBarService: ProgressbarService,
                private fb: FormBuilder, ) {
        this.toolTipMessageList = {
            'tangible_property' : [{
                'q' : 'What is a Tangible Property?',
                // tslint:disable-next-line:max-line-length
                'a' : 'Tangible personal property is personal property that can be touched. Examples of tangible personal property include automobiles, boats, motorcycles, jewelry, furniture, art, and sporting equipment. Cash and bank accounts are not tangible personal property.'
                }]
            };
        this.createForm();
        this.getUserData();
    }

    /**When the component is initialised*/
    ngOnInit() {
        //this.showChildRadio = false;
        //this.showSpouseRadio = false;
    }

    toolTipClicked(str: string) {
        console.log(str);
        this.userService.changeCurrentToolTipType(str);
        // this.toolTipMessage = this.toolTipMessageList[str];
        // console.log('tooltip message :', this.toolTipMessage);
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
        this.getUserDetailSubscription = this.userService.getUserDetails(this.authService.getUser()['id']).subscribe(
            (response: any) => {
                this.fullUserInfo = response.data[5].data;
                this.maritalStatus = response.data[0].data.userInfo.marital_status;
                switch (this.maritalStatus) {
                  case 'M':
                  case 'R': this.progressBarService.changeWidth({width: 37.5});
                            break;
                  default:  this.progressBarService.changeWidth({width: 25});
                            break;
                }
                this.personalPropertyDistributedForm.controls['is_tangible_property_distribute'].setValue( this.fullUserInfo.is_tangible_property_distribute);
                this.personalPropertyDistributedForm.controls['is_tangible_property_distribute'].setValidators([Validators.required]);
                this.personalPropertyDistributedForm.controls['is_tangible_property_distribute'].updateValueAndValidity();
                if (this.fullUserInfo.is_tangible_property_distribute === '4') {
                  this.addValidationTotangiblePropertyDistribute();
                } else {
                  this.removeValidationTotangiblePropertyDistribute();
                }
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
            }, () => { this.loading = false; }
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
      if (this.personalPropertyDistributedForm.valid) {
        let modelData = model.value;
        modelData.step = 6;
        modelData.user_id = this.authService.getUser()['id'];
        this.editProfileSubscription = this.userService.editProfile(modelData).subscribe(
          (response: any) => {
            // go to gift section
            this.router.navigate(['/dashboard/your-specific-gifts']);
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
     *function to navigate to last page
     */
    goBack() {
        if (this.maritalStatus === 'M' || this.maritalStatus === 'R') {
            this.router.navigate(['/dashboard/provide-user-spouse']);
        } else {
            this.router.navigate(['/dashboard/your-personal-representative-powers']);
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

    /**When the component is destroyed*/
    ngOnDestroy() {
      if (this.getUserDetailSubscription !== undefined) {
        this.getUserDetailSubscription.unsubscribe();
      }
      if (this.editProfileSubscription !== undefined) {
        this.getUserDetailSubscription.unsubscribe();
      }
    }
}
