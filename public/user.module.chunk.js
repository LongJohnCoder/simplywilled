webpackJsonp(["user.module"],{

/***/ "./node_modules/ngx-bootstrap/carousel/carousel.component.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* unused harmony export Direction */
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return CarouselComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__utils_index__ = __webpack_require__("./node_modules/ngx-bootstrap/utils/index.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__carousel_config__ = __webpack_require__("./node_modules/ngx-bootstrap/carousel/carousel.config.js");
// tslint:disable:max-file-line-count
/***
 * pause (not yet supported) (?string='hover') - event group name which pauses
 * the cycling of the carousel, if hover pauses on mouseenter and resumes on
 * mouseleave keyboard (not yet supported) (?boolean=true) - if false
 * carousel will not react to keyboard events
 * note: swiping not yet supported
 */
/****
 * Problems:
 * 1) if we set an active slide via model changes, .active class remains on a
 * current slide.
 * 2) if we have only one slide, we shouldn't show prev/next nav buttons
 * 3) if first or last slide is active and noWrap is true, there should be
 * "disabled" class on the nav buttons.
 * 4) default interval should be equal 5000
 */



var Direction;
(function (Direction) {
    Direction[Direction["UNKNOWN"] = 0] = "UNKNOWN";
    Direction[Direction["NEXT"] = 1] = "NEXT";
    Direction[Direction["PREV"] = 2] = "PREV";
})(Direction || (Direction = {}));
/**
 * Base element to create carousel
 */
var CarouselComponent = (function () {
    function CarouselComponent(config, ngZone) {
        this.ngZone = ngZone;
        /** Will be emitted when active slide has been changed. Part of two-way-bindable [(activeSlide)] property */
        this.activeSlideChange = new __WEBPACK_IMPORTED_MODULE_0__angular_core__["EventEmitter"](false);
        this._slides = new __WEBPACK_IMPORTED_MODULE_1__utils_index__["a" /* LinkedList */]();
        this.destroyed = false;
        Object.assign(this, config);
    }
    Object.defineProperty(CarouselComponent.prototype, "activeSlide", {
        get: function () {
            return this._currentActiveSlide;
        },
        /** Index of currently displayed slide(started for 0) */
        set: function (index) {
            if (this._slides.length && index !== this._currentActiveSlide) {
                this._select(index);
            }
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(CarouselComponent.prototype, "interval", {
        /**
         * Delay of item cycling in milliseconds. If false, carousel won't cycle
         * automatically.
         */
        get: function () {
            return this._interval;
        },
        set: function (value) {
            this._interval = value;
            this.restartTimer();
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(CarouselComponent.prototype, "slides", {
        get: function () {
            return this._slides.toArray();
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(CarouselComponent.prototype, "isBs4", {
        get: function () {
            return !Object(__WEBPACK_IMPORTED_MODULE_1__utils_index__["b" /* isBs3 */])();
        },
        enumerable: true,
        configurable: true
    });
    CarouselComponent.prototype.ngOnDestroy = function () {
        this.destroyed = true;
    };
    /**
     * Adds new slide. If this slide is first in collection - set it as active
     * and starts auto changing
     * @param slide
     */
    CarouselComponent.prototype.addSlide = function (slide) {
        this._slides.add(slide);
        if (this._slides.length === 1) {
            this._currentActiveSlide = void 0;
            this.activeSlide = 0;
            this.play();
        }
    };
    /**
     * Removes specified slide. If this slide is active - will roll to another
     * slide
     * @param slide
     */
    CarouselComponent.prototype.removeSlide = function (slide) {
        var _this = this;
        var remIndex = this._slides.indexOf(slide);
        if (this._currentActiveSlide === remIndex) {
            // removing of active slide
            var nextSlideIndex_1 = void 0;
            if (this._slides.length > 1) {
                // if this slide last - will roll to first slide, if noWrap flag is
                // FALSE or to previous, if noWrap is TRUE in case, if this slide in
                // middle of collection, index of next slide is same to removed
                nextSlideIndex_1 = !this.isLast(remIndex)
                    ? remIndex
                    : this.noWrap ? remIndex - 1 : 0;
            }
            this._slides.remove(remIndex);
            // prevents exception with changing some value after checking
            setTimeout(function () {
                _this._select(nextSlideIndex_1);
            }, 0);
        }
        else {
            this._slides.remove(remIndex);
            var currentSlideIndex_1 = this.getCurrentSlideIndex();
            setTimeout(function () {
                // after removing, need to actualize index of current active slide
                _this._currentActiveSlide = currentSlideIndex_1;
                _this.activeSlideChange.emit(_this._currentActiveSlide);
            }, 0);
        }
    };
    /**
     * Rolling to next slide
     * @param force: {boolean} if true - will ignore noWrap flag
     */
    CarouselComponent.prototype.nextSlide = function (force) {
        if (force === void 0) { force = false; }
        this.activeSlide = this.findNextSlideIndex(Direction.NEXT, force);
    };
    /**
     * Rolling to previous slide
     * @param force: {boolean} if true - will ignore noWrap flag
     */
    CarouselComponent.prototype.previousSlide = function (force) {
        if (force === void 0) { force = false; }
        this.activeSlide = this.findNextSlideIndex(Direction.PREV, force);
    };
    /**
     * Rolling to specified slide
     * @param index: {number} index of slide, which must be shown
     */
    CarouselComponent.prototype.selectSlide = function (index) {
        this.activeSlide = index;
    };
    /**
     * Starts a auto changing of slides
     */
    CarouselComponent.prototype.play = function () {
        if (!this.isPlaying) {
            this.isPlaying = true;
            this.restartTimer();
        }
    };
    /**
     * Stops a auto changing of slides
     */
    CarouselComponent.prototype.pause = function () {
        if (!this.noPause) {
            this.isPlaying = false;
            this.resetTimer();
        }
    };
    /**
     * Finds and returns index of currently displayed slide
     * @returns {number}
     */
    CarouselComponent.prototype.getCurrentSlideIndex = function () {
        return this._slides.findIndex(function (slide) { return slide.active; });
    };
    /**
     * Defines, whether the specified index is last in collection
     * @param index
     * @returns {boolean}
     */
    CarouselComponent.prototype.isLast = function (index) {
        return index + 1 >= this._slides.length;
    };
    /**
     * Defines next slide index, depending of direction
     * @param direction: Direction(UNKNOWN|PREV|NEXT)
     * @param force: {boolean} if TRUE - will ignore noWrap flag, else will
     *   return undefined if next slide require wrapping
     * @returns {any}
     */
    CarouselComponent.prototype.findNextSlideIndex = function (direction, force) {
        var nextSlideIndex = 0;
        if (!force &&
            (this.isLast(this.activeSlide) &&
                direction !== Direction.PREV &&
                this.noWrap)) {
            return void 0;
        }
        switch (direction) {
            case Direction.NEXT:
                // if this is last slide, not force, looping is disabled
                // and need to going forward - select current slide, as a next
                nextSlideIndex = !this.isLast(this._currentActiveSlide)
                    ? this._currentActiveSlide + 1
                    : !force && this.noWrap ? this._currentActiveSlide : 0;
                break;
            case Direction.PREV:
                // if this is first slide, not force, looping is disabled
                // and need to going backward - select current slide, as a next
                nextSlideIndex =
                    this._currentActiveSlide > 0
                        ? this._currentActiveSlide - 1
                        : !force && this.noWrap
                            ? this._currentActiveSlide
                            : this._slides.length - 1;
                break;
            default:
                throw new Error('Unknown direction');
        }
        return nextSlideIndex;
    };
    /**
     * Sets a slide, which specified through index, as active
     * @param index
     * @private
     */
    CarouselComponent.prototype._select = function (index) {
        if (isNaN(index)) {
            this.pause();
            return;
        }
        var currentSlide = this._slides.get(this._currentActiveSlide);
        if (currentSlide) {
            currentSlide.active = false;
        }
        var nextSlide = this._slides.get(index);
        if (nextSlide) {
            this._currentActiveSlide = index;
            nextSlide.active = true;
            this.activeSlide = index;
            this.activeSlideChange.emit(index);
        }
    };
    /**
     * Starts loop of auto changing of slides
     */
    CarouselComponent.prototype.restartTimer = function () {
        var _this = this;
        this.resetTimer();
        var interval = +this.interval;
        if (!isNaN(interval) && interval > 0) {
            this.currentInterval = this.ngZone.runOutsideAngular(function () {
                return setInterval(function () {
                    var nInterval = +_this.interval;
                    _this.ngZone.run(function () {
                        if (_this.isPlaying &&
                            !isNaN(_this.interval) &&
                            nInterval > 0 &&
                            _this.slides.length) {
                            _this.nextSlide();
                        }
                        else {
                            _this.pause();
                        }
                    });
                }, interval);
            });
        }
    };
    /**
     * Stops loop of auto changing of slides
     */
    CarouselComponent.prototype.resetTimer = function () {
        if (this.currentInterval) {
            clearInterval(this.currentInterval);
            this.currentInterval = void 0;
        }
    };
    CarouselComponent.decorators = [
        { type: __WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"], args: [{
                    selector: 'carousel',
                    template: "<div (mouseenter)=\"pause()\" (mouseleave)=\"play()\" (mouseup)=\"play()\" class=\"carousel slide\"> <ol class=\"carousel-indicators\" *ngIf=\"showIndicators && slides.length > 1\"> <li *ngFor=\"let slidez of slides; let i = index;\" [class.active]=\"slidez.active === true\" (click)=\"selectSlide(i)\"></li> </ol> <div class=\"carousel-inner\"><ng-content></ng-content></div> <a class=\"left carousel-control carousel-control-prev\" [class.disabled]=\"activeSlide === 0 && noWrap\" (click)=\"previousSlide()\" *ngIf=\"slides.length > 1\"> <span class=\"icon-prev carousel-control-prev-icon\" aria-hidden=\"true\"></span> <span *ngIf=\"isBs4\" class=\"sr-only\">Previous</span> </a> <a class=\"right carousel-control carousel-control-next\" (click)=\"nextSlide()\"  [class.disabled]=\"isLast(activeSlide) && noWrap\" *ngIf=\"slides.length > 1\"> <span class=\"icon-next carousel-control-next-icon\" aria-hidden=\"true\"></span> <span class=\"sr-only\">Next</span> </a> </div> "
                },] },
    ];
    /** @nocollapse */
    CarouselComponent.ctorParameters = function () { return [
        { type: __WEBPACK_IMPORTED_MODULE_2__carousel_config__["a" /* CarouselConfig */], },
        { type: __WEBPACK_IMPORTED_MODULE_0__angular_core__["NgZone"], },
    ]; };
    CarouselComponent.propDecorators = {
        'noWrap': [{ type: __WEBPACK_IMPORTED_MODULE_0__angular_core__["Input"] },],
        'noPause': [{ type: __WEBPACK_IMPORTED_MODULE_0__angular_core__["Input"] },],
        'showIndicators': [{ type: __WEBPACK_IMPORTED_MODULE_0__angular_core__["Input"] },],
        'activeSlideChange': [{ type: __WEBPACK_IMPORTED_MODULE_0__angular_core__["Output"] },],
        'activeSlide': [{ type: __WEBPACK_IMPORTED_MODULE_0__angular_core__["Input"] },],
        'interval': [{ type: __WEBPACK_IMPORTED_MODULE_0__angular_core__["Input"] },],
    };
    return CarouselComponent;
}());

//# sourceMappingURL=carousel.component.js.map

/***/ }),

/***/ "./node_modules/ngx-bootstrap/carousel/carousel.config.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return CarouselConfig; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");

var CarouselConfig = (function () {
    function CarouselConfig() {
        /** Default interval of auto changing of slides */
        this.interval = 5000;
        /** Is loop of auto changing of slides can be paused */
        this.noPause = false;
        /** Is slides can wrap from the last to the first slide */
        this.noWrap = false;
        /** Show carousel-indicators */
        this.showIndicators = true;
    }
    CarouselConfig.decorators = [
        { type: __WEBPACK_IMPORTED_MODULE_0__angular_core__["Injectable"] },
    ];
    /** @nocollapse */
    CarouselConfig.ctorParameters = function () { return []; };
    return CarouselConfig;
}());

//# sourceMappingURL=carousel.config.js.map

/***/ }),

/***/ "./node_modules/ngx-bootstrap/carousel/carousel.module.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return CarouselModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_common__ = __webpack_require__("./node_modules/@angular/common/esm5/common.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__carousel_component__ = __webpack_require__("./node_modules/ngx-bootstrap/carousel/carousel.component.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__slide_component__ = __webpack_require__("./node_modules/ngx-bootstrap/carousel/slide.component.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__carousel_config__ = __webpack_require__("./node_modules/ngx-bootstrap/carousel/carousel.config.js");





var CarouselModule = (function () {
    function CarouselModule() {
    }
    CarouselModule.forRoot = function () {
        return { ngModule: CarouselModule, providers: [] };
    };
    CarouselModule.decorators = [
        { type: __WEBPACK_IMPORTED_MODULE_1__angular_core__["NgModule"], args: [{
                    imports: [__WEBPACK_IMPORTED_MODULE_0__angular_common__["b" /* CommonModule */]],
                    declarations: [__WEBPACK_IMPORTED_MODULE_3__slide_component__["a" /* SlideComponent */], __WEBPACK_IMPORTED_MODULE_2__carousel_component__["a" /* CarouselComponent */]],
                    exports: [__WEBPACK_IMPORTED_MODULE_3__slide_component__["a" /* SlideComponent */], __WEBPACK_IMPORTED_MODULE_2__carousel_component__["a" /* CarouselComponent */]],
                    providers: [__WEBPACK_IMPORTED_MODULE_4__carousel_config__["a" /* CarouselConfig */]]
                },] },
    ];
    /** @nocollapse */
    CarouselModule.ctorParameters = function () { return []; };
    return CarouselModule;
}());

//# sourceMappingURL=carousel.module.js.map

/***/ }),

/***/ "./node_modules/ngx-bootstrap/carousel/index.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__carousel_component__ = __webpack_require__("./node_modules/ngx-bootstrap/carousel/carousel.component.js");
/* unused harmony reexport CarouselComponent */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__carousel_module__ = __webpack_require__("./node_modules/ngx-bootstrap/carousel/carousel.module.js");
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return __WEBPACK_IMPORTED_MODULE_1__carousel_module__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__slide_component__ = __webpack_require__("./node_modules/ngx-bootstrap/carousel/slide.component.js");
/* unused harmony reexport SlideComponent */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__carousel_config__ = __webpack_require__("./node_modules/ngx-bootstrap/carousel/carousel.config.js");
/* unused harmony reexport CarouselConfig */




//# sourceMappingURL=index.js.map

/***/ }),

/***/ "./node_modules/ngx-bootstrap/carousel/slide.component.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return SlideComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__carousel_component__ = __webpack_require__("./node_modules/ngx-bootstrap/carousel/carousel.component.js");


var SlideComponent = (function () {
    function SlideComponent(carousel) {
        /** Wraps element by appropriate CSS classes */
        this.addClass = true;
        this.carousel = carousel;
    }
    /** Fires changes in container collection after adding a new slide instance */
    SlideComponent.prototype.ngOnInit = function () {
        this.carousel.addSlide(this);
    };
    /** Fires changes in container collection after removing of this slide instance */
    SlideComponent.prototype.ngOnDestroy = function () {
        this.carousel.removeSlide(this);
    };
    SlideComponent.decorators = [
        { type: __WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"], args: [{
                    selector: 'slide',
                    template: "\n    <div [class.active]=\"active\" class=\"item\">\n      <ng-content></ng-content>\n    </div>\n  "
                },] },
    ];
    /** @nocollapse */
    SlideComponent.ctorParameters = function () { return [
        { type: __WEBPACK_IMPORTED_MODULE_1__carousel_component__["a" /* CarouselComponent */], },
    ]; };
    SlideComponent.propDecorators = {
        'active': [{ type: __WEBPACK_IMPORTED_MODULE_0__angular_core__["HostBinding"], args: ['class.active',] }, { type: __WEBPACK_IMPORTED_MODULE_0__angular_core__["Input"] },],
        'addClass': [{ type: __WEBPACK_IMPORTED_MODULE_0__angular_core__["HostBinding"], args: ['class.item',] }, { type: __WEBPACK_IMPORTED_MODULE_0__angular_core__["HostBinding"], args: ['class.carousel-item',] },],
    };
    return SlideComponent;
}());

//# sourceMappingURL=slide.component.js.map

/***/ }),

/***/ "./node_modules/ngx-bootstrap/utils/index.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__decorators__ = __webpack_require__("./node_modules/ngx-bootstrap/utils/decorators.js");
/* unused harmony reexport OnChange */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__linked_list_class__ = __webpack_require__("./node_modules/ngx-bootstrap/utils/linked-list.class.js");
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return __WEBPACK_IMPORTED_MODULE_1__linked_list_class__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__theme_provider__ = __webpack_require__("./node_modules/ngx-bootstrap/utils/theme-provider.js");
/* harmony reexport (binding) */ __webpack_require__.d(__webpack_exports__, "b", function() { return __WEBPACK_IMPORTED_MODULE_2__theme_provider__["a"]; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__trigger_class__ = __webpack_require__("./node_modules/ngx-bootstrap/utils/trigger.class.js");
/* unused harmony reexport Trigger */
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__utils_class__ = __webpack_require__("./node_modules/ngx-bootstrap/utils/utils.class.js");
/* unused harmony reexport Utils */
/* unused harmony reexport setTheme */






//# sourceMappingURL=index.js.map

/***/ }),

/***/ "./node_modules/ngx-bootstrap/utils/linked-list.class.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return LinkedList; });
var LinkedList = (function () {
    function LinkedList() {
        this.length = 0;
        this.asArray = [];
        // Array methods overriding END
    }
    LinkedList.prototype.get = function (position) {
        if (this.length === 0 || position < 0 || position >= this.length) {
            return void 0;
        }
        var current = this.head;
        for (var index = 0; index < position; index++) {
            current = current.next;
        }
        return current.value;
    };
    LinkedList.prototype.add = function (value, position) {
        if (position === void 0) { position = this.length; }
        if (position < 0 || position > this.length) {
            throw new Error('Position is out of the list');
        }
        var node = {
            value: value,
            next: undefined,
            previous: undefined
        };
        if (this.length === 0) {
            this.head = node;
            this.tail = node;
            this.current = node;
        }
        else {
            if (position === 0) {
                // first node
                node.next = this.head;
                this.head.previous = node;
                this.head = node;
            }
            else if (position === this.length) {
                // last node
                this.tail.next = node;
                node.previous = this.tail;
                this.tail = node;
            }
            else {
                // node in middle
                var currentPreviousNode = this.getNode(position - 1);
                var currentNextNode = currentPreviousNode.next;
                currentPreviousNode.next = node;
                currentNextNode.previous = node;
                node.previous = currentPreviousNode;
                node.next = currentNextNode;
            }
        }
        this.length++;
        this.createInternalArrayRepresentation();
    };
    LinkedList.prototype.remove = function (position) {
        if (position === void 0) { position = 0; }
        if (this.length === 0 || position < 0 || position >= this.length) {
            throw new Error('Position is out of the list');
        }
        if (position === 0) {
            // first node
            this.head = this.head.next;
            if (this.head) {
                // there is no second node
                this.head.previous = undefined;
            }
            else {
                // there is no second node
                this.tail = undefined;
            }
        }
        else if (position === this.length - 1) {
            // last node
            this.tail = this.tail.previous;
            this.tail.next = undefined;
        }
        else {
            // middle node
            var removedNode = this.getNode(position);
            removedNode.next.previous = removedNode.previous;
            removedNode.previous.next = removedNode.next;
        }
        this.length--;
        this.createInternalArrayRepresentation();
    };
    LinkedList.prototype.set = function (position, value) {
        if (this.length === 0 || position < 0 || position >= this.length) {
            throw new Error('Position is out of the list');
        }
        var node = this.getNode(position);
        node.value = value;
        this.createInternalArrayRepresentation();
    };
    LinkedList.prototype.toArray = function () {
        return this.asArray;
    };
    LinkedList.prototype.findAll = function (fn) {
        var current = this.head;
        var result = [];
        for (var index = 0; index < this.length; index++) {
            if (fn(current.value, index)) {
                result.push({ index: index, value: current.value });
            }
            current = current.next;
        }
        return result;
    };
    // Array methods overriding start
    LinkedList.prototype.push = function () {
        var _this = this;
        var args = [];
        for (var _i = 0; _i < arguments.length; _i++) {
            args[_i] = arguments[_i];
        }
        args.forEach(function (arg) {
            _this.add(arg);
        });
        return this.length;
    };
    LinkedList.prototype.pop = function () {
        if (this.length === 0) {
            return undefined;
        }
        var last = this.tail;
        this.remove(this.length - 1);
        return last.value;
    };
    LinkedList.prototype.unshift = function () {
        var _this = this;
        var args = [];
        for (var _i = 0; _i < arguments.length; _i++) {
            args[_i] = arguments[_i];
        }
        args.reverse();
        args.forEach(function (arg) {
            _this.add(arg, 0);
        });
        return this.length;
    };
    LinkedList.prototype.shift = function () {
        if (this.length === 0) {
            return undefined;
        }
        var lastItem = this.head.value;
        this.remove();
        return lastItem;
    };
    LinkedList.prototype.forEach = function (fn) {
        var current = this.head;
        for (var index = 0; index < this.length; index++) {
            fn(current.value, index);
            current = current.next;
        }
    };
    LinkedList.prototype.indexOf = function (value) {
        var current = this.head;
        var position = 0;
        for (var index = 0; index < this.length; index++) {
            if (current.value === value) {
                position = index;
                break;
            }
            current = current.next;
        }
        return position;
    };
    LinkedList.prototype.some = function (fn) {
        var current = this.head;
        var result = false;
        while (current && !result) {
            if (fn(current.value)) {
                result = true;
                break;
            }
            current = current.next;
        }
        return result;
    };
    LinkedList.prototype.every = function (fn) {
        var current = this.head;
        var result = true;
        while (current && result) {
            if (!fn(current.value)) {
                result = false;
            }
            current = current.next;
        }
        return result;
    };
    LinkedList.prototype.toString = function () {
        return '[Linked List]';
    };
    LinkedList.prototype.find = function (fn) {
        var current = this.head;
        var result;
        for (var index = 0; index < this.length; index++) {
            if (fn(current.value, index)) {
                result = current.value;
                break;
            }
            current = current.next;
        }
        return result;
    };
    LinkedList.prototype.findIndex = function (fn) {
        var current = this.head;
        var result;
        for (var index = 0; index < this.length; index++) {
            if (fn(current.value, index)) {
                result = index;
                break;
            }
            current = current.next;
        }
        return result;
    };
    LinkedList.prototype.getNode = function (position) {
        if (this.length === 0 || position < 0 || position >= this.length) {
            throw new Error('Position is out of the list');
        }
        var current = this.head;
        for (var index = 0; index < position; index++) {
            current = current.next;
        }
        return current;
    };
    LinkedList.prototype.createInternalArrayRepresentation = function () {
        var outArray = [];
        var current = this.head;
        while (current) {
            outArray.push(current.value);
            current = current.next;
        }
        this.asArray = outArray;
    };
    return LinkedList;
}());

//# sourceMappingURL=linked-list.class.js.map

/***/ }),

/***/ "./src/app/user/about-us/about-us.component.css":
/***/ (function(module, exports) {

module.exports = "\na:hover{\n    color:#fff;\n}\n"

/***/ }),

/***/ "./src/app/user/about-us/about-us.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"AboutUsBanner\">\n  <div class=\"wrapper\">\n      <h1>\n          At SimplyWilled our mission is to make\n          <span>estate planning simple and affordable for everyone.</span>\n      </h1>\n  </div>\n</div>\n<div class=\"body_container\">\n  <div class=\"about_sec1\">\n    <div class=\"wrapper\">\n      <h1 class=\"core_value_text\">Core Values</h1>\n      <div class=\"about_first_left_sec\">\n        <a href=\"#\" class=\"have_q_btn2\">Sustainability. <br>Community. <br>Diversity. </a>\n      </div>\n      <ul class=\"about_first_right_ul\">\n        <li>\n          <span class=\"estate_planning_img\"><img src=\"../../../../assets/images/estate-planing-img.png\" alt=\"error img\"></span>\n          <div class=\"estate_planning_right_main\">\n            <h1>Estate planning should be Simple.</h1>\n            <p>Through cutting edge technology, innovation and excellence, we strive to deliver the best online estate planning for our customers that is simple to do, simple to understand, simple to execute.</p>\n          </div>\n        </li>\n        <li>\n          <span class=\"estate_planning_img\"><img src=\"../../../../assets/images/planning2.png\" alt=\"error img\"></span>\n          <div class=\"estate_planning_right_main\">\n            <h1>Estate planning should be accessible to all people regardless of age, education, financial  status or native language.</h1>\n            <p>Here at SimplyWilled.com we believe the ability to pass wealth from one generation to the next is a fundamental right that all people should enjoy. </p>\n          </div>\n        </li>\n        <li>\n          <span class=\"estate_planning_img\"><img src=\"../../../../assets/images/customer.png\" alt=\"error img\"></span>\n          <div class=\"estate_planning_right_main\">\n            <h1>Here at SimplyWilled.com. we are committed to our customers.</h1>\n            <p>We are committed to building strong communities across the United States. Ten percent (10%) of all of SimplyWilled.com profits go to charities that support the less fortunate in the communities we serve.\n            </p>\n          </div>\n        </li>\n      </ul>\n    </div>\n  </div>\n  <div class=\"about_sec2\">\n    <div class=\"wrapper\">\n      <h1 class=\"core_value_text\">Our History</h1>\n      <p class=\"our_history_pera\">\n        Consumers today are smarter, more sophisticated, and have more choices than ever before for their online DIY legal needs. Only a satisfied consumer can decide if they will be your customer for life. At SimplyWilled we believe that to be worthy of such commitment, we had go beyond traditional online DIY legal services, and offer the consumer something new, something smart, something that makes the consumer’s life Simple.</p>\n      <p class=\"our_history_pera\">\n        “SimplyWilled.com offer consumers a new way of approaching online do it yourself estate planning. Our team recognized that most online platforms were either too basic or overly complicated. In contrast we setout to develop a solution that is simple to use but preserves the features that discerning consumers demand.” </p>\n      <p class=\"our_history_pera\">“We designed SimplyWilled as a simple to use, powerful, online estate planning system to empower individuals. It has been engineered from the ground up to make the online estate planning as simple and user friendly as possible, while retaining the flexibility and sophistication consumers demand in a way that exceeds customer expectations.” </p>\n      <p class=\"our_history_pera\">SimplyWilled.com extends the benefits of traditional online do it yourself estate planning by wrapping its capabilities in an online platform that is easy to access, easy to understand and easy for the customer to use.</p>\n    </div>\n  </div>\n  <div class=\"about_sec3\" id='ourTeam'>\n    <div class=\"wrapper\">\n      <h1 class=\"core_value_text\">Our Team</h1>\n      <ul class=\"about_team_ul\">\n        <li>\n          <span class=\"team_pic\"><img src=\"../../../../assets/images/valeria-edward.png\" alt=\"imran khan\"></span>\n          <h3 class=\"team_name\">Valerie Edwards</h3>\n          <h4 class=\"team_descreption\">General Counsel</h4>\n        </li>\n        <li>\n          <span class=\"team_pic\"><img src=\"../../../../assets/images/peter.png\" alt=\"peter\"></span>\n          <h3 class=\"team_name\">Peter Antonoplos</h3>\n          <h4 class=\"team_descreption\">CEO & Founder</h4>\n        </li>\n        <li>\n          <span class=\"team_pic\"><img src=\"../../../../assets/images/kandel.png\" alt=\"Kendal\"></span>\n          <h3 class=\"team_name\">Kendal Wilkinson</h3>\n          <h4 class=\"team_descreption\">Customer Relations</h4>\n        </li>\n        <li>\n          <span class=\"team_pic\"><img src=\"../../../../assets/images/mark-atalla.png\" alt=\"Mark Atalla\"></span>\n          <h3 class=\"team_name\">Mark Atalla</h3>\n          <h4 class=\"team_descreption\">Brand Development</h4>\n        </li>\n      </ul>\n    </div>\n  </div>\n  <div class=\"about_sec4\">\n    <div class=\"wrapper\">\n      <h1 class=\"about_state_planning_text\">Estate Planning Made Simple & Affordable.</h1>\n      <h4 class=\"select_plan\">Select your plan now and Keep your loved ones safe!</h4>\n      <a routerLink=\"/register\" class=\"aboutGetStarted\"><i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i> Get Started</a>\n    </div>\n  </div>\n</div>"

/***/ }),

/***/ "./src/app/user/about-us/about-us.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AboutUsComponent; });
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

var AboutUsComponent = /** @class */ (function () {
    function AboutUsComponent() {
    }
    AboutUsComponent.prototype.ngOnInit = function () {
    };
    AboutUsComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            selector: 'app-about-us',
            template: __webpack_require__("./src/app/user/about-us/about-us.component.html"),
            styles: [__webpack_require__("./src/app/user/about-us/about-us.component.css")]
        }),
        __metadata("design:paramtypes", [])
    ], AboutUsComponent);
    return AboutUsComponent;
}());



/***/ }),

/***/ "./src/app/user/blog/blog-category/blog-category.component.css":
/***/ (function(module, exports) {

module.exports = ""

/***/ }),

