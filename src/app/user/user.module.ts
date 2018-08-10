import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { UserRoutingModule } from './user-routing.module';

import { HomeComponent } from './home/home.component'; // checked
import { AboutUsComponent } from './about-us/about-us.component'; // checked
import { FaqComponent } from './faq/faq.component'; // checked
import { TermsOfUseComponent } from './terms-of-use/terms-of-use.component'; // checked
import { TermsOfServiceComponent } from './terms-of-service/terms-of-service.component'; // checked
import { PrivacyPolicyComponent } from './privacy-policy/privacy-policy.component'; // checked
import { ContactUsComponent } from './contact-us/contact-us.component'; // checked
import { AuthInterceptor } from './user-auth/user-auth.interceptor'; // checked
import { HTTP_INTERCEPTORS, HttpClientModule } from '@angular/common/http';
import { NotUserAuthGuard } from './user-auth/not-user-auth.guard'; // checked
import { UserAuthGuard } from './user-auth/user-auth.guard'; // checked
import { UserAuthService } from './user-auth/user-auth.service'; // checked
import { FullLayoutComponent } from './layout/full-layout/full-layout.component'; // checked
import { UserService } from './user.service';

import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { FaqService } from './faq/faq.service'; // checked
import { BsDropdownModule } from 'ngx-bootstrap/dropdown';

import { ModalModule } from 'ngx-bootstrap/modal';
import { CarouselModule } from 'ngx-bootstrap/carousel';
import { BlogComponent } from './blog/blog.component'; // checked
import { BlogdetailsComponent } from './blog/blogdetails/blogdetails.component'; // checked
import { BlogService } from './blog/blog.service'; // checked
import { BlogCategoryComponent } from './blog/blog-category/blog-category.component'; // checked
import { NgxPaginationModule } from 'ngx-pagination';


import {PackagesService} from './user-dashboard/packages/packages.service';
import { FiduciaryComponent } from './fiduciary/fiduciary.component'; // checked
import { NotFoundComponent } from './not-found/not-found.component'; // checked


@NgModule({
  imports: [
    CommonModule,
    UserRoutingModule,
    HttpClientModule,
    ReactiveFormsModule,
    FormsModule,
    BsDropdownModule.forRoot(),
    ModalModule.forRoot(),
    CarouselModule.forRoot(),
    NgxPaginationModule
  ],
  declarations: [
    HomeComponent,
    AboutUsComponent,
    // FaqComponent,
    FaqComponent,
    TermsOfUseComponent,
    TermsOfServiceComponent,
    PrivacyPolicyComponent,
    ContactUsComponent,
    FullLayoutComponent,
    BlogComponent,
    BlogdetailsComponent,
    BlogCategoryComponent,
    FiduciaryComponent,
    NotFoundComponent,
    // CapitalizePipe
  ],
  providers: [
    UserAuthGuard,
    NotUserAuthGuard,
    UserAuthService,
    UserService,
    FaqService,
    BlogService,
    PackagesService,
    { provide: HTTP_INTERCEPTORS, useClass: AuthInterceptor, multi: true }
  ],
})
export class UserModule { }
