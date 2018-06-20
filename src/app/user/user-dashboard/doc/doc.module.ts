import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import {SigningInstructionsDocComponent} from './signing-instructions-doc/signing-instructions-doc.component';
import {DocComponent} from './doc.component';
import {LastWillAndTestamentComponent} from './last-will-and-testament/last-will-and-testament.component';
import {HealthcarePoaDocComponent} from './healthcare-poa-doc/healthcare-poa-doc.component';
import {FinancialPoaDocComponent} from './financial-poa-doc/financial-poa-doc.component';
import {DocRoutingModule} from './doc-routing.module';
import {AkComponent} from './healthcare-poa-doc/ak/ak.component';
import {AlComponent} from './healthcare-poa-doc/al/al.component';
import {ArComponent} from './healthcare-poa-doc/ar/ar.component';
import {CaComponent} from './healthcare-poa-doc/ca/ca.component';
import {CoComponent} from './healthcare-poa-doc/co/co.component';
import {FinalDispositionDocComponent} from './final-disposition-doc/final-disposition-doc.component';
import { CtComponent } from './healthcare-poa-doc/ct/ct.component';
import { DcComponent } from './healthcare-poa-doc/dc/dc.component';
import { FlComponent } from './healthcare-poa-doc/fl/fl.component';
import { InComponent } from './healthcare-poa-doc/in/in.component';
import { IaComponent } from './healthcare-poa-doc/ia/ia.component';
import { KsComponent } from './healthcare-poa-doc/ks/ks.component';
import { KyComponent } from './healthcare-poa-doc/ky/ky.component';

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
    FinancialPoaDocComponent,
    AkComponent,
    AlComponent,
    ArComponent,
    CaComponent,
    CoComponent,
    CtComponent,
    DcComponent,
    FlComponent,
    InComponent,
    IaComponent,
    KsComponent,
    KyComponent,
  ]
})
export class DocModule { }