/***/ "./src/app/user/blog/blog-category/blog-category.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"body_container\">\n  <div class=\"wrapper\">\n    <div class=\"trending_main\">\n      <div class=\"trending_left\">\n        <ul class=\"trending_ul\">\n          <li *ngIf=\"!blogList.length\">No posts found !</li>\n          <li *ngFor=\"let blog of blogList | paginate: { itemsPerPage: 10, currentPage: p }\">\n            <a routerLink=\"/blogdetails/{{blog.slug}}\" class=\"trending_img\"><img src=\"{{imageLink}}{{blog.image}}\" alt=\"{{blog.image}}\"></a>\n            <h1 class=\"news_heading\">{{blog.title}}</h1>\n            <ul class=\"trending_sub_left_ul\">\n              <li>\n                <span class=\"news_owl\"><img src=\"../../../../assets/images/news_owl.png\" alt=\"error img\"></span>\n                <span class=\"by_simply_willed_text\">By Simply<span>Willed</span></span>\n              </li>\n              <li>\n                <span class=\"by_simply_willed_text\">{{blog.created_at | date  }}</span>\n              </li>\n              <li>\n                <span class=\"by_simply_willed_text\">{{blog.get_comments.length}} comments</span>\n              </li>\n            </ul>\n            <ul class=\"trending_right_ul\">\n              <li><a href=\"#\">Share:</a></li>\n              <li><a href=\"#\" title=\"Twitter\"><img src=\"../../../../assets/images/twitter-icon.png\"></a></li>\n              <li><a href=\"#\" title=\"Facebook\"><img src=\"../../../../assets/images/facebook-icon.png\"></a></li>\n              <li><a href=\"#\" title=\"Google-plus\"><img src=\"../../../../assets/images/gplus-icon.png\"></a></li>\n              <li><a href=\"#\" title=\"Vimeo\"><img src=\"../../../../assets/images/vimeo-icon.png\"></a></li>\n              <li><a href=\"#\" title=\"Skype\"><img src=\"../../../../assets/images/skype-icon.png\"></a></li>\n              <li><a href=\"#\" title=\"Linkedin\"><img src=\"../../../../assets/images/linkedin-icon.png\"></a></li>\n            </ul>\n            <p class=\"legal_requirement\" innerHTML=\"{{ blog.body | slice:0:650 }}\"></p>\n            <a class=\"btn-green\" routerLink=\"/blogdetails/{{blog.slug}}\" ><img src=\"../../../../assets/images/arrow-right.png\"> Read More</a>\n          </li>\n        </ul>\n        <pagination-controls class=\"older_post_text\"\n                             (pageChange)=\"p=$event\"\n                             maxSize=\"9\"\n                             directionLinks=\"true\"\n                             autoHide=\"true\"\n                             previousLabel=\"NEWER POSTS\"\n                             nextLabel=\"OLDER POSTS\"\n                             screenReaderPaginationLabel=\"OLDER POSTS\"\n                             screenReaderPageLabel=\"page\"\n                             screenReaderCurrentLabel=\"You're on page\">\n        </pagination-controls>\n      </div>\n      <div class=\"trending_right_main\">\n        <h2 class=\"subscribe_text_main\"><span class=\"subscribe_text\">SUBSCRIBE</span></h2>\n          <form novalidate [formGroup]=\"subscriberEmailForm\" (ngSubmit)=\"onSubmit()\">\n              <div class=\"subscribe_form_main\">\n                  <input type=\"email\" class=\"subscribe_mail\" formControlName=\"subscriberEmail\" placeholder=\"Your email address\">\n                  <div class=\"form-control-feedback\"\n                       *ngIf=\"subscriberEmail.errors && (subscriberEmail.dirty || subscriberEmail.touched)\">\n                      <p *ngIf=\"subscriberEmail.errors\">The email address must contain at least the @ character</p>\n                  </div>\n                  <input type=\"submit\" class=\"btn-green\" value=\"Subscribe\">\n              </div>\n        </form>\n        <h2 class=\"subscribe_text_main\"><span class=\"subscribe_text\">CATEGORIES</span></h2>\n        <span *ngIf=\"!blogCategoryList.length\">No category found !</span>\n        <ul class=\"cat_ul\" *ngFor=\"let category of blogCategoryList\">\n          <li><a routerLink=\"/category/{{category.slug}}\">{{category.name}} <span> ({{category.blogCount}})</span></a></li>\n        </ul>\n        <h2 class=\"subscribe_text_main\"><span class=\"subscribe_text\">POPULAR POSTS </span></h2>\n        <ul class=\"post_ul\">\n          <li *ngIf=\"!popularBlogPost.length\">No popular post found !</li>\n            <li *ngFor=\"let popularPost of popularBlogPost\">\n                <a routerLink=\"/blogdetails/{{popularPost.slug}}\" class=\"post_img\"><img src=\"{{imageLink}}{{popularPost.image}}\"></a>\n                <div class=\"post_right_main\">\n                    <a routerLink=\"/blogdetails/{{popularPost.slug}}\" class=\"post_heading\">{{popularPost.title}}</a>\n                    <h4 class=\"healthcare_text\">{{popularPost.categoryNames}}</h4>\n                </div>\n            </li>\n        </ul>\n          <h2 class=\"subscribe_text_main\"><span class=\"subscribe_text\">RECENT POSTS </span></h2>\n          <ul class=\"post_ul\">\n            <li *ngIf=\"!recentBlogPost.length\">No recent post found !</li>\n              <li *ngFor=\"let popularPost of recentBlogPost\">\n                  <a routerLink=\"/blogdetails/{{popularPost.slug}}\" class=\"post_img\"><img src=\"{{imageLink}}{{popularPost.image}}\"></a>\n                  <div class=\"post_right_main\">\n                      <a routerLink=\"/blogdetails/{{popularPost.slug}}\" class=\"post_heading\">{{popularPost.title}}</a>\n                      <h4 class=\"healthcare_text\">{{popularPost.categoryNames}}</h4>\n                  </div>\n              </li>\n          </ul>\n\n      </div>\n    </div>\n  </div>\n  <div class=\"about_sec4\">\n    <div class=\"wrapper\">\n      <h1 class=\"about_state_planning_text\">Estate Planning Made Simple &amp; Affordable.</h1>\n      <h4 class=\"select_plan\">Select your plan now and Keep your loved ones safe!</h4>\n    </div>\n  </div>\n</div>"

/***/ }),

/***/ "./src/app/user/blog/blog-category/blog-category.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return BlogCategoryComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_forms__ = __webpack_require__("./node_modules/@angular/forms/esm5/forms.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};



var BlogCategoryComponent = /** @class */ (function () {
    function BlogCategoryComponent(router, route) {
        var _this = this;
        this.router = router;
        this.route = route;
        this.blogList = [];
        this.blogCategoryList = [];
        this.popularBlogPost = [];
        this.recentBlogPost = [];
        router.events.subscribe(function (event) {
            if (event instanceof __WEBPACK_IMPORTED_MODULE_1__angular_router__["b" /* NavigationEnd */]) {
                var slug = _this.route.snapshot.paramMap.get('slug');
                _this.BlogService.getBlogDetailsFromCategory(slug).subscribe(function (data) {
                    _this.blogList = data.data.blog;
                    _this.imageLink = data.data.imageLink;
                });
            }
        });
    }
    BlogCategoryComponent.prototype.ngOnInit = function () {
        this.p = 1;
        this.getBlogDetailsFromCategory();
        this.populateBlogCategory();
        this.populatePopularBlogPosts();
        this.populateRecentBlogPosts();
        this.createFormControls();
        this.createForm();
    };
    BlogCategoryComponent.prototype.getBlogDetailsFromCategory = function () {
        var _this = this;
        var slug = this.route.snapshot.paramMap.get('slug');
        this.BlogService.getBlogDetailsFromCategory(slug).subscribe(function (data) {
            _this.blogList = data.data.blog;
            _this.imageLink = data.data.imageLink;
        });
    };
    BlogCategoryComponent.prototype.populateBlogCategory = function () {
        var _this = this;
        this.BlogService.getBlogCategoryList().subscribe(function (data) {
            _this.blogCategoryList = data.data.categories;
        });
    };
    BlogCategoryComponent.prototype.populatePopularBlogPosts = function () {
        var _this = this;
        this.BlogService.getPopularBlogPosts().subscribe(function (data) {
            var list = [];
            data.data.forEach(function (value) {
                list.push(value.blog);
            });
            _this.popularBlogPost = list;
        });
    };
    BlogCategoryComponent.prototype.populateRecentBlogPosts = function () {
        var _this = this;
        this.BlogService.getRecentBlogPosts().subscribe(function (data) {
            var list = [];
            data.data.forEach(function (value) {
                list.push(value.blog);
            });
            _this.recentBlogPost = list;
        });
    };
    BlogCategoryComponent.prototype.createFormControls = function () {
        this.subscriberEmailForm = new __WEBPACK_IMPORTED_MODULE_2__angular_forms__["FormControl"]();
        this.subscriberEmail = new __WEBPACK_IMPORTED_MODULE_2__angular_forms__["FormControl"]('', [
            __WEBPACK_IMPORTED_MODULE_2__angular_forms__["Validators"].required,
            __WEBPACK_IMPORTED_MODULE_2__angular_forms__["Validators"].pattern('[^ @]*@[^ @]*')
        ]);
    };
    BlogCategoryComponent.prototype.createForm = function () {
        this.subscriberEmailForm = new __WEBPACK_IMPORTED_MODULE_2__angular_forms__["FormGroup"]({
            subscriberEmail: this.subscriberEmail
        });
    };
    BlogCategoryComponent.prototype.onSubmit = function () {
        var _this = this;
        if (this.subscriberEmailForm.valid) {
            this.BlogService.subscribeEmailNewsletter(this.subscriberEmailForm.value).subscribe(function (data) {
                if (data.status = 'true') {
                    alert(data.message);
                    _this.subscriberEmailForm.reset();
                }
            });
        }
    };
    BlogCategoryComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            selector: 'app-blog-category',
            template: __webpack_require__("./src/app/user/blog/blog-category/blog-category.component.html"),
            styles: [__webpack_require__("./src/app/user/blog/blog-category/blog-category.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_router__["d" /* Router */], __WEBPACK_IMPORTED_MODULE_1__angular_router__["a" /* ActivatedRoute */]])
    ], BlogCategoryComponent);
    return BlogCategoryComponent;
}());



/***/ }),

/***/ "./src/app/user/blog/blog.component.css":
/***/ (function(module, exports) {

module.exports = "\n.heaser_sec2_slider {\n    width: 100%;\n    float: left;\n    margin-top: -38px;\n}\n.inner-banner .slider {\n    position: relative;\n}\n.inner-banner img {\n    display: block;\n    width: 100%;\n}\n.inner-banner img.mobile-banner {\n    display: none;\n}\n.inner-banner .slider h1 {\n    position: absolute;\n    -webkit-transform: translate(-50%,-50%);\n            transform: translate(-50%,-50%);\n    left: 50%;\n    top: 50%;\n    color: #fff;\n    font-size: 48px;\n    text-align: center;\n    width: 90%;\n}\n.subscribe_form_main .btn-green{\n    width: 100%;\n    font-size: 18px;\n    padding: 8px 0;\n    font-weight: bold;\n}\n.about_sec4{\n    position: relative;\n}\n.about_sec4 .btn-green{\n    width: 180px;\n    text-align: center;\n    color: #fff;\n    background: -webkit-gradient(linear, left top, left bottom, from(#53ba3c), to(#3fa62e));\n    background: linear-gradient(#53ba3c, #3fa62e);\n    border: 2px solid #fff;\n    font-family: 'OpenSans';\n    font-size: 22px;\n    padding: 10px 0px;\n    border-radius: 10px;\n    text-shadow: 2px 2px 1px rgba(0,0,0,0.2);\n    -webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,0.4);\n            box-shadow: inset 0 1px 0 rgba(255,255,255,0.4);\n    -webkit-transition: all 0.3s ease 0s;\n    transition: all 0.3s ease 0s;\n    position: absolute;\n    left: 50%;\n    bottom: 0;\n    -webkit-transform: translate(-50%, 50%);\n            transform: translate(-50%, 50%);\n    outline: 0;\n    cursor: pointer;\n}\n@media screen and (max-width:1310px){\n    .trending_right_ul{\n        width: 100%;\n    }\n}\n@media screen and (max-width:1199px){\n    .inner-banner .slider h1 {\n        font-size: 35px;\n    }\n}\n@media only screen and (max-width: 960px) and (min-width: 768px){\n   .trending_right_ul {\n        width: auto;\n        right: 0;\n        left: auto;\n    } \n    .by_simply_willed_text{\n        font-size: 14px;\n    }\n}\n@media screen and (max-width: 960px){\n    .trending_right_ul {\n        width: 100%;\n        bottom: -40px;\n    }\n}\n@media screen and (max-width: 960px){\n    .trending_ul > li{\n        margin-bottom: 80px;\n    }\n}\n@media screen and (max-width: 767px){\n    .inner-banner img {\n        display: none;\n    }\n    .inner-banner img.mobile-banner {\n        display: block;\n    }\n    .inner-banner .slider h1{\n        font-size: 34px;\n    }\n}\n@media only screen and (max-width: 480px) and (min-width: 100px){\n    .trending_ul > li {\n        padding-bottom: 0;\n    }\n    .heaser_sec2_slider {\n        margin-top: 0;\n    }\n}\n@media screen and (max-width: 400px){\n    .inner-banner .slider h1{\n        font-size: 30px;\n    }\n}"

/***/ }),

/***/ "./src/app/user/blog/blog.component.html":
/***/ (function(module, exports) {

module.exports = "\n<div class=\"heaser_sec2_slider inner-banner\">\n    <div class=\"slider\">\n        <img src=\"../../../../assets/images/blog-banner.png\">\n        <img src=\"../../../../assets/images/blog-mobile-banner.png\" class=\"mobile-banner\">\n        <h1>Brush up on your estate planning knowledge with these helpful articles and guides</h1>\n    </div>\n</div>\n<div class=\"body_container\">\n  <div class=\"wrapper\">\n    <div class=\"trending_main\">\n      <div class=\"trending_left\">\n        <ul class=\"trending_ul\">\n            <li *ngIf=\"!blogList.length\">No posts found !</li>\n          <li *ngFor=\"let blog of blogList | paginate: { itemsPerPage: 10, currentPage: p }\">\n              <a routerLink=\"/blogdetails/{{blog.slug}}\" class=\"trending_img\"><img src=\"{{imageLink}}{{blog.image}}\" alt=\"{{blog.image}}\"></a>\n            <h1 class=\"news_heading\">{{blog.title}}</h1>\n            <ul class=\"trending_sub_left_ul\">\n              <li>\n                <span class=\"news_owl\"><img src=\"../../../../assets/images/news_owl.png\" alt=\"error img\"></span>\n                <span class=\"by_simply_willed_text\">By Simply<span>Willed</span></span>\n              </li>\n              <li>\n                <span class=\"by_simply_willed_text\">{{blog.created_at | date  }}</span>\n              </li>\n              <li>\n                <span class=\"by_simply_willed_text\">{{blog.get_comments.length}} comments</span>\n              </li>\n            </ul>\n            <ul class=\"trending_right_ul\">\n              <li><a href=\"#\">Share:</a></li>\n              <li><a href=\"#\" title=\"Twitter\"><img src=\"../../../../assets/images/twitter-icon.png\"></a></li>\n              <li><a href=\"#\" title=\"Facebook\"><img src=\"../../../../assets/images/facebook-icon.png\"></a></li>\n              <li><a href=\"#\" title=\"Google-plus\"><img src=\"../../../../assets/images/gplus-icon.png\"></a></li>\n              <li><a href=\"#\" title=\"Vimeo\"><img src=\"../../../../assets/images/vimeo-icon.png\"></a></li>\n              <li><a href=\"#\" title=\"Skype\"><img src=\"../../../../assets/images/skype-icon.png\"></a></li>\n              <li><a href=\"#\" title=\"Linkedin\"><img src=\"../../../../assets/images/linkedin-icon.png\"></a></li>\n            </ul>\n            <p class=\"legal_requirement\" innerHTML=\"{{ blog.body | slice:0:650 }}\"></p>\n            <a class=\"btn-green\" routerLink=\"/blogdetails/{{blog.slug}}\" ><img src=\"../../../../assets/images/arrow-right.png\"> Read More</a>\n          </li>\n        </ul>\n          <pagination-controls class=\"older_post_text\"\n                                (pageChange)=\"p=$event\"\n                                maxSize=\"9\"\n                                directionLinks=\"true\"\n                                autoHide=\"true\"\n                                previousLabel=\"NEWER POSTS\"\n                                nextLabel=\"OLDER POSTS\"\n                                screenReaderPaginationLabel=\"OLDER POSTS\"\n                                screenReaderPageLabel=\"page\"\n                                screenReaderCurrentLabel=\"You're on page\">\n          </pagination-controls>\n      </div>\n      <div class=\"trending_right_main\">\n        <h2 class=\"subscribe_text_main\"><span class=\"subscribe_text\">SUBSCRIBE</span></h2>\n        <form novalidate [formGroup]=\"subscriberEmailForm\" (ngSubmit)=\"onSubmit()\">\n          <div class=\"subscribe_form_main\">\n              <input type=\"email\" class=\"subscribe_mail\" formControlName=\"subscriberEmail\" placeholder=\"Your email address\">\n              <div class=\"form-control-feedback\"\n                   *ngIf=\"subscriberEmail.errors && (subscriberEmail.dirty || subscriberEmail.touched)\">\n                  <p *ngIf=\"subscriberEmail.errors\">The email address must contain at least the @ character</p>\n              </div>\n            <input type=\"submit\" class=\"btn-green\" value=\"Subscribe\">\n          </div>\n        </form>\n        <h2 class=\"subscribe_text_main\"><span class=\"subscribe_text\">CATEGORIES</span></h2>\n          <span *ngIf=\"!blogCategoryList.length\">No category found !</span>\n        <ul class=\"cat_ul\" *ngFor=\"let category of blogCategoryList\">\n          <li><a routerLink=\"/category/{{category.slug}}\">{{category.name}} &nbsp;<span> ({{category.blogCount}})</span></a></li>\n        </ul>\n        <h2 class=\"subscribe_text_main\"><span class=\"subscribe_text\">POPULAR POSTS </span></h2>\n        <ul class=\"post_ul\">\n            <li *ngIf=\"!popularBlogPost.length\">No popular post found !</li>\n          <li *ngFor=\"let popularPost of popularBlogPost\">\n            <a routerLink=\"/blogdetails/{{popularPost.slug}}\" class=\"post_img\"><img src=\"{{imageLink}}{{popularPost.image}}\"></a>\n            <div class=\"post_right_main\">\n              <a routerLink=\"/blogdetails/{{popularPost.slug}}\" class=\"post_heading\">{{popularPost.title}}</a>\n              <h4 class=\"healthcare_text\">{{popularPost.categoryNames}}</h4>\n            </div>\n          </li>\n        </ul>\n\n          <h2 class=\"subscribe_text_main\"><span class=\"subscribe_text\">RECENT POSTS </span></h2>\n          <ul class=\"post_ul\">\n              <li *ngIf=\"!recentBlogPost.length\">No recent post found !</li>\n              <li *ngFor=\"let popularPost of recentBlogPost\">\n                  <a routerLink=\"/blogdetails/{{popularPost.slug}}\" class=\"post_img\"><img src=\"{{imageLink}}{{popularPost.image}}\"></a>\n                  <div class=\"post_right_main\">\n                      <a routerLink=\"/blogdetails/{{popularPost.slug}}\" class=\"post_heading\">{{popularPost.title}}</a>\n                      <h4 class=\"healthcare_text\">{{popularPost.categoryNames}}</h4>\n                  </div>\n              </li>\n          </ul>\n\n      </div>\n    </div>\n  </div>\n  <div class=\"about_sec4\">\n    <div class=\"wrapper\">\n      <h1 class=\"about_state_planning_text\">Estate Planning Made Simple &amp; Affordable.</h1>\n      <h4 class=\"select_plan\">Select your plan now and Keep your loved ones safe!</h4>\n      <button class=\"btn-green\" type=\"button\"><img src=\"../../../../assets/images/arrow-right.png\"> get started</button>\n    </div>\n  </div>\n</div>"

/***/ }),

/***/ "./src/app/user/blog/blog.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return BlogComponent; });
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


var BlogComponent = /** @class */ (function () {
    function BlogComponent() {
        this.blogList = [];
        this.blogCategoryList = [];
        this.popularBlogPost = [];
        this.recentBlogPost = [];
    }
    BlogComponent.prototype.ngOnInit = function () {
        this.p = 1;
        this.populateBlog();
        this.populateBlogCategory();
        this.populatePopularBlogPosts();
        this.populateRecentBlogPosts();
        this.createFormControls();
        this.createForm();
    };
    BlogComponent.prototype.populateBlog = function () {
        var _this = this;
        this.BlogService.blogList().subscribe(function (data) {
            _this.blogList = data.data.BlogDetails;
            _this.imageLink = data.data.imageLink;
        });
    };
    BlogComponent.prototype.populateBlogCategory = function () {
        var _this = this;
        this.BlogService.getBlogCategoryList().subscribe(function (data) {
            _this.blogCategoryList = data.data.categories;
        });
    };
    BlogComponent.prototype.populatePopularBlogPosts = function () {
        var _this = this;
        this.BlogService.getPopularBlogPosts().subscribe(function (data) {
            var list = [];
            data.data.forEach(function (value) {
                list.push(value.blog);
            });
            _this.popularBlogPost = list;
        });
    };
    BlogComponent.prototype.populateRecentBlogPosts = function () {
        var _this = this;
        this.BlogService.getRecentBlogPosts().subscribe(function (data) {
            var list = [];
            data.data.forEach(function (value) {
                list.push(value.blog);
            });
            _this.recentBlogPost = list;
        });
    };
    BlogComponent.prototype.createFormControls = function () {
        this.subscriberEmailForm = new __WEBPACK_IMPORTED_MODULE_1__angular_forms__["FormControl"]();
        this.subscriberEmail = new __WEBPACK_IMPORTED_MODULE_1__angular_forms__["FormControl"]('', [
            __WEBPACK_IMPORTED_MODULE_1__angular_forms__["Validators"].required,
            __WEBPACK_IMPORTED_MODULE_1__angular_forms__["Validators"].pattern('[^ @]*@[^ @]*')
        ]);
    };
    BlogComponent.prototype.createForm = function () {
        this.subscriberEmailForm = new __WEBPACK_IMPORTED_MODULE_1__angular_forms__["FormGroup"]({
            subscriberEmail: this.subscriberEmail
        });
    };
    BlogComponent.prototype.onSubmit = function () {
        var _this = this;
        if (this.subscriberEmailForm.valid) {
            this.BlogService.subscribeEmailNewsletter(this.subscriberEmailForm.value).subscribe(function (data) {
                if (data.status = 'true') {
                    alert(data.message);
                    _this.subscriberEmailForm.reset();
                }
            });
        }
    };
    BlogComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            selector: 'app-blog',
            template: __webpack_require__("./src/app/user/blog/blog.component.html"),
            styles: [__webpack_require__("./src/app/user/blog/blog.component.css")]
        }),
        __metadata("design:paramtypes", [])
    ], BlogComponent);
    return BlogComponent;
}());



/***/ }),

/***/ "./src/app/user/blog/blog.service.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return BlogService; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_common_http__ = __webpack_require__("./node_modules/@angular/common/esm5/http.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__environments_environment_prod__ = __webpack_require__("./src/environments/environment.prod.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};



var BlogService = /** @class */ (function () {
    function BlogService(httpClient) {
        this.httpClient = httpClient;
    }
    BlogService.prototype.blogList = function () {
        return this.httpClient.get(__WEBPACK_IMPORTED_MODULE_2__environments_environment_prod__["a" /* environment */].API_URL + 'user/blog-list');
    };
    BlogService.prototype.getBlogDetails = function (slug) {
        return this.httpClient.get(__WEBPACK_IMPORTED_MODULE_2__environments_environment_prod__["a" /* environment */].API_URL + 'user/view-blog/?query=' + slug);
    };
    BlogService.prototype.getBlogCategoryList = function () {
        return this.httpClient.get(__WEBPACK_IMPORTED_MODULE_2__environments_environment_prod__["a" /* environment */].API_URL + 'user/blog-category-list');
    };
    BlogService.prototype.getBlogDetailsFromCategory = function (slug) {
        return this.httpClient.get(__WEBPACK_IMPORTED_MODULE_2__environments_environment_prod__["a" /* environment */].API_URL + 'user/get-blog-details/?query=' + slug);
    };
    BlogService.prototype.getPopularBlogPosts = function () {
        return this.httpClient.get(__WEBPACK_IMPORTED_MODULE_2__environments_environment_prod__["a" /* environment */].API_URL + 'user/popular-post');
    };
    BlogService.prototype.getRecentBlogPosts = function () {
        return this.httpClient.get(__WEBPACK_IMPORTED_MODULE_2__environments_environment_prod__["a" /* environment */].API_URL + 'user/latest-post');
    };
    BlogService.prototype.makeBlogComment = function (commentData) {
        return this.httpClient.post(__WEBPACK_IMPORTED_MODULE_2__environments_environment_prod__["a" /* environment */].API_URL + 'user/comment', commentData);
    };
    BlogService.prototype.subscribeEmailNewsletter = function (subscriberEmail) {
        return this.httpClient.post(__WEBPACK_IMPORTED_MODULE_2__environments_environment_prod__["a" /* environment */].API_URL + 'user/create-newsletter-subscriber', subscriberEmail);
    };
    BlogService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Injectable"])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_common_http__["b" /* HttpClient */]])
    ], BlogService);
    return BlogService;
}());



/***/ }),

/***/ "./src/app/user/blog/blogdetails/blogdetails.component.css":
/***/ (function(module, exports) {

module.exports = ".about_sec4{\n    position: relative;\n}\n.btn-green{\n    width: 180px;\n    text-align: center;\n    color: #fff;\n    background: -webkit-gradient(linear, left top, left bottom, from(#53ba3c), to(#3fa62e));\n    background: linear-gradient(#53ba3c, #3fa62e);\n    border: 2px solid #fff;\n    font-family: 'OpenSans';\n    font-size: 22px;\n    padding: 10px 0px;\n    border-radius: 10px;\n    text-shadow: 2px 2px 1px rgba(0,0,0,0.2);\n    -webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,0.4);\n            box-shadow: inset 0 1px 0 rgba(255,255,255,0.4);\n    -webkit-transition: all 0.3s ease 0s;\n    transition: all 0.3s ease 0s;\n    position: absolute;\n    left: 50%;\n    bottom: 0;\n    -webkit-transform: translate(-50%, 50%);\n            transform: translate(-50%, 50%);\n    outline: 0;\n    cursor: pointer;\n}\n.comments_text{\n    margin-top: 32px;\n}\n.from_main2{\n    margin-bottom: 50px;\n}\n.relative{\n    display: inline-block;\n    width: 100%;\n    position: relative;\n    padding-bottom: 80px;\n}\n.blogCommentSec h2{\n    font-size: 20px;\n    line-height: 30px;\n    color: #000;\n    position: relative;\n    padding: 5px 25px;\n    display: inline-block;\n    width: 100%;\n    border-left: 5px solid #4db228;\n    position: relative;\n    margin-bottom: 32px;\n}\n.blogCommentSec h2:before{\n    content: \"\";\n    position: absolute;\n    height: 100%;\n    width: 1px;\n    left: 2px;\n    top: 0;\n    background: #4db228;\n}\n.commentImg{\n    width: 150px;\n    float: left;\n    text-align: center;\n}\n.commentImg img{\n    display: inline;\n    max-height: 90px;\n}\n.commentMain{\n    float: right;\n    width: calc(100% - 180px);\n}\n.commentHead span{\n    font-size: 16px;\n    color: #333;\n}\n.commentHead span.commentDate{\n    color: #666;\n}\n.commentEmail{\n    font-size: 14px;\n    color: #666;\n    padding: 5px 0;\n}\n.commentRow{\n    border-bottom: 1px solid #f2f2f2;\n    margin-bottom: 20px;\n    display: inline-block;\n    width: 100%;\n}\n.commentRow:last-child{\n    border-bottom: 0;\n}\n@media screen and (max-width:540px){\n    .commentImg{\n        width: 60px;\n    }\n    .commentImg img{\n        max-height: 40px;\n    }\n    .commentMain{\n        width: calc(100% - 70px);\n    }\n}"

/***/ }),

/***/ "./src/app/user/blog/blogdetails/blogdetails.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"body_container\">\n  <div class=\"wrapper\">\n    <div class=\"trending_main\">\n      <div class=\"relative\" *ngIf=\"blogDetails\">\n        <span class=\"single_post\"><img src=\"{{imageLink}}{{blogDetails.image}}\" alt=\"{{blogDetails.image}}\"></span>\n        <h1 class=\"why_do_need_will\">{{blogDetails.title}}</h1>\n        <ul class=\"trending_sub_left_ul\">\n          <li>\n            <span class=\"news_owl\"><img src=\"../../../../assets/images/news_owl.png\" alt=\"error img\"></span>\n            <span class=\"by_simply_willed_text\">By Simply<span>Willed</span></span>\n          </li>\n          <li>\n            <span class=\"by_simply_willed_text\">{{blogDetails.created_at}}</span>\n          </li>\n          <li>\n            <span class=\"by_simply_willed_text\">{{blogDetails.get_comments.length}} comments</span>\n          </li>\n        </ul>\n        <ul class=\"trending_right_ul\">\n          <li><a href=\"#\">Share:</a></li>\n          <li><a href=\"#\" title=\"Twitter\"><img src=\"../../../../assets/images/twitter-icon.png\"></a></li>\n          <li><a href=\"#\" title=\"Facebook\"><img src=\"../../../../assets/images/facebook-icon.png\"></a></li>\n          <li><a href=\"#\" title=\"Google-plus\"><img src=\"../../../../assets/images/gplus-icon.png\"></a></li>\n          <li><a href=\"#\" title=\"Vimeo\"><img src=\"../../../../assets/images/vimeo-icon.png\"></a></li>\n          <li><a href=\"#\" title=\"Skype\"><img src=\"../../../../assets/images/skype-icon.png\"></a></li>\n          <li><a href=\"#\" title=\"Linkedin\"><img src=\"../../../../assets/images/linkedin-icon.png\"></a></li>\n        </ul>\n          <div class='col-md-12 blogContainer' [innerHTML]=\"blogDetails.body\"> </div>\n      </div>\n      <h3 class=\"comments_text\" *ngIf=\"blogDetails?.get_comments.length == 0\">No Comments</h3>\n      <div *ngIf=\"blogDetails?.get_comments.length != 0\" class=\"blogCommentSec\">\n        <h2>Comments</h2>\n        <div class=\"commentArea\">\n            <div class=\"commentRow\" *ngFor=\"let comment of blogDetails?.get_comments\">\n              <div class=\"commentImg\">\n                <img src=\"../../../../assets/images/commentImg.png\" alt=\"\">\n              </div>\n              <div class=\"commentMain\">\n                <div class=\"commentHead\">\n                  <span class=\"commentUBy\">{{comment.name}} / </span>\n                  <span class=\"commentDate\">{{comment.created_at  | date  }}</span>\n                </div>\n                <div class=\"commentEmail\">{{comment.email}}</div>\n                <div class=\"commentBody\">\n                  <p>{{comment.message}}</p>\n                </div>\n              </div>\n            </div>\n        </div>\n      </div>\n        <form novalidate [formGroup]=\"commentForm\" (ngSubmit)=\"onSubmit()\">\n            <input type=\"hidden\" class=\"form-control\" formControlName=\"blogId\" [(ngModel)]=\"BlogId\">\n        <div class=\"from_main2\">\n          <h3 class=\"post_comment_text\">POST a COMMENT: </h3>\n          <ul class=\"form2_ul\">\n            <li>\n                <input type=\"text\" class=\"form-control\" formControlName=\"name\" placeholder=\"Your name\">\n                <div class=\"form-control-feedback\"\n                     *ngIf=\"name.errors && (name.dirty || name.touched)\">\n                    <p *ngIf=\"name.errors\">Name is required</p>\n                </div>\n            </li>\n            <li>\n                <input type=\"text\" class=\"form-control\" formControlName=\"email\" placeholder=\"Your email\">\n                <div class=\"form-control-feedback\"\n                     *ngIf=\"email.errors && (email.dirty || email.touched)\">\n                    <p *ngIf=\"email.errors\">The email address must contain at least the @ character</p>\n                </div>\n            </li>\n            <li>\n                <textarea formControlName=\"message\" cols=\"30\" rows=\"10\"  placeholder=\"Your Comment\"></textarea>\n            </li>\n          </ul>\n            <button type=\"submit\" class=\"form2_submit\" >Submit</button>\n        </div>\n      </form>\n\n    </div>\n  </div>\n  <div class=\"about_sec4\">\n    <div class=\"wrapper\">\n      <h1 class=\"about_state_planning_text\">Estate Planning Made Simple &amp; Affordable.</h1>\n      <h4 class=\"select_plan\">Select your plan now and Keep your loved ones safe!</h4>\n      <button class=\"btn-green\" type=\"button\"><img src=\"../../../../assets/images/arrow-right.png\"> get started</button>\n    </div>\n  </div>\n</div>"

