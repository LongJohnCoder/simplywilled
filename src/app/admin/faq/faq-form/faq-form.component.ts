import { Component, OnInit } from '@angular/core';
import {FaqService} from '../faq.service';
import {ActivatedRoute, Router} from '@angular/router';

@Component({
  selector: 'app-faq-form',
  templateUrl: './faq-form.component.html',
  styleUrls: ['./faq-form.component.css']
})
export class FaqFormComponent implements OnInit {
    categoryData: any[] = [];
    categoryIdCollection: any[] = [];
    createfaqMessage: string;
    editMode: boolean = false;
    categories = [];
    faqData = {
        id: 0,
        question: '',
        answer: '',
        status: '',
        faq_category: '',
    };
  constructor(
      private faqService: FaqService,
      private router: Router,
      private route: ActivatedRoute
  ) { }

  ngOnInit() {
      this.getCategoryData();
      const id = +this.route.snapshot.paramMap.get('id');
      if (id !== 0) {
          this.editMode = true;
          this.getFaq();
      }
  }

    getCategoryData() {
        this.faqService.getFaqCategories().subscribe(
            (data: any) => {
                // console.log(data.data);
                this.categoryData = data.data.faqCategoryDetails;
            }
        );
    }

    getFaq() {
        const id = +this.route.snapshot.paramMap.get('id');
        this.faqService.faqDetails(id).subscribe(
            (data: any) => {
                this.faqData.id = data.data.faqDetails.id;
                this.faqData.question = data.data.faqDetails.question;
                this.faqData.answer = data.data.faqDetails.answer;
                this.faqData.status = data.data.faqDetails.status;
                this.faqData.faq_category = data.data.faqDetails.faq_category;
            }
        );
    }
}
