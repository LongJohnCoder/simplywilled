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
  blogCount:number;
  public modalRef : BsModalRef;
  blogData:any[] = [];
  delBlogId:number;
  delBlogStatus:string;
  delBlogStatusMsg:string = "Are You Sure?";
  dataTable: any;

  constructor(
    private dashService : DashboardService,
    private modalService : BsModalService,
    private chRef: ChangeDetectorRef

  ) { }

  populateBlogs(){
    this.dashService.blogList().subscribe(
      (data:any)=> {
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
