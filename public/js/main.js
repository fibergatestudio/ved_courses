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
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/main.js":
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function () {
  var burgerButton = document.querySelector('.menu_burger');
  var burgerButtonClone = document.querySelector('.menu_burger-clone');
  var burgerMenu = document.querySelector('.menu_title-wrapper');
  burgerButton.addEventListener('click', burgerClass);
  burgerButtonClone.addEventListener('click', burgerClass);

  function burgerClass() {
    burgerButton.classList.toggle('active');
    burgerButtonClone.classList.toggle('active');
    burgerMenu.classList.toggle('active');
  }

  ;
})();

(function () {
  var accTop = document.querySelectorAll('.main-menu_inner');
  var i;

  for (i = 0; i < accTop.length; i++) {
    accTop[i].addEventListener('click', func);
  }

  ;

  function func() {
    accTop.forEach(function (i) {
      if (i.classList.contains('active')) {
        i.classList.remove('active');
      }
    });
    this.classList.add('active');
  }

  ;
})();

(function () {
  var acc = document.querySelectorAll('.programs-item_btn');
  var i;

  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener('click', func);
  }

  ;

  function func() {
    this.classList.toggle('active');

    if (this.classList.contains('active')) {
      this.firstChild.innerHTML = 'Згорнути';
    } else {
      this.firstChild.innerHTML = 'Переглянути все';
    }

    ;
    this.parentNode.nextElementSibling.classList.toggle('show');
  }

  ;
})();

(function () {
  var accBottom = document.querySelectorAll('.main-faq_panel');
  var i;

  for (i = 0; i < accBottom.length; i++) {
    accBottom[i].addEventListener('click', func);
  }

  ;

  function func() {
    this.classList.toggle('active');
    this.nextElementSibling.classList.toggle('show');
  }

  ;
})();

(function () {
  var form = document.querySelector('.profile-item_text');
  var fakeForm = document.querySelector('.profile-grid_fakeform');

  if (form !== null) {
    fakeForm.addEventListener('click', func);
  }

  ;

  function func() {
    form.classList.toggle('active');
    fakeForm.classList.toggle('active');
  }

  ;
})();

(function () {
  var courseBTNs = document.querySelectorAll('.courseEdit-item_button');
  var i;

  if (courseBTNs !== null) {
    for (i = 0; i < courseBTNs.length; i++) {
      courseBTNs[i].addEventListener('click', func);
    }
  }

  function func() {
    this.nextElementSibling.classList.toggle('show');
  }

  ;
})();

(function () {
  var testBTNs = document.querySelectorAll('.newTest-top');
  var i;

  if (testBTNs !== null) {
    for (i = 0; i < testBTNs.length; i++) {
      testBTNs[i].addEventListener('click', func);
    }
  }

  function func() {
    this.parentNode.classList.toggle('active');
    this.classList.toggle('active');
    this.nextElementSibling.classList.toggle('show');
  }

  ;
})();

(function () {
  var proxyBTN = document.querySelector('.multipleChoice-top');
  var proxyBlocks = document.querySelectorAll('.multipleChoice-wrapper');
  var i;

  if (proxyBTN !== null) {
    proxyBTN.addEventListener('click', func);
  }

  function func() {
    this.parentNode.classList.toggle('active');
    this.classList.toggle('active');
    this.nextElementSibling.classList.toggle('show');

    if (proxyBlocks !== null) {
      for (i = 0; i < proxyBlocks.length; i++) {
        proxyBlocks[i].classList.toggle('show');
      }
    }
  }

  ;
})();

(function () {
  var questionsBTN = document.querySelectorAll('.questionType-js');
  var hiddenBlocks = document.querySelectorAll('.questionType-inner_right');
  var i;

  if (questionsBTN !== null) {
    for (i = 0; i < questionsBTN.length; i++) {
      questionsBTN[i].addEventListener('click', func);
    }
  }

  function func() {
    questionsBTN.forEach(function (i) {
      if (i.classList.contains('active')) {
        i.classList.toggle('active');
      }
    });
    hiddenBlocks.forEach(function (i) {
      if (i.classList.contains('show')) {
        i.classList.toggle('show');
      }
    });
    this.classList.toggle('active');
    this.nextElementSibling.classList.toggle('show');
  }

  ;
})(); // slick-slider///////////////////////////////////


$(document).ready(function () {
  $('.partners-slider-inner').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    infinite: true
  });
}); //sidebar-burger////////////////////////////////////

(function () {
  var sidebarBurgerButton = document.querySelector('.sidebar-top_burger-btn');
  var sidebarBurgerMenu = document.querySelector('.sidebar_title-wrapper');
  var sideBarBurgerBlock = document.querySelector('.sidebar');
  var sidebarMobileButton = document.querySelector('.sidebar-top_mobile-btn');

  if (sidebarBurgerButton !== null) {
    sidebarBurgerButton.addEventListener('click', sidebarBurgerClass);
  }

  ;

  if (sidebarMobileButton !== null) {
    sidebarMobileButton.addEventListener('click', sidebarBurgerClass);
  }

  ;

  function sidebarBurgerClass() {
    sideBarBurgerBlock.classList.toggle('active');
    sidebarBurgerMenu.classList.toggle('active');
  }

  ;
})(); // protocol page start


var modalOpenBtn = document.querySelector('#modalWindowOpen');
var protocolForm = document.querySelector('#protocolForm');
var contentWrapper = document.querySelector('.content-wrapper');
var closeForm = document.querySelector('#backToContent');
var scrollToTopButton = document.querySelector('.to-top-button');
var position;
var timer;
modalOpenBtn.addEventListener('click', function () {
  protocolForm.style.display = 'flex';
  contentWrapper.style.display = 'none';
});
closeForm.addEventListener('click', function () {
  protocolForm.style.display = 'none';
  contentWrapper.style.display = 'block';
}); //toggle to top btn

function showToTopButton() {
  position = window.pageYOffset || document.documentElement.scrollTop;

  if (position > 1200) {
    scrollToTopButton.classList.add('showBlock');
  } else {
    scrollToTopButton.classList.remove('showBlock');
  }
} // scrolling to top


function backToTop() {
  if (position > 0) {
    window.scrollTo(0, position);
    position -= 200;
    timer = setTimeout(backToTop, 5);
  } else {
    clearTimeout(timer);
    window.scrollTo(0, 0);
  }
}

window.addEventListener('scroll', showToTopButton);
scrollToTopButton.addEventListener('click', backToTop); //toggle blocks

var toggleBlocks = document.querySelectorAll('.toggle-content');
toggleBlocks.forEach(function (block) {
  block.addEventListener('click', function (e) {
    e.preventDefault();
    this.nextElementSibling.classList.toggle('p__hide');
    this.childNodes[1].classList.toggle('p__rotate');
  });
}); // protocol page end

/***/ }),

/***/ "./resources/js/tooltips.js":
/*!**********************************!*\
  !*** ./resources/js/tooltips.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

//Enable Bootstrap Tooltips EveryWhere
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});

/***/ }),

/***/ 1:
/*!***************************************************************!*\
  !*** multi ./resources/js/main.js ./resources/js/tooltips.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\Fibergate\LARAGON\www\ved_courses\resources\js\main.js */"./resources/js/main.js");
module.exports = __webpack_require__(/*! C:\Fibergate\LARAGON\www\ved_courses\resources\js\tooltips.js */"./resources/js/tooltips.js");


/***/ })

/******/ });