import {ChangeDetectorRef, Component, OnInit, TemplateRef} from '@angular/core';
import { DashboardService } from './../dashboard.service';
import { BsModalRef, BsModalService } from 'ngx-bootstrap/modal';
import * as $ from 'jquery';
import 'datatables.net';
import 'datatables.net-bs4';

@Component({
  selector: 'app-blogs',
  templateUrl: './blogs.component.html',
  styleUrls: ['./blogs.component.css']
})
export class BlogsComponent implements OnInit {
  blogList:any[] = [];
  blogCount:number = 0;
  public modalRef : BsModalRef;
  blogData:any;
  delBlogId:number;
  delBlogStatus: false;
  delBlogStatusMsg:string = "Are You Sure?";
  dataTable: any;
  comments: any[] = [];
  responseStatus : false;
  createBlogMessage : string;
    searchBox: string = null;
    pageSize = 10;
    p = 1;
    total = 0;
    orderBy = {};

  constructor(
    private dashService : DashboardService,
    private modalService : BsModalService,
    private chRef: ChangeDetectorRef

  ) { }

  populateBlogs(page: number, search: string, orderBy: any) {
      // console.log(page);
    this.dashService.getBlogs({'page': page, 'search': search, 'orderBy': orderBy, 'pageSize': this.pageSize}).subscribe(
      (data: any) => {
          this.blogList = data.data.BlogDetails;
          this.blogCount = data.data.blogCount;
          this.total = data.data.totalBlogs;
          this.p = page;
        // console.log('bloglist',this.blogList);
        //   this.chRef.detectChanges();
        //   const table: any = $('table');
        //   this.dataTable = table.DataTable();
      }
    );
  }

  ngOnInit() {
      this.orderBy['created_at'] = 'desc';
    this.populateBlogs(this.p, this.searchBox, this.orderBy);
  }

 public openModal(template :  TemplateRef<any>, index){
  this.modalRef = this.modalService.show(template);
  this.blogData = this.blogList[index];
  this.delBlogId = this.blogList[index].id;
  this.comments = this.blogList[index].comments;
 }
 
    public showModal(template:  TemplateRef<any>, index){
        this.modalRef = this.modalService.show(template);
        this.blogData = this.blogList[index];
        // console.log(this.blogData);
        this.responseStatus = false;
        this.createBlogMessage = 'Are you sure?';

    }
 
 onCancel(){
  this.modalRef.hide();
  this.delBlogId = null;
 }

 onBlogDel() {
  this.dashService.deleteBlog(this.delBlogId).subscribe(
    (data:any)=> {
      this.delBlogStatus = data.status;
      if(this.delBlogStatus){
        let blogModalRef = this;
        blogModalRef.delBlogStatusMsg = data.message;
        setTimeout(() => {
            blogModalRef.modalRef.hide();
            setTimeout(() => {
                // this.delBlogStatusMsg = "Are You Sure?";
                // this.delBlogStatus = false;
                // this.delBlogId = null;
            }, 500);
        }, 2000);
        // window.location.reload();
        this.populateBlogs(this.p, this.searchBox, this.orderBy);
          // this.populateBlogs();
      }
    }
  );
 }
 
 onUpdateStatus() {
      // console.log(this.blogData);
    this.createBlogMessage = 'Processing...';
    let status = (this.blogData.status === '1')? 0 : (this.blogData.status === '0' ? '1' : '0');
    let blogObject = {'id' : parseInt(this.blogData.id, 10), 'status' : status};
    this.dashService.updateBlogStatus(blogObject).subscribe(
        (data:any)=> {
            this.responseStatus = data.status;
            if(this.responseStatus){
                let blogModalRef = this;
                blogModalRef.createBlogMessage = data.message;
                setTimeout(() => {
                    blogModalRef.modalRef.hide();
                    setTimeout(() => {}, 2000);
                }, 1000);
                this.populateBlogs(this.p, this.searchBox, this.orderBy);
                // window.location.reload();
            }
        }
    );
 }

    /**
     * Table order by
     */
    orderTable(col: string) {
        const orderType = this.orderBy[col];
        this.orderBy = {};
        this.orderBy[col] = orderType === 'asc' ? 'desc' : 'asc';
        this.populateBlogs(this.p, this.searchBox, this.orderBy);
    }

    /**
     * Page Size change
     */
    pageSizeChange() {
        this.populateBlogs(this.p, this.searchBox, this.orderBy);
    }


}
