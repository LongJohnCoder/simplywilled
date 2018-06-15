import {Component, OnInit, TemplateRef} from '@angular/core';
import {DashboardService} from '../../dashboard.service';
import {BsModalRef, BsModalService} from 'ngx-bootstrap/modal';

@Component({
  selector: 'app-update-profile',
  templateUrl: './update-profile.component.html',
  styleUrls: ['./update-profile.component.css']
})
export class UpdateProfileComponent implements OnInit {
  data: any;
  userID: number;
  respMsg: string;
  public modalRef: BsModalRef;

    constructor(
      private dashboardService: DashboardService,
      private modalService: BsModalService,
  ) { }

  ngOnInit() {
    const user = JSON.parse(localStorage.getItem('loggedInAdminData')).user;
    this.userID = +user.id;
      this.createForm();
      this.dashboardService.getProfile({'id': user.id}).subscribe(
        (res: any) => {
            this.data.email = res.data.user.email;
            this.data.name = res.data.user.name;
      }, (err: any) => {
        console.log(err.error.error);
      }
    );
  }

  createForm() {
      this.data = {
          'id': this.userID,
          'name': '',
          'email': '',
          'password': '',
          'conpassword': ''
      };
  }

    update() {
      console.log(this.data);
      this.dashboardService.updateProfile(this.data).subscribe(
          (resp: any) => {
            this.respMsg = resp.message;
            setTimeout(function () {
                window.location.href = '/admin-panel/dashboard';
            }, 2000);
          }, (err: any) => {
              this.respMsg = err.error.error;
          }
      );
    }

    public openModal(template:  TemplateRef<any>) {
        this.respMsg = 'Please wait';
        this.modalRef = this.modalService.show(template);
    }

}
