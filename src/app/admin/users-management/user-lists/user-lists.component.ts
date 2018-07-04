import {ChangeDetectorRef, Component, OnInit} from '@angular/core';
import {UsersService} from '../users.service';

@Component({
  selector: 'app-user-lists',
  templateUrl: './user-lists.component.html',
  styleUrls: ['./user-lists.component.css']
})
export class UserListsComponent implements OnInit {

  userCount: number;
  userList: any[];
  dataTable: any;
    searchBox: string = null;
    pageSize = 10;
    p = 1;
    total = 0;
    orderBy = {id: undefined, name: undefined, email: undefined, created_at: undefined};

    constructor(
      private userService: UsersService
  ) { }

  ngOnInit() {
      this.orderBy['created_at'] = 'desc';
      this.populateUsers(this.p, this.searchBox, this.orderBy);
  }

    populateUsers(page: number, search: string, orderBy: any) {
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

}
