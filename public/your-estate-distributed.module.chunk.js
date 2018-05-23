webpackJsonp(["your-estate-distributed.module"],{

/***/ "./src/app/user/user-dashboard/your-estate-distributed/your-estate-distributed-routing.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return YourEstateDistributedRoutingModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__your_estate_distributed_component__ = __webpack_require__("./src/app/user/user-dashboard/your-estate-distributed/your-estate-distributed.component.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};



var routes = [{ path: '', component: __WEBPACK_IMPORTED_MODULE_2__your_estate_distributed_component__["a" /* YourEstateDistributedComponent */] }];
var YourEstateDistributedRoutingModule = /** @class */ (function () {
    function YourEstateDistributedRoutingModule() {
    }
    YourEstateDistributedRoutingModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["NgModule"])({
            imports: [__WEBPACK_IMPORTED_MODULE_1__angular_router__["e" /* RouterModule */].forChild(routes)],
            exports: [__WEBPACK_IMPORTED_MODULE_1__angular_router__["e" /* RouterModule */]]
        })
    ], YourEstateDistributedRoutingModule);
    return YourEstateDistributedRoutingModule;
}());



/***/ }),

/***/ "./src/app/user/user-dashboard/your-estate-distributed/your-estate-distributed.component.css":
/***/ (function(module, exports) {

module.exports = "@font-face {\nfont-family: 'OpenSans-Light';\nsrc: url('OpenSans-Light.b180c799a87a4cad9108.eot?#iefix') format('embedded-opentype'), url('OpenSans-Light.5193f01d42787bba6c0f.woff') format('woff'), url('OpenSans-Light.1bf71be111189e76987a.ttf') format('truetype'), url('OpenSans-Light.9384f87d95af80a8d067.svg#OpenSans-Light') format('svg');\nfont-weight: normal;\nfont-style: normal;\n}\n\n@font-face {\nfont-family: 'OpenSans';\nsrc: url('OpenSans.06a04537db9294681f93.eot?#iefix') format('embedded-opentype'), url('OpenSans.10bb6c1975b08eb0833d.woff') format('woff'), url('OpenSans.629a55a7e793da068dc5.ttf') format('truetype'), url('OpenSans.239f0753aaf8b1d7568f.svg#OpenSans') format('svg');\nfont-weight: normal;\nfont-style: normal;\n}\n\n@font-face {\nfont-family: 'Lato-Regular';\nsrc: url('Lato-Regular.39a3905085ad34aa621e.eot?#iefix') format('embedded-opentype'), url('Lato-Regular.8c81f845c2d1b94675f7.woff') format('woff'), url('Lato-Regular.7f690e503a254e0b8349.ttf') format('truetype'), url('Lato-Regular.ce28f379ab9123893681.svg#Lato-Regular') format('svg');\nfont-weight: normal;\nfont-style: normal;\n}\n\n@font-face {\nfont-family: 'FontAwesome';\nsrc: url('fontawesome-webfont.674f50d287a8c48dc19b.eot?v=4.7.0');\nsrc: url('fontawesome-webfont.674f50d287a8c48dc19b.eot?#iefix&v=4.7.0') format('embedded-opentype'), url('fontawesome-webfont.af7ae505a9eed503f8b8.woff2?v=4.7.0') format('woff2'), url('fontawesome-webfont.fee66e712a8a08eef580.woff?v=4.7.0') format('woff'), url('fontawesome-webfont.b06871f281fee6b241d6.ttf?v=4.7.0') format('truetype'), url('fontawesome-webfont.912ec66d7572ff821749.svg?v=4.7.0#fontawesomeregular') format('svg');\nfont-weight: normal;\nfont-style: normal;\n}\n\nbody{\n    font-family: 'OpenSans';\n    color: #373737;\n}\n\nhr {\n    border-top: 1px solid #ddd;\n}\n\nheader{\n    background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAsAAAByCAIAAAAK47x4AAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAALGSURBVHjaYuQIXcyAFwAEEBMDIQAQQCwovP//oQxGRrgIQACxIESxKmVgAAggwrYABBBhFQABRFgFQAARVgEQQIRVAAQQYRUAAURYBUAAEVYBEECEVQAEEGEVAAFEWAVAABFWARBAhFUABBBhFQABRFgFQAARVgEQQIRVAAQQIRX//wMEEI5UiAQAAoiwLQABRFgFQAARVgEQQIRVAAQQYRUAAURYBUAAEVYBEECEVQAEEGEVAAFEWAVAABFWARBAhFUABBCwhCEQcwABRNgMgAAirAIggAirAAggwioAAoiwCoAAIqwCIIAIqwAIIMIqAAKIsAqAACKsAiCACKsACCDCKgACiAUUcZCKAC0GGaEiAAHEgkWOAUUDQAARtgUggAirAAggwioAAoiwCoAAIqwCIICYwI7GlVRB4gABxILuOQxFAAFE2BaAACKsAiCACKsACCDCKgACiLAKgAAirAIggAirAAggwioAAoiwCoAAIqwCIIAIqwAIIMIqAAKIsAqAAGIhVEgxAAQQYTMAAoiwCoAAIqwCIIAIqwAIIMIqAAKIsAqAACKsAiCAWJASOiPWrA0QQMjlOvawAwggwrYABBALoqGJAwAEEAuG9egAIIBYCClgAAggwmYABBBhMwACiLAZAAFE2C8AAUQ4PAACiIWRkBkAAUTYFoAAgrmUESNyYEU5QABhmMGIXroDBBBhWwACiLAKgAAirAIggAiHKUAAMYHNABfLQAYjAwoCewwggMDplJEJ3ScQXWAHAAQQbnfAhAECCEkFZoIHiwAEEFjFf6RIRFYHJgECCBxzjEiBDVcHMwwggDDihRGlKgUyAAKIhYGJCXszF6YHIIDAeY4RSzULFwQIIFg7GeIjZDYMAAQQanhgCxuAACLcYgMIIMIpGSCAWP4TMgMggIAu/YdfBUAAEXYHQACxEMq2DAABBgBZHzlVosClbwAAAABJRU5ErkJggg==');\n    background-size: 100% 100%;\n    min-height: 115px;\n}\n\n.logo{\n    position: absolute;\n    top: 25px;\n    left: 0;\n    right: 0;\n    margin: 0;\n    width: 100%;\n    text-align: left;\n    padding: 0;\n    display: block;\n}\n\n.logo a{\n    display: inline-block;\n}\n\n.loader1 img{\n    margin: auto;\n    width: 120px;\n}\n\n.common-button{\n    color: #fff;\n    text-transform: capitalize;\n    height: 100%;\n    text-shadow: 1px 1px 1px #666;\n    margin-top: 25px;\n    font-size: 16px;\n    background: none;\n    font-family: 'Lato-Regular';\n    position: relative;\n    top:0;\n    -webkit-transition: 0s;\n    transition: 0s;\n}\n\n.common-button:hover{\n    color: #fff !important;\n    top: -1px;\n}\n\n.common-button:focus{\n    outline: none !important;\n    -webkit-box-shadow: none !important;\n            box-shadow: none !important;\n}\n\n.green-btn{\n    background: url('data:image/png;base64,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') no-repeat center center !important;\n    background-size: 100% 100%;\n    padding: 10px 0 10px 30px;\n    width: 164px;\n}\n\n.green-btn img{\n    margin-left: 5px;\n    display: inline-block;\n}\n\n.main-container{\n    padding: 70px 0;\n    background: #f3f3f2;\n    border-bottom: 1px solid #ddd;\n}\n\n.sidebar{\n    border-radius: 10px;\n    border: 1px solid #ddd;\n    box-shadow: 0 0 2px 0 #eee;\n    -webkit-box-shadow: 0 0 1px 0 #eee;\n    -moz-box-shadow: 0 0 1px 0 #eee;\n}\n\n.sidebar img{\n    display: inline-block;\n    vertical-align: top;\n    margin: 10px 10px 0 0;\n}\n\n.sidebar img.white-icon{\n    display: none;\n}\n\n.sidebar h1{\n    font-family: 'OpenSans-Light';\n    font-size: 32px;\n    display: inline-block;\n    margin: 0;\n    vertical-align: top;\n    line-height: 28px;\n}\n\n.sidebar h1 span{\n    font-family: 'OpenSans';\n    font-size: 16px;\n    display: block;\n    font-weight: bold;\n}\n\n.sidebar-body{\n    background: #fff;\n    border-radius: 10px;\n}\n\n.sidebar-body ul{\n    margin: 0;\n    padding: 0;\n    list-style-type: none;\n}\n\n.sidebar-body ul li{\n    padding: 20px;\n    border-bottom: 1px solid #ddd;\n}\n\n.sidebar-body ul li:first-child a, .sidebar-body ul li:nth-child(2) a{\n    color: #42A82D;\n    text-decoration: none;\n    cursor: pointer;\n    display: block;\n}\n\n.sidebar-body ul li:first-child.active, .sidebar-body ul li:nth-child(2).active{\n    background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAQAAABaCAIAAAAQF2CuAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAG/SURBVHjaYuTK2cMAAwABxMLw/z+cAxBALAwMCA5AALEgsRkAAghFBiCAUGQAAghFBiCAUGQAAghFBiCAUOwBCCAmKA0WAQggJJn/DAABhGIAQACx/EfiAQQQigxAAKEYDRBAKEYDBBAKByCAmBiQAEAAocgABBCKDEAAocgABBAKByCAUJQBBBCKDEAAobgAIIBQ3AYQQCgyAAGEIgMQQGADGKEcgAACK4NJAgQQE5T1H4QAAgjsbZgMQAAxQcQgkgABBDMaTAAEEIrbAAIIxW0AAYQiAxBAKC4ACCAUtwEEEIoygABCMQAggFBkAAIIhQMQQCjKAAIIRQYggFA4AAGEwgEIIBQOQAChcAACCIUDEEAoHIAAQuEABBAKByCAUDgAAYTCAQggFA5AAKFwAAIIhQMQQCgcgABC4QAEEAoHIIBQOAABhMIBCCAUDkAAoXAAAgiFAxBAKByAAELhAAQQCgcggFA4AAGEwgEIIBQOQAChcAACCIUDEEAoHIAAQuEABBAKByCAUDgAAYTCAQggFA5AAKFwAAIIhQMQQCgcgABC4QAEEAoHIIBQOAABhMIBCCAUDkAAoXAAAgwAB8E87uUGpVcAAAAASUVORK5CYII=');\n    background-size: 100% 100%;\n    padding: 20px;\n    position: relative;\n}\n\n.sidebar-body ul li:first-child{\n    border-top-left-radius: 10px;\n    border-top-right-radius: 10px;\n}\n\n.sidebar-body ul li:first-child.active a, .sidebar-body ul li:nth-child(2).active a{\n    color: #fff;\n}\n\n.sidebar-body ul li:first-child.active:before, .sidebar-body ul li:nth-child(2).active:before{\n    content: '';\n    width: 0;\n    height: 0;\n    border-top: 10px solid transparent;\n    border-bottom: 10px solid transparent;\n    border-left: 10px solid #0854a2;\n    position: absolute;\n    -webkit-transform: translate(0,-50%);\n            transform: translate(0,-50%);\n    top: 50%;\n    right: -10px;\n}\n\n.sidebar-body ul li:last-child{\n    border: none;\n}\n\n.sidebar ul li.active img.white-icon{\n    display: inline-block;\n}\n\n.sidebar ul li.active img.green-icon{\n    display: none;\n}\n\n.rightPanel{\n    width: 855px;\n}\n\n.btn-dashboard{\n    padding: 10px 0 10px 30px;\n    width: 100%;\n    margin-top: 0;\n    background: url('data:image/png;base64,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') no-repeat center !important;\n    background-size: 100% 100%;\n    text-shadow: 1px 1px 1px #2150b0;\n}\n\n.btn-preview{\n    padding: 10px 0 10px 30px;\n    width: 100%;\n    margin-top: 0;\n    background: url('data:image/png;base64,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') no-repeat center !important;\n    background-size: 100% 100%;\n    text-shadow: 1px 1px 1px #2150b0;\n}\n\n.btn-progress{\n    padding: 10px 0 10px 30px;\n    width: 100%;\n    margin-top: 0;\n    background: url('data:image/png;base64,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') no-repeat center !important;\n    background-size: 100% 100%;\n    text-shadow: 1px 1px 1px #2150b0;\n}\n\n.notification{\n    border-radius: 10px;\n    border: 1px solid #ddd;\n    box-shadow: 0 1px 1px 0 #ddd;\n    -webkit-box-shadow: 0 1px 1px 0 #ddd;\n    -moz-box-shadow: 0 1px 1px 0 #ddd;\n    padding: 25px 30px 20px;\n    text-align: center;\n    margin: 50px 0 20px;\n    position: relative;\n}\n\n.notification p{\n    font-size: 18px;\n    color: #333;\n    margin: 0;\n    line-height: 22px;\n}\n\n.notification span.imp{\n    font-family: 'Lato-Regular';\n    position: absolute;\n    top: 0;\n    color: #42A82D;\n    font-size: 24px;\n    background: #fff;\n    font-weight: bold;\n    height: 35px;\n    width: 35px;\n    border-radius: 50%;\n    border: 1px solid #ddd;\n    line-height: 30px;\n    -webkit-transform: translate(-50%,-50%);\n            transform: translate(-50%,-50%);\n}\n\n.progress_main{\n    margin: 0 0 30px;\n    padding: 10px;\n    border-radius: 10px;\n    box-shadow: 1px 0 1px 1px #ccc;\n    -webkit-box-shadow: 1px 0 1px 1px #ccc;\n    -moz-box-shadow: 1px 0 1px 1px #ccc;\n}\n\n.progres_left{\n    border-radius: 6px;\n    height: 28px;\n    border: 1px solid #DEDEDE;\n    background: #F2F2F2;\n    -webkit-box-shadow: inset 0 0 2px 0px #EDEDED;\n            box-shadow: inset 0 0 2px 0px #EDEDED;\n    width: 90%;\n}\n\n.progres_left span{\n    border-radius: 6px;\n    -webkit-box-shadow: inset 0 -1px 1px 0 #317D1D;\n            box-shadow: inset 0 -1px 1px 0 #317D1D;\n}\n\n.progress_right{\n    font-size: 14px;\n    color: #42A82D;\n    font-family: 'OpenSans';\n}\n\n.main-content{\n    background: #fff;\n    border-radius: 10px;\n    border: 1px solid #ddd;\n    box-shadow: 0 1px 1px 0 #ddd;\n    -webkit-box-shadow: 0 1px 1px 0 #ddd;\n    -moz-box-shadow: 0 1px 1px 0 #ddd;\n    display: inline-block;\n    width: 100%;\n    padding: 30px;\n}\n\n.main-content h2{\n    color: #2479B8;\n    font-size: 36px;\n    margin: 0;\n    text-transform: capitalize;\n}\n\n.main-content p{\n    font-size: 18px;\n    margin: 0;\n    line-height: 24px;\n}\n\n.main-content.loading-screen p{\n    margin: 20px 0;\n}\n\n.loading-screen .btn-complete{\n    float: none;\n}\n\n.single_ul{\n    margin: 0;\n}\n\n.single_ul li {\n    margin: 15px 0;\n}\n\n.single_ul li:last-child{\n    margin-bottom: 0;\n}\n\n.single_ul li a{\n    border: 1px solid #4db228;\n    padding: 10px;\n    border-radius: 6px;\n}\n\n.single_ul li a.inprogress{\n    border: 1px solid #BFBFBF;\n}\n\n.tell_us_text {\n    color: #373737;\n}\n\n.inprogress img{\n    -webkit-filter: grayscale(100%);\n    filter: grayscale(100%);\n}\n\n.inherit_properties {\n    font-family: 'OpenSans-Light';\n    color: #373737;\n    font-size: 16px;\n}\n\n.btn-complete{\n    background: url(data:image/png;base64,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) no-repeat center center !important;\n    background-size: 100% 100%;\n    padding: 10px 0 10px 30px;\n    width: 130px;\n    margin: 0;\n    float: right;\n}\n\n.inprogress .btn-complete{\n    -webkit-filter: grayscale(100%);\n    filter: grayscale(100%);\n}\n\n.btn-grey{\n    background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHoAAAAsCAYAAACqjqwOAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAUaSURBVHjaYvz//z/DKBj+ACCAGLEJ1tfXs6iqqgYwMzOHMDExqTEyMuoBhZlp7RhQovv37x+DlJQUw7dv30ZjhzjwFxhul/7+/XsLGHZrbty4saG8vPwPuiKAAMKI6Pnz52txcXEtBEawCb1dDItoSUnJ0YgmEwDD78zXr1/jw8LCriGLAwQQckQzLl26tJSVlbURmIM5BsiR8BwNdOxorJGfYX78/v27PiAgoBvEBYkBBBATVI5p2bJlvWxsbJ0DFcnoOXsUUFAfA+MQFJcbN27shcUxQACBcjQjsLiO4ebmXjQIih1wJIOK7tEcTR0ADMc4YDG+BCCAmKOjo7l1dHQ2AVMB72DIySDMy8vLACx6RmOJCoCFhcWAg4NjDkAAsTg4OIQD+ZKDobiERfRo0U09AGxUK7q4uIQDBBALMLa9BmPAjkY29QAojgECiAmUtQdT5I7maOoDZmZmM4AAYgHWzWKDJWCR3TEa2VQtviUAAogFSPMOJkeN5mqaAFaAAGIZTLlnNIJpBwACiGUwBS5ybh6NcOoCgABiGg3QkQEAAmhQFt2jOZr6ACCAaFJ0x8TEMMydOxc0KgNq2pNVR49GNHUBQABRPaJjY2PB9Js3bxj4+fkZuLm5Se5ejUYy9QFAALFQ0zBYJIPAp0+fSIrk0cimLQAIIKrl6Li4ODg7Ly8PnJtBxTYpZo/W0bQDAAFElYiOj4+Hs3Nzc8E5WVBQkIGNjY3siB4F1AUAAURxRCckJMDZOTk54EgWFRVl4OPjIztHjxbd1AcAAcSEXlySimfMmAE3bMqUKQxcXFzgyIZF8igeHBgggJgoTSmgCO3p6YHz6+vrGb58+cLw58+f0Ww0iABAAFGco0ERDSqmu7u74YaWlJQwfPjwAbxKZDQ3DQ4MEEBM1DAEFtldXV3wyAb1o3/8+EGWedha4KOYMgwQQEzUMggW2Z2dneCIAuVmSnL0KKAuAAggqo6MwSK7o6ODolb3aGRTHwAEEAvVDWRhAQ+W8PDwkDTOPToyRlsAEEA0mdQARTAskknN0aORTBsAEECDcuHBaGRTHwAEEAtsd8RgiujROpr64QoQQEyjAxvDH/z9+5cBIIBYfv78ycDJyTmao4cxAMUxQACxfPv27TMHBwfvYIroUUBd8P37928AAcTy6dOnN7xAwMrKOuhy9SigHICq5s+fP78ECCBQ0X35/fv3iqCpxcEQydjYo4B8AJpzAMUxQAAxffnyZQ9oLzJo6c9obh5eADSLCCy2QXG7ByCAmF++fPlUQ0MjBBjr/KAAZmdnH/CIFhAQADcgRgH54fjx40cwBra4nyxbtqwYIICYnj179vH169c9oP40sAhnePLkCdmzTtTEo4A88OvXLwZg5gXVy2D+ixcvuh49evQRIIBA45T/L1++fEdHR0cUmJsNQBEOyvIgDTBAzpg1uSkRZD9ovRmy/aOAcOSCMKj6BeViUBiCAJC9YMKECf1A5leAAAKfYQLEHNzc3CIhISElwEDOBPIHpAkO6tiDHKmtrc3w9u3b0RgkP8P8Bobf9Hnz5vUAc/YboNAPgACCZdV/v4Hg4sWLp4HdrH3AFrgBMBeLDVQdLSIiAq4+RgFZufvK6dOnU5YsWbIayP4AGi8BBS1AACGfM8YEzcncXFxcAh4eHr7A3O3JwsIiB4x8TXpFNChXA6sRhnfv3o3GGvGRex2YT58A21pbV61atRlY9YIiGHSsE+jEH3A5DhBgAIK7qCGGxkQkAAAAAElFTkSuQmCC) no-repeat center center !important;\n    background-size: 100% 100%;\n    padding: 10px 0 10px 30px;\n    width: 130px;\n    margin-top: 0;\n}\n\n.form-footer{\n    display: inline-block;\n    width: 100%;\n    background: #f4f3f2;\n    vertical-align: top;\n    padding: 40px 25px;\n    -webkit-box-shadow: inset 0px 2px 10px 0 #e0e0e0;\n            box-shadow: inset 0px 2px 10px 0 #e0e0e0;\n}\n\nfooter ul{\n    margin: 0;\n    padding: 0;\n    list-style-type: none;\n}\n\n.footer-top{\n    padding: 50px 0;\n}\n\n.footer-top p{\n    margin: 20px 0;\n}\n\n.footer-nav{\n    margin-top: 80px;\n    display: inline-block;\n    width: 49%;\n    vertical-align: top;\n}\n\nfooter ul li a{\n    color: #212529;\n    display: block;\n    padding: 0 0 5px;\n}\n\n.contactus{\n    margin-top: 80px;\n    border-bottom: 1px solid #eee;\n    padding-bottom: 10px;\n    margin-bottom: 10px;\n}\n\n.contactus img{\n    vertical-align: top;\n    display: inline-block;\n}\n\n.footer-label{\n    display: inline-block;\n}\n\n.contactus span{\n    display: block;\n}\n\n.contactus span.number{\n    display: inline-block;\n    font-size: 28px;\n    font-weight: bold;\n    letter-spacing: 2px;\n    color: #373737;\n}\n\n.main-content.tellusaboutyou{\n    padding: 30px 0 0;\n}\n\n.main-content.tellusaboutyou h2{\n    padding: 0 30px;\n}\n\n.main-content .form-group{\n    padding: 0 30px;\n    margin: 25px 0;\n    position: relative;\n}\n\n.main-content .form-group label{\n    display: block;\n    font-weight: normal;\n    font-size: 18px;\n    padding: 10px;\n}\n\n.main-content .form-group label span{\n    display: block;\n    text-align: center;\n    font-size: 13px;\n    line-height: 14px;\n}\n\n.main-content .form-group label .human_status3{\n    margin-top: 10px;\n}\n\n.main-content .form-group label span.leavetxt{\n    display: block;\n    font-family: 'OpenSans-Light';\n    font-style: italic;\n}\n\n.main-content .form-control{\n    font-size: 16px;\n    height: 40px;\n    border-radius: 6px;\n    margin-top: 10px;\n    border: 1px solid #BFBFBF;\n}\n\n.main-content select.form-control{\n    background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAHCAYAAAA4R3wZAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAABcSURBVHjaYty/f38jAwNDHQNpoAkggJiARD2IQYomkB6AAGKCcojV3ARVywAQQExIgoQ0wzWBAEAAMaFJ4tKMogkEAAKICYsidM0YmkAAIIBYcDirHgcbDgACDACadw7WqOsxPwAAAABJRU5ErkJggg==') 98% no-repeat;\n    -webkit-appearance: none;\n    -moz-appearance: none;\n}\n\n.main-content .valid .form-control{\n    border-color: #42A82D;\n    color: #42A82D;\n}\n\n.main-content .valid i{\n    position: absolute;\n    top: 44px;\n    right: 44px;\n    background: #42A82D;\n    color: #fff;\n    height: 22px;\n    width: 22px;\n    text-align: center;\n    line-height: 22px;\n    border-radius: 50%;\n}\n\n.main-content .invalid .form-control{\n    border-color: #be5456;\n    color: #be5456;\n}\n\n.main-content .invalid i{\n    position: absolute;\n    top: 44px;\n    right: 44px;\n    background: #be5456;\n    color: #fff;\n    height: 22px;\n    width: 22px;\n    text-align: center;\n    line-height: 22px;\n    border-radius: 50%;\n}\n\n.radio_ul6{\n    text-align: left;\n}\n\n.radio_custom{\n    height: 105px;\n    width: 105px;\n    position: relative;\n    border: 1px solid #BFBFBF;\n    font-family: 'OpenSans';\n    box-shadow:0 1px 1px 1px #ddd;\n    -webkit-box-shadow:0 1px 1px 1px #ddd;\n    -moz-box-shadow:0 1px 1px 1px #ddd;\n    min-height: 100%;\n}\n\n.percentage-estate .radio_custom{\n    height: 120px;\n    width: 120px;\n}\n\n.radio_custom .human_status{\n    position: absolute;\n    -webkit-transform: translate(-50%,-50%);\n            transform: translate(-50%,-50%);\n    left: 50%;\n    top: 50%;\n    font-size: 16px;\n}\n\n.radio_ul6 li, .first_page_radio li{\n    width: auto;\n    margin-right: 5px;\n    margin-left: 0;\n    display: inline-block;\n    float: none;\n    vertical-align: top;\n}\n\n.radio_custom.active {\n    border-color: #42A82D;\n    background: #42A82D;\n    color: #fff;\n}\n\n.radio_custom.marital_status{\n    height: 130px;\n    width: 130px;\n}\n\n.first_page_radio{\n    text-align: left;\n}\n\n.custom_img2 {\n    padding-bottom: 2px;\n}\n\n.human_status2{\n    font-family: 'OpenSans';\n    position: absolute;\n    -webkit-transform: translate(-50%,0);\n            transform: translate(-50%,0);\n    left: 50%;\n    top: auto;\n    bottom: 10px;\n    line-height: 20px;\n}\n\n.radio_custom.marital_status.active{\n    background: none;\n}\n\n.radio_custom.marital_status.active .human_status2{\n    color: #42A82D;\n}\n\n.main-content .email-box{\n    display: inline-block;\n    border: 1px solid #ddd;\n    background: #F2F2F2;\n    height: 105px;\n    width: 350px;\n    padding: 20px;\n    position: relative;\n}\n\n.main-content .valid.email-box{\n    border-color: #42A82D;\n}\n\n.main-content .valid.email-box i {\n    top: 40px;\n    right: 30px;\n}\n\n.Instructions_ul_Radio{\n    text-align: left;\n}\n\n.special_instrucion{\n    min-height: 100%;\n    height: 160px;\n    width: 160px;\n    position: relative;\n    border: 1px solid #BFBFBF;\n    font-family: 'OpenSans';\n    box-shadow: 0 1px 1px 1px #ddd;\n    -webkit-box-shadow: 0 1px 1px 1px #ddd;\n    -moz-box-shadow: 0 1px 1px 1px #ddd;\n    min-height: 100%;\n}\n\n.two_child_radio.active{\n    border: 1px solid #42b12a;\n}\n\n.two_child_radio.active .two_child_text{\n    color: #42b12a;\n}\n\n.two_child_radio .two_child_text{\n    font-family: 'OpenSans';\n    line-height: 20px;\n    color: rgba(0,0,0,.7);\n    font-size: 16px;\n}\n\n.Instructions_ul_Radio li{\n    height: 100%;\n    width: auto;\n    margin-right: 10px;\n    margin-bottom: 6px;\n    margin-left: 0;\n}\n\n.main-content textarea.form-control{\n    height: auto;\n}\n\n.human_status3 {\n    font-family: 'OpenSans';\n    height: auto;\n    line-height: 20px;\n}\n\n.gifts-list .radio_custom {\n    width: 120px;\n    height: 120px;\n}\n\n.gifts-list .radio_custom.active{\n    background: #fff;\n}\n\n.gifts-list .radio_custom.active .human_status3{\n    color: #42A82D;\n}\n\na.add-btn{\n    float: right;\n    font-size: 16px;\n    font-weight: bold;\n    display: inline-block;\n    margin: 10px 0;\n    text-decoration: none;\n}\n\n.title-bar{\n    background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAsAAAByCAIAAAAK47x4AAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAALGSURBVHjaYuQIXcyAFwAEEBMDIQAQQCwovP//oQxGRrgIQACxIESxKmVgAAggwrYABBBhFQABRFgFQAARVgEQQIRVAAQQYRUAAURYBUAAEVYBEECEVQAEEGEVAAFEWAVAABFWARBAhFUABBBhFQABRFgFQAARVgEQQIRVAAQQIRX//wMEEI5UiAQAAoiwLQABRFgFQAARVgEQQIRVAAQQYRUAAURYBUAAEVYBEECEVQAEEGEVAAFEWAVAABFWARBAhFUABBCwhCEQcwABRNgMgAAirAIggAirAAggwioAAoiwCoAAIqwCIIAIqwAIIMIqAAKIsAqAACKsAiCACKsACCDCKgACiAUUcZCKAC0GGaEiAAHEgkWOAUUDQAARtgUggAirAAggwioAAoiwCoAAIqwCIICYwI7GlVRB4gABxILuOQxFAAFE2BaAACKsAiCACKsACCDCKgACiLAKgAAirAIggAirAAggwioAAoiwCoAAIqwCIIAIqwAIIMIqAAKIsAqAAGIhVEgxAAQQYTMAAoiwCoAAIqwCIIAIqwAIIMIqAAKIsAqAACKsAiCAWJASOiPWrA0QQMjlOvawAwggwrYABBALoqGJAwAEEAuG9egAIIBYCClgAAggwmYABBBhMwACiLAZAAFE2C8AAUQ4PAACiIWRkBkAAUTYFoAAgrmUESNyYEU5QABhmMGIXroDBBBhWwACiLAKgAAirAIggAiHKUAAMYHNABfLQAYjAwoCewwggMDplJEJ3ScQXWAHAAQQbnfAhAECCEkFZoIHiwAEEFjFf6RIRFYHJgECCBxzjEiBDVcHMwwggDDihRGlKgUyAAKIhYGJCXszF6YHIIDAeY4RSzULFwQIIFg7GeIjZDYMAAQQanhgCxuAACLcYgMIIMIpGSCAWP4TMgMggIAu/YdfBUAAEXYHQACxEMq2DAABBgBZHzlVosClbwAAAABJRU5ErkJggg==);\n    background-size: 100% 100%;\n    padding: 40px 20px;\n    border-top-left-radius: 10px;\n    border-top-right-radius: 10px;\n    position: absolute;\n    z-index: 9;\n    left: 16px;\n    right: 16px;\n    top: 0;\n}\n\n.main-content.hotdocs h2{\n    color: #fff;\n    font-size: 16px;\n    font-weight: bold;\n}\n\n.main-content.hotdocs{\n    padding: 0;\n}\n\n.pdf_viewer_container {\n    margin-top: 10px;\n}\n\n.pdf_viewer_container object {\n    min-height: 750px;\n    height: 100%;\n}\n\n.main-content.hotdocs .title-bar ul{\n    margin: 0;\n    padding: 0;\n}\n\n.main-content.hotdocs .title-bar ul li{\n    display: inline-block;\n    margin: 0 12px;\n    cursor: pointer;\n}\n\nfooter .social span{\n    vertical-align: top;\n    display: inline-block;\n    margin-top: 5px;\n    font-size: 16px;\n}\n\nfooter .social ul{\n    display: inline-block;\n    margin-left: 20px;\n}\n\nfooter .social ul li {\n    display: inline-block;\n    margin: 0 10px;\n}\n\nfooter .social ul li a{\n    color: #6DADEB;\n    border: 2px solid #6DADEB;\n    border-radius: 50%;\n    width: 30px;\n    height: 30px;\n    text-align: center;\n    position: relative;\n}\n\nfooter ul li a:hover{\n    color: #9c3;\n    text-decoration: none;\n}\n\nfooter .social ul li a i{\n    position: absolute;\n    -webkit-transform: translate(-50%,-50%);\n            transform: translate(-50%,-50%);\n    left: 50%;\n    top: 50%;\n}\n\n.footer-bottom{\n    background: #0a5cac;\n    color: #fff;\n    font-size: 14px;\n    padding: 20px 0;\n}\n\n.footer-bottom p{\n    margin: 0;\n}\n\n.footer-bottom p.copyright{\n    color: #60A2E2;\n}\n\n.footer-bottom img{\n    display: inline-block;\n}\n\n.threeColField {\n    width: calc(50% - 53px);\n    float: left;\n    margin: 0 10px;\n}\n\n.threeColField2 {\n    width: calc(33.33% - 40px);\n    float: left;\n    margin: 0 10px;\n}\n\n.threeColField:nth-child(3n) {\n    width: 40px;\n}\n\n.threeColField2:nth-child(4n) {\n    width: 40px;\n}\n\n.form-group .threeColField label, .form-group .threeColField2 label{\n    margin-bottom: 0;\n    padding-bottom: 0;\n    padding-left: 0;\n}\n\n.form-group .threeColField2 label{\n    font-size: 14px;\n}\n\n.delRow, .addRow {\n    margin-top: 11px;\n    height: 40px;\n    border: 0;\n    border-bottom: 3px solid #a92521;\n    background: #d9534f;\n    border-radius: 10px;\n    width: 40px;\n    font-size: 20px;\n}\n\n.addRowBtn{\n    float: right;\n}\n\n.addRow {\n    border-bottom: 3px solid #1c588a;\n    background: #337ab7;\n    font-weight: bold;\n    font-size: 30px;\n    line-height: 24px;\n    float: right;\n}\n\n.addRowBtnRow{\n    width: 100%;\n    float: left;\n}\n\n.threeColField .form-control::-webkit-input-placeholder{\n    color: #fff;\n}\n\n.threeColField .form-control:-ms-input-placeholder{\n    color: #fff;\n}\n\n.threeColField .form-control::-ms-input-placeholder{\n    color: #fff;\n}\n\n.threeColField .form-control::placeholder{\n    color: #fff;\n}\n\n.threeColField2 .form-control::-webkit-input-placeholder{\n    color: #fff;\n}\n\n.threeColField2 .form-control:-ms-input-placeholder{\n    color: #fff;\n}\n\n.threeColField2 .form-control::-ms-input-placeholder{\n    color: #fff;\n}\n\n.threeColField2 .form-control::placeholder{\n    color: #fff;\n}\n\n@media screen and (min-width: 992px) and (max-width: 1199px){\n    .sidebar h1 {\n        font-size: 27px;\n    }\n    .common-button {\n        font-size: 14px;\n    }\n    .sidebar-body ul li {\n        padding: 20px 5px;\n        border-bottom: 1px solid #ddd;\n    }\n    .sidebar-body ul li:first-child, .sidebar-body ul li:nth-child(2){\n        padding: 20px;\n    }\n    .contactus span.number {\n        font-size: 25px;\n    }\n}\n\n@media screen and (max-width: 1199px){\n    .rightPanel{\n        width: 720px;\n    }\n}\n\n@media screen and (max-width: 991px){\n    .progress_main {\n        text-align: center;\n    }\n    .progress_right {\n        float: none;\n    }\n    .progres_left {\n        width: 100%;\n    }\n    .footer-bottom p{\n        text-align: center;\n        margin: 10px 0;\n    }\n    .main-content.hotdocs .col-md-4.text-right{\n        text-align: center;\n    }\n    .rightPanel{\n        width: 480px;\n    }\n    .formHeadingRow2{\n        display: none;\n    }\n    .threeColField2 {\n        width: 100%;\n    }\n    .threeColField2 .form-control::-webkit-input-placeholder{\n        color: #777;\n        font-size: 11px;\n    }\n    .threeColField2 .form-control:-ms-input-placeholder{\n        color: #777;\n        font-size: 11px;\n    }\n    .threeColField2 .form-control::-ms-input-placeholder{\n        color: #777;\n        font-size: 11px;\n    }\n    .threeColField2 .form-control::placeholder{\n        color: #777;\n        font-size: 11px;\n    }\n    .addRowBtn2 {\n        float: none;\n        width: 40px;\n        margin: 10px auto 0;\n        display: block;\n    }\n    .threeColField2:nth-child(4n) {\n        width: 40px;\n        float: none;\n        margin: 0 auto;\n    }\n    .formRow2{\n        border-bottom:1px solid #e2e2e2;\n        padding: 10px 0 20px;\n    }\n}\n\n@media screen and (min-width: 768px) and (max-width: 991px){\n    .sidebar h1 {\n        font-size: 28px;\n    }\n    .common-button {\n        font-size: 14px;\n    }\n    .btn-dashboard {\n        padding: 10px 0 10px 30px;\n    }\n    .tell_us_about_left {\n        width: 100%;\n    }\n    .single_right {\n        width: 85%;\n        float: left;\n        margin-left: 14px;\n        margin-bottom: 14px;\n    }\n    .woman_img {\n        left: 0;\n        position: relative;\n        top: 0;\n        margin: 0;\n    }\n    .main-content h2 {\n        font-size: 32px;\n        margin: 0 0 20px;\n    }\n    .main-content .email-box {\n        width: 235px;\n        padding: 20px 10px;\n    }\n    .main-content.hotdocs h2 {\n        text-align: center;\n    }\n    .pdf_viewer_container {\n        margin-top: 70px;\n    }\n}\n\n@media screen and (min-width: 481px) and (max-width: 767px){\n    .main-content .email-box {\n        width: 270px;\n        padding: 20px 10px;\n    }\n}\n\n@media screen and (max-width: 767px){\n    .logo {\n        position: relative;\n    }\n    .common-button {\n        margin-top: 0;\n        width: 100%;\n        margin-bottom: 20px;\n    }\n    .logo a{\n        display: block;\n    }\n    .logo img {\n        margin: auto;\n        display: block;\n    }\n    .tell_us_about_left {\n        width: 100%;\n    }\n    .woman_img {\n        position: static;\n        top: inherit;\n        left: inherit;\n        margin-top: inherit;\n        width: 100%;\n        display: inline-block;\n        text-align: center;\n    }\n    .tell_us_text {\n        width: 100%;\n        text-align: center;\n    }\n    .single_right {\n        width: 100%;\n        float: left;\n        margin-bottom: 15px;\n    }\n    .inherit_properties {\n        text-align: center;\n    }\n    .main-content.hotdocs h2 {\n        margin: 20px 0;\n        text-align: center;\n    }\n    .rightPanel{\n        width: 100%;\n    }\n}\n\n@media screen  and (max-width: 480px){\n    .main-content .email-box {\n        width: 100%;\n    }\n    .logo img{\n        width: 100%;\n    }\n    .formHeadingRow{\n        display: none;\n    }\n    .form-group .threeColField label{\n        font-size: 14px;\n    }\n    .threeColField{\n        width: 100%;\n    }\n    .threeColField .form-control{\n        font-size: 14px;\n    }\n    .threeColField .form-control::-webkit-input-placeholder{\n        color: #999;\n    }\n    .threeColField .form-control:-ms-input-placeholder{\n        color: #999;\n    }\n    .threeColField .form-control::-ms-input-placeholder{\n        color: #999;\n    }\n    .threeColField .form-control::placeholder{\n        color: #999;\n    }\n    .threeColField:nth-child(3n) {\n        width: 40px;\n        float: none;\n        margin: 0 auto;\n    }\n    .formRow{\n        border-bottom:1px solid #e2e2e2;\n        padding: 10px 0 20px;\n    }\n    .addRowBtn {\n        float: none;\n        width: 40px;\n        margin: 0 auto;\n    }\n}"

/***/ }),

