webpackJsonp([20],{kcqR:function(l,n,u){"use strict";Object.defineProperty(n,"__esModule",{value:!0});var e=u("WT6e"),t=function(){},d=u("Xjw4"),o=u("7DMc"),r=function(){function l(l){this.validateEqual=l}return l.prototype.validate=function(l){var n=l.value,u=l.root.get(this.validateEqual);return u&&n!==u.value?{validateEqual:!1}:null},l}(),i=u("bfOx"),a=u("MkPD"),s=function(){function l(l,n){this.userService=l,this.router=n}return l.prototype.ngOnInit=function(){this.showLoader=!1,this.responseReceived=!1,this.setRequestStatus=!1,this.setResponseMsg=""},l.prototype.onSubmit=function(l){var n=this;this.showLoader=!0,this.userService.register(l.value).subscribe(function(l){n.showLoader=!1,l.status?(localStorage.setItem("loggedInUser",JSON.stringify(l)),localStorage.setItem("_loggedInToken",l.token),n.router.navigate(["/dashboard"])):(n.setRequestStatus=!1,n.setResponseMsg="Some error occured")},function(l){n.setRequestStatus=!1,n.setResponseMsg=l.error.error,n.showLoader=!1,n.responseReceived=!0,setTimeout(function(){n.responseReceived=!1},5e3)},function(){l.reset()})},l}(),c=e["\u0275crt"]({encapsulation:0,styles:[[".login_btn[_ngcontent-%COMP%]:disabled{opacity:.3;cursor:auto}a[_ngcontent-%COMP%]:hover{color:#fff}.already_account[_ngcontent-%COMP%]:hover{color:#373737;text-decoration:underline}"]],data:{}});function g(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,15,"div",[["class","pageLoader"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n    "])),(l()(),e["\u0275eld"](2,0,null,null,12,"div",[["class","loaderInner"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n        "])),(l()(),e["\u0275eld"](4,0,null,null,0,"img",[["alt","Loading..."],["src","../../../../assets/images/owl-loading.gif"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n        "])),(l()(),e["\u0275eld"](6,0,null,null,7,"p",[["class","loadingTxt"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n            Please Wait\n            "])),(l()(),e["\u0275eld"](8,0,null,null,0,"span",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275eld"](10,0,null,null,0,"span",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275eld"](12,0,null,null,0,"span",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n        "])),(l()(),e["\u0275ted"](-1,null,["\n    "])),(l()(),e["\u0275ted"](-1,null,["\n"]))],null,null)}function p(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,4,"div",[["class","alert alert-danger"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                      "])),(l()(),e["\u0275eld"](2,0,null,null,1,"strong",[],null,null,null,null,null)),(l()(),e["\u0275ted"](3,null,["",""])),(l()(),e["\u0275ted"](-1,null,["\n                  "]))],null,function(l,n){l(n,3,0,n.component.setResponseMsg)})}function v(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,4,"div",[["class","alert alert-success"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                      "])),(l()(),e["\u0275eld"](2,0,null,null,1,"strong",[],null,null,null,null,null)),(l()(),e["\u0275ted"](3,null,["",""])),(l()(),e["\u0275ted"](-1,null,["\n                  "]))],null,function(l,n){l(n,3,0,n.component.setResponseMsg)})}function m(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,13,"div",[["class","row"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n              "])),(l()(),e["\u0275eld"](2,0,null,null,4,"div",[["class","col-lg-12"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                  "])),(l()(),e["\u0275and"](16777216,null,null,1,null,p)),e["\u0275did"](5,16384,null,0,d.m,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n              "])),(l()(),e["\u0275ted"](-1,null,["\n              "])),(l()(),e["\u0275eld"](8,0,null,null,4,"div",[["class","col-lg-12"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                  "])),(l()(),e["\u0275and"](16777216,null,null,1,null,v)),e["\u0275did"](11,16384,null,0,d.m,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n              "])),(l()(),e["\u0275ted"](-1,null,["\n          "]))],function(l,n){var u=n.component;l(n,5,0,!u.setRequestStatus),l(n,11,0,u.setRequestStatus)},null)}function f(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,1,"p",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Email is required"]))],null,null)}function h(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,1,"p",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Email is not correct!"]))],null,null)}function C(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,7,"span",[["class","alert-danger"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275and"](16777216,null,null,1,null,f)),e["\u0275did"](3,16384,null,0,d.m,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275and"](16777216,null,null,1,null,h)),e["\u0275did"](6,16384,null,0,d.m,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n          "]))],function(l,n){l(n,3,0,null==e["\u0275nov"](n.parent,35).errors?null:e["\u0275nov"](n.parent,35).errors.required),l(n,6,0,null==e["\u0275nov"](n.parent,35).errors?null:e["\u0275nov"](n.parent,35).errors.pattern)},null)}function _(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,1,"p",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Password is required"]))],null,null)}function R(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,1,"p",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Password should be minimum 6!"]))],null,null)}function I(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,7,"span",[["class","alert-danger"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275and"](16777216,null,null,1,null,_)),e["\u0275did"](3,16384,null,0,d.m,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275and"](16777216,null,null,1,null,R)),e["\u0275did"](6,16384,null,0,d.m,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n          "]))],function(l,n){l(n,3,0,null==e["\u0275nov"](n.parent,48).errors?null:e["\u0275nov"](n.parent,48).errors.required),l(n,6,0,null==e["\u0275nov"](n.parent,48).errors?null:e["\u0275nov"](n.parent,48).errors.minlength)},null)}function w(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,1,"p",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Confirm Password is required"]))],null,null)}function S(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,1,"p",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Confirm Password should be minimum 6!"]))],null,null)}function V(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,7,"span",[["class","alert-danger"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275and"](16777216,null,null,1,null,w)),e["\u0275did"](3,16384,null,0,d.m,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275and"](16777216,null,null,1,null,S)),e["\u0275did"](6,16384,null,0,d.m,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n          "]))],function(l,n){l(n,3,0,null==e["\u0275nov"](n.parent,62).errors?null:e["\u0275nov"](n.parent,62).errors.required),l(n,6,0,null==e["\u0275nov"](n.parent,62).errors?null:e["\u0275nov"](n.parent,62).errors.minlength)},null)}function y(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,4,"span",[["class","text-danger"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n              "])),(l()(),e["\u0275eld"](2,0,null,null,1,"p",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Confirm Password should be same as password!"])),(l()(),e["\u0275ted"](-1,null,["\n          "]))],null,null)}function b(l){return e["\u0275vid"](0,[(l()(),e["\u0275and"](16777216,null,null,1,null,g)),e["\u0275did"](1,16384,null,0,d.m,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n\n"])),(l()(),e["\u0275eld"](3,0,null,null,151,"div",[["class","confirmd_main grey_bg border_top_green"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n  "])),(l()(),e["\u0275eld"](5,0,null,null,148,"div",[["class","wrapper"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n    "])),(l()(),e["\u0275eld"](7,0,null,null,91,"div",[["class","confirm_right"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n      "])),(l()(),e["\u0275eld"](9,0,null,null,7,"div",[["class","confirmed_form_top"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n        "])),(l()(),e["\u0275eld"](11,0,null,null,1,"h1",[["class","form_heading"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Let\u2019s get started"])),(l()(),e["\u0275ted"](-1,null,["\n        "])),(l()(),e["\u0275eld"](14,0,null,null,1,"p",[["class","form_pera"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["SimplyWilled.com is the easiest way to make your last will online. Sign up below to get started."])),(l()(),e["\u0275ted"](-1,null,["\n      "])),(l()(),e["\u0275ted"](-1,null,["\n\n      "])),(l()(),e["\u0275eld"](18,0,null,null,79,"div",[["class","confirmed_form_white_sec"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n          "])),(l()(),e["\u0275and"](16777216,null,null,1,null,m)),e["\u0275did"](21,16384,null,0,d.m,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n        "])),(l()(),e["\u0275eld"](23,0,null,null,73,"form",[["id","signInForm"],["novalidate",""]],[[2,"ng-untouched",null],[2,"ng-touched",null],[2,"ng-pristine",null],[2,"ng-dirty",null],[2,"ng-valid",null],[2,"ng-invalid",null],[2,"ng-pending",null]],[[null,"ngSubmit"],[null,"submit"],[null,"reset"]],function(l,n,u){var t=!0,d=l.component;return"submit"===n&&(t=!1!==e["\u0275nov"](l,25).onSubmit(u)&&t),"reset"===n&&(t=!1!==e["\u0275nov"](l,25).onReset()&&t),"ngSubmit"===n&&(t=!1!==d.onSubmit(e["\u0275nov"](l,25))&&t),t},null,null)),e["\u0275did"](24,16384,null,0,o["\u0275bf"],[],null,null),e["\u0275did"](25,4210688,[["form",4]],0,o.NgForm,[[8,null],[8,null]],null,{ngSubmit:"ngSubmit"}),e["\u0275prd"](2048,null,o.ControlContainer,null,[o.NgForm]),e["\u0275did"](27,16384,null,0,o.NgControlStatusGroup,[o.ControlContainer],null,null),(l()(),e["\u0275ted"](-1,null,["\n          "])),(l()(),e["\u0275eld"](29,0,null,null,8,"input",[["class","email_form"],["name","email"],["ngModel",""],["pattern","[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,3}$"],["placeholder","Email Address"],["required",""],["type","email"]],[[1,"required",0],[1,"pattern",0],[2,"ng-untouched",null],[2,"ng-touched",null],[2,"ng-pristine",null],[2,"ng-dirty",null],[2,"ng-valid",null],[2,"ng-invalid",null],[2,"ng-pending",null]],[[null,"input"],[null,"blur"],[null,"compositionstart"],[null,"compositionend"]],function(l,n,u){var t=!0;return"input"===n&&(t=!1!==e["\u0275nov"](l,30)._handleInput(u.target.value)&&t),"blur"===n&&(t=!1!==e["\u0275nov"](l,30).onTouched()&&t),"compositionstart"===n&&(t=!1!==e["\u0275nov"](l,30)._compositionStart()&&t),"compositionend"===n&&(t=!1!==e["\u0275nov"](l,30)._compositionEnd(u.target.value)&&t),t},null,null)),e["\u0275did"](30,16384,null,0,o.DefaultValueAccessor,[e.Renderer2,e.ElementRef,[2,o.COMPOSITION_BUFFER_MODE]],null,null),e["\u0275did"](31,16384,null,0,o.RequiredValidator,[],{required:[0,"required"]},null),e["\u0275did"](32,540672,null,0,o.PatternValidator,[],{pattern:[0,"pattern"]},null),e["\u0275prd"](1024,null,o.NG_VALIDATORS,function(l,n){return[l,n]},[o.RequiredValidator,o.PatternValidator]),e["\u0275prd"](1024,null,o.NG_VALUE_ACCESSOR,function(l){return[l]},[o.DefaultValueAccessor]),e["\u0275did"](35,671744,[["email",4]],0,o.NgModel,[[2,o.ControlContainer],[2,o.NG_VALIDATORS],[8,null],[2,o.NG_VALUE_ACCESSOR]],{name:[0,"name"],model:[1,"model"]},null),e["\u0275prd"](2048,null,o.NgControl,null,[o.NgModel]),e["\u0275did"](37,16384,null,0,o.NgControlStatus,[o.NgControl],null,null),(l()(),e["\u0275ted"](-1,null,["\n          "])),(l()(),e["\u0275and"](16777216,null,null,1,null,C)),e["\u0275did"](40,16384,null,0,d.m,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n\n          "])),(l()(),e["\u0275eld"](42,0,null,null,8,"input",[["class","email_form"],["minlength","6"],["name","password"],["ngModel",""],["placeholder","Password"],["required",""],["type","password"]],[[1,"required",0],[1,"minlength",0],[2,"ng-untouched",null],[2,"ng-touched",null],[2,"ng-pristine",null],[2,"ng-dirty",null],[2,"ng-valid",null],[2,"ng-invalid",null],[2,"ng-pending",null]],[[null,"input"],[null,"blur"],[null,"compositionstart"],[null,"compositionend"]],function(l,n,u){var t=!0;return"input"===n&&(t=!1!==e["\u0275nov"](l,43)._handleInput(u.target.value)&&t),"blur"===n&&(t=!1!==e["\u0275nov"](l,43).onTouched()&&t),"compositionstart"===n&&(t=!1!==e["\u0275nov"](l,43)._compositionStart()&&t),"compositionend"===n&&(t=!1!==e["\u0275nov"](l,43)._compositionEnd(u.target.value)&&t),t},null,null)),e["\u0275did"](43,16384,null,0,o.DefaultValueAccessor,[e.Renderer2,e.ElementRef,[2,o.COMPOSITION_BUFFER_MODE]],null,null),e["\u0275did"](44,16384,null,0,o.RequiredValidator,[],{required:[0,"required"]},null),e["\u0275did"](45,540672,null,0,o.MinLengthValidator,[],{minlength:[0,"minlength"]},null),e["\u0275prd"](1024,null,o.NG_VALIDATORS,function(l,n){return[l,n]},[o.RequiredValidator,o.MinLengthValidator]),e["\u0275prd"](1024,null,o.NG_VALUE_ACCESSOR,function(l){return[l]},[o.DefaultValueAccessor]),e["\u0275did"](48,671744,[["password",4]],0,o.NgModel,[[2,o.ControlContainer],[2,o.NG_VALIDATORS],[8,null],[2,o.NG_VALUE_ACCESSOR]],{name:[0,"name"],model:[1,"model"]},null),e["\u0275prd"](2048,null,o.NgControl,null,[o.NgModel]),e["\u0275did"](50,16384,null,0,o.NgControlStatus,[o.NgControl],null,null),(l()(),e["\u0275ted"](-1,null,["\n\n          "])),(l()(),e["\u0275and"](16777216,null,null,1,null,I)),e["\u0275did"](53,16384,null,0,d.m,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n\n          "])),(l()(),e["\u0275eld"](55,0,null,null,9,"input",[["class","email_form"],["minlength","6"],["name","confirm_password"],["ngModel",""],["placeholder","Confirm Password"],["required",""],["type","password"],["validateEqual","password"]],[[1,"required",0],[1,"minlength",0],[2,"ng-untouched",null],[2,"ng-touched",null],[2,"ng-pristine",null],[2,"ng-dirty",null],[2,"ng-valid",null],[2,"ng-invalid",null],[2,"ng-pending",null]],[[null,"input"],[null,"blur"],[null,"compositionstart"],[null,"compositionend"]],function(l,n,u){var t=!0;return"input"===n&&(t=!1!==e["\u0275nov"](l,56)._handleInput(u.target.value)&&t),"blur"===n&&(t=!1!==e["\u0275nov"](l,56).onTouched()&&t),"compositionstart"===n&&(t=!1!==e["\u0275nov"](l,56)._compositionStart()&&t),"compositionend"===n&&(t=!1!==e["\u0275nov"](l,56)._compositionEnd(u.target.value)&&t),t},null,null)),e["\u0275did"](56,16384,null,0,o.DefaultValueAccessor,[e.Renderer2,e.ElementRef,[2,o.COMPOSITION_BUFFER_MODE]],null,null),e["\u0275did"](57,16384,null,0,o.RequiredValidator,[],{required:[0,"required"]},null),e["\u0275did"](58,540672,null,0,o.MinLengthValidator,[],{minlength:[0,"minlength"]},null),e["\u0275did"](59,16384,null,0,r,[[8,"password"]],null,null),e["\u0275prd"](1024,null,o.NG_VALIDATORS,function(l,n,u){return[l,n,u]},[o.RequiredValidator,o.MinLengthValidator,r]),e["\u0275prd"](1024,null,o.NG_VALUE_ACCESSOR,function(l){return[l]},[o.DefaultValueAccessor]),e["\u0275did"](62,671744,[["confirm",4]],0,o.NgModel,[[2,o.ControlContainer],[2,o.NG_VALIDATORS],[8,null],[2,o.NG_VALUE_ACCESSOR]],{name:[0,"name"],model:[1,"model"]},null),e["\u0275prd"](2048,null,o.NgControl,null,[o.NgModel]),e["\u0275did"](64,16384,null,0,o.NgControlStatus,[o.NgControl],null,null),(l()(),e["\u0275ted"](-1,null,["\n\n          "])),(l()(),e["\u0275and"](16777216,null,null,1,null,V)),e["\u0275did"](67,16384,null,0,d.m,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n          "])),(l()(),e["\u0275and"](16777216,null,null,1,null,y)),e["\u0275did"](70,16384,null,0,d.m,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n\n          "])),(l()(),e["\u0275eld"](72,0,null,null,3,"div",[["class","loader_parent"],["id","response_loader"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275eld"](74,0,null,null,0,"span",[["class","loader"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n          "])),(l()(),e["\u0275ted"](-1,null,["\n          "])),(l()(),e["\u0275eld"](77,0,null,null,18,"div",[["class","get_start_main"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275eld"](79,0,null,null,9,"div",[["class","clicking_left"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n              "])),(l()(),e["\u0275eld"](81,0,null,null,2,"a",[["class","already_account"],["routerLink","/sign-in"]],[[1,"target",0],[8,"href",4]],[[null,"click"]],function(l,n,u){var t=!0;return"click"===n&&(t=!1!==e["\u0275nov"](l,82).onClick(u.button,u.ctrlKey,u.metaKey,u.shiftKey)&&t),t},null,null)),e["\u0275did"](82,671744,null,0,i.q,[i.n,i.a,d.j],{routerLink:[0,"routerLink"]},null),(l()(),e["\u0275ted"](-1,null,["Login"])),(l()(),e["\u0275ted"](-1,null,["\n              "])),(l()(),e["\u0275eld"](85,0,null,null,2,"a",[["class","already_account"],["routerLink","/forget-password"]],[[1,"target",0],[8,"href",4]],[[null,"click"]],function(l,n,u){var t=!0;return"click"===n&&(t=!1!==e["\u0275nov"](l,86).onClick(u.button,u.ctrlKey,u.metaKey,u.shiftKey)&&t),t},null,null)),e["\u0275did"](86,671744,null,0,i.q,[i.n,i.a,d.j],{routerLink:[0,"routerLink"]},null),(l()(),e["\u0275ted"](-1,null,["Forgot your password?"])),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275eld"](91,0,null,null,3,"button",[["class","login_btn"],["value","Continue"]],[[8,"disabled",0]],null,null,null,null)),(l()(),e["\u0275ted"](-1,null,[" "])),(l()(),e["\u0275eld"](93,0,null,null,0,"i",[["aria-hidden","true"],["class","fa fa-chevron-right"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Register"])),(l()(),e["\u0275ted"](-1,null,["\n          "])),(l()(),e["\u0275ted"](-1,null,["\n        "])),(l()(),e["\u0275ted"](-1,null,["\n      "])),(l()(),e["\u0275ted"](-1,null,["\n    "])),(l()(),e["\u0275ted"](-1,null,["\n    "])),(l()(),e["\u0275eld"](100,0,null,null,52,"div",[["class","confirm_left"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n        "])),(l()(),e["\u0275eld"](102,0,null,null,1,"h1",[["class","login_text"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Create your account."])),(l()(),e["\u0275ted"](-1,null,["\n\n\n        "])),(l()(),e["\u0275eld"](105,0,null,null,46,"ul",[["class","protect_loved_ul2"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275eld"](107,0,null,null,13,"li",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275eld"](109,0,null,null,1,"span",[["class","loved_img2"]],null,null,null,null,null)),(l()(),e["\u0275eld"](110,0,null,null,0,"img",[["alt","protect img"],["src","../../../../assets/images/protect-img.png"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275eld"](112,0,null,null,7,"div",[["class","protect_loved_right2"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                    "])),(l()(),e["\u0275eld"](114,0,null,null,1,"h2",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["PROTECT YOUR LOVED ONES"])),(l()(),e["\u0275ted"](-1,null,["\n                    "])),(l()(),e["\u0275eld"](117,0,null,null,1,"p",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Name guardians and list beneficiaries so those you love are in good hands."])),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275eld"](122,0,null,null,13,"li",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275eld"](124,0,null,null,1,"span",[["class","loved_img2"]],null,null,null,null,null)),(l()(),e["\u0275eld"](125,0,null,null,0,"img",[["alt","protect img"],["src","../../../../assets/images/protect-img.png"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275eld"](127,0,null,null,7,"div",[["class","protect_loved_right2"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                    "])),(l()(),e["\u0275eld"](129,0,null,null,1,"h2",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["PROTECT YOUR ASSETS"])),(l()(),e["\u0275ted"](-1,null,["\n                    "])),(l()(),e["\u0275eld"](132,0,null,null,1,"p",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Ensure the assets you\u2019ve worked hard for pass to the ones you love."])),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275eld"](137,0,null,null,13,"li",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275eld"](139,0,null,null,1,"span",[["class","loved_img2"]],null,null,null,null,null)),(l()(),e["\u0275eld"](140,0,null,null,0,"img",[["alt","protect img"],["src","../../../../assets/images/protect-img.png"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275eld"](142,0,null,null,7,"div",[["class","protect_loved_right2"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                    "])),(l()(),e["\u0275eld"](144,0,null,null,1,"h2",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["SAVE TIME & MONEY"])),(l()(),e["\u0275ted"](-1,null,["\n                    "])),(l()(),e["\u0275eld"](147,0,null,null,1,"p",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["It takes less than 15 minutes and your done. Try it today and\n                        see how simple preparing  your last will and testament online can be."])),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275ted"](-1,null,["\n        "])),(l()(),e["\u0275ted"](-1,null,["\n\n    "])),(l()(),e["\u0275ted"](-1,null,["\n  "])),(l()(),e["\u0275ted"](-1,null,["\n"])),(l()(),e["\u0275ted"](-1,null,["\n"])),(l()(),e["\u0275eld"](156,0,null,null,11,"div",[["class","about_sec4"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n    "])),(l()(),e["\u0275eld"](158,0,null,null,8,"div",[["class","wrapper"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n      "])),(l()(),e["\u0275eld"](160,0,null,null,1,"h1",[["class","about_state_planning_text"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Estate Planning Made Simple & Affordable."])),(l()(),e["\u0275ted"](-1,null,["\n      "])),(l()(),e["\u0275eld"](163,0,null,null,1,"h4",[["class","select_plan"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Get started now and keep your loved ones safe!"])),(l()(),e["\u0275ted"](-1,null,["\n      "])),(l()(),e["\u0275ted"](-1,null,["\n    "])),(l()(),e["\u0275ted"](-1,null,["\n  "])),(l()(),e["\u0275ted"](-1,null,["\n"]))],function(l,n){var u=n.component;l(n,1,0,u.showLoader),l(n,21,0,u.responseReceived),l(n,31,0,""),l(n,32,0,"[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,3}$"),l(n,35,0,"email",""),l(n,40,0,e["\u0275nov"](n,35).errors&&(e["\u0275nov"](n,35).dirty||e["\u0275nov"](n,35).touched)),l(n,44,0,""),l(n,45,0,"6"),l(n,48,0,"password",""),l(n,53,0,e["\u0275nov"](n,48).errors&&(e["\u0275nov"](n,48).dirty||e["\u0275nov"](n,48).touched)),l(n,57,0,""),l(n,58,0,"6"),l(n,62,0,"confirm_password",""),l(n,67,0,e["\u0275nov"](n,62).errors&&(e["\u0275nov"](n,62).dirty||e["\u0275nov"](n,62).touched)),l(n,70,0,e["\u0275nov"](n,62).invalid&&(e["\u0275nov"](n,62).dirty||e["\u0275nov"](n,62).touched)),l(n,82,0,"/sign-in"),l(n,86,0,"/forget-password")},function(l,n){l(n,23,0,e["\u0275nov"](n,27).ngClassUntouched,e["\u0275nov"](n,27).ngClassTouched,e["\u0275nov"](n,27).ngClassPristine,e["\u0275nov"](n,27).ngClassDirty,e["\u0275nov"](n,27).ngClassValid,e["\u0275nov"](n,27).ngClassInvalid,e["\u0275nov"](n,27).ngClassPending),l(n,29,0,e["\u0275nov"](n,31).required?"":null,e["\u0275nov"](n,32).pattern?e["\u0275nov"](n,32).pattern:null,e["\u0275nov"](n,37).ngClassUntouched,e["\u0275nov"](n,37).ngClassTouched,e["\u0275nov"](n,37).ngClassPristine,e["\u0275nov"](n,37).ngClassDirty,e["\u0275nov"](n,37).ngClassValid,e["\u0275nov"](n,37).ngClassInvalid,e["\u0275nov"](n,37).ngClassPending),l(n,42,0,e["\u0275nov"](n,44).required?"":null,e["\u0275nov"](n,45).minlength?e["\u0275nov"](n,45).minlength:null,e["\u0275nov"](n,50).ngClassUntouched,e["\u0275nov"](n,50).ngClassTouched,e["\u0275nov"](n,50).ngClassPristine,e["\u0275nov"](n,50).ngClassDirty,e["\u0275nov"](n,50).ngClassValid,e["\u0275nov"](n,50).ngClassInvalid,e["\u0275nov"](n,50).ngClassPending),l(n,55,0,e["\u0275nov"](n,57).required?"":null,e["\u0275nov"](n,58).minlength?e["\u0275nov"](n,58).minlength:null,e["\u0275nov"](n,64).ngClassUntouched,e["\u0275nov"](n,64).ngClassTouched,e["\u0275nov"](n,64).ngClassPristine,e["\u0275nov"](n,64).ngClassDirty,e["\u0275nov"](n,64).ngClassValid,e["\u0275nov"](n,64).ngClassInvalid,e["\u0275nov"](n,64).ngClassPending),l(n,81,0,e["\u0275nov"](n,82).target,e["\u0275nov"](n,82).href),l(n,85,0,e["\u0275nov"](n,86).target,e["\u0275nov"](n,86).href),l(n,91,0,e["\u0275nov"](n,25).invalid)})}var E=e["\u0275ccf"]("app-user-register",s,function(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,1,"app-user-register",[],null,null,null,b,c)),e["\u0275did"](1,114688,null,0,s,[a.a,i.n],null,null)],function(l,n){l(n,1,0)},null)},{},{},[]),A=function(){};u.d(n,"UserRegisterModuleNgFactory",function(){return T});var T=e["\u0275cmf"](t,[],function(l){return e["\u0275mod"]([e["\u0275mpd"](512,e.ComponentFactoryResolver,e["\u0275CodegenComponentFactoryResolver"],[[8,[E]],[3,e.ComponentFactoryResolver],e.NgModuleRef]),e["\u0275mpd"](4608,d.o,d.n,[e.LOCALE_ID,[2,d.x]]),e["\u0275mpd"](4608,o["\u0275i"],o["\u0275i"],[]),e["\u0275mpd"](512,d.c,d.c,[]),e["\u0275mpd"](512,i.r,i.r,[[2,i.w],[2,i.n]]),e["\u0275mpd"](512,A,A,[]),e["\u0275mpd"](512,o["\u0275ba"],o["\u0275ba"],[]),e["\u0275mpd"](512,o.FormsModule,o.FormsModule,[]),e["\u0275mpd"](512,t,t,[]),e["\u0275mpd"](1024,i.l,function(){return[[{path:"",component:s}]]},[])])})}});