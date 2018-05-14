import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { TellUsAboutYourselfComponent } from './tell-us-about-yourself/tell-us-about-yourself.component';
import {UsersWillRoutingModule} from './users-will-routing.module';
import {FormsModule} from '@angular/forms';
import { TuaYourFamilyComponent } from './tua-your-family/tua-your-family.component';
import {NgxMaskModule} from 'ngx-mask';
import {ReactiveFormsModule} from '@angular/forms';
import { GaurdianForMinorChildrenComponent } from './gaurdian-for-minor-children/gaurdian-for-minor-children.component';

@NgModule({
  imports: [
      CommonModule,
      FormsModule,
      UsersWillRoutingModule,
      NgxMaskModule.forRoot(),
      ReactiveFormsModule
  ],
  declarations: [TellUsAboutYourselfComponent, TuaYourFamilyComponent, GaurdianForMinorChildrenComponent]
})
export class UsersWillModule { }
