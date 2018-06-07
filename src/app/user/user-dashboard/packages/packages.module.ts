import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { PackagesRoutingModule } from './packages-routing.module';
import { PackagesComponent } from './packages/packages.component';
import { PaymentStatusComponent } from './payment-status/payment-status.component';
import {FormsModule} from '@angular/forms';
import { PaymentPageComponent } from './payment-page/payment-page.component';
import {NgxMaskModule} from 'ngx-mask';
import { PaidPackagesComponent } from './paid-packages/paid-packages/paid-packages.component';

@NgModule({
  imports: [
    CommonModule,
    NgxMaskModule.forRoot(),
    FormsModule,
    PackagesRoutingModule
  ],
  declarations: [PackagesComponent, PaymentStatusComponent, PaymentPageComponent, PaidPackagesComponent]
})
export class PackagesModule { }
