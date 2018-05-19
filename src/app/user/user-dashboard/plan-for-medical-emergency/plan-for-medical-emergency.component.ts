import { Component, OnInit } from '@angular/core';
import {MedicalEmergencyService} from './medical-emergency.service';
import {MedicalEmergency} from './medicalEmergency';

@Component({
  selector: 'app-plan-for-medical-emergency',
  templateUrl: './plan-for-medical-emergency.component.html',
  styleUrls: ['./plan-for-medical-emergency.component.css']
})
export class PlanForMedicalEmergencyComponent implements OnInit {
  medicalAgent: any;
  userId: number;
  errFlag: boolean;
  errString: string;
  token: string;
  relations: any[];
  toggleWillInform: boolean;
  toggleBackupAgent: boolean;
  toggleWillBackupInform: boolean;
  constructor(
      private medicalEmergencyService: MedicalEmergencyService,
  ) { }

  ngOnInit() {
      this.toggleWillInform = false;
      this.toggleBackupAgent = false;
      this.toggleWillBackupInform = false;
      this.userId = JSON.parse(localStorage.getItem('loggedInUser')).user.id;
      this.token = JSON.parse(localStorage.getItem('loggedInUser')).token
      this.medicalAgent = {
              id: 0,
              userId: this.userId,
              firstLegalName: '',
              lastLegalName: '',
              backupfirstLegalName: '',
              backuplastLegalName: '',
              relation: '',
              address: '',
              city: '',
              state: '',
              zip: '',
              country: 'United States',
              willInform: 'false',
              emailOfAgent: '',
              anyBackupAgent: 'false',
              backupRelation: '',
              backupAddress: '',
              backupCity: '',
              backupState: '',
              backupZip: '',
              backupphone: '',
              backupCountry: 'United States',
              willInformBackup: 'false',
              emailOfBackupAgent: '',
              phone: ''
          };
      if (this.userId) {
          this.errFlag = false;
          this.errString = '';
          this.getData();

      } else {
          this.errFlag = true;
          this.errString = 'We are unable to log you in. Please login to continue';
      }
      this.relations = [
                'Wife',
                'Husband',
                'Mother',
                'Father',
                'Son',
                'Daughter',
                'Sister',
                'Brother',
                'Aunt',
                'Uncle',
                'Cousin',
                'Friend',
                'Other'
            ];


  }

  getData() {
      this.medicalEmergencyService.getmedicalEmergency(this.token, {user_id: this.userId}).subscribe(
          (response: any) => {
              this.medicalAgent.id = response.data.healthFinance.id;
              this.medicalAgent.userId = this.userId;
              this.medicalAgent.firstLegalName = response.data.healthFinance.firstLegalName;
              this.medicalAgent.lastLegalName = response.data.healthFinance.lastLegalName;
              this.medicalAgent.backupfirstLegalName = response.data.healthFinance.backupfirstLegalName;
              this.medicalAgent.backuplastLegalName = response.data.healthFinance.backuplastLegalName;
              this.medicalAgent.relation = response.data.healthFinance.relation;
              this.medicalAgent.address = response.data.healthFinance.address;
              this.medicalAgent.city = response.data.healthFinance.city;
              this.medicalAgent.state = response.data.healthFinance.state;
              this.medicalAgent.zip = response.data.healthFinance.zip;
              this.medicalAgent.phone = response.data.healthFinance.phone;
              this.medicalAgent.country = response.data.healthFinance.country;
              this.medicalAgent.willInform = response.data.healthFinance.willInform;
              this.medicalAgent.emailOfAgent = response.data.healthFinance.emailOfAgent;
              this.medicalAgent.anyBackupAgent = response.data.healthFinance.anyBackupAgent;
              this.medicalAgent.backupRelation = response.data.healthFinance.backupRelation;
              this.medicalAgent.backupAddress = response.data.healthFinance.backupAddress;
              this.medicalAgent.backupCity = response.data.healthFinance.backupCity;
              this.medicalAgent.backupState = response.data.healthFinance.backupState;
              this.medicalAgent.backupZip = response.data.healthFinance.backupZip;
              this.medicalAgent.backupCountry = response.data.healthFinance.backupCountry;
              this.medicalAgent.willInformBackup = response.data.healthFinance.willInformBackup;
              this.medicalAgent.emailOfBackupAgent = response.data.healthFinance.emailOfBackupAgent;
              this.medicalAgent.backupphone = response.data.healthFinance.backupphone;

              this.toggleWillInform = JSON.parse(response.data.healthFinance.willInform);
              this.toggleBackupAgent = JSON.parse(response.data.healthFinance.anyBackupAgent);
              this.toggleWillBackupInform = JSON.parse(response.data.healthFinance.willInformBackup);
              // console.log(this.medicalAgent);
              // console.log(this.toggleWillInform);

          }, (error: any) => {
              // this.medicalAgent = {
              //     id: 0,
              //     userId: this.userId,
              //     fullLegalName: '',
              //     relation: '',
              //     address: '',
              //     city: '',
              //     state: '',
              //     zip: '',
              //     country: '',
              //     isInform: 0,
              //     emailOfAgent: '',
              //     isBackupAgent: 0,
              //     backupFullLegalName: '',
              //     backupRelation: '',
              //     backupAddress: '',
              //     backupCity: '',
              //     backupState: '',
              //     backupZip: '',
              //     backupCountry: '',
              //     isInformBackup: 0,
              //     emailOfBackupAgent: ''
              // };
          }
      );
  }

    changewillinform(status: boolean) {
      this.toggleWillInform = status;
      console.log(this.toggleWillInform);
    }

    changeBackupAgentToggle(status: boolean) {
      this.toggleBackupAgent = status;
    }

    changewillBackupinform(status: boolean) {
      this.toggleWillBackupInform = status;
    }
}