/***/ }),

/***/ "./src/app/user/blog/blogdetails/blogdetails.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return BlogdetailsComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__blog_service__ = __webpack_require__("./src/app/user/blog/blog.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__angular_forms__ = __webpack_require__("./node_modules/@angular/forms/esm5/forms.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};




var BlogdetailsComponent = /** @class */ (function () {
    function BlogdetailsComponent(router, route, BlogService) {
        this.router = router;
        this.route = route;
        this.BlogService = BlogService;
    }
    BlogdetailsComponent.prototype.ngOnInit = function () {
        this.getBlogDetails();
        this.createFormControls();
        this.createForm();
    };
    BlogdetailsComponent.prototype.getBlogDetails = function () {
        var _this = this;
        var slug = this.route.snapshot.paramMap.get('slug');
        this.BlogService.getBlogDetails(slug).subscribe(function (data) {
            _this.blogDetails = data.data.blog;
            _this.imageLink = data.data.imageLink;
            _this.BlogId = data.data.blog.id;
        });
    };
    BlogdetailsComponent.prototype.createFormControls = function () {
        this.commentForm = new __WEBPACK_IMPORTED_MODULE_3__angular_forms__["FormControl"]();
        this.blogId = new __WEBPACK_IMPORTED_MODULE_3__angular_forms__["FormControl"]();
        this.name = new __WEBPACK_IMPORTED_MODULE_3__angular_forms__["FormControl"]('', __WEBPACK_IMPORTED_MODULE_3__angular_forms__["Validators"].required);
        this.message = new __WEBPACK_IMPORTED_MODULE_3__angular_forms__["FormControl"]('', __WEBPACK_IMPORTED_MODULE_3__angular_forms__["Validators"].required);
        this.email = new __WEBPACK_IMPORTED_MODULE_3__angular_forms__["FormControl"]('', [
            __WEBPACK_IMPORTED_MODULE_3__angular_forms__["Validators"].required,
            __WEBPACK_IMPORTED_MODULE_3__angular_forms__["Validators"].pattern("[^ @]*@[^ @]*")
        ]);
    };
    BlogdetailsComponent.prototype.createForm = function () {
        this.commentForm = new __WEBPACK_IMPORTED_MODULE_3__angular_forms__["FormGroup"]({
            blogId: this.blogId,
            name: this.name,
            email: this.email,
            message: this.message
        });
    };
    BlogdetailsComponent.prototype.onSubmit = function () {
        var _this = this;
        if (this.commentForm.valid) {
            this.BlogService.makeBlogComment(this.commentForm.value).subscribe(function (response) {
                if (response.status = 'true') {
                    _this.createBlogCommentMessage = response.message;
                    alert(_this.createBlogCommentMessage);
                    _this.commentForm.reset();
                    _this.getBlogDetails();
                }
                else {
                    _this.createBlogCommentMessage = response.message;
                    alert(_this.createBlogCommentMessage);
                }
            });
        }
    };
    BlogdetailsComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            selector: 'app-blogdetails',
            template: __webpack_require__("./src/app/user/blog/blogdetails/blogdetails.component.html"),
            styles: [__webpack_require__("./src/app/user/blog/blogdetails/blogdetails.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_router__["d" /* Router */],
            __WEBPACK_IMPORTED_MODULE_1__angular_router__["a" /* ActivatedRoute */],
            __WEBPACK_IMPORTED_MODULE_2__blog_service__["a" /* BlogService */]])
    ], BlogdetailsComponent);
    return BlogdetailsComponent;
}());



/***/ }),

/***/ "./src/app/user/contact-us/contact-us.component.css":
/***/ (function(module, exports) {

module.exports = ".body_container{\n    margin-top: -33px;\n}\n.inner_banner{\n    background-image: url('contactusbanner.135116dbaf398c41fea0.png');\n    -webkit-box-shadow: inset 0 5px 14px rgba(0,0,0,0.2);\n            box-shadow: inset 0 5px 14px rgba(0,0,0,0.2);\n}\n.banner_heading_two{\n    color:#fff;\n}\n.contact_social_media{\n    margin-bottom: 0;\n}\n.contact_left_heading{\n    padding: 25px 20px;\n}\n.alert{\n    clear: both;\n}\n@media screen and (max-width:600px){\n    .inner_banner{\n        background-image: url('contactusbannerMobile.00b19ab437d1bb2624d5.png');\n        height: 400px;\n    }\n    .inner_banner .wrapper{\n        display: inline-block;\n        padding-top: 100px;\n    }\n    .banner_heading_one {\n        font-size: 34px;\n        display: inline;\n    }\n    .banner_heading_two {\n        font-size: 34px;\n        display: inline;\n    }\n}\n@media screen and (max-width:480px){\n    .body_container{\n        margin-top: -1px;\n    }\n    .banner_heading_one {\n        font-size: 30px;\n    }\n    .banner_heading_two {\n        font-size: 30px;\n    }\n}"

/***/ }),

/***/ "./src/app/user/contact-us/contact-us.component.html":
/***/ (function(module, exports) {

module.exports = "\n  <div class=\"body_container\">\n    <div class=\"inner_banner\">\n      <div class=\"wrapper\">\n        <h1 class=\"banner_heading_one\">At SimplyWilled our mission is to make</h1>\n        <h3 class=\"banner_heading_two\">estate planning simple and affordable for everyone</h3>\n      </div>\n    </div>\n    <div class=\"about_sec1 grey_bg border_top_green\">\n      <div class=\"wrapper\">\n        <div class=\"contact_new_main\">\n          <div class=\"contact_left\">\n            <h1 class=\"contact_left_heading\">Contact Us</h1>\n            <ul class=\"contact_social_main_ul\">\n              <li>support@simplywilled.com</li>\n              <li>1-855-965-1789</li>\n            </ul>\n            <ul class=\"contact_social_media\">\n              <li><a href=\"https://www.facebook.com/SimplyWilled\" class=\"fb_hover\"><i class=\"fa fa-facebook\" aria-hidden=\"true\"></i></a></li>\n              <li><a href=\"https://twitter.com/simplywilled\" class=\"tw_hover\"><i class=\"fa fa-twitter\" aria-hidden=\"true\"></i></a></li>\n              <li><a href=\"#\" class=\"gplus_hover\"><i class=\"fa fa-google-plus\" aria-hidden=\"true\"></i></a></li>\n              <li><a href=\"#\" class=\"pintrst_hover\"><i class=\"fa fa-pinterest-p\" aria-hidden=\"true\"></i></a></li>\n            </ul>\n          </div>\n          <div class=\"contact_right_sec\">\n            <h1 class=\"get_touch_text\">Get in Touch</h1>\n            <p class=\"get_in_tuch_sub_heading\">Feel free to drop us a line below!</p>\n            <form #form=\"ngForm\">\n              <div class=\"form-group\">\n                  <input type=\"text\" placeholder=\"Your Name\" id=\"name\" [(ngModel)]=\"formData.name\" ngModel #name=\"ngModel\" required  name=\"name\" class=\"get_in_tuch_field\">\n                    <div *ngIf=\"name.invalid && name.touched\" class=\"alert alert-danger\"> Name is reqired ! </div>\n              </div>\n              <div class=\"form-group\">\n                <input type=\"email\" name=\"email\"\n                     [(ngModel)]=\"formData.email\" ngModel #email=\"ngModel\"\n                     required placeholder=\"Your Email\" class=\"get_in_tuch_field\"\n                     pattern=\"[a-z0-9._%+-]+@[a-z0-9.-]+\\.[a-z]{2,3}$\">\n                <div *ngIf=\"email.invalid && email.touched\" class=\"alert alert-danger\">Email is required</div>\n                <div *ngIf=\"email.errors?.pattern\" class=\"alert alert-danger\">This is not a email format</div>\n\n              </div>\n              <div class=\"form-group\">\n                    <textarea placeholder=\"Message\" class=\"get_in_tuch_textarea\" [(ngModel)]=\"formData.message\" ngModel #message=\"ngModel\" required name=\"message\"></textarea>\n                <div *ngIf=\"message.invalid && message.touched\" class=\"alert alert-danger\"> Message is reqired ! </div>\n              </div>\n              <p class=\"contactbtn_area\" style=\"margin-top:10px;\">\n                  <i *ngIf=\"showLoader\" class=\"fa fa-spinner fa-pulse fa-lg fa-fw\"></i>\n                  <button type=\"button\" [disabled]=\"!form.form.valid\" class=\"get_in_tuch_btn\" (click)=\"contactUs()\"><i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i> Send Message</button>\n              </p>\n            </form>\n              <div class=\"alert alert-danger\" [style.display]=\"respMessage == '' ? 'none' : 'block'\">{{respMessage}}</div>\n          </div>\n        </div>\n      </div>\n    </div>\n  </div>"

/***/ }),

/***/ "./src/app/user/contact-us/contact-us.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ContactUsComponent; });
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



var ContactUsComponent = /** @class */ (function () {
    function ContactUsComponent(userService, router) {
        this.userService = userService;
        this.router = router;
    }
    ContactUsComponent.prototype.ngOnInit = function () {
        this.formData = {
            name: '',
            email: '',
            message: ''
        };
        this.respMessage = '';
        this.showLoader = false;
    };
    ContactUsComponent.prototype.contactUs = function () {
        var _this = this;
        this.showLoader = true;
        this.userService.contactUs(this.formData).subscribe(function (data) {
            _this.showLoader = false;
            _this.respMessage = data.message;
            setTimeout(function () {
                _this.router.navigate(['/']);
            }, 1000);
        }, function (error) {
            _this.showLoader = false;
            _this.respMessage = error.error.message;
        });
    };
    ContactUsComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            selector: 'app-contact-us',
            template: __webpack_require__("./src/app/user/contact-us/contact-us.component.html"),
            styles: [__webpack_require__("./src/app/user/contact-us/contact-us.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__user_service__["a" /* UserService */],
            __WEBPACK_IMPORTED_MODULE_2__angular_router__["d" /* Router */]])
    ], ContactUsComponent);
    return ContactUsComponent;
}());



/***/ }),

/***/ "./src/app/user/faq/faq.component.css":
/***/ (function(module, exports) {

module.exports = ".sidebar-left h2{\n    margin-bottom: 0;\n}\n.faqName{\n    display: block;\n}\n.accordion-mobile li{\n    padding: 0 16px;\n}\n.accordion-mobile li .open-accordion{\n    display: none;\n}\n.accordion-mobile li.active .open-accordion{\n    display: block;\n}\n.accordion-mobile .statement{\n    margin-bottom: 0;\n}\n.each-statement.active p{\n    padding: 10px;\n}\n.each-statement .statement p{\n    margin: 16px 0 !important;\n    padding: 10px;\n}\n.accordion-mobile .each-statement .statement p{\n    margin:  0 !important;\n    padding: 0;\n}\n@media screen and (max-width: 767px){\n   .inner-banner h1 span{\n        display: inline !important;\n    } \n}\n@media screen and (max-width: 400px){\n    .inner-banner h1{\n         font-size: 30px !important;\n     } \n }\n"

/***/ }),

/***/ "./src/app/user/faq/faq.component.html":
/***/ (function(module, exports) {

module.exports = "\n    <!-- <div class=\"slider\">\n        <img src=\"../../../../assets/images/faq-banner.png\">\n        <img src=\"../../../../assets/images/faq-mobile-banner.png\" class=\"mobile-banner\">\n        <h1>Welcome to the SimplyWilled library, <span>your free learning resource center.</span></h1>\n    </div> -->\n    <div class=\"heaser_sec2_slider inner-banner\">\n        <div class=\"slider\">\n            <img src=\"../../../../assets/images/faq-banner.png\">\n            <img src=\"../../../../assets/images/faq-mobile-banner.png\" class=\"mobile-banner\">\n            <h1>Welcome to the SimplyWilled library, <span>your free learning resource center.</span></h1>\n        </div>\n    </div>\n    <div class=\"body_container faq\">\n    \t<div class=\"about_sec1\">\n        \t<div class=\"wrapper text-center\">\n            \t<form id=\"faqSearch\" #form=\"ngForm\" (ngSubmit)=\"onSubmit(form)\">\n                        <input type=\"text\" placeholder=\"Write your question here\" name=\"search\" ngModel #search=ngModel class=\"form-control\">\n                        <button class=\"btn-green\" type='submit' ><img src=\"../../../../assets/images/arrow-right.png\" > Ask the Owl!</button>    \n                </form>\n                    \n                <div class=\"accordion\">\n                    <div class=\"sidebar-left\">\n                        <h2>Topic</h2>\n                        <ul>\n                            <li *ngFor=\"let faq of faqData; let i = index\" \n                                (click)=\"getQuestions(faqData,i)\" \n                                [ngClass] = \"{active: counter == i}\">\n                                    {{ faq.name }}\n                            </li>\n                        </ul>\n                    </div>\n                    <div class=\"main-content\">\n                        <div class=\"each-statement\" *ngFor=\"let eachFaq of faqDetails; let i = index\" [ngClass] = \"{active: innerCounter == i}\">\n                            <div (click)=\"showOrHideAnswers(eachFaq,i)\" class=\"statement\">\n                                <span class=\"plus\">\n                                    <img src=\"../../../../assets/images/plus.png\">\n                                </span>\n                                <span class=\"minus\">\n                                    <img src=\"../../../../assets/images/minus.png\">\n                                </span>\n                                <p>{{eachFaq.question}}</p>\n                            </div>\n                            <p>{{eachFaq.answer}}</p>\n                        </div>\n                    </div>\n                </div>\n\n                <div class=\"accordion accordion-mobile\">\n                    <div class=\"sidebar-left\">\n                        <h2>Topic</h2>\n                        <ul>\n                            <li *ngFor=\"let faq of faqData; let i = index\" \n                                (click)=\"getQuestions(faqData,i)\" \n                                [ngClass] = \"{active: counter == i}\">\n                                    <span class=\"faqName\">{{ faq.name }}</span>\n                                    <div class=\"open-accordion\">\n                                        <div class=\"each-statement\"  *ngFor=\"let eachFaq of faqDetails; let j = index\" \n                                        [ngClass] = \"{active: j == innerCounterSm}\"\n                                        (click)=\"showOrHideAnswers(eachFaq,j)\">\n                                            <div class=\"statement\">\n                                                <span class=\"plus\">\n                                                    <img src=\"../../../../assets/images/plus.png\">\n                                                </span>\n                                                <span class=\"minus\">\n                                                    <img src=\"../../../../assets/images/minus.png\">\n                                                </span>\n                                                <p>{{eachFaq.question}} - {{innerCounter}}</p>\n                                            </div>\n                                            <p>{{eachFaq.answer}}</p>\n                                        </div>    \n                                    </div>\n                            </li>\n                        </ul>\n                    </div>\n                </div>\n            </div>\n            <div class=\"clear\"></div>\n            <div class=\"estate-planning\">\n                <div class=\"wrapper text-center\">\n                    <h2>estate planning made simple & affordable.</h2>\n                    <p>Select your plan now and keep your loved ones safe!</p>\n                    <button class=\"btn-green\" type=\"button\"><img src=\"../../../../assets/images/arrow-right.png\"> get started</button>\n                </div>\n            </div>\n        </div>\n    </div>\n    \n"

/***/ }),

/***/ "./src/app/user/faq/faq.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return FaqComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__faq_service__ = __webpack_require__("./src/app/user/faq/faq.service.ts");
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



var FaqComponent = /** @class */ (function () {
    function FaqComponent(faqService, router, _route) {
        this.faqService = faqService;
        this.router = router;
        this._route = _route;
        this.faqDetails = []; //holds faq questions and answers for single categories
        this.faqData = []; //holds faq metadata
        this.searchFaqQstn = '';
    }
    FaqComponent.prototype.ngOnInit = function () {
        this.searchFaqQstn = this._route.snapshot.queryParamMap['params'].query;
        console.log(this.searchFaqQstn);
        this.getFaqCategories();
    };
    /* *
    *   Get data object from api
    *   slice that in 2 parts : categories as faqData , q & a from categories as faqDetails
    * */
    FaqComponent.prototype.getFaqCategories = function () {
        var _this = this;
        this._route.params.subscribe(function (params) {
            console.log('params', params);
        });
        this.faqService.getFaqCategories(this.searchFaqQstn).subscribe(function (data) {
            _this.faqData = data.data;
            _this.faqDetails = _this.getQuestions(_this.faqData, 0);
            console.log('faq data', _this.faqData);
        });
    };
    //we have all the necessary question sfrom 1 api
    //so we can loop over the questions in angular
    FaqComponent.prototype.onSubmit = function (formFaqQa) {
        var _this = this;
        console.log('submiting form ', formFaqQa.value.search);
        this.searchFaqQstn = formFaqQa.value.search.split(' ').join('+');
        this.router.navigate(['/faq'], {
            queryParams: {
                query: this.searchFaqQstn
            }
        });
        this.faqService.getFaqCategories(this.searchFaqQstn)
            .subscribe(function (response) {
            if (response.status) {
                _this.faqData = response.data;
                _this.faqDetails = _this.getQuestions(_this.faqData, 0);
                _this.takeMeThere();
            }
            else {
                console.log('error : some err');
            }
        }, function (error) {
            console.log(error);
            setTimeout(function () {
                //this.responseReceived = false;
            }, 5000);
        }, function () {
            //formFaqQa.reset();
        });
    };
    /**
     * This function navigates to the question asked from the data
     * Once the question is reached the div opens and shows up the answer
     */
    FaqComponent.prototype.takeMeThere = function () {
        for (var i in this.faqDetails) {
            if (this.faqDetails[i].question.toLowerCase().trim() === this.searchFaqQstn.toLowerCase().trim()) {
                this.innerCounter = parseInt(i);
                break;
            }
        }
    };
    /* *
    *   Get questions from the data object
    * */
    FaqComponent.prototype.getQuestions = function (faqEachData, count) {
        this.counter = count;
        this.innerCounter = null;
        this.faqDetails = faqEachData[count] !== undefined && faqEachData[count]['faq'] !== undefined ? faqEachData[count]['faq'] : [];
        return this.faqDetails;
    };
    /* *
    *   Hide or show the answer for a question from a single
    *   question based on their related states
    * */
    FaqComponent.prototype.showOrHideAnswers = function (faqDetailsData, index) {
        console.log(index);
        this.innerCounter = this.innerCounter === index ? null : index;
        this.innerCounterSm = this.innerCounterSm === index ? null : index;
        // console.log('faqDetailsData: ',faqDetailsData, 'index : ',index,'innerCounter : ',this.innerCounter);
    };
    FaqComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            selector: 'app-faq',
            template: __webpack_require__("./src/app/user/faq/faq.component.html"),
            styles: [__webpack_require__("./src/app/user/faq/faq.component.css"), __webpack_require__("./src/custom-inner.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__faq_service__["a" /* FaqService */],
            __WEBPACK_IMPORTED_MODULE_2__angular_router__["d" /* Router */],
            __WEBPACK_IMPORTED_MODULE_2__angular_router__["a" /* ActivatedRoute */]])
    ], FaqComponent);
    return FaqComponent;
}());



/***/ }),

/***/ "./src/app/user/faq/faq.service.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return FaqService; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_common_http__ = __webpack_require__("./node_modules/@angular/common/esm5/http.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__environments_environment_prod__ = __webpack_require__("./src/environments/environment.prod.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};



var FaqService = /** @class */ (function () {
    function FaqService(httpClient) {
        this.httpClient = httpClient;
    }
    FaqService.prototype.getFaqCategories = function (search) {
        if (search === void 0) { search = null; }
        console.log('search : ' + search);
        var url = __WEBPACK_IMPORTED_MODULE_2__environments_environment_prod__["a" /* environment */].API_URL + "user/faq-category-list";
        url = search != null ? url + "/?query=" + search : url;
        console.log('url is : ', url);
        return this.httpClient.get(url);
    };
    FaqService.prototype.getFaqQuestions = function () {
        var url = "" + (__WEBPACK_IMPORTED_MODULE_2__environments_environment_prod__["a" /* environment */].API_URL + 'user/all-faq-questions');
        console.log('url is : ', url);
        return this.httpClient.get(url);
    };
    FaqService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Injectable"])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_common_http__["b" /* HttpClient */]])
    ], FaqService);
    return FaqService;
}());



/***/ }),

/***/ "./src/app/user/home/home.component.css":
/***/ (function(module, exports) {

module.exports = ".sec3_btn_main a:hover {\n    background: -webkit-gradient(linear, left top, left bottom, from(#4fb73a), to(#3da12c));\n    background: linear-gradient(#4fb73a, #3da12c);\n    border: 2px solid #fff;\n    color: #fff;\n    text-decoration: none;\n}\n.get_start_btn:hover{\n    background: -webkit-gradient(linear, left top, left bottom, from(#53ba3c), to(#3fa62e));\n    background: linear-gradient(#53ba3c, #3fa62e);\n    border: 1px solid #40a52f;\n    color: #fff;\n    text-decoration: none;\n}\n.book_sec_main .get_start_pkg_btn:hover{\n    color:#fff;\n    text-decoration: none;\n}\n.sec3_btn_main a{\n    color: #fff !important;\n    cursor: pointer;\n}\n.hide_show_main_pkg.open{\n    display: block;\n}\n\n\n\n"

/***/ }),

