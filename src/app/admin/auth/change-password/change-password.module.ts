import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { HttpModule } from "@angular/http";

import { ChangePasswordComponent } from './change-password.component';
import { ChangePasswordRoutingModule } from './change-password-routing.module';
import { ChangePasswordService } from "./change-password.service";



@NgModule({
    imports:[
        CommonModule,
        FormsModule,
        ChangePasswordRoutingModule,
        HttpModule
    ],
    declarations:[
        ChangePasswordComponent,
    ],
    providers: [ ChangePasswordService ]
})

export class ChangePasswordModule {

}