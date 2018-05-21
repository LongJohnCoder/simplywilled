import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-packages',
  templateUrl: './packages.component.html',
  styleUrls: ['./packages.component.css']
})
export class PackagesComponent implements OnInit {
  public whatIncl : boolean = false;
  constructor() { }

  ngOnInit() {
  }

  showIncluded(){
    this.whatIncl = !this.whatIncl;
  }

}
