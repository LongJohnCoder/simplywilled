import {ChangeDetectorRef, Component, OnInit, TemplateRef} from '@angular/core';
import {FaqService} from '../faq.service';
import { BsModalRef, BsModalService } from 'ngx-bootstrap/modal';
import * as $ from 'jquery';
import 'datatables.net';
import 'datatables.net-bs4';

@Component({
  selector: 'app-faqs-categories',
  templateUrl: './faqs-categories.component.html',
  styleUrls: ['./faqs-categories.component.css']
})
export class FaqsCategoriesComponent implements OnInit {

    faqCategories: any[] = [];
    faqCategoriesCount: number;
    faqCategoryData: any[] = [];
    delfaqCategoryId: number;
    delFAQStatusMsg: string = "Are You Sure?";
    delFAQStatus: string;
    dataTable: any;



    public modalRef: BsModalRef;

    constructor(
      private faqService: FaqService,
      private modalService: BsModalService,
      private chRef: ChangeDetectorRef

    ) { }

  ngOnInit() {
      this.getFaqCategories();
  }

  getFaqCategories() {
    this.faqService.getFaqCategories().subscribe(
        (data: any) => {
            // console.log(data.data);
            this.faqCategories = data.data.faqCategoryDetails;
            this.faqCategoriesCount = this.faqCategories.length;
            this.chRef.detectChanges();
            const table: any = $('table');
            this.dataTable = table.DataTable();
        }
    );
  }

    public openModal(template:  TemplateRef<any>, index) {
        this.modalRef = this.modalService.show(template);
        this.faqCategoryData = this.faqCategories[index];
        this.delfaqCategoryId = this.faqCategories[index].id;
    }

    onCancel() {
        this.modalRef.hide();
        this.delfaqCategoryId = null;
    }

    onFAQDel() {
        this.faqService.deleteFaqCat(this.delfaqCategoryId).subscribe(
            (data: any) => {
                this.delFAQStatus = data.status;
                if (this.delFAQStatus) {
                    let faqModalRef = this;
                    faqModalRef.delFAQStatusMsg = data.message;
                    setTimeout(function(){
                        faqModalRef.modalRef.hide();
                        this.delBlogId = null;
                    }, 2000);
                    this.getFaqCategories();
                }
            }
        );
    }
}