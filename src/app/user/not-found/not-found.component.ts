import { Component, OnInit } from '@angular/core';
import {Router, ActivatedRoute} from '@angular/router';

@Component({
    selector: 'app-not-found',
    templateUrl: './not-found.component.html',
    styleUrls: ['./not-found.component.css']
})
export class NotFoundComponent implements OnInit {
    states: any[];
    
    constructor(private router: Router, private route: ActivatedRoute) {}

    ngOnInit() {
        this.states = ["Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", "Delaware", "District Of Columbia", "Florida", "Georgia", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky", "Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan", "Minnesota", "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", "New Mexico", "New York", "North Carolina", "North Dakota", "Ohio", "Oklahoma", "Oregon", "Pennsylvania", "Rhode Island", "South Carolina", "South Dakota", "Tennessee", "Texas", "Utah", "Vermont", "Virginia", "Washington", "West Virginia", "Wisconsin", "Wyoming"];
        const keyword = this.route.snapshot.url[0].path;
        console.log('Check key : ', this.capitalizeFirstLetter(keyword));
        if (this.states.indexOf(this.capitalizeFirstLetter(keyword)) !== -1){
            console.log("xsjfshdfhskd");
            this.router.navigate(['/']);
        }
        console.log('Check keyjjj : ');
    }
    
    capitalizeFirstLetter(state: any) {
        state = state.toLowerCase();
        state = state.split('-');
        var finalSate = [];
        for (var i = 0; i < state.length; i++) {
            finalSate.push(state[i].charAt(0).toUpperCase() + state[i].slice(1));
        }
        return finalSate.join(' ');
    }

}
