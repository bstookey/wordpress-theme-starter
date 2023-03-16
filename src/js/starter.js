/* eslint-disable */
$ = window.jQuery;
/* eslint-enable */

// CREATE APP
var APP = (window.APP = window.APP || {});

const debug = false;

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

  // Improved Text Widow Eliminator
  const noWidows = (ele) => {
    console.log(ele);
    $(ele).each(function () {
      // Save original text - replacing any nbsp from previous iteration
      const originText = $(this)
        .html()
        .replace(/&nbsp;/, " ");
      let newText = originText;

      // Replace last space in text string
      newText = newText.replace(/\s([^\s]*)$/, "&nbsp;$1");
      $(this).html(newText);

      // Get DOM parent of this text element
      const parent = $(this).parent().get(0);
      const parentWidths = [parent.offsetWidth, parent.scrollWidth];

      // If offsetWidth less than scrollWidth set originText
      if (parentWidths[0] < parentWidths[1]) {
        $(this).html(originText);
      }
    });
    // $(ele).each(function () {
    //     $(ele).widowFix({
    //         letterLimit: 18
    //     });
    // });
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
    //noWidows($("p"));
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
});
