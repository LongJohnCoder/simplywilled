webpackJsonp(["packages.module"],{

/***/ "./src/app/user/user-dashboard/packages/packages-routing.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return PackagesRoutingModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__packages_packages_component__ = __webpack_require__("./src/app/user/user-dashboard/packages/packages/packages.component.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};



var routes = [
    { path: '', component: __WEBPACK_IMPORTED_MODULE_2__packages_packages_component__["a" /* PackagesComponent */] }
];
var PackagesRoutingModule = /** @class */ (function () {
    function PackagesRoutingModule() {
    }
    PackagesRoutingModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["NgModule"])({
            imports: [__WEBPACK_IMPORTED_MODULE_1__angular_router__["e" /* RouterModule */].forChild(routes)],
            exports: [__WEBPACK_IMPORTED_MODULE_1__angular_router__["e" /* RouterModule */]]
        })
    ], PackagesRoutingModule);
    return PackagesRoutingModule;
}());



/***/ }),

/***/ "./src/app/user/user-dashboard/packages/packages.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "PackagesModule", function() { return PackagesModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_common__ = __webpack_require__("./node_modules/@angular/common/esm5/common.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__packages_routing_module__ = __webpack_require__("./src/app/user/user-dashboard/packages/packages-routing.module.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__packages_packages_component__ = __webpack_require__("./src/app/user/user-dashboard/packages/packages/packages.component.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};




var PackagesModule = /** @class */ (function () {
    function PackagesModule() {
    }
    PackagesModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["NgModule"])({
            imports: [
                __WEBPACK_IMPORTED_MODULE_1__angular_common__["b" /* CommonModule */],
                __WEBPACK_IMPORTED_MODULE_2__packages_routing_module__["a" /* PackagesRoutingModule */]
            ],
            declarations: [__WEBPACK_IMPORTED_MODULE_3__packages_packages_component__["a" /* PackagesComponent */]]
        })
    ], PackagesModule);
    return PackagesModule;
}());



/***/ }),

/***/ "./src/app/user/user-dashboard/packages/packages/packages.component.css":
/***/ (function(module, exports) {

module.exports = ".main-content {\n    background: #fff;\n    border-radius: 10px;\n    border: 1px solid #ddd;\n    -webkit-box-shadow: 0 1px 1px 0 #ddd;\n            box-shadow: 0 1px 1px 0 #ddd;\n    display: inline-block;\n    width: 100%;\n    padding: 30px;\n}\n.get_start_pkg_btn:hover {\n    color: #fff;\n}\n.include_text:hover {\n    text-decoration: underline;\n    color: #979797;\n}\n.main-content h2 {\n    color: #2479B8;\n    font-size: 36px;\n    margin: 0;\n    text-align: center;\n}\n.packages_ul {\n    margin-top: 100px;\n}\n.packages_ul > li {\n    width: 47%;    \n}\n.book_sec_main{\n    -webkit-box-shadow: 0px 4px 7px rgba(0,0,0,.1);\n            box-shadow: 0px 4px 7px rgba(0,0,0,.1);\n}\n.book_main {\n    width: 290px;\n}\nspan.bestValue {\n    right: 15px;\n    top: -24px;\n    position: absolute;\n}\nspan.bestValue img {\n    width: 60px;\n}\n.payPal {\n    text-align: center;\n}\n.payPal span, .payPal a {\n    float: none;\n}\n.packages_ul > li:first-child .book_main {\n    width: 264px;\n}\n.promoCode {\n    float: left;\n    width: 100%;\n    margin: 20px 0;\n}\n.promoCode label {\n    text-align: left;\n    float: left;\n    font-size: 14px;\n    color: #373737;\n}\n.promoCode p{\n    float: left;\n    width: 100%;\n}\n.promoCode input[type=\"text\"] {\n    border: 1px solid #d0d0d0;\n    border-radius: 5px;\n    background: #fff;\n    font-size: 14px;\n    color: #373737;\n    padding: 5px;\n    width: 60%;\n    height: 35px;\n    float: left;\n}\n.hide_show_main_pkg.open {\n    display: block;\n}\n.applyCodeBtn {\n    width: 35%;\n    float: right;\n    text-align: center;\n    background: -webkit-gradient(linear, left top, left bottom, from(#4fb73a), to(#3da22d));\n    background: linear-gradient(#4fb73a, #3da22d);\n    border: 0;\n    font-family: 'OpenSans';\n    font-size: 16px;\n    border-radius: 5px;\n    border-bottom: 3px solid #2a881d;\n    padding: 4px 0px;\n    color: #fff;\n    cursor: pointer;\n    text-shadow: 2px 2px 0 rgba(0,0,0,.2);\n}\n.hide_show_main_pkg .get_start_pkg_btn {\n    width: 100%;\n}\n.get_start_pkg_btn{\n    margin-top: 25px;\n    margin-bottom: 25px;\n}\n.applyCodeBtn.disable {\n    cursor: not-allowed;\n    background: -webkit-gradient(linear, left top, left bottom, from(#c4c4c4), to(#b2b2b2));\n    background: linear-gradient(#c4c4c4, #b2b2b2);\n    border-bottom: 3px solid #999;\n}\n@media screen and (max-width: 1200px){\n    .get_start_pkg_btn {\n        margin: 25px 0 25px 50%;\n        width: 202px;\n    }\n    .payPal{\n        width: auto;\n    }\n    .book_main {\n        width: 175px;\n    }\n    .packages_ul > li:first-child .book_main {\n        width: 155px;\n    }\n}\n@media screen and (max-width: 991px){\n    .packages_ul > li {\n        width: 100%;\n        margin-bottom: 80px;\n    }\n\n    .packages_ul > li:last-child {\n        margin-bottom: 0;\n    }\n}\n@media screen and (max-width: 400px){\n    .applyCodeBtn{\n        font-size: 12px;\n        padding: 7px 0;\n    }\n}"

/***/ }),

