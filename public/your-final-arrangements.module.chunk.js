webpackJsonp(["your-final-arrangements.module"],{

/***/ "./src/app/user/user-dashboard/your-final-arrangements/services/your-final-arrangements.service.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return YourFinalArrangementsService; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_common_http__ = __webpack_require__("./node_modules/@angular/common/esm5/http.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__environments_environment__ = __webpack_require__("./src/environments/environment.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};



var YourFinalArrangementsService = /** @class */ (function () {
    function YourFinalArrangementsService(http) {
        this.http = http;
    }
    /**
     * this function fetch the data if there is any
     * @param {string} token
     * @param {GiftModel} data
     * @returns {any}
     */
    YourFinalArrangementsService.prototype.fetchData = function (token) {
        return this.http.get(__WEBPACK_IMPORTED_MODULE_2__environments_environment__["a" /* environment */].API_URL + 'user/final-arrangement', { headers: new __WEBPACK_IMPORTED_MODULE_1__angular_common_http__["e" /* HttpHeaders */]({ 'Authorization': token }) });
    };
    /**
     * this function saves final agreement in database
     * @param {string} token
     * @param data
     * @returns {Observable<Object>}
     */
    YourFinalArrangementsService.prototype.submitfinalAgreement = function (token, data) {
        return this.http.post(__WEBPACK_IMPORTED_MODULE_2__environments_environment__["a" /* environment */].API_URL + 'user/final-arrangement', data, { headers: new __WEBPACK_IMPORTED_MODULE_1__angular_common_http__["e" /* HttpHeaders */]({ 'Authorization': token }) });
    };
    YourFinalArrangementsService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Injectable"])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_common_http__["b" /* HttpClient */]])
    ], YourFinalArrangementsService);
    return YourFinalArrangementsService;
}());



/***/ }),

/***/ "./src/app/user/user-dashboard/your-final-arrangements/your-final-arrangements-routing.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return YourFinalAgreementsRoutingModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__your_final_arrangements_component__ = __webpack_require__("./src/app/user/user-dashboard/your-final-arrangements/your-final-arrangements.component.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};



var routes = [{ path: '', component: __WEBPACK_IMPORTED_MODULE_2__your_final_arrangements_component__["a" /* YourFinalArrangementsComponent */] }];
var YourFinalAgreementsRoutingModule = /** @class */ (function () {
    function YourFinalAgreementsRoutingModule() {
    }
    YourFinalAgreementsRoutingModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_1__angular_core__["NgModule"])({
            imports: [__WEBPACK_IMPORTED_MODULE_0__angular_router__["e" /* RouterModule */].forChild(routes)],
            exports: [__WEBPACK_IMPORTED_MODULE_0__angular_router__["e" /* RouterModule */]]
        })
    ], YourFinalAgreementsRoutingModule);
    return YourFinalAgreementsRoutingModule;
}());



/***/ }),

