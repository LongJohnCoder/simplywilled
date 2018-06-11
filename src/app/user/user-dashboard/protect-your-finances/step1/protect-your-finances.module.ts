import { GlobalTooltipModule } from './../../global-tooltip/global-tooltip.module';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ProtectYourFinancesRoutingModule } from './protect-your-finances-routing.module';
import { ProtectYourFinancesComponent } from './protect-your-finances.component';
// import {PersonalRepresentativePowerService} from './services/personal-representative-power.service';
import {ReactiveFormsModule, FormsModule} from '@angular/forms';

@NgModule({
  imports: [
    CommonModule,
    ProtectYourFinancesRoutingModule,
    FormsModule,
    ReactiveFormsModule,
    GlobalTooltipModule
  ],
  declarations: [ProtectYourFinancesComponent],
  providers: [
    // PersonalRepresentativePowerService
  ]
})
export class ProtectYourFinancesModule { }
