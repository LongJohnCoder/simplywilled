import {Component, OnDestroy, OnInit, ViewChild} from '@angular/core';
/*import {GlobalPdfService} from '../services/global-pdf.service';*/
import {Subscription} from "rxjs/Subscription";
import {UserService} from "../../../user.service";
import {ProgressbarService} from "../../shared/services/progressbar.service";
import {UserAuthService} from "../../../user-auth/user-auth.service";

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
  loggedInUser:any;
  getUserDetailsSubscription: Subscription;
  count: number;

  states = {
    ak: false,
    al: false,
    ar: false,
    ca: false,
    co: false,
  };
  pdfData: any;
  /*globalPDFSubscription: Subscription;*/

  /**Constructor call*/
  constructor(
    /*private globalPDFService: GlobalPdfService,*/
    private userService: UserService, private userAuth: UserAuthService,private progressbarService: ProgressbarService,
  ) {
    this.loggedInUser = this.userAuth.getUser();
    this.getUserDetails();
    let token = this.parseToken();
    /*this.globalPDFSubscription = this.globalPDFService.fetchData(token).subscribe(
      (response: any) => {
        if (response.status) {
          this.pdfData = response.data;
          console.log(this.pdfData);
        }
      }
    );*/

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
  /**When the component initialises*/
  ngOnInit() {
    this.states = {
      ak: false,
      al: false,
      ar: false,
      ca: false,
      co: true,
    };
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
  }

  scrollDoc(index:number){
    this.scrollHeight = 991 * index;
    this.docBox.nativeElement.scrollTop = this.scrollHeight;
    this.thumbIndex = index;
    //this.thumbContainer.nativeElement.scrollLeft(100);
    //this.docBox.nativeElement.style.transition = 'top .8s cubic-bezier(0.77, 0, 0.175, 1)';
  }

  getScroll(scrollVal:number){
    if(scrollVal >=  991){
      this.thumbIndex = scrollVal !== 0 ? Math.round(scrollVal/991) : 0;
    }else{
      this.thumbIndex = 0;
    }
    if(this.thumbIndex >= 4){
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

}
