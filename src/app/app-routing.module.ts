import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';
//import { NotFoundComponent } from './user/not-found/not-found.component';
//import { FullLayoutComponent } from './user/layout/full-layout/full-layout.component';


/** All Routes */
const appRoutes: Routes = [
    { path: 'admin-panel', loadChildren: './admin/admin.module#AdminModule' },
    { path: '', loadChildren: './user/user.module#UserModule'},
//    { path: '**', component: FullLayoutComponent}
];

@NgModule({
    imports: [ RouterModule.forRoot( appRoutes, { preloadingStrategy: PreloadAllModules, useHash: false } ) ],
    exports: [ RouterModule ]
})
export class AppRoutingModule { }
