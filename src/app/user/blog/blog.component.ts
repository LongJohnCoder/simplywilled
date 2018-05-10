import { Component, OnInit } from '@angular/core';
import {BlogService} from "./blog.service";

@Component({
  selector: 'app-blog',
  templateUrl: './blog.component.html',
  styleUrls: ['./blog.component.css']
})
export class BlogComponent implements OnInit {
    blogList: any[] = [];
    imageLink: string;
  constructor( private BlogService : BlogService ) {

  }

  ngOnInit() {
      this.populateBlog();
  }


    populateBlog(){
        this.BlogService.blogList().subscribe(
            (data:any)=> {
                 this.blogList = data.data.BlogDetails;
                 this.imageLink = data.data.imageLink;
            }
        )
    }



}
