import {ChangeDetectorRef, Component, OnInit} from '@angular/core';
import {UsersService} from '../users.service';
import * as $ from 'jquery';
import 'datatables.net';
import 'datatables.net-bs4';

@Component({
  selector: 'app-user-lists',
  templateUrl: './user-lists.component.html',
  styleUrls: ['./user-lists.component.css']
})
export class UserListsComponent implements OnInit {

  userCount: number;
  userList: any[];
  dataTable: any;

    constructor(
      private userService: UsersService,
      private chRef: ChangeDetectorRef
  ) { }

  ngOnInit() {
    this.userService.users().subscribe(
        (res: any) => {
          this.userList = res.data.users;
          this.userCount = res.data.users.length;
            this.chRef.detectChanges();
            const table: any = $('table');
            this.dataTable = table.DataTable();
        }, (err: any) => {
          console.log(err.error.error);
        }
    );
  }

}
