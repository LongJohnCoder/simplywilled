import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { UserRegisterRoutingModule } from './user-register-routing.module';
import { UserRegisterComponent } from './user-register.component';
import { FormsModule } from '@angular/forms';
import {EqualValidatorDirective} from './edual-validator.directive';

@NgModule({
  imports: [
    CommonModule,
    UserRegisterRoutingModule,
    FormsModule
  ],
  declarations: [UserRegisterComponent,EqualValidatorDirective]
})
export class UserRegisterModule { }
