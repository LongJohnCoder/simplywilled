import { TuayPdfComponent } from './tuay-pdf.component';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { TuayPdfRoutingModule } from './tuay-pdf-routing.module';

@NgModule({
  imports: [
    CommonModule,
    TuayPdfRoutingModule
  ],
  declarations: [TuayPdfComponent]
})
export class TuayPdfModule { }
