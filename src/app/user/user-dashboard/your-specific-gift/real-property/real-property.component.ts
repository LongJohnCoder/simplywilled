import {Component, Input, OnInit} from '@angular/core';

@Component({
  selector: 'app-real-property',
  templateUrl: './real-property.component.html',
  styleUrls: ['./real-property.component.css']
})
export class RealPropertyComponent implements OnInit {
  @Input() giftCount: any;
  isIndividualRP: boolean;
  isCharityRP: boolean;
  singleBeneficiaryRP: boolean;
  multipleBeneficiaryRP: boolean;
  otherRelationshipRp: boolean;
  toTheirIssue: boolean;
  isSomeoneElse: boolean;
  otherRelationshipRpSomeOneElse: boolean;
  toTheirIssueMB: boolean;
  isSomeoneElseMB: boolean;
  otherRelationshipRpSomeOneElseMB: boolean;
  isSomeoneElseMBChild: boolean;
  constructor() { }

  ngOnInit() {
    this.isIndividualRP = false;
    this.isCharityRP = false;
    this.singleBeneficiaryRP = false;
    this.multipleBeneficiaryRP = false;
    this.otherRelationshipRp = false;
    this.toTheirIssue = false;
    this.isSomeoneElse = false;
    this.otherRelationshipRpSomeOneElse = false;
    this.toTheirIssueMB = false;
    this.isSomeoneElseMB = false;
    this.otherRelationshipRpSomeOneElseMB = false;
    this.isSomeoneElseMBChild = false;
  }
  showSectionInorCh(identifier: string): void {
    if (identifier === 'IN') {
      this.isIndividualRP = true;
      this.isCharityRP = false;
    } else {
      this.isIndividualRP = false;
      this.isCharityRP = true;
      this.singleBeneficiaryRP = false;
      this.multipleBeneficiaryRP = false;
      this.otherRelationshipRp = false;
      this.toTheirIssue = false;
      this.isSomeoneElse = false;
      this.toTheirIssueMB = false;
      this.isSomeoneElseMB = false;
    }
  }
  beneficiaryToggle(identifier: string): void {
    if (this.isIndividualRP) {
      if (identifier === 'S') {
        this.singleBeneficiaryRP = true;
        this.multipleBeneficiaryRP = false;
      } else {
        this.singleBeneficiaryRP = false;
        this.multipleBeneficiaryRP = true;
      }
    }
  }
  toggleRelationship(event: any): void {
    if (this.isIndividualRP && this.singleBeneficiaryRP) {
      if (event.target.value === 'Other') {
        this.otherRelationshipRp = true;
      } else {
        this.otherRelationshipRp = false;
      }
    }
  }
  toggleRelationshipSomeOneElse(event: any): void {
    if (this.isIndividualRP && this.singleBeneficiaryRP) {
      if (event.target.value === 'Other') {
        this.otherRelationshipRpSomeOneElse = true;
      } else {
        this.otherRelationshipRpSomeOneElse = false;
      }
    }
  }
  propertyDistibutionToggle(identifier: any): void {
    if (this.isIndividualRP && this.singleBeneficiaryRP) {
      if (identifier === 'TTI') {
        this.toTheirIssue = true;
        this.isSomeoneElse = false;
      } else if (identifier === 'RE') {
        this.toTheirIssue = false;
        this.isSomeoneElse = false;
      } else {
        this.toTheirIssue = false;
        this.isSomeoneElse = true;
      }
    }
  }
  propertyDistibutionToggleChild(identifier: any): void {
    if (this.isIndividualRP && this.singleBeneficiaryRP) {
      if (identifier === 'TSE') {
        this.isSomeoneElse = true;
      } else {
        this.isSomeoneElse = false;
      }
    }
  }
  propertyDistributionToggleMB(identifier: string): any {
    if (this.isIndividualRP && this.multipleBeneficiaryRP) {
      if (identifier === 'TTI') {
        this.toTheirIssueMB = true;
        this.isSomeoneElseMB = false;
      } else if (identifier === 'TSE') {
        this.toTheirIssueMB = false;
        this.isSomeoneElseMB = true;
      } else if (identifier === 'TTS') {
        this.toTheirIssueMB = false;
        this.isSomeoneElseMB = false;
      } else {
        this.toTheirIssueMB = false;
        this.isSomeoneElseMB = false;
      }
    }
  }
  propertyDistibutionToggleChildMB(identifier: any): void {
    if (this.isIndividualRP && this.multipleBeneficiaryRP) {
      if (identifier === 'TSE') {
        this.isSomeoneElseMBChild = true;
      } else {
        this.isSomeoneElseMBChild = false;
      }
    }
  }
  toggleRelationshipSomeOneElseMB(event: any): void {
    if (this.isIndividualRP && this.multipleBeneficiaryRP) {
      if (event.target.value === 'Other') {
        this.otherRelationshipRpSomeOneElseMB = true;
      } else {
        this.otherRelationshipRpSomeOneElseMB = false;
      }
    }
  }
  toggleRelationshipSomeOneElseMBChild(event: any): void {
    if (this.isIndividualRP && this.multipleBeneficiaryRP) {
      if (event.target.value === 'Other') {
        this.otherRelationshipRpSomeOneElseMB = true;
      } else {
        this.otherRelationshipRpSomeOneElseMB = false;
      }
    }
  }
}
