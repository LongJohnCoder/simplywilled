import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import {FormsModule} from '@angular/forms';
import { ProtectYourFinancesRoutingModule } from './protect-your-finances-routing.module';
import { ProtectYourFinancesComponent } from './protect-your-finances.component';
//import {PersonalRepresentativePowerService} from './services/personal-representative-power.service';

@NgModule({
  imports: [
    CommonModule,
    ProtectYourFinancesRoutingModule,
    FormsModule
  ],
  declarations: [ProtectYourFinancesComponent],
  providers: [
    //PersonalRepresentativePowerService
  ]
})
export class ProtectYourFinancesModule { }