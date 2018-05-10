import { Component, OnInit } from '@angular/core';
import { platformBrowserDynamic } from '@angular/platform-browser-dynamic';
import { FaqService } from './faq.service';


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
    constructor(
        private faqService: FaqService,
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
            },
            (error: any) => {
                console.log(error);
                for(let prop in error.error.message){
                    this.errorMessage = error.error.message[prop];
                    console.log(this.errorMessage);
                    break;
                };
                setTimeout(() => {
                    this.errorMessage = '';
                },3000)
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
