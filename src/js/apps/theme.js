jQuery(function ($) {
  console.log("theme.js");
  /* ===========================================================
	   MOBILE DROP DOWNS
	=========================================================== */
  // add a drop down button after any menu item with a sub menu

  $("#menu-main-navigation > li > a").on("touchstart", function (e) {
    "use strict";
    if ($("#toggle-nav").css("display") == "none") {
      var link = $(this);
      if (link.hasClass("hover")) {
        return true;
      } else {
        link.addClass("hover");
        $("#menu-main-navigation > li > a").not(this).removeClass("hover");
        e.preventDefault();
        return false; //extra, and to make sure the function has consistent return points
      }
    }
  });

  var watcher = window.matchMedia("(max-width: 1100px)"),
    main_nav = $(".main-nav"),
    nav_account = $(".nav-account"),
    account_nav = $(".nav-account-wrapper");

  // Call listener function at run time
  windowWidth(watcher);

  // Attach listener function on state changes
  watcher.addListener(windowWidth);

  function windowWidth(watcher) {
    if (watcher.matches) {
      // If media query matches
      // console.log('x matches');
      account_nav.addClass("attached-nav").detach().appendTo(main_nav);
    } else {
      // console.log('x does not match');
      account_nav.removeClass("attached-nav").detach().appendTo(nav_account);
    }
  }

  /******************************
		BANNERS
	******************************/
  // make sure the banner navigation is centered properly
  (function () {
    var banner_nav = $("#banner-nav");
    if (banner_nav.length > 0) {
      banner_nav.css("margin-left", "-" + banner_nav.outerWidth() / 2 + "px");
      reloadImages();
    }
  })();
  $(".cycle-slideshow").swipe({
    swipeLeft: function (event, direction, distance, duration, fingerCount) {
      $(".cycle-slideshow").cycle("next");
      //$('#banner-next').trigger('click');
    },
    swipeRight: function (event, direction, distance, duration, fingerCount) {
      $(".cycle-slideshow").cycle("prev");
      //$('#banner-prev').trigger('click');
    },
    excludedElements: "button, input, select, textarea, .noSwipe",
  });

  /******************************
		RELOAD IMAGES (RESPONSIVE)
	******************************/
  // load the correct sized banner images
  function reloadImages() {
    var rimages = $("img.banner-img");

    if (rimages.length > 0) {
      if ($("div.footer-bottom").css("padding-bottom") == "11px") {
        var image_size = "sm";
      } else {
        var image_size = "lg";
      }
      rimages.each(function (i) {
        // setup the variables
        var rimage = $(this),
          data_src = rimage.data("img-src-" + image_size);

        // if the image source is not set to the correct image, change it
        if (rimage.attr("src") != data_src) {
          rimage.attr("src", data_src);
        }
      });
    }
  }

  /******************************
		VERTICAL CENTER
	******************************/
  var vc_content = $("div.text-wrapper");
  verticalCenter();
  function verticalCenter() {
    if ($("img.section-image").css("float") != "none") {
      vc_content.each(function (i) {
        $this = $(this);
        var section_height = $this.parent("div.section-copy").height() - 20;
        var text_height = $this.height();
        $this.css("padding-top", (section_height - text_height) / 2);
      });
    } else {
      vc_content.css("padding-top", 0);
    }
  }

  /******************************
		ZIP CODE FORM VALIDATION
	******************************/
  $("div.dealer-locator form, .footer-top form, .local-decorator").submit(
    function (e) {
      $("span.error").remove();
      $this = $(this);
      var zip = $this.find($('input[name="loc"]'));
      var value = zip.val();
      if (value.length >= 5) {
        return;
      } else {
        $this.append('<span class="error">Error: Not a valid zip code</span>');
      }
      e.preventDefault();
    }
  );

  // if($('#wpsl-search-input').is('*')) {
  // 	$('#wpsl-search-input').val($('#sl-header-loc').val());
  // }

  /******************************
		CONTACT FORM SUBMISSION
	******************************/

  // set the captcha flag to 0 (form hasn't been submitted yet)
  var captchaFlag = 0;
  $(".captcha-form").submit(function (e) {
    e.preventDefault();

    // setup variables that relate to the specific submitted form
    var submittedForm = $(this),
      errorEl = submittedForm.find("div.c-errors"),
      submitEl = submittedForm.find("input[type=submit]"),
      submitDefaultVal = submitEl.val(),
      cid = 0;

    // if submit has no value give it one
    if (!submitDefaultVal) {
      submitDefaultVal = "Submit Query";
    }

    // if this is the footer form, captcha id should be 1
    if (
      submittedForm.hasClass("sf-form-footer") &&
      $(".captcha-form").length > 1
    ) {
      cid = 1;
    }

    console.log(cid);

    // clear errors
    errorEl.html("");

    if (captchaFlag == 0) {
      e.preventDefault();
      // display a loading indicator
      submitEl.val("Loading...");

      setTimeout(function () {
        $.ajax({
          type: "post",
          url: ajaxurl,
          data: {
            action: "ip_captcha_check",
            captcha: grecaptcha.getResponse(cid),
          },
          success: function (response) {
            // if the captcha is valid, submit the form to salesforce
            if (response == "success") {
              captchaFlag = 1;
              submittedForm.attr(
                "action",
                "https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8"
              );
              submittedForm.unbind("submit").submit();

              setTimeout(function () {
                submitEl.val(submitDefaultVal);
                submitEl.trigger("click");
              }, 200);
              // if the captcha is invalid, display an error
            } else {
              submitEl.val(submitDefaultVal);
              errorEl.html("<p>Invalid captcha.</p>");
            }
          },
        });
      }, 2000);
    }
  });

  /******************************
		SWAP THE LEAD SOURCE DETAILS FIELD BASED ON THE LEAD SOURCE FIELD (CONTACT FORM)
	******************************/
  $("#lead-source-field").on("change", function () {
    var leadSourceNumber = $(this).val();
    if (!$("#lsd-" + leadSourceNumber).hasClass("active")) {
      $(".lead-source-details").removeClass("active");
      $("#lsd-" + leadSourceNumber).addClass("active");
    }
  });

  /******************************
		HOMEPAGE CAROUSEL
	******************************/

  function update_ig_carousel() {
    console.log("carousel update function start");
    var ig_carousel = $("#ig-carousel");

    if (ig_carousel.length > 0) {
      console.log("carousel found");
      var visible_slides = ig_carousel.attr("data-cycle-carousel-visible");
      var updated_visible_slides = null;

      if ($(window).width() < 640) {
        console.log("small carousel");
        updated_visible_slides = 4;
      } else {
        console.log("large carousel");
        updated_visible_slides = 10;
      }

      if (visible_slides != updated_visible_slides) {
        console.log("carousel mismatch, update them");
        ig_carousel.attr("data-cycle-carousel-visible", updated_visible_slides);
        ig_carousel.cycle("reinit");
      }
    }
    console.log("carousel update function end");
  }
  update_ig_carousel();

  /******************************
		GALLERY
	******************************/
  // initialize the gallery slideshow
  (function () {
    if ($(".gallery-slide").length > 0) {
      reloadImages();
    }
  })();

  // setup the gallery nav hover states
  (function () {
    var gal_nav = $("li.gal-nav a"),
      gal_query_check = $("li.gal-nav-item-4");
    if (gal_nav.length > 0) {
      gal_nav.first().addClass("active");
      gal_nav.on("click", function (e) {
        var $this = $(this);
        e.preventDefault();

        if (
          gal_query_check.css("clear") != "both" &&
          !$this.hasClass("active")
        ) {
          $("#selected-gallery-cat").css(
            "left",
            gal_nav.index($this) * (100 / gal_nav.length) + "%"
          );
          gal_nav.removeClass("active");
          $this.addClass("active");
          if (
            $("body").hasClass("tax-ipf_gallery-category") ||
            $("body").hasClass("page-template-tpl-portfolio-php")
          ) {
            $("div.gallery-list-container").addClass("loading");
            $("ul.gallery-list").fadeTo("slow", 0.3, function () {
              loadGallery($this.attr("href"), "tax");
            });
            $("#category-selection").html($this.text());
          } else {
            $("#gallery-carousel-container").addClass("loading");
            $("div.carousel-container").fadeTo("slow", 0.3, function () {
              loadGallery($this.attr("href"), "fp");
            });
          }
        }
        $("#gallery-category-list").removeClass("active");
      });
    }
  })();

  // setup the gallery categories to load using ajax
  function loadGallery(gallery_url, page_type) {
    $("#gallery-loader").show();
    $.ajax({
      url: gallery_url,
      type: "GET",
      data: "aj=" + page_type,
      success: function (html) {
        $("#gallery-loader").hide();
        if (page_type == "tax") {
          $("div.gallery-list-container").removeClass("loading");
          $("ul.gallery-list").fadeOut(300).remove();
          $(html).hide().appendTo("div.gallery-list-container");
          $("ul.gallery-list").fadeIn(1000);
        } else {
          $("#gallery-carousel-container").removeClass("loading");
          carousel_container.fadeOut(300).remove();
          $(html).hide().appendTo("#gallery-carousel-container");
          initCarousel();
          carousel_container.fadeIn(1000);
        }
      },
    });
    return false;
  }

  /******************************
		GALLERY NAV MOBILE
	******************************/
  $("#category-selection").on("click", function () {
    $("#gallery-category-list").toggleClass("active");
  });

  /******************************
		GALLERY NAV CAROUSEL
	******************************/
  var gnav_carousel_container,
    gnav_carousel_id,
    gnav_carousel_items,
    gnav_list_items_count,
    gnav_actual_list_width,
    gnav_total_list_width,
    gnav_carousel_item_width,
    gnav_negative_list_width,
    gnav_active_carousel_size,
    gnav_carousel_left_pos;

  initGnavCarousel();

  function initGnavCarousel() {
    gnav_carousel_container = $("div.gallery-nav-carousel > .container");
    gnav_carousel_id = $("div.gallery-nav-carousel ul");
    gnav_carousel_items = $("div.gallery-nav-carousel li");

    if (!$("div.gallery-nav-controls").is(":visible")) {
      gnav_active_carousel_size = "small";
      gnav_carousel_id.removeAttr("style");
      gnav_carousel_items.removeAttr("style");
    } else {
      gnav_list_items_count = gnav_carousel_items.length;
      gnav_total_list_width = (gnav_list_items_count / 6) * 100;
      gnav_carousel_item_width = 100 / gnav_list_items_count;
      gnav_carousel_movement_width = 16.6666;
      gnav_negative_list_width = gnav_total_list_width * -1;
      gnav_active_carousel_size = "large";
      gnav_carousel_left_pos = 0;

      gnav_carousel_id.width(gnav_total_list_width + "%");
      gnav_carousel_items.width(gnav_carousel_item_width + "%");
    }
  }

  $("#gallery-nav-prev").click(function (e) {
    e.preventDefault();
    carouselScroll(
      gnav_carousel_id,
      gnav_carousel_items,
      gnav_carousel_movement_width,
      "right",
      "gnav",
      gnav_carousel_item_width
    );
  });
  $("#gallery-nav-next").click(function (e) {
    e.preventDefault();
    carouselScroll(
      gnav_carousel_id,
      gnav_carousel_items,
      gnav_carousel_movement_width,
      "left",
      "gnav",
      gnav_carousel_item_width
    );
  });

  /******************************
		GALLERY CAROUSEL
	******************************/
  var carousel_container,
    carousel_id,
    carousel_items,
    list_items_count,
    list_items_count_ceil,
    actual_list_width,
    total_list_width,
    carousel_item_width,
    negative_list_width,
    active_carousel_size,
    carousel_left_pos;

  initCarousel();

  function initCarousel(carousel_reset) {
    carousel_container = $(".carousel-container");
    carousel_id = $(".carousel-list");
    carousel_items = $(".carousel-list li");
    list_items_count = carousel_items.length;

    if (list_items_count > 6) {
      $("#gallery-prev, #gallery-next").addClass("active");
    } else {
      $("#gallery-prev, #gallery-next").removeClass("active");
    }

    if (carousel_reset == "reset") {
      carousel_container.css("left", 0);
    }

    if ($("div.call .prefix").css("display") == "none") {
      list_items_count_ceil = Math.ceil(list_items_count / 6) * 6;
      total_list_width = (list_items_count_ceil / 2) * 100;
      actual_list_width = ((Math.ceil(list_items_count / 2) * 2) / 2) * 100;
      carousel_item_width = 14.44444;
      carousel_movement_width = 100;
      negative_list_width = total_list_width * -1;
      carousel_left_pos = 0;
      carousel_id.width((100 / (total_list_width / 100)) * 3 + "%");
      active_carousel_size = "small";
    } else {
      list_items_count_ceil = Math.ceil(list_items_count / 6) * 6;
      total_list_width = (list_items_count_ceil / 6) * 100;
      carousel_item_width = 100;
      carousel_movement_width = 100;
      negative_list_width = total_list_width * -1;
      carousel_left_pos = 0;
      carousel_id.width(100 / (total_list_width / 100) + "%");
      active_carousel_size = "large";
    }
    carousel_container.width(total_list_width + "%");
  }

  $("#gallery-prev").click(function (e) {
    e.preventDefault();
    carouselScroll(
      carousel_container,
      carousel_items,
      carousel_movement_width,
      "right",
      active_carousel_size,
      actual_list_width
    );
  });

  $("#gallery-next").click(function (e) {
    e.preventDefault();
    carouselScroll(
      carousel_container,
      carousel_items,
      carousel_movement_width,
      "left",
      active_carousel_size,
      actual_list_width
    );
  });

  $(".carousel-list").swipe({
    swipeLeft: function (event, direction, distance, duration, fingerCount) {
      $("#gallery-next").trigger("click");
    },
    swipeRight: function (event, direction, distance, duration, fingerCount) {
      $("#gallery-prev").trigger("click");
    },
    excludedElements: "button, input, select, textarea, .noSwipe",
  });

  function carouselScroll(
    carousel,
    list_items,
    list_item_width,
    direction,
    carousel_size,
    actual_width
  ) {
    if (!carousel.is(":animated")) {
      if (carousel_size == "small") {
        if (direction == "right") {
          if (carousel_left_pos * 2 < 0) {
            carousel_left_pos += list_item_width;

            carousel.animate(
              {
                left: carousel_left_pos + "%",
              },
              500
            );
          } else {
            if (list_items_count - 2 <= 0) {
              carousel_left_pos = 0;
            } else {
              carousel_left_pos = actual_width * -1 + list_item_width;
            }

            carousel.animate(
              {
                left: carousel_left_pos + "%",
              },
              500
            );
          }
        } else {
          if (
            carousel_left_pos - list_item_width - list_items_count >
            actual_width * -1
          ) {
            carousel_left_pos -= list_item_width;

            carousel.animate(
              {
                left: carousel_left_pos + "%",
              },
              500
            );
          } else {
            carousel_left_pos = 0;
            carousel.animate(
              {
                left: 0,
              },
              500
            );
          }
        }
      } else if (carousel_size == "gnav") {
        if (direction == "right") {
          if (gnav_carousel_left_pos < 0) {
            gnav_carousel_left_pos += list_item_width;

            carousel.animate(
              {
                left: gnav_carousel_left_pos + "%",
              },
              500
            );
          } else {
            if (gnav_list_items_count - 6 <= 0) {
              gnav_carousel_left_pos = 0;
            } else {
              gnav_carousel_left_pos =
                gnav_negative_list_width + list_item_width * 6;
            }

            carousel.animate(
              {
                left: gnav_carousel_left_pos + "%",
              },
              500
            );
          }
        } else {
          if (
            gnav_carousel_left_pos - list_item_width * 7 >
            gnav_negative_list_width
          ) {
            gnav_carousel_left_pos -= list_item_width;

            carousel.animate(
              {
                left: gnav_carousel_left_pos + "%",
              },
              500
            );
          } else {
            gnav_carousel_left_pos = 0;
            carousel.animate(
              {
                left: 0,
              },
              500
            );
          }
        }
      } else {
        if (direction == "right") {
          if (carousel_left_pos * 2 < 0) {
            carousel_left_pos += list_item_width;

            carousel.animate(
              {
                left: carousel_left_pos + "%",
              },
              500
            );
          } else {
            if (list_items_count - 6 <= 0) {
              carousel_left_pos = 0;
            } else {
              carousel_left_pos = negative_list_width + list_item_width;
            }

            carousel.animate(
              {
                left: carousel_left_pos + "%",
              },
              500
            );
          }
        } else {
          var over_six = list_items_count - 6;
          if (carousel_left_pos * 2 > negative_list_width && over_six > 0) {
            carousel_left_pos -= list_item_width;

            carousel.animate(
              {
                left: carousel_left_pos + "%",
              },
              500
            );
          } else {
            carousel_left_pos = 0;
            carousel.animate(
              {
                left: 0,
              },
              500
            );
          }
        }
      }
    }
  }

  /******************************
		LOAD NATIONAL ADS
	******************************/
  var adslist = $(".national-ad-list"),
    maxadpages = $("#more-national-ads").attr("data-pages");
  $("#more-national-ads").on("click", function (e) {
    e.preventDefault();
    var $this = $(this),
      pagenum = parseInt($this.attr("data-page")) + 1;

    if (!$this.hasClass("loading")) {
      $this.attr("data-page", pagenum);
      $this.addClass("loading");

      $.post(
        ajaxurl,
        {
          action: "ip_load_ads",
          pagenum: pagenum,
        },
        function (response) {
          if (maxadpages == pagenum) {
            $this.remove();
          } else {
            $this.removeClass("loading");
          }
          adslist.append(response);
        }
      );
    }
  });

  /******************************
		EQUAL HEIGHTS
	******************************/
  equalContent($("div.testimonials"));
  function equalContent(content) {
    if (content.length > 0 && $("div.testimonial").css("float") != "none") {
      content.each(function (i) {
        $(this).children().css("min-height", "0");
        $(this).children().equalHeights();
      });
    } else {
      content.each(function (i) {
        $(this).children().css("min-height", "0");
      });
    }
  }
  $(".equal").matchHeight();

  /******************************
     Adding one menu to another on franchise pages
     ******************************/

  addMenuItems(jQuery(".nav-account .nav-link"), jQuery(".main-nav"));
  function addMenuItems($el, $menu) {
    if (jQuery(window).width() < 1025) {
      $el.each(function () {
        $menu.append("<li>" + jQuery(this)[0].outerHTML + "</li>");
      });
    }
  }

  /******************************
     Adding logos to slide
     ******************************/
  slideLogos();
  function slideLogos() {
    if ($(window).width() < 768 && $(".logos").length) {
      $(".logos").cycle();
    } else {
      $(".logos").cycle("destroy");
    }
  }

  /******************************
     Select in contact form
     ******************************/

  //$('.custom-reg .gfield_select').select2("enable",false);
  $(".js-select, .s2 .gfield_select").select2();

  /******************************
		WINDOW RESIZE
	******************************/
  $(window).resize(function () {
    slideLogos();
    reloadImages();
    verticalCenter();
    equalContent($("div.testimonials"));

    update_ig_carousel();

    if (
      $("div.call .prefix").css("display") == "none" &&
      active_carousel_size != "small"
    ) {
      initCarousel("reset");
    } else if (
      $("div.call .prefix").css("display") != "none" &&
      active_carousel_size != "large"
    ) {
      initCarousel("reset");
    }

    if (
      $("div.gallery-nav-controls").is(":visible") &&
      gnav_active_carousel_size != "large"
    ) {
      initGnavCarousel();
    } else if (
      !$("div.gallery-nav-controls").is(":visible") &&
      gnav_active_carousel_size != "small"
    ) {
      initGnavCarousel();
    }
  });

  if ($(window).width() > 500) {
    $(".timeline__item_content_left").each(function () {
      $(".timeline__items-right").append($(this));
    });

    $(".timeline__item_content_right").each(function () {
      $(".timeline__items-left").append($(this));
    });
  }

  /******************************
     MASONRY COLLECTION
     ******************************/
  $(".collection-container .grid").imagesLoaded(function () {
    $(".collection-container .grid").masonry({
      itemSelector: ".grid-item",
      percentPosition: true,
    });
  });

  /******************************
     COLLECTION GALLERY
     ******************************/
  var nav_links = $(".category-filters a"),
    grid_wrap = $(".collection-container .grid-container"),
    load = $(".collection-loader");

  nav_links.on("click", function (e) {
    e.preventDefault();

    var $this = $(this),
      nav_item = $this.closest("li"),
      collection_category = $this.attr("data-filter");

    if (!nav_item.hasClass("active")) {
      nav_item.addClass("active").siblings().removeClass("active");

      grid_wrap.addClass("loading");
      load.show();

      $.post(
        ajaxurl,
        {
          action: "ip_get_collection",
          collection_category: collection_category,
        },
        function (response) {
          grid_wrap.empty();
          grid_wrap.append(response);
          $(".collection-container .grid").imagesLoaded(function () {
            $(".collection-container .grid").masonry({
              itemSelector: ".grid-item",
              percentPosition: true,
            });
          });
          load.hide();
          grid_wrap.removeClass("loading");
        }
      );
    }
  });

  $(window).scroll(function () {
    var bottomOffset = 2000,
      collection_category = $(".category-filters li.active a").attr(
        "data-filter"
      ),
      current_page = $(".collection-container .grid").attr("data-page"),
      max_count = $(".collection-container .grid").attr("data-max-page");
    if (
      $(document).scrollTop() > $(document).height() - bottomOffset &&
      !grid_wrap.hasClass("loading") &&
      current_page < max_count
    ) {
      grid_wrap.addClass("loading");
      load.show();

      $.post(
        ajaxurl,
        {
          action: "true_load_posts",
          collection_category: collection_category,
          page: current_page,
        },
        function (response) {
          var $content = $(response);
          $(".collection-container .grid").append($content);
          $(".collection-container .grid-item").imagesLoaded(function () {
            $(".collection-container .grid").masonry("appended", $content);
          });
          load.hide();
          grid_wrap.removeClass("loading");
          current_page++;
          console.log(current_page);
          $(".collection-container .grid").attr("data-page", current_page);
        }
      );
    }
  });

  const notiContent = document.getElementsByClassName("njt-nofi-content")[0];
  const fixedWrapper = document.getElementsByClassName("fixed-wrapper")[0];

  if (notiContent && document.documentElement.clientWidth > 1240) {
    fixedWrapper.style.top = notiContent.offsetHeight + "px";

    jQuery(".njt-nofi-container .njt-nofi-close-button").on(
      "click",
      function (e) {
        if (e.target.classList.contains("njt-nofi-close-button")) {
          fixedWrapper.style.top = 0 + "px";
        }
      }
    );
  }

  $(".menu-item").focusin(function ({ target }) {
    if (target.parentNode.classList.contains("menu-item")) {
      $(".drop-downs").removeAttr("style");
    }

    if (target.parentNode.classList.contains("menu-item-has-children")) {
      target.parentNode.getElementsByClassName("drop-downs")[0].style.display =
        "block";
    }
  });

  /******************************
  SHOW MORE CATEGORIES ON BLOG
  ******************************/
  $(".categories-show-more").on("click", function () {
    $(this).parent().parent().toggleClass("show-all");
    $(this).html($(this).html() == "Show Less" ? "Show More" : "Show Less");
  });

  /******************************
  BANNER PLAY BUTTON
  ******************************/
  $(".banner__play").on("click", function () {
    $(".full-video").addClass("show");
    var src = $(".full-video iframe").attr("data-srctemp");
    $(".full-video iframe").attr("src", src);
    // $(".preview-video").addClass("hide");
  });

  /******************************
   BANNER CLOSE BUTTON
   ******************************/
  $(".close-video").on("click", function () {
    $(".full-video").removeClass("show");
    $(".full-video iframe").attr("src", "");
    // $(".preview-video").removeClass("hide");
  });

  window.onscroll = function () {
    if (window.innerWidth < 600) {
      stickyHeader();
    }
  };

  var header = document.querySelector("header.fixed-wrapper");
  var sticky = header.offsetTop;

  function stickyHeader() {
    if (window.pageYOffset > sticky) {
      header.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
    }
  }
});

