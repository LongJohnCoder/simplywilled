import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { UserRoutingModule } from './user-routing.module';
import { UserComponent } from './user.component';
import { HomeComponent } from './home/home.component';
import { AboutUsComponent } from './about-us/about-us.component';
import { FaqComponent } from './faq/faq.component';
import { TermsOfUseComponent } from './terms-of-use/terms-of-use.component';
import { TermsOfServiceComponent } from './terms-of-service/terms-of-service.component';
import { PrivacyPolicyComponent } from './privacy-policy/privacy-policy.component';
import { ContactUsComponent } from './contact-us/contact-us.component';
import { AuthInterceptor } from './user-auth/user-auth.interceptor';
import { HTTP_INTERCEPTORS, HttpClientModule } from '@angular/common/http';
import { NotUserAuthGuard } from './user-auth/not-user-auth.guard';
import { UserAuthGuard } from './user-auth/user-auth.guard';
import { UserAuthService } from './user-auth/user-auth.service';
import { FullLayoutComponent } from './layout/full-layout/full-layout.component';
import { UserService } from './user.service';
import { UserDashboardService } from './user-dashboard/user-dashboard.service';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { FaqService } from './faq/faq.service';
import { BsDropdownModule } from 'ngx-bootstrap/dropdown';
import { TooltipModule } from 'ngx-bootstrap/tooltip';
import { ModalModule } from 'ngx-bootstrap/modal';
import { CarouselModule } from 'ngx-bootstrap/carousel';
import { BlogComponent } from './blog/blog.component';
import { BlogdetailsComponent } from './blog/blogdetails/blogdetails.component';
import { BlogService } from './blog/blog.service';
import { BlogCategoryComponent } from './blog/blog-category/blog-category.component';
import { NgxPaginationModule } from 'ngx-pagination';
import {MedicalEmergencyService} from './user-dashboard/plan-for-medical-emergency/medical-emergency.service';
import { ProtectYourFinancesService } from './user-dashboard/protect-your-finances/services/protect-your-finances.service';

@NgModule({
  imports: [
    CommonModule,
    UserRoutingModule,
    HttpClientModule,
    ReactiveFormsModule,
    FormsModule,
    BsDropdownModule.forRoot(),
    TooltipModule.forRoot(),
    ModalModule.forRoot(),
    CarouselModule.forRoot(),
    NgxPaginationModule
  ],
  declarations: [
    UserComponent,
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
  ],
  providers: [
    ProtectYourFinancesService,
    UserAuthGuard,
    NotUserAuthGuard,
    UserAuthService,
    UserService,
    FaqService,
    UserDashboardService,
    BlogService,
    MedicalEmergencyService,
    { provide: HTTP_INTERCEPTORS, useClass: AuthInterceptor, multi: true }
  ],
})
export class UserModule { }