import {Component, OnDestroy, OnInit} from '@angular/core';
import {FormArray, FormBuilder, FormControl, FormGroup, Validators} from '@angular/forms';
import {Router} from '@angular/router';
import {Subscription} from 'rxjs/Subscription';
import {UserService} from '../../../user.service';
import {UserAuthService} from '../../../user-auth/user-auth.service';
import {ProgressbarService} from '../../shared/services/progressbar.service';

@Component({
  selector: 'app-your-pet',
  templateUrl: './your-pet.component.html',
  styleUrls: ['./your-pet.component.css']
})
export class YourPetComponent implements OnInit, OnDestroy {

  /**Variable declaration*/
  petsForm: FormGroup;
  petNameArray: FormArray;
  valueChangeSubscription: Subscription;
  valueChangeSubscriptionForLeaveMoney: Subscription;
  flags = {
    setValidationFlag: false,
  };
  errors = {
    errorFlag: false,
    errorMessage: ''
  };
  userInfo: any;
  loading = true;
  getUserSubscription: Subscription;
  editProfileSubscription: Subscription;

  /**Constructor call*/
  constructor(
    private _fb: FormBuilder,
    private userService: UserService,
    private authService: UserAuthService,
    private progressBarService: ProgressbarService,
    private _router: Router
  ) { this.getUserData(); }

  /**When the component initialises*/
  ngOnInit() {
  }

  /**Initialises the form*/
  createForm(userInfo = null) {
    this.petsForm = this._fb.group({
        'providePetsWill': new FormControl(userInfo !== null && userInfo !== undefined && userInfo.has_pet !== null && userInfo.has_pet !== undefined && userInfo.has_pet === 1 ? 'Yes' : 'No', [Validators.required]),
        'petsName': this._fb.array([this.initRows()]),
        'leaveMoney': new FormControl(userInfo !== null && userInfo !== undefined && userInfo.leaveMoney !== null && userInfo.leaveMoney !== undefined && userInfo.leaveMoney === 1 ? 'Yes' : 'No', [Validators.required]),
        'amount': new FormControl(userInfo !== null && userInfo !== undefined && userInfo.petAmount !== null && userInfo.petAmount !== undefined ? userInfo.petAmount : '')
    });
  }

  /**Show all the petnames*/
  showDataPetNames(data) {
    let petNames = JSON.parse(data.pet_names);
    if (petNames !== undefined && petNames !== null && petNames.length > 0 ) {
      this.petsForm.setControl('petsName',
        this._fb.array((petNames || []).map((x) => this._fb.group(x))));
    }
  }

  /**Adds a new pet name*/
  addNewPetName() {
    this.petNameArray = this.petsForm.get('petsName') as FormArray;
    this.petNameArray.push(this.initRows());
  }

  /**Adds a new pet name*/
  removeNewPetName(index) {
    this.petNameArray = this.petsForm.get('petsName') as FormArray;
    this.petNameArray.removeAt(index);
  }

  /**Initialises form array row*/
  initRows() {
    return this._fb.group({
      'petName': new FormControl('')
    });
  }
  /**On change of pets will*/
  checkPetsWill(value) {
    this.petsForm.get('providePetsWill').setValue(value);
  }

  /**Go back to the previous route*/
  goBack() {
    this._router.navigate(['/dashboard/will/3']);
  }

  /**On form submit*/
  submit() {
    if (this.petsForm.valid) {
      let data = this.modifyData()
      this.editProfileSubscription = this.userService.editProfile(data).subscribe(
        (response: any) => {
          if (response.status) {
            this._router.navigate(['/dashboard/will/5']);
          }
        },
        (error: any) => {
          for (let prop in error.error.message) {
            this.errors.errorMessage = error.error.message[prop];
            break;
          }
          setTimeout(() => {
            this.errors.errorMessage = '';
          }, 3000);
        }
      );
    } else {
      alert('Please fill up the required fields.');
      this.markFormGroupTouched(this.petsForm);
    }
  }

