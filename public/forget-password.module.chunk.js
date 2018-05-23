webpackJsonp(["forget-password.module"],{

/***/ "./src/app/user/user-auth/forget-password/forget-password-routing.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ForgetPasswordRoutingModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__forget_password_forget_password_component__ = __webpack_require__("./src/app/user/user-auth/forget-password/forget-password/forget-password.component.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};



var routes = [{ path: '', component: __WEBPACK_IMPORTED_MODULE_2__forget_password_forget_password_component__["a" /* ForgetPasswordComponent */] }];
var ForgetPasswordRoutingModule = /** @class */ (function () {
    function ForgetPasswordRoutingModule() {
    }
    ForgetPasswordRoutingModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["NgModule"])({
            imports: [__WEBPACK_IMPORTED_MODULE_1__angular_router__["e" /* RouterModule */].forChild(routes)],
            exports: [__WEBPACK_IMPORTED_MODULE_1__angular_router__["e" /* RouterModule */]]
        })
    ], ForgetPasswordRoutingModule);
    return ForgetPasswordRoutingModule;
}());



/***/ }),

/***/ "./src/app/user/user-auth/forget-password/forget-password.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ForgetPasswordModule", function() { return ForgetPasswordModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_common__ = __webpack_require__("./node_modules/@angular/common/esm5/common.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__forget_password_routing_module__ = __webpack_require__("./src/app/user/user-auth/forget-password/forget-password-routing.module.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__forget_password_forget_password_component__ = __webpack_require__("./src/app/user/user-auth/forget-password/forget-password/forget-password.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__angular_forms__ = __webpack_require__("./node_modules/@angular/forms/esm5/forms.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};





var ForgetPasswordModule = /** @class */ (function () {
    function ForgetPasswordModule() {
    }
    ForgetPasswordModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["NgModule"])({
            imports: [
                __WEBPACK_IMPORTED_MODULE_1__angular_common__["b" /* CommonModule */], __WEBPACK_IMPORTED_MODULE_4__angular_forms__["FormsModule"],
                __WEBPACK_IMPORTED_MODULE_2__forget_password_routing_module__["a" /* ForgetPasswordRoutingModule */]
            ],
            declarations: [__WEBPACK_IMPORTED_MODULE_3__forget_password_forget_password_component__["a" /* ForgetPasswordComponent */]]
        })
    ], ForgetPasswordModule);
    return ForgetPasswordModule;
}());



/***/ }),

/***/ "./src/app/user/user-auth/forget-password/forget-password/forget-password.component.css":
/***/ (function(module, exports) {

module.exports = "a:hover{\n    color: #fff;\n}\n.login_btn{\n    cursor: pointer;\n    width: 240px;\n}\n.login_btn:hover{\n    color: #fff;\n    background: -webkit-gradient(linear, left top, left bottom, from(#53ba3c), to(#3fa62e));\n    background: linear-gradient(#53ba3c, #3fa62e);\n}\n.already_account:hover{\n    color:#373737;\n    text-decoration: underline;\n}\n.forgetPass{\n    margin-top: 50px;\n}\n.forgetPass h2{\n    font-size: 24px;\n    padding-bottom: 0;\n    color: #0a5dab;\n    margin-bottom: 0;\n    margin-top: 23px;\n    line-height: normal;\n}\n.forgetPass p{\n    font-size: 22px;\n    color: #373737;\n}\n.forgetPass p a{\n    color: #4fb03d;\n}\n@media screen and (max-width:767px){\n    .forgetPass{\n        margin-top: 0;\n    }\n}\n\n"

/***/ }),

