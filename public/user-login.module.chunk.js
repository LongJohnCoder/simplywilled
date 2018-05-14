webpackJsonp(["user-login.module"],{

/***/ "./src/app/user/user-auth/user-login/user-login-routing.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return UserLoginRoutingModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__user_login_component__ = __webpack_require__("./src/app/user/user-auth/user-login/user-login.component.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};



var routes = [
    { path: '', component: __WEBPACK_IMPORTED_MODULE_2__user_login_component__["a" /* UserLoginComponent */] }
];
var UserLoginRoutingModule = /** @class */ (function () {
    function UserLoginRoutingModule() {
    }
    UserLoginRoutingModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["NgModule"])({
            imports: [__WEBPACK_IMPORTED_MODULE_1__angular_router__["e" /* RouterModule */].forChild(routes)],
            exports: [__WEBPACK_IMPORTED_MODULE_1__angular_router__["e" /* RouterModule */]]
        })
    ], UserLoginRoutingModule);
    return UserLoginRoutingModule;
}());



/***/ }),

/***/ "./src/app/user/user-auth/user-login/user-login.component.css":
/***/ (function(module, exports) {

module.exports = ""

/***/ }),

/***/ "./src/app/user/user-auth/user-login/user-login.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"body_container\">\n    <div class=\"confirmd_main\">\n        <div class=\"wrapper\">\n            <div class=\"confirm_left\">\n                <h1 class=\"login_text\">Login to your secured account.</h1>\n\n\n                <ul class=\"protect_loved_ul2\">\n                    <li>\n                        <span class=\"loved_img2\"><img src=\"../../../../assets/images/protect-img.png\" alt=\"protect img\"></span>\n                        <div class=\"protect_loved_right2\">\n                            <h2>PROTECT YOUR LOVED ONES</h2>\n                            <p>Name guardians and list beneficiaries so those you love are in good hands.</p>\n                        </div>\n                    </li>\n                    <li>\n                        <span class=\"loved_img2\"><img src=\"../../../../assets/images/protect-img.png\" alt=\"protect img\"></span>\n                        <div class=\"protect_loved_right2\">\n                            <h2>PROTECT YOUR ASSETS</h2>\n                            <p>Ensure the assets you’ve worked hard for pass to the ones you love.</p>\n                        </div>\n                    </li>\n                    <li>\n                        <span class=\"loved_img2\"><img src=\"../../../../assets/images/protect-img.png\" alt=\"protect img\"></span>\n                        <div class=\"protect_loved_right2\">\n                            <h2>SAVE TIME &amp; MONEY</h2>\n                            <p>It takes less than 15 minutes and your done. Try it today and\n                                see how simple preparing  your last will and testament online can be.</p>\n                        </div>\n                    </li>\n                </ul>\n\n            </div>\n            <div class=\"confirm_right\">\n                <div class=\"confirmed_form_top\">\n                    <h1 class=\"form_heading\">Welcome Back</h1>\n                    <p class=\"form_pera\">Log In to access your account.</p>\n                </div>\n                <div class=\"confirmed_form_white_sec\">\n                    <div class=\"row\">\n                        <div class=\"col-lg-12\">\n                            <div *ngIf=\"!loginRequestStatus && responseReceived\" class=\"alert alert-danger\">\n                                <strong>{{ loginRequestResponseMsg }}</strong>\n                            </div>\n                        </div>\n                        <div class=\"col-lg-12\">\n                            <div *ngIf=\"loginRequestStatus && responseReceived\" class=\"alert alert-success\">\n                                <strong>{{ loginRequestResponseMsg }}</strong>\n                            </div>\n                        </div>\n                    </div>\n                    <form id=\"signInForm\" #form=\"ngForm\" (ngSubmit)=\"onSubmit(form)\">\n                        <input type=\"email\" name=\"email\" placeholder=\"Email Address\" class=\"email_form\"\n                               ngModel\n                               required\n                               pattern=\"[a-z0-9._%+-]+@[a-z0-9.-]+\\.[a-z]{2,3}$\"\n                               #email=\"ngModel\">\n                        <span class=\"alert-danger\"\n                              *ngIf=\"email.errors && (email.dirty || email.touched)\">\n                            <p *ngIf=\"email.errors?.required\">Email is required</p>\n                            <p *ngIf=\"email.errors?.pattern\">Email is not correct!</p>\n                        </span>\n\n                        <input type=\"password\" name=\"password\" placeholder=\"Password\" class=\"email_form\"\n                               ngModel\n                               required\n                               #password=\"ngModel\">\n\n                        <span class=\"alert-danger\"\n                              *ngIf=\"password.errors && (password.dirty || password.touched)\">\n                        <p *ngIf=\"password.errors?.required\">Password is required</p>\n                        <p *ngIf=\"password.errors?.minlength\">Password should be minimum 6!</p>\n                    </span>\n\n                        <div class=\"loader_parent\" id=\"response_loader\">\n                            <span class=\"loader\"></span>\n                        </div>\n                        <div class=\"get_start_main\">\n                            <div class=\"clicking_left\">\n                                <a routerLink=\"/register\" class=\"already_account\">Don’t have account?</a>\n                                <a href=\"\" class=\"already_account\">Forgot your password?</a>\n                            </div>\n                            <!--<a class=\"login_btn\"><i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i> Login</a>-->\n                            <button value=\"Continue\" [disabled]=\"form.invalid\" class=\"login_btn\"> <i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i>Login</button>\n                        </div>\n                    </form>\n                </div>\n            </div>\n        </div>\n    </div>\n    <div class=\"about_sec4\">\n        <div class=\"wrapper\">\n            <h1 class=\"about_state_planning_text\">Estate Planning Made Simple & Affordable.</h1>\n            <h4 class=\"select_plan\">Select your plan now and Keep your loved ones safe!</h4>\n        </div>\n    </div>\n</div>"

