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

module.exports = ""

/***/ }),

/***/ "./src/app/user/about-us/about-us.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"AboutUsBanner\">\n  <div class=\"wrapper\">\n      <h1>\n          At SimplyWilled our mission is to make\n          <span>estate planning simple and affordable for everyone.</span>\n      </h1>\n  </div>\n</div>\n<div class=\"body_container\">\n  <div class=\"about_sec1\">\n    <div class=\"wrapper\">\n      <h1 class=\"core_value_text\">Core Values</h1>\n      <div class=\"about_first_left_sec\">\n        <a href=\"#\" class=\"have_q_btn2\">Sustainability. <br>Community. <br>Diversity. </a>\n      </div>\n      <ul class=\"about_first_right_ul\">\n        <li>\n          <span class=\"estate_planning_img\"><img src=\"../../../../assets/images/estate-planing-img.png\" alt=\"error img\"></span>\n          <div class=\"estate_planning_right_main\">\n            <h1>Estate planning should be Simple.</h1>\n            <p>Through cutting edge technology, innovation and excellence, we strive to deliver the best online estate planning for our customers that is simple to do, simple to understand, simple to execute.</p>\n          </div>\n        </li>\n        <li>\n          <span class=\"estate_planning_img\"><img src=\"../../../../assets/images/planning2.png\" alt=\"error img\"></span>\n          <div class=\"estate_planning_right_main\">\n            <h1>Estate planning should be accessible to all people regardless of age, education, financial  status or native language.</h1>\n            <p>Here at SimplyWilled.com we believe the ability to pass wealth from one generation to the next is a fundamental right that all people should enjoy. </p>\n          </div>\n        </li>\n        <li>\n          <span class=\"estate_planning_img\"><img src=\"../../../../assets/images/customer.png\" alt=\"error img\"></span>\n          <div class=\"estate_planning_right_main\">\n            <h1>Here at SimplyWilled.com. we are committed to our customers.</h1>\n            <p>We are committed to building strong communities across the United States. Ten percent (10%) of all of SimplyWilled.com profits go to charities that support the less fortunate in the communities we serve.\n            </p>\n          </div>\n        </li>\n      </ul>\n    </div>\n  </div>\n  <div class=\"about_sec2\">\n    <div class=\"wrapper\">\n      <h1 class=\"core_value_text\">Our History</h1>\n      <p class=\"our_history_pera\">\n        Consumers today are smarter, more sophisticated, and have more choices than ever before for their online DIY legal needs. Only a satisfied consumer can decide if they will be your customer for life. At SimplyWilled we believe that to be worthy of such commitment, we had go beyond traditional online DIY legal services, and offer the consumer something new, something smart, something that makes the consumer’s life Simple.</p>\n      <p class=\"our_history_pera\">\n        “SimplyWilled.com offer consumers a new way of approaching online do it yourself estate planning. Our team recognized that most online platforms were either too basic or overly complicated. In contrast we setout to develop a solution that is simple to use but preserves the features that discerning consumers demand.” </p>\n      <p class=\"our_history_pera\">“We designed SimplyWilled as a simple to use, powerful, online estate planning system to empower individuals. It has been engineered from the ground up to make the online estate planning as simple and user friendly as possible, while retaining the flexibility and sophistication consumers demand in a way that exceeds customer expectations.” </p>\n      <p class=\"our_history_pera\">SimplyWilled.com extends the benefits of traditional online do it yourself estate planning by wrapping its capabilities in an online platform that is easy to access, easy to understand and easy for the customer to use.</p>\n    </div>\n  </div>\n  <div class=\"about_sec3\">\n    <div class=\"wrapper\">\n      <h1 class=\"core_value_text\">Our Team</h1>\n      <ul class=\"about_team_ul\">\n        <li>\n          <span class=\"team_pic\"><img src=\"../../../../assets/images/valeria-edward.png\" alt=\"imran khan\"></span>\n          <h3 class=\"team_name\">Valerie Edwards</h3>\n          <h4 class=\"team_descreption\">General Counsel</h4>\n        </li>\n        <li>\n          <span class=\"team_pic\"><img src=\"../../../../assets/images/peter.png\" alt=\"peter\"></span>\n          <h3 class=\"team_name\">Peter Antonoplos</h3>\n          <h4 class=\"team_descreption\">CEO & Founder</h4>\n        </li>\n        <li>\n          <span class=\"team_pic\"><img src=\"../../../../assets/images/kandel.png\" alt=\"Kendal\"></span>\n          <h3 class=\"team_name\">Kendal Wilkinson</h3>\n          <h4 class=\"team_descreption\">Customer Relations</h4>\n        </li>\n        <li>\n          <span class=\"team_pic\"><img src=\"../../../../assets/images/mark-atalla.png\" alt=\"Mark Atalla\"></span>\n          <h3 class=\"team_name\">Mark Atalla</h3>\n          <h4 class=\"team_descreption\">Brand Development</h4>\n        </li>\n      </ul>\n    </div>\n  </div>\n  <div class=\"about_sec4\">\n    <div class=\"wrapper\">\n      <h1 class=\"about_state_planning_text\">Estate Planning Made Simple & Affordable.</h1>\n      <h4 class=\"select_plan\">Select your plan now and Keep your loved ones safe!</h4>\n      <a href=\"#\" class=\"aboutGetStarted\"><i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i> Get Started</a>\n    </div>\n  </div>\n</div>"

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

