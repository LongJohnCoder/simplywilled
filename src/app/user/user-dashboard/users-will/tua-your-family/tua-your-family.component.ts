import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { UserService } from '../../../user.service';
import { UserAuthService } from '../../../user-auth/user-auth.service';
import * as moment from 'moment';
import { FormBuilder, FormControl, FormGroup, Validators, FormArray } from "@angular/forms";


@Component({
    selector: 'app-tua-your-family',
    templateUrl: './tua-your-family.component.html',
    styleUrls: ['./tua-your-family.component.css']
})
export class TuaYourFamilyComponent implements OnInit {
    columns = [];
    otherChildren :boolean = false;
    deceasedChildrenNames :boolean = false;
    days: string[] = [];
    months: string[];
    years: string[] = [];
    user: any;
    userInfo: any;
    today: any;
    chidrenForm: FormGroup;
    childrenInfo = {
        "user_id":'',
        "fullname":"",
        "dob":"",
        "gender":""
    };
    constructor( private router: Router,
                 private userService: UserService,
                 private authService: UserAuthService,
                 private fb : FormBuilder) {
        this.months = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '11', '12'];
        this.chidrenForm = this.fb.group({
            'totalChildren' : ['',Validators.required],
            'user_id' : '',
            'step' : 2,
            'childrenInfo' : this.fb.array([this.childrenInfo]),
            'deceasedChildren' : 0,
            'deceasedChildrenNames' : '',
        });
        this.user = this.authService.getUser();
    }

    ngOnInit() {
        this.userService.getUserDetails(this.user.id).subscribe(
            (response: any) => {
                     console.log(response.data[1].data);
                if ( response.data[1].data ) {
                    this.userInfo = response.data[1].data;
                    this.userInfo.totalChildren = response.data[1].data.totalChildren;
                    this.userInfo.isDesceasedChildren = response.data[1].data.isDesceasedChildren;
                    this.userInfo.deceasedChildreNames = response.data[1].data.deceasedChildreNames;
                    this.userInfo.childrenInformation = response.data[1].data.childrenInformation;
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

    selectedNumberOfChildren(event: any) {
        var numberofChild = event.target.value;
        if (numberofChild != '0') {
            this.otherChildren = false;
            this.columns = [];
            for (var i=0 ; i < numberofChild; i++) {
                this.columns.push({'userId': '', 'fullName': '', 'gender': '', 'dob': ''});
            }
        }
        if (numberofChild == 'other') {
            this.otherChildren = true;
        }else{
            this.otherChildren = false;
        }
    }

    checkIsDeceasedChildren(event: any){
        var IsDeceasedChildrenValue = event.target.value;
        if(IsDeceasedChildrenValue == '1'){
            this.deceasedChildrenNames = true;
        }else{
            this.deceasedChildrenNames = false;
        }
    }

    goBack() {
        this.router.navigate(['/dashboard/will']);
    }

    onSubmit() {

    }
}
