import {NgModule} from "@angular/core";
import {RouterModule, Routes} from "@angular/router";
import {ChangePasswordComponent} from "./change-password.component";


const routes: Routes = [
    {path: 'not-working', component: ChangePasswordComponent},
]

@NgModule({
    imports:[
        RouterModule.forChild(routes)
    ],
    exports:[RouterModule]
})

export class ChangePasswordRoutingModule {

}