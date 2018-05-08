import { Component, OnInit, TemplateRef } from '@angular/core';
import { DashboardService } from './../dashboard.service';
import { BsModalRef, BsModalService } from 'ngx-bootstrap/modal';

@Component({
  selector: 'app-blogs',
  templateUrl: './blogs.component.html',
  styleUrls: ['./blogs.component.css']
})
export class BlogsComponent implements OnInit {

  blogList:any[] = [];
  blogCount:number;
  public modalRef : BsModalRef;
  blogData:any[] = [];
  delBlogId:number;
  delBlogStatus:string;
  delBlogStatusMsg:string = "Are You Sure?";

  constructor(
    private dashService : DashboardService,
    private modalService : BsModalService,
  ) { }

  populateBlogs(){
    this.dashService.blogList().subscribe(
      (data:any)=> {
        this.blogList = data.data.BlogDetails;
        this.blogCount = this.blogList.length;
        console.log('bloglist',this.blogList)
      }
    )
  }

  ngOnInit() {
    this.populateBlogs();
  }

 public openModal(template :  TemplateRef<any>, index){
   console.log(index);
  this.modalRef = this.modalService.show(template);
  this.blogData = this.blogList[index];
  this.delBlogId = this.blogList[index].id;
 }
 
 onCancel(){
  this.modalRef.hide();
  this.delBlogId = null;
 }

 onBlogDel(){
  this.dashService.deleteBlog(this.delBlogId).subscribe(
    (data:any)=> {
      this.delBlogStatus = data.status;
      if(this.delBlogStatus){ 
        let blogModalRef = this;
        blogModalRef.delBlogStatusMsg = data.message;
        setTimeout(function(){
          blogModalRef.modalRef.hide();
          this.delBlogId = null;
        }, 2000);
        this.populateBlogs();
      }
    }
  );
 }





}
