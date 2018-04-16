import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { UserRoutingModule } from './user-routing.module';
import { UserComponent } from './user.component';
import { HeaderComponent } from './layout/header/header.component';
import { HomeComponent } from './home/home.component';
import { AboutUsComponent } from './about-us/about-us.component';
import { FaqComponent } from './faq/faq.component';
import { TermsOfUseComponent } from './terms-of-use/terms-of-use.component';
import { TermsOfServiceComponent } from './terms-of-service/terms-of-service.component';
import { PrivacyPolicyComponent } from './privacy-policy/privacy-policy.component';
import { ContactUsComponent } from './contact-us/contact-us.component';

@NgModule({
  imports: [
    CommonModule,
    UserRoutingModule
  ],
  declarations: [
    UserComponent, 
    HeaderComponent, 
    HomeComponent, 
    AboutUsComponent, 
    FaqComponent, 
    TermsOfUseComponent, 
    TermsOfServiceComponent, 
    PrivacyPolicyComponent, 
    ContactUsComponent
  ]
})
export class UserModule { }
