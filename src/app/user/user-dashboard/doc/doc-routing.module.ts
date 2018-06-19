import {NgModule} from '@angular/core';
import {RouterModule, Routes} from '@angular/router';
import {SigningInstructionsDocComponent} from "./signing-instructions-doc/signing-instructions-doc.component";
import {LastWillAndTestamentComponent} from "./last-will-and-testament/last-will-and-testament.component";
import {FinancialPoaDocComponent} from "./financial-poa-doc/financial-poa-doc.component";
import {HealthcarePoaDocComponent} from "./healthcare-poa-doc/healthcare-poa-doc.component";
import {FinalDispositionDocComponent} from "./final-disposition-doc/final-disposition-doc.component";

const routes: Routes = [
  //{path: '', redirectTo: 'dashboard'},
  {path: 'signing-instruction', component: SigningInstructionsDocComponent},
  {path: 'last-will-and-testament', component: LastWillAndTestamentComponent},
  {path: 'financial-poa', component: FinancialPoaDocComponent},
  {path: 'healthcare-poa', component: HealthcarePoaDocComponent},
  {path: 'final-disposition', component: FinalDispositionDocComponent}
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class  DocRoutingModule { }
