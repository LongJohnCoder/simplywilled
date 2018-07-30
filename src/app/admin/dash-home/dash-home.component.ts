import {Component, OnInit, TemplateRef} from '@angular/core';
import { DashboardService } from './../dashboard.service';
import {BsModalRef, BsModalService} from 'ngx-bootstrap/modal';
import {UsersService} from '../users-management/users.service';

@Component({
  selector: 'app-dash-home',
  templateUrl: './dash-home.component.html',
  styleUrls: ['./dash-home.component.css'],
})
export class DashHomeComponent implements OnInit {

  dashData:any;
  blogCount:number;
  catCount:number;
  commentCount:number;
  userCount:number;
    packages: number;
    faqs: number;
    coupons: number;
    public modalRef: BsModalRef;
    message: string = null;
    waitFor: boolean;
    actionID: number;
  users:any[] = [];

  constructor(
    private dashService: DashboardService,
    private userService: UsersService,
    private modalService: BsModalService
  ) { }

  ngOnInit() {
      this.userList();
  }

  userList() {
      this.message = null;
      this.waitFor = null;
      this.dashService.dashboard().subscribe(
          (data: any) => {
              this.dashData = data.data;
              this.blogCount = this.dashData.totalBlogs;
              this.catCount = this.dashData.totalCategories;
              this.commentCount = this.dashData.totalComments;
              this.userCount = this.dashData.totalUsers;
              this.packages = this.dashData.packages;
              this.faqs = this.dashData.faqs;
              this.coupons = this.dashData.coupons;
              this.users = this.dashData.users;
          });
  }
    public showModal(template:  TemplateRef<any>, action: string, id: number){
        this.message = null;
        this.waitFor = null;
        this.modalRef = this.modalService.show(template);
        this.actionID = id;
        if (action === 'delete') {
            this.message = 'Are you sure?';
            this.waitFor = false;
        } else {
            console.log(id);
        }
    }


    onUserDel(id: number) {
        this.waitFor = true;
        this.message = 'Please wait...';
        this.userService.deleteUser({'user_id': id}).subscribe(
            (data: any) => {
                this.message = data.message;
            }, (error: any) => {
                this.message = error.error.message;
            });
        const ch = this;
        setTimeout(function () {
            ch.userList();
            ch.modalRef.hide();
        }, 2000);
    }

}
