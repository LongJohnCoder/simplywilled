webpackJsonp(["user-register.module"],{

/***/ "./src/app/user/user-auth/user-register/edual-validator.directive.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return EqualValidatorDirective; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_forms__ = __webpack_require__("./node_modules/@angular/forms/esm5/forms.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
var __param = (this && this.__param) || function (paramIndex, decorator) {
    return function (target, key) { decorator(target, key, paramIndex); }
};


var EqualValidatorDirective = /** @class */ (function () {
    function EqualValidatorDirective(validateEqual) {
        this.validateEqual = validateEqual;
    }
    EqualValidatorDirective_1 = EqualValidatorDirective;
    EqualValidatorDirective.prototype.validate = function (c) {
        // self value (e.g. retype password)
        var v = c.value;
        // control value (e.g. password)
        var e = c.root.get(this.validateEqual);
        // value not equal
        if (e && v !== e.value)
            return {
                validateEqual: false
            };
        return null;
    };
    EqualValidatorDirective = EqualValidatorDirective_1 = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Directive"])({
            selector: '[validateEqual][formControlName],[validateEqual][formControl],[validateEqual][ngModel]',
            providers: [
                { provide: __WEBPACK_IMPORTED_MODULE_1__angular_forms__["NG_VALIDATORS"], useExisting: Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["forwardRef"])(function () { return EqualValidatorDirective_1; }), multi: true }
            ]
        }),
        __param(0, Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Attribute"])('validateEqual')),
        __metadata("design:paramtypes", [String])
    ], EqualValidatorDirective);
    return EqualValidatorDirective;
    var EqualValidatorDirective_1;
}());



/***/ }),

/***/ "./src/app/user/user-auth/user-register/user-register-routing.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return UserRegisterRoutingModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__user_register_component__ = __webpack_require__("./src/app/user/user-auth/user-register/user-register.component.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};



var routes = [
    { path: '', component: __WEBPACK_IMPORTED_MODULE_2__user_register_component__["a" /* UserRegisterComponent */] }
];
var UserRegisterRoutingModule = /** @class */ (function () {
    function UserRegisterRoutingModule() {
    }
    UserRegisterRoutingModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["NgModule"])({
            imports: [__WEBPACK_IMPORTED_MODULE_1__angular_router__["e" /* RouterModule */].forChild(routes)],
            exports: [__WEBPACK_IMPORTED_MODULE_1__angular_router__["e" /* RouterModule */]]
        })
    ], UserRegisterRoutingModule);
    return UserRegisterRoutingModule;
}());



/***/ }),

/***/ "./src/app/user/user-auth/user-register/user-register.component.css":
/***/ (function(module, exports) {

module.exports = ".login_btn:disabled {\n    opacity:0.3;\n    cursor: auto;\n}"

/***/ }),