  modifyData() {
    let data =  {
      has_pet: this.petsForm.value.providePetsWill === 'No' ? 0 : 1,
      pet_names: this.petsForm.value.petsName,
      leaveMoney: this.petsForm.value.leaveMoney === 'No' ? 0 : 1,
      petAmount: this.petsForm.value.amount
    };
    let request = {
        step: 13,
        user_id: this.authService.getUser()['id'],
        data: data
    };
    return request;
  }
  /**On change of leave money*/
  leaveMoneyChange(value) {
    this.petsForm.get('leaveMoney').setValue(value);
  }

  /**Add conditional validators*/
  addConditionalValidators() {
    this.valueChangeSubscription = this.petsForm.get('providePetsWill').valueChanges.subscribe(
      (value) => {
        switch (value) {
          case 'Yes': this.setValidation((this.petsForm.get('petsName') as FormArray).controls);
                      break;
          case 'No':  this.clearValidationForFormArray((this.petsForm.get('petsName') as FormArray).controls);
                      break;
        }
      }
    );
    this.valueChangeSubscriptionForLeaveMoney = this.petsForm.get('leaveMoney').valueChanges.subscribe(
      (value) => {
        switch (value) {
          case 'Yes': this.petsForm.get('amount').setValidators([Validators.required, Validators.pattern(/^[0-9]+(\.[0-9]{1,2})?$/)]);
                      this.petsForm.get('amount').updateValueAndValidity();
                      break;
          case 'No':  this.petsForm.get('amount').clearValidators();
                      this.petsForm.get('amount').updateValueAndValidity();
                      break;
        }
      }
    );
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

    this.checkValidation((this.petsForm.get('petsName') as FormArray).controls);
  }

  /**Checks validation for form arrays*/
  checkValidation(formArray) {
    for (let item of formArray) {
      if (item.controls['petName'].hasError('required')) {
        this.flags.setValidationFlag = true;
        break;
      }
      this.flags.setValidationFlag = false;
    }
  }


  /**Clears validation for form arrays*/
  clearValidationForFormArray(formArray) {
    for (let item of formArray) {
      item.controls['petName'].clearValidators();
      item.controls['petName'].updateValueAndValidity();
    }
  }

  /**Set validation for form array*/
  setValidation(formArray) {
    for (let item of formArray) {
      item.controls['petName'].setValidators([Validators.required]);
      item.controls['petName'].updateValueAndValidity();
    }
  }


  /**Get user data*/
  getUserData() {
   this.getUserSubscription = this.userService.getUserDetails(this.authService.getUser()['id']).subscribe(
      (response: any) => {
        this.userInfo = response.data[0].data.userInfo;
        console.log(this.userInfo);
        let totalChildrenData = response.data[1].data;
        if (totalChildrenData.totalChildren === undefined || totalChildrenData.totalChildren === null || totalChildrenData.totalChildren === 0) {
          this.progressBarService.changeWidth({width: 60});
        } else {
          this.progressBarService.changeWidth({width: 50});
        }
      },
      (error: any) => {
        console.log(error.error);
      },
      () => {
        this.createForm(this.userInfo);
        this.showDataPetNames(this.userInfo);
        this.addConditionalValidators();
        this.loading = false;
      }
    );
  }

  /**When the component is destroyed*/
  ngOnDestroy() {
    if (this.valueChangeSubscription !== undefined) {
      this.valueChangeSubscription.unsubscribe();
    }
    if (this.getUserSubscription !== undefined) {
      this.getUserSubscription.unsubscribe();
    }
    if (this.editProfileSubscription !== undefined) {
      this.editProfileSubscription.unsubscribe();
    }
    if (this.valueChangeSubscriptionForLeaveMoney !== undefined) {
      this.valueChangeSubscriptionForLeaveMoney.unsubscribe();
    }
  }
}