module.exports = "<div class=\"body_container\">\n  <div class=\"wrapper\">\n    <div class=\"trending_main\">\n      <div class=\"trending_left\">\n        <ul class=\"trending_ul\">\n          <li *ngFor=\"let blog of blogList\">\n            <a routerLink=\"/blogdetails/{{blog.slug}}\" class=\"trending_img\"><img src=\"{{imageLink}}{{blog.image}}\" alt=\"{{blog.image}}\"></a>\n            <h1 class=\"news_heading\">{{blog.title}}</h1>\n            <ul class=\"trending_sub_left_ul\">\n              <li>\n                <span class=\"news_owl\"><img src=\"../../../../assets/images/news_owl.png\" alt=\"error img\"></span>\n                <span class=\"by_simply_willed_text\">By Simply<span>Willed</span></span>\n              </li>\n              <li>\n                <span class=\"by_simply_willed_text\">{{blog.created_at}}</span>\n              </li>\n              <li>\n                <span class=\"by_simply_willed_text\">{{blog.get_comments.length}} comments</span>\n              </li>\n            </ul>\n            <ul class=\"trending_right_ul\">\n              <li><a href=\"#\">Share:</a></li>\n              <li><a href=\"#\" title=\"Twitter\"><img src=\"../../../../assets/images/twitter-icon.png\"></a></li>\n              <li><a href=\"#\" title=\"Facebook\"><img src=\"../../../../assets/images/facebook-icon.png\"></a></li>\n              <li><a href=\"#\" title=\"Google-plus\"><img src=\"../../../../assets/images/gplus-icon.png\"></a></li>\n              <li><a href=\"#\" title=\"Vimeo\"><img src=\"../../../../assets/images/vimeo-icon.png\"></a></li>\n              <li><a href=\"#\" title=\"Skype\"><img src=\"../../../../assets/images/skype-icon.png\"></a></li>\n              <li><a href=\"#\" title=\"Linkedin\"><img src=\"../../../../assets/images/linkedin-icon.png\"></a></li>\n            </ul>\n            <p class=\"legal_requirement\" innerHTML=\"{{ blog.body | slice:0:650 }}\"></p>\n            <a class=\"btn-green\" routerLink=\"/blogdetails/{{blog.slug}}\" ><img src=\"../../../../assets/images/arrow-right.png\"> Read More</a>\n          </li>\n        </ul>\n        <a href=\"#\" class=\"older_post_text\">OLDER POSTS >></a>\n      </div>\n      <div class=\"trending_right_main\">\n        <h2 class=\"subscribe_text_main\"><span class=\"subscribe_text\">SUBSCRIBE</span></h2>\n        <form>\n          <div class=\"subscribe_form_main\">\n            <input type=\"email\" placeholder=\"Your email address\" class=\"subscribe_mail\">\n            <input type=\"submit\" class=\"btn-green\" value=\"Subscribe\">\n          </div>\n        </form>\n        <h2 class=\"subscribe_text_main\"><span class=\"subscribe_text\">CATEGORIES</span></h2>\n        <ul class=\"cat_ul\" *ngFor=\"let category of blogCategoryList\">\n          <li><a routerLink=\"/category/{{category.slug}}\">{{category.name}} <span> ({{category.blogCount}})</span></a></li>\n        </ul>\n        <h2 class=\"subscribe_text_main\"><span class=\"subscribe_text\">POPULAR POSTS </span></h2>\n        <ul class=\"post_ul\">\n            <li *ngFor=\"let popularPost of popularBlogPost\">\n                <a routerLink=\"/blogdetails/{{popularPost.slug}}\" class=\"post_img\"><img src=\"{{imageLink}}{{popularPost.image}}\"></a>\n                <div class=\"post_right_main\">\n                    <a routerLink=\"/blogdetails/{{popularPost.slug}}\" class=\"post_heading\">{{popularPost.title}}</a>\n                    <h4 class=\"healthcare_text\">{{popularPost.categoryNames}}</h4>\n                </div>\n            </li>\n        </ul>\n          <h2 class=\"subscribe_text_main\"><span class=\"subscribe_text\">RECENT POSTS </span></h2>\n          <ul class=\"post_ul\">\n              <li *ngFor=\"let popularPost of recentBlogPost\">\n                  <a routerLink=\"/blogdetails/{{popularPost.slug}}\" class=\"post_img\"><img src=\"{{imageLink}}{{popularPost.image}}\"></a>\n                  <div class=\"post_right_main\">\n                      <a routerLink=\"/blogdetails/{{popularPost.slug}}\" class=\"post_heading\">{{popularPost.title}}</a>\n                      <h4 class=\"healthcare_text\">{{popularPost.categoryNames}}</h4>\n                  </div>\n              </li>\n          </ul>\n\n      </div>\n    </div>\n  </div>\n  <div class=\"about_sec4\">\n    <div class=\"wrapper\">\n      <h1 class=\"about_state_planning_text\">Estate Planning Made Simple &amp; Affordable.</h1>\n      <h4 class=\"select_plan\">Select your plan now and Keep your loved ones safe!</h4>\n    </div>\n  </div>\n</div>"

/***/ }),

/***/ "./src/app/user/blog/blog-category/blog-category.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return BlogCategoryComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__blog_service__ = __webpack_require__("./src/app/user/blog/blog.service.ts");
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



var BlogCategoryComponent = /** @class */ (function () {
    function BlogCategoryComponent(router, route, BlogService) {
        var _this = this;
        this.router = router;
        this.route = route;
        this.BlogService = BlogService;
        this.blogList = [];
        this.blogCategoryList = [];
        this.popularBlogPost = [];
        this.recentBlogPost = [];
        router.events.subscribe(function (event) {
            if (event instanceof __WEBPACK_IMPORTED_MODULE_2__angular_router__["b" /* NavigationEnd */]) {
                var slug = _this.route.snapshot.paramMap.get('slug');
                _this.BlogService.getBlogDetailsFromCategory(slug).subscribe(function (data) {
                    _this.blogList = data.data.blog;
                    _this.imageLink = data.data.imageLink;
                });
            }
        });
    }
    BlogCategoryComponent.prototype.ngOnInit = function () {
        this.getBlogDetailsFromCategory();
        this.populateBlogCategory();
        this.populatePopularBlogPosts();
        this.populateRecentBlogPosts();
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
    BlogCategoryComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            selector: 'app-blog-category',
            template: __webpack_require__("./src/app/user/blog/blog-category/blog-category.component.html"),
            styles: [__webpack_require__("./src/app/user/blog/blog-category/blog-category.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_2__angular_router__["d" /* Router */],
            __WEBPACK_IMPORTED_MODULE_2__angular_router__["a" /* ActivatedRoute */], __WEBPACK_IMPORTED_MODULE_1__blog_service__["a" /* BlogService */]])
    ], BlogCategoryComponent);
    return BlogCategoryComponent;
}());



/***/ }),

/***/ "./src/app/user/blog/blog.component.css":
/***/ (function(module, exports) {

module.exports = ".subscribe_form_main .btn-green{\n    width: 100%;\n    font-size: 18px;\n    padding: 8px 0;\n    font-weight: bold;\n}\n.about_sec4{\n    position: relative;\n}\n.about_sec4 .btn-green{\n    width: 180px;\n    text-align: center;\n    color: #fff;\n    background: -webkit-gradient(linear, left top, left bottom, from(#53ba3c), to(#3fa62e));\n    background: linear-gradient(#53ba3c, #3fa62e);\n    border: 2px solid #fff;\n    font-family: 'OpenSans';\n    font-size: 22px;\n    padding: 10px 0px;\n    border-radius: 10px;\n    text-shadow: 2px 2px 1px rgba(0,0,0,0.2);\n    -webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,0.4);\n            box-shadow: inset 0 1px 0 rgba(255,255,255,0.4);\n    -webkit-transition: all 0.3s ease 0s;\n    transition: all 0.3s ease 0s;\n    position: absolute;\n    left: 50%;\n    bottom: 0;\n    -webkit-transform: translate(-50%, 50%);\n            transform: translate(-50%, 50%);\n    outline: 0;\n    cursor: pointer;\n}\n@media screen and (max-width:1310px){\n    .trending_right_ul{\n        width: 100%;\n    }\n}\n@media only screen and (max-width: 960px) and (min-width: 768px){\n   .trending_right_ul {\n        width: auto;\n        right: 0;\n        left: auto;\n    } \n    .by_simply_willed_text{\n        font-size: 14px;\n    }\n}\n@media screen and (max-width: 960px){\n    .trending_right_ul {\n        width: 100%;\n        bottom: -40px;\n    }\n}\n@media screen and (max-width: 960px){\n    .trending_ul > li{\n        margin-bottom: 80px;\n    }\n}\n@media only screen and (max-width: 480px) and (min-width: 100px){\n    .trending_ul > li {\n        padding-bottom: 0;\n    }\n}"

/***/ }),

