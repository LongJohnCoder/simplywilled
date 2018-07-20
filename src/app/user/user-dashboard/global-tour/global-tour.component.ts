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
    1 : 'By clicking Back To Dashboard, you will be sent back to the main dashboard, where you can view the stages of your interview. From the dashboard you can see which stages are complete, in progress, or need to be completed.',
    2 : 'Need some additional information during the interview? Not to worry! Just click on my icon next to an interview question to see additional helpful estate planning tips and suggestions.',
    3 : 'The Preview Documents button allows you to preview your document at any time during the interview. Once you have completed the interview, you will be able to email, download, and print your completed documents.',
    4 : 'Click the Next Document button to review the next document in your estate plan package.',
    5 : 'If you think you skipped something or just want to read your document again, you can always go back to your previous document and review it.',
    6 : 'Once you review your document and completed all your interview questions, you can download each documents as PDF. Remember you need to download each document individually.',
    7 : 'Clicking the Email button will send you an email with the selected document right to your inbox. Remember you need to email each document individually.',
    8 : 'The Print button allow you to print your documents directly from SimplyWilled.com, and you can sign them right away. Remember you need to print each document individually.',
    9 : 'Enjoy using SimplyWilled.com and think someone else would benefit? Refer a friend to SimplyWilled.com so they can get their affairs in order. ',
    10: 'The My Account button is where you can change your password and your personal information.',
    11: 'Whenever you log out, don’t worry! Your data is automatically saved. Wherever you stop, you can start again at the same place!'
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
