webpackJsonp([14],{kcqR:function(l,n,u){"use strict";Object.defineProperty(n,"__esModule",{value:!0});var e=u("WT6e"),t=function(){},d=u("Xjw4"),o=u("7DMc"),r=function(){function l(l){this.validateEqual=l}return l.prototype.validate=function(l){var n=l.value,u=l.root.get(this.validateEqual);return u&&n!==u.value?{validateEqual:!1}:null},l}(),i=u("bfOx"),a=u("MkPD"),s=function(){function l(l,n){this.userService=l,this.router=n}return l.prototype.ngOnInit=function(){this.showLoader=!1,this.responseReceived=!1,this.setRequestStatus=!1,this.setResponseMsg=""},l.prototype.onSubmit=function(l){var n=this;this.showLoader=!0,this.userService.register(l.value).subscribe(function(l){n.showLoader=!1,l.status?(localStorage.setItem("loggedInUser",JSON.stringify(l)),localStorage.setItem("_loggedInToken",l.token),n.router.navigate(["/dashboard"])):(n.setRequestStatus=!1,n.setResponseMsg="Some error occured")},function(l){n.setRequestStatus=!1,n.setResponseMsg=l.error.error,n.showLoader=!1,n.responseReceived=!0,setTimeout(function(){n.responseReceived=!1},5e3)},function(){l.reset()})},l}(),c=e["\u0275crt"]({encapsulation:0,styles:[[".login_btn[_ngcontent-%COMP%]:disabled{opacity:.3;cursor:auto}a[_ngcontent-%COMP%]:hover{color:#fff}"]],data:{}});function g(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,4,"div",[["class","alert alert-danger"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275eld"](2,0,null,null,1,"strong",[],null,null,null,null,null)),(l()(),e["\u0275ted"](3,null,["",""])),(l()(),e["\u0275ted"](-1,null,["\n          "]))],null,function(l,n){l(n,3,0,n.component.setResponseMsg)})}function p(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,4,"div",[["class","alert alert-success"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275eld"](2,0,null,null,1,"strong",[],null,null,null,null,null)),(l()(),e["\u0275ted"](3,null,["",""])),(l()(),e["\u0275ted"](-1,null,["\n          "]))],null,function(l,n){l(n,3,0,n.component.setResponseMsg)})}function v(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,1,"p",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Email is required"]))],null,null)}function m(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,1,"p",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Email is not correct!"]))],null,null)}function f(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,7,"span",[["class","alert-danger"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275and"](16777216,null,null,1,null,v)),e["\u0275did"](3,16384,null,0,d.k,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275and"](16777216,null,null,1,null,m)),e["\u0275did"](6,16384,null,0,d.k,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n          "]))],function(l,n){l(n,3,0,null==e["\u0275nov"](n.parent,44).errors?null:e["\u0275nov"](n.parent,44).errors.required),l(n,6,0,null==e["\u0275nov"](n.parent,44).errors?null:e["\u0275nov"](n.parent,44).errors.pattern)},null)}function h(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,1,"p",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Password is required"]))],null,null)}function C(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,1,"p",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Password should be minimum 6!"]))],null,null)}function _(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,7,"span",[["class","alert-danger"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275and"](16777216,null,null,1,null,h)),e["\u0275did"](3,16384,null,0,d.k,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275and"](16777216,null,null,1,null,C)),e["\u0275did"](6,16384,null,0,d.k,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n          "]))],function(l,n){l(n,3,0,null==e["\u0275nov"](n.parent,57).errors?null:e["\u0275nov"](n.parent,57).errors.required),l(n,6,0,null==e["\u0275nov"](n.parent,57).errors?null:e["\u0275nov"](n.parent,57).errors.minlength)},null)}function R(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,1,"p",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Confirm Password is required"]))],null,null)}function S(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,1,"p",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Confirm Password should be minimum 6!"]))],null,null)}function I(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,7,"span",[["class","alert-danger"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275and"](16777216,null,null,1,null,R)),e["\u0275did"](3,16384,null,0,d.k,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275and"](16777216,null,null,1,null,S)),e["\u0275did"](6,16384,null,0,d.k,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n          "]))],function(l,n){l(n,3,0,null==e["\u0275nov"](n.parent,71).errors?null:e["\u0275nov"](n.parent,71).errors.required),l(n,6,0,null==e["\u0275nov"](n.parent,71).errors?null:e["\u0275nov"](n.parent,71).errors.minlength)},null)}function y(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,4,"span",[["class","text-danger"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n              "])),(l()(),e["\u0275eld"](2,0,null,null,1,"p",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Confirm Password should be same as password!"])),(l()(),e["\u0275ted"](-1,null,["\n          "]))],null,null)}function V(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,162,"div",[["class","confirmd_main grey_bg border_top_green"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n  "])),(l()(),e["\u0275eld"](2,0,null,null,159,"div",[["class","wrapper"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n    "])),(l()(),e["\u0275eld"](4,0,null,null,102,"div",[["class","confirm_right"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n      "])),(l()(),e["\u0275eld"](6,0,null,null,7,"div",[["class","confirmed_form_top"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n        "])),(l()(),e["\u0275eld"](8,0,null,null,1,"h1",[["class","form_heading"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Let\u2019s get started"])),(l()(),e["\u0275ted"](-1,null,["\n        "])),(l()(),e["\u0275eld"](11,0,null,null,1,"p",[["class","form_pera"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["SimplyWilled is the easiest way to make your estate plan online. Sign up below to get started."])),(l()(),e["\u0275ted"](-1,null,["\n      "])),(l()(),e["\u0275ted"](-1,null,["\n      "])),(l()(),e["\u0275eld"](15,0,null,null,13,"div",[["class","row"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n        "])),(l()(),e["\u0275eld"](17,0,null,null,4,"div",[["class","col-lg-12"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n          "])),(l()(),e["\u0275and"](16777216,null,null,1,null,g)),e["\u0275did"](20,16384,null,0,d.k,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n        "])),(l()(),e["\u0275ted"](-1,null,["\n        "])),(l()(),e["\u0275eld"](23,0,null,null,4,"div",[["class","col-lg-12"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n          "])),(l()(),e["\u0275and"](16777216,null,null,1,null,p)),e["\u0275did"](26,16384,null,0,d.k,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n        "])),(l()(),e["\u0275ted"](-1,null,["\n      "])),(l()(),e["\u0275ted"](-1,null,["\n      "])),(l()(),e["\u0275eld"](30,0,null,null,75,"div",[["class","confirmed_form_white_sec"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n        "])),(l()(),e["\u0275eld"](32,0,null,null,72,"form",[["id","signInForm"],["novalidate",""]],[[2,"ng-untouched",null],[2,"ng-touched",null],[2,"ng-pristine",null],[2,"ng-dirty",null],[2,"ng-valid",null],[2,"ng-invalid",null],[2,"ng-pending",null]],[[null,"ngSubmit"],[null,"submit"],[null,"reset"]],function(l,n,u){var t=!0,d=l.component;return"submit"===n&&(t=!1!==e["\u0275nov"](l,34).onSubmit(u)&&t),"reset"===n&&(t=!1!==e["\u0275nov"](l,34).onReset()&&t),"ngSubmit"===n&&(t=!1!==d.onSubmit(e["\u0275nov"](l,34))&&t),t},null,null)),e["\u0275did"](33,16384,null,0,o["\u0275bf"],[],null,null),e["\u0275did"](34,4210688,[["form",4]],0,o.NgForm,[[8,null],[8,null]],null,{ngSubmit:"ngSubmit"}),e["\u0275prd"](2048,null,o.ControlContainer,null,[o.NgForm]),e["\u0275did"](36,16384,null,0,o.NgControlStatusGroup,[o.ControlContainer],null,null),(l()(),e["\u0275ted"](-1,null,["\n          "])),(l()(),e["\u0275eld"](38,0,null,null,8,"input",[["class","email_form"],["name","email"],["ngModel",""],["pattern","[a-z0-9._%+-]+@[a-z0-9.-]+\\.[a-z]{2,3}$"],["placeholder","Email Address"],["required",""],["type","email"]],[[1,"required",0],[1,"pattern",0],[2,"ng-untouched",null],[2,"ng-touched",null],[2,"ng-pristine",null],[2,"ng-dirty",null],[2,"ng-valid",null],[2,"ng-invalid",null],[2,"ng-pending",null]],[[null,"input"],[null,"blur"],[null,"compositionstart"],[null,"compositionend"]],function(l,n,u){var t=!0;return"input"===n&&(t=!1!==e["\u0275nov"](l,39)._handleInput(u.target.value)&&t),"blur"===n&&(t=!1!==e["\u0275nov"](l,39).onTouched()&&t),"compositionstart"===n&&(t=!1!==e["\u0275nov"](l,39)._compositionStart()&&t),"compositionend"===n&&(t=!1!==e["\u0275nov"](l,39)._compositionEnd(u.target.value)&&t),t},null,null)),e["\u0275did"](39,16384,null,0,o.DefaultValueAccessor,[e.Renderer2,e.ElementRef,[2,o.COMPOSITION_BUFFER_MODE]],null,null),e["\u0275did"](40,16384,null,0,o.RequiredValidator,[],{required:[0,"required"]},null),e["\u0275did"](41,540672,null,0,o.PatternValidator,[],{pattern:[0,"pattern"]},null),e["\u0275prd"](1024,null,o.NG_VALIDATORS,function(l,n){return[l,n]},[o.RequiredValidator,o.PatternValidator]),e["\u0275prd"](1024,null,o.NG_VALUE_ACCESSOR,function(l){return[l]},[o.DefaultValueAccessor]),e["\u0275did"](44,671744,[["email",4]],0,o.NgModel,[[2,o.ControlContainer],[2,o.NG_VALIDATORS],[8,null],[2,o.NG_VALUE_ACCESSOR]],{name:[0,"name"],model:[1,"model"]},null),e["\u0275prd"](2048,null,o.NgControl,null,[o.NgModel]),e["\u0275did"](46,16384,null,0,o.NgControlStatus,[o.NgControl],null,null),(l()(),e["\u0275ted"](-1,null,["\n          "])),(l()(),e["\u0275and"](16777216,null,null,1,null,f)),e["\u0275did"](49,16384,null,0,d.k,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n\n          "])),(l()(),e["\u0275eld"](51,0,null,null,8,"input",[["class","email_form"],["minlength","6"],["name","password"],["ngModel",""],["placeholder","Password"],["required",""],["type","password"]],[[1,"required",0],[1,"minlength",0],[2,"ng-untouched",null],[2,"ng-touched",null],[2,"ng-pristine",null],[2,"ng-dirty",null],[2,"ng-valid",null],[2,"ng-invalid",null],[2,"ng-pending",null]],[[null,"input"],[null,"blur"],[null,"compositionstart"],[null,"compositionend"]],function(l,n,u){var t=!0;return"input"===n&&(t=!1!==e["\u0275nov"](l,52)._handleInput(u.target.value)&&t),"blur"===n&&(t=!1!==e["\u0275nov"](l,52).onTouched()&&t),"compositionstart"===n&&(t=!1!==e["\u0275nov"](l,52)._compositionStart()&&t),"compositionend"===n&&(t=!1!==e["\u0275nov"](l,52)._compositionEnd(u.target.value)&&t),t},null,null)),e["\u0275did"](52,16384,null,0,o.DefaultValueAccessor,[e.Renderer2,e.ElementRef,[2,o.COMPOSITION_BUFFER_MODE]],null,null),e["\u0275did"](53,16384,null,0,o.RequiredValidator,[],{required:[0,"required"]},null),e["\u0275did"](54,540672,null,0,o.MinLengthValidator,[],{minlength:[0,"minlength"]},null),e["\u0275prd"](1024,null,o.NG_VALIDATORS,function(l,n){return[l,n]},[o.RequiredValidator,o.MinLengthValidator]),e["\u0275prd"](1024,null,o.NG_VALUE_ACCESSOR,function(l){return[l]},[o.DefaultValueAccessor]),e["\u0275did"](57,671744,[["password",4]],0,o.NgModel,[[2,o.ControlContainer],[2,o.NG_VALIDATORS],[8,null],[2,o.NG_VALUE_ACCESSOR]],{name:[0,"name"],model:[1,"model"]},null),e["\u0275prd"](2048,null,o.NgControl,null,[o.NgModel]),e["\u0275did"](59,16384,null,0,o.NgControlStatus,[o.NgControl],null,null),(l()(),e["\u0275ted"](-1,null,["\n\n          "])),(l()(),e["\u0275and"](16777216,null,null,1,null,_)),e["\u0275did"](62,16384,null,0,d.k,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n\n          "])),(l()(),e["\u0275eld"](64,0,null,null,9,"input",[["class","email_form"],["minlength","6"],["name","confirm_password"],["ngModel",""],["placeholder","Confirm Password"],["required",""],["type","password"],["validateEqual","password"]],[[1,"required",0],[1,"minlength",0],[2,"ng-untouched",null],[2,"ng-touched",null],[2,"ng-pristine",null],[2,"ng-dirty",null],[2,"ng-valid",null],[2,"ng-invalid",null],[2,"ng-pending",null]],[[null,"input"],[null,"blur"],[null,"compositionstart"],[null,"compositionend"]],function(l,n,u){var t=!0;return"input"===n&&(t=!1!==e["\u0275nov"](l,65)._handleInput(u.target.value)&&t),"blur"===n&&(t=!1!==e["\u0275nov"](l,65).onTouched()&&t),"compositionstart"===n&&(t=!1!==e["\u0275nov"](l,65)._compositionStart()&&t),"compositionend"===n&&(t=!1!==e["\u0275nov"](l,65)._compositionEnd(u.target.value)&&t),t},null,null)),e["\u0275did"](65,16384,null,0,o.DefaultValueAccessor,[e.Renderer2,e.ElementRef,[2,o.COMPOSITION_BUFFER_MODE]],null,null),e["\u0275did"](66,16384,null,0,o.RequiredValidator,[],{required:[0,"required"]},null),e["\u0275did"](67,540672,null,0,o.MinLengthValidator,[],{minlength:[0,"minlength"]},null),e["\u0275did"](68,16384,null,0,r,[[8,"password"]],null,null),e["\u0275prd"](1024,null,o.NG_VALIDATORS,function(l,n,u){return[l,n,u]},[o.RequiredValidator,o.MinLengthValidator,r]),e["\u0275prd"](1024,null,o.NG_VALUE_ACCESSOR,function(l){return[l]},[o.DefaultValueAccessor]),e["\u0275did"](71,671744,[["confirm",4]],0,o.NgModel,[[2,o.ControlContainer],[2,o.NG_VALIDATORS],[8,null],[2,o.NG_VALUE_ACCESSOR]],{name:[0,"name"],model:[1,"model"]},null),e["\u0275prd"](2048,null,o.NgControl,null,[o.NgModel]),e["\u0275did"](73,16384,null,0,o.NgControlStatus,[o.NgControl],null,null),(l()(),e["\u0275ted"](-1,null,["\n\n          "])),(l()(),e["\u0275and"](16777216,null,null,1,null,I)),e["\u0275did"](76,16384,null,0,d.k,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n          "])),(l()(),e["\u0275and"](16777216,null,null,1,null,y)),e["\u0275did"](79,16384,null,0,d.k,[e.ViewContainerRef,e.TemplateRef],{ngIf:[0,"ngIf"]},null),(l()(),e["\u0275ted"](-1,null,["\n\n          "])),(l()(),e["\u0275eld"](81,0,null,null,3,"div",[["class","loader_parent"],["id","response_loader"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275eld"](83,0,null,null,0,"span",[["class","loader"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n          "])),(l()(),e["\u0275ted"](-1,null,["\n          "])),(l()(),e["\u0275eld"](86,0,null,null,17,"div",[["class","get_start_main"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275eld"](88,0,null,null,8,"div",[["class","clicking_left"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n              "])),(l()(),e["\u0275eld"](90,0,null,null,2,"a",[["class","already_account"],["routerLink","/sign-in"]],[[1,"target",0],[8,"href",4]],[[null,"click"]],function(l,n,u){var t=!0;return"click"===n&&(t=!1!==e["\u0275nov"](l,91).onClick(u.button,u.ctrlKey,u.metaKey,u.shiftKey)&&t),t},null,null)),e["\u0275did"](91,671744,null,0,i.o,[i.l,i.a,d.h],{routerLink:[0,"routerLink"]},null),(l()(),e["\u0275ted"](-1,null,["Login"])),(l()(),e["\u0275ted"](-1,null,["\n              "])),(l()(),e["\u0275eld"](94,0,null,null,1,"a",[["class","already_account"],["href",""]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Forgot your password?"])),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275eld"](99,0,null,null,3,"button",[["class","login_btn"],["value","Continue"]],[[8,"disabled",0]],null,null,null,null)),(l()(),e["\u0275ted"](-1,null,[" "])),(l()(),e["\u0275eld"](101,0,null,null,0,"i",[["aria-hidden","true"],["class","fa fa-chevron-right"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Register"])),(l()(),e["\u0275ted"](-1,null,["\n          "])),(l()(),e["\u0275ted"](-1,null,["\n        "])),(l()(),e["\u0275ted"](-1,null,["\n      "])),(l()(),e["\u0275ted"](-1,null,["\n    "])),(l()(),e["\u0275ted"](-1,null,["\n    "])),(l()(),e["\u0275eld"](108,0,null,null,52,"div",[["class","confirm_left"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n        "])),(l()(),e["\u0275eld"](110,0,null,null,1,"h1",[["class","login_text"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Sign up to create your account."])),(l()(),e["\u0275ted"](-1,null,["\n\n\n        "])),(l()(),e["\u0275eld"](113,0,null,null,46,"ul",[["class","protect_loved_ul2"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275eld"](115,0,null,null,13,"li",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275eld"](117,0,null,null,1,"span",[["class","loved_img2"]],null,null,null,null,null)),(l()(),e["\u0275eld"](118,0,null,null,0,"img",[["alt","protect img"],["src","../../../../assets/images/protect-img.png"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275eld"](120,0,null,null,7,"div",[["class","protect_loved_right2"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                    "])),(l()(),e["\u0275eld"](122,0,null,null,1,"h2",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["PROTECT YOUR LOVED ONES"])),(l()(),e["\u0275ted"](-1,null,["\n                    "])),(l()(),e["\u0275eld"](125,0,null,null,1,"p",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Name guardians and list beneficiaries so those you love are in good hands."])),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275eld"](130,0,null,null,13,"li",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275eld"](132,0,null,null,1,"span",[["class","loved_img2"]],null,null,null,null,null)),(l()(),e["\u0275eld"](133,0,null,null,0,"img",[["alt","protect img"],["src","../../../../assets/images/protect-img.png"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275eld"](135,0,null,null,7,"div",[["class","protect_loved_right2"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                    "])),(l()(),e["\u0275eld"](137,0,null,null,1,"h2",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["PROTECT YOUR ASSETS"])),(l()(),e["\u0275ted"](-1,null,["\n                    "])),(l()(),e["\u0275eld"](140,0,null,null,1,"p",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Ensure the assets you\u2019ve worked hard for pass to the ones you love."])),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275eld"](145,0,null,null,13,"li",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275eld"](147,0,null,null,1,"span",[["class","loved_img2"]],null,null,null,null,null)),(l()(),e["\u0275eld"](148,0,null,null,0,"img",[["alt","protect img"],["src","../../../../assets/images/protect-img.png"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275eld"](150,0,null,null,7,"div",[["class","protect_loved_right2"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n                    "])),(l()(),e["\u0275eld"](152,0,null,null,1,"h2",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["SAVE TIME & MONEY"])),(l()(),e["\u0275ted"](-1,null,["\n                    "])),(l()(),e["\u0275eld"](155,0,null,null,1,"p",[],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["It takes less than 15 minutes and your done. Try it today and\n                        see how simple preparing  your last will and testament online can be."])),(l()(),e["\u0275ted"](-1,null,["\n                "])),(l()(),e["\u0275ted"](-1,null,["\n            "])),(l()(),e["\u0275ted"](-1,null,["\n        "])),(l()(),e["\u0275ted"](-1,null,["\n\n    "])),(l()(),e["\u0275ted"](-1,null,["\n  "])),(l()(),e["\u0275ted"](-1,null,["\n"])),(l()(),e["\u0275ted"](-1,null,["\n"])),(l()(),e["\u0275eld"](164,0,null,null,15,"div",[["class","about_sec4"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n    "])),(l()(),e["\u0275eld"](166,0,null,null,12,"div",[["class","wrapper"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["\n      "])),(l()(),e["\u0275eld"](168,0,null,null,1,"h1",[["class","about_state_planning_text"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Estate Planning Made Simple & Affordable."])),(l()(),e["\u0275ted"](-1,null,["\n      "])),(l()(),e["\u0275eld"](171,0,null,null,1,"h4",[["class","select_plan"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,["Select your plan now and Keep your loved ones safe!"])),(l()(),e["\u0275ted"](-1,null,["\n      "])),(l()(),e["\u0275eld"](174,0,null,null,3,"a",[["class","aboutGetStarted"],["routerLink","/register"]],[[1,"target",0],[8,"href",4]],[[null,"click"]],function(l,n,u){var t=!0;return"click"===n&&(t=!1!==e["\u0275nov"](l,175).onClick(u.button,u.ctrlKey,u.metaKey,u.shiftKey)&&t),t},null,null)),e["\u0275did"](175,671744,null,0,i.o,[i.l,i.a,d.h],{routerLink:[0,"routerLink"]},null),(l()(),e["\u0275eld"](176,0,null,null,0,"i",[["aria-hidden","true"],["class","fa fa-chevron-right"]],null,null,null,null,null)),(l()(),e["\u0275ted"](-1,null,[" Get Started"])),(l()(),e["\u0275ted"](-1,null,["\n    "])),(l()(),e["\u0275ted"](-1,null,["\n  "]))],function(l,n){var u=n.component;l(n,20,0,!u.setRequestStatus&&u.responseReceived),l(n,26,0,u.setRequestStatus&&u.responseReceived),l(n,40,0,""),l(n,41,0,"[a-z0-9._%+-]+@[a-z0-9.-]+\\.[a-z]{2,3}$"),l(n,44,0,"email",""),l(n,49,0,e["\u0275nov"](n,44).errors&&(e["\u0275nov"](n,44).dirty||e["\u0275nov"](n,44).touched)),l(n,53,0,""),l(n,54,0,"6"),l(n,57,0,"password",""),l(n,62,0,e["\u0275nov"](n,57).errors&&(e["\u0275nov"](n,57).dirty||e["\u0275nov"](n,57).touched)),l(n,66,0,""),l(n,67,0,"6"),l(n,71,0,"confirm_password",""),l(n,76,0,e["\u0275nov"](n,71).errors&&(e["\u0275nov"](n,71).dirty||e["\u0275nov"](n,71).touched)),l(n,79,0,e["\u0275nov"](n,71).invalid&&(e["\u0275nov"](n,71).dirty||e["\u0275nov"](n,71).touched)),l(n,91,0,"/sign-in"),l(n,175,0,"/register")},function(l,n){l(n,32,0,e["\u0275nov"](n,36).ngClassUntouched,e["\u0275nov"](n,36).ngClassTouched,e["\u0275nov"](n,36).ngClassPristine,e["\u0275nov"](n,36).ngClassDirty,e["\u0275nov"](n,36).ngClassValid,e["\u0275nov"](n,36).ngClassInvalid,e["\u0275nov"](n,36).ngClassPending),l(n,38,0,e["\u0275nov"](n,40).required?"":null,e["\u0275nov"](n,41).pattern?e["\u0275nov"](n,41).pattern:null,e["\u0275nov"](n,46).ngClassUntouched,e["\u0275nov"](n,46).ngClassTouched,e["\u0275nov"](n,46).ngClassPristine,e["\u0275nov"](n,46).ngClassDirty,e["\u0275nov"](n,46).ngClassValid,e["\u0275nov"](n,46).ngClassInvalid,e["\u0275nov"](n,46).ngClassPending),l(n,51,0,e["\u0275nov"](n,53).required?"":null,e["\u0275nov"](n,54).minlength?e["\u0275nov"](n,54).minlength:null,e["\u0275nov"](n,59).ngClassUntouched,e["\u0275nov"](n,59).ngClassTouched,e["\u0275nov"](n,59).ngClassPristine,e["\u0275nov"](n,59).ngClassDirty,e["\u0275nov"](n,59).ngClassValid,e["\u0275nov"](n,59).ngClassInvalid,e["\u0275nov"](n,59).ngClassPending),l(n,64,0,e["\u0275nov"](n,66).required?"":null,e["\u0275nov"](n,67).minlength?e["\u0275nov"](n,67).minlength:null,e["\u0275nov"](n,73).ngClassUntouched,e["\u0275nov"](n,73).ngClassTouched,e["\u0275nov"](n,73).ngClassPristine,e["\u0275nov"](n,73).ngClassDirty,e["\u0275nov"](n,73).ngClassValid,e["\u0275nov"](n,73).ngClassInvalid,e["\u0275nov"](n,73).ngClassPending),l(n,90,0,e["\u0275nov"](n,91).target,e["\u0275nov"](n,91).href),l(n,99,0,e["\u0275nov"](n,34).invalid),l(n,174,0,e["\u0275nov"](n,175).target,e["\u0275nov"](n,175).href)})}var w=e["\u0275ccf"]("app-user-register",s,function(l){return e["\u0275vid"](0,[(l()(),e["\u0275eld"](0,0,null,null,1,"app-user-register",[],null,null,null,V,c)),e["\u0275did"](1,114688,null,0,s,[a.a,i.l],null,null)],function(l,n){l(n,1,0)},null)},{},{},[]),b=function(){};u.d(n,"UserRegisterModuleNgFactory",function(){return E});var E=e["\u0275cmf"](t,[],function(l){return e["\u0275mod"]([e["\u0275mpd"](512,e.ComponentFactoryResolver,e["\u0275CodegenComponentFactoryResolver"],[[8,[w]],[3,e.ComponentFactoryResolver],e.NgModuleRef]),e["\u0275mpd"](4608,d.m,d.l,[e.LOCALE_ID,[2,d.r]]),e["\u0275mpd"](4608,o["\u0275i"],o["\u0275i"],[]),e["\u0275mpd"](512,d.b,d.b,[]),e["\u0275mpd"](512,i.p,i.p,[[2,i.u],[2,i.l]]),e["\u0275mpd"](512,b,b,[]),e["\u0275mpd"](512,o["\u0275ba"],o["\u0275ba"],[]),e["\u0275mpd"](512,o.FormsModule,o.FormsModule,[]),e["\u0275mpd"](512,t,t,[]),e["\u0275mpd"](1024,i.j,function(){return[[{path:"",component:s}]]},[])])})}});