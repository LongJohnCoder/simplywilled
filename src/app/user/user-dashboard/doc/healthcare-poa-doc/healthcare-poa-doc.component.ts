import { saveAs } from 'file-saver/FileSaver';
import { Router } from '@angular/router';
import {Component, OnDestroy, OnInit, ViewChild} from '@angular/core';
import {GlobalPdfService} from '../services/global-pdf.service';
import {Subscription} from 'rxjs/Subscription';
import {UserService} from '../../../user.service';
import {ProgressbarService} from '../../shared/services/progressbar.service';
import {UserAuthService} from '../../../user-auth/user-auth.service';
import {Location} from '@angular/common';

@Component({
  selector: 'app-healthcare-poa-doc',
  templateUrl: './healthcare-poa-doc.component.html',
  styleUrls: ['./healthcare-poa-doc.component.css']
})
export class HealthcarePoaDocComponent implements OnInit, OnDestroy {

  /**Variable declartion*/
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
  signingInstructionSubscription: Subscription;
  downloadSubscription: Subscription;
  printSubscription: Subscription;

  totalY: number;
  totalX: number;

  states = {
    ak: false,
    al: false,
    ar: false,
    ca: false,
    co: false,
    ct: false,
    dc: false,
    fl: false,
    ia: false,
    in: false,
    ks: false,
    ky: false,
    la: false,
    me: false,
    hi: false,
    id: false,
    il: false,
    tn: false,
    wy: false,
    wv: false,
    wi: false,
    wa: false,
    vt: false,
    va: false,
    ut: false,
    tx: false,
    md: false,
    ma: false,
    mi: false,
    mn: false,
    nm: false,
    nj: false,
    nh: false,
    ny: false,
    nc: false,
    nd: false,
    oh: false,
    ok: false,
    or: false,
    pa: false,
    ri: false,
    sc: false,
    sd: false,
    nv: false,
    ne: false,
    ms: false,
    mo: false,
    mt: false,
    ga: false,
    az: false,
    de: false
  };

  thNail = {
    or: 9,
    mo: 6,
    nc: 14,
    sd: 7,
    az: 19,
    in: 6,
    ks: 6,
    ma: 8,
    dc: 6,
    wy: 7,
    wi: 10,
    wv: 5,
    wa: 7,
    va: 7,
    vt: 8
  };

  pdfData: any;
  globalPDFSubscription: Subscription;

