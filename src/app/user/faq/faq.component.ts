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
    faqDetails    : any[] = []; //holds faq questions and answers for single categories
    errorMessage  : string;
    faqData       : any[] = []; //holds faq metadata
    counter       : number; // a common counter used to index the categories
    innerCounter  : number; // a common counter used to index the faq data per categories
    searchFaqQstn : string = '';

    constructor(
        private faqService: FaqService,
        private router: Router,
        private _route: ActivatedRoute,
    ) { }

    ngOnInit() {
        this.searchFaqQstn = this._route.snapshot.queryParamMap['params'].query;
        console.log(this.searchFaqQstn);
        this.getFaqCategories();
    }

    /* *
    *   Get data object from api
    *   slice that in 2 parts : categories as faqData , q & a from categories as faqDetails
    * */
    getFaqCategories() {
        this._route.params.subscribe( params => {
            console.log('params',params);
          });
        this.faqService.getFaqCategories(this.searchFaqQstn).subscribe(
            (data: any) => {
                this.faqData      = data.data;
                this.faqDetails   = this.getQuestions(this.faqData,0);
                console.log('faq data',this.faqData);
            }
        );
    }

    //we have all the necessary question sfrom 1 api
    //so we can loop over the questions in angular
    onSubmit( formFaqQa: NgForm ) {
        console.log('submiting form ',formFaqQa.value.search);
        this.searchFaqQstn = formFaqQa.value.search.split(' ').join('+');
        this.router.navigate(['/faq'], {
            queryParams: {
              query : this.searchFaqQstn
            }
        });
        this.faqService.getFaqCategories( this.searchFaqQstn )
        .subscribe(
            ( response: any ) => {
                if(response.status){
                    this.faqData        = response.data;
                    this.faqDetails     = this.getQuestions(this.faqData,0);
                    this.takeMeThere();
                } else {
                    console.log('error : some err');
                }
            },
            ( error: HttpErrorResponse ) => {
                console.log(error);
                setTimeout( () => {
                    //this.responseReceived = false;
                }, 5000);
            },
            () => {
            //formFaqQa.reset();
            }
        );
    }

    /**
     * This function navigates to the question asked from the data
     * Once the question is reached the div opens and shows up the answer
     */
    takeMeThere() {
        for(let i in this.faqDetails) {
            if(this.faqDetails[i].question.toLowerCase().trim() === this.searchFaqQstn.toLowerCase().trim()) {
                this.innerCounter =  parseInt(i);
                break;
            }
        }
    }

    /* *
    *   Get questions from the data object
    * */
    getQuestions(faqEachData : any[], count : number) : any {
        this.counter        = count;
        this.innerCounter   = null;
        this.faqDetails     = faqEachData[count] !== undefined && faqEachData[count]['faq'] !== undefined ? faqEachData[count]['faq'] : [];
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
