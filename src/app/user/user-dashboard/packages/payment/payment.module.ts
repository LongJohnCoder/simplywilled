import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { PaymentRoutingModule } from './payment-routing.module';
import { PaymentComponent } from './payment/payment.component';
import {FormsModule} from '@angular/forms';

@NgModule({
  imports: [
    CommonModule,
    PaymentRoutingModule,
      FormsModule
  ],
  declarations: [PaymentComponent]
})
export class PaymentModule { }
