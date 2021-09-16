/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
module.exports = __webpack_require__(12);


/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

Nova.booting(function (Vue, router, store) {
  router.addRoutes([{
    name: 'call-center',
    path: '/call-center',
    component: __webpack_require__(2)
  }]);
});

/***/ }),
/* 2 */
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(3)
}
var normalizeComponent = __webpack_require__(8)
/* script */
var __vue_script__ = __webpack_require__(9)
/* template */
var __vue_template__ = __webpack_require__(11)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/js/components/Index.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-bb962f12", Component.options)
  } else {
    hotAPI.reload("data-v-bb962f12", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(4);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(6)("283f0064", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-bb962f12\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./Index.vue", function() {
     var newContent = require("!!../../../node_modules/css-loader/index.js!../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-bb962f12\",\"scoped\":false,\"hasInlineConfig\":true}!../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./Index.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),
/* 4 */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(5)(false);
// imports


// module
exports.push([module.i, "\n.title {\n  font-size: 1.5rem;\n  font-weight: normal;\n  margin-left: 15px;\n}\n.remove {\n  margin-left: 20px;\n  color: red;\n  cursor: pointer;\n}\n", ""]);

// exports


/***/ }),
/* 5 */
/***/ (function(module, exports) {

/*
	MIT License http://www.opensource.org/licenses/mit-license.php
	Author Tobias Koppers @sokra
*/
// css base code, injected by the css-loader
module.exports = function(useSourceMap) {
	var list = [];

	// return the list of modules as css string
	list.toString = function toString() {
		return this.map(function (item) {
			var content = cssWithMappingToString(item, useSourceMap);
			if(item[2]) {
				return "@media " + item[2] + "{" + content + "}";
			} else {
				return content;
			}
		}).join("");
	};

	// import a list of modules into the list
	list.i = function(modules, mediaQuery) {
		if(typeof modules === "string")
			modules = [[null, modules, ""]];
		var alreadyImportedModules = {};
		for(var i = 0; i < this.length; i++) {
			var id = this[i][0];
			if(typeof id === "number")
				alreadyImportedModules[id] = true;
		}
		for(i = 0; i < modules.length; i++) {
			var item = modules[i];
			// skip already imported module
			// this implementation is not 100% perfect for weird media query combinations
			//  when a module is imported multiple times with different media queries.
			//  I hope this will never occur (Hey this way we have smaller bundles)
			if(typeof item[0] !== "number" || !alreadyImportedModules[item[0]]) {
				if(mediaQuery && !item[2]) {
					item[2] = mediaQuery;
				} else if(mediaQuery) {
					item[2] = "(" + item[2] + ") and (" + mediaQuery + ")";
				}
				list.push(item);
			}
		}
	};
	return list;
};

function cssWithMappingToString(item, useSourceMap) {
	var content = item[1] || '';
	var cssMapping = item[3];
	if (!cssMapping) {
		return content;
	}

	if (useSourceMap && typeof btoa === 'function') {
		var sourceMapping = toComment(cssMapping);
		var sourceURLs = cssMapping.sources.map(function (source) {
			return '/*# sourceURL=' + cssMapping.sourceRoot + source + ' */'
		});

		return [content].concat(sourceURLs).concat([sourceMapping]).join('\n');
	}

	return [content].join('\n');
}

// Adapted from convert-source-map (MIT)
function toComment(sourceMap) {
	// eslint-disable-next-line no-undef
	var base64 = btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap))));
	var data = 'sourceMappingURL=data:application/json;charset=utf-8;base64,' + base64;

	return '/*# ' + data + ' */';
}


/***/ }),
/* 6 */
/***/ (function(module, exports, __webpack_require__) {

/*
  MIT License http://www.opensource.org/licenses/mit-license.php
  Author Tobias Koppers @sokra
  Modified by Evan You @yyx990803
*/

var hasDocument = typeof document !== 'undefined'

if (typeof DEBUG !== 'undefined' && DEBUG) {
  if (!hasDocument) {
    throw new Error(
    'vue-style-loader cannot be used in a non-browser environment. ' +
    "Use { target: 'node' } in your Webpack config to indicate a server-rendering environment."
  ) }
}

var listToStyles = __webpack_require__(7)

/*
type StyleObject = {
  id: number;
  parts: Array<StyleObjectPart>
}

type StyleObjectPart = {
  css: string;
  media: string;
  sourceMap: ?string
}
*/

var stylesInDom = {/*
  [id: number]: {
    id: number,
    refs: number,
    parts: Array<(obj?: StyleObjectPart) => void>
  }
*/}

var head = hasDocument && (document.head || document.getElementsByTagName('head')[0])
var singletonElement = null
var singletonCounter = 0
var isProduction = false
var noop = function () {}
var options = null
var ssrIdKey = 'data-vue-ssr-id'

// Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
// tags it will allow on a page
var isOldIE = typeof navigator !== 'undefined' && /msie [6-9]\b/.test(navigator.userAgent.toLowerCase())

module.exports = function (parentId, list, _isProduction, _options) {
  isProduction = _isProduction

  options = _options || {}

  var styles = listToStyles(parentId, list)
  addStylesToDom(styles)

  return function update (newList) {
    var mayRemove = []
    for (var i = 0; i < styles.length; i++) {
      var item = styles[i]
      var domStyle = stylesInDom[item.id]
      domStyle.refs--
      mayRemove.push(domStyle)
    }
    if (newList) {
      styles = listToStyles(parentId, newList)
      addStylesToDom(styles)
    } else {
      styles = []
    }
    for (var i = 0; i < mayRemove.length; i++) {
      var domStyle = mayRemove[i]
      if (domStyle.refs === 0) {
        for (var j = 0; j < domStyle.parts.length; j++) {
          domStyle.parts[j]()
        }
        delete stylesInDom[domStyle.id]
      }
    }
  }
}

function addStylesToDom (styles /* Array<StyleObject> */) {
  for (var i = 0; i < styles.length; i++) {
    var item = styles[i]
    var domStyle = stylesInDom[item.id]
    if (domStyle) {
      domStyle.refs++
      for (var j = 0; j < domStyle.parts.length; j++) {
        domStyle.parts[j](item.parts[j])
      }
      for (; j < item.parts.length; j++) {
        domStyle.parts.push(addStyle(item.parts[j]))
      }
      if (domStyle.parts.length > item.parts.length) {
        domStyle.parts.length = item.parts.length
      }
    } else {
      var parts = []
      for (var j = 0; j < item.parts.length; j++) {
        parts.push(addStyle(item.parts[j]))
      }
      stylesInDom[item.id] = { id: item.id, refs: 1, parts: parts }
    }
  }
}

function createStyleElement () {
  var styleElement = document.createElement('style')
  styleElement.type = 'text/css'
  head.appendChild(styleElement)
  return styleElement
}

function addStyle (obj /* StyleObjectPart */) {
  var update, remove
  var styleElement = document.querySelector('style[' + ssrIdKey + '~="' + obj.id + '"]')

  if (styleElement) {
    if (isProduction) {
      // has SSR styles and in production mode.
      // simply do nothing.
      return noop
    } else {
      // has SSR styles but in dev mode.
      // for some reason Chrome can't handle source map in server-rendered
      // style tags - source maps in <style> only works if the style tag is
      // created and inserted dynamically. So we remove the server rendered
      // styles and inject new ones.
      styleElement.parentNode.removeChild(styleElement)
    }
  }

  if (isOldIE) {
    // use singleton mode for IE9.
    var styleIndex = singletonCounter++
    styleElement = singletonElement || (singletonElement = createStyleElement())
    update = applyToSingletonTag.bind(null, styleElement, styleIndex, false)
    remove = applyToSingletonTag.bind(null, styleElement, styleIndex, true)
  } else {
    // use multi-style-tag mode in all other cases
    styleElement = createStyleElement()
    update = applyToTag.bind(null, styleElement)
    remove = function () {
      styleElement.parentNode.removeChild(styleElement)
    }
  }

  update(obj)

  return function updateStyle (newObj /* StyleObjectPart */) {
    if (newObj) {
      if (newObj.css === obj.css &&
          newObj.media === obj.media &&
          newObj.sourceMap === obj.sourceMap) {
        return
      }
      update(obj = newObj)
    } else {
      remove()
    }
  }
}

var replaceText = (function () {
  var textStore = []

  return function (index, replacement) {
    textStore[index] = replacement
    return textStore.filter(Boolean).join('\n')
  }
})()

function applyToSingletonTag (styleElement, index, remove, obj) {
  var css = remove ? '' : obj.css

  if (styleElement.styleSheet) {
    styleElement.styleSheet.cssText = replaceText(index, css)
  } else {
    var cssNode = document.createTextNode(css)
    var childNodes = styleElement.childNodes
    if (childNodes[index]) styleElement.removeChild(childNodes[index])
    if (childNodes.length) {
      styleElement.insertBefore(cssNode, childNodes[index])
    } else {
      styleElement.appendChild(cssNode)
    }
  }
}

function applyToTag (styleElement, obj) {
  var css = obj.css
  var media = obj.media
  var sourceMap = obj.sourceMap

  if (media) {
    styleElement.setAttribute('media', media)
  }
  if (options.ssrId) {
    styleElement.setAttribute(ssrIdKey, obj.id)
  }

  if (sourceMap) {
    // https://developer.chrome.com/devtools/docs/javascript-debugging
    // this makes source maps inside style tags work properly in Chrome
    css += '\n/*# sourceURL=' + sourceMap.sources[0] + ' */'
    // http://stackoverflow.com/a/26603875
    css += '\n/*# sourceMappingURL=data:application/json;base64,' + btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))) + ' */'
  }

  if (styleElement.styleSheet) {
    styleElement.styleSheet.cssText = css
  } else {
    while (styleElement.firstChild) {
      styleElement.removeChild(styleElement.firstChild)
    }
    styleElement.appendChild(document.createTextNode(css))
  }
}


