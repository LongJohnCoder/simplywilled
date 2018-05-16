import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { GiftRoutingModule } from './gift-routing.module';
import { GiftComponent } from './gift.component';
import {FormsModule, ReactiveFormsModule} from '@angular/forms';
import {GiftService} from './services/gift.service';

@NgModule({
  imports: [
    CommonModule,
    GiftRoutingModule,
    FormsModule,
    ReactiveFormsModule
  ],
  declarations: [GiftComponent],
  providers: [GiftService]
})
export class GiftModule { }
