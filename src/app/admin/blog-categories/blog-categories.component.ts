import { Component, OnInit, TemplateRef } from '@angular/core';
import { DashboardService } from './../dashboard.service';
import { BsModalRef, BsModalService } from "ngx-bootstrap/modal";
import {BlogService} from '../blog.service';

@Component({
  selector: 'app-blog-categories',
  templateUrl: './blog-categories.component.html',
  styleUrls: ['./blog-categories.component.css']
})
export class BlogCategoriesComponent implements OnInit {
    
    blogCategoryList: any[] = [];
    blogCategoryCount: number;
    blogCategoryData: any[] = [];
    delBlogCategoryId: number;
    delBlogStatusMsg: string = "Are You Sure?";
    delBlogStatus: string;

    public modalRef : BsModalRef;

  constructor(private dashService : DashboardService,
              private modalService : BsModalService,
              private blogService: BlogService
  ) { }

  ngOnInit() {
    this.populateBlogCategorys();
  }

    populateBlogCategorys(){
        this.dashService.blogCategoryList().subscribe(
            (data:any)=> {
                this.blogCategoryList = data.data.categoryDetails;
                this.blogCategoryCount = this.blogCategoryList.length;
            }
        )
    }

    public openModal(template :  TemplateRef<any>, index){
        this.modalRef = this.modalService.show(template);
        this.blogCategoryData = this.blogCategoryList[index];
        this.delBlogCategoryId = this.blogCategoryList[index].id;
    }


    onCancel() {
        this.modalRef.hide();
        this.delBlogCategoryId = null;
    }

    onBlogDel() {
        this.blogService.deleteBlogCat(this.delBlogCategoryId).subscribe(
            (data: any) => {
                this.delBlogStatus = data.status;
                if (this.delBlogStatus) {
                    let blogModalRef = this;
                    blogModalRef.delBlogStatusMsg = data.message;
                    setTimeout(function(){
                        blogModalRef.modalRef.hide();
                        this.delBlogId = null;
                    }, 2000);
                    this.populateBlogCategorys();
                }
            }
        );
    }

}
