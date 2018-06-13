import {Component, OnDestroy, OnInit} from '@angular/core';
import {FormBuilder, FormGroup, Validators, FormControl, FormArray} from '@angular/forms';
import {UserAuthService} from '../../user-auth/user-auth.service';
import {UserService} from '../../user.service';
import {Router} from '@angular/router';
import {Subscription} from 'rxjs/Subscription';
import {ProgressbarService} from '../shared/services/progressbar.service';

@Component({
  selector: 'app-contingent-beneficiaries',
  templateUrl: './contingent-beneficiaries.component.html',
  styleUrls: ['./contingent-beneficiaries.component.css']
})
export class ContingentBeneficiariesComponent implements OnInit, OnDestroy {
   contingentBeneficiariesForm: FormGroup;
    errorMessage: any;
    fullUserInfo: any;
    getUserDetailsSubscription: Subscription;
    editSubscription: Subscription;
    loading = true;
    errorFlag = false;
    toolTipMessageList: any;

    /**Constructor call*/
    constructor( private authService: UserAuthService,
               private userService: UserService,
               private router: Router,
               private progressBarService: ProgressbarService,
               private fb: FormBuilder, ) {
                  this.createForm();
                  this.toolTipMessageList = {
                    'contingent_beneficiaries' : [{
                        'q' : 'What are Contingent Beneficiaries?',
                        // tslint:disable-next-line:max-line-length
                        'a' : 'Contingent Beneficiaries are beneficiaries who will inherit under your will in the event that all of your primary beneficiaries have passed away.'
                      }]
                  };
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
        this.contingentBeneficiariesForm = this.fb.group({
            isContingentBeneficiary: ['', Validators.required],
            distribution_type: [''],
            info: ['']
        });
    }

  ngOnInit() {
      this.getUserdata();
  }

    /**
     *Function to get user data
     */
    getUserdata() {
      this.getUserDetailsSubscription = this.userService.getUserDetails(this.authService.getUser()['id']).subscribe(
            (response: any) => {
                this.setProgress(response);
                this.fullUserInfo = response.data[8].data;
                this.contingentBeneficiariesForm.get('isContingentBeneficiary').setValue(this.fullUserInfo.isContingentBeneficiary);
                this.contingentBeneficiariesForm.get('distribution_type').setValue(this.fullUserInfo.distribution_type);
                this.contingentBeneficiariesForm.get('info').setValue(this.fullUserInfo.info);
               },
            (error: any) => {
                console.log(error.error);
            }, () => {this.loading = false; }
        );
    }
  /**Set progress bar width*/
  setProgress(response) {
    let isSpecificGift = response.data[7].data.isSpecificGift;
    let maritalStatus = response.data[0].data.userInfo.marital_status;
    switch (maritalStatus ) {
      case 'M':
      case 'R': if (isSpecificGift === 'Yes') {
        this.progressBarService.changeWidth({width: 80});
      } else {
        this.progressBarService.changeWidth({width: 75});
      }
        break;
      default:  if (isSpecificGift === 'Yes') {
        this.progressBarService.changeWidth({width: 75});
      } else {
        this.progressBarService.changeWidth({width: 68.75});
      }
        break;
    }
  }

    /**
     * Function to save/update user data
     * @param model
     */
  onSubmit(model: any) {
      if (model.valid) {
        let modelData = this.prepareData(model);
        //let modelData = model.value;
        //modelData.step = 9;
        //modelData.user_id = this.authService.getUser()['id'];
        this.editSubscription = this.userService.editProfile(modelData).subscribe(
          (response: any) => {
            // go to disinherit section
            this.router.navigate(['/dashboard/disinherit']);

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
      } else  {
        alert('Please fill up the required fields.');
        this.markFormGroupTouched(model);
      }
  }

  prepareData(formData) {
    let request = {
      isContingentBeneficiary: formData.value.isContingentBeneficiary,
      info: formData.value.isContingentBeneficiary !== '0' ? formData.value.info : null,
      distribution_type: formData.value.isContingentBeneficiary !== '0' ? formData.value.distribution_type : null,
      step: 9,
      user_id: this.authService.getUser()['id']
    };
    return request;
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
            this.router.navigate(['/dashboard/your-estate-distributed']);
    }

    /**
     *Function to add remove options from the form and do the validation as well
     */
    addRemoveOptions() {
        if (this.contingentBeneficiariesForm.value.isContingentBeneficiary === '1') {
            this.addValidationTodistributionType();
        } else if (this.contingentBeneficiariesForm.value.isContingentBeneficiary === '0') {
            this.removeValidationTodistributionType();
        }
    }

    addRemoveOptionsDistributionType() {
      if (this.contingentBeneficiariesForm.value.distribution_type === 'other') {
        this.contingentBeneficiariesForm.get(`info`).setValidators([Validators.required]);
        this.contingentBeneficiariesForm.get(`info`).updateValueAndValidity();
      } else if (this.contingentBeneficiariesForm.value.distribution_type === 'to_my_heirs') {
        this.contingentBeneficiariesForm.get(`info`).setValidators([]);
        this.contingentBeneficiariesForm.get(`info`).updateValueAndValidity();
      }
    }

    /**
     *Function to add validation to the distribution_type Field
     */
    addValidationTodistributionType() {
        this.contingentBeneficiariesForm.get(`distribution_type`).setValidators([Validators.required]);
        this.contingentBeneficiariesForm.get(`distribution_type`).updateValueAndValidity();
    }

    /**
     *Function to Remove validation to the distribution_type Field
     */
    removeValidationTodistributionType() {
        this.contingentBeneficiariesForm.get(`distribution_type`).setValidators([]);
        this.contingentBeneficiariesForm.get(`distribution_type`).updateValueAndValidity();
        this.contingentBeneficiariesForm.get(`info`).setValidators([]);
        this.contingentBeneficiariesForm.get(`info`).updateValueAndValidity();
    }

    /**When the component is destroyed*/
    ngOnDestroy() {
      if (this.getUserDetailsSubscription !== undefined) {
        this.getUserDetailsSubscription.unsubscribe();
      }
      if (this.editSubscription !== undefined) {
        this.editSubscription.unsubscribe();
      }
    }

}
