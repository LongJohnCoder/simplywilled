import { Component, OnInit, TemplateRef } from '@angular/core';
import { BsModalRef, BsModalService } from 'ngx-bootstrap/modal';
import { Router } from '@angular/router';
@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

  public modalRef : BsModalRef;
  public whatIncl : boolean = false;

  constructor(
    private modalService : BsModalService,
    private router: Router,
  ) { }

  ngOnInit() {
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

}
