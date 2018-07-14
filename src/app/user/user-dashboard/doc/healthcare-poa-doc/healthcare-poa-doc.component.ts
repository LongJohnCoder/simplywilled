import { saveAs } from 'file-saver/FileSaver';
import { Router } from '@angular/router';
// tslint:disable-next-line:max-line-length
import { Component, OnDestroy, OnInit, ViewChild, DoCheck, AfterContentInit, AfterContentChecked, AfterViewInit, AfterViewChecked } from '@angular/core';
import { GlobalPdfService } from '../services/global-pdf.service';
import { Subscription } from 'rxjs/Subscription';
import { UserService } from '../../../user.service';
import { ProgressbarService } from '../../shared/services/progressbar.service';
import { UserAuthService } from '../../../user-auth/user-auth.service';
import { Location } from '@angular/common';

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
  signingInstructionSubscription: Subscription;
  downloadSubscription: Subscription;
  printSubscription: Subscription;

  totalY: number;
  totalX: number;
  totalPagesSubscription: Subscription;
  heightArr: Array<number>;

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

  thKey: string;
  thNail = {
    ak: 4,
    al: 4,
    ar: 4,
    ca: 4,
    co: 4,
    ct: 4,
    dc: 4,
    fl: 4,
    ia: 4,
    in: 4,
    ks: 4,
    ky: 4,
    la: 4,
    me: 4,
    hi: 4,
    id: 4,
    il: 4,
    tn: 4,
    wy: 4,
    wv: 4,
    wi: 4,
    wa: 4,
    vt: 4,
    va: 4,
    ut: 4,
    tx: 4,
    md: 4,
    ma: 4,
    mi: 4,
    mn: 4,
    nm: 4,
    nj: 4,
    nh: 4,
    ny: 4,
    nc: 4,
    nd: 4,
    oh: 4,
    ok: 4,
    or: 4,
    pa: 4,
    ri: 4,
    sc: 4,
    sd: 4,
    nv: 4,
    ne: 4,
    ms: 4,
    mo: 4,
    mt: 4,
    ga: 4,
    az: 4,
    de: 4
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
    const token = this.parseToken();
    this.globalPDFSubscription = this.globalPDFService.fetchData(token).subscribe(
      (response: any) => {
        if (response.status) {
          this.pdfData = response.data;
          if ( this.pdfData.state !== undefined && this.pdfData.state.abr !== null) {
            this.constructThumbnails();
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
    console.log('called - ngOnInit - hcpoa');
    this.docScrolled = 0;
    this.thumbIndex = 1;
    // this.liCount = this.docThumbImg.length * 114;
  }

  // tslint:disable-next-line:use-life-cycle-interface
  ngDoCheck() {
    console.log('called - ngDoCheck - hcpoa');
    // this.initialize();
  }

  // tslint:disable-next-line:use-life-cycle-interface
  ngAfterContentInit() {
    console.log('called - ngAfterContentInit - hcpoa');
  }

  // tslint:disable-next-line:use-life-cycle-interface
  ngAfterContentChecked() {
    console.log('called - ngAfterContentChecked - hcpoa');
    // this.initialize();
  }

  // tslint:disable-next-line:use-life-cycle-interface
  ngAfterViewInit() {
    console.log('called - ngAfterViewInit - hcpoa');
    this.initialize();
  }

  // tslint:disable-next-line:use-life-cycle-interface
  ngAfterViewChecked() {
    console.log('called - ngAfterViewInit - hcpoa');
  }

  initialize() {
    this.totalPagesSubscription = this.globalPDFService.totalHcpoaPages.subscribe(
      (resp) => {
        // tslint:disable-next-line:max-line-length
        if (resp !== undefined && resp !== null && resp.pages !== undefined && resp.pages !== null && resp.heightArr !== undefined && resp.heightArr !== null) {
          // console.log('response from subscription', resp);

          if (resp.pages > 0 && resp.heightArr.length > 0) {
            // tslint:disable-next-line:max-line-length
            if ( ((this.heightArr !== undefined) && (resp.heightArr[resp.pages - 1] !== this.heightArr[resp.pages - 1])) || (this.heightArr === undefined) )  {
               // setTimeout(() => {
                this.heightArr = resp.heightArr;
                console.log(resp.heightArr);
                this.constructThumbnails();
                this.liCount = this.docThumbImg.length * 114;
              // }, 2000);
            } else {
              console.log('in else ++here++ : ', this.heightArr, resp.heightArr, resp.pages, 'docThumbImg : ', this.docThumbImg);
            }
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

  /**Checks for authorization user id.*/
  parseToken() {
    if (JSON.parse(localStorage.getItem('loggedInUser')).hasOwnProperty('token')) {
      return JSON.parse(localStorage.getItem('loggedInUser')).token;
    }
    return null;
  }

  /**When the component is destroyed*/
  ngOnDestroy() {
    if (this.globalPDFSubscription !== undefined) {
      this.globalPDFSubscription.unsubscribe();
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
    if (this.progressSubscription !== undefined) {
      this.progressSubscription.unsubscribe();
    }
    if (this.getUserDetailsSubscription !== undefined) {
      this.getUserDetailsSubscription.unsubscribe();
    }
  }

  constructThumbnails() {
    console.log('in construct thumbnails');
    if ( this.pdfData.state !== undefined && this.pdfData.state !== null && this.pdfData.state.abr !== null) {
      console.log('in construct thumbnails calling further');
      const abr = this.pdfData.state.abr;
      this.thKey = abr.toLowerCase();
      if (this.states[this.thKey] !== undefined) {
          this.states[abr.toLowerCase()] = true;
          const limit = this.heightArr === undefined ? 4 : this.heightArr.length;
          this.thNail[this.thKey] = limit;
          console.log('key : ', this.thKey, 'limit : ', limit);
          this.docThumbImg = [];
          for (let key = 0 ; key < limit ; key++) {
            this.docThumbImg.push('../../../../../assets/images/doc1-thumb2.png');
          }
      } else {
        console.log('states key is undefined : key -> ', this.thKey);
      }
    } else {
      console.log('state is here');
      this.router.navigate(['/dashboard/documents/final-disposition']);
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
    if (this.heightArr === undefined || this.heightArr === null || this.heightArr.length === 0) {
      console.log(this.heightArr);
      return;
    }
    this.thumbIndex = this.globalPDFService.getAccurateScrollPosition(scrollVal, this.heightArr);
    const dx = e.target.offsetWidth + (this.docThumbImg.length * 7);
    const u = dx / this.docThumbImg.length;
    this.thumbContainer.nativeElement.scrollLeft = u * (this.thumbIndex - 1);
    console.log(this.thumbIndex);
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
    const token = JSON.parse(localStorage.getItem('loggedInUser')).token;
    const userId = JSON.parse(localStorage.getItem('loggedInUser')).user.id;
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
    const token = JSON.parse(localStorage.getItem('loggedInUser')).token;
    const userId = JSON.parse(localStorage.getItem('loggedInUser')).user.id;
    this.printSubscription = this.globalPDFService.healthcarepoa(token).subscribe(
      (response: any) => {
        if (response.status) {
          const src = this.globalPDFService.printFile(userId, 'healthCarePOA.pdf');
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
