webpackJsonp(["protect-your-finances-details.module"],{

/***/ "./src/app/user/user-dashboard/protect-your-finances/step2/fianance/fianance.component.css":
/***/ (function(module, exports) {

module.exports = ".form-group{\n    padding: 0 30px;\n    margin: 25px 0;\n    position: relative;\n}\n.form-group.valid input{\n    border: 1px solid #42A82D;\n}\n.form-group.valid i {\n    position: absolute;\n    top: 42px;\n    right: 38px;\n    background: #42A82D;\n    color: #fff;\n    height: 22px;\n    width: 22px;\n    text-align: center;\n    line-height: 24px;\n    border-radius: 50%;\n}\n.radio_ul6 li{\n    display: inline-block;\n    margin-right: 5px;\n}\n.form-group label {\n    display: block;\n    font-weight: normal;\n    font-size: 18px;\n    text-align: left;\n}\n.radio_custom {\n    height: 105px;\n    width: 105px;\n    position: relative;\n    border: 1px solid #BFBFBF;\n    font-family: 'OpenSans';\n    -webkit-box-shadow: 0 1px 1px 1px #ddd;\n            box-shadow: 0 1px 1px 1px #ddd;\n    min-height: 100%;\n}\n.radio_custom .human_status {\n    position: absolute;\n    -webkit-transform: translate(-50%,-50%);\n    transform: translate(-50%,-50%);\n    left: 50%;\n    top: 50%;\n    font-size: 16px;\n}\n.radio_custom.active {\n    border-color: #42A82D;\n    background: #42A82D;\n    color: #fff;\n}\n@media screen and (max-width:480px){\n    .form-group label{\n        font-size: 16px;\n    }\n}"

/***/ }),

/***/ "./src/app/user/user-dashboard/protect-your-finances/step2/fianance/fianance.component.html":
/***/ (function(module, exports) {

module.exports = "\n  \n  <div formGroupName=\"\">\n    <div class=\"form-group valid\">\n      <label>What is their full legal name? </label>\n      <input\n              type=\"text\"\n              class=\"form-control\"\n              \n              required\n              name ='firstname'>\n              <i class=\"fa fa-check\"></i>\n    </div>\n    \n    <div class=\"form-group valid\">\n      <label>What is their address? </label>\n      <input\n              type=\"text\"\n              class=\"form-control\"\n              \n              required\n              name ='address'>\n              <i class=\"fa fa-check\"></i>\n    </div>\n    \n    \n    <div class=\"form-group valid\">\n      <label>What is phone number? </label>\n      <input\n              type=\"text\"\n              class=\"form-control\"\n              \n              required\n              name ='phone'>\n              <i class=\"fa fa-check\"></i>\n    </div>\n    \n    \n    <div class=\"form-group valid\">\n      <label>Would you like to inform this person that you appointed them as your Financial Power of Attorney?</label>\n        <ul class=\"radio_ul6\">\n            <li>\n              <label class=\"radio_custom\">\n                <input type=\"radio\" required=\"true\" value=1>\n                <span class=\"human_status\">Yes</span>\n              </label>\n            </li>\n            <li>\n              <label class=\"radio_custom\">\n                <input type=\"radio\" required=\"true\" value=0>\n                <span class=\"human_status\">No</span>\n              </label>\n            </li>\n          </ul>\n    </div>\n    \n    <div class=\"form-group valid\">\n      <label>What is their email address?</label>\n      <input type=\"text\" class=\"form-control\" required name ='phone'>\n      <i class=\"fa fa-check\"></i>\n    </div>\n    \n    \n  </div>\n"

/***/ }),

/***/ "./src/app/user/user-dashboard/protect-your-finances/step2/fianance/fianance.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return FiananceComponent; });
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

var FiananceComponent = /** @class */ (function () {
    function FiananceComponent() {
    }
    FiananceComponent.prototype.ngOnInit = function () {
    };
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Input"])('data'),
        __metadata("design:type", Object)
    ], FiananceComponent.prototype, "data", void 0);
    FiananceComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            selector: 'app-fianance',
            template: __webpack_require__("./src/app/user/user-dashboard/protect-your-finances/step2/fianance/fianance.component.html"),
            styles: [__webpack_require__("./src/app/user/user-dashboard/protect-your-finances/step2/fianance/fianance.component.css")]
        }),
        __metadata("design:paramtypes", [])
    ], FiananceComponent);
    return FiananceComponent;
}());