/***/ "./src/app/user/user-dashboard/your-estate-distributed/your-estate-distributed.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"rightPanel\">\n  <div class=\"main-content tellusaboutyou\">\n    <h2>How should The Rest of Your Estate Distributed?</h2>\n    <form [formGroup]=\"estateDistributedForm\" novalidate (ngSubmit)=\"onSubmit(estateDistributedForm)\">\n      <div class=\"form-group\">\n        <ul class=\"radio_ul6 gifts-list\">\n          <li>\n            <label class=\"radio_custom property_to_be_distributed\" [ngClass]=\"{'active': estateDistributedForm.value.disrtibuteType == '1'}\">\n              <input type=\"radio\" formControlName=\"disrtibuteType\" value=\"1\" (change)=\"addRemoveValidation()\">\n              <span class=\"custom_img5\"><img src=\"../../../../assets/images/single2.png\" alt=\"Single\"></span>\n              <span class=\"human_status3\">To A Single <br> Beneficiary</span>\n            </label>\n          </li>\n          <li>\n            <label class=\"radio_custom property_to_be_distributed\" [ngClass]=\"{'active': estateDistributedForm.value.disrtibuteType == '2'}\">\n              <input type=\"radio\" formControlName=\"disrtibuteType\" value=\"2\" (change)=\"addRemoveValidation()\">\n              <span class=\"custom_img5\"><img src=\"../../../../assets/images/multiple.png\" alt=\"Multiple\"></span>\n              <span class=\"human_status3\">To Multiple  <br> Beneficiaries </span>\n            </label>\n          </li>\n          <li>\n            <label class=\"radio_custom property_to_be_distributed\" [ngClass]=\"{'active': estateDistributedForm.value.disrtibuteType == '3'}\">\n              <input type=\"radio\" formControlName=\"disrtibuteType\" value=\"3\" (change)=\"addRemoveValidation()\">\n              <span class=\"custom_img5\"><img src=\"../../../../assets/images/law.png\" alt=\"Heirs At Law\"></span>\n              <span class=\"human_status3\">To My Heirs <br>  At Law </span>\n            </label>\n          </li>\n          <li>\n            <label class=\"radio_custom property_to_be_distributed\" [ngClass]=\"{'active': estateDistributedForm.value.disrtibuteType == '4'}\">\n              <input type=\"radio\" formControlName=\"disrtibuteType\" value=\"4\" (change)=\"addRemoveValidation()\">\n              <span class=\"custom_img5\"><img src=\"../../../../assets/images/otherway-icon.png\" alt=\"Otherway\"></span>\n              <span class=\"human_status3\">Some Other <br>  Way</span>\n            </label>\n          </li>\n        </ul>\n      </div>\n        <div *ngIf=\"estateDistributedForm.value.singleBeneficiary == 'Yes'\">\n            <div formArrayName=\"toASingleBeneficiary\">\n                <div  *ngFor=\"let item of estateDistributedForm['controls'].toASingleBeneficiary['controls']; let i=index\"  [formGroupName]=\"i\">\n            <div class=\"form-group\">\n                <label>What is your Beneficiary's First name? </label>\n                <input type=\"text\" class=\"form-control\" formControlName=\"firstName\">\n                <span *ngIf=\"!estateDistributedForm.get('toASingleBeneficiary.0.firstName').valid && estateDistributedForm.get('toASingleBeneficiary.0.firstName').touched\" class=\"help-block\">\n              <span *ngIf=\"estateDistributedForm.get('toASingleBeneficiary.0.firstName').errors['required']\" style=\"color: red\">This field is required!</span>\n            </span>\n\n            </div>\n            <div class=\"form-group\">\n                <label>What is your Beneficiary's full legal name?</label>\n                <input type=\"text\" class=\"form-control\" formControlName=\"fullName\">\n                <span *ngIf=\"!estateDistributedForm.get('toASingleBeneficiary.0.fullName').valid && estateDistributedForm.get('toASingleBeneficiary.0.fullName').touched\" class=\"help-block\">\n              <span *ngIf=\"estateDistributedForm.get('toASingleBeneficiary.0.fullName').errors['required']\" style=\"color: red\">This field is required!</span>\n            </span>\n\n            </div>\n            <div class=\"form-group \">\n                <label>What is their relationship to you?</label>\n                <select formControlName=\"relationship\" class=\"form-control\" (change)=\"addRemoveValidationToOtherRelationship()\">\n                    <option value=\"\">Select Relationship</option>\n                    <option value=\"Wife\">Wife</option>\n                    <option value=\"Husband\">Husband</option>\n                    <option value=\"Mother\">Mother</option>\n                    <option value=\"Father\">Father</option>\n                    <option value=\"Son\">Son</option>\n                    <option value=\"Daughter\">Daughter</option>\n                    <option value=\"Sister\">Sister</option>\n                    <option value=\"Brother\">Brother</option>\n                    <option value=\"Aunt\">Aunt</option>\n                    <option value=\"Uncle\">Uncle</option>\n                    <option value=\"Cousin\">Cousin</option>\n                    <option value=\"Friend\">Friend</option>\n                    <option value=\"Other\">Other</option>\n                </select>\n                <span *ngIf=\"!estateDistributedForm.get('toASingleBeneficiary.0.relationship').valid && estateDistributedForm.get('toASingleBeneficiary.0.relationship').touched\" class=\"help-block\">\n              <span *ngIf=\"estateDistributedForm.get('toASingleBeneficiary.0.relationship').errors['required']\" style=\"color: red\">This field is required!</span>\n            </span>\n            </div>\n             <div class=\"form-group\" *ngIf=\"estateDistributedForm.get('toASingleBeneficiary.0.relationship').value == 'Other'\">\n                   <input type=\"text\" formControlName=\"otherRelationship\" class=\"form-control\">\n                 <span *ngIf=\"!estateDistributedForm.get('toASingleBeneficiary.0.otherRelationship').valid && estateDistributedForm.get('toASingleBeneficiary.0.otherRelationship').touched\" class=\"help-block\">\n              <span *ngIf=\"estateDistributedForm.get('toASingleBeneficiary.0.otherRelationship').errors['required']\" style=\"color: red\">This field is required!</span>\n            </span>\n             </div>\n            <div class=\"form-group\">\n                <label>What is your beneficiary's gender?</label>\n                <ul class=\"radio_ul6\">\n                    <li>\n                        <label class=\"radio_custom\" [ngClass]=\"{'active': estateDistributedForm.get('toASingleBeneficiary.0.gender').value == 'M'}\">\n                            <input type=\"radio\" formControlName=\"gender\" value=\"M\">\n                            <span class=\"human_status\">Male</span>\n                        </label>\n                    </li>\n                    <li>\n                        <label class=\"radio_custom\" [ngClass]=\"{'active': estateDistributedForm.get('toASingleBeneficiary.0.gender').value == 'F'}\">\n                            <input type=\"radio\" formControlName=\"gender\" value=\"F\">\n                            <span class=\"human_status\">Female</span>\n                        </label>\n                    </li>\n                </ul>\n                <span *ngIf=\"!estateDistributedForm.get('toASingleBeneficiary.0.gender').valid && estateDistributedForm.get('toASingleBeneficiary.0.gender').touched\" class=\"help-block\">\n              <span *ngIf=\"estateDistributedForm.get('toASingleBeneficiary.0.gender').errors['required']\" style=\"color: red\">This field is required!</span>\n            </span>\n            </div>\n            <div class=\"form-group\">\n                <label>What happens if your beneficiary passes before you? </label>\n                <ul class=\"radio_ul6 gifts-list\">\n                    <li>\n                        <label class=\"radio_custom property_to_be_distributed\" [ngClass]=\"{'active': estateDistributedForm.get('toASingleBeneficiary.0.ifPassesbeforeyou').value == '1'}\">\n                            <input type=\"radio\" formControlName=\"ifPassesbeforeyou\" value=\"1\" (change)=\"addRemoveValidationToSomeotherway()\">\n                            <span class=\"custom_img5\"><img src=\"../../../../assets/images/multiple.png\" alt=\"Multiple\"></span>\n                            <span class=\"human_status3\">Distribute To My Beneficiary's Issue</span>\n                        </label>\n                    </li>\n                    <li>\n                        <label class=\"radio_custom property_to_be_distributed\" [ngClass]=\"{'active': estateDistributedForm.get('toASingleBeneficiary.0.ifPassesbeforeyou').value == '2'}\">\n                            <input type=\"radio\" formControlName=\"ifPassesbeforeyou\" value=\"2\" (change)=\"addRemoveValidationToSomeotherway()\">\n                            <span class=\"custom_img5\"><img src=\"../../../../assets/images/law.png\" alt=\"Heirs At Law\"></span>\n                            <span class=\"human_status3\">Distribute The Rest To My Heirs At Law</span>\n                        </label>\n                    </li>\n                    <li>\n                        <label class=\"radio_custom property_to_be_distributed\" [ngClass]=\"{'active': estateDistributedForm.get('toASingleBeneficiary.0.ifPassesbeforeyou').value == '3'}\">\n                            <input type=\"radio\" formControlName=\"ifPassesbeforeyou\" value=\"3\" (change)=\"addRemoveValidationToSomeotherway()\">\n                            <span class=\"custom_img5\"><img src=\"../../../../assets/images/otherway-icon.png\" alt=\"Otherway\"></span>\n                            <span class=\"human_status3\">Some Other Way</span>\n                        </label>\n                    </li>\n                </ul>\n                <span *ngIf=\"!estateDistributedForm.get('toASingleBeneficiary.0.ifPassesbeforeyou').valid && estateDistributedForm.get('toASingleBeneficiary.0.ifPassesbeforeyou').touched\" class=\"help-block\">\n              <span *ngIf=\"estateDistributedForm.get('toASingleBeneficiary.0.ifPassesbeforeyou').errors['required']\" style=\"color: red\">This field is required!</span>\n            </span>\n\n            </div>\n            <div class=\"form-group\" *ngIf=\"estateDistributedForm.get('toASingleBeneficiary.0.ifPassesbeforeyou').value == '3'\">\n                <label> Otherwise, to be distributed to: </label>\n\n                <textarea formControlName=\"someotherway\" cols=\"60\" rows=\"8\" placeholder=\"Type...\" class=\"form-control\"></textarea>\n                <span\n                        *ngIf=\"!estateDistributedForm.get('toASingleBeneficiary.0.someotherway').valid && estateDistributedForm.get('toASingleBeneficiary.0.someotherway').touched\"\n                        class=\"help-block\">\n              <span *ngIf=\"estateDistributedForm.get('toASingleBeneficiary.0.someotherway').errors['required']\" style=\"color: red\">This field is required!</span>\n            </span>\n            </div>\n            </div>\n            </div>\n        </div><!-- Single Beneficarry form Ends -->\n\n        <div *ngIf=\"estateDistributedForm.value.multiBeneficiary == 'Yes'\">\n            <div formArrayName=\"toMultipleBeneficiary\">\n            <div  *ngFor=\"let item of estateDistributedForm['controls'].toMultipleBeneficiary['controls']; let j=index\"  [formGroupName]=\"j\">\n            <div class=\"form-group\">\n                <label>Would you like to divide the rest of your estate into equal shares for each beneficiary? <br>\n                    (If you prefer, you can enter separate percentages)</label>\n                <ul class=\"radio_ul6\">\n                    <li>\n                        <label class=\"radio_custom\" [ngClass]=\"{'active': estateDistributedForm.get('toMultipleBeneficiary.0.isEstateIntoEqualShares').value == 'Yes'}\">\n                            <input type=\"radio\" formControlName=\"isEstateIntoEqualShares\" value=\"Yes\" (change)=\"addValidationIsEstateIntoEqualShares()\">\n                            <span class=\"human_status\">Yes</span>\n                        </label>\n                    </li>\n                    <li>\n                        <label class=\"radio_custom\" [ngClass]=\"{'active': estateDistributedForm.get('toMultipleBeneficiary.0.isEstateIntoEqualShares').value == 'No'}\">\n                            <input type=\"radio\" formControlName=\"isEstateIntoEqualShares\" value=\"No\" (change)=\"addValidationIsEstateIntoEqualShares()\">\n                            <span class=\"human_status\">No</span>\n                        </label>\n                    </li>\n                </ul>\n                <span *ngIf=\"!estateDistributedForm.get('toMultipleBeneficiary.0.isEstateIntoEqualShares').valid && estateDistributedForm.get('toMultipleBeneficiary.0.isEstateIntoEqualShares').touched\" class=\"help-block\">\n              <span *ngIf=\"estateDistributedForm.get('toMultipleBeneficiary.0.isEstateIntoEqualShares').errors['required']\" style=\"color: red\">This field is required!</span>\n            </span>\n            </div>\n                <div *ngIf=\"estateDistributedForm.get('toMultipleBeneficiary.0.isEstateIntoEqualShares').value == 'Yes'\" class=\"form-group\">\n                    \n                        <div formArrayName=\"beneficiaryYes\">\n                            <div class=\"row formHeadingRow\">\n                                <div class=\"threeColField\">\n                                    <label>Beneficiary's full legal name</label>\n                                </div>\n                                <div class=\"threeColField\">\n                                    <label>Beneficiary's relationship to you</label>\n                                </div>\n                            </div>\n                            <div class=\"row formRow\" *ngFor=\"let newItem of item.get('beneficiaryYes').controls; let m=index\"  [formGroupName]=\"m\">\n                                <div class=\"threeColField\"><input type=\"text\" class=\"form-control\" formControlName=\"beneficiaryFullName\" (change)=\"checkInput()\" placeholder=\"Beneficiary's full legal name\"></div>\n                                <div class=\"threeColField\"><input type=\"text\" class=\"form-control\" formControlName=\"beneficiaryRelationship\" placeholder=\"Beneficiary's relationship to you\"></div>\n                                <div class=\"threeColField\" *ngIf=\"m > 0\"><button type=\"button\" class=\"btn btn btn-danger delRow\" (click)=\"removeOption(item.controls.beneficiaryYes, m, 1)\"><i class=\"fa fa-trash\"></i></button></div>\n                            </div>\n                            <div class=\"addRowBtnRow\">\n                                <div class=\"addRowBtn\">\n                                    <button type=\"button\" class=\"btn btn btn-primary addRow\" (click)=\"addMoreOption(item.controls.beneficiaryYes, 1)\">+</button>\n                                </div>\n                            </div>\n                            <div class=\"clear\"></div> \n                            <!-- <table class=\"table tableForm\">\n                                <tr>\n                                    <td>Beneficiary's Full Legal Name</td>\n                                    <td>Beneficiary’s Relationship To You</td>\n                                    <td></td>\n                                </tr>\n                                <tr *ngFor=\"let newItem of item.get('beneficiaryYes').controls; let m=index\"  [formGroupName]=\"m\">\n                                    <td><input type=\"text\" class=\"form-control\" formControlName=\"beneficiaryFullName\" (change)=\"checkInput()\"></td>\n                                    <td><input type=\"text\" class=\"form-control\" formControlName=\"beneficiaryRelationship\"></td>\n                                    <td *ngIf=\"m > 0\"><button type=\"button\" class=\"btn btn btn-danger delRow\" (click)=\"removeOption(item.controls.beneficiaryYes, m, 1)\"><i class=\"fa fa-trash\"></i></button></td>\n                                </tr>\n                                <tr>\n                                    <td>\n                                        <button type=\"button\" class=\"btn btn btn-primary addRow\" (click)=\"addMoreOption(item.controls.beneficiaryYes, 1)\">+</button>\n                                    </td>\n                                </tr>\n                            </table> -->\n                        </div>\n                    \n                    <!-- <button type=\"button\" class=\"btn-xs btn-default\" (click)=\"addMoreOption(item.controls.beneficiaryYes, 1)\">+ Add</button> -->\n                </div>\n                <div *ngIf=\"estateDistributedForm.get('toMultipleBeneficiary.0.isEstateIntoEqualShares').value == 'No'\" class=\"form-group table-responsive\">\n                    <div formArrayName=\"beneficiaryNo\">\n\n                            <div class=\"row formHeadingRow2\">\n                                <div class=\"threeColField2\">\n                                    <label>Beneficiary's Full Legal Name</label>\n                                </div>\n                                <div class=\"threeColField2\">\n                                    <label>Beneficiary’s Relationship To You</label>\n                                </div>\n                                <div class=\"threeColField2\">\n                                    <label>Beneficiary's Percentage of the Estate?</label>\n                                </div>\n                            </div>\n                            <div class=\"row formRow2\" *ngFor=\"let newItems of item.get('beneficiaryNo').controls; let n=index\"  [formGroupName]=\"n\">\n                                <div class=\"threeColField2\"><input type=\"text\" value=\"\" class=\"form-control\" placeholder=\"Beneficiary's Full Legal Name\" formControlName=\"beneficiaryNoFullName\"></div>\n                                <div class=\"threeColField2\"><input type=\"text\" value=\"\" class=\"form-control\" placeholder=\"Beneficiary’s Relationship To You\" formControlName=\"beneficiaryNoRelationship\"></div>\n                                <div class=\"threeColField2\"><input type=\"text\" value=\"\" class=\"form-control\" placeholder=\"Beneficiary's Percentage of the Estate?\" formControlName=\"beneficiaryNoPercentageToEstate\" (keypress)=\"checkOnlyNumbers($event)\" (change)=\"checkInput()\"></div>\n                                <div class=\"threeColField2\" *ngIf=\"n > 0\"><button type=\"button\" class=\"btn btn btn-danger delRow\" (click)=\"removeOption(item.controls.beneficiaryNo, n, 2)\"><i class=\"fa fa-trash\"></i></button></div>\n                            </div>\n                            \n                            <div class=\"addRowBtnRow\">\n                                <div class=\"addRowBtn2\">\n                                    <button type=\"button\" class=\"btn btn btn-primary addRow\" (click)=\"addMoreOption(item.controls.beneficiaryNo, 2)\">+</button>\n                                </div>\n                            </div>\n\n                    <!-- <table class=\"table\">\n                        <tr>\n                            <td>Beneficiary's Full Legal Name</td>\n                            <td>Beneficiary’s Relationship To You</td>\n                            <td>Beneficiary's Percentage of the Estate?</td>\n                            <td></td>\n                        </tr>\n                        <tr *ngFor=\"let newItems of item.get('beneficiaryNo').controls; let n=index\"  [formGroupName]=\"n\">\n                            <td><input type=\"text\" class=\"form-control\" formControlName=\"beneficiaryNoFullName\"></td>\n                            <td><input type=\"text\" class=\"form-control\" formControlName=\"beneficiaryNoRelationship\"></td>\n                            <td><input type=\"text\" class=\"form-control\" formControlName=\"beneficiaryNoPercentageToEstate\" (keypress)=\"checkOnlyNumbers($event)\" (change)=\"checkInput()\"></td>\n                            <td *ngIf=\"n > 0\"><button class=\"btn-md btn-danger\" (click)=\"removeOption(item.controls.beneficiaryNo, n, 2)\">X</button></td>\n                        </tr>\n                    </table> -->\n                        <span *ngIf=\"showErrorMessage\" class=\"help-block\">\n                            <span style=\"color: red\">Percentage Value Must Be 100%. </span>\n                        </span>\n                    </div>\n                    <!-- <button type=\"button\" class=\"btn-xs btn-default\" (click)=\"addMoreOption(item.controls.beneficiaryNo, 2)\">+ Add</button> -->\n                </div>\n                <div class=\"form-group\">\n                    <label>Should a decreased beneficiary's share goes to his or her kids?</label>\n                    <ul class=\"radio_ul6\">\n                        <li>\n                            <label class=\"radio_custom\" [ngClass]=\"{'active': estateDistributedForm.get('toMultipleBeneficiary.0.deceasedBeneficiaryShareToKids').value == 'Yes'}\">\n                                <input type=\"radio\" formControlName=\"deceasedBeneficiaryShareToKids\" value=\"Yes\">\n                                <span class=\"human_status\">Yes</span>\n                            </label>\n                        </li>\n                        <li>\n                            <label class=\"radio_custom\" [ngClass]=\"{'active': estateDistributedForm.get('toMultipleBeneficiary.0.deceasedBeneficiaryShareToKids').value == 'No'}\">\n                                <input type=\"radio\" formControlName=\"deceasedBeneficiaryShareToKids\" value=\"No\">\n                                <span class=\"human_status\">No</span>\n                            </label>\n                        </li>\n                    </ul>\n                    <span *ngIf=\"!estateDistributedForm.get('toMultipleBeneficiary.0.deceasedBeneficiaryShareToKids').valid && estateDistributedForm.get('toMultipleBeneficiary.0.deceasedBeneficiaryShareToKids').touched\" class=\"help-block\">\n              <span *ngIf=\"estateDistributedForm.get('toMultipleBeneficiary.0.deceasedBeneficiaryShareToKids').errors['required']\" style=\"color: red\">This field is required!</span>\n                    </span>\n                </div>\n                <div class=\"form-group\"  *ngIf=\"estateDistributedForm.get('toMultipleBeneficiary.0.isEstateIntoEqualShares').value == 'No'\">\n                    <label>If the initial allocation of shares among beneficiaries is unequal, should a deceased beneficiarie's share be allocated to the other beneficiaries' shares in the same ratio as the initial division?</label>\n                    <ul class=\"radio_ul6\">\n                        <li>\n                            <label class=\"radio_custom\" [ngClass]=\"{'active': estateDistributedForm.get('toMultipleBeneficiary.0.deceasedBeneficiarieShare').value == 'Yes'}\">\n                                <input type=\"radio\" formControlName=\"deceasedBeneficiarieShare\" value=\"Yes\">\n                                <span class=\"human_status\">Yes</span>\n                            </label>\n                        </li>\n                        <li>\n                            <label class=\"radio_custom\" [ngClass]=\"{'active': estateDistributedForm.get('toMultipleBeneficiary.0.deceasedBeneficiarieShare').value == 'No'}\">\n                                <input type=\"radio\" formControlName=\"deceasedBeneficiarieShare\" value=\"No\">\n                                <span class=\"human_status\">No</span>\n                            </label>\n                        </li>\n                    </ul>\n                    <span *ngIf=\"!estateDistributedForm.get('toMultipleBeneficiary.0.deceasedBeneficiarieShare').valid && estateDistributedForm.get('toMultipleBeneficiary.0.deceasedBeneficiarieShare').touched\" class=\"help-block\">\n                        <span *ngIf=\"estateDistributedForm.get('toMultipleBeneficiary.0.deceasedBeneficiarieShare').errors['required']\" style=\"color: red\">This field is required!</span>\n                    </span>\n                </div>\n                <div class=\"form-group\">\n                    <label>Would you like for any minor beneficiary's share to be held in trust until they are an adult?</label>\n                    <ul class=\"radio_ul6\">\n                        <li>\n                            <label class=\"radio_custom\" [ngClass]=\"{'active': estateDistributedForm.get('toMultipleBeneficiary.0.minorBeneficiaryShareToBeHeldInTrust').value == 'Yes'}\">\n                                <input type=\"radio\" formControlName=\"minorBeneficiaryShareToBeHeldInTrust\" value=\"Yes\" (change)=\"addValidationToMinorBeneficiaryShareToBeHeldInTrust()\">\n                                <span class=\"human_status\">Yes</span>\n                            </label>\n                        </li>\n                        <li>\n                            <label class=\"radio_custom\" [ngClass]=\"{'active': estateDistributedForm.get('toMultipleBeneficiary.0.minorBeneficiaryShareToBeHeldInTrust').value == 'No'}\">\n                                <input type=\"radio\" formControlName=\"minorBeneficiaryShareToBeHeldInTrust\" value=\"No\" (change)=\"addValidationToMinorBeneficiaryShareToBeHeldInTrust()\">\n                                <span class=\"human_status\">No</span>\n                            </label>\n                        </li>\n                    </ul>\n                    <span *ngIf=\"!estateDistributedForm.get('toMultipleBeneficiary.0.minorBeneficiaryShareToBeHeldInTrust').valid && estateDistributedForm.get('toMultipleBeneficiary.0.minorBeneficiaryShareToBeHeldInTrust').touched\" class=\"help-block\">\n                        <span *ngIf=\"estateDistributedForm.get('toMultipleBeneficiary.0.minorBeneficiaryShareToBeHeldInTrust').errors['required']\" style=\"color: red\">This field is required!</span>\n                    </span>\n                </div>\n                <div *ngIf=\"estateDistributedForm.get('toMultipleBeneficiary.0.minorBeneficiaryShareToBeHeldInTrust').value == 'Yes'\">\n                <div class=\"form-group\">\n                    <label>At what age would you like a minor's share distributed to them?</label>\n                    <ul class=\"radio_ul6\">\n                        <li>\n                            <label class=\"radio_custom\" [ngClass]=\"{'active': estateDistributedForm.get('toMultipleBeneficiary.0.whatAgeMinorShareDistributed').value == '18'}\">\n                                <input type=\"radio\" formControlName=\"whatAgeMinorShareDistributed\" value=\"18\">\n                                <span class=\"human_status\">At Age 18</span>\n                            </label>\n                        </li>\n                        <li>\n                            <label class=\"radio_custom\" [ngClass]=\"{'active': estateDistributedForm.get('toMultipleBeneficiary.0.whatAgeMinorShareDistributed').value == '21'}\">\n                                <input type=\"radio\" formControlName=\"whatAgeMinorShareDistributed\" value=\"21\">\n                                <span class=\"human_status\">At Age 21</span>\n                            </label>\n                        </li>\n                        <li>\n                            <label class=\"radio_custom\" [ngClass]=\"{'active': estateDistributedForm.get('toMultipleBeneficiary.0.whatAgeMinorShareDistributed').value == '25'}\">\n                                <input type=\"radio\" formControlName=\"whatAgeMinorShareDistributed\" value=\"25\">\n                                <span class=\"human_status\">At Age 25</span>\n                            </label>\n                        </li>\n                    </ul>\n                    <span *ngIf=\"!estateDistributedForm.get('toMultipleBeneficiary.0.whatAgeMinorShareDistributed').valid && estateDistributedForm.get('toMultipleBeneficiary.0.whatAgeMinorShareDistributed').touched\" class=\"help-block\">\n                        <span *ngIf=\"estateDistributedForm.get('toMultipleBeneficiary.0.whatAgeMinorShareDistributed').errors['required']\" style=\"color: red\">This field is required!</span>\n                    </span>\n                </div>\n                <div class=\"form-group\">\n                    <label>Would you like the minor‘s parents to be the trustee of the account?</label>\n                    <ul class=\"radio_ul6\">\n                        <li>\n                            <label class=\"radio_custom\" [ngClass]=\"{'active': estateDistributedForm.get('toMultipleBeneficiary.0.minorParentsTrustee').value == 'Yes'}\">\n                                <input type=\"radio\" formControlName=\"minorParentsTrustee\" value=\"Yes\" (change)=\"addValidationToMinorParentsTrustee()\">\n                                <span class=\"human_status\">Yes</span>\n                            </label>\n                        </li>\n                        <li>\n                            <label class=\"radio_custom\" [ngClass]=\"{'active': estateDistributedForm.get('toMultipleBeneficiary.0.minorParentsTrustee').value == 'No'}\">\n                                <input type=\"radio\" formControlName=\"minorParentsTrustee\" value=\"No\" (change)=\"addValidationToMinorParentsTrustee()\">\n                                <span class=\"human_status\">No</span>\n                            </label>\n                        </li>\n                    </ul>\n                    <span *ngIf=\"!estateDistributedForm.get('toMultipleBeneficiary.0.minorParentsTrustee').valid && estateDistributedForm.get('toMultipleBeneficiary.0.minorParentsTrustee').touched\" class=\"help-block\">\n                            <span *ngIf=\"estateDistributedForm.get('toMultipleBeneficiary.0.minorParentsTrustee').errors['required']\" style=\"color: red\">This field is required!</span>\n                    </span>\n                </div>\n                <div class=\"form-group\" *ngIf=\"estateDistributedForm.get('toMultipleBeneficiary.0.minorParentsTrustee').value == 'Yes'\"><!-- based on the minorParentsTrustee it will show -->\n                    <label> Who would you like to serve as trustee of the account?</label>\n                    <input type=\"text\" formControlName=\"whoServeAsTrusteeAccount\" class=\"form-control\">\n                    <span *ngIf=\"!estateDistributedForm.get('toMultipleBeneficiary.0.whoServeAsTrusteeAccount').valid && estateDistributedForm.get('toMultipleBeneficiary.0.whoServeAsTrusteeAccount').touched\" class=\"help-block\">\n                        <span *ngIf=\"estateDistributedForm.get('toMultipleBeneficiary.0.whoServeAsTrusteeAccount').errors['required']\" style=\"color: red\">This field is required!</span>\n                    </span>\n                </div>\n                </div>\n            </div>\n            </div>\n        </div><!-- Multiple Beneficarry form Ends -->\n        <div class=\"form-group\" *ngIf=\"estateDistributedForm.value.someOtherWay == 'Yes'\">\n            <div formArrayName=\"toSomeOtherWay\">\n                <div  *ngFor=\"let item of estateDistributedForm['controls'].toSomeOtherWay['controls']; let k=index\"  [formGroupName]=\"k\">\n            <label> Otherwise, to be distributed to: </label>\n            <textarea formControlName=\"someOtherWayText\" cols=\"60\" rows=\"8\" placeholder=\"Type...\" class=\"form-control\"></textarea>\n                </div>\n            </div>\n            <span *ngIf=\"!estateDistributedForm.get('toSomeOtherWay.0.someOtherWayText').valid && estateDistributedForm.get('toSomeOtherWay.0.someOtherWayText').touched\" class=\"help-block\">\n                <span *ngIf=\"estateDistributedForm.get('toSomeOtherWay.0.someOtherWayText').errors['required']\" style=\"color: red\">This field is required!</span>\n            </span>\n        </div><!-- some Other wat form Ends -->\n      <div class=\"form-footer\">\n        <button class=\"btn common-button btn-grey pull-left\" routerLink=\"/dashboard/your-specific-gifts\">Go Back</button>\n        <button class=\"btn common-button btn-complete\" type=\"submit\" *ngIf=\"inputCheck\" [disabled]=\"!estateDistributedForm.valid\">Continue</button>\n      </div>\n    </form>\n  </div>\n</div>\n"

