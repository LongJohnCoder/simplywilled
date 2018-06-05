import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HTTP_INTERCEPTORS, HttpClientModule } from '@angular/common/http';
import { BsDropdownModule } from 'ngx-bootstrap/dropdown';
import { TooltipModule } from 'ngx-bootstrap/tooltip';
import { ModalModule } from 'ngx-bootstrap/modal';
import {FormsModule, ReactiveFormsModule} from '@angular/forms';
import { CKEditorModule } from 'ngx-ckeditor';

import { AdminRoutingModule } from './admin-routing.module';
import { AdminComponent } from './admin.component';
import { AuthGuard } from './auth/auth.guard';
import { NotAuthGuard } from './auth/not-auth.guard';
import { AuthService } from './auth/auth.service';
import { AuthInterceptor } from './auth/auth.interceptor';
import { BlogsComponent } from './blogs/blogs.component';
import { DashHomeComponent } from './dash-home/dash-home.component';
import { HeaderComponent } from './layout/header/header.component';
import { LeftMenuComponent } from './layout/left-menu/left-menu.component';
import { DashboardService } from './dashboard.service';
import { BlogCategoriesComponent } from './blog-categories/blog-categories.component';
import { BlogCommentsComponent } from './blog-comments/blog-comments.component';
import { AddBlogComponent } from './add-blog/add-blog.component';
import { ChangePasswordService } from './auth/change-password/change-password.service';
import { AdminLoginService } from './auth/admin-login/admin-login.service';
import { AddBlogCategoriesComponent } from './blog-categories/add-blog-categories/add-blog-categories.component';
import { BlogService } from "./blog.service";
import { RouterModule } from '@angular/router';
import { AlertModule } from 'ngx-bootstrap/alert';
import {FaqsCategoriesComponent} from './faq/faqs-categories/faqs-categories.component';
import {FaqsComponent} from './faq/faqs/faqs.component';
import {FaqService} from './faq/faq.service';
import { FaqsCategoriesFormComponent } from './faq/faqs-categories-form/faqs-categories-form.component';
import { FaqFormComponent } from './faq/faq-form/faq-form.component';
import { DiscountComponent } from './discount/discount.component';
import {PackagesComponent} from './packages/packages.component';
import {PackageService} from './packages/package.service';
import {DiscountService} from './discount/discount.service';


@NgModule({
  imports: [
    CommonModule,
    AdminRoutingModule,
    HttpClientModule,
    BsDropdownModule.forRoot(),
    TooltipModule.forRoot(),
    ModalModule.forRoot(),
    FormsModule, CKEditorModule,
    RouterModule,
    AlertModule.forRoot(),
    ReactiveFormsModule

  ],
  declarations: [
    AdminComponent,
    BlogsComponent,
    DashHomeComponent,
    HeaderComponent,
    LeftMenuComponent,
    BlogCategoriesComponent,
    BlogCommentsComponent,
    AddBlogComponent,
    AddBlogCategoriesComponent,
      FaqsCategoriesComponent,
      FaqsComponent,
      FaqsCategoriesFormComponent,
      FaqFormComponent,
      DiscountComponent,
      PackagesComponent
  ],
  providers: [
    AuthGuard,
    NotAuthGuard,
    AuthService,
    ChangePasswordService,
    DashboardService,
      BlogService,
      FaqService,
      PackageService,
      DiscountService,
      ChangePasswordService,
      AdminLoginService,
    { provide: HTTP_INTERCEPTORS, useClass: AuthInterceptor, multi: true }
  ],
})
export class AdminModule { }
