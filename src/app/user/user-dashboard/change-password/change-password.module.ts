import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ChangePasswordComponent } from './change-password.component';

import { ChangePasswordRoutingModule } from './change-password-routing.module';
import { FormsModule } from '@angular/forms';
import { EqualValidatorDirective } from './equal-validator.directive';

@NgModule({
  imports: [
    CommonModule,
    ChangePasswordRoutingModule,
    FormsModule
  ],
  declarations: [ChangePasswordComponent, EqualValidatorDirective]
})
export class ChangePasswordModule { }
