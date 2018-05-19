import { Component, OnInit } from '@angular/core';
import { ProtectYourFinancesService } from './protect-your-finances.service';
import { platformBrowserDynamic } from '@angular/platform-browser-dynamic';
import { Router,ActivatedRoute, Route } from '@angular/router';
import { HttpErrorResponse } from '@angular/common/http';
import { NgForm } from '@angular/forms';

import { UserAuthService } from '../../user-auth/user-auth.service';
import { UserService } from '../../user.service';
import { Validators, FormGroup, FormBuilder, FormControl, FormArray } from '@angular/forms';
//import { ProtectYourFinances } from './models/protectYourFinances';
import { PYFAttorneyPowers } from './models/pyf-attorney-powers';


@Component({
  selector: 'app-protect-your-finances',
  templateUrl: './protect-your-finances.component.html',
  styleUrls: ['./protect-your-finances.component.css']
})
export class ProtectYourFinancesComponent implements OnInit {

  public poaData : any;
  public myForm : FormGroup;
  public pyfData: any;//PYFAttorneyPowers;
  public response: any;
  errorMessage : string = '';
  stateInfo : string;
  
  constructor(
    private protectYourFinancesService : ProtectYourFinancesService,
    private fb : FormBuilder,
    private authService : UserAuthService,
    private userService : UserService,
    private router: Router
  ) {
    //this.getPoaData(); 
    this.createForm();
    this.getStates();
    //console.log(this.myForm.get('isDurable').value);
  }
  
  ngOnInit() {
    //console.log('came here **********');
   // this.getStates();
    //console.log('came here');
    this.getPoaData();
  }

  getPoaData() {
    this.protectYourFinancesService.getPoaDetails().subscribe(
      (response: any) => {

        console.log('total data : ',response.data);
        this.response = response.data;
        this.pyfData = JSON.parse(response.data.attorney_powers);
        console.log('needed data : ',this.pyfData);
        this.poaData = new Array(this.pyfData).map(gr => gr );//this.fb.group(gr));
        console.log('form elements : ',this.poaData);
        this.createForm(this.poaData);
      //  console.log('adliad',this.poaData);
      },
      (error: any) => {
        //console.log(error);
      }
    )
  }

  /* *
    *   Get data object from api
    *   slice that in 2 parts : categories as faqData , q & a from categories as faqDetails
    * */
  getStates() {
    this.protectYourFinancesService.getStates().subscribe(
        (data: any) => {
            this.stateInfo = data.stateInfo.type;
            // this.stateInfo = 'trans';
            // switch(this.stateInfo) {
            //   case 'trans': this.router.navigate(['/dashboard']);
            //         break;
            //   default: break;
            // }
            console.log('state : ',this.stateInfo);
        }, (error : any) => {
            console.log(error);
            setTimeout(() => {
              this.errorMessage = '';
          },3000);
        }
    );
  }

  createForm(dt: Array<any> = []){
    let formObj = typeof dt[0] !== undefined ? dt[0] : null;
    console.log('form obj : ',formObj);
    
      this.myForm = this.fb.group({
        //this are 2 inter dependant fields
        isDurable                 : new FormControl(formObj !== undefined && formObj !== null && formObj.isDurable !== undefined 
                                        ? formObj.isDurable : 0),
        isIncapacity              : new FormControl(formObj !== undefined && formObj !== null && formObj.isIncapacity !== undefined 
                                        ? formObj.isIncapacity : 0),
        
        //this are 2 inter dependant fields
        isAuthorizeToMakeGift     : new FormControl(formObj !== undefined && formObj !== null && formObj.isAuthorizeToMakeGift !== undefined 
                                        ? formObj.isAuthorizeToMakeGift : 0),
        isAuthorizeToOperategift  : new FormControl(formObj !== undefined && formObj !== null && formObj.isAuthorizeToOperategift !== undefined 
                                        ? formObj.isAuthorizeToOperategift : 0),

        //this fields are only supposed to show up if the state is non-uniform
        isAuthorizeTotrade        : new FormControl(formObj !== undefined && formObj !== null && formObj.isAuthorizeTotrade !== undefined 
                                        ? formObj.isAuthorizeTotrade : 0),
        isAuthorisedToOperateBusiness : new FormControl(formObj !== undefined && formObj !== null && formObj.isAuthorisedToOperateBusiness !== undefined 
                                        ? formObj.isAuthorisedToOperateBusiness : 0),
        isAuthorizeToAccessOthers : new FormControl(formObj !== undefined && formObj !== null && formObj.isAuthorizeToAccessOthers !== undefined 
                                        ? formObj.isAuthorizeToAccessOthers : 0),
      });
    
  }

  // checkType(ob,child) {
  //   return ob !== null && ob !== undefined && child !== null && child !== null ? true : false;
  // }

  changeMe(field : string , value) {
      console.log('field : ',field,'value',value);
      this.myForm.get(field).setValue(parseInt(value));
      //this.stateInfo = this.stateInfo === 'uniform' ? 'non-uniform' : 'uniform';
  }

  send() {
    this.response.attorney_powers = this.myForm.value;
    this.response.attorney_holders = JSON.parse(this.response.attorney_holders);
    this.response.attorney_backup = JSON.parse(this.response.attorney_backup);
    console.log(this.response);
    this.protectYourFinancesService.postPoaDetails(this.response).subscribe(
      (data) => {
        console.log('form data after submit response :',data);
      }, (error) => {
        console.log('form data after submit error :',error);
      }
    );
  }

}
