/* eslint-disable */
$ = window.jQuery;
/* eslint-enable */

// CREATE APP
var APP = (window.APP = window.APP || {});

const debug = true;

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

APP.Nav = (function () {
  var timer, $body, $mainNav, $navTrigger, $hasChildren, $hasChildrenMain;

  var initEvents = function () {
    $navTrigger.on("click", function () {
      var $this = $(this);
      if ($body.hasClass("mobile-nav-active")) {
        clearNav();
      } else {
        setNav();
      }
    });

    $(".mobile-nav")
      .find($hasChildren)
      .on("click", function (e) {
        e.preventDefault();
      });

    $hasChildrenMain.on("click", function (e) {
      var $this = $(this);
      e.preventDefault();
      if ($this.attr("aria-expanded") === "true") {
        $this.parent().removeClass("active");
        $this.attr("aria-expanded", false);
      } else {
        $hasChildren
          .attr("aria-expanded", false)
          .parent()
          .removeClass("active");
        $this.parent().addClass("active");
        $this.attr("aria-expanded", true);
      }
    });
  };

  var setNav = function () {
    $navTrigger.addClass("open").attr("aria-expanded", true);
    $body.addClass("mobile-nav-active");
  };

  var clearNav = function () {
    $navTrigger.removeClass("open").attr("aria-expanded", false);
    $body.removeClass("mobile-nav-active");
    $hasChildren.attr("aria-expanded", false).parent().removeClass("active");
  };

  $(window).on("load resize orientationchange", function () {
    clearTimeout(timer);
    timer = setTimeout(function () {
      var $resWidth = $(window).innerWidth();
      if ($resWidth >= 992) {
        clearNav();
      }
    }, 200);
  });

  var init = function () {
    consoleLog("APP.MobileNav");

    $mainNav = $(".mobile-nav .main-nav");
    $navTrigger = $(".off-canvas-open");
    $body = $("body");
    $hasChildren = $(".menu-item-has-children > a");
    $hasChildrenMain = $mainNav.find(
      ".main-menu > .menu-item-has-children > a"
    );
    initEvents();
  };

  return {
    init: init,
  };
})();

document.addEventListener("DOMContentLoaded", function () {
  APP.Utilities.init();
  APP.Banner.init();
  APP.Nav.init();
});
