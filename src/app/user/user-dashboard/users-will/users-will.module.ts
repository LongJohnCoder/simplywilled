import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { TellUsAboutYourselfComponent } from './tell-us-about-yourself/tell-us-about-yourself.component';
import {UsersWillRoutingModule} from './users-will-routing.module';
import {FormsModule} from '@angular/forms';
import { TuaYourFamilyComponent } from './tua-your-family/tua-your-family.component';

@NgModule({
  imports: [
      CommonModule,
      FormsModule,
      UsersWillRoutingModule
  ],
  declarations: [TellUsAboutYourselfComponent,TuaYourFamilyComponent]
})
export class UsersWillModule { }
