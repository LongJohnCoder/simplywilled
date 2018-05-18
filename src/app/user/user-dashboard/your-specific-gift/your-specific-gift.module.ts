import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import {FormsModule, ReactiveFormsModule} from '@angular/forms';
import { YourSpecificGiftRoutingModule } from './your-specific-gift-routing.module';
import { YourSpecificGiftComponent } from './your-specific-gift.component';
import {YourSpecificGiftService} from './services/your-specific-gift.service';
import { MyGiftTextComponent } from './my-gift-text/my-gift-text.component';
import { CashGiftComponent } from './cash-gift/cash-gift.component';
import { BusinessInterestComponent } from './business-interest/business-interest.component';
import { RealPropertyComponent } from './real-property/real-property.component';
import { SpecificAssetComponent } from './specific-asset/specific-asset.component';
import {EditGiftService} from './services/edit-gift.service';

@NgModule({
  imports: [
    CommonModule,
    YourSpecificGiftRoutingModule,
    FormsModule,
    ReactiveFormsModule
  ],
  declarations: [YourSpecificGiftComponent, MyGiftTextComponent, CashGiftComponent, BusinessInterestComponent, RealPropertyComponent, SpecificAssetComponent],
  providers: [YourSpecificGiftService, EditGiftService]
})
export class YourSpecificGiftModule { }
