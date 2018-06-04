import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { DashboardComponent } from './dashboard/dashboard.component';
import { UserDashboardRoutingModule } from './user-dashboard-routing.module';
import { MainDashboardComponent } from './dashboard/main-dashboard/main-dashboard.component';
import {ReactiveFormsModule} from '@angular/forms';
import {UserPaidGuard} from './user-paid.guard';
import {UserUnPaidGuard} from './user-unpaid.guard';
import {ProgressbarService} from './shared/services/progressbar.service';

@NgModule({
  imports: [
    CommonModule,
    UserDashboardRoutingModule,
    ReactiveFormsModule,
  ],
  declarations: [DashboardComponent, MainDashboardComponent],
    providers: [
        UserPaidGuard, UserUnPaidGuard, ProgressbarService
    ]
})
export class UserDashboardModule { }
