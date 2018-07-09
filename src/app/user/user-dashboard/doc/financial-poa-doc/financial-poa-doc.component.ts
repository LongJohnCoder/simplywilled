import {Component, OnDestroy, OnInit, ViewChild} from '@angular/core';
import {Subscription} from 'rxjs/Subscription';
import {UserService} from '../../../user.service';
import {ProgressbarService} from '../../shared/services/progressbar.service';
import {UserAuthService} from '../../../user-auth/user-auth.service';
import {Location} from '@angular/common';
import {GlobalPdfService} from '../services/global-pdf.service';
import { saveAs } from 'file-saver/FileSaver';

@Component({
  selector: 'app-financial-poa-doc',
  templateUrl: './financial-poa-doc.component.html',
  styleUrls: ['./financial-poa-doc.component.css']
})
export class FinancialPoaDocComponent implements OnInit, OnDestroy {

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
  count: number;
  states = {
    fl: false,
    md: false,
    mn: false,
    ny: false,
    nu: false,
    uni: false
  };

  thNail = {
    nu: 15,
    uni: 15
  };

  pdfData: any;
  globalPDFSubscription: Subscription;
  signingInstructionSubscription: Subscription;
  downloadSubscription: Subscription;
  printSubscription: Subscription;

  constructor(
    private globalPDFService: GlobalPdfService,
    private userService: UserService,
    private userAuth: UserAuthService,
    private progressbarService: ProgressbarService,
    private location: Location
  ) {
    this.loggedInUser = this.userAuth.getUser();
    this.getUserDetails();
    let token = JSON.parse(localStorage.getItem('loggedInUser')).token;
    this.globalPDFSubscription = this.globalPDFService.fetchData(token).subscribe(
      (response: any) => {
        if (response.status) {
          this.pdfData = response.data;

          if ( this.pdfData.state !== undefined && this.pdfData.state.abr !== null) {
            const st = this.pdfData.state;
            let limit = 0;
            if (st['type'] !== undefined) {

              if ( st['type'] === 'none') {
                // tslint:disable-next-line:no-shadowed-variable
                const abr = this.pdfData.state.abr;
                if (this.states[abr.toLowerCase()] !== undefined) {
                  this.states[abr.toLowerCase()] = true;
                  limit = this.thNail[abr.toLowerCase()] === undefined ? 2 : this.thNail[abr.toLowerCase()];
                  console.log('limit 1 : ', limit);
                }
              } else if (st['type'] === 'uniform') {
                this.states['uni'] = true;
                limit = this.thNail.uni === undefined ? 2 : this.thNail.uni;
                console.log('limit 2 : ', limit);
              } else if (st['type'] === 'non-uniform') {
                this.states['nu'] = true;
                limit = this.thNail.nu === undefined ? 2 : this.thNail.nu;
                console.log('limit 3 : ', limit);
              }

              const abr = st.abr;
              console.log('abr : ', abr);
              if (limit !== undefined) {
                  this.docThumbImg = [];
                  for (let key = 0 ; key < limit ; key++) {
                      if (key % 2) {
                          this.docThumbImg.push('../../../../../assets/images/doc1-thumb2.png');
                      } else {
                          this.docThumbImg.push('../../../../../assets/images/doc1-thumb1.png');
                      }
                  }
                  this.liCount = this.docThumbImg.length * 114;
              }

            }


          }

          console.log(this.pdfData);
        }
      }
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

  ngOnInit() {
    this.docScrolled = 0;
    this.thumbIndex = 0;
    this.liCount = this.docThumbImg.length * 114;
  }

  scrollDoc(index: number) {
    this.scrollHeight = 991 * index;
    this.docBox.nativeElement.scrollTop = this.scrollHeight;
    this.thumbIndex = index;
  }

  getScroll(scrollVal: number, e: any) {
    this.thumbIndex = Math.floor(scrollVal / 1011);
    const dx = e.target.offsetWidth + (this.docThumbImg.length * 7);
    const u = dx / this.docThumbImg.length;
    this.thumbContainer.nativeElement.scrollLeft = u * this.thumbIndex;
  }

  /**Get the user details*/
  getUserDetails() {
    this.getUserDetailsSubscription = this.userService.getUserDetails(this.loggedInUser.id).subscribe(
      (response: any ) => {
        // tslint:disable-next-line:max-line-length
        this.userDetails.firstname = response.data[0] !== null && response.data[0].data != null && response.data[0].data.userInfo !== null && response.data[0].data.userInfo.firstname !== null ? response.data[0].data.userInfo.firstname : '_____________';
      },
      (error: any) => {
        console.log(error);
      }, () => { this.loading = false; }
    );
  }

  /**Go to the previous page*/
  goBack() {
    this.location.back();
  }

  emailMe(e: any) {
    e.preventDefault();
    this.loading = true;
    this.getUserDetailsSubscription = this.globalPDFService.fpoaEmail().subscribe(
      (response: any ) => {
        alert('Email has been sent successfully with attached document. Please check your inbox.');
      },
      (error: any) => {
        console.log(error);
        this.loading = false;
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
  /**Downloads the pdf*/
  downloadPdf() {
    this.loading = true;
    let token = JSON.parse(localStorage.getItem('loggedInUser')).token;
    let userId = JSON.parse(localStorage.getItem('loggedInUser')).user.id;
    this.signingInstructionSubscription = this.globalPDFService.financialpoaPDF(token).subscribe(
      (response: any) => {
        if (response.status) {
          this.downloadSubscription = this.globalPDFService.downloadFile(userId, 'financialPOA.pdf').subscribe(
            value => {
              saveAs(value, 'financialPOA.pdf');
            }
          );
        }
      }, (error) => { console.log(error); this.loading = false; },
      () => { this.loading = false; }
    );
  }

  /**Downloads the pdf*/
  printPDF() {
    this.loading = true;
    let token = JSON.parse(localStorage.getItem('loggedInUser')).token;
    let userId = JSON.parse(localStorage.getItem('loggedInUser')).user.id;
    this.printSubscription = this.globalPDFService.financialpoaPDF(token).subscribe(
      (response: any) => {
        if (response.status) {
          let src = this.globalPDFService.printFile(userId, 'financialPOA.pdf');
          const win = window.open('about:blank', 'Document', 'toolbar=no,width=1000');
          if (win !== null) {
            win.document.write('<iframe src=" ' + src + '  " width="100%" height="100%"></iframe>');
            win.focus();
          }
        /*  console.log(src);
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
      }, (error) => { console.log(error); this.loading = false;},
      () => {
        this.loading = false;
      }
    );
  }

  /**When the component is destroyed*/
  ngOnDestroy() {
    if (this.getUserDetailsSubscription !== undefined) {
      this.getUserDetailsSubscription.unsubscribe();
    }
    if (this.globalPDFSubscription !== undefined) {
      this.globalPDFSubscription.unsubscribe();
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
