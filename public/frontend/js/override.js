/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/frontend/js/override.js":
/*!*******************************************!*\
  !*** ./resources/frontend/js/override.js ***!
  \*******************************************/
/***/ (() => {

eval("$(document).ready(function () {\n  var quantitiy = 1;\n  $('.quantity-right-plus').click(function (e) {\n    // Stop acting like a button\n    e.preventDefault(); // Get the field name\n\n    var quantity = parseInt($('#quantity').val()); // If is not undefined\n\n    $('#quantity').val(quantity + 1); // Increment\n  });\n  $('.quantity-left-minus').click(function (e) {\n    // Stop acting like a button\n    e.preventDefault(); // Get the field name\n\n    var quantity = parseInt($('#quantity').val()); // If is not undefined\n    // Increment\n\n    if (quantity > 0) {\n      $('#quantity').val(quantity - 1);\n    }\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvZnJvbnRlbmQvanMvb3ZlcnJpZGUuanM/MzQ5ZCJdLCJuYW1lcyI6WyIkIiwiZG9jdW1lbnQiLCJyZWFkeSIsInF1YW50aXRpeSIsImNsaWNrIiwiZSIsInByZXZlbnREZWZhdWx0IiwicXVhbnRpdHkiLCJwYXJzZUludCIsInZhbCJdLCJtYXBwaW5ncyI6IkFBQUFBLENBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlDLEtBQVosQ0FBa0IsWUFBVTtBQUV4QixNQUFJQyxTQUFTLEdBQUMsQ0FBZDtBQUNHSCxFQUFBQSxDQUFDLENBQUMsc0JBQUQsQ0FBRCxDQUEwQkksS0FBMUIsQ0FBZ0MsVUFBU0MsQ0FBVCxFQUFXO0FBRXRDO0FBQ0FBLElBQUFBLENBQUMsQ0FBQ0MsY0FBRixHQUhzQyxDQUl0Qzs7QUFDQSxRQUFJQyxRQUFRLEdBQUdDLFFBQVEsQ0FBQ1IsQ0FBQyxDQUFDLFdBQUQsQ0FBRCxDQUFlUyxHQUFmLEVBQUQsQ0FBdkIsQ0FMc0MsQ0FPdEM7O0FBRUlULElBQUFBLENBQUMsQ0FBQyxXQUFELENBQUQsQ0FBZVMsR0FBZixDQUFtQkYsUUFBUSxHQUFHLENBQTlCLEVBVGtDLENBWWxDO0FBRVAsR0FkRjtBQWdCRVAsRUFBQUEsQ0FBQyxDQUFDLHNCQUFELENBQUQsQ0FBMEJJLEtBQTFCLENBQWdDLFVBQVNDLENBQVQsRUFBVztBQUN4QztBQUNBQSxJQUFBQSxDQUFDLENBQUNDLGNBQUYsR0FGd0MsQ0FHeEM7O0FBQ0EsUUFBSUMsUUFBUSxHQUFHQyxRQUFRLENBQUNSLENBQUMsQ0FBQyxXQUFELENBQUQsQ0FBZVMsR0FBZixFQUFELENBQXZCLENBSndDLENBTXhDO0FBRUk7O0FBQ0EsUUFBR0YsUUFBUSxHQUFDLENBQVosRUFBYztBQUNkUCxNQUFBQSxDQUFDLENBQUMsV0FBRCxDQUFELENBQWVTLEdBQWYsQ0FBbUJGLFFBQVEsR0FBRyxDQUE5QjtBQUNDO0FBQ1IsR0FaQTtBQWNKLENBakNMIiwic291cmNlc0NvbnRlbnQiOlsiJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oKXtcblxuICAgIHZhciBxdWFudGl0aXk9MTtcbiAgICAgICAkKCcucXVhbnRpdHktcmlnaHQtcGx1cycpLmNsaWNrKGZ1bmN0aW9uKGUpe1xuXG4gICAgICAgICAgICAvLyBTdG9wIGFjdGluZyBsaWtlIGEgYnV0dG9uXG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgICAgICAvLyBHZXQgdGhlIGZpZWxkIG5hbWVcbiAgICAgICAgICAgIHZhciBxdWFudGl0eSA9IHBhcnNlSW50KCQoJyNxdWFudGl0eScpLnZhbCgpKTtcblxuICAgICAgICAgICAgLy8gSWYgaXMgbm90IHVuZGVmaW5lZFxuXG4gICAgICAgICAgICAgICAgJCgnI3F1YW50aXR5JykudmFsKHF1YW50aXR5ICsgMSk7XG5cblxuICAgICAgICAgICAgICAgIC8vIEluY3JlbWVudFxuXG4gICAgICAgIH0pO1xuXG4gICAgICAgICAkKCcucXVhbnRpdHktbGVmdC1taW51cycpLmNsaWNrKGZ1bmN0aW9uKGUpe1xuICAgICAgICAgICAgLy8gU3RvcCBhY3RpbmcgbGlrZSBhIGJ1dHRvblxuICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgICAgICAgLy8gR2V0IHRoZSBmaWVsZCBuYW1lXG4gICAgICAgICAgICB2YXIgcXVhbnRpdHkgPSBwYXJzZUludCgkKCcjcXVhbnRpdHknKS52YWwoKSk7XG5cbiAgICAgICAgICAgIC8vIElmIGlzIG5vdCB1bmRlZmluZWRcblxuICAgICAgICAgICAgICAgIC8vIEluY3JlbWVudFxuICAgICAgICAgICAgICAgIGlmKHF1YW50aXR5PjApe1xuICAgICAgICAgICAgICAgICQoJyNxdWFudGl0eScpLnZhbChxdWFudGl0eSAtIDEpO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgfSk7XG5cbiAgICB9KTtcbiJdLCJmaWxlIjoiLi9yZXNvdXJjZXMvZnJvbnRlbmQvanMvb3ZlcnJpZGUuanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/frontend/js/override.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/frontend/js/override.js"]();
/******/ 	
/******/ })()
;