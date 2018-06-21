// import { TellUsAboutYourselfComponent } from './../../../users-will/tell-us-about-yourself/tell-us-about-yourself.component';
import {Component, Input, OnChanges, OnInit} from '@angular/core';

@Component({
  selector: 'app-tx',
  templateUrl: './tx.component.html',
  styleUrls: ['./tx.component.css']
})
export class TxComponent implements OnInit, OnChanges {

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

  genderTxt = null;
  settlorGenderTxt = '';
  genderTxt2 = null;
  genderTxt3 = null;

  constructor() { }

  ngOnInit() {

  }

  ngOnChanges() {
    console.log('here1');
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

      if (this.userDetails !== undefined && this.userDetails.tellUsAboutYou !== null && this.userDetails.tellUsAboutYou.gender !== null) {
        this.genderTxt = this.userDetails.tellUsAboutYou.gender === 'M' ? 'him' : 'her';
        this.genderTxt2 = this.userDetails.tellUsAboutYou.gender === 'M' ? 'himself' : 'herself';
        this.genderTxt3 = this.userDetails.tellUsAboutYou.gender === 'M' ? 'he' : 'she';
      } else {
        this.genderTxt = 'him/her';
        this.genderTxt2 = 'himself/herself';
        this.genderTxt3 = 'he/she';
      }

      this.loading = false;
      console.log(this.userDetails);
    }
  }
}
