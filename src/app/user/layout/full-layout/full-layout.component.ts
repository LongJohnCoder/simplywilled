import { Component, OnInit } from '@angular/core';
import {UserAuthService} from '../../user-auth/user-auth.service';
import {Router, NavigationEnd, ActivatedRoute} from '@angular/router';
import {environment} from '../../../../environments/environment';

@Component({
  selector: 'app-full-layout',
  templateUrl: './full-layout.component.html',
  styleUrls: ['./full-layout.component.css']
})
export class FullLayoutComponent implements OnInit {

  isLogIn: boolean;
  menutogle: boolean;
  goUp:boolean = false;
  public pageLoad : boolean = true;
  baseURL = environment.base_url;
  blogSearch: string;
  blogSearchQuery: boolean;

  constructor( private authService: UserAuthService, private router: Router,
               private route: ActivatedRoute
               ) {
    router.events
      .filter(event => event instanceof NavigationEnd)
      .subscribe((event: NavigationEnd) => {
        window.scroll(0, 0);
        if(event.urlAfterRedirects == '/about-us?id=our-team'){
          let h:any = document.getElementById('ourTeam').offsetTop;
          window.scroll(0, h);
        }
        this.blogSearch = this.route.snapshot.queryParamMap.get('q');
      });
  }

  ngOnInit() {
    this.isLogIn = this.authService.isAuthenticated();
    this.menutogle = false;
    window.addEventListener('scroll', this.scroll, true);
    // console.log('Ready');
      this.blogSearchQuery = false;
  }

  scroll = (): void => {
    if(window.scrollY > 500){
      this.goUp = true;
    }else{
      this.goUp = false;
    }
  };

  goToTop() {
      window.scrollTo({ left: 0, top: 0, behavior: 'smooth' });
  }

  /**
   * this function hits when user log out
   */
  onLogout() {
    localStorage.removeItem('loggedInUser');
    localStorage.removeItem('_loggedInToken');
    this.router.navigate(['/sign-in']);
    this.isLogIn = false ;
  }

  /**
   * function for toggeling the nav bar in modile view
   */
  menuOpen() {
    this.menutogle = !this.menutogle;
  }

  ngAfterViewInit(){
    setTimeout(() => {
      this.pageLoad = false;
    }, 3000)
    console.log('Loaded');
  }

  sitemapOpen() {
      window.open(this.baseURL + 'api/sitemap.xml', '_blank');
  }

    /**
     * Function for blog search
     */
  blogSearchSubmit() {
    if (this.blogSearch !== undefined && this.blogSearch !== null) {
        this.blogSearchQuery = true;
        // this.router.navigate(['/blog?q=' + this.blogSearch]);
        window.location.href = 'blog?q=' + this.blogSearch;
    }
  }

    blogLink() {
        window.location.href = 'blog';
    }

    /**
     * Function for submitting blog search using enter key
     * @param event
     */
    onKeydown(event) {
        if (event.key === "Enter") {
            this.blogSearchSubmit();
        }
    }
}
