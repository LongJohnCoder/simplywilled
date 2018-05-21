import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ContingentBeneficiariesRoutingModule } from './contingent-beneficiaries-routing.module';
import { ContingentBeneficiariesComponent } from './contingent-beneficiaries.component';
import {ReactiveFormsModule} from '@angular/forms';

@NgModule({
  imports: [
    CommonModule,
    ContingentBeneficiariesRoutingModule,
    ReactiveFormsModule
  ],
  declarations: [ContingentBeneficiariesComponent]
})
export class ContingentBeneficiariesModule { }
