window.Popper = require('popper.js').default;

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */
try {
  window.$ = window.jQuery = require('jquery');
  require('bootstrap');
  require('./vendor/jscolor');
  require('./vendor/jquery.mask');
  require('./vendor/custom');
} catch (e) {
}

let token = document.head.querySelector('meta[name="csrf-token"]');

