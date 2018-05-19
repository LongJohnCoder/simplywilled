import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import {PlanForMedicalEmergencyRoutingModule} from './plan-for-medical-emergency-routing.module';
import {FormsModule, ReactiveFormsModule} from '@angular/forms';
import { PlanForMedicalEmergencyComponent } from './plan-for-medical-emergency.component';

@NgModule({
  imports: [
    CommonModule,
    PlanForMedicalEmergencyRoutingModule,
    ReactiveFormsModule, FormsModule
  ],
  declarations: [PlanForMedicalEmergencyComponent]
})
export class PlanForMedicalEmergencyModule { }
