import { Component, OnInit } from '@angular/core';
import {PackagesService} from '../packages/packages.service';

@Component({
  selector: 'app-subscribed-package',
  templateUrl: './subscribed-package.component.html',
  styleUrls: ['./subscribed-package.component.css']
})
export class SubscribedPackageComponent implements OnInit {
    data: any;
    whatIncl: boolean;

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
          'included': '',
          'slug': ''
      };
      this.whatIncl = false;
      this.packageService.getPackages().subscribe(
          (resp: any) => {
              this.data.id = resp.data[0].id;
              this.data.name = resp.data[0].name;
              this.data.description = resp.data[0].description;
              this.data.status = resp.data[0].status;
              this.data.amount = resp.data[0].amount;
              this.data.key_benefits = JSON.parse(resp.data[0].key_benefits);
              this.data.included = JSON.parse(resp.data[0].included);
              this.data.slug = resp.data[0].slug;

          }, (error: any) => {
              console.log(error.error);
          }
      );
  }
    showIncluded() {
        this.whatIncl = !this.whatIncl;
    }

}
