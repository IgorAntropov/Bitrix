<?
// Проверка на доступ (всегда стоит первой)
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR."admin/access.php");

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

use Bitrix\Main\Context,
    Bitrix\Main\Page\Asset;

Asset::getInstance()->addCss(SITE_DIR . "admin/settings/bootstrap.min.css");
Asset::getInstance()->addCss(SITE_DIR . "admin/settings/admin.css");

$request = Context::getCurrent()->getRequest();
if (!$request['order']) {
    LocalRedirect(SITE_DIR."admin/");
}

$orderId = (int)$request['order'];
$APPLICATION->SetTitle('Заказ №' . $orderId);

// Получаем информацию по текущему заказу
$arResult = WorkOrder::getOrders(SITE_ID, array('ID' => $orderId));
$order = $arResult['ORDERS'][$orderId];

$dataUserFB = CUser::GetByID($order['USER_ID'])->Fetch();

$allPrice = $order['SUMM'] + $order['DELIVERY_PRICE'];
$isEdit = $request['edit'];
if ($isEdit) {
    WorkAdmin::editOrder();
}
?>
    <div class="title title-page">
        <div class="title__text">Заказ №<?= $orderId; ?></div>
        <div class="title__backlink">
            <i class="icon-arrow-left"></i>
            <a href="">вернуться</a>
        </div>
    </div>

