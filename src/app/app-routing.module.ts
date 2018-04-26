import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

/** All Routes */
const appRoutes: Routes = [
    { path: 'admin-panel', loadChildren: './admin/admin.module#AdminModule' },
    { path: '', loadChildren: './user/user.module#UserModule'},
];

@NgModule({
    imports: [ RouterModule.forRoot( appRoutes, { preloadingStrategy: PreloadAllModules } ) ],
    exports: [ RouterModule ]
})
export class AppRoutingModule { }
