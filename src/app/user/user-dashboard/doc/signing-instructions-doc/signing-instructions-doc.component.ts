import {Component, OnDestroy, OnInit, ViewChild} from '@angular/core';
import * as html2canvas from "html2canvas";
//import * as jsPdf from 'jspdf';
import {UserService} from "../../../user.service";
import {Subscription} from "rxjs/Subscription";
import {UserAuthService} from "../../../user-auth/user-auth.service";
import {ProgressbarService} from "../../shared/services/progressbar.service";
import {Location} from '@angular/common';
import {GlobalPdfService} from '../services/global-pdf.service';
//import 'jspdf-autotable' as JA from 'jspdf-autotable';
import { saveAs } from 'file-saver/FileSaver';

@Component({
  selector: 'app-signing-instructions-doc',
  templateUrl: './signing-instructions-doc.component.html',
  styleUrls: ['./signing-instructions-doc.component.css']
})
export class SigningInstructionsDocComponent implements OnInit, OnDestroy {
  @ViewChild('docBox')
  docBox: any;
  @ViewChild('thumbContainer')
  thumbContainer: any;
  progressSubscription: Subscription;
  thumbIndex: number;
  scrollHeight: number;
  docScrolled: number;
  loading = true;
  userDetails = {
    firstname: ''
  };
  docThumbImg: Array<any> = [
    '../../../../../assets/images/doc1-thumb1.png',
    '../../../../../assets/images/doc1-thumb2.png'
  ];
  liCount: number;
  progressBar = {
    finalArrangements: false,
    healthFinance: false,
    protectYourFinance: false,
    provideYourLovedOnes: false,
    tellUsAboutYou: false
  };
  loggedInUser: any;
  getUserDetailsSubscription: Subscription;
  signingInstructionSubscription: Subscription;
  downloadSubscription: Subscription;
  printSubscription: Subscription;
  count: number;
  constructor(
      private globalPDFService: GlobalPdfService,
      private userService: UserService,
      private userAuth: UserAuthService,
      private progressbarService: ProgressbarService,
      private location: Location,
      private globalPdfService: GlobalPdfService
    ) {
    this.loggedInUser = this.userAuth.getUser();
    this.getUserDetails();
    let token = JSON.parse(localStorage.getItem('loggedInUser')).token;
    this.progressSubscription = this.progressbarService.fetchTotalCompletion(token).subscribe(
      (progress: any) => {
        if (progress.status !== undefined) {
          this.progressBar = {
            finalArrangements: progress.data !== null && progress.data.final_arrangements !== undefined && progress.data.final_arrangements,
            healthFinance: progress.data !== null && progress.data.health_finance !== undefined && progress.data.health_finance,
            protectYourFinance: progress.data !== null && progress.data.protect_your_finance !== undefined && progress.data.protect_your_finance,
            provideYourLovedOnes: progress.data !== null && progress.data.provide_your_loved_ones !== undefined && progress.data.provide_your_loved_ones,
            tellUsAboutYou: progress.data !== null && progress.data.tell_us_about_you !== undefined && progress.data.tell_us_about_you
          };
          this.count = this.setProgress(this.progressBar, 0);
        } else {
          console.log('Oops, something went wrong with the progress bar.');
        }
      },
      (error) => { console.log(error); },
      () => {}
    );
  }

  /**Sets the progress count**/
  setProgress(progressBar: Object, count = 0) {
    if (this.progressBar.finalArrangements) {
      count++;
    }
    if (this.progressBar.healthFinance) {
      count++;
    }
    if (this.progressBar.protectYourFinance) {
      count++;
    }
    if (this.progressBar.provideYourLovedOnes) {
      count++;
    }
    if (this.progressBar.tellUsAboutYou) {
      count++;
    }
    return count;
  }

  ngOnInit() {
    this.docScrolled = 0;
    this.thumbIndex = 0;
    this.liCount = this.docThumbImg.length * 114;
  }

  scrollDoc(index: number ) {
    this.scrollHeight = 991 * index;
    this.docBox.nativeElement.scrollTop = this.scrollHeight;
    this.thumbIndex = index;
    //this.thumbContainer.nativeElement.scrollLeft(100);
    //this.docBox.nativeElement.style.transition = 'top .8s cubic-bezier(0.77, 0, 0.175, 1)';
  }

