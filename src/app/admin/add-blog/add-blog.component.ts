import {Component, OnInit, TemplateRef} from '@angular/core';
import { NgForm, FormGroup, FormBuilder, Validators } from '@angular/forms';
import {Response} from '@angular/http';
import {Router, ActivatedRoute} from "@angular/router";
import {DashboardService} from "./../dashboard.service";
import {BlogService} from "./../blog.service";
import {BsModalRef, BsModalService} from 'ngx-bootstrap/modal';

@Component({
    selector: 'app-add-blog',
    templateUrl: './add-blog.component.html',
    styleUrls: ['./add-blog.component.css']
})


export class AddBlogComponent implements OnInit {

    categoryData: any[] = [];
    categoryIdCollection: any[] = [];
    blogImage: File;
    blogFeatured: any;
    createBlogMessage: string = 'Processing...';
    editMode: boolean = false;
    categories = [];
    public modalRef: BsModalRef;

    blogData = {
        id: 0,
        author_id: 0,
        title: '',
        slug: '',
        seo_title: '',
        body: '',
        image: '',
        meta_description: '',
        meta_keywords: '',
        status: '',
        featured: false,
        total_views: '',
        blog_category: '',
    };

    constructor(
        private dashService: DashboardService,
        private BlogService: BlogService,
        private router: Router,
        private route: ActivatedRoute,
        private modalService: BsModalService,

    ) { }


    checkedCat: any = {}

    ngOnInit() {
        this.populateBlogCategorysData();
        console.log(this.blogData);
        const id = +this.route.snapshot.paramMap.get('id');
        if (id != 0) {
            this.editMode = true;
            this.getBlog();
        }

    }

     onSubmit() {

     }

    add(){
        this.blogFeatured = 0;
        if (this.blogData.featured) {
            this.blogFeatured = 1;
        }
        const createBlogBody = new FormData();
        createBlogBody.append('blogTitle', this.blogData.title);
        createBlogBody.append('blogBody', this.blogData.body);
        createBlogBody.append('blogMetaDescription', this.blogData.meta_description);
        createBlogBody.append('blogStatus', this.blogData.status);
        createBlogBody.append('blogFeatured', this.blogFeatured);
        createBlogBody.append('blogMetaKeyword', this.blogData.meta_keywords);
        createBlogBody.append('blogCategorys', this.blogData.blog_category);
        createBlogBody.append('blogImage', this.blogImage);
        createBlogBody.append('blogSeoTitle', this.blogData.seo_title);

        this.dashService.createBlog(createBlogBody).subscribe(
            (response: any) => {
                if (response.status === 'true') {
                // console.log(response.status);
                    this.createBlogMessage = response.message;
                    // let blogModalRef = this;
                    // setTimeout(() => {
                    //     blogModalRef.modalRef.hide();
                    // }, 2000);
                    // this.router.navigate(['/admin-panel/blogs']);
                } else {
                    console.log(response.message);

                    this.createBlogMessage = response.message;
                }
            },(error: any) => {
                // this.createBlogMessage = error.message;

                console.log(error);
        });
    }

    edit() {
        this.blogFeatured = 0;
        if (this.blogData.featured) {
            this.blogFeatured = 1;
        }
        const createBlogBody = new FormData();
        createBlogBody.append('blogTitle', this.blogData.title);
        createBlogBody.append('blogBody', this.blogData.body);
        createBlogBody.append('blogMetaDescription', this.blogData.meta_description);
        createBlogBody.append('blogStatus', this.blogData.status);
        createBlogBody.append('blogFeatured', this.blogFeatured);
        createBlogBody.append('blogMetaKeyword', this.blogData.meta_keywords);
        createBlogBody.append('blogCategorys', this.blogData.blog_category);
        createBlogBody.append('blogImage', this.blogImage);
        createBlogBody.append('blogSeoTitle', this.blogData.seo_title);
        createBlogBody.append('blogId', this.blogData.id.toString());


        this.dashService.editBlog(createBlogBody).subscribe((response: any) => {
            if (response.status = 'true') {
                // console.log(response.status);
                this.createBlogMessage = response.message;
                let blogModalRef = this;
                setTimeout(() => {
                    blogModalRef.modalRef.hide();
                }, 2000);
                this.router.navigate(['/admin-panel/blogs']);
            } else {
                this.createBlogMessage = response.message;
            }
        }, (error) => {
            this.createBlogMessage = error.error.message;
        });
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
        console.log(<File>event.target.files);
        console.log(event.target.width);
        // console.log(this.blogImage.type);
        // console.log(this.blogImage);
    }

    populateBlogCategorysData() {
        this.dashService.blogCategoryList().subscribe(
            (data: any) => {
                this.categoryData = data.data.categoryDetails;
                // console.log('blogCategorylist', this.categoryData)
            }
        )
    }

    getBlog() {
        const id = +this.route.snapshot.paramMap.get('id');
        this.BlogService.getBlog(id).subscribe(
            (data: any) => {
                this.blogData.id = data.data.blogDetails.id;
                this.blogData.author_id = data.data.blogDetails.author_id;
                this.blogData.title = data.data.blogDetails.title;
                this.blogData.slug = data.data.blogDetails.slug;
                this.blogData.seo_title = data.data.blogDetails.seo_title === 'null' ? '' : data.data.blogDetails.seo_title;
                this.blogData.body = data.data.blogDetails.body;
                this.blogData.image = data.data.blogDetails.image;
                this.blogData.meta_description = data.data.blogDetails.meta_description === 'null' ? '' : data.data.blogDetails.meta_description;
                this.blogData.meta_keywords = data.data.blogDetails.meta_keywords === 'null' ? '' : data.data.blogDetails.meta_keywords;
                this.blogData.status = String(data.data.blogDetails.status);
                this.blogData.featured = data.data.blogDetails.featured == '0' ? false : true;
                this.blogData.total_views = data.data.blogDetails.total_views;
                this.blogData.blog_category = data.data.blogDetails.blog_category;
                // for (let i = 0; i < data.data.blogDetails.blog_category.length; i++) {
                //     console.log(data.data.blogDetails.blog_category[i].category_id);
                //     this.categories.push(data.data.blogDetails.blog_category[i].category_id);
                // }
                // this.blogData.blog_category = this.categories;
            }
        )
    }

    public openModal(template:  TemplateRef<any>) {
        this.modalRef = this.modalService.show(template);
    }

    onCancel() {
        this.modalRef.hide();
    }

}



let ch: any = document.getElementsByClassName('blogCh');

for (let i = 0; i < ch.length; i++) {
    ch[i].addEventListener("click", function () {
        if (this.checked) {
            alert();
        }
    });
}

