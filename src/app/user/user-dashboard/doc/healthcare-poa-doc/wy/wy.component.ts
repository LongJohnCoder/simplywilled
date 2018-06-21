// import { TellUsAboutYourselfComponent } from './../../../users-will/tell-us-about-yourself/tell-us-about-yourself.component';
import {Component, Input, OnChanges, OnInit} from '@angular/core';

@Component({
  selector: 'app-wy',
  templateUrl: './wy.component.html',
  styleUrls: ['./wy.component.css']
})
export class WyComponent implements OnInit, OnChanges {

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

  genderTxt = '';
  settlorGenderTxt = '';


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
      } else {
        this.genderTxt = '_____';
      }

      this.loading = false;
      console.log(this.userDetails);
    }
  }
}
