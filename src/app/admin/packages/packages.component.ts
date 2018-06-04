import {ChangeDetectorRef, Component, OnInit, TemplateRef} from '@angular/core';
import {PackageService} from './package.service';
import * as $ from 'jquery';
import 'datatables.net';
import 'datatables.net-bs4';
import {BsModalRef, BsModalService} from 'ngx-bootstrap/modal';
import {FormArray, FormBuilder, FormControl, FormGroup, Validators} from '@angular/forms';
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
    addPackage: any;
  lists: any[] = [];
  items: any;
  count: number;
  dataTable: any;
  delID: number;
  public modalRef: BsModalRef;
  respMsg: string;
  status: false;
  row: any;
    editMode: boolean;
  keyBen: any;
  constructor(
      private packageService: PackageService,
      private modalService: BsModalService,
      private chRef: ChangeDetectorRef,
      private fb: FormBuilder
  ) {
      this.createForm();
  }

  ngOnInit() {
    this.getPackages();
    this.respMsg = 'Are You Sure?';
    this.keyBen = [''];
  }

    createForm() {
        this.editMode = false;
        this.addPackage = this.fb.group({
            name: new FormControl('', [Validators.required]),
            description: new FormControl('', [Validators.required]),
            amount: new FormControl('', [Validators.required, Validators.pattern('^\\d+(\\.\\d+)?$')]),
            status: new FormControl('1', [Validators.required]),
            key_benefits: new FormArray([
                new FormControl('', [Validators.required])
            ]),
            included: new FormArray([
                new FormControl('', [Validators.required])
            ])
        });
    }

    addBen(): void {
        this.items = this.addPackage.get('key_benefits') as FormArray;
        this.items.push(new FormControl('', [Validators.required]));
    }
    addIncludes(): void {
        this.items = this.addPackage.get('included') as FormArray;
        this.items.push(new FormControl('', [Validators.required]));
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
      this.editMode = true;

      this.modalRef = this.modalService.show(template);


      const keyBen = this.lists[index].key_benefits !== undefined &&
      this.lists[index].key_benefits !== null
          ? JSON.parse(this.lists[index].key_benefits)
          : [];

      const incl = this.lists[index].included !== undefined &&
      this.lists[index].included !== null
          ? JSON.parse(this.lists[index].included)
          : [];

      this.addPackage = this.fb.group({
          id: this.lists[index].id,
          name: new FormControl(this.lists[index].name, [Validators.required]),
          description: new FormControl(this.lists[index].description, [Validators.required]),
          amount: new FormControl(this.lists[index].amount, [Validators.required, Validators.pattern('^\\d+(\\.\\d+)?$')]),
          status: new FormControl(this.lists[index].status, [Validators.required]),
          key_benefits: new FormArray(keyBen.map(
              elem => new FormControl(elem, [Validators.required])
          )),
          included: new FormArray(incl.map(
              elem => new FormControl(elem, [Validators.required])
          ))
      });
      this.row = this.lists[index];
      this.delID = this.lists[index].id;
  }

  public addModal(template:  TemplateRef<any>) {
      this.createForm();
      this.editMode = false;
      this.modalRef = this.modalService.show(template);
  }

  update() {
      console.log(this.addPackage.value);
      if (this.editMode === true) {
          this.packageService.updatePackage(this.addPackage.value).subscribe(
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
      } else {
          this.packageService.addPackage(this.addPackage.value).subscribe(
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

    deleteKeyBen(i: number) {
        const items = this.addPackage.get('key_benefits') as FormArray;
        items.removeAt(i);
    }

    delIncludes(i: number): void {
        const items = this.addPackage.get('included') as FormArray;
        items.removeAt(i);
    }

    preventNegative(event) {
      if (event.key === '-') {
          return false;
      }
  }
}
