webpackJsonp(["plan-for-medical-emergency.module"],{

/***/ "./src/app/user/user-dashboard/plan-for-medical-emergency/plan-for-medical-emergency-routing.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return PlanForMedicalEmergencyRoutingModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__plan_for_medical_emergency_component__ = __webpack_require__("./src/app/user/user-dashboard/plan-for-medical-emergency/plan-for-medical-emergency.component.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};



var routes = [{ path: '', component: __WEBPACK_IMPORTED_MODULE_2__plan_for_medical_emergency_component__["a" /* PlanForMedicalEmergencyComponent */] }];
var PlanForMedicalEmergencyRoutingModule = /** @class */ (function () {
    function PlanForMedicalEmergencyRoutingModule() {
    }
    PlanForMedicalEmergencyRoutingModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["NgModule"])({
            imports: [__WEBPACK_IMPORTED_MODULE_1__angular_router__["e" /* RouterModule */].forChild(routes)],
            exports: [__WEBPACK_IMPORTED_MODULE_1__angular_router__["e" /* RouterModule */]]
        })
    ], PlanForMedicalEmergencyRoutingModule);
    return PlanForMedicalEmergencyRoutingModule;
}());



/***/ }),

/***/ "./src/app/user/user-dashboard/plan-for-medical-emergency/plan-for-medical-emergency.component.css":
/***/ (function(module, exports) {

module.exports = ".main-content {\n    background: #fff;\n    border-radius: 10px;\n    border: 1px solid #ddd;\n    box-shadow: 0 1px 1px 0 #ddd;\n    -webkit-box-shadow: 0 1px 1px 0 #ddd;\n    -moz-box-shadow: 0 1px 1px 0 #ddd;\n    display: inline-block;\n    width: 100%;\n    padding: 30px;\n}\n.main-content h2{\n    color: #2479B8;\n    font-size: 36px;\n    margin: 0;\n    text-transform: capitalize;\n}\n.main-content p{\n    font-size: 18px;\n    margin: 0;\n    line-height: 24px;\n}\n.main-content.loading-screen p{\n    margin: 20px 0;\n}\n.main-content .valid .form-control{\n    border-color: #42A82D;\n    color: #42A82D;\n}\n.main-content .valid i{\n    position: absolute;\n    top: 44px;\n    right: 44px;\n    background: #42A82D;\n    color: #fff;\n    height: 22px;\n    width: 22px;\n    text-align: center;\n    line-height: 22px;\n    border-radius: 50%;\n}\n.main-content.loading-screen p{\n    margin: 20px 0;\n}\n.main-content.tellusaboutyou{\n    padding: 30px 0 0;\n    width: 855px;\n}\n.main-content.tellusaboutyou h2{\n    padding: 0 30px;\n}\n.main-content .form-group{\n    padding: 0 30px;\n    margin: 25px 0;\n    position: relative;\n}\n.main-content .form-group label{\n    display: block;\n    font-weight: normal;\n    font-size: 18px;\n    text-align: left;\n}\n.main-content .form-group label.radio_custom{\n    float: left;\n}\n.main-content .form-control{\n    font-size: 16px;\n    height: 40px;\n    border-radius: 6px;\n    margin-top: 10px;\n    border: 1px solid #BFBFBF;\n    font-style: italic;\n}\n.main-content select.form-control{\n    -webkit-appearance: none;\n    -moz-appearance: none;\n}\n.main-content .valid .form-control{\n    border-color: #42A82D;\n    color: #42A82D;\n}\n.main-content .valid i{\n    position: absolute;\n    top: 46px;\n    right: 39px;\n    background: #42A82D;\n    color: #fff;\n    height: 22px;\n    width: 22px;\n    text-align: center;\n    line-height: 22px;\n    border-radius: 50%;\n}\n.radio_ul6{\n    text-align: left;\n}\n.radio_ul6 .valid i{\n    top: 39px;\n    right: 28px;\n}\n.main-content .smallField i{\n    top: 19px;\n    right: 23px;\n}\n.radio_ul6 li, .first_page_radio li{\n    width: auto;\n    margin-right: 5px;\n    margin-left: 0;\n    display: inline-block;\n    float: none;\n    vertical-align: top;\n}\n.radio_custom{\n    height: 105px;\n    width: 105px;\n    position: relative;\n    border: 1px solid #BFBFBF;\n    font-family: 'OpenSans';\n    box-shadow:0 1px 1px 1px #ddd;\n    -webkit-box-shadow:0 1px 1px 1px #ddd;\n    -moz-box-shadow:0 1px 1px 1px #ddd;\n    min-height: 100%;\n}\n.percentage-estate .radio_custom{\n    height: 120px;\n    width: 120px;\n}\n.radio_custom .human_status{\n    position: absolute;\n    -webkit-transform: translate(-50%,-50%);\n            transform: translate(-50%,-50%);\n    left: 50%;\n    top: 50%;\n    font-size: 16px;\n}\n.radio_custom.active {\n    border-color: #42A82D;\n    background: #42A82D;\n    color: #fff;\n}\n.radio_custom.marital_status{\n    height: 130px;\n    width: 130px;\n    cursor: pointer;\n}\n.radio_custom.marital_status.active{\n    background: none;\n}\n.radio_custom.marital_status.active .human_status2{\n    color: #42A82D;\n}\n.main-content .valid.email-box {\n    border-color: #42A82D;\n}\n.main-content .email-box {\n    display: inline-block;\n    border: 1px solid #ddd;\n    background: #F2F2F2;\n    height: 105px;\n    width: 350px;\n    padding: 20px;\n    position: relative;\n}\n.main-content .valid .form-control {\n    border-color: #42A82D;\n    color: #42A82D;\n}\n.main-content .form-control {\n    font-size: 16px;\n    height: 40px;\n    border-radius: 6px;\n    margin-top: 10px;\n    border: 1px solid #BFBFBF;\n}\n.gifts-list .radio_custom {\n    width: 120px;\n    height: 120px;\n}\n.gifts-list .radio_custom.active{\n    background: #fff;\n}\n.gifts-list .radio_custom.active .human_status3{\n    color: #42A82D;\n}\n.radio_custom .human_status{\n    position: absolute;\n    -webkit-transform: translate(-50%,-50%);\n            transform: translate(-50%,-50%);\n    left: 50%;\n    top: 50%;\n    font-size: 16px;\n}\n.radio_ul6 li, .first_page_radio li{\n    width: auto;\n    margin-right: 5px;\n    margin-left: 0;\n    display: inline-block;\n    float: none;\n    vertical-align: top;\n}\n.first_page_radio{\n    text-align: left;\n}\n.custom_img2 {\n    padding-bottom: 2px;\n    display:block;\n    padding-top: 10px;\n    text-align: center;\n}\n.human_status2{\n    font-family: 'OpenSans';\n    position: absolute;\n    -webkit-transform: translate(-50%,0);\n            transform: translate(-50%,0);\n    left: 50%;\n    top: auto;\n    bottom: 10px;\n    line-height: 20px;\n    text-align: center;\n}\n.radio_custom.marital_status.active .human_status2{\n    color: #42A82D;\n}\n.form-footer{\n    display: inline-block;\n    width: 100%;\n    background: #f4f3f2;\n    vertical-align: top;\n    padding: 40px 25px;\n    -webkit-box-shadow: inset 0px 2px 10px 0 #e0e0e0;\n            box-shadow: inset 0px 2px 10px 0 #e0e0e0;\n}\n.inprogress img{\n    -webkit-filter: grayscale(100%);\n    filter: grayscale(100%);\n}\n.btn-complete{\n    background: url('data:image/png;base64,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') no-repeat center center !important;\n    background-size: 100% 100%;\n    padding: 10px 0 10px 30px;\n    width: 130px;\n    margin: 0;\n    float: right;\n}\n.inprogress .btn-complete{\n    -webkit-filter: grayscale(100%);\n    filter: grayscale(100%);\n}\nselect.form-control{\n    margin: 0;\n}\n@media screen and (max-width:1199px){\n    .main-content.tellusaboutyou{\n        width: 700px;\n    }\n}\n@media screen and (max-width:991px){\n    .main-content.tellusaboutyou{\n        width: 480px;\n    }\n    .main-content .email-box {\n        width: calc(100% - 105px);\n    }\n    .radio_ul6 li{\n        width: 100%;\n    }\n    .rightPanel{\n        padding: 0;\n    }\n}\n@media screen and (max-width:767px){\n    .main-content.tellusaboutyou{\n        width: 100%;\n    }\n}\n@media screen and (max-width:480px){\n    .main-content .email-box {\n        width: 100%;\n        margin: 0 0 14px;\n    }\n}\n\n"

/***/ }),

