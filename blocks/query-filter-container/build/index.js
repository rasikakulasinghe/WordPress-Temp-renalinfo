/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./blocks/query-filter-container/block.json":
/*!**************************************************!*\
  !*** ./blocks/query-filter-container/block.json ***!
  \**************************************************/
/***/ ((module) => {

module.exports = /*#__PURE__*/JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":3,"name":"renalinfolk/query-filter-container","version":"1.0.0","title":"Query Filter Container","category":"widgets","icon":"filter","description":"Adds a collapsible filter toolbar for Query Loop blocks with search, sort, taxonomy, date range, and author filters.","keywords":["filter","search","query","sort","taxonomy"],"textdomain":"renalinfolk","supports":{"html":false,"align":["wide","full"],"spacing":{"margin":true,"padding":true}},"attributes":{"showSearch":{"type":"boolean","default":true},"showSortOrder":{"type":"boolean","default":true},"showDate":{"type":"boolean","default":false},"showTaxonomy":{"type":"boolean","default":true},"targetTaxonomy":{"type":"string","default":"category"},"showAuthor":{"type":"boolean","default":false},"toggleLabel":{"type":"string","default":"Filter & Sort"}},"editorScript":"file:./build/index.js","viewScript":"file:./build/view.js","style":"file:./build/style-index.css","editorStyle":"file:./build/index.css","render":"file:./render.php"}');

/***/ }),

/***/ "./blocks/query-filter-container/src/edit.js":
/*!***************************************************!*\
  !*** ./blocks/query-filter-container/src/edit.js ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Edit)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _editor_scss__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./editor.scss */ "./blocks/query-filter-container/src/editor.scss");





function Edit({
  attributes,
  setAttributes
}) {
  const {
    showSearch,
    showSortOrder,
    showDate,
    showTaxonomy,
    targetTaxonomy,
    showAuthor,
    toggleLabel
  } = attributes;
  const blockProps = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.useBlockProps)({
    className: 'renalinfolk-query-filter-preview'
  });
  const activeFilters = [];
  if (showSearch) activeFilters.push((0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Search', 'renalinfolk'));
  if (showSortOrder) activeFilters.push((0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Sort Order', 'renalinfolk'));
  if (showDate) activeFilters.push((0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Date Range', 'renalinfolk'));
  if (showTaxonomy) {
    const taxonomyName = targetTaxonomy === 'category' ? (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Categories', 'renalinfolk') : (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Tags', 'renalinfolk');
    activeFilters.push(`${(0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Taxonomy', 'renalinfolk')} (${taxonomyName})`);
  }
  if (showAuthor) activeFilters.push((0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Author', 'renalinfolk'));
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Filter Settings', 'renalinfolk'),
    initialOpen: true
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Enable Search', 'renalinfolk'),
    checked: showSearch,
    onChange: value => setAttributes({
      showSearch: value
    }),
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Allow visitors to search posts by keyword', 'renalinfolk')
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Enable Sort Order', 'renalinfolk'),
    checked: showSortOrder,
    onChange: value => setAttributes({
      showSortOrder: value
    }),
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Allow visitors to sort posts by date or title', 'renalinfolk')
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Enable Date Range', 'renalinfolk'),
    checked: showDate,
    onChange: value => setAttributes({
      showDate: value
    }),
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Allow visitors to filter by date range', 'renalinfolk')
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Enable Taxonomy Filter', 'renalinfolk'),
    checked: showTaxonomy,
    onChange: value => setAttributes({
      showTaxonomy: value
    }),
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Allow visitors to filter by category or tag', 'renalinfolk')
  }), showTaxonomy && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Select Taxonomy', 'renalinfolk'),
    value: targetTaxonomy,
    options: [{
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Categories', 'renalinfolk'),
      value: 'category'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Tags', 'renalinfolk'),
      value: 'post_tag'
    }],
    onChange: value => setAttributes({
      targetTaxonomy: value
    }),
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Choose which taxonomy to display', 'renalinfolk')
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Enable Author Filter', 'renalinfolk'),
    checked: showAuthor,
    onChange: value => setAttributes({
      showAuthor: value
    }),
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Allow visitors to filter by author', 'renalinfolk')
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TextControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Filter Toggle Button Label', 'renalinfolk'),
    value: toggleLabel,
    onChange: value => setAttributes({
      toggleLabel: value
    }),
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Custom label for the filter toggle button', 'renalinfolk')
  }))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    ...blockProps
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "renalinfolk-query-filter-preview__header"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    className: "renalinfolk-query-filter-preview__icon"
  }, "\u2699\uFE0F"), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("h3", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Query Filter Container', 'renalinfolk'))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "renalinfolk-query-filter-preview__content"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("strong", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Toggle Label:', 'renalinfolk')), " ", toggleLabel || (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Filter & Sort', 'renalinfolk')), activeFilters.length > 0 ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("strong", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Active Filters:', 'renalinfolk'))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("ul", null, activeFilters.map((filter, index) => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("li", {
    key: index
  }, filter)))) : (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("em", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('No filters enabled. Use the sidebar to configure filters.', 'renalinfolk')))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "renalinfolk-query-filter-preview__note"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('This block will display a collapsible filter toolbar on the frontend.', 'renalinfolk'))));
}

/***/ }),

/***/ "./blocks/query-filter-container/src/editor.scss":
/*!*******************************************************!*\
  !*** ./blocks/query-filter-container/src/editor.scss ***!
  \*******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./blocks/query-filter-container/src/index.js":
/*!****************************************************!*\
  !*** ./blocks/query-filter-container/src/index.js ***!
  \****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./style.scss */ "./blocks/query-filter-container/src/style.scss");
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./edit */ "./blocks/query-filter-container/src/edit.js");
/* harmony import */ var _save__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./save */ "./blocks/query-filter-container/src/save.js");
/* harmony import */ var _block_json__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../block.json */ "./blocks/query-filter-container/block.json");





(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__.registerBlockType)(_block_json__WEBPACK_IMPORTED_MODULE_4__.name, {
  edit: _edit__WEBPACK_IMPORTED_MODULE_2__["default"],
  save: _save__WEBPACK_IMPORTED_MODULE_3__["default"]
});

/***/ }),

/***/ "./blocks/query-filter-container/src/save.js":
/*!***************************************************!*\
  !*** ./blocks/query-filter-container/src/save.js ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ save)
/* harmony export */ });
function save() {
  // Dynamic block renders via render.php
  return null;
}

/***/ }),

/***/ "./blocks/query-filter-container/src/style.scss":
/*!******************************************************!*\
  !*** ./blocks/query-filter-container/src/style.scss ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/***/ ((module) => {

module.exports = window["wp"]["blockEditor"];

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/***/ ((module) => {

module.exports = window["wp"]["blocks"];

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ ((module) => {

module.exports = window["wp"]["components"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ ((module) => {

module.exports = window["wp"]["i18n"];

/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/***/ ((module) => {

module.exports = window["React"];

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"index": 0,
/******/ 			"./style-index": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = globalThis["webpackChunkrenalinfolk"] = globalThis["webpackChunkrenalinfolk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["./style-index"], () => (__webpack_require__("./blocks/query-filter-container/src/index.js")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
//# sourceMappingURL=index.js.map