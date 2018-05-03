import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Response } from '@angular/http';
import { Router } from "@angular/router";

import { DashboardService } from './../dashboard.service'

@Component({
  selector: 'app-add-blog',
  templateUrl: './add-blog.component.html',
  styleUrls: ['./add-blog.component.css']
})



export class AddBlogComponent implements OnInit {

    categoryData:any[] = [];
    categoryIdCollection: any[] = [];
    blogImage: any;
    blogFeatured:any;
    createBlogMessage:string;

  constructor(
    private dashService : DashboardService,
    private router: Router,
  ) { }

  // public editorValue: string = '';

  

  checkedCat:any = {

  }

  ngOnInit() {
      this.populateBlogCategorysData();
  }

  onSubmit( createBlog : NgForm ){

      this.blogFeatured = (createBlog.value.blogFeatured==true)?1:0;

      const createBlogBody = new FormData();
      createBlogBody.append('blogTitle', createBlog.value.title);
      createBlogBody.append('blogBody', createBlog.value.body);
      createBlogBody.append('blogMetaDescription', createBlog.value.blogMeta);
      createBlogBody.append('blogStatus', createBlog.value.status);
      createBlogBody.append('blogFeatured', this.blogFeatured);
      createBlogBody.append('blogMetaKeyword', createBlog.value.blogMetaKey);
      createBlogBody.append('blogCategorys', JSON.stringify(this.categoryIdCollection));
      createBlogBody.append('blogImage', this.blogImage);


     console.log(createBlogBody)

    this.dashService.createBlog(createBlogBody).subscribe(
      (response:any) => {
          if(response.status == 'true'){
              this.createBlogMessage = response.message;
              this.router.navigate(['/admin-panel/blogs']);
          }else{
              this.createBlogMessage = response.message;
          }
      }
    )

    
  }

    /**
     * this function used for to get the selected category array
     * @param {number} categoryId
     */
    selectedValue(categoryId: number, event: boolean): void {
        if (event) {
            // that means it got checked then push
            this.categoryIdCollection.push(categoryId);
        } else {
            // its unchecked then pop
            this.categoryIdCollection = this.categoryIdCollection.filter(item => item !== categoryId);
        }
    }

    /**
     * this function used for to get the selected blog image
     * @param {file} blogImage
     */
    handleImageUpload(event): void {
        this.blogImage = <File>event.target.files[0];
        console.log(this.blogImage);
    }
    populateBlogCategorysData(){
        this.dashService.blogCategoryList().subscribe(
            (data:any)=> {
                this.categoryData = data.data.categoryDetails;
                console.log('blogCategorylist',this.categoryData)
            }
        )
    }
  
  

}

let ch:any = document.getElementsByClassName('blogCh');

for(let i=0; i<ch.length; i++){
  ch[i].addEventListener("click", function(){
    if(this.checked){
      alert();
    }
  });
}
