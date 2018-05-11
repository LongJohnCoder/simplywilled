import { Injectable } from '@angular/core';
import { Subject } from 'rxjs/Subject';

@Injectable()
export class UserDashboardService {
    public userDetails = new Subject<any>();
    public step1Data = new Subject<any>()
    constructor() { }

    updateUserDetails(value: any) {
        this.userDetails.next(value);
        this.step1Data.next(this.userDetails[0]);
    }
};