/***/ "./src/app/user/user-auth/user-register/user-register.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"confirmd_main grey_bg border_top_green\">\n  <div class=\"wrapper\">\n    <div class=\"confirm_right\">\n      <div class=\"confirmed_form_top\">\n        <h1 class=\"form_heading\">Let’s get started</h1>\n        <p class=\"form_pera\">SimplyWilled is the easiest way to make your estate plan online. Sign up below to get started.</p>\n      </div>\n      <div class=\"row\">\n        <div class=\"col-lg-12\">\n          <div *ngIf=\"!setRequestStatus && responseReceived\" class=\"alert alert-danger\">\n            <strong>{{ setResponseMsg }}</strong>\n          </div>\n        </div>\n        <div class=\"col-lg-12\">\n          <div *ngIf=\"setRequestStatus && responseReceived\" class=\"alert alert-success\">\n            <strong>{{ setResponseMsg }}</strong>\n          </div>\n        </div>\n      </div>\n      <div class=\"confirmed_form_white_sec\">\n        <form id=\"signInForm\" #form=\"ngForm\" (ngSubmit)=\"onSubmit(form)\">\n          <input type=\"email\" name=\"email\" placeholder=\"Email Address\" class=\"email_form\"\n                 ngModel\n                 required\n                 pattern=\"[a-z0-9._%+-]+@[a-z0-9.-]+\\.[a-z]{2,3}$\"\n                 #email=\"ngModel\">\n          <span class=\"alert-danger\"\n                *ngIf=\"email.errors && (email.dirty || email.touched)\">\n                <p *ngIf=\"email.errors?.required\">Email is required</p>\n                <p *ngIf=\"email.errors?.pattern\">Email is not correct!</p>\n          </span>\n\n          <input type=\"password\" name=\"password\" placeholder=\"Password\" class=\"email_form\"\n                 ngModel\n                 required\n                 #password=\"ngModel\" minlength=\"6\">\n\n          <span class=\"alert-danger\"\n                *ngIf=\"password.errors && (password.dirty || password.touched)\">\n                <p *ngIf=\"password.errors?.required\">Password is required</p>\n                <p *ngIf=\"password.errors?.minlength\">Password should be minimum 6!</p>\n          </span>\n\n          <input type=\"password\" name=\"confirm_password\" placeholder=\"Confirm Password\" class=\"email_form\"\n                 ngModel\n                 required\n                 #confirm=\"ngModel\" validateEqual=\"password\" minlength=\"6\">\n\n          <span class=\"alert-danger\"\n                *ngIf=\"confirm.errors && (confirm.dirty || confirm.touched)\">\n                <p *ngIf=\"confirm.errors?.required\">Confirm Password is required</p>\n                <p *ngIf=\"confirm.errors?.minlength\">Confirm Password should be minimum 6!</p>\n          </span>\n          <span *ngIf=\"confirm.invalid && (confirm.dirty || confirm.touched)\" class=\"text-danger\">\n              <p>Confirm Password should be same as password!</p>\n          </span>\n\n          <div class=\"loader_parent\" id=\"response_loader\">\n            <span class=\"loader\"></span>\n          </div>\n          <div class=\"get_start_main\">\n            <div class=\"clicking_left\">\n              <a routerLink=\"/sign-in\" class=\"already_account\">Login</a>\n              <a href=\"\" class=\"already_account\">Forgot your password?</a>\n            </div>\n            <!--<a class=\"login_btn\"><i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i> Login</a>-->\n            <button value=\"Continue\" [disabled]=\"form.invalid\" class=\"login_btn\"> <i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i>Register</button>\n          </div>\n        </form>\n      </div>\n    </div>\n    <div class=\"confirm_left\">\n        <h1 class=\"login_text\">Sign up to create your account.</h1>\n\n\n        <ul class=\"protect_loved_ul2\">\n            <li>\n                <span class=\"loved_img2\"><img src=\"../../../../assets/images/protect-img.png\" alt=\"protect img\"></span>\n                <div class=\"protect_loved_right2\">\n                    <h2>PROTECT YOUR LOVED ONES</h2>\n                    <p>Name guardians and list beneficiaries so those you love are in good hands.</p>\n                </div>\n            </li>\n            <li>\n                <span class=\"loved_img2\"><img src=\"../../../../assets/images/protect-img.png\" alt=\"protect img\"></span>\n                <div class=\"protect_loved_right2\">\n                    <h2>PROTECT YOUR ASSETS</h2>\n                    <p>Ensure the assets you’ve worked hard for pass to the ones you love.</p>\n                </div>\n            </li>\n            <li>\n                <span class=\"loved_img2\"><img src=\"../../../../assets/images/protect-img.png\" alt=\"protect img\"></span>\n                <div class=\"protect_loved_right2\">\n                    <h2>SAVE TIME &amp; MONEY</h2>\n                    <p>It takes less than 15 minutes and your done. Try it today and\n                        see how simple preparing  your last will and testament online can be.</p>\n                </div>\n            </li>\n        </ul>\n\n    </div>\n  </div>\n</div>\n<div class=\"about_sec4 grey_bg\">\n  <div class=\"wrapper\">\n    <h1 class=\"about_state_planning_text\">Estate Planning Made Simple & Affordable.</h1>\n    <h4 class=\"select_plan\">Select your plan now and Keep your loved ones safe!</h4>\n  </div>\n</div>"