/***/ "./src/app/user/user-dashboard/plan-for-medical-emergency/plan-for-medical-emergency.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"col-md-9 col-sm-12 rightPanel\">\n    <div class=\"main-content tellusaboutyou\">\n        <h2>Name your first choice for healthcare agent</h2>\n        <form #medicalEmergencyForm=\"ngForm\">\n            <div class=\"form-group\" [ngClass]=\"{'valid': firstLegalName.valid}\">\n                <label for=\"firstLegalName\">First Legal Name:</label>\n                <input id=\"firstLegalName\" class=\"form-control\" type=\"text\" [(ngModel)]=\"medicalAgent.firstLegalName\" name=\"firstLegalName\" ngModel #firstLegalName=\"ngModel\" required>\n                <i class=\"fa fa-check\" *ngIf=\"firstLegalName.valid\"></i>\n            </div>\n            <div class=\"form-group\" [ngClass]=\"{'valid': lastLegalName.valid}\">\n                <label for=\"lastLegalName\">Last Legal Name:</label>\n                <input id=\"lastLegalName\" class=\"form-control\" type=\"text\" [(ngModel)]=\"medicalAgent.lastLegalName\" name=\"lastLegalName\" ngModel #lastLegalName=\"ngModel\" required>\n                <i class=\"fa fa-check\" *ngIf=\"lastLegalName.valid\"></i>\n            </div>\n\n            <div class=\"form-group\" [ngClass]=\"{'valid': relation.valid}\">\n                <label for=\"relation\">Their Relationship To You:</label>\n                <select id=\"relation\" class=\"form-control\" [(ngModel)]=\"medicalAgent.relation\" name=\"relation\" ngModel #relation=\"ngModel\" required>\n                    <!--<option value=\"\">Select Option</option>-->\n                    <option *ngFor=\"let relation of relations\" value=\"{{relation}}\">{{relation}}</option>\n                </select>\n                <i class=\"fa fa-check\" *ngIf=\"relation.valid\"></i>\n            </div>\n\n            <div class=\"form-group\">\n                <div class=\"\" [ngClass]=\"{'valid': address.valid}\">\n                    <label>Their Address: </label>\n                    <input id=\"address\" class=\"form-control\" type=\"text\" [(ngModel)]=\"medicalAgent.address\" name=\"address\" ngModel #address=\"ngModel\" required>\n                    <i class=\"fa fa-check\" *ngIf=\"address.valid\"></i>\n                </div>\n                \n                <div class=\"row\">\n                    <div class=\"col-md-6 smallField\" [ngClass]=\"{'valid': city.valid}\">\n                        <input id=\"city\" class=\"form-control\" type=\"text\" [(ngModel)]=\"medicalAgent.city\" name=\"city\" ngModel #city=\"ngModel\" required>\n                        <i class=\"fa fa-check\" *ngIf=\"city.valid\"></i>\n                    </div>\n                    <div class=\"col-md-6 smallField\" [ngClass]=\"{'valid': state.valid}\">\n                        <select id=\"state\" class=\"form-control\"\n                                [(ngModel)]=\"medicalAgent.state\"\n                                name=\"state\" ngModel\n                                #state=\"ngModel\" required>\n                            <option value=\"\">State</option>\n                            <option value=\"Alabama\">Alabama</option>\n                            <option value=\"Alaska\">Alaska</option>\n                            <option value=\"Arizona\">Arizona</option>\n                            <option value=\"Arkansas\">Arkansas</option>\n                            <option value=\"California\">California</option>\n                            <option value=\"Colorado\">Colorado</option>\n                            <option value=\"Connecticut\">Connecticut</option>\n                            <option value=\"Delaware\">Delaware</option>\n                            <option value=\"District Of Columbia\">District of Columbia</option>\n                            <option value=\"Florida\">Florida</option>\n                            <option value=\"Georgia\">Georgia</option>\n                            <option value=\"Hawaii\">Hawaii</option>\n                            <option value=\"Idaho\">Idaho</option>\n                            <option value=\"Illinois\">Illinois</option>\n                            <option value=\"Indiana\">Indiana</option>\n                            <option value=\"Iowa\">Iowa</option>\n                            <option value=\"Kansas\">Kansas</option>\n                            <option value=\"Kentucky\">Kentucky</option>\n                            <option value=\"Louisiana\">Louisiana</option>\n                            <option value=\"Maine\">Maine</option>\n                            <option value=\"Maryland\">Maryland</option>\n                            <option value=\"Massachusetts\">Massachusetts</option>\n                            <option value=\"Michigan\">Michigan</option>\n                            <option value=\"Minnesota\">Minnesota</option>\n                            <option value=\"Mississippi\">Mississippi</option>\n                            <option value=\"Missouri\">Missouri</option>\n                            <option value=\"Montana\">Montana</option>\n                            <option value=\"Nebraska\">Nebraska</option>\n                            <option value=\"Nevada\">Nevada</option>\n                            <option value=\"New Hampshire\">New Hampshire</option>\n                            <option value=\"New Jersey\">New Jersey</option>\n                            <option value=\"New Mexico\">New Mexico</option>\n                            <option value=\"New York\">New York</option>\n                            <option value=\"North Carolina\">North Carolina</option>\n                            <option value=\"North Dakota\">North Dakota</option>\n                            <option value=\"Ohio\">Ohio</option>\n                            <option value=\"Oklahoma\">Oklahoma</option>\n                            <option value=\"Oregon\">Oregon</option>\n                            <option value=\"Pennsylvania\">Pennsylvania</option>\n                            <option value=\"Rhode Island\">Rhode Island</option>\n                            <option value=\"South Carolina\">South Carolina</option>\n                            <option value=\"South Dakota\">South Dakota</option>\n                            <option value=\"Tennessee\">Tennessee</option>\n                            <option value=\"Texas\">Texas</option>\n                            <option value=\"Utah\">Utah</option>\n                            <option value=\"Vermont\">Vermont</option>\n                            <option value=\"Virginia\">Virginia</option>\n                            <option value=\"Washington\">Washington</option>\n                            <option value=\"West Virginia\">West Virginia</option>\n                            <option value=\"Wisconsin\">Wisconsin</option>\n                            <option value=\"Wyoming\">Wyoming</option>\n                        </select>\n                        <i class=\"fa fa-check\" *ngIf=\"state.valid\"></i>\n                    </div>\n                </div>\n                <div class=\"row\">\n                    <div class=\"col-md-6 smallField\" [ngClass]=\"{'valid': zip.valid}\">\n                        <input id=\"zip\" class=\"form-control\" type=\"text\"\n                               [(ngModel)]=\"medicalAgent.zip\" name=\"zip\"\n                               ngModel #zip=\"ngModel\" pattern=\"^\\d{5}$\" required>\n                        <i class=\"fa fa-check\" *ngIf=\"zip.valid\"></i>\n                    </div>\n                    <div class=\"col-md-6 smallField\" [ngClass]=\"{'valid': country.valid}\">\n                        <input id=\"country\" class=\"form-control\" type=\"text\" [(ngModel)]=\"medicalAgent.country\" name=\"country\" ngModel #country=\"ngModel\" disabled required>\n                        <i class=\"fa fa-times\" *ngIf=\"country.invalid && country.touched\"></i>\n                    </div>\n                </div>\n            </div>\n\n            <div class=\"form-group\" [ngClass]=\"{'valid': phone.valid}\">\n                <label for=\"phone\">Their Phone Number?</label>\n                <input id=\"phone\" class=\"form-control\" type=\"text\"\n                       [(ngModel)]=\"medicalAgent.phone\" name=\"phone\" ngModel\n                       mask=\"(000)-000-0000\" pattern=\"^\\d{10}$\" placeholder=\"(xxx)-xxx-xxxx\"\n                       #phone=\"ngModel\" required>\n                <i class=\"fa fa-check\" *ngIf=\"phone.valid\"></i>\n            </div>\n\n\n            <div class=\"form-group\">\n                <label>Would you like to inform this person that you appointed them as your Healthcare Agent? </label>\n\n                <ul class=\"radio_ul6\">\n                    <li>\n                        <label class=\"radio_custom\" [ngClass]=\"{'active': toggleWillInform}\">\n                            <input type=\"radio\"\n                                   name=\"willInform\"\n                                   [(ngModel)]=\"medicalAgent.willInform\"\n                                   required\n                                   value=\"true\"\n                                   #willInform=\"ngModel\" ngModel\n                            (click)=\"changewillinform(true)\">\n                            <span class=\"human_status\">Yes</span>\n                        </label>\n                        <div class=\"email-box\" *ngIf=\"toggleWillInform\" [ngClass]=\"{'valid': emailOfAgent.valid}\">\n                            <input type=\"email\" name=\"emailOfAgent\" class=\"form-control\" \n                                   [(ngModel)]=\"medicalAgent.emailOfAgent\"\n                                   #emailOfAgent=\"ngModel\" ngModel\n                                   pattern=\"[a-z0-9._%+-]+@[a-z0-9.-]+\\.[a-z]{2,3}$\" required>\n                            <i class=\"fa fa-check\" *ngIf=\"emailOfAgent.valid\"></i>\n                        </div>\n                    </li>\n                    <li>\n                        <label class=\"radio_custom\" [ngClass]=\"{'active': !toggleWillInform}\">\n                            <input type=\"radio\"\n                                   name=\"willInform\"\n                                   [(ngModel)]=\"medicalAgent.willInform\"\n                                   required\n                                   value=\"false\"\n                                   #willInform=\"ngModel\" ngModel\n                                   (click)=\"changewillinform(false)\">\n                            <span class=\"human_status\">No</span>\n                        </label>\n                    </li>\n                </ul>\n            </div>\n\n\n            <div class=\"form-group\">\n                <label>Would you like to appoint backup Healthcare Agent? </label>\n                <ul class=\"radio_ul6\">\n                    <li>\n                        <label class=\"radio_custom\" [ngClass]=\"{'active': toggleBackupAgent}\">\n                            <input type=\"radio\"\n                                   name=\"anyBackupAgent\"\n                                   [ngModel]=\"medicalAgent.anyBackupAgent\"\n                                   required\n                                   value=\"true\"\n                                   #anyBackupAgent=\"ngModel\"\n                                   (click)=\"changeBackupAgentToggle(true)\">\n                            <span class=\"human_status\">Yes</span>\n                        </label>\n                    </li>\n                    <li>\n                        <label class=\"radio_custom\" [ngClass]=\"{'active': !toggleBackupAgent}\">\n                            <input type=\"radio\"\n                                   name=\"anyBackupAgent\"\n                                   [ngModel]=\"medicalAgent.anyBackupAgent\"\n                                   required\n                                   value=\"false\"\n                                   #anyBackupAgent=\"ngModel\"\n                                   (click)=\"changeBackupAgentToggle(false)\">\n                            <span class=\"human_status\">No</span>\n                        </label>\n                    </li>\n                </ul>\n            </div>\n\n            \n\n            <div *ngIf=\"toggleBackupAgent\">\n                <hr>\n                <h2>Name Your Backup Healthcare Agent</h2>\n\n                <div class=\"form-group\" [ngClass]=\"{'valid': backupfirstLegalName.valid}\">\n                    <label for=\"backupfirstLegalName\">First Legal Name:</label>\n                    <input id=\"backupfirstLegalName\" class=\"form-control\" type=\"text\" [(ngModel)]=\"medicalAgent.backupfirstLegalName\" name=\"backupfirstLegalName\" ngModel #backupfirstLegalName=\"ngModel\" required>\n                    <i class=\"fa fa-check\" *ngIf=\"backupfirstLegalName.valid\"></i>\n                </div>\n                <div class=\"form-group\" [ngClass]=\"{'valid': backuplastLegalName.valid}\">\n                    <label for=\"backuplastLegalName\">Last Legal Name:</label>\n                    <input id=\"backuplastLegalName\" class=\"form-control\" type=\"text\" [(ngModel)]=\"medicalAgent.backuplastLegalName\" name=\"backuplastLegalName\" ngModel #backuplastLegalName=\"ngModel\" required>\n                    <i class=\"fa fa-check\" *ngIf=\"backuplastLegalName.valid\"></i>\n                </div>\n\n                <div class=\"form-group\" [ngClass]=\"{'valid': backupRelation.valid}\">\n                    <label for=\"backupRelation\">Their Relationship To You:</label>\n                    <select id=\"backupRelation\" class=\"form-control\" [(ngModel)]=\"medicalAgent.backupRelation\" name=\"backupRelation\" ngModel #backupRelation=\"ngModel\" required>\n                        <!--<option value=\"\">Select Option</option>-->\n                        <option *ngFor=\"let relation of relations\" value=\"{{relation}}\">{{relation}}</option>\n                    </select>\n                    <i class=\"fa fa-check\" *ngIf=\"backupRelation.valid\"></i>\n                </div>\n\n                <div class=\"form-group\">\n                    <div class=\"\" [ngClass]=\"{'valid': backupAddress.valid}\">\n                        <label>Their Address: </label>\n                        <input id=\"backupAddress\" class=\"form-control\" type=\"text\"\n                            [(ngModel)]=\"medicalAgent.backupAddress\" name=\"backupAddress\"\n                            ngModel #backupAddress=\"ngModel\" required>\n                        <i class=\"fa fa-check\" *ngIf=\"backupAddress.valid\"></i>\n                    </div>\n                    \n                    <div class=\"row\">\n                        <div class=\"col-md-6 smallField\" [ngClass]=\"{'valid': backupCity.valid}\">\n                            <input id=\"backupCity\" class=\"form-control\" type=\"text\"\n                                   [(ngModel)]=\"medicalAgent.backupCity\" name=\"backupCity\"\n                                   ngModel #backupCity=\"ngModel\" required>\n                            <i class=\"fa fa-check\" *ngIf=\"backupCity.valid\"></i>\n                        </div>\n                        <div class=\"col-md-6 smallField\" [ngClass]=\"{'valid': backupState.valid}\">\n                            <select id=\"backupState\" class=\"form-control\"\n                                    [(ngModel)]=\"medicalAgent.backupState\"\n                                    name=\"backupState\" ngModel\n                                    #backupState=\"ngModel\" required>\n                                <option value=\"\">State</option>\n                                <option value=\"Alabama\">Alabama</option>\n                                <option value=\"Alaska\">Alaska</option>\n                                <option value=\"Arizona\">Arizona</option>\n                                <option value=\"Arkansas\">Arkansas</option>\n                                <option value=\"California\">California</option>\n                                <option value=\"Colorado\">Colorado</option>\n                                <option value=\"Connecticut\">Connecticut</option>\n                                <option value=\"Delaware\">Delaware</option>\n                                <option value=\"District Of Columbia\">District of Columbia</option>\n                                <option value=\"Florida\">Florida</option>\n                                <option value=\"Georgia\">Georgia</option>\n                                <option value=\"Hawaii\">Hawaii</option>\n                                <option value=\"Idaho\">Idaho</option>\n                                <option value=\"Illinois\">Illinois</option>\n                                <option value=\"Indiana\">Indiana</option>\n                                <option value=\"Iowa\">Iowa</option>\n                                <option value=\"Kansas\">Kansas</option>\n                                <option value=\"Kentucky\">Kentucky</option>\n                                <option value=\"Louisiana\">Louisiana</option>\n                                <option value=\"Maine\">Maine</option>\n                                <option value=\"Maryland\">Maryland</option>\n                                <option value=\"Massachusetts\">Massachusetts</option>\n                                <option value=\"Michigan\">Michigan</option>\n                                <option value=\"Minnesota\">Minnesota</option>\n                                <option value=\"Mississippi\">Mississippi</option>\n                                <option value=\"Missouri\">Missouri</option>\n                                <option value=\"Montana\">Montana</option>\n                                <option value=\"Nebraska\">Nebraska</option>\n                                <option value=\"Nevada\">Nevada</option>\n                                <option value=\"New Hampshire\">New Hampshire</option>\n                                <option value=\"New Jersey\">New Jersey</option>\n                                <option value=\"New Mexico\">New Mexico</option>\n                                <option value=\"New York\">New York</option>\n                                <option value=\"North Carolina\">North Carolina</option>\n                                <option value=\"North Dakota\">North Dakota</option>\n                                <option value=\"Ohio\">Ohio</option>\n                                <option value=\"Oklahoma\">Oklahoma</option>\n                                <option value=\"Oregon\">Oregon</option>\n                                <option value=\"Pennsylvania\">Pennsylvania</option>\n                                <option value=\"Rhode Island\">Rhode Island</option>\n                                <option value=\"South Carolina\">South Carolina</option>\n                                <option value=\"South Dakota\">South Dakota</option>\n                                <option value=\"Tennessee\">Tennessee</option>\n                                <option value=\"Texas\">Texas</option>\n                                <option value=\"Utah\">Utah</option>\n                                <option value=\"Vermont\">Vermont</option>\n                                <option value=\"Virginia\">Virginia</option>\n                                <option value=\"Washington\">Washington</option>\n                                <option value=\"West Virginia\">West Virginia</option>\n                                <option value=\"Wisconsin\">Wisconsin</option>\n                                <option value=\"Wyoming\">Wyoming</option>\n                            </select>\n                            <i class=\"fa fa-check\" *ngIf=\"backupState.valid\"></i>\n                        </div>\n                    </div>\n                    <div class=\"row\">\n                        <div class=\"col-md-6 smallField\" [ngClass]=\"{'valid': backupZip.valid}\">\n                            <input id=\"backupZip\" class=\"form-control\" type=\"text\"\n                                   [(ngModel)]=\"medicalAgent.backupZip\" name=\"backupZip\"\n                                   ngModel #backupZip=\"ngModel\" pattern=\"^\\d{5}$\" required>\n                            <i class=\"fa fa-check\" *ngIf=\"backupZip.valid\"></i>\n                        </div>\n                        <div class=\"col-md-6 smallField\" [ngClass]=\"{'valid': backupCountry.valid}\">\n                            <input id=\"backupCountry\" class=\"form-control\" type=\"text\"\n                                   [(ngModel)]=\"medicalAgent.backupCountry\"\n                                   name=\"backupCountry\" ngModel #backupCountry=\"ngModel\"\n                                   disabled required>\n                            <i class=\"fa fa-times\" *ngIf=\"backupCountry.invalid && backupCountry.touched\"></i>\n                        </div>\n                    </div>\n                </div>\n\n                <div class=\"form-group\" [ngClass]=\"{'valid': backupphone.valid}\">\n                    <label for=\"backupphone\">Their Phone Number?</label>\n                    <input id=\"backupphone\" class=\"form-control\" type=\"text\"\n                           [(ngModel)]=\"medicalAgent.backupphone\" name=\"backupphone\" ngModel\n                           mask=\"(000)-000-0000\" pattern=\"^\\d{10}$\" placeholder=\"(xxx)-xxx-xxxx\"\n                           #backupphone=\"ngModel\" required>\n                    <i class=\"fa fa-check\" *ngIf=\"backupphone.valid\"></i>\n                </div>\n\n                <div class=\"form-group\">\n                    <label>Would you like to inform this person that you appointed them as your Healthcare Agent? </label>\n\n                    <ul class=\"radio_ul6\">\n                        <li>\n                            <label class=\"radio_custom\" [ngClass]=\"{'active': toggleWillBackupInform}\">\n                                <input type=\"radio\"\n                                       name=\"willInformBackup\"\n                                       [(ngModel)]=\"medicalAgent.willInformBackup\"\n                                       required ngModel\n                                       value=\"true\"\n                                       #willInformBackup=\"ngModel\"\n                                       (click)=\"changewillBackupinform(true)\">\n                                <span class=\"human_status\">Yes</span>\n                            </label>\n                            <div class=\"email-box\" *ngIf=\"toggleWillBackupInform\" [ngClass]=\"{'valid': emailOfBackupAgent.valid}\">\n                                <input type=\"email\" name=\"emailOfBackupAgent\" class=\"form-control\"\n                                       [(ngModel)]=\"medicalAgent.emailOfBackupAgent\"\n                                       #emailOfBackupAgent=\"ngModel\" ngModel\n                                       pattern=\"[a-z0-9._%+-]+@[a-z0-9.-]+\\.[a-z]{2,3}$\" required>\n                                <i class=\"fa fa-check\" *ngIf=\"emailOfBackupAgent.valid\"></i>\n                            </div>\n                        </li>\n                        <li>\n                            <label class=\"radio_custom\" [ngClass]=\"{'active': !toggleWillBackupInform}\">\n                                <input type=\"radio\"\n                                       name=\"willInformBackup\"\n                                       [(ngModel)]=\"medicalAgent.willInformBackup\"\n                                       required ngModel\n                                       value=\"false\"\n                                       #willInformBackup=\"ngModel\"\n                                       (click)=\"changewillBackupinform(false)\">\n                                <span class=\"human_status\">No</span>\n                            </label>\n                        </li>\n                    </ul>\n                </div>\n            </div>\n            <div class=\"form-footer\">\n                <button type=\"submit\" class=\"btn common-button btn-complete\"\n                        (click)=\"formSubmit()\"\n                        [disabled]=\"!medicalEmergencyForm.form.valid\">Submit</button>\n            </div>\n        </form>\n    </div>\n</div>"

