import {ChangeDetectorRef, Component, OnInit, TemplateRef} from '@angular/core';
import {UsersService} from '../users.service';
import {BsModalRef, BsModalService} from 'ngx-bootstrap/modal';

@Component({
  selector: 'app-user-lists',
  templateUrl: './user-lists.component.html',
  styleUrls: ['./user-lists.component.css']
})
export class UserListsComponent implements OnInit {

  userCount: number;
  userList: any[];
  dataTable: any;
    public modalRef: BsModalRef;
    message: string = null;
    waitFor: boolean;
    actionID: number;
    searchBox: string = null;
    pageSize = 10;
    p = 1;
    total = 0;
    orderBy = {id: undefined, name: undefined, email: undefined, created_at: undefined};

    constructor(
      private userService: UsersService,
      private modalService: BsModalService
  ) { }

  ngOnInit() {
      this.orderBy['created_at'] = 'desc';
      this.populateUsers(this.p, this.searchBox, this.orderBy);
  }

    populateUsers(page: number, search: string, orderBy: any) {
        this.message = null;
        this.waitFor = null;
        // console.log(page);
        this.userService.userPagination({'page': page, 'search': search, 'orderBy': orderBy, 'pageSize': this.pageSize}).subscribe(
            (res: any) => {
                this.userList = res.data.users;
                this.userCount = res.data.userCount;
                this.total = res.data.totalUsers;
                this.p = page;
            }, (err: any) => {
                console.log(err.error.error);
            }
        );
    }


    /**
     * Table order by
     */
    orderTable(col: string) {
        const orderType = this.orderBy[col];
        this.orderBy = {id: undefined, name: undefined, email: undefined, created_at: undefined};
        this.orderBy[col] = orderType === 'asc' ? 'desc' : 'asc';
        this.populateUsers(this.p, this.searchBox, this.orderBy);
    }

    /**
     * Page Size change
     */
    pageSizeChange() {
        this.populateUsers(this.p, this.searchBox, this.orderBy);
    }

    public showModal(template:  TemplateRef<any>, action: string, id: number){
        this.message = null;
        this.waitFor = null;
        this.modalRef = this.modalService.show(template);
        this.actionID = id;
        if (action === 'delete') {
            this.message = 'Are you sure?';
            this.waitFor = false;
        } else {
            console.log(id);
        }
    }

    onUserDel(id: number) {
        this.waitFor = true;
        this.message = 'Please wait...';
        this.userService.deleteUser({'user_id': id}).subscribe(
            (data: any) => {
                this.message = data.message;
            }, (error: any) => {
                this.message = error.error.message;
            });
        const ch = this;
        setTimeout(function () {
            ch.populateUsers(ch.p, ch.searchBox, ch.orderBy);
            ch.modalRef.hide();
        }, 2000);
    }

}