/***/ }),

/***/ "./src/app/user/user-auth/user-login/user-login.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return UserLoginComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__user_service__ = __webpack_require__("./src/app/user/user.service.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};



var UserLoginComponent = /** @class */ (function () {
    function UserLoginComponent(loginService, router) {
        this.loginService = loginService;
        this.router = router;
    }
    UserLoginComponent.prototype.ngOnInit = function () {
        this.showLoader = false;
        this.responseReceived = false;
        this.loginRequestStatus = false;
        this.loginRequestResponseMsg = '';
    };
    /**
     * this function logs user in
     * @param {NgForm} formSignIn
     */
    UserLoginComponent.prototype.onSubmit = function (formSignIn) {
        var _this = this;
        this.showLoader = true;
        var body = {
            email: formSignIn.value.email,
            password: formSignIn.value.password
        };
        this.loginService.login(body)
            .subscribe(function (response) {
            _this.showLoader = false;
            if (response.status) {
                localStorage.setItem('loggedInUser', JSON.stringify(response));
                _this.router.navigate(['/dashboard']);
            }
            else {
                _this.loginRequestStatus = false;
                _this.loginRequestResponseMsg = 'error';
            }
        }, function (error) {
            _this.loginRequestStatus = false;
            _this.loginRequestResponseMsg = error.error.error;
            _this.showLoader = false;
            _this.responseReceived = true;
            setTimeout(function () {
                _this.responseReceived = false;
            }, 5000);
        }, function () {
            formSignIn.reset();
        });
    };
    UserLoginComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            selector: 'app-user-login',
            template: __webpack_require__("./src/app/user/user-auth/user-login/user-login.component.html"),
            styles: [__webpack_require__("./src/app/user/user-auth/user-login/user-login.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_2__user_service__["a" /* UserService */], __WEBPACK_IMPORTED_MODULE_1__angular_router__["d" /* Router */]])
    ], UserLoginComponent);
    return UserLoginComponent;
}());



/***/ }),

/***/ "./src/app/user/user-auth/user-login/user-login.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "UserLoginModule", function() { return UserLoginModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_common__ = __webpack_require__("./node_modules/@angular/common/esm5/common.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__user_login_routing_module__ = __webpack_require__("./src/app/user/user-auth/user-login/user-login-routing.module.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__user_login_component__ = __webpack_require__("./src/app/user/user-auth/user-login/user-login.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__angular_forms__ = __webpack_require__("./node_modules/@angular/forms/esm5/forms.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};





var UserLoginModule = /** @class */ (function () {
    function UserLoginModule() {
    }
    UserLoginModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["NgModule"])({
            imports: [
                __WEBPACK_IMPORTED_MODULE_1__angular_common__["b" /* CommonModule */],
                __WEBPACK_IMPORTED_MODULE_2__user_login_routing_module__["a" /* UserLoginRoutingModule */],
                __WEBPACK_IMPORTED_MODULE_4__angular_forms__["FormsModule"]
            ],
            declarations: [__WEBPACK_IMPORTED_MODULE_3__user_login_component__["a" /* UserLoginComponent */]]
        })
    ], UserLoginModule);
    return UserLoginModule;
}());



/***/ })

});
//# sourceMappingURL=user-login.module.chunk.js.map