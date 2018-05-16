import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ProvideUserSpouseRoutingModule } from './provide-user-spouse-routing.module';
import { ProvideUserSpouseComponent } from './provide-user-spouse.component';
import {ReactiveFormsModule} from '@angular/forms';

@NgModule({
  imports: [
    CommonModule,
    ProvideUserSpouseRoutingModule, ReactiveFormsModule
  ],
  declarations: [ProvideUserSpouseComponent]
})
export class ProvideUserSpouseModule { }