/***/ }),

/***/ "./src/app/user/user-dashboard/your-estate-distributed/your-estate-distributed.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return YourEstateDistributedComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_forms__ = __webpack_require__("./node_modules/@angular/forms/esm5/forms.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__user_auth_user_auth_service__ = __webpack_require__("./src/app/user/user-auth/user-auth.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__user_service__ = __webpack_require__("./src/app/user/user.service.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};





var YourEstateDistributedComponent = /** @class */ (function () {
    function YourEstateDistributedComponent(authService, userService, router, fb) {
        this.authService = authService;
        this.userService = userService;
        this.router = router;
        this.fb = fb;
        this.editFlag = false;
        this.createForm();
    }
    YourEstateDistributedComponent.prototype.ngOnInit = function () {
        this.getUserData();
        this.inputCheck = true;
        this.showErrorMessage = false;
    };
    /**
     *function to create the form
     */
    YourEstateDistributedComponent.prototype.createForm = function () {
        this.estateDistributedForm = this.fb.group({
            disrtibuteType: ['', __WEBPACK_IMPORTED_MODULE_2__angular_forms__["Validators"].required],
            toBeDistributedTo: [''],
            singleBeneficiary: ['No'],
            multiBeneficiary: ['No'],
            someOtherWay: ['No'],
            toASingleBeneficiary: this.fb.array([
                this.fb.group({
                    firstName: [''],
                    relationship: [''],
                    fullName: [''],
                    gender: [''],
                    ifPassesbeforeyou: [''],
                    someotherway: [''],
                    otherRelationship: [''],
                })
            ]),
            toMultipleBeneficiary: this.fb.array([
                this.fb.group({
                    beneficiaryYes: this.fb.array([
                        this.fb.group({
                            beneficiaryFullName: [''],
                            beneficiaryRelationship: [''],
                        })
                    ]),
                    beneficiaryNo: this.fb.array([
                        this.fb.group({
                            beneficiaryNoFullName: [''],
                            beneficiaryNoRelationship: [''],
                            beneficiaryNoPercentageToEstate: [''],
                        })
                    ]),
                    isEstateIntoEqualShares: [''],
                    deceasedBeneficiaryShareToKids: [''],
                    deceasedBeneficiarieShare: [''],
                    minorBeneficiaryShareToBeHeldInTrust: [''],
                    whatAgeMinorShareDistributed: [''],
                    minorParentsTrustee: [''],
                    whoServeAsTrusteeAccount: [''],
                })
            ]),
            toSomeOtherWay: this.fb.array([
                this.fb.group({
                    someOtherWayText: [''],
                })
            ]),
        });
    };
    /**
     *function get user data
     */
    YourEstateDistributedComponent.prototype.getUserData = function () {
        var _this = this;
        this.userService.getUserDetails(this.authService.getUser()['id']).subscribe(function (response) {
            _this.fullUserInfo = response.data[9].data;
            _this.estateDistributedForm.controls['disrtibuteType'].setValue(_this.fullUserInfo.type);
            if (_this.fullUserInfo.type === '1') {
                // set value to the singleBeneficiary Form
                _this.estateDistributedForm.patchValue({
                    singleBeneficiary: 'Yes',
                    multiBeneficiary: 'No',
                    someOtherWay: 'No'
                });
                var estactInfo = JSON.parse(_this.fullUserInfo.totalInfo);
                var toASingleBeneficiaryFGs = estactInfo.map(function (gr) { return _this.fb.group(gr); });
                var toASingleBeneficiaryFormArray = _this.fb.array(toASingleBeneficiaryFGs);
                _this.estateDistributedForm.setControl('toASingleBeneficiary', toASingleBeneficiaryFormArray);
            }
            if (_this.fullUserInfo.type === '2') {
                // set value to the multiBeneficiary Form
                _this.estateDistributedForm.patchValue({
                    singleBeneficiary: 'No',
                    multiBeneficiary: 'Yes',
                    someOtherWay: 'No',
                });
                var estactInfo = JSON.parse(_this.fullUserInfo.totalInfo);
                _this.editFlag = false;
                _this.columnFormArray = _this.estateDistributedForm.get('toMultipleBeneficiary.0.beneficiaryYes');
                _this.beneficiaryNoFormArray = _this.estateDistributedForm.get('toMultipleBeneficiary.0.beneficiaryNo');
                if (estactInfo[0].isEstateIntoEqualShares === 'Yes' && estactInfo[0].beneficiaryYes.length > 0) {
                    _this.clearFormArray(true, _this.columnFormArray);
                }
                if (estactInfo[0].isEstateIntoEqualShares === 'No' && estactInfo[0].beneficiaryNo.length > 0) {
                    _this.clearBeneficiaryNoFormArray(true, _this.beneficiaryNoFormArray);
                }
                _this.setValues(true, estactInfo);
            }
            if (_this.fullUserInfo.type === '4') {
                // set value to the someOtherWay Form
                _this.estateDistributedForm.patchValue({
                    singleBeneficiary: 'No',
                    multiBeneficiary: 'No',
                    someOtherWay: 'Yes'
                });
                var estactInfo = JSON.parse(_this.fullUserInfo.totalInfo);
                var toSomeOtherWayFGs = estactInfo.map(function (gr) { return _this.fb.group(gr); });
                var toSomeOtherWayFormArray = _this.fb.array(toSomeOtherWayFGs);
                _this.estateDistributedForm.setControl('toSomeOtherWay', toSomeOtherWayFormArray);
            }
        }, function (error) {
            console.log(error.error);
        });
    };
    YourEstateDistributedComponent.prototype.clearFormArray = function (editFlag, formArray) {
        while (formArray.length !== 0) {
            formArray.removeAt(0);
        }
    };
    YourEstateDistributedComponent.prototype.clearBeneficiaryNoFormArray = function (editFlag, formArray) {
        while (formArray.length !== 0) {
            formArray.removeAt(0);
        }
    };
    YourEstateDistributedComponent.prototype.setValues = function (editFlag, data) {
        if (data === void 0) { data = null; }
        this.estateDistributedForm.get('toMultipleBeneficiary.0.isEstateIntoEqualShares').setValue(data[0].isEstateIntoEqualShares);
        this.estateDistributedForm.get('toMultipleBeneficiary.0.deceasedBeneficiarieShare').setValue(data[0].deceasedBeneficiarieShare);
        this.estateDistributedForm.get('toMultipleBeneficiary.0.deceasedBeneficiaryShareToKids').setValue(data[0].deceasedBeneficiaryShareToKids);
        this.estateDistributedForm.get('toMultipleBeneficiary.0.minorBeneficiaryShareToBeHeldInTrust').setValue(data[0].minorBeneficiaryShareToBeHeldInTrust);
        this.estateDistributedForm.get('toMultipleBeneficiary.0.whatAgeMinorShareDistributed').setValue(data[0].whatAgeMinorShareDistributed);
        this.estateDistributedForm.get('toMultipleBeneficiary.0.minorParentsTrustee').setValue(data[0].minorParentsTrustee);
        this.estateDistributedForm.get('toMultipleBeneficiary.0.whoServeAsTrusteeAccount').setValue(data[0].whoServeAsTrusteeAccount);
        if (data[0].isEstateIntoEqualShares === 'Yes') {
            for (var i = 0; i < data[0].beneficiaryYes.length; i++) {
                this.columnFormArray.push(this.createItem(true, data[0].beneficiaryYes[i]));
            }
        }
        if (data[0].isEstateIntoEqualShares === 'No') {
            for (var i = 0; i < data[0].beneficiaryNo.length; i++) {
                this.beneficiaryNoFormArray.push(this.createBeneficiaryNoItem(true, data[0].beneficiaryNo[i]));
            }
        }
    };
    YourEstateDistributedComponent.prototype.createBeneficiaryNoItem = function (editFlag, beneficiaryNoFormArray) {
        if (editFlag === void 0) { editFlag = false; }
        if (beneficiaryNoFormArray === void 0) { beneficiaryNoFormArray = null; }
        return this.fb.group({
            // beneficiaryNo
            beneficiaryNoFullName: [beneficiaryNoFormArray.beneficiaryNoFullName],
            beneficiaryNoRelationship: [beneficiaryNoFormArray.beneficiaryNoRelationship],
            beneficiaryNoPercentageToEstate: [beneficiaryNoFormArray.beneficiaryNoPercentageToEstate],
        });
    };
    YourEstateDistributedComponent.prototype.createItem = function (editFlag, beneficiaryYesFormArray) {
        if (editFlag === void 0) { editFlag = false; }
        if (beneficiaryYesFormArray === void 0) { beneficiaryYesFormArray = null; }
        return this.fb.group({
            // beneficiaryYes
            beneficiaryFullName: [beneficiaryYesFormArray.beneficiaryFullName],
            beneficiaryRelationship: [beneficiaryYesFormArray.beneficiaryRelationship],
        });
    };
    /**
     *submit the form data
     * @param model
     */
    YourEstateDistributedComponent.prototype.onSubmit = function (model) {
        var _this = this;
        var modelData = model.value;
        modelData.step = 10;
        modelData.user_id = this.authService.getUser()['id'];
        var disrtibuteData = [];
        if (modelData.singleBeneficiary === 'Yes') {
            modelData.disrtibuteData = modelData.toASingleBeneficiary;
        }
        if (modelData.multiBeneficiary === 'Yes') {
            modelData.disrtibuteData = modelData.toMultipleBeneficiary;
        }
        if (modelData.someOtherWay === 'Yes') {
            modelData.disrtibuteData = modelData.toSomeOtherWay;
        }
        this.userService.editProfile(modelData).subscribe(function (response) {
            _this.router.navigate(['/dashboard/contingent-beneficiaries']);
        }, function (error) {
            for (var prop in error.error.message) {
                _this.errorMessage = error.error.message[prop];
                break;
            }
            setTimeout(function () {
                _this.errorMessage = '';
            }, 3000);
        });
    };
    /**
     *function to add remove  validation
     */
    YourEstateDistributedComponent.prototype.addRemoveValidation = function () {
        if (this.estateDistributedForm.value.disrtibuteType === '1') {
            this.estateDistributedForm.patchValue({
                singleBeneficiary: 'Yes',
                multiBeneficiary: 'No',
                someOtherWay: 'No'
            });
            this.addValidationToASingleBeneficiaryForm();
            this.removeValidationToSomeOtherWay();
            this.removeValidationtoMultipleBeneficiary();
        }
        if (this.estateDistributedForm.value.disrtibuteType === '2') {
            this.estateDistributedForm.patchValue({
                multiBeneficiary: 'Yes',
                singleBeneficiary: 'No',
                someOtherWay: 'No'
            });
            this.addValidationtoMultipleBeneficiary();
            this.removeValidationToASingleBeneficiaryForm();
            this.removeValidationToSomeOtherWay();
        }
        if (this.estateDistributedForm.value.disrtibuteType === '3') {
            this.estateDistributedForm.patchValue({
                multiBeneficiary: 'No',
                singleBeneficiary: 'No',
                someOtherWay: 'No'
            });
            this.removeValidationToASingleBeneficiaryForm();
            this.removeValidationToSomeOtherWay();
            this.removeValidationtoMultipleBeneficiary();
        }
        if (this.estateDistributedForm.value.disrtibuteType === '4') {
            this.estateDistributedForm.patchValue({
                multiBeneficiary: 'No',
                singleBeneficiary: 'No',
                someOtherWay: 'Yes'
            });
            this.addValidationToSomeOtherWay();
            this.removeValidationToASingleBeneficiaryForm();
            this.removeValidationtoMultipleBeneficiary();
        }
    };
    /**
     *add more textbox
     */
    YourEstateDistributedComponent.prototype.addMoreOption = function (control, type) {
        if (type === 1) {
            control.push(this.fb.group({
                beneficiaryFullName: ['', __WEBPACK_IMPORTED_MODULE_2__angular_forms__["Validators"].required],
                beneficiaryRelationship: ['', __WEBPACK_IMPORTED_MODULE_2__angular_forms__["Validators"].required],
            }));
        }
        if (type === 2) {
            control.push(this.fb.group({
                beneficiaryNoFullName: ['', __WEBPACK_IMPORTED_MODULE_2__angular_forms__["Validators"].required],
                beneficiaryNoRelationship: ['', __WEBPACK_IMPORTED_MODULE_2__angular_forms__["Validators"].required],
                beneficiaryNoPercentageToEstate: ['', __WEBPACK_IMPORTED_MODULE_2__angular_forms__["Validators"].required],
            }));
        }
    };
    /**
     *remove the textbox
     */
    YourEstateDistributedComponent.prototype.removeOption = function (control, index) {
        control.removeAt(index);
        this.checkInput();
    };
    /**
     *Add validation to the  SingleBeneficiaryForm
     */
    YourEstateDistributedComponent.prototype.addValidationToASingleBeneficiaryForm = function () {
        this.estateDistributedForm.get("toASingleBeneficiary.0.firstName").setValidators([__WEBPACK_IMPORTED_MODULE_2__angular_forms__["Validators"].required]);
        this.estateDistributedForm.get("toASingleBeneficiary.0.firstName").updateValueAndValidity();
        this.estateDistributedForm.get("toASingleBeneficiary.0.fullName").setValidators([__WEBPACK_IMPORTED_MODULE_2__angular_forms__["Validators"].required]);
        this.estateDistributedForm.get("toASingleBeneficiary.0.fullName").updateValueAndValidity();
        this.estateDistributedForm.get("toASingleBeneficiary.0.relationship").setValidators([__WEBPACK_IMPORTED_MODULE_2__angular_forms__["Validators"].required]);
        this.estateDistributedForm.get("toASingleBeneficiary.0.relationship").updateValueAndValidity();
        this.estateDistributedForm.get("toASingleBeneficiary.0.gender").setValidators([__WEBPACK_IMPORTED_MODULE_2__angular_forms__["Validators"].required]);
        this.estateDistributedForm.get("toASingleBeneficiary.0.gender").updateValueAndValidity();
        this.estateDistributedForm.get("toASingleBeneficiary.0.ifPassesbeforeyou").setValidators([__WEBPACK_IMPORTED_MODULE_2__angular_forms__["Validators"].required]);
        this.estateDistributedForm.get("toASingleBeneficiary.0.ifPassesbeforeyou").updateValueAndValidity();
    };
    /**
     *Remove validation to the  SingleBeneficiaryForm
     */
    YourEstateDistributedComponent.prototype.removeValidationToASingleBeneficiaryForm = function () {
        this.estateDistributedForm.get("toASingleBeneficiary.0.firstName").setValidators([]);
        this.estateDistributedForm.get("toASingleBeneficiary.0.firstName").updateValueAndValidity();
        this.estateDistributedForm.get("toASingleBeneficiary.0.fullName").setValidators([]);
        this.estateDistributedForm.get("toASingleBeneficiary.0.fullName").updateValueAndValidity();
        this.estateDistributedForm.get("toASingleBeneficiary.0.relationship").setValidators([]);
        this.estateDistributedForm.get("toASingleBeneficiary.0.relationship").updateValueAndValidity();
        this.estateDistributedForm.get("toASingleBeneficiary.0.gender").setValidators([]);
        this.estateDistributedForm.get("toASingleBeneficiary.0.gender").updateValueAndValidity();
        this.estateDistributedForm.get("toASingleBeneficiary.0.ifPassesbeforeyou").setValidators([]);
        this.estateDistributedForm.get("toASingleBeneficiary.0.ifPassesbeforeyou").updateValueAndValidity();
        this.estateDistributedForm.get("toASingleBeneficiary.0.otherRelationship").setValidators([]);
        this.estateDistributedForm.get("toASingleBeneficiary.0.otherRelationship").updateValueAndValidity();
        this.estateDistributedForm.get("toASingleBeneficiary.0.someotherway").setValidators([]);
        this.estateDistributedForm.get("toASingleBeneficiary.0.someotherway").updateValueAndValidity();
    };
    /**
     *add validation to the  someOtherWayText
     */
    YourEstateDistributedComponent.prototype.addValidationToSomeOtherWay = function () {
        this.estateDistributedForm.get("toSomeOtherWay.0.someOtherWayText").setValidators([__WEBPACK_IMPORTED_MODULE_2__angular_forms__["Validators"].required]);
        this.estateDistributedForm.get("toSomeOtherWay.0.someOtherWayText").updateValueAndValidity();
    };
    /**
     *Remove validation to the  someOtherWayText
     */
    YourEstateDistributedComponent.prototype.removeValidationToSomeOtherWay = function () {
        this.estateDistributedForm.get("toSomeOtherWay.0.someOtherWayText").setValidators([]);
        this.estateDistributedForm.get("toSomeOtherWay.0.someOtherWayText").updateValueAndValidity();
    };
    /**
     *add / Remove validation to the  someOtherWayText depending on the ifPassesbeforeyou value
     */
    YourEstateDistributedComponent.prototype.addRemoveValidationToSomeotherway = function () {
        if (this.estateDistributedForm.get('toASingleBeneficiary.0.ifPassesbeforeyou').value === '3') {
            this.estateDistributedForm.get("toASingleBeneficiary.0.someotherway").setValidators([__WEBPACK_IMPORTED_MODULE_2__angular_forms__["Validators"].required]);
            this.estateDistributedForm.get("toASingleBeneficiary.0.someotherway").updateValueAndValidity();
        }
        else {
            this.estateDistributedForm.get("toASingleBeneficiary.0.someotherway").setValidators([]);
            this.estateDistributedForm.get("toASingleBeneficiary.0.someotherway").updateValueAndValidity();
        }
    };
    /**
     * add Validationto to MultipleBeneficiary form
     */
    YourEstateDistributedComponent.prototype.addValidationtoMultipleBeneficiary = function () {
        this.estateDistributedForm.get("toMultipleBeneficiary.0.isEstateIntoEqualShares").setValidators([__WEBPACK_IMPORTED_MODULE_2__angular_forms__["Validators"].required]);
        this.estateDistributedForm.get("toMultipleBeneficiary.0.isEstateIntoEqualShares").updateValueAndValidity();
        this.estateDistributedForm.get("toMultipleBeneficiary.0.deceasedBeneficiaryShareToKids").setValidators([__WEBPACK_IMPORTED_MODULE_2__angular_forms__["Validators"].required]);
        this.estateDistributedForm.get("toMultipleBeneficiary.0.deceasedBeneficiaryShareToKids").updateValueAndValidity();
        this.estateDistributedForm.get("toMultipleBeneficiary.0.minorBeneficiaryShareToBeHeldInTrust").setValidators([__WEBPACK_IMPORTED_MODULE_2__angular_forms__["Validators"].required]);
        this.estateDistributedForm.get("toMultipleBeneficiary.0.minorBeneficiaryShareToBeHeldInTrust").updateValueAndValidity();
    };
    /**
     * remove Validationto to MultipleBeneficiary form
     */
    YourEstateDistributedComponent.prototype.removeValidationtoMultipleBeneficiary = function () {
        this.estateDistributedForm.get("toMultipleBeneficiary.0.isEstateIntoEqualShares").setValidators([]);
        this.estateDistributedForm.get("toMultipleBeneficiary.0.isEstateIntoEqualShares").updateValueAndValidity();
        this.estateDistributedForm.get("toMultipleBeneficiary.0.deceasedBeneficiaryShareToKids").setValidators([]);
        this.estateDistributedForm.get("toMultipleBeneficiary.0.deceasedBeneficiaryShareToKids").updateValueAndValidity();
        this.estateDistributedForm.get("toMultipleBeneficiary.0.minorBeneficiaryShareToBeHeldInTrust").setValidators([]);
        this.estateDistributedForm.get("toMultipleBeneficiary.0.minorBeneficiaryShareToBeHeldInTrust").updateValueAndValidity();
        this.estateDistributedForm.get("toMultipleBeneficiary.0.whatAgeMinorShareDistributed").setValidators([]);
        this.estateDistributedForm.get("toMultipleBeneficiary.0.whatAgeMinorShareDistributed").updateValueAndValidity();
        this.estateDistributedForm.get("toMultipleBeneficiary.0.minorParentsTrustee").setValidators([]);
        this.estateDistributedForm.get("toMultipleBeneficiary.0.minorParentsTrustee").updateValueAndValidity();
        this.estateDistributedForm.get("toMultipleBeneficiary.0.whoServeAsTrusteeAccount").setValidators([]);
        this.estateDistributedForm.get("toMultipleBeneficiary.0.whoServeAsTrusteeAccount").updateValueAndValidity();
        this.estateDistributedForm.get("toMultipleBeneficiary.0.deceasedBeneficiarieShare").setValidators([]);
        this.estateDistributedForm.get("toMultipleBeneficiary.0.deceasedBeneficiarieShare").updateValueAndValidity();
    };
    /**
     * add / remove Validation To Minor Beneficiary Share To BeHeld In Trust depending on the  minorBeneficiaryShareToBeHeldInTrust value
     */
    YourEstateDistributedComponent.prototype.addValidationToMinorBeneficiaryShareToBeHeldInTrust = function () {
        if (this.estateDistributedForm.get('toMultipleBeneficiary.0.minorBeneficiaryShareToBeHeldInTrust').value === 'Yes') {
            this.estateDistributedForm.get("toMultipleBeneficiary.0.whatAgeMinorShareDistributed").setValidators([__WEBPACK_IMPORTED_MODULE_2__angular_forms__["Validators"].required]);
            this.estateDistributedForm.get("toMultipleBeneficiary.0.whatAgeMinorShareDistributed").updateValueAndValidity();
            this.estateDistributedForm.get("toMultipleBeneficiary.0.minorParentsTrustee").setValidators([__WEBPACK_IMPORTED_MODULE_2__angular_forms__["Validators"].required]);
            this.estateDistributedForm.get("toMultipleBeneficiary.0.minorParentsTrustee").updateValueAndValidity();
        }
        else {
            this.estateDistributedForm.get("toMultipleBeneficiary.0.whatAgeMinorShareDistributed").setValidators([]);
            this.estateDistributedForm.get("toMultipleBeneficiary.0.whatAgeMinorShareDistributed").updateValueAndValidity();
            this.estateDistributedForm.get("toMultipleBeneficiary.0.minorParentsTrustee").setValidators([]);
            this.estateDistributedForm.get("toMultipleBeneficiary.0.minorParentsTrustee").updateValueAndValidity();
        }
    };
    /**
     * add / remove Validation add Validation To Minor Parents Trustee depending on the  minorParentsTrustee value
     */
    YourEstateDistributedComponent.prototype.addValidationToMinorParentsTrustee = function () {
        if (this.estateDistributedForm.get('toMultipleBeneficiary.0.minorParentsTrustee').value === 'Yes') {
            this.estateDistributedForm.get("toMultipleBeneficiary.0.whoServeAsTrusteeAccount").setValidators([__WEBPACK_IMPORTED_MODULE_2__angular_forms__["Validators"].required]);
            this.estateDistributedForm.get("toMultipleBeneficiary.0.whoServeAsTrusteeAccount").updateValueAndValidity();
        }
        else {
            this.estateDistributedForm.get("toMultipleBeneficiary.0.whoServeAsTrusteeAccount").setValidators([]);
            this.estateDistributedForm.get("toMultipleBeneficiary.0.whoServeAsTrusteeAccount").updateValueAndValidity();
        }
    };
    /**
     * add / remove Validation Is Estate Into Equal Shares depending on the isEstateIntoEqualShares value
     */
    YourEstateDistributedComponent.prototype.addValidationIsEstateIntoEqualShares = function () {
        if (this.estateDistributedForm.get('toMultipleBeneficiary.0.isEstateIntoEqualShares').value === 'No') {
            this.estateDistributedForm.get("toMultipleBeneficiary.0.deceasedBeneficiarieShare").setValidators([__WEBPACK_IMPORTED_MODULE_2__angular_forms__["Validators"].required]);
            this.estateDistributedForm.get("toMultipleBeneficiary.0.deceasedBeneficiarieShare").updateValueAndValidity();
        }
        else {
            this.estateDistributedForm.get("toMultipleBeneficiary.0.deceasedBeneficiarieShare").setValidators([]);
            this.estateDistributedForm.get("toMultipleBeneficiary.0.deceasedBeneficiarieShare").updateValueAndValidity();
        }
    };
    /**
     *Add/Remove validation to the Other Relationship textbox
     */
    YourEstateDistributedComponent.prototype.addRemoveValidationToOtherRelationship = function () {
        if (this.estateDistributedForm.get('toASingleBeneficiary.0.relationship').value === 'Other') {
            this.estateDistributedForm.get("toASingleBeneficiary.0.otherRelationship").setValidators([__WEBPACK_IMPORTED_MODULE_2__angular_forms__["Validators"].required]);
            this.estateDistributedForm.get("toASingleBeneficiary.0.otherRelationship").updateValueAndValidity();
        }
        else {
            this.estateDistributedForm.get("toASingleBeneficiary.0.otherRelationship").setValidators([]);
            this.estateDistributedForm.get("toASingleBeneficiary.0.otherRelationship").updateValueAndValidity();
        }
    };
    /**
     * function to allow only number and period
     * @param e
     * @returns {boolean}
     */
    YourEstateDistributedComponent.prototype.checkOnlyNumbers = function (e) {
        var input;
        if (e.metaKey || e.ctrlKey) {
            return true;
        }
        if (e.which === 32) {
            return false;
        }
        if (e.which === 0) {
            return true;
        }
        if (e.which === 46) {
            return true;
        }
        if (e.which < 33) {
            return true;
        }
        input = String.fromCharCode(e.which);
        return !!/[\d\s]/.test(input);
    };
    /**
     *function to check validation of percentage
     */
    YourEstateDistributedComponent.prototype.checkInput = function () {
        var checkValue = this.estateDistributedForm.get('toMultipleBeneficiary.0.beneficiaryNo').value;
        var percentage = 0;
        for (var i = 0; i < checkValue.length; i++) {
            percentage += parseFloat(checkValue[i].beneficiaryNoPercentageToEstate);
        }
        // console.log(percentage);
        if (percentage > 100) {
            this.showErrorMessage = true;
            this.inputCheck = false;
        }
        else {
            this.showErrorMessage = false;
            this.inputCheck = true;
        }
    };
    YourEstateDistributedComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            selector: 'app-your-estate-distributed',
            template: __webpack_require__("./src/app/user/user-dashboard/your-estate-distributed/your-estate-distributed.component.html"),
            styles: [__webpack_require__("./src/app/user/user-dashboard/your-estate-distributed/your-estate-distributed.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_3__user_auth_user_auth_service__["a" /* UserAuthService */],
            __WEBPACK_IMPORTED_MODULE_4__user_service__["a" /* UserService */],
            __WEBPACK_IMPORTED_MODULE_1__angular_router__["d" /* Router */],
            __WEBPACK_IMPORTED_MODULE_2__angular_forms__["FormBuilder"]])
    ], YourEstateDistributedComponent);
    return YourEstateDistributedComponent;
}());



