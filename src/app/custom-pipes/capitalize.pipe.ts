import { Pipe, PipeTransform } from '@angular/core';

@Pipe({name: 'capitalize'})
export class CapitalizePipe implements PipeTransform {
  transform(value: string, args: string[]): any {
    if (!value) {
        return value;
    }
    return value.replace(/\w\S*/g, function(txt) {
        return txt.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
    });
  }
}
