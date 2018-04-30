import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Response } from '@angular/http';

import { DashboardService } from './../dashboard.service'

@Component({
  selector: 'app-add-blog',
  templateUrl: './add-blog.component.html',
  styleUrls: ['./add-blog.component.css']
})



export class AddBlogComponent implements OnInit {

    categoryData:any[] = [];
    categoryIdCollection: any[] = [];
  constructor(
    private dashService : DashboardService,
  ) { }

  // public editorValue: string = '';

  

  checkedCat:any = {

  }

  ngOnInit() {
      this.populateBlogCategorysData();
  }

  onSubmit( createBlog : NgForm ){

     console.log(createBlog.value)

    const createBlogBody = {
      blogTitle : createBlog.value.title,
      blogBody : createBlog.value.body,
      blogMetaDescription : createBlog.value.blogMeta,
      blogStatus : createBlog.value.status,
      blogFeatured : (createBlog.value.blogFeatured==true)?1:0,
      blogMetaKeyword : createBlog.value.blogMetaKey,
      blogSeoTitle : createBlog.value.blogSeoTitle,
      blogCategorys : this.categoryIdCollection
    }

     console.log(createBlogBody)

    this.dashService.createBlog(createBlogBody).subscribe(
      (response:any) => {
        console.log('craeteBlog',response.data);
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
      //
      // console.log(this.categoryIdCollection);
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
