import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import {FormsModule} from '@angular/forms';
import { PersonalRepresentativePowerRoutingModule } from './personal-representative-power-routing.module';
import { PersonalRepresentativePowerComponent } from './personal-representative-power.component';
import {PersonalRepresentativePowerService} from './services/personal-representative-power.service';

@NgModule({
  imports: [
    CommonModule,
    PersonalRepresentativePowerRoutingModule,
    FormsModule
  ],
  declarations: [PersonalRepresentativePowerComponent],
  providers: [PersonalRepresentativePowerService]
})
export class PersonalRepresentativePowerModule { }
