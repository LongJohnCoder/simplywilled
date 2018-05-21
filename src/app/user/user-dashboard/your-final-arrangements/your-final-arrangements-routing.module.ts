import { RouterModule, Routes } from '@angular/router';

import { NgModule } from '@angular/core';
import { YourFinalArrangementsComponent } from './your-final-arrangements.component';

const routes: Routes = [{ path: '', component: YourFinalArrangementsComponent}];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class YourFinalAgreementsRoutingModule { }
