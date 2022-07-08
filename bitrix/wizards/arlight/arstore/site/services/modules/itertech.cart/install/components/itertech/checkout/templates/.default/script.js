$(document).ready(function () {
    function selectedDeliveryType(firstRun) {
        //скрытие полей для самовывоза
        var type = $('[name="field[DELIVERY_ID]"]:checked').data('delivery-type');
        if (type === 'pickup') {
            //если самовывоз
            $('.city_input,.street_input, .house_input, .app_input').each(function () {
                var valThis = $(this).find('input').val();
                $(this).hide().find('input').prop('required', false).attr('data-temp', valThis).val('').attr('value', '');
            });
            $.each($('[name="field[USER][PICKUPPOINT_ID]"]'), function (i) {
                if (i === 0)
                    $(this).prop('checked', true);
            })

        } else {
            $('.city_input,.street_input, .house_input, .app_input').each(function () {
                var valTemp = $(this).find('input').attr('data-temp');
                var required = $(this).find('input').attr('data-required');
                if (required == 'required')
                    required = true;
                else
                    required = false;
                $(this).show().find('input').prop('required', required).attr('data-temp', '').val(valTemp).attr('value', valTemp);
            });
            $('[name="field[USER][PICKUPPOINT_ID]"]').prop('checked', false);
        }
    }

    selectedDeliveryType(true);
    $('[name="field[DELIVERY_ID]"]').change(function () {
        selectedDeliveryType();
    });
});