/***/ "./src/app/user/home/home.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"heaser_sec2_slider\">\n  <div class=\"slider\">\n    <div class=\"flexslider\">\n      <ul class=\"slides\">\n        <li>\n          <div class=\"index_banner\">\n            <div class=\"wrapper\">\n              <h1 class=\"state_planning_text\">Protect what matters most with<br>\n                SimplyWilled.com.</h1>\n              <p>Create your personalized Last Will and Testament today.</p>\n              <ul class=\"index_banner_ul\">\n                <li>Founded By Lawyers</li>\n                <li>Takes Less Than 15 Minutes To Complete</li>\n                <li>Enforceable In All 50 States</li>\n              </ul>\n              <a routerLink=\"/register\" class=\"get_start_btn\"><i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i> Get Started</a>\n            </div>\n          </div>\n        </li>\n      </ul>\n    </div>\n  </div>\n</div>\n<div class=\"body_container\">\n  <div class=\"index_sec1\">\n    <div class=\"wrapper\">\n      <h2 class=\"secHeading\">Safeguard Your Legacy, Assets\n        <br> & Loved Ones.</h2>\n      <div class=\"video_main\" (click)=\"openModal(viewVideo)\">\n        <img src=\"../../../../assets/images/video.png\" alt=\"video img\">\n      </div>\n      <ul class=\"protect_loved_ul\">\n        <li>\n          <span class=\"loved_img\"><img src=\"../../../../assets/images/protect-img.png\" alt=\"protect img\"></span>\n          <div class=\"protect_loved_right\">\n            <h2>PROTECT YOUR LOVED ONES</h2>\n            <p>Name guardians and list beneficiaries so those you love are in good hands.</p>\n          </div>\n        </li>\n        <li>\n          <span class=\"loved_img\"><img src=\"../../../../assets/images/assets.png\" alt=\"protect img\"></span>\n          <div class=\"protect_loved_right\">\n            <h2>PROTECT YOUR ASSETS</h2>\n            <p>Ensure the assets you’ve worked hard for pass to the ones you love.</p>\n          </div>\n        </li>\n        <li>\n          <span class=\"loved_img\"><img src=\"../../../../assets/images/save-time.png\" alt=\"protect img\"></span>\n          <div class=\"protect_loved_right\">\n            <h2>SAVE TIME & MONEY</h2>\n            <p>It takes less than 10 minutes and your done. Try it today and see how simple preparing your estate plan online can be.</p>\n          </div>\n        </li>\n      </ul>\n\n\n    </div>\n  </div>\n  <div class=\"index_sec2\">\n    <div class=\"wrapper\">\n      <span class=\"enforceable_estate\">Enforceable Estate Documents <br>Customized For You</span>\n      <ul class=\"last_will_treatment_ul\">\n        <li>\n          <span class=\"last_will_img\"><img src=\"../../../../assets/images/last-will.png\" alt=\"error img\"></span>\n          <div class=\"last_will_right_sec\">\n            <h3>Last Will & Testament</h3>\n            <p>Draft a personalized Last Will & Testament so your wishes are known. Name your Personal Representative, list beneficiaries and appoint guardians for minor children.</p>\n          </div>\n        </li>\n        <li>\n          <span class=\"last_will_img\"><img src=\"../../../../assets/images/revocable_img.png\" alt=\"error img\"></span>\n          <div class=\"last_will_right_sec\">\n            <h3>Revocable Living Trust</h3>\n            <p>Prepare a personalized revocable living trust so your estate is protected. Appoint a trustee, name beneficiaries and plan out how your estate should be distributed.</p>\n          </div>\n        </li>\n        <li>\n          <span class=\"last_will_img\"><img src=\"../../../../assets/images/living-img.png\" alt=\"error img\"></span>\n          <div class=\"last_will_right_sec\">\n            <h3>Living Will</h3>\n            <p>State your wishes for medical treatment and end-of-life care, in the event of incapacity.</p>\n          </div>\n        </li>\n        <li>\n          <span class=\"last_will_img\"><img src=\"../../../../assets/images/home.png\" alt=\"error img\"></span>\n          <div class=\"last_will_right_sec\">\n            <h3>Home Transfer Deed</h3>\n            <p>Prepare a real property transfer deed to fund your revocable living trust with any real estate you may own to avoid probate later.</p>\n          </div>\n        </li>\n        <li>\n          <span class=\"last_will_img\"><img src=\"../../../../assets/images/power-attorney.png\" alt=\"error img\"></span>\n          <div class=\"last_will_right_sec\">\n            <h3>Financial Power of Attorney</h3>\n            <p>Complete a financial power of attorney and name an individual to oversee your financial affairs in the event you are incapacitated.</p>\n          </div>\n        </li>\n        <li>\n          <span class=\"last_will_img\"><img src=\"../../../../assets/images/healtcare.png\" alt=\"error img\"></span>\n          <div class=\"last_will_right_sec\">\n            <h3>Healthcare Power of Attorney</h3>\n            <p>A healthcare power of attorney and living will so your wishes are known in the event of a medical emergency.</p>\n          </div>\n        </li>\n      </ul>\n    </div>\n  </div>\n  <div class=\"index_sec3\">\n    <div class=\"wrapper\">\n      <h1 class=\"attorney_At_law_text\">Attorneys & Estate Planning Experts <br>Behind Every Choice That We Make</h1>\n      <ul class=\"sec3_planning_ul\">\n        <li>\n          <span class=\"planning_img\"><img src=\"../../../../assets/images/legal-mind.png\" alt=\"error img\"></span>\n          <h4>Renowned Legal Minds</h4>\n          <p>Our service was designed by leading estate planning attorneys with decades of experience.</p>\n        </li>\n        <li>\n          <span class=\"planning_img\"><img src=\"../../../../assets/images/customized.png\" alt=\"error img\"></span>\n          <h4>Customized For All 50 States</h4>\n          <p>Your documents are customized in accordance with your state’s current laws.</p>\n        </li>\n        <li>\n          <span class=\"planning_img\"><img src=\"../../../../assets/images/personalized.png\" alt=\"error img\"></span>\n          <h4>Personalized Just For You</h4>\n          <p>Quickly create documents that are tailored to achieve your needs and objectives.</p>\n        </li>\n      </ul>\n      <span class=\"sec3_btn_main\"><a (click)=\"ourTeam()\"><i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i> Meet Our Team</a></span>\n    </div>\n  </div>\n  <div class=\"index_sec4\">\n    <div class=\"wrapper\">\n      <h1 class=\"proprietary_text\">Proprietary Technology To Keep <br>Your Information Safe</h1>\n      <ul class=\"sec4_ul\">\n        <li>\n          <span class=\"protection_img\"><img src=\"../../../../assets/images/protection-img.png\" alt=\"error img\"></span>\n          <h3 class=\"protection_text\">Data Protection</h3>\n          <p class=\"protection_pera\">Secure servers and SSL encryption protect your sensitive information from unauthorized access and use.</p>\n        </li>\n        <li>\n          <span class=\"protection_img\"><img src=\"../../../../assets/images/privacy-img.png\" alt=\"error img\"></span>\n          <h3 class=\"protection_text\">Privacy Protection</h3>\n          <p class=\"protection_pera\">Your private information is not disclosed to anyone, period.</p>\n        </li>\n        <li>\n          <span class=\"protection_img\"><img src=\"../../../../assets/images/clock.png\" alt=\"error img\"></span>\n          <h3 class=\"protection_text\">Around The Clock Sourveillance</h3>\n          <p class=\"protection_pera\">We are verified and monitored by the world’s leading security experts.</p>\n        </li>\n      </ul>\n      <div class=\"securityBrand\">\n        <img src=\"../../../../assets/images/mcAfee.png\" alt=\"\">\n        <img src=\"../../../../assets/images/norton.png\" alt=\"\">\n      </div>\n    </div>\n  </div>\n  <div class=\"index_sec5\">\n    <div class=\"wrapper\">\n      <div class=\"sec5_left_main\">\n        <h1 class=\"its_easy_text\">It’s As Easy As One, Two, Three!</h1>\n        <ul class=\"sec5_easy_ul\">\n          <li>\n            <span class=\"print_img\"><img src=\"../../../../assets/images/click.png\" alt=\"error img\"></span>\n            <div class=\"print_img_right_sec\">\n              <h3>1. Click</h3>\n              <p>To get started, simply answer a few short questions using our easy to follow estate planning questionnaire.</p>\n            </div>\n          </li>\n          <li>\n            <span class=\"print_img\"><img src=\"../../../../assets/images/print.png\" alt=\"error img\"></span>\n            <div class=\"print_img_right_sec\">\n              <h3>2. Print</h3>\n              <p>Select the documents you want. When you’re ready instantly download and print your custom estate planning documents.</p>\n            </div>\n          </li>\n          <li>\n            <span class=\"print_img\"><img src=\"../../../../assets/images/wxecute.png\" alt=\"error img\"></span>\n            <div class=\"print_img_right_sec\">\n              <h3>3. Execute</h3>\n              <p>Execute your custom estate plan using our simple instructions, and you’re done. It’s that simple.</p>\n            </div>\n          </li>\n        </ul>\n        <div class=\"clear\"></div>\n        <div class=\"BlueBox\">\n          Join the thousands of people that have made their\n          last will and testament using <span>SimplyWilled.com</span>\n        </div>\n      </div>\n\n    </div>\n  </div>\n  <div class=\"index_sec6_pkg\">\n    <div class=\"wrapper\">\n      <h1 class=\"pkg_heading\">Select The Will Package That<br>\n        Is Right For You.</h1>\n      <ul class=\"packages_ul\">\n        <li>\n          <div class=\"pkg_first_sec\">\n            <span class=\"single_pkg\"><img src=\"../../../../assets/images/pkg1.png\" alt=\"error img\"></span>\n            <h3 class=\"single_text_heading\">Single Will</h3>\n            <h4 class=\"pkg_text\">Package</h4>\n            <p class=\"will_package_info\">The Perfect Basic Will Package For An Individual To Get Their Estate In Order.</p>\n          </div>\n          <div class=\"book_sec_main\">\n            <div class=\"book_main\">\n              <span class=\"single_will_book\"><img src=\"../../../../assets/images/single-pkg-book.png\" alt=\"error img\"></span>\n              <h1 class=\"book_price\">$99</h1>\n            </div>\n            <div class=\"clear\"></div>\n            <p class=\"payPal\"><span>Shop With Confidence Powered by</span> <a href=\"#\"><img src=\"../../../../assets/images/paypal-btn.png\" class=\"img-responsive\"></a></p>\n            <a href=\"#\" class=\"get_start_pkg_btn hide_btn\"><i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i> Buy Now</a>\n          </div>\n\n          <div class=\"hide_show_main_pkg\" [ngClass]=\"{'open': whatIncl}\">\n            <span class=\"key_benefits_text\">Key Benefits</span>\n            <ul class=\"pkg_benefits_ul\">\n              <li>\n                <span class=\"faster_text\" >Faster and easier than hiring a lawyer*</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Make a Simple Will & Supporting Documents for you</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Leave property to those you love</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Provide for your children & your estate</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Appoint a guardian for minor children</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Plan for a medical emergency</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Appoint a financial power of attorney</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Make your final wishes known</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Update your plan as often as you wish</span>\n              </li>\n              <li>\n                <span class=\"empty_text\"></span>\n              </li>\n            </ul>\n            <span class=\"whats_included_text\">What’s Included:</span>\n            <ul class=\"include_ul\">\n              <li>\n                <span class=\"faster_text2\">Includes a Complete Set of Documents For 1 Person</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">A Last Will & Testament</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">Healthcare Power of Attorney</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">Durable General Power of Attorney</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">Living Will</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">HIPAA Wavier</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">Burial Instructions</span>\n              </li>\n              <li style=\"border:none;\">\n                <span class=\"empty2\"></span>\n              </li>\n              <li style=\"border:none;\">\n                <span class=\"empty2\"></span>\n              </li>\n            </ul>\n            <a href=\"#\" class=\"get_start_pkg_btn\"><i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i> Buy Now</a>\n          </div>\n          <a href=\"javascript:void(0)\" class=\"include_text\" (click)=\"showIncluded()\">\n            {{whatIncl == true ? 'Hide' : 'See what’s included'}}\n          </a>\n        </li>\n        <li>\n          <div class=\"pkg_first_sec\">\n            <span class=\"single_pkg\"><img src=\"../../../../assets/images/pkg2.png\" alt=\"error img\"></span>\n            <h3 class=\"single_text_heading\">Married Will</h3>\n            <h4 class=\"pkg_text\">Package</h4>\n            <p class=\"will_package_info\">The Perfect Basic Will Package for Married Couples To Get Their Affairs In Order.</p>\n          </div>\n          <div class=\"book_sec_main\">\n            <div class=\"book_main\">\n              <span class=\"single_will_book\"><img src=\"../../../../assets/images/married-pkg-book.png\" alt=\"error img\"></span>\n              <h1 class=\"book_price\">$199</h1>\n            </div>\n            <div class=\"clear\"></div>\n            <p class=\"payPal\"><span>Shop With Confidence Powered by</span> <a href=\"#\"><img src=\"../../../../assets/images/paypal-btn.png\" class=\"img-responsive\"></a></p>\n            <a href=\"#\" class=\"get_start_pkg_btn start_btn_2 hide_btn\"><i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i> Buy Now</a>\n          </div>\n\n          <div class=\"hide_show_main_pkg\" [ngClass]=\"{'open': whatIncl}\">\n            <span class=\"key_benefits_text\">Key Benefits</span>\n            <ul class=\"pkg_benefits_ul after_color1\">\n              <li>\n                <span class=\"faster_text\">Faster and easier than hiring a lawyer*</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Make a Simple Will & Supporting Documents for you and your spouse</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Leave property to those you love</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Provide for your children & your estate</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Appoint a guardian for minor children</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Plan for a medical emergency</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Appoint a financial power of attorney</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Make your final wishes known</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Update your plan as often as you wish</span>\n              </li>\n              <li>\n                <span class=\"empty_text\"></span>\n              </li>\n            </ul>\n            <span class=\"whats_included_text\">What’s Included:</span>\n            <ul class=\"include_ul\">\n              <li>\n                <span class=\"faster_text2\">Includes a Complete Set of Documents For Each Spouse</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">A Last Will & Testament For Each of You</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">Healthcare Power of Attorney For Each of You</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">Durable General Power of Attorney For Each of You</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">Living Will For Each of You</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">HIPAA Wavier For Each of You</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">Burial Instructions For Each of You</span>\n              </li>\n              <li style=\"border:none;\">\n                <span class=\"empty2\"></span>\n              </li>\n              <li style=\"border:none;\">\n                <span class=\"empty2\"></span>\n              </li>\n            </ul>\n            <a href=\"#\" class=\"get_start_pkg_btn start_btn_2\"><i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i> Buy Now</a>\n          </div>\n          <a href=\"javascript:void(0)\" class=\"include_text\" (click)=\"showIncluded()\">\n              {{whatIncl == true ? 'Hide' : 'See what’s included'}}\n          </a>\n        </li>\n      </ul>\n    </div>\n  </div>\n  <div class=\"index_sec7\">\n    <div class=\"wrapper\">\n      <h1 class=\"save_text\">Our Average Customer <span>Saves 80%</span> <br>With SimplyWilled Estate Planning!</h1>\n      <ul class=\"sec7_ul\">\n        <li>Safe</li>\n        <li>Simple</li>\n        <li>Smart</li>\n      </ul>\n      <span class=\"sec2_btn_main\"><a routerLink=\"/register\"><i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i> Get Started!</a></span>\n    </div>\n  </div>\n\n  <div class=\"index_sec9_slider\">\n    <div class=\"wrapper\">\n      <h2 class=\"happy_user_text\">Our Happy Users</h2>\n      <div class=\"flex_slider_main\">\n        <div class=\"wrapper\">\n          <section class=\"slider\">\n            <div class=\"flexslider2\">\n                <carousel class=\"slides\">\n                  <slide>\n                    <span class=\"slider_left_img\"><img src=\"../../../../assets/images/mitch-and-donna.png\" alt=\"error img\"></span>\n                    <div class=\"sec9_slider_right\">\n                      <p class=\"slider_content\">As a newly wed couple with a growing family, thank you <strong>SimplyWilled</strong> for making planning our estate so simple.<br>&nbsp;</p>\n                      <h4 class=\"client_name\">Donna M.</h4>\n                    </div>\n                  </slide>\n                  <slide>\n                    <span class=\"slider_left_img\"><img src=\"../../../../assets/images/sliderImg1.png\" alt=\"error img\"></span>\n                    <div class=\"sec9_slider_right\">\n                      <p class=\"slider_content\">My husband and i had put off making our wills for years. With <strong>SimplyWilled</strong> we were able to make our wills and revocable trusts in less than 20 minutes.</p>\n                      <h4 class=\"client_name\">Georgia W.</h4>\n                    </div>\n                  </slide>\n                  <slide>\n                    <span class=\"slider_left_img\"><img src=\"../../../../assets/images/sliderImg2.png\" alt=\"error img\"></span>\n                    <div class=\"sec9_slider_right\">\n                      <p class=\"slider_content\">We love <strong>SimplyWilled</strong>, after talking to a few expensive lawyers we decided to use <strong>SimplyWilled</strong>. It made planning our estate simple and affordable.</p>\n                      <h4 class=\"client_name\">Josh W.</h4>\n                    </div>\n                  </slide>\n                  <slide>\n                    <span class=\"slider_left_img\"><img src=\"../../../../assets/images/sliderImg3.png\" alt=\"error img\"></span>\n                    <div class=\"sec9_slider_right\">\n                      <p class=\"slider_content\">I used <strong>SimplyWilled</strong> to make my single will package to make sure the ones I care about were covered.<br>&nbsp;</p>\n                      <h4 class=\"client_name\">Carter E.</h4>\n                    </div>\n                  </slide>\n                </carousel>\n              <!-- <ul class=\"slides\">\n                <li>\n                  <span class=\"slider_left_img\"><img src=\"../../../../assets/images/mitch-and-donna.png\" alt=\"error img\"></span>\n                  <div class=\"sec9_slider_right\">\n                    <p class=\"slider_content\">As a newly wed couple with a growing family, thank you SimplyWilled for making planning our estate so simple.</p>\n                    <h4 class=\"client_name\">Mitch & Donna</h4>\n                  </div>\n                </li>\n                <li>\n                  <span class=\"slider_left_img\"><img src=\"../../../../assets/images/mitch-and-donna.png\" alt=\"error img\"></span>\n                  <div class=\"sec9_slider_right\">\n                    <p class=\"slider_content\">As a newly wed couple with a growing family, thank you SimplyWilled for making planning our estate so simple.</p>\n                    <h4 class=\"client_name\">Mitch & Donna</h4>\n                  </div>\n                </li>\n                <li>\n                  <span class=\"slider_left_img\"><img src=\"../../../../assets/images/mitch-and-donna.png\" alt=\"error img\"></span>\n                  <div class=\"sec9_slider_right\">\n                    <p class=\"slider_content\">As a newly wed couple with a growing family, thank you SimplyWilled for making planning our estate so simple.</p>\n                    <h4 class=\"client_name\">Mitch & Donna</h4>\n                  </div>\n                </li>\n              </ul> -->\n            </div>\n          </section>\n        </div>\n      </div>\n    </div>\n  </div>\n</div>\n\n<ng-template #viewVideo>\n  <div class=\"videoArea\">\n    <button type=\"button\" class=\"close\" (click)=\"modalRef.hide()\">×</button>\n    <div class=\"videoBox\">\n        <iframe width=\"854\" height=\"480\" src=\"https://www.youtube.com/embed/DsOpMzQ65DI\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>\n    </div>\n  </div>\n</ng-template>\n"

/***/ }),

/***/ "./src/app/user/home/home.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return HomeComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ngx_bootstrap_modal__ = __webpack_require__("./node_modules/ngx-bootstrap/modal/index.js");
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



var HomeComponent = /** @class */ (function () {
    function HomeComponent(modalService, router) {
        this.modalService = modalService;
        this.router = router;
        this.whatIncl = false;
    }
    HomeComponent.prototype.ngOnInit = function () {
    };
    HomeComponent.prototype.openModal = function (template) {
        this.modalRef = this.modalService.show(template);
    };
    HomeComponent.prototype.ourTeam = function () {
        this.router.navigate(['/about-us'], { queryParams: { id: 'our-team' } });
    };
    HomeComponent.prototype.showIncluded = function () {
        this.whatIncl = !this.whatIncl;
    };
    HomeComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            selector: 'app-home',
            template: __webpack_require__("./src/app/user/home/home.component.html"),
            styles: [__webpack_require__("./src/app/user/home/home.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ngx_bootstrap_modal__["a" /* BsModalService */],
            __WEBPACK_IMPORTED_MODULE_2__angular_router__["d" /* Router */]])
    ], HomeComponent);
    return HomeComponent;
}());



/***/ }),

/***/ "./src/app/user/layout/full-layout/full-layout.component.css":
/***/ (function(module, exports) {

module.exports = ""

/***/ }),

/***/ "./src/app/user/layout/full-layout/full-layout.component.html":
/***/ (function(module, exports) {

module.exports = "<header class=\"header_container\">\n  <div class=\"header_first_sec\">\n    <div class=\"wrapper\">\n      <a routerLink=\"/\" class=\"logo\"><img src=\"../../../../assets/images/logo_new.png\" alt=\"logo\"></a>\n      <div class=\"menu\" (click)=\"menuOpen()\" [ngClass]=\"{'active': menutogle}\">\n        <span></span>\n        <span></span>\n        <span></span>\n      </div>\n      <div class=\"readerRight\" [ngClass]=\"{'open': menutogle}\">\n        <ul class=\"navigation\">\n          <li><a routerLink=\"/\" routerLinkActive=\"active\" [routerLinkActiveOptions]=\"{exact: true}\">Home</a></li>\n          <li><a routerLink=\"/about-us\" routerLinkActive=\"active\">About Us</a></li>\n          <li><a routerLink=\"/faq\" routerLinkActive=\"active\">FAQ</a></li>\n          <li><a routerLink=\"/blog\" routerLinkActive=\"active\">Blog</a></li>\n          <li><a routerLink=\"/sign-in\" *ngIf=\"!isLogIn\" routerLinkActive=\"active\">Login</a></li>\n          <li><a routerLink=\"/dashboard\" *ngIf=\"isLogIn\" routerLinkActive=\"active\">Dashboard</a></li>\n          <li (click)=\"onLogout()\"><a href=\"javascript:void(0)\" *ngIf=\"isLogIn\">Logout</a></li>\n        </ul>\n        <div class=\"searchBar\">\n          <input type=\"text\" placeholder=\"Search\">\n          <button type=\"button\"><i class=\"fa fa-search\"></i></button>\n        </div>\n        <div class=\"headerContact\">\n          <span>Need&nbsp;Help?</span>\n          1-855-965-1789\n        </div>\n        <a routerLink=\"/register\" class=\"getStarted\" *ngIf=\"!isLogIn\"><i class=\"fa fa-chevron-right\"></i>&nbsp;Get&nbsp;Started</a>\n        <a routerLink=\"/dashboard\" class=\"getStarted\" *ngIf=\"isLogIn\"><i class=\"fa fa-chevron-right\"></i>&nbsp;Get&nbsp;Started</a>\n      </div>\n\n    </div>\n  </div>\n</header>\n<router-outlet></router-outlet>\n<footer>\n  <div class=\"footer-top\">\n    <div class=\"wrapper\">\n\n      <div class=\"footerTxtArea\">\n        <div class=\"footer-logo\">\n          <a routerLink=\"/\">\n            <img src=\"../../../../assets/images/footer-logo.png\" class=\"img-responsive\">\n          </a>\n          <p>\n            SimplyWilled is an online service that provides legal forms and legal information. We are not a law firm and are not a substitute for an atttorney's advice. Use of this website is subject to our Terms of Service, Terms of Use and Privacy Policy.\n          </p>\n        </div>\n      </div>\n      <div class=\"footerNavArea\">\n        <div class=\"footer-nav\">\n          <ul>\n            <li><a routerLink=\"/about-us\">About Us</a></li>\n            <li><a routerLink=\"/faq\">FAQ</a></li>\n            <li><a routerLink=\"/blog\">Blog</a></li>\n            <li><a routerLink=\"/sign-in\">Login</a></li>\n          </ul>\n        </div>\n        <div class=\"footer-nav\">\n          <ul>\n            <li><a routerLink=\"/terms-of-use\">Terms of Use</a></li>\n            <li><a routerLink=\"/terms-of-service\">Terms of Service</a></li>\n            <li><a routerLink=\"/privacy-policy\">Privacy Policy</a></li>\n            <li><a routerLink=\"/contact-us\">Contact Us</a></li>\n          </ul>\n        </div>\n      </div>\n      <div class=\"FooterRight\">\n        <div class=\"contactus\">\n          <img src=\"../../../../assets/images/icon-call.png\" class=\"img-responsive\">\n          <div class=\"footer-label\">\n            <span class=\"number\">1-(855) 965-1789 </span>\n            <span>Mon-Friday 10 A.M - 6 P.M.</span>\n          </div>\n        </div>\n        <div class=\"social\">\n          <span>Follow Us: </span>\n          <ul>\n            <li><a href=\"#\"><i class=\"fa fa-facebook\"></i></a></li>\n            <li><a href=\"#\"><i class=\"fa fa-twitter\"></i></a></li>\n            <li><a href=\"#\"><i class=\"fa fa-linkedin\"></i></a></li>\n            <li><a href=\"#\"><i class=\"fa fa-instagram\"></i></a></li>\n          </ul>\n        </div>\n      </div>\n\n    </div>\n  </div>\n  <div class=\"footer-bottom\">\n    <div class=\"wrapper\">\n      <div class=\"copyrightArea\">\n        <p class=\"copyright\">Copyright © 2017-2018 Keep It Simple, LLC. All Rights Reserved.</p>\n      </div>\n      <div class=\"footerBottomRight\">\n        <p><span>Shop With Confidence Powered by</span> <a href=\"#\"><img src=\"../../../../assets/images/paypal-btn.png\" class=\"img-responsive\"></a></p>\n      </div>\n      <div class=\"clear\"></div>\n    </div>\n  </div>\n  <span class=\"click-to-top\" [ngClass]=\"{'show': goUp}\" (click)=\"goToTop()\">\n    <i class=\"fa fa-chevron-up\"></i>\n  </span>\n</footer>\n<!--popup video-->\n<div class=\"blue_div\"></div>\n<div class=\"blue_video\">\n  <span class=\"blue_icone\"><i class=\"fa fa-times\" aria-hidden=\"true\"></i></span>\n  <iframe src=\"https://www.youtube.com/embed/DsOpMzQ65DI\" allowfullscreen></iframe>\n</div>\n<!--end-->\n"

/***/ }),

/***/ "./src/app/user/layout/full-layout/full-layout.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return FullLayoutComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__user_auth_user_auth_service__ = __webpack_require__("./src/app/user/user-auth/user-auth.service.ts");
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



var FullLayoutComponent = /** @class */ (function () {
    function FullLayoutComponent(authService, router) {
        var _this = this;
        this.authService = authService;
        this.router = router;
        this.goUp = false;
        this.scroll = function () {
            if (window.scrollY > 500) {
                _this.goUp = true;
            }
            else {
                _this.goUp = false;
            }
        };
        router.events
            .filter(function (event) { return event instanceof __WEBPACK_IMPORTED_MODULE_2__angular_router__["b" /* NavigationEnd */]; })
            .subscribe(function (event) {
            window.scroll(0, 0);
            if (event.urlAfterRedirects == '/about-us?id=our-team') {
                var h = document.getElementById('ourTeam').offsetTop;
                window.scroll(0, h);
            }
        });
    }
    FullLayoutComponent.prototype.ngOnInit = function () {
        this.isLogIn = this.authService.isAuthenticated();
        this.menutogle = false;
        window.addEventListener('scroll', this.scroll, true);
    };
    FullLayoutComponent.prototype.goToTop = function () {
        window.scroll(0, 0);
    };
    /**
     * this function hits when user log out
     */
    FullLayoutComponent.prototype.onLogout = function () {
        localStorage.removeItem('loggedInUser');
        localStorage.removeItem('_loggedInToken');
        this.router.navigate(['/']);
        this.isLogIn = false;
    };
    /**
     * function for toggeling the nav bar in modile view
     */
    FullLayoutComponent.prototype.menuOpen = function () {
        this.menutogle = !this.menutogle;
    };
    FullLayoutComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            selector: 'app-full-layout',
            template: __webpack_require__("./src/app/user/layout/full-layout/full-layout.component.html"),
            styles: [__webpack_require__("./src/app/user/layout/full-layout/full-layout.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__user_auth_user_auth_service__["a" /* UserAuthService */], __WEBPACK_IMPORTED_MODULE_2__angular_router__["d" /* Router */]])
    ], FullLayoutComponent);
    return FullLayoutComponent;
}());



/***/ }),

/***/ "./src/app/user/privacy-policy/privacy-policy.component.css":
/***/ (function(module, exports) {

module.exports = ".body_container{\n    background: #f2f2f2;\n    margin-top: -33px;\n    padding-bottom: 23px;\n}\n.sec2_btn_main a{\n    margin-bottom: -53px;\n}"

/***/ }),

/***/ "./src/app/user/privacy-policy/privacy-policy.component.html":
/***/ (function(module, exports) {

module.exports = "\n  <div class=\"body_container\">\n    <div class=\"why-us-main\" style=\"padding-bottom:30px;\">\n\n      <div class=\"wrapper\">\n\n        <span class=\"welcome_text\" style=\"padding-top:70px;\">Privacy Policy</span>\n\n        <span class=\"terms_heading\">Last Updated: August 28, 2017</span>\n\n        <p class=\"privacy_pera\">Keep It Simple, LLC (“Keep It Simple, “Us,” “We”) is sensitive to your concerns regarding how we use the personal information we collect from our websites and other plug-ins that exchange information with us.  (The Site and Applications are sometimes collectively referred to as \"Online Services\" for simplicity).  We take your privacy seriously, and have implemented this privacy policy to ensure your personal and financial information is handled in a secure manner.</p>\n\n        <p class=\"privacy_pera\">In the course of utilizing our Online Services, you may provide us with personally identifiable information, such as information that can be used to contact or identify you, information that you input on our site, and information regarding your use of, and activities at, our web site (“Personal Information”). This privacy policy applies to all of the products, services and web sites offered by Keep It Simple, LLC and informs you of how we collect, use, disclose and protect your Personal Information.</p>\n\n        <p class=\"privacy_pera\">This Privacy Policy is incorporated into our <a routerLink=\"/terms-of-use\">Terms of Use</a> and <a routerLink=\"/terms-of-service\">Terms of Service</a>, and therefore governs your use of the Online Services. By using Keep It Simple Online Services, you accept the terms of this Privacy Policy.</p>\n\n\n\n        <span class=\"terms_heading\">Changes to our Privacy Policy</span>\n\n        <p class=\"privacy_pera\">If we change our privacy policy, we will post those changes on this page and update the “Last Updated” date above. </p>\n\n\n\n        <span class=\"terms_heading\">Information We Collect</span>\n\n        <p class=\"privacy_pera\">Personal Information that you provide via our websites, plug-ins, forms, and documents may be automatically collected by Keep It Simple.  Keep It Simple requires each customer to provide us with Personal Information to access and use the Online Services. Personal Information is captured when a visitor accesses Online Services, or speaks on the phone with a Keep It Simple employee or agent, and willingly discloses that information.  It may be collected when a visitor registers with an Online Service, engages in transactions, contacts customer service, or participates in contests, promotions, surveys, forums, content submissions, requests for suggestions, or other aspects of services offered by Keep It Simple, its subsidiaries and affiliates.  Our secure servers also automatically record information that your browser sends whenever you visit a web site.</p>\n\n\n\n        <p class=\"privacy_pera\">Personally Identifiable Information includes but is not limited to: (i) \"Contact Data\" (such as your name, address, city, state, zip code, phone number, and email address); (ii) \"Financial Data\" (such as your credit card number, expiration date, and verification code or bank account information); (iii) \"Demographic Data\" (such as your zip code and sex); and (iv) other \"Legal Data\" (such as your social security number, mortgage information, automobile information, marital information, trade secrets, inventions, and idea submissions and other sensitive information necessary to generate legal documents).</p>\n\n\n\n        <p class=\"privacy_pera\">We may also collect the information of third party individuals as necessary, such as to ask our customers to indicate beneficiaries of a will, record shareholders of a company, or register authorized contacts to access their Keep It Simple account.  Keep It Simple uses this information for the sole purpose of administering its services for our customers, and does not use such information for any other reason.</p>\n\n\n\n        <p class=\"privacy_pera\">In the regular course of our business, Keep It Simple may monitor and record phone conversations or email communications between you and Keep It Simple employees or agents for training and quality assurance purposes. We may receive a confirmation when you open or click on content in an email from us, which helps us make our communications to you more useful and interesting. If you do not wish to receive email from Keep It Simple, you may unsubscribe from our mailing list by using the \"Unsubscribe\" link on any of the emails we send.</p>\n\n\n\n        <p class=\"privacy_pera\">If you believe that one of your contacts has provided us with your personal information and you would like to request that it be removed from our database, please contact us through our Help Desk.</p>\n\n        <span class=\"terms_heading\">Use of Cookies and Beacons</span>\n\n        <p class=\"privacy_pera\">Keep It Simple, its subsidiaries, affiliates, and/or partners may also collect information via cookies and web beacons. We use cookies and web beacons to run certain features of our web site, to understand and save your preferences for future visits and to compile aggregate data about user traffic and behavior so that we can offer better experiences and tools to our customers. We may also contract with third-party service providers to assist us in better understanding our site visitors. </p>\n\n        <p class=\"privacy_pera\">Cookies are small files that enable us to store a small piece of data on a visitor's computer, or any other device a visitor uses to access Online Services, about his or her visit to the Site or use of Applications.  We do not capture Personally Identifiable Information in cookies or use cookies to mine Personally Identifiable Information.  You can remove persistent cookies by following directions provided in your Internet browser’s “help” directory. If you reject cookies, you may still use our site, but your ability to use some areas of our site, such order forms, will be limited. You may, at your discretion, configure your software so that it does not accept cookies, though you may not be able to access certain portions or features of our web site.</p>\n\n        <p class=\"privacy_pera\">Web beacons help us track referrals from our partners and affiliates and better manage content on our site.  Web beacons are tiny graphics with a unique identifier, similar in function to cookies, and are used to track the online movements of web users.  In contrast to cookies, which are stored on a user’s computer hard drive, web beacons are embedded invisibly on web pages and are about the size of the period at the end of this sentence. We do not tie the information gathered by web beacons to our customers’ Personally Identifiable Information.</p>\n\n        <p class=\"privacy_pera\">You may choose not to provide Keep It Simple or its subsidiaries and/or affiliates with Personally Identifiable Information. If you make this decision, you may continue to use the Online Services and browse its pages. However, we cannot process orders without Personally Identifiable Information.</p>\n\n\n\n        <span class=\"terms_heading\">How We Use the Information We Collect</span>\n\n        <p class=\"privacy_pera\">Your Personal Information (including information that is automatically collected and information from cookies and web beacons) may be used for the following purposes: (i) to deliver the services you request, (ii) to improve our web site, services, features and content, (iii) to personalize your experience on our web site, (iv) to provide or offer software updates and product announcements, (v) to provide you with further information and offers from us or third parties that we believe you may find useful or interesting, including newsletters, marketing or promotional materials and other information on services and products offered by us or third parties, (vii) to monitor and analyze use of our web site and our services, (viii) to administer our web site, (ix) to generate and derive useful data and information concerning the interests, characteristics and web site use behavior of our users, and (x) to verify that visitors of our web site meet the criteria required to process their requests. We reserve the right to compile and share aggregated information about our users, transactions completed using our service, sales, and traffic, though we will not share this information in a manner that permits the identification of a specific user.</p>\n\n        <p class=\"privacy_pera\">We send promotional emails and newsletters from time to time to users who have registered on the site and to those who have opted in to receive such emails. Generally, you may not opt-out of service-related or transactional communications, which are not promotional. If you do not wish to receive service-related communications, you may terminate your account by contacting us. However, you can opt-out of promotional communications by using the \"Unsubscribe\" link and following the unsubscribe instructions in any electronic communication.</p>\n\n        <p class=\"privacy_pera\">We may provide you the opportunity to participate in surveys on our site, to measure customer satisfaction.  If you participate, we may request certain personally identifiable information from you. Participation in these surveys, sweepstakes, or contests is completely voluntary and you therefore have a choice whether or not to disclose this information.  The requested information typically includes name, email address, and mailing address.  We use this information to notify contest winners and award prizes, to monitor site traffic or personalize the site, and/or to send participants an email newsletter.  We may use a third party service provider to conduct these surveys or contests; that company will be prohibited from using our users’ personal information for any other purpose. We will not share the personal information you provide through a contest or survey with other third parties unless we give you prior notice and choice.</p>\n\n        <span class=\"terms_heading\">Protection and Security of Your Personal Information</span>\n\n        <p class=\"privacy_pera\">Keeping your Personal Information safe is of the utmost importance to us.  All personally identifiable information is maintained on secure servers, protected from unauthorized use, access or disclosure. Credit card and personal information are transmitted by secure servers (SSL). Unfortunately, no data transmission is guaranteed to be 100% secure and we therefore cannot guarantee the security of information you transmit to or from the Site, Applications, or through the use of our services, and you provide this information at your own risk. ACCORDINGLY, WE DISCLAIM LIABILITY FOR THE THEFT, LOSS, OR INTERCEPTION OF, OR UNAUTHORIZED ACCESS OR DAMAGE TO, YOUR DATA OR COMMUNICATIONS BY USING THE SITE, APPLICATIONS, AND OUR SERVICES. YOU ACKNOWLEDGE THAT YOU UNDERSTAND AND ASSUME THESE RISKS.</p>\n\n        <span class=\"terms_heading\">Disclosure to Third Parties</span>\n\n        <p class=\"privacy_pera\">We do not sell, transfer, or otherwise share your Personal Information, or any data that you store using our services, to third parties except as otherwise outlined herein. Additionally, we may sell, transfer or otherwise share some or all of our assets, including your Personal Information, in connection with a corporate transaction such as a merger, acquisition, reorganization or sale of assets. In any such event, you will receive notice if your data is transferred and becomes subject to a substantially different privacy policy. We may also release your Personal Information when we believe release is appropriate to comply with the law, enforce our site policies, or protect ours or others’ rights, property or safety. Non-personally identifiable information may be provided to other parties for marketing, advertising, or other uses.</p>\n\n        <p class=\"privacy_pera\">Certain Personal Information becomes public record when documents are filed with the federal or state government, or with a court. For example, a corporation's name, business address, and registered agent name become public information when its articles of incorporation are filed. A Secretary of State may publish this information to its website or provide this information to third parties for a fee. The U.S. Patent and Trademark Office publishes the names and addresses of trademark registrants. In some states, fictitious business names, including the name and address of the business owner, must be published in a newspaper. The Keep It Simple Privacy Policy does not cover these or similar third-party actions.</p>\n\n        <p class=\"privacy_pera\">We display personal testimonials of satisfied customers received through email surveys.  We ask for your specific consent as part of the survey.  If you wish to update or delete your testimonial, you can contact us.  We also display customer reviews.  If you provide a review that we display and wish to update or delete it, you can also contact us.</p>\n\n        <p class=\"privacy_pera\">We may link to, include or offer third party products or services on or through our web site. If you choose to use any such third party services, we may facilitate sharing of your information and documents you choose to use with those services.  Your use of those services is not governed by our Terms of Service or Privacy Policy.  We do not control the services of those third parties or how they use your information and documents. Be sure to review the terms and conditions and privacy policies of those third parties before using their services.  Likewise, our Site includes social media features, such as the Facebook “like” button and widgets, such as the “Share this” button or interactive mini-programs that run on our site. These features may collect your IP address, which page you are visiting on our site, and may set a cookie to enable the feature to function properly. Social media features and widgets are either hosted by a third party or hosted directly on our Site. Your interactions with these features are governed by the privacy policy of the company providing it.</p>\n\n        <p class=\"privacy_pera\">Keep It Simple, sometimes with the assistance of a third party or Keep It Simple subsidiary, may use your Personal Information to process your payment through merchant account services, and to generate the products and services you order.  Your Contact Data may be used to follow up with you on transactions you initiate through Online Services, respond to inquiries made through Online Services, inform you of changes to Online Services, and send you additional information about Keep It Simple and its products and services.</p>\n\n        <p class=\"privacy_pera\">Unless specifically authorized by you, we do not provide Personal Information to third parties for marketing purposes. If you express interest in a third party offer or purchase a package that includes a third-party offer, we may provide your Personal Information to that third party solely in connection with the offer you have selected.</p>\n\n        <p class=\"privacy_pera\">We may also disclose your Personal Information: as required by law, such as in response to a subpoena, a lawful request by a public authority, including to meet national security or law enforcement requirements, or similar legal process, and when we believe in good faith that disclosure is necessary to protect our rights, protect your safety or the safety of others, investigate fraud, or respond to a legal request.</p>\n\n        <p class=\"privacy_pera\">We may share your Personal Information with companies that provide support services to us (such as a printer or email service provider), help us market our products and services, or for training purposes. These companies may need information about you in order to perform their functions. These companies are not authorized to use the information we share with them for any other purpose.</p>\n\n        <p class=\"privacy_pera\">Our partners and affiliates, including Google Analytics (Remarketing, Google Display Network Impression Reporting, the DoubleClick Campaign Manager Integration, and Google Analytics and Interest Reporting), may use cookies and web beacons to collect non-personally identifiable information about your activities on this and other websites to provide you targeted advertising based upon your interests. This means that these partners and affiliates may show our ads on sites across the Internet based upon your previous visits to our site. Together with our partners and affiliates, we may use these cookies and web beacons to report how your ad impressions, other uses of ad services, and interactions with these ad impressions and ad services are related to your visits to our site. If you would like to learn more or opt out of receiving online display advertising tailored to your interests, please visit the Networking Advertising Initiative at www.networkadvertising.org/managing/opt_out.asp or the Digital Advertising Alliance at http://aboutads.info/choices.  You may also visit Google Analytics’ Ads Settings to opt out of Google’s use of cookies and customize Google Display Network ads, and Google Analytics’ Opt Out Browser Add-on for the web.</p>\n\n        <p class=\"privacy_pera\">The Site includes a publically accessible blog and interactive forums. You should be aware that any information you provide in these areas may be read, collected, and used by others who access them.   You should use caution when deciding whether to disclose your Personal Information in these areas of the site. </p>\n\n        <p class=\"privacy_pera\">We may share Personal Information and other data with businesses controlling, controlled by, or under common control with Keep It Simple.</p>\n\n        <p class=\"privacy_pera\">In the event of a Keep It Simple bankruptcy, insolvency, reorganization, receivership, or assignment for the benefit of creditors, or the application of laws or equitable principles affecting creditors' rights generally, we may not be able to control how your personal information is treated, transferred, or used. If such an event occurs, your Personal Information may be treated like any other company asset and sold, transferred, or shared with third parties, or used in ways not contemplated or permitted under this Privacy Policy. In this case, you will be notified via email and/or a prominent notice on our site of any change in ownership or uses of your Personal Information, as well as any choices you may have regarding your Personal Information.</p>\n\n\n\n\n\n        <span class=\"terms_heading\">Accessing and Changing Your Account</span>\n\n        <p class=\"privacy_pera\">Upon request Keep It Simple will provide you with information about whether we hold any of your personal information. In certain circumstances we may be required by law to retain your personal information, or may need to retain your personal information in order to continue providing a service. Please review the information below to access, correct, or request deletion of your personal information.</p>\n\n        <p class=\"privacy_pera\">At minimum, we will retain your information for as long as needed to provide you services, and as necessary to comply with our legal obligations, resolve disputes, and enforce our agreements.  Keep It Simple may maintain some or all of this data in its archives even after it has been removed from the Site.</p>\n\n\n\n        <span class=\"terms_heading\">Terms and Conditions</span>\n\n        <p class=\"privacy_pera\">Please also visit the Terms of Service section establishing the use, disclaimers, and limitations of liability governing the use of our web site.</p>\n\n        <span class=\"terms_heading\">Contacting Us</span>\n\n        <p class=\"privacy_pera\">We periodically review this Privacy Policy and our compliance with it to verify that both are accurate. We encourage you to contact us with any concerns, and we will investigate and attempt to resolve any complaints and disputes about our privacy practices. Any questions concerning our Privacy Policy should be directed to <a href=\"mailto:support@simplywilled.com\">support@simplywilled.com</a>  </p>\n\n        <p class=\"privacy_pera\">Disclaimer: Communications between you and Keep It Simple and its subsidiaries and affiliates are protected by our Privacy Policy but not by the attorney-client privilege or as work product.  We are not a law firm or a substitute for an attorney or law firm. We cannot provide any kind of advice, explanation, opinion, or recommendation about possible legal rights, remedies, defenses, options, selection of forms or strategies. Your access to the website is subject to our Terms of Use.</p>\n          \n\n        <span _ngcontent-c1=\"\" class=\"sec2_btn_main\">\n          <a _ngcontent-c1=\"\" routerlink=\"/register\" ng-reflect-router-link=\"/register\" href=\"/register\">\n            <i _ngcontent-c1=\"\" aria-hidden=\"true\" class=\"fa fa-chevron-right\"></i> Get Started!\n          </a>\n        </span>\n      </div>\n\n    </div>\n  </div>\n"

/***/ }),

