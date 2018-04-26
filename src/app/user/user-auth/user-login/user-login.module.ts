import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { UserLoginRoutingModule } from './user-login-routing.module';
import { UserLoginComponent } from './user-login.component';
import { FormsModule } from '@angular/forms';


@NgModule({
  imports: [
    CommonModule,
    UserLoginRoutingModule,
    FormsModule
  ],
  declarations: [UserLoginComponent]
})
export class UserLoginModule { }
