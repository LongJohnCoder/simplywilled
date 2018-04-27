import { Component, OnInit } from '@angular/core';
import { DashboardService } from './../dashboard.service';

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
  users:any[] = [];

  constructor(
    private dashService : DashboardService,
    
  ) { }

  ngOnInit() {
    this.dashService.dashboard().subscribe(
      (data:any)=> {
        this.dashData = data.data;
        this.blogCount = this.dashData.totalBlogs;
        this.catCount = this.dashData.totalCategories;
        this.commentCount = this.dashData.totalComments;
        this.userCount = this.dashData.totalUsers;
        this.users = this.dashData.users;
    }
    )

  }

}
