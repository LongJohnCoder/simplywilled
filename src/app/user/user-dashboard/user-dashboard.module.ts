import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { DashboardComponent } from './dashboard/dashboard.component';
import { UserDashboardRoutingModule } from'./user-dashboard-routing.module';
import { MainDashboardComponent } from './dashboard/main-dashboard/main-dashboard.component';

@NgModule({
  imports: [
    CommonModule,
      UserDashboardRoutingModule
  ],
  declarations: [DashboardComponent, MainDashboardComponent]
})
export class UserDashboardModule { }
