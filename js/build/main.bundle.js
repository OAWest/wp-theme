webpackJsonp([0],[
/* 0 */
/***/ function(module, exports, __webpack_require__) {

	/// <reference path="../../../typings/index.d.ts" />
	/// <reference path="./interfaces.ts" />
	"use strict";
	var grid_1 = __webpack_require__(1);
	//start angular application
	angular.element(document).ready(function () {
	    //module name
	    var MODULE_NAME = "org.western.oa-bsa";
	    //define array of angular module names
	    var requires = [];
	    //create modules
	    new grid_1.Grid();
	    //wire up modules
	    angular.module(MODULE_NAME, [
	        grid_1.Grid.CLASS_NAME
	    ]);
	    //bootstrap the application
	    angular.bootstrap(document, [MODULE_NAME], {
	        "strictDi": true
	    });
	});


/***/ },
/* 1 */
/***/ function(module, exports, __webpack_require__) {

	/// <amd-dependency path="bootstrap-sass" />
	"use strict";
	var grid_directive_1 = __webpack_require__(2);
	/**
	 * The org.western.oa-bsa.grid.Grid angular module.
	 *
	 * @class Grid
	 */
	var Grid = (function () {
	    /**
	     * Create the module and the necessary controllers, directives, factories, services, etc.
	     *
	     * @class Module
	     * @constructor
	     */
	    function Grid() {
	        //log
	        console.log("[Grid:constructor] Initializing Grid");
	        //initialize module, services, controllers and directives
	        this.create().directives();
	    }
	    /**
	     * Create the module.
	     *
	     * @class Module
	     * @method create
	     * @return {wr.IModule} Self for chaining.
	     */
	    Grid.prototype.create = function () {
	        //log
	        console.log("[Grid:create] Creating module \"" + Grid.CLASS_NAME + "\"");
	        //create module
	        this.app = angular.module(Grid.CLASS_NAME, []);
	        return this;
	    };
	    /**
	    * Create the directives.
	    *
	    * @class Module
	    * @method directives
	    * @return {wr.IModule} Self for chaining.
	    */
	    Grid.prototype.directives = function () {
	        console.log("[Grid:directives] Creating GridDirective");
	        this.app.directive("isotopeGrid", grid_directive_1.GridDirective.Factory());
	        return this;
	    };
	    Grid.CLASS_NAME = "org.western.oa-bsa.grid.Grid";
	    return Grid;
	}());
	exports.Grid = Grid;


/***/ },
/* 2 */
/***/ function(module, exports) {

	"use strict";
	/**
	 * The isotope-grid directive.
	 *
	 * @class GridDirective
	 */
	var GridDirective = (function () {
	    function GridDirective() {
	        this.restrict = "A";
	        /**
	         * The link function is responsible for registering DOM listeners as well as updating the DOM.
	         *
	         * @class GridDirective
	         * @method link
	         * @param scope {ng.IScope} The scope for this directive
	         * @param element {ng.IAugmentedJQuery} The JQuery instance members object.
	         * @param attributes {ng.IAttributes} An object containing normalized DOM element attributes.
	         * @param gridController {GridController} An instance of the controller.
	         */
	        this.link = function (scope, element, attributes) {
	            //set the options for the grid
	            var options = {
	                itemSelector: ".grid-item",
	                percentPosition: true
	            };
	            //load the isotope package
	            $(element).isotope(options);
	        };
	    }
	    /**
	     * Create the directive.
	     *
	     * @class GridDirective
	     * @method Factory
	     * @static
	     * @return {ng.IDirectiveFactory} A function to create the directive.
	     */
	    GridDirective.Factory = function () {
	        return function () { return new GridDirective(); };
	    };
	    return GridDirective;
	}());
	exports.GridDirective = GridDirective;


/***/ }
]);
//# sourceMappingURL=main.bundle.js.map