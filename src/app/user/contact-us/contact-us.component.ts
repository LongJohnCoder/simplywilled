import { Component, OnInit } from '@angular/core';
import {UserService} from '../user.service';
import {Router} from '@angular/router';

@Component({
  selector: 'app-contact-us',
  templateUrl: './contact-us.component.html',
  styleUrls: ['./contact-us.component.css']
})
export class ContactUsComponent implements OnInit {

  formData: any;
  respMessage: string;
  showLoader: boolean;
  constructor(
      private userService: UserService,
      private router: Router
  ) { }

  ngOnInit() {
      this.formData = {
          name: '',
          email: '',
          message: ''
      };
      this.respMessage = '';
      this.showLoader = false;
  }

    contactUs() {
        this.showLoader = true;
        this.userService.contactUs(this.formData).subscribe(
            (data: any) => {
                this.showLoader = false;
                this.respMessage = data.message;
                setTimeout(() => {
                    this.router.navigate(['/']);
                }, 1000);
            }, (error: any) => {
                this.showLoader = false;
                this.respMessage = error.error.message;
            }
        );
    }

}