/******************************
   WOW.js
   ******************************/

$ = window.jQuery;
// CREATE APP
var APP = (window.APP = window.APP || {});

var $debug = true;

APP.WOW = (function () {
  var ledwow = function () {
    setWow("h2", "fadeIn", 0.75, 0.25);
    setWow(".portfolio-container .content", "fadeInLeft", 0.75);
    setWow(".portfolio-container img", "fadeInRight", 0.75, 0.25);
    setWow(".tip-showcase-instagram__content-wrapper", "fadeIn", 0.5, 0.5);
    setWow(".section__title_smaller", "fadeIn", 0.75, 0.25);

    var timelineItemsR = $(
      ".timeline__item_content_right .timeline__content, .timeline__item_content_right .timeline__image"
    );
    var timelineItemsL = $(
      ".timeline__item_content_left .timeline__content, .timeline__item_content_left .timeline__image"
    );

    timelineItemsR.each(function () {
      setWow($(this), "fadeInLeft", 0.75);
    });

    timelineItemsL.each(function () {
      setWow($(this), "fadeInRight", 0.75);
    });

    var scw = $(
      ".split-content-wrap .fullwidth-container, .main .fullwidth-container"
    );

    scw.each(function () {
      setWow($(this), "fadeIn", 0.5, 0.25);
    });
  };

  var setWow = function (
    element,
    animationName = "fadeIn",
    duration = 0.5,
    delay = 0
  ) {
    let dwd = duration;
    $(element).each(function () {
      $(this)
        .not(".no-animate")
        .addClass(" wow " + animationName)
        .attr("data-wow-duration", dwd + "s")
        .attr("data-wow-delay", delay + "s");
      dwd += duration;
      //if (dwd > 1) { dwd = 0.25 };
    });
  };

  var afterReveal = function (el) {
    el.addEventListener("animationstart", function (event) {
      $(".wow").each(function () {
        $(this).css("opacity", 1);
      });
    });
  };

  var init = function () {
    if ($debug) {
      console.log("Wow");
    }
    ledwow();
    new WOW({
      callback: afterReveal,
    }).init();
  };

  return {
    init: init,
  };
})();

APP.Navigation = (function () {
  var init = function () {
    if ($debug) {
      console.log("Navigation");
    }

    $("#toggle-nav").click(function (e) {
      $("#menu-main-navigation, #menu-franchise-menu, #toggle-nav").toggleClass(
        "active"
      );
      $("body").toggleClass("overlay");
      $(".main-nav-container").toggleClass("active-menu");
    });
    $("body.overlay, span.toggle-nav__icon.close").click(function (e) {
      $("#toggle-nav").click();
    });

    $("span.btn-dd").on("click", function () {
      $this = $(this);
      $this.toggleClass("active");
      $this.parent("li").toggleClass("active");
    });
  };

  return {
    init: init,
  };
})();

document.addEventListener("DOMContentLoaded", function () {
  //APP.WOW.init();
  APP.Navigation.init();
});
