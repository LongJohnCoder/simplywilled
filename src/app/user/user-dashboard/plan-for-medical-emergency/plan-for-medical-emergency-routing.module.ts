import { NgModule } from '@angular/core';
import {RouterModule, Routes} from '@angular/router';
import {PlanForMedicalEmergencyComponent} from './plan-for-medical-emergency.component';

const routes: Routes = [ { path: '', component: PlanForMedicalEmergencyComponent } ];

@NgModule({
    imports: [RouterModule.forChild(routes)],
    exports: [RouterModule]
})
export class PlanForMedicalEmergencyRoutingModule { }
