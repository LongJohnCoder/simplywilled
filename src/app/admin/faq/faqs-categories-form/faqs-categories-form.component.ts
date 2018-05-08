import { Component, OnInit } from '@angular/core';
import {FaqService} from '../faq.service';
import {ActivatedRoute, Router} from '@angular/router';

@Component({
  selector: 'app-faqs-categories-form',
  templateUrl: './faqs-categories-form.component.html',
  styleUrls: ['./faqs-categories-form.component.css']
})
export class FaqsCategoriesFormComponent implements OnInit {
    createFAQCategoryMessage: string;
    editMode: boolean = false;

    faqCategoryData = {
        id: 0,
        name: '',
    };
  constructor(
      private faqService: FaqService,
      private router: Router,
      private route: ActivatedRoute
  ) { }

  ngOnInit() {
      const id = +this.route.snapshot.paramMap.get('id');
      if (id !== 0) {
          this.editMode = true;
          this.getCategory();
      }
  }

    getCategory() {
        const id = +this.route.snapshot.paramMap.get('id');
        this.faqService.getCategory(id).subscribe(
            (data: any) => {
                // console.log(data.data);
                this.faqCategoryData.id = data.data.faqCategoryDetails.id;
                this.faqCategoryData.name = data.data.faqCategoryDetails.name;
            }
        );
    }

    add() {
        const createFAQCategoryBody = {
            faqCategoryName : this.faqCategoryData.name,
        }
        this.faqService.createBlogCategory(createFAQCategoryBody).subscribe(
            (response: any) => {
                if (response.status = 'true') {
                    this.createFAQCategoryMessage = response.message;
                    this.router.navigate(['admin-panel/faqs-category']);
                } else {
                    this.createFAQCategoryMessage = response.message;
                }
            }
        );
    }

    edit() {
        const updateFAQCategoryBody = {
            faqCategoryName : this.faqCategoryData.name,
            faqCategoryId : this.faqCategoryData.id,

        }
        this.faqService.updateFAQCategory(updateFAQCategoryBody).subscribe(
            (response: any) => {
                if (response.status = 'true') {
                    this.createFAQCategoryMessage = response.message;
                    this.router.navigate(['admin-panel/faqs-category']);
                } else {
                    this.createFAQCategoryMessage = response.message;
                }
            }
        );
    }
}
