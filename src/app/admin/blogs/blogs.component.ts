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
  blogData:any[] = [];
  delBlogId:number;
  delBlogStatus: false;
  delBlogStatusMsg:string = "Are You Sure?";
  dataTable: any;
  comments: any[] = [];
  responseStatus : false;
  createBlogMessage : string;

  constructor(
    private dashService : DashboardService,
    private modalService : BsModalService,
    private chRef: ChangeDetectorRef

  ) { }

  populateBlogs(){
    this.dashService.blogList().subscribe(
      (data:any)=> {
          console.log(data.data);
        this.blogList = data.data.BlogDetails;
        this.blogCount = this.blogList.length;
        // console.log('bloglist',this.blogList);
          this.chRef.detectChanges();
          const table: any = $('table');
          this.dataTable = table.DataTable();
      }
    );
  }

  ngOnInit() {
    this.populateBlogs();
  }

 public openModal(template :  TemplateRef<any>, index){
  this.modalRef = this.modalService.show(template);
  this.blogData = this.blogList[index];
  this.delBlogId = this.blogList[index].id;
  this.comments = this.blogList[index].comments;
 }
 
    public showModal(template :  TemplateRef<any>, index){
        this.modalRef = this.modalService.show(template);
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
        window.location.reload();

          // this.populateBlogs();
      }
    }
  );
 }
 
 onUpdateStatus(blog : any) {
    this.createBlogMessage = 'Processing...';
    let status = (blog.status === '1')? 0 : (blog.status === '0' ? '1' : '0');
    let blogObject = {'id' : parseInt(blog.id, 10), 'status' : status};
    this.dashService.updateBlogStatus(blogObject).subscribe(
        (data:any)=> {
            this.responseStatus = data.status;
            if(this.responseStatus){
                let blogModalRef = this;
                blogModalRef.createBlogMessage = data.message;
                setTimeout(() => {
                    blogModalRef.modalRef.hide();
                    this.blogList = data.data.blogDetails;
                }, 2000);
            }
        }
    );
 }



}