/***/ }),

/***/ "./src/app/user/user-dashboard/protect-your-finances/step2/protect-your-finances-details-routing.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ProtectYourFinancesDetailsRoutingModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__protect_your_finances_details_component__ = __webpack_require__("./src/app/user/user-dashboard/protect-your-finances/step2/protect-your-finances-details.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};



var routes = [
    { path: '', component: __WEBPACK_IMPORTED_MODULE_0__protect_your_finances_details_component__["a" /* ProtectYourFinancesDetailsComponent */] }
];
var ProtectYourFinancesDetailsRoutingModule = /** @class */ (function () {
    function ProtectYourFinancesDetailsRoutingModule() {
    }
    ProtectYourFinancesDetailsRoutingModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_1__angular_core__["NgModule"])({
            imports: [__WEBPACK_IMPORTED_MODULE_2__angular_router__["e" /* RouterModule */].forChild(routes)],
            exports: [__WEBPACK_IMPORTED_MODULE_2__angular_router__["e" /* RouterModule */]]
        })
    ], ProtectYourFinancesDetailsRoutingModule);
    return ProtectYourFinancesDetailsRoutingModule;
}());



/***/ }),

/***/ "./src/app/user/user-dashboard/protect-your-finances/step2/protect-your-finances-details.component.css":
/***/ (function(module, exports) {

module.exports = ".main-content {\n    background: #fff;\n    border-radius: 10px;\n    border: 1px solid #ddd;\n    box-shadow: 0 1px 1px 0 #ddd;\n    -webkit-box-shadow: 0 1px 1px 0 #ddd;\n    -moz-box-shadow: 0 1px 1px 0 #ddd;\n    display: inline-block;\n    width: 100%;\n    padding: 30px;\n}\n.main-content h2{\n    color: #2479B8;\n    font-size: 36px;\n    margin: 0;\n    text-transform: capitalize;\n}\n.main-content p{\n    font-size: 18px;\n    margin: 0;\n    line-height: 24px;\n}\n.main-content.loading-screen p{\n    margin: 20px 0;\n}\n.main-content .valid .form-control{\n    border-color: #42A82D;\n    color: #42A82D;\n}\n.main-content .valid i{\n    position: absolute;\n    top: 44px;\n    right: 44px;\n    background: #42A82D;\n    color: #fff;\n    height: 22px;\n    width: 22px;\n    text-align: center;\n    line-height: 22px;\n    border-radius: 50%;\n}\n.main-content.loading-screen p{\n    margin: 20px 0;\n}\n.main-content.tellusaboutyou{\n    padding: 30px 0 0;\n    width: 855px;\n}\n.main-content.tellusaboutyou h2{\n    padding: 0 30px;\n}\n.main-content .form-group{\n    padding: 0 30px;\n    margin: 25px 0;\n    position: relative;\n}\n.main-content .form-group label{\n    display: block;\n    font-weight: normal;\n    font-size: 18px;\n    text-align: left;\n}\n.main-content .form-control{\n    font-size: 16px;\n    height: 40px;\n    border-radius: 6px;\n    margin-top: 10px;\n    border: 1px solid #BFBFBF;\n    font-style: italic;\n}\n.main-content select.form-control{\n    -webkit-appearance: none;\n    -moz-appearance: none;\n}\n.main-content .valid .form-control{\n    border-color: #42A82D;\n    color: #42A82D;\n}\n.main-content .valid i{\n    position: absolute;\n    top: 44px;\n    right: 44px;\n    background: #42A82D;\n    color: #fff;\n    height: 22px;\n    width: 22px;\n    text-align: center;\n    line-height: 22px;\n    border-radius: 50%;\n}\n.radio_ul6{\n    text-align: left;\n}\n.radio_ul6 li, .first_page_radio li{\n    width: auto;\n    margin-right: 5px;\n    margin-left: 0;\n    display: inline-block;\n    float: none;\n    vertical-align: top;\n}\n.radio_custom{\n    height: 105px;\n    width: 105px;\n    position: relative;\n    border: 1px solid #BFBFBF;\n    font-family: 'OpenSans';\n    box-shadow:0 1px 1px 1px #ddd;\n    -webkit-box-shadow:0 1px 1px 1px #ddd;\n    -moz-box-shadow:0 1px 1px 1px #ddd;\n    min-height: 100%;\n}\n.percentage-estate .radio_custom{\n    height: 120px;\n    width: 120px;\n}\n.radio_custom .human_status{\n    position: absolute;\n    -webkit-transform: translate(-50%,-50%);\n            transform: translate(-50%,-50%);\n    left: 50%;\n    top: 50%;\n    font-size: 16px;\n}\n.radio_custom.active {\n    border-color: #42A82D;\n    background: #42A82D;\n    color: #fff;\n}\n.radio_custom.marital_status{\n    height: 130px;\n    width: 130px;\n    cursor: pointer;\n}\n.radio_custom.marital_status.active{\n    background: none;\n}\n.radio_custom.marital_status.active .human_status2{\n    color: #42A82D;\n}\n.gifts-list .radio_custom {\n    width: 120px;\n    height: 120px;\n}\n.gifts-list .radio_custom.active{\n    background: #fff;\n}\n.gifts-list .radio_custom.active .human_status3{\n    color: #42A82D;\n}\n.radio_custom .human_status{\n    position: absolute;\n    -webkit-transform: translate(-50%,-50%);\n            transform: translate(-50%,-50%);\n    left: 50%;\n    top: 50%;\n    font-size: 16px;\n}\n.radio_ul6 li, .first_page_radio li{\n    width: auto;\n    margin-right: 5px;\n    margin-left: 0;\n    display: inline-block;\n    float: none;\n    vertical-align: top;\n}\n.first_page_radio{\n    text-align: left;\n}\n.custom_img2 {\n    padding-bottom: 2px;\n    display:block;\n    padding-top: 10px;\n    text-align: center;\n}\n.human_status2{\n    font-family: 'OpenSans';\n    position: absolute;\n    -webkit-transform: translate(-50%,0);\n            transform: translate(-50%,0);\n    left: 50%;\n    top: auto;\n    bottom: 10px;\n    line-height: 20px;\n    text-align: center;\n}\n.radio_custom.marital_status.active .human_status2{\n    color: #42A82D;\n}\n.form-footer{\n    display: inline-block;\n    width: 100%;\n    background: #f4f3f2;\n    vertical-align: top;\n    padding: 40px 25px;\n    -webkit-box-shadow: inset 0px 2px 10px 0 #e0e0e0;\n            box-shadow: inset 0px 2px 10px 0 #e0e0e0;\n}\n.inprogress img{\n    -webkit-filter: grayscale(100%);\n    filter: grayscale(100%);\n}\n.btn-complete{\n    background: url('data:image/png;base64,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') no-repeat center center !important;\n    background-size: 100% 100%;\n    padding: 10px 0 10px 30px;\n    width: 130px;\n    margin: 0;\n    float: right;\n}\n.inprogress .btn-complete{\n    -webkit-filter: grayscale(100%);\n    filter: grayscale(100%);\n}\nselect.form-control{\n    margin: 0;\n}\n@media screen and (max-width:1199px){\n    .main-content.tellusaboutyou{\n        width: 100%;\n    }\n}\n@media screen and (max-width:480px){\n    .form-group label{\n        font-size: 16px;\n    }\n}\n.drop_down {\n    width: 100%;\n    display: inline-block;\n    float: right;\n    position: relative;\n    border: 1px solid #dbdbdb;\n    background: #fff;\n    z-index: 1;\n    margin-bottom: 50px;\n  }\n.drop_down:after {\n    font-family: 'FontAwesome';\n    display: block;\n    content: \"\\f0d7\";\n    font-size: 20px;\n    color: #dadada;\n    position: absolute;\n    top: 50%;\n    right: 15px;\n    line-height: 15px;\n    margin-top: -7.5px;\n    z-index: -1;\n  }\n.drop_down select {\n    width: 100%;\n    display: inline-block;\n    float: left;\n    padding: 15px;\n    color: rgba(0,0,0,.8);\n    font-size: 18px;\n    border-radius: 2px;\n    background: none;\n    border: none;\n    -webkit-appearance: none;\n    -moz-appearance: none;\n    appearance: none;\n    font-family: 'OpenSans-Light';\n  }\n.drop_down select option {\n    padding-left: 10px;\n  }"

/***/ }),

