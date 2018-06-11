import { element } from 'protractor';
import { Event } from '@angular/router';
import { Component, OnInit, Input, OnDestroy, HostListener, ElementRef, NgModule } from '@angular/core';
import { Subscription } from 'rxjs/Subscription';
import { UserService } from '../../user.service';

@Component({
  selector: 'app-global-tooltip',
  templateUrl: './global-tooltip.component.html',
  styleUrls: ['./global-tooltip.component.css']
})

export class GlobalTooltipComponent implements OnInit {

  isClicked = false;
  indexToSet = 0;
  subscription: Subscription;

  @Input() tooltipMessages: any;
  @Input() toolTipType: string;
  @HostListener('document:click', ['$event'])
  clickout(event) {
    if (!this.eRef.nativeElement.contains(event.target)) {
      this.isClicked = false;
    }
  }

  constructor(
    private userService: UserService,
    private eRef: ElementRef) { }


  ngOnInit() {
    this.subscription = this.userService.currentToolTipType.subscribe(
      (currentType: string) => {
        if (currentType !== this.toolTipType) {
          this.isClicked = false;
        }
      }
    );
  }

  // opoupPosition(event?: any){

  //   let windowHeight: any = window.innerHeight;
  //   let windowWidth: any = window.innerWidth;
  //   let offsetTop: number = windowHeight - event.clientY;
  //   let offsetLeft: number = windowWidth - event.clientX;
  //   let toolTip: any = event.target.nextElementSibling;


  //   if(offsetTop <= 160){
  //     //console.log(offsetTop);
  //     toolTip.style.top = 'auto';
  //     toolTip.style.bottom = '30px';
  //   }else{
  //     toolTip.style.top = '30px';
  //     toolTip.style.bottom = 'auto';
  //   }

  //   if(offsetLeft <= 270){
  //     toolTip.style.left = 'auto';
  //     toolTip.style.right = '30px';
  //   }else{
  //     toolTip.style.left = '0';
  //     toolTip.style.right = 'auto';
  //   }

  //   if(windowWidth <= 450){
  //     toolTip.style.left = '-150px';
  //     toolTip.style.right = 'auto';
  //   }


  //   console.log(event);
  // }

  markActive(choice?: boolean ): void {
    if (choice !== undefined) {
      this.isClicked = false;
    } else {
      this.isClicked = this.isClicked ? false : true;
    }
  }

  openInfo(e: any, i: number) {
    e.stopPropagation();
    if (this.indexToSet === i) {
      this.indexToSet = null;
    } else {
      this.indexToSet = i;
    }
  }

  // seeInfo(e: any) {
  //   e.stopPropagation();

  //   let parentnode = e.target.closest('.tooltipContainer');

  //   for (let i in parentnode.getElementsByTagName('dl')){
  //     if (isNaN(parentnode.getElementsByTagName('dl')[i]) && parentnode.getElementsByTagName('dl')[i].classList !== undefined ) {
  //       parentnode.getElementsByTagName('dl')[i].classList.remove('open');
  //     }
  //   }

  //   if (e.target.closest('dl').classList.contains('open')) {
  //     e.target.closest('dl').classList.remove('open');
  //   } else {
  //     e.target.closest('dl').classList.add('open');
  //   }
  // }
}
