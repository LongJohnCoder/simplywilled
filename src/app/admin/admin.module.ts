import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HTTP_INTERCEPTORS, HttpClientModule } from "@angular/common/http";

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




@NgModule({
  imports: [
    CommonModule,
    AdminRoutingModule,
    HttpClientModule,
  ],
  declarations: [
    AdminComponent, 
    BlogsComponent,
    DashHomeComponent,
    HeaderComponent,
    LeftMenuComponent,
    BlogCategoriesComponent,
    BlogCommentsComponent
  ],
  providers:[
    AuthGuard,
    NotAuthGuard,
    AuthService,
    DashboardService,
    { provide: HTTP_INTERCEPTORS, useClass: AuthInterceptor, multi: true }
  ],
})
export class AdminModule { }
