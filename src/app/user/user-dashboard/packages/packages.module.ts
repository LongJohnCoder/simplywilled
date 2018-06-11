import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { PackagesRoutingModule } from './packages-routing.module';
import { PackagesComponent } from './packages/packages.component';
import {FormsModule} from '@angular/forms';
import { PaymentPageComponent } from './payment-page/payment-page.component';
import {NgxMaskModule} from 'ngx-mask';
import { PaidPackagesComponent } from './paid-packages/paid-packages/paid-packages.component';
import { PaypalSuccessComponent } from './paypal-success/paypal-success.component';
import { PaypalFailedComponent } from './paypal-failed/paypal-failed.component';
import { ThankYouComponent } from './thank-you/thank-you.component';

@NgModule({
  imports: [
    CommonModule,
    NgxMaskModule.forRoot(),
    FormsModule,
    PackagesRoutingModule
  ],
  declarations: [PackagesComponent, PaymentPageComponent, PaidPackagesComponent, PaypalSuccessComponent, PaypalFailedComponent, ThankYouComponent]
})
export class PackagesModule { }
