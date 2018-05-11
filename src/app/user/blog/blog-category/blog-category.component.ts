import {Component, OnInit} from '@angular/core';
import {BlogService} from "../blog.service";
import {ActivatedRoute, Router, Event, NavigationStart, NavigationEnd, NavigationError} from "@angular/router";

@Component({
    selector: 'app-blog-category',
    templateUrl: './blog-category.component.html',
    styleUrls: ['./blog-category.component.css']
})
export class BlogCategoryComponent implements OnInit {
    blogList: any[] = [];
    blogCategoryList: any[] = [];
    imageLink: string;
    popularBlogPost: any[] = [];
    recentBlogPost: any[] = [];
    constructor(private router: Router,
                private route: ActivatedRoute, private BlogService: BlogService,) {

        router.events.subscribe( (event: Event) => {
            if (event instanceof NavigationEnd) {
                const slug = this.route.snapshot.paramMap.get('slug');
                this.BlogService.getBlogDetailsFromCategory(slug).subscribe(
                    (data: any) => {
                        this.blogList = data.data.blog;
                        this.imageLink = data.data.imageLink;
                    }
                )
            }
        });

    }

    ngOnInit() {
        this.getBlogDetailsFromCategory();
        this.populateBlogCategory();
        this.populatePopularBlogPosts();
        this.populateRecentBlogPosts();
    }


    getBlogDetailsFromCategory() {
        const slug = this.route.snapshot.paramMap.get('slug');
        this.BlogService.getBlogDetailsFromCategory(slug).subscribe(
            (data: any) => {
                this.blogList = data.data.blog;
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
