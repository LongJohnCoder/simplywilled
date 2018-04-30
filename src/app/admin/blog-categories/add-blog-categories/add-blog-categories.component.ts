import { Component, OnInit } from '@angular/core';
import {NgForm} from "@angular/forms";
import {DashboardService} from "../../dashboard.service";
import {BlogService} from "../../blog.service";

@Component({
  selector: 'app-add-blog-categories',
  templateUrl: './add-blog-categories.component.html',
  styleUrls: ['./add-blog-categories.component.css']
})
export class AddBlogCategoriesComponent implements OnInit {

    createBlogCategoryMessage:string;

  constructor(private BlogService : BlogService,) { }

  ngOnInit() {}

    onSubmit( createBlogCategory : NgForm ){

        const createBlogCategoryBody = {
            categoryName : createBlogCategory.value.categoryName,

        }

        console.log(createBlogCategoryBody)

        this.BlogService.createBlogCategory(createBlogCategoryBody).subscribe(
            (response:any) => {
                console.log(response);
                console.log('craeteBlogCategory',response.data);
                if(response.status == 'true'){
                   this.createBlogCategoryMessage = response.message;
                }else{
                    this.createBlogCategoryMessage = response.message;
                }
            }
        )
    }

}