/***/ "./src/app/user/user-dashboard/protect-your-finances/step2/protect-your-finances-details.component.html":
/***/ (function(module, exports) {

module.exports = "<div class='finances'>\n    <form [formGroup] = \"poaDetailsForm\" (ngSubmit)=\"send()\"> \n      <div class=\"main-content tellusaboutyou\" >\n        <h2>Power of attorney details</h2>\n        <!-- <app-fianance [data]=\"poaDetailsForm.get('attorney_holders')\"></app-fianance> -->\n\n        <div formGroupName=\"attorney_holders\">\n            <div class=\"form-group valid\">\n              <label>What is their full legal name? </label>\n              <input\n                      type=\"text\"\n                      class=\"form-control\"\n                      formControlName=\"fullname\"\n                      required\n                      name ='fullname'>\n                      <i class=\"fa fa-check\"></i>\n            </div>\n            \n            \n            <div class=\"form-group valid\">\n              <label>What is their address? </label>\n              <input\n                      type=\"text\"\n                      class=\"form-control\"\n                      formControlName=\"address\"\n                      required\n                      name ='address'>\n                      <i class=\"fa fa-check\"></i>\n            </div>\n            \n            \n            <div class=\"form-group\" [ngClass]= '{valid : phone.valid}'>\n              <label>What is phone number? </label>\n              <input\n                      type=\"text\"\n                      class=\"form-control\"\n                      formControlName=\"phone\"\n                      \n                      #phone\n                      mask=\"(000)-000-0000\"\n                      placeholder=\"(xxx)-xxx-xxxx\"\n                      name ='phone'>\n                      <i class=\"fa fa-check\" *ngIf=\"phone.valid\"></i>                      \n                      <span class=\"alert-danger\"\n                        *ngIf=\"phone.errors && (phone.dirty || phone.touched)\">\n                          <p *ngIf=\"phone.errors?.required\">Phone is required</p>\n                          <p *ngIf=\"phone.errors?.minlength\">Incorrect Number</p>\n                      </span>\n            </div>\n\n            <div class=\"form-group valid\">\n                <label>Beneficiary's relationship to you?</label>\n                <span class=\"drop_down\" style=\"margin-bottom:20px;\">\n                    <select class=\"beneficiary_relationship_dropdown\" (change)=\"relationshipChange('attorney_holders.relationship',$event.target.value)\" formControlName=\"relationship\">\n                        <option value=\"\">Select Relationship</option>\n                        <option value=\"Wife\">Wife</option>\n                        <option value=\"Husband\">Husband</option>\n                        <option value=\"Mother\">Mother</option>\n                        <option value=\"Father\">Father</option>\n                        <option value=\"Son\">Son</option>\n                        <option value=\"Daughter\">Daughter</option>\n                        <option value=\"Sister\">Sister</option>\n                        <option value=\"Brother\">Brother</option>\n                        <option value=\"Aunt\">Aunt</option>\n                        <option value=\"Uncle\">Uncle</option>\n                        <option value=\"Cousin\">Cousin</option>\n                        <option value=\"Friend\">Friend</option>\n                        <option value=\"Other\">Other</option>\n                     </select>\n                </span>\n            </div>\n\n            <div class=\"form-group valid\" *ngIf=\"poaDetailsForm.get('attorney_holders.relationship').value == 'Other'\">\n                <label>Mention your relationship </label>\n                <input\n                        type=\"text\"\n                        class=\"form-control\"\n                        formControlName=\"other_relationship\"\n                        required\n                        name ='other_relationship'>\n                        <i class=\"fa fa-check\"></i>\n            </div>\n            \n            <div class=\"form-group\">\n              <label>Would you like to inform this person that you appointed them as your Financial Power of Attorney?</label>\n              <ul class=\"radio_ul6\">\n                <li>\n                  <label class=\"radio_custom\" [ngClass]='{active: (poaDetailsForm.get(\"attorney_holders.is_inform\").value === 1)}'>\n                    <input type=\"radio\" #isInformYes value=1 (click)=\"changeMe('attorney_holders.is_inform', 1)\">\n                    <span class=\"human_status\">Yes</span>\n                  </label>\n                </li>\n                <li>\n                  <label class=\"radio_custom\" [ngClass]='{active: (poaDetailsForm.get(\"attorney_holders.is_inform\").value === 0)}'>\n                    <input type=\"radio\" #isInformNo value=0 (click)=\"changeMe('attorney_holders.is_inform', 0)\">\n                    <span class=\"human_status\">No</span>\n                  </label>\n                </li>\n              </ul>\n            </div>\n\n            <div class=\"form-group valid\" *ngIf='poaDetailsForm.get(\"attorney_holders.is_inform\").value === 1'>\n              <label>What is their email address?</label>\n              <input \n                    type = \"text\" \n                    class = \"form-control\" \n                    required \n                    name ='email'\n                    formControlName = \"email\">\n              <i class=\"fa fa-check\"></i>\n            </div>\n            \n          </div>\n\n\n          <div class=\"form-group valid\">\n            <label>Do you need to provide a backup Financial Power of Attorney?</label>\n              <ul class=\"radio_ul6\">\n                  <li>\n                    <label class=\"radio_custom\" [ngClass]='{active: (poaDetailsForm.get(\"is_backupattorney\").value == 1)}'>\n                      <input type=\"radio\" required=\"true\" value=1 (click)=\"changeMe('is_backupattorney', 1)\">\n                      <span class=\"human_status\">Yes</span>\n                    </label>\n                  </li>\n                  <li>\n                    <label class=\"radio_custom\" [ngClass]='{active: (poaDetailsForm.get(\"is_backupattorney\").value == 0)}'>\n                      <input type=\"radio\" required=\"true\" value=0 (click)=\"changeMe('is_backupattorney', 0)\">\n                      <span class=\"human_status\">No</span>\n                    </label>\n                  </li>\n              </ul>\n          </div>\n\n        <div *ngIf='poaDetailsForm.get(\"is_backupattorney\").value == 1'>\n          <h2>Backup Power of attorney details</h2>\n          <!-- <app-fianance></app-fianance> -->\n          <div formGroupName=\"attorney_backup\">\n              <div class=\"form-group valid\">\n                <label>What is their full legal name? </label>\n                <input\n                        type=\"text\"\n                        class=\"form-control\"\n                        formControlName=\"fullname\"\n                        required\n                        name ='fullname'>\n                        <i class=\"fa fa-check\"></i>\n              </div>\n              \n              \n              <div class=\"form-group valid\">\n                <label>What is their address? </label>\n                <input\n                        type=\"text\"\n                        class=\"form-control\"\n                        formControlName=\"address\"\n                        required\n                        name ='address'>\n                        <i class=\"fa fa-check\"></i>\n              </div>\n              \n              \n              <div class=\"form-group valid\">\n                <label>What is phone number? </label>\n                <input\n                        type=\"text\"\n                        class=\"form-control\"\n                        formControlName=\"phone\"\n                        required\n                        name ='phone'>\n                        <i class=\"fa fa-check\"></i>\n              </div>\n  \n              <div class=\"form-group valid\">\n                  <label>Beneficiary's relationship to you?</label>\n                  <span class=\"drop_down\" style=\"margin-bottom:20px;\">\n                      <select class=\"beneficiary_relationship_dropdown\" (change)=\"relationshipChange('attorney_backup.relationship',$event.target.value)\" formControlName=\"relationship\">\n                          <option value=\"\">Select Relationship</option>\n                          <option value=\"Wife\">Wife</option>\n                          <option value=\"Husband\">Husband</option>\n                          <option value=\"Mother\">Mother</option>\n                          <option value=\"Father\">Father</option>\n                          <option value=\"Son\">Son</option>\n                          <option value=\"Daughter\">Daughter</option>\n                          <option value=\"Sister\">Sister</option>\n                          <option value=\"Brother\">Brother</option>\n                          <option value=\"Aunt\">Aunt</option>\n                          <option value=\"Uncle\">Uncle</option>\n                          <option value=\"Cousin\">Cousin</option>\n                          <option value=\"Friend\">Friend</option>\n                          <option value=\"Other\">Other</option>\n                       </select>\n                  </span>\n              </div>\n\n              <div class=\"form-group valid\" *ngIf=\"poaDetailsForm.get('attorney_backup.relationship').value == 'Other'\">\n                <label>Mention your relationship </label>\n                <input\n                        type=\"text\"\n                        class=\"form-control\"\n                        formControlName=\"other_relationship\"\n                        required\n                        name ='other_relationship'>\n                        <i class=\"fa fa-check\"></i>\n              </div>\n              \n              <div class=\"form-group\">\n                <label>Would you like to inform this person that you appointed them as your Financial Power of Attorney?</label>\n                <ul class=\"radio_ul6\">\n                  <li>\n                    <label class=\"radio_custom\" [ngClass]='{active: (poaDetailsForm.get(\"attorney_backup.is_inform\").value === 1)}'>\n                      <input type=\"radio\" #isInformYes value=1 (click)=\"changeMe('attorney_backup.is_inform', 1)\">\n                      <span class=\"human_status\">Yes</span>\n                    </label>\n                  </li>\n                  <li>\n                    <label class=\"radio_custom\" [ngClass]='{active: (poaDetailsForm.get(\"attorney_backup.is_inform\").value === 0)}'>\n                      <input type=\"radio\" #isInformNo value=0 (click)=\"changeMe('attorney_backup.is_inform', 0)\">\n                      <span class=\"human_status\">No</span>\n                    </label>\n                  </li>\n                </ul>\n              </div>\n  \n              <div class=\"form-group valid\" *ngIf='poaDetailsForm.get(\"attorney_backup.is_inform\").value === 1'>\n                <label>What is their email address?</label>\n                <input \n                      type = \"text\" \n                      class = \"form-control\" \n                      required \n                      name ='email'\n                      formControlName = \"email\">\n                <i class=\"fa fa-check\"></i>\n              </div>\n              \n            </div>\n        </div>\n\n        <div class=\"form-footer\">\n          <button class=\"btn common-button btn-complete\">Continue</button>\n        </div>\n      </div>\n    </form>\n</div>"

/***/ }),

