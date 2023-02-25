/*
Reference: http://jsfiddle.net/BB3JK/47/
*/
function customSelect(ele) {
  $(ele).each(function () {
    var $this = $(this);
    var numberOfOptions = $(this).children("option").length;
    var selectName = $(this).attr("name");

    $this.addClass("select-hidden");
    if ($this.hasClass("styled")) {
      $this.wrap('<div class="select styled"></div>');
    } else {
      $this.wrap('<div class="select"></div>');
    }
    $this.after('<div class="select-styled"></div>');

    var $styledSelect = $this.next("div.select-styled");
    $styledSelect.text($this.children("option").eq(0).text());

    var $list = $("<ul />", {
      class: "select-options",
    }).insertAfter($styledSelect);

    for (var i = 0; i < numberOfOptions; i++) {
      $("<li />", {
        text: $this.children("option").eq(i).text(),
        rel: $this.children("option").eq(i).val(),
        "data-target": selectName,
      }).appendTo($list);
    }

    var $listItems = $list.children("li");

    $styledSelect.on("click", function (e) {
      e.stopPropagation();
      $("div.select-styled.active")
        .not(this)
        .each(function () {
          $(this).removeClass("active").next("ul.select-options").hide();
        });
      $(this).toggleClass("active").next("ul.select-options").toggle();
    });

    function makeSelect(target, selection) {
      //console.log(target);
      //console.log(selection);
      var optionToSelect = $("#" + target).find(
        "option[value='" + selection + "']"
      );
      optionToSelect.prop("selected", "selected");
      $("#" + target)
        .val(selection)
        .trigger("change");
      return false;
    }

    $listItems.click(function () {
      //e.stopPropagation();
      $styledSelect.text($(this).text()).removeClass("active");
      $this.val($(this).attr("rel"));
      var target = $(this).data("target");
      $list.hide();
      //console.log(target);
      makeSelect(target, $this.val());
    });

    $(document).click(function (event) {
      if (!$(event.target).find(".select-styled").hasClass(".active")) {
        $(".select-styled").removeClass("active");
        $(".select-options").hide();
      }
    });
  });
}

function setSelected() {
  if ($("body").hasClass("newsroom")) {
    $(".select").each(function () {
      var selVal = $(this).find("select option:selected").val();
      console.log("Selected: " + selVal);
      $(this)
        .find(".select-options")
        .find('li[rel ="' + selVal + '"]')
        .click();
    });
  }
}
