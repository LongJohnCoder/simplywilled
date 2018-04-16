import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HttpModule } from '@angular/http';

import { DashboardComponent } from './dashboard.component';
import { DashboardRoutingModule } from './dashboard-routing.module';
import { DashboardService } from './dashboard.service';

@NgModule({
  imports: [
    CommonModule,
    HttpModule,
    DashboardRoutingModule
  ],
  declarations: [
    DashboardComponent,
    ],
    providers: [
      DashboardService
    ]
})
export class DashboardModule { }