/***/ }),

/***/ "./src/app/user/user-auth/user-register/user-register.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return UserRegisterComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__user_service__ = __webpack_require__("./src/app/user/user.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};



var UserRegisterComponent = /** @class */ (function () {
    function UserRegisterComponent(userService, router) {
        this.userService = userService;
        this.router = router;
    }
    UserRegisterComponent.prototype.ngOnInit = function () {
        this.showLoader = false;
        this.responseReceived = false;
        this.setRequestStatus = false;
        this.setResponseMsg = '';
    };
    /**
     * this function logs user in
     * @param {NgForm} formRegister
     */
    UserRegisterComponent.prototype.onSubmit = function (formRegister) {
        var _this = this;
        this.showLoader = true;
        this.userService.register(formRegister.value)
            .subscribe(function (response) {
            _this.showLoader = false;
            if (response.status) {
                localStorage.setItem('loggedInUser', JSON.stringify(response));
                localStorage.setItem('_loggedInToken', response.token);
                _this.router.navigate(['/dashboard']);
            }
            else {
                _this.setRequestStatus = false;
                _this.setResponseMsg = 'Some error occured';
            }
        }, function (error) {
            _this.setRequestStatus = false;
            _this.setResponseMsg = error.error.error;
            _this.showLoader = false;
            _this.responseReceived = true;
            setTimeout(function () {
                _this.responseReceived = false;
            }, 5000);
        }, function () {
            formRegister.reset();
        });
    };
    UserRegisterComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            selector: 'app-user-register',
            template: __webpack_require__("./src/app/user/user-auth/user-register/user-register.component.html"),
            styles: [__webpack_require__("./src/app/user/user-auth/user-register/user-register.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__user_service__["a" /* UserService */], __WEBPACK_IMPORTED_MODULE_2__angular_router__["d" /* Router */]])
    ], UserRegisterComponent);
    return UserRegisterComponent;
}());



/***/ }),

/***/ "./src/app/user/user-auth/user-register/user-register.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "UserRegisterModule", function() { return UserRegisterModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_common__ = __webpack_require__("./node_modules/@angular/common/esm5/common.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__user_register_routing_module__ = __webpack_require__("./src/app/user/user-auth/user-register/user-register-routing.module.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__user_register_component__ = __webpack_require__("./src/app/user/user-auth/user-register/user-register.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__angular_forms__ = __webpack_require__("./node_modules/@angular/forms/esm5/forms.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__edual_validator_directive__ = __webpack_require__("./src/app/user/user-auth/user-register/edual-validator.directive.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};






var UserRegisterModule = /** @class */ (function () {
    function UserRegisterModule() {
    }
    UserRegisterModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["NgModule"])({
            imports: [
                __WEBPACK_IMPORTED_MODULE_1__angular_common__["b" /* CommonModule */],
                __WEBPACK_IMPORTED_MODULE_2__user_register_routing_module__["a" /* UserRegisterRoutingModule */],
                __WEBPACK_IMPORTED_MODULE_4__angular_forms__["FormsModule"]
            ],
            declarations: [__WEBPACK_IMPORTED_MODULE_3__user_register_component__["a" /* UserRegisterComponent */], __WEBPACK_IMPORTED_MODULE_5__edual_validator_directive__["a" /* EqualValidatorDirective */]]
        })
    ], UserRegisterModule);
    return UserRegisterModule;
}());



/***/ })

});
//# sourceMappingURL=user-register.module.chunk.js.map