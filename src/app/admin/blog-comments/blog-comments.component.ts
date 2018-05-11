import {ChangeDetectorRef, Component, OnInit, TemplateRef} from '@angular/core';
import * as $ from "jquery";
import {BlogService} from '../blog.service';
import {BsModalRef, BsModalService} from 'ngx-bootstrap/modal';
import {Router} from '@angular/router';

@Component({
  selector: 'app-blog-comments',
  templateUrl: './blog-comments.component.html',
  styleUrls: ['./blog-comments.component.css']
})
export class BlogCommentsComponent implements OnInit {
    comments: any[] = [];
    commentCount: number = 0;
    dataTable: any;
    public modalRef: BsModalRef;
    comData: {
        id: '',
        name: '',
        email: '',
        message: '',
        status: ''
    };
    delcomID: number;
    delcomStatusMsg: string = 'Are You Sure?';
    delcomStatus: false;
    respMessage: string;

    constructor(
      private blogService: BlogService,
      private chRef: ChangeDetectorRef,
      private modalService: BsModalService,
      private router: Router,

    ) { }

  ngOnInit() {
        this.getComments();
  }

    getComments() {
        this.blogService.comments().subscribe(
            (data: any) => {
                console.log(data.data);
                this.comments = data.data.comments;
                this.commentCount = this.comments.length;
                this.chRef.detectChanges();
                const table: any = $('table');
                this.dataTable = table.DataTable();
            }
        );
    }

    public openModal(template:  TemplateRef<any>, index) {
        // console.log(index);
        this.modalRef = this.modalService.show(template);
        this.comData = this.comments[index];
        this.delcomID = this.comments[index].id;
    }

    onCancel() {
        this.modalRef.hide();
        this.delcomID = null;
    }

    onitemDel() {
        this.blogService.deleteComment(this.delcomID).subscribe(
            (data: any) => {
                this.delcomStatus = data.status;
                if (this.delcomStatus) {
                    let itemModalRef = this;
                    itemModalRef.delcomStatusMsg = data.message;
                    setTimeout(() => {
                        itemModalRef.modalRef.hide();
                        this.delcomID = null;
                    }, 2000);
                    window.location.reload();
                    // this.getComments();
                    // this.delcomStatusMsg = "Are You Sure?";
                    // this.delcomStatus = false;
                    // this.delcomID = null;
                }
            }
        );
    }

    update() {
        const createcomment = new FormData();
        createcomment.append('commentId', this.comData.id);
        createcomment.append('name', this.comData.name);
        createcomment.append('email', this.comData.email);
        createcomment.append('message', this.comData.message);
        createcomment.append('status', this.comData.status);

        // console.log(createcomment);
        this.blogService.updateComment(createcomment).subscribe(
            (data: any) => {
                this.delcomStatus = data.status;
                // console.log(this.delcomStatus);
                if (this.delcomStatus) {
                    let itemModalRef = this;
                    itemModalRef.delcomStatusMsg = data.message;
                    setTimeout(() => {
                        itemModalRef.modalRef.hide();
                    }, 2000);
                    window.location.reload();
                }

                // if (response.status = 'true') {
                //     // console.log(response.status);
                //     this.respMessage = response.message;
                //     this.router.navigate(['/admin-panel/blog-comments']);
                // } else {
                //     this.respMessage = response.message;
                // }
            }
        );
    }
}