/***/ }),

/***/ "./src/app/user/user-dashboard/your-estate-distributed/your-estate-distributed.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "YourEstateDistributedModule", function() { return YourEstateDistributedModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_common__ = __webpack_require__("./node_modules/@angular/common/esm5/common.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__your_estate_distributed_routing_module__ = __webpack_require__("./src/app/user/user-dashboard/your-estate-distributed/your-estate-distributed-routing.module.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__your_estate_distributed_component__ = __webpack_require__("./src/app/user/user-dashboard/your-estate-distributed/your-estate-distributed.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__angular_forms__ = __webpack_require__("./node_modules/@angular/forms/esm5/forms.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};





var YourEstateDistributedModule = /** @class */ (function () {
    function YourEstateDistributedModule() {
    }
    YourEstateDistributedModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["NgModule"])({
            imports: [
                __WEBPACK_IMPORTED_MODULE_1__angular_common__["b" /* CommonModule */],
                __WEBPACK_IMPORTED_MODULE_2__your_estate_distributed_routing_module__["a" /* YourEstateDistributedRoutingModule */], __WEBPACK_IMPORTED_MODULE_4__angular_forms__["ReactiveFormsModule"]
            ],
            declarations: [__WEBPACK_IMPORTED_MODULE_3__your_estate_distributed_component__["a" /* YourEstateDistributedComponent */]]
        })
    ], YourEstateDistributedModule);
    return YourEstateDistributedModule;
}());



/***/ })

});
//# sourceMappingURL=your-estate-distributed.module.chunk.js.map