/***/ "./src/app/user/blog/blog.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"body_container\">\n  <div class=\"wrapper\">\n    <div class=\"trending_main\">\n      <div class=\"trending_left\">\n        <ul class=\"trending_ul\">\n          <li *ngFor=\"let blog of blogList\">\n              <a routerLink=\"/blogdetails/{{blog.slug}}\" class=\"trending_img\"><img src=\"{{imageLink}}{{blog.image}}\" alt=\"{{blog.image}}\"></a>\n            <h1 class=\"news_heading\">{{blog.title}}</h1>\n            <ul class=\"trending_sub_left_ul\">\n              <li>\n                <span class=\"news_owl\"><img src=\"../../../../assets/images/news_owl.png\" alt=\"error img\"></span>\n                <span class=\"by_simply_willed_text\">By Simply<span>Willed</span></span>\n              </li>\n              <li>\n                <span class=\"by_simply_willed_text\">{{blog.created_at}}</span>\n              </li>\n              <li>\n                <span class=\"by_simply_willed_text\">{{blog.get_comments.length}} comments</span>\n              </li>\n            </ul>\n            <ul class=\"trending_right_ul\">\n              <li><a href=\"#\">Share:</a></li>\n              <li><a href=\"#\" title=\"Twitter\"><img src=\"../../../../assets/images/twitter-icon.png\"></a></li>\n              <li><a href=\"#\" title=\"Facebook\"><img src=\"../../../../assets/images/facebook-icon.png\"></a></li>\n              <li><a href=\"#\" title=\"Google-plus\"><img src=\"../../../../assets/images/gplus-icon.png\"></a></li>\n              <li><a href=\"#\" title=\"Vimeo\"><img src=\"../../../../assets/images/vimeo-icon.png\"></a></li>\n              <li><a href=\"#\" title=\"Skype\"><img src=\"../../../../assets/images/skype-icon.png\"></a></li>\n              <li><a href=\"#\" title=\"Linkedin\"><img src=\"../../../../assets/images/linkedin-icon.png\"></a></li>\n            </ul>\n            <p class=\"legal_requirement\" innerHTML=\"{{ blog.body | slice:0:650 }}\"></p>\n            <a class=\"btn-green\" routerLink=\"/blogdetails/{{blog.slug}}\" ><img src=\"../../../../assets/images/arrow-right.png\"> Read More</a>\n          </li>\n        </ul>\n        <a href=\"#\" class=\"older_post_text\">OLDER POSTS >></a>\n      </div>\n      <div class=\"trending_right_main\">\n        <h2 class=\"subscribe_text_main\"><span class=\"subscribe_text\">SUBSCRIBE</span></h2>\n        <form>\n          <div class=\"subscribe_form_main\">\n            <input type=\"email\" placeholder=\"Your email address\" class=\"subscribe_mail\">\n            <input type=\"submit\" class=\"btn-green\" value=\"Subscribe\">\n          </div>\n        </form>\n        <h2 class=\"subscribe_text_main\"><span class=\"subscribe_text\">CATEGORIES</span></h2>\n        <ul class=\"cat_ul\" *ngFor=\"let category of blogCategoryList\">\n          <li><a routerLink=\"/category/{{category.slug}}\">{{category.name}} &nbsp;<span> ({{category.blogCount}})</span></a></li>\n        </ul>\n        <h2 class=\"subscribe_text_main\"><span class=\"subscribe_text\">POPULAR POSTS </span></h2>\n        <ul class=\"post_ul\">\n          <li *ngFor=\"let popularPost of popularBlogPost\">\n            <a routerLink=\"/blogdetails/{{popularPost.slug}}\" class=\"post_img\"><img src=\"{{imageLink}}{{popularPost.image}}\"></a>\n            <div class=\"post_right_main\">\n              <a routerLink=\"/blogdetails/{{popularPost.slug}}\" class=\"post_heading\">{{popularPost.title}}</a>\n              <h4 class=\"healthcare_text\">{{popularPost.categoryNames}}</h4>\n            </div>\n          </li>\n        </ul>\n\n          <h2 class=\"subscribe_text_main\"><span class=\"subscribe_text\">RECENT POSTS </span></h2>\n          <ul class=\"post_ul\">\n              <li *ngFor=\"let popularPost of recentBlogPost\">\n                  <a routerLink=\"/blogdetails/{{popularPost.slug}}\" class=\"post_img\"><img src=\"{{imageLink}}{{popularPost.image}}\"></a>\n                  <div class=\"post_right_main\">\n                      <a routerLink=\"/blogdetails/{{popularPost.slug}}\" class=\"post_heading\">{{popularPost.title}}</a>\n                      <h4 class=\"healthcare_text\">{{popularPost.categoryNames}}</h4>\n                  </div>\n              </li>\n          </ul>\n\n      </div>\n    </div>\n  </div>\n  <div class=\"about_sec4\">\n    <div class=\"wrapper\">\n      <h1 class=\"about_state_planning_text\">Estate Planning Made Simple &amp; Affordable.</h1>\n      <h4 class=\"select_plan\">Select your plan now and Keep your loved ones safe!</h4>\n      <button class=\"btn-green\" type=\"button\"><img src=\"../../../../assets/images/arrow-right.png\"> get started</button>\n    </div>\n  </div>\n</div>"

/***/ }),

