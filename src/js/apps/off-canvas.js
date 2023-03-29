/**
 * File: off-canvas.js
 *
 * Help deal with the off-canvas mobile menu.
 */

/* eslint-disable */
$ = window.jQuery;
/* eslint-enable */

// CREATE APP
var MOBILENAV = (window.MOBILENAV = window.MOBILENAV || {});

MOBILENAV.OffCanvas = (function () {
  var $offCanvasScreen, $offCanvasContainer, $offCanvasOpen, $offCanvasClose;

  var ip_OffCanvas = function () {
    if (!$offCanvasContainer.length) {
      return;
    }

    $offCanvasOpen.on("click", toggleOffCanvas);
    $offCanvasClose.on("click", closeOffCanvas);
    $offCanvasScreen.on("click", closeOffCanvas);

    $("body").on("keydown", closeOnEscape);

    function closeOnEscape(event) {
      if (event.keyCode === 27) {
        closeOffCanvas();
      }
    }
  };

  var toggleOffCanvas = function () {
    if ($offCanvasOpen.attr("aria-expanded") === "true") {
      closeOffCanvas();
    } else {
      openOffCanvas();
    }
  };

  var openOffCanvas = function () {
    $offCanvasScreen.addClass("is-visible");
    $offCanvasContainer.addClass("is-visible").attr("aria-hidden", "false");
    $offCanvasOpen.addClass("open").attr("aria-expanded", "true");
  };

  var closeOffCanvas = function () {
    $offCanvasScreen.removeClass("is-visible");
    $offCanvasContainer.removeClass("is-visible").attr("aria-hidden", "true");
    $offCanvasOpen.removeClass("open").attr("aria-expanded", "false");
  };

  var init = function () {
    $offCanvasScreen = $(".off-canvas-screen");
    $offCanvasContainer = $(".off-canvas-container");
    $offCanvasOpen = $(".off-canvas-open");
    $offCanvasClose = $(".off-canvas-close");
    ip_OffCanvas();
    console.log("MOBILENAV.OffCanvas");
  };

  return {
    init: init,
  };
})();

document.addEventListener("DOMContentLoaded", function () {
  MOBILENAV.OffCanvas.init();
});
