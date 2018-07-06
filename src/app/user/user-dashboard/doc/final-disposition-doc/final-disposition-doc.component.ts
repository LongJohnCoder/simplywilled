import {Component, OnDestroy, OnInit, ViewChild} from '@angular/core';
import {UserAuthService} from '../../../user-auth/user-auth.service';
import {Subscription} from 'rxjs/Subscription';
import {FinalDispositionPdfService} from '../services/final-disposition-pdf.service';
import {GlobalPdfService} from '../services/global-pdf.service';
import {Location} from '@angular/common';
import {ProgressbarService} from '../../shared/services/progressbar.service';
import { saveAs } from 'file-saver/FileSaver';


@Component({
  selector: 'app-final-disposition-doc',
  templateUrl: './final-disposition-doc.component.html',
  styleUrls: ['./final-disposition-doc.component.css']
})
export class FinalDispositionDocComponent implements OnInit, OnDestroy {

  @ViewChild('docBox')
  docBox: any;
  thumbIndex: number;
  scrollHeight: number;
  docScrolled: number;
  loading = true;
  userDetails = {
    backupPersonalRepresentative: null,
    filename: null,
    finalArrangements: null,
    link: null,
    personalRepresentative: null,
    state: null,
    tellUsAboutYou: null
  };
  docThumbImg: Array<any> = [
    '../../../../../assets/images/doc1-thumb1.png',
    '../../../../../assets/images/doc1-thumb2.png'
  ];
  loggedInUser: any;
  progressSubscription: Subscription;
  getUserDetailsSubscription: Subscription;
  progressBar = {
    finalArrangements: false,
    healthFinance: false,
    protectYourFinance: false,
    provideYourLovedOnes: false,
    tellUsAboutYou: false
  };
  signingInstructionSubscription: Subscription;
  downloadSubscription: Subscription;
  printSubscription: Subscription;
  count: number;

  /**Constructor call*/
  constructor(
    private finalDispositionService: FinalDispositionPdfService,
    private globalPDFService: GlobalPdfService,
    private progressbarService: ProgressbarService,
    private location: Location
  ) {
    this.getUserDetails();
  }


  /**Checks for authorization user id.*/
  parseToken() {
    if (JSON.parse(localStorage.getItem('loggedInUser')).hasOwnProperty('token')) {
      return JSON.parse(localStorage.getItem('loggedInUser')).token;
    }
    return null;
  }

  ngOnInit() {
    this.docScrolled = 0;
    this.thumbIndex = 0;
  }

  scrollDoc(index: number) {
    this.scrollHeight = 1011 * index;
    this.docBox.nativeElement.scrollTop = this.scrollHeight;
    this.thumbIndex = index;
  }

  getScroll(scrollVal: number) {
    if (scrollVal >=  1011) {
      this.thumbIndex = scrollVal !== 0 ? Math.floor(scrollVal / 1011) : 0;
    } else {
      this.thumbIndex = 0;
    }
  }

  /**Get the user details*/
  getUserDetails() {
    let token = this.parseToken();
    this.getUserDetailsSubscription = this.globalPDFService.fetchData(token).subscribe(
      (response: any ) => {
        if (response.status) {
          this.userDetails = {
            backupPersonalRepresentative: response.data.backupPersonalRepresentative,
            filename: response.data.filename,
            finalArrangements: response.data.finalArrangements,
            link: response.data.link,
            personalRepresentative: response.data.personalRepresentative,
            state: response.data.state,
            tellUsAboutYou: response.data.tellUsAboutYou
          };
          if  (this.userDetails.tellUsAboutYou.state === 'Wisconsin' || this.userDetails.tellUsAboutYou.state === 'Michigan') {
            this.docThumbImg.push('../../../../../assets/images/doc1-thumb2.png');
          }
        }

        console.log(this.userDetails);
      },
      (error: any) => {
        console.log(error);
      }, () => { this.loading = false; }
    );

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
    this.progressbarService.changeWidth({width: count !== 0 ? ((count / 5) * 100) : 0 });
    return count;
  }

  /**Downloads the pdf*/
  downloadPdf() {
    this.loading = true;
    let token = JSON.parse(localStorage.getItem('loggedInUser')).token;
    let userId = JSON.parse(localStorage.getItem('loggedInUser')).user.id;
    this.signingInstructionSubscription = this.globalPDFService.finalDisposition(token).subscribe(
      (response: any) => {
        if (response.status) {
          this.downloadSubscription = this.globalPDFService.downloadFile(userId, 'finanalDisposition.pdf').subscribe(
            value => {
              saveAs(value, 'finanalDisposition.pdf');
            }
          );
        }
      }, (error) => { console.log(error); this.loading = false; },
      () => {this.loading = false; }
    );
  }

  /**Downloads the pdf*/
  printPDF() {
    this.loading = true;
    let token = JSON.parse(localStorage.getItem('loggedInUser')).token;
    let userId = JSON.parse(localStorage.getItem('loggedInUser')).user.id;
    this.printSubscription = this.globalPDFService.finalDisposition(token).subscribe(
      (response: any) => {
        if (response.status) {
          let src = this.globalPDFService.printFile(userId, 'finanalDisposition.pdf');
          const win = window.open('about:blank', 'Document', 'toolbar=no,width=1000');
          if (win !== null) {
            win.document.write('<iframe src=" ' + src + '  " width="100%" height="100%"></iframe>');
            win.focus();
          }
        /*  let src = this.globalPDFService.printFile(userId, 'finanalDisposition.pdf');
          console.log(src);
          let newwindow = window.open('', 'blank');
          let obj = newwindow.document.createElement('iframe');
          obj.style.height = '100%';
          obj.style.width = '100%';
          //obj.style.visibility = 'hidden';
          obj.src = src;
          newwindow.document.body.appendChild(obj);
          newwindow.focus();*/
          // newwindow.print();
          /*this.downloadSubscription = this.globalPDFService.downloadFile(userId, 'finalSigningInstructions.pdf').subscribe(
            value => {
              saveAs(value, 'finalSigningInstructions.pdf');
            }
          );*/
        }
      }, (error) => { console.log(error); this.loading = false; },
      () => {
        this.loading = false;
      }
    );
  }

  goBack() {
    this.location.back();
  }

  emailMe(e: any) {
    e.preventDefault();
    console.log('came here');
    this.loading = true;
    this.getUserDetailsSubscription = this.globalPDFService.finalDispositionEmail().subscribe(
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
    if (this.progressSubscription !== undefined) {
      this.progressSubscription.unsubscribe();
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
