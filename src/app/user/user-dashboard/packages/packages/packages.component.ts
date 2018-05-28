import { Component, OnInit } from '@angular/core';
import {PackagesService} from '../packages.service';

@Component({
  selector: 'app-packages',
  templateUrl: './packages.component.html',
  styleUrls: ['./packages.component.css']
})
export class PackagesComponent implements OnInit {
  whatIncl: boolean;
  userId: string;
  token: string;
  data: any;
  currFirst: number;
  currLast: number;
  constructor(
      private packageService: PackagesService
  ) { }

  ngOnInit() {
      this.data = {
        'id': '',
        'name': '',
        'description': '',
        'status': '',
        'key_benefits': '',
        'amount': 0.00,
        'included': ''
      };
      // this.currFirst = 0;
      // this.currLast = 00;
      this.whatIncl = false;
      this.userId = JSON.parse(localStorage.getItem('loggedInUser')).user.id;
      this.token = JSON.parse(localStorage.getItem('loggedInUser')).token;
      this.getPackages();
  }

  showIncluded() {
    this.whatIncl = !this.whatIncl;
  }

  getPackages() {
    this.packageService.getPackages(this.token).subscribe(
        (resp: any) => {
            this.data.id = resp.data[0].id;
            this.data.name = resp.data[0].name;
            this.data.description = resp.data[0].description;
            this.data.status = resp.data[0].status;
            this.data.amount = resp.data[0].amount;
            this.data.key_benefits = JSON.parse(resp.data[0].key_benefits);
            this.data.included = JSON.parse(resp.data[0].included);
            // const price = this.data.amount.toString().split('.');
            // this.currFirst = price[0];
            // if (price.hasOwnProperty(1) !== true ) {
            //
            //     this.currLast = 00;
            // } else {
            //     this.currLast = price[1];
            // }


            console.log(this.data.id);

        }, (error: any) => {
            console.log(error.error);
        }
    );
  }

  purchase(id: string) {
      const body = new FormData();
      body.append('pkg_id', id);
      body.append('user_id', this.userId);
      body.append('token', this.token);
    this.packageService.purchasePackage(body).subscribe(
        (resp: any) => {

        }, (error: any) => {

        }
    );
  }

}
