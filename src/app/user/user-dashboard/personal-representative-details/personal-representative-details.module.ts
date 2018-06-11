import { GlobalTooltipModule } from './../global-tooltip/global-tooltip.module';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { PersonalRepresentativeDetailsRoutingModule } from './personal-representative-details-routing.module';
import { PersonalRepresentativeDetailsComponent } from './personal-representative-details.component';
import {ReactiveFormsModule, FormsModule} from '@angular/forms';
import {NgxMaskModule} from 'ngx-mask';
@NgModule({
  imports: [
    CommonModule,
    PersonalRepresentativeDetailsRoutingModule,
    ReactiveFormsModule,
    FormsModule,
    NgxMaskModule.forRoot(),
    GlobalTooltipModule
  ],
  declarations: [PersonalRepresentativeDetailsComponent ]
})
export class PersonalRepresentativeDetailsModule { }