/***/ "./src/app/user/user-dashboard/your-final-arrangements/your-final-arrangements.component.css":
/***/ (function(module, exports) {

module.exports = "@font-face {\n  font-family: 'OpenSans-Light';\n  src: url('OpenSans-Light.b180c799a87a4cad9108.eot?#iefix') format('embedded-opentype'), url('OpenSans-Light.5193f01d42787bba6c0f.woff') format('woff'), url('OpenSans-Light.1bf71be111189e76987a.ttf') format('truetype'), url('OpenSans-Light.9384f87d95af80a8d067.svg#OpenSans-Light') format('svg');\n  font-weight: normal;\n  font-style: normal;\n}\n\n@font-face {\n  font-family: 'OpenSans';\n  src: url('OpenSans.06a04537db9294681f93.eot?#iefix') format('embedded-opentype'), url('OpenSans.10bb6c1975b08eb0833d.woff') format('woff'), url('OpenSans.629a55a7e793da068dc5.ttf') format('truetype'), url('OpenSans.239f0753aaf8b1d7568f.svg#OpenSans') format('svg');\n  font-weight: normal;\n  font-style: normal;\n}\n\n@font-face {\n  font-family: 'Lato-Regular';\n  src: url('Lato-Regular.39a3905085ad34aa621e.eot?#iefix') format('embedded-opentype'), url('Lato-Regular.8c81f845c2d1b94675f7.woff') format('woff'), url('Lato-Regular.7f690e503a254e0b8349.ttf') format('truetype'), url('Lato-Regular.ce28f379ab9123893681.svg#Lato-Regular') format('svg');\n  font-weight: normal;\n  font-style: normal;\n}\n\n@font-face {\n  font-family: 'FontAwesome';\n  src: url('fontawesome-webfont.674f50d287a8c48dc19b.eot?v=4.7.0');\n  src: url('fontawesome-webfont.674f50d287a8c48dc19b.eot?#iefix&v=4.7.0') format('embedded-opentype'), url('fontawesome-webfont.af7ae505a9eed503f8b8.woff2?v=4.7.0') format('woff2'), url('fontawesome-webfont.fee66e712a8a08eef580.woff?v=4.7.0') format('woff'), url('fontawesome-webfont.b06871f281fee6b241d6.ttf?v=4.7.0') format('truetype'), url('fontawesome-webfont.912ec66d7572ff821749.svg?v=4.7.0#fontawesomeregular') format('svg');\n  font-weight: normal;\n  font-style: normal;\n}\n\nbody{\n  font-family: 'OpenSans';\n  color: #373737;\n}\n\nhr {\n  border-top: 1px solid #ddd;\n}\n\nheader{\n  background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAsAAAByCAIAAAAK47x4AAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAALGSURBVHjaYuQIXcyAFwAEEBMDIQAQQCwovP//oQxGRrgIQACxIESxKmVgAAggwrYABBBhFQABRFgFQAARVgEQQIRVAAQQYRUAAURYBUAAEVYBEECEVQAEEGEVAAFEWAVAABFWARBAhFUABBBhFQABRFgFQAARVgEQQIRVAAQQIRX//wMEEI5UiAQAAoiwLQABRFgFQAARVgEQQIRVAAQQYRUAAURYBUAAEVYBEECEVQAEEGEVAAFEWAVAABFWARBAhFUABBCwhCEQcwABRNgMgAAirAIggAirAAggwioAAoiwCoAAIqwCIIAIqwAIIMIqAAKIsAqAACKsAiCACKsACCDCKgACiAUUcZCKAC0GGaEiAAHEgkWOAUUDQAARtgUggAirAAggwioAAoiwCoAAIqwCIICYwI7GlVRB4gABxILuOQxFAAFE2BaAACKsAiCACKsACCDCKgACiLAKgAAirAIggAirAAggwioAAoiwCoAAIqwCIIAIqwAIIMIqAAKIsAqAAGIhVEgxAAQQYTMAAoiwCoAAIqwCIIAIqwAIIMIqAAKIsAqAACKsAiCAWJASOiPWrA0QQMjlOvawAwggwrYABBALoqGJAwAEEAuG9egAIIBYCClgAAggwmYABBBhMwACiLAZAAFE2C8AAUQ4PAACiIWRkBkAAUTYFoAAgrmUESNyYEU5QABhmMGIXroDBBBhWwACiLAKgAAirAIggAiHKUAAMYHNABfLQAYjAwoCewwggMDplJEJ3ScQXWAHAAQQbnfAhAECCEkFZoIHiwAEEFjFf6RIRFYHJgECCBxzjEiBDVcHMwwggDDihRGlKgUyAAKIhYGJCXszF6YHIIDAeY4RSzULFwQIIFg7GeIjZDYMAAQQanhgCxuAACLcYgMIIMIpGSCAWP4TMgMggIAu/YdfBUAAEXYHQACxEMq2DAABBgBZHzlVosClbwAAAABJRU5ErkJggg==');\n  background-size: 100% 100%;\n  min-height: 115px;\n}\n\n.logo{\n  position: absolute;\n  top: 25px;\n  left: 0;\n  right: 0;\n  margin: 0;\n  width: 100%;\n  text-align: left;\n  padding: 0;\n  display: block;\n}\n\n.logo a{\n  display: inline-block;\n}\n\n.loader1 img{\n  margin: auto;\n  width: 120px;\n}\n\n.common-button{\n  color: #fff;\n  text-transform: capitalize;\n  height: 100%;\n  text-shadow: 1px 1px 1px #666;\n  margin-top: 25px;\n  font-size: 16px;\n  background: none;\n  font-family: 'Lato-Regular';\n  position: relative;\n  top:0;\n  -webkit-transition: 0s;\n  transition: 0s;\n}\n\n.common-button:hover{\n  color: #fff !important;\n  top: -1px;\n}\n\n.common-button:focus{\n  outline: none !important;\n  -webkit-box-shadow: none !important;\n          box-shadow: none !important;\n}\n\n.green-btn{\n  background: url('data:image/png;base64,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') no-repeat center center !important;\n  background-size: 100% 100%;\n  padding: 10px 0 10px 30px;\n  width: 164px;\n}\n\n.green-btn img{\n  margin-left: 5px;\n  display: inline-block;\n}\n\n.main-container{\n  padding: 70px 0;\n  background: #f3f3f2;\n  border-bottom: 1px solid #ddd;\n}\n\n.sidebar{\n  border-radius: 10px;\n  border: 1px solid #ddd;\n  box-shadow: 0 0 2px 0 #eee;\n  -webkit-box-shadow: 0 0 1px 0 #eee;\n  -moz-box-shadow: 0 0 1px 0 #eee;\n}\n\n.sidebar img{\n  display: inline-block;\n  vertical-align: top;\n  margin: 10px 10px 0 0;\n}\n\n.sidebar img.white-icon{\n  display: none;\n}\n\n.sidebar h1{\n  font-family: 'OpenSans-Light';\n  font-size: 32px;\n  display: inline-block;\n  margin: 0;\n  vertical-align: top;\n  line-height: 28px;\n}\n\n.sidebar h1 span{\n  font-family: 'OpenSans';\n  font-size: 16px;\n  display: block;\n  font-weight: bold;\n}\n\n.sidebar-body{\n  background: #fff;\n  border-radius: 10px;\n}\n\n.sidebar-body ul{\n  margin: 0;\n  padding: 0;\n  list-style-type: none;\n}\n\n.sidebar-body ul li{\n  padding: 20px;\n  border-bottom: 1px solid #ddd;\n}\n\n.sidebar-body ul li:first-child a, .sidebar-body ul li:nth-child(2) a{\n  color: #42A82D;\n  text-decoration: none;\n  cursor: pointer;\n  display: block;\n}\n\n.sidebar-body ul li:first-child.active, .sidebar-body ul li:nth-child(2).active{\n  background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAQAAABaCAIAAAAQF2CuAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAG/SURBVHjaYuTK2cMAAwABxMLw/z+cAxBALAwMCA5AALEgsRkAAghFBiCAUGQAAghFBiCAUGQAAghFBiCAUOwBCCAmKA0WAQggJJn/DAABhGIAQACx/EfiAQQQigxAAKEYDRBAKEYDBBAKByCAmBiQAEAAocgABBCKDEAAocgABBAKByCAUJQBBBCKDEAAobgAIIBQ3AYQQCgyAAGEIgMQQGADGKEcgAACK4NJAgQQE5T1H4QAAgjsbZgMQAAxQcQgkgABBDMaTAAEEIrbAAIIxW0AAYQiAxBAKC4ACCAUtwEEEIoygABCMQAggFBkAAIIhQMQQCjKAAIIRQYggFA4AAGEwgEIIBQOQAChcAACCIUDEEAoHIAAQuEABBAKByCAUDgAAYTCAQggFA5AAKFwAAIIhQMQQCgcgABC4QAEEAoHIIBQOAABhMIBCCAUDkAAoXAAAgiFAxBAKByAAELhAAQQCgcggFA4AAGEwgEIIBQOQAChcAACCIUDEEAoHIAAQuEABBAKByCAUDgAAYTCAQggFA5AAKFwAAIIhQMQQCgcgABC4QAEEAoHIIBQOAABhMIBCCAUDkAAoXAAAgwAB8E87uUGpVcAAAAASUVORK5CYII=');\n  background-size: 100% 100%;\n  padding: 20px;\n  position: relative;\n}\n\n.sidebar-body ul li:first-child{\n  border-top-left-radius: 10px;\n  border-top-right-radius: 10px;\n}\n\n.sidebar-body ul li:first-child.active a, .sidebar-body ul li:nth-child(2).active a{\n  color: #fff;\n}\n\n.sidebar-body ul li:first-child.active:before, .sidebar-body ul li:nth-child(2).active:before{\n  content: '';\n  width: 0;\n  height: 0;\n  border-top: 10px solid transparent;\n  border-bottom: 10px solid transparent;\n  border-left: 10px solid #0854a2;\n  position: absolute;\n  -webkit-transform: translate(0,-50%);\n          transform: translate(0,-50%);\n  top: 50%;\n  right: -10px;\n}\n\n.sidebar-body ul li:last-child{\n  border: none;\n}\n\n.sidebar ul li.active img.white-icon{\n  display: inline-block;\n}\n\n.sidebar ul li.active img.green-icon{\n  display: none;\n}\n\n.btn-dashboard{\n  padding: 10px 0 10px 30px;\n  width: 100%;\n  margin-top: 0;\n  background: url('data:image/png;base64,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') no-repeat center !important;\n  background-size: 100% 100%;\n  text-shadow: 1px 1px 1px #2150b0;\n}\n\n.btn-preview{\n  padding: 10px 0 10px 30px;\n  width: 100%;\n  margin-top: 0;\n  background: url('data:image/png;base64,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') no-repeat center !important;\n  background-size: 100% 100%;\n  text-shadow: 1px 1px 1px #2150b0;\n}\n\n.btn-progress{\n  padding: 10px 0 10px 30px;\n  width: 100%;\n  margin-top: 0;\n  background: url('data:image/png;base64,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') no-repeat center !important;\n  background-size: 100% 100%;\n  text-shadow: 1px 1px 1px #2150b0;\n}\n\n.notification{\n  border-radius: 10px;\n  border: 1px solid #ddd;\n  box-shadow: 0 1px 1px 0 #ddd;\n  -webkit-box-shadow: 0 1px 1px 0 #ddd;\n  -moz-box-shadow: 0 1px 1px 0 #ddd;\n  padding: 25px 30px 20px;\n  text-align: center;\n  margin: 50px 0 20px;\n  position: relative;\n}\n\n.notification p{\n  font-size: 18px;\n  color: #333;\n  margin: 0;\n  line-height: 22px;\n}\n\n.notification span.imp{\n  font-family: 'Lato-Regular';\n  position: absolute;\n  top: 0;\n  color: #42A82D;\n  font-size: 24px;\n  background: #fff;\n  font-weight: bold;\n  height: 35px;\n  width: 35px;\n  border-radius: 50%;\n  border: 1px solid #ddd;\n  line-height: 30px;\n  -webkit-transform: translate(-50%,-50%);\n          transform: translate(-50%,-50%);\n}\n\n.progress_main{\n  margin: 0 0 30px;\n  padding: 10px;\n  border-radius: 10px;\n  box-shadow: 1px 0 1px 1px #ccc;\n  -webkit-box-shadow: 1px 0 1px 1px #ccc;\n  -moz-box-shadow: 1px 0 1px 1px #ccc;\n}\n\n.progres_left{\n  border-radius: 6px;\n  height: 28px;\n  border: 1px solid #DEDEDE;\n  background: #F2F2F2;\n  -webkit-box-shadow: inset 0 0 2px 0px #EDEDED;\n          box-shadow: inset 0 0 2px 0px #EDEDED;\n  width: 90%;\n}\n\n.progres_left span{\n  border-radius: 6px;\n  -webkit-box-shadow: inset 0 -1px 1px 0 #317D1D;\n          box-shadow: inset 0 -1px 1px 0 #317D1D;\n}\n\n.progress_right{\n  font-size: 14px;\n  color: #42A82D;\n  font-family: 'OpenSans';\n}\n\n.main-content{\n  background: #fff;\n  border-radius: 10px;\n  border: 1px solid #ddd;\n  box-shadow: 0 1px 1px 0 #ddd;\n  -webkit-box-shadow: 0 1px 1px 0 #ddd;\n  -moz-box-shadow: 0 1px 1px 0 #ddd;\n  display: inline-block;\n  width: 100%;\n  padding: 30px;\n}\n\n.main-content h2{\n  color: #2479B8;\n  font-size: 36px;\n  margin: 0;\n  text-transform: capitalize;\n}\n\n.main-content p{\n  font-size: 18px;\n  margin: 0;\n  line-height: 24px;\n}\n\n.main-content.loading-screen p{\n  margin: 20px 0;\n}\n\n.loading-screen .btn-complete{\n  float: none;\n}\n\n.single_ul{\n  margin: 0;\n}\n\n.single_ul li {\n  margin: 15px 0;\n}\n\n.single_ul li:last-child{\n  margin-bottom: 0;\n}\n\n.single_ul li a{\n  border: 1px solid #4db228;\n  padding: 10px;\n  border-radius: 6px;\n}\n\n.single_ul li a.inprogress{\n  border: 1px solid #BFBFBF;\n}\n\n.tell_us_text {\n  color: #373737;\n}\n\n.inprogress img{\n  -webkit-filter: grayscale(100%);\n  filter: grayscale(100%);\n}\n\n.inherit_properties {\n  font-family: 'OpenSans-Light';\n  color: #373737;\n  font-size: 16px;\n}\n\n.btn-complete{\n  background: url(data:image/png;base64,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) no-repeat center center !important;\n  background-size: 100% 100%;\n  padding: 10px 0 10px 30px;\n  width: 130px;\n  margin: 0;\n  float: right;\n}\n\n.inprogress .btn-complete{\n  -webkit-filter: grayscale(100%);\n  filter: grayscale(100%);\n}\n\n.btn-grey{\n  background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHoAAAAsCAYAAACqjqwOAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAUaSURBVHjaYvz//z/DKBj+ACCAGLEJ1tfXs6iqqgYwMzOHMDExqTEyMuoBhZlp7RhQovv37x+DlJQUw7dv30ZjhzjwFxhul/7+/XsLGHZrbty4saG8vPwPuiKAAMKI6Pnz52txcXEtBEawCb1dDItoSUnJ0YgmEwDD78zXr1/jw8LCriGLAwQQckQzLl26tJSVlbURmIM5BsiR8BwNdOxorJGfYX78/v27PiAgoBvEBYkBBBATVI5p2bJlvWxsbJ0DFcnoOXsUUFAfA+MQFJcbN27shcUxQACBcjQjsLiO4ebmXjQIih1wJIOK7tEcTR0ADMc4YDG+BCCAmKOjo7l1dHQ2AVMB72DIySDMy8vLACx6RmOJCoCFhcWAg4NjDkAAsTg4OIQD+ZKDobiERfRo0U09AGxUK7q4uIQDBBALMLa9BmPAjkY29QAojgECiAmUtQdT5I7maOoDZmZmM4AAYgHWzWKDJWCR3TEa2VQtviUAAogFSPMOJkeN5mqaAFaAAGIZTLlnNIJpBwACiGUwBS5ybh6NcOoCgABiGg3QkQEAAmhQFt2jOZr6ACCAaFJ0x8TEMMydOxc0KgNq2pNVR49GNHUBQABRPaJjY2PB9Js3bxj4+fkZuLm5Se5ejUYy9QFAALFQ0zBYJIPAp0+fSIrk0cimLQAIIKrl6Li4ODg7Ly8PnJtBxTYpZo/W0bQDAAFElYiOj4+Hs3Nzc8E5WVBQkIGNjY3siB4F1AUAAURxRCckJMDZOTk54EgWFRVl4OPjIztHjxbd1AcAAcSEXlySimfMmAE3bMqUKQxcXFzgyIZF8igeHBgggJgoTSmgCO3p6YHz6+vrGb58+cLw58+f0Ww0iABAAFGco0ERDSqmu7u74YaWlJQwfPjwAbxKZDQ3DQ4MEEBM1DAEFtldXV3wyAb1o3/8+EGWedha4KOYMgwQQEzUMggW2Z2dneCIAuVmSnL0KKAuAAggqo6MwSK7o6ODolb3aGRTHwAEEAvVDWRhAQ+W8PDwkDTOPToyRlsAEEA0mdQARTAskknN0aORTBsAEECDcuHBaGRTHwAEEAtsd8RgiujROpr64QoQQEyjAxvDH/z9+5cBIIBYfv78ycDJyTmao4cxAMUxQACxfPv27TMHBwfvYIroUUBd8P37928AAcTy6dOnN7xAwMrKOuhy9SigHICq5s+fP78ECCBQ0X35/fv3iqCpxcEQydjYo4B8AJpzAMUxQAAxffnyZQ9oLzJo6c9obh5eADSLCCy2QXG7ByCAmF++fPlUQ0MjBBjr/KAAZmdnH/CIFhAQADcgRgH54fjx40cwBra4nyxbtqwYIICYnj179vH169c9oP40sAhnePLkCdmzTtTEo4A88OvXLwZg5gXVy2D+ixcvuh49evQRIIBA45T/L1++fEdHR0cUmJsNQBEOyvIgDTBAzpg1uSkRZD9ovRmy/aOAcOSCMKj6BeViUBiCAJC9YMKECf1A5leAAAKfYQLEHNzc3CIhISElwEDOBPIHpAkO6tiDHKmtrc3w9u3b0RgkP8P8Bobf9Hnz5vUAc/YboNAPgACCZdV/v4Hg4sWLp4HdrH3AFrgBMBeLDVQdLSIiAq4+RgFZufvK6dOnU5YsWbIayP4AGi8BBS1AACGfM8YEzcncXFxcAh4eHr7A3O3JwsIiB4x8TXpFNChXA6sRhnfv3o3GGvGRex2YT58A21pbV61atRlY9YIiGHSsE+jEH3A5DhBgAIK7qCGGxkQkAAAAAElFTkSuQmCC) no-repeat center center !important;\n  background-size: 100% 100%;\n  padding: 10px 0 10px 30px;\n  width: 130px;\n  margin-top: 0;\n}\n\n.form-footer{\n  display: inline-block;\n  width: 100%;\n  background: #f4f3f2;\n  vertical-align: top;\n  padding: 40px 25px;\n  -webkit-box-shadow: inset 0px 2px 10px 0 #e0e0e0;\n          box-shadow: inset 0px 2px 10px 0 #e0e0e0;\n}\n\nfooter ul{\n  margin: 0;\n  padding: 0;\n  list-style-type: none;\n}\n\n.footer-top{\n  padding: 50px 0;\n}\n\n.footer-top p{\n  margin: 20px 0;\n}\n\n.footer-nav{\n  margin-top: 80px;\n  display: inline-block;\n  width: 49%;\n  vertical-align: top;\n}\n\nfooter ul li a{\n  color: #212529;\n  display: block;\n  padding: 0 0 5px;\n}\n\n.contactus{\n  margin-top: 80px;\n  border-bottom: 1px solid #eee;\n  padding-bottom: 10px;\n  margin-bottom: 10px;\n}\n\n.contactus img{\n  vertical-align: top;\n  display: inline-block;\n}\n\n.footer-label{\n  display: inline-block;\n}\n\n.contactus span{\n  display: block;\n}\n\n.contactus span.number{\n  display: inline-block;\n  font-size: 28px;\n  font-weight: bold;\n  letter-spacing: 2px;\n  color: #373737;\n}\n\n.main-content.tellusaboutyou{\n  padding: 30px 0 0;\n}\n\n.main-content.tellusaboutyou h2{\n  padding: 0 30px;\n}\n\n.main-content .form-group{\n  padding: 0 30px;\n  margin: 25px 0;\n  position: relative;\n  float: left;\n  width: 100%;\n}\n\n.main-content .form-group label{\n  display: block;\n  font-weight: normal;\n  font-size: 18px;\n  cursor: pointer;\n}\n\n.main-content .form-group label span.leavetxt{\n  display: block;\n  font-family: 'OpenSans-Light';\n  font-style: italic;\n}\n\n.main-content .form-control{\n  font-size: 16px;\n  height: 40px;\n  border-radius: 6px;\n  margin-top: 10px;\n  border: 1px solid #BFBFBF;\n}\n\n.main-content select.form-control{\n  background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAHCAYAAAA4R3wZAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAABcSURBVHjaYty/f38jAwNDHQNpoAkggJiARD2IQYomkB6AAGKCcojV3ARVywAQQExIgoQ0wzWBAEAAMaFJ4tKMogkEAAKICYsidM0YmkAAIIBYcDirHgcbDgACDACadw7WqOsxPwAAAABJRU5ErkJggg==') 98% no-repeat;\n  -webkit-appearance: none;\n  -moz-appearance: none;\n}\n\n.main-content .valid .form-control{\n  border-color: #42A82D;\n  color: #42A82D;\n}\n\n.main-content .valid i{\n  position: absolute;\n  top: 44px;\n  right: 44px;\n  background: #42A82D;\n  color: #fff;\n  height: 22px;\n  width: 22px;\n  text-align: center;\n  line-height: 22px;\n  border-radius: 50%;\n}\n\n.main-content .invalid .form-control{\n  border-color: #be5456;\n  color: #be5456;\n}\n\n.main-content .invalid i{\n  position: absolute;\n  top: 44px;\n  right: 44px;\n  background: #be5456;\n  color: #fff;\n  height: 22px;\n  width: 22px;\n  text-align: center;\n  line-height: 22px;\n  border-radius: 50%;\n}\n\n.radio_ul6{\n  text-align: left;\n}\n\n.radio_custom{\n  height: 105px;\n  width: 105px;\n  position: relative;\n  border: 1px solid #BFBFBF;\n  font-family: 'OpenSans';\n  box-shadow:0 1px 1px 1px #ddd;\n  -webkit-box-shadow:0 1px 1px 1px #ddd;\n  -moz-box-shadow:0 1px 1px 1px #ddd;\n  min-height: 100%;\n}\n\n.percentage-estate .radio_custom{\n  height: 120px;\n  width: 120px;\n}\n\n.radio_custom .human_status{\n  position: absolute;\n  -webkit-transform: translate(-50%,-50%);\n          transform: translate(-50%,-50%);\n  left: 50%;\n  top: 50%;\n  font-size: 16px;\n}\n\n.radio_ul6 li, .first_page_radio li{\n  width: auto;\n  margin-right: 5px;\n  margin-left: 0;\n  display: inline-block;\n  float: none;\n  vertical-align: top;\n}\n\n.radio_custom.active {\n  border-color: #42A82D;\n  background: #42A82D;\n  color: #fff;\n}\n\n.radio_custom.marital_status{\n  height: 130px;\n  width: 130px;\n}\n\n.first_page_radio{\n  text-align: left;\n}\n\n.custom_img2 {\n  padding-bottom: 2px;\n}\n\n.human_status2{\n  font-family: 'OpenSans';\n  position: absolute;\n  -webkit-transform: translate(-50%,0);\n          transform: translate(-50%,0);\n  left: 50%;\n  top: auto;\n  bottom: 10px;\n  line-height: 20px;\n}\n\n.radio_custom.marital_status.active{\n  background: none;\n}\n\n.radio_custom.marital_status.active .human_status2{\n  color: #42A82D;\n}\n\n.main-content .email-box{\n  display: inline-block;\n  border: 1px solid #ddd;\n  background: #F2F2F2;\n  height: 105px;\n  width: 350px;\n  padding: 20px;\n  position: relative;\n}\n\n.main-content .valid.email-box{\n  border-color: #42A82D;\n}\n\n.main-content .valid.email-box i {\n  top: 40px;\n  right: 30px;\n}\n\n.Instructions_ul_Radio{\n  text-align: left;\n  float: left;\n  width: 100%;\n}\n\n.special_instrucion{\n  min-height: 100%;\n  height: 160px;\n  width: 160px;\n  position: relative;\n  border: 1px solid #BFBFBF;\n  font-family: 'OpenSans';\n  box-shadow: 0 1px 1px 1px #ddd;\n  -webkit-box-shadow: 0 1px 1px 1px #ddd;\n  -moz-box-shadow: 0 1px 1px 1px #ddd;\n  min-height: 100%;\n}\n\n.two_child_radio.active{\n  border: 1px solid #42b12a;\n}\n\n.two_child_radio.active .two_child_text{\n  color: #42b12a;\n}\n\ninput[type='radio']{\n  opacity: 0;\n}\n\n.two_child_img {\n  width: 100%;\n  display: inline-block;\n  margin-bottom: 10px;\n  text-align: center;\n  padding-top: 14px;\n}\n\n.two_child_radio .two_child_text{\n  font-family: 'OpenSans';\n  line-height: 20px;\n  color: rgba(0,0,0,.7);\n  font-size: 15px;\n  display: block;\n  padding: 0 10px;\n  text-align: center;\n}\n\n.Instructions_ul_Radio li{\n  height: 100%;\n  width: auto;\n  margin-right: 10px;\n  margin-bottom: 6px;\n  margin-left: 0;\n  float: left;\n}\n\n.main-content textarea.form-control{\n  height: auto;\n}\n\n.human_status3 {\n  font-family: 'OpenSans';\n  height: auto;\n  line-height: 20px;\n}\n\n.gifts-list .radio_custom {\n  width: 120px;\n  height: 120px;\n}\n\n.gifts-list .radio_custom.active{\n  background: #fff;\n}\n\n.gifts-list .radio_custom.active .human_status3{\n  color: #42A82D;\n}\n\na.add-btn{\n  float: right;\n  font-size: 16px;\n  font-weight: bold;\n  display: inline-block;\n  margin: 10px 0;\n  text-decoration: none;\n}\n\n.title-bar{\n  background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAsAAAByCAIAAAAK47x4AAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAALGSURBVHjaYuQIXcyAFwAEEBMDIQAQQCwovP//oQxGRrgIQACxIESxKmVgAAggwrYABBBhFQABRFgFQAARVgEQQIRVAAQQYRUAAURYBUAAEVYBEECEVQAEEGEVAAFEWAVAABFWARBAhFUABBBhFQABRFgFQAARVgEQQIRVAAQQIRX//wMEEI5UiAQAAoiwLQABRFgFQAARVgEQQIRVAAQQYRUAAURYBUAAEVYBEECEVQAEEGEVAAFEWAVAABFWARBAhFUABBCwhCEQcwABRNgMgAAirAIggAirAAggwioAAoiwCoAAIqwCIIAIqwAIIMIqAAKIsAqAACKsAiCACKsACCDCKgACiAUUcZCKAC0GGaEiAAHEgkWOAUUDQAARtgUggAirAAggwioAAoiwCoAAIqwCIICYwI7GlVRB4gABxILuOQxFAAFE2BaAACKsAiCACKsACCDCKgACiLAKgAAirAIggAirAAggwioAAoiwCoAAIqwCIIAIqwAIIMIqAAKIsAqAAGIhVEgxAAQQYTMAAoiwCoAAIqwCIIAIqwAIIMIqAAKIsAqAACKsAiCAWJASOiPWrA0QQMjlOvawAwggwrYABBALoqGJAwAEEAuG9egAIIBYCClgAAggwmYABBBhMwACiLAZAAFE2C8AAUQ4PAACiIWRkBkAAUTYFoAAgrmUESNyYEU5QABhmMGIXroDBBBhWwACiLAKgAAirAIggAiHKUAAMYHNABfLQAYjAwoCewwggMDplJEJ3ScQXWAHAAQQbnfAhAECCEkFZoIHiwAEEFjFf6RIRFYHJgECCBxzjEiBDVcHMwwggDDihRGlKgUyAAKIhYGJCXszF6YHIIDAeY4RSzULFwQIIFg7GeIjZDYMAAQQanhgCxuAACLcYgMIIMIpGSCAWP4TMgMggIAu/YdfBUAAEXYHQACxEMq2DAABBgBZHzlVosClbwAAAABJRU5ErkJggg==);\n  background-size: 100% 100%;\n  padding: 40px 20px;\n  border-top-left-radius: 10px;\n  border-top-right-radius: 10px;\n  position: absolute;\n  z-index: 9;\n  left: 16px;\n  right: 16px;\n  top: 0;\n}\n\n.main-content.hotdocs h2{\n  color: #fff;\n  font-size: 16px;\n  font-weight: bold;\n}\n\n.main-content.hotdocs{\n  padding: 0;\n}\n\n.pdf_viewer_container {\n  margin-top: 10px;\n}\n\n.pdf_viewer_container object {\n  min-height: 750px;\n  height: 100%;\n}\n\n.main-content.hotdocs .title-bar ul{\n  margin: 0;\n  padding: 0;\n}\n\n.main-content.hotdocs .title-bar ul li{\n  display: inline-block;\n  margin: 0 12px;\n  cursor: pointer;\n}\n\nfooter .social span{\n  vertical-align: top;\n  display: inline-block;\n  margin-top: 5px;\n  font-size: 16px;\n}\n\nfooter .social ul{\n  display: inline-block;\n  margin-left: 20px;\n}\n\nfooter .social ul li {\n  display: inline-block;\n  margin: 0 10px;\n}\n\nfooter .social ul li a{\n  color: #6DADEB;\n  border: 2px solid #6DADEB;\n  border-radius: 50%;\n  width: 30px;\n  height: 30px;\n  text-align: center;\n  position: relative;\n}\n\nfooter ul li a:hover{\n  color: #9c3;\n  text-decoration: none;\n}\n\nfooter .social ul li a i{\n  position: absolute;\n  -webkit-transform: translate(-50%,-50%);\n          transform: translate(-50%,-50%);\n  left: 50%;\n  top: 50%;\n}\n\n.footer-bottom{\n  background: #0a5cac;\n  color: #fff;\n  font-size: 14px;\n  padding: 20px 0;\n}\n\n.footer-bottom p{\n  margin: 0;\n}\n\n.footer-bottom p.copyright{\n  color: #60A2E2;\n}\n\n.footer-bottom img{\n  display: inline-block;\n}\n\n@media screen and (min-width: 992px) and (max-width: 1199px){\n  .sidebar h1 {\n    font-size: 27px;\n  }\n  .common-button {\n    font-size: 14px;\n  }\n  .sidebar-body ul li {\n    padding: 20px 5px;\n    border-bottom: 1px solid #ddd;\n  }\n  .sidebar-body ul li:first-child, .sidebar-body ul li:nth-child(2){\n    padding: 20px;\n  }\n  .contactus span.number {\n    font-size: 25px;\n  }\n}\n\n@media screen and (max-width: 991px){\n  .progress_main {\n    text-align: center;\n  }\n  .progress_right {\n    float: none;\n  }\n  .progres_left {\n    width: 100%;\n  }\n  .footer-bottom p{\n    text-align: center;\n    margin: 10px 0;\n  }\n  .main-content.hotdocs .col-md-4.text-right{\n    text-align: center;\n  }\n  .main-content.tellusaboutyou h2 {\n    font-size: 24px;\n    margin: 0 0 20px;\n  }\n}\n\n@media screen and (min-width: 768px) and (max-width: 991px){\n  .sidebar h1 {\n    font-size: 28px;\n  }\n  .common-button {\n    font-size: 14px;\n  }\n  .btn-dashboard {\n    padding: 10px 0 10px 30px;\n  }\n  .tell_us_about_left {\n    width: 100%;\n  }\n  .single_right {\n    width: 85%;\n    float: left;\n    margin-left: 14px;\n    margin-bottom: 14px;\n  }\n  .woman_img {\n    left: 0;\n    position: relative;\n    top: 0;\n    margin: 0;\n  }\n  .main-content .email-box {\n    width: 235px;\n    padding: 20px 10px;\n  }\n  .main-content.hotdocs h2 {\n    text-align: center;\n  }\n  .pdf_viewer_container {\n    margin-top: 70px;\n  }\n}\n\n@media screen and (min-width: 481px) and (max-width: 767px){\n  .main-content .email-box {\n    width: 270px;\n    padding: 20px 10px;\n  }\n}\n\n@media screen and (max-width: 767px){\n  .logo {\n    position: relative;\n  }\n  .common-button {\n    margin-top: 0;\n    width: 100%;\n    margin-bottom: 20px;\n  }\n  .logo a{\n    display: block;\n  }\n  .logo img {\n    margin: auto;\n    display: block;\n  }\n  .tell_us_about_left {\n    width: 100%;\n  }\n  .woman_img {\n    position: static;\n    top: inherit;\n    left: inherit;\n    margin-top: inherit;\n    width: 100%;\n    display: inline-block;\n    text-align: center;\n  }\n  .tell_us_text {\n    width: 100%;\n    text-align: center;\n  }\n  .single_right {\n    width: 100%;\n    float: left;\n    margin-bottom: 15px;\n  }\n  .inherit_properties {\n    text-align: center;\n  }\n  .main-content.hotdocs h2 {\n    margin: 20px 0;\n    text-align: center;\n  }\n\n}\n\n@media screen  and (max-width: 480px){\n  .main-content .email-box {\n    width: 100%;\n  }\n  .logo img{\n    width: 100%;\n  }\n}\n"

/***/ }),

