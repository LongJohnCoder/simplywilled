import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { PersonalPropertyDistributedRoutingModule } from './personal-property-distributed-routing.module';
import { PersonalPropertyDistributedComponent } from './personal-property-distributed.component';
import {ReactiveFormsModule} from '@angular/forms';

@NgModule({
  imports: [
    CommonModule,
    PersonalPropertyDistributedRoutingModule,
    ReactiveFormsModule
  ],
  declarations: [PersonalPropertyDistributedComponent]
})
export class PersonalPropertyDistributedModule { }