/***/ }),

/***/ "./src/app/user/user-dashboard/plan-for-medical-emergency/plan-for-medical-emergency.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return PlanForMedicalEmergencyComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__medical_emergency_service__ = __webpack_require__("./src/app/user/user-dashboard/plan-for-medical-emergency/medical-emergency.service.ts");
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



var PlanForMedicalEmergencyComponent = /** @class */ (function () {
    function PlanForMedicalEmergencyComponent(medicalEmergencyService, router) {
        this.medicalEmergencyService = medicalEmergencyService;
        this.router = router;
    }
    PlanForMedicalEmergencyComponent.prototype.ngOnInit = function () {
        this.toggleWillInform = false;
        this.toggleBackupAgent = false;
        this.toggleWillBackupInform = false;
        this.userId = JSON.parse(localStorage.getItem('loggedInUser')).user.id;
        this.token = JSON.parse(localStorage.getItem('loggedInUser')).token;
        this.medicalAgent = {
            id: 0,
            userId: this.userId,
            firstLegalName: '',
            lastLegalName: '',
            backupfirstLegalName: '',
            backuplastLegalName: '',
            relation: '',
            address: '',
            city: '',
            state: '',
            zip: '',
            country: 'United States',
            willInform: 'false',
            emailOfAgent: '',
            anyBackupAgent: 'false',
            backupRelation: '',
            backupAddress: '',
            backupCity: '',
            backupState: '',
            backupZip: '',
            backupphone: '',
            backupCountry: 'United States',
            willInformBackup: 'false',
            emailOfBackupAgent: '',
            phone: ''
        };
        if (this.userId) {
            this.errFlag = false;
            this.errString = '';
            this.getData();
        }
        else {
            this.errFlag = true;
            this.errString = 'We are unable to log you in. Please login to continue';
        }
        this.relations = [
            'Wife',
            'Husband',
            'Mother',
            'Father',
            'Son',
            'Daughter',
            'Sister',
            'Brother',
            'Aunt',
            'Uncle',
            'Cousin',
            'Friend',
            'Other'
        ];
    };
    PlanForMedicalEmergencyComponent.prototype.getData = function () {
        var _this = this;
        this.medicalEmergencyService.getmedicalEmergency(this.token, { user_id: this.userId }).subscribe(function (response) {
            _this.medicalAgent.id = response.data.healthFinance.id;
            _this.medicalAgent.userId = _this.userId;
            _this.medicalAgent.firstLegalName = response.data.healthFinance.firstLegalName;
            _this.medicalAgent.lastLegalName = response.data.healthFinance.lastLegalName;
            _this.medicalAgent.backupfirstLegalName = response.data.healthFinance.backupfirstLegalName;
            _this.medicalAgent.backuplastLegalName = response.data.healthFinance.backuplastLegalName;
            _this.medicalAgent.relation = response.data.healthFinance.relation;
            _this.medicalAgent.address = response.data.healthFinance.address;
            _this.medicalAgent.city = response.data.healthFinance.city;
            _this.medicalAgent.state = response.data.healthFinance.state;
            _this.medicalAgent.zip = response.data.healthFinance.zip;
            _this.medicalAgent.phone = response.data.healthFinance.phone;
            _this.medicalAgent.country = response.data.healthFinance.country === null ? 'United States' : response.data.healthFinance.country;
            _this.medicalAgent.willInform = response.data.healthFinance.willInform;
            _this.medicalAgent.emailOfAgent = response.data.healthFinance.emailOfAgent;
            _this.medicalAgent.anyBackupAgent = response.data.healthFinance.anyBackupAgent;
            _this.medicalAgent.backupRelation = response.data.healthFinance.backupRelation;
            _this.medicalAgent.backupAddress = response.data.healthFinance.backupAddress;
            _this.medicalAgent.backupCity = response.data.healthFinance.backupCity;
            _this.medicalAgent.backupState = response.data.healthFinance.backupState;
            _this.medicalAgent.backupZip = response.data.healthFinance.backupZip;
            _this.medicalAgent.backupCountry = response.data.healthFinance.backupCountry === null ? 'United States' : response.data.healthFinance.backupCountry;
            _this.medicalAgent.willInformBackup = response.data.healthFinance.willInformBackup;
            _this.medicalAgent.emailOfBackupAgent = response.data.healthFinance.emailOfBackupAgent;
            _this.medicalAgent.backupphone = response.data.healthFinance.backupphone;
            _this.toggleWillInform = JSON.parse(response.data.healthFinance.willInform);
            _this.toggleBackupAgent = JSON.parse(response.data.healthFinance.anyBackupAgent);
            _this.toggleWillBackupInform = JSON.parse(response.data.healthFinance.willInformBackup);
            // console.log(this.medicalAgent);
            // console.log(this.toggleWillInform);
        }, function (error) {
            // this.medicalAgent = {
            //     id: 0,
            //     userId: this.userId,
            //     fullLegalName: '',
            //     relation: '',
            //     address: '',
            //     city: '',
            //     state: '',
            //     zip: '',
            //     country: '',
            //     isInform: 0,
            //     emailOfAgent: '',
            //     isBackupAgent: 0,
            //     backupFullLegalName: '',
            //     backupRelation: '',
            //     backupAddress: '',
            //     backupCity: '',
            //     backupState: '',
            //     backupZip: '',
            //     backupCountry: '',
            //     isInformBackup: 0,
            //     emailOfBackupAgent: ''
            // };
        });
    };
    PlanForMedicalEmergencyComponent.prototype.changewillinform = function (status) {
        this.toggleWillInform = status;
        // console.log(this.toggleWillInform);
    };
    PlanForMedicalEmergencyComponent.prototype.changeBackupAgentToggle = function (status) {
        this.toggleBackupAgent = status;
    };
    PlanForMedicalEmergencyComponent.prototype.changewillBackupinform = function (status) {
        this.toggleWillBackupInform = status;
    };
    PlanForMedicalEmergencyComponent.prototype.formSubmit = function () {
        var _this = this;
        console.log(this.medicalAgent);
        // console.log(this.medicalAgent.emailOfAgent);
        var formBody = new FormData();
        formBody.append('userId', this.medicalAgent.userId);
        formBody.append('firstLegalName', this.medicalAgent.firstLegalName);
        formBody.append('lastLegalName', this.medicalAgent.lastLegalName);
        formBody.append('backupfirstLegalName', this.medicalAgent.backupfirstLegalName);
        formBody.append('backuplastLegalName', this.medicalAgent.backuplastLegalName);
        formBody.append('relation', this.medicalAgent.relation);
        formBody.append('address', this.medicalAgent.address);
        formBody.append('city', this.medicalAgent.city);
        formBody.append('state', this.medicalAgent.state);
        formBody.append('zip', this.medicalAgent.zip);
        formBody.append('phone', this.medicalAgent.phone);
        formBody.append('country', this.medicalAgent.country);
        formBody.append('willInform', this.toggleWillInform === true ? 'true' : 'false');
        formBody.append('emailOfAgent', this.medicalAgent.emailOfAgent);
        formBody.append('anyBackupAgent', this.toggleBackupAgent === true ? 'true' : 'false');
        formBody.append('backupRelation', this.medicalAgent.backupRelation);
        formBody.append('backupAddress', this.medicalAgent.backupAddress);
        formBody.append('backupCity', this.medicalAgent.backupCity);
        formBody.append('backupState', this.medicalAgent.backupState);
        formBody.append('backupZip', this.medicalAgent.backupZip === '' ? null : this.medicalAgent.backupZip);
        formBody.append('backupCountry', this.medicalAgent.backupCountry);
        formBody.append('willInformBackup', this.toggleWillBackupInform === true ? 'true' : 'false');
        formBody.append('emailOfBackupAgent', this.medicalAgent.emailOfBackupAgent);
        formBody.append('backupphone', this.medicalAgent.backupphone);
        this.medicalEmergencyService.updatemedicalEmergency(this.token, formBody).subscribe(function (response) {
            _this.router.navigate(['/dashboard']);
        }, function (error) {
            console.log(error.error);
        });
    };
    PlanForMedicalEmergencyComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            selector: 'app-plan-for-medical-emergency',
            template: __webpack_require__("./src/app/user/user-dashboard/plan-for-medical-emergency/plan-for-medical-emergency.component.html"),
            styles: [__webpack_require__("./src/app/user/user-dashboard/plan-for-medical-emergency/plan-for-medical-emergency.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__medical_emergency_service__["a" /* MedicalEmergencyService */],
            __WEBPACK_IMPORTED_MODULE_2__angular_router__["d" /* Router */]])
    ], PlanForMedicalEmergencyComponent);
    return PlanForMedicalEmergencyComponent;
}());



