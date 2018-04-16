import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { HttpModule } from '@angular/http';

import { AdminLoginRoutingModule } from './admin-login-routing.module';
import { AdminLoginComponent } from './admin-login.component';
import { FormsModule } from '@angular/forms';
import { LoginService } from './admin-login.service';

@NgModule({
  imports: [
    CommonModule,
    AdminLoginRoutingModule,
      FormsModule,
      HttpModule
  ],
  declarations: [AdminLoginComponent],
  	providers: [ LoginService ]
})
export class AdminLoginModule { }