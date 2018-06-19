import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import {FinalDispositionDocComponent} from "./final-disposition-doc/final-disposition-doc.component";
import {SigningInstructionsDocComponent} from "./signing-instructions-doc/signing-instructions-doc.component";
import {DocComponent} from "./doc.component";
import {LastWillAndTestamentComponent} from "./last-will-and-testament/last-will-and-testament.component";
import {HealthcarePoaDocComponent} from "./healthcare-poa-doc/healthcare-poa-doc.component";
import {FinancialPoaDocComponent} from "./financial-poa-doc/financial-poa-doc.component";
import {DocRoutingModule} from "./doc-routing.module";

@NgModule({
  imports: [
    CommonModule,
    DocRoutingModule
  ],
  declarations: [
    SigningInstructionsDocComponent,
    FinalDispositionDocComponent,
    DocComponent,
    LastWillAndTestamentComponent,
    HealthcarePoaDocComponent,
    FinancialPoaDocComponent
  ]
})
export class DocModule { }
