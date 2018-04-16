import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { AuthGuard } from './auth/auth.guard';
import { NotAuthGuard } from './auth/not-auth.guard';
import { BlogsComponent } from './blogs/blogs.component';
import { DashHomeComponent } from './dash-home/dash-home.component';
import { BlogCategoriesComponent } from './blog-categories/blog-categories.component';
import { BlogCommentsComponent } from './blog-comments/blog-comments.component';

const routes: Routes = [
    { path: '', pathMatch: 'full', redirectTo: 'login' },
    { path: 'login', canActivate: [ NotAuthGuard ], loadChildren: './auth/admin-login/admin-login.module#AdminLoginModule' },
    { path: 'dashboard', canActivate: [ AuthGuard ], pathMatch: 'full', component: DashHomeComponent },
    { path: 'change-password', canActivate: [ AuthGuard ], pathMatch: 'full', loadChildren: './auth/change-password/change-password.module#ChangePasswordModule'},
    { path: 'blogs', canActivate: [ AuthGuard ], pathMatch: 'full', component: BlogsComponent},
    { path: 'blog-categories', canActivate: [ AuthGuard ], pathMatch: 'full', component: BlogCategoriesComponent},
    { path: 'blog-comments', canActivate: [ AuthGuard ], pathMatch: 'full', component: BlogCommentsComponent},
    
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class AdminRoutingModule { }