if (typeof ydwidget !== 'undefined') {
    ydwidget.ready(function(){
        const cityEl = '#city';
        const streetEl = '#street';
        const houseEl = '#house';
        const appEl = '#app';
        const indexEl = '#index';
        const phoneEl = '#phone';
        const nameEl = '#name';
        const emailEl = '#email';

        ydwidget.initCartWidget({
            //получить указанный пользователем город
            'getCity': function () {
                var city = yd$(cityEl).val();
                if (city) {
                    return {value: city};
                } else {
                    return false;
                }
            },
            //id элемента-контейнера
            'el': 'yandex_delivery',
            //общее количество товаров в корзине
            'totalItemsQuantity': function () { return cart.quantity },
            //общий вес товаров в корзине
            'weight': function () { return cart.weight },
            //общая стоимость товаров в корзине
            'cost': function () { return cart.cost },
            //габариты и количество по каждому товару в корзине
            'itemsDimensions': function () {return cart.itemsDimensions},
            //объявленная ценность заказа. Влияет на расчет стоимости в предлагаемых вариантах доставки, для записи поля в заказ данное поле так же нужно передать в объекте order (поле order_assessed_value)
            'assessed_value': cart.cost,
            //Способы доставки. Влияют на предлагаемые в виджете варианты способов доставки.
            onlyDeliveryTypes: function(){return ['todoor','pickup','post'];},
            //обработка автоматически определенного города
            'setCity': function (city, region) { yd$(cityEl).val(region ? city + ', ' + region : city) },
            //обработка смены варианта доставки
            'onDeliveryChange': function (delivery) {
                //если выбран вариант доставки, выводим его описание и закрываем виджет, иначе произошел сброс варианта,
                //очищаем описание
                if (delivery) {
                    $('#yandex_delivery_description').html('<p>'+ydwidget.cartWidget.view.helper.getDeliveryDescription(delivery)+'</p>');
                    if (ydwidget.cartWidget.selectedDelivery.type == "PICKUP") {
                        yd$(cityEl).val(ydwidget.cartWidget.selectedDelivery.address.location.name);
                        yd$(streetEl).val(ydwidget.cartWidget.selectedDelivery.address.street).prop('readonly', true);
                        yd$(houseEl).val(ydwidget.cartWidget.selectedDelivery.address.house).prop('readonly', true);
                        yd$(indexEl).val(ydwidget.cartWidget.selectedDelivery.address.index).prop('readonly', true);
                        ydwidget.cartWidget.close();
                    }
                    else if (ydwidget.cartWidget.selectedDelivery.type == "POST") {
                        yd$(cityEl).val(ydwidget.cartWidget.selectedDelivery.address.location.name);
                        yd$(streetEl).prop('readonly', false);
                        yd$(houseEl).prop('readonly', false);
                        yd$(indexEl).prop('readonly', false);
                        ydwidget.cartWidget.close();
                    }
                    else {
                        yd$(streetEl).prop('readonly', false);
                        yd$(houseEl).prop('readonly', false);
                        yd$(indexEl).prop('readonly', false);
                        ydwidget.cartWidget.close();
                    }
                    $('#open_window').text($('#open_window').data('yes'));
                    $('[data-delivery-type="YD"]').attr('data-price',ydwidget.cartWidget.selectedDelivery.costWithRules).data('price',ydwidget.cartWidget.selectedDelivery.costWithRules);
                    $('[name="field[YD][PRICE]"]').val(ydwidget.cartWidget.selectedDelivery.costWithRules);
                    $('[name="field[YD][DELIVERY]"]').val(ydwidget.cartWidget.view.helper.getDeliveryDescription(delivery).replace(/&ndash;/g, " - "));
                    $('[data-delivery-type="YD"]').change();
                    $('#submit_button').removeAttr('disabled');

                } else {
                    $('#open_window').text($('#open_window').data('no'));
                    $('[data-delivery-type="YD"]').attr('data-price','0.00').data('price','0.00');
                    yd$(streetEl).val('').prop('readonly', false);
                    yd$(houseEl).val('').prop('readonly', false);
                    yd$(appEl).val('').prop('readonly', false);
                    yd$(indexEl).val('').prop('readonly', false);
                    $('#yandex_delivery_description').text('');
                }

            },
            //завершение загрузки корзинного виджета
            'onLoad': function () {
                /* Клики по выбору доставок */
                $('[name="field[DELIVERY_ID]"]').change(function () {
                    selectedDeliveryType();
                });
                selectedDeliveryType(true);
            },
            'selectYdVariant': function () { yd$('[data-delivery-type="YD"]').prop('checked', true) },
            //снятие выбора с варианта доставки "Яндекс.Доставка" (настроенного в CMS)
            'unSelectYdVariant': function () { yd$('[data-delivery-type="YD"]').prop('checked', false) },
            //автодополнение
            'autocomplete': ['city', 'street', 'index'],
            'cityEl': cityEl,
            'streetEl': streetEl,
            'houseEl': houseEl,
            'indexEl': indexEl,
            //создавать заказ в cookie для его последующего создания в Яндекс.Доставке только если выбрана доставка Яндекса
            'createOrderFlag': function () {
                if(yd$(phoneEl).val() && yd$(cityEl).val() && yd$(streetEl).val() && yd$(houseEl).val() && yd$(indexEl).val() && yd$('[data-delivery-type="YD"]').prop("checked")==true && ydwidget.cartWidget.selectedDelivery){
                    $('#submit_button').removeAttr('disabled');
                    return true;
                }
            },
            //необходимые для создания заказа поля
            //возможно указывать и другие поля, см. объект Order в документации
            'order': {
                //имя, фамилия, телефон, улица, дом, индекс
                //'recipient_first_name': function () { return yd$(nameEl).val() },
                'recipient_last_name': function () { return yd$(nameEl).val() },
                'recipient_phone': function () { return yd$(phoneEl).val() },
                'recipient_email': function () { return yd$(emailEl).val() },
                'deliverypoint_street': function () { return yd$(streetEl).val() },
                'deliverypoint_house': function () { return yd$(houseEl).val() },
                'deliverypoint_flat': function () { return yd$(appEl).val() },
                'deliverypoint_index': function () { return yd$(indexEl).val() },
                //объявленная ценность заказа
                'order_assessed_value': cart.cost,
                //товарные позиции в заказе
                //возможно указывать и другие поля, см. объект OrderItem в документации
                'order_items': function () { return cart.order_items; }
            },
            //id элемента для вывода ошибок валидации. Вместо него можно указать параметр onValidationEnd, для кастомизации
            //вывода ошибок
            'errorsEl': 'yandex_delivery_errors',
            //запустить сабмит формы, когда валидация успешно прошла и заказ создан в cookie,
            //либо если createOrderFlag вернул false
            'runOrderCreation': function () {
                //alert('runOrderCreation');
                errors = false;
            }
        });
        function selectedDeliveryType(firstRun) {
            var type = $('[name="field[DELIVERY_ID]"]:checked').data('delivery-type');
            if(type === 'YD'){
                errors = true;
                if(!ydwidget.cartWidget.selectedDelivery){
                    (!firstRun) ? ydwidget.cartWidget.open() : '';
                    $('.index_input').show().find('input').prop('required', true);
                }
            } else {
                errors = false;
                $('#submit_button').removeAttr('disabled');

                $('.index_input').hide().find('input').prop('required', false);

                //при выборе доставки, если это не Яндекс.Доставка, сбрасываем выбранную доставку
                ydwidget.cartWidget.setDeliveryVariant(null);

            }
        }


        $('form#send_order').submit(function() {
            $('#address').val();
            if(errors){
                return false;
            }
        });
        $('input[type="text"]').click(function() {
            $('#submit_button').removeAttr('disabled');
        });




    });
}


