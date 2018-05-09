import { Component, OnInit } from '@angular/core';
//import {CommonModule} from '@angular/common';
import { platformBrowserDynamic } from '@angular/platform-browser-dynamic';
import { FaqService } from '../services/faq.service';


@Component({
  selector: 'app-faq',
  templateUrl: './faq.component.html',
  styleUrls: ['./faq.component.css','../../../custom-inner.css']
})
export class FaqComponent implements OnInit {
  faqDetails    : any[] = [];
  errorMessage  : string;
  faqData       : any[] = [];
  counter       : number;
  // name : string;
  // faqCount: number;
  // //public modalRef: BsModalRef;
  // faqData: any[] = [];
  // delfaqId: number;
  // delfaqStatus: string;
  // delfaqStatusMsg: string = 'Are You Sure?';
constructor(
    private faqService: FaqService,
    //private modalService: BsModalService,

) { }

ngOnInit() {
  // console.log(this.faqData);
  this.getFaqCategories();
  
}

getFaqCategories() {
  this.faqService.getFaqCategories().subscribe(
      (data: any) => {
          this.faqData      = data.data;
          this.faqDetails   = this.getQuestions(this.faqData,0,null);
          console.log('faq data',this.faqData);
          console.log('faq faq details',this.faqDetails);
      },
      (error: any) => {
        console.log(error);
        for(let prop in error.error.message){
          this.errorMessage = error.error.message[prop];
          console.log(this.errorMessage);
          break;
        };
        //console.log(this.errorMessage);
        setTimeout(() => {
          this.errorMessage = '';
        },3000)
      }
  );
}

getQuestions(faqEachData : any[], cnt : number, event : Event) : any {
    if(event !== null) {
        console.log(event);
    }
    console.log('faq each data',faqEachData,faqEachData[cnt]['faq-details'],' event : ',event);
    this.counter    = cnt;
    this.faqDetails = faqEachData[cnt]['faq-details'] !== undefined ? faqEachData[cnt]['faq-details'] : [];
    return this.faqDetails;
}

showAnswers(faqDetailsData) {
    console.log(faqDetailsData);
}

hideAnswers(faqDetailsData) {
    console.log(faqDetailsData);
}

getFaqs() {
    // this.faqService.faqList().subscribe(
    //     (data: any) => {
    //         // console.log(data.data);
    //         this.faqList = data.data.faqDetails;
    //         this.faqCount = this.faqList.length;
    //     }
    // );
}

  //public openModal(template:  TemplateRef<any>, index) {
      // console.log(index);
      // this.modalRef = this.modalService.show(template);
      // this.faqData = this.faqList[index];
      // this.delfaqId = this.faqList[index].id;
  //}

  onCancel() {
      // this.modalRef.hide();
      // this.delfaqId = null;
  }

  onitemDel() {
      // this.faqService.deletefaq(this.delfaqId).subscribe(
      //     (data: any) => {
      //         this.delfaqStatus = data.status;
      //         if (this.delfaqStatus) {
      //             let itemModalRef = this;
      //             itemModalRef.delfaqStatusMsg = data.message;
      //             setTimeout(function() {
      //                 itemModalRef.modalRef.hide();
      //                 this.delfaqId = null;
      //             }, 2000);
      //             this.getFaqs();
      //         }
      //     }
      // );
  }
}
