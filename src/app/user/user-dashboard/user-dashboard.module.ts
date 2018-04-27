import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { DashboardComponent } from './dashboard/dashboard.component';
import { UserDashboardRoutingModule } from'./user-dashboard-routing.module';

@NgModule({
  imports: [
    CommonModule,
      UserDashboardRoutingModule
  ],
  declarations: [DashboardComponent]
})
export class UserDashboardModule { }
