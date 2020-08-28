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
  $('.carousel').carousel({
    padding: 100
  });
  setInterval(() => {
    $(".carousel").carousel("next");
  }, 3000);
  $("#query-form").submit((e) => {
    e.preventDefault();
    // console.log($(e.target).serialize());
    $.ajax({
      url: "php/query.php",
      method: "POST",
      data: $(e.target).serialize(),
      beforeSend: () => {
        // console.log("Sending");
        $("#query-form button img").removeClass("hide");
        $("#query-form button span").text("Sending");
      },
      success: (data, status) => {
        console.log(data, status);
        var object = JSON.parse(data);
        $("#query-form .alert").text(object.message).removeClass("hide");
        // M.toast({
        //     html: object.message
        // });
        if (object.status == "success") {
          $("#query-form .alert").addClass("alert-success");
          e.target.reset();
        } else {
          $("#query-form .alert").addClass("alert-warning");
        }
      },
      error: (data, status) => {
        $("#query-form .alert").text(object.message).addClass("alert-error").removeClass("hide");
        // M.toast({
        //     html: JSON.parse(data).message
        // });
        console.log(data, status);
      },
      complete: () => {
        $("#query-form button img").addClass("hide");
        $("#query-form button span").text("Send again");
      }
    });
  });
});
