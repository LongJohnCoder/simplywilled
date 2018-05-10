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
              // console.log(data.data);
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
        this.modalRef = this.modalService.show(template);
        this.faqData = this.faqList[index];
        this.delfaqId = this.faqList[index].id;
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
                    setTimeout(function() {
                        itemModalRef.modalRef.hide();
                        this.delfaqId = null;
                    }, 2000);
                    this.getFaqs();
                }
            }
        );
    }
}