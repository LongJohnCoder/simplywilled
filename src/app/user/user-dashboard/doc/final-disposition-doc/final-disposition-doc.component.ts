import {Component, OnDestroy, OnInit, ViewChild} from '@angular/core';
import {UserAuthService} from '../../../user-auth/user-auth.service';
import {Subscription} from 'rxjs/Subscription';
import {FinalDispositionPdfService} from '../services/final-disposition-pdf.service';

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

  getUserDetailsSubscription: Subscription;
  constructor(private finalDispositionService: FinalDispositionPdfService, private userAuth: UserAuthService) {
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
    this.scrollHeight = 991 * index;
    this.docBox.nativeElement.scrollTop = this.scrollHeight;
    this.thumbIndex = index;
  }

  getScroll(scrollVal: number){
    if(scrollVal >=  991){
      this.thumbIndex = scrollVal !== 0 ? Math.round(scrollVal/991) : 0;
    }else{
      this.thumbIndex = 0;
    }
  }

  /**Get the user details*/
  getUserDetails() {
    let token = this.parseToken();
    this.getUserDetailsSubscription = this.finalDispositionService.fetchData(token).subscribe(
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
        }

        console.log(this.userDetails);
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
  }

}
