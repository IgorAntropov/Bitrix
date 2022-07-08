<?
// Проверка на доступ (всегда стоит первой)
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR."admin/access.php");


require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Административный раздел");

use \Bitrix\Main\Loader,
    \Bitrix\Main\Type;

$module_id = 'itertech.cart';
if (!Loader::includeModule($module_id)) {
    ShowError('Module '.$module_id.' not install');
    die();
}


// фильтрация
$filter = false;
if($_GET['from']){
    $filter['>=DATE_CREATE'] = new Type\DateTime($_GET['from'].' 00:00:00');
}
if($_GET['to']){
    $filter['<=DATE_CREATE'] = new Type\DateTime($_GET['to'].' 23:59:59');
}
if($_GET['status']){
    $filter['STATUS'] = $_GET['status'];
}
if($_GET['payment']){
    $filter['PAYMENT'] = $_GET['payment'];
}
if($_GET['findall']){
    $findall = htmlspecialcharsbx(trim($_GET['findall']));
    $filter[] = array(
        "LOGIC" => "OR",
        array("?USER_NAME" => $findall),
        array("?USER_EMAIL" => $findall),
        array("?USER_PHONE" => $findall),
    );
}
$arResult = WorkOrder::getOrders(SITE_ID, $filter);
?>
<div id="admin" class="personal" data-block="2">
    <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR."admin/top_menu.php"); ?>
    <div class="personal__block active_el">
        <div class="personal__order-list">
            <div class=" personal__order-block personal__order-block--filter ">
                <form action="<?= POST_FORM_ACTION_URI ?>" class="" method="GET" enctype="multipart/form-data">
                    <div class="row">
                        <div class="personal__order-col personal__order-col-v  col-xl-4 col-lg-12">
                            <p><b>Поиск по дате создания</b></p>
                            <div class="personal__order-date">
                                <div class="personal__order-date-block">
                                    <div class="personal__order-text">от</div>
                                    <div class="personal__order-date-wrap">
                                        <input type="text" name="from" id="from" class="" value="<?=htmlspecialcharsbx($_GET['from']);?>" autocomplete="off">
                                    </div>
                                    <div class="personal__order-text">до</div>
                                    <div class="personal__order-date-wrap">
                                        <input type="text" name="to" id="to" class="" value="<?=htmlspecialcharsbx($_GET['to']);?>" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="personal__order-col personal__order-col-v  col-xl-2 col-lg-4">
                            <p><b>Поиск по статусу заказа</b></p>
                            <div class="personal__order-col-form">
                                <select name="status" class="personal__order-select" id="status_filter">
                                    <option value="">Статус заказа</option>
                                    <?php foreach ($arResult['STATUSES'] as $allStatus) { ?>
                                        <option <?=($_GET['status']==$allStatus['ID']) ? 'selected' : '';?> value="<?=$allStatus['ID'];?>"><?=$allStatus['NAME'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="personal__order-col personal__order-col-v  col-xl-2 col-lg-4">
                            <p><b>Поиск по статусу оплаты</b></p>
                            <div class="personal__order-col-form">
                                <select name="payment" class="personal__order-select" id="status_filter">
                                    <option value="">Статус оплаты</option>
                                    <option <?=($_GET['payment']=='Y') ? 'selected' : '';?> value="Y">Оплачен</option>
                                    <option <?=($_GET['payment']=='N') ? 'selected' : '';?> value="N">Не оплачен</option>
                                </select>
                            </div>
                        </div>
                        <div class="personal__order-col personal__order-col-v  col-xl-2 col-lg-4">
                            <p><b>Поиск по имени, e-mail, телефону</b></p>
                            <div class="personal__order-col-form">
                                <input name="findall" class="personal__order-select" value="<?=$findall;?>" placeholder="Имя, email, телефон" id="status_filter">
                            </div>
                        </div>
                        <div class="personal__order-col personal__order-col--text  col-xl-2  col-lg-12 ">
                            <input type="submit" class="button" value="Применить">
                        </div>
                    </div>
                </form>
            </div>
            <div class=" personal__order-block">
                <div class=" personal__order-block">
                    <div class=" personal__order-block-item">
                        <table class="personal__order-block-list table table-striped table-hover">
                            <?php if($arResult['ORDERS']) { ?>
                                <thead>
                                    <tr class="personal__order-list-item--title">
                                        <th class="personal__order-list-col ">Дата создания</th>
                                        <th class="personal__order-list-col  personal__order-list-col--center">№</th>
                                        <th class="personal__order-list-col ">Покупатель</th>
                                        <th class="personal__order-list-col  personal__order-list-col--center">Статус</th>
                                        <th class="personal__order-list-col  personal__order-list-col--center">Оплачен</th>
                                        <th class="personal__order-list-col  personal__order-list-col--center">Сумма</th>
                                        <th class="personal__order-list-col personal__order-list-col--name">Позиции</th>
                                        <th class="personal__order-list-col personal__order-list-col--center">Скачать</th>
                                    </tr>
                                </thead>
                            <?php } else { ?>
                                <div class="personal__order-list-item personal__order-list-item--title no_orders">
                                    <p>По вашему запросу заказов не найдено!</p>
                                </div>
                            <?php } ?>
                            <?php foreach ((array)$arResult['ORDERS'] as $order) { ?>
                                <tr class="">
                                    <td class="personal__order-list-col ">
                                        <a href="<?= SITE_DIR ?>admin/order/?order=<?= $order['ID']; ?>"><?= $order['DATE_CREATE']; ?></a>
                                    </td>
                                    <td class="personal__order-list-col  personal__order-list-col--center"><?= $order['ID']; ?></td>
                                    <td class="personal__order-list-col "><?= $order['USER_NAME']; ?></td>
                                    <td class="personal__order-list-col  personal__order-list-col--center"><?= $order['STATUS']['NAME']; ?></td>
                                    <td class="personal__order-list-col  personal__order-list-col--center"><?=($order['PAYMENT']=='Y') ? 'Да' : 'Нет';?></td>
                                    <td class="personal__order-list-col  personal__order-list-col--center"><?= WorkCart::numberFormat($order['SUMM'], SITE_ID, true); ?></td>
                                    <td class="personal__order-list-col personal__order-list-col--name ">
                                        <?php foreach ($order['PRODUCTS'] as $key => $PRODUCT) { ?>
                                            <div>
                                                <a href="<?= $PRODUCT['URL']; ?>" target="_blank">(<?= $PRODUCT['ARTNUMBER']; ?>) <?= $PRODUCT['NAME']; ?> <?= $PRODUCT['QUANTITY']; ?></a>
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td class="personal__order-list-col  personal__order-list-col--center">
                                        <a href="<?= SITE_DIR ?>admin/order/download.php?order=<?= $order['ID']; ?>">скачать</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            <?
            if($arResult['NAV']->getPageSize())
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

<style>
    .personal__order-list-col--center {
        text-align: center;
    }
</style>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>