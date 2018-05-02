import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {DashboardComponent} from './dashboard/dashboard.component';
import {MainDashboardComponent} from './dashboard/main-dashboard/main-dashboard.component';
import {UsersWillModule} from './users-will/users-will.module';

const routes: Routes = [
    { path: '', component: DashboardComponent, children: [
            {path: '', component: MainDashboardComponent},
            {path: 'will', loadChildren: './users-will/users-will.module#UsersWillModule'}
            ]}
];

@NgModule({
    imports: [RouterModule.forChild(routes)],
    exports: [RouterModule]
})
export class  UserDashboardRoutingModule { }
