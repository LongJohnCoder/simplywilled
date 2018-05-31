import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { PackagesComponent } from './packages/packages.component';
import {PaymentStatusComponent} from './payment-status/payment-status.component';

const routes: Routes = [
    { path: '', component: PackagesComponent},
    { path: 'status/:id', component: PaymentStatusComponent},
    { path: 'payment', loadChildren: './payment/payment.module#PaymentModule'}
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class PackagesRoutingModule { }