/***/ "./src/app/user/user-dashboard/packages/packages/packages.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"col-xs-12\">\n  <div class=\"main-content tellusaboutyou\">\n    <h2>Select The Package That Is Right For You</h2>\n    <ul class=\"packages_ul\">\n        <li>\n          <div class=\"pkg_first_sec\">\n            <span class=\"single_pkg\"><img src=\"../../../../assets/images/pkg1.png\" alt=\"error img\"></span>\n            <h3 class=\"single_text_heading\">Single Will</h3>\n            <h4 class=\"pkg_text\">Package</h4>\n            <p class=\"will_package_info\">The Perfect Basic Will Package For An Individual To Get Their Estate In Order.</p>\n          </div>\n          <div class=\"book_sec_main\">\n            <div class=\"book_main\">\n              <span class=\"single_will_book\"><img src=\"../../../../assets/images/single-pkg-book.png\" alt=\"error img\"></span>\n              <h1 class=\"book_price\">$99<sup>.00</sup></h1>\n            </div>\n            <div class=\"promoCode\">\n              <form action=\"\">\n                <label>Discount Code:</label>\n                <p>\n                  <input type=\"text\">\n                  <button type=\"button\" class=\"applyCodeBtn disable\">Apply Code</button>\n                </p>\n              </form>\n            </div>\n            <div class=\"clear\"></div>\n            <p class=\"payPal\"><span>Shop With Confidence Powered by</span> <a href=\"#\"><img src=\"../../../../assets/images/paypal-btn.png\" class=\"img-responsive\"></a></p>\n            <a href=\"#\" class=\"get_start_pkg_btn hide_btn\"><i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i> Buy Now</a>\n          </div>\n\n          <div class=\"hide_show_main_pkg\" [ngClass]=\"{'open': whatIncl}\">\n            <span class=\"key_benefits_text\">Key Benefits</span>\n            <ul class=\"pkg_benefits_ul\">\n              <li>\n                <span class=\"faster_text\" >Faster and easier than hiring a lawyer*</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Make a Simple Will & Supporting Documents for you</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Leave property to those you love</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Provide for your children & your estate</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Appoint a guardian for minor children</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Plan for a medical emergency</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Appoint a financial power of attorney</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Make your final wishes known</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Update your plan as often as you wish</span>\n              </li>\n              \n            </ul>\n            <span class=\"whats_included_text\">What’s Included:</span>\n            <ul class=\"include_ul\">\n              <li>\n                <span class=\"faster_text2\">Includes a Complete Set of Documents For 1 Person</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">A Last Will & Testament</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">Healthcare Power of Attorney</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">Durable General Power of Attorney</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">Living Will</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">HIPAA Wavier</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">Burial Instructions</span>\n              </li>\n              \n            </ul>\n            <a href=\"#\" class=\"get_start_pkg_btn\"><i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i> Buy Now</a>\n          </div>\n          <a href=\"javascript:void(0)\" class=\"include_text\" (click)=\"showIncluded()\">\n            {{whatIncl == true ? 'Hide' : 'See what’s included'}}\n          </a>\n        </li>\n        <li>\n          <div class=\"pkg_first_sec\">\n            <span class=\"single_pkg\"><img src=\"../../../../assets/images/pkg2.png\" alt=\"error img\"></span>\n            <span class=\"bestValue\"><img src=\"../../../../../assets/images/best-value.png\" alt=\"\"></span>\n            <h3 class=\"single_text_heading\">Married Will</h3>\n            <h4 class=\"pkg_text\">Package</h4>\n            <p class=\"will_package_info\">The Perfect Basic Will Package for Married Couples To Get Their Affairs In Order.</p>\n          </div>\n          <div class=\"book_sec_main\">\n            <div class=\"book_main\">\n              <span class=\"single_will_book\"><img src=\"../../../../assets/images/married-pkg-book.png\" alt=\"error img\"></span>\n              <h1 class=\"book_price\">$199<sup>.00</sup></h1>\n            </div>\n            <div class=\"promoCode\">\n              <form action=\"\">\n                <label>Discount Code:</label>\n                <p>\n                  <input type=\"text\">\n                  <button type=\"button\" class=\"applyCodeBtn disable\">Apply Code</button>\n                </p>\n              </form>\n            </div>\n            <div class=\"clear\"></div>\n            <p class=\"payPal\"><span>Shop With Confidence Powered by</span><br><a href=\"#\"><img src=\"../../../../assets/images/paypal-btn.png\" class=\"img-responsive\"></a></p>\n            <a href=\"#\" class=\"get_start_pkg_btn start_btn_2 hide_btn\"><i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i> Buy Now</a>\n          </div>\n\n          <div class=\"hide_show_main_pkg\" [ngClass]=\"{'open': whatIncl}\">\n            <span class=\"key_benefits_text\">Key Benefits</span>\n            <ul class=\"pkg_benefits_ul after_color1\">\n              <li>\n                <span class=\"faster_text\">Faster and easier than hiring a lawyer*</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Make a Simple Will & Supporting Documents for you and your spouse</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Leave property to those you love</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Provide for your children & your estate</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Appoint a guardian for minor children</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Plan for a medical emergency</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Appoint a financial power of attorney</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Make your final wishes known</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Update your plan as often as you wish</span>\n              </li>\n            </ul>\n            <span class=\"whats_included_text\">What’s Included:</span>\n            <ul class=\"include_ul\">\n              <li>\n                <span class=\"faster_text2\">Includes a Complete Set of Documents For Each Spouse</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">A Last Will & Testament For Each of You</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">Healthcare Power of Attorney For Each of You</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">Durable General Power of Attorney For Each of You</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">Living Will For Each of You</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">HIPAA Wavier For Each of You</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">Burial Instructions For Each of You</span>\n              </li>\n            </ul>\n            <a href=\"#\" class=\"get_start_pkg_btn start_btn_2\"><i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i> Buy Now</a>\n          </div>\n          <a href=\"javascript:void(0)\" class=\"include_text\" (click)=\"showIncluded()\">\n              {{whatIncl == true ? 'Hide' : 'See what’s included'}}\n          </a>\n        </li>\n      </ul>\n  </div>\n</div>"

/***/ }),

/***/ "./src/app/user/user-dashboard/packages/packages/packages.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return PackagesComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};

var PackagesComponent = /** @class */ (function () {
    function PackagesComponent() {
        this.whatIncl = false;
    }
    PackagesComponent.prototype.ngOnInit = function () {
    };
    PackagesComponent.prototype.showIncluded = function () {
        this.whatIncl = !this.whatIncl;
    };
    PackagesComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            selector: 'app-packages',
            template: __webpack_require__("./src/app/user/user-dashboard/packages/packages/packages.component.html"),
            styles: [__webpack_require__("./src/app/user/user-dashboard/packages/packages/packages.component.css")]
        }),
        __metadata("design:paramtypes", [])
    ], PackagesComponent);
    return PackagesComponent;
}());



/***/ })

});
//# sourceMappingURL=packages.module.chunk.js.map