/***/ "./src/app/user/privacy-policy/privacy-policy.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return PrivacyPolicyComponent; });
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

var PrivacyPolicyComponent = /** @class */ (function () {
    function PrivacyPolicyComponent() {
    }
    PrivacyPolicyComponent.prototype.ngOnInit = function () {
    };
    PrivacyPolicyComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            selector: 'app-privacy-policy',
            template: __webpack_require__("./src/app/user/privacy-policy/privacy-policy.component.html"),
            styles: [__webpack_require__("./src/app/user/privacy-policy/privacy-policy.component.css")]
        }),
        __metadata("design:paramtypes", [])
    ], PrivacyPolicyComponent);
    return PrivacyPolicyComponent;
}());



/***/ }),

/***/ "./src/app/user/terms-of-service/terms-of-service.component.css":
/***/ (function(module, exports) {

module.exports = ".body_container{\n    background: #f2f2f2;\n    margin-top: -33px;\n    padding-bottom: 23px;\n}\n.sec2_btn_main a{\n    margin-bottom: -53px;\n}"

/***/ }),

/***/ "./src/app/user/terms-of-service/terms-of-service.component.html":
/***/ (function(module, exports) {

module.exports = "\n  <div class=\"body_container\">\n      <div class=\"why-us-main\" style=\"padding-bottom:30px;\">\n          <div class=\"wrapper\">\n\n              <span class=\"welcome_text\" style=\"padding-top:70px;\">Terms of Service</span>\n\n              <span class=\"terms_heading\">Last Updated: August 30, 2017</span>\n\n              <p class=\"privacy_pera\">PLEASE READ THESE TERMS OF USE CAREFULLY BEFORE USING THIS SITE. </p>\n\n              <span class=\"terms_heading\">Summary</span>\n\n              <p class=\"privacy_pera\">By accessing or using any web site or service made available by Keep It Simple, LLC (“Keep It Simple”), including but not limited to the SimplyWilled website (the \"Site\") or any SimplyWilled applications or application plug-ins (\"Applications\"), you acknowledge that you have read, and agree to follow and be bound by these terms of service (the \"Terms of Service\") and agree to comply with all applicable laws and regulations, including United States export and re-export control laws and regulations. In these Terms of Use, the words \"you\" and \"your\" refer to each customer, Site visitor, or Application user, \"we\", \"us\" and \"our\" refer to Keep It Simple, LLC and its subsidiaries and affiliates, and \"Services\" refers to all services provided by us.  Please also refer to the <a routerLink=\"/terms-of-use\">Terms of Use</a> and <a routerLink=\"/privacy-policy\">Privacy Policy</a>, and any other terms accepted when making your purchase, each of which is incorporated herein by reference.</p>\n\n              <p class=\"privacy_pera\">It is your responsibility to review these Terms of Use periodically. If at any time you find these Terms of Use unacceptable or&nbsp;<strong><em>if you do not agree to these Terms of Service, please do not use this Site or any Applications.</em></strong>&nbsp; We may revise these Terms of Service at any time without notice to you. If you have any questions about these Terms of Service, please contact us at <a href=\"mailto:info@simplywilled.com\">info@simplywilled.com</a></p>\n\n              <span class=\"terms_heading\">Definitions</span>\n\n              <p class=\"privacy_pera\">The following meanings shall apply in these Terms of Service: “Services” refers to the Site, its Applications, and all services, self-help documents, forms, and templates provided by Keep It Simple; “Keep It Simple”, “we”, “us” and “our” refer to Keep It Simple, LLC, (the owner and operator of SimplyWilled), and any other affiliates (including subsidiaries, officers, directors, employees, consultants, agents and representatives); “You” and “your” refer to each customer, visitor or user of our Site, or of any Services provided therein; “Document Materials” refer to any document, whether in physical, electronic, or any other form, created using the Site, Application, and/or Services. If you access or use the Services on behalf of another person, company, organization, or other entity, then (a) “you” and “your” also refers to that entity, (b) you represent and warrant that you are an authorized representative of such person or entity with the authority to bind the person or entity to these Terms of Service, and (c) you agree to these Terms of Service on the person or entity’s behalf.</p>\n\n              <p class=\"privacy_pera\">For the purposes of these Terms of Service, “Intellectual Property Rights” means all patent rights, copyright rights, mask work rights, moral rights, rights of publicity, trademark, trade dress and service mark rights, goodwill, trade secret rights and other intellectual property rights as may now exist or hereafter come into existence, and all applications therefore and registrations, renewals and extensions thereof, under the laws of any state, country, territory or other jurisdiction.</p>\n\n              <span class=\"terms_heading\">Modification</span>\n\n              <p class=\"privacy_pera\">Keep it Simple may revise these Terms of Service at any time without notice to you.  Should we modify these Terms of Service, we will update the “Last Updated” date at the top of this page. In continuing to access or use our Site and Services after we have updated our Terms of Service, you are agreeing to be bound by the modified Terms. If the modified Terms are not acceptable to you, your only recourse is to cease using the Site and Services. If at any time you find these Terms of Service unacceptable or if you do not agree to these Terms of Service, please do not access our Site or utilize our Services.</p>\n\n              <span class=\"terms_heading\">Notification Procedures</span>\n\n              <p class=\"privacy_pera\">Keep It Simple may provide notifications, whether such notifications are required by law or are for marketing or other business related purposes, to you via email notice, written or hard copy notice, or through conspicuous posting of such notice on our web site, as determined by Keep It Simple in our sole discretion. Keep It Simple reserves the right to determine the form and means of providing notifications to our users. Keep It Simple is not responsible for any automatic filtering you or your network provider may apply to email notifications we send to the email address you provide us.</p>\n\n              <span class=\"terms_heading\">Entire Agreement</span>\n\n              <p class=\"privacy_pera\">This Agreement, together with any amendments and any additional agreements you may enter into with Keep It Simple in connection with the Service, shall constitute the entire agreement between you and Keep It Simple concerning the Services. If any provision of this Agreement is deemed invalid by a court of competent jurisdiction, the invalidity of such provision shall not affect the validity of the remaining provisions of this Agreement, which shall remain in full force and effect.</p>\n\n              <span class=\"terms_heading\">No Waiver</span>\n\n              <p class=\"privacy_pera\">No waiver of any term of these Terms of Service shall be deemed a further or continuing waiver of such term or any other term, and Keep It Simple’s failure to assert any right or provision under these Terms of Service shall not constitute a waiver of such right or provision.</p>\n\n              <p class=\"privacy_pera\">In addition to the foregoing, by accessing or using our Site and Services, you acknowledge and agree to the following:</p>\n              <ol class=\"privacy_order_list\">\n                  <li>I AGREE THAT BY USING THE SITE, ANY APPLICATIONS, AND THE SERVICES I AM AT LEAST 18 YEARS OF AGE AND YOU ARE LEGALLY ABLE TO ENTER INTO A CONTRACT.</li>\n                  <li><strong> I understand and agree that Keep It Simple is not a law firm or an attorney, may not perform services performed by an attorney, and its forms or templates such as the ones provided at SimplyWilled are not a substitute for the advice or services of an attorney. Rather, I am representing myself in this legal matter. No attorney-client relationship or privilege is created with Keep It Simple, or its employees, agents, owners, subsidiaries, or affiliates.</strong> If, prior to my purchase, I believe that Keep It Simple gave me any legal advice, opinion or recommendation about my legal rights, remedies, defenses, options, selection of forms or strategies, I will not proceed with this purchase, and any purchase that I do make will be null and void.</li>\n                  <li>I understand that the Site and Services are intended only for users domiciled in the United States.</li>\n                  <li>In using the Site and Services, I consent to have my personal data collected, used, transferred to and processed in the United States, and understand that I provide my personal information and other data to Keep It Simply at my own risk. I agree that I am solely responsible for the maintaining the confidentiality of my password and for the activity that occurs on my account. Keep It Simple shall not be liable for any losses I incur as a result of someone else&rsquo;s use of my account. I understand and agree that I may be held liable for any losses incurred by Keep It SImple due to someone else&rsquo;s use of my account, or my use of an account on behalf of someone other than me.</li>\n                  <li><strong> I understand that these Terms require the use of arbitration on an individual basis to resolve disputes, rather than jury trials or class actions, and also limit the remedies available to me in the event of a dispute as described in the Keep It Simple Terms of Use. </strong></li>\n                  <li>I UNDERSTAND THAT THE KEEP IT SIMPLE REVIEW OF MY ANSWERS IS LIMITED TO COMPLETENESS, SPELLING, AND FOR INTERNAL CONSISTENCY OF NAMES, ADDRESSES, AND THE LIKE. I WILL READ THE FINAL DOCUMENT(S) BEFORE SIGNING IT AND AGREE TO BE SOLELY RESPONSIBLE FOR THE FINAL DOCUMENT(S).</li>\n                  <li><strong>Accuracy of Information and Third-Party Consent.&nbsp;</strong>To the best of my knowledge, I have provided accurate information to Keep It Simple and have obtained all third-party consents required for my order. &nbsp;</li>\n                  <li><strong> Electronic Records and Signatures.</strong>I give Keep It Simple consent to affix my electronic signature where required to file my documents. I understand that to withdraw my consent, provided my documents have not already been filed, I must contact Keep It Simple in writing.</li>\n                  <li><strong> Non-English-Speaking Customers.</strong>I understand that certain materials on the Keep It Simple site(s), including but not limited to questionnaires, documents, instructions, and filings, are only available in English.&nbsp;</li>\n                  <li><strong> Limitation of Liability and Indemnification.</strong>EXCEPT AS PROHIBITED BY LAW, I WILL HOLD KEEP IT SIMPLE AND ITS OFFICERS, DIRECTORS, EMPLOYEES, AND AGENTS HARMLESS FOR ANY INDIRECT, PUNITIVE, SPECIAL, INCIDENTAL, OR CONSEQUENTIAL DAMAGE, HOWEVER IT ARISES (INCLUDING ATTORNEYS' FEES AND ALL RELATED COSTS AND EXPENSES OF LITIGATION AND ARBITRATION, OR AT TRIAL OR ON APPEAL, IF ANY, WHETHER OR NOT LITIGATION OR ARBITRATION IS INSTITUTED), WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE, OR OTHER TORTIOUS ACTION, OR ARISING OUT OF OR IN CONNECTION WITH THIS AGREEMENT, INCLUDING WITHOUT LIMITATION ANY CLAIM FOR PERSONAL INJURY OR PROPERTY DAMAGE, ARISING FROM THIS AGREEMENT AND ANY VIOLATION BY ME OF ANY FEDERAL, STATE, OR LOCAL LAWS, STATUTES, RULES, OR REGULATIONS, EVEN IF KEEP IT SIMPLE HAS BEEN PREVIOUSLY ADVISED OF THE POSSIBILITY OF SUCH DAMAGE. EXCEPT AS PROHIBITED BY LAW, IF THERE IS LIABILITY FOUND ON THE PART OF KEEP IT SIMPLE, IT WILL BE LIMITED TO THE AMOUNT PAID FOR THE PRODUCTS AND/OR SERVICES AND UNDER NO CIRCUMSTANCES WILL THERE BE CONSEQUENTIAL OR PUNITIVE DAMAGES. SOME STATES DO NOT ALLOW THE EXCLUSION OR LIMITATION OF PUNITIVE, INCIDENTAL OR CONSEQUENTIAL DAMAGES, SO THE PRIOR LIMITATION OR EXCLUSION MAY NOT APPLY TO ME. THIS PARAGRAPH DOES NOT APPLY TO NORTH CAROLINA CONSUMERS.</li>\n                  <li><strong> Terms of Use.</strong>I understand that the Site's general terms of use (the \"Terms of Use\") also apply to these Terms of Service and in agreeing to these Terms of Service, I acknowledge that I have read and agree to those&nbsp;Terms of Use, which are incorporated herein by reference.</li>\n                  <li><strong> Additional Keep It Simple Terms.</strong>I understand that my purchase may be subject to additional terms and conditions. If applicable, I acknowledge that I have read and agree to the supplemental terms, which are incorporated herein by reference.</li>\n                  <li><strong> Third Party Services.</strong>If I purchased a product that involves third party services, I understand that I may be required to accept additional terms located on the third party&rsquo;s site. The third party may contact me by email and/or phone with instructions on how to access my benefits. KEEP IT SIMPLE HEREBY DISCLAIMS LIABILITY FOR ANY INFORMATION, MATERIALS, PRODUCTS OR SERVICES POSTED OR OFFERED AS PART OF ANY THIRD PARTY SERVICES. KEEP IT SIMPLE IS NOT LIABLE FOR ANY FAILURE OF PRODUCTS OR SERVICES OFFERED OR ADVERTISED AT THOSE SITES. A THIRD PARTY MAY HAVE A PRIVACY POLICY DIFFERENT FROM THAT OF KEEP IT SIMPLE AND THE THIRD PARTY WEBSITE MAY PROVIDE LESS SECURITY THAN THE KEEP IT SIMPLE SITE.&nbsp;</li>\n                  <li><strong> Future Products and Services.</strong>If I choose to add a product or service to my order subsequent to this initial purchase, these Terms of Service will also apply to that additional product or service purchase.</li>\n                  <li><strong>Billing. </strong>I agree that payment will be collected in full immediately at the time of my order, that I authorize Keep It Simple to charge my credit card when I place my order online. I further agree to all other supplemental billing policies and terms which are incorporated herein.</li>\n                  <li><strong> Filing Fees.</strong>Except as otherwise noted, filing and recording fees may include all mandatory or applicable federal, state, county and local administrative fees, name reservation fees, initial reports, publication notices, capitalization fees, franchise tax fees, expedite fees, certified copy fees, walk-in fees, courier fees and other transactional fees incurred on your behalf by Keep It Simple.</li>\n                  <li><strong> Delivery.</strong>I understand that Keep It Simple delivers finished products electronically only, in a downloadable and printable format, and that no products will be delivered via physical shipment. I understand that I may access my product by logging in to My Account.</li>\n                  <li><strong> Abandoned Orders.</strong>My purchase allows me to create my own legal documents. I understand that, other than as required by applicable law, I shall have no right to cancel, request a cash refund or obtain store credit for any undelivered order after 120 days have elapsed from the purchase date unless Keep It Simple is at fault. All itemization of fees are displayed for convenience only. Both parties acknowledge that Keep It Simple is out of pocket time and money for undertaking the work and both parties fully intend to complete the order. Abandoned orders will result in liquidated damages equal to the amount paid to Keep It Simple for reimbursement of our commitment to service this order.</li>\n                  <li><strong> Exchanges.</strong>I understand that I may request an exchange of one product for a different product and complete a replacement order within 60 days of my purchase. The purchase price of the original item, less any filing fees, taxes or other third-party costs, will be credited to my account. Any price difference between the original order and the replacement order or, if a replacement order is not completed within 60 days of purchase, the full original purchase price (in each case less any filing fees, taxes or other third-party costs) will be credited to my original form of payment.</li>\n                  <li><strong> Refunds and Cancellations.</strong> I understand that I have no right to cancel an order that has already been delivered, whether or not I have downloaded, printed, or accessed the product in my account. I understand that I have no right to a refund for a delivered order unless Keep It Simple agrees to the refund in writing, in its sole and unreviewable discretion. I agree that if I receive a refund from Keep It Simple, I release all possible claims against Keep It Simple arising out of my access or use of the Site, Application, or Services, or purchase of Keep It Simple products.</li>\n                  <li><strong> Suspended Accounts</strong>. If Keep It Simple encounters evidence of suspicious activity in connection with my account, including, but not limited to, evidence that my account is being used by someone who is not authorized to do so, I acknowledge that Keep It Simple, in its sole discretion, may opt to temporarily disable my account for a reasonable amount of time in order to investigate. In the event that Keep It Simple disables my account, I understand that, absent a subpoena or court order, no information about my account will be provided to anyone outside Keep It Simple, including me or any authorized contact, until the investigation is complete. Additionally, I understand that Keep It Simple, in its sole discretion, may decide not to send any documents associated with my account to me or file any such documents with any government authority, while my account is disabled. I acknowledge that Keep It Simple will not be liable for any delays caused by these policies and procedures.</li>\n                  <li><strong> DISPUTE RESOLUTION BY BINDING ARBITRATION.</strong> I agree to be bound by the Dispute Resolution terms provided in the Keep It Simple Terms of Use.</li>\n                  <li><strong> Reviews.&nbsp;</strong>After my purchase, I may receive an email survey request from Keep It Simple. I may also write a review on the Site. If you complete the survey or submit a review, my opinions may be posted, in whole or in part, on the Site or used in marketing material. The review may be accompanied by limited identifying information, such as my first name and last initial, the product I purchased, my gender, city and/or state, and age range.&nbsp;</li>\n                  <li><strong> Access to World Wide Web; Internet Delays.</strong>To use Keep It Simple services, I must obtain access to the World Wide Web, either directly or through devices that access web-based content, and pay any service fees associated with such access. I am responsible for providing all equipment necessary to make such connection to the World Wide Web, including a computer and Internet access. Access to certain Keep It Simple services may be limited or delayed based on problems inherent in the use of Internet and electronic communications. I understand that Keep It Simple is not responsible for delays, delivery failures, or other damage resulting from such problems.</li>\n                  <li><strong> Force Majeure.</strong>Keep It Simple shall not be considered in breach of or default under these Terms of Service or any contract with me, and shall not be liable to me for any cessation, interruption, or delay in the performance of its obligations hereunder by reason of earthquake, flood, fire, storm, lightning, drought, landslide, hurricane, cyclone, typhoon, tornado, natural disaster, act of God or the public enemy, epidemic, famine or plague, action of a court or public authority, change in law, explosion, war, terrorism, armed conflict, labor strike, lockout, boycott or similar event beyond our reasonable control, whether foreseen or unforeseen (each a \"Force Majeure Event\"). If a Force Majeure Event continues for more than 60 days in the aggregate, Keep It Simple may immediately terminate these Terms of Service and shall have no liability to me for or as a result of any such termination.</li>\n                  <li><strong> Right to refuse.</strong>I acknowledge that Keep It Simple reserves the right to refuse service to anyone.</li>\n                  <li>I acknowledge that Keep It Simple is not a registered or bonded legal document assistant under California Business and Profession Code, sections 6400 et seq.&nbsp; Keep It Simple, LLC is located at 1725 DeSales Street, NW, Suite 600, Washington, DC 20036.</li>\n                  <li>I acknowledge that Keep It Simple has granted to me a limited license to use its Site, Applications, and Services on an individual personal basis, and that I have no right to reverse engineer, reproduce, or exploit its Site, Applications, Services, documents, products, or information for commercial purposes. I acknowledge that the contents of the Site, Applications, documents, information and products (both form and substance) are the intellectual property of Keep It Simple and are subject to copyright and other intellectual property rights protection. I further understand that by ordering or downloading documents from the Site, I agree that the documents I purchase or download may only be used by me for my personal or business use or used by me in connection with my client and may not be sold or redistributed without the express written consent of Keep It Simple.</li>\n                  <li>I understand that Keep It Simple may revise these Terms of Service at any time without notice to me.</li>\n                  <li>I agree that I, or my Estate, will defend, indemnify, and hold harmless Keep It Simple against lawsuits brought by beneficiaries arising out of my use or access of the Site and Services.</li>\n                  <li>I understand and agree that the maximum extent of any liability Keep It Simple has to me for my use and access to the Site, Applications, and Services is the value of my purchase.</li>\n                  <li><strong> Acknowledgement.&nbsp; </strong>I UNDERSTAND THAT THESE TERMS AFFECT MY LEGAL RIGHTS AND OBLIGATIONS. IF I DO NOT AGREE TO BE BOUND BY ALL OF THESE TERMS, I WILL NOT USE THIS SERVICE. BY PROCEEDING WITH MY PURCHASE, I AGREE TO THESE TERMS OF SERVICE AND ALL OTHER TERMS INCORPORATED HEREIN.</li>\n              </ol>\n              <p class=\"privacy_pera\">Thank you for allowing Keep It Simple to facilitate the preparation of your important estate planning documents. Should you have any additional questions regarding our Site or the Services provided therein, please send us an email at <a href=\"mailto:info@simplywilled.com\">info@simplywilled.com</a>.</p>\n              <p class=\"privacy_pera\">Updated 8/31/2017</p>\n\n              <span _ngcontent-c1=\"\" class=\"sec2_btn_main\">\n                <a _ngcontent-c1=\"\" routerlink=\"/register\" ng-reflect-router-link=\"/register\" href=\"/register\">\n                    <i _ngcontent-c1=\"\" aria-hidden=\"true\" class=\"fa fa-chevron-right\"></i> Get Started!\n                </a>\n            </span>\n          </div>\n      </div>\n  </div>\n"

/***/ }),

/***/ "./src/app/user/terms-of-service/terms-of-service.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return TermsOfServiceComponent; });
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

var TermsOfServiceComponent = /** @class */ (function () {
    function TermsOfServiceComponent() {
    }
    TermsOfServiceComponent.prototype.ngOnInit = function () {
    };
    TermsOfServiceComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            selector: 'app-terms-of-service',
            template: __webpack_require__("./src/app/user/terms-of-service/terms-of-service.component.html"),
            styles: [__webpack_require__("./src/app/user/terms-of-service/terms-of-service.component.css")]
        }),
        __metadata("design:paramtypes", [])
    ], TermsOfServiceComponent);
    return TermsOfServiceComponent;
}());



/***/ }),

/***/ "./src/app/user/terms-of-use/terms-of-use.component.css":
/***/ (function(module, exports) {

module.exports = ".body_container{\n    background: #f2f2f2;\n    margin-top: -33px;\n    padding-bottom: 23px;\n}\n.sec2_btn_main a{\n    margin-bottom: -53px;\n}"

/***/ }),

