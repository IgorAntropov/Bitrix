<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<?php if ($arResult["ITEMS"]) { ?>
    <?php if ($APPLICATION->GetCurPage(false) == SITE_DIR . 'order/' || $APPLICATION->GetCurPage(false) == SITE_DIR . 'personal/cart/'): ?>
        <?php foreach ($arResult["ITEMS"] as $key => $arItem): ?>
            <div class="map__list-pickup">
                <input type="radio" class="input__radio"
                       name="field[USER][PICKUPPOINT_ID]" <?= ($_POST['field']['USER']['PICKUPPOINT_ID'] == $arItem['ID']) ? 'checked' : ''; ?>
                       value="<?= $arItem['ID']; ?>" id="delivery_<?= $arItem['ID']; ?>">
                <label
                        class=""
                        id="delivery_label_<?= $key + 1; ?>"
                        for="delivery_<?= $arItem['ID']; ?>"
                        onclick="myMap.setCenter([<?= $arItem['PROPERTIES']['COORD']['VALUE'] ?>], 12); myPlacemark<?= $key + 1; ?>.balloon.open();">
                    <div class="map__list-item" data-linum="<?= $key + 1 ?>">
                        <div class="map__list-pickup--name"><?= $arItem['NAME'] ?></div>
                        <div class="map__list-pickup--address"><?= $arItem['PROPERTIES']['ADDRESS']['VALUE'] ?></div>
                        <?php if ($arItem['PROPERTIES']['PHONE']['VALUE']) { ?>
                            <div class="map__list-pickup--phone">
                                <?php $value = array_shift($arItem['PROPERTIES']['PHONE']['VALUE']);
                                $val = GetArrayOrString($value);
                                if (is_array($val)) {
                                    foreach ($val as $value): ?>
                                        <p>
                                            <a
                                                    href="tel:+<?= preg_replace('/[^0-9]/', '', strip_tags($value)) ?>">
                                                <?= $value ?>
                                            </a>
                                        </p>
                                    <?php endforeach;
                                } else { ?>
                                    <p>
                                        <a href="tel:+<?= preg_replace('/[^0-9]/', '', strip_tags($value)) ?>"><?= $val ?></a>
                                    </p>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <?php if ($arItem['PROPERTIES']['EMAIL']['VALUE']) { ?>
                            <div class="map__list-pickup--email">
                                <?php $value = array_shift($arItem['PROPERTIES']['EMAIL']['VALUE']);
                                $val = GetArrayOrString($value);
                                if (is_array($val)) {
                                    foreach ($val as $value): ?><a
                                        href="mailto:<?= $value ?>"><?= $value . " " ?></a> <?php endforeach; ?><?php } else { ?>
                                    <a href="mailto:<?= $value ?>"><?= $val ?></a> <?php } ?>
                            </div>
                        <?php } ?>
                        <?php if ($arItem['PROPERTIES']['SCHEDULE']['VALUE']) { ?>
                            <div style="display:inline-block;">
                                <br><?= GetMessage("ARLIGHT_ARSTORE_VREMA_RABOTY") ?><br><br>
                                <?php
                                //строку графика работы в массив
                                $shopTimeArr = explode(';', $arItem['PROPERTIES']['SCHEDULE']['VALUE']);
                                ?>
                                <?php foreach ($shopTimeArr as $shopTimeItem): ?>
                                    <?php if ($shopTimeItem): ?>
                                        <div class="contacts__item-time--item">
                                            <?php $timeAr = explode('&', $shopTimeItem) ?>
                                            <span><?= $timeAr[0] ?></span>
                                            <span><?= $timeAr[1] ?></span>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php } ?>
                    </div>
                </label>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <div id="map"></div>
    <?php $color_scheme = COption::GetOptionString("header_action", "sch_color", '');
    $imgPath = SITE_TEMPLATE_PATH . '/img/map-point.svg';
    if ($color_scheme) {
        if ($color_scheme == 'scheme2')
            $imgPath = SITE_TEMPLATE_PATH . '/img/map-point_1.svg';
        if ($color_scheme == 'scheme3')
            $imgPath = SITE_TEMPLATE_PATH . '/img/map-point_2.svg';
        if ($color_scheme == 'scheme4')
            $imgPath = SITE_TEMPLATE_PATH . '/img/map-point_3.svg';
    }
    ?>
    <script>
        var myMap;
        $(document).ready(function () {
            ymaps.ready(init);
            function init() {
                if ($('#map').length > 0) {
                    myMap = new ymaps.Map("map", {
                        center: [55.76, 37.64],
                        zoom: 10,
                        controls: ['zoomControl', 'typeSelector', 'fullscreenControl']
                    }),
                    <?php foreach ($arResult["ITEMS"] as $key=>$arItem): ?>
                    <?php
                        //разберем дополнительные свойства
                        $propValueStr = $arItem['PROPERTIES']['PROPERTY']['~VALUE'];
                        $propValueAr = json_decode($propValueStr, true);
                        $phoneValues = (array)$arItem['PROPERTIES']['PHONE']['VALUE'];
                        ?>
                        myPlacemark<?=$key + 1?> = new ymaps.Placemark([<?=$arItem['PROPERTIES']['COORD']['VALUE']?>], {
                            balloonContentBody:
                                '<?php if ($propValueAr['metro']): ?><span><?=GetMessage("ARLIGHT_ARSTORE_M")?><?= $propValueAr['metro'] ?></span><br><?php endif; ?><?=$arItem['PROPERTIES']['ADDRESS_CITY']['VALUE'] . ', ' . $arItem['PROPERTIES']['ADDRESS']['VALUE']?><?php if ($propValueAr['mall']): ?> <br><span><?= $propValueAr['mall'] ?></span><?php endif; ?>',
                            balloonContentFooter: '<br><?php $value = array_shift($phoneValues);$val = GetArrayOrString($value);if (is_array($val)) { foreach ($val as $value): ?> <a style="font-size: 15px; font-weight: bold; color: #2C2731;" href="tel:+<?= preg_replace('/[^0-9]/', '', strip_tags($value)) ?>"><?= $value ?></a><?php endforeach; } else {    ?><a style="font-size: 15px; font-weight: bold; color: #2C2731;" href="tel:+<?= preg_replace('/[^0-9]/', '', strip_tags($value)) ?>"><?= $val ?></a><?php }?><br>',

                        }, {
                            iconLayout: 'default#imageWithContent',
                            iconImageHref: '<?=$imgPath?>',
                            iconImageSize: [60, 72],
                            iconImageOffset: [-30, -72],
                            iconContentOffset: [25, 20],
                        })
                    <?php endforeach; ?>
                    // ƒобавл€ем все метки на карту.
                    myMap.geoObjects
                    <?php foreach ($arResult["ITEMS"] as $key=>$arItem): ?>
                        .add(myPlacemark<?=$key + 1?>)
                    <?php endforeach; ?>
                    ;
                    myMap.behaviors.disable('scrollZoom');
                    myMap.setBounds(myMap.geoObjects.getBounds(), {checkZoomRange: true})
                        .then(function () {
                            myMap.setZoom(myMap.getZoom() - 1);
                            if (map.getZoom() > 10) map.setZoom(10);
                        });
                }
            }

            $('.order__delivery-radio').on('change', function () {
                if ($(this).val() !== 1) {
                    $('#ORDER_PROP_4').parent().show();
                } else {
                    $('#delivery_label_1').click();
                    $('#ORDER_PROP_4').parent().hide();
                }
            });

            $(document).on('click', '.map__link', function (e) {
                e.preventDefault();
                var coords = $(this).attr('data-coords');
                SetCenter(coords);
            });

            $(document).on('click', '.map__list label', function () {
                var coords = $(this).find('span').attr('data-coords');
                SetCenter(coords);
            });

            $(document).on('click', '[data-serv="TO_MAP"]', function (e) {
                e.preventDefault();
                var coords = $(this).attr('data-coords');
                SetCenter(coords);
                var top = $('#map').offset().top - 20;
                $("html, body").animate({scrollTop: top}, 1000);
            });

            function SetCenter(coords) {
                if (coords) {
                    var coordsarray = coords.split(',');
                    if (myMap) {
                        myMap.setCenter([coordsarray[0], coordsarray[1]], 12);
                    }
                }
            }

        });
    </script>
<?php } ?>