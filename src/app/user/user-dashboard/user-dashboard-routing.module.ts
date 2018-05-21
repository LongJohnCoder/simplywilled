import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {DashboardComponent} from './dashboard/dashboard.component';
import {MainDashboardComponent} from './dashboard/main-dashboard/main-dashboard.component';

const routes: Routes = [
      { path: '', component: DashboardComponent, children: [
      { path: '', component: MainDashboardComponent},
      { path: 'will', loadChildren: './users-will/users-will.module#UsersWillModule'},
      { path: 'your-personal-representative-powers', loadChildren: './personal-representative-power/personal-representative-power.module#PersonalRepresentativePowerModule'},
      { path: 'personal-representative-details', loadChildren: './personal-representative-details/personal-representative-details.module#PersonalRepresentativeDetailsModule' },
      { path: 'protect-your-finances', loadChildren: './protect-your-finances/step1/protect-your-finances.module#ProtectYourFinancesModule'},
      { path: 'provide-user-spouse', loadChildren: './provide-user-spouse/provide-user-spouse.module#ProvideUserSpouseModule' },
      { path: 'personal-property-distributed', loadChildren: './personal-property-distributed/personal-property-distributed.module#PersonalPropertyDistributedModule' },
      { path: 'tell-you-make-specific-gifts', loadChildren: './gift/gift.module#GiftModule'},
      { path: 'your-specific-gifts', loadChildren: './your-specific-gift/your-specific-gift.module#YourSpecificGiftModule'},
      { path: 'your-estate-distributed', loadChildren: './your-estate-distributed/your-estate-distributed.module#YourEstateDistributedModule'},
      { path: 'plan-for-medical-emergency', loadChildren: './plan-for-medical-emergency/plan-for-medical-emergency.module#PlanForMedicalEmergencyModule'},
      { path: 'contingent-beneficiaries', loadChildren: './contingent-beneficiaries/contingent-beneficiaries.module#ContingentBeneficiariesModule'},
      { path: 'disinherit', loadChildren: './disinherit/disinherit.module#DisinheritModule'},
    ]},
]

@NgModule({
    imports: [RouterModule.forChild(routes)],
    exports: [RouterModule]
})
export class  UserDashboardRoutingModule { }
