if (!siteDir) {
    var siteDir = '/';
}
if (!SITE_ID) {
    var SITE_ID = '';
}

function ready(fn) {
    if (document.attachEvent ? document.readyState === "complete" : document.readyState !== "loading") {
        fn();
    } else {
        document.addEventListener('DOMContentLoaded', fn);
    }
}

var fn = function () {
    var hellopreloader = document.getElementById("preloader_block");
    window.onload = function () {
        fadeOutnojquery(hellopreloader);
    };
    setTimeout(function () {
        fadeOutnojquery(hellopreloader);
    }, 1500);

    function fadeOutnojquery(el) {
        el.style.opacity = 1;
        var interhellopreloader = setInterval(function () {
            el.style.opacity = el.style.opacity - 0.05;
            if (el.style.opacity <= 0.05) {
                clearInterval(interhellopreloader);
                hellopreloader.style.display = "none";
            }
        }, 15);
    }
};

ready(fn);

(function ($) {
    $(document).ready(function () {
        //сортировка таблиц
        TableSorter();
        //инициализация слайдеров
        SliderInit();
        //скролл вверх
        ToTheTop();
        //мобильное меню
        MobileMenu();
        //открытие поиска
        OpenBlock();
        //переключение между Авторизация/Регистрация
        AuthReg();
        //переход по ссылке вернуться
        BackHistory();
        //селекты
        SelectFunc();
        //события в фильтре
        FilterFunc();
        //слайдер цены
        PriceSlider();
        //действия на странице Вопрос-ответ
        FaqFunc();
        //количество товаров
        BuyFunc();
        //видео plyr
        PlyrInit();
        //валидация форм
        ValidateForm();
        //переключение закладок в профиле
        ProfileTab();
        //активные пункты в фильтре
        CatalogSectionInFilter();
        //сортировка в каталоге
        CatalogSorting();
        //отображение прелоадера при фильтрации
        PreloadFilter();
        //подключение календаря
        DatePicker();
        //отображение результатов фильтрации, аякс
        CatalogFilterAjax();
        //переход на сраницу оформления заказа в мобильном по клику вместо открытия миникорзины
        CartButtonOnMobile();
        //форма настроек сайта
        FormSetting();
        //действия на странице сравнения товаров
        CompareFunc();
        CompareChangeSection();
        // форма обратной связи на странице контакты
        SendContactsForm();
        // форма подписаться на новостти
        SendSubscribeForm();
        //кастомный скролл
        ScrollInit();
        //страница избранных товаров
        FavoriteFunc();
        //прилипание блока в корзине
        StickyBlock();
        //лайки к новостям
        LikeAction();
        //подбор размера шрифта в поле ввода поиска
        ChangeSizeFontInSearch();
        //табы в контактах
        ContactTab();
        //маска для форм
        MaskInput();
        //перенос текста
        HyphenateInit();
        //высота картинки в разделе Информация
        SetImgHeight();
        //скролл в списке магазинов по клику
        ScrollInStoreList();
        //переход в сравнение и избранное  только если есть товары
        CompareFavoriteLink();
        //постепенная загрузка изображений слайдера
        LazyLoadMainSlider();
        //липкий хедер
        StickyHeader();
        //ограничение для демоверсии
        DemoVersionFunction();
        //ховер по кнопке В козину после того, как товар добавлен
        ActionHover();
        //форма изменения статуса отправки ответа на сообщения в админке
        FeedbakFormStatus();
        //форма изменения списка пользователей, получающих уведомления
        NotificationFormUser();
        //проверяем italic на сайте
        FindItalic();
        //оборачиваем таблицы в блоки респонсив
        TableResponsiveWrapper();
        //изменяем тайтлы для кнопок на странице сравнения
        ChangeButtonTitlesOnComparePage();
        //фиксим картинки в главном слайдере по высоте
        MainSliderFixPictures();
        //обработчик повторения заказа
        RepeatOrder();
        //обработка seo-формы
        SeoForm();
        //разделы поиска
        ChangeSearchSection();
        //карточка товара, показать больше параметров
        ShowMoreInCard();
        //установка наценки на товары
        UpdatePricesIncrease();
        UpdateLocalPrice();
        //подсказки для статусов
        TooltipStatus();
        //функции для кастомных светильников
        MenuLampHrefButton();
        CustomProducts();
        CustomProducts2();
        CustomLampsFunctions();
        openCalc();
    });

    function openCalc() {
        $(document).on('submit', '#form-calc_6', function (e) {
            e.preventDefault();
            var urlPage = $('[data-service="CALC_RESET"]').attr('href');
            var action = $(this).serialize();
            var url = urlPage + '?' + action;
            $('.preloader_block_2').fadeIn();
            $.ajax({
                type: 'POST',
                url: url,
                success: function (response) {
                    if (response !== '') {
                        response = $(response);
                        var calcHtml = response.find('.block').html();
                        $('.news-detail .block').html(calcHtml);
                        // $('.input-with-btns').each(function () {
                        //     var block = $(this).parent();
                        //     block.addClass('input-with-btns--wrap').append('<div class=" input-with-btns--change input-with-btns--minus">-</div>').prepend('<div class="input-with-btns--change input-with-btns--plus">+</div>');
                        // });
                        $('.calc-block__section--result-table').addClass('active');
                        $('.preloader_block_2').fadeOut();
                    }
                }
            });
        });
    }

    function TooltipStatus() {
        if ($('.tooltip_status').length) {
            $('.tooltip_status').tooltipster({
                theme: 'tooltipster-shadow',
                touchDevices: false,
                maxWidth: 280
            });
        }
    }

    function UpdatePricesIncrease() {
        if ($('.update_prices_percent_input').length && $('.update_prices_percent_button').length) {
            $(document).on('click', '.update_prices_percent_button', function (e) {
                e.preventDefault();
                var input = $('.update_prices_percent_input');
                var oldValue = input.attr('data-start-value');
                var maxValue = input.attr('data-max-value');
                var newValue = input.val();
                if (oldValue && parseInt(maxValue) && newValue) {
                    oldValue = parseInt(oldValue);
                    maxValue = parseInt(maxValue);
                    newValue = parseInt(newValue);
                    if (newValue === oldValue) {
                        alert(LangConst.ARLIGHT_ARSTORE_ZNACENIE_NE_IZMENILO);
                    } else {
                        if (newValue < 0) {
                            alert(LangConst.ARLIGHT_ARSTORE_ZNACENIE_NE_MOJET_BY);
                        } else {
                            if (newValue > maxValue) {
                                alert(LangConst.ARLIGHT_ARSTORE_ZNACENIE_NE_MOJET_BY1 + maxValue + '%!');
                            } else {
                                $('.preloader_block').fadeIn();
                                $.ajax({
                                    url: siteDir + 'ajax/pricesIncreasePercents.php',
                                    data: 'newValue=' + newValue,
                                    type: 'POST',
                                    success: function (data) {
                                        if (data === 'ok') {
                                            alert(LangConst.ARLIGHT_ARSTORE_CENY_IMENENY);
                                        }
                                        $('.preloader_block').fadeOut();
                                    }
                                });
                            }
                        }
                    }
                }
            });
        }
    }

    function UpdateLocalPrice(){
        $(document).on('submit', '#change_price', function (e) {
            e.preventDefault();
            $('.preloader_block').fadeIn();
            $.ajax({
                url: '/ajax/pricesIncreasePercents.php',
                data: $(this).serialize(),
                type: 'POST',
                success: function (data) {
                    if(data === 'ok'){
                        alert('Цены успешно изменены!');
                    }else{
                        alert(data);
                    }
                    $('.preloader_block').fadeOut();
                }
            });
        });
    }

    function ShowMoreInCard() {
        $(document).on('click', '.specifications__text-more', function (e) {
            e.preventDefault();
            $(this).toggleClass('active');
            $('.specifications__text').toggleClass('active')
        });
        $(document).on('click', '.specifications__table-all', function (e) {
            e.preventDefault();
            $(this).toggleClass('active');
            $('.card__table').toggleClass('active')
        });
    }

    function ChangeSearchSection() {
        var item = localStorage.getItem("searchSectionActive");
        if (item > 0) {
            if ($('[data-search=' + item + ']').length > 0 && $('.button[data-search=' + item + ']').length > 0) {
                $('.button[data-search]').removeClass('active_el');
                $('.search-section').removeClass('active_el');
                $(document).find('[data-search=' + item + ']').addClass('active_el');
                $(document).find('.button[data-search=' + item + ']').addClass('active_el');
            } else {
                localStorage.removeItem("searchSectionActive");
            }
        }

        $(document).on('click', '.button[data-search]', function (e) {
            e.preventDefault();
            var item = $(this).attr('data-search');
            $('.button[data-search]').removeClass('active_el');
            $('.search-section').removeClass('active_el');
            $(document).find('[data-search=' + item + ']').addClass('active_el');
            $(document).find('.button[data-search=' + item + ']').addClass('active_el');
            localStorage.setItem("searchSectionActive", item);

        })
    }

    function SeoForm() {
        var sectionTable = $("#seo-table--sections");
        var productTable = $("#seo-table--products");
        if (sectionTable.length > 0) {
            sectionTable.tablesorter({
                sortList: [[0, 0]],
                widgets: ["filter"],
                widgetOptions: {
                    filter_external: '.search',
                    filter_reset: '.reset',
                    filter_searchFiltered: false,
                    filter_placeholder: {search: LangConst.ARLIGHT_ARSTORE_POISK}
                }
            });
        }
        if (productTable.length > 0) {
            productTable.tablesorter({
                sortList: [[0, 0]],
                widgets: ["filter"],
                widgetOptions: {
                    filter_external: '.search',
                    filter_reset: '.reset',
                    filter_searchFiltered: false,
                    filter_placeholder: {search: LangConst.ARLIGHT_ARSTORE_POISK}
                }
            });
        }

        //show/hide empty inputs
        $(document).on('click', '[data-show="empty"]', function (e) {
            e.preventDefault();
            $(this).hide();
            $('[data-show="all"]').show();

            $('.seo-table').addClass('search-empty');
            $('.seo-table tbody tr input[type="text"], .seo-table tbody tr textarea').each(function () {
                var value = $(this).val();
                if (!value)
                    $(this).parents('tr').addClass('is-empty');
            });
        });
        $(document).on('click', '[data-show="all"]', function (e) {
            e.preventDefault();
            $(this).hide();
            $('[data-show="empty"]').show();

            $('.seo-table').removeClass('search-empty');
            $('.seo-table tbody tr input[type="text"]').each(function () {
                $(this).parents('tr').removeClass('is-empty');
            })
        });


        function sendAjax(table, action) {
            $('.preloader_block').fadeIn();
            var tableRow = table.find('tbody tr');
            var data = {action: action, items: {}};
            tableRow.each(function () {
                var name = $(this).find('[data-seo="name"]').attr('data-seo-code');
                var title = $(this).find('[name="seo[title]"]').val();
                var keywords = $(this).find('[name="seo[keywords]"]').val();
                var descriptions = $(this).find('[name="seo[descriptions]"]').val();
                data.items[name] = {title: title, keywords: keywords, descriptions: descriptions};
            });
            $.ajax({
                type: 'POST',
                url: siteDir + 'ajax/seo_save.php',
                data: data,
                success: function (response) {
                    $('.preloader_block').fadeOut();
                },
                error: function (xhr) {
                    $('.preloader_block').fadeOut();
                    alert(LangConst.ARLIGHT_ARSTORE_VOZNIKLA_OSIBKA + xhr.responseCode);
                }
            });
        }

        $(document).on('click', '#seo-table--save', function (e) {
            e.preventDefault();
            sendAjax($('#seo-table--sections'), 'sections');
        });

        $(document).on('click', '#seo-table--pr---save', function (e) {
            e.preventDefault();
            var section = 'empty';
            if ($(this).data('section'))
                section = $(this).data('section');
            sendAjax($('#seo-table--products'), section);
        });
    }

    function ChangeButtonTitlesOnComparePage() {
        if ($('.buy-block__button--favorite').length) {
            $('.buy-block__button--favorite[data-slug="ADD_TO_FAVORITE"]').hover(function () {
                var that = $(this);
                that.attr('title', (that.hasClass('in_cart')) ? LangConst.ARLIGHT_ARSTORE_UBRATQ_IZ_IZBRANNOGO : LangConst.ARLIGHT_ARSTORE_DOBAVITQ_V_IZBRANNOE);
            });
            $('.buy-block__button--favorite[data-slug="ADD_TO_CART"]').hover(function () {
                var that = $(this);
                that.attr('title', (that.hasClass('in_cart')) ? LangConst.ARLIGHT_ARSTORE_PEREYTI_V_KORZINU : LangConst.ARLIGHT_ARSTORE_DOBAVITQ_V_KORZINU);
            });
        }
    }

    function TableResponsiveWrapper() {
        if ($('.news-detail .content__text table').length) {
            $('.news-detail .content__text table').each(function () {
                $(this).wrap("<div class='news_table_responsive'></div>");
            });
        }
    }

    function getStyle(elem) {
        if (window.getComputedStyle) return getComputedStyle(elem, null);
        else return elem.currentStyle;
    }

    function FindItalic() {
        $('body *').each(function () {
            if (getStyle(this).fontStyle === 'italic') {
                $(this).addClass('font_style_normal');
            }
        });

    }

    function RepeatOrder() {
        if ($('.repeat_order_init').length) {
            var articles = {};
            var names = {};
            $(document).on('click', '.repeat_order_init', function () {
                $('.preloader_block').fadeIn();
                $('.personal__order-list-item--table:not(.personal__order-list-item--title) .personal__order-list-col--vend').each(function () {
                    articles[$.trim($(this).text())] = $.trim($(this).parent().find('.personal__order-list-col--count').text());
                    names[$.trim($(this).text())] = $.trim($(this).parent().find('.personal__order-list-col--name').text());
                });
                $.ajax({
                    url: siteDir + 'ajax/ajax_repeat_order.php',
                    data: 'check=yes&data=' + JSON.stringify(articles),
                    type: 'POST',
                    success: function (data) {
                        var cartCount = parseInt($.trim($('.header__cart .header__count').text()));
                        if (cartCount || data !== 'ok') {
                            var popupHTML = '';
                            if (cartCount) {
                                popupHTML += '<div class="popup_order_repeat_text">' + LangConst.ARLIGHT_ARSTORE_V_VASEY_KORZINE_ESTQ + '</div>';
                            }
                            if (data !== 'ok') {
                                var articles = JSON.parse(data);
                                $(articles).each(function (index, item) {
                                    popupHTML += '<div class="popup_order_repeat_text">' + LangConst.ARLIGHT_ARSTORE_TOVAR + ' <b>' + names[item] + '</b> ' + LangConst.ARLIGHT_ARSTORE_V_DANNYY_MOMENT_NE_D + '</div>';
                                    delete articles[item];
                                });
                            }
                            $('.popup_order_repeat_messages').html(popupHTML);
                            $('.popup_order_repeat_opener').click();
                            $('.preloader_block').fadeOut();
                        } else {
                            $('.popup_order_repeat_continue').click();
                        }
                    }
                });

            });
            $(document).on('click', '.popup_order_repeat_continue', function () {
                $('.preloader_block').fadeIn();
                $.fancybox.close();
                $.ajax({
                    url: siteDir + 'ajax/ajax_repeat_order.php',
                    data: 'check=no&data=' + JSON.stringify(articles),
                    type: 'POST',
                    success: function (data) {
                        if (data === 'ok') {
                            window.location.href = siteDir + 'order/';
                        }
                    }
                });
            });
            $(document).on('click', '.popup_order_repeat_closer, .popup_order_repeat_cancel', function () {
                $.fancybox.close();
            });
        }
    }

    function MainSliderFixPictures() {
        if ($('.banner-slider .slide__img img').length) {
            $('.banner-slider .slide__img img').each(function () {
                var a = $(this).height();
                var b = $(this).parents('.slide__img').height();
                if (parseFloat(a) && parseFloat(a) > 100 && parseFloat(a) < parseFloat(b)) {
                    $(this).css({'height': '100%', 'width': 'auto'});
                }
            });
        }
    }

    function ChangeButtonTitlesOnComparePage() {
        if ($('.buy-block__button--favorite').length) {
            $('.buy-block__button--favorite[data-slug="ADD_TO_FAVORITE"]').hover(function () {
                var that = $(this);
                that.attr('title', (that.hasClass('in_cart')) ? LangConst.ARLIGHT_ARSTORE_UBRATQ_IZ_IZBRANNOGO : LangConst.ARLIGHT_ARSTORE_DOBAVITQ_V_IZBRANNOE);
            });
            $('.buy-block__button--favorite[data-slug="ADD_TO_CART"]').hover(function () {
                var that = $(this);
                that.attr('title', (that.hasClass('in_cart')) ? LangConst.ARLIGHT_ARSTORE_PEREYTI_V_KORZINU : LangConst.ARLIGHT_ARSTORE_DOBAVITQ_V_KORZINU);
            });
        }
    }

    function TableResponsiveWrapper() {
        if ($('.news-detail .content__text table').length) {
            $('.news-detail .content__text table').each(function () {
                $(this).wrap("<div class='news_table_responsive'></div>");
            });
        }
    }

    function getStyle(elem) {
        if (window.getComputedStyle) return getComputedStyle(elem, null);
        else return elem.currentStyle;
    }

    function FindItalic() {
        $('body *').each(function () {
            if (getStyle(this).fontStyle === 'italic') {
                $(this).addClass('font_style_normal');
            }
        });

    }

    function NotificationFormUser() {
        $(document).on('click', '.note_order_add', function (e) {
            e.preventDefault();
            var input = $(this).prev('p').html();
            $(this).before('<p>' + input + '</p>');
        });

        $(document).on('submit', '#notifications_user', function (e) {
            e.preventDefault();
            var emailOrderAll = '';
            var emailFeedbackAll = '';
            var email1 = $(this).find('input[name="note_order"]');
            var email2 = $(this).find('input[name="note_feedback"]');
            email1.each(function () {
                var email = $(this).val();
                if (email.length > 0) {
                    emailOrderAll = emailOrderAll + ', ' + email
                }
            });
            email2.each(function () {
                var email = $(this).val();
                if (email.length > 0) {
                    emailFeedbackAll = emailFeedbackAll + ', ' + email
                }
            });
            emailOrderAll = emailOrderAll.slice(2);
            emailFeedbackAll = emailFeedbackAll.slice(2);
            var data = {emailOrderAll: emailOrderAll, emailFeedbackAll: emailFeedbackAll};
            $('.preloader_block').fadeIn();
            $.ajax({
                type: 'POST',
                url: siteDir + 'ajax/action_notifications_user.php',
                data: data,
                success: function (data) {
                    if (data === 'ok') {
                        location.reload();
                    }
                },
                error: function (xhr) {
                    alert(LangConst.ARLIGHT_ARSTORE_VOZNIKLA_OSIBKA + xhr.responseCode);
                }
            });
        })
    }

    function FeedbakFormStatus() {
        $(document).on('click', '.change-status--feedback', function (e) {
            e.preventDefault();
            $(this).hide();
            $(this).next('.change-status--feedback---form').show();
        });
        var select = $('select[name="status_filter_select"]');
        select.change(function () {
            var valStatus = $(this).val();
            var form = $(this).parents('form'),
                iblockID = form.attr('data-ibid'),
                elId = form.find('input[name="el-id"]').val(),
                data = {id: elId, ibId: iblockID, status: valStatus};

            $.ajax({
                type: 'POST',
                url: siteDir + 'ajax/action_change_feedback_status.php',
                data: data,
                success: function (data) {
                    var answer = '';
                    if (data === 'N') {
                        answer = '<div class="alert alert-success" role="alert">' + LangConst.ARLIGHT_ARSTORE_NOVYY + '</div>';
                    } else {
                        if (data === 'Y') {
                            answer = '<div class="alert alert-info" role="alert">' + LangConst.ARLIGHT_ARSTORE_OTVET_OTPRAVLEN + '</div>'
                        }
                    }
                    form.prev('.change-status--feedback').html(answer);
                    form.prev('.change-status--feedback').show();
                    form.hide();
                },
                error: function (xhr) {
                    alert(LangConst.ARLIGHT_ARSTORE_VOZNIKLA_OSIBKA + xhr.responseCode);
                }
            });
        });
    }

    function ActionHover() {
        $('.buy-block__button--submit').hover(function () {
                if ($(this).hasClass('in_cart')) {
                    var newText = $(this).attr('data-sendorder');
                    var oldText = $(this).text();
                    $(this).attr('data-old', oldText);
                    $(this).text(newText);
                }
            },
            function () {
                var oldText = $(this).attr('data-old');
                $(this).text(oldText);
            })
    }

    function DemoVersionFunction() {
        $(document).on('click', '#save-demo', function (e) {
            e.preventDefault();
            e.stopPropagation();
            alert(LangConst.ARLIGHT_ARSTORE_V_DEMO);
        });
    }

    function StickyHeader() {
        var header = $('header.header');
        var body = $('body');
        var type = $('body').attr('data-header');
        $(window).scroll(function () {
            if (type === 'scheme1') {
                if ($(window).scrollTop() < 290) {
                    header.removeClass('header_fixed');
                    body.removeClass('header_fixed');
                } else {
                    header.addClass('header_fixed');
                    body.addClass('header_fixed');
                }
            } else {
                if ($(window).scrollTop() < 50) {
                    header.removeClass('header_fixed');
                    body.removeClass('header_fixed');
                } else {
                    header.addClass('header_fixed');
                    body.addClass('header_fixed');
                }
            }
        });
    }

    function TableSorter() {
        if ($("#tableUser").length > 0) {
            $("#tableUser").tablesorter({sortList: [[3, 0]]});
        }
    }

    function LazyLoadMainSlider() {
        var slider = $('.banner-slider');
        if (slider.length > 0) {
            var slide = $('.banner-slider [data-slick-index=0]');
            if (slide.length > 0) {
                var srcArr = slide.find('.slide__img picture').attr('data-srcset').split(', ');
                $.each(slide.find('.slide__img source'), function (i, item) {
                    $(item).attr('srcset', srcArr[i])
                });
                slide.find('.slide__img img').attr('src', srcArr[srcArr.length - 1]);

                slider.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
                    var slide = $('.banner-slider [data-slick-index=' + nextSlide + ']');
                    var srcArr = slide.find('.slide__img picture').attr('data-srcset').split(', ');
                    $.each(slide.find('.slide__img source'), function (i, item) {
                        $(item).attr('srcset', srcArr[i])
                    });
                    slide.find('.slide__img img').attr('src', srcArr[srcArr.length - 1]);
                    setTimeout(function () {
                        MainSliderFixPictures();
                    }, 100);
                });
            }
        }
    }

    function CompareFavoriteLink() {
        $(document).on('click', '.header__compare a, .header__favorite a', function (e) {
            e.preventDefault();
            var href = $(this).attr('href');
            var count = parseInt($(this).find('.header__count').html());
            if (count > 0)
                window.location = href;
        })
    }

    function ScrollInStoreList() {
        var scroll;
        var block = $("#map__list");
        $(document).on('dblclick', '.map__list-more a', function (e) {
            e.preventDefault();
            var h = block.find('.map__list-block').height();
            block.animate({scrollTop: h}, 500);
        });
        var timeInt;
        var time = 150;
        $(document).on('mousedown', '.map__list-more a', function (e) {
            e.preventDefault();
            scroll = parseInt(block.scrollTop());
            block.animate({scrollTop: scroll + 30}, time);
            timeInt = setInterval(function () {
                scroll = parseInt(block.scrollTop());
                block.animate({scrollTop: scroll + 30}, time);
            }, time);
        });
        $(document).on('mouseup', '.map__list-more a', function (e) {
            e.preventDefault();
            clearTimeout(timeInt);
        });

        if (block.length > 0) {
            if ($('.map__list-block').height() <= $('.map__list').height()) {
                $('.map__list-more').hide();
            }
        }
    }

    function SetImgHeight() {
        $('.news-item__img').each(function () {
            var wrap = $(this).find('a'),
                img = $(this).find('img'),
                hWr = wrap.height(),
                hImg = img.height();
            if (hImg < hWr) {
                img.addClass('fullheight')
            }
        })
    }

    function HyphenateInit() {
        var text = $('.newnews-item__content, .content__text, .content__text p, .content__text:not(a), .content__text:not(img), .card__description, .card__param-value, .news-item__text, .news-item__title span, .item__answer, .text-wrap p, .text-wrap li, .slide__description, .slide__title-text > a');
        var textLeft = $('.item__name span');
        var textCenter = $('.additional-goods__title');
        text.hyphenate('left');
        textLeft.hyphenate('left');
        textCenter.hyphenate('center');
    }

    function MaskInput() {
        var input = $("input[name='phone']:not(#phone), input[name='PERSONAL_PHONE'], input[name='field[USER][PHONE]'], input[name='REGISTER[PERSONAL_PHONE]'], input[name='order-phone']");
        var options = {
            onKeyPress: function (cep, e, field, options) {
                var mask;
                var masks = ['+0(000)000-00-00', '+000(00)000-00-00'];
                if (cep.indexOf('+375') === 0 || cep.indexOf('+3(75') === 0) {
                    mask = masks[1]
                } else {
                    mask = masks[0]
                }
                input.mask(mask, options);
            },
            clearIfNotMatch: false
        };

        if (input.val()) {
            var cep = input.val().trim();

            var mask;
            var masks = ['+0(000)000-00-00', '+000(00)000-00-00'];
            if (cep.indexOf('375') === 0 || cep.indexOf('3(75') === 0 || cep.indexOf('+375') === 0 || cep.indexOf('+3(75') === 0) {
                mask = masks[1]
            } else {
                mask = masks[0]
            }
            input.mask(mask, options);
        }

        //маска для главного номера телефона в шапке и футере
        var mainPhone = $('#send_main_setting #phone');
        if (mainPhone.length > 0) {
            var maskList = $.masksSort($.masksLoad("/local/templates/arlight/js/phones-ru.json"), ['#'], /[0-9]|#/, "mask");
            var maskOpts = {
                inputmask: {
                    definitions: {
                        '#': {
                            validator: "[0-9]",
                            cardinality: 1
                        }
                    },
                    //clearIncomplete: true,
                    showMaskOnHover: false,
                    autoUnmask: true,
                    clearMaskOnLostFocus: false
                },
                match: /[0-9]/,
                replace: '#',
                list: maskList,
                listKey: "mask",
                onMaskChange: function (maskObj, completed) {
                    if (completed) {
                        var hint = maskObj.name_ru;
                        if (maskObj.desc_ru && maskObj.desc_ru != "") {
                            hint += " (" + maskObj.desc_ru + ")";
                        }
                    }
                    $(this).attr("placeholder", $(this).inputmask("getemptymask"));
                }
            };
            mainPhone.inputmasks(maskOpts);
        }
    }

    function ContactTab() {
        $(document).on('click', '.info__menu-list--contact li a', function (e) {
            e.preventDefault();
            $('.info__menu-list--contact li a').removeClass('active_el');
            $(this).addClass('active_el');
            var href = $(this).attr('data-href');
            if (href !== 'all') {
                $('.contacts__item').hide();
                $('.contacts__item[data-href="' + href + '"]').show();
            } else {
                $('.contacts__item').show()
            }

        })
    }

    function ChangeSizeFontInSearch() {
        if ($(window).width() > 1200) {
            $('.header__search-form-block').append("<span class='changesearch'></span>");
            var input = $('.header__search-form-input'),
                wInput,
                wSpan,
                fSzInput,
                span = $('.changesearch');
            $(document).on('input', '.header__search-form-input', function () {
                span.text($(this).val());
                wInput = input.width();
                wSpan = span.width() + 200;
                if (wSpan > wInput) {
                    while (wSpan > wInput) {
                        fSzInput = parseInt(input.css('font-size'));
                        fSzInput = 0.95 * fSzInput;
                        input.css('font-size', '' + fSzInput + 'px');
                        span.css('font-size', '' + fSzInput + 'px');
                        wSpan = span.width();
                    }
                } else {
                    if (fSzInput < 110) {
                        while (wSpan < wInput) {
                            fSzInput = parseInt(input.css('font-size'));
                            fSzInput = 1.05 * fSzInput;
                            input.css('font-size', '' + fSzInput + 'px');
                            span.css('font-size', '' + fSzInput + 'px');
                            wSpan = span.width();
                        }
                    }
                }

            })
        }
    }

    function LikeAction() {
        $(document).on('click', '.like-link', function (e) {
            e.preventDefault();
            var type = $(this).attr('data-like'),
                newsId = $('.like-block').attr('data-newsId'),
                iblockID = $('.like-block').attr('data-iblock'),
                data = {type: type, id: newsId, ibId: iblockID},
                val,
                localValue = localStorage.getItem('news_' + newsId);

            if (!localValue) {
                $.ajax({
                    type: 'POST',
                    url: siteDir + 'ajax/action_like.php',
                    data: data,
                    success: function (data) {
                        val = data;
                        $('.like-link[data-like="' + type + '"] .like-block__txt').text(val);
                        localStorage.setItem('news_' + newsId, type);
                        $('.like-link[data-like="' + type + '"]').addClass('active_el');
                    },
                    error: function (xhr) {
                        alert(LangConst.ARLIGHT_ARSTORE_VOZNIKLA_OSIBKA + xhr.responseCode);
                    }
                });
            }
        });

        if ($('.news-detail .like-block').length > 0) {
            var newsId = $('.like-block').attr('data-newsId'),
                localValue = localStorage.getItem('news_' + newsId);
            if (localValue) {
                $('.like-link').addClass('disabled_el');
                $('.like-link[data-like="' + localValue + '"]').addClass('active_el');
            }
        }
    }

    function StickyBlock() {
        var menu = document.querySelector('.order__pay-block');
        var order = document.querySelector('.order.row');


        function Sticky() {
            if ($(window).width() > 768 && $(order).length > 0 && $(menu).length > 0) {
                var menuPosition2 = $(order).offset().top;
                var parw = $(menu).parent().width();
                var ScrBody = $(window).scrollTop();
                var ScrFooter = $('.footer').offset().top;
                var a = $(menu).height();
                var menuHeight = parseFloat($('.header__menu').outerHeight(true)) + 20;
                var b = ScrFooter - ScrBody - menuHeight - 20;
                if (ScrBody >= menuPosition2) {
                    $(menu).width(parw);
                    if (a > b) {
                        menu.style.top = 'auto';
                        menu.style.position = 'absolute';
                        menu.style.bottom = '-20px';
                    } else {
                        menu.style.bottom = 'auto';
                        menu.style.position = 'fixed';
                        menu.style.top = menuHeight + 'px';
                    }
                } else {
                    menu.style.position = 'static';
                    menu.style.top = '';
                }
            }
        }

        window.addEventListener('scroll', function () {
            Sticky();
        });

        $('.order.row').click(function () {
            Sticky();
        })
    }

    function FavoriteFunc() {
        $(document).on('click', '.favorite__result .compare__section a', function (e) {
            e.preventDefault();
            var n = $(this).attr('data-item');
            if (n !== 'all') {
                $('.compare__section a').removeClass('active_el');
                $(this).addClass('active_el');
                $('.item__main-block').hide();
                $('.item-group-marker[data-group="' + n + '"]').next().show();
            } else {
                $('.item__main-block').show();
            }
        })
    }

    favoriteFunc = function () {
        var groupID = $('.favorite__result .compare__section .button_transparent.active_el').attr('data-item');
        if (parseInt(groupID)) {
            if (!$('.item-group-marker[data-group="' + groupID + '"]').length && $('.favorite__result .compare__section .button_transparent:not(.active_el)').length) {
                $('.favorite__result .compare__section .button_transparent.active_el').parent('li').remove();
                $('.favorite__result .compare__section .button_transparent:not(.active_el)')[0].click();
            }
        }
    };

    function ScrollInit() {
        $('.scrollbar-macosx').scrollbar();
    }

    function SendContactsForm() {
        $('.contacts__form form').validate({
            rules: {
                test_input_contact: {
                    maxlength: 0
                }
            }
        });

        $(document).on('submit', '.contacts__form form', function (e) {
            var msg = $(this).serialize();
            e.preventDefault();
            $('.preloader_block').fadeIn();
            $.ajax({
                type: 'POST',
                url: siteDir + 'ajax/form_contacts.php',
                data: msg,
                success: function (msg) {
                    $('.preloader_block').fadeOut();
                    $('.contacts__form form').html('<div class="contacts__form-answer">' + LangConst.ARLIGHT_ARSTORE_VASE_SOOBSENIE_OTPRA + '</div>');
                },
                error: function (xhr, str) {
                    alert(LangConst.ARLIGHT_ARSTORE_VOZNIKLA_OSIBKA + xhr.responseCode);
                }
            });
        });

    }

    function SendSubscribeForm() {
        $('.subscribe__form form').validate({
            rules: {
                test_input_subscr: {
                    maxlength: 0
                }
            }
        });
        $('.footer__subscribe form').validate({
            rules: {
                test_input_subscr: {
                    maxlength: 0
                }
            }
        });

        function sendSubFormAll(form) {
            $(document).on('submit', form, function (e) {
                var msg = $(this).serialize();
                e.preventDefault();
                $('.preloader_block').fadeIn();
                $.ajax({
                    type: 'POST',
                    url: siteDir + 'ajax/form_subscribe.php',
                    data: msg,
                    success: function (msg) {
                        $('.preloader_block').fadeOut();
                        $(form).html('<div class="contacts__form-answer">' + LangConst.ARLIGHT_ARSTORE_PODPISKA_OFORMLENA + '</div>');
                    },
                    error: function (xhr, str) {
                        alert(LangConst.ARLIGHT_ARSTORE_VOZNIKLA_OSIBKA + xhr.responseCode);
                    }
                });
            });
        }

        sendSubFormAll('.subscribe__form form');
        sendSubFormAll('.footer__subscribe form');


    }

    function CompareFunc() {
        var styleBlock = '<div class="compare_different_block"><style>.compare__table-main .compare__body .compare__td.compare_different { color: #ef172f!important; } </style></div>';
        if (!$('.compare_different_block').length) $('.compare__result').before(styleBlock);
        $.each($('.compare__table-main .compare__row'), function (i, item) {
            var row = $(item),
                rowH = row.height();
            row.attr('data-numb', i).attr('data-height', rowH).height(rowH);

        });
        $.each($('.compare__table-left .compare__row'), function (i, item2) {
            $(this).attr('data-numb', i);
            var rowH = $('.compare__table-main .compare__row[data-numb="' + i + '"]').attr('data-height');
            var rowHLeft = $(this).height();
            if (parseFloat(rowH) > parseFloat(rowHLeft)) {
                $(item2).height(parseFloat(rowH));
            } else {
                $('.compare__table-main .compare__row[data-numb="' + i + '"]').attr('data-height', rowHLeft).height(rowHLeft);
            }
        });

        $('.compare__table-main .compare__body .compare__row').hover(
            function () {
                var number = $(this).attr('data-numb');
                $(this).children('.compare__td').css('background', '#F3D2D4');
                $('.compare__table-left .compare__row[data-numb="' + number + '"]').children('.compare__td').css('background', '#F3D2D4');
            }
            ,
            function () {
                var number = $(this).attr('data-numb');
                $(this).children('.compare__td').css('background', '');
                $('.compare__table-left .compare__row[data-numb="' + number + '"]').children('.compare__td').css('background', '');
            }
        );
        $('.compare__table-left .compare__body .compare__row').hover(
            function () {
                var number = $(this).attr('data-numb');
                $(this).children('.compare__td').css('background', '#F3D2D4');
                $('.compare__table-main .compare__row[data-numb="' + number + '"]').children('.compare__td').css('background', '#F3D2D4');
            }
            ,
            function () {
                var number = $(this).attr('data-numb');
                $(this).children('.compare__td').css('background', '');
                $('.compare__table-main .compare__row[data-numb="' + number + '"]').children('.compare__td').css('background', '');
            }
        );
        $.each($('.compare__table-wrap2'), function (i, item) {
            if ($(item).is(":visible")) {
                $.each($(item).find('.compare__table-main .compare__row'), function (i2, item2) {
                    var dataNumber = $(item2).attr('data-numb');
                    if ($.trim($(item2).text()) === '') {
                        $(item).find('.compare__table-main .compare__row[data-numb="' + dataNumber + '"]').detach();
                        $(item).find('.compare__table-left .compare__row[data-numb="' + dataNumber + '"]').detach();
                    } else {

                        if ($(item).find('.compare__td-title').length > 1) {
                            if (!$(item2).parent('div').hasClass('compare__head')) {
                                var valuesArr = {};
                                $.each($(item2).find('.compare__td'), function (i3, item3) {
                                    valuesArr[$.trim($(item3).text())] = true;
                                });
                                var size = Object.keys(valuesArr).length;
                                if (size > 1) {
                                    var propName = $.trim($(item).find('.compare__table-left .compare__row[data-numb="' + dataNumber + '"] .compare__td').text());
                                    if (propName !== LangConst.ARLIGHT_ARSTORE_NAIMENOVANIE && propName !== LangConst.ARLIGHT_ARSTORE_ARTICUL) {
                                        $(item).find('.compare__table-main .compare__row[data-numb="' + dataNumber + '"] .compare__td').addClass('compare_different');
                                    }
                                }
                            }
                        }
                    }
                });
            }
        });
        $('.scrollbar-outer').scrollbar();
    }

    compareFunc = function () {
        $.each($('.compare__table-wrap2'), function (i, item) {
            if ($(item).is(":visible")) {
                if ($(item).find('.compare__table-main .compare__body .compare__td-title').length) {
                    $('.compare__row .compare__td').removeClass('compare_different');
                    CompareFunc();
                } else {
                    if ($('.compare__result .compare__section .button_transparent:not(.active_el)').length) {
                        $('.compare__result .compare__section .button_transparent.active_el').parent('li').remove();
                        $('.compare__result .compare__section .button_transparent:not(.active_el)')[0].click();
                    }
                }
            }
        });
    };

    function CompareChangeSection() {
        $(document).on('click', '.compare__section a', function (e) {
            e.preventDefault();
            var n = $(this).attr('data-item');

            $('.compare__section a').removeClass('active_el');
            $('.compare__row .compare__td').removeClass('compare_different');
            $(this).addClass('active_el');
            $('.compare__table-wrap2').hide();
            $('.compare__table-wrap2[data-item="' + n + '"]').show();
            $.each($('.compare__table-main .compare__row'), function (i, item) {
                var row = $(item);
                row.attr('data-numb', i).height('auto');
            });
            $.each($('.compare__table-left .compare__row'), function (i, item) {
                var row = $(item);
                row.attr('data-numb', i).height('auto');
            });
            CompareFunc();
        })
    }


    function FormSetting() {

        $(document).on('click', '.tablink', function (e) {
            e.preventDefault();
            $(this).next('.tabcontent').slideToggle();
        });

        $(document).on('click', '.shop__name-edit', function (e) {
            e.preventDefault();
            $(this).prev('form').slideToggle();
        });

        //подсчет вводимых символов
        $(document).on('input', '#header_message_text', function () {
            var lengthInput = 30 - parseInt($(this).val().length);
            var text;
            if (lengthInput >= 0) {
                text = '. '+LangConst.ARLIGHT_ARSTORE_OSTALOS_VVESTI+' - ' + lengthInput;
            } else {
                text = '. '+LangConst.ARLIGHT_ARSTORE_BOLSCHE_SIMV+''
            }
            $('label[for="header_message_text"] span').html(text);
        });

        //подставление класса иконки в инпут
        $(document).on('click', '.header_message_icon-item', function (e) {
            e.preventDefault();
            $('.header_message_icon-item').removeClass('active_el');
            $(this).addClass('active_el');
            var value = $(this).attr('data-icon');
            $('#header_message_icon').val(value);
        });
        //выделение активной иконки по инпуту
        var icon = $('#header_message_icon').val();
        $('.header_message_icon-item[data-icon="' + icon + '"]').addClass('active_el');

        //выбор цветовой схемы
        $(document).on('click', '.color-scheme-items', function () {
            var val = $(this).attr('data-scheme');
            $('.color-scheme-items').removeClass('active_el');
            $(this).addClass('active_el');
            $('#data-color-scheme').val(val);
            $('body').attr('data-color', val);
        });
        var colorScheme = $('#data-color-scheme').val();
        $('.color-scheme-items[data-scheme="' + colorScheme + '"]').addClass('active_el');

        //выбор font family схемы
        $(document).on('click', '.font-scheme-items', function () {
            var val = $(this).attr('data-font');
            $('.font-scheme-items').removeClass('active_el');
            $(this).addClass('active_el');
            $('#data-font-scheme').val(val);
            $('body').attr('data-font', val);
        });
        var fontScheme = $('#data-font-scheme').val();
        $('.font-scheme-items[data-font="' + fontScheme + '"]').addClass('active_el');

        //выбор cхемы header
        $(document).on('click', '.header-scheme-items', function () {
            var val = $(this).attr('data-header');
            $('.header-scheme-items').removeClass('active_el');
            $(this).addClass('active_el');
            $('#data-header-scheme').val(val);
            $('body').attr('data-header', val);
        });
        var headerScheme = $('#data-header-scheme').val();
        $('.header-scheme-items[data-header="' + headerScheme + '"]').addClass('active_el');

        //добавление дополнительных полей ввода телефона и email
        $(document).on('click', '.add_input', function (e) {
            e.preventDefault();
            var input = $(this).prev('input'),
                copy = input.clone().val('').attr('data-default', '').attr('value', '').attr('data-required', 'false');
            $(this).before(copy);
        });

        //добавление формы нового магазина
        $(document).on('click', '.add-shop', function (e) {
            e.preventDefault();
            var time = new Date();
            var timeForId = Date.parse(time);
            $(".settings__shop-list-hide").clone().insertBefore($(this)).removeClass('settings__shop-list-hide').wrap("<form class='form_shop' id='" + timeForId + "'></form>");
            $(this).before("<hr>");
        });
        //удаление формы нового магазина
        $(document).on('click', '.settings__shop-list--del', function (e) {
            e.preventDefault();
            $(this).parents('.form_shop').next('hr').remove();
            $(this).parents('.form_shop').remove();
        });
        //удаление существующего магазина
        $(document).on('click', '.shop__name-del', function (e) {
            e.preventDefault();
            $(this).parents('.shop__wrap').addClass('add-hidden').append('<div class="mess"><span>' + LangConst.ARLIGHT_ARSTORE_MAGAZIN_BUDET_UDALEN + '</span> <a href="javascript:void(null);" class="remove-hidden">' + LangConst.ARLIGHT_ARSTORE_OTMENITQ_UDALENIE + '</a></div>');
            $(this).parents('.shop__wrap').find('input[name="delete"]').val('true');
        });
        $(document).on('click', '.remove-hidden', function (e) {
            e.preventDefault();
            $(this).parents('.shop__wrap').find('input[name="delete"]').val('false');
            $(this).parents('.shop__wrap').removeClass('add-hidden');
            $(this).parents('.shop__wrap').find("div.mess").remove();

        });
        $(document).on('input', 'input[name="shop-geo"]', function () {
            $(this).val(($(this).val()).replace(/\s/g, ''));
        });

        //валидация полей формы настроек
        function ValidInput(input) {
            var pattern;
            input.removeClass('is-invalid');
            input.next('.invalid-feedback').remove();
            if (input.val() !== '') {
                if (input.attr('type') === 'email') {
                    pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,7}\.)?[a-z]{2,7}$/i;
                } else {
                    if (input.attr('type') === 'tel') {
                        pattern = /^\+?[0-9\-?\(?\)?\s?]{7,30}$/g;
                    } else {
                        if (input.attr('name') === 'shop-geo') {
                            pattern = /^\-?\d{1,3}\.\d{1,}\,\-?\d{1,3}\.+\d{1,}$/g;
                        }
                    }
                }

                if (pattern !== undefined) {
                    if (pattern.test(input.val())) {
                        input.removeClass('is-invalid');
                        input.next('.invalid-feedback').remove();
                    } else {
                        input.addClass('is-invalid').after("<div class='invalid-feedback'></div>");
                        input.next('div.invalid-feedback').text(LangConst.ARLIGHT_ARSTORE_VVEDITE_VERNOE_ZNACE);
                    }
                }
            } else {
                if (input.attr('data-required') === 'true') {
                    input.addClass('is-invalid').after("<div class='invalid-feedback'></div>");
                    input.next('div.invalid-feedback').text(LangConst.ARLIGHT_ARSTORE_ETO_POLE_DOLJNO_BYTQ);
                }
            }
        }

        function appendArray(form_data, values, name) {
            if (!values && name)
                form_data.append(name, '');
            else {
                if (typeof values == 'object') {
                    for (key in values) {
                        if (typeof values[key] == 'object')
                            appendArray(form_data, values[key], name + '[' + key + ']');
                        else
                            form_data.append(name + '[' + key + ']', values[key]);
                    }
                } else
                    form_data.append(name, values);
            }
            return form_data;
        }

        var valid;

        $(document).on('click', '#save_admin_settings', function (e) {
            e.preventDefault();

            valid = true;

            var form1 = $('#send_main_setting'),
                form2 = $('#send_main_setting_logo'),
                form3 = $('.form_shop'),
                img_shop_input = $('.form_shop input[type="file"]'),
                form4 = $('#send_setting_header');
            var sendData = new FormData();

            $.each(form1.find('input'), function (i, item) {
                var input = $(item);
                if ($(input).attr('type') === 'checkbox') {
                    if ($(this).prop('checked') === true) {
                        $(this).val('Y')
                    } else {
                        $(this).val('N')
                    }
                }
                if (input.attr('data-default') !== input.val()) {
                    sendData.append(input.attr('name'), $.trim(input.val()));
                }

                //преобразование номера телефона с учетом маски
                if (input.attr('id') === 'phone' && input.attr('data-default') !== input.val()) {
                    var plHolderPhone = (input.attr('placeholder')).replace(/,/g, '');
                    var valPhoneAr = input.val().split('');
                    i = 0;
                    while (plHolderPhone.indexOf('_') >= 0) {
                        plHolderPhone = plHolderPhone.replace('_', valPhoneAr[i]);
                        i++;
                    }
                    sendData.append(input.attr('name'), $.trim(plHolderPhone));
                }
            });

            $.each(form2.find('input[type="file"]'), function (i, item) {
                var input = $(item);
                if (input.val() !== input.attr('data-default') && this.files.length) {
                    sendData.append('new_files', 'true');
                    sendData.append(input.attr('name'), this.files[0]);
                }
            });


            //склеивание множественных телефонов и e-mail в один инпут
            $('input[name="shop-phone"]').each(function () {
                var val = [],
                    str;
                $(this).parents('.shop-phone').find('input[name="shop-phone-item"]').each(function () {
                    if ($(this).val() !== '') {
                        val[val.length] = $(this).val()
                    }
                });
                str = val.join(';');
                $(this).val(str);
            });

            $('input[name="shop-email"]').each(function () {
                var val = [],
                    str;
                $(this).parents('.shop-email').find('input[name="shop-email-item"]').each(function () {
                    if ($(this).val() !== '') {
                        val[val.length] = $(this).val()
                    }
                });
                str = val.join(';');
                $(this).val(str);
            });


            var ShopListAr = [],
                ShopList = {},
                ShopItem = {};

            $.each(form3, function (i, item) {
                var form = item,
                    id = $(form).attr('id');

                $.each($(item).find('input'), function (j, item_input) {
                    if ($(item_input).attr('type') === 'checkbox') {
                        if ($(this).prop('checked') === true) {
                            $(this).val('Y')
                        } else {
                            $(this).val('N')
                        }
                    }

                    var input = $(item_input),
                        name = input.attr('name'),
                        val = $.trim(input.val());

                    if (input.attr('data-default') !== input.val()) {
                        var timeName = (input.attr('name')).slice(0, -2);
                        if (timeName === "shop-time" || timeName === "shop-days") {
                            var shopInputsTime = input.parents('.shop-time').find('input');
                            shopInputsTime.each(function (i, el) {
                                var inputTime = $(el),
                                    nameTime = inputTime.attr('name');
                                ShopItem[nameTime] = $.trim(inputTime.val());
                            })
                        } else {
                            if (name.indexOf('shop-set') == -1)
                                ShopItem[name] = val;
                            else {
                                name = (name.slice(1)).slice(0, -1);
                                ShopItem[name] = val;
                            }
                        }
                    }
                });
                ShopList[id] = ShopItem;
                ShopItem = {};
            });
            //добавление изображений магазинов в formdata
            $.each(img_shop_input, function (i, item) {
                var input = $(item);
                // var idShopImg = input.parents('.form_shop').find('input[name="shop-id"]').val();
                var idShopImg = input.parents('.form_shop').attr('id');
                if (input.val() !== input.attr('data-default') && this.files.length) {
                    sendData.append('new_files_shop', 'true');
                    sendData.append((input.attr('name') + '_' + idShopImg), this.files[0]);
                }
            });

            //добавление списка измененных, добавленных магазинов в formdata
            appendArray(sendData, ShopList, 'ShopList');

            $.each(form4.find('input'), function (i, item) {
                var input = $(item);
                if (input.attr('data-default') !== input.val()) {
                    if (input.attr('type') !== 'radio')
                        sendData.append(input.attr('name'), $.trim(input.val()));
                    else {
                        if (input.attr('type') === 'radio' && input.prop("checked") === true) {
                            sendData.append(input.attr('name'), $.trim(input.val()));
                        }
                    }
                }
            });

            //проверка на наличие ошибок
            var InputsAll = $('#send_main_setting, .form_shop').find('input'),
                InputsAllInvalid = [];
            $.each(InputsAll, function (i, item) {
                ValidInput($(item));
                if ($(item).hasClass('is-invalid')) {
                    valid = false;
                    InputsAllInvalid[InputsAllInvalid.length] = $(item);
                }
                $(item).keyup(function () {
                    ValidInput($(this))
                });
                $(item).change(function () {
                    ValidInput($(this))
                })
            });

            if (valid === true) {
                $('.preloader_block').show();
                $.ajax({
                    url: siteDir + 'ajax/action_form_setting.php',
                    type: 'POST',
                    data: sendData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        $(window).unbind('beforeunload');
                        location.reload();
                    }
                });
            } else {
                InputsAllInvalid[0].focus();
            }
        });

        //перезагрузка страницы с несохраненными данными
        $(window).bind('beforeunload', function (e) {
            var changArr = [];
            $('.mainsetting input').each(function () {
                var def = $(this).attr('data-default');
                var defsoc = $(this).attr('data-value');
                if (def && def !== '' && $(this).val() && $(this).attr('id') !== 'phone') {
                    if (def !== $(this).val()) {
                        changArr.push($(this).val());
                    }
                }
                if (defsoc && defsoc !== '' && $(this).val()) {
                    if (defsoc !== $(this).val()) {
                        changArr.push($(this).val());
                    }
                }
            });
            if (changArr.length > 0)
                return LangConst.ARLIGHT_ARSTORE_VOMONO_IMENENIA;
        });

        //изменение внешнего вида загрузчика изображений лого
        $(document).on('click', '.file-upload-btn', function (e) {
            e.preventDefault();
            $(this).nextAll('.image-upload-wrap').find('.file-upload-input').trigger('click');
        });

        $(document).on('change', '.file-upload-input', function (e) {
            e.preventDefault();
            var wrap = $(this).parents('.image-upload-wrap'),
                name = this.files[0].name,
                error = $(this).parents('.image-upload-wrap').find('.error'),
                img = $(this).parents('.image-upload-wrap').nextAll('.file-upload-content').find('.file-upload-image'),
                content = $(this).parents('.image-upload-wrap').nextAll('.file-upload-content');


            if (this.files && this.files[0] && this.files[0].size < 5242880 && this.files[0].type === 'image/png') {
                var reader = new FileReader();
                error.html('');
                reader.onload = function (e) {
                    wrap.hide();
                    img.attr('src', e.target.result);
                    content.show();
                    img.nextAll('.image-title-wrap').find('.image-title').html(name);
                };
                reader.readAsDataURL(this.files[0]);
            } else {
                if (this.files[0].size > 5242880) {
                    error.html(LangConst.ARLIGHT_ARSTORE_IZOBRAJENIE_NE_DOLJN)
                }
                if (this.files[0].type !== 'image/png') {
                    error.html(LangConst.ARLIGHT_ARSTORE_IZOBRAJENIE_PNG)
                }
            }
        });
        $(document).on('click', '.remove-image', function (e) {
            e.preventDefault();
            var parent = $(this).parents('.file-upload');
            parent.find('.file-upload-input').val('');
            parent.find('.file-upload-input').replaceWith($('.file-upload-input').clone());
            parent.find('.file-upload-content').hide();
            parent.find('.image-upload-wrap').show();

        });

        //вставка координат из карты
        $(document).on('click', '.shop-checkpoint', function () {
            var IdShop = $(this).parents('form.form_shop').attr('id');
            $('#map_shop_popup').attr('data-forshop', IdShop);
        });

        $(document).on('click', '.map_shop_btn a', function (e) {
            e.preventDefault();
            var inputVal = $(this).prev().val();
            var IdShop = $(this).parents('#map_shop_popup').attr('data-forshop');
            $('form.form_shop#' + IdShop + '').find('.shop-coord input').val(inputVal);
            $.fancybox.close();
            $('#temp-coord').val('');
        })

    }


    function CartButtonOnMobile() {
        $(document).on('click', '.header__cart>a', function (e) {
            if ($(window).width() < 1200) {
                e.preventDefault();
                location.href = siteDir + "order/"
            }
        })
    }

    function CatalogFilterAjax() {
        $(document).on('click', '#modef .filter-block-result-col a', function (e) {
            $('.preloader_block').fadeIn(200);
        });
        $(document).on('click', '#modef2 .filter-block-result-col a', function (e) {
            e.preventDefault();
            $('#modef .filter-block-result-col a').click();
        });
    }

    function DatePicker() {
        var dateFormat = "mm/dd/yy",
            from = $("#from")
                .datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    changeYear: true,
                    numberOfMonths: 1
                })
                .on("change", function () {
                    to.datepicker("option", "minDate", getDate(this));
                }),
            to = $("#to").datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                changeYear: true,
                numberOfMonths: 1
            })
                .on("change", function () {
                    from.datepicker("option", "maxDate", getDate(this));
                });

        function getDate(element) {
            var date;
            try {
                date = $.datepicker.parseDate(dateFormat, element.value);
            } catch (error) {
                date = null;
            }

            return date;
        }
    }

    function PreloadFilter() {
        $(document).on('click', 'input[name="set_filter"], #del_filter', function () {
            $('.preloader_block').fadeIn(200);
        });
    }

    function CatalogSectionInFilter() {
        var link = $('.categories-list__link.active_el');
        link.parents('.categories-list--sub').prev('.categories-list__link').addClass('active_el');
        link.parents('.categories-list--sub').addClass('active_el');
        link.next('.categories-list--sub').addClass('active_el');
    }

    function setGetAttr(prmName, val) {
        var res = '';
        var d = location.href.split("#")[0].split("?");
        var base = d[0];
        var query = d[1];
        if (query) {
            var params = query.split("&");
            for (var i = 0; i < params.length; i++) {
                var keyval = params[i].split("=");
                if (keyval[0] != prmName) {
                    res += params[i] + '&';
                }
            }
        }
        res += prmName + '=' + val;
        return base + '?' + res;
    }

    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;
        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
    };

    function SelectFunc() {
        $(document).on('click', '.meta-info__sort', function () {
            $(this).children('ul').slideToggle();
        });
        $(document).on('click', '.meta-info__sort a', function (e) {
            e.preventDefault();
            var value = $(this).text().trim();
            var valueAttr = $(this).attr('data-value').trim();
            $(this).parents('.meta-info__sort').find('input').val(value).attr('data-value', valueAttr).change();
        });
        $(document).click(function (event) {
            if ($(event.target).closest(".info__sort li, .meta-info__sort-item").length) return;
            $('.meta-info__sort-list').slideUp();
            event.stopPropagation();
        });
    }

    function CatalogSorting() {

        if (getUrlParameter('catSortOrder')) {
            var key = getUrlParameter('catSortOrder');
            var key2 = $('.meta-info__sort input').val();
            if (key !== key2) {
                var valueText = $('a[ data-value=' + key + ']').text().trim();
                $('.meta-info__sort input').attr('data-value', key).val(valueText);
            }
        }
        var stopper = false;

        $(document).on('change', '.meta-info__sort input', function () {
            var value = $(this).attr('data-value');
            if (!stopper) {
                stopper = true;
                $('.preloader_block').fadeIn(200);
                window.location.href = setGetAttr('catSortOrder', value);
            }
        })
    }


    function ProfileTab() {
        $(document).on('click', '#personal .personal__tabs-link', function (e) {
            e.preventDefault();
            $('#personal .personal__tabs-link, #personal .personal__block').removeClass('active_el');
            var href = $(this).attr('data-block');
            $(this).addClass('active_el');
            $('#personal .personal__block[data-block="' + href + '"]').addClass('active_el');
        })
    }

    function ValidateForm() {
        $.validator.methods.email = function (value, element) {
            return this.optional(element) || /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,7}\.)?[a-z]{2,7}$/i.test(value);
        };

        var validator = $(".question form").validate({
            rules: {
                test_input: {
                    maxlength: 0
                }
            }
        });

        $("form[name='regform_popup']").validate();

        $(document).on('submit', '.question form', function () {
            FormQuest();
        });

        $(document).on('click', '.question__close', function () {
            validator.resetForm();
            $('.question .input').val('');
        });
        $(document).click(function (event) {
            if ($(event.target).closest(".question__block, .question").length) return;
            if (validator) {
                validator.resetForm();
                $('.question .input').val('');
                event.stopPropagation();
            }
        });

        $("#send_order").validate();

        $("#lamp_order").validate();

        $('#alulamp__request').validate();
        $(document).on('submit', '#alulamp__request', function () {
            var msg = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: siteDir + 'ajax/form.php',
                data: msg,
                success: function (msg) {
                    if (msg !== '' && isNaN(parseInt(msg)) === false) {
                        $.fancybox.open('<div class="popup popup-message">' + LangConst.ARLIGHT_ARSTORE_VASA_ZAAVKA_USPESNO + '</div>');
                        $('#alulamp__request input, #alulamp__request textarea').each(function () {
                            $(this).val('');
                        });
                    }
                },
                error: function (xhr, str) {
                    alert(LangConst.ARLIGHT_ARSTORE_VOZNIKLA_OSIBKA + xhr.responseCode);
                }
            });
        });
    }

    function FormQuest() {
        var msg = $('.question form').serialize();
        $('.question__col-center').addClass('preload');
        $('.question__col-center .question__col-block, .question__submit, .form__policy').hide();
        $.ajax({
            type: 'POST',
            url: siteDir + 'ajax/form.php',
            data: msg,
            success: function (msg) {
                if (msg !== '' && isNaN(parseInt(msg)) === false) {
                    $('.question__col-center').removeClass('preload').append('<div class="question__col-answer">' + LangConst.ARLIGHT_ARSTORE_VASE_SOOBSENIE_OTPRA + '</div>');
                    $('.question form input, .question form textarea').each(function () {
                        $(this).val('');
                    });
                    //YM
                    if (arGoalsYM['send-ask-form'] && arGoalsYM['send-ask-form']['id'] && arGoalsYM['send-ask-form']['name']) {
                        if (window.ym) {
                            ym(arGoalsYM['send-ask-form']['id'], 'reachGoal', arGoalsYM['send-ask-form']['name']);
                        }
                    }
                }
            },
            error: function (xhr, str) {
                alert(LangConst.ARLIGHT_ARSTORE_VOZNIKLA_OSIBKA + xhr.responseCode);
            }
        });

        $(document).on('click', '.question__close', function (e) {
            e.preventDefault();
            $('.question__col-answer').remove();
            $('.question__col-center .question__col-block, .question__submit, .form__policy').show();
        })
    }


    function PlyrInit() {
        if ($('.js-player').length > 0)
            var players = Plyr.setup('.js-player');
    }


    // DIDGO
    $(document).on('keyup', '#searchUser', function () {
        _this = this;
        $.each($("#tableUser tbody tr"), function () {
            if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
    });

    function BuyFunc() {
        $(document).on('mousedown', '.buy-block__button', function (e) {
            e.preventDefault();
            var input = $(this).siblings('input');
            var operation = $(this).html();
            var normal = parseFloat(input.attr('data-packnorm'));
            var val = parseFloat(input.val());

            var residual = (val % normal);
            if (residual !== 0) {
                if (operation === "+") {
                    input.val(val + normal - residual).change();
                } else {
                    if (operation === "-") {
                        if ((val - normal) < 0) {
                            input.val(0).change()
                        } else {
                            input.val(val - normal + residual).change();
                        }
                    }
                }
            } else {
                if (operation === "+") {
                    input.val(val + normal).change();
                } else {
                    if (operation === "-") {
                        if ((val - normal) < 0) {
                            input.val(0).change()
                        } else {
                            input.val(val - normal).change();
                        }
                    }
                }
            }
            input.blur();
        });
        $(document).on('click', '.buy-block__button', function (e) {
            e.preventDefault();
        });

        $(document).on('change', '.buy-block__input', function (e) {
            var val = parseFloat($(this).val());
            var normal = parseFloat($(this).attr('data-packnorm'));
            if (val <= 0 || !$(this).val()) {
                $(this).val(0)
            } else {
                var residual = Math.ceil(parseFloat(val / normal));
                if (residual !== 0) {
                    $(this).val(residual * normal)
                }
            }
        });
        //запрет ввода не цифровых символов
        $(document).on('keydown', '.buy-block__input', function (e) {
            if ((e.which >= 48 && e.which <= 57)  // цифры
                || (e.which >= 96 && e.which <= 105)  // num lock
                || e.which === 8 // backspace
                || e.which === 190 // .
                || e.which === 110 // .
                || (e.which >= 37 && e.which <= 40) // стрелки
                || e.which === 46) // delete
            {
                return true;
            } else {
                return false;
            }
        });


        $('.buy-block__input').bind("paste", function (e) {
            e.preventDefault();
        });
    }

    function FaqFunc() {
        $(document).on('click', '.faq .item__link', function (e) {
            e.preventDefault();
            $(this).parents('.item').toggleClass('active_el');
        })
    }

    function PriceSlider() {
        $('.slider-range').each(function () {
            $(this).slider({
                range: true,
                min: 0,
                max: 500,
                values: [0, 500],
                slide: function (event, ui) {
                    $(this).siblings().find('.slider-range--input-min').val(ui.values[0]);
                    $(this).siblings().find('.slider-range--input-max').val(ui.values[1]);
                }
            });
            $(this).siblings().find('.slider-range--input-min').val($(this).slider("values", 0));
            $(this).siblings().find('.slider-range--input-max').val($(this).slider("values", 1));
        });
    }

    function FilterFunc() {
        //-begin- переключатель радио для мощности
        $(document).on('change', '.filter-block__change-type input[type="radio"]', function () {
            if ($('.filter-block__change-type input#radio_1').prop("checked")) {
                $('.filter-block__item-toggle').removeClass('type2');
                $('.filter-block__change-type-block').removeClass('active_el');
                $('.filter-block__change-type-block-1').addClass('active_el');
            } else {
                if ($('.filter-block__change-type input#radio_2').prop("checked")) {
                    $('.filter-block__item-toggle').addClass('type2');
                    $('.filter-block__change-type-block').removeClass('active_el');
                    $('.filter-block__change-type-block-2').addClass('active_el');
                }
            }
        });
        $(document).on('click', '.filter-block__item-toggle', function () {
            $(this).toggleClass('type2');
            if ($(this).hasClass('type2')) {
                $('.filter-block__change-type input#radio_2').prop("checked", 'true');
                $('.filter-block__change-type-block').removeClass('active_el');
                $('.filter-block__change-type-block-2').addClass('active_el');
            } else {
                $('.filter-block__change-type input#radio_1').prop("checked", 'true');
                $('.filter-block__change-type-block').removeClass('active_el');
                $('.filter-block__change-type-block-1').addClass('active_el');
            }
        });
        //-end- переключатель радио для мощности

        //-begin- выбрать все в цветах
        if ($('.select-all .filter-block__item-checkbox').prop('checked')) {
            $(this).parents('.list-color').find('.filter-block__item-checkbox:not(.filter-block__item-checkbox-all)').each(function () {
                $(this).prop('checked', true);
            })
        }

        $(document).on('change', '.select-all .filter-block__item-checkbox', function () {
            if ($(this).prop('checked')) {
                $(this).parents('.list-color').find('.filter-block__item-checkbox:not(.filter-block__item-checkbox-all)').each(function () {
                    $(this).prop('checked', true);
                })
            } else {
                $(this).parents('.list-color').find('.filter-block__item-checkbox:not(.filter-block__item-checkbox-all)').each(function () {
                    $(this).prop('checked', false);
                })
            }
        });
        //-end- выбрать все в цветах

        //-begin- переключение между разделами фильтра
        var SidebarBlockActive = localStorage.getItem("sidebar__block");
        if (SidebarBlockActive) {
            $('.sidebar__block').hide();
            $('.sidebar__choose-button').removeClass('active_el');
            $('.sidebar__block[data-block="' + SidebarBlockActive + '"]').show();
            $('.sidebar__choose-button[data-block="' + SidebarBlockActive + '"]').addClass('active_el');
        }
        $(document).on('click', '.sidebar__choose-button', function () {
            $('.sidebar__choose-button').removeClass('active_el');
            $(this).addClass('active_el');
            var val = $(this).attr('data-block');
            $('.sidebar__block').hide();
            $('.sidebar__block[data-block="' + val + '"]').show();
            localStorage.setItem("sidebar__block", val);
        });
        var filterLength = $('.bx-filter .bx-filter-parameters-box').length;
        if (filterLength === 0) {
            $('.sidebar__choose-button[data-block="2"]').removeClass('active_el').hide();
            $('.sidebar__choose-button[data-block="1"]').addClass('active_el');
            $('.sidebar__block[data-block="2"]').hide();
            $('.sidebar__block[data-block="1"]').show();
        }
        // -end- переключение между разделами фильтра

        //-begin- скрывать фильтры в мобильной версии
        $(document).on('click', '.sidebar__block-hide', function (e) {
            e.preventDefault();
            $('.sidebar__block').hide();
            $("html, body").animate({scrollTop: 0}, 1000);
        });
        // -end- скрывать фильтры в мобильной версии

        //-begin- скрывать характеристики товара в карточке в мобильной версии
        $(document).on('click', '.card__param', function (e) {
            e.preventDefault();
            $(this).parents('.card__row').toggleClass('active_el');
        });
        // -end- скрывать характеристики товара в карточке в мобильной версии

        $(document).on('click', '.select-all-input', function (e) {
            e.preventDefault();
            var list = $(this).parents('ul').find('.filter-block__item--checkbox');
            var list_ch = $(this).parents('ul').find('.filter-block__item--checkbox:checked');
            if (list.length === list_ch.length) {
                list.each(function () {
                    $(this).click();
                })
            } else {
                list.each(function () {
                    if ($(this).prop("checked") === false) {
                        $(this).click();
                    }
                })
            }
        })
    }

    function BackHistory() {
        $(document).on('click', '.title__backlink a', function (e) {
            e.preventDefault();
            history.back();
        })
    }

    function AuthReg() {
        $(document).on('click', '.popup__title-name', function () {
            var name = $(this).attr('data-name');
            $('.popup__block, .popup__title-name').removeClass('active_el');
            $('.popup__block[data-name="' + name + '"]').addClass('active_el');
            $(this).addClass('active_el');
        });
        $(document).on('click', 'a[href="#popup-auth"]', function () {
            var name = $(this).attr('data-name');
            $('.popup__block, .popup__title-name').removeClass('active_el');
            $('.popup__block[data-name="' + name + '"]').addClass('active_el');
            $('.popup__title-name[data-name="' + name + '"]').addClass('active_el');
        });
        $(document).on('click', '.popup-close', function () {
            var a = location.search;
            var b = location.href;
            b = b.replace(a, '');
            history.replaceState(null, null, b);
        });
    }

    function OpenBlock() {
        $(document).on('click', '.header__search, .header__search-form-close', function () {
            $('.header__search-form').slideToggle();
        });
        $(document).on('click', '.header__search', function () {
            $('.header__search-form-input').focus();
        });
        $(document).click(function (event) {
            if ($(event.target).closest(".header__search-form, .header__search").length) return;
            $('.header__search-form').slideUp();
            event.stopPropagation();
        });
    }

    function MobileMenu() {
        $(document).on('click', '.header__btn-menu', function () {
            $('.header__nav').slideDown();
        });
        $(document).on('click', '.header__btn-close', function () {
            $('.header__nav').slideUp();
        });
        $('.header__nav nav > ul > li.menu-parent > a').after('<span class="open-child"></span>');
        $('.header__nav nav > ul > li.menu-parent > span.link-parrent').after('<span class="open-child"></span>');

        $(document).on('click', '.open-child', function () {
            $(this).parents('li').toggleClass('open');
            $(this).parents('li').find('.menu-child_1').slideToggle()
        });
    }

    function SliderInit() {
        $('.additional-goods__slider-3').slick({
            infinite: true,
            speed: 200,
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            swipeToSlide: true,
            responsive: [
                {
                    breakpoint: 1631,
                    settings: {
                        slidesToShow: 2
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        dots: true,
                        arrows: false,
                    }
                }, {
                    breakpoint: 560,
                    settings: {
                        slidesToShow: 1,
                        dots: true,
                        arrows: false,
                    }
                }
            ]
        });

        $('.additional-goods__slider-5').slick({
            infinite: false,
            speed: 200,
            slidesToShow: 5,
            slidesToScroll: 1,
            swipeToSlide: true,
            dots: false,
            arrows: true,
            responsive: [
                {
                    breakpoint: 1850,
                    settings: {
                        slidesToShow: 4
                    }
                }, {
                    breakpoint: 1631,
                    settings: {
                        slidesToShow: 3
                    }
                }, {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,

                    }
                }, {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: 2,
                        dots: true,
                        arrows: false,
                    }
                }, {
                    breakpoint: 550,
                    settings: {
                        slidesToShow: 1,
                        dots: true,
                        arrows: false,
                    }
                }
            ]
        });

        if ($('.additional-goods--tabs').length > 0) {
            $('.title[data-href="accessories_goods"]').addClass('active');
            $(document).on('click', '.additional-goods--tabs---title .title', function (e) {
                e.preventDefault();
                var chooseSlider = $(this).attr('data-href');
                $('#accessories_goods, #related_goods').hide();
                $('#' + chooseSlider).show();
                $('.additional-goods--tabs---title .title').removeClass('active');
                $('.title[data-href="' + chooseSlider + '"]').addClass('active');
                $('#' + chooseSlider + ' .additional-goods__slider').slick('setPosition');
            })
        }

        $('.banner-slider').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            responsive: [
                {
                    breakpoint: 1100,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                        dots: true,
                        adaptiveHeight: true
                    }
                }
            ]
        });

        $('.showroom-slider').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 1100,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                        dots: true,
                        adaptiveHeight: true
                    }
                }
            ]
        });

        $('.card__slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            dots: false,
            infinite: true,
            draggable: false,
            asNavFor: '.card__slider-nav',
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        adaptiveHeight: true
                    }
                }
            ]
        });
        $('.card__slider-nav').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            arrows: false,
            asNavFor: '.card__slider-for',
            dots: false,
            centerMode: false,
            focusOnSelect: true,
            vertical: true,
            infinite: true,
            verticalSwiping: true,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 1650,
                    settings: {
                        slidesToShow: 4
                    }
                }, {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 6
                    }
                },
                {
                    breakpoint: 769,
                    settings: {
                        adaptiveHeight: false,
                        vertical: false,
                        verticalSwiping: false,
                        swipe: true,
                        variableWidth: true,
                        slidesToShow: 5,
                    }
                }
            ]
        });

        //    слайдер на стринце проекта детально
        $('.content__slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            dots: false,
            infinite: true,
            adaptiveHeight: true,
            asNavFor: '.content__slider-nav',
        });
        $('.content__slider-nav').slick({
            slidesToShow: 5,
            arrows: false,
            asNavFor: '.content__slider',
            dots: false,
            centerMode: true,
            focusOnSelect: true,
            infinite: true,
            variableWidth: true,
            swipeToSlide: true,

        });

        $('.contacts__item-image--slider').slick({
            slidesToScroll: 1,
            slidesToShow: 1,
            arrows: false,
            dots: true,
            focusOnSelect: true,
            infinite: true,
            swipeToSlide: true,
            adaptiveHeight: true
        });
    }

    function ToTheTop() {
        $(document).on('click', '.to-top', function () {
            $("html, body").animate({scrollTop: 0}, 1000);
        });

        function TopAboveFooter() {
            var scrTop = $(window).scrollTop(),
                winHeight = $(window).height(),
                footerTop = $('.footer__b').offset().top;
            if ((scrTop + winHeight) >= footerTop) {
                $('.page-control').addClass('before-footer');
            } else {
                $('.page-control').removeClass('before-footer');
            }
        }

        TopAboveFooter();
        $(window).scroll(
            function () {
                TopAboveFooter();
                if ($(window).scrollTop() < 300) {
                    $('.to-top').removeClass('active_el');
                } else {
                    $('.to-top').addClass('active_el');
                }
            }
        );

        $(document).on('click', '.question__button', function () {
            $('.question__block').addClass('active_el')
        });

        $(document).on('click', '.question__close', function () {
            $('.question__block').removeClass('active_el');
        });

        $(document).click(function (event) {
            if ($(event.target).closest(".question__block, .question").length) return;
            $('.question__block').removeClass('active_el');
            $('.question__col-answer').remove();
            $('.question__col-center .question__col-block, .question__submit, .form__policy').show();
            event.stopPropagation();
        });

    }

    function MenuLampHrefButton() {
        $(document).on('click', '.lamp__nav a', function (e) {
            e.preventDefault();
            var section = $(this).attr('data-section');
            $('.lamp__nav a').removeClass('active');
            $(this).addClass('active');
            if (section !== 'all') {
                $('.lamp__item').hide();
                $('.lamp__item[data-section="' + section + '"]').show();
            } else
                $('.lamp__item').show();
        });

        $(document).on('click', '.header__custom > a', function (e) {
            e.preventDefault();
            $('.header__clamp').slideToggle();
        });

        $(document).on("click", function (e) {
            if (!$(e.target).closest(".header__clamp").length && !$(e.target).closest(".header__custom").length) {
                if ($('.header__clamp').is(':visible')) {
                    $('.header__clamp').slideUp();
                }
            }
        });
    }

    function CustomProducts() {
        if ($('.custom_prod_wrapper').length) {

            function CountProductPrice() {
                $('.custom_prod_active .custom_prod_more_header .custom_prod_piece_wrap').each(function () {
                    var currWrapper = $(this);
                    var currOptions = currWrapper.find('.custom_prod_piece_opt_block ');
                    var totalSumDraft = 0;
                    if (currOptions.length) {
                        currOptions.each(function () {
                            var currOptionSelectPrice = parseFloat($(this).find('option:selected').attr('data-price'));
                            if (currOptionSelectPrice) totalSumDraft = totalSumDraft + currOptionSelectPrice;
                        })
                    }

                    var priceContent = 0;
                    var priceHTML = '';
                    if (parseFloat(totalSumDraft)) {
                        var totalPrice = parseFloat(totalSumDraft);
                        var priceArray = totalPrice.toString().split('.');
                        if (priceArray.length === 1) {
                            priceContent = parseInt(priceArray[0]);
                            priceHTML = parseInt(priceArray[0]).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
                        } else {
                            if (priceArray.length === 2) {
                                var rubles = parseInt(priceArray[0]);
                                var cents = priceArray[1];
                                var centsLength = cents.length;
                                if (centsLength === 1) {
                                    priceContent = parseFloat(rubles.toString() + '.' + cents);
                                    priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '0</sup>';
                                } else {
                                    if (centsLength === 2) {
                                        priceContent = parseFloat(rubles.toString() + '.' + cents);
                                        priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '</sup>';
                                    } else {
                                        var third = cents.substring(3, 4);
                                        cents = parseInt(cents.substring(0, 2));
                                        if (third !== '0') cents++;
                                        priceContent = parseFloat(rubles.toString() + '.' + cents.toString());
                                        centsLength = cents.toString().length;
                                        if (centsLength === 1) {
                                            cents = cents.toString() + '0';
                                        }
                                        priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '</sup>';
                                    }
                                }
                            }
                        }
                    } else {
                        priceContent = priceHTML = 0;
                    }
                    var totalPriceProduct = currWrapper.find('.custom_prod_piece_select_price .custom_prod_piece_price');
                    totalPriceProduct.attr('data-price', priceContent);
                    totalPriceProduct.html(priceHTML);
                });
                RecountTotalPiece();
            }

            function pieceNumber() {
                $('.custom_prod_more_header').each(function (i, item) {
                    var wrapper = $(this);
                    var productBlocks = wrapper.find('.custom_prod_piece_wrap');
                    productBlocks.each(function (i, item) {
                        $(this).find('.custom_prod_piece_title span').text(i + 1);
                    });
                });
                CountProductPrice();
            }

            function RecountTotalWrap() {
                $('.custom_prod_active').each(function () {
                    var currWrapper = $(this);
                    var totalSumDraft = 0;
                    var currProds = currWrapper.find('.custom_prod_more_header .custom_prod_piece_wrap .custom_prod_piece_price_total');
                    if (currProds.length) {
                        currProds.each(function () {
                            var currProdPriceTotal = parseFloat($(this).attr('data-price'));
                            if (currProdPriceTotal) totalSumDraft = totalSumDraft + currProdPriceTotal;
                        })
                    }
                    var currRelated = currWrapper.find('.custom_prod_table_sum.total .price');
                    if (currRelated.length) {
                        currRelated.each(function () {
                            var currRelatedPriceTotal = parseFloat($(this).attr('data-content'));
                            if (currRelatedPriceTotal) totalSumDraft = totalSumDraft + currRelatedPriceTotal;
                        })
                    }

                    var priceContent = 0;
                    var priceHTML = '';
                    if (parseFloat(totalSumDraft)) {
                        var totalPrice = parseFloat(totalSumDraft);
                        var priceArray = totalPrice.toString().split('.');
                        if (priceArray.length === 1) {
                            priceContent = parseInt(priceArray[0]);
                            priceHTML = parseInt(priceArray[0]).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
                        } else {
                            if (priceArray.length === 2) {
                                var rubles = parseInt(priceArray[0]);
                                var cents = priceArray[1];
                                var centsLength = cents.length;
                                if (centsLength === 1) {
                                    priceContent = parseFloat(rubles.toString() + '.' + cents);
                                    priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '0</sup>';
                                } else {
                                    if (centsLength === 2) {
                                        priceContent = parseFloat(rubles.toString() + '.' + cents);
                                        priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '</sup>';
                                    } else {
                                        var third = cents.substring(3, 4);
                                        cents = parseInt(cents.substring(0, 2));
                                        if (third !== '0') cents++;
                                        priceContent = parseFloat(rubles.toString() + '.' + cents.toString());
                                        centsLength = cents.toString().length;
                                        if (centsLength === 1) {
                                            cents = cents.toString() + '0';
                                        }
                                        priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '</sup>';
                                    }
                                }
                            }
                        }
                    } else {
                        priceContent = priceHTML = 0;
                    }
                    var totalPriceTotalWrap = $(this).find('.custom_prod_total .custom_prod_piece_price_total');
                    totalPriceTotalWrap.attr('data-price', priceContent);
                    totalPriceTotalWrap.html(priceHTML);

                })
            }

            function RecountTotalPiece() {
                $('.custom_prod_more_header .custom_prod_piece_wrap').each(function () {
                    var price = parseFloat($(this).find('.custom_prod_piece_price').attr('data-price'));
                    var qnt = parseInt($(this).find('.custom_prod_piece_counter_input').val());
                    var priceContent = 0;
                    var priceHTML = '';
                    if (price && qnt) {
                        var totalPrice = price * qnt;
                        var priceArray = totalPrice.toString().split('.');
                        if (priceArray.length === 1) {
                            priceContent = parseInt(priceArray[0]);
                            priceHTML = parseInt(priceArray[0]).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
                        } else {
                            if (priceArray.length === 2) {
                                var rubles = parseInt(priceArray[0]);
                                var cents = priceArray[1];
                                var centsLength = cents.length;
                                if (centsLength === 1) {
                                    priceContent = parseFloat(rubles.toString() + '.' + cents);
                                    priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '0</sup>';
                                } else {
                                    if (centsLength === 2) {
                                        priceContent = parseFloat(rubles.toString() + '.' + cents);
                                        priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '</sup>';
                                    } else {
                                        var third = cents.substring(3, 4);
                                        cents = parseInt(cents.substring(0, 2));
                                        if (third !== '0') cents++;
                                        priceContent = parseFloat(rubles.toString() + '.' + cents.toString());
                                        centsLength = cents.toString().length;
                                        if (centsLength === 1) {
                                            cents = cents.toString() + '0';
                                        }
                                        priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '</sup>';
                                    }
                                }
                            }
                        }
                    } else {
                        priceContent = priceHTML = 0;
                    }
                    var totalPriceTotalPiece = $(this).find('.custom_prod_piece_price_total');
                    totalPriceTotalPiece.attr('data-price', priceContent);
                    totalPriceTotalPiece.html(priceHTML);
                });
                RecountTotalWrap();
            }

            function RecountTrPiece() {
                $('.custom_prod_compatibles_table tbody tr').each(function () {
                    var row = $(this);
                    var priceBlock = row.find('.custom_prod_table_sum:not(.total) .price');
                    var price = parseFloat(priceBlock.attr('data-content'));
                    var qnt = parseFloat(row.find('.custom_prod_td_counter_input').val());
                    var priceContent = 0;
                    var priceHTML = '';
                    if (price && qnt) {
                        var totalPrice = price * qnt;
                        var priceArray = totalPrice.toString().split('.');
                        if (priceArray.length === 1) {
                            priceContent = parseInt(priceArray[0]);
                            priceHTML = parseInt(priceArray[0]).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
                        } else {
                            if (priceArray.length === 2) {
                                var rubles = parseInt(priceArray[0]);
                                var cents = priceArray[1];
                                var centsLength = cents.length;
                                if (centsLength === 1) {
                                    priceContent = parseFloat(rubles.toString() + '.' + cents);
                                    priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '0</sup>';
                                } else {
                                    if (centsLength === 2) {
                                        priceContent = parseFloat(rubles.toString() + '.' + cents);
                                        priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '</sup>';
                                    } else {
                                        var third = cents.substring(3, 4);
                                        cents = parseInt(cents.substring(0, 2));
                                        if (third !== '0') cents++;
                                        priceContent = parseFloat(rubles.toString() + '.' + cents.toString());
                                        centsLength = cents.toString().length;
                                        if (centsLength === 1) {
                                            cents = cents.toString() + '0';
                                        }
                                        priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '</sup>';
                                    }
                                }
                            }
                        }
                    } else {
                        priceContent = priceHTML = 0;
                    }
                    var totalPriceTd = row.find('.custom_prod_table_sum.total .price');
                    totalPriceTd.attr('data-content', priceContent);
                    totalPriceTd.html(priceHTML);
                });
                RecountTotalWrap();
            }

            $(document).on('click', '.custom_prod_show_more', function () {
                var parentBlock = $(this).parents('.custom_prod_wrapper');
                if (parentBlock.hasClass('custom_prod_active')) {
                    parentBlock.removeClass('custom_prod_active');
                    parentBlock.find('.custom_prod_more_header').html('');
                    parentBlock.find('.custom_prod_td_counter_input').val('0');
                    parentBlock.find('.custom_prod_order_form input').val('');
                    RecountTrPiece();
                } else {
                    parentBlock.addClass('custom_prod_active');
                    var content = parentBlock.find('.custom_prod_more_new_prod_template').html();
                    parentBlock.find('.custom_prod_more_header').append(content);
                    pieceNumber();
                }
            });

            $(document).on('click', '.custom_prod_more_another', function () {
                var parentBlock = $(this).parents('.custom_prod_wrapper');
                var content = parentBlock.find('.custom_prod_more_new_prod_template').html();
                parentBlock.find('.custom_prod_more_header').append(content);
                pieceNumber();
            });

            $(document).on('click', '.custom_prod_closer', function () {
                var parentBlock = $(this).parents('.custom_prod_wrapper');
                var thisBlock = $(this).parents('.custom_prod_piece_wrap');
                thisBlock.remove();
                if ($('.custom_prod_more_header .custom_prod_piece_wrap').length) {
                    pieceNumber();
                } else {
                    parentBlock.removeClass('custom_prod_active');
                }
            });

            $(document).on('change keyup input click', '.custom_prod_piece_counter_input', function () {
                if (this.value.match(/[^0-9]/g)) {
                    this.value = this.value.replace(/[^0-9]/g, '');
                } else {
                    var value = this.value.replace(/[^0-9]/g, '');
                    if (value === '0') value = 1;
                    this.value = value;
                }
                RecountTotalPiece();
            });

            $(document).on('click', '.custom_prod_piece_counter_minus', function () {
                var input = $(this).parent('.custom_prod_piece_counter_block').find('.custom_prod_piece_counter_input');
                var value = parseInt(input.val());
                if (value > 1) {
                    value--;
                    input.val(value);
                    RecountTotalPiece();
                }
            });
            $(document).on('click', '.custom_prod_piece_counter_plus', function () {
                var input = $(this).parent('.custom_prod_piece_counter_block').find('.custom_prod_piece_counter_input');
                var value = parseInt(input.val());
                if (value) {
                    value++;
                    input.val(value);
                    RecountTotalPiece();
                }
            });

            var timerTD = setTimeout(function () {
            }, 100);
            $(document).on('change keyup input click', '.custom_prod_td_counter_input', function () {
                var input = $(this);
                if (input.val().match(/[^0-9]/g)) {
                    input.val(input.val().replace(/[^.\d]+/g, "").replace(/^([^\.]*\.)|\./g, '$1'));
                }
                RecountTrPiece();
                clearTimeout(timerTD);
                timerTD = setTimeout(function () {
                    var nowValue = parseFloat(input.val());
                    if (nowValue) {
                        var packNorm = parseFloat(input.attr('data-packnorm'));
                        var left = nowValue % packNorm;
                        if (parseFloat(left) && parseFloat(left) > 0) {
                            var correctVal = nowValue - parseFloat(left) + packNorm;
                            input.val(correctVal);
                            RecountTrPiece();
                        }
                    }
                }, 1000)
            });
            $(document).on('click', '.custom_prod_td_counter_minus', function () {
                var input = $(this).parent('.custom_prod_td_counter').find('.custom_prod_td_counter_input');
                var value = parseFloat(input.val());
                var packNorm = parseFloat(input.attr('data-packnorm'));
                if (value && packNorm) {
                    value = parseFloat(value) - packNorm;
                    if (value < 0) value = 0;
                    input.val(value);
                    RecountTrPiece();
                }
            });
            $(document).on('click', '.custom_prod_td_counter_plus', function () {
                var input = $(this).parent('.custom_prod_td_counter').find('.custom_prod_td_counter_input');
                var value = input.val();
                var packNorm = parseFloat(input.attr('data-packnorm'));
                if (value && packNorm) {
                    value = parseFloat(value) + packNorm;
                    input.val(value);
                    RecountTrPiece();
                }
            });
            $(document).on('change', '.custom_prod_piece_opt_block select', function () {
                CountProductPrice();
            });
            $(document).on('change', '.custom_prod_piece_opt_block.custom_prod_piece_opt_block_group_select', function () {
                var groupSelect = $(this);
                var parentBlock = groupSelect.parents('.custom_prod_piece_wrap_options');
                var article = parentBlock.attr('data-article');
                var groupID = groupSelect.find('option:selected').attr('data-id');
                var selectsInBlock = parentBlock.find('.custom_prod_piece_opt_block:not(.custom_prod_piece_opt_block_group_select)');
                if (selectsInBlock.length) {
                    selectsInBlock.each(function () {
                        var currSelect = $(this);
                        var currOptions = currSelect.find('option');
                        if (currOptions.length) {
                            currOptions.each(function () {
                                var currOpt = $(this);
                                var currOptID = currOpt.attr('data-id');
                                if (customPricesData[article][groupID] && customPricesData[article][groupID][currOptID]) {
                                    currOpt.attr('data-price', customPricesData[article][groupID][currOptID]);
                                }
                            })
                        }
                    });
                }
                CountProductPrice();
            });

            $(document).on('click', '.custom_prod_select_fake_span', function () {
                $('.custom_prod_select_fake_span').not(this).parents('.custom_prod_select_fake_block').removeClass('active');
                $(this).parents('.custom_prod_select_fake_block').toggleClass('active');
            });

            $(document).on('click', function (e) {
                var el = '.custom_prod_select_fake_block';
                if ($(e.target).closest(el).length) return;
                $('.custom_prod_select_fake_block').removeClass('active');
            });

            $(document).on('click', '.custom_prod_select_fake_block.active ul li', function () {
                var className = $(this).attr('data-class');
                var text = $.trim($(this).find('span').html());
                var parentBlock = $(this).parents('.custom_prod_piece_opt_block');
                parentBlock.find('.custom_prod_select_fake_span span').html(text);
                parentBlock.find('.' + className).prop('selected', true);
                parentBlock.find('select').change();
                $(this).parents('.custom_prod_select_fake_block').removeClass('active');
            });

            $(document).on('click', '.custom_prod_order_submit', function () {
                var productBlock = $(this).parents('.custom_prod_wrapper');
                var clientName = $.trim(productBlock.find('input[name="order-name"]').val());
                var clientSurname = $.trim(productBlock.find('input[name="order-surname"]').val());
                var clientIP = $.trim(productBlock.find('input[name="order-name"]').attr('data-ip'));
                var clientPhone = $.trim(productBlock.find('input[name="order-phone"]').val());
                var clientEmail = $.trim(productBlock.find('input[name="order-email"]').val());
                var formErrorHTML = '';
                if (clientName === '') formErrorHTML += LangConst.ARLIGHT_ARSTORE_NE_ZAPOLNENO_IMA;
                if (clientSurname === '') {
                    if (formErrorHTML !== '') formErrorHTML += '<br>';
                    formErrorHTML += LangConst.ARLIGHT_ARSTORE_NE_ZAPOLNENA_FAMILIA;
                }
                if (clientPhone === '') {
                    if (formErrorHTML !== '') formErrorHTML += '<br>';
                    formErrorHTML += LangConst.ARLIGHT_ARSTORE_NE_ZAPOLNEN_NOMER_TE;
                } else {
                    var preg = clientPhone.replace(/^[0-9]+\.[0-9]$/i);
                    if (!preg.length || preg.length < 7) {
                        if (formErrorHTML !== '') formErrorHTML += '<br>';
                        formErrorHTML += LangConst.ARLIGHT_ARSTORE_TELEFON_ZAPOLNEN_NEK;
                    }
                }
                if (clientEmail === '') {
                    if (formErrorHTML !== '') formErrorHTML += '<br>';
                    formErrorHTML += LangConst.ARLIGHT_ARSTORE_NE_ZAPOLNEN;
                } else {
                    var re = /^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i;
                    var valid = re.test(clientEmail);
                    if (!valid) {
                        if (formErrorHTML !== '') formErrorHTML += '<br>';
                        formErrorHTML += LangConst.ARLIGHT_ARSTORE_ZAPOLNEN_NEKORREKTNO;
                    }
                }
                if (formErrorHTML !== '') {
                    $.fancybox.open('<div class="popup popup-message">' + LangConst.ARLIGHT_ARSTORE_NEOBHODIMO_ZAPOLNITQ + '</div>');
                    return false;
                }
                var dataObject = {};
                dataObject['userData'] = {};
                dataObject['userData']['name'] = clientName;
                dataObject['userData']['surname'] = clientSurname;
                dataObject['userData']['phone'] = clientPhone;
                dataObject['userData']['mail'] = clientEmail;
                dataObject['userData']['ip'] = clientIP;
                dataObject['productData'] = GetProductData(productBlock);

                $('.preloader_block_2').fadeIn();
                var sendData = 'dataUpdate=' + JSON.stringify(dataObject);
                $.ajax({
                    url: siteDir + 'ajax/customProductsOrder.php',
                    data: sendData,
                    type: 'POST',
                    success: function (response) {
                        $('.preloader_block_2').fadeOut();
                        var answer = '';
                        var orderNumber = parseInt($.trim(response));
                        if (orderNumber) {
                            answer = LangConst.ARLIGHT_ARSTORE_VAS_ZAKAZ + orderNumber + LangConst.ARLIGHT_ARSTORE_PRINAT_V_TECENII;
                            $.fancybox.open('<div class="popup popup-message">' + answer + '</div>');
                            productBlock.find('.custom_prod_show_more').click();

                        } else {
                            answer = LangConst.ARLIGHT_ARSTORE_VEROATNO_CTO_TO_POS;
                            $.fancybox.open('<div class="popup popup-message">' + answer + '</div>');
                        }
                    }
                });
            });

            function GetProductData(productBlock) {
                var customProdName = $.trim(productBlock.find('.custom_prod_title').text());
                var dataObject = {};
                dataObject['customProducts'] = [];
                dataObject['compatibles'] = [];
                var customBlocks = productBlock.find('.custom_prod_more_header .custom_prod_piece_wrap');
                if (customBlocks.length) {
                    customBlocks.each(function () {
                        var customBlock = $(this);
                        var customObject = {};
                        var article = $.trim(customBlock.find('.custom_prod_piece_wrap_options').attr('data-article'));
                        customObject['selectData'] = [];
                        var customSelectBlocks = customBlock.find('.custom_prod_piece_opt_block');
                        if (customSelectBlocks.length) {
                            customSelectBlocks.each(function () {
                                var customSelectBlock = $(this);
                                if (!customSelectBlock.hasClass('custom_prod_piece_opt_block_hide')) {
                                    var currSelectData = {};
                                    currSelectData[$.trim(customSelectBlock.find('select').attr('data-name'))] = $.trim(customSelectBlock.find('option:selected').attr('data-name'));
                                    customObject['selectData'].push(currSelectData);
                                }

                            })
                        }
                        customObject['qnt'] = parseInt(customBlock.find('.custom_prod_piece_counter_input').val()).toString() + LangConst.ARLIGHT_ARSTORE_ST;
                        customObject['article'] = article;
                        customObject['name'] = customProdName;
                        customObject['price'] = parseFloat(customBlock.find('span.custom_prod_piece_price').attr('data-price'));
                        customObject['total'] = parseFloat(customBlock.find('span.custom_prod_piece_price_total').attr('data-price'));
                        customObject['image'] = customBlock.parents('.custom_prod_active').find('.custom_prod_picture img').attr('src');
                        dataObject['customProducts'].push(customObject);

                    })
                }
                var compatibleRows = productBlock.find('.custom_prod_compatibles_table tbody tr');
                if (compatibleRows.length) {
                    compatibleRows.each(function () {
                        var compatibleRow = $(this);
                        var qnt = compatibleRow.find('.custom_prod_td_counter_input').val();
                        if (parseFloat(qnt)) {
                            var compatibleData = {};
                            compatibleData['article'] = $.trim(compatibleRow.attr('data-article'));
                            compatibleData['name'] = $.trim(compatibleRow.attr('data-name'));
                            compatibleData['price'] = parseFloat(compatibleRow.find('.custom_prod_table_sum:not(.total) span.price').attr('data-content'));
                            compatibleData['total'] = parseFloat(compatibleRow.find('.custom_prod_table_sum.total span.price').attr('data-content'));
                            compatibleData['qnt'] = parseFloat(qnt).toString() + ' ' + $.trim(compatibleRow.attr('data-unit'));
                            compatibleData['image'] = compatibleRow.find('.custom_prod_td_img_td img').attr('src');
                            dataObject['compatibles'].push(compatibleData);
                        }
                    })
                }
                dataObject['totalPrice'] = parseFloat(productBlock.find('.custom_prod_total .custom_prod_piece_price_total').attr('data-price'));
                return dataObject;
            }
        }

    }

    function CustomProducts2() {
        if ($('.lamp-calc').length) {
            function CheckPrices() {
                var article = $('.lamp_select_group').attr('data-article');
                var groupID = $('.lamp_select_group').find('input:checked').attr('data-id');
                var selectsInBlock = $('.lamp_select_option');
                if (selectsInBlock.length) {
                    selectsInBlock.each(function () {
                        var currSelect = $(this);
                        var currOptions = currSelect.find('input');
                        if (currOptions.length) {
                            currOptions.each(function () {
                                var currOpt = $(this);
                                var currOptID = currOpt.attr('data-id');
                                if (customPricesData[article][groupID] && customPricesData[article][groupID][currOptID]) {
                                    currOpt.attr('data-price', customPricesData[article][groupID][currOptID]);
                                }
                            })
                        }
                    });
                }
                var SumDraft = 0;
                $('.lamp_select_option .lamp-calc__prop-check input[type="radio"]:checked').each(function () {
                    SumDraft += parseFloat($(this).attr('data-price'));
                });
                var quantity = parseInt($('.lamp_page_qnt_input.buy-block__input').val());
                var totalSumDraft = SumDraft * quantity;
                var priceContent = 0;
                var priceHTML = '';
                if (parseFloat(totalSumDraft)) {
                    var totalPrice = parseFloat(totalSumDraft);
                    var priceArray = totalPrice.toString().split('.');
                    if (priceArray.length === 1) {
                        priceContent = parseInt(priceArray[0]);
                        priceHTML = parseInt(priceArray[0]).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup></sup>';
                    } else {
                        if (priceArray.length === 2) {
                            var rubles = parseInt(priceArray[0]);
                            var cents = priceArray[1];
                            var centsLength = cents.length;
                            if (centsLength === 1) {
                                priceContent = parseFloat(rubles.toString() + '.' + cents);
                                priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '0</sup>';
                            } else {
                                if (centsLength === 2) {
                                    priceContent = parseFloat(rubles.toString() + '.' + cents);
                                    priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '</sup>';
                                } else {
                                    var third = cents.substring(3, 4);
                                    cents = parseInt(cents.substring(0, 2));
                                    if (third !== '0') cents++;
                                    priceContent = parseFloat(rubles.toString() + '.' + cents.toString());
                                    centsLength = cents.toString().length;
                                    if (centsLength === 1) {
                                        cents = cents.toString() + '0';
                                    }
                                    priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '</sup>';
                                }
                            }
                        }
                    }
                } else {
                    priceContent = priceHTML = 0;
                    priceHTML = priceHTML + '<sup></sup>';
                }
                var priceBlock = $('.lamp-calc__result-price .card__price-now .price');
                priceBlock.html(priceHTML);
                priceBlock.attr('data-price', priceContent);

                var length = $('.lamp_result_select_length input:checked').attr('data-name');
                var linePower = $('.lamp_result_select_power input:checked').attr('data-name');
                if (parseFloat(length) && parseFloat(linePower)) {
                    var powerOfLamp = parseFloat(linePower) * parseFloat(length) / 1000;
                    $('.lamp_result_power').text(powerOfLamp);
                    $('.lamp_result_flow').text(powerOfLamp * 80);
                }

            }

            if (!$('.lamp_page_edit_button').length) {
                $('.lamp-calc__prop-item').each(function () {
                    var block = $(this);
                    block.find('[data-counter="1"]').prop('checked', true);
                });
            }

            $(document).on('change', '.lamp-calc__prop-check input[type="radio"]', function () {
                CheckPrices();
            });

            $(document).on('change keyup input click', '.lamp_page_qnt_input', function () {
                var article = $(this).attr('data-article');
                var inputAll = $('.lamp_page_qnt_input[data-article="' + article + '"]');
                if (this.value.match(/[^0-9]/g)) {
                    this.value = this.value.replace(/[^0-9]/g, '');
                    inputAll.val(this.value.replace(/[^0-9]/g, ''));
                } else {
                    var value = this.value.replace(/[^0-9]/g, '');
                    if (value === '0') value = 1;
                    this.value = value;
                    inputAll.val(value);
                }
                CheckPrices();
            });


            $(document).on('click', '.lamp_page_add_button', function () {
                $('.preloader_block_2').fadeIn();
                var button = $(this);
                var update = false;
                if (button.hasClass('lamp_page_edit_button')) update = true;
                var lampData = {};
                lampData['article'] = $('.lamp_select_group').attr('data-article');
                lampData['group_select'] = {};
                lampData['group_select']['name'] = $('.lamp_select_group').attr('data-name');
                lampData['group_select']['value'] = $('.lamp_select_group input:checked').attr('data-name');
                lampData['group_select']['value_id'] = $('.lamp_select_group input:checked').attr('data-id');
                lampData['selects'] = {};
                $('.lamp_select_option').each(function () {
                    var currSelect = $(this);
                    var selectID = currSelect.attr('data-id');
                    var selectArr = {};
                    selectArr['name'] = currSelect.attr('data-name');
                    selectArr['value'] = currSelect.find('input:checked').attr('data-name');
                    selectArr['value_id'] = currSelect.find('input:checked').attr('data-id');
                    lampData['selects'][selectID] = selectArr;
                });
                lampData['power'] = $.trim($('.lamp_result_power').text());
                lampData['flow'] = $.trim($('.lamp_result_flow').text());
                lampData['quantity'] = parseInt($('.lamp_page_qnt_input').val());
                lampData['add'] = {};
                lampData['add']['cri'] = $('[data-key="lamp_add_cri"]').is(':checked');
                lampData['add']['control'] = $('[data-key="lamp_add_control"]').is(':checked');
                lampData['add']['power'] = $('[data-key="lamp_add_power"]').is(':checked');
                lampData['comment'] = $('.lamp-calc__result-comment textarea').val();
                lampData['totalPrice'] = parseFloat($('.lamp-calc__result-price .price').attr('data-price'));
                lampData['lampPrice'] = parseFloat(lampData['totalPrice']) / parseInt(lampData['quantity']);
                if (update) lampData['update_id'] = button.attr('data-id');
                var sendData = 'dataUpdate=' + JSON.stringify(lampData);

                $.ajax({
                    url: siteDir + 'ajax/customLampsSaveProduct.php',
                    data: sendData,
                    type: 'POST',
                    success: function (response) {
                        if (response === 'ok') {
                            window.location.href = siteDir + 'catalog/custom-lamps/my-lamps.php';
                            window.location.href = siteDir + 'catalog/custom-lamps/my-lamps.php';
                        } else {
                            var answer = LangConst.ARLIGHT_ARSTORE_VEROATNO_CTO_TO_POS;
                            $.fancybox.open('<div class="popup popup-message">' + answer + '</div>');
                            $('.preloader_block_2').fadeOut();
                        }
                    }
                });

            });
            CheckPrices();
        }
        if ($('.lamp-order').length) {
            function CalcPrices() {
                var totalSumDraft = 0;
                $('.lamp__result').each(function () {
                    var block = $(this);
                    var piecePrice = parseFloat(block.find('.card__price-now').attr('data-piece-price'));
                    var qnt = parseInt(block.find('.lamp_page_qnt_input').val());
                    var priceTotPiece = piecePrice * qnt;
                    if (parseFloat(priceTotPiece)) totalSumDraft += priceTotPiece;
                });
                var priceContent = 0;
                var priceHTML = '';
                if (parseFloat(totalSumDraft)) {
                    var totalPrice = parseFloat(totalSumDraft);
                    var priceArray = totalPrice.toString().split('.');
                    if (priceArray.length === 1) {
                        priceContent = parseInt(priceArray[0]);
                        priceHTML = parseInt(priceArray[0]).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup></sup>';
                    } else {
                        if (priceArray.length === 2) {
                            var rubles = parseInt(priceArray[0]);
                            var cents = priceArray[1];
                            var centsLength = cents.length;
                            if (centsLength === 1) {
                                priceContent = parseFloat(rubles.toString() + '.' + cents);
                                priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '0</sup>';
                            } else {
                                if (centsLength === 2) {
                                    priceContent = parseFloat(rubles.toString() + '.' + cents);
                                    priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '</sup>';
                                } else {
                                    var third = cents.substring(3, 4);
                                    cents = parseInt(cents.substring(0, 2));
                                    if (third !== '0') cents++;
                                    priceContent = parseFloat(rubles.toString() + '.' + cents.toString());
                                    centsLength = cents.toString().length;
                                    if (centsLength === 1) {
                                        cents = cents.toString() + '0';
                                    }
                                    priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '</sup>';
                                }
                            }
                        }
                    }
                } else {
                    priceContent = priceHTML = 0;
                }
                var priceBlock = $('.custom_prod_order_sum_content .custom_prod_piece_price_total');
                priceBlock.html(priceHTML);
                priceBlock.attr('data-price', priceContent);

                var projectPower = 0;
                $('.lamp_project_item_power').each(function () {
                    var powerBlock = $(this);
                    var piecePower = parseFloat(powerBlock.attr('data-value'));
                    var qnt = parseInt(powerBlock.parents('.lamp__item').find('.lamp_page_qnt_input').val());
                    var totalPiecePower = piecePower * qnt;
                    if (parseFloat(totalPiecePower)) projectPower += totalPiecePower;
                });
                if (parseFloat(projectPower)) $('.lamp_result_power').text(projectPower);

            }

            function CalcPiecePrices(data) {
                var input = $(data).parent('.buy-block__items').find('.lamp_page_qnt_input');
                var block = input.parents('.lamp__item').find('.lamp__result-all .card__price-now');
                var price = parseFloat(block.attr('data-piece-price'));
                var qnt = parseInt(input.val());
                var totalSumDraft = price * qnt;
                var priceContent = 0;
                var priceHTML = '';
                if (parseFloat(totalSumDraft)) {
                    var totalPrice = parseFloat(totalSumDraft);
                    var priceArray = totalPrice.toString().split('.');
                    if (priceArray.length === 1) {
                        priceHTML = parseInt(priceArray[0]).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup></sup>';
                    } else {
                        if (priceArray.length === 2) {
                            var rubles = parseInt(priceArray[0]);
                            var cents = priceArray[1];
                            var centsLength = cents.length;
                            if (centsLength === 1) {
                                priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '0</sup>';
                            } else {
                                if (centsLength === 2) {
                                    priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '</sup>';
                                } else {
                                    var third = cents.substring(3, 4);
                                    cents = parseInt(cents.substring(0, 2));
                                    if (third !== '0') cents++;
                                    centsLength = cents.toString().length;
                                    if (centsLength === 1) {
                                        cents = cents.toString() + '0';
                                    }
                                    priceHTML = rubles.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '<sup>' + cents + '</sup>';
                                }
                            }
                        }
                    }
                } else {
                    priceHTML = 0;
                }
                block.find('.price').html(priceHTML);
            }

            $(document).on('click', '.custom_prod_order_return', function () {
                var href = $(this).attr('data-href');
                if (href && href !== '')
                    window.location.href = href;
            });
            $(document).on('click', '.lamp_delete_from_order', function () {
                $('.preloader_block_2').fadeIn();
                var sendData = 'dataDelete=' + $(this).attr('data-id');
                $.ajax({
                    url: siteDir + 'ajax/customLampsSaveProduct.php',
                    data: sendData,
                    type: 'POST',
                    success: function (response) {
                        if (response === 'ok') {
                            window.location.href = siteDir + 'catalog/custom-lamps/my-lamps.php';
                        } else {
                            var answer = LangConst.ARLIGHT_ARSTORE_VEROATNO_CTO_TO_POS;
                            $.fancybox.open('<div class="popup popup-message">' + answer + '</div>');
                            $('.preloader_block_2').fadeOut();
                        }
                    }
                });
            });
            $(document).on('click', '.lamp_projects_qnt_plus', function () {
                var that = this;
                var input = $(this).parent('.buy-block__items').find('.lamp_page_qnt_input');
                var value = parseInt(input.val());
                if (value) {
                    $('.preloader_block_2').fadeIn();
                    var sendData = 'dataPlus=' + $(this).attr('data-id');
                    $.ajax({
                        url: siteDir + 'ajax/customLampsSaveProduct.php',
                        data: sendData,
                        type: 'POST',
                        success: function (response) {
                            if (response === 'ok') {
                                input.val(value);
                                $('.preloader_block_2').fadeOut();
                                CalcPiecePrices(that);
                                CalcPrices();
                            } else {
                                var answer = LangConst.ARLIGHT_ARSTORE_VEROATNO_CTO_TO_POS;
                                $.fancybox.open('<div class="popup popup-message">' + answer + '</div>');
                                $('.preloader_block_2').fadeOut();
                            }
                        }
                    });
                }
            });
            $(document).on('click', '.lamp_projects_qnt_minus', function () {
                var that = this;
                var input = $(this).parent('.buy-block__items').find('.lamp_page_qnt_input');
                var value = parseInt(input.val());
                if (value > 0) {
                    $('.preloader_block_2').fadeIn();
                    var sendData = 'dataMinus=' + $(this).attr('data-id');
                    $.ajax({
                        url: siteDir + 'ajax/customLampsSaveProduct.php',
                        data: sendData,
                        type: 'POST',
                        success: function (response) {
                            if (response === 'ok') {
                                input.val(value);
                                $('.preloader_block_2').fadeOut();
                                CalcPiecePrices(that);
                                CalcPrices();
                            } else {
                                var answer = LangConst.ARLIGHT_ARSTORE_VEROATNO_CTO_TO_POS;
                                $.fancybox.open('<div class="popup popup-message">' + answer + '</div>');
                                $('.preloader_block_2').fadeOut();
                            }
                        }
                    });
                }
            });
            $(document).on('click', '.custom_prod_order_submit', function () {
                var productBlock = $(this).parents('.lamp-form');
                var clientName = $.trim(productBlock.find('input[name="order-name"]').val());
                var clientSurname = $.trim(productBlock.find('input[name="order-surname"]').val());
                var clientIP = $.trim(productBlock.find('input[name="order-name"]').attr('data-ip'));
                var clientPhone = $.trim(productBlock.find('input[name="order-phone"]').val());
                var clientEmail = $.trim(productBlock.find('input[name="order-email"]').val());
                var formErrorHTML = '';
                if (clientName === '') formErrorHTML += LangConst.ARLIGHT_ARSTORE_NE_ZAPOLNENO_IMA;
                if (clientSurname === '') {
                    if (formErrorHTML !== '') formErrorHTML += '<br>';
                    formErrorHTML += LangConst.ARLIGHT_ARSTORE_NE_ZAPOLNENA_FAMILIA;
                }
                if (clientPhone === '') {
                    if (formErrorHTML !== '') formErrorHTML += '<br>';
                    formErrorHTML += LangConst.ARLIGHT_ARSTORE_NE_ZAPOLNEN_NOMER_TE;
                } else {
                    var preg = clientPhone.replace(/^[0-9]+\.[0-9]$/i);
                    if (!preg.length || preg.length < 7) {
                        if (formErrorHTML !== '') formErrorHTML += '<br>';
                        formErrorHTML += LangConst.ARLIGHT_ARSTORE_TELEFON_ZAPOLNEN_NEK;
                    }
                }
                if (clientEmail === '') {
                    if (formErrorHTML !== '') formErrorHTML += '<br>';
                    formErrorHTML += LangConst.ARLIGHT_ARSTORE_NE_ZAPOLNEN;
                } else {
                    var re = /^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i;
                    var valid = re.test(clientEmail);
                    if (!valid) {
                        if (formErrorHTML !== '') formErrorHTML += '<br>';
                        formErrorHTML += LangConst.ARLIGHT_ARSTORE_ZAPOLNEN_NEKORREKTNO;
                    }
                }
                if (formErrorHTML !== '') {
                    $.fancybox.open('<div class="popup popup-message">' + LangConst.ARLIGHT_ARSTORE_NEOBHODIMO_ZAPOLNITQ + '</div>');
                    return false;
                }

                var dataObject = {};
                dataObject['userData'] = {};
                dataObject['userData']['name'] = clientName;
                dataObject['userData']['surname'] = clientSurname;
                dataObject['userData']['phone'] = clientPhone;
                dataObject['userData']['mail'] = clientEmail;
                dataObject['userData']['ip'] = clientIP;
                dataObject['productData'] = [];
                dataObject['siteID'] = SITE_ID;
                $('.preloader_block_2').fadeIn();
                var sendData = 'dataUpdate=' + JSON.stringify(dataObject);
                $.ajax({
                    url: siteDir + 'ajax/customProductsOrder2.php',
                    data: sendData,
                    type: 'POST',
                    success: function (response) {
                        $('.preloader_block_2').fadeOut();
                        var answer = '';
                        var orderNumber = parseInt($.trim(response));
                        if (orderNumber) {
                            answer = LangConst.ARLIGHT_ARSTORE_VAS_ZAKAZ + orderNumber + LangConst.ARLIGHT_ARSTORE_PRINAT_V_TECENII;
                            $.fancybox.open('<div class="popup popup-message">' + answer + '</div>');
                            $('.lamp-order').html('<div class="lamp-page-title">' + LangConst.ARLIGHT_ARSTORE_SAG_MOI_SVETILQN + '<a href="' + siteDir + 'catalog/custom-lamps/" style="text-decoration: underline">' + LangConst.ARLIGHT_ARSTORE_SOZDANIU_SVOEGO_SVET + '</a></div>');
                            $('.navigation-block_basket').remove();
                            $('.lamp-form').remove();
                        } else {
                            answer = LangConst.ARLIGHT_ARSTORE_VEROATNO_CTO_TO_POS;
                            $.fancybox.open('<div class="popup popup-message">' + answer + '</div>');
                        }
                    }
                });
            });
            CalcPrices();
        }
    }

    function CustomLampsFunctions() {
        $(document).on('click', '[data-service="HIDE_CART"]', function (e) {
            e.preventDefault();
            $('#basket-items-list-wrapper, .lamp-order').slideToggle();
            $(this).toggleClass('active');
        });
    }


})(jQuery);
