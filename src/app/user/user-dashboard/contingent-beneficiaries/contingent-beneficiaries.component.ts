import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormGroup, Validators, FormControl, FormArray} from '@angular/forms';
import {UserAuthService} from '../../user-auth/user-auth.service';
import {UserService} from '../../user.service';
import {Router} from '@angular/router';

@Component({
  selector: 'app-contingent-beneficiaries',
  templateUrl: './contingent-beneficiaries.component.html',
  styleUrls: ['./contingent-beneficiaries.component.css']
})
export class ContingentBeneficiariesComponent implements OnInit {
   contingentBeneficiariesForm: FormGroup;
  constructor( private authService: UserAuthService,
               private userService: UserService,
               private router: Router,
               private fb: FormBuilder, ) {  this.createForm(); }

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
  }

    /**
     *function to save/update form data
     */
  onSubmit(model: any) {}

    /**
     *function to navigate to last page
     */
    goBack() {
            this.router.navigate(['/dashboard/provide-user-spouse']);
    }

    /**
     *Function to add remove options from the form and do the validation as well
     */
    addRemoveOptions() {
        if (this.contingentBeneficiariesForm.value.isContingentBeneficiary === '1') {
            this.contingentBeneficiariesForm.get(`distribution_type`).setValidators([Validators.required]);
            this.contingentBeneficiariesForm.get(`distribution_type`).updateValueAndValidity();
        } else {
            this.contingentBeneficiariesForm.get(`distribution_type`).setValidators([]);
            this.contingentBeneficiariesForm.get(`distribution_type`).updateValueAndValidity();
        }
        if (this.contingentBeneficiariesForm.value.distribution_type === 'other') {
            this.contingentBeneficiariesForm.get(`info`).setValidators([Validators.required]);
            this.contingentBeneficiariesForm.get(`info`).updateValueAndValidity();
        } else {
            this.contingentBeneficiariesForm.get(`info`).setValidators([]);
            this.contingentBeneficiariesForm.get(`info`).updateValueAndValidity();
        }
    }


}
