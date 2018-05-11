import { Component, OnInit } from '@angular/core';
import { platformBrowserDynamic } from '@angular/platform-browser-dynamic';
import { FaqService } from './faq.service';
import { Router,ActivatedRoute } from '@angular/router';
import { HttpErrorResponse } from '@angular/common/http';
import { NgForm } from '@angular/forms';

@Component({
  selector      : 'app-faq',
  templateUrl   : './faq.component.html',
  styleUrls     : ['./faq.component.css','../../../custom-inner.css']
})
export class FaqComponent implements OnInit {
    faqDetails    : any[] = [];
    errorMessage  : string;
    faqData       : any[] = [];
    counter       : number; // a common counter used to index the categories
    innerCounter  : number; // a common counter used to index the faq data per categories
    searchFaq     : string = '';

    constructor(
        private faqService: FaqService,
        private router: Router,
        private _route: ActivatedRoute,
    ) { }

    ngOnInit() {
        this.getFaqCategories();
    }

    /* *
    *   Get data object from api
    *   slice that in 2 parts : categories as faqData , q & a from categories as faqDetails
    * */
    getFaqCategories() {

        this.faqService.getFaqCategories().subscribe(
            (data: any) => {
                this.faqData      = data.data;
                this.faqDetails   = this.getQuestions(this.faqData,0);
                console.log('faq data',this.faqData);
            }
        );
    }

    onSubmit( formFaqQa: NgForm ) {
        console.log('submiting form ',formFaqQa.value.search);
        this.faqService.getFaqCategories( formFaqQa.value.search )
        .subscribe(
          ( response: any ) => {
            if(response.status){
            
                this.faqData      = response.data;
                this.faqDetails   = this.getQuestions(this.faqData,0);
            } else {
              console.log('error : some err');
            }
          },
          ( error: HttpErrorResponse ) => {
            // this.loginRequestStatus = false;
            // this.loginRequestResponseMsg = error.error.error;
            // this.showLoader = false;
            // this.responseReceived = true;
            setTimeout( () => {
              //this.responseReceived = false;
            }, 5000);
          },
          () => {
            formFaqQa.reset();
          }
        );
      }

    /* *
    *   Get questions from the data object
    * */
    getQuestions(faqEachData : any[], count : number) : any {
        this.counter        = count;
        this.innerCounter   = null;
        this.faqDetails     = faqEachData[count]['faq'] !== undefined ? faqEachData[count]['faq'] : [];
        return this.faqDetails;
    }

    /* *
    *   Hide or show the answer for a question from a single
    *   question based on their related states
    * */
    showOrHideAnswers(faqDetailsData : any, index : number) {
        this.innerCounter = this.innerCounter == index ? null : index;
    }
}
