$ = window.jQuery;
// CREATE APP
var APP = (window.APP = window.APP || {});

const debug = true;

function consoleLog(logMessage) {
  if (debug) {
    console.log(logMessage);
  }
}

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
    consoleLog("APP.Utilities");
    markSup();
    backgroundImage();
    //noWidows($("p"));
  };

  return {
    init: init,
  };
})();

APP.Banner = (function () {
  var $cookie, $cookieId, $cookieContent, $acceptCookie, $cName;

  var getCookie = function (cname) {
    var name = cname + "=";
    var ca = document.cookie.split(";");
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i].trim();
      if (c.indexOf(name) === 0) return c.substring(name.length, c.length);
    }
    return "";
  };

  var setCookie = function (cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
    $('[data-id="' + cname + '"]').removeClass("active");
  };

  var checkCookie = function (cname) {
    var name = getCookie(cname);
    if (name !== "") {
      //alert('has cookie');
      $cookie = true;
    } else {
      showCC();
    }
  };

  var showCC = function () {
    $cookieContent.addClass("active");
  };

  var initEvents = function () {
    checkCookie($cookieId);
    $acceptCookie.on("click", function () {
      var $cName = $cookieContent.data("id");
      var $cookieDays = $cookieContent.data("days");
      setCookie($cName, "true", $cookieDays);
    });
  };

  var init = function () {
    $cookie = false;
    $cookieContent = $("#announcement-banner");
    $acceptCookie = $cookieContent.find(".accept");
    $cookieId =
      $cookieContent.data("id").length != ""
        ? $cookieContent.data("id")
        : "cookieAccept";
    initEvents();
  };

  return {
    init: init,
  };
})();

document.addEventListener("DOMContentLoaded", function () {
  APP.Utilities.init();
});
