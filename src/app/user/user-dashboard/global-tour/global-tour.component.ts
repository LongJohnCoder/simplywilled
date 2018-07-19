import { DocModule } from './../doc/doc.module';
import { element } from 'protractor';
import { Event } from '@angular/router';
import { Component, OnInit, Input, OnDestroy, HostListener, ElementRef, NgModule, Inject } from '@angular/core';
import { Subscription } from 'rxjs/Subscription';
import { UserService } from '../../user.service';
import { PageScrollConfig, PageScrollService, PageScrollInstance } from 'ng2-page-scroll';
import { DOCUMENT} from '@angular/common';


@Component({
  selector: 'app-global-tour',
  templateUrl: './global-tour.component.html',
  styleUrls: ['./global-tour.component.css']
})
export class GlobalTourComponent implements OnInit, OnDestroy {
  @Input() stepNumber: number;
  @HostListener('document:click', ['$event'])
  clickout() {

  }
  constructor(
    private userService: UserService,
    private eRef: ElementRef,
    private pageScrollService: PageScrollService,
    @Inject(DOCUMENT) private document: any
  ) {
    console.log('step num in constructor :', this.stepNumber, typeof this.stepNumber);
    PageScrollConfig.defaultScrollOffset = 250;
    PageScrollConfig.defaultDuration = 250;
  }

  // tslint:disable-next-line:member-ordering
  guide = {
    1 : 'This is your dashboard, from anywhere you click here to view the over all status of your five documents',
    2 : 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus quam quibusdam eius necessitatibus eos totam laborios',
    3 : 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus quam quibusdam eius necessitatibus eos totam laborios',
    4 : 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus quam quibusdam eius necessitatibus eos totam laborios',
    5 : 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus quam quibusdam eius necessitatibus eos totam laborios',
    6 : 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus quam quibusdam eius necessitatibus eos totam laborios',
    7 : 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus quam quibusdam eius necessitatibus eos totam laborios',
    8 : 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus quam quibusdam eius necessitatibus eos totam laborios',
    9 : 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus quam quibusdam eius necessitatibus eos totam laborios',
    10: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus quam quibusdam eius necessitatibus eos totam laborios',
    11: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus quam quibusdam eius necessitatibus eos totam laborios'
  };

  changeTourState(type: string) {
    this.userService.changeStepNumber(type);
  }

  public scrollTo(): void {
      const pageScrollInstance: PageScrollInstance = PageScrollInstance.simpleInstance(this.document, '.tourGuide');
      this.pageScrollService.start(pageScrollInstance);
  }

  ngOnInit() {
    PageScrollConfig.defaultScrollOffset = this.stepNumber === 9 ? 400 : 250;
    console.log('step num : ', this.stepNumber);
    if (this.stepNumber < 1 || this.stepNumber > 11) {
      this.changeTourState('close');
    }
    this.scrollTo();
    /// console.log('in global tour: ', this.guide[this.stepNumber], this.stepNumber);
  }

  ngOnDestroy() {}

}
