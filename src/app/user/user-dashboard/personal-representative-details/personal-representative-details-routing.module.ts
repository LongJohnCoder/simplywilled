import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {PersonalRepresentativeDetailsComponent} from './personal-representative-details.component';

const routes: Routes = [{ path: '', component: PersonalRepresentativeDetailsComponent} ];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class PersonalRepresentativeDetailsRoutingModule { }
