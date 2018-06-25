import {Component, OnInit} from '@angular/core';
import {BlogService} from '../blog.service';
import {ActivatedRoute, Router, Event, NavigationEnd} from '@angular/router';
import {FormControl, Validators, FormGroup} from '@angular/forms';

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
    subscriberEmailForm: any;
    subscriberEmail: FormControl;
    BlogService: BlogService;
    totalBlog: number;
    p: number;
    constructor(private blogService: BlogService, private router: Router, private route: ActivatedRoute ) {

        router.events.subscribe( (event: Event) => {
            if (event instanceof NavigationEnd) {
                const slug = this.route.snapshot.paramMap.get('slug');
                this.blogService.getBlogDetailsFromCategory(slug, 1).subscribe(
                    (data: any) => {
                        this.blogList = data.data.blog;
                        this.imageLink = data.data.imageLink;
                        this.totalBlog = data.data.totalBlog;
                    }
                );
            }
        });

    }

    ngOnInit() {
        this.p = 1;
        this.totalBlog = null;
        this.getBlogDetailsFromCategory();
        this.populateBlogCategory();
        this.populatePopularBlogPosts();
        this.populateRecentBlogPosts();
        this.createFormControls();
        this.createForm();
    }


    getBlogDetailsFromCategory() {
        const slug = this.route.snapshot.paramMap.get('slug');
        this.blogService.getBlogDetailsFromCategory(slug, this.p).subscribe(
            (data: any) => {
                this.blogList = data.data.blog;
                this.imageLink = data.data.imageLink;
                this.totalBlog = data.data.totalBlog;
            }
        );
    }

    populateBlogCategory(){
        this.blogService.getBlogCategoryList().subscribe(
            (data: any) => {
                this.blogCategoryList = data.data.categories;
            }
        );
    }

    populatePopularBlogPosts(){
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
            ( data: any ) => {
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
        this.getBlogDetailsFromCategory();
    }
}
