import { Directive, HostListener } from '@angular/core';

@Directive({
  selector: '[appPreventCopy]'
})
export class PreventCopyDirective {

  constructor() { }

  @HostListener('copy', ['$event']) blockCopy(e: KeyboardEvent) {
    e.preventDefault();
  }

  @HostListener('cut', ['$event']) blockCut(e: KeyboardEvent) {
    e.preventDefault();
  }

}
