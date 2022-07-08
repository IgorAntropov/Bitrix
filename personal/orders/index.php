<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Мои заказы");

use \Bitrix\Main\Type;

?>
<? if ($USER->IsAuthorized())
    require($_SERVER["DOCUMENT_ROOT"]. SITE_DIR  . "personal/top_menu.php"); ?>
    <div class="title title-page">
        <div class="title__text"><?$APPLICATION->ShowTitle()?></div>
        <? if ($USER->IsAuthorized()): ?>
        <div class="title__logout">
            <i class="icon-logout"></i>
            <a href="?logout=yes&<?=bitrix_sessid_get()?>">ВЫЙТИ</a>
        </div>
        <? endif; ?>
    </div>
    <br>
<?php
if ($USER->IsAuthorized()) {
    // фильтрация
    $filter = false;
    if($_GET['from']){
        $filter['>=DATE_CREATE'] = new Type\DateTime($_GET['from'].' 00:00:00');
    }
    if($_GET['to']){
        $filter['<=DATE_CREATE'] = new Type\DateTime($_GET['to'].' 00:00:00');
    }
    if($_GET['status']){
        $filter['STATUS'] = $_GET['status'];
    }

    // Отбор заказов только для текущего пользователя
    $userId = (int)$USER->GetID();
    if($userId <= 0){
        $userId = -1;
    }
    $filter['USER_ID'] = $userId;

    // ВЫБОРКА
    $arResult = WorkOrder::getOrders(SITE_ID, $filter);
    ?>
    <div id="personal_new" class="personal" data-block="2">
        <div class="personal__block active_el" data-block="2">
            <div class="personal__order-list">
                <div class=" personal__order-block personal__order-block--filter ">
                    <form action="<?= POST_FORM_ACTION_URI ?>" class="" method="GET" enctype="multipart/form-data">
                        <div class="row">
                            <div class="personal__order-col col-xl-4">
                                <div class="personal__order-date">
                                    <div class="personal__order-date-block">
                                        <div class="personal__order-text">от</div>
                                        <div class="personal__order-date-wrap">
                                            <input type="text" name="from" id="from" class=""
                                                   value="<?= htmlspecialcharsbx($_GET['from']); ?>" autocomplete="off">
                                        </div>
                                        <div class="personal__order-text">до</div>
                                        <div class="personal__order-date-wrap">
                                            <input type="text" name="to" id="to" class="" value="<?= htmlspecialcharsbx($_GET['to']); ?>"
                                                   autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="personal__order-col personal__order-col--text  col-xl-5">
                                <div class="personal__order-col-text">Дата/Статус</div>
                                <div class="personal__order-col-form">
                                    <select name="status" class="personal__order-select" id="status_filter">
                                        <option value="">Статус заказа</option>
                                        <?php foreach ($arResult['STATUSES'] as $allStatus) { ?>
                                            <option <?= ($_GET['status'] == $allStatus['ID']) ? 'selected' : ''; ?>
                                                    value="<?= $allStatus['ID']; ?>"><?= $allStatus['NAME']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <input type="submit" class="button" value="Применить">
                            </div>
                            <div class="personal__order-col personal__order-col--text  col-xl-2 d-none d-xl-flex">
                                <div>Сумма</div>
                            </div>
                            <div class="personal__order-col personal__order-col--text  col-xl-1 d-none d-xl-flex">
<!--                                <div class="personal__order-copy">-->
<!--                                    <a href="#"><i class="icon-ar_copy"></i></a>-->
<!--                                    <span class="personal__order-copy--tooltip">повторить заказ</span>-->
<!--                                </div>-->
                            </div>
                        </div>
                    </form>
                </div>
                <div class=" personal__order-block">
                    <div class=" personal__order-block">
                        <?php
                        foreach ((array)$arResult['ORDERS'] as $order) { ?>
                            <div class=" personal__order-block-item">
                                <div class="personal__order-block-title row">
                                    <div class="personal__order-number col-lg-3">
                                        <div>№<?=$order['ID'];?></div>
                                    </div>
                                    <div class="personal__order-status col-lg-5">
                                        <div>
                                            <span class="personal__order-status-text"><?=$order['DATE_CREATE'];?></span> / <?=$order['STATUS']['NAME'];?>
                                        </div>
                                    </div>
                                    <div class="personal__order-price col-lg-4">
                                        <div>
                                            <span class="currency"><?=WorkCart::numberFormat($order['SUMM']+$order['DELIVERY_PRICE']);?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php foreach ($order['PRODUCTS'] as $key => $PRODUCT) { ?>
                                    <div class="personal__order-block-list">
                                        <?php if($key==0) {?>
                                            <div class="personal__order-list-item personal__order-list-item--title">
                                                <div class="personal__order-list-col personal__order-list-col--number">№</div>
                                                <div class="personal__order-list-col personal__order-list-col--vendor">Артикул</div>
                                                <div class="personal__order-list-col personal__order-list-col--name">Наименование</div>
                                                <div class="personal__order-list-col personal__order-list-col--count personal__order-list-col--center">
                                                    Количество
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="personal__order-list-item">
                                            <div class="personal__order-list-col personal__order-list-col--number"><?=$key+1;?></div>
                                            <div class="personal__order-list-col personal__order-list-col--vendor"><?=$PRODUCT['ARTNUMBER'];?></div>
                                            <div class="personal__order-list-col personal__order-list-col--name">
                                                <a href="<?=$PRODUCT['URL'];?>" target="_blank"><?=$PRODUCT['NAME'];?></a></div>
                                            <div class="personal__order-list-col personal__order-list-col--count personal__order-list-col--center">
                                                <?=$PRODUCT['QUANTITY'];?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="personal__order-block-button">
                                    <a href="<?= SITE_DIR ?>personal/orders/order/?order=<?=$order['ID'];?>" class="button ">Подробнее</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <?
                $APPLICATION->IncludeComponent(
                    "bitrix:main.pagenavigation",
                    "",
                    array(
                        "NAV_OBJECT" => $arResult['NAV'],
                        "SEF_MODE" => "N",
                    ),
                    false
                );
                ?>

            </div>
        </div>
    </div>
    <?php
} else {
    ?>
    <div class="personal">
        <div class="personal__auth-block">
            <br>
            <p>Для доступа к данным необходимо авторизоваться.</p>
            <span style="display: inline-block;">
                <a href="#popup-auth" data-fancybox="" class="button" data-name="auth-form">Авторизоваться</a>
            </span>
        </div>
        <br><br><br>
    </div>
    <?php
}
?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>