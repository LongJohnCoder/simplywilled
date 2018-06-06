import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { PackagesRoutingModule } from './packages-routing.module';
import { PackagesComponent } from './packages/packages.component';
import { PaymentStatusComponent } from './payment-status/payment-status.component';
import {FormsModule} from '@angular/forms';

@NgModule({
  imports: [
    CommonModule, FormsModule,
    PackagesRoutingModule
  ],
  declarations: [PackagesComponent, PaymentStatusComponent]
})
export class PackagesModule { }
