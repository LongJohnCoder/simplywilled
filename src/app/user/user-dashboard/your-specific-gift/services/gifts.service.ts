import { Injectable } from '@angular/core';
import {environment} from '../../../../../environments/environment';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import { Subject } from 'rxjs/Subject';

@Injectable()
export class GiftsService {
    public cashGiftState = new Subject<boolean>();
    public realPropertyState = new Subject<boolean>();
    public specificAssetState = new Subject<boolean>();
    public businessInterestState = new Subject<boolean>();

    constructor( private httpClient: HttpClient ) { }

    /** Function to emmit cash gift status */
    cashGiftStatus(value: boolean) {
        this.cashGiftState.next(value);
    }

    /** Function to emmit real property gift status */
    realPropertyStatus(value: boolean) {
        this.realPropertyState.next(value);
    }

    /** Function to emmit cash gift status */
    specificAssetStatus(value: boolean) {
        this.specificAssetState.next(value);
    }

    /** Function to emmit real property gift status */
    businessInterestStatus(value: boolean) {
        this.businessInterestState.next(value);
    }
}
