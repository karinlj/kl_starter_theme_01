jQuery(document).ready(function ($) {
  //latest_updates_section
  $(".updates_tabs li:first").find("a").addClass("active");
  $(".updates_tab_content").hide();
  $(".updates_tab_content:first").show();
  // Click function
  $(".updates_tabs li").click(function () {
    $(".updates_tabs li a").removeClass("active");
    $(this).find("a").addClass("active");
    $(".updates_tab_content").hide();

    var activeTab = $(this).find("a").attr("href");
    $(activeTab).fadeIn();
    return false;
  });

  //faq_accordion_section
  //toggle aria-attribute and style state open
    $(".accordion_btn").click(function (e) {
    e.currentTarget.classList.toggle("open");
    $(this).attr("aria-expanded", function (index, attr) {
      return attr == "true" ? "false" : "true";
    });
  });


  // $(window).on("load", function () {
  var path = window.location.pathname;
  if (path.indexOf("blog") >= 0) {
    $(".most-recent").addClass("current-misse");
  }
  // });
  //Menu Desktop
  //toggle class
  $("nav ul li.menu-item-has-children").click(function (event) {
    event.stopPropagation(); // to stop the 'document handler' from activating
    $(this).toggleClass("is_open");
    $(this)
      .children("a")
      .attr("aria-expanded", function (index, attr) {
        console.log("expanded", attr);
        return attr == "true" ? "false" : "true";
      });

    $(this).children("ul").toggleClass("sub-menu-open");
  });
  //Remove class clicking anywhere on page
  $(document).click(function (event) {
    if (
      !$(event.target).closest("nav ul li.menu-item-has-children ul").length
    ) {
      $("nav ul li.menu-item-has-children ul").removeClass("sub-menu-open");
    }
  });

  //Mobile menu
  //toggle classes and attributes
  $(".menu_toggle_btn").click(function () {
    $(this).toggleClass("btn_clicked");
    let expanded = $(this).attr("aria-expanded") === "true";
    $(this).attr("aria-expanded", !expanded);
    $(".nav-mobile").toggleClass("menu_open");
    $("body").toggleClass("no_scroll");
  });
  $(".nav-mobile ul li.menu-item-has-children").click(function (event) {
    event.stopPropagation();
    $(this).toggleClass("is_open");
    let subExpanded = $(this).children("a").attr("aria-expanded") === "true";
    $(this).children("a").attr("aria-expanded", !subExpanded);
    $(this).children("ul").toggleClass("sub-menu-open");
  });


});
document.ready;
