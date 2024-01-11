(function($) {

    document.addEventListener('DOMContentLoaded', function () {
      var swiper = new Swiper('.product-swiper', {
        slidesPerView: 4, // Display four slides at a time
        spaceBetween: 10,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
      });
    });

})(jQuery);