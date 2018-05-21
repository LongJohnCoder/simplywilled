import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { DisinheritRoutingModule } from './disinherit-routing.module';
import { DisinheritComponent } from './disinherit.component';
import { ReactiveFormsModule } from '@angular/forms';

@NgModule({
  imports: [
    CommonModule,
    DisinheritRoutingModule,
    ReactiveFormsModule
  ],
  declarations: [DisinheritComponent]
})
export class DisinheritModule { }
