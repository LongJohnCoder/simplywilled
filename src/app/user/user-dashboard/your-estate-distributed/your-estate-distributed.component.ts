import { Component, OnInit } from '@angular/core';
import {Router} from '@angular/router';
import {Validators, FormGroup, FormBuilder, FormControl, FormArray} from '@angular/forms';
import {UserAuthService} from '../../user-auth/user-auth.service';
import {UserService} from '../../user.service';
@Component({
  selector: 'app-your-estate-distributed',
  templateUrl: './your-estate-distributed.component.html',
  styleUrls: ['./your-estate-distributed.component.css']
})
export class YourEstateDistributedComponent implements OnInit {
  public estateDistributedForm: FormGroup;
  fullUserInfo: any;
  singleBeneficiary: boolean;
  errorMessage: any;
  constructor( private  authService: UserAuthService,
               private userService: UserService,
               private router: Router,
               private fb: FormBuilder, ) {
      this.createForm(); }

  ngOnInit() {
      this.getUserData();
  }

    /**
     *function to create the form
     */
    createForm() {
        this.estateDistributedForm = this.fb.group({
            disrtibuteType: ['', Validators.required],
            toBeDistributedTo: [''],
            singleBeneficiary: ['No'],
            multiBeneficiary: ['No'],
            someOtherWay: ['No'],
            toASingleBeneficiary: this.fb.array([
                this.fb.group({
                    firstName: [''],
                    relationship: [''],
                    fullName: [''],
                    gender: [''],
                    ifPassesbeforeyou: [''],
                    someotherway: [''],
                    }
                )
            ]),
            toMultipleBeneficiary: this.fb.array([
                this.fb.group({
                        isEstateIntoEqualShares: [''],
                        beneficiaryYes: this.fb.array([
                            this.fb.group({
                                beneficiaryFullName: [''],
                                beneficiaryRelationship: [''],
                            })
                        ]),
                    beneficiaryNo: this.fb.array([
                        this.fb.group({
                            beneficiaryFullName: [''],
                            beneficiaryRelationship: [''],
                            beneficiaryPercentageToEstate: [''],
                        })
                    ]),
                        deceasedBeneficiaryShareToKids: [''],
                        deceasedBeneficiarieShare: [''],
                        minorBeneficiaryShareToBeHeldInTrust : [''],
                        whatAgeMinorShareDistributed: [''],
                        minorParentsTrustee: [''],
                        whoServeAsTrusteeAccount: [''],
                    }
                )
            ]),
            toSomeOtherWay: this.fb.array([
                this.fb.group({
                    someOtherWayText: [''],
                })
            ]),
        });
    }
    /**
     *function get user data
     */
    getUserData() {
        this.userService.getUserDetails(this.authService.getUser()['id']).subscribe(
            (response: any) => {
                this.fullUserInfo = response.data[9].data;
                console.log(this.fullUserInfo);
                // this.provideYourSpouseForm.controls['residue_to_partner_first'].setValue( this.fullUserInfo.residue_to_partner_first);
            },
            (error: any) => {
                console.log(error.error);
            }
        );
    }

    /**
     *submit the form data
     * @param model
     */
    onSubmit(model: any) {
        const modelData = model.value;
        modelData.step = 10;
        modelData.user_id = this.authService.getUser()['id'];
        const disrtibuteData = [];
        console.log(modelData.toASingleBeneficiary.length, modelData.toMultipleBeneficiary.length, modelData.toSomeOtherWay.length);
        if(modelData.singleBeneficiary === 'Yes') {
            modelData.disrtibuteData = modelData.toASingleBeneficiary;
        }
        if(modelData.multiBeneficiary === 'Yes') {
            modelData.disrtibuteData = modelData.toMultipleBeneficiary;
        }
        if(modelData.someOtherWay === 'Yes') {
            modelData.disrtibuteData = modelData.toSomeOtherWay;
        }
        this.userService.editProfile(modelData).subscribe(
            (response: any) => {
                this.router.navigate(['/dashboard']);
                // alert('Done');
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
     *function to add remove  validation
     */
    addRemoveValidation() {
        if (this.estateDistributedForm.value.disrtibuteType === '1') {
            this.estateDistributedForm.patchValue({
                singleBeneficiary: 'Yes',
                multiBeneficiary: 'No',
                someOtherWay: 'No'
            });
        } if (this.estateDistributedForm.value.disrtibuteType === '2') {
            this.estateDistributedForm.patchValue({
                multiBeneficiary: 'Yes',
                singleBeneficiary: 'No',
                someOtherWay: 'No'
            });
        } if (this.estateDistributedForm.value.disrtibuteType === '3') {
            this.estateDistributedForm.patchValue({
                multiBeneficiary: 'No',
                singleBeneficiary: 'No',
                someOtherWay: 'No'
            });
        } if (this.estateDistributedForm.value.disrtibuteType === '4') {
            this.estateDistributedForm.patchValue({
                multiBeneficiary: 'No',
                singleBeneficiary: 'No',
                someOtherWay: 'Yes'
            });
        }
    }

    /**
     *add more textbox
     */
    addMoreOption(control, type) {
        if ( type === 1 ) {
            control.push(
                this.fb.group({
                    beneficiaryFullName: [''],
                    beneficiaryRelationship: [''],
                }));
        } if ( type === 2 ) {
            control.push(
                this.fb.group({
                    beneficiaryFullName: [''],
                    beneficiaryRelationship: [''],
                    beneficiaryPercentageToEstate: [''],
                }));
        }
    }

    /**
     *remove the textbox
     */
    removeOption(control, index) {
        control.removeAt(index);
    }

}
