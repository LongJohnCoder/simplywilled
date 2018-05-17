import { Component, OnInit } from '@angular/core';
import { BlogService } from './blog.service';
import * as moment from 'moment';
import {FormControl, Validators, FormGroup} from '@angular/forms';


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
    
    p: number;
   constructor(private blogService: BlogService) {
        
   }

  ngOnInit() {
      this.p = 1;
      this.populateBlog();
      this.populateBlogCategory();
      this.populatePopularBlogPosts();
      this.populateRecentBlogPosts();
      this.createFormControls();
      this.createForm();
  }


    populateBlog() {
        this.blogService.blogList().subscribe(
            (data: any) => {
                 this.blogList = data.data.BlogDetails;
                 this.imageLink = data.data.imageLink;
            }
        );
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
                data.data.forEach(function (value) {
                    list.push(value.blog);
                });
                 this.popularBlogPost = list;
            }
        );
    }
    populateRecentBlogPosts() {
        this.blogService.getRecentBlogPosts().subscribe(
            (data: any) => {
                const list: string[] = [];
                data.data.forEach(function (value) {
                    list.push(value.blog);
                });
                this.recentBlogPost = list;
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


}
