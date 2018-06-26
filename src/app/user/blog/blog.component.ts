import { Component, OnInit } from '@angular/core';
import { BlogService } from './blog.service';
import * as moment from 'moment';
import {FormControl, Validators, FormGroup} from '@angular/forms';
import {environment} from '../../../environments/environment';


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
    subscriberEmailForm: any;
    subscriberEmail: FormControl;
    totalBlog: number;
    p: number;
    loader: boolean;
    baseURL = environment.base_url;
   constructor(private blogService: BlogService) {
        
   }

  ngOnInit() {
      this.p = 1;
      this.totalBlog = null;
      this.populateBlog();
      this.populateBlogCategory();
      this.populatePopularBlogPosts();
      this.populateRecentBlogPosts();
      this.createFormControls();
      this.createForm();
  }


    populateBlog() {
        this.loader = true;
        this.blogService.blogList(this.p).subscribe(
            (data: any) => {
                 this.blogList = data.data.BlogDetails;
                 this.imageLink = data.data.imageLink;
                 this.totalBlog = data.data.totalBlogs;
            }
        );
        this.loader = false;
        window.scrollTo({ left: 0, top: 0, behavior: 'smooth' });
    }

    populateBlogCategory() {
      this.blogService.getBlogCategoryList().subscribe(
          (data: any) => {
              this.blogCategoryList = data.data.categories;
          }
      );
    }

    populatePopularBlogPosts() {
        this.blogService.getPopularBlogPosts().subscribe(
            (data: any) => {
                const list: string[] = [];
                if (data.data !== null) {
                    data.data.forEach(function (value) {
                        list.push(value.blog);
                    });
                    this.popularBlogPost = list;
                }
            }
        );
    }
    populateRecentBlogPosts() {
        this.blogService.getRecentBlogPosts().subscribe(
            (data: any) => {
                const list: string[] = [];
                if (data.data !== null) {
                    data.data.forEach(function (value) {
                        list.push(value.blog);
                    });
                    this.recentBlogPost = list;
                }
            }
        );
    }

    createFormControls() {
        this.subscriberEmailForm = new FormControl();
        this.subscriberEmail = new FormControl('', [
            Validators.required,
            Validators.pattern('[^ @]*@[^ @]*')
        ]);
    }

    createForm() {
        this.subscriberEmailForm = new FormGroup({
            subscriberEmail : this.subscriberEmail
        });
    }

    onSubmit() {
        if (this.subscriberEmailForm.valid) {
            this.blogService.subscribeEmailNewsletter(this.subscriberEmailForm.value).subscribe(
                (data: any) => {
                    if (data.status = 'true' ) {
                        alert(data.message);
                        this.subscriberEmailForm.reset();
                    }
                }
            );
        }
    }

    changePage(page: number) {
       this.p = page;
       this.populateBlog();
    }
}
