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
        faq_category: [],
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

    edit() {
        const createFaq = new FormData();
        createFaq.append('faqId', String(this.faqData.id));
        createFaq.append('faqQuestion', this.faqData.question);
        createFaq.append('faqAnswer', this.faqData.answer);
        createFaq.append('faqStatus', '1');
        for (let i = 0; i < this.faqData.faq_category.length; i++) {
            createFaq.append('faqCategorys[]', this.faqData.faq_category[i]);
        }
        this.faqService.faqUpdate(createFaq).subscribe(
            (response: any) => {
                if (response.status = 'true') {
                    // console.log(response.status);
                    this.createfaqMessage = response.message;
                    this.router.navigate(['/admin-panel/faqs']);
                } else {
                    this.createfaqMessage = response.message;
                }
            }
        );
    }

    add() {
        const createFaq = new FormData();
        createFaq.append('faqQuestion', this.faqData.question);
        createFaq.append('faqAnswer', this.faqData.answer);
        createFaq.append('faqStatus', '1');
        for (let i = 0; i < this.faqData.faq_category.length; i++) {
            createFaq.append('faqCategorys[]', this.faqData.faq_category[i]);
        }

        this.faqService.createFaq(createFaq).subscribe(
            (response: any) => {
                if (response.status = 'true') {
                    // console.log(response.status);
                    this.createfaqMessage = response.message;
                    this.router.navigate(['/admin-panel/faqs']);
                } else {
                    this.createfaqMessage = response.message;
                }
            }
        );
    }
}
