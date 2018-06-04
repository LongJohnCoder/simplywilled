import { Component, OnInit } from '@angular/core';
import {MedicalEmergencyService} from './medical-emergency.service';
import {MedicalEmergency} from './medicalEmergency';
import {Router} from '@angular/router';
import {ProgressbarService} from '../shared/services/progressbar.service';

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
      private progressBarService: ProgressbarService,
      private router: Router,

  ) { this.progressBarService.changeWidth({width: 0}); }

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
              if (response !== null && response.status) {
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
                    this.medicalAgent.country = response.data.healthFinance.country === null ? 'United States' : response.data.healthFinance.country;
                    this.medicalAgent.willInform = response.data.healthFinance.willInform;
                    this.medicalAgent.emailOfAgent = response.data.healthFinance.emailOfAgent;
                    this.medicalAgent.anyBackupAgent = response.data.healthFinance.anyBackupAgent;
                    this.medicalAgent.backupRelation = response.data.healthFinance.backupRelation;
                    this.medicalAgent.backupAddress = response.data.healthFinance.backupAddress;
                    this.medicalAgent.backupCity = response.data.healthFinance.backupCity;
                    this.medicalAgent.backupState = response.data.healthFinance.backupState;
                    this.medicalAgent.backupZip = response.data.healthFinance.backupZip;
                    this.medicalAgent.backupCountry = response.data.healthFinance.backupCountry === null ? 'United States' : response.data.healthFinance.backupCountry;
                    this.medicalAgent.willInformBackup = response.data.healthFinance.willInformBackup;
                    this.medicalAgent.emailOfBackupAgent = response.data.healthFinance.emailOfBackupAgent;
                    this.medicalAgent.backupphone = response.data.healthFinance.backupphone;

                    this.toggleWillInform = JSON.parse(response.data.healthFinance.willInform);
                    this.toggleBackupAgent = JSON.parse(response.data.healthFinance.anyBackupAgent);
                    this.toggleWillBackupInform = JSON.parse(response.data.healthFinance.willInformBackup);
              }
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
      // console.log(this.toggleWillInform);
    }

    changeBackupAgentToggle(status: boolean) {
      this.toggleBackupAgent = status;
    }

    changewillBackupinform(status: boolean) {
      this.toggleWillBackupInform = status;
    }

    formSubmit() {
        console.log(this.medicalAgent);
        // console.log(this.medicalAgent.emailOfAgent);
        const formBody = new FormData();
        formBody.append('userId', this.medicalAgent.userId);
        formBody.append('firstLegalName', this.medicalAgent.firstLegalName);
        formBody.append('lastLegalName', this.medicalAgent.lastLegalName);
        formBody.append('backupfirstLegalName', this.medicalAgent.backupfirstLegalName);
        formBody.append('backuplastLegalName', this.medicalAgent.backuplastLegalName);
        formBody.append('relation', this.medicalAgent.relation);
        formBody.append('address', this.medicalAgent.address);
        formBody.append('city', this.medicalAgent.city);
        formBody.append('state', this.medicalAgent.state);
        formBody.append('zip', this.medicalAgent.zip);
        formBody.append('phone', this.medicalAgent.phone);
        formBody.append('country', this.medicalAgent.country);
        formBody.append('willInform', this.toggleWillInform === true ? 'true' : 'false');
        formBody.append('emailOfAgent', this.medicalAgent.emailOfAgent);
        formBody.append('anyBackupAgent', this.toggleBackupAgent === true ? 'true' : 'false');
        formBody.append('backupRelation', this.medicalAgent.backupRelation);
        formBody.append('backupAddress', this.medicalAgent.backupAddress);
        formBody.append('backupCity', this.medicalAgent.backupCity);
        formBody.append('backupState', this.medicalAgent.backupState);
        formBody.append('backupZip', this.medicalAgent.backupZip === '' ? null : this.medicalAgent.backupZip);
        formBody.append('backupCountry', this.medicalAgent.backupCountry);
        formBody.append('willInformBackup', this.toggleWillBackupInform === true ? 'true' : 'false');
        formBody.append('emailOfBackupAgent', this.medicalAgent.emailOfBackupAgent);
        formBody.append('backupphone', this.medicalAgent.backupphone);
        this.medicalEmergencyService.updatemedicalEmergency(this.token, formBody).subscribe(
            (response: any) => {
                this.router.navigate(['/dashboard']);
            }, (error: any) => {
                console.log(error.error);
            }
        );

    }
}
