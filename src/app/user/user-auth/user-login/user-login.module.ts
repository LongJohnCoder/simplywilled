import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { UserLoginRoutingModule } from './user-login-routing.module';
import { UserLoginComponent } from './user-login.component';

@NgModule({
  imports: [
    CommonModule,
    UserLoginRoutingModule
  ],
  declarations: [UserLoginComponent]
})
export class UserLoginModule { }
