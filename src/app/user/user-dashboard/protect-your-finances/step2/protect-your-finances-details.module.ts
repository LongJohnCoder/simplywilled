import { ProtectYourFinancesDetailsComponent } from './protect-your-finances-details.component';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ProtectYourFinancesDetailsRoutingModule } from './protect-your-finances-details-routing.module';
import { ReactiveFormsModule, FormsModule } from '@angular/forms';
import { FiananceComponent } from './fianance/fianance.component';

@NgModule({
  imports: [
    CommonModule,
    ProtectYourFinancesDetailsRoutingModule,
    FormsModule,
    ReactiveFormsModule,
  ],
  declarations: [ProtectYourFinancesDetailsComponent, FiananceComponent]
})
export class ProtectYourFinancesDetailsModule { }
