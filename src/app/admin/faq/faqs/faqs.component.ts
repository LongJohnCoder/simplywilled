import {ChangeDetectorRef, Component, OnInit, TemplateRef} from '@angular/core';
import {BsModalRef, BsModalService} from 'ngx-bootstrap/modal';
import {FaqService} from '../faq.service';
import * as $ from 'jquery';
import 'datatables.net';
import 'datatables.net-bs4';

@Component({
  selector: 'app-faqs',
  templateUrl: './faqs.component.html',
  styleUrls: ['./faqs.component.css']
})
export class FaqsComponent implements OnInit {
    faqList: any[] = [];
    faqCount: number;
    public modalRef: BsModalRef;
    faqData: any[] = [];
    delfaqId: number;
    delfaqStatus: string;
    delfaqStatusMsg: string = 'Are You Sure?';
    dataTable: any;
    categories: any[] = [];
  constructor(
      private faqService: FaqService,
      private modalService: BsModalService,
      private chRef: ChangeDetectorRef

  ) { }

  ngOnInit() {
      this.getFaqs();
  }

  getFaqs() {
      this.faqService.faqList().subscribe(
          (data: any) => {
              console.log(data.data);
              this.faqList = data.data.faqDetails;
              this.faqCount = this.faqList.length;
              this.chRef.detectChanges();
              const table: any = $('table');
              this.dataTable = table.DataTable();
          }
      );
  }

    public openModal(template:  TemplateRef<any>, index) {
        // console.log(index);
        this.categories = [];
        this.modalRef = this.modalService.show(template);
        this.faqData = this.faqList[index];
        this.delfaqId = this.faqList[index].id;
        for (let i = 0; i < this.faqList[index].faq_category.length ; i++) {
            this.categories.push(this.faqList[index].faq_category[i].get_faq_category.name);
        }
    }

    onCancel() {
        this.modalRef.hide();
        this.delfaqId = null;
    }

    onitemDel() {
        this.faqService.deletefaq(this.delfaqId).subscribe(
            (data: any) => {
                this.delfaqStatus = data.status;
                if (this.delfaqStatus) {
                    let itemModalRef = this;
                    itemModalRef.delfaqStatusMsg = data.message;
                    setTimeout(() => {
                        itemModalRef.modalRef.hide();
                        setTimeout(() => {
                            // this.delfaqStatus = false;
                            // this.delfaqStatusMsg = 'Are You Sure?';
                            // this.delfaqId = null;
                        }, 500);
                    }, 2000);
                    window.location.reload();
                    // this.getFaqs();
                }
            }
        );
    }
}