  getScroll(scrollVal: number) {
    if (scrollVal >=  991) {
      this.thumbIndex = scrollVal !== 0 ? Math.round(scrollVal / 991) : 0;
    } else {
      this.thumbIndex = 0;
    }
    if (this.thumbIndex >= 4) {
      this.thumbContainer.nativeElement.scrollLeft = this.thumbIndex * 31;
    }

  }

  /**Get the user details*/
  getUserDetails() {
    this.getUserDetailsSubscription = this.userService.getUserDetails(this.loggedInUser.id).subscribe(
      (response: any ) => {
        this.userDetails.firstname = response.data[0] !== null && response.data[0].data != null && response.data[0].data.userInfo !== null && response.data[0].data.userInfo.firstname !== null ? response.data[0].data.userInfo.firstname : '_____________';
      },
      (error: any) => {
        console.log(error);
      }, () => { this.loading = false; }
    );
  }

  /**Downloads the pdf*/
  downloadPdf() {
    let token = JSON.parse(localStorage.getItem('loggedInUser')).token;
    let userId = JSON.parse(localStorage.getItem('loggedInUser')).user.id;
    this.signingInstructionSubscription = this.globalPDFService.signingInstructions(token).subscribe(
      (response: any) => {
        if (response.status) {
          this.downloadSubscription = this.globalPDFService.downloadFile(userId, 'finalSigningInstructions.pdf').subscribe(
            value => {
              saveAs(value, 'finalSigningInstructions.pdf');
            }
          );
        }
      }, (error) => { console.log(error); }
    );
  }

  /**Downloads the pdf*/
  printPDF() {
    let token = JSON.parse(localStorage.getItem('loggedInUser')).token;
    let userId = JSON.parse(localStorage.getItem('loggedInUser')).user.id;
    this.printSubscription = this.globalPDFService.signingInstructions(token).subscribe(
      (response: any) => {
        if (response.status) {
            let src = this.globalPDFService.printFile(userId, 'finalSigningInstructions.pdf');
            console.log(src);
            let newwindow = window.open('', 'blank');
            let obj = newwindow.document.createElement('iframe');
            obj.style.height = '100%';
            obj.style.width = '100%';
            //obj.style.visibility = 'hidden';
            obj.src = src;
            newwindow.document.body.appendChild(obj);
            newwindow.focus();
           // newwindow.print();
          /*this.downloadSubscription = this.globalPDFService.downloadFile(userId, 'finalSigningInstructions.pdf').subscribe(
            value => {
              saveAs(value, 'finalSigningInstructions.pdf');
            }
          );*/
        }
      }, (error) => { console.log(error); },
      () => {

        }
    );
  }

  /**Go back to the previous route*/
  goBack() {
    this.location.back();
  }

  emailMe(e: any) {
    e.preventDefault();
    console.log('came here');
    this.loading = true;
    this.getUserDetailsSubscription = this.globalPdfService.finalSigningsInstructionsEmail().subscribe(
      (response: any ) => {
        console.log(response.data);
        alert('email send successfully');
      },
      (error: any) => {
        console.log(error);
      }, () => { this.loading = false; }
    );
  }

  // pdfDownload() {
  //
  //   var doc = new jsPDF({
  //     orientation: 'landscape',
  //     unit: 'in',
  //     format: [4, 2]
  //   })
  //
  //   doc.text('Hello world!', 1, 1)
  //   doc.save('two-by-four.pdf')
  //
  //   html2canvas(document.body).then(canvas => {
  //     var imgData = canvas.toDataURL("image/png");
  //     this.AddImagesResource(imgData);
  //     document.body.appendChild(canvas);
  //   });
  //
  //
  //   html2canvas(document.querySelector("#capture")).then(canvas => {
  //     document.body.appendChild(canvas)
  //   });
  // }

  /**When the component is destroyed*/
  ngOnDestroy() {
    if (this.getUserDetailsSubscription !== undefined) {
      this.getUserDetailsSubscription.unsubscribe();
    }
    if (this.signingInstructionSubscription !== undefined) {
      this.signingInstructionSubscription.unsubscribe();
    }
    if (this.downloadSubscription !== undefined) {
      this.downloadSubscription.unsubscribe();
    }
    if (this.printSubscription !== undefined) {
      this.printSubscription.unsubscribe();
    }
  }

}