/***/ "./src/app/user/user-dashboard/your-final-arrangements/your-final-arrangements.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"col-xs-12 col-md-12\">\n  <div class=\"main-content tellusaboutyou\">\n    <h2>Select your final arrangements</h2>\n    <form [formGroup] = \"finalarrangementForm\">\n      <div class=\"form-group\">\n        <ul class=\"Instructions_ul_Radio\" style=\"margin-bottom:0\">\n          <li>\n            <label class=\"two_child_radio special_instrucion\" [ngClass]=\"{'active': flags.burial}\">\n              <span class=\"two_child_img\"><img src=\"../../../../assets/images/Ground-Burial-2-01.png\" alt=\"Ground-Burial\"></span>\n              <span class=\"two_child_text\">I wish to be <br> buried</span>\n              <input type=\"radio\" name=\"type\" value = 0 formControlName=\"type\" #typeBury (click)=\"changeWish(typeBury.value)\">\n            </label>\n          </li>\n          <li>\n            <label class=\"two_child_radio special_instrucion\" [ngClass]=\"{'active': flags.cremation}\">\n              <span class=\"two_child_img\"><img src=\"../../../../assets/images/save-money.png\" alt=\"save-money\"></span>\n              <span class=\"two_child_text\">I wish to be <br>Cremated</span>\n              <input type=\"radio\" name=\"type\" value = 1 formControlName=\"type\" #typeCremate (click)=\"changeWish(typeCremate.value)\">\n            </label>\n          </li>\n        </ul>\n      </div>\n      <div *ngIf=\"flags.burial\">\n        <div class=\"form-group\">\n          <label>I would like my remains interred as follows: <span class=\"leavetxt\">(If you are not sure, leave this box blank)</span></label>\n          <input type=\"text\" class=\"form-control\" formControlName=\"burial\">\n        </div>\n        <div class=\"form-group\">\n          <label>I have made the following final arrangements: <span class=\"leavetxt\">(If you are not sure, leave this box blank)</span></label>\n          <input type=\"text\" class=\"form-control\" formControlName=\"burial_arrangements\">\n        </div>\n      </div>\n\n      <div *ngIf=\"flags.cremation\">\n        <div class=\"form-group\" >\n          <label>How would you like your ashes handled? <span class=\"leavetxt\">(If you are not sure, leave this box blank)</span></label>\n          <input type=\"text\" class=\"form-control\" formControlName=\"ashes\">\n        </div>\n        <div class=\"form-group\">\n          <label>I have made the following final arrangements: <span class=\"leavetxt\">(If you are not sure, leave this box blank)</span></label>\n          <input type=\"text\" class=\"form-control\" formControlName=\"creamation_arrangements\">\n        </div>\n      </div>\n\n      <div class=\"form-footer\">\n        <div class=\"alert alert-danger\" *ngIf=\"errors.errorFlag\">\n          {{errors.errorMessage}}\n        </div>\n        <button class=\"btn common-button btn-grey pull-left\" (click)=\"goBack()\" >Go Back</button>\n        <button class=\"btn common-button btn-complete\" (click) = \"submit()\">Continue</button>\n      </div>\n    </form>\n  </div>\n</div>\n"

