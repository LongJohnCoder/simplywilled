import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import {FormsModule} from '@angular/forms';
import { PersonalRepresentativePowerRoutingModule } from './personal-representative-power-routing.module';
import { PersonalRepresentativePowerComponent } from './personal-representative-power.component';
import {PersonalRepresentativePowerService} from './services/personal-representative-power.service';
import { GlobalTooltipModule } from '../global-tooltip/global-tooltip.module';

@NgModule({
  imports: [
    CommonModule,
    PersonalRepresentativePowerRoutingModule,
    FormsModule,
    GlobalTooltipModule,
  ],
  declarations: [PersonalRepresentativePowerComponent],
  providers: [PersonalRepresentativePowerService]
})
export class PersonalRepresentativePowerModule { }
