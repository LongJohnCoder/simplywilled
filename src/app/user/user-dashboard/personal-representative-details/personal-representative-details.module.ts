import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { PersonalRepresentativeDetailsRoutingModule } from './personal-representative-details-routing.module';
import { PersonalRepresentativeDetailsComponent } from './personal-representative-details.component';

@NgModule({
  imports: [
    CommonModule,
    PersonalRepresentativeDetailsRoutingModule
  ],
  declarations: [PersonalRepresentativeDetailsComponent]
})
export class PersonalRepresentativeDetailsModule { }
