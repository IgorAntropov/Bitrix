<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
global $APPLICATION;
$this->setFrameMode(false);
if (!$arResult['ORDER_ID'] && count((array)$arResult['PRODUCTS'])>0) {
    $productsWithComponents = [];
    $productsWithComponentsPath = $_SERVER['DOCUMENT_ROOT']. SITE_DIR. 'assets/json/productsWithComponents.json';
    if(file_exists($productsWithComponentsPath)){
        $productsWithComponents = json_decode(json_encode(json_decode(file_get_contents($productsWithComponentsPath))), true);
    }
    ?>
    <?php if(!preg_match("!/personal/!si",$APPLICATION->GetCurPage())){?>
        <div class="title title-page">
            <div class="title__text"><?=GetMessage("ARLIGHT_ARSTORE_KORZINA")?></div>
            <div class="">
                <a href="javascript:void(0);" class="button button_red  button_change active_el"><span><?=GetMessage("ARLIGHT_ARSTORE_POKAZATQ_SOSTAV_ZAKA")?></span><span><?=GetMessage("ARLIGHT_ARSTORE_SKRYTQ_SOSTAV_ZAKAZA")?></span></a>
            </div>
        </div>
        <br>
    <?php } ?>
    <div class="order-cart" data-slug="FULL_CART">
        <div class="order-cart__item-wrap">
            <div class="order-cart__item order-cart__item--title">
                <div class="order-cart__item-title order-cart__item-title--name"><?=GetMessage("ARLIGHT_ARSTORE_TOVAR")?></div>
                <div class="order-cart__item-title order-cart__item-title--order"><?=GetMessage("ARLIGHT_ARSTORE_CENA_KOLICESTVO_NALI")?></div>
                <div class="order-cart__item-title order-cart__item-title--price"><?=GetMessage("ARLIGHT_ARSTORE_SUMMA")?></div>
            </div>
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
                <div class="order-cart__item" data-id="<?= $item['ID']; ?>" data-slug="CART_ROW">
                    <div class="order-cart__wrap">
                        <div class="order-cart__thumb">
                            <div class="order-cart__image-wrap">
                                <a href="<?= $item['DETAIL_PAGE_URL']; ?>">
                                <?php if($item['IMAGE']){?>
                                    <img src="<?= $item['IMAGE']; ?>" alt="<?= $item['NAME']; ?>">
                                <?php } else { ?>
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/not-img.jpg" alt="" class="full-width">
                                <?php }  ?>
                                </a>
                            </div>
                        </div>
                        <div class="order-cart__item-block order-cart__item-block--name">
                            <div class="order-cart__info">
                                <div class="order-cart__article">
                                    <a href="<?= $item['DETAIL_PAGE_URL']; ?>"><?= $item['ARTNUMBER']; ?></a>
                                </div>
                                <div class="order-cart__title">
                                    <a href="<?= $item['DETAIL_PAGE_URL']; ?>"
                                       class="order-cart__title-link"><?= $item['NAME']; ?></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="order-cart__item-block order-cart__item-block--order">
                        <div class="order-cart__block-wrap">
                            <div class="order-cart__item-price">
                                <?= $item['PRICE']; ?><br>
                                <span style="text-decoration: line-through"><?= $item['OLDPRICE']; ?></span>
                            </div>
                            <? if($item['INSTOCK'] == GetMessage("ARLIGHT_ARSTORE_SBORKA")): ?>
                                <div class="order-cart__stock item__stock tooltip_status" data-stock="<?= $available; ?>" title="<?= STATUS_TOOLTIP ?>" style="cursor: help;"><?= $item['INSTOCK']; ?></div>
                            <? else: ?>
                                <div class="order-cart__stock item__stock" data-stock="<?= $available; ?>"><?= $item['INSTOCK']; ?></div>
                            <? endif; ?>

                            <div class="buy-block__wrap">
                                <div class="buy-block__items">
                                    <button class="buy-block__button">-</button>
                                    <input type="text" class="buy-block__input" name="quantity"
                                           value="<?= $item['QUANTITY']; ?>" maxlength="18"
                                           data-type="input" data-price=""
                                           data-packnorm="<?= ($item['PACKAGE_COUNT']) ? $item['PACKAGE_COUNT'] : 1; ?>"
                                           data-slug="CART_QUANTITY">
                                    <button class="buy-block__button">+</button>
                                </div>
                                <div class="buy-block__item-packnorm">
                                    <? if ($item['PACKAGE'] && $item['PACKAGE_COUNT']) { ?>
                                        <? $pack = $item['PACKAGE'];
                                        echo($pack === '-' ? GetMessage("ARLIGHT_ARSTORE_ED_IZM") : $pack)
                                        ?>: <?= $item['PACKAGE_COUNT'] ?> <?= $item['UNIT'] ?>
                                    <? } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-cart__item-block order-cart__item-block--price">
                        <div class="order-cart__price" data-slug="ITEM_SUMM">
                            <?= $item['SUMM']; ?>
                        </div>
                        <div style="text-decoration: line-through" class="order-cart__price" data-slug="ITEM_OLDSUMM">
                            <?= $item['OLDSUMM']; ?>
                        </div>
                        <div class="order-cart__basket">
                            <a href="#" data-slug="CART_ROW_REMOVE">
                                <i class="icon-garbage"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } else { ?>
    <div class="title title-page">
        <div class="title__text"><?=GetMessage("ARLIGHT_ARSTORE_KORZINA")?></div>
        <div class="title__backlink">
            <i class="icon-arrow-left"></i>
            <a href=""><?=GetMessage("ARLIGHT_ARSTORE_VERNUTQSA")?></a>
        </div>
    </div>
<?php } ?>