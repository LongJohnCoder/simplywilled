import { Component, OnInit, TemplateRef } from '@angular/core';
import { BsModalRef, BsModalService } from 'ngx-bootstrap/modal';
import { Router } from '@angular/router';
import {PackagesService} from '../user-dashboard/packages/packages.service';
@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

  public modalRef : BsModalRef;
  public whatIncl : boolean = false;
  data: any;

  constructor(
    private modalService : BsModalService,
    private packageService: PackagesService,
    private router: Router,
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
      this.getPackages();
  }

  public openModal(template :  TemplateRef<any>){
   this.modalRef = this.modalService.show(template);
  }

  ourTeam(){
    this.router.navigate(['/about-us'], { queryParams: { id: 'our-team' } });
  }

  showIncluded(){
    this.whatIncl = !this.whatIncl;
  }

    getPackages() {
        this.packageService.getPackages().subscribe(
            (resp: any) => {
                this.data.id = resp.data[0].id;
                this.data.name = resp.data[0].name;
                this.data.description = resp.data[0].description;
                this.data.status = resp.data[0].status;
                this.data.amount = resp.data[0].amount;
                this.data.key_benefits = JSON.parse(resp.data[0].key_benefits);
                this.data.included = JSON.parse(resp.data[0].included);

                // console.log(this.data.id);

            }, (error: any) => {
                console.log(error.error);
            }
        );
    }

  
}
