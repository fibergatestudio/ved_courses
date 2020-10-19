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
  var textArea = document.getElementById('profile-text');

  if (textArea.value) {
    form.classList.add('active');
    fakeForm.classList.remove('active');
  }

  if (form !== null) {
    fakeForm.addEventListener('click', func);
    textArea.addEventListener('blur', func2);
    textArea.addEventListener('keyup', func2);
  }

  ;

  function func() {
    form.classList.add('active');
    fakeForm.classList.remove('active');
    textArea.focus();
  }

  ;

  function func2() {
    if (!textArea.value) {
      form.classList.remove('active');
      fakeForm.classList.add('active');
    }
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
});

/***/ }),

/***/ 1:
/*!************************************!*\
  !*** multi ./resources/js/main.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Fibergate\LARAGON\www\ved_courses\resources\js\main.js */"./resources/js/main.js");


/***/ })

/******/ });