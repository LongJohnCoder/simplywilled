import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-faq',
  templateUrl: './faq.component.html',
  styleUrls: ['./faq.component.css']
})
export class FaqComponent implements OnInit {

  constructor() { 
    console.log('I am called');
  }

  ngOnInit() {
    console.log('I am called here');
    console.log('entered here');
  }
}
