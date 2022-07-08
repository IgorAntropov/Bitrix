$(document).ready(function () {
    $('table').each(function () {
        $(this).addClass('table table-bordered').wrap("<div class='news-table'></div>");
    });

    $('.info-page__text img').each(function () {
        var link = $(this).attr('src');
        $(this).wrap("<a data-fancybox='gallery' href="+link+"></a>")
    });

    $('.gallery-slider br').remove();
    $('.gallery-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: true,
        autoplay: true,
        autoplaySpeed: 8000,
        pauseOnFocus: true,
        pauseOnHover: true,
        pauseOnDotsHover: true,
        adaptiveHeight: true
    });

    if ($('.thumb-wrap').length > 0) {
        $('.thumb-wrap').wrap("<div class='row justify-content-center'><div class='col-md-9'></div></div>");
    }
});