<?php
if (!$order) {
    ?>
    <p><span style="color:#FF0000">Заказ №<?= $orderId; ?> не найден</span></p>
    <?php
} else {
    ?>

    <?php if (!$isEdit) { ?>
        <div class="row">
            <div class="col-lg-3 col-xl-2">
                <p>
                    <a class="button" href="<?= SITE_DIR ?>admin/order/?order=<?= $orderId; ?>&edit=Y">Редактировать</a>
                </p>
            </div>
            <div class="col-lg-3  col-xl-2">
                <p>
                    <a class="button" href="<?= SITE_DIR ?>admin/order/download.php?order=<?= $orderId; ?>">Скачать</a>
                </p>
            </div>
        </div>
    <?php } ?>
    <form action="<?= POST_FORM_ACTION_URI ?>" class="" method="POST" enctype="multipart/form-data">
        <?= bitrix_sessid_post() ?>
        <div class="personal__order-more">
            <div class="personal__order-block personal__order-block--border-top">
                <div class="personal__order-block-title row">
                    <div class="personal__order-number col-lg-4">
                        <div>№<?= $order['ID']; ?></div>
                    </div>
                    <div class="personal__order-status col-lg-4">
                        <div class="text-left">
                            <span class="personal__order-status-text"><?= $order['DATE_CREATE']; ?></span>
                            &nbsp;&nbsp;<?= $order['STATUS']['NAME']; ?>
                        </div>
                    </div>
                    <div class="personal__order-price col-lg-4">
                        <div><span><?= WorkCart::numberFormat($allPrice, SITE_ID, true); ?></span></div>
                    </div>
                </div>
                <div class="personal__order-block-list">
                    <div class="personal__order-list-item personal__order-list-item--title personal__order-list-item--indent">
                        <div class="personal__order-list-col">Статус</div>
                    </div>
                    <div class="personal__order-list-item">
                        <div class="personal__order-list-col personal__order-list-col--param">Статус заказа</div>
                        <div class="personal__order-list-col personal__order-list-col--param-val">
                            <?php if ($isEdit) {?>
                                <div class="form-group">
                                    <select class="form-control" name="field[STATUS]">
                                        <?php
                                        $olderStatus = false;
                                        foreach ($arResult['STATUSES'] as $status) {
                                            $selected = false;
                                            if ($order['STATUS']['ID'] == $status['ID']) {
                                                $selected = 'selected';
                                                $olderStatus = true;
                                            }
                                            ?>
                                            <option <?= $selected ?>
                                                    value="<?= $status['ID']; ?>"><?= $status['NAME']; ?> (id:<?= $status['ID']; ?>)</option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <?php if (!$olderStatus) { ?>
                                    <div class="alert alert-danger">
                                        <div>В настоящее время заказу присвоен статус с ID "<?= $order['STATUS']['NAME']; ?>",
                                            который сейчас отсутствует (удален или переименован).
                                        </div>
                                        <div>Не забудьте указать актуальный статус заказа!</div>
                                    </div>
                                <?php } ?>
                            <?php } else { ?>
                                <?= $order['STATUS']['NAME']; ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="personal__order-list-item personal__order-list-item--title personal__order-list-item--indent">
                        <div class="personal__order-list-col">Данные учетной записи пользователя</div>
                    </div>
                    <div class="personal__order-list-item">
                        <div class="personal__order-list-col personal__order-list-col--param">Учетная запись</div>
                        <div class="personal__order-list-col personal__order-list-col--param-val"><?= $dataUserFB['NAME']; ?> <?= ($dataUserFB['LAST_NAME']) ? $dataUserFB['LAST_NAME'] : ''; ?></div>
                    </div>
                    <div class="personal__order-list-item">
                        <div class="personal__order-list-col personal__order-list-col--param">Логин</div>
                        <div class="personal__order-list-col personal__order-list-col--param-val">
                            <?= $dataUserFB['LOGIN']; ?>
                        </div>
                    </div>
                    <div class="personal__order-list-item">
                        <div class="personal__order-list-col personal__order-list-col--param">E-Mail адрес:</div>
                        <div class="personal__order-list-col personal__order-list-col--param-val">
                            <a href="mailto:<?= $dataUserFB['EMAIL']; ?>"><?= $dataUserFB['EMAIL']; ?></a>
                        </div>
                    </div>
                    <div class="personal__order-list-item personal__order-list-item--title personal__order-list-item--indent">
                        <div class="personal__order-list-col">Личные данные пользователя</div>
                    </div>
                    <div class="personal__order-list-item">
                        <div class="personal__order-list-col personal__order-list-col--param">Контактное лицо</div>
                        <div class="personal__order-list-col personal__order-list-col--param-val">
                            <?php if ($isEdit) { ?>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="field[USER_NAME]" value="<?= $order['USER_NAME']; ?>">
                                </div>
                            <?php } else { ?>
                                <?= $order['USER_NAME']; ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="personal__order-list-item">
                        <div class="personal__order-list-col personal__order-list-col--param">E-Mail</div>
                        <div class="personal__order-list-col personal__order-list-col--param-val">
                            <?php if ($isEdit) { ?>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="field[USER_EMAIL]"
                                           value="<?= $order['USER_EMAIL']; ?>">
                                </div>
                            <?php } else { ?>
                                <a href="mailto:<?= $order['USER_EMAIL']; ?>"><?= $order['USER_EMAIL']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="personal__order-list-item">
                        <div class="personal__order-list-col personal__order-list-col--param">Телефон/факс</div>
                        <div class="personal__order-list-col personal__order-list-col--param-val">
                            <?php if ($isEdit) { ?>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="field[USER_PHONE]"
                                           value="<?= $order['USER_PHONE']; ?>">
                                </div>
                            <?php } else { ?>
                                <?= $order['USER_PHONE']; ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="personal__order-list-item personal__order-list-item--title personal__order-list-item--indent">
                        <div class="personal__order-list-col">Оплата и доставка</div>
                    </div>
                    <div class="personal__order-list-item ">
                        <div class="personal__order-list-col personal__order-list-col--param">Платежная система</div>
                        <div class="personal__order-list-col personal__order-list-col--param-val">
                            <?php if ($isEdit) {
                                $arPayment = WorkOrder::getPayment(SITE_ID);
                                ?>
                                <div class="form-group">
                                    <select class="form-control" name="field[PAYMENT_ID]">
                                        <?php

                                        // todo Удалить после тестирования ЯКассы
                                        $enable_yk = COption::GetOptionString("setting_su", "enable_yk", 'N');

                                        $olderPayment = false;
                                        foreach ($arPayment as $payment) {

                                            if($payment['PAYMENT_TYPE']=='YK' && $enable_yk != 'Y'){
                                                continue;
                                            }

                                            $selected = false;
                                            if ($order['PAYMENT_ID'] == $payment['NAME']) {
                                                $selected = 'selected';
                                                $olderPayment = true;
                                            }
                                            ?>
                                            <option <?= $selected ?>
                                                    value="<?= $payment['ID']; ?>"><?= $payment['NAME']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <?php if (!$olderPayment) { ?>
                                    <div class="alert alert-danger">
                                        <div>При оформлении заказа был выбран способ оплаты
                                            "<?= $order['PAYMENT_ID']; ?>", который сейчас отсутствует (удален или
                                            переименован).
                                        </div>
                                        <div>Не забудьте указать актуальный способ оплаты!</div>
                                    </div>
                                <?php } ?>
                            <?php } else { ?>
                                <?= $order['PAYMENT_ID']; ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="personal__order-list-item">
                        <div class="personal__order-list-col personal__order-list-col--param">Оплачен</div>
                        <div class="personal__order-list-col personal__order-list-col--param-val">
                            <?php if ($isEdit) { ?>
                                <div class="form-group">
                                    <select class="form-control" name="field[PAYMENT]">
                                        <option <?= ($order['PAYMENT'] == 'N') ? 'selected' : ''; ?> value="N">Нет
                                        </option>
                                        <option <?= ($order['PAYMENT'] == 'Y') ? 'selected' : ''; ?> value="Y">Да
                                        </option>
                                    </select>
                                </div>
                            <?php } else { ?>
                                <?= ($order['PAYMENT'] == 'Y') ? 'Да' : 'Нет'; ?>
                            <?php } ?>
                        </div>
                    </div>
                    <?php if ($order['PAYMENT'] == 'Y') { ?>
                        <div class="personal__order-list-item">
                            <div class="personal__order-list-col personal__order-list-col--param">Дата оплаты</div>
                            <div class="personal__order-list-col personal__order-list-col--param-val">
                                <?= $order['PAYMENT_DATE']; ?>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="personal__order-list-item personal__order-list-item--title personal__order-list-item--indent">
                        <div class="personal__order-list-col">Служба доставки</div>
                    </div>
                    <div class="personal__order-list-item">
                        <div class="personal__order-list-col personal__order-list-col--param">Служба доставки</div>
                        <div class="personal__order-list-col personal__order-list-col--param-val">
                            <?php if ($isEdit) {
                                $arDelivery = WorkOrder::getDelivery(SITE_ID);
                                ?>
                                <div class="form-group">
                                    <select class="form-control" name="field[DELIVERY_ID]" data-slug="DELIVERY">
                                        <?php
                                        $olderDelivery = false;

                                        // todo Удалить после тестирования ЯД
                                        $enable_yd = COption::GetOptionString("setting_su", "enable_yd", 'N');

                                        foreach ($arDelivery as $delivery) {
                                            if($delivery['DELIVERY_TYPE']=='YD' && $enable_yd != 'Y'){
                                                continue;
                                            }
                                            $selected = false;
                                            if ($order['DELIVERY'] == $delivery['NAME']) {
                                                $selected = 'selected';
                                                $olderDelivery = true;
                                            }
                                            ?>
                                            <option <?= $selected ?> data-price="<?=$delivery['PRICE'];?>" value="<?= $delivery['ID']; ?>"><?= $delivery['NAME']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <?php if (!$olderDelivery) { ?>
                                    <div class="alert alert-danger">
                                        <div>При оформлении заказа был выбран способ доставки
                                            "<?= $order['DELIVERY']; ?>", который сейчас отсутствует (удален или
                                            переименован).
                                        </div>
                                        <div>Не забудьте указать актуальный способ доставки!</div>
                                    </div>
                                <?php } ?>
                            <?php } else { ?>
                                <?= $order['DELIVERY']; ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="personal__order-list-item">
                        <div class="personal__order-list-col personal__order-list-col--param">Адрес доставки</div>
                        <div class="personal__order-list-col personal__order-list-col--param-val">
                            <?php if ($isEdit) { ?>
                                <div class="form-group">
                                    <label>Индекс:</label>
                                    <input type="text" class="form-control" name="field[USER_INDEX]" value="<?= $order['USER_INDEX']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Город:</label>
                                    <?php if($order['USER_ADDRESS']) { ?>
                                        <input type="hidden" class="form-control" name="field[USER_ADDRESS]" value="">
                                    <?php } ?>
                                    <input type="text" class="form-control" name="field[USER_CITY]" value="<?= ($order['USER_ADDRESS']) ? $order['USER_ADDRESS'] : $order['USER_CITY']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Улица:</label>
                                    <input type="text" class="form-control" name="field[USER_STREET]" value="<?= $order['USER_STREET']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Дом:</label>
                                    <input type="text" class="form-control" name="field[USER_HOUSE]" value="<?= $order['USER_HOUSE']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Кв/оф:</label>
                                    <input type="text" class="form-control" name="field[USER_APP]" value="<?= $order['USER_APP']; ?>">
                                </div>
                            <?php } else { ?>
                                <?php if($order['USER_ADDRESS']) {
                                    echo $order['USER_ADDRESS'];
                                } else {
                                    ?>
                                    <?=($order['USER_INDEX']) ? $order['USER_INDEX'].', ' :'';?>
                                    <?=($order['USER_CITY']) ? $order['USER_CITY'].',' : '';?>
                                    <?=($order['USER_STREET']) ? $order['USER_STREET'].',' : '';?>
                                    <?=$order['USER_HOUSE'];?><?=($order['USER_APP']) ? ', кв/оф: '.$order['USER_APP'] : '';?>
                                <? } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="personal__order-list-item">
                        <div class="personal__order-list-col personal__order-list-col--param">Комментарий к заказу</div>
                        <div class="personal__order-list-col personal__order-list-col--param-val">
                            <?php if ($isEdit) { ?>
                                <div class="form-group">
                                    <textarea class="form-control" name="field[USER_COMMENT]"><?= $order['USER_COMMENT']; ?></textarea>
                                </div>
                            <?php } else { ?>
                                <?= $order['USER_COMMENT']; ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="personal__order-list-item personal__order-list-item--title personal__order-list-item--indent">
                        <div class="personal__order-list-col">Содержимое заказа</div>
                    </div>
                    <div class="personal__order-list-item personal__order-list-item--table personal__order-list-item--title">
                        <div class="personal__order-list-col personal__order-list-col--num">№</div>
                        <div class="personal__order-list-col personal__order-list-col--vend">Артикул</div>
                        <div class="personal__order-list-col personal__order-list-col--name">Наименование</div>
                        <div class="personal__order-list-col personal__order-list-col--desc">Описание</div>
                        <div class="personal__order-list-col personal__order-list-col--count">Количество</div>
                        <div class="personal__order-list-col personal__order-list-col--price text-right">Цена</div>
                        <div class="personal__order-list-col personal__order-list-col--total-price text-right">Сумма</div>
                    </div>
                    <? // Для подстановки ?>
                    <div id="row_#ID#" class="personal__order-list-item personal__order-list-item--table FOR_ROW" style="display: none" data-slug="CART_ROW_ADMIN">
                        <div class="personal__order-list-col personal__order-list-col--num">#NUMBER#</div>
                        <div class="personal__order-list-col personal__order-list-col--vend">#ARTNUMBER#</div>
                        <div class="personal__order-list-col personal__order-list-col--name">#NAME#</div>
                        <div class="personal__order-list-col personal__order-list-col--desc">#DESCRIPTION#</div>
                        <div class="personal__order-list-col personal__order-list-col--count">
                            <div class="buy-block">
                                <div class="buy-block__wrap">
                                    <div class="buy-block__items">
                                        <button class="buy-block__button">-</button>
                                        <input type="text" class="buy-block__input"
                                               name="field[PRODUCTS_NEW][#ID#][quantity]" value="#QUANTITY#"
                                               data-id="#ID#"
                                               data-type="input"
                                               data-price="#PRICE_MATH#"
                                               data-packnorm="#PACKAGE_COUNT#"
                                               data-slug="CART_QUANTITY_ADMIN"
                                               autocomplete="off">
                                        <button class="buy-block__button">+</button>
                                    </div>
                                    <div class="buy-block__item-packnorm">#ITEM_PACKNORM#</div>
                                </div>
                            </div>
                        </div>
                        <div class="personal__order-list-col personal__order-list-col--price text-right">
                            <span>#PRICE#</span><br>
                            <span><s>#OLDPRICE#</s></span>
                        </div>
                        <div class="personal__order-list-col personal__order-list-col--total-price text-right" data-slug="ITEM_SUMM_ADMIN">
                            <span>#SUMM#</span><br>
                            <span><s>#OLDSUMM#</s></span>
                        </div>
                        <a class="pr_remove" style="margin: 0 0 0 10px; color: #FF0000; font-weight: 700" href="">X</a>
                    </div>
                    <div id="products_list_admin">
                        <?php foreach ($order['PRODUCTS'] as $key => $item) {?>
                            <div class="personal__order-list-item personal__order-list-item--table" data-slug="CART_ROW_ADMIN">
                                <input type="hidden" value="<?=$item['ID'];?>" name="field[PRODUCTS][]">
                                <div class="personal__order-list-col personal__order-list-col--num"><?= $key + 1; ?></div>
                                <div class="personal__order-list-col personal__order-list-col--vend"><?= $item['ARTNUMBER']; ?></div>
                                <div class="personal__order-list-col personal__order-list-col--name">
                                    <a href="<?= $item['URL']; ?>"><?= $item['NAME']; ?></a>
                                </div>
                                <div class="personal__order-list-col personal__order-list-col--desc">
                                    <p>
                                        <?= $item['DESCRIPTION']; ?>
                                    </p>
                                </div>
                                <div class="personal__order-list-col personal__order-list-col--count">
                                    <?php if ($isEdit && $order['PAYMENT']=='N') { ?>
                                        <div class="buy-block">
                                            <div class="buy-block__wrap">
                                                <div class="buy-block__items">
                                                    <button class="buy-block__button">-</button>
                                                    <input type="text" class="buy-block__input"
                                                           name="field[PRODUCTS_NEW][<?=$item['PRODUCT_ID'];?>][quantity]" value="<?=$item['QUANTITY'];?>"
                                                           data-id="<?=$item['PRODUCT_ID'];?>"
                                                           data-type="input"
                                                           data-price="<?=$item['PRICE'];?>"
                                                           data-packnorm="<?=$item['PACKAGE_COUNT'];?>"
                                                           data-slug="CART_QUANTITY_ADMIN"
                                                           autocomplete="off">
                                                    <button class="buy-block__button">+</button>
                                                </div>
                                                <? if ($item['PACKAGE'] && $item['PACKAGE_COUNT']) { ?>
                                                    <div class="buy-block__item-packnorm">
                                                        <? $pack = $item['PACKAGE'];
                                                        echo($pack === '-' ? "Ед.изм" : $pack)
                                                        ?>
                                                        : <?= $item['PACKAGE_COUNT'] ?> <?= $item['UNIT'] ?>
                                                    </div>
                                                <? } ?>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <?= $item['QUANTITY']; ?>
                                        <input type="hidden" name="field[PRODUCTS_NEW][<?=$item['PRODUCT_ID'];?>][quantity]" value="<?=$item['QUANTITY'];?>" autocomplete="off">
                                    <?php } ?>
                                </div>
                                <div class="personal__order-list-col personal__order-list-col--price text-right">
                                    <span><?= WorkCart::numberFormat($item['PRICE'], SITE_ID, true); ?></span><br>
                                    <?=($item['DISCOUNT']>0) ? '<span><s>'.WorkCart::numberFormat($item['PRICE']+$item['DISCOUNT'], SITE_ID, true).'</s></span>' : ''; ?>
                                </div>
                                <div class="personal__order-list-col personal__order-list-col--total-price text-right" data-slug="ITEM_SUMM_ADMIN">
                                    <span><?= WorkCart::numberFormat($item['PRICE'] * $item['QUANTITY'], SITE_ID, true); ?></span><br>
                                    <?=($item['DISCOUNT']>0) ? '<span><s>'.WorkCart::numberFormat(($item['PRICE']+$item['DISCOUNT']) * $item['QUANTITY'], SITE_ID, true).'</s></span>' : ''; ?>
                                </div>
                                <?php if ($isEdit && $order['PAYMENT']=='N') { ?>
                                    <a class="pr_remove" style="margin: 0 0 0 10px; color: #FF0000; font-weight: 700" href="">X</a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                    <?php if ($isEdit && $order['PAYMENT']=='N') { ?>
                        <div class="personal__order-list-item personal__order-list-item--table">
                            <div class="block_prods" style="width:100%">
                                <div class="form-group">
                                    <p>Добавить товар:</p>
                                    <div class="input-group">
                                        <input type="text" data-iblock="<?=CATALOG_ID?>" class="form-control input-search" value="" placeholder="Поиск по названию или артикулу" data-slug="INPUT_SEARCH">
                                        <div class="input-group-append">
                                            <button class="btn btn-success btn-search" id="btn-search-admin" type="button" data-slug="BTN_SEARCH_ADMIN">искать</button>
                                        </div>
                                    </div>
                                    <div class="form-control select-search" style="display:none; max-height: 150px; overflow-y: auto;">
                                        <table class="table table-striped table-hover">
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="personal__order-total-block">
                        <input type="hidden" id="userId" value="<?=$dataUserFB['ID'];?>">
                        <input type="hidden" id="promocode" value="<?=$order['PROMOCODE_OR_SUMM'];?>">
                        <?php if ($isEdit) { ?>
                            <div class="personal__order-total-item personal__order-custom-discount">
                                <div class="personal__order-total-col personal__order-total-col--val">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-default<?=($order['DISCOUNT_TYPE'] == 'custom') ? ' btn-danger' : '';?>" type="button" data-slug="ADD_CUSTOM_DISCOUNT"><?=($order['DISCOUNT_TYPE'] != 'custom') ? 'Добавить индивидуальную скидку"' : 'Удалить индивидуальную скидку';?></button>
                                        </div>
                                        <input type="text" class="form-control col-12 col-sm-2" name="field[CUSTOM_DISCOUNT]" <?=($order['DISCOUNT_TYPE'] != 'custom') ? 'style="display: none"' : '';?>
                                               value="<?=($order['DISCOUNT_TYPE'] == 'custom') ? $order['DISCOUNT_PERCENT'] : '';?>" data-slug="DISCOUNT_ADMIN">
                                        <div class="input-group-append" <?=($order['DISCOUNT_TYPE'] != 'custom') ? 'style="display: none"' : '';?> data-slug="DISCOUNT_ADMIN_APPEND">
                                            <span class="input-group-text" id="basic-addon2">%</span>
                                        </div>
                                        <input type="hidden" name="field[UPDATE_PRODUCTS]" value="">
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="personal__order-total-item">
                            <div class="personal__order-total-col personal__order-total-col--name">Сумма:</div>
                            <div class="personal__order-total-col personal__order-total-col--val" data-slug="TOTALCART_SUMM_ADMIN">
                                <?= WorkCart::numberFormat($order['SUMM']+$order['DISCOUNT'], SITE_ID, true); ?>
                            </div>
                        </div>
                        <div data-slug="DISCOUNT_BLOCKS"<?=($order['DISCOUNT']<=0) ? ' style="display:none;"' : '';?>>
                            <div class="personal__order-total-item">
                                <div class="personal__order-total-col personal__order-total-col--name">Тип скидки:</div>
                                <div class="personal__order-total-col personal__order-total-col--val" data-slug="TOTALCART_DISCOUNT_TYPE_ADMIN">
                                    <?=WorkOrder::getDiscountType($order['DISCOUNT_TYPE'], $order['PROMOCODE_OR_SUMM']);?>
                                </div>
                            </div>
                            <div class="personal__order-total-item">
                                <div class="personal__order-total-col personal__order-total-col--name">Скидка клиента:</div>
                                <div class="personal__order-total-col personal__order-total-col--val" data-slug="TOTALCART_DISCOUNT_PERCENT_ADMIN">
                                    <?=$order['DISCOUNT_PERCENT'];?>%
                                </div>
                            </div>
                            <div class="personal__order-total-item">
                                <div class="personal__order-total-col personal__order-total-col--name">Скидка в рублях:</div>
                                <div class="personal__order-total-col personal__order-total-col--val" data-slug="TOTALCART_DISCOUNT_SUMM_ADMIN">
                                    <?=WorkCart::numberFormat($order['DISCOUNT'], SITE_ID, true);?>
                                </div>
                            </div>
                            <div class="personal__order-total-item">
                                <div class="personal__order-total-col personal__order-total-col--name">Сумма со скидкой:</div>
                                <div class="personal__order-total-col personal__order-total-col--val" data-slug="TOTALCART_SUMM_PROM_ADMIN">
                                    <?= WorkCart::numberFormat($order['SUMM'], SITE_ID, true); ?>
                                </div>
                            </div>
                        </div>
                        <div class="personal__order-total-item">
                            <div class="personal__order-total-col personal__order-total-col--name">Доставка:</div>
                            <div class="personal__order-total-col personal__order-total-col--val" data-slug="DELIVERY_PRICE_ADMIN">
                                <?= WorkCart::numberFormat($order['DELIVERY_PRICE'], SITE_ID, true); ?>
                            </div>
                        </div>
                        <div class="personal__order-total-item personal__order-total-item--main">
                            <div class="personal__order-total-col personal__order-total-col--name">Итого:</div>
                            <div class="personal__order-total-col personal__order-total-col--val" data-slug="TOTALCART_ORDER_SUMM_ADMIN">
                                <?= WorkCart::numberFormat($allPrice, SITE_ID, true); ?>
                            </div>
                        </div>
                        <div class="personal__order-total-item personal__order-total-item--button">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($isEdit) { ?>
            <div class="row mb-5">
                <div class="col-md-3">
                    <div class="form-group">
                        <? if (DEMOVERSION != 'true' || $USER->IsAdmin()): ?>
                            <input type="submit" id="save" class="btn btn-primary btn-block" value="Сохранить">
                        <? else: ?>
                            <input type="button" id="save-demo" class="btn btn-primary btn-block" value="Сохранить">
                        <? endif; ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <a href="<?= SITE_DIR ?>admin/order/?order=<?= $orderId; ?>" class="btn btn-secondary btn-block">Отменить</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <? if (DEMOVERSION != 'true' || $USER->IsAdmin()): ?>
                            <a href="" class="btn btn-danger float-right" id="remove_btn">Удалить</a>
                            <input type="hidden" id="remove" name="field[REMOVE]" value="">
                        <? else: ?>
                            <a href="" class="btn btn-danger float-right" id="save-demo">Удалить</a>
                        <? endif; ?>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function () {
                    $('#remove_btn').click(function () {
                        if (confirm("Вы уверены, что хотите удалить данный элемент? Это действие необратимо!")) {
                            $('#remove').val('Y');
                            $('#save').click();
                            return false;
                        } else {
                            return false;
                        }
                    });
                });
            </script>
        <?php } ?>
    </form>
<?php } ?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>