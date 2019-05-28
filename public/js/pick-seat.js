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
/******/ 	return __webpack_require__(__webpack_require__.s = 16);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pick-seat.js":
/*!***********************************!*\
  !*** ./resources/js/pick-seat.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function () {
  var url = window.location.pathname;
  var id = url.substring(url.lastIndexOf('/') + 1);
  $.ajax({
    method: 'GET',
    url: "/api/trip/".concat(id),
    dataType: 'json',
    success: function success(response) {
      createSeatChart(response.seats);
    }
  });
})();

function createSeatChart(seatData) {
  var firstSeatLabel = 1;
  var seatOffset = seatData[0].id - 1;
  var map = ['f___f', 'f___f', 'ee_ee', 'ee_ee', 'ee_ee', 'ee_ee', 'ee_ee', 'ee_ee', 'ee_ee', 'ee_ee', 'ee_ee'];
  $(document).ready(function () {
    var $seats = $('#form-seats');
    var $cart = $('#details'),
        $counter = $('#counter'),
        $total = $('#total'),
        sc = $('#seat-map').seatCharts({
      map: map,
      seats: {
        f: {
          price: 100,
          classes: 'first-class',
          //your custom CSS class
          category: 'First Class'
        },
        e: {
          price: 40,
          classes: 'economy-class',
          //your custom CSS class
          category: 'Economy Class'
        }
      },
      naming: {
        top: false,
        getLabel: function getLabel(character, row, column) {
          return firstSeatLabel++;
        },
        getId: function getId(character, row, column) {
          return firstSeatLabel;
        }
      },
      legend: {
        node: $('#legend'),
        items: [['f', 'available', 'First Class'], ['e', 'available', 'Economy Class'], ['f', 'unavailable', 'Already Booked']]
      },
      click: function click() {
        if (this.status() == 'available') {
          //let's create a new <li> which we'll add to the cart items
          $('<li>' + this.data().category + ' : Seat no ' + this.settings.label + ': <b>$' + this.data().price + '</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>').attr('id', 'cart-item-' + this.settings.id).data('seatId', this.settings.id).appendTo($cart); // create option element and append it to select element inside the form

          createOptionElement($seats, this.settings.label, this.settings.id);
          $counter.text(sc.find('selected').length + 1);
          $total.text(recalculateTotal(sc) + this.data().price);
          return 'selected';
        } else if (this.status() == 'selected') {
          //update the counter
          $counter.text(sc.find('selected').length - 1); //and total

          $total.text(recalculateTotal(sc) - this.data().price); //remove the item from our cart

          $('#cart-item-' + this.settings.id).remove(); // remove item from form

          $('#form-item-' + this.settings.id).remove(); //seat has been vacated

          return 'available';
        } else if (this.status() == 'unavailable') {
          //seat has been already booked
          return 'unavailable';
        } else {
          return this.style();
        }
      }
    }); //this will handle "[cancel]" link clicks

    $('#selected-seats').on('click', '.cancel-cart-item', function () {
      //let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here
      sc.get($(this).parents('li:first').data('seatId')).click();
    }); //let's pretend some seats have already been booked
    // sc.get(['1_2', '4_1', '7_1', '7_2']).status('unavailable');

    setUnavailableSeats(sc);
  });

  function setUnavailableSeats(sc) {
    $.each(seatData, function (index, seat) {
      if (seat.available === 0) {
        sc.get((seat.id - seatOffset).toString()).status('unavailable');
      }
    });
  }

  function createOptionElement($seats, label, id) {
    var value = label + seatOffset;
    $("<option selected=\"selected\">".concat(label, "</option>")).attr('id', 'form-item-' + id).val(value).appendTo($seats);
  }

  function recalculateTotal(sc) {
    var total = 0; //basically find every selected seat and sum its price

    sc.find('selected').each(function () {
      total += this.data().price;
    });
    return total;
  }
}

/***/ }),

/***/ 16:
/*!*****************************************!*\
  !*** multi ./resources/js/pick-seat.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/john/code/Voyage-web/resources/js/pick-seat.js */"./resources/js/pick-seat.js");


/***/ })

/******/ });