/***/ }),

/***/ "./src/app/user/user-dashboard/your-final-arrangements/your-final-arrangements.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return YourFinalArrangementsComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_forms__ = __webpack_require__("./node_modules/@angular/forms/esm5/forms.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__services_your_final_arrangements_service__ = __webpack_require__("./src/app/user/user-dashboard/your-final-arrangements/services/your-final-arrangements.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__angular_common__ = __webpack_require__("./node_modules/@angular/common/esm5/common.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};





var YourFinalArrangementsComponent = /** @class */ (function () {
    /**When constructor is called*/
    function YourFinalArrangementsComponent(_fb, finalarrangementService, router, location) {
        this._fb = _fb;
        this.finalarrangementService = finalarrangementService;
        this.router = router;
        this.location = location;
        this.flags = {
            burial: true,
            cremation: false
        };
        this.errors = {
            errorFlag: false,
            errorMessage: ''
        };
        var token = this.parseToken();
        this.createForm();
        this.getData(token);
    }
    /**Initialise the form*/
    YourFinalArrangementsComponent.prototype.createForm = function () {
        this.finalarrangementForm = this._fb.group({
            'type': new __WEBPACK_IMPORTED_MODULE_1__angular_forms__["FormControl"]('0'),
            'ashes': new __WEBPACK_IMPORTED_MODULE_1__angular_forms__["FormControl"](''),
            'creamation_arrangements': new __WEBPACK_IMPORTED_MODULE_1__angular_forms__["FormControl"](''),
            'burial': new __WEBPACK_IMPORTED_MODULE_1__angular_forms__["FormControl"](''),
            'burial_arrangements': new __WEBPACK_IMPORTED_MODULE_1__angular_forms__["FormControl"](''),
        });
    };
    /**Fetching the data from database*/
    YourFinalArrangementsComponent.prototype.getData = function (token) {
        var _this = this;
        this.finalarrangementgetdataSubscription = this.finalarrangementService.fetchData(token).subscribe(function (arrangementResponse) {
            console.log(arrangementResponse);
            _this.setData(arrangementResponse !== undefined ? arrangementResponse.data : null);
        }, function (errors) {
            _this.errors = {
                errorFlag: true,
                errorMessage: errors.message !== undefined && errors.message !== '' ? errors.message : errors.error.message
            };
            console.log(errors);
        });
    };
    /**Sets the form data.*/
    YourFinalArrangementsComponent.prototype.setData = function (response) {
        if (response === void 0) { response = null; }
        this.finalarrangementForm.setValue({
            'type': response !== null ? response.type : '0',
            'ashes': response !== null && parseInt(response.type, 10) === 1 ? response.ashes : '',
            'creamation_arrangements': response !== null && parseInt(response.type, 10) === 1 ? response.arrangements : '',
            'burial': response !== null && parseInt(response.type, 10) === 0 ? response.ashes : '',
            'burial_arrangements': response !== null && parseInt(response.type, 10) === 0 ? response.arrangements : '',
        });
        this.changeWish(response !== null ? response.type : null);
    };
    /**When the component initialises*/
    YourFinalArrangementsComponent.prototype.ngOnInit = function () { };
    /**Checks for authorization token.*/
    YourFinalArrangementsComponent.prototype.parseToken = function () {
        if (JSON.parse(localStorage.getItem('loggedInUser')).hasOwnProperty('token')) {
            return JSON.parse(localStorage.getItem('loggedInUser')).token;
        }
        return null;
    };
    /**On toggle the radiobutton*/
    YourFinalArrangementsComponent.prototype.changeWish = function (value) {
        if (value === void 0) { value = '0'; }
        this.flags = {
            burial: parseInt(value, 10) === 0,
            cremation: parseInt(value, 10) === 1,
        };
    };
    /**On form submit*/
    YourFinalArrangementsComponent.prototype.submit = function () {
        var _this = this;
        var token = this.parseToken();
        var data = this.preparedatabeforeSubmit();
        this.finalarrangementsubmitdataSubscription = this.finalarrangementService.submitfinalAgreement(token, data).subscribe(function (response) {
            console.log(response);
            if (response.status) {
                _this.router.navigate(['/dashboard']);
            }
        }, function (error) {
            _this.errors = {
                errorFlag: true,
                errorMessage: error.message !== undefined && error.message !== '' ? error.message : error.error.message
            };
            console.log(error);
        });
    };
    /**Prepare form data before submit to database*/
    YourFinalArrangementsComponent.prototype.preparedatabeforeSubmit = function () {
        var data = {
            user_id: localStorage.getItem('loggedInUser') !== null && localStorage.getItem('loggedInUser') !== undefined ? JSON.parse(localStorage.getItem('loggedInUser')).user.id : null,
            type: this.finalarrangementForm.value.type,
            arrangements: parseInt(this.finalarrangementForm.value.type, 10) === 1 ? this.finalarrangementForm.value.creamation_arrangements : (parseInt(this.finalarrangementForm.value.type, 10) === 0 ? this.finalarrangementForm.value.burial_arrangements : null),
            ashes: parseInt(this.finalarrangementForm.value.type, 10) === 1 ? this.finalarrangementForm.value.ashes : (parseInt(this.finalarrangementForm.value.type, 10) === 0 ? this.finalarrangementForm.value.burial : null),
        };
        return data;
    };
    /**Go back to the previous page*/
    YourFinalArrangementsComponent.prototype.goBack = function () {
        this.location.back();
    };
    /**When the component is destroyed*/
    YourFinalArrangementsComponent.prototype.ngOnDestroy = function () {
        if (this.finalarrangementgetdataSubscription !== undefined) {
            this.finalarrangementgetdataSubscription.unsubscribe();
        }
        if (this.finalarrangementsubmitdataSubscription !== undefined) {
            this.finalarrangementsubmitdataSubscription.unsubscribe();
        }
    };
    YourFinalArrangementsComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            selector: 'app-your-final-arrangements',
            template: __webpack_require__("./src/app/user/user-dashboard/your-final-arrangements/your-final-arrangements.component.html"),
            styles: [__webpack_require__("./src/app/user/user-dashboard/your-final-arrangements/your-final-arrangements.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_forms__["FormBuilder"],
            __WEBPACK_IMPORTED_MODULE_2__services_your_final_arrangements_service__["a" /* YourFinalArrangementsService */],
            __WEBPACK_IMPORTED_MODULE_3__angular_router__["d" /* Router */],
            __WEBPACK_IMPORTED_MODULE_4__angular_common__["f" /* Location */]])
    ], YourFinalArrangementsComponent);
    return YourFinalArrangementsComponent;
}());



