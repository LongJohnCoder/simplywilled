import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { HttpModule } from "@angular/http";

import { ResetPasswordComponent } from './reset-password.component';
import { ResetPasswordRoutingModule } from './reset-password-routing.module';
import { ResetPasswordService } from "./reset-password.service";



@NgModule({
    imports:[
        CommonModule,
        FormsModule,
        ResetPasswordRoutingModule,
        HttpModule
    ],
    declarations:[
        ResetPasswordComponent,
    ],
    providers: [ ResetPasswordService ]
})

export class ResetPasswordModule {

}