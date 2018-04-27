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

  constructor(
    private dashService : DashboardService,
  ) { }

  // public editorValue: string = '';

  

  checkedCat:any = {

  }

  ngOnInit() {
  }

  onSubmit( createBlog : NgForm ){

    console.log(createBlog.value)

    const createBlogBody = {
      blogTitle : createBlog.value.title,
      blogBody : createBlog.value.body,
      blogMetaDescription : createBlog.value.blogMeta,
      blogStatus : createBlog.value.status,
      blogFeatured : createBlog.value.blogMetaKey,
      blogCategorys : {
        0:2,
        1:3,
        2:5
      }
    }

    console.log(createBlogBody)

    // this.dashService.createBlog(createBlogBody).subscribe(
    //   (response:any) => {
    //     console.log('craeteBlog',response.data);
    //   }
    // )

    
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
