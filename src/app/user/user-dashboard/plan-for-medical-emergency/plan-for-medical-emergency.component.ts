import { UserService } from './../../user.service';
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
  loading = true;
  toolTipMessageList: any;

  constructor(
      private medicalEmergencyService: MedicalEmergencyService,
      private progressBarService: ProgressbarService,
      private router: Router,
      private userService: UserService,
  ) {
        this.progressBarService.changeWidth({width: 0});
        this.toolTipMessageList = {
            'health_care' : [{
                'q' : 'What is a Healthcare Agent?',
                // tslint:disable-next-line:max-line-length
                'a' : 'Your healthcare power of attorney is the individual you appoint to make medical decisions for you in the event that you are incapacitated. This should be an individual, over the age of 18 that you trust, such as a spouse, a relative or close friend.'
              }],
            'health_care_backup' : [{
                'q' : 'Should I select a backup Healthcare Agent?',
                // tslint:disable-next-line:max-line-length
                'a' : 'It\'s always a good idea to select a backup healthcare power of attorney in the event that your first choice is unable or unwilling to act. Please remember, using SimplyWilled.com you can choose to send this person an email notification that you have selected them as a fiduciary of your estate.'
            }]
        };
    }

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
              fulllegalName: '',
              backupfirstLegalName: '',
              backuplastLegalName: '',
              backupfulllegalName: '',
              relation: '',
              relationOther: '',
              address: '',
              city: '',
              state: '',
              zip: '',
              country: 'United States',
              willInform: 'false',
              emailOfAgent: '',
              anyBackupAgent: 'false',
              backupRelation: '',
              backupRelationOther: '',
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


  toolTipClicked(str: string) {
    console.log(str);
    this.userService.changeCurrentToolTipType(str);
    // this.toolTipMessage = this.toolTipMessageList[str];
    // console.log('tooltip message :', this.toolTipMessage);
  }

  getData() {
      this.medicalEmergencyService.getmedicalEmergency(this.token, {user_id: this.userId}).subscribe(
          (response: any) => {
              if (response !== null && response.status) {
                    console.log(response);
                    this.medicalAgent.id = response.data.healthFinance.id;
                    this.medicalAgent.userId = this.userId;
                    this.medicalAgent.firstLegalName = response.data.healthFinance.firstLegalName;
                    this.medicalAgent.lastLegalName = response.data.healthFinance.lastLegalName;
                    this.medicalAgent.fulllegalName = response.data.healthFinance.fullname;
                    this.medicalAgent.backupfirstLegalName = response.data.healthFinance.backupfirstLegalName;
                    this.medicalAgent.backuplastLegalName = response.data.healthFinance.backuplastLegalName;
                    this.medicalAgent.relation = response.data.healthFinance.relation;
                    this.medicalAgent.relationOther = response.data.healthFinance.relationOther;
                    this.medicalAgent.address = response.data.healthFinance.address;
                    this.medicalAgent.city = response.data.healthFinance.city;
                    this.medicalAgent.state = response.data.healthFinance.state;
                    this.medicalAgent.zip = response.data.healthFinance.zip;
                    this.medicalAgent.phone = response.data.healthFinance.phone;
                    this.medicalAgent.country = response.data.healthFinance.country === null ? 'United States' : response.data.healthFinance.country;
                    this.medicalAgent.willInform = response.data.healthFinance.willInform;
                    this.medicalAgent.emailOfAgent = response.data.healthFinance.emailOfAgent;
                    this.medicalAgent.anyBackupAgent = response.data.healthFinance.anyBackupAgent;
                    this.medicalAgent.backupfulllegalName = response.data.healthFinance.backupFullname;
                    this.medicalAgent.backupRelation = response.data.healthFinance.backupRelation;
                    this.medicalAgent.backupRelationOther = response.data.healthFinance.backupRelationOther;
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
          }, () => {this.loading = false;}
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
        //console.log(this.medicalAgent.fulllegalName);
        // console.log(this.medicalAgent.emailOfAgent);
        let formBody = new FormData();
        formBody.append('userId', this.medicalAgent.userId);
        formBody.append('firstLegalName', this.medicalAgent.firstLegalName);
        formBody.append('lastLegalName', this.medicalAgent.lastLegalName);
        formBody.append('fullname', this.medicalAgent.fulllegalName);
        formBody.append('backupfirstLegalName', this.medicalAgent.backupfirstLegalName);
        formBody.append('backuplastLegalName', this.medicalAgent.backuplastLegalName);
        formBody.append('backupFullname', this.medicalAgent.backupfulllegalName);
        formBody.append('lastLegalName', this.medicalAgent.lastLegalName);
        formBody.append('relation', this.medicalAgent.relation);
        formBody.append('relationOther', this.medicalAgent.relation === 'Other' ? this.medicalAgent.relationOther : '');
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
        formBody.append('backupRelationOther', this.medicalAgent.backupRelation === 'Other' ? this.medicalAgent.backupRelationOther : '');
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

  goBack() {
    this.router.navigate(['/dashboard']);
  }
}
