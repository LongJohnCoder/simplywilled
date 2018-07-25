import {Component, OnDestroy, OnInit} from '@angular/core';
import {UserAuthService} from '../../user-auth/user-auth.service';
import {Router, NavigationEnd, ActivatedRoute} from '@angular/router';
import {environment} from '../../../../environments/environment';
import {Meta, Title} from '@angular/platform-browser';
import {Subscription} from 'rxjs/Subscription';
import {BlogService} from '../../blog/blog.service';

@Component({
  selector: 'app-full-layout',
  templateUrl: './full-layout.component.html',
  styleUrls: ['./full-layout.component.css']
})
export class FullLayoutComponent implements OnInit, OnDestroy {

  isLogIn: boolean;
  menutogle: boolean;
  goUp:boolean = false;
  public pageLoad : boolean = true;
  baseURL = environment.base_url;
  blogSearch: string;
  blogSearchQuery: boolean;
  routerSubscription: Subscription;

  constructor( private authService: UserAuthService, private router: Router,
               private route: ActivatedRoute,
               private title: Title,
               private blogService: BlogService,
               private meta: Meta
               ) {
   this.routerSubscription = router.events
      .filter(event => event instanceof NavigationEnd)
      .subscribe((event: NavigationEnd) => {
        window.scroll(0, 0);
        if(event.urlAfterRedirects == '/about-us?id=our-team'){
          let h:any = document.getElementById('ourTeam').offsetTop;
          window.scroll(0, h);
        }
        this.blogSearch = this.route.snapshot.queryParamMap.get('q');
        this.setTitle(event);
      });
  }
  setTitle(event: NavigationEnd) {
    if (this.meta !== undefined) {
      this.meta.removeTag('name="description"');
      this.meta.removeTag('name="keywords"');
    }
    //console.log(event.urlAfterRedirects);
    let keywords = '';
    let description = '';
    switch (event.urlAfterRedirects) {
      case '/':                 this.title.setTitle('SimplyWilled.com - Home - Online Estate Planning Made Simple');
                                description = 'SimplyWilled.com make your last will testament, powers of attorney and medical directives online today.';
                                keywords = 'will,online will,how to write a will,how to make a will,writing a will,creating a will,revocable trust,making a will,free will forms,wills online,last will testament,estate planning,will maker,free last will and testament,free wills,simple will form,estate plan,free will template,online estate plan,do it yourself estate plan,how to make a will,diy will,revocable trust online,living trust,revocable living trust,subject to our terms,state law,surviving spouse,real estate,legal document,personal property,assets are distributed,creating a living trust,any time,power of attorney,sound mind,real property,diy estate planning,estate planning documents,privacy policy,appoint an executor,minor children,power of attorney,sound mind,real property,diy estate planning,successor trustee,estate planning documents,privacy policy,appoint an executor,minor children,will com,do your own will,free wills online,online will free,will.com,do your own will online,online wills free,free will.com,how to do a will online free,do your own will review,free will forms online,do your will,free will on line,do your will online,simple online will,do your own,free wills on line,write my own will for free,online wills reviews,free online will reviews,online will maker reviews,online wills review,online will preparation reviews,doyour,how can i find a will online,wills online reviews,read wills online,make a will online reviews,married no children,single or married,simple will,free simple will,simple will free,simple will form free,simple wills,sample will for married couple,free simple wills,simple wills free,free simple will form,will simple,a simple will,will for married couple,wills for married couples,will template married with children,what is a simple will,can i do my own will,can you do your own will,i do my own,how to do my own will,do my own will,my own will,do my own,at my own will,by my own will,can i do it myself,i do myself,at your own will,changing a will,how to change your will,one who makes a will,estate planning terms,free will.com,online wills and estate planning,free estate planning documents,estate planning forms free,free estate planning forms,a will sample,wording for a will and testament,sample wills for single person,pet trust form,wording for a will,is rental insurance worth it,benefits of a will,process of writing a will,what are the benefits of writing,what are the advantages of writing,benefits of writing,free writing benefits,guide to making a will,the advantages of writing,codicil,updating a will,example of a codicil,a codicil,codecil,wills and codicils,will and codicil,codicils to wills forms,what is codicil,writing a codicil,drafting of a will,codicil for a will,draft wills,codicils,how to write a codicil,codicils to wills,draft of a will,codicle,codisil,codicil to will,what is a codicil to a will,cidicil,codicils to will,adding a codicil to an existing will,codacil,codicil forms,what is a codicil,how to add a codicil to a will,brand will,will drafting,codicill,how to update will,what are codicils,how to do a codicil to a will,drafting will,wills codicils,codocil,how to update a will,codicile,how to update your will,codicil for will,what is a codicil form for will,updating will,what is a codicil in a will,writing a codicil to a will,drafting wills,codicil will,codicil to a will,will codicil,what should be in a will,what is in a will,what should be included in a will,what is included in a will,left in a will,my final wishes and instructions,other words for willing';
                                this.varyTags(description, keywords);
                                break;
      case '/about-us':         this.title.setTitle('SimplyWilled.com - About US');
                                description = 'Learn more about SimplyWilled.com the most trusted way to make your last will and estate documents online.';
                                keywords = 'Peter Antonoplos,Estate Planning,Last Will,Core Values,Yale,Georgetown law,Estate Planning Attorney,how does a will work,last will and testament georgia,handwritten will,creating a will online,SimplyWilled Charity,difference between a trust and a will,free legal documents online,holographic will california,if i own a house before i get married,drafting a will,living trust,revocable living trust,subject to our terms,state law,surviving spouse,real estate,legal document,personal property,assets are distributed,creating a living trust,any timesuccessor trustee,power of attorney,sound mind,real property,diy estate planning,estate planning documents,privacy policy,appoint an executor,minor children';
                                this.varyTags(description, keywords);
                                break;
      case '/faq':              this.title.setTitle('SimplyWilled.com - FAQ - Your Free Learning Center.');
                                description = 'Browse our estate planning library for helpful tips to make your last will, avoid probate, and make powers of attorney online today.';
                                keywords = 'Keyword,Estate Planning Tips,online will,how to write a will,how to make a will,writing a will,creating a will,Estate Planning questions,making a will,free will forms,wills online,Estate Planning Tips,make a will,will maker,free last will and testament,free wills,simple will form,online will maker,free will template,Keyword,executor of estate form,executor will form,appointment of executor form,executor of will form,how to make someone executor of estate,executor of estate paperwork,executor of estate,executor of the estate form,executor of estate forms,forms for executor of estate,executive of estate forms,estate executor form,executor form,executor forms,executor of estate document,executor of a will,executor of will,living will executor,will executor,who should be the executor of your will,what is an executive of a will,executer of estate,excecutor,will executer,how do you become executor of an estate,executer of will,who is an executor of a will,wills executor,letter of appointment executor,how to find an executor of an estate,do you need an executor for a will,how to file executor of estate,executor estate,how to find executor of estate,appointing an executor of an estate,executor of the estate,executor of,how to become an executor,executrix of will,wills executors,executer of a will,legal executor,what is executor of will,power of estate executor,estate executor,how to be executor of a will,executor to a will,excutor,executor in will,letter of appointment of executor,can you refuse to be an executor of a will,an executor of a will,how to be an executor of a will,how to get appointed executor of estate,how to file for executor of estate,how do i become an executor of an estate,does a will have to have an executor,who to appoint as executor of will,executor,executor of estate letter template,what is an estate executor,executor for estate,execator,how to become the executor of an estate,executer of the will,executor of wills,how do i become executor of an estate,executor for a will,executor in a will,executor of the will,do i need an executor for my will,executorship of estate,how to appoint an executor,an executor,how to get executor of estate,executor of an estate,state executor,executrix of estate,executor will,the executor of a will,how to become executor,who is the executor,executor of state,what does in trust mean in a will,putting your house in trust,what is the difference between an estate and a trust,when do you need to go to probate,what is the difference between will and trust,what is the difference between a will and trust,what is the difference between trust and will,whats the difference between a will and a trust,will goes to probate,creating a trust in a will,what does it mean when a will goes to probate,wills and trusts explained,setting up a will and trust,leaving property in trust,how to transfer property to a trust,property trust wills,what happens when you probate a will,do you need a will if you have a trust,living trust bank account,putting assets in a trust,whats a trust,benny gonzalez,when does a house go into probate,what happens when an estate goes into probate,probate limits,why get a trust,do you need probate if you have a will,how to put your property in a trust,putting your property into trust,property held in trust,probate and nonprobate assets,trust wills,what does it mean when a will is in probate,trust funds and wills,trusts wills,setting up a trust for property,what are wills,what goes into probate,the difference between a will and a trust,nonprobate property,do all wills go to probate,what is a trust will,why does a will go into probate,setting up an estate checking account,what does property held in trust mean,trust and will difference,trust in a will,how to transfer assets to a trust,setting up an estate bank account,whats a will,difference between a trust and will,what is a trust in a will,why put assets in a trust,what happens when a will goes to probate,difference between a will and trust,what happens when a house goes into probate,when do you go to probate,what is the difference between a will and a trust,whats trust,what is difference between will and trust,if you have a will does it go to probate,house held in trust,why do wills go to probate,what is a will and trust,are bank accounts subject to probate,what does it mean when a house is in probate,what does subject to probate mean,what does upon trust mean in a will,if you have a will do you need probate,why does a will go to probate,difference between wills and trusts,why do you need a trust';
                                this.varyTags(description, keywords);
                                break;
      case '/blog':             this.title.setTitle('SimplyWilled.com -Blog');
                                description = 'Brush up on the latest estate planning news, articles and estate information so you are up to speed on everything you need to know to make your last will.';
                                keywords = 'best way to make a will,when to make a will,where to make a will,best way to make,best way to do a will,free will blog,dying with a will,two scenarios,die with a will,what happens when you are dying,florida estate law no will,no will where does money go,willing yourself to die,what happens if husband dies without a will,leaving a will to one person,what happens if your husband dies without a will,what happens if you die at home,dying will,what happens without a will,Keyword,executor of estate form,executor will form,appointment of executor form,executor of will form,how to make someone executor of estate,executor of estate paperwork,executor of estate,executor of the estate form,executor of estate forms,forms for executor of estate,executive of estate forms,estate executor form,executor form,executor forms,executor of estate document,executor of a will,executor of will,living will executor,will executor,who should be the executor of your will,what is an executive of a will,executer of estate,excecutor,will executer,how do you become executor of an estate,executer of will,who is an executor of a will,wills executor,letter of appointment executor,how to find an executor of an estate,do you need an executor for a will,how to file executor of estate,executor estate,how to find executor of estate,appointing an executor of an estate,executor of the estate,executor of,how to become an executor,executrix of will,wills executors,executer of a will,legal executor,what is executor of will,power of estate executor,estate executor,how to be executor of a will,executor to a will,excutor,executor in will,letter of appointment of executor,can you refuse to be an executor of a will,an executor of a will,how to be an executor of a will,how to get appointed executor of estate,how to file for executor of estate,how do i become an executor of an estate,does a will have to have an executor,who to appoint as executor of will,executor,executor of estate letter template,what is an estate executor,executor for estate,execator,how to become the executor of an estate,executer of the will,executor of wills,how do i become executor of an estate,executor for a will,executor in a will,executor of the will,do i need an executor for my will,executorship of estate,how to appoint an executor,an executor,how to get executor of estate,executor of an estate,state executor,executrix of estate,executor will,the executor of a will,how to become executor,who is the executor,executor of state';
                                this.varyTags(description, keywords);
                                break;
      case '/sign-in':          this.title.setTitle('SimplyWilled.com – Login.');
                                description = 'Login to SimplyWilled.com and see how easy making your last will online can be.';
                                this.varyTags(description);
                                break;
      case '/register':         this.title.setTitle('SimplyWilled.com – Join');
                                description = 'Join SimplyWilled.com today and see how simple making your last will and testament, naming powers of attorney and protecting your assets can be.';
                                this.varyTags(description);
                                break;
      case '/terms-of-service': this.title.setTitle('SimplyWilled.com – Terms of Service');
                                description = 'Please read these terms of service carefully before using SimplyWilled.com.';
                                keywords = 'will,revoke,willing,codicil,online will,revoked,how to write a will,groupon customer support,contact groupon,how to make a will,the spouse house,writing a will,what is a spouse,creating a will,online will free,making a will,free will forms,www mutualofomaha com,wills online,living trust,revocable living trust,subject to our terms,state law,surviving spouse,real estate,legal document,personal property,assets are distributed,creating a living trust,any timesuccessor trustee,power of attorney,sound mind,real property,diy estate planning,estate planning documents,privacy policy,appoint an executor,minor children';
                                this.varyTags(description, keywords);
                                break;
      case '/privacy-policy':   this.title.setTitle('SimplyWilled.com – Privacy Policy');
                                description = 'At SimplyWilled.com your privacy is important to use. Please read our privacy policy before using our site.';
                                keywords = 'what does revoked mean,online wills,make a will,will maker,free last will and testament,without a will who gets what,free wills,what does disinherit mean,simple will form,how to deal with being disinherited by parents,how to create a will,willin out,online will maker,create a will,is your spouse entitled to your inheritance,is texas a community property state,a will,which are you most likely to witness,codicils,legal will,whats a trust,will com,do your own will,free wills online,online will free,will.com,do your own will online,online wills free,free will.com,how to do a will online free,do your own will review,free will forms online,do your will,free will on line,do your will online,simple online will,do your own,free wills on line,write my own will for free,online wills reviews,free online will reviews,online will maker reviews,online wills review,online will preparation reviews,doyour,how can i find a will online,wills online reviews,read wills online,make a will online reviews,married no children,single or married,simple will,free simple will,simple will free,simple will form free,simple wills,sample will for married couple,free simple wills,simple wills free,free simple will form,will simple,a simple will,will for married couple,wills for married couples,will template married with children,what is a simple will,can i do my own will,can you do your own will,i do my own,how to do my own will,do my own will,my own will,do my own,at my own will,by my own will,can i do it myself,i do myself,at your own will,changing a will,how to change your will,one who makes a will,estate planning terms,free will.com,online wills and estate planning,free estate planning documents,estate planning forms free,free estate planning forms,a will sample,wording for a will and testament,sample wills for single person,pet trust form,wording for a will,is rental insurance worth it,benefits of a will,process of writing a will,what are the benefits of writing,what are the advantages of writing,benefits of writing,free writing benefits,guide to making a will,the advantages of writing,codicil,updating a will,example of a codicil,a codicil,codecil,wills and codicils,will and codicil,codicils to wills forms,what is codicil,writing a codicil,drafting of a will,codicil for a will,draft wills,codicils,how to write a codicil,codicils to wills,draft of a will,codicle,codisil,codicil to will,what is a codicil to a will,cidicil,codicils to will,adding a codicil to an existing will,codacil,codicil forms,what is a codicil,how to add a codicil to a will,brand will,will drafting,codicill,how to update will,what are codicils,how to do a codicil to a will,drafting will,wills codicils,codocil,how to update a will,codicile,how to update your will,codicil for will,what is a codicil form for will,updating will,what is a codicil in a will,writing a codicil to a will,drafting wills,codicil will,codicil to a will,will codicil,what should be in a will,what is in a will,what should be included in a will,what is included in a will,left in a will,my final wishes and instructions,other words for willing';
                                this.varyTags(description, keywords);
                                break;
      case '/terms-of-use':     this.title.setTitle('SimplyWilled.com – Terms of Use');
                                description = 'Please read these terms of use carefully before using SimplyWilled.com.';
                                keywords = 'estate planning software,last will,revocabe Trust,simple will template,make a will online,dying without a will,what is a testator,does a will have to be notarized,non community property states,define testator,how to file for executor of estate without will,testamentary note,marital property states,how to prepare a will,make your own will,free will and testament,what happens if you die without a will,is washington a community property state,do your own will,difference between a will and a trust,sibling inheritance laws,Last will,your will,advanced directives,free legal will,making will';
                                this.varyTags(description, keywords);
                                break;
      case '/contact-us':       this.title.setTitle('SimplyWilled.com – Contact Us');
                                description = 'Have a question about SimplyWilled.com please feel free to contact us.';
                                keywords = 'Keyword,how to prepare a living will,how do i make a living will,how to do living will,how to write a living will for free,living will free download,creating a living will,free living will forms online,free will.com,how to make living will,free living will download,writing a living will without a lawyer,print will forms free,copy of living will form,how do i get a living will,writing a living will,how do you get a living will,how to make a living will for free,how to complete a living will,how to obtain a living will,will com,do your own will,free wills online,online will free,will.com,do your own will online,online wills free,free will.com,how to do a will online free,do your own will review,free will forms online,do your will,free will on line,do your will online,simple online will,do your own,free wills on line,write my own will for free,online wills reviews,free online will reviews,online will maker reviews,online wills review,online will preparation reviews,doyour,how can i find a will online,wills online reviews,read wills online,make a will online reviews,married no children,single or married,simple will,free simple will,simple will free,simple will form free,simple wills,sample will for married couple,free simple wills,simple wills free,free simple will form,will simple,a simple will,will for married couple,wills for married couples,will template married with children,what is a simple will,can i do my own will,can you do your own will,i do my own,how to do my own will,do my own will,my own will,do my own,at my own will,by my own will,can i do it myself,i do myself,at your own will,changing a will,how to change your will,one who makes a will,estate planning terms,free will.com,online wills and estate planning,free estate planning documents,estate planning forms free,free estate planning forms,a will sample,wording for a will and testament,sample wills for single person,pet trust form,wording for a will,is rental insurance worth it,benefits of a will,process of writing a will,what are the benefits of writing,what are the advantages of writing,benefits of writing,free writing benefits,guide to making a will,the advantages of writing,codicil,updating a will';
                                this.varyTags(description, keywords);
                                break;
      default:                  this.title.setTitle('SimplyWilled Online Estate Planning Made Simple');
                                break;
    }
    /*if (!event.urlAfterRedirects.includes('/blogdetails/')) {
      this.title.setTitle('SimplyWilled Online Estate Planning Made Simple');
    }*/
  }
  varyTags(descContent: string, keyContent = '') {
    if (keyContent === '') {
      this.meta.addTags([
        {name: 'description', content: descContent}
      ]);
    } else {
      this.meta.addTags([
        {name: 'description', content: descContent},
        {name: 'keywords', content: keyContent}
      ]);
    }
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

  /**
   * When the component is destroyed
   */
  ngOnDestroy() {
      if (this.routerSubscription !== undefined) {
        this.routerSubscription.unsubscribe();
      }
   }
}
