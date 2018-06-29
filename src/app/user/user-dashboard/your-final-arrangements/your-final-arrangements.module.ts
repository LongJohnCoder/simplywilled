import { CommonModule } from '@angular/common';
import { NgModule } from '@angular/core';
import { YourFinalAgreementsRoutingModule } from './your-final-arrangements-routing.module';
import { YourFinalArrangementsComponent } from './your-final-arrangements.component';
import {ReactiveFormsModule} from '@angular/forms';
import {YourFinalArrangementsService} from './services/your-final-arrangements.service';
import {GlobalTooltipModule} from '../global-tooltip/global-tooltip.module';

@NgModule({
  imports: [
    CommonModule,
    YourFinalAgreementsRoutingModule,
    ReactiveFormsModule,
    GlobalTooltipModule
  ],
  declarations: [YourFinalArrangementsComponent],
  providers: [YourFinalArrangementsService]
})
export class YourFinalArrangementsModule { }
