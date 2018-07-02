import {Component, Input, OnChanges, OnInit} from '@angular/core';

@Component({
  selector: 'app-md-poa',
  templateUrl: './md-poa.component.html',
  styleUrls: ['./md-poa.component.css']
})
export class MdPoaComponent implements OnInit, OnChanges {

  /**Variable declaration*/
  @Input() data: any;
  userDetails = {
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
  financialPOA = {
    attorney_backup: null,
    attorney_holders: null,
    attorney_powers: null,
  };
  loading = true;

  constructor() { }

  ngOnInit() {
  }

  ngOnChanges() {
    if (this.data !== undefined && this.data !== null) {
      this.userDetails = {
        backupGuardian : this.data.backupGuardian,
        backupPersonalRepresentative : this.data.backupPersonalRepresentative,
        backupPetGuardian : this.data.backupPetGuardian,
        children : this.data.children,
        contingentBeneficiary : this.data.contingentBeneficiary,
        disinherit : this.data.disinherit,
        estateDistribute : this.data.estateDistribute,
        finalArrangements : this.data.finalArrangements,
        financialPowerOfAttorney : this.data.financialPowerOfAttorney,
        gifts : this.data.gifts,
        guardian : this.data.guardian,
        healthFinance : this.data.healthFinance,
        personalRepresentative : this.data.personalRepresentative,
        petGuardian : this.data.petGuardian,
        provideYourLovedOnes : this.data.provideYourLovedOnes,
        state : this.data.state,
        tellUsAboutYou: this.data.tellUsAboutYou
      };
      this.financialPOA = {
        attorney_backup: this.data.financialPowerOfAttorney !== null && this.data.financialPowerOfAttorney.attorney_backup !== null && this.data.financialPowerOfAttorney.attorney_backup !== undefined ? JSON.parse(this.data.financialPowerOfAttorney.attorney_backup) : null,
        attorney_holders: this.data.financialPowerOfAttorney !== null && this.data.financialPowerOfAttorney.attorney_holders !== null && this.data.financialPowerOfAttorney.attorney_holders !== undefined ? JSON.parse(this.data.financialPowerOfAttorney.attorney_holders) : null,
        attorney_powers: this.data.financialPowerOfAttorney !== null && this.data.financialPowerOfAttorney.attorney_powers !== null && this.data.financialPowerOfAttorney.attorney_powers !== undefined ? JSON.parse(this.data.financialPowerOfAttorney.attorney_powers) : null,
      };
      this.loading = false;
      console.log(this.financialPOA);
    }
  }
}