  /**Constructor call*/
  constructor(
    private globalPDFService: GlobalPdfService,
    private userService: UserService,
    private userAuth: UserAuthService,
    private progressbarService: ProgressbarService,
    private location: Location,
    private router: Router
  ) {
    this.loggedInUser = this.userAuth.getUser();
    this.getUserDetails();
    let token = this.parseToken();
    this.globalPDFSubscription = this.globalPDFService.fetchData(token).subscribe(
      (response: any) => {
        if (response.status) {
          this.pdfData = response.data;

          if ( this.pdfData.state !== undefined && this.pdfData.state !== null && this.pdfData.state.abr !== null) {
            const abr = this.pdfData.state.abr;
            if (this.states[abr.toLowerCase()] !== undefined) {
              this.states[abr.toLowerCase()] = true;
              if (this.thNail[abr.toLowerCase()] !== undefined) {
                this.docThumbImg = [];
                for (let key = 0 ; key < this.thNail[abr.toLowerCase()] ; key++) {
                  if (key % 2) {
                    this.docThumbImg.push('../../../../../assets/images/doc1-thumb2.png');
                  } else {
                    this.docThumbImg.push('../../../../../assets/images/doc1-thumb1.png');
                  }
                }
                this.liCount = this.docThumbImg.length * 114;
                this.totalY = this.docThumbImg.length * 1011;
                this.totalX = this.docThumbImg.length * 793;
              }
            }
          } else {
            console.log('state is here');
            this.router.navigate(['/dashboard/documents/final-disposition']);
          }
        }
      }
    );
    this.progressSubscription = this.progressbarService.fetchTotalCompletion(token).subscribe(
      (progress: any) => {
        if (progress.status !== undefined) {
          this.progressBar = {
            finalArrangements: progress.data !== null && progress.data.final_arrangements !== undefined && progress.data.final_arrangements,
            healthFinance: progress.data !== null && progress.data.health_finance !== undefined && progress.data.health_finance,
            // tslint:disable-next-line:max-line-length
            protectYourFinance: progress.data !== null && progress.data.protect_your_finance !== undefined && progress.data.protect_your_finance,
            // tslint:disable-next-line:max-line-length
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
  /**When the component initialises*/
  ngOnInit() {
    // this.states = {
    //   ak: false,
    //   al: false,
    //   ar: false,
    //   ca: false,
    //   co: false,
    //   ct: false,
    //   dc: false,
    //   fl: false,
    //   ia: false,
    //   in: false,
    //   ks: false,
    //   ky: false,
    //   la: false,
    //   me: false,
    //   hi: false,
    //   id: false,
    //   il: false,
    //   tn: false,
    //   wy: false,
    //   wv: false,
    //   wi: false,
    //   wa: false,
    //   vt: false,
    //   va: false,
    //   ut: false,
    //   tx: false,
    //   md: false,
    //   ma: false,
    //   mi: false,
    //   mn: false,
    //   nm: false,
    //   nj: true,
    //   nh: false,
    //   ny: false,
    //   nc: false,
    //   nd: false,
    //   oh: false,
    //   ok: false,
    //   or: false,
    //   pa: false,
    //   ri: false,
    //   sc: false,
    //   sd: false,
    //   nv: false,
    //   ne: false,
    //   ms: false,
    //   mo: false,
    //   mt: false,
    //   ga: false,
    //   az: false,
    //   de: false
    // };
    this.docScrolled = 0;
    this.thumbIndex = 0;
    this.liCount = this.docThumbImg.length * 114;
  }

  /**Checks for authorization user id.*/
  parseToken() {
    if (JSON.parse(localStorage.getItem('loggedInUser')).hasOwnProperty('token')) {
      return JSON.parse(localStorage.getItem('loggedInUser')).token;
    }
    return null;
  }

  /**When the component is destroyed*/
  ngOnDestroy() {
    /*if (this.globalPDFSubscription !== undefined) {
      this.globalPDFSubscription.unsubscribe();
    }*/
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

  scrollDoc(index: number, e: any) {
    console.log(e);
    this.scrollHeight = 1011 * index;
    this.docBox.nativeElement.scrollTop = this.scrollHeight;
    this.thumbIndex = index;
    // this.thumbContainer.nativeElement.scrollLeft(100);
    // this.docBox.nativeElement.style.transition = 'top .8s cubic-bezier(0.77, 0, 0.175, 1)';
  }

  getScroll(scrollVal: number, e: any) {
    this.thumbIndex = Math.floor(scrollVal / 1011);
    const dx = e.target.offsetWidth + (this.docThumbImg.length * 7);
    const u = dx / this.docThumbImg.length;
    this.thumbContainer.nativeElement.scrollLeft = u * this.thumbIndex;
  }

  getThumbScroll(c: any) {
    // console.log('thumb scroll', c);
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
    console.log('came here');
    this.loading = true;
    this.getUserDetailsSubscription = this.globalPDFService.hcpoaEmail().subscribe(
      (response: any ) => {
        console.log(response.data);
        alert('Email has been sent successfully with attached document. Please check your inbox');
      },
      (error: any) => {
        console.log(error);
        this.loading = false;
      }, () => { this.loading = false; }
    );
  }

  /**Downloads the pdf*/
  downloadPdf() {
    this.loading = true;
    let token = JSON.parse(localStorage.getItem('loggedInUser')).token;
    let userId = JSON.parse(localStorage.getItem('loggedInUser')).user.id;
    this.loading = true;
    this.signingInstructionSubscription = this.globalPDFService.healthcarepoa(token).subscribe(
      (response: any) => {
        if (response.status) {
          this.downloadSubscription = this.globalPDFService.downloadFile(userId, 'healthCarePOA.pdf').subscribe(
            value => {
              saveAs(value, 'healthCarePOA.pdf');
            }, (err) => {this.loading = false; },
            () => { this.loading = false; }
          );
        }
      }, (error) => { console.log(error); this.loading = false;},
      () => { this.loading = false; }
    );
  }

  /**Downloads the pdf*/
  printPDF() {
    this.loading = true;
    let token = JSON.parse(localStorage.getItem('loggedInUser')).token;
    let userId = JSON.parse(localStorage.getItem('loggedInUser')).user.id;
    this.printSubscription = this.globalPDFService.healthcarepoa(token).subscribe(
      (response: any) => {
        if (response.status) {

          let src = this.globalPDFService.printFile(userId, 'healthCarePOA.pdf');
          const win = window.open('about:blank', 'Document', 'toolbar=no,width=1000');
          if (win !== null) {
            win.document.write('<iframe src=" ' + src + '  " width="100%" height="100%"></iframe>');
            win.focus();
          }
        }
      }, (error) => { console.log(error); this.loading = false; },
      () => {
        this.loading = false;
      }
    );
  }

}