/***/ "./src/app/user/user-auth/forget-password/forget-password/forget-password.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"body_container\">\n  <div class=\"confirmd_main\">\n      <div class=\"wrapper\">\n          <div class=\"confirm_left\">\n              <div class=\"forgetPass\">\n                  <h2 class=\"login_text\">Have you made your last will?</h2>\n                  <p>\n                    Try SimplyWilled.com today and make sure your wishes are know.\n                  </p>\n                  <h2>Have a question?</h2>\n                  <p>Email: <a href=\"\">info@simplywilled.com</a> </p>\n              </div>\n              \n             \n          </div>\n          <div class=\"confirm_right\">\n              <div class=\"confirmed_form_top\">\n                  <h1 class=\"form_heading\">Forgot Your Password?</h1>\n                  <p class=\"form_pera\">Please enter your email address and we will send<br>\n                    you a new password.</p>\n              </div>\n              <div class=\"confirmed_form_white_sec\">\n                  <div class=\"row\">\n                      <div class=\"col-lg-12\" *ngIf=\"responseType === false\">\n                          <div class=\"alert alert-danger\">\n                              <strong>{{responseMsg}}</strong>\n                          </div>\n                      </div>\n                      <div class=\"col-lg-12\" *ngIf=\"responseType === true\">\n                          <div class=\"alert alert-success\">\n                              <strong>{{responseMsg}}</strong>\n                          </div>\n                      </div>\n                  </div>\n                  <form id=\"signInForm\" #form=\"ngForm\">\n                      <input type=\"email\" name=\"email\" placeholder=\"Email Address\" id=\"email\" required\n                             [(ngModel)]=\"email\" class=\"email_form\" #emailID=\"ngModel\" ngModel\n                             pattern=\"[a-z0-9._%+-]+@[a-z0-9.-]+\\.[a-z]{2,3}$\">\n                      <span class=\"alert-danger\" >\n                          <p *ngIf=\"emailID.errors?.required\">Email is required</p>\n                          <p *ngIf=\"emailID.errors?.pattern\">This is not a email pattern</p>\n                      </span>\n\n                      <div class=\"loader_parent\" id=\"response_loader\">\n                          <span class=\"loader\"></span>\n                      </div>\n                      <div class=\"get_start_main\">\n                          <div class=\"clicking_left\">\n                              <a routerLink=\"/sign-in\" class=\"already_account\">Login?</a>\n                          </div>\n                          <!--<a class=\"login_btn\"><i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i> Login</a>-->\n                          <button value=\"Continue\" class=\"login_btn\" [disabled]=\"!form.form.valid\" (click)=\"resetPassSubmit()\">\n                              <i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i>Reset Password\n                          </button>\n                      </div>\n                  </form>\n              </div>\n          </div>\n      </div>\n  </div>\n    <div class=\"about_sec4\">\n      <div class=\"wrapper\">\n        <h1 class=\"about_state_planning_text\">Estate Planning Made Simple & Affordable.</h1>\n        <h4 class=\"select_plan\">Select your plan now and Keep your loved ones safe!</h4>\n        <a routerLink=\"/register\" class=\"aboutGetStarted\"><i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i> Get Started</a>\n      </div>\n    </div>\n</div>\n"

/***/ }),

/***/ "./src/app/user/user-auth/forget-password/forget-password/forget-password.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ForgetPasswordComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__user_service__ = __webpack_require__("./src/app/user/user.service.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


var ForgetPasswordComponent = /** @class */ (function () {
    function ForgetPasswordComponent(userService) {
        this.userService = userService;
    }
    ForgetPasswordComponent.prototype.ngOnInit = function () {
    };
    ForgetPasswordComponent.prototype.resetPassSubmit = function () {
        var _this = this;
        this.userService.forgetPassword({ email: this.email }).subscribe(function (response) {
            if (response.status === 'true') {
                _this.responseType = true;
                _this.responseMsg = response.message;
            }
            else {
                _this.responseType = false;
                _this.responseMsg = response.message;
            }
        }, function (error) {
            _this.responseType = false;
            _this.responseMsg = error.error.message;
        });
    };
    ForgetPasswordComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            selector: 'app-forget-password',
            template: __webpack_require__("./src/app/user/user-auth/forget-password/forget-password/forget-password.component.html"),
            styles: [__webpack_require__("./src/app/user/user-auth/forget-password/forget-password/forget-password.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__user_service__["a" /* UserService */]])
    ], ForgetPasswordComponent);
    return ForgetPasswordComponent;
}());



/***/ })

});
//# sourceMappingURL=forget-password.module.chunk.js.map