$(window).resize(function() {
    if (this.resizeTO) clearTimeout(this.resizeTO);
    this.resizeTO = setTimeout(function() {
        $(this).trigger('resizeEnd');
    }, 260);
});

$(window).bind('resizeEnd', function() {});

$(window).scroll(function() {
    if ($(window).scrollTop() > $('.header').height()) {
        $('body').addClass('scrolled-post-header');
    } else {
        $('body').removeClass('scrolled-post-header');
    }
});

$(document).ready(function() {});

$(window).on("load", function() {
    setTimeout(function() {
        $('body').toggleClass('page-loading page-loaded');
    }, 250);
});
