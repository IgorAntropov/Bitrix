<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if (!class_exists('Helpers', false))
    require_once $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/" . $arParams['SITE_ID'] . "/include/Helpers.php";
$blockID = 'itertech_cart';
$siteUrl = $_SERVER['SERVER_NAME'];
$productsWithComponents = [];
$productsWithComponentsPath = $_SERVER['DOCUMENT_ROOT']. SITE_DIR. 'assets/json/productsWithComponents.json';
if(file_exists($productsWithComponentsPath)){
    $productsWithComponents = json_decode(json_encode(json_decode(file_get_contents($productsWithComponentsPath))), true);
}
$rsSites = CSite::GetByID($arParams['SITE_ID']);
$arSite = $rsSites->Fetch();
$siteDir = $arSite['DIR'];
$BELARUS = COption::GetOptionString("main", "belarus", false);
?>
<div class="header__basket" id="<?=$blockID;?>">
    <div class="cart__block">
        <div class="cart__block-list">
            <div class="item item--cart item--cart-title">
                <div class="cart__item cart__item--title cart__item--article"></div>
                <div class="cart__item cart__item--title cart__item--name"><?=GetMessage("ARLIGHT_ARSTORE_ARTIKUL_NAIMENOVANIE")?></div>
                <div class="cart__item cart__item--title cart__item--order"><?=GetMessage("ARLIGHT_ARSTORE_ZAKAZ")?></div>
                <div class="cart__item cart__item--title cart__item--price"><?=GetMessage("ARLIGHT_ARSTORE_CENA")?></div>
                <div class="cart__item cart__item--title cart__item--price-total"><?=GetMessage("ARLIGHT_ARSTORE_ITOGO")?></div>
                <div class="cart__item cart__item--title cart__item--del"><?=$arResult['TOTALCART']['QUANTITY'];?></div>
            </div>

            <div class="item--cart-all max3">
                <?php foreach ($arResult['PRODUCTS'] as $item) {
                    $available = '';
                switch ($item['INSTOCK']) {
                    case GetMessage("ARLIGHT_ARSTORE_V_NALICII"):
                        $available = 'available';
                        break;
                    case GetMessage("ARLIGHT_ARSTORE_OJIDAETSA"):
                        $available = 'wait';
                        break;
                    case GetMessage("ARLIGHT_ARSTORE_POD_ZAKAZ"):
                        if (isset($productsWithComponents[$item['ARTNUMBER']])) {
                            $available = 'available';
                        } else {
                            $available = 'notavailable';
                        }
                        break;
                }
                    if (Helpers::changeTextAvailableStatus($available)) $item['INSTOCK'] = Helpers::changeTextAvailableStatus($available);
                    if (isset($productsWithComponents[$item['ARTNUMBER']])) $item['INSTOCK'] = GetMessage("ARLIGHT_ARSTORE_SBORKA");
                    ?>

                <div class="item item--cart" data-id="<?=$item['ID'];?>" data-slug="CART_ROW">
                    <div class="cart__item cart__item--article">
                        <a href="<?= $item['DETAIL_PAGE_URL']; ?>">
                            <?php if ($item['IMAGE']) { ?>
                                <img src="<?= $item['IMAGE']; ?>" alt="<?= $item['NAME']; ?>">
                            <?php } else { ?>
                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/not-img.jpg" alt="" class="full-width">
                            <?php } ?>
                        </a>
                    </div>
                    <div class="cart__item cart__item--name">
                        <div><a href="<?=$item['DETAIL_PAGE_URL'];?>" class="link link-art"><?=$item['ARTNUMBER'];?></a></div>
                        <div><a href="<?=$item['DETAIL_PAGE_URL'];?>" class="link "><?=$item['NAME'];?></a></div>
                    </div>
                    <div class="cart__item cart__item--order item__sale">
                        <div class="buy-block">
                            <div class="buy-block__wrap">
                                <div class="buy-block__items">
                                    <button class="buy-block__button">-</button>
                                    <input type="text" class="buy-block__input"
                                           name="quantity" value="<?=$item['QUANTITY'];?>"
                                           data-type="input"
                                           data-price=""
                                           data-packnorm="<?=$item['PACKAGE_COUNT'];?>"
                                           data-slug="CART_QUANTITY"
                                           autocomplete="off">
                                    <button class="buy-block__button">+</button>
                                </div>
                                <? if ($item['PACKAGE'] && $item['PACKAGE_COUNT']) { ?>
                                    <div class="buy-block__item-packnorm">
                                        <? $pack = $item['PACKAGE'];
                                        echo($pack === '-' ? GetMessage("ARLIGHT_ARSTORE_ED_IZM") : $pack)
                                        ?>
                                        : <?= $item['PACKAGE_COUNT'] ?> <?= $item['UNIT'] ?>
                                    </div>
                                <? } ?>
                            </div>
                        </div>
                    </div>
                    <div class="cart__item cart__item--price">
                        <div>
                            <?=$item['PRICE'];?><br>
                            <span style="text-decoration: line-through"><?=$item['OLDPRICE'];?></span>
                        </div>
                    </div>
                    <div class="cart__item cart__item--price-total">
                        <div>
                            <?=$item['SUMM'];?><br>
                            <span style="text-decoration: line-through"><?=$item['OLDSUMM'];?></span>
                        </div>
                    </div>
                    <div class="cart__item cart__item--del">
                        <div>
                            <a href="#" class="cart__item-del" data-slug="CART_ROW_REMOVE"><i class="icon-cart-cross"></i></a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <form class="cart__block-order" name="basket_top_form">
            <div class="row">
                <div class="col-4">
                    <div class="cart__block-order-text">
                        <? if (!BELARUS && !HIDDEN_NDS_TEXT && !KAZAKHSTAN): ?>
                            <div><?=GetMessage("ARLIGHT_ARSTORE_CENY_UKAZANY_V_ROSSI")?></div>
                        <? endif; ?>
                    </div>
                </div>
                <div class="col-4">
                    <div class="cart__button-wrap">
                        <? if ($arResult['TOTALCART']['QUANTITY'] > 3): ?>
                            <div class="cart__button-more"><span></span><span></span><span></span></div>
                        <? endif; ?>
                        <div>
                            <?
                            $yaMetrica = '';
                            global $goalCurrent;
                            if ($goalCurrent['to-cart']['name'] && $goalCurrent['to-cart']['id'])
                                $yaMetrica = 'onclick="ym(' . $goalCurrent['to-cart']['id'] . ', \'reachGoal\', \'' . $goalCurrent['to-cart']['name'] . '\'); return true;"';
                            ?>
                            <a href="<?= $siteDir ?>order/" <?= $yaMetrica ?> class="button"><?=GetMessage("ARLIGHT_ARSTORE_OFORMITQ_ZAKAZ")?></a>
                        </div>
                    </div>
                </div>
                <div class="col-4 align-self-center">
                    <div class="cart__block-price">
                        <div>
                            <?php if($arResult['TOTALCART']['DISCOUNT_SUMM_MATH'] > 0) { ?>
                                <style>
                                    .cart__currency-name {width:140px}
                                </style>
                                <div class="cart__currency-block">
                                    <span class="cart__currency-name"><?=GetMessage("ARLIGHT_ARSTORE_SUMMA")?></span>
                                    <span class="cart__currency sale-summ"><?=$arResult['TOTALCART']['OLDSUMM'];?></span>
                                </div>
                                <div class="cart__currency-block">
                                    <span class="cart__currency-name"><?=GetMessage("ARLIGHT_ARSTORE_VASA_SKIDKA")?></span>
                                    <span class="cart__currency sale-discount"><?=$arResult['TOTALCART']['DISCOUNT_PERCENT'];?></span>
                                </div>
                                <div class="cart__currency-block">
                                    <span class="cart__currency-name"><?=GetMessage("ARLIGHT_ARSTORE_VASA_EKONOMIA")?></span>
                                    <span class="cart__currency sale-discount"><?=$arResult['TOTALCART']['DISCOUNT_SUMM'];?></span>
                                </div>
                                <?php if($arResult['TOTALCART']['DISCOUNT_SUMM_DOP']) { ?>
                                    <div class="cart__currency-block">
                                        <span class="cart__currency-name"><?=GetMessage("ARLIGHT_ARSTORE_ITOGO_ZA_TOVARY")?></span>
                                        <span class="cart__currency sale-discount"><?=$arResult['TOTALCART']['SUMM_PROM'];?></span>
                                    </div>
                                    <div class="cart__currency-block">
                                        <span class="cart__currency-name"><?=GetMessage("ARLIGHT_ARSTORE_DOP_SKIDKA_PRI_OFORM")?></span>
                                        <span class="cart__currency sale-discount"><?=$arResult['TOTALCART']['DISCOUNT_SUMM_DOP'];?></span>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <div class="important">
                                <span class="cart__currency-name"><?=($arResult['TOTALCART']['DISCOUNT_SUMM_MATH'] > 0) ? GetMessage("ARLIGHT_ARSTORE_ITOGO_SO_SKIDKOY") : GetMessage("ARLIGHT_ARSTORE_ITOGO1"); ?></span>
                                <span class="cart__currency sale-total"><?=$arResult['TOTALCART']['SUMM'];?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php

$options = WorkCart::getOptions(SITE_ID);
$jsParams = array();
$jsParams['LIST_PROPERTY_CODE'] = array_diff((array)$arParams['LIST_PROPERTY_CODE'], array(''));
$jsParams['TEMPLATE_NAME'] = $arParams['TEMPLATE_NAME'];
$jsParams['CHANGE_BUTTON_TEXT'] = $options['CHANGE_BUTTON_TEXT_'.SITE_ID];
$jsParams['DEBUG'] = $options['DEBUG_'.SITE_ID];
$jsParams['CURRENCY'] = $options['CURRENCY_'.SITE_ID];
$jsParams['DECIMALS'] = $options['DECIMALS_'.SITE_ID];
$jsParams['DELIMITER_DECIMALS'] = $options['DELIMITER_DECIMALS_'.SITE_ID];
$jsParams['THOUSANDS_SEPARATOR'] = ($options['THOUSANDS_SEPARATOR_'.SITE_ID]) ? $options['THOUSANDS_SEPARATOR_'.SITE_ID] : ' ';
$jsParams['SITE_ID'] = SITE_ID;

?>

<script>
    new ItertechSmallCart({
        ID: '#<?=$blockID?>',
        jsParams: <?=CUtil::PhpToJSObject($jsParams)?>,
        path: <?=CUtil::PhpToJSObject($this->__component->GetPath() . "/ajax.php")?>});
    BX.message({
        ARLIGHT_ARSTORE_TOV: '<?=GetMessageJS('ARLIGHT_ARSTORE_TOV')?>',
        ARLIGHT_ARSTORE_TOV1: '<?=GetMessageJS('ARLIGHT_ARSTORE_TOV1')?>',
        ARLIGHT_ARSTORE_TOV2: '<?=GetMessageJS('ARLIGHT_ARSTORE_TOV2')?>',
    });
</script>