/***/ "./src/app/user/blog/blog.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return BlogComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__blog_service__ = __webpack_require__("./src/app/user/blog/blog.service.ts");
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
    function BlogComponent(BlogService) {
        this.BlogService = BlogService;
        this.blogList = [];
        this.blogCategoryList = [];
        this.popularBlogPost = [];
        this.recentBlogPost = [];
    }
    BlogComponent.prototype.ngOnInit = function () {
        this.populateBlog();
        this.populateBlogCategory();
        this.populatePopularBlogPosts();
        this.populateRecentBlogPosts();
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
    BlogComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            selector: 'app-blog',
            template: __webpack_require__("./src/app/user/blog/blog.component.html"),
            styles: [__webpack_require__("./src/app/user/blog/blog.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__blog_service__["a" /* BlogService */]])
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

module.exports = "<div class=\"body_container\">\n  <div class=\"wrapper\">\n    <div class=\"trending_main\">\n      <div class=\"relative\" *ngIf=\"blogDetails\">\n        <span class=\"single_post\"><img src=\"{{imageLink}}{{blogDetails.image}}\" alt=\"{{blogDetails.image}}\"></span>\n        <h1 class=\"why_do_need_will\">{{blogDetails.title}}</h1>\n        <ul class=\"trending_sub_left_ul\">\n          <li>\n            <span class=\"news_owl\"><img src=\"../../../../assets/images/news_owl.png\" alt=\"error img\"></span>\n            <span class=\"by_simply_willed_text\">By Simply<span>Willed</span></span>\n          </li>\n          <li>\n            <span class=\"by_simply_willed_text\">{{blogDetails.created_at}}</span>\n          </li>\n          <li>\n            <span class=\"by_simply_willed_text\">{{blogDetails.get_comments.length}} comments</span>\n          </li>\n        </ul>\n        <ul class=\"trending_right_ul\">\n          <li><a href=\"#\">Share:</a></li>\n          <li><a href=\"#\" title=\"Twitter\"><img src=\"../../../../assets/images/twitter-icon.png\"></a></li>\n          <li><a href=\"#\" title=\"Facebook\"><img src=\"../../../../assets/images/facebook-icon.png\"></a></li>\n          <li><a href=\"#\" title=\"Google-plus\"><img src=\"../../../../assets/images/gplus-icon.png\"></a></li>\n          <li><a href=\"#\" title=\"Vimeo\"><img src=\"../../../../assets/images/vimeo-icon.png\"></a></li>\n          <li><a href=\"#\" title=\"Skype\"><img src=\"../../../../assets/images/skype-icon.png\"></a></li>\n          <li><a href=\"#\" title=\"Linkedin\"><img src=\"../../../../assets/images/linkedin-icon.png\"></a></li>\n        </ul>\n          <div class='col-md-12 blogContainer' [innerHTML]=\"blogDetails.body\"> </div>\n      </div>\n      <h3 class=\"comments_text\" *ngIf=\"blogDetails?.get_comments.length == 0\">No Comments</h3>\n      <div *ngIf=\"blogDetails?.get_comments.length != 0\" class=\"blogCommentSec\">\n        <h2>Comments</h2>\n        <div class=\"commentArea\">\n            <div class=\"commentRow\" *ngFor=\"let comment of blogDetails?.get_comments\">\n              <div class=\"commentImg\">\n                <img src=\"../../../../assets/images/commentImg.png\" alt=\"\">\n              </div>\n              <div class=\"commentMain\">\n                <div class=\"commentHead\">\n                  <span class=\"commentUBy\">{{comment.name}} / </span>\n                  <span class=\"commentDate\">{{comment.created_at}}</span>\n                </div>\n                <div class=\"commentEmail\">{{comment.email}}</div>\n                <div class=\"commentBody\">\n                  <p>{{comment.message}}</p>\n                </div>\n              </div>\n            </div>\n        </div>\n      </div>\n        <form novalidate [formGroup]=\"commentForm\" (ngSubmit)=\"onSubmit()\">\n            <input type=\"hidden\" class=\"form-control\" formControlName=\"blogId\" [(ngModel)]=\"BlogId\">\n        <div class=\"from_main2\">\n          <h3 class=\"post_comment_text\">POST a COMMENT: </h3>\n          <ul class=\"form2_ul\">\n            <li>\n                <input type=\"text\" class=\"form-control\" formControlName=\"name\" placeholder=\"Your name\">\n                <div class=\"form-control-feedback\"\n                     *ngIf=\"name.errors && (name.dirty || name.touched)\">\n                    <p *ngIf=\"name.errors\">Name is required</p>\n                </div>\n            </li>\n            <li>\n                <input type=\"text\" class=\"form-control\" formControlName=\"email\" placeholder=\"Your email\">\n                <div class=\"form-control-feedback\"\n                     *ngIf=\"email.errors && (email.dirty || email.touched)\">\n                    <p *ngIf=\"email.errors\">The email address must contain at least the @ character</p>\n                </div>\n            </li>\n            <li>\n                <textarea formControlName=\"message\" cols=\"30\" rows=\"10\"  placeholder=\"Your Comment\"></textarea>\n            </li>\n          </ul>\n            <button type=\"submit\" class=\"form2_submit\" >Submit</button>\n        </div>\n      </form>\n\n    </div>\n  </div>\n  <div class=\"about_sec4\">\n    <div class=\"wrapper\">\n      <h1 class=\"about_state_planning_text\">Estate Planning Made Simple &amp; Affordable.</h1>\n      <h4 class=\"select_plan\">Select your plan now and Keep your loved ones safe!</h4>\n      <button class=\"btn-green\" type=\"button\"><img src=\"../../../../assets/images/arrow-right.png\"> get started</button>\n    </div>\n  </div>\n</div>"

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

module.exports = ""

/***/ }),

/***/ "./src/app/user/contact-us/contact-us.component.html":
/***/ (function(module, exports) {

module.exports = "\n<p>\n  contact-us works!\n</p>\n"

/***/ }),

/***/ "./src/app/user/contact-us/contact-us.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ContactUsComponent; });
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

var ContactUsComponent = /** @class */ (function () {
    function ContactUsComponent() {
    }
    ContactUsComponent.prototype.ngOnInit = function () {
    };
    ContactUsComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            selector: 'app-contact-us',
            template: __webpack_require__("./src/app/user/contact-us/contact-us.component.html"),
            styles: [__webpack_require__("./src/app/user/contact-us/contact-us.component.css")]
        }),
        __metadata("design:paramtypes", [])
    ], ContactUsComponent);
    return ContactUsComponent;
}());



/***/ }),

/***/ "./src/app/user/faq/faq.component.css":
/***/ (function(module, exports) {

module.exports = ".sidebar-left h2{\n    margin-bottom: 0;\n}\n.faqName{\n    display: block;\n}\n.accordion-mobile li{\n    padding: 0 16px;\n}\n.accordion-mobile li .open-accordion{\n    display: none;\n}\n.accordion-mobile li.active .open-accordion{\n    display: block;\n}\n.accordion-mobile .statement{\n    margin-bottom: 0;\n}\n.each-statement.active p{\n    padding: 10px;\n}\n.each-statement .statement p{\n    margin: 16px 0 !important;\n    padding: 10px;\n}\n.accordion-mobile .each-statement .statement p{\n    margin:  0 !important;\n    padding: 0;\n}\n"

/***/ }),

