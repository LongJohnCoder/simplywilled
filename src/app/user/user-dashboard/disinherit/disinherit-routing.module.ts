import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {DisinheritComponent} from './disinherit.component';

const routes: Routes = [ { path: '', component: DisinheritComponent } ];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class DisinheritRoutingModule { }
