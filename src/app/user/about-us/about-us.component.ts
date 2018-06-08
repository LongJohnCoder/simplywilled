import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-about-us',
  templateUrl: './about-us.component.html',
  styleUrls: ['./about-us.component.css']
})
export class AboutUsComponent implements OnInit {
  showHideBio: boolean = false;
  constructor() { }

  ngOnInit() {
  }

  showBio(){
    this.showHideBio = !this.showHideBio;
  }

}
