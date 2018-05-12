webpackJsonp(["admin-login.module"],{

/***/ "./src/app/admin/auth/admin-login/admin-login-routing.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AdminLoginRoutingModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__admin_login_component__ = __webpack_require__("./src/app/admin/auth/admin-login/admin-login.component.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};



var routes = [
    { path: '', component: __WEBPACK_IMPORTED_MODULE_2__admin_login_component__["a" /* AdminLoginComponent */] }
];
var AdminLoginRoutingModule = /** @class */ (function () {
    function AdminLoginRoutingModule() {
    }
    AdminLoginRoutingModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["NgModule"])({
            imports: [__WEBPACK_IMPORTED_MODULE_1__angular_router__["e" /* RouterModule */].forChild(routes)],
            exports: [__WEBPACK_IMPORTED_MODULE_1__angular_router__["e" /* RouterModule */]]
        })
    ], AdminLoginRoutingModule);
    return AdminLoginRoutingModule;
}());



/***/ }),

/***/ "./src/app/admin/auth/admin-login/admin-login.component.css":
/***/ (function(module, exports) {

module.exports = "\n.formContainer{\n    margin: 0 auto;\n}\n.formContainer .panel{\n    background: #fff;\n    -webkit-box-shadow: 0 0 5px rgba(0,0,0,0.3);\n            box-shadow: 0 0 5px rgba(0,0,0,0.3);\n    border-radius: 5px;\n}\n.formContainer .panel-body, .formContainer .panel-heading{\n    padding: 15px;\n}\n.formContainer .panel .panel-heading{\nborder-bottom:1px solid #ddd;\nbackground: none;\n}\n.panel-default > .panel-heading {\n  color: #000;\n  background-color: #FFFFFF;\n  border-color: #ddd;\n  font-weight: bold;\n}\n.panel-title{\n    font-size: 16px;\n}\n.panel-heading h1{\n    margin-bottom: 10px;\n}\n.remember{\n    font-size: 14px;\n}\n.reset, .forget{\n    background: none;\n    border:none;\n    cursor:pointer;\n    font-size: 14px;\n    color: #555;\n    margin-top: 10px;\n}\n.forget{\n    float: right;\n}\n.reset:hover, .forget:hover{\n    text-decoration: underline;\n}"

/***/ }),

/***/ "./src/app/admin/auth/admin-login/admin-login.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"container\">\n  <div class=\"row\">\n    <!--<div class=\"col-md-3 hidden-xs hidden-sm\"></div>-->\n    <div class=\"col-md-4 formContainer\">\n      <div class=\"login-panel panel panel-default\">\n        <div class=\"panel-heading\">\n            <h1 class=\"text-center\">SimplyWilled.Dev</h1>\n            <h3 class=\"panel-title\">Please Sign In</h3>\n        </div>\n        <div class=\"row\">\n          <div class=\"col-lg-12\">\n            <div *ngIf=\"!loginRequestStatus && responseReceived\" class=\"alert alert-danger\">\n              <strong>{{ loginRequestResponseMsg }}</strong>\n            </div>\n          </div>\n          <div class=\"col-lg-12\">\n            <div *ngIf=\"loginRequestStatus && responseReceived\" class=\"alert alert-success\">\n              <strong>{{ loginRequestResponseMsg }}</strong>\n            </div>\n          </div>\n        </div>\n        <div class=\"panel-body\">\n          <form #form=\"ngForm\" (ngSubmit)=\"onSubmit(form)\">\n\n            <fieldset>\n              <div class=\"form-group\">\n                <input\n                        class=\"form-control\"\n                        placeholder=\"Email Address\"\n                        type=\"email\"\n                        name=\"email\"\n                        ngModel\n                        required\n                        pattern=\"[a-z0-9._%+-]+@[a-z0-9.-]+\\.[a-z]{2,3}$\"\n                        #email=\"ngModel\"\n                >\n              </div>\n              <div class=\"alert alert-danger\"\n                   *ngIf=\"email.errors && (email.dirty || email.touched)\">\n                <p *ngIf=\"email.errors?.required\">Email is required</p>\n                <p *ngIf=\"email.errors?.pattern\">Email is not correct!</p>\n              </div>\n\n\n              <div class=\"form-group\">\n                <input\n                        class=\"form-control\"\n                        placeholder=\"Password\"\n                        type=\"password\"\n                        name=\"password\"\n                        ngModel\n                        required\n                        #password=\"ngModel\"\n                >\n              </div>\n              <div class=\"alert alert-danger\"\n                   *ngIf=\"password.errors && (password.dirty || password.touched)\">\n                <p *ngIf=\"password.errors?.required\">Password is required</p>\n              </div>\n\n              <div class=\"checkbox\">\n              <label class=\"remember\">\n              <input name=\"remember\" type=\"checkbox\" value=\"Remember Me\"> Remember Me\n              </label>\n              </div>\n\n              <button\n                      [disabled]=\"form.invalid\"\n                      class=\"btn btn-lg btn-success btn-block\"\n              >\n                <i *ngIf=\"showLoader\" class=\"fa fa-spinner fa-pulse fa-lg fa-fw\"></i>\n                Login\n              </button>\n             <button type=\"reset\" class=\"reset\" [disabled]=\"showLoader\" (click)=\"onReset(form)\"></button>\n              <button type=\"button\" class=\"forget\" [disabled]=\"showLoader\" (click)=\"onForgotPassword()\">Forgot Password</button>\n              \n            </fieldset>\n          </form>\n        </div>\n      </div>\n    </div><!-- /.col-->\n   <!-- <div class=\"col-md-3 hidden-xs hidden-sm\"></div>-->\n  </div><!-- /.row -->\n</div>\n"