/***/ "./src/app/user/user-dashboard/protect-your-finances/step2/protect-your-finances-details.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ProtectYourFinancesDetailsComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__services_protect_your_finances_service__ = __webpack_require__("./src/app/user/user-dashboard/protect-your-finances/services/protect-your-finances.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__user_auth_user_auth_service__ = __webpack_require__("./src/app/user/user-auth/user-auth.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__user_service__ = __webpack_require__("./src/app/user/user.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__angular_forms__ = __webpack_require__("./node_modules/@angular/forms/esm5/forms.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};






var ProtectYourFinancesDetailsComponent = /** @class */ (function () {
    function ProtectYourFinancesDetailsComponent(protectYourFinancesService, fb, authService, userService, router) {
        this.protectYourFinancesService = protectYourFinancesService;
        this.fb = fb;
        this.authService = authService;
        this.userService = userService;
        this.router = router;
        this.createForm();
    }
    ProtectYourFinancesDetailsComponent.prototype.ngOnInit = function () {
        this.getPoaDetailsData();
    };
    /**
     * get the power of attorney details in a json object
     */
    ProtectYourFinancesDetailsComponent.prototype.getPoaDetailsData = function () {
        var _this = this;
        this.protectYourFinancesService.getPoaDetails().subscribe(function (response) {
            _this.response = response.data;
            var poaDetailsHolders = JSON.parse(_this.response.attorney_holders);
            var poaDetailsBackup = JSON.parse(_this.response.attorney_backup);
            var isBackupattorney = parseInt(_this.response.is_backupattorney, 10);
            _this.createForm(poaDetailsHolders, poaDetailsBackup, isBackupattorney);
        }, function (error) {
            console.log('error in protectYourFinancesService: ', error);
        });
    };
    /**
     * @param dt as a data array
     * @param dtBackup as a data array backup
     * creates the form structure of the html with the data comming from poaData
     * returns void
     */
    ProtectYourFinancesDetailsComponent.prototype.createForm = function (dt, dtBackup, isBackupattorney) {
        if (dt === void 0) { dt = null; }
        if (dtBackup === void 0) { dtBackup = null; }
        if (isBackupattorney === void 0) { isBackupattorney = null; }
        var formObj = dt !== undefined ? dt : null;
        var formObjBackup = dtBackup !== undefined ? dtBackup : null;
        this.poaDetailsForm = this.fb.group({
            is_backupattorney: new __WEBPACK_IMPORTED_MODULE_5__angular_forms__["FormControl"](isBackupattorney !== undefined && isBackupattorney !== null ? isBackupattorney : 0),
            attorney_holders: this.fb.group({
                is_inform: new __WEBPACK_IMPORTED_MODULE_5__angular_forms__["FormControl"](formObj !== undefined && formObj !== null && formObj.is_inform !== undefined
                    ? formObj.is_inform : 0, [
                    __WEBPACK_IMPORTED_MODULE_5__angular_forms__["Validators"].required
                ]),
                email: new __WEBPACK_IMPORTED_MODULE_5__angular_forms__["FormControl"](formObj !== undefined && formObj !== null && formObj.email !== undefined
                    ? formObj.email : ''),
                phone: new __WEBPACK_IMPORTED_MODULE_5__angular_forms__["FormControl"](formObj !== undefined && formObj !== null && formObj.phone !== undefined
                    ? formObj.phone : '', [__WEBPACK_IMPORTED_MODULE_5__angular_forms__["Validators"].required]),
                address: new __WEBPACK_IMPORTED_MODULE_5__angular_forms__["FormControl"](formObj !== undefined && formObj !== null && formObj.address !== undefined
                    ? formObj.address : ''),
                fullname: new __WEBPACK_IMPORTED_MODULE_5__angular_forms__["FormControl"](formObj !== undefined && formObj !== null && formObj.fullname !== undefined
                    ? formObj.fullname : ''),
                relationship: new __WEBPACK_IMPORTED_MODULE_5__angular_forms__["FormControl"](formObj !== undefined && formObj !== null && formObj.relationship !== undefined
                    ? formObj.relationship : ''),
                other_relationship: new __WEBPACK_IMPORTED_MODULE_5__angular_forms__["FormControl"](formObj !== undefined && formObj !== null && formObj.other_relationship !== undefined
                    ? formObj.other_relationship : ''),
            }),
            // this data is required if is_backupattorney is 1
            attorney_backup: this.fb.group({
                // tslint:disable-next-line:max-line-length
                is_inform: new __WEBPACK_IMPORTED_MODULE_5__angular_forms__["FormControl"](formObjBackup !== undefined && formObjBackup !== null && formObjBackup.is_inform !== undefined
                    ? formObjBackup.is_inform : 0),
                // tslint:disable-next-line:max-line-length
                email: new __WEBPACK_IMPORTED_MODULE_5__angular_forms__["FormControl"](formObjBackup !== undefined && formObjBackup !== null && formObjBackup.email !== undefined
                    ? formObjBackup.email : ''),
                // tslint:disable-next-line:max-line-length
                phone: new __WEBPACK_IMPORTED_MODULE_5__angular_forms__["FormControl"](formObjBackup !== undefined && formObjBackup !== null && formObjBackup.phone !== undefined
                    ? formObjBackup.phone : ''),
                // tslint:disable-next-line:max-line-length
                address: new __WEBPACK_IMPORTED_MODULE_5__angular_forms__["FormControl"](formObjBackup !== undefined && formObjBackup !== null && formObjBackup.address !== undefined
                    ? formObjBackup.address : ''),
                // tslint:disable-next-line:max-line-length
                fullname: new __WEBPACK_IMPORTED_MODULE_5__angular_forms__["FormControl"](formObjBackup !== undefined && formObjBackup !== null && formObjBackup.fullname !== undefined
                    ? formObjBackup.fullname : ''),
                // tslint:disable-next-line:max-line-length
                relationship: new __WEBPACK_IMPORTED_MODULE_5__angular_forms__["FormControl"](formObjBackup !== undefined && formObjBackup !== null && formObjBackup.relationship !== undefined
                    ? formObjBackup.relationship : ''),
                // tslint:disable-next-line:max-line-length
                other_relationship: new __WEBPACK_IMPORTED_MODULE_5__angular_forms__["FormControl"](formObjBackup !== undefined && formObjBackup !== null && formObjBackup.other_relationship !== undefined
                    ? formObjBackup.other_relationship : ''),
            })
        });
    };
    /**
     * @param field : field name
     * @param relationship : relationship name
     * sets form relationship value with the option value that comes
     */
    ProtectYourFinancesDetailsComponent.prototype.relationshipChange = function (field, relationship) {
        this.poaDetailsForm.get(field).setValue(relationship);
    };
    /**
     * sends the data to the server
     */
    ProtectYourFinancesDetailsComponent.prototype.send = function () {
        var _this = this;
        console.log('type : ', typeof JSON.parse(this.response.attorney_powers));
        this.response.is_backupattorney = this.poaDetailsForm.get('is_backupattorney').value;
        this.response.attorney_holders = this.poaDetailsForm.get('attorney_holders').value;
        this.response.attorney_backup = this.poaDetailsForm.get('attorney_backup').value;
        this.response.attorney_powers = JSON.parse(this.response.attorney_powers);
        this.protectYourFinancesService.postPoaDetails(this.response).subscribe(function (data) {
            _this.router.navigate(['/dashboard']);
        }, function (error) {
        });
    };
    /**
     * @param field change yes no fields
     * @param newValue this new value gets inserted
     */
    ProtectYourFinancesDetailsComponent.prototype.changeMe = function (field, newValue) {
        this.poaDetailsForm.get(field).setValue(parseInt(newValue, 10));
    };
    ProtectYourFinancesDetailsComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            selector: 'app-protect-your-finances-details',
            template: __webpack_require__("./src/app/user/user-dashboard/protect-your-finances/step2/protect-your-finances-details.component.html"),
            styles: [__webpack_require__("./src/app/user/user-dashboard/protect-your-finances/step2/protect-your-finances-details.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__services_protect_your_finances_service__["a" /* ProtectYourFinancesService */],
            __WEBPACK_IMPORTED_MODULE_5__angular_forms__["FormBuilder"],
            __WEBPACK_IMPORTED_MODULE_3__user_auth_user_auth_service__["a" /* UserAuthService */],
            __WEBPACK_IMPORTED_MODULE_4__user_service__["a" /* UserService */],
            __WEBPACK_IMPORTED_MODULE_2__angular_router__["d" /* Router */]])
    ], ProtectYourFinancesDetailsComponent);
    return ProtectYourFinancesDetailsComponent;
}());



