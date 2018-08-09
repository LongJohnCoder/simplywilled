import { Component, OnInit } from '@angular/core';
import {NgForm} from "@angular/forms";
import {DashboardService} from "../../dashboard.service";
import {BlogService} from "../../blog.service";
import { Router, ActivatedRoute } from "@angular/router";

@Component({
  selector: 'app-add-blog-categories',
  templateUrl: './add-blog-categories.component.html',
  styleUrls: ['./add-blog-categories.component.css']
})
export class AddBlogCategoriesComponent implements OnInit {

    createBlogCategoryMessage:string;
    editMode:boolean = false;

    blogCategoryData = {
        id: 0,
        name: '',
        seo_title: '',
        meta_description: '',
        meta_keywords: ''
    };

  constructor(private BlogService : BlogService, private router: Router, private route: ActivatedRoute,) { }

  ngOnInit() {
      const id = +this.route.snapshot.paramMap.get('id');
      if(id != 0){
          this.editMode = true;
          this.getCategory();
      }
  }

    onSubmit(){
    }

    add(){
        const createBlogCategoryBody = {
            categoryName : this.blogCategoryData.name,
            seo_title: this.blogCategoryData.seo_title,
            meta_description: this.blogCategoryData.meta_description,
            meta_keywords: this.blogCategoryData.meta_keywords,
        }
        this.BlogService.createBlogCategory(createBlogCategoryBody).subscribe(
            (response:any) => {
                if(response.status = 'true'){
                    this.createBlogCategoryMessage = response.message;
                    this.router.navigate(['admin-panel/blog-categories']);
                }else{
                    this.createBlogCategoryMessage = response.message;
                }
            }
        )
    }

    edit(){
        const updateBlogCategoryBody = {
            categoryName : this.blogCategoryData.name,
            categoryId : this.blogCategoryData.id,
            seo_title: this.blogCategoryData.seo_title,
            meta_description: this.blogCategoryData.meta_description,
            meta_keywords: this.blogCategoryData.meta_keywords,

        };
        this.BlogService.updateBlogCategory(updateBlogCategoryBody).subscribe(
            (response:any) => {
                if(response.status = 'true'){
                    this.createBlogCategoryMessage = response.message;
                    this.router.navigate(['admin-panel/blog-categories']);
                }else{
                    this.createBlogCategoryMessage = response.message;
                }
            }
        )
    }

    getCategory(){
         const id = +this.route.snapshot.paramMap.get('id');
        this.BlogService.getCategory(id).subscribe(
            (data:any)=> {
                this.blogCategoryData.id = data.data.categoryDetails.id;
                this.blogCategoryData.name = data.data.categoryDetails.name;
                this.blogCategoryData.seo_title = data.data.categoryDetails.seo_title;
                this.blogCategoryData.meta_description = data.data.categoryDetails.meta_description;
                this.blogCategoryData.meta_keywords = data.data.categoryDetails.meta_keywords;
            }
        );
    }
}
