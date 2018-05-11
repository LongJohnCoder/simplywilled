import {ChangeDetectorRef, Component, OnInit, TemplateRef} from '@angular/core';
import { DashboardService } from './../dashboard.service';
import { BsModalRef, BsModalService } from "ngx-bootstrap/modal";
import {BlogService} from '../blog.service';
import * as $ from 'jquery';
import 'datatables.net';
import 'datatables.net-bs4';

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
    dataTable: any;
    public modalRef : BsModalRef;

  constructor(private dashService : DashboardService,
              private modalService : BsModalService,
              private blogService: BlogService,
              private chRef: ChangeDetectorRef

  ) { }

  ngOnInit() {
    this.populateBlogCategorys();
  }

    populateBlogCategorys(){
        this.dashService.blogCategoryList().subscribe(
            (data:any)=> {
                // console.log(data.data);
                this.blogCategoryList = data.data.categoryDetails;
                this.blogCategoryCount = this.blogCategoryList.length;
                this.chRef.detectChanges();
                const table: any = $('table');
                this.dataTable = table.DataTable();
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
                        // this.delBlogId = null;
                    }, 2000);
                    window.location.reload();

                    // this.populateBlogCategorys();
                }
            }
        );
    }

}
