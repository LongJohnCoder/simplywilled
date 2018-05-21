import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {ContingentBeneficiariesComponent} from './contingent-beneficiaries.component';

const routes: Routes = [ { path: '', component: ContingentBeneficiariesComponent } ];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class ContingentBeneficiariesRoutingModule { }
