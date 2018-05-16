import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {ProvideUserSpouseComponent} from './provide-user-spouse.component';

const routes: Routes = [{ path: '', component: ProvideUserSpouseComponent } ];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class ProvideUserSpouseRoutingModule { }
