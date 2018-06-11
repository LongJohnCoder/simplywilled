import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {TellUsAboutYourselfComponent} from './tell-us-about-yourself/tell-us-about-yourself.component';
import {TuaYourFamilyComponent} from './tua-your-family/tua-your-family.component';
import {GaurdianForMinorChildrenComponent} from './gaurdian-for-minor-children/gaurdian-for-minor-children.component';
import {YourPetComponent} from './your-pet/your-pet.component';
import {YourPetGuardiansComponent} from './your-pet-guardians/your-pet-guardians.component';

const routes: Routes = [
    { path: '', component: TellUsAboutYourselfComponent},
    { path: '2', component: TuaYourFamilyComponent},
    { path: '3', component: GaurdianForMinorChildrenComponent},
    { path: '4', component: YourPetComponent},
    { path: '5', component: YourPetGuardiansComponent}
];




@NgModule({
    imports: [RouterModule.forChild(routes)],
    exports: [RouterModule]
})
export class UsersWillRoutingModule { }
