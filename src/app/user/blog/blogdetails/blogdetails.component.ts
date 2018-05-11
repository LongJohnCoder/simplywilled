import { Component, OnInit } from '@angular/core';
import {Router, ActivatedRoute} from "@angular/router";
import {BlogService} from "../blog.service";

@Component({
  selector: 'app-blogdetails',
  templateUrl: './blogdetails.component.html',
  styleUrls: ['./blogdetails.component.css']
})
export class BlogdetailsComponent implements OnInit {
  blogDetails:any;
  imageLink: string;
  constructor( private router: Router,
               private route: ActivatedRoute, private BlogService:BlogService,) { }

  ngOnInit() {
      this.getBlogDetails();
  }

  getBlogDetails(){
      const slug = this.route.snapshot.paramMap.get('slug');
      this.BlogService.getBlogDetails(slug).subscribe(
          (data: any) => {
              this.blogDetails = data.data.blog;
              this.imageLink = data.data.imageLink;
              // console.log(this.blogDetails);
          }

      )
  }
}
