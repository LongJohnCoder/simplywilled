import { GlobalTourComponent } from './global-tour.component';
import { NgModule , CUSTOM_ELEMENTS_SCHEMA} from '@angular/core';
import { CommonModule } from '@angular/common';
import { Ng2PageScrollModule } from 'ng2-page-scroll';

@NgModule({
  imports: [
    CommonModule,
    Ng2PageScrollModule
  ],
  declarations: [GlobalTourComponent],
  exports: [GlobalTourComponent]
})
export class GlobalTourModule { }
