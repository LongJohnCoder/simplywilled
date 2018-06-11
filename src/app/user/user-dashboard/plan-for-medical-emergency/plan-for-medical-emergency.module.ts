import { GlobalTooltipModule } from './../global-tooltip/global-tooltip.module';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import {PlanForMedicalEmergencyRoutingModule} from './plan-for-medical-emergency-routing.module';
import {FormsModule, ReactiveFormsModule} from '@angular/forms';
import { PlanForMedicalEmergencyComponent } from './plan-for-medical-emergency.component';
import {NgxMaskModule} from 'ngx-mask';

@NgModule({
  imports: [
    CommonModule,
    PlanForMedicalEmergencyRoutingModule,
    ReactiveFormsModule,
    FormsModule,
    NgxMaskModule.forRoot(),
    GlobalTooltipModule
  ],
  declarations: [PlanForMedicalEmergencyComponent]
})
export class PlanForMedicalEmergencyModule { }
