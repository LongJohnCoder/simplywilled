import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {PersonalPropertyDistributedComponent} from './personal-property-distributed.component';

const routes: Routes = [ { path: '', component: PersonalPropertyDistributedComponent } ];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class PersonalPropertyDistributedRoutingModule { }
