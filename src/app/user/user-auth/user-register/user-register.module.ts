import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { UserRegisterRoutingModule } from './user-register-routing.module';
import { UserRegisterComponent } from './user-register.component';
import { FormsModule } from '@angular/forms';

@NgModule({
  imports: [
    CommonModule,
    UserRegisterRoutingModule,
    FormsModule
  ],
  declarations: [UserRegisterComponent]
})
export class UserRegisterModule { }