/***/ "./src/app/user/faq/faq.component.html":
/***/ (function(module, exports) {

module.exports = "\n    <!-- <div class=\"slider\">\n        <img src=\"../../../../assets/images/faq-banner.png\">\n        <img src=\"../../../../assets/images/faq-mobile-banner.png\" class=\"mobile-banner\">\n        <h1>Welcome to the SimplyWilled library, <span>your free learning resource center.</span></h1>\n    </div> -->\n    <div class=\"body_container faq\">\n    \t<div class=\"about_sec1\">\n        \t<div class=\"wrapper text-center\">\n            \t<form id=\"faqSearch\" #form=\"ngForm\" (ngSubmit)=\"onSubmit(form)\">\n                        <input type=\"text\" placeholder=\"Write your question here\" name=\"search\" ngModel #search=ngModel class=\"form-control\">\n                        <button class=\"btn-green\" type='submit' ><img src=\"../../../../assets/images/arrow-right.png\" > Ask the Owl!</button>    \n                </form>\n                    \n                <div class=\"accordion\">\n                    <div class=\"sidebar-left\">\n                        <h2>Topic</h2>\n                        <ul>\n                            <li *ngFor=\"let faq of faqData; let i = index\" \n                                (click)=\"getQuestions(faqData,i)\" \n                                [ngClass] = \"{active: counter == i}\">\n                                    {{ faq.name }}\n                            </li>\n                        </ul>\n                    </div>\n                    <div class=\"main-content\">\n                        <div class=\"each-statement\" *ngFor=\"let eachFaq of faqDetails; let i = index\" [ngClass] = \"{active: innerCounter == i}\">\n                            <div (click)=\"showOrHideAnswers(eachFaq,i)\" class=\"statement\">\n                                <span class=\"plus\">\n                                    <img src=\"../../../../assets/images/plus.png\">\n                                </span>\n                                <span class=\"minus\">\n                                    <img src=\"../../../../assets/images/minus.png\">\n                                </span>\n                                <p>{{eachFaq.question}}</p>\n                            </div>\n                            <p>{{eachFaq.answer}}</p>\n                        </div>\n                    </div>\n                </div>\n\n                <div class=\"accordion accordion-mobile\">\n                    <div class=\"sidebar-left\">\n                        <h2>Topic</h2>\n                        <ul>\n                            <li *ngFor=\"let faq of faqData; let i = index\" \n                                (click)=\"getQuestions(faqData,i)\" \n                                [ngClass] = \"{active: counter == i}\">\n                                    <span class=\"faqName\">{{ faq.name }}</span>\n                                    <div class=\"open-accordion\">\n                                        <div (click)=\"showOrHideAnswers(eachFaq,j)\" class=\"each-statement\"  *ngFor=\"let eachFaq of faqDetails; let j = index\" [ngClass] = \"{active: innerCounter == j}\">\n                                            <div class=\"statement\">\n                                                <span class=\"plus\">\n                                                    <img src=\"../../../../assets/images/plus.png\">\n                                                </span>\n                                                <span class=\"minus\">\n                                                    <img src=\"../../../../assets/images/minus.png\">\n                                                </span>\n                                                <p>{{eachFaq.question}}</p>\n                                            </div>\n                                            <p>{{eachFaq.answer}}</p>\n                                        </div>    \n                                    </div>\n                            </li>\n                        </ul>\n                    </div>\n                </div>\n\n            </div>\n            <div class=\"clear\"></div>\n            <div class=\"estate-planning\">\n                <div class=\"wrapper text-center\">\n                    <h2>estate planning made simple & affordable.</h2>\n                    <p>Select your plan now and keep your loved ones safe!</p>\n                    <button class=\"btn-green\" type=\"button\"><img src=\"../../../../assets/images/arrow-right.png\"> get started</button>\n                </div>\n            </div>\n        </div>\n    </div>\n    \n"

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
        //console.log('faqDetailsData: ',faqDetailsData, 'index : ',index);
        this.innerCounter = this.innerCounter == index ? null : index;
        console.log(this.innerCounter);
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

module.exports = ".sec3_btn_main a:hover {\n    background: -webkit-gradient(linear, left top, left bottom, from(#4fb73a), to(#3da12c));\n    background: linear-gradient(#4fb73a, #3da12c);\n    border: 2px solid #fff;\n    color: #fff;\n    text-decoration: none;\n}\n.get_start_btn:hover{\n    background: -webkit-gradient(linear, left top, left bottom, from(#53ba3c), to(#3fa62e));\n    background: linear-gradient(#53ba3c, #3fa62e);\n    border: 1px solid #40a52f;\n    color: #fff;\n    text-decoration: none;\n}\n.book_sec_main .get_start_pkg_btn:hover{\n    color:#fff;\n    text-decoration: none;\n}\n\n\n\n\n"

/***/ }),

