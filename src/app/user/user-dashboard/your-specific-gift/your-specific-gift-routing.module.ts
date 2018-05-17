import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {YourSpecificGiftComponent} from './your-specific-gift.component';

const routes: Routes = [{ path: '', component: YourSpecificGiftComponent}];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class YourSpecificGiftRoutingModule { }
