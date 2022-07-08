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

    if ($('.monthdiegst').length > 0){
        if ($('.weeknews-slick').length > 0) {
            $('.weeknews-slick').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: false,
                dots: false,
                adaptiveHeight: true,
                infinite: true,
                draggable: true,
                autoplay: true,
                autoplaySpeed:1000,
            });
        }
        if($('.weeknews__banner-slider').length > 0){
            $('.weeknews__banner-slider').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade:true,
                dots: false,
                autoplay: true,
                autoplaySpeed:2000,
                pauseOnFocus: false,
                pauseOnHover: false,
                pauseOnDotsHover: false
            })
        }
    }

    //slick на страницу новостного дайджеста
    if ($('.weeknews-slick').length > 0) {
        $('.weeknews-slick').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            fade: false,
            dots: false,
            adaptiveHeight: true,
            infinite: true,
            draggable: true,
            prevArrow: '<div class="slider__nav-arrow slider__nav-arrow--left">' +
                '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50.5 96"><polygon points="4.9 48 50.5 2.5 48 0 0 48 48 96 50.5 93.5 4.9 48"></polygon></svg>' +
                '</div>',
            nextArrow: '<div class="slider__nav-arrow slider__nav-arrow--right">' +
                '<svg class="big-banner__nav-img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50.5 96"><polygon points="45.5 48 0 93.5 2.5 96 50.5 48 2.5 0 0 2.5 45.5 48"></polygon></svg>' +
                '</div>',
        });
    }
    if($('.weeknews__banner-slider').length > 0){
        $('.weeknews__banner-slider').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: false,
            fade: true,
            autoplay: true,
            autoplaySpeed:700,
            pauseOnFocus: false,
            pauseOnHover: false,
            pauseOnDotsHover: false
        })
    }

    $(document).on('click', '.digest__nav a', function (e) {
        e.preventDefault();
        $('.digest__nav a').removeClass('active');
        if($(e.target)[0].tagName === 'A'){
            var target = ($(e.target).attr('href')).substring(1);
        } else {
            var target = ($(e.target).parent().attr('href')).substring(1);
        }
        $('.digest__nav a[href="#' + target + '"]').addClass('active');
        var destination = $('#'+target).offset().top - $('.header').height() - 30;
        $('html, body').animate({ scrollTop: destination }, 300);
        return false;
    });

    function isInViewport(element) {
        var rect = element.getBoundingClientRect();
        return (
            rect.top <= 170 && rect.bottom >= 170
        );
    }

    function highlightMenu(elem){
        var elemName = $(elem).attr('id');
        if(isInViewport(elem)){
            $('.digest__nav a[href="#'+elemName+'"]').addClass('active');
        } else {
            $('.digest__nav a[href="#'+elemName+'"]').removeClass('active');
        }
    }

    $(window).scroll(function(){
        $('.weeknews__div').each(function(index,el){
            var rect = el.getBoundingClientRect();
            highlightMenu(el);
        });
    })
});