/***/ "./src/app/user/home/home.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"heaser_sec2_slider\">\n  <div class=\"slider\">\n    <div class=\"flexslider\">\n      <ul class=\"slides\">\n        <li>\n          <div class=\"index_banner\">\n            <div class=\"wrapper\">\n              <h1 class=\"state_planning_text\">Protect what matters most with<br>\n                SimplyWilled.com.</h1>\n              <p>Create your personalized Last Will and Testament today.</p>\n              <ul class=\"index_banner_ul\">\n                <li>Founded By Lawyers</li>\n                <li>Takes Less Than 15 Minutes To Complete</li>\n                <li>Enforceable In All 50 States</li>\n              </ul>\n              <a href=\"#\" class=\"get_start_btn\"><i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i> Get Started</a>\n            </div>\n          </div>\n        </li>\n      </ul>\n    </div>\n  </div>\n</div>\n<div class=\"body_container\">\n  <div class=\"index_sec1\">\n    <div class=\"wrapper\">\n      <h2 class=\"secHeading\">Safeguard Your Legacy, Assets\n        <br> & Loved Ones.</h2>\n      <div class=\"video_main\" (click)=\"openModal(viewVideo)\">\n        <img src=\"../../../../assets/images/video.png\" alt=\"video img\">\n      </div>\n      <ul class=\"protect_loved_ul\">\n        <li>\n          <span class=\"loved_img\"><img src=\"../../../../assets/images/protect-img.png\" alt=\"protect img\"></span>\n          <div class=\"protect_loved_right\">\n            <h2>PROTECT YOUR LOVED ONES</h2>\n            <p>Name guardians and list beneficiaries so those you love are in good hands.</p>\n          </div>\n        </li>\n        <li>\n          <span class=\"loved_img\"><img src=\"../../../../assets/images/assets.png\" alt=\"protect img\"></span>\n          <div class=\"protect_loved_right\">\n            <h2>PROTECT YOUR ASSETS</h2>\n            <p>Ensure the assets you’ve worked hard for pass to the ones you love.</p>\n          </div>\n        </li>\n        <li>\n          <span class=\"loved_img\"><img src=\"../../../../assets/images/save-time.png\" alt=\"protect img\"></span>\n          <div class=\"protect_loved_right\">\n            <h2>SAVE TIME & MONEY</h2>\n            <p>It takes less than 10 minutes and your done. Try it today and see how simple preparing your estate plan online can be.</p>\n          </div>\n        </li>\n      </ul>\n\n\n    </div>\n  </div>\n  <div class=\"index_sec2\">\n    <div class=\"wrapper\">\n      <span class=\"enforceable_estate\">Enforceable Estate Documents <br>Customized For You</span>\n      <ul class=\"last_will_treatment_ul\">\n        <li>\n          <span class=\"last_will_img\"><img src=\"../../../../assets/images/last-will.png\" alt=\"error img\"></span>\n          <div class=\"last_will_right_sec\">\n            <h3>Last Will & Testament</h3>\n            <p>Draft a personalized Last Will & Testament so your wishes are known. Name your Personal Representative, list beneficiaries and appoint guardians for minor children.</p>\n          </div>\n        </li>\n        <li>\n          <span class=\"last_will_img\"><img src=\"../../../../assets/images/revocable_img.png\" alt=\"error img\"></span>\n          <div class=\"last_will_right_sec\">\n            <h3>Revocable Living Trust</h3>\n            <p>Prepare a personalized revocable living trust so your estate is protected. Appoint a trustee, name beneficiaries and plan out how your estate should be distributed.</p>\n          </div>\n        </li>\n        <li>\n          <span class=\"last_will_img\"><img src=\"../../../../assets/images/living-img.png\" alt=\"error img\"></span>\n          <div class=\"last_will_right_sec\">\n            <h3>Living Will</h3>\n            <p>State your wishes for medical treatment and end-of-life care, in the event of incapacity.</p>\n          </div>\n        </li>\n        <li>\n          <span class=\"last_will_img\"><img src=\"../../../../assets/images/home.png\" alt=\"error img\"></span>\n          <div class=\"last_will_right_sec\">\n            <h3>Home Transfer Deed</h3>\n            <p>Prepare a real property transfer deed to fund your revocable living trust with any real estate you may own to avoid probate later.</p>\n          </div>\n        </li>\n        <li>\n          <span class=\"last_will_img\"><img src=\"../../../../assets/images/power-attorney.png\" alt=\"error img\"></span>\n          <div class=\"last_will_right_sec\">\n            <h3>Financial Power of Attorney</h3>\n            <p>Complete a financial power of attorney and name an individual to oversee your financial affairs in the event you are incapacitated.</p>\n          </div>\n        </li>\n        <li>\n          <span class=\"last_will_img\"><img src=\"../../../../assets/images/healtcare.png\" alt=\"error img\"></span>\n          <div class=\"last_will_right_sec\">\n            <h3>Healthcare Power of Attorney</h3>\n            <p>A healthcare power of attorney and living will so your wishes are known in the event of a medical emergency.</p>\n          </div>\n        </li>\n      </ul>\n    </div>\n  </div>\n  <div class=\"index_sec3\">\n    <div class=\"wrapper\">\n      <h1 class=\"attorney_At_law_text\">Attorneys & Estate Planning Experts <br>Behind Every Choice That We Make</h1>\n      <ul class=\"sec3_planning_ul\">\n        <li>\n          <span class=\"planning_img\"><img src=\"../../../../assets/images/legal-mind.png\" alt=\"error img\"></span>\n          <h4>Renowned Legal Minds</h4>\n          <p>Our service was designed by leading estate planning attorneys with decades of experience.</p>\n        </li>\n        <li>\n          <span class=\"planning_img\"><img src=\"../../../../assets/images/customized.png\" alt=\"error img\"></span>\n          <h4>Customized For All 50 States</h4>\n          <p>Your documents are customized in accordance with your state’s current laws.</p>\n        </li>\n        <li>\n          <span class=\"planning_img\"><img src=\"../../../../assets/images/personalized.png\" alt=\"error img\"></span>\n          <h4>Personalized Just For You</h4>\n          <p>Quickly create documents that are tailored to achieve your needs and objectives.</p>\n        </li>\n      </ul>\n      <span class=\"sec3_btn_main\"><a href=\"#\"><i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i> Meet Our Team</a></span>\n    </div>\n  </div>\n  <div class=\"index_sec4\">\n    <div class=\"wrapper\">\n      <h1 class=\"proprietary_text\">Proprietary Technology To Keep <br>Your Information Safe</h1>\n      <ul class=\"sec4_ul\">\n        <li>\n          <span class=\"protection_img\"><img src=\"../../../../assets/images/protection-img.png\" alt=\"error img\"></span>\n          <h3 class=\"protection_text\">Data Protection</h3>\n          <p class=\"protection_pera\">Secure servers and SSL encryption protect your sensitive information from unauthorized access and use.</p>\n        </li>\n        <li>\n          <span class=\"protection_img\"><img src=\"../../../../assets/images/privacy-img.png\" alt=\"error img\"></span>\n          <h3 class=\"protection_text\">Privacy Protection</h3>\n          <p class=\"protection_pera\">Your private information is not disclosed to anyone, period.</p>\n        </li>\n        <li>\n          <span class=\"protection_img\"><img src=\"../../../../assets/images/clock.png\" alt=\"error img\"></span>\n          <h3 class=\"protection_text\">Around The Clock Sourveillance</h3>\n          <p class=\"protection_pera\">We are verified and monitored by the world’s leading security experts.</p>\n        </li>\n      </ul>\n      <div class=\"securityBrand\">\n        <img src=\"../../../../assets/images/mcAfee.png\" alt=\"\">\n        <img src=\"../../../../assets/images/norton.png\" alt=\"\">\n      </div>\n    </div>\n  </div>\n  <div class=\"index_sec5\">\n    <div class=\"wrapper\">\n      <div class=\"sec5_left_main\">\n        <h1 class=\"its_easy_text\">It’s As Easy As One, Two, Three!</h1>\n        <ul class=\"sec5_easy_ul\">\n          <li>\n            <span class=\"print_img\"><img src=\"../../../../assets/images/click.png\" alt=\"error img\"></span>\n            <div class=\"print_img_right_sec\">\n              <h3>1. Click</h3>\n              <p>To get started, simply answer a few short questions using our easy to follow estate planning questionnaire.</p>\n            </div>\n          </li>\n          <li>\n            <span class=\"print_img\"><img src=\"../../../../assets/images/print.png\" alt=\"error img\"></span>\n            <div class=\"print_img_right_sec\">\n              <h3>2. Print</h3>\n              <p>Select the documents you want. When you’re ready instantly download and print your custom estate planning documents.</p>\n            </div>\n          </li>\n          <li>\n            <span class=\"print_img\"><img src=\"../../../../assets/images/wxecute.png\" alt=\"error img\"></span>\n            <div class=\"print_img_right_sec\">\n              <h3>3. Execute</h3>\n              <p>Execute your custom estate plan using our simple instructions, and you’re done. It’s that simple.</p>\n            </div>\n          </li>\n        </ul>\n        <div class=\"clear\"></div>\n        <div class=\"BlueBox\">\n          Join the thousands of people that have made their\n          last will and testament using <span>SimplyWilled.com</span>\n        </div>\n      </div>\n\n    </div>\n  </div>\n  <div class=\"index_sec6_pkg\">\n    <div class=\"wrapper\">\n      <h1 class=\"pkg_heading\">Select The Will Package That<br>\n        Is Right For You.</h1>\n      <ul class=\"packages_ul\">\n        <li>\n          <div class=\"pkg_first_sec\">\n            <span class=\"single_pkg\"><img src=\"../../../../assets/images/pkg1.png\" alt=\"error img\"></span>\n            <h3 class=\"single_text_heading\">Single Will</h3>\n            <h4 class=\"pkg_text\">Package</h4>\n            <p class=\"will_package_info\">The Perfect Basic Will Package For An Individual To Get Their Estate In Order.</p>\n          </div>\n          <div class=\"book_sec_main\">\n            <div class=\"book_main\">\n              <span class=\"single_will_book\"><img src=\"../../../../assets/images/single-pkg-book.png\" alt=\"error img\"></span>\n              <h1 class=\"book_price\">$99</h1>\n            </div>\n            <div class=\"clear\"></div>\n            <p class=\"payPal\"><span>Shop With Confidence Powered by</span> <a href=\"#\"><img src=\"../../../../assets/images/paypal-btn.png\" class=\"img-responsive\"></a></p>\n            <a href=\"#\" class=\"get_start_pkg_btn hide_btn\"><i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i> Buy Now</a>\n          </div>\n\n          <div class=\"hide_show_main_pkg\">\n            <span class=\"key_benefits_text\">Key Benefits</span>\n            <ul class=\"pkg_benefits_ul\">\n              <li>\n                <span class=\"faster_text\" >Faster and easier than hiring a lawyer*</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Make a Simple Will & Supporting Documents for you</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Leave property to those you love</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Provide for your children & your estate</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Appoint a guardian for minor children</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Plan for a medical emergency</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Appoint a financial power of attorney</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Make your final wishes known</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Update your plan as often as you wish</span>\n              </li>\n              <li>\n                <span class=\"empty_text\"></span>\n              </li>\n            </ul>\n            <span class=\"whats_included_text\">What’s Included:</span>\n            <ul class=\"include_ul\">\n              <li>\n                <span class=\"faster_text2\">Includes a Complete Set of Documents For 1 Person</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">A Last Will & Testament</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">Healthcare Power of Attorney</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">Durable General Power of Attorney</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">Living Will</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">HIPAA Wavier</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">Burial Instructions</span>\n              </li>\n              <li style=\"border:none;\">\n                <span class=\"empty2\"></span>\n              </li>\n              <li style=\"border:none;\">\n                <span class=\"empty2\"></span>\n              </li>\n            </ul>\n            <a href=\"#\" class=\"get_start_pkg_btn\"><i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i> Buy Now</a>\n          </div>\n          <a href=\"javascript:void(0)\" class=\"include_text\">See what’s included</a>\n        </li>\n        <li>\n          <div class=\"pkg_first_sec\">\n            <span class=\"single_pkg\"><img src=\"../../../../assets/images/pkg2.png\" alt=\"error img\"></span>\n            <h3 class=\"single_text_heading\">Married Will</h3>\n            <h4 class=\"pkg_text\">Package</h4>\n            <p class=\"will_package_info\">The Perfect Basic Will Package for Married Couples To Get Their Affairs In Order.</p>\n          </div>\n          <div class=\"book_sec_main\">\n            <div class=\"book_main\">\n              <span class=\"single_will_book\"><img src=\"../../../../assets/images/married-pkg-book.png\" alt=\"error img\"></span>\n              <h1 class=\"book_price\">$199</h1>\n            </div>\n            <div class=\"clear\"></div>\n            <p class=\"payPal\"><span>Shop With Confidence Powered by</span> <a href=\"#\"><img src=\"../../../../assets/images/paypal-btn.png\" class=\"img-responsive\"></a></p>\n            <a href=\"#\" class=\"get_start_pkg_btn start_btn_2 hide_btn\"><i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i> Buy Now</a>\n          </div>\n\n          <div class=\"hide_show_main_pkg\">\n            <span class=\"key_benefits_text\">Key Benefits</span>\n            <ul class=\"pkg_benefits_ul after_color1\">\n              <li>\n                <span class=\"faster_text\">Faster and easier than hiring a lawyer*</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Make a Simple Will & Supporting Documents for you and your spouse</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Leave property to those you love</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Provide for your children & your estate</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Appoint a guardian for minor children</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Plan for a medical emergency</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Appoint a financial power of attorney</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Make your final wishes known</span>\n              </li>\n              <li>\n                <span class=\"faster_text\">Update your plan as often as you wish</span>\n              </li>\n              <li>\n                <span class=\"empty_text\"></span>\n              </li>\n            </ul>\n            <span class=\"whats_included_text\">What’s Included:</span>\n            <ul class=\"include_ul\">\n              <li>\n                <span class=\"faster_text2\">Includes a Complete Set of Documents For Each Spouse</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">A Last Will & Testament For Each of You</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">Healthcare Power of Attorney For Each of You</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">Durable General Power of Attorney For Each of You</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">Living Will For Each of You</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">HIPAA Wavier For Each of You</span>\n              </li>\n              <li>\n                <span class=\"faster_text2\">Burial Instructions For Each of You</span>\n              </li>\n              <li style=\"border:none;\">\n                <span class=\"empty2\"></span>\n              </li>\n              <li style=\"border:none;\">\n                <span class=\"empty2\"></span>\n              </li>\n            </ul>\n            <a href=\"#\" class=\"get_start_pkg_btn start_btn_2\"><i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i> Buy Now</a>\n          </div>\n          <a href=\"javascript:void(0)\" class=\"include_text\">See what’s included</a>\n        </li>\n      </ul>\n    </div>\n  </div>\n  <div class=\"index_sec7\">\n    <div class=\"wrapper\">\n      <h1 class=\"save_text\">Our Average Customer <span>Saves 80%</span> <br>With SimplyWilled Estate Planning!</h1>\n      <ul class=\"sec7_ul\">\n        <li>Safe</li>\n        <li>Simple</li>\n        <li>Smart</li>\n      </ul>\n      <span class=\"sec2_btn_main\"><a href=\"#\"><i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i> Get Started!</a></span>\n    </div>\n  </div>\n\n  <div class=\"index_sec9_slider\">\n    <div class=\"wrapper\">\n      <h2 class=\"happy_user_text\">Our Happy Users</h2>\n      <div class=\"flex_slider_main\">\n        <div class=\"wrapper\">\n          <section class=\"slider\">\n            <div class=\"flexslider2\">\n                <carousel class=\"slides\">\n                  <slide>\n                    <span class=\"slider_left_img\"><img src=\"../../../../assets/images/mitch-and-donna.png\" alt=\"error img\"></span>\n                    <div class=\"sec9_slider_right\">\n                      <p class=\"slider_content\">As a newly wed couple with a growing family, thank you SimplyWilled for making planning our estate so simple.</p>\n                      <h4 class=\"client_name\">Mitch & Donna</h4>\n                    </div>\n                  </slide>\n                  <slide>\n                      <span class=\"slider_left_img\"><img src=\"../../../../assets/images/mitch-and-donna.png\" alt=\"error img\"></span>\n                      <div class=\"sec9_slider_right\">\n                        <p class=\"slider_content\">As a newly wed couple with a growing family, thank you SimplyWilled for making planning our estate so simple.</p>\n                        <h4 class=\"client_name\">Mitch & Donna</h4>\n                      </div>\n                    </slide>\n                    <slide>\n                        <span class=\"slider_left_img\"><img src=\"../../../../assets/images/mitch-and-donna.png\" alt=\"error img\"></span>\n                        <div class=\"sec9_slider_right\">\n                          <p class=\"slider_content\">As a newly wed couple with a growing family, thank you SimplyWilled for making planning our estate so simple.</p>\n                          <h4 class=\"client_name\">Mitch & Donna</h4>\n                        </div>\n                      </slide>\n                </carousel>\n              <!-- <ul class=\"slides\">\n                <li>\n                  <span class=\"slider_left_img\"><img src=\"../../../../assets/images/mitch-and-donna.png\" alt=\"error img\"></span>\n                  <div class=\"sec9_slider_right\">\n                    <p class=\"slider_content\">As a newly wed couple with a growing family, thank you SimplyWilled for making planning our estate so simple.</p>\n                    <h4 class=\"client_name\">Mitch & Donna</h4>\n                  </div>\n                </li>\n                <li>\n                  <span class=\"slider_left_img\"><img src=\"../../../../assets/images/mitch-and-donna.png\" alt=\"error img\"></span>\n                  <div class=\"sec9_slider_right\">\n                    <p class=\"slider_content\">As a newly wed couple with a growing family, thank you SimplyWilled for making planning our estate so simple.</p>\n                    <h4 class=\"client_name\">Mitch & Donna</h4>\n                  </div>\n                </li>\n                <li>\n                  <span class=\"slider_left_img\"><img src=\"../../../../assets/images/mitch-and-donna.png\" alt=\"error img\"></span>\n                  <div class=\"sec9_slider_right\">\n                    <p class=\"slider_content\">As a newly wed couple with a growing family, thank you SimplyWilled for making planning our estate so simple.</p>\n                    <h4 class=\"client_name\">Mitch & Donna</h4>\n                  </div>\n                </li>\n              </ul> -->\n            </div>\n          </section>\n        </div>\n      </div>\n    </div>\n  </div>\n</div>\n\n<ng-template #viewVideo>\n  <div class=\"videoArea\">\n    <button type=\"button\" class=\"close\" (click)=\"modalRef.hide()\">×</button>\n    <div class=\"videoBox\">\n        <iframe width=\"854\" height=\"480\" src=\"https://www.youtube.com/embed/DsOpMzQ65DI\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>\n    </div>\n  </div>\n</ng-template>\n"

