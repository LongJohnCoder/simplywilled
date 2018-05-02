import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import * as moment from  'moment';
import * as _ from 'lodash';
import {UserService} from '../../../user.service';
import {Router} from '@angular/router';
@Component({
  selector: 'app-tell-us-about-yourself',
  templateUrl: './tell-us-about-yourself.component.html',
  styleUrls: ['./tell-us-about-yourself.component.css']
})
export class TellUsAboutYourselfComponent implements OnInit {
  days: string[];
  months: string[];
  years: string[];
  errorMessage: string;


  constructor(private userService: UserService,private router: Router) {
    this.months = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '11', '12'];
    this.days = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '11', '12'];
    this.years = ['2018', '2017'];

  }
  ngOnInit() {
  }

  onSubmit(form: NgForm) {
    console.log(form.value);
    const formData = form.value;
    // formData.dob = formData.year + '-' + formData.month + '-' + formData.day ;
    // formData.spouseDob = formData.spouseYear + '-' + formData.spouseMonth + '-' + formData.spouseDay ;
    const user = JSON.parse(localStorage.getItem('loggedInUser'));
    formData.userId = user.user.id ;
    formData.step = 1;
    //formData.dob = moment(formData.dob).format('yyyy-mm-dd');
    //formData.spouseDob = moment(formData.spouseDob).format('yyyy-mm-dd');
    console.log(formData);
    this.userService.editProfile(formData).subscribe(
        (data: any) =>  {
          console.log(data);
          this.router.navigate(['/dashboard/will/2']);
        },
        (error: any) => {
          console.log(error);
          for(let prop in error.error.message){
            this.errorMessage = error.error.message[prop];
            break;
          };
          console.log(this.errorMessage);
          setTimeout(() => {
            this.errorMessage = '';
          },3000)

        }
    );
  }

}
