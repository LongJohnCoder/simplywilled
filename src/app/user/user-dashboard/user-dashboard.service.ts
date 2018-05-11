import { Injectable } from '@angular/core';
import { Subject } from 'rxjs/Subject';

@Injectable()
export class UserDashboardService {
    public userDetails = new Subject<any>();
    constructor() { }

    updateUserDetails(value: any) {
        this.userDetails.next(value);
    }
};