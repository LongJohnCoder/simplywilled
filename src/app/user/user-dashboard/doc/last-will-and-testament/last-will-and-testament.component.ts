import {Component, OnDestroy, OnInit, ViewChild} from '@angular/core';
import * as html2canvas from "html2canvas";
import {UserService} from "../../../user.service";
import {Subscription} from "rxjs/Subscription";
import {UserAuthService} from "../../../user-auth/user-auth.service";
import {ProgressbarService} from "../../shared/services/progressbar.service";
import {Location} from '@angular/common';
import {GlobalPdfService} from '../services/global-pdf.service';
import { saveAs } from 'file-saver/FileSaver';

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
    tellUsAboutYou: null
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
    this.globalPDFSubscription = this.globalPDFService.fetchData(token).subscribe(
      (response: any) => {console.log(response);
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
            tellUsAboutYou: response.data.tellUsAboutYou
          };
          if (response.data.gifts.length > 0) {
            let statement = '';
             for (let i = 0; i < response.data.gifts.length; i++) {
               if ( i < 2 ) {
                 switch (response.data.gifts[i].type) {
                   case '1': statement = response.data.gifts[i].cash_description !== null ? JSON.parse(response.data.gifts[i].cash_description)[0].statement : '';
                     this.giftStatements.firstpage.push(statement);
                     break;
                   case '2': statement = response.data.gifts[i].property_details !== null ? JSON.parse(response.data.gifts[i].property_details)[0].statement : '';
                     this.giftStatements.firstpage.push(statement);
                     break;
                   case '3': statement = response.data.gifts[i].business_details !== null ? JSON.parse(response.data.gifts[i].business_details)[0].statement : '';
                     this.giftStatements.firstpage.push(statement);
                     break;
                   case '4': statement = response.data.gifts[i].asset_details !== null ? JSON.parse(response.data.gifts[i].asset_details)[0].statement : '';
                     this.giftStatements.firstpage.push(statement);
                     break;
                 }
               } else {
                 switch (response.data.gifts[i].type) {
                   case '1': statement = response.data.gifts[i].cash_description !== null ? JSON.parse(response.data.gifts[i].cash_description)[0].statement : '';
                     this.giftStatements.otherpages.push(statement);
                     break;
                   case '2': statement = response.data.gifts[i].property_details !== null ? JSON.parse(response.data.gifts[i].property_details)[0].statement : '';
                     this.giftStatements.otherpages.push(statement);
                     break;
                   case '3': statement = response.data.gifts[i].business_details !== null ? JSON.parse(response.data.gifts[i].business_details)[0].statement : '';
                     this.giftStatements.otherpages.push(statement);
                     break;
                   case '4': statement = response.data.gifts[i].asset_details !== null ? JSON.parse(response.data.gifts[i].asset_details)[0].statement : '';
                     this.giftStatements.otherpages.push(statement);
                     break;
                 }
               }
             }
             for (let i = 0; i < Math.ceil(this.giftStatements.otherpages.length / 5); i++) {
               this.giftStatements.pageLength.push(i);
             }
             console.log(this.giftStatements);
             //this.giftStatements.pageLength = Math.ceil(this.giftStatements.otherpages.length / 5);
          }
          if (response.data.tellUsAboutYou.pet_names !== null) {
            this.petNames = JSON.parse(response.data.tellUsAboutYou.pet_names);
          }
          if (response.data.estateDistribute !== null) {
            this.estateDistribute = {
              _sb: response.data.estateDistribute.to_a_single_beneficiary !== null && response.data.estateDistribute.to_a_single_beneficiary !== undefined ? JSON.parse(response.data.estateDistribute.to_a_single_beneficiary)[0] : null,
              _mb: response.data.estateDistribute.to_multiple_beneficiary !== null && response.data.estateDistribute.to_multiple_beneficiary !== undefined ? JSON.parse(response.data.estateDistribute.to_multiple_beneficiary)[0] : null,
            } ;
          }
          console.log(this.estateDistribute);
        }
      }
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

  scrollDoc(index: number) {
    this.scrollHeight = 991 * index;
    this.docBox.nativeElement.scrollTop = this.scrollHeight;
    this.thumbIndex = index;
    //this.thumbContainer.nativeElement.scrollLeft(100);
    //this.docBox.nativeElement.style.transition = 'top .8s cubic-bezier(0.77, 0, 0.175, 1)';
  }

  getScroll(scrollVal: number) {
    if (scrollVal >=  991) {
      this.thumbIndex = scrollVal !== 0 ? Math.round(scrollVal/991) : 0;
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
        this.firstname = response.data[0] !== null && response.data[0].data != null && response.data[0].data.userInfo !== null && response.data[0].data.userInfo.firstname !== null ? response.data[0].data.userInfo.firstname : '_____________';
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
    this.signingInstructionSubscription = this.globalPDFService.willTemplate(token).subscribe(
      (response: any) => {
        if (response.status) {
          this.downloadSubscription = this.globalPDFService.downloadFile(userId, 'will-template.pdf').subscribe(
            value => {
              saveAs(value, 'will-template.pdf');
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
          let src = this.globalPDFService.printFile(userId, 'will-template.pdf');
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

  /**Go back to previous route*/
  goBack() {
    this.location.back();
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

  emailMe(e: any) {
    e.preventDefault();
    console.log('came here');
    this.loading = true;
    this.getUserDetailsSubscription = this.globalPDFService.willTemplateEmail().subscribe(
      (response: any ) => {
        console.log(response.data);
        alert('email send successfully');
      },
      (error: any) => {
        console.log(error);
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
