webpackJsonp([21],{kYh7:function(l,n,u){"use strict";Object.defineProperty(n,"__esModule",{value:!0});var e=u("WT6e"),t=function(){},o=u("Xjw4"),d=u("7DMc"),r=u("bfOx"),i=u("MkPD"),a=function(){function l(l,n){this.loginService=l,this.router=n}return l.prototype.ngOnInit=function(){this.showLoader=!1,this.responseReceived=!1,this.loginRequestStatus=!1,this.loginRequestResponseMsg=""},l.prototype.onSubmit=function(l){var n=this;this.showLoader=!0,this.loginService.login({email:l.value.email,password:l.value.password}).subscribe(function(l){n.showLoader=!1,l.status?(localStorage.setItem("loggedInUser",JSON.stringify(l)),n.router.navigate(["/dashboard"])):(n.loginRequestStatus=!1,n.loginRequestResponseMsg="error")},function(l){console.log(l),n.loginRequestStatus=!1,n.loginRequestResponseMsg=l.error.error,n.showLoader=!1,n.responseReceived=!0,setTimeout(function(){n.responseReceived=!1},5e3)},function(){l.reset()})},l}(),s=e["\u0275crt"]({encapsulation:0,styles:[["a[_ngcontent-%COMP%]:hover{color:#fff}.login_btn[_ngcontent-%COMP%]{cursor:pointer}.login_btn[_ngcontent-%COMP%]:hover{color:#fff;background:-webkit-gradient(linear,left top,left bottom,from(#53ba3c),to(#3fa62e));background:linear-gradient(#53ba3c,#3fa62e)}.already_account[_ngcontent-%COMP%]:hover{color:#373737;text-decoration:underline}"]],data:{}});function c(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,15,"div",[["class","pageLoader"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n    "])),(l()(),e["\u0275eld"](2,0,null,null,12,"div",[["class","loaderInner"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n        "])),(l()(),e["\u0275eld"](4,0,null,null,0,"img",[["alt","Loading..."],["src","../../../../assets/images/owl-loading.gif"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n        "])),(l()(),e["\u0275eld"](6,0,null,null,7,"p",[["class","loadingTxt"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n            Please Wait\n            "])),(l()(),e["\u0275eld"](8,0,null,null,0,"span",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275eld"](10,0,null,null,0,"span",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275eld"](12,0,null,null,0,"span",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n        "])),(l()(),e["\u0275ted"](-1,null,["\n    "])),(l()(),e["\u0275ted"](-1,null,["\n"]))],null,null)}function g(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,4,"div",[["class","alert alert-danger"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                                "])),(l()(),e["\u0275eld"](2,0,null,null,1,"strong",[],null,null,null,null,null)),(l()(),e["\u0275ted"](3,null,["",""])),(l()(),e["\u0275ted"](-1,null,["\n                            "]))],null,function(l,n){l(n,3,0,n.component.loginRequestResponseMsg)})}function p(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,4,"div",[["class","alert alert-success"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                                "])),(l()(),e["\u0275eld"](2,0,null,null,1,"strong",[],null,null,null,null,null)),(l()(),e["\u0275ted"](3,null,["",""])),(l()(),e["\u0275ted"](-1,null,["\n                            "]))],null,function(l,n){l(n,3,0,n.component.loginRequestResponseMsg)})}function v(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,1,"p",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Email is required"]))],null,null)}function m(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,1,"p",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Email is not correct!"]))],null,null)}function f(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,7,"span",[["class","alert-danger"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                            "])),(l()(),e["\u0275and"](16777216,null,null,1,null,v)),e["\u0275did"](3,16384,null,0,o.m,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n                            "])),(l()(),e["\u0275and"](16777216,null,null,1,null,m)),e["\u0275did"](6,16384,null,0,o.m,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n                        "]))],function(l,n){l(n,3,0,null==e["\u0275nov"](n.parent,103).errors?null:e["\u0275nov"](n.parent,103).errors.required),l(n,6,0,null==e["\u0275nov"](n.parent,103).errors?null:e["\u0275nov"](n.parent,103).errors.pattern)},null)}function h(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,1,"p",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Password is required"]))],null,null)}function _(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,1,"p",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Password should be minimum 6!"]))],null,null)}function C(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,7,"span",[["class","alert-danger"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                        "])),(l()(),e["\u0275and"](16777216,null,null,1,null,h)),e["\u0275did"](3,16384,null,0,o.m,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n                        "])),(l()(),e["\u0275and"](16777216,null,null,1,null,_)),e["\u0275did"](6,16384,null,0,o.m,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n                    "]))],function(l,n){l(n,3,0,null==e["\u0275nov"](n.parent,115).errors?null:e["\u0275nov"](n.parent,115).errors.required),l(n,6,0,null==e["\u0275nov"](n.parent,115).errors?null:e["\u0275nov"](n.parent,115).errors.minlength)},null)}function R(l){return e["\u0275vid"](0,[(l()(),e["\u0275and"](16777216,null,null,1,null,c)),e["\u0275did"](1,16384,null,0,o.m,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n\n"])),(l()(),e["\u0275eld"](3,0,null,null,161,"div",[["class","body_container"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n    "])),(l()(),e["\u0275eld"](5,0,null,null,145,"div",[["class","confirmd_main"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n        "])),(l()(),e["\u0275eld"](7,0,null,null,142,"div",[["class","wrapper"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275eld"](9,0,null,null,52,"div",[["class","confirm_left"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275eld"](11,0,null,null,1,"h1",[["class","login_text"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Login to your account"])),(l()(),e["\u0275ted"](-1,null,["\n\n\n                "])),(l()(),e["\u0275eld"](14,0,null,null,46,"ul",[["class","protect_loved_ul2"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                    "])),(l()(),e["\u0275eld"](16,0,null,null,13,"li",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                        "])),(l()(),e["\u0275eld"](18,0,null,null,1,"span",[["class","loved_img2"]],null,null,null,null,null)),(l()(),e["\u0275eld"](19,0,null,null,0,"img",[["alt","protect img"],["src","../../../../assets/images/protect-img.png"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                        "])),(l()(),e["\u0275eld"](21,0,null,null,7,"div",[["class","protect_loved_right2"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                            "])),(l()(),e["\u0275eld"](23,0,null,null,1,"h2",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["PROTECT YOUR LOVED ONES"])),(l()(),e["\u0275ted"](-1,null,["\n                            "])),(l()(),e["\u0275eld"](26,0,null,null,1,"p",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Name guardians and list beneficiaries so those you love are in good hands."])),(l()(),e["\u0275ted"](-1,null,["\n                        "])),(l()(),e["\u0275ted"](-1,null,["\n                    "])),(l()(),e["\u0275ted"](-1,null,["\n                    "])),(l()(),e["\u0275eld"](31,0,null,null,13,"li",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                        "])),(l()(),e["\u0275eld"](33,0,null,null,1,"span",[["class","loved_img2"]],null,null,null,null,null)),(l()(),e["\u0275eld"](34,0,null,null,0,"img",[["alt","protect img"],["src","../../../../assets/images/protect-img.png"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                        "])),(l()(),e["\u0275eld"](36,0,null,null,7,"div",[["class","protect_loved_right2"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                            "])),(l()(),e["\u0275eld"](38,0,null,null,1,"h2",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["PROTECT YOUR ASSETS"])),(l()(),e["\u0275ted"](-1,null,["\n                            "])),(l()(),e["\u0275eld"](41,0,null,null,1,"p",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Ensure the assets you\u2019ve worked hard for pass to the ones you love."])),(l()(),e["\u0275ted"](-1,null,["\n                        "])),(l()(),e["\u0275ted"](-1,null,["\n                    "])),(l()(),e["\u0275ted"](-1,null,["\n                    "])),(l()(),e["\u0275eld"](46,0,null,null,13,"li",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                        "])),(l()(),e["\u0275eld"](48,0,null,null,1,"span",[["class","loved_img2"]],null,null,null,null,null)),(l()(),e["\u0275eld"](49,0,null,null,0,"img",[["alt","protect img"],["src","../../../../assets/images/protect-img.png"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                        "])),(l()(),e["\u0275eld"](51,0,null,null,7,"div",[["class","protect_loved_right2"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                            "])),(l()(),e["\u0275eld"](53,0,null,null,1,"h2",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["SAVE TIME & MONEY"])),(l()(),e["\u0275ted"](-1,null,["\n                            "])),(l()(),e["\u0275eld"](56,0,null,null,1,"p",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["It takes less than 15 minutes and your done. Try it today and\n                                see how simple preparing  your last will and testament online can be."])),(l()(),e["\u0275ted"](-1,null,["\n                        "])),(l()(),e["\u0275ted"](-1,null,["\n                    "])),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275ted"](-1,null,["\n\n            "])),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275eld"](63,0,null,null,85,"div",[["class","confirm_right"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275eld"](65,0,null,null,7,"div",[["class","confirmed_form_top"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                    "])),(l()(),e["\u0275eld"](67,0,null,null,1,"h1",[["class","form_heading"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Welcome Back"])),(l()(),e["\u0275ted"](-1,null,["\n                    "])),(l()(),e["\u0275eld"](70,0,null,null,1,"p",[["class","form_pera"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Login to access your account."])),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275eld"](74,0,null,null,73,"div",[["class","confirmed_form_white_sec"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                    "])),(l()(),e["\u0275eld"](76,0,null,null,13,"div",[["class","row"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                        "])),(l()(),e["\u0275eld"](78,0,null,null,4,"div",[["class","col-lg-12"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                            "])),(l()(),e["\u0275and"](16777216,null,null,1,null,g)),e["\u0275did"](81,16384,null,0,o.m,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n                        "])),(l()(),e["\u0275ted"](-1,null,["\n                        "])),(l()(),e["\u0275eld"](84,0,null,null,4,"div",[["class","col-lg-12"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                            "])),(l()(),e["\u0275and"](16777216,null,null,1,null,p)),e["\u0275did"](87,16384,null,0,o.m,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n                        "])),(l()(),e["\u0275ted"](-1,null,["\n                    "])),(l()(),e["\u0275ted"](-1,null,["\n                    "])),(l()(),e["\u0275eld"](91,0,null,null,55,"form",[["id","signInForm"],["novalidate",""]],[[2,"ng-untouched",null],[2,"ng-touched",null],[2,"ng-pristine",null],[2,"ng-dirty",null],[2,"ng-valid",null],[2,"ng-invalid",null],[2,"ng-pending",null]],[[null,"ngSubmit"],[null,"submit"],[null,"reset"]],function(l,n,u){var t=!0,o=l.component;return"submit"===n&&(t=!1!==e["\u0275nov"](l,93).onSubmit(u)&&t),"reset"===n&&(t=!1!==e["\u0275nov"](l,93).onReset()&&t),"ngSubmit"===n&&(t=!1!==o.onSubmit(e["\u0275nov"](l,93))&&t),t},null,null)),e["\u0275did"](92,16384,null,0,d["\u0275bf"],[],null,null),e["\u0275did"](93,4210688,[["form",4]],0,d.NgForm,[[8,null],[8,null]],null,{ngSubmit:"ngSubmit"}),e["\u0275prd"](2048,null,d.ControlContainer,null,[d.NgForm]),e["\u0275did"](95,16384,null,0,d.NgControlStatusGroup,[d.ControlContainer],null,null),(l()(),e["\u0275ted"](-1,null,["\n                        "])),(l()(),e["\u0275eld"](97,0,null,null,8,"input",[["class","email_form"],["name","email"],["ngModel",""],["pattern","[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,3}$"],["placeholder","Email Address"],["required",""],["type","email"]],[[1,"required",0],[1,"pattern",0],[2,"ng-untouched",null],[2,"ng-touched",null],[2,"ng-pristine",null],[2,"ng-dirty",null],[2,"ng-valid",null],[2,"ng-invalid",null],[2,"ng-pending",null]],[[null,"input"],[null,"blur"],[null,"compositionstart"],[null,"compositionend"]],function(l,n,u){var t=!0;return"input"===n&&(t=!1!==e["\u0275nov"](l,98)._handleInput(u.target.value)&&t),"blur"===n&&(t=!1!==e["\u0275nov"](l,98).onTouched()&&t),"compositionstart"===n&&(t=!1!==e["\u0275nov"](l,98)._compositionStart()&&t),"compositionend"===n&&(t=!1!==e["\u0275nov"](l,98)._compositionEnd(u.target.value)&&t),t},null,null)),e["\u0275did"](98,16384,null,0,d.DefaultValueAccessor,[e.Renderer2,e.ElementRef,[2,d.COMPOSITION_BUFFER_MODE]],null,null),e["\u0275did"](99,16384,null,0,d.RequiredValidator,[],{required:[0,"required"]},null),e["\u0275did"](100,540672,null,0,d.PatternValidator,[],{pattern:[0,"pattern"]},null),e["\u0275prd"](1024,null,d.NG_VALIDATORS,function(l,n){return[l,n]},[d.RequiredValidator,d.PatternValidator]),e["\u0275prd"](1024,null,d.NG_VALUE_ACCESSOR,function(l){return[l]},[d.DefaultValueAccessor]),e["\u0275did"](103,671744,[["email",4]],0,d.NgModel,[[2,d.ControlContainer],[2,d.NG_VALIDATORS],[8,null],[2,d.NG_VALUE_ACCESSOR]],{name:[0,"name"],model:[1,"model"]},null),e["\u0275prd"](2048,null,d.NgControl,null,[d.NgModel]),e["\u0275did"](105,16384,null,0,d.NgControlStatus,[d.NgControl],null,null),(l()(),e["\u0275ted"](-1,null,["\n                        "])),(l()(),e["\u0275and"](16777216,null,null,1,null,f)),e["\u0275did"](108,16384,null,0,o.m,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n\n                        "])),(l()(),e["\u0275eld"](110,0,null,null,7,"input",[["class","email_form"],["name","password"],["ngModel",""],["placeholder","Password"],["required",""],["type","password"]],[[1,"required",0],[2,"ng-untouched",null],[2,"ng-touched",null],[2,"ng-pristine",null],[2,"ng-dirty",null],[2,"ng-valid",null],[2,"ng-invalid",null],[2,"ng-pending",null]],[[null,"input"],[null,"blur"],[null,"compositionstart"],[null,"compositionend"]],function(l,n,u){var t=!0;return"input"===n&&(t=!1!==e["\u0275nov"](l,111)._handleInput(u.target.value)&&t),"blur"===n&&(t=!1!==e["\u0275nov"](l,111).onTouched()&&t),"compositionstart"===n&&(t=!1!==e["\u0275nov"](l,111)._compositionStart()&&t),"compositionend"===n&&(t=!1!==e["\u0275nov"](l,111)._compositionEnd(u.target.value)&&t),t},null,null)),e["\u0275did"](111,16384,null,0,d.DefaultValueAccessor,[e.Renderer2,e.ElementRef,[2,d.COMPOSITION_BUFFER_MODE]],null,null),e["\u0275did"](112,16384,null,0,d.RequiredValidator,[],{required:[0,"required"]},null),e["\u0275prd"](1024,null,d.NG_VALIDATORS,function(l){return[l]},[d.RequiredValidator]),e["\u0275prd"](1024,null,d.NG_VALUE_ACCESSOR,function(l){return[l]},[d.DefaultValueAccessor]),e["\u0275did"](115,671744,[["password",4]],0,d.NgModel,[[2,d.ControlContainer],[2,d.NG_VALIDATORS],[8,null],[2,d.NG_VALUE_ACCESSOR]],{name:[0,"name"],model:[1,"model"]},null),e["\u0275prd"](2048,null,d.NgControl,null,[d.NgModel]),e["\u0275did"](117,16384,null,0,d.NgControlStatus,[d.NgControl],null,null),(l()(),e["\u0275ted"](-1,null,["\n\n                        "])),(l()(),e["\u0275and"](16777216,null,null,1,null,C)),e["\u0275did"](120,16384,null,0,o.m,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n\n                        "])),(l()(),e["\u0275eld"](122,0,null,null,3,"div",[["class","loader_parent"],["id","response_loader"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                            "])),(l()(),e["\u0275eld"](124,0,null,null,0,"span",[["class","loader"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                        "])),(l()(),e["\u0275ted"](-1,null,["\n                        "])),(l()(),e["\u0275eld"](127,0,null,null,18,"div",[["class","get_start_main"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                            "])),(l()(),e["\u0275eld"](129,0,null,null,9,"div",[["class","clicking_left"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                                "])),(l()(),e["\u0275eld"](131,0,null,null,2,"a",[["class","already_account"],["routerLink","/register"]],[[1,"target",0],[8,"href",4]],[[null,"click"]],function(l,n,u){var t=!0;return"click"===n&&(t=!1!==e["\u0275nov"](l,132).onClick(u.button,u.ctrlKey,u.metaKey,u.shiftKey)&&t),t},null,null)),e["\u0275did"](132,671744,null,0,r.q,[r.n,r.a,o.j],{routerLink:[0,"routerLink"]},null),(l()(),e["\u0275ted"](-1,null,["Don\u2019t have account?"])),(l()(),e["\u0275ted"](-1,null,["\n                                "])),(l()(),e["\u0275eld"](135,0,null,null,2,"a",[["class","already_account"],["routerLink","/forget-password"]],[[1,"target",0],[8,"href",4]],[[null,"click"]],function(l,n,u){var t=!0;return"click"===n&&(t=!1!==e["\u0275nov"](l,136).onClick(u.button,u.ctrlKey,u.metaKey,u.shiftKey)&&t),t},null,null)),e["\u0275did"](136,671744,null,0,r.q,[r.n,r.a,o.j],{routerLink:[0,"routerLink"]},null),(l()(),e["\u0275ted"](-1,null,["Forgot your password?"])),(l()(),e["\u0275ted"](-1,null,["\n                            "])),(l()(),e["\u0275ted"](-1,null,["\n                            "])),(l()(),e["\u0275ted"](-1,null,["\n                            "])),(l()(),e["\u0275eld"](141,0,null,null,3,"button",[["class","login_btn"],["value","Continue"]],[[8,"disabled",0]],null,null,null,null)),(l()(),e["\u0275ted"](-1,null,[" "])),(l()(),e["\u0275eld"](143,0,null,null,0,"i",[["aria-hidden","true"],["class","fa fa-chevron-right"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Login"])),(l()(),e["\u0275ted"](-1,null,["\n                        "])),(l()(),e["\u0275ted"](-1,null,["\n                    "])),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275ted"](-1,null,["\n        "])),(l()(),e["\u0275ted"](-1,null,["\n    "])),(l()(),e["\u0275ted"](-1,null,["\n    "])),(l()(),e["\u0275eld"](152,0,null,null,11,"div",[["class","about_sec4"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275eld"](154,0,null,null,8,"div",[["class","wrapper"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n              "])),(l()(),e["\u0275eld"](156,0,null,null,1,"h1",[["class","about_state_planning_text"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Estate Planning Made Simple & Affordable."])),(l()(),e["\u0275ted"](-1,null,["\n              "])),(l()(),e["\u0275eld"](159,0,null,null,1,"h4",[["class","select_plan"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Get started now and keep your loved ones safe!"])),(l()(),e["\u0275ted"](-1,null,["\n             "])),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275ted"](-1,null,["\n          "])),(l()(),e["\u0275ted"](-1,null,["\n"])),(l()(),e["\u0275ted"](-1,null,["\n"]))],function(l,n){var u=n.component;l(n,1,0,u.showLoader),l(n,81,0,!u.loginRequestStatus&&u.responseReceived),l(n,87,0,u.loginRequestStatus&&u.responseReceived),l(n,99,0,""),l(n,100,0,"[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,3}$"),l(n,103,0,"email",""),l(n,108,0,e["\u0275nov"](n,103).errors&&(e["\u0275nov"](n,103).dirty||e["\u0275nov"](n,103).touched)),l(n,112,0,""),l(n,115,0,"password",""),l(n,120,0,e["\u0275nov"](n,115).errors&&(e["\u0275nov"](n,115).dirty||e["\u0275nov"](n,115).touched)),l(n,132,0,"/register"),l(n,136,0,"/forget-password")},function(l,n){l(n,91,0,e["\u0275nov"](n,95).ngClassUntouched,e["\u0275nov"](n,95).ngClassTouched,e["\u0275nov"](n,95).ngClassPristine,e["\u0275nov"](n,95).ngClassDirty,e["\u0275nov"](n,95).ngClassValid,e["\u0275nov"](n,95).ngClassInvalid,e["\u0275nov"](n,95).ngClassPending),l(n,97,0,e["\u0275nov"](n,99).required?"":null,e["\u0275nov"](n,100).pattern?e["\u0275nov"](n,100).pattern:null,e["\u0275nov"](n,105).ngClassUntouched,e["\u0275nov"](n,105).ngClassTouched,e["\u0275nov"](n,105).ngClassPristine,e["\u0275nov"](n,105).ngClassDirty,e["\u0275nov"](n,105).ngClassValid,e["\u0275nov"](n,105).ngClassInvalid,e["\u0275nov"](n,105).ngClassPending),l(n,110,0,e["\u0275nov"](n,112).required?"":null,e["\u0275nov"](n,117).ngClassUntouched,e["\u0275nov"](n,117).ngClassTouched,e["\u0275nov"](n,117).ngClassPristine,e["\u0275nov"](n,117).ngClassDirty,e["\u0275nov"](n,117).ngClassValid,e["\u0275nov"](n,117).ngClassInvalid,e["\u0275nov"](n,117).ngClassPending),l(n,131,0,e["\u0275nov"](n,132).target,e["\u0275nov"](n,132).href),l(n,135,0,e["\u0275nov"](n,136).target,e["\u0275nov"](n,136).href),l(n,141,0,e["\u0275nov"](n,93).invalid)})}var b=e["\u0275ccf"]("app-user-login",a,function(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,1,"app-user-login",[],null,null,null,R,s)),e["\u0275did"](1,114688,null,0,a,[i.a,r.n],null,null)],function(l,n){l(n,1,0)},null)},{},{},[]),S=function(){};u.d(n,"UserLoginModuleNgFactory",function(){return y});var y=e["\u0275cmf"](t,[],function(l){return e["\u0275mod"]([e["\u0275mpd"](512,e.ComponentFactoryResolver,e["\u0275CodegenComponentFactoryResolver"],[[8,[b]],[3,e.ComponentFactoryResolver],e.NgModuleRef]),e["\u0275mpd"](4608,o.o,o.n,[e.LOCALE_ID,[2,o.x]]),e["\u0275mpd"](4608,d["\u0275i"],d["\u0275i"],[]),e["\u0275mpd"](512,o.c,o.c,[]),e["\u0275mpd"](512,r.r,r.r,[[2,r.w],[2,r.n]]),e["\u0275mpd"](512,S,S,[]),e["\u0275mpd"](512,d["\u0275ba"],d["\u0275ba"],[]),e["\u0275mpd"](512,d.FormsModule,d.FormsModule,[]),e["\u0275mpd"](512,t,t,[]),e["\u0275mpd"](1024,r.l,function(){return[[{path:"",component:a}]]},[])])})}});