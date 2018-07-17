import {Component, OnDestroy, OnInit, ViewChild, DoCheck} from '@angular/core';
import * as html2canvas from 'html2canvas';
import {UserService} from '../../../user.service';
import {Subscription} from 'rxjs/Subscription';
import {UserAuthService} from '../../../user-auth/user-auth.service';
import {ProgressbarService} from '../../shared/services/progressbar.service';
import {Location} from '@angular/common';
import {GlobalPdfService} from '../services/global-pdf.service';
import { saveAs } from 'file-saver/FileSaver';
import {Router} from '@angular/router';
import { MapOperator } from 'rxjs/operators/map';

@Component({
  selector: 'app-last-will-and-testament',
  templateUrl: './last-will-and-testament.component.html',
  styleUrls: ['./last-will-and-testament.component.css']
})
export class LastWillAndTestamentComponent implements OnInit, OnDestroy {
  @ViewChild('docBox')
  docBox: any;
  @ViewChild('thumbContainer')


  thumbContainer: any;
  progressSubscription: Subscription;
  thumbIndex: number;
  scrollHeight: number;
  docScrolled: number;
  loading = true;
  firstname: any;
  /*userDetails = {
    firstname: ''
  };*/
  totalPages: number;
  pageIndex = 1;
  totalPagesPresent = 12;
  deceasedChildrenNames = '';
  docThumbImg: Array<any> = [
    '../../../../../assets/images/doc1-thumb1.png',
    '../../../../../assets/images/doc1-thumb2.png',
    '../../../../../assets/images/doc1-thumb1.png',
    '../../../../../assets/images/doc1-thumb2.png',
    '../../../../../assets/images/doc1-thumb1.png',
    '../../../../../assets/images/doc1-thumb2.png',
    '../../../../../assets/images/doc1-thumb1.png',
    '../../../../../assets/images/doc1-thumb2.png',
    '../../../../../assets/images/doc1-thumb1.png',
    '../../../../../assets/images/doc1-thumb2.png',
    '../../../../../assets/images/doc1-thumb1.png',
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
  userDetails  = {
    backupGuardian : null,
    backupPersonalRepresentative : null,
    backupPetGuardian : null,
    children : null,
    contingentBeneficiary : null,
    disinherit : null,
    estateDistribute : null,
    finalArrangements : null,
    financialPowerOfAttorney : null,
    gifts : null,
    guardian : null,
    healthFinance : null,
    personalRepresentative : null,
    petGuardian : null,
    provideYourLovedOnes : null,
    state : null,
    tellUsAboutYou: null,
    custGiftsArr: null
  };
  globalPDFSubscription: Subscription;
  giftStatements = {
    firstpage: [],
    otherpages: [],
    pageLength: []
  };
  petNames = [];
  estateDistribute = {
    _sb: null,
    _mb: null
  };
  signingInstructionSubscription: Subscription;
  downloadSubscription: Subscription;
  printSubscription: Subscription;
  heightArr: Array<number>;

  constructor(
      private router: Router,
      private globalPDFService: GlobalPdfService,
      private userService: UserService,
      private userAuth: UserAuthService,
      private progressbarService: ProgressbarService,
      private location: Location
    ) {
    this.loggedInUser = this.userAuth.getUser();
    this.getUserDetails();
    const token = JSON.parse(localStorage.getItem('loggedInUser')).token;
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
      (error) => { 
        console.log(error); 
      },
      () => {}
    );
    this.globalPDFSubscription = this.globalPDFService.fetchData(token).subscribe(
      (response: any) => { // console.log(response);
        if (response.status) {
          this.userDetails = {
            backupGuardian : response.data.backupGuardian,
            backupPersonalRepresentative : response.data.backupPersonalRepresentative,
            backupPetGuardian : response.data.backupPetGuardian,
            children : response.data.children,
            contingentBeneficiary : response.data.contingentBeneficiary,
            disinherit : response.data.disinherit,
            estateDistribute : response.data.estateDistribute,
            finalArrangements : response.data.finalArrangements,
            financialPowerOfAttorney : response.data.financialPowerOfAttorney,
            gifts : response.data.gifts,
            guardian : response.data.guardian,
            healthFinance : response.data.healthFinance,
            personalRepresentative : response.data.personalRepresentative,
            petGuardian : response.data.petGuardian,
            provideYourLovedOnes : response.data.provideYourLovedOnes,
            state : response.data.state,
            tellUsAboutYou: response.data.tellUsAboutYou,
            custGiftsArr: response.data.custGiftsArr
          };
          if (response.data.gifts.length > 0) {
            // console.log('custGiftsArr received : ', this.userDetails.custGiftsArr);
            if (this.userDetails.custGiftsArr !== undefined && this.userDetails.custGiftsArr !== null) {
              this.userDetails.custGiftsArr.forEach( (giftStatement, index) => {
                if ( index < 5 ) {
                  this.giftStatements.firstpage.push(giftStatement);
                } else {
                  this.giftStatements.otherpages.push(giftStatement);
                }
              });
            } else {
              // console.log('custGiftArray comming null or undefined');
            }

            if (this.userDetails.tellUsAboutYou.deceased_children_names !== null ) {
              if (this.userDetails.tellUsAboutYou.deceased_children_names.trim().length !== 0) {
                this.deceasedChildrenNames = this.userDetails.tellUsAboutYou.deceased_children_names.split(',');
              }
            }

            for (let i = 0; i < Math.ceil(this.giftStatements.otherpages.length / 5); i++) {
              this.giftStatements.pageLength.push(i);
              this.docThumbImg.push( '../../../../../assets/images/doc1-thumb1.png');
            }
            this.liCount = this.docThumbImg.length * 114;
             // console.log(this.giftStatements);
          }
          if (response.data.tellUsAboutYou.pet_names !== null) {
            this.petNames = JSON.parse(response.data.tellUsAboutYou.pet_names);
          }
          if (response.data.estateDistribute !== null) {
            this.estateDistribute = {
              // tslint:disable-next-line:max-line-length
              _sb: response.data.estateDistribute.to_a_single_beneficiary !== null && response.data.estateDistribute.to_a_single_beneficiary !== undefined ? JSON.parse(response.data.estateDistribute.to_a_single_beneficiary)[0] : null,
              // tslint:disable-next-line:max-line-length
              _mb: response.data.estateDistribute.to_multiple_beneficiary !== null && response.data.estateDistribute.to_multiple_beneficiary !== undefined ? JSON.parse(response.data.estateDistribute.to_multiple_beneficiary)[0] : null,
            } ;
          }
          // console.log('childrens : ', this.userDetails.children);
          // console.log(this.estateDistribute);
        }
      }
    );
  }