/***/ }),

/***/ "./src/app/user/home/home.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return HomeComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_ngx_bootstrap_modal__ = __webpack_require__("./node_modules/ngx-bootstrap/modal/index.js");
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
    function HomeComponent(modalService) {
        this.modalService = modalService;
    }
    HomeComponent.prototype.ngOnInit = function () {
    };
    HomeComponent.prototype.openModal = function (template) {
        this.modalRef = this.modalService.show(template);
    };
    HomeComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["Component"])({
            selector: 'app-home',
            template: __webpack_require__("./src/app/user/home/home.component.html"),
            styles: [__webpack_require__("./src/app/user/home/home.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1_ngx_bootstrap_modal__["a" /* BsModalService */]])
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

module.exports = "<header class=\"header_container\">\n  <div class=\"header_first_sec\">\n    <div class=\"wrapper\">\n      <a href=\"#\" class=\"logo\"><img src=\"../../../../assets/images/logo_new.png\" alt=\"logo\"></a>\n      <div class=\"menu\" (click)=\"menuOpen()\" [ngClass]=\"{'active': menutogle}\">\n        <span></span>\n        <span></span>\n        <span></span>\n      </div>\n      <div class=\"readerRight\" [ngClass]=\"{'open': menutogle}\">\n        <ul class=\"navigation\">\n          <li><a routerLink=\"/\">Home</a></li>\n          <li><a routerLink=\"/about-us\">About Us</a></li>\n          <li><a routerLink=\"/faq\">FAQ</a></li>\n          <li><a routerLink=\"/blog\">Blog</a></li>\n          <li><a routerLink=\"/sign-in\" *ngIf=\"!isLogIn\">Login</a></li>\n          <li><a routerLink=\"/dashboard\" *ngIf=\"isLogIn\">Dashboard</a></li>\n          <li (click)=\"onLogout()\"><a href=\"javascript:void(0)\" *ngIf=\"isLogIn\">Logout</a></li>\n        </ul>\n        <div class=\"searchBar\">\n          <input type=\"text\" placeholder=\"Search\">\n          <button type=\"button\"><i class=\"fa fa-search\"></i></button>\n        </div>\n        <div class=\"headerContact\">\n          <span>Need&nbsp;Help?</span>\n          1-855-965-1789\n        </div>\n        <a routerLink=\"/register\" class=\"getStarted\"><i class=\"fa fa-chevron-right\"></i>&nbsp;Get&nbsp;Started</a>\n      </div>\n\n    </div>\n  </div>\n</header>\n<router-outlet></router-outlet>\n<footer>\n  <div class=\"footer-top\">\n    <div class=\"wrapper\">\n\n      <div class=\"footerTxtArea\">\n        <div class=\"footer-logo\">\n          <a href=\"#\">\n            <img src=\"../../../../assets/images/footer-logo.png\" class=\"img-responsive\">\n          </a>\n          <p>\n            SimplyWilled is an online service that provides legal forms and legal information. We are not a law firm and are not a substitute for an atttorney's advice. Use of this website is subject to our Terms of Service, Terms of Use and Privacy Policy.\n          </p>\n        </div>\n      </div>\n      <div class=\"footerNavArea\">\n        <div class=\"footer-nav\">\n          <ul>\n            <li><a routerLink=\"/about-us\">About Us</a></li>\n            <li><a routerLink=\"/faq\">FAQ</a></li>\n            <li><a routerLink=\"/blog\">Blog</a></li>\n            <li><a routerLink=\"/sign-in\">Login</a></li>\n          </ul>\n        </div>\n        <div class=\"footer-nav\">\n          <ul>\n            <li><a href=\"#\">Terms of Use</a></li>\n            <li><a href=\"#\">Terms of Service</a></li>\n            <li><a href=\"#\">Privacy Policy</a></li>\n            <li><a href=\"#\">Contact Us</a></li>\n          </ul>\n        </div>\n      </div>\n      <div class=\"FooterRight\">\n        <div class=\"contactus\">\n          <img src=\"../../../../assets/images/icon-call.png\" class=\"img-responsive\">\n          <div class=\"footer-label\">\n            <span class=\"number\">1-(855) 965-1789 </span>\n            <span>Mon-Friday 10 A.M - 6 P.M.</span>\n          </div>\n        </div>\n        <div class=\"social\">\n          <span>Follow Us: </span>\n          <ul>\n            <li><a href=\"#\"><i class=\"fa fa-facebook\"></i></a></li>\n            <li><a href=\"#\"><i class=\"fa fa-twitter\"></i></a></li>\n            <li><a href=\"#\"><i class=\"fa fa-linkedin\"></i></a></li>\n            <li><a href=\"#\"><i class=\"fa fa-instagram\"></i></a></li>\n          </ul>\n        </div>\n      </div>\n\n    </div>\n  </div>\n  <div class=\"footer-bottom\">\n    <div class=\"wrapper\">\n      <div class=\"copyrightArea\">\n        <p class=\"copyright\">Copyright © 2017-2018 Keep It Simple, LLC. All Rights Reserved.</p>\n      </div>\n      <div class=\"footerBottomRight\">\n        <p><span>Shop With Confidence Powered by</span> <a href=\"#\"><img src=\"../../../../assets/images/paypal-btn.png\" class=\"img-responsive\"></a></p>\n      </div>\n      <div class=\"clear\"></div>\n    </div>\n  </div>\n</footer>\n<!--popup video-->\n<div class=\"blue_div\"></div>\n<div class=\"blue_video\">\n  <span class=\"blue_icone\"><i class=\"fa fa-times\" aria-hidden=\"true\"></i></span>\n  <iframe src=\"https://www.youtube.com/embed/DsOpMzQ65DI\" allowfullscreen></iframe>\n</div>\n<!--end-->\n"

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
        this.authService = authService;
        this.router = router;
    }
    FullLayoutComponent.prototype.ngOnInit = function () {
        this.isLogIn = this.authService.isAuthenticated();
        this.isLogIn = false;
        this.menutogle = false;
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

module.exports = ""

/***/ }),

/***/ "./src/app/user/privacy-policy/privacy-policy.component.html":
/***/ (function(module, exports) {

module.exports = "<p>\n  privacy-policy works!\n</p>\n"

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

module.exports = ""

/***/ }),

/***/ "./src/app/user/terms-of-service/terms-of-service.component.html":
/***/ (function(module, exports) {

module.exports = "<p>\n  terms-of-service works!\n</p>\n"

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

module.exports = ""

/***/ }),

/***/ "./src/app/user/terms-of-use/terms-of-use.component.html":
/***/ (function(module, exports) {

module.exports = "<p>\n  terms-of-use works!\n</p>\n"

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
            if (event instanceof __WEBPACK_IMPORTED_MODULE_0__angular_common_http__["e" /* HttpResponse */]) {
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
            { path: 'contact-us', pathMatch: 'full', component: __WEBPACK_IMPORTED_MODULE_8__contact_us_contact_us_component__["a" /* ContactUsComponent */] },
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
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};





























console.log('user-module is called');
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
                __WEBPACK_IMPORTED_MODULE_24_ngx_bootstrap_carousel__["a" /* CarouselModule */].forRoot()
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
                __WEBPACK_IMPORTED_MODULE_28__blog_blog_category_blog_category_component__["a" /* BlogCategoryComponent */]
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