/***/ }),
/* 7 */
/***/ (function(module, exports) {

/**
 * Translates the list format produced by css-loader into something
 * easier to manipulate.
 */
module.exports = function listToStyles (parentId, list) {
  var styles = []
  var newStyles = {}
  for (var i = 0; i < list.length; i++) {
    var item = list[i]
    var id = item[0]
    var css = item[1]
    var media = item[2]
    var sourceMap = item[3]
    var part = {
      id: parentId + ':' + i,
      css: css,
      media: media,
      sourceMap: sourceMap
    }
    if (!newStyles[id]) {
      styles.push(newStyles[id] = { id: id, parts: [part] })
    } else {
      newStyles[id].parts.push(part)
    }
  }
  return styles
}


/***/ }),
/* 8 */
/***/ (function(module, exports) {

/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file.
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

module.exports = function normalizeComponent (
  rawScriptExports,
  compiledTemplate,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier /* server only */
) {
  var esModule
  var scriptExports = rawScriptExports = rawScriptExports || {}

  // ES6 modules interop
  var type = typeof rawScriptExports.default
  if (type === 'object' || type === 'function') {
    esModule = rawScriptExports
    scriptExports = rawScriptExports.default
  }

  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (compiledTemplate) {
    options.render = compiledTemplate.render
    options.staticRenderFns = compiledTemplate.staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = injectStyles
  }

  if (hook) {
    var functional = options.functional
    var existing = functional
      ? options.render
      : options.beforeCreate

    if (!functional) {
      // inject component registration as beforeCreate hook
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    } else {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functioal component in vue file
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return existing(h, context)
      }
    }
  }

  return {
    esModule: esModule,
    exports: scriptExports,
    options: options
  }
}


/***/ }),
/* 9 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__lib_Errors__ = __webpack_require__(10);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//



/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      errors: new __WEBPACK_IMPORTED_MODULE_0__lib_Errors__["a" /* default */](),
      formData: {
        confirmed: true,
        treatments: [],
        price: 0,
        delivery_price: 390.00,
        total: 0,
        user: {
          email: ''
        },
        paymentAddress: {
          same_for_delivery: true
        },
        deliveryAddress: {}
      },
      stocks: [],
      countries: [],
      products: [],
      treatments: [],
      selectedProduct: null,
      selectedTreatment: {
        data: null,
        count: 1
      },
      selectedStock: null,
      promoCode: {},
      promoCodeUsed: false
    };
  },
  mounted: function mounted() {
    var _this = this;

    Nova.request().get('api/rs/stocks').then(function (responsive) {
      return _this.stocks = responsive.data.stocks;
    });

    parseFloat(this.formData.total).toFixed(2);
  },

  methods: {
    init: function init() {
      var _this2 = this;

      Nova.request().get('api/' + this.selectedStock + '/countries').then(function (responsive) {
        return _this2.countries = responsive.data.countries;
      });
      Nova.request().get('api/' + this.selectedStock + '/products').then(function (responsive) {
        return _this2.products = responsive.data.products;
      });
      this.reset();
    },
    reset: function reset() {
      this.products = [];
      this.treatments = [];
      this.formData.user.first_name = '';
      this.formData.user.last_name = '';
      this.formData.user.email = '';
      this.formData.user.personal_title = '';
      this.formData.user.company = '';

      this.formData.paymentAddress.country = '';
      this.formData.paymentAddress.address = '';
      this.formData.paymentAddress.city = '';
      this.formData.paymentAddress.postal_code = '';
      this.formData.paymentAddress.phone = '';
      this.formData.paymentAddress.same_for_delivery = true;

      this.formData.deliveryAddress.country = '';
      this.formData.deliveryAddress.address = '';
      this.formData.deliveryAddress.city = '';
      this.formData.deliveryAddress.postal_code = '';
      this.formData.deliveryAddress.phone = '';

      this.formData.price = '';
      this.formData.delivery_price = 390.00;
      this.formData.total = '';

      this.selectedProduct = null;
    },
    submit: function submit() {
      var _this3 = this;

      Nova.request().post('api/' + this.selectedStock + '/orders', this.formData).then(function (response) {
        _this3.$router.push('resources/orders/' + response.data.order.id);
      }).catch(function (e) {
        _this3.errors.record(e.response.data.errors);
      });
    },
    getTreatments: function getTreatments() {
      var _this4 = this;

      Nova.request().get('api/' + this.selectedStock + '/' + this.selectedProduct + '/treatments').then(function (responsive) {
        return _this4.treatments = responsive.data.treatments;
      });
    },
    addTreatment: function addTreatment() {
      this.formData.treatments.push(Object.assign(this.selectedTreatment.data, {
        count: this.selectedTreatment.count
      }));
      this.calculateTreatments();
      this.selectedProduct = null;
      this.selectedTreatment.data = null;
      this.selectedTreatment.count = 1;
      this.treatments = [];
    },
    removeTreatment: function removeTreatment(index) {
      this.formData.treatments.splice(index, 1);
      this.calculateTreatments();
    },
    calculateTreatments: function calculateTreatments() {
      this.formData.price = 0;
      var total = 0;
      this.formData.treatments.forEach(function (item) {
        total = parseFloat(total) + parseFloat(item.price) * item.count;
      });
      this.formData.price = total;
    },
    result: function result(number1, number2) {
      return parseInt(number1) + parseInt(number2);
    },
    validPromoCode: function validPromoCode() {
      var _this5 = this;

      Nova.request().post('api/' + this.selectedStock + '/promo_codes', { code: this.formData.code }).then(function (response) {
        if (!_this5.promoCodeUsed) {
          _this5.promoCode = response.data.promo_code;
          _this5.promoCodeUsed = true;
        }
      }).catch(function (e) {
        _this5.errors.record(e.response.data.errors);
      });
    },
    findUser: function findUser() {
      var _this6 = this;

      Nova.request().post('nova-vendor/call-center/users', { email: this.formData.user.email }).then(function (response) {
        if (response.data.user) _this6.formData.user = response.data.user;
      }).catch(function (e) {
        _this6.errors.record(e.response.data.errors);
      });
    }
  },
  watch: {
    'formData.price': {
      handler: function handler(val) {
        this.formData.total = parseFloat(val) + parseFloat(this.formData.delivery_price);
      },

      deep: true
    },

    'formData.delivery_price': {
      handler: function handler(val) {
        this.formData.total = parseFloat(this.formData.price) + parseFloat(val);
      },

      deep: true
    }
  }
});

/***/ }),
/* 10 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Errors = function () {
  function Errors() {
    _classCallCheck(this, Errors);

    this.errors = {};
  }

  _createClass(Errors, [{
    key: "has",
    value: function has(field) {
      return Object.prototype.hasOwnProperty.call(this.errors, field);
    }
  }, {
    key: "any",
    value: function any() {
      return false;
    }
  }, {
    key: "get",
    value: function get(field) {
      if (this.errors[field]) {
        return this.errors[field][0];
      }
    }
  }, {
    key: "record",
    value: function record(errors) {
      this.errors = errors;
    }
  }, {
    key: "clear",
    value: function clear(field) {
      if (field) {
        delete this.errors[field];

        return;
      }

      this.errors = {};
    }
  }, {
    key: "empty",
    value: function empty() {
      this.errors = {};
    }
  }]);

  return Errors;
}();

/* harmony default export */ __webpack_exports__["a"] = (Errors);

