import { NgModule, Component } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { AuthGuard } from './auth/auth.guard';
import { NotAuthGuard } from './auth/not-auth.guard';
import { BlogsComponent } from './blogs/blogs.component';
import { DashHomeComponent } from './dash-home/dash-home.component';
import { BlogCategoriesComponent } from './blog-categories/blog-categories.component';
import { BlogCommentsComponent } from './blog-comments/blog-comments.component';
import { AddBlogComponent } from './add-blog/add-blog.component';
import { AddBlogCategoriesComponent } from "./blog-categories/add-blog-categories/add-blog-categories.component";
import { FaqsComponent } from './faq/faqs/faqs.component';
import {FaqsCategoriesComponent} from './faq/faqs-categories/faqs-categories.component';
import {FaqsCategoriesFormComponent} from './faq/faqs-categories-form/faqs-categories-form.component';
import {FaqFormComponent} from './faq/faq-form/faq-form.component';
import {DiscountComponent} from './discount/discount.component';
import {PackagesComponent} from './packages/packages.component';
import {UserListsComponent} from './users-management/user-lists/user-lists.component';
import {UpdateProfileComponent} from './profile/update-profile/update-profile.component';
import {ChangePasswordComponent} from './profile/change-password/change-password.component';

const routes: Routes = [
    { path: '', pathMatch: 'full', redirectTo: 'login' },
    { path: 'login', canActivate: [ NotAuthGuard ], loadChildren: './auth/admin-login/admin-login.module#AdminLoginModule' },
    { path: 'dashboard', canActivate: [ AuthGuard ], pathMatch: 'full', component: DashHomeComponent },
    { path: 'change-password', canActivate: [ AuthGuard ], pathMatch: 'full', loadChildren: './auth/change-password/change-password.module#ChangePasswordModule'},
    { path: 'blogs', canActivate: [ AuthGuard ], pathMatch: 'full', component: BlogsComponent},
    { path: 'add-blog', canActivate: [ AuthGuard ], pathMatch: 'full', component: AddBlogComponent},
    { path: 'edit-blog/:id', canActivate: [ AuthGuard ], pathMatch: 'full', component: AddBlogComponent},
    { path: 'blog-categories', canActivate: [ AuthGuard ], pathMatch: 'full', component: BlogCategoriesComponent},
    { path: 'add-blog-category', canActivate: [ AuthGuard ], pathMatch: 'full', component: AddBlogCategoriesComponent},
    { path: 'blog-comments', canActivate: [ AuthGuard ], pathMatch: 'full', component: BlogCommentsComponent},
    { path: 'edit-blog-category/:id', canActivate: [ AuthGuard ], pathMatch: 'full', component: AddBlogCategoriesComponent},
    { path: 'faqs', canActivate: [ AuthGuard ], pathMatch: 'full', component: FaqsComponent},
    { path: 'faqs-category', canActivate: [ AuthGuard ], pathMatch: 'full', component: FaqsCategoriesComponent},
    { path: 'add-faq-category', canActivate: [ AuthGuard ], pathMatch: 'full', component: FaqsCategoriesFormComponent},
    { path: 'edit-faq-category/:id', canActivate: [ AuthGuard ], pathMatch: 'full', component: FaqsCategoriesFormComponent},
    { path: 'add-faq', canActivate: [ AuthGuard ], pathMatch: 'full', component: FaqFormComponent},
    { path: 'edit-faq/:id', canActivate: [ AuthGuard ], pathMatch: 'full', component: FaqFormComponent},
    { path: 'discount-coupon', canActivate: [ AuthGuard ], pathMatch: 'full', component: DiscountComponent},
    { path: 'packages', canActivate: [ AuthGuard ], pathMatch: 'full', component: PackagesComponent},
    { path: 'users-management', canActivate: [ AuthGuard ], pathMatch: 'full', component: UserListsComponent},
    { path: 'admin-profile', canActivate: [ AuthGuard ], pathMatch: 'full', component: UpdateProfileComponent},
    { path: 'update-password', canActivate: [ AuthGuard ], pathMatch: 'full', component: ChangePasswordComponent},

];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class AdminRoutingModule { }
