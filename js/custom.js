$(document).ready(function () {
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      $('.scrollup').fadeIn();
    } else {
      $('.scrollup').fadeOut();
    }
  });
  $('.scrollup').click(function () {
    $("html, body").animate({ scrollTop: 0 }, 500);
    return false;
  });
  $('.tooltip-add').tooltip({ selector: "a" });
});


// home Carousel
$(document).ready(function () {
  $("#FeaturedSliderHome").owlCarousel({
    items: 4,
    lazyLoad: true,
    navigation: true
  });

});

// partners Carousel
$(document).ready(function () {
  $("#partnersSliderHome").owlCarousel({
    items: 6,
    lazyLoad: true,
    navigation: true,
    autoHeight: true,
    itemsDesktop: [1199, 6],
    itemsDesktopSmall: [979, 5],
    itemsTablet: [768, 4],
    itemsTabletSmall: false,
    itemsMobile: [479, 3],
  });

});


//categories accordion
$(document).ready(function () {

  $('#productsAccordion > ul > li:has(ul)').addClass("has-sub");

  $('#productsAccordion > ul > li > a').click(function () {
    var checkElement = $(this).next();

    $('#productsAccordion li').removeClass('active');
    $(this).closest('li').addClass('active');


    if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
      $(this).closest('li').removeClass('active');
      checkElement.slideUp('normal');
    }

    if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
      $('#productsAccordion ul ul:visible').slideUp('normal');
      checkElement.slideDown('normal');
    }

    if (checkElement.is('ul')) {
      return false;
    } else {
      return true;
    }
  });

  $('.carousel').carousel({
    padding: 100
  });

  setInterval(() => {
    $(".carousel").carousel("next");
  }, 3000);

});


