import { Component, OnInit } from '@angular/core';
import {Router} from '@angular/router';

@Component({
  selector: 'app-tua-your-family',
  templateUrl: './tua-your-family.component.html',
  styleUrls: ['./tua-your-family.component.css']
})
export class TuaYourFamilyComponent implements OnInit {

  constructor(private router: Router) { }

  ngOnInit() {
  }
  goBack(){
    this.router.navigate(['/dashboard/will']);
  }
}
