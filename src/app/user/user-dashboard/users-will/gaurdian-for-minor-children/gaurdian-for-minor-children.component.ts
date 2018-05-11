import { Component, OnInit } from '@angular/core';
import {Router} from '@angular/router';
import {UserService} from '../../../user.service';
import {UserAuthService} from '../../../user-auth/user-auth.service';
import { Validators, FormGroup, FormArray, FormBuilder } from '@angular/forms';

@Component({
  selector: 'app-gaurdian-for-minor-children',
  templateUrl: './gaurdian-for-minor-children.component.html',
  styleUrls: ['./gaurdian-for-minor-children.component.css']
})
export class GaurdianForMinorChildrenComponent implements OnInit {

  public myForm: FormGroup; // our form model
  constructor(
      private userService: UserService,
      private router: Router,
      private authService: UserAuthService,
      private fb: FormBuilder,
  ) { }

  ngOnInit() {
    this.myForm = this.fb.group({
        isGuardianMinorChildren: ['No', Validators.required],
        isBackUpGuardian: ['No', Validators.required],
        guardian: this.fb.array([
            this.fb.group({
                user_id: this.authService.getUser()['id'],
                fullname: ['', Validators.required],
                relationship_with: ['', Validators.required],
                address: ['', Validators.required],
                country: ['', Validators.required],
                city: ['', Validators.required],
                state: ['', Validators.required],
                zip: ['', Validators.required],
                email_notification: ['', Validators.required],
                email: ['', [ Validators.required, Validators.email]],
                is_backup: ['']
            }
            )
        ]),
        backUpGuardian: this.fb.array([
            this.fb.group({
                user_id: this.authService.getUser()['id'],
                fullname: ['', Validators.required],
                relationship_with: ['', Validators.required],
                address: ['', Validators.required],
                country: ['', Validators.required],
                city: ['', Validators.required],
                state: ['', Validators.required],
                zip: ['', Validators.required],
                email_notification: ['', Validators.required],
                email: ['', [ Validators.required, Validators.email]],
                is_backup: ['']
                }
            )
        ])
    });
  }
  onSubmit(data:any) {

    console.log(data.value);
  }
}
