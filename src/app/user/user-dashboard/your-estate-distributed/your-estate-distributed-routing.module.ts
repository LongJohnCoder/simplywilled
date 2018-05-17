import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {YourEstateDistributedComponent} from './your-estate-distributed.component';

const routes: Routes = [{ path: '', component: YourEstateDistributedComponent}];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class YourEstateDistributedRoutingModule { }
