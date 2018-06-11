import { GlobalTooltipModule } from './../../global-tooltip/global-tooltip.module';
import { ProtectYourFinancesDetailsComponent } from './protect-your-finances-details.component';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { NgxMaskModule } from 'ngx-mask';

import { ProtectYourFinancesDetailsRoutingModule } from './protect-your-finances-details-routing.module';
import { ReactiveFormsModule, FormsModule } from '@angular/forms';
import { FiananceComponent } from './fianance/fianance.component';

@NgModule({
  imports: [
    CommonModule,
    ProtectYourFinancesDetailsRoutingModule,
    FormsModule,
    ReactiveFormsModule,
    NgxMaskModule.forRoot(),
    GlobalTooltipModule
  ],
  declarations: [ProtectYourFinancesDetailsComponent, FiananceComponent]
})
export class ProtectYourFinancesDetailsModule { }
