import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { PackagesComponent } from './packages/packages.component';
import {PaypalSuccessComponent} from './paypal-success/paypal-success.component';
import {PaypalFailedComponent} from './paypal-failed/paypal-failed.component';
import {PaymentPageComponent} from './payment-page/payment-page.component';
import {ThankYouComponent} from './thank-you/thank-you.component';

const routes: Routes = [
    { path: '', component: PackagesComponent},
    { path: 'checkout', component: PaymentPageComponent},
    { path: 'payment-success', component: PaypalSuccessComponent},
    { path: 'payment-failed', component: PaypalFailedComponent},
    { path: 'thank-you', component: ThankYouComponent},

];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class PackagesRoutingModule { }
