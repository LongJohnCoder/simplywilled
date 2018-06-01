import {Component, Input, OnInit} from '@angular/core';

@Component({
  selector: 'app-my-gift-text',
  templateUrl: './my-gift-text.component.html',
  styleUrls: ['./my-gift-text.component.css']
})
export class MyGiftTextComponent implements OnInit {
  /**Variable declaration*/
  @Input() dataSet: any;
  statement = '';
  /**Constructor call*/
  constructor() { }

  /**When the component is initialised*/
  ngOnInit() {
    this.parseStatement();
  }

  /**parse statement*/
  parseStatement() {
    console.log(this.dataSet);
    if (this.dataSet !== null) {
      switch (this.dataSet.type) {
        case '1': let cashDescription = JSON.parse(this.dataSet.cash_description)[0];
                  this.statement = cashDescription.statement !== null && cashDescription.statement !== undefined ? cashDescription.statement : '';
                  break;
        case '2': let propertyDetails = JSON.parse(this.dataSet.property_details)[0];
                  this.statement = propertyDetails.statement !== null && propertyDetails.statement !== undefined ? propertyDetails.statement : '';
                  break;
        case '3': let businessDetails = JSON.parse(this.dataSet.business_details)[0];
                  this.statement = businessDetails.statement !== null && businessDetails.statement !== undefined ? businessDetails.statement : '';
                  break;
        case '4': let assetDetails = JSON.parse(this.dataSet.asset_details)[0];
                  this.statement = assetDetails.statement !== null && assetDetails.statement !== undefined ? assetDetails.statement : '';
                  break;
      }
    }
  }
}