  // tslint:disable-next-line:use-life-cycle-interface
  ngDoCheck() {
    const x = this.globalPDFService.getDynamicPages();
    this.totalPages = x.totalPages;
    this.heightArr = x.heightArr;
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
    // this.liCount = this.docThumbImg.length * 114;
  }

  scrollDoc(index: number) {
    this.scrollHeight = 991 * index;
    this.docBox.nativeElement.scrollTop = this.scrollHeight;
    this.thumbIndex = index;
    // this.thumbContainer.nativeElement.scrollLeft(100);
    // this.docBox.nativeElement.style.transition = 'top .8s cubic-bezier(0.77, 0, 0.175, 1)';
  }

  getScroll(scrollVal: number, e: any) {
    if (this.heightArr === undefined || this.heightArr === null || this.heightArr.length === 0) {
      return;
    }
    this.thumbIndex = this.globalPDFService.getAccurateScrollPosition(scrollVal, this.heightArr);
    console.log('thumb index : ', this.thumbIndex, ' scrollVal : ', scrollVal, ' heightArr : ', this.heightArr);
    const dx = e.target.offsetWidth + (this.docThumbImg.length * 7);
    const u = dx / this.docThumbImg.length;
    this.thumbContainer.nativeElement.scrollLeft = u * (this.thumbIndex - 1);
  }

  /**Get the user details*/
  getUserDetails() {
    this.getUserDetailsSubscription = this.userService.getUserDetails(this.loggedInUser.id).subscribe(
      (response: any ) => {
        this.firstname = response.data[0] !== null && response.data[0].data != null && response.data[0].data.userInfo !== null
        && response.data[0].data.userInfo.firstname !== null
             ? response.data[0].data.userInfo.firstname
             : '_____________';
      },
      (error: any) => {
        console.log(error);
      }, () => { this.loading = false; }
    );
  }

  /**Downloads the pdf*/
  downloadPdf() {
    this.loading = true;
    const token = JSON.parse(localStorage.getItem('loggedInUser')).token;
    const userId = JSON.parse(localStorage.getItem('loggedInUser')).user.id;
    this.signingInstructionSubscription = this.globalPDFService.willTemplate(token).subscribe(
      (response: any) => {
        if (response.status) {
          this.downloadSubscription = this.globalPDFService.downloadFile(userId, 'will-template.pdf').subscribe(
            value => {
              saveAs(value, 'last-will-and-testament.pdf');
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
    const token = JSON.parse(localStorage.getItem('loggedInUser')).token;
    const userId = JSON.parse(localStorage.getItem('loggedInUser')).user.id;
    this.printSubscription = this.globalPDFService.willTemplate(token).subscribe(
      (response: any) => {
        if (response.status) {
          const src = this.globalPDFService.printFile(userId, 'will-template.pdf');
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

  /**Go back to previous route*/
  goBack() {
    this.location.back();
  }

  goNext() {
    if (!this.progressBar.protectYourFinance && !this.progressBar.provideYourLovedOnes) {
      this.router.navigate(['/dashboard/documents/final-disposition']);
    } else if (!this.progressBar.protectYourFinance && this.progressBar.provideYourLovedOnes) {
      this.router.navigate(['/dashboard/documents/healthcare-poa']);
    } else {
      this.router.navigate(['/dashboard/documents/financial-poa']);
    }
  }

  emailMe(e: any) {
    e.preventDefault();
    this.loading = true;
    this.getUserDetailsSubscription = this.globalPDFService.willTemplateEmail().subscribe(
      (response: any ) => {
        alert('Email has been sent successfully with attached document. Please check your inbox.');
      },
      (error: any) => {
        console.log(error);
        this.loading = false;
      }, () => { this.loading = false; }
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
