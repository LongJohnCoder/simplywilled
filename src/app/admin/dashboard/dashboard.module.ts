import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HttpModule } from '@angular/http';

import { DashboardComponent } from './dashboard.component';
import { DashboardRoutingModule } from './dashboard-routing.module';

@NgModule({
  imports: [
    CommonModule,
    HttpModule,
    DashboardRoutingModule
  ],
  declarations: [
    DashboardComponent,
    ]
})
export class DashboardModule { }
