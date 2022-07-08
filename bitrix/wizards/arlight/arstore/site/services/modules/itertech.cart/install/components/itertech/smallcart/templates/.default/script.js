window.cart = {};
if(!siteDir){
    var siteDir = '/';
}
$(document).ready(function () {
    getItemsFromCart();
    setTimeout(function () {
        itemsFavorite()
    }, 300);
    setTimeout(function () {
        itemsCompare()
    }, 600);
    openMoreProduct();

    function openMoreProduct() {
        $(document).on('click', '.cart__button-more', function (e) {
            e.preventDefault();
            $('.item--cart-all').toggleClass('max3')
        })
    }

    $(document).on("click", '[data-slug="ADD_TO_CART"]', function () {
        var id = $(this).attr("data-id");
        var quantityInput = $(this).closest('[data-slug="BUY_BLOCK"]').find('[data-slug="QUANTITY"]');
        var quantity = parseFloat(quantityInput.val());
        var normal = parseFloat(quantityInput.attr('data-packnorm'));
        quantity = !isNaN(quantity) && quantity > 0 ? quantity : normal;
        if ($(this).hasClass('in_cart')){
            location.pathname = siteDir + 'order/';
        }
        else{
            addItemToCart(id, quantity, '');
        }
        return false;
    });

    $(document).on('change', '[data-slug="QUANTITY"]', function () {
        var id = parseInt($(this).parents('.buy-block').find('[data-slug="ADD_TO_CART"]').data('id'));
        var quantity = parseFloat($(this).val());
        mathQuantity(id, quantity);
    });

    $(document).on('change', '[data-slug="CART_QUANTITY"]', function () {
        var id = parseInt($(this).closest('[data-slug="CART_ROW"]').data('id'));
        var quantity = parseFloat($(this).val());
        mathQuantity(id, quantity);
    });

    $(document).on("click", '[data-slug="CART_ROW_REMOVE"]', function () {
        var id = parseInt($(this).closest('[data-slug="CART_ROW"]').data('id'));
        var quantity = 0;
        mathQuantity(id, quantity);
        return false;
    });

    $(document).on("click", '[data-slug="CART_LINK"]', function (e) {
        if(!$(arItertechSmallCart.ID).hasClass('full')){
            return false;
        }
        if ($(window).width() > 1200) {
            e.preventDefault();
            $(arItertechSmallCart.ID).slideToggle();
        }
        $(document).click(function (e) {
            if ($(e.target).closest('[data-slug="CART_LINK"],'+arItertechSmallCart.ID).length) return;
            $(arItertechSmallCart.ID).slideUp();
            e.stopPropagation();
        });
    });

    // Избранное
    $(document).on("click", '[data-slug="ADD_TO_FAVORITE"]', function () {
        var id = $(this).attr("data-id");
        itemsFavorite(id);
        if($(this).hasClass('in_cart')){
            $(this).removeClass('in_cart');
        } else {
            //YM
            var goalParams = {};

            function goalCallback() {
                console.log('запрос в Метрику успешно отправлен');
            }

            if (arGoalsYM['add-to-favorite'] && arGoalsYM['add-to-favorite']['id'] && arGoalsYM['add-to-favorite']['name']) {
                if (window.ym) {
                    ym(arGoalsYM['add-to-favorite']['id'], 'reachGoal', arGoalsYM['add-to-favorite']['name'], goalParams, goalCallback);
                }
            }
        }
        return false;
    });

    // Сравнение
    $(document).on("click", '[data-slug="ADD_TO_COMPARE"]', function () {
        var id = $(this).attr("data-id");
        itemsCompare(id);
        if($(this).hasClass('in_cart')){
            $(this).removeClass('in_cart');
        }
        return false;
    });

    // Применение промокода
    $(document).on("click", '[data-slug="PROMOCODE_SEND"]', function (e) {
        var PROMOCODE = $('[data-slug="PROMOCODE"]');
        var PROMOCODE_VAL = PROMOCODE[0].value;
        if(PROMOCODE[0].dataset.func === 'remove'){
            PROMOCODE_VAL = '-1N';
        }
        $.ajax({
            url: arItertechSmallCart.path,
            data: {'method': 'promocode', 'params':PROMOCODE_VAL, 'sessid':BX.bitrix_sessid(), 'siteId': arItertechSmallCart.siteID},
            type: 'POST',
            success: function (data) {
                if(data.ID){
                    PROMOCODE[0].disabled = true;
                    PROMOCODE[0].dataset.func = 'remove';
                    $('[data-slug="PROMOCODE_SEND"]').removeClass('button_red').val('Отменить');
                } else {
                    PROMOCODE[0].disabled = false;
                    PROMOCODE[0].dataset.func = 'add';
                    PROMOCODE[0].value = '';
                    $('[data-slug="PROMOCODE_SEND"]').addClass('button-red').val('Применить');
                }
                getItemsFromCart();
            }
        });

    });



    /* Функции по корзине на order.php */
    $(document).on('click', '.button_change', function (e) {
        e.preventDefault();
        $('.order-cart').slideToggle();
        $(this).toggleClass('active_el');
    });


    /* Смена способов доставки на на order.php */
    $('[name="field[DELIVERY_ID]"]').change(function () {
        var price = $(this).data('price');
        var fPrice = formatPrice(price);
        $('[data-slug="DELIVERY_PRICE"]').attr('data-price',price).data('price', price).html(fPrice);
        calcOrder('', price);
    });

    // работа с количеством
    function mathQuantity(id, quantity){
        var func = 'U';
        quantity = !isNaN(quantity) && quantity >= 0 ? quantity : 0;
        if(quantity <= 0 ){
            quantity = 0;
            func = 'R';
            $('[data-slug="FULL_CART"]').find('[data-id="'+id+'"]').remove();
        }
        addItemToCart(id, quantity, func);
        return false;
    }

    /* Калькуляция итоговой стоимости заказа на order.php */
    function calcOrder(TOTALCART_SUMM, DELIVERY_PRICE){
        if(!TOTALCART_SUMM){
            TOTALCART_SUMM = $('[data-slug="TOTALCART_SUMM"]').data('price');
        }
        if(!DELIVERY_PRICE){
            DELIVERY_PRICE = $('[data-slug="DELIVERY_PRICE"]').data('price');
        }
        var fPrice = formatPrice(parseFloat(TOTALCART_SUMM) + parseFloat(DELIVERY_PRICE));
        $('[data-slug="ORDER_SUMM"]').html(fPrice);
    }

    /* Форматирование стоимости */
    function formatPrice(price, quantity, wsep){
        if(!quantity){
            quantity = 1;
        }
        var sum = (parseInt(quantity) * parseFloat(price)).toFixed((arItertechSmallCart.params['DECIMALS']=='Y') ? 2 : 0).split('.', 2);
        var sum1 = sum[0].replace(/(\d)(?=(\d{3})+([^\d]|$))/g, '$1'+arItertechSmallCart.params['THOUSANDS_SEPARATOR']);
        var result = sum1;
        if(arItertechSmallCart.params['DECIMALS']==='Y'){
            var sum2 = sum[1];
            if(wsep){
                result = sum1 +'.'+ sum2;
            } else {
                result = sum1 +' '+ arItertechSmallCart.params['DELIMITER_DECIMALS'].replace('*', sum2);
            }
        }
        result = result+' '+arItertechSmallCart.params['CURRENCY'];
        return result;
    }

    /* Добавление в корзину */
    function addItemToCart(id, quantity, func) {
        $('body').append('<div class="preloader_hide" style="width:100%; height:100%; position: fixed; left: 0; top: 0; z-index: 999999"></div>');
        $.ajax({
            url: arItertechSmallCart.path,
            data: {'method': 'addItemToCart', 'id': id, 'quantity': quantity, 'params':arItertechSmallCart.params, 'func':func, 'sessid':BX.bitrix_sessid(), 'siteId': arItertechSmallCart.siteID},
            type: 'POST',
            success: function (data) {
                if(data.result=='error'){
                    alert(data.result_mess);
                } else {
                    var btnBuy = $(document).find('[data-slug="ADD_TO_CART"][data-id="'+id+'"]');

                    if(func=='R'){
                        if (btnBuy.parents('.additional-goods').length > 0 || btnBuy.parents('.compare__head').length > 0) {
                            btnBuy.removeClass('in_cart');
                        } else {
                            btnBuy.html('В корзину').removeClass('in_cart');
                        }
                        btnBuy.parents('.buy-block').find('[data-slug="QUANTITY"]').val(0);
                    }
                    visualRenderCart(data);

                    if(data.SHOW_MESS_ADD){
                        // var acceptAnswer = btnBuy.parent().siblings('[data-slug="ACCEPT_BUY"]');
                        var acceptAnswer = $('.accept-buy--wrap');
                        if (acceptAnswer.length > 0) {
                            acceptAnswer.fadeIn(200);
                            setTimeout(function () {
                                acceptAnswer.fadeOut(400);
                            }, 2500);
                        }

                        if (data.PRODUCTS[id]){
                            //YM
                            var goalParams = {};

                            function goalCallback() {
                                console.log('запрос в Метрику успешно отправлен');
                            }

                            if (arGoalsYM['add-to-cart'] && arGoalsYM['add-to-cart']['id'] && arGoalsYM['add-to-cart']['name']) {
                                if (window.ym) {
                                    ym(arGoalsYM['add-to-cart']['id'], 'reachGoal', arGoalsYM['add-to-cart']['name'], goalParams, goalCallback);
                                }
                            }
                        }
                    }
                }
            },
            complete: function() {
                $('.preloader_hide').remove();
            }
        });
    }

    /* Получаем корзину */
    function getItemsFromCart() {
        $.ajax({
            url: arItertechSmallCart.path,
            data: {'method': 'getItemsFromCart', 'params':arItertechSmallCart.params, 'sessid':BX.bitrix_sessid(), 'siteId': arItertechSmallCart.siteID},
            type: 'POST',
            success: function (data) {
                if(data){
                    if(data.result=='error'){
                        alert(data.result_mess);
                    } else {
                        visualRenderCart(data);
                    }
                }
            }
        });
    }

    /* Обработка корзины */
    function visualRenderCart(data){
        if(arItertechSmallCart.params['DEBUG']=='Y'){
            console.log('Отладка visualRenderCart');
            console.log(data);
        }

        var htmlCart  = $(data.HTML);
        var itemsDimensions = [];
        var order_items = [];
        if(!data.PRODUCTS) {
            $(document).find('#itertech_cart').html('');
            $(document).find('[data-slug="CART_LINK_COUNT"]').html('0');
            $(document).find('[data-slug="CART_LINK_SUMM"]').html('');
            if(window.location.href.indexOf('/order/')>0 && $(arItertechSmallCart.ID).hasClass('full')){
                location.reload();
            }
            $(arItertechSmallCart.ID).removeClass('full').slideUp();
            return false;
        }

        $.each(data.PRODUCTS, function (i, elem) {
            var btnBuy = $(document).find('[data-slug="ADD_TO_CART"][data-id="'+data.PRODUCTS[i]['ID']+'"]');
            if(arItertechSmallCart.params['CHANGE_BUTTON_TEXT']){
                if (btnBuy.parents('.additional-goods').length > 0 || btnBuy.parents('.compare__head').length > 0) {
                    btnBuy.addClass('in_cart');
                } else {
                    btnBuy.html(arItertechSmallCart.params['CHANGE_BUTTON_TEXT']).addClass('in_cart');
                }
            }

            // обновить кол-во у товара при изменении кол-ва в корзине
            btnBuy.parents('.buy-block').find('[data-slug="QUANTITY"]').val(elem['QUANTITY']);

            // обновить сумму и кол-во у товара в корзине на order.php
            $('[data-slug="FULL_CART"]').find('[data-slug="CART_ROW"][data-id="'+elem['ID']+'"]').find('[data-slug="ITEM_SUMM"]').html(elem['SUMM']);
            $('[data-slug="FULL_CART"]').find('[data-slug="CART_ROW"][data-id="'+elem['ID']+'"]').find('[data-slug="CART_QUANTITY"]').val(elem['QUANTITY']);
            $('[data-slug="FULL_CART"]').find('[data-slug="CART_ROW"][data-id="'+elem['ID']+'"]').find('.order-cart__item-price').html(elem['PRICE']);
            if(elem['OLDSUMM']){
                $('[data-slug="FULL_CART"]').find('[data-slug="CART_ROW"][data-id="'+elem['ID']+'"]').find('[data-slug="ITEM_OLDSUMM"]').html(elem['OLDSUMM']);
            }else{
                $('[data-slug="FULL_CART"]').find('[data-slug="CART_ROW"][data-id="'+elem['ID']+'"]').find('[data-slug="ITEM_OLDSUMM"]').html('');
            }

            itemsDimensions.push([elem['LENGTH']*100,elem['WIDTH']*100,elem['HEIGHT']*100,elem['PACKAGE_QUANTITY']]);
            order_items.push({
                'orderitem_article': elem['ARTNUMBER'],
                'orderitem_name': elem['NAME']+' Ед.изм: '+elem['PACKAGE']+' '+elem['PACKAGE_COUNT']+' '+elem['UNIT'],
                'orderitem_quantity': elem['PACKAGE_QUANTITY'],
                'orderitem_cost': Math.ceil(elem['PRICE_MATH']*elem['PACKAGE_COUNT'])
            });


        });


        // Обновили AJAX корзину
        var visAllProd = false;
        if(!$(document).find('#itertech_cart .item--cart-all').hasClass('max3')){
            visAllProd = true;
        }
        $(document).find('#itertech_cart').html(htmlCart[0].innerHTML);
        if(visAllProd){
            $('.item--cart-all').toggleClass('max3');
        }

        $(arItertechSmallCart.ID).addClass('full').find('[data-slug="TOTALCART_QUANTITY"]').html(data.TOTALCART.QUANTITY);

        $(document).find('[data-slug="TOTALCART_SUMM"]').html((data.TOTALCART.OLDSUMM_MATH > 0) ? data.TOTALCART.OLDSUMM : data.TOTALCART.SUMM).attr('data-price',data.TOTALCART.SUMM_MATH).data('price', data.TOTALCART.SUMM_MATH);

        if(data.TOTALCART.DISCOUNT_SUMM_MATH > 0){
            $(document).find('[data-slug="TOTALCART_DISCOUNT_SUMM"]').html(data.TOTALCART.DISCOUNT_SUMM).parent().show();
            $(document).find('[data-slug="TOTALCART_DISCOUNT_PERCENT"]').html(data.TOTALCART.DISCOUNT_PERCENT).parent().show();
        } else {
            $(document).find('[data-slug="TOTALCART_DISCOUNT_SUMM"]').html(0).parent().hide();
            $(document).find('[data-slug="TOTALCART_DISCOUNT_PERCENT"]').html(0).parent().hide();
        }
        if(data.TOTALCART.DISCOUNT_SUMM_DOP_MATH > 0){
            $(document).find('[data-slug="TOTALCART_DISCOUNT_SUMM_DOP"]').html(data.TOTALCART.DISCOUNT_SUMM_DOP).parent().show();
            $(document).find('[data-slug="TOTALCART_SUMM_PROM"]').html(data.TOTALCART.SUMM_PROM).parent().show();
        } else {
            $(document).find('[data-slug="TOTALCART_DISCOUNT_SUMM_DOP"]').html(0).parent().hide();
            $(document).find('[data-slug="TOTALCART_SUMM_PROM"]').html(0).parent().hide();
        }
        $(document).find('[data-slug="CART_LINK_COUNT"]').html(data.TOTALCART.QUANTITY);
        $(document).find('[data-slug="CART_LINK_SUMM"]').html(data.TOTALCART.SUMM);

        if(data.TOTALCART.ERROR_PROMOCODE){
            $(document).find('[data-slug="ERROR_PROMOCODE"]').html(data.TOTALCART.ERROR_PROMOCODE).show();
            $(document).find('[data-slug="PROMOCODE"]').val('').attr('disabled', false).attr('data-func','add');
            $(document).find('[data-slug="PROMOCODE_SEND"]').val('Применить').addClass('button_red');
            setTimeout(function () {
                $(document).find('[data-slug="ERROR_PROMOCODE"]').fadeOut();
            },3000);
        }
        calcOrder(data.TOTALCART.SUMM_MATH, '');

        // добавляем данные для яндекса
        window.cart['quantity'] = data.TOTALCART.PACKAGE_QUANTITY;
        window.cart['weight'] = data.TOTALCART.WEIGHT;
        window.cart['cost'] = Math.ceil(data.TOTALCART.SUMM_MATH);
        window.cart['itemsDimensions'] = itemsDimensions;
        window.cart['order_items'] = order_items;

    }

    /* Добавление в избранное */
    function itemsFavorite(id) {
        $.ajax({
            url: arItertechSmallCart.path,
            data: {'method': 'itemsFavorite', 'id': id, 'sessid':BX.bitrix_sessid(), 'siteId': arItertechSmallCart.siteID},
            type: 'POST',
            success: function (data) {
                if(data.result=='error'){
                    alert(data.result_mess);
                } else {
                    if(arItertechSmallCart.params['DEBUG']=='Y'){
                        console.log('Отладка itemsFavorite');
                        console.log(data);
                    }
                    $(document).find('[data-slug="FAVORITE_COUNT"]').text(data.COUNT);
                    $(document).find('[data-slug="FAVORITE_COUNT_LABEL"]').text(declOfNum(data.COUNT, [BX.message('ARLIGHT_ARSTORE_TOV'), BX.message('ARLIGHT_ARSTORE_TOV1'), BX.message('ARLIGHT_ARSTORE_TOV2')]));
                    $.each(data.IDS, function (i, elem) {
                        $(document).find('[data-slug="ADD_TO_FAVORITE"][data-id="'+elem+'"]').addClass('in_cart');
                    });
                    if(data.DELETE){
                        if(window.location.href.indexOf('/favorite/')) $(document).find('[data-slug="FAVORITE_ROW"][data-id="'+data.DELETE+'"]').prev('.item-group-marker').remove();
                        $(document).find('[data-slug="FAVORITE_ROW"][data-id="'+data.DELETE+'"]').remove();
                        if(window.location.href.indexOf('/favorite/')) favoriteFunc();
                        if(data.COUNT == 0 && window.location.href.indexOf('/favorite/')>0){
                            data.RELOAD = true;
                        }
                    }
                    if(data.RELOAD){
                        location.reload();
                    }

                }
            }
        });
    }

    /* Добавление в сравнение */
    function itemsCompare(id) {
        $.ajax({
            url: arItertechSmallCart.path,
            data: {'method': 'itemsCompare', 'id': id, 'sessid':BX.bitrix_sessid(), 'siteId': arItertechSmallCart.siteID},
            type: 'POST',
            success: function (data) {
                if(data.result=='error'){
                    alert(data.result_mess);
                } else {
                    if(arItertechSmallCart.params['DEBUG']=='Y'){
                        console.log('Отладка itemsCompare');
                        console.log(data);
                    }
                    $(document).find('[data-slug="COMPARE_COUNT"]').text(data.COUNT);
                    $(document).find('[data-slug="COMPARE_COUNT_LABEL"]').text(declOfNum(data.COUNT, [BX.message('ARLIGHT_ARSTORE_TOV'), BX.message('ARLIGHT_ARSTORE_TOV1'), BX.message('ARLIGHT_ARSTORE_TOV2')]));
                    $.each(data.IDS, function (i, elem) {
                        $(document).find('[data-slug="ADD_TO_COMPARE"][data-id="'+elem+'"]').addClass('in_cart');
                    });
                    if(data.DELETE){
                        $(document).find('[data-slug="COMPARE_TD"][data-id="'+data.DELETE+'"]').remove();
                        if(window.location.href.indexOf('/compare/')) compareFunc();
                        if(data.COUNT == 0 && window.location.href.indexOf('/compare/')>0){
                            data.RELOAD = true;
                        }
                    }
                    if(data.RELOAD){
                        location.reload();
                    }

                }
            }
        });
    }

    // Для админа
    $(document).on('change', '[data-slug="CART_QUANTITY_ADMIN"]', function () {
        var quantity = parseFloat($(this).val());
        if(quantity <= 0){
            if (confirm("Удалить данный товар из заказа?")) {
                $(this).parents('[data-slug="CART_ROW_ADMIN"]').remove();
            } else {
                $(this).val($(this).data('packnorm')).change();
            }
        }
        updateOrderProducts();
    });
    function updateOrderProducts(orderProducts){
        if(!orderProducts){
            orderProducts = {};
        }
        $('[data-slug="CART_QUANTITY_ADMIN"]').each(function () {
            var id = $(this).data('id');
            if(id){
                orderProducts[id] = {'quantity': $(this).val()};
            }
        });
        arItertechSmallCart.params['IDS_CART'] =  orderProducts;
        arItertechSmallCart.params['USER_ID'] =  $('#userId').val();
        arItertechSmallCart.params['PROMOCODE'] =  $('#promocode').val();
        arItertechSmallCart.params['CUSTOM_DISCOUNT'] =  $('[data-slug="DISCOUNT_ADMIN"]').val();
        $.ajax({
            url: arItertechSmallCart.path,
            data: {'method': 'getItemsFromOrderAdminEdit', 'params':arItertechSmallCart.params, 'sessid':BX.bitrix_sessid(), 'siteId': arItertechSmallCart.siteID},
            type: 'POST',
            success: function (data) {
                if(data){
                    if(data.result=='error'){
                        alert(data.result_mess);
                    } else {
                        if(arItertechSmallCart.params['DEBUG']=='Y') {
                            console.log('Отладка updateOrderProducts');
                            console.log(data);
                        }
                        var tr = '';
                        var cnt = 1;
                        $.each(data.PRODUCTS, function (i, elem) {
                            tr += insertProductRow(cnt, elem);
                            cnt++;
                        });
                        $('#products_list_admin').html(tr);
                        $('#products_list_admin>div').show();

                        var deliveryPrice =  parseInt($('[data-slug="DELIVERY"] option:selected').data('price'));

                        $('[data-slug="TOTALCART_SUMM_ADMIN"]').html(formatPrice((data.TOTALCART.OLDSUMM_MATH) ? data.TOTALCART.OLDSUMM_MATH : data.TOTALCART.SUMM_MATH, 1, true));

                        if(data.TOTALCART.DISCOUNT_TYPE){
                            $('[data-slug="DISCOUNT_BLOCKS"]').show();
                        } else {
                            $('[data-slug="DISCOUNT_BLOCKS"]').hide();
                        }

                        $('[data-slug="TOTALCART_DISCOUNT_TYPE_ADMIN"]').html(data.TOTALCART.DISCOUNT_TYPE_TEXT);
                        $('[data-slug="TOTALCART_DISCOUNT_PERCENT_ADMIN"]').html(data.TOTALCART.DISCOUNT_PERCENT_MATH+((data.TOTALCART.DISCOUNT_PERCENT_MATH_DOP) ? '+'+data.TOTALCART.DISCOUNT_PERCENT_MATH_DOP : '') + '%');
                        $('[data-slug="TOTALCART_DISCOUNT_SUMM_ADMIN"]').html(formatPrice(data.TOTALCART.DISCOUNT_SUMM_MATH+((data.TOTALCART.DISCOUNT_SUMM_DOP_MATH) ? data.TOTALCART.DISCOUNT_SUMM_DOP_MATH : 0), 1, true));
                        $('[data-slug="TOTALCART_SUMM_PROM_ADMIN"]').html(formatPrice(data.TOTALCART.SUMM_MATH), 1, true);
                        $('[data-slug="DELIVERY_PRICE_ADMIN"]').html(formatPrice(deliveryPrice), 1, true);
                        $('[data-slug="TOTALCART_ORDER_SUMM_ADMIN"]').html(formatPrice(data.TOTALCART.SUMM_MATH+deliveryPrice), 1, true);
                    }
                }
            }
        });

    }
    function insertProductRow(cnt , data){
        var tr = $('div.FOR_ROW');
        tr = tr[0].outerHTML;
        var item_packnorm = false;
        if(data.PACKAGE && data.PACKAGE_COUNT){
            item_packnorm = (data.PACKAGE === '-' ? "Ед.изм" : data.PACKAGE) + ': '+ data.PACKAGE_COUNT +' '+data.UNIT;
        }
        tr = tr.replace(/#ID#/g, data.ID)
            .replace(/#NUMBER#/g, cnt)
            .replace(/#ARTNUMBER#/g, data.ARTNUMBER)
            .replace(/#NAME#/g, data.NAME)
            .replace(/#DESCRIPTION#/g, data.DESCRIPTION)
            .replace(/#PRICE#/g, formatPrice(data.PRICE_MATH, 1, true))
            .replace(/#OLDPRICE#/g, (data.OLDPRICE_MATH) ? formatPrice(data.OLDPRICE_MATH, 1, true) : '')
            .replace(/#SUMM#/g, formatPrice(data.PRICE_MATH, data.QUANTITY, true))
            .replace(/#OLDSUMM#/g, (data.OLDPRICE_MATH) ? formatPrice(data.OLDPRICE_MATH, data.QUANTITY, true) : '')
            .replace(/#PRICE_MATH#/g, data.PRICE_MATH)
            .replace(/#QUANTITY#/g, data.QUANTITY)
            .replace(/#PACKAGE_COUNT#/g, data.PACKAGE_COUNT)
            .replace(/#ITEM_PACKNORM#/g, item_packnorm)
        ;
        return tr;
    }
    $(document).on('click', '.pr_remove', function () {
        if (confirm("Удалить данный товар из заказа?")) {
            $(this).parents('[data-slug="CART_ROW_ADMIN"]').remove();
            updateOrderProducts();
        }
        return false;
    });
    $('[data-slug="BTN_SEARCH_ADMIN"]').click(function () {

        var input = $(this).parents('.block_prods').find('[data-slug="INPUT_SEARCH"]');
        var find = input.val();
        var iblock = input.data('iblock');
        find = find.trim();

        var addedProducts = [];
        $('[data-slug="CART_QUANTITY_ADMIN"]').each(function () {
            var id = $(this).data('id');
            addedProducts.push(parseInt(id));
        });
        if(!find){
            return false;
        }

        $.ajax({
            url: '/admin/content/asset/php/ajax.php',
            data: {'method': 'findProduct', 'find': find, 'addedProducts':addedProducts, 'iblock':iblock, 'sessid':BX.bitrix_sessid()},
            type: 'POST',
            success: function (data) {
                if(data.result=='error'){
                    alert(data.result_mess);
                } else {
                    var optionList = '';
                    data_elem = new Map();
                    $.each(data, function (i, elem) {
                        data_elem.set(elem.ID, elem);
                        optionList += '<tr><td class="NAME"><a target="_blank" href="'+elem.DETAIL_PAGE_URL+'">'+elem.NAME+'</a></td><td>Арт: '+elem.PROPERTY_ARTICLE_VALUE+'</td><td><a data-id="'+elem.ID+'" class="add_product_admin" href="#">добавить</a></td></tr>';
                    });
                    if(!optionList){
                        optionList = '<tr><td>Ничего не найдено!</td></tr>';
                    }
                    $('.select-search tbody').html(optionList);
                    $('.select-search').slideDown(300);
                }
            }
        });
    });
    $(document).on('click', '.add_product_admin', function () {
        var id = $(this)[0].dataset.id;
        var thisData = data_elem.get(id);
        var quantity = (thisData.PROPERTY_PACKNORM_VALUE) ? thisData.PROPERTY_PACKNORM_VALUE : 1;
        var addProduct = {};
        addProduct[id] = {'quantity': quantity};
        updateOrderProducts(addProduct);
        return false;
    });
    $('[data-slug="DELIVERY"]').change(function () {
        updateOrderProducts();
    });
    $('[data-slug="INPUT_SEARCH"]').keydown(function(e) {
        if(e.keyCode === 13) {
            $('[data-slug="BTN_SEARCH_ADMIN"]').click();
        }
    });
    $(document).on('click', '[data-slug="ADD_CUSTOM_DISCOUNT"]', function () {
        if($(this).hasClass('btn-danger')){
            if (confirm("При удалении индивидуальной скидки сумма заказа будет пересчитана с учетом стандартных скидок, если покупатель попадает под их действие. Продолжить?")) {
                $('[data-slug="DISCOUNT_ADMIN"], [data-slug="DISCOUNT_ADMIN_APPEND"]').hide().val('');
                $(this).removeClass('btn-danger');
                $(this).text('Добавить индивидуальную скидку');
                $('[name="field[UPDATE_PRODUCTS]"]').val('Y');
                updateOrderProducts();
            }
        } else {
            if (confirm("Внимание! При добавлении индивидуальной скидки все остальные типы скидок для данного заказа будут отменены.")) {
                $('[data-slug="DISCOUNT_ADMIN"], [data-slug="DISCOUNT_ADMIN_APPEND"]').show();
                $(this).addClass('btn-danger');
                $(this).text('Удалить индивидуальную скидку');
            }
        }
    });
    $('[data-slug="DISCOUNT_ADMIN"]').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    }).keyup(function (e) {
        var locationURL = window.location.pathname;
        var maxPercents = 10;
        if(locationURL === siteDir + 'admin/settings/discount/edit/'){
            maxPercents = 35;
        }
        if(locationURL === siteDir + 'admin/order/'){
            maxPercents = 30;
        }
        if(e.currentTarget.value > maxPercents){
            e.currentTarget.value = maxPercents;
        }
    }).change(function () {
        $('[name="field[UPDATE_PRODUCTS]"]').val('Y');
        updateOrderProducts();
    });


    // Склонение числительных
    function declOfNum(number, titles) {
        var cases = [2, 0, 1, 1, 1, 2];
        return titles[ (number%100>4 && number%100<20)? 2 : cases[(number%10<5)?number%10:5] ];
    }

});


(function (window) {
    if (window.ItertechSmallCart)
        return;

    window.ItertechSmallCart = function (arParams) {
        arItertechSmallCart = [];
        arItertechSmallCart.params = arParams.jsParams;
        arItertechSmallCart.ID = arParams.ID;
        arItertechSmallCart.path = arParams.path;
        arItertechSmallCart.siteID = arParams.jsParams.SITE_ID;
    }
})(window);