import { Component, OnInit } from '@angular/core';
import {ProtectYourFinancesService} from './protect-your-finances.service';
import { platformBrowserDynamic } from '@angular/platform-browser-dynamic';
import { Router,ActivatedRoute } from '@angular/router';
import { HttpErrorResponse } from '@angular/common/http';
import { NgForm } from '@angular/forms';

@Component({
  selector: 'app-protect-your-finances',
  templateUrl: './protect-your-finances.component.html',
  styleUrls: ['./protect-your-finances.component.css']
})
export class ProtectYourFinancesComponent implements OnInit {

  constructor(
    private protectYourFinancesService : ProtectYourFinancesService,
  ) { }
  
  //declaring local variables
  errorMessage : string = '';
  stateInfo : string;
  ngOnInit() {
    console.log('came here **********');
    this.getStates();
    console.log('came here');
  }

  /* *
    *   Get data object from api
    *   slice that in 2 parts : categories as faqData , q & a from categories as faqDetails
    * */
  getStates() {
    this.protectYourFinancesService.getStates().subscribe(
        (data: any) => {
            this.stateInfo = data.stateInfo.type;
            console.log(this.stateInfo);
        }, (error : any) => {
            console.log(error);
            setTimeout(() => {
              this.errorMessage = '';
          },3000);
        }
    );
  }
}
