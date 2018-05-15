import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { PersonalRepresentativeDetailsRoutingModule } from './personal-representative-details-routing.module';
import { PersonalRepresentativeDetailsComponent } from './personal-representative-details.component';
import {ReactiveFormsModule, FormsModule} from '@angular/forms';

@NgModule({
  imports: [
    CommonModule,
    PersonalRepresentativeDetailsRoutingModule,
    ReactiveFormsModule
  ],
  declarations: [PersonalRepresentativeDetailsComponent]
})
export class PersonalRepresentativeDetailsModule { }
