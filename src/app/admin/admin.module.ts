import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HTTP_INTERCEPTORS, HttpClientModule } from "@angular/common/http";

import { AdminRoutingModule } from './admin-routing.module';
import { AdminComponent } from './admin.component';
import { AuthGuard } from './auth/auth.guard';
import { NotAuthGuard } from './auth/not-auth.guard';
import { AuthService } from './auth/auth.service';
import { AuthInterceptor } from './auth/auth.interceptor';


@NgModule({
  imports: [
    CommonModule,
    AdminRoutingModule,
    HttpClientModule
  ],
  declarations: [AdminComponent,],
  providers:[
    AuthGuard,
    NotAuthGuard,
    AuthService,
    { provide: HTTP_INTERCEPTORS, useClass: AuthInterceptor, multi: true }
  ]
})
export class AdminModule { }