/***/ "./src/app/user/terms-of-use/terms-of-use.component.html":
/***/ (function(module, exports) {

module.exports = "\n  <div class=\"body_container\">\n    <div class=\"why-us-main\" style=\"padding-bottom:30px;\">\n      <div class=\"wrapper\">\n        <span class=\"welcome_text\" style=\"padding-top:70px;\">Terms of Use</span>\n\n        <p class=\"privacy_pera\">PLEASE READ THESE TERMS OF USE CAREFULLY BEFORE USING THIS SITE.</p>\n\n        <p class=\"privacy_pera\">By accessing or using any web site or service made available by Keep It Simple, LLC, including but not limited to the SimplyWilled website (the &quot;Site&quot;) or any SimplyWilled applications or application plug-ins (&quot;Applications&quot;), you acknowledge that you have read, and agree to follow and be bound by these terms of use (the &quot;Terms of Use&quot;) and agree to comply with all applicable laws and regulations, including United States export and re-export control laws and regulations. In these Terms of Use, the words &quot;you&quot; and &quot;your&quot; refer to each customer, Site visitor, or Application user, &quot;we&quot;, &quot;us&quot; and &quot;our&quot; refer to Keep It Simple, LLC and its subsidiaries and affiliates, and &quot;Services&quot; refers to all services provided by us.</p>\n\n        <p class=\"privacy_pera\">It is your responsibility to review these Terms of Use periodically. If at any time you find these Terms of Use unacceptable or&nbsp;<strong><em>if you do not agree to these Terms of Use, please do not use this Site or any Applications.</em></strong>&nbsp;We may revise these Terms of Use at any time without notice to you. If you have any questions about these Terms of Use, please contact us at <a href=\"mailto:info@simplywilled.com\">info@simplywilled.com</a>.</p>\n\n        <p class=\"privacy_pera\">YOU AGREE THAT BY USING THE SITE, ANY APPLICATIONS, AND THE SERVICES YOU ARE AT LEAST 18 YEARS OF AGE AND YOU ARE LEGALLY ABLE TO ENTER INTO A CONTRACT.</p>\n\n        <p class=\"privacy_pera\"><strong>Except as expressly provided herein, these Terms require the use of arbitration on an individual basis to resolve disputes, rather than jury trials or class actions, and also limit the remedies available to you in the event of a dispute.</strong></p>\n\n        <p class=\"privacy_pera\">Please also refer to our <a routerLink=\"/terms-of-service\">Terms of Service</a> and <a routerLink=\"/privacy-policy\">Privacy Policy</a>, and any other terms accepted when making your purchase, each of which is incorporated herein by reference.</p>\n\n        <p class=\"privacy_pera\">SimplyWilled provides an online legal portal to give visitors a general understanding of the law and to provide an automated software solution to individuals who choose to prepare their own legal documents. SimplyWilled hosts its proprietary software as a backend service for customers when they create their own documents. The Site includes general information on commonly encountered legal issues, and offers online forms and questionnaires to walk the Customer through providing the information necessary to build legal documents.</p>\n\n        <p class=\"privacy_pera\">The Keep It Simple Services provided at SimplyWilled also include a review of your answers for completeness, spelling, and for internal consistency of names, addresses, and other data input by the Customer. &nbsp;At no time do we review your answers for legal sufficiency, draw legal conclusions, provide legal advice, opinions or recommendations about your legal rights, remedies, defenses, options, selection of forms, or strategies, or apply the law to the facts of your particular situation. &nbsp;Keep It Simple is not a law firm and does not perform services performed by an attorney.<strong>&nbsp; Keep It Simple, its Services, and its forms or templates are not a substitute for the advice or services of an attorney.</strong> &nbsp;</p>\n\n        <p class=\"privacy_pera\">BY USING OUR SITE AND SERVICES, YOU ACKNOWLEDGE THAT YOU UNDERSTAND THAT ANY ERROR REVIEW IS AN AUTOMATED PROCESS THAT IS LIMITED TO COMPLETENESS, SPELLING, AND FOR INTERNAL CONSISTENCY OF NAMES, ADDRESSES, AND THE LIKE. IT IS ON A BEST EFFORT BASIS AND IS NOT A COMPREHENSIVE ANALYSIS. YOU AGREE TO READ THE FINAL DOCUMENT(S) IN THEIR ENTIRETY PRIOR TO EXECUTION, AND AGREE TO BEAR SOLE RESPONSIBILITY FOR THE FINAL DOCUMENT(S).</p>\n\n        <p class=\"privacy_pera\">At SimplyWilled, we strive to keep our documents and information accurate and up-to-date. However, because the law changes rapidly, we cannot guarantee that all of the information on the Site or Applications is completely current. The law is different from jurisdiction to jurisdiction, and may be subject to interpretation by different courts. The law is a personal matter, and no general information or legal tool like the kind SimplyWilled provides can fit every circumstance. Furthermore, the legal information contained on the Site and Applications is not legal advice and is not guaranteed to be correct, complete or up-to-date.</p>\n\n        <p class=\"privacy_pera\">The Site and Applications are not intended to create any attorney-client relationship, and your use of SimplyWilled does not and will not create an attorney-client relationship between you and Keep It Simple or any of its employees, agents, subsidiaries or affiliates. &nbsp;Instead, you are and will be representing yourself in any legal matter you undertake through LegalZoom&#39;s legal document service. &nbsp;Accordingly, the information you provide us in using our Site and Services is not protected by the attorney-client privilege or as attorney work product.&nbsp; Therefore, if you need legal advice for your specific problem, or if your specific problem is too complex to be addressed by our tools, you should consult a licensed attorney in your area.&nbsp;</p>\n\n        <p class=\"privacy_pera\"><strong>1. Privacy Policy.</strong>&nbsp; Keep It Simple cares about your privacy, and encourages your review of our Privacy Policy, which is expressly incorporated into this Agreement by reference.&nbsp;</p>\n\n        <p class=\"privacy_pera\">When you open an account to use or access certain portions of the Site, Applications, or the Services, you must provide complete and accurate information as requested on the registration form. You will also be asked to provide a user name and password. You are entirely responsible for maintaining the confidentiality of your password. You may not use a third party&#39;s account, user name or password at any time. You agree to notify us immediately of any unauthorized use of your account, user name or password. Keep It Simple shall not be liable for any losses you incur as a result of someone else&#39;s use of your account or password, either with or without your knowledge. You may be held liable for any losses incurred by Keep It Simple, our affiliates, officers, directors, employees, consultants, agents and representatives due to someone else&#39;s use of your account or password.</p>\n\n        <p class=\"privacy_pera\">In connection with the use of certain Keep It Simple products or services, you may be asked to provide personal information in a questionnaire, application, form or similar document or service. This information will be protected pursuant to our&nbsp;<u>Privacy Policy</u>. In addition, you grant Keep It Simple a worldwide, royalty-free, nonexclusive, and fully sublicensable license to use, distribute, reproduce, modify, publish and translate this personal information solely for the purpose of enabling your use of the applicable service. You may revoke this license and terminate rights held by Keep It Simple at any time by removing your personal information from the applicable service.</p>\n\n        <p class=\"privacy_pera\">By using and accessing our Site and Services, you consent to have your personal data collected, used, transferred to and processed in the United States. We have implemented commercially reasonable technical and organizational measures designed to secure your personal information from accidental loss and from unauthorized access, use, alteration or disclosure. However, we cannot guarantee that unauthorized third parties will never be able to defeat those measures or use your personal information for improper purposes. You agree that you provide your personal information and other data provided to Keep It SImple at your own risk.</p>\n\n        <p class=\"privacy_pera\"><strong>2. Ownership.</strong>&nbsp;This Site and Applications are owned and operated by Keep It Simple, LLC. &nbsp;All right, title and interest in and to the materials provided on this Site and Applications, including but not limited to information, documents, logos, graphics, sounds and images (the &quot;Materials&quot;) are owned either by Keep It Simple or by our respective third party authors, developers or vendors (&quot;Third Party Providers&quot;). Except as otherwise expressly provided by Keep It Simple, none of the Materials may be copied, reproduced, republished, downloaded, uploaded, posted, displayed, transmitted or distributed in any way and nothing on this Site or on any Applications shall be construed to confer any license under any of Keep It Simple&#39;s intellectual property rights, whether by estoppel, implication or otherwise. See the &quot;Legal Contact Information&quot; below if you have any questions about obtaining such licenses. Keep It Simple does not sell, license, lease or otherwise provide any of the Materials other than those specifically identified as being provided by Keep It Simple. Any rights not expressly granted herein are reserved by Keep It Simple.</p>\n\n        <p class=\"privacy_pera\"><strong>3. Limited Permission to Download.</strong>&nbsp;Subject to these Terms of Use, the Terms of Service, and other Keep It Simple terms and conditions as they may change from time to time, which are incorporated herein by reference, Keep It Simple hereby grants you permission to download, view, copy and print the Materials on any single, stand-alone computer (or, for Microsoft Agave users, one copy of the Application on up to five devices affiliated with your Marketplace Windows Live ID account) or device solely for your personal, informational, non-commercial use provided that (i) where provided, the copyright and trademark notices appearing on any Materials not be altered or removed, (ii) the Materials are not used on any other website or in a networked computer environment and (iii) the Materials are not modified in any way, except for authorized editing of downloadable forms for personal use. This permission terminates automatically without notice if you breach any of the terms or conditions of these Terms of Use. On any such termination, you agree to immediately destroy any downloaded or printed Materials. Any unauthorized use of any Materials contained on this Site or Applications may violate copyright laws, trademark laws, laws of privacy and publicity and communications regulations and statutes.</p>\n\n        <p class=\"privacy_pera\"><strong>4. Links to Third Party Sites.</strong>&nbsp;This Site and Applications may contain links to websites controlled by parties other than Keep It Simple (each a &quot;Third Party Site&quot;). Keep It Simple works with a number of partners and affiliates whose sites are linked with Keep It Simple. &nbsp;Keep It Simple may also provide links to other citations or resources with whom it is not affiliated. Keep It Simple is not responsible for and does not endorse or accept any responsibility for the availability, contents, products, services or use of any Third Party Site, any website accessed from a Third Party Site or any changes or updates to such sites. Keep It Simple makes no guarantees about the content or quality of the products or services provided by such sites. Keep It Simple is not responsible for webcasting or any other form of transmission received from any Third Party Site. Keep It Simple is providing these links to you only as a convenience, and the inclusion of any link does not imply endorsement by Keep It Simple of the Third Party Site, nor does it imply that Keep It Simple sponsors, is affiliated or associated with, guarantees, or is legally authorized to use any trade name, registered trademark, logo, legal or official seal, or copyrighted symbol that may be reflected in the links. You acknowledge that you bear all risks associated with access to and use of content provided on a Third Party Site and agree that Keep It Simple is not responsible for any loss or damage of any sort you may incur from dealing with a third party. You should contact the site administrator for the applicable Third Party Site if you have any concerns regarding such links or the content located on any such Third Party Site.</p>\n\n        <p class=\"privacy_pera\"><strong>5. Authorized Use.</strong>&nbsp;</p>\n\n        <p class=\"privacy_pera\"><strong>Use of Forms and Technology.&nbsp; </strong>On our Site, through our Applications, and through certain partners, we offer self-help &quot;fill in the blank&quot; forms. If you buy or download a form on our Site or Application, the terms and conditions of these Terms of Use control. You understand that your purchase, download, and/or use of a form document is neither legal advice nor the practice of law, and that each form and any applicable instructions or guidance is not customized to your particular needs.&nbsp; Therefore, if you need legal advice for your specific problem, or if your specific problem is too complex to be addressed by our tools, you should consult a licensed attorney in your area.</p>\n\n        <p class=\"privacy_pera\"><strong>United States Users Only. </strong></p>\n\n        <p class=\"privacy_pera\">The Services are controlled and operated from the United States. Keep It Simple makes no representations that the Services are appropriate or available for use in other locations. Those who access or use the Services from other jurisdictions do so at their own volition and are entirely responsible for compliance with all applicable local laws and regulations, including but not limited to export and import regulations. You may not use the Services if you are a resident outside the United States, of a country embargoed by the United States, or are a foreign person or entity blocked or denied by the United States government. Unless otherwise explicitly stated, all materials found on the Services are solely directed to individuals, companies, or other entities located in the United States.</p>\n\n        <p class=\"privacy_pera\"><strong>Keep It Simple Intellectual Property.</strong></p>\n\n        <p class=\"privacy_pera\">For the purposes of these Terms of Use, &ldquo;Intellectual Property Rights&rdquo; means all patent rights, copyright rights, mask work rights, moral rights, rights of publicity, trademark, trade dress and service mark rights, goodwill, trade secret rights and other intellectual property rights as may now exist or hereafter come into existence, and all applications therefore and registrations, renewals and extensions thereof, under the laws of any state, country, territory or other jurisdiction.</p>\n\n        <p class=\"privacy_pera\">Except for your User Content (defined herein below), all Services provided by Keep It Simple, including, without limitation, software, images, text, graphics, illustrations, logos, patents, trademarks, service marks, copyrights, photographs, audio, videos, and music (&ldquo;Keep It Simple Content&rdquo;), and all Intellectual Property Rights related thereto, are the exclusive property of Keep It Simple and its licensors. Except as explicitly provided herein, nothing in these Terms of Use shall be deemed to create a license in or under any such Intellectual Property Rights, and you agree not to sell, license, rent, modify, distribute, copy, reproduce, transmit, publicly display, publicly perform, publish, adapt, edit or create derivative works from any materials or content accessible on the Services. Use of the Keep It Simple Site, Application, and Services, and its content or materials, for any purpose not expressly permitted by these Terms of Use, is strictly prohibited.&nbsp; All Rights Reserved.&nbsp;</p>\n\n        <p class=\"privacy_pera\"><strong>License to Use.</strong></p>\n\n        <p class=\"privacy_pera\">Subject to your compliance with the terms and conditions of these Terms of Use and our Terms of Service and other supplemental terms and policies, as they may change from time to time, Keep It Simple grants you limited, non-exclusive, non-transferable license to use our Site and Services as designed and as set forth in these Terms of Use, for your own personal, internal business use.&nbsp; Keep It Simple reserves all rights not expressly granted herein in the Services and the Keep It Simple Content.&nbsp; This license shall be freely revocable, meaning that Keep It Simple may terminate this license at any time without notice and for any reason or no reason.</p>\n\n        <p class=\"privacy_pera\">Except as otherwise provided, you acknowledge and agree that you have no right to modify, edit, copy, reproduce, create derivative works of, reverse engineer, alter, enhance or in any way exploit any of the Forms in any manner, except for modifications in filling out the Forms for your authorized use. You shall not remove any copyright notice from any Form.&nbsp;</p>\n\n        <p class=\"privacy_pera\"><strong>Prohibited Activities - Resale of Forms Prohibited.</strong></p>\n\n        <p class=\"privacy_pera\">By ordering or downloading Forms, you agree that the Forms you purchase or download may only be used by you for your personal or business use and may not be sold or redistributed without the express written consent of Keep It Simple.</p>\n\n        <p class=\"privacy_pera\">You agree not to engage in any of the following prohibited activities: (i) copying, distributing, or disclosing any part of the Services in any medium, including without limitation by any automated or non-automated &ldquo;scraping&rdquo;; (ii) using any automated system to access the Services in a manner that sends more request messages to the Keep It Simple and/or SimplyWilled servers than a human can reasonably produce in the same period of time by using a conventional on-line web browser (except that Keep It SImple grants the operators of public search engines revocable permission to use spiders to copy materials from publicly accessible web pages at SimplyWilled for the sole purpose of and solely to the extent necessary for creating publicly available searchable indices of the materials, but not caches or archives of such materials); (iii) transmitting spam, chain letters, or other unsolicited email; (iv) attempting to interfere with, compromise the system integrity or security or decipher any transmissions to or from the servers running the Services; (v) taking any action that imposes, or may impose at our sole discretion an unreasonable or disproportionately large load on our infrastructure; (vi) uploading invalid data, viruses, worms, or other software agents through the Services; (vii) collecting or harvesting any personally identifiable information, including account names, from the Services; (viii) using the Services for any commercial solicitation purposes; (ix) impersonating another person or otherwise misrepresenting your affiliation with a person or entity, conducting fraud, hiding or attempting to hide your identity; (x) interfering with the proper working of the Services; (xi) accessing any content on the Services through any technology or means other than those provided or authorized by the Services; or (xii) bypassing the measures we may use to prevent or restrict access to the Services, including without limitation features that prevent or restrict use or copying of any content or enforce limitations on use of the Services or the content therein.</p>\n\n        <p class=\"privacy_pera\"><strong>6. CUSTOMER DISPUTE RESOLUTION BY BINDING ARBITRATION</strong></p>\n\n        <p class=\"privacy_pera\">Please read this carefully. It affects your rights.</p>\n\n        <p class=\"privacy_pera\">Reservation of Rights:&nbsp;</p>\n\n        <p class=\"privacy_pera\">This provision shall apply only to disputes brought by customers against Keep It Simple. Claims by Keep It Simple against customers, employees, agents, competitors, and any other third parties shall be excluded from this provision.&nbsp; Keep It Simple reserves all rights to bring a claim or lawsuit in any forum or venue of jurisdiction against a customer, employee, agent, competitor or third party for violations of its Terms of Services, Terms of Use, other supplemental terms and policies, or any alleged violation of its intellectual property rights.</p>\n\n        <p class=\"privacy_pera\">Summary:&nbsp;</p>\n\n        <p class=\"privacy_pera\">Most customer concerns can be resolved quickly and to the customer&#39;s satisfaction by contacting us at <a href=\"mailto:info@simplywilled.com\">info@simplywilled.com</a>. &nbsp;<strong>In the unlikely event that we are unable to resolve your complaint to your satisfaction (or if Keep It Simple has not been able to resolve a dispute it has with you after attempting to do so informally), we each agree to resolve those disputes through binding arbitration or in small claims court rather than in a court of general jurisdiction.</strong>&nbsp;Arbitration is less formal than a lawsuit in court. Arbitration uses a neutral arbitrator instead of a judge or jury, allows for more limited discovery than a court does, and is subject to very limited review by courts.<strong>&nbsp; By using our Site and Services, you agree that any arbitration under these Terms will take place on an individual basis and waive the right to participate in a class action; class arbitrations and class actions are not permitted.</strong><strong>&nbsp;No arbitration proceeding of any nature shall be certified as a class action or proceed as a class action, or on a basis involving claims brought in a purported representative capacity on behalf of the general public, other customers, or potential customer or Persons similarly situated.</strong>&nbsp;</p>\n\n        <p class=\"privacy_pera\">You may speak with independent legal counsel before using this Site or completing any purchase. &nbsp;</p>\n\n        <p class=\"privacy_pera\"><strong>Arbitration Agreement:&nbsp;</strong></p>\n\n        <p class=\"privacy_pera\">(a) Keep It Simple and you agree to arbitrate&nbsp;<strong>all disputes and claims</strong>&nbsp;between us before a single arbitrator. The types of disputes and claims we agree to arbitrate are intended to be broadly interpreted. It applies, without limitation, to:</p>\n\n        <ul class=\"privacy_unorder_list\">\n          <li>claims arising out of or relating to any aspect of the relationship between us, whether based in contract, tort, statute, fraud, misrepresentation, or any other legal theory;</li>\n          <li>claims that arose before these or any prior Terms (including, but not limited to, claims relating to advertising);</li>\n          <li>claims that are currently the subject of purported class action litigation in which you are not a member of a certified class; and</li>\n          <li>claims that may arise after the termination of these Terms.</li>\n        </ul>\n\n        <p class=\"privacy_pera\">For the purposes of this Arbitration Agreement, references to &quot;Keep It Simple,&quot; &quot;you,&quot; and &quot;us&quot; include our respective subsidiaries, affiliates, agents, employees, business partners, predecessors in interest, successors, and assigns, as well as all authorized or unauthorized users or beneficiaries of services or products under these Terms or any prior agreements between us. &nbsp;Beneficiaries include, but are not limited to, those named in an estate planning document.&nbsp;</p>\n\n        <p class=\"privacy_pera\">Notwithstanding the foregoing, either party may bring an individual action in the small claims court of the District of Columbia Superior Court. You agree that: (i) the Services shall be deemed solely based in the District of Columbia; and (ii) the Services shall be deemed passive that do not give rise to personal jurisdiction over Keep It Simple, either specific or general, in jurisdictions other than the District of Columbia. You expressly agree that your rights and obligations, these Terms, and any disputes shall be governed by and interpreted in accordance with the laws of the District of Columbia, excluding its choice of law rules. You also acknowledge and agree that you are waiving the right to a jury trial, and to participate as a plaintiff or class in any purported class action or representative proceeding. Further, unless both you and Keep It Simple otherwise agree in writing, you agree not to consolidate more than one person&rsquo;s claims, and may not otherwise preside over any form of any class or representative proceeding.<strong>&nbsp; You agree that, by entering into these Terms, you and Keep It Simple are each waiving the right to a trial by jury or to participate in a class action.</strong></p>\n\n        <p class=\"privacy_pera\">This arbitration agreement does not preclude your bringing issues to the attention of federal, state, or local agencies. Such agencies can, if the law allows, seek relief against us on your behalf.&nbsp;&nbsp;These Terms evidence a transaction or website use in interstate commerce, and thus the Federal Arbitration Act (&ldquo;FAA&rdquo;) governs the interpretation and enforcement of this provision. This arbitration provision will survive termination of these Terms.&nbsp;</p>\n\n        <p class=\"privacy_pera\">(b) A party who intends to seek arbitration must first send, by U.S. certified mail, a written Notice of Dispute (&quot;Notice&quot;) to the other party. &nbsp;A Notice to Keep It Simple should be addressed to: Notice of Dispute, General Counsel, Keep it Simplel LLC, 1725 DeSales Street NW, Suite 600, Washington, DC 20036 (the &quot;Notice Address&quot;). The Notice must (a) describe the nature and basis of the claim or dispute and (b) set forth the specific relief sought (&quot;Demand&quot;). If Keep It Simple and you do not reach an agreement to resolve the claim within 30 days after the Notice is received, you or Keep It Simple may commence an arbitration proceeding. During the arbitration, the amount of any settlement offer made by Keep It Simple or you shall not be disclosed to the arbitrator until after the arbitrator determines the amount, if any, to which you or Keep It Simple is entitled.&nbsp;</p>\n\n        <p class=\"privacy_pera\">(c) The arbitration will be governed by the Consumer Arbitration Rules (the &quot;AAA Rules&quot;) of the American Arbitration Association (the &quot;AAA&quot;), as modified by these Terms, and will be administered by the AAA. The AAA Rules are available online at&nbsp;<a href=\"http://www.adr.org/\" target=\"_blank\">www.adr.org</a>&nbsp;or by calling the AAA at 1-800-778-7879. &nbsp;The arbitrator is bound by these Terms.&nbsp; All issues are for the arbitrator to decide, except that issues relating to the scope, enforceability, and interpretation of the arbitration provision and the scope, enforceability, and interpretation of paragraph (f) are for the court to decide.&nbsp; Unless Keep It Simple and you agree otherwise, any arbitration hearings will take place in the county (or parish) of your contact address. &nbsp;If your claim is for $10,000 or less, you may choose whether the arbitration will be conducted solely on the basis of documents submitted to the arbitrator or by a telephonic hearing, or by an in-person hearing as established by the AAA Rules. If you choose to proceed either in person or by telephone, we may choose to respond only by telephone or submission. If your claim exceeds $10,000, the AAA Rules will determine whether you have a right to a hearing. The parties agree that in any arbitration of a dispute or claim, neither party will rely for preclusive effect on any award or finding of fact or conclusion of law made in any other arbitration of any dispute or claim to which Keep It Simple was a party. The payment of arbitration fees will be governed by the AAA Rules.</p>\n\n        <p class=\"privacy_pera\">(d) If, after finding in your favor in any respect on the merits of your claim, the arbitrator issues you an award that is greater than the value of Keep It Simple&#39;s last written settlement offer made before an arbitrator was selected, then Keep It Simple will:</p>\n\n        <ul class=\"privacy_unorder_list\">\n          <li>pay you either the amount of the award or $2,000 (&quot;the alternative payment&quot;), whichever is greater; and</li>\n          <li>pay your attorney, if any, the amount of attorney&#39;s fees, and reimburse any expenses (including expert witness fees and costs), that your attorney reasonably accrues for investigating, preparing, and pursuing your claim in arbitration (the &quot;attorney&#39;s payment&quot;).</li>\n          <li>IN NO EVENT SHALL KEEP IT SIMPLE, ITS AFFILIATES, AGENTS, DIRECTORS, EMPLOYEES, SUPPLIERS, OR LICENSORS BE LIABLE TO YOU FOR ANY CLAIMS, PROCEEDINGS, LIABILITIES, OBLIGATIONS, DAMAGES, LOSSES OR COSTS IN AN AMOUNT EXCEEDING THE AMOUNT YOU PAID TO KEEP IT SIMPLE HEREUNDER.</li>\n        </ul>\n\n        <p class=\"privacy_pera\">If Keep It Simple did not make a written offer to settle the dispute before an arbitrator was selected, you and your attorney will be entitled to receive the alternative payment and the attorney&#39;s fees, respectively, if the arbitrator awards you any relief on the merits. The arbitrator may make rulings and resolve disputes as to the payment and reimbursement of fees, expenses, and the alternative payment and the attorney&#39;s fees at any time during the proceeding and upon request from either party made within 14 days of the arbitrator&#39;s ruling on the merits.&nbsp; In assessing whether an award that includes attorney&rsquo;s fees or expenses is greater than the value of Keep It Simple&rsquo;s last written settlement offer, the arbitrator shall include in his or her calculations only the value of any attorney&rsquo;s fees or expenses you reasonably incurred in connection with the arbitration proceeding before Keep It Simple&rsquo;s settlement offer.</p>\n\n        <p class=\"privacy_pera\">(e) The right to attorney&#39;s fees and expenses discussed in paragraph (d) supplements any right to attorney&#39;s fees and expenses you may have under applicable law. Thus, if you would be entitled to a larger amount under applicable law, this provision does not preclude the arbitrator from awarding you that amount. However, you may not recover duplicative awards of attorney&#39;s fees or costs.</p>\n\n        <p class=\"privacy_pera\">(f) The arbitrator may award injunctive relief only in favor of the individual party seeking relief and only to the extent necessary to provide relief warranted by that party&#39;s individual claim. YOU AND KEEP IT SIMPLE AGREE THAT EACH MAY BRING CLAIMS AGAINST THE OTHER ONLY IN YOUR OR ITS INDIVIDUAL CAPACITIES AND NOT AS PLAINTIFFS OR CLASS MEMBERS IN ANY PURPORTED CLASS OR REPRESENTATIVE PROCEEDING OR IN THE CAPACITY OF A PRIVATE ATTORNEY GENERAL. Further, unless both you and Keep It Simple agree otherwise, the arbitrator may not consolidate more than one person&#39;s claims, and may not otherwise preside over any form of a representative or class proceeding. The arbitrator may award any relief that a court could award that is individualized to the claimant and would not affect other customers.&nbsp; Neither you nor we may seek non-individualized relief that would affect other customers.&nbsp; If a court decides that applicable law precludes enforcement of any of this paragraph&#39;s limitations as to a particular claim for relief, then that claim (and only that claim) must be severed from the arbitration and may be brought in court.</p>\n\n        <p class=\"privacy_pera\">(g) If the amount in dispute exceeds $75,000 or either party seeks any form of injunctive relief, either party may appeal the award to a three-arbitrator panel administered by AAA by a written notice of appeal within thirty (30) days from the date of entry of the written arbitration award. An award of injunctive relief shall be stayed during any such appeal. The members of the three-arbitrator panel will be selected according to AAA rules. The three-arbitrator panel will issue its decision within one hundred and twenty (120) days of the date of the appealing party&#39;s notice of appeal. The decision of the three-arbitrator panel shall be final and binding, subject to any right of judicial review that exists under the FAA.</p>\n\n        <p class=\"privacy_pera\">(h) Notwithstanding any provision in the applicable Terms to the contrary, we agree that if we make any future change to this arbitration provision (other than a change to any notice address, website link or telephone number provided herein), that change will not apply to any dispute of which we had written notice on the effective date of the change. Moreover, if we seek to terminate this arbitration provision, any such termination will not be effective until at least thirty (30) days after written notice of such termination is provided to you, and shall not be effective as to disputes which arose prior to the date of termination.</p>\n\n        <p class=\"privacy_pera\"><strong>7. Additional Terms.</strong>&nbsp;Some Keep It Simple Services may be subject to additional posted guidelines, rules or terms of service (&quot;Additional Terms&quot;) and your use of such Services will be conditioned on your agreement to the Additional Terms. If there is any conflict between these Terms of Use and the Additional Terms, the Additional Terms will control for that Service, unless the Additional Terms expressly state that these Terms of Use will control.</p>\n\n        <p class=\"privacy_pera\"><strong>8. &nbsp;Billing.&nbsp; </strong></p>\n\n        <p class=\"privacy_pera\">Certain aspects our Services may be provided for a fee or other charge. If you elect to use the paid aspects of our Services, you agree to the pricing, payment and billing policies applicable to such fees and charges. Keep It Simple may add new services for additional fees and charges, or amend fees and charges for existing services, at any time in its sole discretion. In placing an order through the Site, you authorize Keep It Simple to charge your credit card for all fees and charges incurred in connection with your use of the Services, including Keep It Simple&rsquo;s fees, government fees, taxes and other third party fees. You agree to pay all charges incurred by users of your credit card, debit card, or other payment method used in connection with a purchase of our Services at the prices in effect at the time the charges are incurred. You will pay any applicable taxes, if any, relating to any such purchases, transactions or other monetary transaction interactions.</p>\n\n        <p class=\"privacy_pera\">In the event you receive a refund of monies for your purchase from Keep It Simple, you agree to release all claims against Keep It Simple arising out of or related to your use or access of our Site, Applications, and Services.&nbsp;&nbsp;</p>\n\n        <p class=\"privacy_pera\">If you register with us, you may cancel your account at any time; however, there are no refunds for cancellation. &nbsp;In the event that Keep It Simple suspends or terminates your account or these Terms of Service, you understand and agree that you shall receive no refund or exchange for any Keep It Simple Content, any unused time or service on a subscription, any license or subscription fees for any portion of the Services, any content or data associated with your account, or for anything else.</p>\n\n        <p class=\"privacy_pera\"><strong>9.&nbsp; Reviews, Comments, Communications, and Other Content.</strong>&nbsp;At various locations on the Site or through Applications, Keep It Simple may permit visitors to post ratings, reviews, comments, questions, answers, and other content (the &quot;User Content&quot;). Contributions to, access to and use of the User Content is subject to this paragraph and the other terms and conditions of these Terms of Use.</p>\n\n        <p class=\"privacy_pera\"><strong>Rights and Responsibilities of </strong><strong>Keep It Simple</strong><strong>.</strong></p>\n\n        <p class=\"privacy_pera\">Keep It Simple is not the publisher or author of the User Content. Keep It Simple takes no responsibility and assumes no liability for any content posted by you or any third party.&nbsp; You are solely responsible for your interactions with any other users of our Services.</p>\n\n        <p class=\"privacy_pera\">Although we cannot make an absolute guarantee of system security, Keep It Simple takes reasonable steps to maintain security. If you have reason to believe system security has been breached, contact us at <a href=\"mailto:info@simplywilled.com\">info@simplywilled.com</a> for help.</p>\n\n        <p class=\"privacy_pera\">If Keep It Simple&#39;s technical staff finds that files or processes belonging to a member pose a threat to the proper technical operation of the system or to the security of other members, Keep It Simple reserves the right to delete those files or to stop those processes. If the Keep It Simple technical staff suspects a user name is being used by someone who is not authorized by the proper user, Keep It Simple may temporarily disable that user&#39;s access in order to preserve system security. In all such cases, Keep It Simple will contact the member as soon as feasible.</p>\n\n        <p class=\"privacy_pera\">Keep It Simple has the right (but not the obligation), in our sole and absolute discretion, to edit, redact, remove, re-categorize to a more appropriate location or otherwise change any User Content.</p>\n\n        <p class=\"privacy_pera\"><strong>Rights and Responsibilities of Users or Other Posters of User Content.</strong></p>\n\n        <p class=\"privacy_pera\">You are legally and ethically responsible for any User Content - writings, files, pictures or any other work - that you post or transmit using any Keep It Simple service that allows interaction or dissemination of information. In posting User Content, you agree that you will not submit any content:</p>\n\n        <ul class=\"privacy_unorder_list\">\n          <li>that is known by you to be false, inaccurate or misleading;</li>\n          <li>that infringes anyone&rsquo;s copyright, patent, trademark, trade secret or other proprietary rights or rights of publicity or privacy. Please see Compliance with Intellectual Property Laws below;</li>\n          <li>that violates any law, statute, ordinance, or regulation (including, but not limited to, those governing export control, consumer protection, unfair competition, antidiscrimination, or false advertising). Please see Compliance with Export Restrictions below;</li>\n          <li>that is, or may reasonably be considered to be, defamatory, libelous, hateful, racially or religiously biased or offensive, unlawfully threatening or unlawfully harassing, or advocates or encourages illegal conduct harmful to any individual, partnership or corporation. Please see Inappropriate Content below;</li>\n          <li>that includes advertisements, spam, or content for which you were compensated or granted any consideration by any third party;</li>\n          <li>that includes information that references other websites, addresses, email addresses, phone numbers, or other contact information;</li>\n          <li>that contains any computer virus, worms, or other potentially damaging computer programs or files;</li>\n          <li>that otherwise violates these Terms of Use.</li>\n        </ul>\n\n        <p class=\"privacy_pera\">Attorneys that submit User Content and provide advice do so at their own risk.</p>\n\n        <p class=\"privacy_pera\">Under United States federal law, you retain copyright on all works you create and post as User Content, unless you choose specifically to renounce it. In posting a work as User Content, you authorize other members who have access to that service to make personal and customary use of the work, including creating links or reposting, but not otherwise to reproduce or disseminate it unless you give permission for such dissemination.</p>\n\n        <p class=\"privacy_pera\">You grant Keep It Simple a perpetual, irrevocable, royalty-free, transferable right and license to use, copy, modify, delete in its entirety, adapt, publish, translate, create derivative works from, sell, distribute, and/or incorporate such content into any form, medium, or technology throughout the world without compensation to you. You have the right to remove any of your works from User Content at any time.</p>\n\n        <p class=\"privacy_pera\">Ratings and reviews will generally be posted in two to four business days.</p>\n\n        <p class=\"privacy_pera\">By submitting your email address in connection with your rating and review, you agree that Keep It Simple may use your email address to contact you about the status of your review and other administrative purposes.</p>\n\n        <p class=\"privacy_pera\"><strong>9. NO WARRANTY.</strong>&nbsp;THE SITE, APPLICATIONS, SERVICES, AND ALL MATERIALS, DOCUMENTS OR FORMS PROVIDED ON OR THROUGH YOUR USE OF THE SITE OR APPLICATIONS ARE PROVIDED ON AN &quot;AS IS&quot; AND &quot;AS AVAILABLE&quot; BASIS. &nbsp;TO THE FULLEST EXTENT PERMITTED BY LAW, KEEP IT SIMPLE EXPRESSLY DISCLAIMS ALL WARRANTIES OF ANY KIND, WHETHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, TITLE AND NON-INFRINGEMENT. NO ADVICE OR INFORMATION, WHETHER ORAL OR WRITTEN, OBTAINED BY YOU FROM KEEP IT SIMPLE OR THROUGH THE SERVICES WILL CREATE ANY WARRANTY NOT EXPRESSLY STATED HEREIN.</p>\n\n        <p class=\"privacy_pera\">KEEP IT SIMPLE MAKES NO WARRANTY THAT: (A) THE SITE, APPLICATIONS, OR THE MATERIALS WILL MEET YOUR REQUIREMENTS; (B) THE SITE, APPLICATIONS, OR THE MATERIALS WILL BE AVAILABLE ON AN UNINTERRUPTED, TIMELY, SECURE OR ERROR-FREE BASIS; (C) THE RESULTS THAT MAY BE OBTAINED FROM THE USE OF THE SITE, APPLICATIONS, OR ANY MATERIALS OFFERED THROUGH THE SITE OR APPLICATIONS, WILL BE ACCURATE OR RELIABLE; OR (D) THE QUALITY OF ANY PRODUCTS, SERVICES, INFORMATION OR OTHER MATERIAL PURCHASED OR OBTAINED BY YOU THROUGH THE SITE, APPLICATIONS, OR IN RELIANCE ON THE MATERIALS WILL MEET YOUR EXPECTATIONS.</p>\n\n        <p class=\"privacy_pera\">OBTAINING ANY MATERIALS THROUGH THE USE OF THE SITE OR APPLICATIONS IS DONE AT YOUR OWN DISCRETION AND AT YOUR OWN RISK. KEEP IT SIMPLE SHALL HAVE NO RESPONSIBILITY FOR ANY DAMAGE TO YOUR COMPUTER SYSTEM OR LOSS OF DATA THAT RESULTS FROM THE DOWNLOAD OF ANY CONTENT, MATERIALS, INFORMATION OR SOFTWARE.</p>\n\n        <p class=\"privacy_pera\">WITHOUT LIMITING THE FOREGOING, KEEP IT SIMPLE AND ITS LICENSORS DO NOT WARRANT THAT THE CONTENT ON THEIR WEBSITE, DOCUMENTS, OR TEMPLATES IS ACCURATE, RELIABLE OR UP-TO-DATE; THAT THE SERVICES WILL MEET YOUR NEEDS; THAT THE SERVICES WILL BE AVAILABLE AT ANY PARTICULAR TIME OR LOCATION, UNINTERRUPTED OR SECURE; THAT ANY DEFECTS OR ERRORS WILL BE CORRECTED; OR THAT THE SERVICES ARE FREE OF VIRUSES OR OTHER HARMFUL COMPONENTS. &nbsp;ANY CONTENT DOWNLOADED OR OTHERWISE OBTAINED THROUGH THE USE OF THE SERVICES IS DOWNLOADED AT YOUR OWN RISK AND YOU WILL BE SOLELY RESPONSIBLE FOR ANY DAMAGE TO YOUR COMPUTER SYSTEM OR LOSS OF DATA THAT RESULTS FROM SUCH DOWNLOAD OR YOUR USE OF THE SERVICES.</p>\n\n        <p class=\"privacy_pera\"><strong>10. LIMITATION OF LIABILITY AND INDEMNIFICATION.</strong>&nbsp;EXCEPT AS PROHIBITED BY LAW, YOU WILL DEFEND, INDEMNIFY, AND HOLD HARMLESS KEEP IT SIMPLE AND ITS OFFICERS, DIRECTORS, MANAGERS, EMPLOYEES, OTHER AFFILIATED COMPANIES, CONTRACTORS, AND AGENTS, FOR ANY DAMAGES (INDIRECT, PUNITIVE, SPECIAL, INCIDENTAL, OR CONSEQUENTIAL), OBLIGATIONS, LOSSES, LIABILITIES, COSTS OR DEBT, EXPENSES, AND</p>\n\n        <p class=\"privacy_pera\">CLAIMS, HOWEVER ARISING (INCLUDING ATTORNEYS&#39; FEES AND ALL RELATED COSTS AND EXPENSES OF LITIGATION AND ARBITRATION, OR AT TRIAL OR ON APPEAL, IF ANY, WHETHER OR NOT LITIGATION OR ARBITRATION IS INSTITUTED), WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE, OR OTHER TORTIOUS ACTION, OR ARISING OUT OF OR IN CONNECTION WITH THIS AGREEMENT, INCLUDING WITHOUT LIMITATION ANY CLAIM FOR PERSONAL INJURY OR PROPERTY DAMAGE, ARISING FROM THIS AGREEMENT AND ANY VIOLATION BY YOU OF ANY FEDERAL, STATE, OR LOCAL LAWS, STATUTES, RULES, OR REGULATIONS, EVEN IF KEEP IT SIMPLE HAS BEEN PREVIOUSLY ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.</p>\n\n        <p class=\"privacy_pera\">EXCEPT AS PROHIBITED BY LAW, IF THERE IS LIABILITY FOUND ON THE PART OF KEEP IT SIMPLE ITS AFFILIATES, AGENTS, DIRECTORS, EMPLOYEES, SUPPLIERS OR LICENSORS, IT WILL BE LIMITED TO THE AMOUNT PAID FOR THE PRODUCTS AND/OR SERVICES, AND UNDER NO CIRCUMSTANCES WILL THERE BE CONSEQUENTIAL OR PUNITIVE DAMAGES. &nbsp;SOME STATES DO NOT ALLOW THE EXCLUSION OR LIMITATION OF PUNITIVE, INCIDENTAL OR CONSEQUENTIAL DAMAGES, SO THE PRIOR LIMITATION OR EXCLUSION MAY NOT APPLY TO YOU. &nbsp;THIS PARAGRAPH DOES NOT APPLY TO NORTH CAROLINA CONSUMERS.</p>\n\n        <p class=\"privacy_pera\">UNDER NO CIRCUMSTANCES WILL KEEP IT SIMPLE BE RESPONSIBLE FOR ANY DAMAGE, LOSS OR INJURY RESULTING FROM HACKING, TAMPERING OR OTHER UNAUTHORIZED ACCESS OR USE OF THE SERVICES OR YOUR ACCOUNT OR THE INFORMATION CONTAINED THEREIN, OR THAT RESULTS FROM THE USE OF, OR INABILITY TO USE, OUR SERVICES.</p>\n\n        <p class=\"privacy_pera\">TO THE MAXIMUM EXTENT PERMITTED BY APPLICABLE LAW, KEEP IT SIMPLE ASSUMES NO LIABILITY OR RESPONSIBILITY FOR (I) ANY ERRORS, MISTAKES, OMISSIONS OR INACCURACIES OF CONTENT; (II) ANY PERSONAL INJURY OR PROPERTY DAMAGE, OF ANY NATURE WHATSOEVER, RESULTING FROM YOUR ACCESS TO OR USE OF OUR SERVICES; (III) ANY UNAUTHORIZED ACCESS TO OR USE OF OUR SECURE SERVERS AND/OR ANY AND ALL PERSONAL INFORMATION STORED THEREIN; (IV) ANY INTERRUPTION OR CESSATION OF TRANSMISSION TO OR FROM THE SERVICES; (V) ANY BUGS, VIRUSES, TROJAN HORSES, OR THE LIKE THAT MAY BE TRANSMITTED TO OR THROUGH OUR SERVICES BY ANY THIRD PARTY; (VI) ANY LOSS OR DAMAGE INCURRED AS A RESULT OF THE USE OF ANY CONTENT POSTED, EMAILED, TRANSMITTED, OR OTHERWISE MADE AVAILABLE THROUGH THE SERVICES; AND/OR (VII) ANY USER CONTENT OR THE DEFAMATORY, OFFENSIVE, OR ILLEGAL CONDUCT OF ANY THIRD PARTY. KEEP IT SIMPLE EXPLICITLY DISCLAIMS ANY AND ALL LIABILITY AND/OR RESPONSIBILITY FOR ANY DISCLOSURE OF INFORMATION THAT MAY BE DEEMED CONFIDENTIAL BY YOU OR ANY THIRD PARTY. IN NO EVENT SHALL KEEP IT SIMPLE, ITS AFFILIATES, AGENTS, DIRECTORS, EMPLOYEES, SUPPLIERS, OR LICENSORS BE LIABLE TO YOU FOR ANY CLAIMS, PROCEEDINGS, LIABILITIES, OBLIGATIONS, DAMAGES, LOSSES OR COSTS IN AN AMOUNT EXCEEDING THE AMOUNT YOU PAID TO KEEP IT SIMPLE HEREUNDER. THIS LIMITATION OF LIABILITY SECTION APPLIES WHETHER THE ALLEGED LIABILITY IS BASED ON CONTRACT, TORT, NEGLIGENCE, STRICT LIABILITY, OR ANY OTHER BASIS, EVEN IF KEEP IT SIMPLE HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGE. THE FOREGOING LIMITATION OF LIABILITY SHALL APPLY TO THE FULLEST EXTENT PERMITTED BY LAW IN THE APPLICABLE JURISDICTION.</p>\n\n        <p class=\"privacy_pera\"><strong>11. Unsolicited Submissions.</strong>&nbsp;Except as may be required in connection with your use of our Services, Keep It Simple does not want you to submit confidential or proprietary information to us through this Site or any Applications. All comments, feedback, information or material submitted to Keep It Simple through or in association with this Site shall be considered non-confidential and Keep It Simple&#39;s property. By providing such submissions to Keep It Simple you hereby assign to Keep It Simple, at no charge, all worldwide right, title and interest in and to the submissions and any intellectual property rights associated therewith. Keep It Simple m shall be free to use and/or disseminate such submissions on an unrestricted basis for any purpose. You acknowledge that you are responsible for the submissions that you provide, including their legality, reliability, appropriateness, originality and content.</p>\n\n        <p class=\"privacy_pera\"><strong>12. Compliance with Intellectual Property Laws.</strong>&nbsp;When accessing Keep It Simple or using its legal document preparation Service, you agree to obey the law and you agree to respect the intellectual property rights of others. Your use of the Service and the Site is at all times governed by and subject to laws regarding copyright, trademark and other intellectual property ownership. You agree not to upload, download, display, perform, transmit or otherwise distribute any information or content in violation of any third party&#39;s copyrights, trademarks or other intellectual property or proprietary rights. You agree to abide by laws regarding copyright ownership and use of intellectual property, and you shall be solely responsible for any violations of any relevant laws and for any infringements of third party rights caused by any content you provide or transmit or that is provided or transmitted using your user account.</p>\n\n        <p class=\"privacy_pera\">Keep It Simple has adopted a policy that provides for the immediate removal of any content, article or materials that have infringed on the rights of Keep It Simple or of a third party or that violate intellectual property rights generally. Keep It Simple&#39;s policy is to remove such infringing content or materials and investigate such allegations immediately.</p>\n\n        <p class=\"privacy_pera\">Copyright Infringement:</p>\n\n        <ol class=\"privacy_order_list\">\n          <li>Notice. Keep It Simple has in place certain legally mandated procedures regarding allegations of copyright infringement occurring on the Site or with the Service. We have adopted a policy that provides for the immediate suspension and/or termination of any Site or Service user who is found to have infringed the rights of a third party, or otherwise violated any intellectual laws or regulations. Our policy is to act expeditiously upon receipt of proper notification of claimed copyright infringement to remove or disable access to the allegedly infringing content. If you have evidence, know, or have a good faith belief that your rights or the rights of a third party have been violated and you want us to delete, edit, or disable the material in question, you must provide us with the following information in writing (see 17 U.S.C 512(c)(3) for further detail): (1) A physical or electronic signature of a person authorized to act on behalf of the owner of an exclusive right that is allegedly infringed; (2) Identification of the copyrighted work claimed to have been infringed, or, if multiple copyrighted works at a single online site are covered by a single notification, a representative list of such works at that site; (3) Identification of the material that is claimed to be infringing or to be the subject of infringing activity and that is to be removed or access to which is to be disabled and information reasonably sufficient to permit the service provider to locate the material; (4) Information reasonably sufficient to permit us to contact you, such as an address, telephone number, and, if available, email address; (5) A statement that you have a good faith belief that use of the material in the manner complained of is not authorized by the copyright owner, its agent, or the law; and (6) A statement that the information in the notification is accurate, and under penalty of perjury, that you are authorized to act on behalf of the owner of an exclusive right that is allegedly infringed.<br />\n            The above written information must be sent to our registered Copyright Agent:</li>\n        </ol>\n\n        <p class=\"privacy_pera\">Copyright Agent<br />\n          c/o Keep It Simple, LLC<br />\n          1725 DeSales Street, NW, Suite 600<br />\n          Washington, DC 20036<br />\n          <a href=\"mailto:info@simplywilled.com\">mailto: info@simplywilled.com</a><br />\n          &nbsp;</p>\n\n        <ol class=\"privacy_order_list\">\n          <li value=\"2\">Counter-Notice. If you believe that your Content that was removed (or to which access was disabled) is not infringing, or that you have the authorization from the copyright owner, the copyright owner&#39;s agent, or pursuant to the law, to post and use the material in your Content, you may send a written counter-notice containing the following information to the Copyright Agent: (1) Your physical or electronic signature; (2) Identification of the Content that has been removed or to which access has been disabled and the location at which the Content appeared before it was removed or disabled; (3) A statement that you have a good faith belief that the Content was removed or disabled as a result of mistake or a misidentification of the Content; and (4) Your name, address, telephone number, and email address, a statement that you consent to the jurisdiction of the federal court in the District of Columbia, and a statement that you will accept service of process from the person who provided notification of the alleged infringement. If a counter-notice is received by the Copyright Agent, the Company may send a copy of the counter-notice to the original complaining party informing that person that it may replace the removed Content or cease disabling it in 10 business days. Unless the copyright owner files an action seeking a court order against the Content provider, member or user, the removed Content may be replaced, or access to it restored, in 10 to 14 business days or more after receipt of the counter-notice, at the Company&#39;s sole discretion.</li>\n        </ol>\n\n        <p class=\"privacy_pera\"><strong>13. Inappropriate Content.</strong>&nbsp;When accessing the Site, any Applications, or using Keep It Simple&#39;s Services, you agree not to upload, download, display, perform, transmit or otherwise distribute any content that: (i) is libelous, defamatory, obscene, pornographic, abusive or threatening; (b) advocates or encourages conduct that could constitute a criminal offense, give rise to civil liability or otherwise violate any applicable local, state, national or foreign law or regulation; or (c) advertises or otherwise solicits funds or is a solicitation for goods or services. Keep It Simple reserves the right to terminate or delete such material from its servers. Keep It Simple will cooperate fully with any law enforcement officials or agencies in the investigation of any violation of these Terms of Use or of any applicable laws.</p>\n\n        <p class=\"privacy_pera\"><strong>14. Compliance with Export Restrictions.</strong>&nbsp;You may not access, download, use or export the Site, Applications, or the Materials in violation of United States export laws or regulations or in violation of any other applicable laws or regulations. You agree to comply with all export laws and restrictions and regulations of any United States or foreign agency or authority and to assume sole responsibility for obtaining licenses to export or re-export as may be required. You acknowledge and agree that the Materials are subject to the United States Export Administration Laws and Regulations and agree that none of the Materials or any direct product therefrom is being or will be acquired for, shipped, transferred or re-exported, directly or indirectly, to proscribed or embargoed countries or their nationals or used for any prohibited purpose.</p>\n\n        <p class=\"privacy_pera\"><strong>15. Personal Use.&nbsp;</strong>The site is made available for your personal use on your own behalf.</p>\n\n        <p class=\"privacy_pera\"><strong>16. Children.</strong>&nbsp;Minors are not eligible to use the Site or Applications and we ask that they do not submit any personal information to us.</p>\n\n        <p class=\"privacy_pera\"><strong>17. Non-English-Speaking Customers.&nbsp;</strong>Certain materials on the Keep It Simple site, including but not limited to questionnaires, documents, instructions, and filings, are only available in English.</p>\n\n        <p class=\"privacy_pera\"><strong>18. Customers Needing Extra Assistance. </strong><strong>Keep It Simple</strong><strong> aims to provide full access to its website and product offerings regardless of disability. If you are unable to read any part of the </strong><strong>Keep It Simple</strong> <strong>website, or otherwise have difficulties using the LegalZoom website, please contact us and our customer care team will assist you.</strong></p>\n\n        <p class=\"privacy_pera\"><strong>19. Governing Law; Venue.</strong>&nbsp;&nbsp;Any legal action or proceeding relating to your access to or use of the Site, an Application, or Materials is governed by the Arbitration Agreement contained in paragraph 6 of these Terms of Use. These Terms of Use expressly exclude and disclaim the terms of the U.N. Convention on Contracts for the International Sale of Goods, which shall not apply to any transaction conducted through or otherwise involving this Site or an Application.</p>\n\n        <p class=\"privacy_pera\"><strong>20. Copyrights.</strong>&nbsp;All Site design, text, graphics, the selection and arrangement thereof, software, documents, and products, Copyright &copy;, Keep It Simple, LLC. &nbsp;ALL RIGHTS RESERVED.</p>\n\n        <p class=\"privacy_pera\"><strong>21. Trademarks.</strong>&nbsp;&ldquo;SimplyWilled.com,&rdquo; &ldquo;SimplyWilled,&rdquo; the bi-colored &quot;SimplyWilled&quot; logo, the &ldquo;Simply Owl,&rdquo; all images and text, and all page headers, custom graphics and button icons are service marks, trademarks and/or trade dress of Keep It Simple, LLC. All other trademarks, product names and company names or logos cited herein are the property of their respective owners.</p>\n\n        <p class=\"privacy_pera\"><strong>22. Use of Testimonials and Media Endorsements.</strong>&nbsp;The media hosts on the Site endorse Keep It Simple as paid spokespeople in our advertising campaigns.</p>\n\n        <p class=\"privacy_pera\"><strong>24. Inquiries.</strong>&nbsp;BY USING KEEP IT SIMPLE&#39;S SERVICES OR ACCESSING THE SITE OR APPLICATIONS, YOU ACKNOWLEDGE AND ACCEPT THAT SUBMITTING YOUR TELEPHONE NUMBER TO KEEP IT SIMPLE VIA THE SITE OR APPLICATIONS CONSTITUTES AN INQUIRY TO KEEP IT SIMPLE, AND THAT WE MAY CONTACT YOU AT THE NUMBER SUBMITTED EVEN IF SUCH NUMBER APPEARS ON ANY STATE OR FEDERAL DO NOT CALL LISTS (TAKING INTO ACCOUNT INQUIRY EXCEPTION TIME FRAMES AS APPROPRIATE).</p>\n\n        <p class=\"privacy_pera\"><strong>25. Right to Refuse.</strong>&nbsp;You acknowledge that Keep It Simple reserves the right to refuse service to anyone and to cancel user access at any time.</p>\n\n        <p class=\"privacy_pera\">We may, without prior notice, change the Services, stop providing the Services or features of the Services, or create usage limits for the Services. We may permanently or temporarily terminate or suspend your access to the Services without notice and liability for any reason, including if in our sole determination you violate any provision of these or other terms or policies, or for no reason. Upon termination for any reason or no reason, you continue to be bound by these Terms of Use and Terms of Service. Any data, account history and account content residing on the servers running the Services may be deleted, altered, moved or transferred at any time for any reason at Keep It SImple&rsquo;s sole discretion, with or without notice and with no liability of any kind. Keep It Simple does not provide or guarantee, and expressly disclaims, any value, cash or otherwise, attributed to any data residing on the servers running the Services.</p>\n\n        <p class=\"privacy_pera\"><strong>26. Acknowledgement.</strong>&nbsp;BY USING KEEP IT SIMPLE&rsquo;S SERVICES OR ACCESSING THE SITE OR APPLICATIONS, YOU ACKNOWLEDGE THAT YOU HAVE READ THESE TERMS OF USE AND AGREE TO BE BOUND BY THEM Keep It Simple, LLC is located at 1725 DeSales Street, NW, Suite 600, Washington, DC 20036.</p>\n\n        <p class=\"privacy_pera\">Updated 8/30/2017</p>\n\n\n        <p class=\"privacy_pera\"><strong>&copy; Keep It Simple, LLC All rights reserved.</strong></p>\n\n        <p class=\"privacy_pera\">Disclaimer: Communications between you and Keep It Simple are protected by our <a routerLink=\"/privacy-policy\">Privacy Policy</a> but not by the attorney-client privilege or as work product. Keep It Simple provides access to independent attorneys and self-help services at your specific direction. We are not a law firm or a substitute for an attorney or law firm. We cannot provide any kind of advice, explanation, opinion, or recommendation about possible legal rights, remedies, defenses, options, selection of forms or strategies. Your access to the website is subject to our <a routerLink=\"/terms-of-service\">Terms of Service</a> and <a routerLink=\"/terms-of-use\">Terms of Use</a>.</p>\n\n        <span _ngcontent-c1=\"\" class=\"sec2_btn_main\">\n            <a _ngcontent-c1=\"\" routerlink=\"/register\" ng-reflect-router-link=\"/register\" href=\"/register\">\n              <i _ngcontent-c1=\"\" aria-hidden=\"true\" class=\"fa fa-chevron-right\"></i> Get Started!\n            </a>\n          </span>\n      </div>\n    </div>\n  </div>\n"

/***/ }),