/***/ }),

/***/ "./src/app/user/user-dashboard/your-final-arrangements/your-final-arrangements.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "YourFinalArrangementsModule", function() { return YourFinalArrangementsModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_common__ = __webpack_require__("./node_modules/@angular/common/esm5/common.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__your_final_arrangements_routing_module__ = __webpack_require__("./src/app/user/user-dashboard/your-final-arrangements/your-final-arrangements-routing.module.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__your_final_arrangements_component__ = __webpack_require__("./src/app/user/user-dashboard/your-final-arrangements/your-final-arrangements.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__angular_forms__ = __webpack_require__("./node_modules/@angular/forms/esm5/forms.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__services_your_final_arrangements_service__ = __webpack_require__("./src/app/user/user-dashboard/your-final-arrangements/services/your-final-arrangements.service.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};






var YourFinalArrangementsModule = /** @class */ (function () {
    function YourFinalArrangementsModule() {
    }
    YourFinalArrangementsModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_1__angular_core__["NgModule"])({
            imports: [
                __WEBPACK_IMPORTED_MODULE_0__angular_common__["b" /* CommonModule */],
                __WEBPACK_IMPORTED_MODULE_2__your_final_arrangements_routing_module__["a" /* YourFinalAgreementsRoutingModule */],
                __WEBPACK_IMPORTED_MODULE_4__angular_forms__["ReactiveFormsModule"]
            ],
            declarations: [__WEBPACK_IMPORTED_MODULE_3__your_final_arrangements_component__["a" /* YourFinalArrangementsComponent */]],
            providers: [__WEBPACK_IMPORTED_MODULE_5__services_your_final_arrangements_service__["a" /* YourFinalArrangementsService */]]
        })
    ], YourFinalArrangementsModule);
    return YourFinalArrangementsModule;
}());



/***/ })

});
//# sourceMappingURL=your-final-arrangements.module.chunk.js.map