import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { DashboardComponent } from './dashboard/dashboard.component';
import { UserDashboardRoutingModule } from './user-dashboard-routing.module';
import { MainDashboardComponent } from './dashboard/main-dashboard/main-dashboard.component';
import {ReactiveFormsModule} from '@angular/forms';
import {UserPaidGuard} from './user-paid.guard';
import {UserUnPaidGuard} from './user-unpaid.guard';
import {ProgressbarService} from './shared/services/progressbar.service';
import {ReferFriendService} from './shared/services/referFriend.service';
import { ChangePasswordComponent } from './change-password/change-password.component';
import { GlobalTooltipModule } from './global-tooltip/global-tooltip.module';
import { TuayPdfComponent } from './doc/tuay-pdf/tuay-pdf.component';


@NgModule({
  imports: [
    CommonModule,
    UserDashboardRoutingModule,
    //PersonalRepresentativePowerModule,
    ReactiveFormsModule,
    //GlobalTooltipModule
  ],
  declarations: [DashboardComponent, MainDashboardComponent, TuayPdfComponent
  ],
    providers: [
        UserPaidGuard, UserUnPaidGuard, ProgressbarService, ReferFriendService
    ]
})
export class UserDashboardModule { }