/***/ "./src/app/user/terms-of-use/terms-of-use.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return TermsOfUseComponent; });
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

var TermsOfUseComponent = /** @class */ (function () {
    function TermsOfUseComponent() {
    }
    TermsOfUseComponent.prototype.ngOnInit = function () {
    };
    TermsOfUseComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            selector: 'app-terms-of-use',
            template: __webpack_require__("./src/app/user/terms-of-use/terms-of-use.component.html"),
            styles: [__webpack_require__("./src/app/user/terms-of-use/terms-of-use.component.css")]
        }),
        __metadata("design:paramtypes", [])
    ], TermsOfUseComponent);
    return TermsOfUseComponent;
}());



/***/ }),

/***/ "./src/app/user/user-auth/user-auth.interceptor.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AuthInterceptor; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_common_http__ = __webpack_require__("./node_modules/@angular/common/esm5/http.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_rxjs_add_operator_do__ = __webpack_require__("./node_modules/rxjs/_esm5/add/operator/do.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__user_auth_service__ = __webpack_require__("./src/app/user/user-auth/user-auth.service.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};





var AuthInterceptor = /** @class */ (function () {
    function AuthInterceptor(router, authService) {
        this.router = router;
        this.authService = authService;
    }
    AuthInterceptor.prototype.intercept = function (req, next) {
        var _this = this;
        var copiedReq = req;
        if (this.authService.isAuthenticated()) {
            var token = this.authService.getToken().token;
            copiedReq = req.clone({ headers: req.headers.set('Authorization', "Bearer " + token) });
        }
        return next.handle(copiedReq)
            .do(function (event) {
            if (event instanceof __WEBPACK_IMPORTED_MODULE_0__angular_common_http__["f" /* HttpResponse */]) {
                // do stuff with response if you want
            }
        }, function (err) {
            if (err instanceof __WEBPACK_IMPORTED_MODULE_0__angular_common_http__["d" /* HttpErrorResponse */]) {
                if (err.status === 401) {
                    localStorage.removeItem('loggedInUser');
                    _this.router.navigate(['/sign-in']);
                }
            }
        });
    };
    AuthInterceptor = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_1__angular_core__["Injectable"])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_2__angular_router__["d" /* Router */], __WEBPACK_IMPORTED_MODULE_4__user_auth_service__["a" /* UserAuthService */]])
    ], AuthInterceptor);
    return AuthInterceptor;
}());



/***/ }),

