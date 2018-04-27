import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { ChangePasswordComponent } from './change-password.component';
import { ChangePasswordRoutingModule } from './change-password-routing.module';



@NgModule({
    imports: [
        CommonModule,
        FormsModule,
        ChangePasswordRoutingModule
    ],
    declarations: [
        ChangePasswordComponent,
    ],
})

export class ChangePasswordModule {

}