import { RouterModule, Routes } from '@angular/router';

import {DashboardComponent} from './dashboard/dashboard.component';
import {MainDashboardComponent} from './dashboard/main-dashboard/main-dashboard.component';
import { NgModule } from '@angular/core';
import {UserPaidGuard} from './user-paid.guard';
import {UserUnPaidGuard} from './user-unpaid.guard';

const routes: Routes = [
      {
        path: '',
        component: DashboardComponent,
        children: [
            {
                path: '',
                canActivate: [ UserPaidGuard ],
                // canActivateChild: [ UserPaidGuard ],
                component: MainDashboardComponent
            },
            {
                path: 'will',
                canActivate: [ UserPaidGuard ],
                // canActivateChild: [ UserPaidGuard ],
                loadChildren: './users-will/users-will.module#UsersWillModule'
            },
            {
                path: 'your-personal-representative-powers',
                canActivate: [ UserPaidGuard ],
                // canActivateChild: [ UserPaidGuard ],
                loadChildren: './personal-representative-power/personal-representative-power.module#PersonalRepresentativePowerModule'
            },
            {
                path: 'personal-representative-details',
                canActivate: [ UserPaidGuard ],
                // canActivateChild: [ UserPaidGuard ],
                loadChildren: './personal-representative-details/personal-representative-details.module#PersonalRepresentativeDetailsModule'
            },
            {
                path: 'protect-your-finances',
                canActivate: [ UserPaidGuard ],
                // canActivateChild: [ UserPaidGuard ],
                loadChildren: './protect-your-finances/step1/protect-your-finances.module#ProtectYourFinancesModule'
            },
            {
                path: 'provide-user-spouse',
                canActivate: [ UserPaidGuard ],
                // canActivateChild: [ UserPaidGuard ],
                loadChildren: './provide-user-spouse/provide-user-spouse.module#ProvideUserSpouseModule'
            },
            {
                path: 'personal-property-distributed',
                canActivate: [ UserPaidGuard ],
                // canActivateChild: [ UserPaidGuard ],
                loadChildren: './personal-property-distributed/personal-property-distributed.module#PersonalPropertyDistributedModule'
            },
            {
                path: 'tell-you-make-specific-gifts',
                canActivate: [ UserPaidGuard ],
                // canActivateChild: [ UserPaidGuard ],
                loadChildren: './gift/gift.module#GiftModule'
            },
            {
                path: 'your-specific-gifts',
                canActivate: [ UserPaidGuard ],
                // canActivateChild: [ UserPaidGuard ],
                loadChildren: './your-specific-gift/your-specific-gift.module#YourSpecificGiftModule'
            },
            {
                path: 'your-estate-distributed',
                canActivate: [ UserPaidGuard ],
                // canActivateChild: [ UserPaidGuard ],
                loadChildren: './your-estate-distributed/your-estate-distributed.module#YourEstateDistributedModule'
            },
            {
                path: 'plan-for-medical-emergency',
                canActivate: [ UserPaidGuard ],
                // canActivateChild: [ UserPaidGuard ],
                loadChildren: './plan-for-medical-emergency/plan-for-medical-emergency.module#PlanForMedicalEmergencyModule'
            },
            {
              path: 'contingent-beneficiaries',
                canActivate: [ UserPaidGuard ],
                // canActivateChild: [ UserPaidGuard ],
              loadChildren: './contingent-beneficiaries/contingent-beneficiaries.module#ContingentBeneficiariesModule'
            },
            {
              path: 'disinherit',
                canActivate: [ UserPaidGuard ],
                // canActivateChild: [ UserPaidGuard ],
              loadChildren: './disinherit/disinherit.module#DisinheritModule'
            },
            {
              path: 'packages',
                canActivate: [UserUnPaidGuard],
              loadChildren: './packages/packages.module#PackagesModule'
            },
            {
              path: 'protect-your-finances-details',
                canActivate: [ UserPaidGuard ],
                // canActivateChild: [ UserPaidGuard ],
              loadChildren: './protect-your-finances/step2/protect-your-finances-details.module#ProtectYourFinancesDetailsModule'
            },
            {
                path: 'your-final-arrangements',
                canActivate: [ UserPaidGuard ],
                // canActivateChild: [ UserPaidGuard ],
                loadChildren: './your-final-arrangements/your-final-arrangements.module#YourFinalArrangementsModule'
            }
        ]
    },

];

@NgModule({
    imports: [RouterModule.forChild(routes)],
    exports: [RouterModule]
})
export class  UserDashboardRoutingModule { }
