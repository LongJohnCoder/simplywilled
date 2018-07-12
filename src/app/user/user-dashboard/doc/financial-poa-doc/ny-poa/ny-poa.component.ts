import { GlobalPdfService } from './../../services/global-pdf.service';
import {Component, Input, OnChanges, OnInit, DoCheck} from '@angular/core';

@Component({
  selector: 'app-ny-poa',
  templateUrl: './ny-poa.component.html',
  styleUrls: ['./ny-poa.component.css']
})
export class NyPoaComponent implements OnInit, OnChanges  {


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
  totalPages: number;

  constructor(
    private globalService: GlobalPdfService
  ) { }

  ngOnInit() {
  }

  // tslint:disable-next-line:use-life-cycle-interface
  ngDoCheck() {
    const x = this.globalService.getDynamicPages();
    this.totalPages = x.totalPages;
    this.globalService.fcpoaPages({
      'pages' : x.totalPages,
      'heightArr' : x.heightArr
    });
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
        // tslint:disable-next-line:max-line-length
        attorney_backup: this.data.financialPowerOfAttorney !== null && this.data.financialPowerOfAttorney.attorney_backup !== null && this.data.financialPowerOfAttorney.attorney_backup !== undefined ? JSON.parse(this.data.financialPowerOfAttorney.attorney_backup) : null,
        // tslint:disable-next-line:max-line-length
        attorney_holders: this.data.financialPowerOfAttorney !== null && this.data.financialPowerOfAttorney.attorney_holders !== null && this.data.financialPowerOfAttorney.attorney_holders !== undefined ? JSON.parse(this.data.financialPowerOfAttorney.attorney_holders) : null,
        // tslint:disable-next-line:max-line-length
        attorney_powers: this.data.financialPowerOfAttorney !== null && this.data.financialPowerOfAttorney.attorney_powers !== null && this.data.financialPowerOfAttorney.attorney_powers !== undefined ? JSON.parse(this.data.financialPowerOfAttorney.attorney_powers) : null,
      };
      this.loading = false;
      console.log(this.financialPOA);
    }
  }

}
