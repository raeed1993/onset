/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ (() => {

var dir = $("html").attr("dir");
/* Container Offsets */

var containerLeftOffest = $(".container").offset().left;

if (dir === "rtl") {
  $(".container-left").css("margin-right", containerLeftOffest + "px");
  $(".container-right").css("margin-left", containerLeftOffest + "px");
} else {
  $(".container-left").css("margin-left", containerLeftOffest + "px");
  $(".container-right").css("margin-right", containerLeftOffest + "px");
}

var swiper = new Swiper(".swiper-header", {
  pagination: {
    el: ".swiper-pagination",
    clickable: true
  }
});
var swiper = new Swiper(".swiper-services", {
  slidesPerView: 1,
  spaceBetween: 50,
  pagination: {
    el: ".swiper-pagination",
    clickable: true
  },
  breakpoints: {
    576: {
      slidesPerView: 1,
      spaceBetween: 50
    },
    640: {
      slidesPerView: 2,
      spaceBetween: 20
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 40
    },
    992: {
      slidesPerView: 4,
      spaceBetween: 50
    },
    1400: {
      slidesPerView: 5,
      spaceBetween: 50
    }
  }
});
var swiper = new Swiper(".swiper-partners", {
  slidesPerView: 1,
  spaceBetween: 30,
  pagination: {
    el: ".swiper-pagination",
    clickable: true
  },
  breakpoints: {
    768: {
      slidesPerView: 2,
      spaceBetween: 50
    },
    992: {
      slidesPerView: 3,
      spaceBetween: 50
    },
    1400: {
      slidesPerView: 4,
      spaceBetween: 50
    }
  }
});
var swiper = new Swiper(".swiper-customer", {
  pagination: {
    el: ".swiper-pagination",
    clickable: true
  },
  breakpoints: {
    992: {
      slidesPerView: 1,
      spaceBetween: 50
    },
    1400: {
      slidesPerView: 2,
      spaceBetween: 50
    }
  }
});
var swiper = new Swiper(".business-mobile", {
  pagination: {
    el: ".swiper-pagination",
    clickable: true
  },
  breakpoints: {
    576: {
      slidesPerView: 1,
      spaceBetween: 20
    }
  }
});
var swiper = new Swiper(".swiper-business", {
  slidesPerView: 3,
  grid: {
    rows: 3
  },
  spaceBetween: 30,
  pagination: {
    el: ".swiper-pagination",
    clickable: true
  }
});
jQuery(document).ready(function ($) {
  window.onscroll = function () {
    var scroll = window.scrollY;
    fixedMenu(scroll);
  };

  function fixedMenu(scroll) {
    var headerScroll = document.querySelector(".navbar");
    var documentBody = document.querySelector("body");

    if (scroll > 300) {
      documentBody.classList.add("ft");
      headerScroll.classList.add("fixed-top");
    } else {
      documentBody.classList.remove("ft");
      headerScroll.classList.remove("fixed-top");
    }
  }
});
$("#mobile_nav_toggler").click(function () {
  $("body").addClass("overflow-hidden");
  $("#page_overlay").fadeIn(); // $("#page_overlay").addClass("d-block");

  $("#mobile_nav").addClass("nav-open");
  $("#mobile_nav").removeClass("nav-close");
});
$("#mobile_nav_close").click(function () {
  $("body").removeClass("overflow-hidden"); // $("#page_overlay").addClass("d-none");

  $("#page_overlay").fadeOut();
  $("#mobile_nav").addClass("nav-close");
  $("#mobile_nav").removeClass("nav-open");
});
$("#page_overlay").click(function () {
  $("body").removeClass("overflow-hidden"); // $("#page_overlay").addClass("d-none");

  $("#page_overlay").fadeOut();
  $("#mobile_nav").addClass("nav-close");
  $("#mobile_nav").removeClass("nav-open");
});

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


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
/******/ 			"/js/app": 0,
/******/ 			"css/app": 0
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
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/sass/app.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;