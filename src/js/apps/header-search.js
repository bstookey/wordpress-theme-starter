/* eslint-disable */
$ = window.jQuery;
/* eslint-enable */
const debug = true;

function consoleLog(logMessage) {
  if (debug) {
    console.log(logMessage);
  }
}

$(document).ready(function () {
  var siteHeaderAction = $(".site-header-action");

  if (!siteHeaderAction.length) {
    return;
  }

  var headerSearchToggle = $(".site-header-action .cta-button"),
    headerSearchForm = $(".desktop-search");

  if (!headerSearchToggle.length || !headerSearchForm.length) {
    return;
  }

  headerSearchToggle.on("click", toggleSearchForm);
  $(document).on("keyup touchstart click", hideSearchForm);

  function searchIsOpen() {
    return $("body").hasClass("search-form-visible");
  }

  function toggleSearchForm() {
    $("body").toggleClass("search-form-visible");
    toggleAriaLabels();
  }

  function toggleAriaLabels() {
    if (searchIsOpen()) {
      headerSearchForm.attr("aria-hidden", "false");
      headerSearchToggle.attr("aria-expanded", "true");
    } else {
      headerSearchForm.attr("aria-hidden", "true");
      headerSearchToggle.attr("aria-expanded", "false");
    }
  }

  function hideSearchForm(event) {
    var isTargetInside = headerSearchForm.has(event.target).length;

    if (
      !isTargetInside &&
      $(event.target).closest(headerSearchToggle).length !==
        $(headerSearchToggle).length
    ) {
      $("body").removeClass("search-form-visible");
      toggleAriaLabels();
    }
  }
});
