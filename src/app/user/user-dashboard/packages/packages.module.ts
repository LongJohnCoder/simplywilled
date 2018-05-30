import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { PackagesRoutingModule } from './packages-routing.module';
import { PackagesComponent } from './packages/packages.component';
import { PaymentStatusComponent } from './payment-status/payment-status.component';

@NgModule({
  imports: [
    CommonModule,
    PackagesRoutingModule
  ],
  declarations: [PackagesComponent, PaymentStatusComponent]
})
export class PackagesModule { }
