import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { PackagesComponent } from './packages/packages.component';
import {PaypalSuccessComponent} from './paypal-success/paypal-success.component';
import {PaypalFailedComponent} from './paypal-failed/paypal-failed.component';

const routes: Routes = [
    { path: '', component: PackagesComponent},
    { path: 'paypal-success', component: PaypalSuccessComponent},
    { path: 'paypal-failed', component: PaypalFailedComponent}
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class PackagesRoutingModule { }
