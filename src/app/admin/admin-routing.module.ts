import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { AuthGuard } from './auth/auth.guard';
import { NotAuthGuard } from './auth/not-auth.guard';

const routes: Routes = [
    { path: '', pathMatch: 'full', redirectTo: 'login' },
    { path: 'login', canActivate: [ NotAuthGuard ], loadChildren: './auth/admin-login/admin-login.module#AdminLoginModule' },
    { path: '', pathMatch: 'full', redirectTo: 'dashboard' },
    { path: 'dashboard', canActivate: [ AuthGuard ], loadChildren: './dashboard/dashboard.module#DashboardModule' },
    { path: 'reset-password', canActivate: [ AuthGuard ], pathMatch: 'full', loadChildren: './auth/reset-password/reset-password.module#ResetPasswordModule'}
    
    
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class AdminRoutingModule { }
