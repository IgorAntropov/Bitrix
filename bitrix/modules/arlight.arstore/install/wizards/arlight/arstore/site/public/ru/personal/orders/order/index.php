<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

use Bitrix\Main\Context;
use Bitrix\Main\Page\Asset;
Asset::getInstance()->addCss(SITE_DIR . "admin/settings/bootstrap.min.css");

$request = Context::getCurrent()->getRequest();
if (!$request['order']) {
    LocalRedirect(SITE_DIR."personal/");
}

$userId = $USER->GetID();
if (!$userId || !$USER->IsAuthorized()) { ?>
    <div class="personal">
        <div class="personal__auth-block">
            <br>
            <p>Для доступа к данным необходимо авторизоваться.</p>
            <span style="display: inline-block;">
                <a href="#popup-auth" data-fancybox="" class="button" data-name="auth-form">Авторизоваться</a>
            </span>
        </div>
        <br>
    </div>
    <?php
} else {
    $orderId = (int)$request['order'];
    $APPLICATION->SetTitle('Заказ №' . $orderId);

    // Получаем информацию по текущему заказу
    $arResult = WorkOrder::getOrders(SITE_ID, array('ID' => $orderId));
    $order = $arResult['ORDERS'][$orderId];

    // Проверим заказ или отправим на оплату
    if(($order['PAYMENT_TYPE'] !='custom' && $order['PAYMENT_TYPE'] && $order['PAYMENT'] != 'Y')){
        PayOrder::Pay($order, $request);
    }

    ?>
    <a href="#popup_order_repeat" data-fancybox class="popup_order_repeat_opener"></a>
    <div id="popup_order_repeat" class="popup popup_order_repeat" style="display: none">
        <div class="popup_order_repeat_closer"></div>
        <div class="popup_order_repeat_messages"></div>
        <br>
        <div class="popup_order_repeat_buttons">
            <a href="javascript:void(0);" class="button button_red popup_order_repeat_continue">Продолжить</a>
            <br>
            <a href="javascript:void(0);" class="button popup_order_repeat_cancel">Отмена</a>
        </div>
    </div>

    <div class="title title-page">
        <div class="title__text">Заказ №<?= $orderId; ?></div>
        <div class="title__backlink">
            <i class="icon-arrow-left"></i>
            <a href="">вернуться</a>
        </div>
    </div>

    <?php
    // Уведомление об успешной оплате
    if($request['statusPay']==1 && $order['PAYMENT'] == 'Y'){ ?>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success" role="alert">
                    Ваш заказ успешно оплачен!
                </div>
            </div>
        </div>
    <?php } ?>

    <?php
    if ($userId != $order['USER_ID'] || !$order) {
        ?>
        <p><span style="color:#FF0000">Заказ №<?= $orderId; ?> не найден</span></p>
        <?php
    } else {
        $allPrice = $order['SUMM'] + $order['DELIVERY_PRICE'];

        ?>
        <div class="personal__order-more">
            <div class="personal__order-block personal__order-block--border-top">
                <div class="personal__order-block-title row">
                    <div class="personal__order-number col-lg-2">
                        <div>№<?= $order['ID']; ?></div>
                    </div>
                    <div class="personal__order-status col-lg-4">
                        <div>
                            <span class="personal__order-status-text"><?= $order['DATE_CREATE']; ?></span>/
                            <?= $order['STATUS']['NAME']; ?>
                        </div>
                    </div>

                    <div class="personal__order-price col-lg-3">
                        <div><span><?= WorkCart::numberFormat($allPrice); ?></span></div>
                    </div>
                    <div class="personal__order-price col-lg-3 justify-content-end">
<!--                        <div class="personal__order-copy">-->
<!--                            <a href="#"><i class="icon-ar_copy"></i></a>-->
<!--                            <span class="personal__order-copy--tooltip">повторить заказ</span>-->
<!--                        </div>-->
                        <div class="personal__order-remove">
                            <a href="javascript:void(0);" class="button button_red repeat_order_init">Повторить заказ</a>
                        </div>
                    </div>
                </div>
                <div class="personal__order-block-list">

                    <div class="personal__order-list-item">
                        <div class="personal__order-list-col personal__order-list-col--param">Учетная запись</div>
                        <div class="personal__order-list-col personal__order-list-col--param-val"><?= $USER->GetFormattedName(); ?></div>
                    </div>
                    <div class="personal__order-list-item">
                        <div class="personal__order-list-col personal__order-list-col--param">Логин</div>
                        <div class="personal__order-list-col personal__order-list-col--param-val">
                            <?= $USER->GetLogin(); ?>
                        </div>
                    </div>
                    <div class="personal__order-list-item">
                        <div class="personal__order-list-col personal__order-list-col--param">E-Mail адрес:</div>
                        <div class="personal__order-list-col personal__order-list-col--param-val">
                            <a href="mailto:<?= $USER->GetEmail(); ?>"><?= $USER->GetEmail(); ?></a>
                        </div>
                    </div>
                    <div class="personal__order-list-item personal__order-list-item--title personal__order-list-item--indent">
                        <div class="personal__order-list-col">Параметры заказы</div>
                    </div>
                    <div class="personal__order-list-item">
                        <div class="personal__order-list-col personal__order-list-col--param">Контактное лицо</div>
                        <div class="personal__order-list-col personal__order-list-col--param-val">
                            <?= $order['USER_NAME']; ?>
                        </div>
                    </div>
                    <div class="personal__order-list-item">
                        <div class="personal__order-list-col personal__order-list-col--param">E-Mail</div>
                        <div class="personal__order-list-col personal__order-list-col--param-val">
                            <a href="mailto:<?= $order['USER_EMAIL']; ?>"><?= $order['USER_EMAIL']; ?></a>
                        </div>
                    </div>
                    <div class="personal__order-list-item">
                        <div class="personal__order-list-col personal__order-list-col--param">Телефон/факс</div>
                        <div class="personal__order-list-col personal__order-list-col--param-val">
                            <?= $order['USER_PHONE']; ?>
                        </div>
                    </div>
                    <div class="personal__order-list-item">
                        <div class="personal__order-list-col personal__order-list-col--param">Комментарий к заказу</div>
                        <div class="personal__order-list-col personal__order-list-col--param-val">
                            <?= $order['USER_COMMENT']; ?>
                        </div>
                    </div>
                    <div class="personal__order-list-item personal__order-list-item--title personal__order-list-item--indent">
                        <div class="personal__order-list-col">Оплата и доставка</div>
                    </div>
                    <div class="personal__order-list-item ">
                        <div class="personal__order-list-col personal__order-list-col--param">Платежная система</div>
                        <div class="personal__order-list-col personal__order-list-col--param-val">
                            <span class=""><?= $order['PAYMENT_ID']; ?></span>
                        </div>
                    </div>
                    <div class="personal__order-list-item">
                        <div class="personal__order-list-col personal__order-list-col--param">Оплачен</div>
                        <div class="personal__order-list-col personal__order-list-col--param-val">
                            <div class="float-left"><?= ($order['PAYMENT'] != 'Y') ? 'Нет' : 'Да'; ?></div>
                            <?php if($order['PAYMENT_TYPE'] !='custom' && $order['PAYMENT_TYPE'] && $order['PAYMENT'] != 'Y') { ?>
                                <div class="float-left ml-3">
                                    <a href="<?=$_SERVER['REQUEST_URI'];?>&payorder=<?=$order['PAYMENT_TYPE'];?>" class="button button_red">Оплатить</a>
                                </div>
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
                            <?= $order['DELIVERY']; ?>
                        </div>
                    </div>
                    <div class="personal__order-list-item">
                        <div class="personal__order-list-col personal__order-list-col--param">Адрес доставки</div>
                        <div class="personal__order-list-col personal__order-list-col--param-val">
                            <?= $order['USER_ADDRESS']; ?>
                        </div>
                    </div>


                    <div class="personal__order-list-item personal__order-list-item--title personal__order-list-item--indent">
                        <div class="personal__order-list-col">Содержимое заказа</div>
                    </div>
                    <div class="personal__order-list-item personal__order-list-item--table personal__order-list-item--title">
                        <div class="personal__order-list-col personal__order-list-col--num">№</div>
                        <div class="personal__order-list-col personal__order-list-col--vend">Артикул</div>
                        <div class="personal__order-list-col personal__order-list-col--name personal__order-list-col--name---title">
                            Наименование
                        </div>
                        <div class="personal__order-list-col personal__order-list-col--desc">Описание</div>
                        <div class="personal__order-list-col personal__order-list-col--count">Количество</div>
                        <div class="personal__order-list-col personal__order-list-col--price">Цена</div>
                        <div class="personal__order-list-col personal__order-list-col--pricecount">Цена/Кол-во</div>
                        <div class="personal__order-list-col personal__order-list-col--total-price">Сумма</div>
                    </div>
                    <?php foreach ($order['PRODUCTS'] as $key => $PRODUCT) { ?>
                        <div class="personal__order-list-item personal__order-list-item--table">
                            <div class="personal__order-list-col personal__order-list-col--num"><?= $key + 1; ?></div>
                            <div class="personal__order-list-col personal__order-list-col--vend"><?= $PRODUCT['ARTNUMBER']; ?></div>
                            <div class="personal__order-list-col personal__order-list-col--name">
                                <a href="<?= $PRODUCT['URL']; ?>"><?= $PRODUCT['NAME']; ?></a>
                            </div>
                            <div class="personal__order-list-col personal__order-list-col--desc">
                                <p>
                                    <?= $PRODUCT['DESCRIPTION']; ?>
                                </p>
                            </div>
                            <div class="personal__order-list-col personal__order-list-col--count"><?= $PRODUCT['QUANTITY']; ?></div>
                            <div class="personal__order-list-col personal__order-list-col--price">
                                <span><?= WorkCart::numberFormat($PRODUCT['PRICE']); ?></span>
                            </div>
                            <div class="personal__order-list-col personal__order-list-col--pricecount">
                                <span><?= WorkCart::numberFormat($PRODUCT['PRICE']); ?>
                                    <span>&nbsp;x <?= $PRODUCT['QUANTITY']; ?></span></span></div>
                            <div class="personal__order-list-col personal__order-list-col--total-price">
                                <span><?= WorkCart::numberFormat($PRODUCT['PRICE'] * $PRODUCT['QUANTITY']); ?></span>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="personal__order-total-block">
                        <?php if ($order['DISCOUNT'] > 0) { ?>
                            <div class="personal__order-total-item">
                                <div class="personal__order-total-col personal__order-total-col--name">Ваша скидка по
                                    заказу:
                                </div>
                                <div class="personal__order-total-col personal__order-total-col--val"><?= WorkCart::numberFormat($order['DISCOUNT']); ?></div>
                            </div>
                        <?php } ?>
                        <div class="personal__order-total-item">
                            <div class="personal__order-total-col personal__order-total-col--name">Сумма:</div>
                            <div class="personal__order-total-col personal__order-total-col--val"><?= WorkCart::numberFormat($order['SUMM']); ?>
                            </div>
                        </div>
                        <div class="personal__order-total-item">
                            <div class="personal__order-total-col personal__order-total-col--name">Доставка:</div>
                            <div class="personal__order-total-col personal__order-total-col--val"><?= WorkCart::numberFormat($order['DELIVERY_PRICE']); ?>
                            </div>
                        </div>
                        <div class="personal__order-total-item personal__order-total-item--main">
                            <div class="personal__order-total-col personal__order-total-col--name">Итого:</div>
                            <div class="personal__order-total-col personal__order-total-col--val"><?= WorkCart::numberFormat($allPrice); ?>
                            </div>
                        </div>
                        <div class="personal__order-total-item personal__order-total-item--button">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>