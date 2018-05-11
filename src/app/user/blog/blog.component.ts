import { Component, OnInit } from '@angular/core';
import { BlogService } from "./blog.service";
import * as moment from "moment";
import _date = moment.unitOfTime._date;

@Component({
  selector: 'app-blog',
  templateUrl: './blog.component.html',
  styleUrls: ['./blog.component.css']
})
export class BlogComponent implements OnInit {
    blogList: any[] = [];
    blogCategoryList: any[] = [];
    imageLink: string;
    popularBlogPost: any[] = [];
    recentBlogPost: any[] = [];
  constructor( private BlogService : BlogService ) {

  }

  ngOnInit() {
      this.populateBlog();
      this.populateBlogCategory();
      this.populatePopularBlogPosts();
      this.populateRecentBlogPosts();
  }


    populateBlog(){
        this.BlogService.blogList().subscribe(
            (data:any)=> {
                 this.blogList = data.data.BlogDetails;
                 this.imageLink = data.data.imageLink;
            }
        )
    }

    populateBlogCategory(){
      this.BlogService.getBlogCategoryList().subscribe(
          (data:any)=>{
              this.blogCategoryList = data.data.categories;
          }
      )
    }

    populatePopularBlogPosts(){
        this.BlogService.getPopularBlogPosts().subscribe(
            (data:any)=>{
                let list: string[] = [];
                data.data.forEach(function (value) {
                    list.push(value.blog);
                });
                 this.popularBlogPost = list;
            }
        )
    }
    populateRecentBlogPosts(){
        this.BlogService.getRecentBlogPosts().subscribe(
            (data:any)=>{
                let list: string[] = [];
                data.data.forEach(function (value) {
                    list.push(value.blog);
                });
                this.recentBlogPost = list;
            }
        )
    }




}
