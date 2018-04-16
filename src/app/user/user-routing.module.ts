import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { AboutUsComponent } from './about-us/about-us.component';
import { FaqComponent } from './faq/faq.component';
import { TermsOfUseComponent } from './terms-of-use/terms-of-use.component';
import { TermsOfServiceComponent } from './terms-of-service/terms-of-service.component';
import { PrivacyPolicyComponent } from './privacy-policy/privacy-policy.component';
import { ContactUsComponent } from './contact-us/contact-us.component';

const routes: Routes = [
    { path: '', pathMatch: 'full', component: HomeComponent },
    { path: 'about-us', pathMatch: 'full', component: AboutUsComponent },
    { path: 'faq', pathMatch: 'full', component: FaqComponent },
    { path: 'terms-of-use', pathMatch: 'full', component: TermsOfUseComponent },
    { path: 'terms-of-service', pathMatch: 'full', component: TermsOfServiceComponent },
    { path: 'privacy-policy', pathMatch: 'full', component: PrivacyPolicyComponent },
    { path: 'contact-us', pathMatch: 'full', component: ContactUsComponent },
    { path: 'sign-in', pathMatch: 'full', loadChildren: './user-auth/user-login/user-login.module#UserLoginModule'}
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
  
})
export class UserRoutingModule { }
