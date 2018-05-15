import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {ProtectYourFinancesComponent} from './protect-your-finances.component';

const routes: Routes = [
  { path: '', component: ProtectYourFinancesComponent}
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class ProtectYourFinancesRoutingModule { }
