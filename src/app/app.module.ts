import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { AngularFontAwesomeModule } from 'angular-font-awesome';
import { BsDropdownModule } from 'ngx-bootstrap/dropdown';
import { TooltipModule } from 'ngx-bootstrap/tooltip';
import { ModalModule } from 'ngx-bootstrap/modal';
import { AppComponent } from './app.component';
import { AppRoutingModule } from './app-routing.module';
import { NotAuthGuard } from './admin/auth/not-auth.guard';
import { AuthGuard } from './admin/auth/auth.guard';
import { AuthService } from './admin/auth/auth.service';
import { NotUserAuthGuard } from './user/user-auth/not-user-auth.guard';
import { UserAuthService } from './user/user-auth/user-auth.service';
import { UserAuthGuard } from './user/user-auth/user-auth.guard';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
// import { BlogService } from "./user/blog/blog.service";
import { NgxPaginationModule } from 'ngx-pagination';

@NgModule({
  declarations: [
    AppComponent,

  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    AngularFontAwesomeModule,
    BsDropdownModule.forRoot(),
    TooltipModule,
    ModalModule.forRoot(), FormsModule,
    ReactiveFormsModule,
    NgxPaginationModule,
  ],
  providers: [
    AuthGuard,
    NotAuthGuard,
    AuthService,
    UserAuthGuard,
    NotUserAuthGuard,
    UserAuthService,
  ],
  bootstrap: [AppComponent],
  exports: [BsDropdownModule, TooltipModule, ModalModule]
})
export class AppModule { }