/***/ }),

/***/ "./src/app/user/user-dashboard/protect-your-finances/step2/protect-your-finances-details.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ProtectYourFinancesDetailsModule", function() { return ProtectYourFinancesDetailsModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__protect_your_finances_details_component__ = __webpack_require__("./src/app/user/user-dashboard/protect-your-finances/step2/protect-your-finances-details.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_common__ = __webpack_require__("./node_modules/@angular/common/esm5/common.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__protect_your_finances_details_routing_module__ = __webpack_require__("./src/app/user/user-dashboard/protect-your-finances/step2/protect-your-finances-details-routing.module.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__angular_forms__ = __webpack_require__("./node_modules/@angular/forms/esm5/forms.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__fianance_fianance_component__ = __webpack_require__("./src/app/user/user-dashboard/protect-your-finances/step2/fianance/fianance.component.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};






var ProtectYourFinancesDetailsModule = /** @class */ (function () {
    function ProtectYourFinancesDetailsModule() {
    }
    ProtectYourFinancesDetailsModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_1__angular_core__["NgModule"])({
            imports: [
                __WEBPACK_IMPORTED_MODULE_2__angular_common__["b" /* CommonModule */],
                __WEBPACK_IMPORTED_MODULE_3__protect_your_finances_details_routing_module__["a" /* ProtectYourFinancesDetailsRoutingModule */],
                __WEBPACK_IMPORTED_MODULE_4__angular_forms__["FormsModule"],
                __WEBPACK_IMPORTED_MODULE_4__angular_forms__["ReactiveFormsModule"],
            ],
            declarations: [__WEBPACK_IMPORTED_MODULE_0__protect_your_finances_details_component__["a" /* ProtectYourFinancesDetailsComponent */], __WEBPACK_IMPORTED_MODULE_5__fianance_fianance_component__["a" /* FiananceComponent */]]
        })
    ], ProtectYourFinancesDetailsModule);
    return ProtectYourFinancesDetailsModule;
}());



/***/ })

});
//# sourceMappingURL=protect-your-finances-details.module.chunk.js.map