/***/ }),
/* 11 */
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("heading", { staticClass: "mb-6" }, [_vm._v("Call Center")]),
      _vm._v(" "),
      _c("div", { staticClass: "relative" }, [
        _c("div", { staticClass: "mb-3" }),
        _vm._v(" "),
        _c(
          "form",
          {
            attrs: { autocomplete: "off" },
            on: {
              submit: function($event) {
                $event.preventDefault()
                return _vm.submit($event)
              }
            }
          },
          [
            _c("div", { staticClass: "mb-8" }, [
              _c("div", { staticClass: "card" }, [
                _vm._m(0),
                _vm._v(" "),
                _c(
                  "div",
                  {
                    staticClass: "flex border-b border-40 remove-bottom-border"
                  },
                  [
                    _vm._m(1),
                    _vm._v(" "),
                    _c("div", { staticClass: "py-6 px-8 w-1/2" }, [
                      _c("div", { staticClass: "flex items-center mb-3" }, [
                        _c(
                          "select",
                          {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.selectedStock,
                                expression: "selectedStock"
                              }
                            ],
                            staticClass: "form-control form-select w-full",
                            attrs: {
                              "data-testid": "shops-select",
                              dusk: "shop"
                            },
                            on: {
                              change: [
                                function($event) {
                                  var $$selectedVal = Array.prototype.filter
                                    .call($event.target.options, function(o) {
                                      return o.selected
                                    })
                                    .map(function(o) {
                                      var val =
                                        "_value" in o ? o._value : o.value
                                      return val
                                    })
                                  _vm.selectedStock = $event.target.multiple
                                    ? $$selectedVal
                                    : $$selectedVal[0]
                                },
                                _vm.init
                              ]
                            }
                          },
                          [
                            _c(
                              "option",
                              {
                                attrs: {
                                  value: "",
                                  selected: "selected",
                                  disabled: "disabled"
                                }
                              },
                              [_vm._v("—")]
                            ),
                            _vm._v(" "),
                            _vm._l(_vm.stocks, function(item, index) {
                              return _c(
                                "option",
                                {
                                  key: index,
                                  attrs: { value: "3" },
                                  domProps: { value: item.name }
                                },
                                [_vm._v(_vm._s(item.name))]
                              )
                            })
                          ],
                          2
                        )
                      ]),
                      _vm._v(" "),
                      _c("div", {
                        staticClass: "v-portal",
                        staticStyle: { display: "none" },
                        attrs: { transition: "fade-transition" }
                      }),
                      _vm._v(" "),
                      _c("div", { staticClass: "help-text help-text mt-2" })
                    ])
                  ]
                )
              ]),
              _vm._v(" "),
              _vm.selectedStock
                ? _c("div", [
                    _c("br"),
                    _vm._v(" "),
                    _c("div", { staticClass: "card" }, [
                      _vm._m(2),
                      _vm._v(" "),
                      _c("div", { staticClass: "flex border-b border-40" }, [
                        _vm._m(3),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass: "py-6 px-8 w-1/2",
                            staticStyle: { display: "flex" }
                          },
                          [
                            _c("div", { staticClass: "w-2/3" }, [
                              _c("input", {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.formData.user.email,
                                    expression: "formData.user.email"
                                  }
                                ],
                                staticClass:
                                  "w-full form-control form-input form-input-bordered",
                                class: [
                                  _vm.errors.has("user.email")
                                    ? "border-danger"
                                    : ""
                                ],
                                attrs: {
                                  id: "email",
                                  dusk: "email",
                                  list: "email-list",
                                  type: "email",
                                  placeholder: "Email"
                                },
                                domProps: { value: _vm.formData.user.email },
                                on: {
                                  input: [
                                    function($event) {
                                      if ($event.target.composing) {
                                        return
                                      }
                                      _vm.$set(
                                        _vm.formData.user,
                                        "email",
                                        $event.target.value
                                      )
                                    },
                                    function($event) {
                                      return _vm.errors.clear("user.email")
                                    }
                                  ]
                                }
                              }),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass:
                                    "help-text help-text mt-2 text-danger"
                                },
                                [
                                  _vm._v(
                                    "\n                    " +
                                      _vm._s(_vm.errors.get("user.email")) +
                                      "\n                  "
                                  )
                                ]
                              )
                            ]),
                            _vm._v(" "),
                            _c(
                              "div",
                              {
                                staticClass: "w-1/3",
                                staticStyle: {
                                  display: "flex",
                                  "justify-content": "flex-end"
                                }
                              },
                              [
                                _c(
                                  "button",
                                  {
                                    staticClass:
                                      "btn btn-default btn-primary inline-flex items-center relative",
                                    attrs: { type: "button" },
                                    on: { click: _vm.findUser }
                                  },
                                  [
                                    _c("span", {}, [
                                      _vm._v(
                                        "\n                      Find\n                  "
                                      )
                                    ])
                                  ]
                                )
                              ]
                            )
                          ]
                        )
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "flex border-b border-40" }, [
                        _vm._m(4),
                        _vm._v(" "),
                        _c("div", { staticClass: "py-6 px-8 w-1/2" }, [
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.formData.user.first_name,
                                expression: "formData.user.first_name"
                              }
                            ],
                            staticClass:
                              "w-full form-control form-input form-input-bordered",
                            class: [
                              _vm.errors.has("user.first_name")
                                ? "border-danger"
                                : ""
                            ],
                            attrs: {
                              id: "first_name",
                              dusk: "first_name",
                              list: "first_name",
                              type: "text",
                              placeholder: "First Name"
                            },
                            domProps: { value: _vm.formData.user.first_name },
                            on: {
                              input: [
                                function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.formData.user,
                                    "first_name",
                                    $event.target.value
                                  )
                                },
                                function($event) {
                                  return _vm.errors.clear("user.first_name")
                                }
                              ]
                            }
                          }),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass:
                                "help-text help-text mt-2 text-danger"
                            },
                            [
                              _vm._v(
                                "\n                  " +
                                  _vm._s(_vm.errors.get("user.first_name")) +
                                  "\n                "
                              )
                            ]
                          )
                        ])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "flex border-b border-40" }, [
                        _vm._m(5),
                        _vm._v(" "),
                        _c("div", { staticClass: "py-6 px-8 w-1/2" }, [
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.formData.user.last_name,
                                expression: "formData.user.last_name"
                              }
                            ],
                            staticClass:
                              "w-full form-control form-input form-input-bordered",
                            class: [
                              _vm.errors.has("user.last_name")
                                ? "border-danger"
                                : ""
                            ],
                            attrs: {
                              id: "last_name",
                              dusk: "last_name",
                              list: "last_name",
                              type: "text",
                              placeholder: "Last Name"
                            },
                            domProps: { value: _vm.formData.user.last_name },
                            on: {
                              input: [
                                function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.formData.user,
                                    "last_name",
                                    $event.target.value
                                  )
                                },
                                function($event) {
                                  return _vm.errors.clear("user.last_name")
                                }
                              ]
                            }
                          }),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass:
                                "help-text help-text mt-2 text-danger"
                            },
                            [
                              _vm._v(
                                "\n                  " +
                                  _vm._s(_vm.errors.get("user.last_name")) +
                                  "\n                "
                              )
                            ]
                          )
                        ])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "flex border-b border-40" }, [
                        _vm._m(6),
                        _vm._v(" "),
                        _c("div", { staticClass: "py-6 px-8 w-1/2" }, [
                          _c(
                            "select",
                            {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.formData.user.personal_title,
                                  expression: "formData.user.personal_title"
                                }
                              ],
                              staticClass: "w-full form-control form-select",
                              class: [
                                _vm.errors.has("user.personal_title")
                                  ? "border-danger"
                                  : ""
                              ],
                              attrs: {
                                id: "personal_title",
                                dusk: "personal_title"
                              },
                              on: {
                                change: [
                                  function($event) {
                                    var $$selectedVal = Array.prototype.filter
                                      .call($event.target.options, function(o) {
                                        return o.selected
                                      })
                                      .map(function(o) {
                                        var val =
                                          "_value" in o ? o._value : o.value
                                        return val
                                      })
                                    _vm.$set(
                                      _vm.formData.user,
                                      "personal_title",
                                      $event.target.multiple
                                        ? $$selectedVal
                                        : $$selectedVal[0]
                                    )
                                  },
                                  function($event) {
                                    return _vm.errors.clear(
                                      "user.personal_title"
                                    )
                                  }
                                ]
                              }
                            },
                            [
                              _c(
                                "option",
                                {
                                  attrs: {
                                    value: "",
                                    selected: "selected",
                                    disabled: "disabled"
                                  }
                                },
                                [_vm._v("Choose an option")]
                              ),
                              _vm._v(" "),
                              _c("option", { attrs: { value: "Gdin" } }, [
                                _vm._v("Gdin ")
                              ]),
                              _vm._v(" "),
                              _c("option", { attrs: { value: "Gđa" } }, [
                                _vm._v("Gđa ")
                              ])
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass:
                                "help-text help-text mt-2 text-danger"
                            },
                            [
                              _vm._v(
                                "\n                  " +
                                  _vm._s(
                                    _vm.errors.get("user.personal_title")
                                  ) +
                                  "\n                "
                              )
                            ]
                          )
                        ])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "flex border-b border-40" }, [
                        _vm._m(7),
                        _vm._v(" "),
                        _c("div", { staticClass: "py-6 px-8 w-1/2" }, [
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.formData.user.company,
                                expression: "formData.user.company"
                              }
                            ],
                            staticClass:
                              "w-full form-control form-input form-input-bordered",
                            class: [
                              _vm.errors.has("user.company")
                                ? "border-danger"
                                : ""
                            ],
                            attrs: {
                              id: "email",
                              dusk: "email",
                              list: "email-list",
                              type: "text",
                              placeholder: "Company"
                            },
                            domProps: { value: _vm.formData.user.company },
                            on: {
                              input: [
                                function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.formData.user,
                                    "company",
                                    $event.target.value
                                  )
                                },
                                function($event) {
                                  return _vm.errors.clear("user.company")
                                }
                              ]
                            }
                          }),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass:
                                "help-text help-text mt-2 text-danger"
                            },
                            [
                              _vm._v(
                                "\n                  " +
                                  _vm._s(_vm.errors.get("user.company")) +
                                  "\n                "
                              )
                            ]
                          )
                        ])
                      ])
                    ]),
                    _vm._v(" "),
                    _c("br"),
                    _vm._v(" "),
                    _c("div", { staticClass: "card" }, [
                      _vm._m(8),
                      _vm._v(" "),
                      _c("div", { staticClass: "flex border-b border-40" }, [
                        _vm._m(9),
                        _vm._v(" "),
                        _c("div", { staticClass: "py-6 px-8 w-1/2" }, [
                          _c("div", { staticClass: "flex items-center mb-3" }, [
                            _c(
                              "select",
                              {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.formData.paymentAddress.country,
                                    expression:
                                      "formData.paymentAddress.country"
                                  }
                                ],
                                staticClass: "form-control form-select w-full",
                                class: [
                                  _vm.errors.has("paymentAddress.country")
                                    ? "border-danger"
                                    : ""
                                ],
                                attrs: {
                                  "data-testid": "shops-select",
                                  dusk: "shop"
                                },
                                on: {
                                  change: function($event) {
                                    var $$selectedVal = Array.prototype.filter
                                      .call($event.target.options, function(o) {
                                        return o.selected
                                      })
                                      .map(function(o) {
                                        var val =
                                          "_value" in o ? o._value : o.value
                                        return val
                                      })
                                    _vm.$set(
                                      _vm.formData.paymentAddress,
                                      "country",
                                      $event.target.multiple
                                        ? $$selectedVal
                                        : $$selectedVal[0]
                                    )
                                  }
                                }
                              },
                              [
                                _c(
                                  "option",
                                  {
                                    attrs: {
                                      value: "",
                                      selected: "selected",
                                      disabled: "disabled"
                                    }
                                  },
                                  [_vm._v("—")]
                                ),
                                _vm._v(" "),
                                _vm._l(_vm.countries, function(item, index) {
                                  return _c(
                                    "option",
                                    {
                                      key: index,
                                      attrs: { value: "3" },
                                      domProps: { value: item.name }
                                    },
                                    [_vm._v(_vm._s(item.name) + " ")]
                                  )
                                })
                              ],
                              2
                            )
                          ]),
                          _vm._v(" "),
                          _c("div", {
                            staticClass: "v-portal",
                            staticStyle: { display: "none" },
                            attrs: { transition: "fade-transition" }
                          }),
                          _vm._v(" "),
                          _c("div", {
                            staticClass: "help-text help-text mt-2"
                          }),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass:
                                "help-text help-text mt-2 text-danger"
                            },
                            [
                              _vm._v(
                                "\n                  " +
                                  _vm._s(
                                    _vm.errors.get("paymentAddress.country")
                                  ) +
                                  "\n                "
                              )
                            ]
                          )
                        ])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "flex border-b border-40" }, [
                        _vm._m(10),
                        _vm._v(" "),
                        _c("div", { staticClass: "py-6 px-8 w-1/2" }, [
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.formData.paymentAddress.address,
                                expression: "formData.paymentAddress.address"
                              }
                            ],
                            staticClass:
                              "w-full form-control form-input form-input-bordered",
                            class: [
                              _vm.errors.has("paymentAddress.address")
                                ? "border-danger"
                                : ""
                            ],
                            attrs: {
                              id: "address",
                              dusk: "address",
                              list: "address-list",
                              type: "text",
                              placeholder: "Address"
                            },
                            domProps: {
                              value: _vm.formData.paymentAddress.address
                            },
                            on: {
                              input: [
                                function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.formData.paymentAddress,
                                    "address",
                                    $event.target.value
                                  )
                                },
                                function($event) {
                                  return _vm.errors.clear(
                                    "paymentAddress.address"
                                  )
                                }
                              ]
                            }
                          }),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass:
                                "help-text help-text mt-2 text-danger"
                            },
                            [
                              _vm._v(
                                "\n                  " +
                                  _vm._s(
                                    _vm.errors.get("paymentAddress.address")
                                  ) +
                                  "\n                "
                              )
                            ]
                          )
                        ])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "flex border-b border-40" }, [
                        _vm._m(11),
                        _vm._v(" "),
                        _c("div", { staticClass: "py-6 px-8 w-1/2" }, [
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.formData.paymentAddress.city,
                                expression: "formData.paymentAddress.city"
                              }
                            ],
                            staticClass:
                              "w-full form-control form-input form-input-bordered",
                            class: [
                              _vm.errors.has("paymentAddress.city")
                                ? "border-danger"
                                : ""
                            ],
                            attrs: {
                              id: "address",
                              dusk: "address",
                              list: "address-list",
                              type: "text",
                              placeholder: "City"
                            },
                            domProps: {
                              value: _vm.formData.paymentAddress.city
                            },
                            on: {
                              input: [
                                function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.formData.paymentAddress,
                                    "city",
                                    $event.target.value
                                  )
                                },
                                function($event) {
                                  return _vm.errors.clear("paymentAddress.city")
                                }
                              ]
                            }
                          }),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass:
                                "help-text help-text mt-2 text-danger"
                            },
                            [
                              _vm._v(
                                "\n                  " +
                                  _vm._s(
                                    _vm.errors.get("paymentAddress.city")
                                  ) +
                                  "\n                "
                              )
                            ]
                          )
                        ])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "flex border-b border-40" }, [
                        _vm._m(12),
                        _vm._v(" "),
                        _c("div", { staticClass: "py-6 px-8 w-1/2" }, [
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.formData.paymentAddress.postal_code,
                                expression:
                                  "formData.paymentAddress.postal_code"
                              }
                            ],
                            staticClass:
                              "w-full form-control form-input form-input-bordered",
                            class: [
                              _vm.errors.has("paymentAddress.postal_code")
                                ? "border-danger"
                                : ""
                            ],
                            attrs: {
                              id: "address",
                              dusk: "address",
                              list: "address-list",
                              type: "number",
                              placeholder: "Postal Code"
                            },
                            domProps: {
                              value: _vm.formData.paymentAddress.postal_code
                            },
                            on: {
                              input: [
                                function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.formData.paymentAddress,
                                    "postal_code",
                                    $event.target.value
                                  )
                                },
                                function($event) {
                                  return _vm.errors.clear(
                                    "paymentAddress.postal_code"
                                  )
                                }
                              ]
                            }
                          }),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass:
                                "help-text help-text mt-2 text-danger"
                            },
                            [
                              _vm._v(
                                "\n                  " +
                                  _vm._s(
                                    _vm.errors.get("paymentAddress.postal_code")
                                  ) +
                                  "\n                "
                              )
                            ]
                          )
                        ])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "flex border-b border-40" }, [
                        _vm._m(13),
                        _vm._v(" "),
                        _c("div", { staticClass: "py-6 px-8 w-1/2" }, [
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.formData.paymentAddress.phone,
                                expression: "formData.paymentAddress.phone"
                              }
                            ],
                            staticClass:
                              "w-full form-control form-input form-input-bordered",
                            class: [
                              _vm.errors.has("paymentAddress.phone")
                                ? "border-danger"
                                : ""
                            ],
                            attrs: {
                              id: "address",
                              dusk: "address",
                              list: "address-list",
                              type: "text",
                              placeholder: "Phone"
                            },
                            domProps: {
                              value: _vm.formData.paymentAddress.phone
                            },
                            on: {
                              input: [
                                function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.formData.paymentAddress,
                                    "phone",
                                    $event.target.value
                                  )
                                },
                                function($event) {
                                  return _vm.errors.clear(
                                    "paymentAddress.phone"
                                  )
                                }
                              ]
                            }
                          }),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass:
                                "help-text help-text mt-2 text-danger"
                            },
                            [
                              _vm._v(
                                "\n                  " +
                                  _vm._s(
                                    _vm.errors.get("paymentAddress.phone")
                                  ) +
                                  "\n                "
                              )
                            ]
                          )
                        ])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "flex border-b border-40" }, [
                        _vm._m(14),
                        _vm._v(" "),
                        _c("div", { staticClass: "py-6 px-8 w-1/2" }, [
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value:
                                  _vm.formData.paymentAddress.same_for_delivery,
                                expression:
                                  "formData.paymentAddress.same_for_delivery"
                              }
                            ],
                            staticClass: "checkbox mt-2",
                            attrs: {
                              type: "checkbox",
                              id: "same_for_delivery",
                              name: "Same For Delivery"
                            },
                            domProps: {
                              checked: Array.isArray(
                                _vm.formData.paymentAddress.same_for_delivery
                              )
                                ? _vm._i(
                                    _vm.formData.paymentAddress
                                      .same_for_delivery,
                                    null
                                  ) > -1
                                : _vm.formData.paymentAddress.same_for_delivery
                            },
                            on: {
                              change: function($event) {
                                var $$a =
                                    _vm.formData.paymentAddress
                                      .same_for_delivery,
                                  $$el = $event.target,
                                  $$c = $$el.checked ? true : false
                                if (Array.isArray($$a)) {
                                  var $$v = null,
                                    $$i = _vm._i($$a, $$v)
                                  if ($$el.checked) {
                                    $$i < 0 &&
                                      _vm.$set(
                                        _vm.formData.paymentAddress,
                                        "same_for_delivery",
                                        $$a.concat([$$v])
                                      )
                                  } else {
                                    $$i > -1 &&
                                      _vm.$set(
                                        _vm.formData.paymentAddress,
                                        "same_for_delivery",
                                        $$a
                                          .slice(0, $$i)
                                          .concat($$a.slice($$i + 1))
                                      )
                                  }
                                } else {
                                  _vm.$set(
                                    _vm.formData.paymentAddress,
                                    "same_for_delivery",
                                    $$c
                                  )
                                }
                              }
                            }
                          }),
                          _vm._v(" "),
                          _c("div", { staticClass: "help-text help-text mt-2" })
                        ])
                      ])
                    ]),
                    _vm._v(" "),
                    _c("br"),
                    _vm._v(" "),
                    !_vm.formData.paymentAddress.same_for_delivery
                      ? _c("div", { staticClass: "card" }, [
                          _vm._m(15),
                          _vm._v(" "),
                          _c(
                            "div",
                            { staticClass: "flex border-b border-40" },
                            [
                              _vm._m(16),
                              _vm._v(" "),
                              _c("div", { staticClass: "py-6 px-8 w-1/2" }, [
                                _c(
                                  "div",
                                  { staticClass: "flex items-center mb-3" },
                                  [
                                    _c(
                                      "select",
                                      {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value:
                                              _vm.formData.deliveryAddress
                                                .country,
                                            expression:
                                              "formData.deliveryAddress.country"
                                          }
                                        ],
                                        staticClass:
                                          "form-control form-select w-full",
                                        class: [
                                          _vm.errors.has(
                                            "deliveryAddress.country"
                                          )
                                            ? "border-danger"
                                            : ""
                                        ],
                                        attrs: {
                                          "data-testid": "shops-select",
                                          dusk: "shop"
                                        },
                                        on: {
                                          change: function($event) {
                                            var $$selectedVal = Array.prototype.filter
                                              .call(
                                                $event.target.options,
                                                function(o) {
                                                  return o.selected
                                                }
                                              )
                                              .map(function(o) {
                                                var val =
                                                  "_value" in o
                                                    ? o._value
                                                    : o.value
                                                return val
                                              })
                                            _vm.$set(
                                              _vm.formData.deliveryAddress,
                                              "country",
                                              $event.target.multiple
                                                ? $$selectedVal
                                                : $$selectedVal[0]
                                            )
                                          }
                                        }
                                      },
                                      [
                                        _c(
                                          "option",
                                          {
                                            attrs: {
                                              value: "",
                                              selected: "selected",
                                              disabled: "disabled"
                                            }
                                          },
                                          [_vm._v("—")]
                                        ),
                                        _vm._v(" "),
                                        _vm._l(_vm.countries, function(
                                          item,
                                          index
                                        ) {
                                          return _c(
                                            "option",
                                            {
                                              key: index,
                                              attrs: { value: "3" },
                                              domProps: { value: item.name }
                                            },
                                            [_vm._v(_vm._s(item.name) + " ")]
                                          )
                                        })
                                      ],
                                      2
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c("div", {
                                  staticClass: "v-portal",
                                  staticStyle: { display: "none" },
                                  attrs: { transition: "fade-transition" }
                                }),
                                _vm._v(" "),
                                _c("div", {
                                  staticClass: "help-text help-text mt-2"
                                }),
                                _vm._v(" "),
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "help-text help-text mt-2 text-danger"
                                  },
                                  [
                                    _vm._v(
                                      "\n                  " +
                                        _vm._s(
                                          _vm.errors.get(
                                            "deliveryAddress.country"
                                          )
                                        ) +
                                        "\n                "
                                    )
                                  ]
                                )
                              ])
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            { staticClass: "flex border-b border-40" },
                            [
                              _vm._m(17),
                              _vm._v(" "),
                              _c("div", { staticClass: "py-6 px-8 w-1/2" }, [
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value:
                                        _vm.formData.deliveryAddress.address,
                                      expression:
                                        "formData.deliveryAddress.address"
                                    }
                                  ],
                                  staticClass:
                                    "w-full form-control form-input form-input-bordered",
                                  class: [
                                    _vm.errors.has("deliveryAddress.address")
                                      ? "border-danger"
                                      : ""
                                  ],
                                  attrs: {
                                    id: "address",
                                    dusk: "address",
                                    list: "address-list",
                                    type: "text",
                                    placeholder: "Address"
                                  },
                                  domProps: {
                                    value: _vm.formData.deliveryAddress.address
                                  },
                                  on: {
                                    input: [
                                      function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.formData.deliveryAddress,
                                          "address",
                                          $event.target.value
                                        )
                                      },
                                      function($event) {
                                        return _vm.errors.clear(
                                          "deliveryAddress.address"
                                        )
                                      }
                                    ]
                                  }
                                }),
                                _vm._v(" "),
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "help-text help-text mt-2 text-danger"
                                  },
                                  [
                                    _vm._v(
                                      "\n                  " +
                                        _vm._s(
                                          _vm.errors.get(
                                            "deliveryAddress.address"
                                          )
                                        ) +
                                        "\n                "
                                    )
                                  ]
                                )
                              ])
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            { staticClass: "flex border-b border-40" },
                            [
                              _vm._m(18),
                              _vm._v(" "),
                              _c("div", { staticClass: "py-6 px-8 w-1/2" }, [
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value: _vm.formData.deliveryAddress.city,
                                      expression:
                                        "formData.deliveryAddress.city"
                                    }
                                  ],
                                  staticClass:
                                    "w-full form-control form-input form-input-bordered",
                                  class: [
                                    _vm.errors.has("deliveryAddress.city")
                                      ? "border-danger"
                                      : ""
                                  ],
                                  attrs: {
                                    id: "address",
                                    dusk: "address",
                                    list: "address-list",
                                    type: "text",
                                    placeholder: "City"
                                  },
                                  domProps: {
                                    value: _vm.formData.deliveryAddress.city
                                  },
                                  on: {
                                    input: [
                                      function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.formData.deliveryAddress,
                                          "city",
                                          $event.target.value
                                        )
                                      },
                                      function($event) {
                                        return _vm.errors.clear(
                                          "deliveryAddress.city"
                                        )
                                      }
                                    ]
                                  }
                                }),
                                _vm._v(" "),
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "help-text help-text mt-2 text-danger"
                                  },
                                  [
                                    _vm._v(
                                      "\n                  " +
                                        _vm._s(
                                          _vm.errors.get("deliveryAddress.city")
                                        ) +
                                        "\n                "
                                    )
                                  ]
                                )
                              ])
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            { staticClass: "flex border-b border-40" },
                            [
                              _vm._m(19),
                              _vm._v(" "),
                              _c("div", { staticClass: "py-6 px-8 w-1/2" }, [
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value:
                                        _vm.formData.deliveryAddress
                                          .postal_code,
                                      expression:
                                        "formData.deliveryAddress.postal_code"
                                    }
                                  ],
                                  staticClass:
                                    "w-full form-control form-input form-input-bordered",
                                  class: [
                                    _vm.errors.has(
                                      "deliveryAddress.postal_code"
                                    )
                                      ? "border-danger"
                                      : ""
                                  ],
                                  attrs: {
                                    id: "address",
                                    dusk: "address",
                                    list: "address-list",
                                    type: "number",
                                    placeholder: "Postal Code"
                                  },
                                  domProps: {
                                    value:
                                      _vm.formData.deliveryAddress.postal_code
                                  },
                                  on: {
                                    input: [
                                      function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.formData.deliveryAddress,
                                          "postal_code",
                                          $event.target.value
                                        )
                                      },
                                      function($event) {
                                        return _vm.errors.clear(
                                          "deliveryAddress.postal_code"
                                        )
                                      }
                                    ]
                                  }
                                }),
                                _vm._v(" "),
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "help-text help-text mt-2 text-danger"
                                  },
                                  [
                                    _vm._v(
                                      "\n                  " +
                                        _vm._s(
                                          _vm.errors.get(
                                            "deliveryAddress.postal_code"
                                          )
                                        ) +
                                        "\n                "
                                    )
                                  ]
                                )
                              ])
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            { staticClass: "flex border-b border-40" },
                            [
                              _vm._m(20),
                              _vm._v(" "),
                              _c("div", { staticClass: "py-6 px-8 w-1/2" }, [
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value: _vm.formData.deliveryAddress.phone,
                                      expression:
                                        "formData.deliveryAddress.phone"
                                    }
                                  ],
                                  staticClass:
                                    "w-full form-control form-input form-input-bordered",
                                  class: [
                                    _vm.errors.has("deliveryAddress.phone")
                                      ? "border-danger"
                                      : ""
                                  ],
                                  attrs: {
                                    id: "address",
                                    dusk: "address",
                                    list: "address-list",
                                    type: "text",
                                    placeholder: "Phone"
                                  },
                                  domProps: {
                                    value: _vm.formData.deliveryAddress.phone
                                  },
                                  on: {
                                    input: [
                                      function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.formData.deliveryAddress,
                                          "phone",
                                          $event.target.value
                                        )
                                      },
                                      function($event) {
                                        return _vm.errors.clear(
                                          "paymentAddress.phone"
                                        )
                                      }
                                    ]
                                  }
                                }),
                                _vm._v(" "),
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "help-text help-text mt-2 text-danger"
                                  },
                                  [
                                    _vm._v(
                                      "\n                  " +
                                        _vm._s(
                                          _vm.errors.get(
                                            "deliveryAddress.phone"
                                          )
                                        ) +
                                        "\n                "
                                    )
                                  ]
                                )
                              ])
                            ]
                          )
                        ])
                      : _vm._e(),
                    _vm._v(" "),
                    _c("div", { staticClass: "card" }, [
                      _vm._m(21),
                      _vm._v(" "),
                      _c("div", { staticClass: "flex border-b border-40" }, [
                        _vm._m(22),
                        _vm._v(" "),
                        _c("div", { staticClass: "py-6 px-8 w-1/2" }, [
                          _c(
                            "select",
                            {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.selectedProduct,
                                  expression: "selectedProduct"
                                }
                              ],
                              staticClass: "w-full form-control form-select",
                              attrs: {
                                id: "personal_title",
                                dusk: "personal_title"
                              },
                              on: {
                                change: [
                                  function($event) {
                                    var $$selectedVal = Array.prototype.filter
                                      .call($event.target.options, function(o) {
                                        return o.selected
                                      })
                                      .map(function(o) {
                                        var val =
                                          "_value" in o ? o._value : o.value
                                        return val
                                      })
                                    _vm.selectedProduct = $event.target.multiple
                                      ? $$selectedVal
                                      : $$selectedVal[0]
                                  },
                                  _vm.getTreatments
                                ]
                              }
                            },
                            [
                              _c(
                                "option",
                                {
                                  attrs: {
                                    value: "",
                                    selected: "selected",
                                    disabled: "disabled"
                                  }
                                },
                                [_vm._v("Choose an option")]
                              ),
                              _vm._v(" "),
                              _vm._l(_vm.products, function(item, index) {
                                return _c(
                                  "option",
                                  {
                                    key: index,
                                    domProps: { value: item.slug }
                                  },
                                  [_vm._v(_vm._s(item.title))]
                                )
                              })
                            ],
                            2
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass:
                                "help-text help-text mt-2 text-danger"
                            },
                            [
                              _vm._v(
                                "\n                  " +
                                  _vm._s(_vm.errors.get("product")) +
                                  "\n                "
                              )
                            ]
                          )
                        ])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "flex border-b border-40" }, [
                        _vm._m(23),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass: "py-6 px-8 w-1/2",
                            staticStyle: { display: "flex" }
                          },
                          [
                            _c("div", { staticClass: "w-2/3" }, [
                              _c(
                                "select",
                                {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value: _vm.selectedTreatment.data,
                                      expression: "selectedTreatment.data"
                                    }
                                  ],
                                  staticClass:
                                    "w-full form-control form-select",
                                  class: [
                                    _vm.errors.has("treatments")
                                      ? "border-danger"
                                      : ""
                                  ],
                                  attrs: {
                                    id: "personal_title",
                                    dusk: "personal_title"
                                  },
                                  on: {
                                    input: function($event) {
                                      return _vm.errors.clear("treatments")
                                    },
                                    change: function($event) {
                                      var $$selectedVal = Array.prototype.filter
                                        .call($event.target.options, function(
                                          o
                                        ) {
                                          return o.selected
                                        })
                                        .map(function(o) {
                                          var val =
                                            "_value" in o ? o._value : o.value
                                          return val
                                        })
                                      _vm.$set(
                                        _vm.selectedTreatment,
                                        "data",
                                        $event.target.multiple
                                          ? $$selectedVal
                                          : $$selectedVal[0]
                                      )
                                    }
                                  }
                                },
                                [
                                  _c(
                                    "option",
                                    {
                                      attrs: {
                                        value: "",
                                        selected: "selected",
                                        disabled: "disabled"
                                      }
                                    },
                                    [_vm._v("Choose an option")]
                                  ),
                                  _vm._v(" "),
                                  _vm._l(_vm.treatments, function(item, index) {
                                    return _c(
                                      "option",
                                      { key: index, domProps: { value: item } },
                                      [
                                        _vm._v(
                                          _vm._s(item.title) +
                                            " " +
                                            _vm._s(item.price)
                                        )
                                      ]
                                    )
                                  })
                                ],
                                2
                              ),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass:
                                    "help-text help-text mt-2 text-danger"
                                },
                                [
                                  _vm._v(
                                    "\n                    " +
                                      _vm._s(_vm.errors.get("treatments")) +
                                      "\n                  "
                                  )
                                ]
                              )
                            ]),
                            _vm._v(" "),
                            _c(
                              "div",
                              {
                                staticClass: "w-1/3",
                                staticStyle: {
                                  display: "flex",
                                  "justify-content": "flex-end"
                                }
                              },
                              [
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value: _vm.selectedTreatment.count,
                                      expression: "selectedTreatment.count"
                                    }
                                  ],
                                  staticClass:
                                    "w-full form-control form-input form-input-bordered",
                                  staticStyle: { margin: "0 10px" },
                                  attrs: { type: "number", min: "1" },
                                  domProps: {
                                    value: _vm.selectedTreatment.count
                                  },
                                  on: {
                                    input: function($event) {
                                      if ($event.target.composing) {
                                        return
                                      }
                                      _vm.$set(
                                        _vm.selectedTreatment,
                                        "count",
                                        $event.target.value
                                      )
                                    }
                                  }
                                }),
                                _vm._v(" "),
                                _c(
                                  "button",
                                  {
                                    staticClass:
                                      "btn btn-default btn-primary inline-flex items-center relative",
                                    attrs: {
                                      type: "button",
                                      disabled: !_vm.selectedTreatment.data
                                    },
                                    on: { click: _vm.addTreatment }
                                  },
                                  [
                                    _c("span", {}, [
                                      _vm._v(
                                        "\n                      Add\n                  "
                                      )
                                    ])
                                  ]
                                )
                              ]
                            )
                          ]
                        )
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "flex border-b border-40" }, [
                        _vm._m(24),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticStyle: {
                              width: "100%",
                              "padding-left": "2rem"
                            }
                          },
                          _vm._l(_vm.formData.treatments, function(
                            item,
                            index
                          ) {
                            return _c(
                              "div",
                              {
                                key: index,
                                staticClass: "py-6 px-8 w-1/2",
                                staticStyle: { display: "flex" }
                              },
                              [
                                _c("div", { staticClass: "w-2/3" }, [
                                  _vm._v(
                                    "\n                    " +
                                      _vm._s(item.title) +
                                      " x " +
                                      _vm._s(item.count) +
                                      "\n                  "
                                  )
                                ]),
                                _vm._v(" "),
                                _c(
                                  "div",
                                  {
                                    staticClass: "w-1/3",
                                    staticStyle: {
                                      display: "flex",
                                      "justify-content": "flex-end"
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "\n                    " +
                                        _vm._s(item.price) +
                                        "\n                  "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "a",
                                  {
                                    staticClass: "remove",
                                    on: {
                                      click: function($event) {
                                        $event.preventDefault()
                                        return _vm.removeTreatment(index)
                                      }
                                    }
                                  },
                                  [
                                    _vm._v(
                                      "\n                    ✕\n                  "
                                    )
                                  ]
                                )
                              ]
                            )
                          }),
                          0
                        )
                      ])
                    ]),
                    _vm._v(" "),
                    _c("br"),
                    _vm._v(" "),
                    _c("div", { staticClass: "card" }, [
                      _vm._m(25),
                      _vm._v(" "),
                      _c("div", { staticClass: "flex border-b border-40" }, [
                        _vm._m(26),
                        _vm._v(" "),
                        _c("div", { staticClass: "py-6 px-8 w-1/2" }, [
                          _c("div", { staticClass: "flex items-center mb-3" }, [
                            _c(
                              "select",
                              {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.formData.payment_method,
                                    expression: "formData.payment_method"
                                  }
                                ],
                                staticClass: "form-control form-select w-full",
                                class: [
                                  _vm.errors.has("payment_method")
                                    ? "border-danger"
                                    : ""
                                ],
                                attrs: {
                                  "data-testid": "shops-select",
                                  dusk: "shop"
                                },
                                on: {
                                  change: function($event) {
                                    var $$selectedVal = Array.prototype.filter
                                      .call($event.target.options, function(o) {
                                        return o.selected
                                      })
                                      .map(function(o) {
                                        var val =
                                          "_value" in o ? o._value : o.value
                                        return val
                                      })
                                    _vm.$set(
                                      _vm.formData,
                                      "payment_method",
                                      $event.target.multiple
                                        ? $$selectedVal
                                        : $$selectedVal[0]
                                    )
                                  }
                                }
                              },
                              [
                                _c(
                                  "option",
                                  {
                                    attrs: {
                                      value: "",
                                      selected: "selected",
                                      disabled: "disabled"
                                    }
                                  },
                                  [_vm._v("—")]
                                ),
                                _vm._v(" "),
                                _c("option", { attrs: { value: "CACHE" } }, [
                                  _vm._v("Cache")
                                ]),
                                _vm._v(" "),
                                _c("option", { attrs: { value: "CHECK" } }, [
                                  _vm._v("Check")
                                ])
                              ]
                            )
                          ]),
                          _vm._v(" "),
                          _c("div", {
                            staticClass: "v-portal",
                            staticStyle: { display: "none" },
                            attrs: { transition: "fade-transition" }
                          }),
                          _vm._v(" "),
                          _c("div", {
                            staticClass: "help-text help-text mt-2"
                          }),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass:
                                "help-text help-text mt-2 text-danger"
                            },
                            [
                              _vm._v(
                                "\n                  " +
                                  _vm._s(_vm.errors.get("payment_method")) +
                                  "\n                "
                              )
                            ]
                          )
                        ])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "flex border-b border-40" }, [
                        _vm._m(27),
                        _vm._v(" "),
                        _c("div", { staticClass: "py-6 px-8 w-1/2" }, [
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.formData.delivery_price,
                                expression: "formData.delivery_price"
                              }
                            ],
                            staticClass:
                              "w-full form-control form-input form-input-bordered",
                            class: [
                              _vm.errors.has("delivery_price")
                                ? "border-danger"
                                : ""
                            ],
                            attrs: {
                              id: "delivery_price",
                              dusk: "delivery_price",
                              list: "delivery_price-list",
                              type: "number",
                              placeholder: "Delivery Price",
                              min: "0",
                              step: "0.01"
                            },
                            domProps: { value: _vm.formData.delivery_price },
                            on: {
                              input: [
                                function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.formData,
                                    "delivery_price",
                                    $event.target.value
                                  )
                                },
                                function($event) {
                                  return _vm.errors.clear("delivery_price")
                                }
                              ]
                            }
                          }),
                          _vm._v(" "),
                          _c(
                            "div",
                            { staticClass: "help-text help-text mt-2" },
                            [
                              _vm._v(
                                "\n                  " +
                                  _vm._s(_vm.errors.get("delivery_price")) +
                                  "\n                "
                              )
                            ]
                          )
                        ])
                      ]),
                      _vm._v(" "),
                      _c(
                        "div",
                        {
                          staticClass: "flex border-b border-40",
                          attrs: { "resource-id": "10" }
                        },
                        [
                          _vm._m(28),
                          _vm._v(" "),
                          _c("div", { staticClass: "py-6 px-8 w-1/2" }, [
                            _c("textarea", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.formData.comment,
                                  expression: "formData.comment"
                                }
                              ],
                              staticClass:
                                "w-full form-control form-input form-input-bordered py-3 h-auto",
                              attrs: {
                                id: "comment",
                                dusk: "comment",
                                rows: "5",
                                placeholder: "Comment"
                              },
                              domProps: { value: _vm.formData.comment },
                              on: {
                                input: function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.formData,
                                    "comment",
                                    $event.target.value
                                  )
                                }
                              }
                            }),
                            _vm._v(" "),
                            _c("div", {
                              staticClass: "help-text help-text mt-2"
                            })
                          ])
                        ]
                      )
                    ]),
                    _vm._v(" "),
                    _c("br"),
                    _vm._v(" "),
                    _c("div", { staticClass: "card" }, [
                      _vm._m(29),
                      _vm._v(" "),
                      _c("div", { staticClass: "flex border-b border-40" }, [
                        _vm._m(30),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass: "py-6 px-8 w-1/2",
                            staticStyle: { display: "flex" }
                          },
                          [
                            _c("div", { staticClass: "w-2/3" }, [
                              _c("input", {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.formData.code,
                                    expression: "formData.code"
                                  }
                                ],
                                staticClass:
                                  "w-full form-control form-input form-input-bordered",
                                class: [
                                  _vm.errors.has("code") ? "border-danger" : ""
                                ],
                                attrs: {
                                  id: "delivery_price",
                                  dusk: "delivery_price",
                                  list: "delivery_price-list",
                                  type: "text",
                                  placeholder: "Promo Code"
                                },
                                domProps: { value: _vm.formData.code },
                                on: {
                                  input: [
                                    function($event) {
                                      if ($event.target.composing) {
                                        return
                                      }
                                      _vm.$set(
                                        _vm.formData,
                                        "code",
                                        $event.target.value
                                      )
                                    },
                                    function($event) {
                                      return _vm.errors.clear("code")
                                    }
                                  ]
                                }
                              }),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass:
                                    "help-text help-text mt-2 text-danger"
                                },
                                [
                                  _vm._v(
                                    "\n                    " +
                                      _vm._s(_vm.errors.get("code")) +
                                      "\n                  "
                                  )
                                ]
                              )
                            ]),
                            _vm._v(" "),
                            _c(
                              "div",
                              {
                                staticClass: "w-1/3",
                                staticStyle: {
                                  display: "flex",
                                  "justify-content": "flex-end"
                                }
                              },
                              [
                                _c(
                                  "button",
                                  {
                                    staticClass:
                                      "btn btn-default btn-primary inline-flex items-center relative",
                                    attrs: {
                                      type: "button",
                                      disabled: !_vm.formData.treatments.length
                                    },
                                    on: {
                                      click: function($event) {
                                        $event.preventDefault()
                                        return _vm.validPromoCode($event)
                                      }
                                    }
                                  },
                                  [
                                    _c("span", {}, [
                                      _vm._v(
                                        "\n                      Use\n                  "
                                      )
                                    ])
                                  ]
                                )
                              ]
                            )
                          ]
                        )
                      ])
                    ]),
                    _vm._v(" "),
                    _c("br"),
                    _vm._v(" "),
                    _c("div", { staticClass: "card" }, [
                      _vm._m(31),
                      _vm._v(" "),
                      _c("div", { staticClass: "flex border-b border-40" }, [
                        _vm._m(32),
                        _vm._v(" "),
                        _c("div", { staticClass: "py-6 px-8 w-1/2" }, [
                          _vm.formData.total
                            ? _c(
                                "p",
                                {
                                  staticClass: "w-full form-control",
                                  attrs: {
                                    id: "total",
                                    dusk: "total",
                                    list: "total-list",
                                    placeholder: "Total"
                                  }
                                },
                                [
                                  _vm._v(
                                    _vm._s(
                                      parseFloat(_vm.formData.price).toFixed(2)
                                    )
                                  )
                                ]
                              )
                            : _vm._e()
                        ])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "flex border-b border-40" }, [
                        _vm._m(33),
                        _vm._v(" "),
                        _c("div", { staticClass: "py-6 px-8 w-1/2" }, [
                          _vm.formData.delivery_price
                            ? _c(
                                "p",
                                {
                                  staticClass: "w-full form-control",
                                  attrs: {
                                    id: "total",
                                    dusk: "total",
                                    list: "total-list",
                                    placeholder: "Total"
                                  }
                                },
                                [
                                  _vm._v(
                                    _vm._s(
                                      parseFloat(
                                        _vm.formData.delivery_price
                                      ).toFixed(2)
                                    )
                                  )
                                ]
                              )
                            : _vm._e()
                        ])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "flex border-b border-40" }, [
                        _vm._m(34),
                        _vm._v(" "),
                        _c("div", { staticClass: "py-6 px-8 w-1/2" }, [
                          _vm.formData.total
                            ? _c(
                                "p",
                                {
                                  staticClass: "w-full form-control",
                                  attrs: {
                                    dusk: "total",
                                    list: "total-list",
                                    placeholder: "Total"
                                  }
                                },
                                [
                                  !_vm.promoCodeUsed
                                    ? _c("span", [
                                        _vm._v(
                                          _vm._s(
                                            parseFloat(
                                              _vm.formData.total
                                            ).toFixed(2)
                                          )
                                        )
                                      ])
                                    : _c("span", [
                                        _vm.promoCode.type === "PERCENT"
                                          ? _c("span", [
                                              _vm._v(
                                                "\n                      " +
                                                  _vm._s(
                                                    parseFloat(
                                                      _vm.formData.total -
                                                        (_vm.formData.total /
                                                          100) *
                                                          _vm.promoCode.value
                                                    ).toFixed(2)
                                                  ) +
                                                  "\n                      (" +
                                                  _vm._s(
                                                    parseFloat(
                                                      _vm.formData.total
                                                    ).toFixed(2)
                                                  ) +
                                                  " - " +
                                                  _vm._s(_vm.promoCode.value) +
                                                  "%)"
                                              )
                                            ])
                                          : _c("span", [
                                              _vm._v(
                                                "\n                      " +
                                                  _vm._s(
                                                    parseFloat(
                                                      _vm.formData.total -
                                                        _vm.promoCode.value
                                                    ).toFixed(2)
                                                  ) +
                                                  "\n                      (" +
                                                  _vm._s(
                                                    parseFloat(
                                                      _vm.formData.total
                                                    ).toFixed(2)
                                                  ) +
                                                  " - " +
                                                  _vm._s(_vm.promoCode.value) +
                                                  ")\n                    "
                                              )
                                            ])
                                      ])
                                ]
                              )
                            : _vm._e()
                        ])
                      ])
                    ])
                  ])
                : _vm._e()
            ]),
            _vm._v(" "),
            _vm.selectedStock
              ? _c("div", { staticClass: "flex items-center" }, [_vm._m(35)])
              : _vm._e()
          ]
        )
      ])
    ],
    1
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticClass: "flex items-center py-3 border-b border-50" },
      [
        _c("div", { staticClass: "flex items-center" }, [
          _c("div", { staticClass: "px-3" }, [
            _c("h1", { staticClass: "title" }, [_vm._v("Stock")])
          ])
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "w-1/5 px-8 py-6" }, [
      _c(
        "label",
        {
          staticClass: "inline-block text-80 pt-2 leading-tight",
          attrs: { for: "shop" }
        },
        [
          _vm._v("\n                Stock\n\n                "),
          _c("span", { staticClass: "text-danger text-sm" }, [_vm._v("*")])
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticClass: "flex items-center py-3 border-b border-50" },
      [
        _c("div", { staticClass: "flex items-center" }, [
          _c("div", { staticClass: "px-3" }, [
            _c("h1", { staticClass: "title" }, [_vm._v("User")])
          ])
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "w-1/5 px-8 py-6" }, [
      _c(
        "label",
        {
          staticClass: "inline-block text-80 pt-2 leading-tight",
          attrs: { for: "personal_title" }
        },
        [
          _vm._v("\n                  Email\n\n                  "),
          _c("span", { staticClass: "text-danger text-sm" }, [_vm._v("*")])
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "w-1/5 px-8 py-6" }, [
      _c(
        "label",
        {
          staticClass: "inline-block text-80 pt-2 leading-tight",
          attrs: { for: "first_name" }
        },
        [
          _vm._v("\n                  First Name\n\n                  "),
          _c("span", { staticClass: "text-danger text-sm" }, [_vm._v("*")])
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "w-1/5 px-8 py-6" }, [
      _c(
        "label",
        {
          staticClass: "inline-block text-80 pt-2 leading-tight",
          attrs: { for: "last_name" }
        },
        [
          _vm._v("\n                  Last Name\n\n                  "),
          _c("span", { staticClass: "text-danger text-sm" }, [_vm._v("*")])
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "w-1/5 px-8 py-6" }, [
      _c(
        "label",
        {
          staticClass: "inline-block text-80 pt-2 leading-tight",
          attrs: { for: "personal_title" }
        },
        [
          _vm._v("\n                  Personal Title\n\n                  "),
          _c("span", { staticClass: "text-danger text-sm" }, [_vm._v("*")])
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "w-1/5 px-8 py-6" }, [
      _c(
        "label",
        {
          staticClass: "inline-block text-80 pt-2 leading-tight",
          attrs: { for: "email" }
        },
        [_vm._v("\n                  Company\n                ")]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticClass: "flex items-center py-3 border-b border-50" },
      [
        _c("div", { staticClass: "flex items-center" }, [
          _c("div", { staticClass: "px-3" }, [
            _c("h1", { staticClass: "title" }, [_vm._v("Payment Address")])
          ])
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "w-1/5 px-8 py-6" }, [
      _c(
        "label",
        {
          staticClass: "inline-block text-80 pt-2 leading-tight",
          attrs: { for: "shop" }
        },
        [
          _vm._v("\n                  Country\n\n                  "),
          _c("span", { staticClass: "text-danger text-sm" }, [_vm._v("*")])
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "w-1/5 px-8 py-6" }, [
      _c(
        "label",
        {
          staticClass: "inline-block text-80 pt-2 leading-tight",
          attrs: { for: "first_name" }
        },
        [
          _vm._v("\n                  Address\n\n                  "),
          _c("span", { staticClass: "text-danger text-sm" }, [_vm._v("*")])
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "w-1/5 px-8 py-6" }, [
      _c(
        "label",
        {
          staticClass: "inline-block text-80 pt-2 leading-tight",
          attrs: { for: "first_name" }
        },
        [
          _vm._v("\n                  City\n\n                  "),
          _c("span", { staticClass: "text-danger text-sm" }, [_vm._v("*")])
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "w-1/5 px-8 py-6" }, [
      _c(
        "label",
        {
          staticClass: "inline-block text-80 pt-2 leading-tight",
          attrs: { for: "first_name" }
        },
        [
          _vm._v("\n                  Postal Code\n\n                  "),
          _c("span", { staticClass: "text-danger text-sm" }, [_vm._v("*")])
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "w-1/5 px-8 py-6" }, [
      _c(
        "label",
        {
          staticClass: "inline-block text-80 pt-2 leading-tight",
          attrs: { for: "first_name" }
        },
        [
          _vm._v("\n                  Phone\n\n                  "),
          _c("span", { staticClass: "text-danger text-sm" }, [_vm._v("*")])
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "w-1/5 px-8 py-6" }, [
      _c(
        "label",
        {
          staticClass: "inline-block text-80 pt-2 leading-tight",
          attrs: { for: "same_for_delivery" }
        },
        [
          _vm._v("\n                  Same For Delivery\n\n                  "),
          _c("span", { staticClass: "text-danger text-sm" }, [_vm._v("*")])
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticClass: "flex items-center py-3 border-b border-50" },
      [
        _c("div", { staticClass: "flex items-center" }, [
          _c("div", { staticClass: "px-3" }, [
            _c("h1", { staticClass: "title" }, [_vm._v("Delivery Address")])
          ])
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "w-1/5 px-8 py-6" }, [
      _c(
        "label",
        {
          staticClass: "inline-block text-80 pt-2 leading-tight",
          attrs: { for: "shop" }
        },
        [
          _vm._v("\n                  Country\n\n                  "),
          _c("span", { staticClass: "text-danger text-sm" }, [_vm._v("*")])
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "w-1/5 px-8 py-6" }, [
      _c(
        "label",
        {
          staticClass: "inline-block text-80 pt-2 leading-tight",
          attrs: { for: "first_name" }
        },
        [
          _vm._v("\n                  Address\n\n                  "),
          _c("span", { staticClass: "text-danger text-sm" }, [_vm._v("*")])
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "w-1/5 px-8 py-6" }, [
      _c(
        "label",
        {
          staticClass: "inline-block text-80 pt-2 leading-tight",
          attrs: { for: "first_name" }
        },
        [
          _vm._v("\n                  City\n\n                  "),
          _c("span", { staticClass: "text-danger text-sm" }, [_vm._v("*")])
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "w-1/5 px-8 py-6" }, [
      _c(
        "label",
        {
          staticClass: "inline-block text-80 pt-2 leading-tight",
          attrs: { for: "first_name" }
        },
        [
          _vm._v("\n                  Postal Code\n\n                  "),
          _c("span", { staticClass: "text-danger text-sm" }, [_vm._v("*")])
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "w-1/5 px-8 py-6" }, [
      _c(
        "label",
        {
          staticClass: "inline-block text-80 pt-2 leading-tight",
          attrs: { for: "first_name" }
        },
        [
          _vm._v("\n                  Phone\n\n                  "),
          _c("span", { staticClass: "text-danger text-sm" }, [_vm._v("*")])
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticClass: "flex items-center py-3 border-b border-50" },
      [
        _c("div", { staticClass: "flex items-center" }, [
          _c("div", { staticClass: "px-3" }, [
            _c("h1", { staticClass: "title" }, [_vm._v("Products")])
          ])
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "w-1/5 px-8 py-6" }, [
      _c(
        "label",
        {
          staticClass: "inline-block text-80 pt-2 leading-tight",
          attrs: { for: "personal_title" }
        },
        [
          _vm._v("\n                  Product\n\n                  "),
          _c("span", { staticClass: "text-danger text-sm" }, [_vm._v("*")])
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "w-1/5 px-8 py-6" }, [
      _c(
        "label",
        {
          staticClass: "inline-block text-80 pt-2 leading-tight",
          attrs: { for: "personal_title" }
        },
        [
          _vm._v("\n                  Treatments\n\n                  "),
          _c("span", { staticClass: "text-danger text-sm" }, [_vm._v("*")])
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "w-1/5 px-8 py-6" }, [
      _c(
        "label",
        {
          staticClass: "inline-block text-80 pt-2 leading-tight",
          attrs: { for: "personal_title" }
        },
        [
          _vm._v("\n                  Cart\n\n                  "),
          _c("span", { staticClass: "text-danger text-sm" }, [_vm._v("*")])
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticClass: "flex items-center py-3 border-b border-50" },
      [
        _c("div", { staticClass: "flex items-center" }, [
          _c("div", { staticClass: "px-3" }, [
            _c("h1", { staticClass: "title" }, [_vm._v("Order")])
          ])
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "w-1/5 px-8 py-6" }, [
      _c(
        "label",
        {
          staticClass: "inline-block text-80 pt-2 leading-tight",
          attrs: { for: "shop" }
        },
        [
          _vm._v("\n                  Payment Method\n\n                  "),
          _c("span", { staticClass: "text-danger text-sm" }, [_vm._v("*")])
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "w-1/5 px-8 py-6" }, [
      _c(
        "label",
        {
          staticClass: "inline-block text-80 pt-2 leading-tight",
          attrs: { for: "delivery_price" }
        },
        [
          _vm._v("\n                  Delivery Price\n\n                  "),
          _c("span", { staticClass: "text-danger text-sm" }, [_vm._v("*")])
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "w-1/5 px-8 py-6" }, [
      _c(
        "label",
        {
          staticClass: "inline-block text-80 pt-2 leading-tight",
          attrs: { for: "comment" }
        },
        [_vm._v("\n                  Comment\n\n                  ")]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticClass: "flex items-center py-3 border-b border-50" },
      [
        _c("div", { staticClass: "flex items-center" }, [
          _c("div", { staticClass: "px-3" }, [
            _c("h1", { staticClass: "title" }, [_vm._v("Promo Code")])
          ])
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "w-1/5 px-8 py-6" }, [
      _c(
        "label",
        {
          staticClass: "inline-block text-80 pt-2 leading-tight",
          attrs: { for: "personal_title" }
        },
        [
          _vm._v("\n                  Promo Code\n\n                  "),
          _c("span", { staticClass: "text-danger text-sm" }, [_vm._v("*")])
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticClass: "flex items-center py-3 border-b border-50" },
      [
        _c("div", { staticClass: "flex items-center" }, [
          _c("div", { staticClass: "px-3" }, [
            _c("h1", { staticClass: "title" }, [_vm._v("Final")])
          ])
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "w-1/5 px-8 py-6" }, [
      _c(
        "label",
        {
          staticClass: "inline-block text-80 pt-2 leading-tight",
          attrs: { for: "total" }
        },
        [_vm._v("\n                  Total\n                ")]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "w-1/5 px-8 py-6" }, [
      _c(
        "label",
        {
          staticClass: "inline-block text-80 pt-2 leading-tight",
          attrs: { for: "total" }
        },
        [_vm._v("\n                  Delivery Price\n                ")]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "w-1/5 px-8 py-6" }, [
      _c(
        "label",
        {
          staticClass: "inline-block text-80 pt-2 leading-tight",
          attrs: { for: "total" }
        },
        [_vm._v("\n                  Final\n                ")]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "button",
      {
        staticClass:
          "btn btn-default btn-primary inline-flex items-center relative",
        attrs: { type: "submit", dusk: "create-button" }
      },
      [
        _c("span", {}, [
          _vm._v("\n                      Create Order\n                  ")
        ])
      ]
    )
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-bb962f12", module.exports)
  }
}

/***/ }),
/* 12 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);