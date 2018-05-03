import { Component, OnInit, TemplateRef } from '@angular/core';
import { DashboardService } from './../dashboard.service';
import { BsModalRef, BsModalService } from "ngx-bootstrap/modal";

@Component({
  selector: 'app-blog-categories',
  templateUrl: './blog-categories.component.html',
  styleUrls: ['./blog-categories.component.css']
})
export class BlogCategoriesComponent implements OnInit {
    
    blogCategoryList:any[] = [];
    blogCategoryCount:number;
    blogCategoryData:any[] = [];
    delBlogCategoryId:number;

    public modalRef : BsModalRef;

  constructor(private dashService : DashboardService,
              private modalService : BsModalService,) { }

  ngOnInit() {
    this.populateBlogCategorys();
  }

    populateBlogCategorys(){
        this.dashService.blogCategoryList().subscribe(
            (data:any)=> {
                this.blogCategoryList = data.data.categoryDetails;
                this.blogCategoryCount = this.blogCategoryList.length;
                // console.log('blogCategorylist',this.blogCategoryList)
            }
        )
    }

    public openModal(template :  TemplateRef<any>, index){
        // console.log(index);
        this.modalRef = this.modalService.show(template);
        this.blogCategoryData = this.blogCategoryList[index];
        this.delBlogCategoryId = this.blogCategoryList[index].id;
    }

}
