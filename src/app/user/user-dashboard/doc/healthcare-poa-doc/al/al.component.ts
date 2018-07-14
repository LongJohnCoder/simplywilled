import { GlobalPdfService } from './../../services/global-pdf.service';
import {Component, Input, OnChanges, OnInit, DoCheck} from '@angular/core';

@Component({
  selector: 'app-al',
  templateUrl: './al.component.html',
  styleUrls: ['./al.component.css']
})
export class AlComponent implements OnInit, OnChanges {
  /**Variable declaration*/
  @Input() data: any;
  userDetails = {
    backupPersonalRepresentative: null,
    backupPetGuardian: null,
    children: null,
    estateDistribute: null,
    finalArrangements: null,
    guardian: null,
    healthFinance: null,
    personalRepresentative: null,
    petGuardian: null,
    provideYourLovedOnes: null,
    state: null,
    tellUsAboutYou: null
  };
  loading = true;
  totalPages: number;

  constructor(
    private globalService: GlobalPdfService
  ) { }

  ngOnInit() {
    // const x = this.globalService.getDynamicPages();
    // this.totalPages = x.totalPages;
    // this.globalService.hcpoaPages({
    //   'pages' : x.totalPages,
    //   'heightArr' : x.heightArr
    // });
  }

  // tslint:disable-next-line:use-life-cycle-interface
  ngDoCheck() {
    const x = this.globalService.getDynamicPages();
    this.totalPages = x.totalPages;
    this.globalService.hcpoaPages({
      'pages' : x.totalPages,
      'heightArr' : x.heightArr
    });
  }

  ngOnChanges() {
    if (this.data !== undefined && this.data !== null) {
      this.userDetails = {
        backupPersonalRepresentative: this.data.backupPersonalRepresentative,
        backupPetGuardian: this.data.backupPetGuardian,
        children: this.data.children,
        estateDistribute: this.data.estateDistribute,
        finalArrangements: this.data.finalArrangements,
        guardian: this.data.guardian,
        healthFinance: this.data.healthFinance,
        personalRepresentative: this.data.personalRepresentative,
        petGuardian: this.data.petGuardian,
        provideYourLovedOnes: this.data.provideYourLovedOnes ,
        state: this.data.state ,
        tellUsAboutYou: this.data.tellUsAboutYou
      };
      this.loading = false;
      console.log(this.userDetails);

      const x = this.globalService.getDynamicPages();
      this.totalPages = x.totalPages;
      this.globalService.hcpoaPages({
        'pages' : x.totalPages,
        'heightArr' : x.heightArr
      });
    }
  }
}
