$(window).on("load", function() {
    setTimeout(function() {
        $('.loading-screen').fadeOut(260, function() {
            $('.loading-screen, #loading-style').remove();
        });
    }, 500);
});


(function($) {

    $('[data-cookies-accept]').click(function(e) {
        var __this = $(this);
        var cookieBanner = __this.closest('.cookie-banner');
        $.ajax({
            method: "GET",
            url: "/wp-content/themes/startkit/php-actions/set-cookie.php",

        }).done(function(data) {
            __this.closest('.cookie-banner').animate({
                height: '0px'
            }, 260, function() {
                cookieBanner.remove();
            });
        });
    });

    $('.slider').slick({
        prevArrow: '<div class="slick-arrow--prev"><span class="slick-arrow__icon"><i class="far fa-angle-left"></i></span></div>',
        nextArrow: '<div class="slick-arrow--next"><span class="slick-arrow__icon"><i class="far fa-angle-right"></i></span></div>',
        autoplay: true,
        autoplaySpeed: 4500
    });

})(jQuery);
