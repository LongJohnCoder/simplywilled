import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-payment',
  templateUrl: './payment.component.html',
  styleUrls: ['./payment.component.css']
})
export class PaymentComponent implements OnInit {

  cardtype:string = "";

  constructor() { }

  ngOnInit() {
  }

  GetCardType(number){
    // visa
    if (number.value.match(new RegExp("^4")) != null){
      this.cardtype = "visa";
      if (number.value.match(new RegExp("^(4026|417500|4508|4844|491(3|7))")) != null) {
        // Visa Electron
        this.cardtype = "visa2";
      } 
    }
    else if (number.value.match(new RegExp("^5[1-5]")) != null) {
    // Mastercard 
      this.cardtype = "master";
     }  
     else if (number.value.match(new RegExp("^3[47]")) != null){
    // AMEX
      this.cardtype = "amex";
    }
    else if (number.value.match(new RegExp("^(6011|622(12[6-9]|1[3-9][0-9]|[2-8][0-9]{2}|9[0-1][0-9]|92[0-5]|64[4-9])|65)")) != null){
    // Discover
      this.cardtype = "discover";
    }
    else if (number.value.match(new RegExp("^36")) != null){
    // Diners
      this.cardtype = "diners";
    }
    else if (number.value.match(new RegExp("^30[0-5]")) != null){   
    // Diners - Carte Blanche
      this.cardtype = "diners2";
    }
    else if (number.value.match(new RegExp("^35(2[89]|[3-8][0-9])")) != null){
    // JCB
      this.cardtype = "jcb";
    }  
    else{
      if(number.value != ""){
        this.cardtype = "unknown";
      }else{
        this.cardtype = "null";
      }
    }
  }

}