/***/ }),

/***/ "./src/app/user/user-dashboard/plan-for-medical-emergency/plan-for-medical-emergency.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "PlanForMedicalEmergencyModule", function() { return PlanForMedicalEmergencyModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_common__ = __webpack_require__("./node_modules/@angular/common/esm5/common.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__plan_for_medical_emergency_routing_module__ = __webpack_require__("./src/app/user/user-dashboard/plan-for-medical-emergency/plan-for-medical-emergency-routing.module.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__angular_forms__ = __webpack_require__("./node_modules/@angular/forms/esm5/forms.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__plan_for_medical_emergency_component__ = __webpack_require__("./src/app/user/user-dashboard/plan-for-medical-emergency/plan-for-medical-emergency.component.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};





var PlanForMedicalEmergencyModule = /** @class */ (function () {
    function PlanForMedicalEmergencyModule() {
    }
    PlanForMedicalEmergencyModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["NgModule"])({
            imports: [
                __WEBPACK_IMPORTED_MODULE_1__angular_common__["b" /* CommonModule */],
                __WEBPACK_IMPORTED_MODULE_2__plan_for_medical_emergency_routing_module__["a" /* PlanForMedicalEmergencyRoutingModule */],
                __WEBPACK_IMPORTED_MODULE_3__angular_forms__["ReactiveFormsModule"], __WEBPACK_IMPORTED_MODULE_3__angular_forms__["FormsModule"]
            ],
            declarations: [__WEBPACK_IMPORTED_MODULE_4__plan_for_medical_emergency_component__["a" /* PlanForMedicalEmergencyComponent */]]
        })
    ], PlanForMedicalEmergencyModule);
    return PlanForMedicalEmergencyModule;
}());



/***/ })

});
//# sourceMappingURL=plan-for-medical-emergency.module.chunk.js.map