import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {PersonalRepresentativePowerComponent} from './personal-representative-power.component';

const routes: Routes = [
  { path: '', component: PersonalRepresentativePowerComponent}
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class PersonalRepresentativePowerRoutingModule { }
