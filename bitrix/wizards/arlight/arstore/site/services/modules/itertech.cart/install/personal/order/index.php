<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

use Bitrix\Main\Context,
    \Itertech\Cart\OrdersTable,
    \Itertech\Cart\OrdersItemsTable;

$request = Context::getCurrent()->getRequest();
if (!$request['order']) {
    LocalRedirect(SITE_DIR."personal/");
}

$userId = $USER->GetID();

if (!$USER->GetID() || !$USER->IsAuthorized()) { ?>
    <div class="personal">
        <div class="personal__auth-block">
            <br>
            <p><?=GetMessage("ARLIGHT_ARSTORE_DLA_DOSTUPA_K_DANNYM")?></p>
            <span style="display: inline-block;">
                <a href="#popup-auth" data-fancybox=""  class="button" data-name="auth-form"><?=GetMessage("ARLIGHT_ARSTORE_AVTORIZOVATQSA")?></a>
            </span>
        </div>
        <br>
    </div>
    <?php
} else {
    $orderId = (int)$request['order'];
    $APPLICATION->SetTitle(GetMessage("ARLIGHT_ARSTORE_ZAKAZ") . $orderId);

    // Получаем информацию по текущему заказу
    $order = OrdersTable::getById($orderId)->fetch();
    ?>
    <div class="title title-page">
        <div class="title__text"><?=GetMessage("ARLIGHT_ARSTORE_ZAKAZ")?><?=$orderId;?></div>
        <div class="title__backlink">
            <i class="icon-arrow-left"></i>
            <a href=""><?=GetMessage("ARLIGHT_ARSTORE_VERNUTQSA")?></a>
        </div>
    </div>

    <?php
    if ($userId != $order['USER_ID'] || !$order) {
        ?>
            <p><span style="color:#FF0000"><?=GetMessage("ARLIGHT_ARSTORE_ZAKAZ")?><?=$orderId;?> <?=GetMessage("ARLIGHT_ARSTORE_NE_NAYDEN")?></span></p>
        <?php
    } else {
        $allPrice = $order['SUMM']+$order['DELIVERY_PRICE'];

        // Готовим массив с товарами в заказе
        $resProducts = OrdersItemsTable::getList(
            array(
                'select' => array('*'),
                'filter' => array('ORDER_ID' => $order['ID']),
                'order' => array('ID' => 'ASC'),
            ));
        // добавим в массив заказов подмассив с товарами заказа
        while ($pb = $resProducts->fetch()) {
            $order['PRODUCT'][] = $pb;
        }
        ?>
        <div class="personal__order-more">
            <div class="personal__order-block personal__order-block--border-top">
                <div class="personal__order-block-title row">
                    <div class="personal__order-number col-lg-4">
                        <div><?=GetMessage("ARLIGHT_ARSTORE_")?><?=$order['ID'];?></div>
                    </div>
                    <div class="personal__order-status col-lg-4">
                        <div>
                            <span class="personal__order-status-text"><?=$order['DATE_CREATE'];?></span>
                            <?=$order['STATUS'];?>
                        </div>
                    </div>
                    <div class="personal__order-price col-lg-4">
                        <div><span><?=WorkCart::numberFormat($allPrice);?></span> </div>
                    </div>
                </div>
                <div class="personal__order-block-list">
                    <div class="personal__order-list-item personal__order-list-item--title personal__order-list-item--indent">
                        <div class="personal__order-list-col"><?=GetMessage("ARLIGHT_ARSTORE_DANNYE_VASEY_UCETNOY")?></div>
                    </div>
                    <div class="personal__order-list-item">
                        <div class="personal__order-list-col personal__order-list-col--param"><?=GetMessage("ARLIGHT_ARSTORE_UCETNAA_ZAPISQ")?></div>
                        <div class="personal__order-list-col personal__order-list-col--param-val"><?=$USER->GetFormattedName();?></div>
                    </div>
                    <div class="personal__order-list-item">
                        <div class="personal__order-list-col personal__order-list-col--param"><?=GetMessage("ARLIGHT_ARSTORE_LOGIN")?></div>
                        <div class="personal__order-list-col personal__order-list-col--param-val">
                            <?=$USER->GetLogin();?>
                        </div>
                    </div>
                    <div class="personal__order-list-item">
                        <div class="personal__order-list-col personal__order-list-col--param">E-Mail <?=GetMessage("ARLIGHT_ARSTORE_ADRES")?></div>
                        <div class="personal__order-list-col personal__order-list-col--param-val">
                            <a href="mailto:<?=$USER->GetEmail();?>"><?=$USER->GetEmail();?></a>
                        </div>
                    </div>
                    <?/*
                    <div class="personal__order-list-item personal__order-list-item--title personal__order-list-item--indent">
                        <div class="personal__order-list-col">Параметры заказа</div>
                    </div>
                    <div class="personal__order-list-item">
                        <div class="personal__order-list-col personal__order-list-col--param">Тип плательщика</div>
                        <div class="personal__order-list-col personal__order-list-col--param-val">Физическое лицо</div>
                    </div>
                    */?>
                    <div class="personal__order-list-item personal__order-list-item--title personal__order-list-item--indent">
                        <div class="personal__order-list-col"><?=GetMessage("ARLIGHT_ARSTORE_LICNYE_DANNYE")?></div>
                    </div>
                    <div class="personal__order-list-item">
                        <div class="personal__order-list-col personal__order-list-col--param"><?=GetMessage("ARLIGHT_ARSTORE_KONTAKTNOE_LICO")?></div>
                        <div class="personal__order-list-col personal__order-list-col--param-val">
                            <?=$order['USER_NAME'];?>
                        </div>
                    </div>
                    <div class="personal__order-list-item">
                        <div class="personal__order-list-col personal__order-list-col--param">E-Mail</div>
                        <div class="personal__order-list-col personal__order-list-col--param-val">
                            <a href="mailto:<?=$order['USER_EMAIL'];?>"><?=$order['USER_EMAIL'];?></a>
                        </div>
                    </div>
                    <div class="personal__order-list-item">
                        <div class="personal__order-list-col personal__order-list-col--param"><?=GetMessage("ARLIGHT_ARSTORE_TELEFON_FAKS")?></div>
                        <div class="personal__order-list-col personal__order-list-col--param-val">
                            <?=$order['USER_PHONE'];?>
                        </div>
                    </div>
                    <div class="personal__order-list-item personal__order-list-item--title personal__order-list-item--indent">
                        <div class="personal__order-list-col"><?=GetMessage("ARLIGHT_ARSTORE_OPLATA_I_DOSTAVKA")?></div>
                    </div>
                    <div class="personal__order-list-item ">
                        <div class="personal__order-list-col personal__order-list-col--param"><?=GetMessage("ARLIGHT_ARSTORE_PLATEJNAA_SISTEMA")?></div>
                        <div class="personal__order-list-col personal__order-list-col--param-val">
                            <span class=""><?=$order['PAYMENT_ID'];?></span>
                        </div>
                    </div>
                    <div class="personal__order-list-item">
                        <div class="personal__order-list-col personal__order-list-col--param"><?=GetMessage("ARLIGHT_ARSTORE_OPLACEN")?></div>
                        <div class="personal__order-list-col personal__order-list-col--param-val">
                            <?=($order['PAYMENT']==0) ? GetMessage("ARLIGHT_ARSTORE_NET") : GetMessage("ARLIGHT_ARSTORE_DA");?>
                        </div>
                    </div>
                    <?php if($order['PAYMENT']==1){?>
                        <div class="personal__order-list-item">
                            <div class="personal__order-list-col personal__order-list-col--param"><?=GetMessage("ARLIGHT_ARSTORE_DATA_OPLATY")?></div>
                            <div class="personal__order-list-col personal__order-list-col--param-val">
                                <?=$order['PAYMENT_DATE'];?>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="personal__order-list-item personal__order-list-item--title personal__order-list-item--indent">
                        <div class="personal__order-list-col"><?=GetMessage("ARLIGHT_ARSTORE_SLUJBA_DOSTAVKI")?></div>
                    </div>
                    <div class="personal__order-list-item">
                        <div class="personal__order-list-col personal__order-list-col--param"><?=GetMessage("ARLIGHT_ARSTORE_SLUJBA_DOSTAVKI")?></div>
                        <div class="personal__order-list-col personal__order-list-col--param-val">
                            <?=$order['DELIVERY'];?>
                        </div>
                    </div>
                    <div class="personal__order-list-item personal__order-list-item--title personal__order-list-item--indent">
                        <div class="personal__order-list-col"><?=GetMessage("ARLIGHT_ARSTORE_SODERJIMOE_ZAKAZA")?></div>
                    </div>
                    <div class="personal__order-list-item personal__order-list-item--table personal__order-list-item--title">
                        <div class="personal__order-list-col personal__order-list-col--num"><?=GetMessage("ARLIGHT_ARSTORE_")?></div>
                        <div class="personal__order-list-col personal__order-list-col--vend"><?=GetMessage("ARLIGHT_ARSTORE_ARTIKUL")?></div>
                        <div class="personal__order-list-col personal__order-list-col--name"><?=GetMessage("ARLIGHT_ARSTORE_NAIMENOVANIE")?></div>
                        <div class="personal__order-list-col personal__order-list-col--desc"><?=GetMessage("ARLIGHT_ARSTORE_OPISANIE")?></div>
                        <div class="personal__order-list-col personal__order-list-col--count"><?=GetMessage("ARLIGHT_ARSTORE_KOLICESTVO")?></div>
                        <div class="personal__order-list-col personal__order-list-col--price"><?=GetMessage("ARLIGHT_ARSTORE_CENA")?></div>
                        <div class="personal__order-list-col personal__order-list-col--total-price"><?=GetMessage("ARLIGHT_ARSTORE_SUMMA")?></div>
                    </div>
                    <?php foreach ($order['PRODUCT'] as $key=>$PRODUCT) {?>
                        <div class="personal__order-list-item personal__order-list-item--table">
                            <div class="personal__order-list-col personal__order-list-col--num"><?=$key+1;?></div>
                            <div class="personal__order-list-col personal__order-list-col--vend"><?=$PRODUCT['ARTNUMBER'];?></div>
                            <div class="personal__order-list-col personal__order-list-col--name">
                                <a href="<?=$PRODUCT['URL'];?>"><?=$PRODUCT['NAME'];?></a>
                            </div>
                            <div class="personal__order-list-col personal__order-list-col--desc">
                                <p>
                                    <?=$PRODUCT['DESCRIPTION'];?>
                                </p>
                            </div>
                            <div class="personal__order-list-col personal__order-list-col--count"><?=$PRODUCT['QUANTITY'];?></div>
                            <div class="personal__order-list-col personal__order-list-col--price">
                                <span><?=WorkCart::numberFormat($PRODUCT['PRICE']);?></span>
                            </div>
                            <div class="personal__order-list-col personal__order-list-col--total-price">
                                <span><?=WorkCart::numberFormat($PRODUCT['PRICE']*$PRODUCT['QUANTITY']);?></span>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="personal__order-total-block">
                        <div class="personal__order-total-item">
                            <div class="personal__order-total-col personal__order-total-col--name"><?=GetMessage("ARLIGHT_ARSTORE_SUMMA1")?></div>
                            <div class="personal__order-total-col personal__order-total-col--val"><?=WorkCart::numberFormat($order['SUMM']);?>
                            </div>
                        </div>
                        <div class="personal__order-total-item">
                            <div class="personal__order-total-col personal__order-total-col--name"><?=GetMessage("ARLIGHT_ARSTORE_DOSTAVKA")?></div>
                            <div class="personal__order-total-col personal__order-total-col--val"><?=WorkCart::numberFormat($order['DELIVERY_PRICE']);?>
                            </div>
                        </div>
                        <div class="personal__order-total-item personal__order-total-item--main">
                            <div class="personal__order-total-col personal__order-total-col--name"><?=GetMessage("ARLIGHT_ARSTORE_ITOGO")?></div>
                            <div class="personal__order-total-col personal__order-total-col--val"><?=WorkCart::numberFormat($allPrice);?>
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