/***/ "./src/app/user/user-routing.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return UserRoutingModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__home_home_component__ = __webpack_require__("./src/app/user/home/home.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__about_us_about_us_component__ = __webpack_require__("./src/app/user/about-us/about-us.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__faq_faq_component__ = __webpack_require__("./src/app/user/faq/faq.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__terms_of_use_terms_of_use_component__ = __webpack_require__("./src/app/user/terms-of-use/terms-of-use.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6__terms_of_service_terms_of_service_component__ = __webpack_require__("./src/app/user/terms-of-service/terms-of-service.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7__privacy_policy_privacy_policy_component__ = __webpack_require__("./src/app/user/privacy-policy/privacy-policy.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8__contact_us_contact_us_component__ = __webpack_require__("./src/app/user/contact-us/contact-us.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_9__user_auth_not_user_auth_guard__ = __webpack_require__("./src/app/user/user-auth/not-user-auth.guard.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_10__layout_full_layout_full_layout_component__ = __webpack_require__("./src/app/user/layout/full-layout/full-layout.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_11__user_auth_user_auth_guard__ = __webpack_require__("./src/app/user/user-auth/user-auth.guard.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_12__angular_common__ = __webpack_require__("./node_modules/@angular/common/esm5/common.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_13__blog_blog_component__ = __webpack_require__("./src/app/user/blog/blog.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_14__blog_blogdetails_blogdetails_component__ = __webpack_require__("./src/app/user/blog/blogdetails/blogdetails.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_15__blog_blog_category_blog_category_component__ = __webpack_require__("./src/app/user/blog/blog-category/blog-category.component.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
















var routes = [
    { path: '', component: __WEBPACK_IMPORTED_MODULE_10__layout_full_layout_full_layout_component__["a" /* FullLayoutComponent */], data: { title: 'Home' }, children: [
            { path: 'sign-in', canActivate: [__WEBPACK_IMPORTED_MODULE_9__user_auth_not_user_auth_guard__["a" /* NotUserAuthGuard */]], loadChildren: './user-auth/user-login/user-login.module#UserLoginModule' },
            { path: 'register', canActivate: [__WEBPACK_IMPORTED_MODULE_9__user_auth_not_user_auth_guard__["a" /* NotUserAuthGuard */]], loadChildren: './user-auth/user-register/user-register.module#UserRegisterModule' },
            { path: '', pathMatch: 'full', component: __WEBPACK_IMPORTED_MODULE_2__home_home_component__["a" /* HomeComponent */] },
            { path: 'about-us', pathMatch: 'full', component: __WEBPACK_IMPORTED_MODULE_3__about_us_about_us_component__["a" /* AboutUsComponent */] },
            { path: 'faq', pathMatch: 'full', component: __WEBPACK_IMPORTED_MODULE_4__faq_faq_component__["a" /* FaqComponent */] },
            { path: 'blog', pathMatch: 'full', component: __WEBPACK_IMPORTED_MODULE_13__blog_blog_component__["a" /* BlogComponent */] },
            { path: 'blogdetails/:slug', pathMatch: 'full', component: __WEBPACK_IMPORTED_MODULE_14__blog_blogdetails_blogdetails_component__["a" /* BlogdetailsComponent */] },
            { path: 'category/:slug', pathMatch: 'full', component: __WEBPACK_IMPORTED_MODULE_15__blog_blog_category_blog_category_component__["a" /* BlogCategoryComponent */] },
            // { path: 'faq', canActivate: [ NotUserAuthGuard ], loadChildren: './faq/user-login/user-login.module#UserLoginModule' },
            { path: 'terms-of-use', pathMatch: 'full', component: __WEBPACK_IMPORTED_MODULE_5__terms_of_use_terms_of_use_component__["a" /* TermsOfUseComponent */] },
            { path: 'terms-of-service', pathMatch: 'full', component: __WEBPACK_IMPORTED_MODULE_6__terms_of_service_terms_of_service_component__["a" /* TermsOfServiceComponent */] },
            { path: 'privacy-policy', pathMatch: 'full', component: __WEBPACK_IMPORTED_MODULE_7__privacy_policy_privacy_policy_component__["a" /* PrivacyPolicyComponent */] },
            { path: 'contact-us', pathMatch: 'full', component: __WEBPACK_IMPORTED_MODULE_8__contact_us_contact_us_component__["a" /* ContactUsComponent */] }
        ] },
    {
        path: 'dashboard',
        canActivate: [__WEBPACK_IMPORTED_MODULE_11__user_auth_user_auth_guard__["a" /* UserAuthGuard */]],
        canActivateChild: [__WEBPACK_IMPORTED_MODULE_11__user_auth_user_auth_guard__["a" /* UserAuthGuard */]],
        loadChildren: './user-dashboard/user-dashboard.module#UserDashboardModule'
    },
];
console.log('user-routing-module is called');
var UserRoutingModule = /** @class */ (function () {
    function UserRoutingModule() {
    }
    UserRoutingModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["NgModule"])({
            imports: [__WEBPACK_IMPORTED_MODULE_1__angular_router__["e" /* RouterModule */].forChild(routes), __WEBPACK_IMPORTED_MODULE_12__angular_common__["b" /* CommonModule */]],
            exports: [__WEBPACK_IMPORTED_MODULE_1__angular_router__["e" /* RouterModule */]]
        })
    ], UserRoutingModule);
    return UserRoutingModule;
}());



/***/ }),

/***/ "./src/app/user/user.component.css":
/***/ (function(module, exports) {

module.exports = "@charset \"utf-8\";\n/* CSS Document */\nbody{\n\tfont-family: 'OpenSans';\n}\n*{\n\tmargin:0px;\n\tpadding:0px;\n\tbox-sizing:border-box;\n\t-moz-box-sizing:border-box;\n\t-ms-box-sizing:border-box;\n\t-o-box-sizing:border-box;\n\t-webkit-box-sizing:border-box;\n\toutline:none;\n}\nimg{\n\tmax-width:100%;\n\toverflow:hidden;\n\theight:auto;\n}\na{\n\ttext-decoration:none;\n\ttransition:all ease-in-out .5s;\n\t-moz-transition:all ease-in-out .5s;\n\t-ms-transition:all ease-in-out .5s;\n\t-o-transition:all ease-in-out .5s;\n\t-webkit-transition:all ease-in-out .5s;\n}\n*:before,*:after{\n\tbox-sizing:border-box;\n\t-moz-box-sizing:border-box;\n\t-ms-box-sizing:border-box;\n\t-o-box-sizing:border-box;\n\t-webkit-box-sizing:border-box;\n}\nbutton, input[type='submit']{\n\ttransition:all 0.5s ease-out;\n\t-webkit-transition:all 0.5s ease-out;\n\t-moz-transition:all 0.5s ease-out;\n\t-ms-transition:all 0.5s ease-out;\n\t-o-transition:all 0.5s ease-out;\n}\nli\n{\n\tlist-style-type:none;\n}\nh1, h2, h3, h4, h5, h6{\n\tfont-weight:normal;\n}\n.wrapper{\n\tmax-width:1120px;\n\twidth:90%;\n\tmargin:0 auto;\n}\n\n"

/***/ }),

/***/ "./src/app/user/user.component.html":
/***/ (function(module, exports) {

module.exports = "<p>\n  user works!\n</p>\n"

/***/ }),

/***/ "./src/app/user/user.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return UserComponent; });
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

var UserComponent = /** @class */ (function () {
    function UserComponent() {
    }
    UserComponent.prototype.ngOnInit = function () {
    };
    UserComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            selector: 'app-user',
            template: __webpack_require__("./src/app/user/user.component.html"),
            styles: [__webpack_require__("./src/app/user/user.component.css")]
        }),
        __metadata("design:paramtypes", [])
    ], UserComponent);
    return UserComponent;
}());



/***/ }),

/***/ "./src/app/user/user.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "UserModule", function() { return UserModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_common__ = __webpack_require__("./node_modules/@angular/common/esm5/common.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__user_routing_module__ = __webpack_require__("./src/app/user/user-routing.module.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__user_component__ = __webpack_require__("./src/app/user/user.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__home_home_component__ = __webpack_require__("./src/app/user/home/home.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__about_us_about_us_component__ = __webpack_require__("./src/app/user/about-us/about-us.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6__faq_faq_component__ = __webpack_require__("./src/app/user/faq/faq.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7__terms_of_use_terms_of_use_component__ = __webpack_require__("./src/app/user/terms-of-use/terms-of-use.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8__terms_of_service_terms_of_service_component__ = __webpack_require__("./src/app/user/terms-of-service/terms-of-service.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_9__privacy_policy_privacy_policy_component__ = __webpack_require__("./src/app/user/privacy-policy/privacy-policy.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_10__contact_us_contact_us_component__ = __webpack_require__("./src/app/user/contact-us/contact-us.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_11__user_auth_user_auth_interceptor__ = __webpack_require__("./src/app/user/user-auth/user-auth.interceptor.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_12__angular_common_http__ = __webpack_require__("./node_modules/@angular/common/esm5/http.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_13__user_auth_not_user_auth_guard__ = __webpack_require__("./src/app/user/user-auth/not-user-auth.guard.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_14__user_auth_user_auth_guard__ = __webpack_require__("./src/app/user/user-auth/user-auth.guard.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_15__user_auth_user_auth_service__ = __webpack_require__("./src/app/user/user-auth/user-auth.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_16__layout_full_layout_full_layout_component__ = __webpack_require__("./src/app/user/layout/full-layout/full-layout.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_17__user_service__ = __webpack_require__("./src/app/user/user.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_18__user_dashboard_user_dashboard_service__ = __webpack_require__("./src/app/user/user-dashboard/user-dashboard.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_19__angular_forms__ = __webpack_require__("./node_modules/@angular/forms/esm5/forms.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_20__faq_faq_service__ = __webpack_require__("./src/app/user/faq/faq.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_21_ngx_bootstrap_dropdown__ = __webpack_require__("./node_modules/ngx-bootstrap/dropdown/index.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_22_ngx_bootstrap_tooltip__ = __webpack_require__("./node_modules/ngx-bootstrap/tooltip/index.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_23_ngx_bootstrap_modal__ = __webpack_require__("./node_modules/ngx-bootstrap/modal/index.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_24_ngx_bootstrap_carousel__ = __webpack_require__("./node_modules/ngx-bootstrap/carousel/index.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_25__blog_blog_component__ = __webpack_require__("./src/app/user/blog/blog.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_26__blog_blogdetails_blogdetails_component__ = __webpack_require__("./src/app/user/blog/blogdetails/blogdetails.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_27__blog_blog_service__ = __webpack_require__("./src/app/user/blog/blog.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_28__blog_blog_category_blog_category_component__ = __webpack_require__("./src/app/user/blog/blog-category/blog-category.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_29_ngx_pagination__ = __webpack_require__("./node_modules/ngx-pagination/dist/ngx-pagination.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};






























var UserModule = /** @class */ (function () {
    function UserModule() {
    }
    UserModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["NgModule"])({
            imports: [
                __WEBPACK_IMPORTED_MODULE_1__angular_common__["b" /* CommonModule */],
                __WEBPACK_IMPORTED_MODULE_2__user_routing_module__["a" /* UserRoutingModule */],
                __WEBPACK_IMPORTED_MODULE_12__angular_common_http__["c" /* HttpClientModule */],
                __WEBPACK_IMPORTED_MODULE_19__angular_forms__["ReactiveFormsModule"],
                __WEBPACK_IMPORTED_MODULE_19__angular_forms__["FormsModule"],
                __WEBPACK_IMPORTED_MODULE_21_ngx_bootstrap_dropdown__["a" /* BsDropdownModule */].forRoot(),
                __WEBPACK_IMPORTED_MODULE_22_ngx_bootstrap_tooltip__["a" /* TooltipModule */].forRoot(),
                __WEBPACK_IMPORTED_MODULE_23_ngx_bootstrap_modal__["b" /* ModalModule */].forRoot(),
                __WEBPACK_IMPORTED_MODULE_24_ngx_bootstrap_carousel__["a" /* CarouselModule */].forRoot(),
                __WEBPACK_IMPORTED_MODULE_29_ngx_pagination__["a" /* NgxPaginationModule */]
            ],
            declarations: [
                __WEBPACK_IMPORTED_MODULE_3__user_component__["a" /* UserComponent */],
                __WEBPACK_IMPORTED_MODULE_4__home_home_component__["a" /* HomeComponent */],
                __WEBPACK_IMPORTED_MODULE_5__about_us_about_us_component__["a" /* AboutUsComponent */],
                // FaqComponent,
                __WEBPACK_IMPORTED_MODULE_6__faq_faq_component__["a" /* FaqComponent */],
                __WEBPACK_IMPORTED_MODULE_7__terms_of_use_terms_of_use_component__["a" /* TermsOfUseComponent */],
                __WEBPACK_IMPORTED_MODULE_8__terms_of_service_terms_of_service_component__["a" /* TermsOfServiceComponent */],
                __WEBPACK_IMPORTED_MODULE_9__privacy_policy_privacy_policy_component__["a" /* PrivacyPolicyComponent */],
                __WEBPACK_IMPORTED_MODULE_10__contact_us_contact_us_component__["a" /* ContactUsComponent */],
                __WEBPACK_IMPORTED_MODULE_16__layout_full_layout_full_layout_component__["a" /* FullLayoutComponent */],
                __WEBPACK_IMPORTED_MODULE_25__blog_blog_component__["a" /* BlogComponent */],
                __WEBPACK_IMPORTED_MODULE_26__blog_blogdetails_blogdetails_component__["a" /* BlogdetailsComponent */],
                __WEBPACK_IMPORTED_MODULE_28__blog_blog_category_blog_category_component__["a" /* BlogCategoryComponent */],
            ],
            providers: [
                __WEBPACK_IMPORTED_MODULE_14__user_auth_user_auth_guard__["a" /* UserAuthGuard */],
                __WEBPACK_IMPORTED_MODULE_13__user_auth_not_user_auth_guard__["a" /* NotUserAuthGuard */],
                __WEBPACK_IMPORTED_MODULE_15__user_auth_user_auth_service__["a" /* UserAuthService */],
                __WEBPACK_IMPORTED_MODULE_17__user_service__["a" /* UserService */],
                __WEBPACK_IMPORTED_MODULE_20__faq_faq_service__["a" /* FaqService */],
                __WEBPACK_IMPORTED_MODULE_18__user_dashboard_user_dashboard_service__["a" /* UserDashboardService */],
                __WEBPACK_IMPORTED_MODULE_27__blog_blog_service__["a" /* BlogService */],
                { provide: __WEBPACK_IMPORTED_MODULE_12__angular_common_http__["a" /* HTTP_INTERCEPTORS */], useClass: __WEBPACK_IMPORTED_MODULE_11__user_auth_user_auth_interceptor__["a" /* AuthInterceptor */], multi: true }
            ],
        })
    ], UserModule);
    return UserModule;
}());



/***/ }),

/***/ "./src/custom-inner.css":
/***/ (function(module, exports) {

module.exports = "/****************FAQ*********************/\n\n@font-face {\n    font-family: 'OpenSans-Light';\n    src: url('OpenSans-Light.b180c799a87a4cad9108.eot?#iefix') format('embedded-opentype'),  url('OpenSans-Light.5193f01d42787bba6c0f.woff') format('woff'), url('OpenSans-Light.1bf71be111189e76987a.ttf')  format('truetype'), url('OpenSans-Light.9384f87d95af80a8d067.svg#OpenSans-Light') format('svg');\n    font-weight: normal;\n    font-style: normal;\n  }\n\n.inner-banner img{\n      display: block;\n      width: 100%;\n  }\n\n.inner-banner img.mobile-banner{\n      display: none;\n  }\n\n.inner-banner .slider{\n      position: relative;\n  }\n\n.inner-banner .slider h1{\n      position: absolute;\n      -webkit-transform: translate(-50%,-50%);\n              transform: translate(-50%,-50%);\n      left: 50%;\n      top: 50%;\n      color: #fff;\n      font-size: 48px;\n      text-align: center;\n      width: 90%;\n  }\n\n.inner-banner .slider h1 span{\n      display: block;\n      font-size: 36px;\n  }\n\n.faq form{\n      display: inline-block;\n      margin: 70px 0;\n      text-align: center;\n      width: 42%;\n      position: relative;\n  }\n\n.faq form input{\n      border: 1px solid #ccc;\n      border-radius: 10px;\n      display: inline-block;\n      width: 100%;\n      height: 70px;\n      padding: 10px 15px;\n      font-size: 22px;\n      font-family: 'OpenSans-Light';\n      letter-spacing: -1px;\n      font-style: italic;\n  }\n\n.faq form button{\n      height: 60px;\n      padding: 0 30px;\n      font-size: 24px;\n      border-radius: 10px;\n      position: absolute;\n      right: 5px;\n      top: 5px;\n      text-shadow: 1px 1px 1px #333;\n  }\n\n.text-center{\n      text-align: center;\n  }\n\n.faq .accordion{\n      text-align: left;\n  }\n\n.sidebar-left{\n      float: left;\n      width: 22%;\n  }\n\n.sidebar-left h2{\n      background: #f2f2f2;\n      font-size: 50px;\n      padding: 10px 20px;\n      color: #1376BB;\n  }\n\n.sidebar-left ul li{\n      border: 1px solid #f2f2f2;\n      padding: 16px 20px;\n      color: #333;\n      border-top: 0;\n      cursor: pointer;\n  }\n\n.sidebar-left ul li.active, .sidebar-left ul li:hover{\n      color: #fff;\n      background: #1376BB;\n      position: relative;\n  }\n\n.sidebar-left ul li.active:before, .sidebar-left ul li:hover:before{\n      content: '';\n      width: 0;\n      height: 0;\n      border-top: 12px solid transparent;\n      border-bottom: 12px solid transparent;\n      border-left: 12px solid #2776bb;\n      position: absolute;\n      right: -12px;\n      top: 16px;\n  }\n\n.main-content{\n      float: left;\n      width: 70%;\n      margin-left: 80px;\n  }\n\n.each-statement{\n      color: #333;\n  }\n\n.accordion{\n      display: block;\n  }\n\n.accordion.accordion-mobile{\n      display: none;\n  }\n\n.statement{\n      border: 1px solid #f2f2f2;\n      cursor: pointer;\n      display: inline-block;\n      width: 100%;\n      margin-bottom: 20px;\n  }\n\n.each-statement .plus{\n      background: #1376BB;\n      color: #fff;\n      display: inline-block !important;\n      text-align: center;\n      margin-right: 10px;\n      vertical-align: top;\n      padding: 25px 15px !important;\n  }\n\n.each-statement .minus{\n      display: none  !important;\n      background: #f2f2f2 !important;\n      color: #1376BB  !important;\n      text-align: center;\n      margin-right: 10px;\n      vertical-align: top;\n      padding: 25px 15px !important;\n  }\n\n.each-statement.active .statement{\n      color: #1376BB;\n  }\n\n.each-statement .statement p{\n      display: inline-block;\n      margin: 24px 0;\n  }\n\n.each-statement p{\n      display: none;\n  }\n\n.each-statement.active .plus{\n      display: none !important;\n  }\n\n.each-statement.active .minus{\n      display: inline-block !important;\n  }\n\n.each-statement .plus:before, .each-statement .minus:before{\n      display: none !important;\n  }\n\n.each-statement.active p{\n      display: inline-block;\n  }\n\n.btn-green{\n      font-family: 'OpenSans-Semibold';\n      background: -webkit-gradient(linear, left top, left bottom, from(#50b73a),to(#3da12c));\n      background: linear-gradient(to bottom, #50b73a 0%,#3da12c 100%);\n      border:1px solid #5bc346;\n      -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.5);\n              box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.5);\n      background-size: 100% 100%;\n      color: #fff;\n      height: 60px;\n      padding: 0 30px;\n      font-size: 24px;\n      border-radius: 10px;\n      text-shadow: 1px 1px 1px #555;\n      text-transform: capitalize;\n      cursor: pointer;\n  }\n\n.btn-green img{\n      vertical-align:middle;\n  }\n\n.clear{\n      display: inline-block;\n      width: 100%;\n  }\n\n.estate-planning{\n      background: url('about-state-bg.49af1767fc5a33b3afe9.png') no-repeat top center;\n      background-size: cover;\n      padding: 200px 0 100px;\n      color: #fff;\n      position: relative;\n  }\n\n.estate-planning h2{\n      font-size: 45px;\n      text-transform: capitalize;\n      text-shadow: 1px 1px 1px #666;\n  }\n\n.estate-planning .btn-green{\n      position: absolute;\n      bottom: -30px;\n      left: 50%;\n      -webkit-transform: translate(-50%,0);\n              transform: translate(-50%,0);\n      border: 3px solid #fff;\n      text-shadow: 1px 1px 1px #333;\n      text-transform: capitalize;\n      -webkit-box-shadow: inset 0px 1px 1px 0px #338425;\n              box-shadow: inset 0px 1px 1px 0px #338425;\n      height: 65px;\n      padding: 0 20px; \n  }\n\n.news_heading {\n      font-family: 'OpenSans';\n  }\n\n.by_simply_willed_text, .legal_requirement, .subscribe_text, .cat_ul li a,.post_heading, .will_descreption, .testamentary_pera,.agree_to_be_responsible, .wishes_text, .email_text, .by_clicking_btn, .by_clicking_btn a, .already_account{\n      color: #333;\n      display: block;\n  }\n\n.cat_ul li a span {\n      color: #333;\n  }\n\n.cat_ul li.active a{\n      color: #1376bb;\n  }\n\n.trending_right_ul > li {\n      margin-left: 12px;\n  }\n\n.trending_right_ul > li > a {\n      color: #b9b8b9;\n  }\n\n.trending_ul .btn-green{\n      float: left;\n      padding: 14px 20px;\n      font-size: 20px;\n      height: auto;\n  }\n\n.subscribe_form_main .btn-green{\n      background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAREAAAAtCAYAAACJW1/sAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAASASURBVHjaYvz//z/DKBgFo2AUkAsAAogFl4T7WhNmIOUHxCFArA7EBkDMPBpko2AUjBjwF4gvAPFNIF4DxJt2Bp/5i64IIIAYsbVEgAUIqNBYJM4nbibBJ87Azc7NwMfBy8DIyDgarKNgFIwQACobPv34zPD151eGF59eMrz89PIUUDgOWJDcRFYHEEAYhQiwACkCUi0akhqcPJzcDK+/vmb4/vsbw5efXxj+M4x2fUbBKBgpgBEIedh5GDhZuRhEuUUZvnz/ynDj+Y3vQKkaYEHSB1MHEEAohQiwAOmSE5ItFecXZ3j48SHD55+fRkNyFIyCUQAGvOx8DPL88gwvP75kePTucTewICkDiQMEELwQARYg4ZL8EisEefgZHn54yPDv/7/RUBsFo2AUoAAmRiYGeQF5hvdfPjI8//giAliQrAQIIHAhAixA2IDy92SEpaTffH8zGlKjYBSMArxAhFOE4cnbZ3eATG2AAILNzoQIcQtKv/k2WoCMglEwCggDUFkBLDNU3n19HwIQQExQMe8ff7+PhswoGAWjgGjw899PcNkBEECwlojxH4Y/4NHYUTAKRsEoIAb8/v8LRFkCBBCsEJEAFyCjM7ijYBSMAiIBtNEhDRBAsEKEf3T1+ygYBaOADMAGEEBIy95HS5FRMApGAekAIIDghchoS2QUjIJRQA4ACCCm0SAYBaNgFFACAAIIqSUy2hQZBaNgFJAOAAJotCUyCkbBKKAIAATQaEtkFIyCUUARAAggxOzMaBkyCkbBKCADAAQQy2gZMgpGwSigBAAEEFJLZLQYGQWjYBSQDgACaHSdyCgYBaOAIgAQQKMrVkfBKBgFFAGAABptiYyCUTAKKAIAATRaiIyCUTAKyAagCyAAAmi0OzMKRsEooKQYYQAIoNGWyCgYBaOAopYIQACNTvGOglEwCihqiQAE0Ohis1EwCkYBRQAggEaXvY+CUTAKKAIAATS6AW8UjIJRQBEACKDRowBGwSgYBRQBgAAabYmMglEwCigCAAE02hIZBaNgFFAEAAJodJ3IKBgFo4AiABBAsELkI7AY4R8NjlEwCkYBieALQADBCpEXDAyM/KPjIqNgFIwCYgEjI/gGvKcAAQQrRM4CBdT//xstREbBKBgFRBYiTOBC5CxAAMEKka1MzIxRf/+OFiKjYBSMAuIAsMwAlx0AAQSbnVnDzMx0hwlSsoyCUTAKRgH+AgRYVgDLjPugsgMggBhh4yDua03C//79t+L3zz+jITQKRsEowAtY2VlAhUjEzuAzKwECiBF5MBVYkPT++fO36M/vf6OLz0bBKBgFGAA0mMrCysTAwsLcByxAikFiAAHEgqamDCj5Dojrfv/6w/bn99/RUBsFo2AUgAELKzMDKxvLLyCzCYg7YOIAAcSIrcUBbJGoA6lFf//8M/v79y8DaNbm3+jMzSgYBSMOgMY+GMHjH8wMzCxMp4BCicAWyDVkNQABxIir2wIsSJiBVCAQhwCxChAbjwbpKBgFIw6cBWLQAOpKIF4PLEAwuicAAQYAWOML35YOIeQAAAAASUVORK5CYII=') no-repeat;\n      background-size: 100% 100%;\n      width: 100%;\n      font-size: 20px;\n      height: auto;\n      padding: 8px;\n  }\n\n.subscribe_mail {\n      font-family: 'OpenSans-Light';\n      color: #333;\n      padding: 8px 10px;\n      border-radius: 7px;\n      margin-bottom: 10px;\n  }\n\n.trending_left {\n      width: 70%;\n  }\n\n.trending_right_main {\n      width: 23%;\n  }\n\n.subscribe_text {\n      font-size: 22px;\n      letter-spacing: 1px;\n  }\n\n.trending_sub_left_ul li:first-child .by_simply_willed_text, .trending_sub_left_ul li:last-child .by_simply_willed_text {\n      text-decoration: none; \n      border-bottom: 1px solid #ccc;\n  }\n\n.trending_sub_left_ul > li:nth-child(2) .by_simply_willed_text {\n      border-left: 1px solid #ccc;\n      border-right: 1px solid #ccc;\n      padding: 0 15px;\n      margin-top: 7px;\n  }\n\n.why_do_need_will, .whats_will_text {\n      color: #1376bb;\n      font-family: 'OpenSans';\n  }\n\n.executer_ul li {\n      color: #000;\n      margin-bottom: 7px;\n  }\n\n.testamentary_will{\n      font-family: 'OpenSans-Semibold';\n  }\n\n.about_sec4{\n      position: relative;\n  }\n\n.about_sec4 .btn-green{\n      position: absolute;\n      bottom: -30px;\n      left: 50%;\n      -webkit-transform: translate(-50%,0);\n              transform: translate(-50%,0);\n      border: 3px solid #fff;\n      text-shadow: 1px 1px 1px #333;\n      text-transform: capitalize;\n      -webkit-box-shadow: inset 0px 1px 1px 0px #338425;\n              box-shadow: inset 0px 1px 1px 0px #338425;\n      height: 65px;\n      padding: 0 20px; \n  }\n\n.relative{\n      position: relative;\n      display: inline-block;\n      width: 100%;\n  }\n\n.confirmed_text, .email_text, .last_will_text, .have_ques_text{\n      font-family: 'OpenSans';\n  }\n\n.email_text a{\n      font-family: 'OpenSans-Semibold';\n  }\n\n.desktop-visible{\n      display: block;\n  }\n\n.mobile-visible{\n      display: none;\n      text-align: center;\n      margin: 20px 0;\n  }\n\n@media screen and (max-width: 1199px) {\n      .inner-banner .slider h1 {\n          font-size: 35px;\n      }\n      .inner-banner .slider h1 span {\n          display: block;\n          font-size: 24px;\n      }\n      .faq form {\n          width: 70%;\n      }\n  }\n\n@media screen and (min-width: 992px) and (max-width: 1199px) {\n      .sidebar-left h2 {\n          font-size: 40px;\n      }\n      .main-content {\n          width: 70%;\n          margin-left: 50px;\n      }\n      .each-statement {\n          font-size: 14px;\n      }\n      .each-statement .plus,.each-statement.active .minus {\n          margin-right: 5px;\n          padding: 20px 10px;\n      }\n  }\n\n@media screen and (max-width: 991px) {\n      .sidebar-left {\n          width: 100%;\n      }\n      .main-content {\n          width: 100%;\n          margin-left: 0;\n          margin-top: 20px;\n      }\n      .sidebar-left h2 {\n          font-size: 35px;\n      }\n  }\n\n@media screen and (min-width: 768px) and (max-width: 991px) {\n      .trending_left {\n          width: 60%;\n      }\n      .trending_right_main {\n          width: 33%;\n      }\n  }\n\n@media screen and (max-width: 767px) {\n      .sidebar-left ul li {\n          text-align: center;\n      }\n      .inner-banner img{\n          display: none;\n      }\n      .inner-banner img.mobile-banner{\n          display: block;\n      }\n      .inner-banner .slider h1, .inner-banner .slider h1 span  {\n          font-size: 34px;\n      }\n      .sidebar-left h2 {\n          font-size: 40px;\n          text-align: center;\n      }\n      .faq form {\n          width: 100%;    \n          margin: 20px 0;\n      }\n      .faq form button {\n          padding: 0 10px;\n          font-size: 16px;\n          height: 45px;\n      }\n      .faq form input {\n          height: 55px;\n          font-size: 13px;\n          padding: 10px 5px;\n      }\n      .estate-planning h2 {\n          font-size: 30px;\n      }\n      .btn-green {\n          font-size: 16px;\n      }\n      .estate-planning .btn-green {\n          height: 55px;\n      }\n      .estate-planning {\n          padding: 150px 0 50px;\n      }\n      .accordion{\n          display: none;\n      }\n      .sidebar-left ul li.active:before, .sidebar-left ul li:hover:before{\n          display: none;\n      }\n      .accordion.accordion-mobile{\n          display: block;\n      }\n      .accordion.accordion-mobile .sidebar-left ul li.active, .accordion.accordion-mobile .sidebar-left ul li:hover{\n          background: none;\n      }\n      .accordion-mobile .sidebar-left ul li.active span, .accordion-mobile .sidebar-left ul li:hover span{\n          color: #fff;\n          background: #1376BB;\n          position: relative;\n          display: block;\n          padding: 16px 20px;\n          margin-bottom: 20px;\n      }\n      .accordion-mobile .sidebar-left ul li.active span:before, .accordion-mobile .sidebar-left ul li:hover span:before{\n          content: '';\n          border-top: 12px solid #2776bb;\n          border-bottom: 12px solid transparent;\n          border-left: 12px solid transparent;\n          border-right: 12px solid transparent;\n          right: auto;\n          top: auto;\n          bottom: -24px;\n          position: absolute;\n          -webkit-transform: translate(-50%,0);\n                  transform: translate(-50%,0);\n          left: 50%;\n      }\n      .each-statement .plus, .each-statement .minus {\n          padding: 12px 6px !important;\n          float: left;\n          margin-bottom: 0 !important;\n          width: 45px;\n          height: 100%;\n      }\n      .each-statement .statement p{\n          font-size: 14px;\n          width: 85%;\n          margin: 0;\n          text-align: left;\n          float: left;\n          padding-top: 5px;\n      }\n      .each-statement.active p {\n          text-align: left;\n      }\n      .sidebar-left ul li {\n          padding: 16px 0;\n      }\n      .trending_left, .trending_right_main  {\n          width: 100%;\n      }\n      .trending_ul > li{\n          position: relative;\n      }\n      .trending_right_ul{\n          position: absolute;\n          float: none;\n          width: auto;\n          right: 0;\n          bottom: 5px;\n      }\n      .trending_right_ul > li:first-child a {\n          font-size: 12px;\n      }\n      .trending_right_ul > li {\n          margin-left: 7px;\n      }\n      .trending_ul .btn-green {\n          padding: 10px 15px;\n          font-size: 16px;\n      }\n      .btn-green img {\n          width: 10px;\n      }\n      .trending_sub_left_ul > li{\n          width: auto !important;\n          margin-left: 7px !important;\n      }\n      .by_simply_willed_text {\n          font-size: 11px;\n          padding-top: 7px !important;\n      }\n      .trending_sub_left_ul > li:nth-child(2) .by_simply_willed_text{\n          margin-top: 0;\n      }\n      .older_post_text{\n          float: none;\n      }\n      .about_sec4 {\n          background: url('about-state-bg.49af1767fc5a33b3afe9.png') no-repeat center;\n          background-size: cover;\n          padding: 100px 0 0;\n      }\n      .relative .trending_right_ul {\n          left: 0;\n      }\n      .confirm_left {\n          text-align: center;\n      }\n      .form_heading {\n          font-size: 35px;\n      }\n      .desktop-visible{\n          display: none;\n      }\n      .mobile-visible{\n          display: inline-block;\n          width: 100%;\n      }\n  }\n\n@media screen and (min-width: 481px) and (max-width: 767px) {\n  }\n\n@media screen and (max-width: 480px) {\n      .each-statement .plus, .each-statement .minus {\n          margin-right: 5px;\n          padding: 5px;\n      }\n      .each-statement .statement p {\n          font-size: 12px;\n          width: 80%;\n      }\n      .each-statement .plus, .each-statement .minus {\n          width: 36px;\n      }\n      .each-statement.active p {\n          font-size: 12px;\n      }\n  }"

/***/ })

});
//# sourceMappingURL=user.module.chunk.js.map