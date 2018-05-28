import {ChangeDetectorRef, Component, OnInit, TemplateRef} from '@angular/core';
import {PackageService} from './package.service';
import * as $ from 'jquery';
import 'datatables.net';
import 'datatables.net-bs4';
import {BsModalRef, BsModalService} from 'ngx-bootstrap/modal';
interface PackageModel {
  id?: string ;
  name?: string;
  description?: string;
  amount?: number;
  status?: boolean;
}
@Component({
  selector: 'app-packages',
  templateUrl: './packages.component.html',
  styleUrls: ['./packages.component.css']
})
export class PackagesComponent implements OnInit {
  lists: any[] = [];
  count: number;
  dataTable: any;
  delID: number;
  public modalRef: BsModalRef;
  respMsg: string;
  status: false;
  row: any;
  constructor(
      private packageService: PackageService,
      private modalService: BsModalService,
      private chRef: ChangeDetectorRef
  ) { }

  ngOnInit() {
    this.getPackages();
    this.respMsg = 'Are You Sure?';
  }

  getPackages() {
      this.packageService.packages().subscribe(
          (data: any) => {
              // console.log(data.data);
              this.lists = data.data;
              this.count = this.lists.length;
              this.chRef.detectChanges();
              const table: any = $('table');
              this.dataTable = table.DataTable();
          }
      );
  }

  onCancel() {
      this.modalRef.hide();
      this.delID = null;
  }

  public openModal(template:  TemplateRef<any>, index) {
      this.modalRef = this.modalService.show(template);
      this.row = this.lists[index];
      this.delID = this.lists[index].id;
  }

  public addModal(template:  TemplateRef<any>) {
      this.row = {
          id: '',
          name: '',
          description: '',
          amount : '',
          status: ''
      };
      this.modalRef = this.modalService.show(template);

  }

  update() {
    this.packageService.updatePackage(this.row).subscribe(
        (response: any) => {
            this.status = response.status;
                const itemModalRef = this;
                itemModalRef.respMsg = response.message;
                setTimeout(() => {
                    itemModalRef.modalRef.hide();
                }, 2000);
                window.location.reload();
        }, (error: any) => {

        }
    );
  }

  onitemDel() {
      this.packageService.deletePackage(this.delID).subscribe(
          (data: any) => {
              this.status = data.status;
                  const itemModalRef = this;
                  itemModalRef.respMsg = data.message;
                  setTimeout(() => {
                      itemModalRef.modalRef.hide();
                      this.delID = null;
                  }, 2000);
                  window.location.reload();
          }
      );
  }

  additem() {
    this.packageService.addPackage(this.row).subscribe(
        (response: any) => {
            this.status = response.status;
            const itemModalRef = this;
            itemModalRef.respMsg = response.message;
            setTimeout(() => {
                itemModalRef.modalRef.hide();
            }, 2000);
            window.location.reload();
        }, (error: any) => {

        }
    );
  }

    preventNegative(event) {
      if (event.key === '-') {
          return false;
      }
  }
}
