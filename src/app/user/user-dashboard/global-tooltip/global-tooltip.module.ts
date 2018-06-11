import { GlobalTooltipComponent } from './global-tooltip.component';
import { NgModule , CUSTOM_ELEMENTS_SCHEMA} from '@angular/core';
import { CommonModule } from '@angular/common';

@NgModule({
  imports: [
    CommonModule
  ],
  declarations: [GlobalTooltipComponent],
  exports: [GlobalTooltipComponent]
})
export class GlobalTooltipModule { }
