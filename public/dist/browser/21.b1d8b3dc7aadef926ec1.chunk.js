webpackJsonp([21],{UNXY:function(l,n,u){"use strict";Object.defineProperty(n,"__esModule",{value:!0});var e=u("WT6e"),t=function(){},o=u("Xjw4"),d=u("7DMc"),r=u("bfOx"),s=u("MkPD"),a=function(){function l(l,n,u){this.route=l,this.userService=n,this.router=u}return l.prototype.ngOnInit=function(){this.showLoader=!1,this.email=this.route.snapshot.paramMap.get("email"),this.token=this.route.snapshot.paramMap.get("token")},l.prototype.resetSubmit=function(){var l=this;this.showLoader=!0,this.userService.resetPasswordSubmit({email:this.email,token:this.token,password:this.password,confirm_password:this.confirmPassword}).subscribe(function(n){l.respType=!0,l.respMsg=n.message,l.showLoader=!1,setTimeout(function(){l.router.navigate(["/sign-in"])},2e3)},function(n){l.respType=!1,l.respMsg=n.error.message,l.showLoader=!1})},l}(),i=e["\u0275crt"]({encapsulation:0,styles:[["a[_ngcontent-%COMP%]:hover{color:#fff}.login_btn[_ngcontent-%COMP%]{cursor:pointer;width:240px}.login_btn[_ngcontent-%COMP%]:hover{color:#fff;background:-webkit-gradient(linear,left top,left bottom,from(#53ba3c),to(#3fa62e));background:linear-gradient(#53ba3c,#3fa62e)}.already_account[_ngcontent-%COMP%]:hover{color:#373737;text-decoration:underline}.forgetPass[_ngcontent-%COMP%]{margin-top:50px}.forgetPass[_ngcontent-%COMP%]   h2[_ngcontent-%COMP%]{font-size:24px;padding-bottom:0;color:#0a5dab;margin-bottom:0;margin-top:23px;line-height:normal}.forgetPass[_ngcontent-%COMP%]   p[_ngcontent-%COMP%]{font-size:22px;color:#373737}.forgetPass[_ngcontent-%COMP%]   p[_ngcontent-%COMP%]   a[_ngcontent-%COMP%]{color:#4fb03d}@media screen and (max-width:767px){.forgetPass[_ngcontent-%COMP%]{margin-top:0}}"]],data:{}});function c(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,14,"div",[["class","pageLoader"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n    "])),(l()(),e["\u0275eld"](2,0,null,null,11,"div",[["class","loaderInner"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n      "])),(l()(),e["\u0275ted"](-1,null,["\n        "])),(l()(),e["\u0275eld"](5,0,null,null,7,"p",[["class","loadingTxt"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n            Please Wait\n            "])),(l()(),e["\u0275eld"](7,0,null,null,0,"span",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275eld"](9,0,null,null,0,"span",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275eld"](11,0,null,null,0,"span",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n        "])),(l()(),e["\u0275ted"](-1,null,["\n    "])),(l()(),e["\u0275ted"](-1,null,["\n"]))],null,null)}function g(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,7,"div",[["class","col-lg-12"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                          "])),(l()(),e["\u0275eld"](2,0,null,null,4,"div",[["class","alert alert-danger"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                              "])),(l()(),e["\u0275eld"](4,0,null,null,1,"strong",[],null,null,null,null,null)),(l()(),e["\u0275ted"](5,null,["",""])),(l()(),e["\u0275ted"](-1,null,["\n                          "])),(l()(),e["\u0275ted"](-1,null,["\n                      "]))],null,function(l,n){l(n,5,0,n.component.respMsg)})}function p(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,7,"div",[["class","col-lg-12"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                          "])),(l()(),e["\u0275eld"](2,0,null,null,4,"div",[["class","alert alert-success"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                              "])),(l()(),e["\u0275eld"](4,0,null,null,1,"strong",[],null,null,null,null,null)),(l()(),e["\u0275ted"](5,null,["",""])),(l()(),e["\u0275ted"](-1,null,["\n                          "])),(l()(),e["\u0275ted"](-1,null,["\n                      "]))],null,function(l,n){l(n,5,0,n.component.respMsg)})}function f(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,1,"p",[["class","formErrorMsg"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Password is required"]))],null,null)}function m(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,1,"p",[["class","formErrorMsg"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Password should be minimum 6!"]))],null,null)}function v(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,7,"span",[["class","alert-danger"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                        "])),(l()(),e["\u0275and"](16777216,null,null,1,null,f)),e["\u0275did"](3,16384,null,0,o.n,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n                        "])),(l()(),e["\u0275and"](16777216,null,null,1,null,m)),e["\u0275did"](6,16384,null,0,o.n,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n                      "]))],function(l,n){l(n,3,0,null==e["\u0275nov"](n.parent,64).errors?null:e["\u0275nov"](n.parent,64).errors.required),l(n,6,0,null==e["\u0275nov"](n.parent,64).errors?null:e["\u0275nov"](n.parent,64).errors.minlength)},null)}function C(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,1,"p",[["class","formErrorMsg"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Confirm Password is required"]))],null,null)}function h(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,4,"span",[["class","alert-danger"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                        "])),(l()(),e["\u0275and"](16777216,null,null,1,null,C)),e["\u0275did"](3,16384,null,0,o.n,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n                      "]))],function(l,n){l(n,3,0,null==e["\u0275nov"](n.parent,76).errors?null:e["\u0275nov"](n.parent,76).errors.required)},null)}function _(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,4,"span",[["class","alert-danger"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                        "])),(l()(),e["\u0275eld"](2,0,null,null,1,"p",[["class","formErrorMsg"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Confirm Password not matched"])),(l()(),e["\u0275ted"](-1,null,["\n                      "]))],null,null)}function w(l){return e["\u0275vid"](0,[(l()(),e["\u0275and"](16777216,null,null,1,null,c)),e["\u0275did"](1,16384,null,0,o.n,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n\n"])),(l()(),e["\u0275eld"](3,0,null,null,117,"div",[["class","body_container"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n  "])),(l()(),e["\u0275eld"](5,0,null,null,101,"div",[["class","confirmd_main"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n      "])),(l()(),e["\u0275eld"](7,0,null,null,98,"div",[["class","wrapper"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n          "])),(l()(),e["\u0275eld"](9,0,null,null,19,"div",[["class","confirm_left"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n              "])),(l()(),e["\u0275eld"](11,0,null,null,16,"div",[["class","forgetPass"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                  "])),(l()(),e["\u0275eld"](13,0,null,null,1,"h2",[["class","login_text"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Have you made your last will?"])),(l()(),e["\u0275ted"](-1,null,["\n                  "])),(l()(),e["\u0275eld"](16,0,null,null,1,"p",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                    Try SimplyWilled.com today and make sure your wishes are know.\n                  "])),(l()(),e["\u0275ted"](-1,null,["\n                  "])),(l()(),e["\u0275eld"](19,0,null,null,1,"h2",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Have a question?"])),(l()(),e["\u0275ted"](-1,null,["\n                  "])),(l()(),e["\u0275eld"](22,0,null,null,4,"p",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Email: "])),(l()(),e["\u0275eld"](24,0,null,null,1,"a",[["href",""]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["info@simplywilled.com"])),(l()(),e["\u0275ted"](-1,null,[" "])),(l()(),e["\u0275ted"](-1,null,["\n              "])),(l()(),e["\u0275ted"](-1,null,["\n\n\n          "])),(l()(),e["\u0275ted"](-1,null,["\n          "])),(l()(),e["\u0275eld"](30,0,null,null,74,"div",[["class","confirm_right"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n              "])),(l()(),e["\u0275eld"](32,0,null,null,7,"div",[["class","confirmed_form_top"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                  "])),(l()(),e["\u0275eld"](34,0,null,null,1,"h1",[["class","form_heading"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Change Your Password"])),(l()(),e["\u0275ted"](-1,null,["\n                  "])),(l()(),e["\u0275eld"](37,0,null,null,1,"p",[["class","form_pera"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Please set a new password below."])),(l()(),e["\u0275ted"](-1,null,["\n              "])),(l()(),e["\u0275ted"](-1,null,["\n              "])),(l()(),e["\u0275eld"](41,0,null,null,62,"div",[["class","confirmed_form_white_sec"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                  "])),(l()(),e["\u0275eld"](43,0,null,null,7,"div",[["class","row"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                      "])),(l()(),e["\u0275and"](16777216,null,null,1,null,g)),e["\u0275did"](46,16384,null,0,o.n,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n                      "])),(l()(),e["\u0275and"](16777216,null,null,1,null,p)),e["\u0275did"](49,16384,null,0,o.n,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n                  "])),(l()(),e["\u0275ted"](-1,null,["\n                  "])),(l()(),e["\u0275eld"](52,0,null,null,50,"form",[["id","signInForm"],["novalidate",""]],[[2,"ng-untouched",null],[2,"ng-touched",null],[2,"ng-pristine",null],[2,"ng-dirty",null],[2,"ng-valid",null],[2,"ng-invalid",null],[2,"ng-pending",null]],[[null,"submit"],[null,"reset"]],function(l,n,u){var t=!0;return"submit"===n&&(t=!1!==e["\u0275nov"](l,54).onSubmit(u)&&t),"reset"===n&&(t=!1!==e["\u0275nov"](l,54).onReset()&&t),t},null,null)),e["\u0275did"](53,16384,null,0,d["\u0275bf"],[],null,null),e["\u0275did"](54,4210688,[["signInForm",4]],0,d.NgForm,[[8,null],[8,null]],null,null),e["\u0275prd"](2048,null,d.ControlContainer,null,[d.NgForm]),e["\u0275did"](56,16384,null,0,d.NgControlStatusGroup,[d.ControlContainer],null,null),(l()(),e["\u0275ted"](-1,null,["\n                      "])),(l()(),e["\u0275eld"](58,0,null,null,8,"input",[["class","email_form"],["minlength","6"],["name","password"],["ngModel",""],["placeholder","Password"],["required",""],["type","password"]],[[1,"required",0],[1,"minlength",0],[2,"ng-untouched",null],[2,"ng-touched",null],[2,"ng-pristine",null],[2,"ng-dirty",null],[2,"ng-valid",null],[2,"ng-invalid",null],[2,"ng-pending",null]],[[null,"ngModelChange"],[null,"input"],[null,"blur"],[null,"compositionstart"],[null,"compositionend"]],function(l,n,u){var t=!0,o=l.component;return"input"===n&&(t=!1!==e["\u0275nov"](l,59)._handleInput(u.target.value)&&t),"blur"===n&&(t=!1!==e["\u0275nov"](l,59).onTouched()&&t),"compositionstart"===n&&(t=!1!==e["\u0275nov"](l,59)._compositionStart()&&t),"compositionend"===n&&(t=!1!==e["\u0275nov"](l,59)._compositionEnd(u.target.value)&&t),"ngModelChange"===n&&(t=!1!==(o.password=u)&&t),t},null,null)),e["\u0275did"](59,16384,null,0,d.DefaultValueAccessor,[e.Renderer2,e.ElementRef,[2,d.COMPOSITION_BUFFER_MODE]],null,null),e["\u0275did"](60,16384,null,0,d.RequiredValidator,[],{required:[0,"required"]},null),e["\u0275did"](61,540672,null,0,d.MinLengthValidator,[],{minlength:[0,"minlength"]},null),e["\u0275prd"](1024,null,d.NG_VALIDATORS,function(l,n){return[l,n]},[d.RequiredValidator,d.MinLengthValidator]),e["\u0275prd"](1024,null,d.NG_VALUE_ACCESSOR,function(l){return[l]},[d.DefaultValueAccessor]),e["\u0275did"](64,671744,[["chpassword",4]],0,d.NgModel,[[2,d.ControlContainer],[2,d.NG_VALIDATORS],[8,null],[2,d.NG_VALUE_ACCESSOR]],{name:[0,"name"],model:[1,"model"]},{update:"ngModelChange"}),e["\u0275prd"](2048,null,d.NgControl,null,[d.NgModel]),e["\u0275did"](66,16384,null,0,d.NgControlStatus,[d.NgControl],null,null),(l()(),e["\u0275ted"](-1,null,["\n                      "])),(l()(),e["\u0275and"](16777216,null,null,1,null,v)),e["\u0275did"](69,16384,null,0,o.n,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n                    "])),(l()(),e["\u0275eld"](71,0,null,null,7,"input",[["class","email_form"],["name","confirmPassword"],["ngModel",""],["placeholder","Confirm Password"],["required",""],["type","password"]],[[1,"required",0],[2,"ng-untouched",null],[2,"ng-touched",null],[2,"ng-pristine",null],[2,"ng-dirty",null],[2,"ng-valid",null],[2,"ng-invalid",null],[2,"ng-pending",null]],[[null,"ngModelChange"],[null,"input"],[null,"blur"],[null,"compositionstart"],[null,"compositionend"]],function(l,n,u){var t=!0,o=l.component;return"input"===n&&(t=!1!==e["\u0275nov"](l,72)._handleInput(u.target.value)&&t),"blur"===n&&(t=!1!==e["\u0275nov"](l,72).onTouched()&&t),"compositionstart"===n&&(t=!1!==e["\u0275nov"](l,72)._compositionStart()&&t),"compositionend"===n&&(t=!1!==e["\u0275nov"](l,72)._compositionEnd(u.target.value)&&t),"ngModelChange"===n&&(t=!1!==(o.confirmPassword=u)&&t),t},null,null)),e["\u0275did"](72,16384,null,0,d.DefaultValueAccessor,[e.Renderer2,e.ElementRef,[2,d.COMPOSITION_BUFFER_MODE]],null,null),e["\u0275did"](73,16384,null,0,d.RequiredValidator,[],{required:[0,"required"]},null),e["\u0275prd"](1024,null,d.NG_VALIDATORS,function(l){return[l]},[d.RequiredValidator]),e["\u0275prd"](1024,null,d.NG_VALUE_ACCESSOR,function(l){return[l]},[d.DefaultValueAccessor]),e["\u0275did"](76,671744,[["conPassword",4]],0,d.NgModel,[[2,d.ControlContainer],[2,d.NG_VALIDATORS],[8,null],[2,d.NG_VALUE_ACCESSOR]],{name:[0,"name"],model:[1,"model"]},{update:"ngModelChange"}),e["\u0275prd"](2048,null,d.NgControl,null,[d.NgModel]),e["\u0275did"](78,16384,null,0,d.NgControlStatus,[d.NgControl],null,null),(l()(),e["\u0275ted"](-1,null,["\n                      "])),(l()(),e["\u0275and"](16777216,null,null,1,null,h)),e["\u0275did"](81,16384,null,0,o.n,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n\n                      "])),(l()(),e["\u0275and"](16777216,null,null,1,null,_)),e["\u0275did"](84,16384,null,0,o.n,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n\n                      "])),(l()(),e["\u0275eld"](86,0,null,null,3,"div",[["class","loader_parent"],["id","response_loader"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                          "])),(l()(),e["\u0275eld"](88,0,null,null,0,"span",[["class","loader"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                      "])),(l()(),e["\u0275ted"](-1,null,["\n                      "])),(l()(),e["\u0275eld"](91,0,null,null,10,"div",[["class","get_start_main"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                          "])),(l()(),e["\u0275eld"](93,0,null,null,1,"div",[["class","clicking_left"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n\n                          "])),(l()(),e["\u0275ted"](-1,null,["\n                          "])),(l()(),e["\u0275ted"](-1,null,["\n                          "])),(l()(),e["\u0275eld"](97,0,null,null,3,"button",[["class","login_btn"],["value","Continue"]],[[8,"disabled",0]],[[null,"click"]],function(l,n,u){var e=!0;return"click"===n&&(e=!1!==l.component.resetSubmit()&&e),e},null,null)),(l()(),e["\u0275ted"](-1,null,["\n                              "])),(l()(),e["\u0275eld"](99,0,null,null,0,"i",[["aria-hidden","true"],["class","fa fa-chevron-right"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Reset Password\n                          "])),(l()(),e["\u0275ted"](-1,null,["\n                      "])),(l()(),e["\u0275ted"](-1,null,["\n                  "])),(l()(),e["\u0275ted"](-1,null,["\n              "])),(l()(),e["\u0275ted"](-1,null,["\n          "])),(l()(),e["\u0275ted"](-1,null,["\n      "])),(l()(),e["\u0275ted"](-1,null,["\n  "])),(l()(),e["\u0275ted"](-1,null,["\n  "])),(l()(),e["\u0275eld"](108,0,null,null,11,"div",[["class","about_sec4"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n          "])),(l()(),e["\u0275eld"](110,0,null,null,8,"div",[["class","wrapper"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275eld"](112,0,null,null,1,"h1",[["class","about_state_planning_text"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Estate Planning Made Simple & Affordable."])),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275eld"](115,0,null,null,1,"h4",[["class","select_plan"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Select your plan now and Keep your loved ones safe!"])),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275ted"](-1,null,["\n          "])),(l()(),e["\u0275ted"](-1,null,["\n        "])),(l()(),e["\u0275ted"](-1,null,["\n"])),(l()(),e["\u0275ted"](-1,null,["\n"]))],function(l,n){var u=n.component;l(n,1,0,u.showLoader),l(n,46,0,!1===u.respType),l(n,49,0,!0===u.respType),l(n,60,0,""),l(n,61,0,"6"),l(n,64,0,"password",u.password),l(n,69,0,e["\u0275nov"](n,64).errors&&(e["\u0275nov"](n,64).dirty||e["\u0275nov"](n,64).touched)),l(n,73,0,""),l(n,76,0,"confirmPassword",u.confirmPassword),l(n,81,0,e["\u0275nov"](n,76).errors&&(e["\u0275nov"](n,76).dirty||e["\u0275nov"](n,76).touched)),l(n,84,0,u.confirmPassword!==u.password)},function(l,n){var u=n.component;l(n,52,0,e["\u0275nov"](n,56).ngClassUntouched,e["\u0275nov"](n,56).ngClassTouched,e["\u0275nov"](n,56).ngClassPristine,e["\u0275nov"](n,56).ngClassDirty,e["\u0275nov"](n,56).ngClassValid,e["\u0275nov"](n,56).ngClassInvalid,e["\u0275nov"](n,56).ngClassPending),l(n,58,0,e["\u0275nov"](n,60).required?"":null,e["\u0275nov"](n,61).minlength?e["\u0275nov"](n,61).minlength:null,e["\u0275nov"](n,66).ngClassUntouched,e["\u0275nov"](n,66).ngClassTouched,e["\u0275nov"](n,66).ngClassPristine,e["\u0275nov"](n,66).ngClassDirty,e["\u0275nov"](n,66).ngClassValid,e["\u0275nov"](n,66).ngClassInvalid,e["\u0275nov"](n,66).ngClassPending),l(n,71,0,e["\u0275nov"](n,73).required?"":null,e["\u0275nov"](n,78).ngClassUntouched,e["\u0275nov"](n,78).ngClassTouched,e["\u0275nov"](n,78).ngClassPristine,e["\u0275nov"](n,78).ngClassDirty,e["\u0275nov"](n,78).ngClassValid,e["\u0275nov"](n,78).ngClassInvalid,e["\u0275nov"](n,78).ngClassPending),l(n,97,0,!e["\u0275nov"](n,54).form.valid||u.confirmPassword!==u.password)})}var P=e["\u0275ccf"]("app-reset-password",a,function(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,1,"app-reset-password",[],null,null,null,w,i)),e["\u0275did"](1,114688,null,0,a,[r.a,s.a,r.n],null,null)],function(l,n){l(n,1,0)},null)},{},{},[]),M=function(){};u.d(n,"ResetPasswordModuleNgFactory",function(){return R});var R=e["\u0275cmf"](t,[],function(l){return e["\u0275mod"]([e["\u0275mpd"](512,e.ComponentFactoryResolver,e["\u0275CodegenComponentFactoryResolver"],[[8,[P]],[3,e.ComponentFactoryResolver],e.NgModuleRef]),e["\u0275mpd"](4608,o.p,o.o,[e.LOCALE_ID,[2,o.A]]),e["\u0275mpd"](4608,d["\u0275i"],d["\u0275i"],[]),e["\u0275mpd"](512,o.c,o.c,[]),e["\u0275mpd"](512,d["\u0275ba"],d["\u0275ba"],[]),e["\u0275mpd"](512,d.FormsModule,d.FormsModule,[]),e["\u0275mpd"](512,r.r,r.r,[[2,r.w],[2,r.n]]),e["\u0275mpd"](512,M,M,[]),e["\u0275mpd"](512,t,t,[]),e["\u0275mpd"](1024,r.l,function(){return[[{path:"",component:a}]]},[])])})}});