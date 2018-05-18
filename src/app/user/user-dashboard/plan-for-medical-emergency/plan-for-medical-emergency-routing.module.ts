import { NgModule } from '@angular/core';
import {RouterModule, Routes} from '@angular/router';
import {PlanForMedicalEmergencyModule} from './plan-for-medical-emergency.module';

const routes: Routes = [ { path: '', component: PlanForMedicalEmergencyModule } ];

@NgModule({
    imports: [RouterModule.forChild(routes)],
    exports: [RouterModule]
})
export class PlanForMedicalEmergencyRoutingModule { }
