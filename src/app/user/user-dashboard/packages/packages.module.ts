import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { PackagesRoutingModule } from './packages-routing.module';
import { PackagesComponent } from './packages/packages.component';
import { PaymentStatusComponent } from './payment-status/payment-status.component';
import {FormsModule} from '@angular/forms';
import { PaymentPageComponent } from './payment-page/payment-page.component';
import {NgxMaskModule} from 'ngx-mask';

@NgModule({
  imports: [
    CommonModule,
    NgxMaskModule.forRoot(),
    FormsModule,
    PackagesRoutingModule
  ],
  declarations: [PackagesComponent, PaymentStatusComponent, PaymentPageComponent]
})
export class PackagesModule { }