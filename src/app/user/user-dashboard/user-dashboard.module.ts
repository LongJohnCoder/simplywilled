import { GlobalTourModule } from './global-tour/global-tour.module';
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
import {FinalDispositionPdfService} from './doc/services/final-disposition-pdf.service';
import { SubscribedPackageComponent } from './subscribed-package/subscribed-package.component';
import {GlobalPdfService} from './doc/services/global-pdf.service';
import { GlobalTourComponent } from './global-tour/global-tour.component';
import { Ng2PageScrollModule } from 'ng2-page-scroll';


@NgModule({
  imports: [
    CommonModule,
    UserDashboardRoutingModule,
    // PersonalRepresentativePowerModule,
    ReactiveFormsModule,
    GlobalTourModule,
    Ng2PageScrollModule
    // GlobalTooltipModule
  ],
  declarations: [DashboardComponent, MainDashboardComponent, SubscribedPackageComponent ],
    providers: [
        UserPaidGuard, UserUnPaidGuard, ProgressbarService, ReferFriendService, FinalDispositionPdfService, GlobalPdfService
    ]
})
export class UserDashboardModule { }
