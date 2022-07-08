<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Config\Option;
use Bitrix\Main\Page\Asset;
$this->setFrameMode(false);

if ($arResult['DELIVERY']) {
    $arResult['DELIVERY'] = array_values($arResult['DELIVERY']);
    foreach ($arResult['DELIVERY'] as $DELIVERY) {
        if($DELIVERY['DELIVERY_TYPE']=='YD'){
            if($DELIVERY['DATA']['WIDGET']){
                preg_match('/(src=["\'](.*?)["\'])/', $DELIVERY['DATA']['WIDGET'], $yandexScriptSrc);
                Asset::getInstance()->addJs($yandexScriptSrc[2]);
            }
            break;
        }
    }
}

?>

<?php if ($arResult['ERROR']) { ?>
    <div class="order row error_row">
        <div class="col-md-8">
            <div class="alert alert-warning">
                <p>
                    <?= $arResult['ERROR']; ?>
                    <? //ShowMessage($arResult['ERROR']); ?>
                </p>
                <?php if($arResult['ERROR_SHOW_CATALOGUE_LINK']){?>
                    <p><a href="<?= SITE_DIR ?>catalog/" class="button" style="width:250px"><?=GetMessage("ARLIGHT_ARSTORE_PEREYTI_V_KATALOG")?></a></p>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($arResult['ORDER_ID'] && (int)$arResult['ORDER_ID'] > 0) { ?>
    <div class="order row">
        <div class="col-md-12">
            <div class="title title-page">
                <?=GetMessage("ARLIGHT_ARSTORE_VAS_ZAKAZ")?><?= $arResult['ORDER_ID']; ?> <?=GetMessage("ARLIGHT_ARSTORE_OT")?><?= $arResult['ORDER_DATE']; ?> <?=GetMessage("ARLIGHT_ARSTORE_USPESNO_SOZDAN")?></div>
            <?php if($arResult['PAYMENT_DATA']['SUCCESS_MESS']){ ?>
                <div class="payment_success_mess"><?=$arResult['PAYMENT_DATA']['SUCCESS_MESS'];?></div>
            <?php } ?>
            <p><?=GetMessage("ARLIGHT_ARSTORE_VY_MOJETE_SLEDITQ_ZA")?><a href="<?= SITE_DIR ?>personal/"><?=GetMessage("ARLIGHT_ARSTORE_PERSONALQNOM_RAZDELE")?></a></p>
            <?php if($arResult['PAYMENT_TYPE']=='YK'){?>
                <p><a href="<?= SITE_DIR ?>catalog/" class="button" style="width:250px"><?=GetMessage("ARLIGHT_ARSTORE_OPLATITQ")?></a></p>
            <?php } ?>

            <p><a href="<?= SITE_DIR ?>catalog/" class="button" style="width:250px"><?=GetMessage("ARLIGHT_ARSTORE_PEREYTI_V_KATALOG")?></a></p>
        </div>
    </div>
    <?php
    if ($arResult['DELIVERY']) {
        $arResult['DELIVERY'] = array_values($arResult['DELIVERY']);
        foreach ($arResult['DELIVERY'] as $DELIVERY) {
            if($DELIVERY['DELIVERY_TYPE']=='YD'){
                ?>
                <!-- Инициализация виджета и отправка заказа в Яндекс -->
                <script type="text/javascript">
                    ydwidget.ready(function(){
                        ydwidget.initCartWidget({
                            //завершение загрузки корзинного виджета
                            'onLoad': function () {
                                //подтверждаем заказ, и передаем любые данные со страницы успешного оформления, если нужно
                                //в данном случае, номер заказа (чтобы номер заказа в CMS и в Яндекс.Доставке совпадал)
                                //вызов метода confirmOrder подразумевает, что заказ был ранее записан в cookie
                                //методом createOrder (прямым вызовом, или нажатием на элемент с атрибутом data-ydwidget-createorder)
                                ydwidget.cartWidget.order.confirmOrder({'order_num': "<?= $arResult['ORDER_ID']; ?>"})
                                    .done(function (data) {
                                        if (data.status == 'ok') {
                                            //console.log('Заказ создан успешно. ', data)
                                        } else {
                                            //console.log('При создании заказа были ошибки.', data)
                                        }
                                    });
                            }
                        })
                    })
                </script>
                    <?php
            }
        }
    }
    ?>

<?php } ?>
<?php
if (!$arResult['ORDER_ID'] && $arResult['CART_EMPTY'] != 'Y') {
    $requiredAddress = true;
    if (Option::get('itertech.cart', 'REQ_ADRES_' . SITE_ID) == "N")
        $requiredAddress = false;
    $requiredText = '';
    $requiredStar = '';
    if ($requiredAddress){
        $requiredText = 'required';
        $requiredStar = '*';
    }

    //цель яндекс.метрики для оформления заказа
    $yaMetrica = '';
    global $goalCurrent;
    if ($goalCurrent['send-order']['name'] && $goalCurrent['send-order']['id'])
        $yaMetrica = 'onsubmit="ym(' . $goalCurrent['send-order']['id'] . ',\'reachGoal\',\'' . $goalCurrent['send-order']['name'] . '\'); return true;"';
    ?>
    <form action="<?= POST_FORM_ACTION_URI ?>" class="" id="send_order" method="POST" enctype="multipart/form-data" <?= $yaMetrica; ?>">
        <?= bitrix_sessid_post() ?>
        <div class="order row">
            <div class="col-md-8">
                <div class="order-title"><?=GetMessage("ARLIGHT_ARSTORE_INFORMACIA_O_POKUPAT")?></div>
                <? if (!$USER->IsAuthorized()): ?>
                    <div class="order__reg">
                        <?=GetMessage("ARLIGHT_ARSTORE_UJE_ZAREGISTRIROVAN")?><a href="#popup-auth" data-fancybox data-name="auth-form"><?=GetMessage("ARLIGHT_ARSTORE_VOYTI_V_SISTEMU")?></a>
                    </div>
                <?else:?>
                <br> <br>
                <? endif; ?>
                <div class="order__form ">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="order__form-input ">
                                <div class="order__form-input-title"><?=GetMessage("ARLIGHT_ARSTORE_KONTAKTNOE_LICO")?></div>
                                <input class="input input--indefinite" type="text" maxlength="250" required="" id="name"
                                       name="field[USER][NAME]" value="<?=$arResult['USER_NAME'];?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="order__form-input ">
                                <div class="order__form-input-title">E-Mail*</div>
                                <input class="input input--indefinite" type="email" maxlength="250" required="" id="email"
                                       name="field[USER][EMAIL]" value="<?=$arResult['USER_EMAIL'];?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="order__form-input ">
                                <div class="order__form-input-title"><?=GetMessage("ARLIGHT_ARSTORE_TELEFON_FAKS")?></div>
                                <input class="input input--indefinite" type="text" maxlength="250" required="" id="phone"
                                       name="field[USER][PHONE]" value="<?=$arResult['USER_PHONE'];?>">
                            </div>
                        </div>
                        <div class="col-md-6 city_input">
                            <div class="order__form-input">
                                <div class="order__form-input-title"><?=GetMessage("ARLIGHT_ARSTORE_GOROD")?><?= $requiredStar ?></div>
                                <input class="input input--indefinite" type="text" maxlength="250" data-required="<?= $requiredText?>" <?= $requiredText; ?> name="field[USER][CITY]" id="city" value="<?=$arResult['USER_CITY'];?>">
                            </div>
                        </div>
                        <div class="col-md-4 street_input">
                            <div class="order__form-input">
                                <div class="order__form-input-title"><?=GetMessage("ARLIGHT_ARSTORE_ULICA")?><?= $requiredStar ?></div>
                                <input class="input input--indefinite" type="text" maxlength="250" data-required="<?= $requiredText?>" <?= $requiredText; ?> name="field[USER][STREET]" id="street" value="<?=$arResult['USER_STREET'];?>">
                            </div>
                        </div>
                        <div class="col-md-4 house_input">
                            <div class="order__form-input">
                                <div class="order__form-input-title"><?=GetMessage("ARLIGHT_ARSTORE_DOM")?><?= $requiredStar ?></div>
                                <input class="input input--indefinite" type="text" maxlength="250" data-required="<?= $requiredText?>" <?= $requiredText; ?> name="field[USER][HOUSE]" id="house" value="<?=$arResult['USER_HOUSE'];?>">
                            </div>
                        </div>
                        <div class="col-md-4 app_input">
                            <div class="order__form-input">
                                <div class="order__form-input-title"><?=GetMessage("ARLIGHT_ARSTORE_KV_OFIS")?></div>
                                <input class="input input--indefinite" type="text" maxlength="250" name="field[USER][APP]" id="app" value="<?=$arResult['USER_APP'];?>">
                            </div>
                        </div>
                        <div class="col-md-4 index_input" style="display:none;">
                            <div class="order__form-input">
                                <div class="order__form-input-title"><?=GetMessage("ARLIGHT_ARSTORE_INDEKS")?></div>
                                <input class="input input--indefinite" type="text" maxlength="250" name="field[USER][INDEX]" id="index" value="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="order__form-input ">
                                <div class="order__form-input-title"><?=GetMessage("ARLIGHT_ARSTORE_DOP_INFORMACIA")?></div>
                                <textarea class="input input--textarea input--indefinite" rows="1"
                                          name="field[USER][COMMENT]"
                                          id="ORDER_PROP_30"><?=$arResult['USER_COMMENT'];?></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="order__form-block">
                                <p>* - <?=GetMessage("ARLIGHT_ARSTORE_POLA_OBAZATELQNYE_K")?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($arResult['DELIVERY']) { ?>
                    <?php foreach ($arResult['DELIVERY'] as $key => $DELIVERY) { ?>
                        <div class="order__delivery  ">
                            <div class="order__delivery-block">
                                <input type="radio" class="order__delivery-radio input__radio"
                                       id="order-delivery-<?= $DELIVERY['ID']; ?>"
                                       value="<?= $DELIVERY['ID']; ?>" name="field[DELIVERY_ID]"
                                       data-price="<?= $DELIVERY['PRICE']; ?>"
                                       data-delivery-type="<?= $DELIVERY['DELIVERY_TYPE']; ?>"
                                       data-delivery-id="<?= $DELIVERY['ID']; ?>"<?= (($key == 0 && !$arResult['DELIVERY_ID']) || $DELIVERY['ID'] == $arResult['DELIVERY_ID']) ? ' checked=""' : ''; ?>>
                                <label for="order-delivery-<?= $DELIVERY['ID']; ?>" class="order__delivery-label">
                                    <?php if($arParams['ADD_IMAGE_DELIVERY']=='Y' && $DELIVERY['IMAGE']){?>
                                        <img src="<?=$DELIVERY['IMAGE'];?>" alt="<?=$DELIVERY['NAME'];?>" style="margin-right:10px" />
                                    <?php } ?>
                                    <span><?= $DELIVERY['NAME']; ?></span>
                                </label>
                                <div class="order__delivery-description">
                                    <div class="order__delivery-description-text">
                                        <?= $DELIVERY['DESCRIPTION']; ?>
                                    </div>
                                    <?php if($DELIVERY['DELIVERY_TYPE']=='YD') { ?>
                                        <div>
                                            <div id="yandex_delivery_errors"></div>

                                            <!-- Создаем условный объект с данными о содержимом корзины (для примера) -->
                                            <script type="text/javascript">

                                                /*

                                                window.cart = {
                                                    quantity: 3, //общее количество товаров
                                                    weight: 2,
                                                    cost: 1000,
                                                    itemsDimensions: [
                                                        [10,15,10,2],
                                                        [20,15,5,1]
                                                    ]
                                                }
*/

                                                console.log(window.cart);

                                            </script>
                                            <div id="yandex_delivery_description"></div>

                                            <p>
                                                <a style="width:300px" class="button" id="open_window" data-ydwidget-open href="javascript:void()" data-no="<?=GetMessage("ARLIGHT_ARSTORE_NAJMITE_DLA_VYBORA_V")?>"
                                                   data-yes="<?=GetMessage("ARLIGHT_ARSTORE_IZMENITQ_VARIANT_DOS")?>"><?=GetMessage("ARLIGHT_ARSTORE_NAJMITE_DLA_VYBORA_V")?></a>
                                            </p>

                                            <div id="yandex_delivery" class="yd-widget-modal"></div>



                                        </div>
                                    <?php } ?>
                                    <?php
                                    // Самовывоз карта
                                    if ($DELIVERY['DELIVERY_TYPE'] == 'pickup') {
                                        ?>
                                        <div class="map map-order">
                                            <div class="map__block ">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="map__block-info">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="map__wrap">
                                                <?
                                                global $arFilter;
                                                $arFilter['PROPERTY_IS_PICKUPPOINT'] = 'Y';

                                                $APPLICATION->IncludeComponent(
                                                    "bitrix:news.list",
                                                    "map",
                                                    array(
                                                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                                        "ADD_SECTIONS_CHAIN" => "N",
                                                        "AJAX_MODE" => "N",
                                                        "AJAX_OPTION_ADDITIONAL" => "",
                                                        "AJAX_OPTION_HISTORY" => "N",
                                                        "AJAX_OPTION_JUMP" => "N",
                                                        "AJAX_OPTION_STYLE" => "N",
                                                        "CACHE_FILTER" => "N",
                                                        "CACHE_GROUPS" => "Y",
                                                        "CACHE_TIME" => "36000000",
                                                        "CACHE_TYPE" => "A",
                                                        "CHECK_DATES" => "Y",
                                                        "DETAIL_URL" => "",
                                                        "DISPLAY_BOTTOM_PAGER" => "N",
                                                        "DISPLAY_DATE" => "Y",
                                                        "DISPLAY_NAME" => "Y",
                                                        "DISPLAY_PICTURE" => "Y",
                                                        "DISPLAY_PREVIEW_TEXT" => "Y",
                                                        "DISPLAY_TOP_PAGER" => "N",
                                                        "FIELD_CODE" => array(
                                                            0 => "",
                                                            1 => "",
                                                        ),
                                                        "FILTER_NAME" => "arFilter",
                                                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                                        "IBLOCK_ID" => CONTACTS_ID,
                                                        "IBLOCK_TYPE" => "content",
                                                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                                        "INCLUDE_SUBSECTIONS" => "Y",
                                                        "MESSAGE_404" => "",
                                                        "NEWS_COUNT" => "200",
                                                        "PAGER_BASE_LINK_ENABLE" => "N",
                                                        "PAGER_DESC_NUMBERING" => "N",
                                                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                                        "PAGER_SHOW_ALL" => "N",
                                                        "PAGER_SHOW_ALWAYS" => "N",
                                                        "PAGER_TEMPLATE" => ".default",
                                                        "PAGER_TITLE" => GetMessage("ARLIGHT_ARSTORE_NOVOSTI"),
                                                        "PARENT_SECTION" => "",
                                                        "PARENT_SECTION_CODE" => "",
                                                        "PREVIEW_TRUNCATE_LEN" => "",
                                                        "PROPERTY_CODE" => array(
                                                            0 => "SCHEDULE",
                                                            1 => "COORD",
                                                            2 => "",
                                                        ),
                                                        "SET_BROWSER_TITLE" => "N",
                                                        "SET_LAST_MODIFIED" => "N",
                                                        "SET_META_DESCRIPTION" => "N",
                                                        "SET_META_KEYWORDS" => "N",
                                                        "SET_STATUS_404" => "N",
                                                        "SET_TITLE" => "N",
                                                        "SHOW_404" => "N",
                                                        "SORT_BY1" => "ACTIVE_FROM",
                                                        "SORT_BY2" => "SORT",
                                                        "SORT_ORDER1" => "DESC",
                                                        "SORT_ORDER2" => "ASC",
                                                        "STRICT_SECTION_CHECK" => "N",
                                                        "COMPONENT_TEMPLATE" => "map"
                                                    ),
                                                    false
                                                ); ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="col-md-4">
                <div class="order-title"><?=GetMessage("ARLIGHT_ARSTORE_OPLATA")?></div>
                <div class="order__pay-block">
                    <div class="order__pay-col">
                        <input class="input" type="text" autocomplete="off" name="field[USER][PROMOCODE]" placeholder="<?=GetMessage("ARLIGHT_ARSTORE_VVEDITE_PROMOKOD")?>" data-func="<?=(!$arResult['PROMOCODE']) ? 'add' : 'remove';?>"
                               <?=($arResult['PROMOCODE']) ? 'disabled' : '';?> data-slug="PROMOCODE" value="<?=$arResult['PROMOCODE'];?>">
                        <input class="button button__promocode <?=(!$arResult['PROMOCODE']) ? 'button_transparent-red' : '';?>" type="button" value="<?=(!$arResult['PROMOCODE']) ? GetMessage("ARLIGHT_ARSTORE_PRIMENITQ") : GetMessage("ARLIGHT_ARSTORE_OTMENITQ");?>" data-slug="PROMOCODE_SEND">
                    </div>
                    <div class="order__pay-col order__pay-title--important" data-slug="ERROR_PROMOCODE" style="display: none"></div>
                    <div class="order__pay-col ">
                        <div class="order__pay-title"><?=GetMessage("ARLIGHT_ARSTORE_SUMMA")?></div>
                        <div class="order__pay-value order__pay-summ" data-slug="TOTALCART_SUMM"></div>
                    </div>
                    <div class="order__pay-col " style="display: none;">
                        <div class="order__pay-title"><?=GetMessage("ARLIGHT_ARSTORE_VAM_PREDOSTAVLENA_SK")?></div>
                        <div class="order__pay-value order__pay-discount" data-slug="TOTALCART_DISCOUNT_PERCENT"></div>
                    </div>
                    <div class="order__pay-col " style="display: none;">
                        <div class="order__pay-title"><?=GetMessage("ARLIGHT_ARSTORE_VASA_EKONOMIA")?></div>
                        <div class="order__pay-value order__pay-discount" data-slug="TOTALCART_DISCOUNT_SUMM">0</div>
                    </div>
                    <div class="order__pay-col " style="display: none;">
                        <div class="order__pay-title"><?=GetMessage("ARLIGHT_ARSTORE_ITOGO_ZA_TOVARY")?></div>
                        <div class="order__pay-value order__pay-discount" data-slug="TOTALCART_SUMM_PROM"></div>
                    </div>
                    <div class="order__pay-col " style="display: none;">
                        <div class="order__pay-title"><?=GetMessage("ARLIGHT_ARSTORE_DOPOLNITELQNAA_SKIDK")?></div>
                        <div class="order__pay-value order__pay-discount" data-slug="TOTALCART_DISCOUNT_SUMM_DOP"></div>
                    </div>
                    <div class="order__pay-col ">
                        <div class="order__pay-title"><?=GetMessage("ARLIGHT_ARSTORE_DOSTAVKA")?></div>
                        <div class="order__pay-value order__pay-delivery-price"
                             data-price="<?= ($arResult['DELIVERY']) ? $arResult['DELIVERY'][0]['PRICE'] : 0; ?>" data-slug="DELIVERY_PRICE">
                            <?= ($arResult['DELIVERY']) ? WorkCart::numberFormat($arResult['DELIVERY'][0]['PRICE']) : 0; ?>
                        </div>
                    </div>
                    <div class="order__pay-col ">
                        <div class="order__pay-title order__pay-title--important"><?=GetMessage("ARLIGHT_ARSTORE_ITOGO_SO_SKIDKOY")?></div>
                        <div class="order__pay-value order__pay-value--important order__pay-total-summ"
                             data-slug="ORDER_SUMM">
                        </div>
                    </div>
                    <?php if ($arResult['PAYMENT']) {
                        $arResult['PAYMENT'] = array_values($arResult['PAYMENT']);
                        $enable_yk = COption::GetOptionString("setting_su", "enable_yk", 'N');
                        $count = 0;
                        foreach ($arResult['PAYMENT'] as $key => $PAYMENT) {
                            if ($PAYMENT['PAYMENT_TYPE'] == 'YK' && $enable_yk == 'N') continue;
                            $count++;
						?>
                            <div class="order__pay-col ">
                                <div class="order__pay-item">
                                    <input type="radio" id="ID_PAY_SYSTEM_ID_<?= $PAYMENT['ID']; ?>"
                                           name="field[PAYMENT_ID]"
                                           value="<?= $PAYMENT['ID']; ?>"
                                           class="order__pay-input input__radio"<?= (($count == 1 && !$arResult['PAYMENT_ID']) || $PAYMENT['ID']==$arResult['PAYMENT_ID']) ? ' checked=""' : ''; ?>>
                                    <label for="ID_PAY_SYSTEM_ID_<?= $PAYMENT['ID']; ?>"
                                           class="order__pay-label  input-radio">
                                        <?php if($arParams['ADD_IMAGE_PAYMENT']=='Y' && $PAYMENT['IMAGE']){?>
                                            <img src="<?=$PAYMENT['IMAGE'];?>" alt="<?=$PAYMENT['NAME'];?>" style="margin-right:10px" />
                                        <?php } ?>
                                        <span><?= $PAYMENT['NAME']; ?></span>
                                    </label>
                                    <div class="order__pay-item-description">
                                        <p><?= $PAYMENT['DESCRIPTION']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <div class="order__pay-col">
                            <input data-ydwidget-createorder="1" id="submit_button" class="button button_red button--main button_full" type="submit" value="<?=GetMessage("ARLIGHT_ARSTORE_OFORMITQ_ZAKAZ")?>">
                        <br>
                        <? $file = $_SERVER['DOCUMENT_ROOT'] . SITE_DIR . "/include/textForSendOrderPage";
                        $text = '';
                        if (file_exists($file)) $text = file_get_contents($file);
                        if ($text): ?>
                            <div class="submit_button--note"><?= $text ?></div>
                        <? endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php } ?>
