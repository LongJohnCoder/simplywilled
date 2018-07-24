import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { AboutUsComponent } from './about-us/about-us.component';
import { FaqComponent } from './faq/faq.component';
import { TermsOfUseComponent } from './terms-of-use/terms-of-use.component';
import { TermsOfServiceComponent } from './terms-of-service/terms-of-service.component';
import { PrivacyPolicyComponent } from './privacy-policy/privacy-policy.component';
import { ContactUsComponent } from './contact-us/contact-us.component';
import { NotUserAuthGuard } from './user-auth/not-user-auth.guard';
import { FullLayoutComponent } from './layout/full-layout/full-layout.component';
import { UserAuthGuard} from './user-auth/user-auth.guard';
import { CommonModule } from '@angular/common';
import { BlogComponent } from './blog/blog.component';
import { BlogdetailsComponent } from './blog/blogdetails/blogdetails.component';
import {BlogCategoryComponent} from './blog/blog-category/blog-category.component';
import {FiduciaryComponent} from './fiduciary/fiduciary.component';
import { NotFoundComponent } from './not-found/not-found.component';

const routes: Routes = [
   {path: '', component: FullLayoutComponent, data: { title: 'Home' }, children: [
        { path: 'sign-in', canActivate: [ NotUserAuthGuard ], loadChildren: './user-auth/user-login/user-login.module#UserLoginModule' },
        { path: 'forget-password', canActivate: [ NotUserAuthGuard ], loadChildren: './user-auth/forget-password/forget-password.module#ForgetPasswordModule' },
        { path: 'reset-password/:email/:token', canActivate: [ NotUserAuthGuard ], loadChildren: './user-auth/reset-password/reset-password.module#ResetPasswordModule' },
        { path: 'register', canActivate: [ NotUserAuthGuard ], loadChildren: './user-auth/user-register/user-register.module#UserRegisterModule'},
        { path: '', pathMatch: 'full', component: HomeComponent },
        { path: 'about-us', pathMatch: 'full', component: AboutUsComponent },
        { path: 'faq', pathMatch: 'full', component: FaqComponent },
        { path: 'blog', pathMatch: 'full', component: BlogComponent },
        { path: 'blogdetails/:slug', pathMatch: 'full', component: BlogdetailsComponent },
        { path: 'category/:slug', pathMatch: 'full', component: BlogCategoryComponent },
        // { path: 'faq', canActivate: [ NotUserAuthGuard ], loadChildren: './faq/user-login/user-login.module#UserLoginModule' },
        { path: 'terms-of-use', pathMatch: 'full', component: TermsOfUseComponent },
        { path: 'terms-of-service', pathMatch: 'full', component: TermsOfServiceComponent },
        { path: 'privacy-policy', pathMatch: 'full', component: PrivacyPolicyComponent },
        { path: 'contact-us', pathMatch: 'full', component: ContactUsComponent },
        { path: 'fiduciary/:type/:token', pathMatch: 'full', component: FiduciaryComponent }


        // tslint:disable-next-line:max-line-length

   ]},
    {
      path: 'dashboard',
      canActivate: [ UserAuthGuard ],
      canActivateChild: [ UserAuthGuard ],
      loadChildren: './user-dashboard/user-dashboard.module#UserDashboardModule'
    },
    {path: '', component: FullLayoutComponent, data: { title: 'Home' }, children: [{path: '**', component: NotFoundComponent}]}
];

@NgModule({
  imports: [RouterModule.forChild(routes), CommonModule],
  exports: [RouterModule]
})
export class UserRoutingModule { }
