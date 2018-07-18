import { element } from 'protractor';
import { Event } from '@angular/router';
import { Component, OnInit, Input, OnDestroy, HostListener, ElementRef, NgModule } from '@angular/core';
import { Subscription } from 'rxjs/Subscription';
import { UserService } from '../../user.service';

@Component({
  selector: 'app-global-tour',
  templateUrl: './global-tour.component.html',
  styleUrls: ['./global-tour.component.css']
})
export class GlobalTourComponent implements OnInit {

  @Input() stepNumber: number;
  tourSub: Subscription;
  constructor(
    private userService: UserService
  ) {}

  guide = {
    0 : 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus quam quibusdam eius necessitatibus eos totam laborios',
    1 : 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus quam quibusdam eius necessitatibus eos totam laborios',
    2 : 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus quam quibusdam eius necessitatibus eos totam laborios',
    3 : 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus quam quibusdam eius necessitatibus eos totam laborios',
    4 : 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus quam quibusdam eius necessitatibus eos totam laborios',
    5 : 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus quam quibusdam eius necessitatibus eos totam laborios',
    6 : 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus quam quibusdam eius necessitatibus eos totam laborios',
    7 : 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus quam quibusdam eius necessitatibus eos totam laborios',
    8 : 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus quam quibusdam eius necessitatibus eos totam laborios',
    9 : 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus quam quibusdam eius necessitatibus eos totam laborios',
    10: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus quam quibusdam eius necessitatibus eos totam laborios',
    11: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus quam quibusdam eius necessitatibus eos totam laborios',
    12: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus quam quibusdam eius necessitatibus eos totam laborios'
  };

  changeTourState(type: string) {
    this.userService.changeStepNumber(type);
  }

  ngOnInit() {
  }

}
