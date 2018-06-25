import {Component, OnInit, NgModule} from '@angular/core';
import {Router, ActivatedRoute} from '@angular/router';
import {BlogService} from '../blog.service';
import {FormControl, Validators, FormGroup} from '@angular/forms';
import {environment} from '../../../../environments/environment';

@Component({
    selector: 'app-blogdetails',
    templateUrl: './blogdetails.component.html',
    styleUrls: ['./blogdetails.component.css']
})
export class BlogdetailsComponent implements OnInit {
    commentForm: any;
    blogId: FormControl;
    name: FormControl;
    email: FormControl;
    message: FormControl;
    blogDetails: any;
    imageLink: string;
    BlogId:any;
    createBlogCommentMessage:string;
    baseURL = environment.base_url;

    constructor(private router: Router,
                private route: ActivatedRoute,
                private BlogService: BlogService) {
    }

    ngOnInit() {
        this.getBlogDetails();
        this.createFormControls();
        this.createForm();
    }

    getBlogDetails() {
        const slug = this.route.snapshot.paramMap.get('slug');
        this.BlogService.getBlogDetails(slug).subscribe(
            (data: any) => {
                this.blogDetails = data.data.blog;
                this.imageLink = data.data.imageLink;
                this.BlogId = data.data.blog.id;
            }
        )
    }

    createFormControls() {
        this.commentForm = new FormControl();
        this.blogId = new FormControl();
        this.name = new FormControl('', Validators.required);
        this.message = new FormControl('', Validators.required);
        this.email = new FormControl('', [
            Validators.required,
            Validators.pattern("[^ @]*@[^ @]*")
        ]);
    }

    createForm() {
        this.commentForm = new FormGroup({
            blogId : this.blogId,
            name: this.name,
            email: this.email,
            message: this.message
        });
    }


    onSubmit() {
        if (this.commentForm.valid) {
            this.BlogService.makeBlogComment(this.commentForm.value).subscribe(
                (response: any) => {
                    if (response.status = 'true') {
                        this.createBlogCommentMessage = response.message;
                        alert(this.createBlogCommentMessage);
                        this.commentForm.reset();
                        this.getBlogDetails();
                    } else {
                        this.createBlogCommentMessage = response.message;
                        alert(this.createBlogCommentMessage);
                    }
                }
            )
        }
    }

}