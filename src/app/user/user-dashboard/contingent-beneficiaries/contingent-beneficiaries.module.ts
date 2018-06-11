import { GlobalTooltipModule } from './../global-tooltip/global-tooltip.module';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ContingentBeneficiariesRoutingModule } from './contingent-beneficiaries-routing.module';
import { ContingentBeneficiariesComponent } from './contingent-beneficiaries.component';
import {ReactiveFormsModule} from '@angular/forms';

@NgModule({
  imports: [
    CommonModule,
    ContingentBeneficiariesRoutingModule,
    ReactiveFormsModule,
    GlobalTooltipModule
  ],
  declarations: [ContingentBeneficiariesComponent]
})
export class ContingentBeneficiariesModule { }
