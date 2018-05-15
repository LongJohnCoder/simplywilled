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
      { path: 'protect-your-finances', loadChildren: './protect-your-finances/protect-your-finances.module#ProtectYourFinancesModule'}
    ]},
]

@NgModule({
    imports: [RouterModule.forChild(routes)],
    exports: [RouterModule]
})
export class  UserDashboardRoutingModule { }
