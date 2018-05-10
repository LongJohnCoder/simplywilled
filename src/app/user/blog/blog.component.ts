import { Component, OnInit } from '@angular/core';
// import { DashboardService } from "../../admin/dashboard.service";
import { BlogService } from '../services/blog.service';

@Component({
  selector: 'app-blog',
  templateUrl: './blog.component.html',
  styleUrls: ['./blog.component.css']
})
export class BlogComponent implements OnInit {
    blogList: any[] = [];
    blogCount: number;
  constructor( private BlogService : BlogService ) {

  }

  ngOnInit() {
      this.populateBlog();
  }


    populateBlog(){
        this.BlogService.blogList().subscribe(
            (data:any)=> {
                console.log(data);
                // this.blogList = data.data.categoryDetails;
                // this.blogCount = this.blogCategoryList.length;
                // this.chRef.detectChanges();
                // const table: any = $('table');
                // this.dataTable = table.DataTable();
            }
        )
    }



}
