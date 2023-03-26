/* eslint-disable */
$ = window.jQuery;
/* eslint-enable */

// CREATE APP
var APP = (window.APP = window.APP || {});

var debug = true;

function consoleLog(logMessage) {
  if (debug) {
    console.log(logMessage);
  }
}

consoleLog("Debug true");

APP.Utilities = (function () {
  const markSup = () => {
    $("body :not(script,sup,iframe)")
      .contents()
      .filter(function () {
        return this.nodeType === 3;
      })
      .replaceWith(function () {
        return this.nodeValue.replace(/[™®†]/g, "<sup>$&</sup>");
      });
  };

  // Improved Text Widow Eliminator using widowadjust.js
  const noWidows = (ele) => {
    consoleLog(ele);
    wt.fix({
      elements: "p",
      chars: 10,
      method: "nbsp",
      event: "resize",
    });
  };

  var backgroundImage = function () {
    var bgImage = $(".bgImage");
    bgImage.each(function () {
      var bgImage = $(this).find("img:first");
      var bgSource = bgImage.attr("src");
      bgImage.parent("figure").remove();
      $(this).css({
        "background-image": 'url("' + bgSource + '")',
      });
    });
  };

  var init = function () {
    markSup();
    backgroundImage();
    noWidows("p");
    consoleLog("APP.Utilities");
  };

  return {
    init: init,
  };
})();

APP.Banner = (function () {
  var $cookie, $cookieId, $cookieContent, $acceptCookie, $cookieDays;

  var checkCookie = function (cname) {
    var cookieSet = Cookies.get($cookieId) == "true";
    if (!cookieSet) {
      //alert("not accepted");
      $cookieContent.addClass("active");
    }
  };

  var setAlertCookie = function (cname, cvalue, exdays) {
    Cookies.set($cookieId, "true", {
      expires: $cookieDays,
    });
  };

  var hideCookieBar = function () {
    $cookieContent.removeClass("active");
  };

  var initEvents = function () {
    checkCookie($cookieId);
    $acceptCookie.on("touchstart click", function () {
      setAlertCookie();
      hideCookieBar();
      return false;
    });
  };

  var init = function () {
    $cookie = false;
    $cookieContent = $("#announcement-banner");
    $acceptCookie = $cookieContent.find("#banner-accept");
    $cookieId =
      $cookieContent.data("id").length != ""
        ? $cookieContent.data("id")
        : "AnnouncementCookieAccept";
    $cookieDays = $cookieContent.data("days");
    initEvents();
    consoleLog("APP.Banner");
  };

  return {
    init: init,
  };
})();

document.addEventListener("DOMContentLoaded", function () {
  APP.Utilities.init();
  APP.Banner.init();
  //APP.Nav.init();
});
