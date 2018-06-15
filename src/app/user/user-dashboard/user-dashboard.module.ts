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
import { SigningInstructionsDocComponent } from './doc/signing-instructions-doc/signing-instructions-doc.component';
import { FinalDispositionDocComponent } from './doc/final-disposition-doc/final-disposition-doc.component';
import {FinalDispositionPdfService} from './doc/services/final-disposition-pdf.service';
import { SubscribedPackageComponent } from './subscribed-package/subscribed-package.component';


@NgModule({
  imports: [
    CommonModule,
    UserDashboardRoutingModule,
    //PersonalRepresentativePowerModule,
    ReactiveFormsModule,
    //GlobalTooltipModule
  ],
  declarations: [DashboardComponent, MainDashboardComponent, SigningInstructionsDocComponent, FinalDispositionDocComponent, SubscribedPackageComponent  ],
    providers: [
        UserPaidGuard, UserUnPaidGuard, ProgressbarService, ReferFriendService, FinalDispositionPdfService
    ]
})
export class UserDashboardModule { }
