import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {TellUsAboutYourselfComponent} from './tell-us-about-yourself/tell-us-about-yourself.component';
import {TuaYourFamilyComponent} from './tua-your-family/tua-your-family.component';
import {GaurdianForMinorChildrenComponent} from './gaurdian-for-minor-children/gaurdian-for-minor-children.component';



const routes: Routes = [
    { path: '', component: TellUsAboutYourselfComponent},
    { path: '2', component: TuaYourFamilyComponent},
    { path: '3', component: GaurdianForMinorChildrenComponent}
];




@NgModule({
    imports: [RouterModule.forChild(routes)],
    exports: [RouterModule]
})
export class UsersWillRoutingModule { }

