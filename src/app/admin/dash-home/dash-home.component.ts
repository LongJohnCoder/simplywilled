import { Component, OnInit } from '@angular/core';
import { DashboardService } from './../dashboard.service';

@Component({
  selector: 'app-dash-home',
  templateUrl: './dash-home.component.html',
  styleUrls: ['./dash-home.component.css'],
})
export class DashHomeComponent implements OnInit {

  blogList:any;
  blogListCount:number = 0;
  packages:any;
  packagesCount:number = 0;

  constructor(
    private dashService : DashboardService
  ) { }

  ngOnInit() {
    this.dashService.blogList().subscribe(
      (data:any)=> {
        this.blogList = data.data;
        this.blogListCount = this.blogList.BlogDetails.length;
        console.log('blog',this.blogList)
    }
    )

    this.dashService.packages().subscribe(
      (data:any)=> {
        this.packages = data.data;
        //this.packagesCount = this.blogs.BlogDetails.length;
        console.log('packages',this.packages)
    }
    )


  }

}
