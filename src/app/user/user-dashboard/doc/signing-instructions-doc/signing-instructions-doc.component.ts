import { Component, OnInit, ViewChild } from '@angular/core';
import * as html2canvas from "html2canvas";
import * as jsPdf from 'jspdf';
import {UserService} from "../../../user.service";
import {Subscription} from "rxjs/Subscription";
import {UserAuthService} from "../../../user-auth/user-auth.service";
//import 'jspdf-autotable' as JA from 'jspdf-autotable';

@Component({
  selector: 'app-signing-instructions-doc',
  templateUrl: './signing-instructions-doc.component.html',
  styleUrls: ['./signing-instructions-doc.component.css']
})
export class SigningInstructionsDocComponent implements OnInit {
  @ViewChild('docBox')
  docBox: any;
  thumbIndex: number;
  scrollHeight: number;
  docScrolled: number;
  loading = true;
  userDetails = {
    firstname: ''
  };
  docThumbImg: Array<any> = [
    "../../../../../assets/images/doc1-thumb1.png",
    "../../../../../assets/images/doc1-thumb2.png"
  ];
  loggedInUser:any;
  getUserDetailsSubscription: Subscription;
  constructor(private userService: UserService, private userAuth: UserAuthService,) { this.loggedInUser = this.userAuth.getUser(); this.getUserDetails();}

  ngOnInit() {
    //this.x = 1;
    this.docScrolled = 0;
    this.thumbIndex = 0;
  }

  scrollDoc(index:number){
    this.scrollHeight = 991 * index;
    this.docBox.nativeElement.scrollTop = this.scrollHeight;
    this.thumbIndex = index;
    //this.docBox.nativeElement.style.transition = 'top .8s cubic-bezier(0.77, 0, 0.175, 1)';
  }

  getScroll(scrollVal:number){
    if(scrollVal >=  991){
      this.thumbIndex = scrollVal !== 0 ? Math.round(scrollVal/991) : 0;
    }else{
      this.thumbIndex = 0;
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

}
