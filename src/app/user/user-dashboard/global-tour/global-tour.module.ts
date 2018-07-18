import { GlobalTourComponent } from './global-tour.component';
import { NgModule , CUSTOM_ELEMENTS_SCHEMA} from '@angular/core';
import { CommonModule } from '@angular/common';

@NgModule({
  imports: [
    CommonModule
  ],
  declarations: [GlobalTourComponent],
  exports: [GlobalTourComponent]
})
export class GlobalTourModule { }
