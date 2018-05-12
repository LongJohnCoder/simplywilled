import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { UserService } from '../../../user.service';
import { UserAuthService } from '../../../user-auth/user-auth.service';
import * as moment from 'moment';
import { FormBuilder, FormControl, FormGroup, Validators, FormArray } from "@angular/forms";
import {UserDashboardService} from '../../user-dashboard.service';


@Component({
    selector: 'app-tua-your-family',
    templateUrl: './tua-your-family.component.html',
    styleUrls: ['./tua-your-family.component.css']
})
export class TuaYourFamilyComponent implements OnInit {
    columnFormArray: FormArray;
    otherChildren :boolean = false;
    deceasedChildrenNames :boolean = false;
    days: string[] = [];
    months: string[];
    years: string[] = [];
    user: any;
    userInfo: any;
    today: any;
    errorMessage: string;
    chidrenForm: FormGroup;
    showTable : boolean =  false;
    editFlag: boolean = false;
    maxChidren: string = '';
    constructor( private router: Router,
                 private userService: UserService,
                 private authService: UserAuthService,
                 private dashboardService: UserDashboardService,
                 private fb: FormBuilder) {
        this.createForm();
        this.months = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '11', '12'];
        this.user = this.authService.getUser();

    }

    createForm() {
        this.chidrenForm = this.fb.group({
            'totalChildren' : ['', [Validators.required, Validators.maxLength(20)]],
            'user_id' : '',
            'step' : ['2'],
            'childrenInfo' : this.fb.array([]),
            'deceasedChildren' : ['0'],
            'deceasedChildrenNames' : [''],
        });
    }

    createItem(editFlag = false,userInfo = null): FormGroup {
        let dobSplit = userInfo !== null ? userInfo.dob.split('-') : '';
        return this.fb.group({
            fullname: new FormControl( editFlag && userInfo !== null && userInfo !== undefined ? userInfo.fullname : '',[Validators.required]),
            gender: new FormControl(editFlag && userInfo !== null && userInfo !== undefined ? userInfo.gender : '',[Validators.required]),
            user_id: new FormControl(editFlag && userInfo !== null && userInfo !== undefined ? userInfo.user_id : this.user.id,[Validators.required]),
            spouseMonth: new FormControl(editFlag && userInfo !== null && userInfo !== undefined ? dobSplit[1] : '',[Validators.required]),
            spouseDay: new FormControl(editFlag && userInfo !== null  && userInfo !== undefined ? dobSplit[2] : '',[Validators.required]),
            spouseYear: new FormControl(editFlag && userInfo !== null  && userInfo !== undefined ? dobSplit[0] :  '',[Validators.required])
        });
    }
    get childrenInfo(): FormArray {
        return this.chidrenForm.get('childrenInfo') as FormArray;
    };

    ngOnInit() {
        this.chidrenForm.controls['user_id'].setValue(this.user.id);
        this.userService.getUserDetails(this.user.id).subscribe(
            (response: any) => {
                    this.dashboardService.updateUserDetails(response.data);
                if ( response.data[1].data ) {
                    this.editFlag = true;
                    this.userInfo = response.data[1].data;
                    this.userInfo.totalChildren = response.data[1].data.totalChildren;
                    this.userInfo.isDesceasedChildren = response.data[1].data.desceasedChildren ;
                    this.userInfo.deceasedChildreNames = response.data[1].data.deceasedChildrenNames;
                    this.userInfo.childrenInformation = response.data[1].data.childrenInformation;
                    this.setData(this.editFlag,this.userInfo);
                }
            },
            (error: any) => {
                console.log(error);
            }
        );
        this.today = new Date ;
        const currentYear = moment(this.today).year();
        for (let i = currentYear; i > (currentYear - 101) ; i--) {
            this.years.push(String(i));
        }
        for (let i = 1; i <= 31 ; i++) {
            let day = (i / 10) < 1 ? '0' + String(i) : String(i);
            this.days.push(day);
        }
    }

    setData(editFlag, userInfo) {
        this.deceasedChildrenNames = this.userInfo.isDesceasedChildren == "Yes" ;
        this.chidrenForm.controls['totalChildren'].setValue( this.userInfo.totalChildren);
        this.chidrenForm.controls['deceasedChildren'].setValue( this.userInfo.isDesceasedChildren);
        this.chidrenForm.controls['deceasedChildrenNames'].setValue( this.userInfo.deceasedChildreNames);
        this.columnFormArray = this.chidrenForm.get('childrenInfo') as FormArray;
        for (let i=0; i < userInfo.childrenInformation.length ; i++) {
            this.columnFormArray.push(this.createItem(editFlag,userInfo.childrenInformation[i]));
        }
        this.showTable = true;
    }
    selectedNumberOfChildren(event: any) {
        this.showTable = false;
        this.columnFormArray = this.chidrenForm.get('childrenInfo') as FormArray;
        this.clearFormArray(this.columnFormArray);
        let numberofChild = event.target.value;
        if (Number(numberofChild) > 20) {
            this.maxChidren = 'Max'
            return;
        }
        this.maxChidren = '';
        if (numberofChild !== '0' && numberofChild !== '' ) {
            this.otherChildren = false;
         //   this.columns = [];
            for (let i = 0 ; i < numberofChild; i++) {
                this.columnFormArray.push(this.createItem(this.editFlag, this.userInfo.childrenInformation[i]));
            }
            this.showTable = true;
        }
        if (numberofChild === 'other') {
            this.chidrenForm.controls['totalChildren'].setValue('');
            this.otherChildren = true;
        }else{
            this.otherChildren = false;
        }
    }
    clearFormArray(formArray: FormArray)  {
        while (formArray.length !== 0) {
            formArray.removeAt(0);
        }
    }

    checkIsDeceasedChildren(event: any) {
        const IsDeceasedChildrenValue = event.target.value;
        if (IsDeceasedChildrenValue === '1') {
            this.deceasedChildrenNames = true;
        } else {
            this.deceasedChildrenNames = false;
        }
    }

    goBack() {
        this.router.navigate(['/dashboard/will']);
    }
    onSubmit() {

        for (let i=0; i < this.chidrenForm.value.childrenInfo.length; i++) {
            let dob = this.chidrenForm.value.childrenInfo[i].spouseYear + '-' + this.chidrenForm.value.childrenInfo[i].spouseMonth + '-' + this.chidrenForm.value.childrenInfo[i].spouseDay;
            this.chidrenForm.value.childrenInfo[i].dob = dob;
        }
        //console.log(this.chidrenForm.value);
        this.userService.editProfile(this.chidrenForm.value).subscribe(
            (data: any) =>  {
                console.log(data.data);
                if (!data.data.childrenData.length) {
                    this.router.navigate(['/dashboard']);
                } else {
                    this.router.navigate(['/dashboard/will/3']);
                }
            },
            (error: any) => {
                for(let prop in error.error.message) {
                    this.errorMessage = error.error.message[prop];
                    break;
                };
                setTimeout(() => {
                    this.errorMessage = '';
                },3000);

            }
        );
    }
}
