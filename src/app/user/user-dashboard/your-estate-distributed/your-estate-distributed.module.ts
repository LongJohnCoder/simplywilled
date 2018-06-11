import { GlobalTooltipModule } from './../global-tooltip/global-tooltip.module';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { YourEstateDistributedRoutingModule } from './your-estate-distributed-routing.module';
import { YourEstateDistributedComponent } from './your-estate-distributed.component';
import {ReactiveFormsModule} from '@angular/forms';
@NgModule({
  imports: [
    CommonModule,
    YourEstateDistributedRoutingModule, ReactiveFormsModule, GlobalTooltipModule
  ],
  declarations: [YourEstateDistributedComponent]
})
export class YourEstateDistributedModule { }
