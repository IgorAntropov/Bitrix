<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle(GetMessage("ARLIGHT_ARSTORE_LICNYY_KABINET"));

use \Itertech\Cart\OrdersTable,
    \Itertech\Cart\OrdersItemsTable;

?>
<?php
if ($USER->IsAuthorized()) {
    ?>
    <div id="personal" class="personal" data-block="2">
        <div class="personal__tabs">
            <div class="personal__tabs-item">
                <a href="#" class="personal__tabs-link active_el" data-block="1"><?=GetMessage("ARLIGHT_ARSTORE_LICNYE_DANNYE")?></a></div>
            <div class="personal__tabs-item">
                <a href="#" class="personal__tabs-link" data-block="2"><?=GetMessage("ARLIGHT_ARSTORE_MOI_ZAKAZY")?></a></div>
            <div class="personal__tabs-item">
                <a href="#" class="personal__tabs-link" data-block="3"><?=GetMessage("ARLIGHT_ARSTORE_KORZINA")?></a></div>
        </div>
        <div class="personal__block active_el" data-block="1">
            <?php
            /**
             * ‘орма дл€ смены данных пользовател€
             */
            $APPLICATION->IncludeComponent(
                "bitrix:main.profile",
                ".default",
                array(
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "AJAX_OPTION_HISTORY" => "N",
                    "SET_TITLE" => "N",
                    "USER_PROPERTY" => array(),
                    "SEND_INFO" => "N",
                    "CHECK_RIGHTS" => "N",
                    "USER_PROPERTY_NAME" => "",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "COMPONENT_TEMPLATE" => ".default"
                ),
                false
            );
            ?>
        </div>
        <div class="personal__block " data-block="2">
            <div class="personal__order-list">
                <div class=" personal__order-block personal__order-block--filter ">
                    <div class="row">
                        <div class="personal__order-col col-lg-5">
                            <div class="personal__order-date">
                                <div class="personal__order-text"><span><?=GetMessage("ARLIGHT_ARSTORE_ZAKAZY")?></span> <?=GetMessage("ARLIGHT_ARSTORE_S_DATOY")?></div>
                                <div class="personal__order-date-block">
                                    <div class="personal__order-text"><?=GetMessage("ARLIGHT_ARSTORE_OT")?></div>
                                    <div class="personal__order-date-wrap">
                                        <input type="text" name="" id="from" class="" autocomplete="off">
                                    </div>
                                    <div class="personal__order-text"><?=GetMessage("ARLIGHT_ARSTORE_DO")?></div>
                                    <div class="personal__order-date-wrap">
                                        <input type="text" name="date_filter_2" id="to" class="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="personal__order-col personal__order-col--text  col-lg-4">
                            <div class="personal__order-col-text"><?=GetMessage("ARLIGHT_ARSTORE_DATA_STATUS")?></div>
                            <div class="personal__order-col-form">
                                <select name="status_filter" class="personal__order-select" id="status_filter">
                                    <option value=""><?=GetMessage("ARLIGHT_ARSTORE_STATUS_ZAKAZA")?></option>
                                    <option value=""><?=GetMessage("ARLIGHT_ARSTORE_PRINAT_OJIDAETSA_OP")?></option>
                                </select>
                            </div>
                        </div>
                        <div class="personal__order-col personal__order-col--text  col-lg-3 ">
                            <div><?=GetMessage("ARLIGHT_ARSTORE_SUMMA")?></div>
                        </div>
                    </div>
                </div>
                <div class=" personal__order-block">
                    <div class=" personal__order-block">

                        <?php
                        // √отовим массив с заказами пользовател€
                        $userId = $USER->GetID();
                        $resOrders = OrdersTable::getList(
                            array(
                                'select' => array('ID', 'SUMM', 'DATE_CREATE'),
                                'filter' => array('SITE_ID' => SITE_ID, 'USER_ID' => $userId),
                                'order' => array('ID' => 'DESC'),
                            ));
                        while ($ob = $resOrders->fetch()) {
                            $arOrders[$ob['ID']] = $ob;
                            $orderIds[] = $ob['ID'];
                        }

                        // √отовим массив с товарами в заказе
                        $resProducts = OrdersItemsTable::getList(
                            array(
                                'select' => array('*'),
                                'filter' => array('ORDER_ID' => $orderIds),
                                'order' => array('ID' => 'ASC'),
                            ));
                        // добавим в массив заказов подмассив с товарами заказа
                        while ($pb = $resProducts->fetch()) {
                            $arOrders[$pb['ORDER_ID']]['PRODUCTS'][] = $pb;
                        }
                        ?>
                        <?php foreach ($arOrders as $order) { ?>
                            <div class=" personal__order-block-item">
                                <div class="personal__order-block-title row">
                                    <div class="personal__order-number col-lg-5">
                                        <div><?=GetMessage("ARLIGHT_ARSTORE_")?><?=$order['ID'];?></div>
                                    </div>
                                    <div class="personal__order-status col-lg-4">
                                        <div>
                                            <span class="personal__order-status-text"><?=$order['DATE_CREATE'];?></span>
                                            <?=$order['STATUS'];?>
                                        </div>
                                    </div>
                                    <div class="personal__order-price col-lg-3">
                                        <div>
                                            <span class="currency"><?=WorkCart::numberFormat($order['SUMM']);?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php foreach ($order['PRODUCTS'] as $key => $PRODUCT) { ?>
                                    <div class="personal__order-block-list">
                                        <?php if($key==0) {?>
                                            <div class="personal__order-list-item personal__order-list-item--title">
                                                <div class="personal__order-list-col personal__order-list-col--number"><?=GetMessage("ARLIGHT_ARSTORE_")?></div>
                                                <div class="personal__order-list-col personal__order-list-col--vendor"><?=GetMessage("ARLIGHT_ARSTORE_ARTIKUL")?></div>
                                                <div class="personal__order-list-col personal__order-list-col--name"><?=GetMessage("ARLIGHT_ARSTORE_NAIMENOVANIE")?></div>
                                                <div class="personal__order-list-col personal__order-list-col--count personal__order-list-col--center">
                                                    <?=GetMessage("ARLIGHT_ARSTORE_KOLICESTVO")?></div>
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
                                    <a href="<?= SITE_DIR ?>personal/order/?order=<?=$order['ID'];?>" class="button "><?=GetMessage("ARLIGHT_ARSTORE_PODROBNEE")?></a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="personal__block" data-block="3">
            <?
            $APPLICATION->IncludeComponent(
                "itertech:smallcart",
                "fullcart",
                array(
                    "LIST_PROPERTY_CODE" => array()
                ),
                false
            );
            ?>
            <?$APPLICATION->IncludeComponent(
                "itertech:checkout",
                "",
                Array()
            );?>

        </div>
    </div>
    <?php
} else {
    ?>
    <div class="personal">
        <div class="personal__auth-block">
            <br>
            <p><?=GetMessage("ARLIGHT_ARSTORE_DLA_DOSTUPA_K_DANNYM")?></p>
            <span style="display: inline-block;">
                <a href="#popup-auth" data-fancybox="" class="button" data-name="auth-form"><?=GetMessage("ARLIGHT_ARSTORE_AVTORIZOVATQSA")?></a>
            </span>
        </div>
        <br>
    </div>
    <?php
}
?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>