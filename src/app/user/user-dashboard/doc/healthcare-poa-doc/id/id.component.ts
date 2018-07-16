import { GlobalPdfService } from './../../services/global-pdf.service';
import {Component, Input, OnChanges, OnInit} from '@angular/core';

@Component({
  selector: 'app-id',
  templateUrl: './id.component.html',
  styleUrls: ['./id.component.css']
})
export class IdComponent implements OnInit, OnChanges {

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
  }

  setThNails() {
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
      this.setThNails();
    }
  }
}
