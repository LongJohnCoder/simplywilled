import {Component, OnDestroy, OnInit, ViewChild, OnChanges, DoCheck, AfterViewChecked, ChangeDetectorRef, NgZone} from '@angular/core';
import {Subscription} from 'rxjs/Subscription';
import {UserService} from '../../../user.service';
import {ProgressbarService} from '../../shared/services/progressbar.service';
import {UserAuthService} from '../../../user-auth/user-auth.service';
import {Location} from '@angular/common';
import {GlobalPdfService} from '../services/global-pdf.service';
import { saveAs } from 'file-saver/FileSaver';
import { Router } from '@angular/router';

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
  @ViewChild('thumbFilm')
  thumbFilm: any;

  progressSubscription: Subscription;
  thumbIndex: number;
  scrollHeight: number;
  docScrolled: number;
  loading = true;
  userDetails = {
    firstname: ''
  };
  docThumbImg = [
    '../../../../../assets/images/doc1-thumb2.png',
    '../../../../../assets/images/doc1-thumb2.png',
    '../../../../../assets/images/doc1-thumb2.png',
    '../../../../../assets/images/doc1-thumb2.png',
    '../../../../../assets/images/doc1-thumb2.png',
    '../../../../../assets/images/doc1-thumb2.png',
    '../../../../../assets/images/doc1-thumb2.png',
    '../../../../../assets/images/doc1-thumb2.png',
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
  totalPagesSubscription: Subscription;
  heightArr: Array<number>;

  states = {
    fl: false,
    md: false,
    mn: false,
    ny: false,
    nu: false,
    uni: false
  };

  thNail = {};

  thKey: string;

  pdfData: any;
  globalPDFSubscription: Subscription;
  signingInstructionSubscription: Subscription;
  downloadSubscription: Subscription;
  printSubscription: Subscription;
  statesID: string;

  constructor(
    private globalPDFService: GlobalPdfService,
    private userService: UserService,
    private userAuth: UserAuthService,
    private progressbarService: ProgressbarService,
    private location: Location,
    private ref: ChangeDetectorRef,
    private zone: NgZone,
    private router: Router,
  ) {
    // ref.detach();
    // setInterval(() => {
    //   this.ref.detectChanges();
    // }, 2000);
    this.loggedInUser = this.userAuth.getUser();
    this.getUserDetails();
    const token = JSON.parse(localStorage.getItem('loggedInUser')).token;
    this.globalPDFSubscription = this.globalPDFService.fetchData(token).subscribe(
      (response: any) => {
        if (response.status) {
          this.pdfData = response.data;

          if ( this.pdfData.state !== undefined && this.pdfData.state.abr !== null) {
            this.constructThumbnails();
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

    // ref.detach();
    // setInterval(() => {
    //   this.ref.detectChanges();
    // }, 3000);
  }

  constructThumbnails() {
    const st = this.pdfData.state;
    let limit = 0;
    if (st['type'] !== undefined) {
      this.thNail[this.thKey] = this.heightArr !== undefined ? this.heightArr.length : 2;
      if ( st['type'] === 'none') {
        // tslint:disable-next-line:no-shadowed-variable
        const abr = this.pdfData.state.abr;
        this.thKey = abr.toLowerCase();
        if (this.states[this.thKey] !== undefined) {
          this.states[this.thKey] = true;
        }
      } else if (st['type'] === 'uniform') {
        this.thKey = 'uni';
        this.states[this.thKey] = true;
      } else if (st['type'] === 'non-uniform') {
        this.thKey = 'nu';
        this.states[this.thKey] = true;
      }
      limit = this.thNail[this.thKey];
      const abr = st.abr;
      console.log('limit : ', limit, 'height Arr : ', this.heightArr);
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
    console.log('life cycle financial-poa-doc --ngOnInit');
    this.docScrolled = 0;
    this.thumbIndex = 1;
    // this.liCount = this.docThumbImg.length * 114;
    this.initialize();
  }

  initialize() {
    this.totalPagesSubscription = this.globalPDFService.totalFcpoaPages.subscribe(
      (resp) => {
        // tslint:disable-next-line:max-line-length
        if (resp !== undefined && resp !== null && resp.pages !== undefined && resp.pages !== null && resp.heightArr !== undefined && resp.heightArr !== null) {
          // console.log('response from subscription', resp);
          if ( resp.pages > 0 && resp.heightArr.length > 0) {
            this.thNail[this.thKey] = resp.pages;
            setTimeout(() => {
              // tslint:disable-next-line:max-line-length
              if ( ((this.heightArr !== undefined) && (resp.heightArr[resp.pages - 1] !== this.heightArr[resp.pages - 1])) || (this.heightArr === undefined) ) {
                this.heightArr = resp.heightArr;
                this.constructThumbnails();
                this.liCount = this.docThumbImg.length * 114;
              }
            }, 1000);
          } else {
            console.log('incorrect response values gathered from rxjs/subscription', resp);
          }
        } else {
          console.log('fault in incomming response from rxjs/subscription:', resp);
        }
      }, (err) => {
        console.log('err in rxjs/subscription', err);
      }, () => {
        console.log('rxjs subscription listning over');
      }
    );
  }

  // tslint:disable-next-line:use-life-cycle-interface
  ngOnChanges() {
    console.log('life cycle financial-poa-doc --ngOnChanges');
  }

  scrollDoc(index: number, e: any) {
    console.log('index: ', index);
    const resp = this.globalPDFService.getScrollThumbEvent(index, this.heightArr, this.docBox, this.thumbFilm);
    this.docBox.nativeElement.scrollTop = resp.scrollTop;
    this.thumbContainer.nativeElement.scrollLeft = resp.scrollLeft;
    this.zone.run(() => {
      this.thumbIndex = index + 1;
    });
  }

  getScroll(scrollVal: number, e: any) {
    // tslint:disable-next-line:max-line-length
    const resp = this.globalPDFService.getScrollEvent(scrollVal, this.heightArr, this.docThumbImg, this.docBox, this.thumbFilm);
    this.thumbContainer.nativeElement.scrollLeft = resp.scrollLeft;
    this.zone.run(() => {
      this.thumbIndex = resp.thumbIndex;
    });
  }

  /**Get the user details*/
  getUserDetails() {
    this.getUserDetailsSubscription = this.userService.getUserDetails(this.loggedInUser.id).subscribe(
      (response: any ) => {
        // tslint:disable-next-line:max-line-length
        this.userDetails.firstname = response.data[0] !== null && response.data[0].data != null && response.data[0].data.userInfo !== null && response.data[0].data.userInfo.firstname !== null ? response.data[0].data.userInfo.firstname : '_____________';
        // tslint:disable-next-line:max-line-length
        this.statesID = response.data[0].data === null || response.data[0].data.userInfo.state === null || response.data[0].data.userInfo.state === undefined ? null : response.data[0].data.userInfo.state;
        console.log('state id', this.statesID);
        if (this.statesID === null || this.statesID === undefined) {
          const confirmCheck = confirm('Please select state first');
          if (confirmCheck === true) {
            this.router.navigate(['/dashboard/will']);
          } else {
            this.router.navigate(['/dashboard']);
          }
        }
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

  /**Downloads the pdf*/
  downloadPdf() {
    this.loading = true;
    const token = JSON.parse(localStorage.getItem('loggedInUser')).token;
    const userId = JSON.parse(localStorage.getItem('loggedInUser')).user.id;
    this.signingInstructionSubscription = this.globalPDFService.financialpoaPDF(token).subscribe(
      (response: any) => {
        if (response.status) {
          this.downloadSubscription = this.globalPDFService.downloadFile(userId, 'financialPOA.pdf').subscribe(
            value => {
              saveAs(value, 'financial-power-of-attorney.pdf');
            }
          );
        }
      }, (error) => { console.log(error); this.loading = false; },
      () => { this.loading = false; }
    );
  }

  /**Downloads the pdf*/
  printPDF() {
      const win =  window.open();
      this.loading = true;
    const token = JSON.parse(localStorage.getItem('loggedInUser')).token;
    const userId = JSON.parse(localStorage.getItem('loggedInUser')).user.id;
    this.printSubscription = this.globalPDFService.financialpoaPDF(token).subscribe(
      (response: any) => {
        if (response.status) {
          const src = this.globalPDFService.printFile(userId, 'financialPOA.pdf');
          // const win = window.open('about:blank', 'Document', 'toolbar=no,width=1000');
          if (win !== null) {
            // tslint:disable-next-line:max-line-length
            win.document.write('<title>Financial Power of Attorney</title><iframe src=" ' + src + '  " width="100%" height="100%"></iframe>');
            win.focus();
          }
        }
      }, (error) => {
            console.log(error);
            this.loading = false;
        },
      () => {
        this.loading = false;
      }
    );
  }

  /**When the component is destroyed*/
  ngOnDestroy() {
    // this.ref.detach();
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
    if (this.totalPagesSubscription !== undefined) {
      this.totalPagesSubscription.unsubscribe();
    }
  }
}