/***/ }),

/***/ "./src/app/admin/auth/admin-login/admin-login.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AdminLoginComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__admin_login_service__ = __webpack_require__("./src/app/admin/auth/admin-login/admin-login.service.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};



var AdminLoginComponent = /** @class */ (function () {
    function AdminLoginComponent(loginService, router) {
        this.loginService = loginService;
        this.router = router;
        this.showLoader = false; // Track if loader should be shown or not
        this.responseReceived = false; // Track is some response has been recieved or not
        this.loginRequestStatus = false; // Track response of login request
        this.loginRequestResponseMsg = ''; // Store success or error message from backend depending on response
    }
    AdminLoginComponent.prototype.ngOnInit = function () { };
    AdminLoginComponent.prototype.onSubmit = function (formSignIn) {
        var _this = this;
        this.showLoader = true;
        console.log(formSignIn);
        var body = {
            email: formSignIn.value.email,
            password: formSignIn.value.password
        };
        this.loginService.login(body)
            .subscribe(function (response) {
            _this.responseReceived = true;
            if (response.status) {
                localStorage.setItem('loggedInAdminData', JSON.stringify(response));
                _this.loginRequestStatus = true;
                _this.loginRequestResponseMsg = response.message;
                _this.router.navigate(['/admin-panel/dashboard']);
            }
            else {
                _this.loginRequestStatus = true;
                _this.loginRequestResponseMsg = response.message;
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
    AdminLoginComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            selector: 'app-admin-login',
            template: __webpack_require__("./src/app/admin/auth/admin-login/admin-login.component.html"),
            styles: [__webpack_require__("./src/app/admin/auth/admin-login/admin-login.component.css")],
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_2__admin_login_service__["a" /* AdminLoginService */], __WEBPACK_IMPORTED_MODULE_1__angular_router__["d" /* Router */]])
    ], AdminLoginComponent);
    return AdminLoginComponent;
}());



/***/ }),

/***/ "./src/app/admin/auth/admin-login/admin-login.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "AdminLoginModule", function() { return AdminLoginModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_common__ = __webpack_require__("./node_modules/@angular/common/esm5/common.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_common_http__ = __webpack_require__("./node_modules/@angular/common/esm5/http.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__admin_login_routing_module__ = __webpack_require__("./src/app/admin/auth/admin-login/admin-login-routing.module.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__admin_login_component__ = __webpack_require__("./src/app/admin/auth/admin-login/admin-login.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__angular_forms__ = __webpack_require__("./node_modules/@angular/forms/esm5/forms.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};






var AdminLoginModule = /** @class */ (function () {
    function AdminLoginModule() {
    }
    AdminLoginModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["NgModule"])({
            imports: [
                __WEBPACK_IMPORTED_MODULE_1__angular_common__["b" /* CommonModule */],
                __WEBPACK_IMPORTED_MODULE_2__angular_common_http__["c" /* HttpClientModule */],
                __WEBPACK_IMPORTED_MODULE_3__admin_login_routing_module__["a" /* AdminLoginRoutingModule */],
                __WEBPACK_IMPORTED_MODULE_5__angular_forms__["FormsModule"],
            ],
            declarations: [__WEBPACK_IMPORTED_MODULE_4__admin_login_component__["a" /* AdminLoginComponent */]]
        })
    ], AdminLoginModule);
    return AdminLoginModule;
}());



/***/ })

});
//# sourceMappingURL=admin-login.module.chunk.js.map