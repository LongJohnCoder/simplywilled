import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import {HttpClientModule} from '@angular/common/http';

import { AdminLoginRoutingModule } from './admin-login-routing.module';
import { AdminLoginComponent } from './admin-login.component';
import { FormsModule } from '@angular/forms';



@NgModule({
  imports: [
    CommonModule,
      HttpClientModule,
    AdminLoginRoutingModule,
      FormsModule,
  ],
  declarations: [AdminLoginComponent]
})
export class AdminLoginModule { }