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
    1 : 'This is your dashboard, from anywhere you click here to view the over all status of your five documents.',
    2 : 'This is your first document, Tell us About You. Our owl will help you through each steps in the five documents when you have any questions. You just need to explore yourself!',
    3 : 'Once you provide your necessary information for us to prepare your documents, you can check the documents in this section.',
    4 : 'By clicking this you you preview the next document.',
    5 : 'By clicking this you you preview the previous document.',
    6 : 'By clicking this you can download your document.',
    7 : 'By clicking this a mail will be sent from our end to your personal email, with the PDF version of the current document.',
    8 : 'By clicking this you can print your document.',
    9 : 'Want to refer a friend to Simply Willed? Simple just provide the name of your friend with his/her email addess!',
    10: 'You can customise your account here!',
    11: 'Finally the logout button. Now you are all set to explore simplywilled and prepare your documents and testaments. Voila!'
  };

  changeTourState(type: string) {
    this.userService.changeStepNumber(type);
  }

  public scrollTo(): void {
      const pageScrollInstance: PageScrollInstance = PageScrollInstance.simpleInstance(this.document, '.tourGuide');
      this.pageScrollService.start(pageScrollInstance);
  }

  ngOnInit() {
    console.log('tourguide: ', this.document.getElementById("tourguide").offsetTop, 'window scroll: ', window.scrollY);
    PageScrollConfig.defaultScrollOffset = this.stepNumber === 9 ? 450 : 250;
    // PageScrollConfig.defaultScrollOffset = this.stepNumber === 5 ? 400 : 250;
    console.log('step num : ', this.stepNumber);
    if (this.stepNumber < 1 || this.stepNumber > 11) {
      this.changeTourState('close');
    }
    this.scrollTo();
    /// console.log('in global tour: ', this.guide[this.stepNumber], this.stepNumber);
  }

  ngOnDestroy() {}

}
