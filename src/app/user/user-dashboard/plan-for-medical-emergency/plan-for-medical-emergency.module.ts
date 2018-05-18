import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import {PlanForMedicalEmergencyRoutingModule} from './plan-for-medical-emergency-routing.module';
import {ReactiveFormsModule} from '@angular/forms';
import { PlanForMedicalEmergencyComponent } from './plan-for-medical-emergency.component';

@NgModule({
  imports: [
    CommonModule,
    PlanForMedicalEmergencyRoutingModule,
    ReactiveFormsModule
  ],
  declarations: [PlanForMedicalEmergencyComponent]
})
export class PlanForMedicalEmergencyModule { }
