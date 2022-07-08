<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);

$templateLibrary = array('popup', 'fx');
$currencyList = '';
$prodID = $arResult['ID'];
$stepActionsArr = [];
$pathToStepActions = $_SERVER['DOCUMENT_ROOT'] . SITE_DIR . "assets/json/actionArticles.json";
if(file_exists($pathToStepActions) && !BELARUS && !KAZAKHSTAN) $stepActionsArr = json_decode(json_encode(json_decode(file_get_contents($pathToStepActions))), true);

if (!empty($arResult['CURRENCIES'])) {
    $templateLibrary[] = 'currency';
    $currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
    'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
    'TEMPLATE_LIBRARY' => $templateLibrary,
    'CURRENCIES' => $currencyList,
    'ITEM' => array(
        'ID' => $arResult['ID'],
        'IBLOCK_ID' => $arResult['IBLOCK_ID'],
        'OFFERS_SELECTED' => $arResult['OFFERS_SELECTED'],
        'JS_OFFERS' => $arResult['JS_OFFERS']
    )
);
unset($currencyList, $templateLibrary);

$mainId = $this->GetEditAreaId($arResult['ID']);
$itemIds = array(
    'ID' => $mainId,
    'DISCOUNT_PERCENT_ID' => $mainId . '_dsc_pict',
    'STICKER_ID' => $mainId . '_sticker',
    'BIG_SLIDER_ID' => $mainId . '_big_slider',
    'BIG_IMG_CONT_ID' => $mainId . '_bigimg_cont',
    'SLIDER_CONT_ID' => $mainId . '_slider_cont',
    'OLD_PRICE_ID' => $mainId . '_old_price',
    'PRICE_ID' => $mainId . '_price',
    'DISCOUNT_PRICE_ID' => $mainId . '_price_discount',
    'PRICE_TOTAL' => $mainId . '_price_total',
    'SLIDER_CONT_OF_ID' => $mainId . '_slider_cont_',
    'QUANTITY_ID' => $mainId . '_quantity',
    'QUANTITY_DOWN_ID' => $mainId . '_quant_down',
    'QUANTITY_UP_ID' => $mainId . '_quant_up',
    'QUANTITY_MEASURE' => $mainId . '_quant_measure',
    'QUANTITY_LIMIT' => $mainId . '_quant_limit',
    'BUY_LINK' => $mainId . '_buy_link',
    'ADD_BASKET_LINK' => $mainId . '_add_basket_link',
    'BASKET_ACTIONS_ID' => $mainId . '_basket_actions',
    'NOT_AVAILABLE_MESS' => $mainId . '_not_avail',
    'COMPARE_LINK' => $mainId . '_compare_link',
    'TREE_ID' => $mainId . '_skudiv',
    'DISPLAY_PROP_DIV' => $mainId . '_sku_prop',
    'DISPLAY_MAIN_PROP_DIV' => $mainId . '_main_sku_prop',
    'OFFER_GROUP' => $mainId . '_set_group_',
    'BASKET_PROP_DIV' => $mainId . '_basket_prop',
    'SUBSCRIBE_LINK' => $mainId . '_subscribe',
    'TABS_ID' => $mainId . '_tabs',
    'TAB_CONTAINERS_ID' => $mainId . '_tab_containers',
    'SMALL_CARD_PANEL_ID' => $mainId . '_small_card_panel',
    'TABS_PANEL_ID' => $mainId . '_tabs_panel'
);
$obName = $templateData['JS_OBJ'] = 'ob' . preg_replace('/[^a-zA-Z0-9_]/', 'x', $mainId);
$name = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])
    ? $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
    : $arResult['NAME'];
$title = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE'])
    ? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE']
    : $arResult['NAME'];
$alt = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT'])
    ? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT']
    : $arResult['NAME'];

$haveOffers = !empty($arResult['OFFERS']);
if ($haveOffers) {
    $actualItem = isset($arResult['OFFERS'][$arResult['OFFERS_SELECTED']])
        ? $arResult['OFFERS'][$arResult['OFFERS_SELECTED']]
        : reset($arResult['OFFERS']);
    $showSliderControls = false;

    foreach ($arResult['OFFERS'] as $offer) {
        if ($offer['MORE_PHOTO_COUNT'] > 1) {
            $showSliderControls = true;
            break;
        }
    }
} else {
    $actualItem = $arResult;
    $showSliderControls = $arResult['MORE_PHOTO_COUNT'] > 1;
}

$skuProps = array();
$price = $actualItem['ITEM_PRICES'][$actualItem['ITEM_PRICE_SELECTED']];
$measureRatio = $actualItem['ITEM_MEASURE_RATIOS'][$actualItem['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'];
$showDiscount = $price['PERCENT'] > 0;

$showDescription = !empty($arResult['PREVIEW_TEXT']) || !empty($arResult['DETAIL_TEXT']);
$showBuyBtn = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION']);
$buyButtonClassName = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showAddBtn = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION']);
$showButtonClassName = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showSubscribe = $arParams['PRODUCT_SUBSCRIPTION'] === 'Y' && ($arResult['CATALOG_SUBSCRIBE'] === 'Y' || $haveOffers);

$arParams['MESS_BTN_BUY'] = $arParams['MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCE_CATALOG_BUY');
$arParams['MESS_BTN_ADD_TO_BASKET'] = $arParams['MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCE_CATALOG_ADD');
$arParams['MESS_NOT_AVAILABLE'] = $arParams['MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCE_CATALOG_NOT_AVAILABLE');
$arParams['MESS_BTN_COMPARE'] = $arParams['MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCE_CATALOG_COMPARE');
$arParams['MESS_PRICE_RANGES_TITLE'] = $arParams['MESS_PRICE_RANGES_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_PRICE_RANGES_TITLE');
$arParams['MESS_DESCRIPTION_TAB'] = $arParams['MESS_DESCRIPTION_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_DESCRIPTION_TAB');
$arParams['MESS_PROPERTIES_TAB'] = $arParams['MESS_PROPERTIES_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_PROPERTIES_TAB');
$arParams['MESS_COMMENTS_TAB'] = $arParams['MESS_COMMENTS_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_COMMENTS_TAB');
$arParams['MESS_SHOW_MAX_QUANTITY'] = $arParams['MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCE_CATALOG_SHOW_MAX_QUANTITY');
$arParams['MESS_RELATIVE_QUANTITY_MANY'] = $arParams['MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['MESS_RELATIVE_QUANTITY_FEW'] = $arParams['MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_FEW');

$positionClassMap = array(
    'left' => 'product-item-label-left',
    'center' => 'product-item-label-center',
    'right' => 'product-item-label-right',
    'bottom' => 'product-item-label-bottom',
    'middle' => 'product-item-label-middle',
    'top' => 'product-item-label-top'
);

$discountPositionClass = 'product-item-label-big';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION'])) {
    foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos) {
        $discountPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
    }
}

$labelPositionClass = 'product-item-label-big';
if (!empty($arParams['LABEL_PROP_POSITION'])) {
    foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos) {
        $labelPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
    }
}
$article = $arResult['PROPERTIES']['ARTICLE']['VALUE'];
$productsWithComponents = [];
$productsWithComponentsPath = $_SERVER['DOCUMENT_ROOT']. SITE_DIR. 'assets/json/productsWithComponents.json';
if(file_exists($productsWithComponentsPath)){
    $productsWithComponents = json_decode(json_encode(json_decode(file_get_contents($productsWithComponentsPath))), true);
}
$wh['stock_data'] = '';
$wh['value'] = $arResult['PROPERTIES']['STOCK_SUMMARY']['VALUE'];

switch ($wh['value']) {
    case GetMessage("ARLIGHT_ARSTORE_V_NALICII"):
        $wh['stock_data'] = 'available';
        break;
    case GetMessage("ARLIGHT_ARSTORE_OJIDAETSA"):
        $wh['stock_data'] = 'wait';
        break;
    case GetMessage("ARLIGHT_ARSTORE_POD_ZAKAZ"):
        if (isset($productsWithComponents[$article])) {
            $wh['stock_data'] = 'available';
        } else {
            $wh['stock_data'] = 'notavailable';
        }
        break;
}

if (Helpers::changeTextAvailableStatus($wh['stock_data'])) $wh['value'] = Helpers::changeTextAvailableStatus($wh['stock_data']);
if (isset($productsWithComponents[$article])) $wh['value'] = GetMessage("ARLIGHT_ARSTORE_SBORKA");

$pictures = [];
if (isset($arResult['PREVIEW_PICTURE']['ID'])) {
    $pictures[] = $arResult['PREVIEW_PICTURE']['ID'];
}
if (isset($arResult['PROPERTIES']['GALLERY']['VALUE']) && is_array($arResult['PROPERTIES']['GALLERY']['VALUE']) && count($arResult['PROPERTIES']['GALLERY']['VALUE'])) {
    foreach ($arResult['PROPERTIES']['GALLERY']['VALUE'] as $photo) {
        if (trim($photo)) {
            $pictures[] = $photo;
        }
    }
}

$price = $arResult['PROPERTIES']['PRICE']['VALUE'];
if (isset($stepActionsArr[$article])) {
    $discountPrice = $price;
} else {
    $discountPrice = WorkCart::getMyDiscount($price);
    $discountPrice = $discountPrice['PRICE'];
}

$priceOld = false;
if ($arResult['PROPERTIES']['PROMOTIONAL_PRICE']['VALUE'] && $arResult['PROPERTIES']['PROMOTIONAL']['VALUE'] && !BELARUS) {
    if ($price != $priceOld) {
        $priceOld = $arResult['PROPERTIES']['OLD_PRICE']['VALUE'];
    } else {
        $priceOld = false;
    }
    $discountPrice = $price;
}
global $simpleSale;
$simpleSaleProduct = false;
if ($simpleSale && isset($simpleSale[$article])) $simpleSaleProduct = true;

global $simpleNew;
$simpleNew = (file_exists($_SERVER['DOCUMENT_ROOT'] . SITE_DIR . 'assets/json/new_now_articles.json')) ? json_decode(json_encode(json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . SITE_DIR . 'assets/json/new_now_articles.json'))), true) : false;
$simpleNewProduct = false;
if ($simpleNew && isset($simpleNew[$article])) $simpleNewProduct = true;

?>
    </div>
    <div class="container">
        <div class="" id="<?= $itemIds['ID'] ?>"
             itemscope itemtype="http://schema.org/Product">
            <div class="title title-page title-page--product">
                <div class="title__text"><h1 itemprop="name"><?= $name ?></h1></div>
                <div class="title__backlink">
                    <i class="icon-arrow-left"></i>
                    <a href=""><?=GetMessage("ARLIGHT_ARSTORE_VERNUTQSA")?></a>
                </div>
            </div>
            <div class="card">
                <div class="card__block">
                    <div class="row">
                        <div class="col-xl-5">
                            <div class="card__sliders">
                                <div class="card__slider">
                                    <? if ($simpleSaleProduct || $simpleNewProduct): ?>
                                        <div class="sale-sticker">
                                            <? if ($simpleSaleProduct): ?>
                                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/sale-sticker.svg?v=1" alt="SALE">
                                            <? endif; ?>
                                            <? if ($simpleNewProduct): ?>
                                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/new-sticker.svg" alt="NEW">
                                            <? endif; ?>
                                        </div>
                                    <? endif; ?>
                                    <?php
                                    if (count($pictures) >= 1) {
                                        ?>
                                        <div class="card__slider-for">
                                            <?php
                                            foreach ($pictures as $galleryImage) {
                                                ?>
                                                <div class="slide">
                                                    <div>
                                                        <picture>
                                                            <source srcset="<?= ALResizeWatermark($galleryImage, 430) ?>"
                                                                    media="(max-width: 450px)">
                                                            <source srcset="<?= ALResizeWatermark($galleryImage, 540) ?>"
                                                                    media="(max-width: 570px)">
                                                            <source srcset="<?= ALResizeWatermark($galleryImage, 508) ?>"
                                                                    media="(max-width: 768px)">
                                                            <source srcset="<?= ALResizeWatermark($galleryImage, 590) ?>"
                                                                    media="(max-width: 990px)">
                                                            <source srcset="<?= ALResizeWatermark($galleryImage, 830) ?>"
                                                                    media="(max-width: 1200px)">
                                                            <source srcset="<?= ALResizeWatermark($galleryImage, 440) ?>"
                                                                    media="(max-width: 1630px)">
                                                            <source srcset="<?= ALResizeWatermark($galleryImage, 590) ?>">
                                                            <img src="<?= ALResizeWatermark($galleryImage, 590) ?>"
                                                                 alt=""
                                                                 itemprop="image">
                                                        </picture>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="card__slider-nav">
                                            <?php
                                            foreach ($pictures as $galleryImage) {
                                                ?>
                                                <div class="slide">
                                                    <div>
                                                        <img src="<?= ALResize($galleryImage, 90) ?>" alt="">
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="slider slider--card">
                                            <div class="slider__item">
                                                <div class="slider__item-image">
                                                    <div><img src="<?= SITE_TEMPLATE_PATH ?>/img/default-img.jpg"
                                                              class="full-width"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7">
                            <div class="card__main-info">
                                <div class="card__line" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                    <div class="card__article">
                                        <span><?= $article ?></span>
                                        <span><?=GetMessage("ARLIGHT_ARSTORE_ARTIKUL")?></span>
                                    </div>
                                    <div class="card__btns">
                                        <? //Для активной кнопки - in_cart?>
                                        <a class="buy-block__button buy-block__button--compare" href="#"
                                           data-id="<?= $arResult['ID'] ?>" data-slug="ADD_TO_COMPARE"
                                           title="<?=GetMessage("ARLIGHT_ARSTORE_SRAVNENIE")?>">
                                            <i class="icon-ar_head_vs"></i>
                                        </a>

                                        <? //Для активной кнопки скриптом добавится класс in_cart, который может использоваться для подсветки активного элемента?>
                                        <a class="buy-block__button buy-block__button--favorite" href="#"
                                           data-id="<?= $arResult['ID'] ?>" data-slug="ADD_TO_FAVORITE"
                                           title="<?=GetMessage("ARLIGHT_ARSTORE_IZBRANNOE")?>">
                                            <i class="icon-ar_head_fav"></i>
                                        </a>
                                        <?
                                        $stock = '';
                                        if (CSite::InGroup(array(GR_SADM_ID, GR_ADM_ID)) || (SHOW_STOCK && $USER->IsAuthorized())) {
                                            if ($arResult['PROPERTIES']['STOCK_QNT']['VALUE'] > 0)
                                                $stock = $arResult['PROPERTIES']['STOCK_QNT']['VALUE'] . ' ' . $arResult['PROPERTIES']['UNIT']['VALUE'];
                                        }
                                        ?>
                                        <? if ($arResult['PROPERTIES']['OBSOLETE']['VALUE'] != '-1'): ?>
                                            <div class="card__quantity" data-stock="<?= $wh['stock_data'] ?>">
                                                <? if($wh['value'] == GetMessage("ARLIGHT_ARSTORE_SBORKA")): ?>
                                                    <div class="tooltip_status" title="<?= STATUS_TOOLTIP ?>" style="cursor: help;"><?= $wh['value'] ?><br><?=$stock?></div>
                                                <? else: ?>
                                                    <div><?= $wh['value'] ?><br><?=$stock?></div>
                                                <? endif; ?>
                                            </div>
                                            <? if ($wh['stock_data'] == 'available'): ?>
                                                <link itemprop="availability" href="http://schema.org/InStock">
                                            <? endif; ?>
                                        <? endif; ?>
                                    </div>
                                </div>
                                <div class="card__line card__line-buy">
                                    <div class="card__colors-wrap">
                                        <? if ($arResult['DISPLAY_PROPERTIES']['COLOR_HREF']['VALUE']): ?>
                                            <? $COLOR = $arResult['DISPLAY_PROPERTIES']['COLOR_HREF']['VALUE'];
                                            $arColors = ALColor2($COLOR);
                                            foreach ($arColors as $colorItem): ?>
                                                <div class="color color--radial color--indent-left"
                                                    <? if ($colorItem): ?>
                                                        style="background:<?= $colorItem ?>"
                                                    <? endif; ?>
                                                ></div>
                                            <? endforeach; ?>
                                        <? endif; ?>
                                    </div>
                                    <div class="card__form <? if ($arResult['PROPERTIES']['OBSOLETE']['VALUE'] == '-1'){ echo 'archive_span';} ?>">
                                        <div class="card__buy-block" itemprop="offers" itemscope
                                             itemtype="http://schema.org/Offer">
                                            <div class="card__buy-block-accept">
                                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/accept-desktop.svg" alt="">
                                            </div>
                                            <? if ($arResult['PROPERTIES']['OBSOLETE']['VALUE'] != '-1'): ?>
                                                <? if ($price): ?>
                                                    <div class="<? if ($discountPrice || $priceOld): ?>card__price-old<?else:?>card__price<? endif; ?>">
                                                        <?
                                                        $priceValue = $price;
                                                        if ($priceOld) $priceValue = $priceOld;
                                                        PriceFormat($priceValue);
                                                        ?>
                                                        <?= CURRENCY; ?>/<?= $arResult['PROPERTIES']['UNIT']['VALUE'] ?>
                                                    </div>
                                                <? endif; ?>
                                                <? if ($discountPrice || $priceOld): ?>
                                                    <div class="card__price">
                                                        <?
                                                        $discountPriceValue = $discountPrice;
                                                        if ($priceOld && !$discountPrice) $discountPriceValue = $price;
                                                        PriceFormat($discountPriceValue) ?>
                                                        <?= CURRENCY; ?>/<?= $arResult['PROPERTIES']['UNIT']['VALUE'] ?>
                                                        <? if (isset($stepActionsArr[$article])): ?>*<? endif; ?>
                                                        <? if (isset($stepActionsArr[$article])): ?><i style="white-space: nowrap;">* <?=GetMessage("ARLIGHT_ARSTORE_CENA_PRI_POKUPKE_OT")?><?= $stepActionsArr[$article]; ?> <?= $arResult['PROPERTIES']['UNIT']['VALUE'] ?></i><? endif; ?>
                                                    </div>
                                                <? endif; ?>
                                                <meta itemprop="price"
                                                      content="<?= ($discountPrice) ? $discountPrice : $price ?>">
                                                <meta itemprop="priceCurrency"
                                                      content="<?= $arResult['PROPERTIES']['CURRENCY']['VALUE'] ?>">
                                            <? else: ?>
                                                <div><?=GetMessage("ARLIGHT_ARSTORE_ARHIV")?></div>
                                            <? endif; ?>
                                        </div>
                                        <? if ($arResult['PROPERTIES']['OBSOLETE']['VALUE'] != '-1'): ?>
                                            <? if (BLOCKING != 'true'): ?>
                                                <form class="buy-block" data-type="cart" data-slug="BUY_BLOCK">
                                                    <div class="buy-block__wrap">
                                                        <div class="buy-block__items">
                                                            <button class="buy-block__button">-</button>
                                                            <input type="text" class="buy-block__input" name="quantity"
                                                                   value="0"
                                                                   maxlength="18"
                                                                   data-type="input" data-price=""
                                                                   data-packnorm="<? if ($arResult['PROPERTIES']['PACKNORM']['VALUE']): ?><?= $arResult['PROPERTIES']['PACKNORM']['VALUE'] ?><? else: ?>1<? endif; ?>"
                                                                   data-slug="QUANTITY"
                                                                   autocomplete="off">
                                                            <button class="buy-block__button">+</button>
                                                        </div>
                                                        <div class="buy-block__item-packnorm">
                                                            <? if ($arResult['PROPERTIES']['PACK']['VALUE'] && $arResult['PROPERTIES']['PACKNORM']['VALUE']): ?>
                                                                <? $pack = $arResult['PROPERTIES']['PACK']['VALUE'];
                                                                echo($pack === '-' ? GetMessage("ARLIGHT_ARSTORE_ED_IZM") : $pack)
                                                                ?>
                                                                : <?= $arResult['PROPERTIES']['PACKNORM']['VALUE'] ?> <?= $arResult['PROPERTIES']['UNIT']['VALUE'] ?>
                                                            <? endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="buy-block__button-wrap">
                                                        <a class="buy-block__button buy-block__button--submit"
                                                           data-empty="<?=GetMessage("ARLIGHT_ARSTORE_V_KORZINU")?>"
                                                           data-full="<?=GetMessage("ARLIGHT_ARSTORE_DOBAVITQ")?>"
                                                           data-sendorder="<?=GetMessage("ARLIGHT_ARSTORE_OFORMITQ")?>"
                                                           href="javascript:void(0);" data-id="<?= $prodID ?>"
                                                           data-url="<?= $arResult['DETAIL_PAGE_URL'] ?>"
                                                           data-slug="ADD_TO_CART"><?=GetMessage("ARLIGHT_ARSTORE_V_KORZINU")?></a>
                                                    </div>
                                                </form>
                                            <? endif; ?>
                                        <? endif; ?>
                                    </div>
                                </div>

                                <div class="card__description" itemprop="description">
                                    <?= $arResult['PROPERTIES']['DESCRIPTION']['VALUE'] ?>
                                </div>
                                <? if(stristr($article, '(')): ?>
                                    <div class="" style="font-size: 13px; margin-bottom: 35px; line-height: 19px;"><noindex><?=GetMessage("ARLIGHT_ARSTORE_DOPOLNENIE_K_ARTIKUL")?></noindex></div>
                                <? endif; ?>
                                <div class="card__line card__line--table">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="card__table">
                                                <?
                                                $certType = $certArticle = $certRef = false;
                                                $certificateID = (isset($arResult['PROPERTIES']['CERTIFICATE_ID']['VALUE']) && (int)$arResult['PROPERTIES']['CERTIFICATE_ID']['VALUE']) ? (int)$arResult['PROPERTIES']['CERTIFICATE_ID']['VALUE'] : false;
                                                $certificatesDataPath = $_SERVER["DOCUMENT_ROOT"]. SITE_DIR.'assets/json/certificatesData.json';
                                                if(isset($certificatesDataPath) && file_exists($certificatesDataPath)){
                                                    $certificatesData = json_decode(json_encode(json_decode(file_get_contents($certificatesDataPath))), true);
                                                    if($certificateID && isset($certificatesData[$certificateID])){
                                                        if(mb_strtolower(trim($certificatesData[$certificateID]['number'])) !== GetMessage("ARLIGHT_ARSTORE_V_OJIDANII")){
                                                            $certType = $certificatesData[$certificateID]['type'];
                                                            $certArticle = $certificatesData[$certificateID]['number'];
                                                            if(isset($certificatesData[$certificateID]['file']) && $certificatesData[$certificateID]['file'] !== ''){
                                                                $certRef = $certificatesData[$certificateID]['file'];
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                                <? if($certType && $certArticle): ?>
                                                    <div class="card__row">
                                                        <div class="card__param"><?= $certType ?></div>
                                                        <div class="card__param-value">
                                                            <? if($certRef): ?><a href="<?= $certRef; ?>" target="_blank"><? endif; ?>
                                                            <?= $certArticle; ?>
                                                            <? if($certRef): ?></a><? endif; ?>
                                                        </div>
                                                    </div>
                                                <? endif; ?>
                                                <?
                                                $propertyArTemp = [];
                                                global $propertyAr;
                                                foreach ($propertyAr as $propertyArItem) {
                                                    $propertyArTemp[$propertyArItem] = '';
                                                }

                                                foreach ($arResult['PROPERTIES'] as $property) {
                                                    if (in_array($property['CODE'], $propertyAr))
                                                        $propertyArTemp[$property['CODE']] = $property;
                                                }
                                                ?>
                                                <?
                                                $k = 0;
                                                foreach ($propertyArTemp as $property) {
                                                    //не выводить длину волны для белого свечения
                                                    if ($property['CODE'] == "T_1" && $property['VALUE']){
                                                        $countWhite = 0;
                                                        foreach ($property['VALUE'] as $valueT1Item) {
                                                            if (stristr(strtolower($valueT1Item), GetMessage("ARLIGHT_ARSTORE_BELYY")))
                                                                $countWhite++;
                                                        }
                                                        if ($countWhite == count($property['VALUE']))
                                                            continue;
                                                    }
                                                    ?>
                                                    <?
                                                    if ($property['VALUE'] && $property['VALUE']!='-'): ?>
                                                        <div class="card__row" data-code="<?= $property['CODE'] ?>">
                                                            <div class="card__param"><?= $property['NAME'] ?></div>
                                                            <? if ($property['CODE'] == "COLOR_HREF"): ?>
                                                                <div class="card__param-value">
                                                                    <? $COLOR = $property['VALUE'];
                                                                    $arColors = ALColor2($COLOR);
                                                                    foreach ($arColors as $colorItem): ?>
                                                                        <div class="color color--radial color--indent-left"
                                                                            <? if ($colorItem): ?>
                                                                                style="background:<?= $colorItem ?>"
                                                                            <? endif; ?>
                                                                             title=""></div>
                                                                    <? endforeach; ?>
                                                                    <?= $arResult['PROPERTIES']['COLOR_TITLE']['VALUE'] ?>
                                                                </div>
                                                            <? else: ?>
                                                                <div class="card__param-value"><?= (is_array($property['VALUE'])
                                                                        ? implode(' / ', $property['VALUE'])
                                                                        : $property['VALUE']) ?>
                                                                </div>
                                                            <? endif; ?>
                                                        </div>
                                                        <? $k++;?>
                                                    <? endif; ?>
                                                    <?
                                                }
                                                unset($property);
                                                ?>
                                            </div>
                                            <? if ($k > 9): ?>
                                                <a href="" class="specifications__link specifications__table-all change-text">
                                                    <span><?=GetMessage("ARLIGHT_ARSTORE_VSE_HARAKTERISTIKI")?></span>
                                                    <span><?=GetMessage("ARLIGHT_ARSTORE_SKRYTQ")?></span>
                                                </a>
                                            <? endif; ?>
                                        </div>
                                        <div class="col-md-2">
                                            <? $titleDownload = str_replace('.', ',', str_replace(['_', '~', '#', '%', '&', '*', '{', '}', '\\', '|', '/', ':', ';', '"', '\'', '+', '=', '&', '!', '@', '<', '>', '[', ']'], '', $name));
                                            ?>
                                            <div class="card__file-wrapper">
                                                <? if ($arResult['PROPERTIES']['INSTRUCTION']['VALUE']):?>
                                                <a href="<?= $arResult['PROPERTIES']['INSTRUCTION']['PATH'] ?>"
                                                   target="_blank"
                                                   download="<?=GetMessage("ARLIGHT_ARSTORE_INSTRUKCIA_K_TOVARU")?><?= $titleDownload; ?>">
                                                    <div class="card__file">
                                                        <div class="card__file-img">
                                                            <img src="<?= SITE_TEMPLATE_PATH ?>/img/pdf.svg" alt="">
                                                        </div>
                                                        <div class="card__file-title"><?=GetMessage("ARLIGHT_ARSTORE_INSTRUKCIA")?></div>
                                                    </div>
                                                </a>
                                                <?endif;?>
                                                <?php
                                                if (isset($arResult['PROPERTIES']['MANUAL']['VALUES_ARR']) && is_array($arResult['PROPERTIES']['MANUAL']['VALUES_ARR']) && count($arResult['PROPERTIES']['MANUAL']['VALUES_ARR'])) {
                                                    $manualsArray = $arResult['PROPERTIES']['MANUAL']['VALUES_ARR'];
                                                    $nameInstr = GetMessage("ARLIGHT_ARSTORE_RUKOVODSTVO_POLQZOVA");
                                                    ?>
                                                    <? foreach ($manualsArray as $key => $manualData): ?>
                                                        <?
                                                        $number = '';
                                                        if (count($manualsArray) > 1) $number = ' ' . ($key + 1);
                                                        ?>
                                                        <a href="<?= $manualData['PATH'] ?>"
                                                           class="specifications__doc-item"
                                                           title="<?= $nameInstr ?> <?= $arResult['NAME'] ?><?= $number ?>"
                                                           download="<?= $nameInstr ?>_<?= $article ?><?= $number ?>"
                                                        >
                                                            <div class="card__file">
                                                                <div class="card__file-img">
                                                                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/pdf.svg" alt="">
                                                                </div>
                                                                <div class="card__file-title"><?= $nameInstr ?></div>
                                                            </div>
                                                        </a>
                                                    <? endforeach; ?>
                                                    <?php
                                                }
                                                ?>
                                                <? if ($arResult['PROPERTIES']['FILE_RECOMMENDATION_LETTER']['PATH']): ?>
                                                    <a href="<?= $arResult['PROPERTIES']['FILE_RECOMMENDATION_LETTER']['PATH'] ?>"
                                                       class="specifications__doc-item"
                                                       title="<?=GetMessage("ARLIGHT_ARSTORE_FAYL_RECOMMENDATION")?> <?= $arResult['NAME'] ?>"
                                                       download="<?=GetMessage("ARLIGHT_ARSTORE_FAYL_RECOMMENDATION1")?><?= $article?>"
                                                    >
                                                        <div class="card__file">
                                                            <div class="card__file-img">
                                                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/icon_rletter.svg" alt="">
                                                            </div>
                                                            <div class="card__file-title"><?=GetMessage("ARLIGHT_ARSTORE_FAYL_RECOMMENDATION")?></div>
                                                        </div>
                                                    </a>
                                                <? endif; ?>
                                                <? if ($arResult['PROPERTIES']['FILE_SOFTWARE']['PATH']): ?>
                                                    <a href="<?= $arResult['PROPERTIES']['FILE_SOFTWARE']['PATH'] ?>"
                                                       class="specifications__doc-item"
                                                       title="<?=GetMessage("ARLIGHT_ARSTORE_FAYL_PO")?><?= $arResult['NAME'] ?>"
                                                       download="<?=GetMessage("ARLIGHT_ARSTORE_FAYL_PO1")?><?= $article?>"
                                                    >
                                                        <div class="card__file">
                                                            <div class="card__file-img">
                                                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/icon_zip.svg" alt="">
                                                            </div>
                                                            <div class="card__file-title"><?=GetMessage("ARLIGHT_ARSTORE_FAYL_PO2")?></div>
                                                        </div>
                                                    </a>
                                                <? endif; ?>
                                                <? if ($arResult['PROPERTIES']['FILE_CONFIG']['PATH']): ?>
                                                    <a href="<?= $arResult['PROPERTIES']['FILE_CONFIG']['PATH'] ?>"
                                                       class="specifications__doc-item"
                                                       title="<?=GetMessage("ARLIGHT_ARSTORE_FAYL_KONFIGURACII")?><?= $arResult['NAME'] ?>"
                                                       download="<?=GetMessage("ARLIGHT_ARSTORE_FAYL_KONFIGURACII1")?><?= $article?>"
                                                    >
                                                        <div class="card__file">
                                                            <div class="card__file-img">
                                                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/icon_cnf.svg" alt="">
                                                            </div>
                                                            <div class="card__file-title"><?=GetMessage("ARLIGHT_ARSTORE_FAYL_KONFIGURACII2")?></div>
                                                        </div>
                                                    </a>
                                                <? endif; ?>
                                                <? if ($arResult['PROPERTIES']['FILE_3D']['PATH']): ?>
                                                    <a href="<?= $arResult['PROPERTIES']['FILE_3D']['PATH'] ?>"
                                                       class="specifications__doc-item"
                                                       title="3D <?= $arResult['NAME'] ?>"
                                                       download="3D_<?= $article ?>"
                                                    >
                                                        <div class="card__file">
                                                            <div class="card__file-img">
                                                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/icon_3d.svg" alt="">
                                                            </div>
                                                            <div class="card__file-title"><?=GetMessage("ARLIGHT_ARSTORE_MODELQ")?></div>
                                                        </div>
                                                    </a>
                                                <? endif; ?>
                                                <? if ($arResult['PROPERTIES']['FILE_IES']['PATH']): ?>
                                                    <a href="<?= $arResult['PROPERTIES']['FILE_IES']['PATH'] ?>"
                                                       class="specifications__doc-item"
                                                       title="<?=GetMessage("ARLIGHT_ARSTORE_FOTOMETRIA")?><?= $arResult['NAME'] ?>"
                                                       download="IES_<?= $article?>">
                                                        <div class="card__file">
                                                            <div class="card__file-img">
                                                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/icon_ies.svg" alt="">
                                                            </div>
                                                            <div class="card__file-title"><?=GetMessage("ARLIGHT_ARSTORE_FOTOMETRIA1")?></div>
                                                        </div>
                                                    </a>
                                                <? endif; ?>
                                                <? if ($arResult['PROPERTIES']['FILE_DIALUX']['PATH']): ?>
                                                    <a href="<?= $arResult['PROPERTIES']['FILE_DIALUX']['PATH'] ?>"
                                                       class="specifications__doc-item"
                                                       title="DIALux <?= $arResult['NAME'] ?>"
                                                       download="DIALux_<?= $article?>"
                                                    >
                                                        <div class="card__file">
                                                            <div class="card__file-img">
                                                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/icon_ldt.svg" alt="">
                                                            </div>
                                                            <div class="card__file-title">DIALux</div>
                                                        </div>
                                                    </a>
                                                <? endif; ?>

                                                <? if (isset($fileRevitPath)): ?>
                                                    <a href="<?= $fileRevitPath ?>"
                                                       class="specifications__doc-item"
                                                       title="Autodesk Revit <?= $arResult['NAME'] ?>"
                                                       download="Autodesk_Revit_<?= $article?>"
                                                    >
                                                        <div class="card__file">
                                                            <div class="card__file-img">
                                                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/icon_revit.svg" alt="Autodesk Revit">
                                                            </div>
                                                            <div class="card__file-title">Autodesk Revit</div>
                                                        </div>
                                                    </a>
                                                <? endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<? if ($arResult['PROPERTIES']['RELATED_PRODUCTS']['VALUE'] || $arResult['PROPERTIES']['ANALOGUES_PRODUCTS']['VALUE'] || $arResult['PROPERTIES']['ACCESSORIES']['VALUE']): ?>
    <div class="additional-goods--sliders <? if ($arResult['PROPERTIES']['RELATED_PRODUCTS']['VALUE'] && $arResult['PROPERTIES']['ACCESSORIES']['VALUE']): ?>additional-goods--tabs<?endif;?>" >
        <? if ($arResult['PROPERTIES']['RELATED_PRODUCTS']['VALUE'] && $arResult['PROPERTIES']['ACCESSORIES']['VALUE']): ?>
        <div class="additional-goods--tabs---title">
            <div class="title" data-href="accessories_goods"><?=GetMessage("ARLIGHT_ARSTORE_SOPUTSTVUUSIE_TOVARY")?></div>
            <div class="title" data-href="related_goods"><?=GetMessage("ARLIGHT_ARSTORE_AKSESSUARY")?></div>
        </div>
        <? endif; ?>
        <? if ($arResult['PROPERTIES']['ACCESSORIES']['VALUE']): ?>
            <div class="additional-goods" id="accessories_goods">
                <? if ($arResult['PROPERTIES']['ACCESSORIES']['VALUE'] && !$arResult['PROPERTIES']['RELATED_PRODUCTS']['VALUE']): ?>
                    <div class="title"><?=GetMessage("ARLIGHT_ARSTORE_SOPUTSTVUUSIE_TOVARY")?></div>
                <? endif; ?>
                <?php
                global $arAccesFilter;
                $arAccesFilter = array("ID" => $arResult['PROPERTIES']['ACCESSORIES']['VALUE']);
                $APPLICATION->IncludeComponent(
                    "bitrix:catalog.section",
                    "slider",
                    array(
                        "IBLOCK_TYPE" => "catalog",
                        "IBLOCK_ID" => CATALOG_ID,
                        "ELEMENT_SORT_FIELD" => "sort",
                        "ELEMENT_SORT_ORDER" => "asc",
                        "ELEMENT_SORT_FIELD2" => "id",
                        "ELEMENT_SORT_ORDER2" => "desc",
                        "PROPERTY_CODE" => array(
                            0 => "COLOR_HREF",
                            1 => "ARTICLE",
                            2 => "DEVELOPER",
                            3 => "CASE",
                            4 => "PACK",
                            5 => "UNIT",
                            6 => "COLOR_TITLE",
                            7 => "",
                        ),
                        "META_KEYWORDS" => "",
                        "META_DESCRIPTION" => "",
                        "BROWSER_TITLE" => "-",
                        "INCLUDE_SUBSECTIONS" => "N",
                        "SHOW_ALL_WO_SECTION" => "Y",
                        "BASKET_URL" => $arParams["BASKET_URL"],
                        "ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
                        "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
                        "SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
                        "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
                        "PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
                        "FILTER_NAME" => "arAccesFilter",
                        "USE_FILTER" => "Y",
                        "CACHE_TYPE" => "A",
                        "CACHE_TIME" => $arParams["CACHE_TIME"],
                        "CACHE_FILTER" => "Y",
                        "CACHE_GROUPS" => "N",
                        "SET_TITLE" => "N",
                        "SET_STATUS_404" => "N",
                        "DISPLAY_COMPARE" => "N",
                        "PAGE_ELEMENT_COUNT" => "100",
                        "LINE_ELEMENT_COUNT" => "1",
                        "PRICE_CODE" => array(
                        ),
                        "USE_PRICE_COUNT" => "N",
                        "SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
                        "PRICE_VAT_INCLUDE" => "Y",
                        "USE_PRODUCT_QUANTITY" => "Y",
                        "PRODUCT_PROPERTIES" => array(
                        ),
                        "DISPLAY_TOP_PAGER" => "N",
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        "PAGER_TITLE" => $arParams["PAGER_TITLE"],
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
                        "PAGER_SHOW_ALL" => "N",
                        "OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
                        "OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
                        "OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
                        "OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
                        "OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
                        "OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
                        "OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
                        "OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],
                        "SECTION_ID" => "",
                        "SECTION_CODE" => "",
                        "SECTION_URL" => SITE_DIR."catalog/#SECTION_CODE#/",
                        "DETAIL_URL" => SITE_DIR."catalog/product/#ELEMENT_CODE#/",
                        "CONVERT_CURRENCY" => "N",
                        "CURRENCY_ID" => $arParams["CURRENCY_ID"],
                        "HIDE_NOT_AVAILABLE" => "N",
                        "LABEL_PROP" => array(
                        ),
                        "ADD_PICT_PROP" => "-",
                        "PRODUCT_DISPLAY_MODE" => $arParams["PRODUCT_DISPLAY_MODE"],
                        "OFFER_ADD_PICT_PROP" => $arParams["OFFER_ADD_PICT_PROP"],
                        "OFFER_TREE_PROPS" => $arParams["OFFER_TREE_PROPS"],
                        "PRODUCT_SUBSCRIPTION" => "N",
                        "SHOW_DISCOUNT_PERCENT" => "N",
                        "SHOW_OLD_PRICE" => "N",
                        "MESS_BTN_BUY" => $arParams["MESS_BTN_BUY"],
                        "MESS_BTN_ADD_TO_BASKET" => $arParams["MESS_BTN_ADD_TO_BASKET"],
                        "MESS_BTN_SUBSCRIBE" => $arParams["MESS_BTN_SUBSCRIBE"],
                        "MESS_BTN_DETAIL" => $arParams["MESS_BTN_DETAIL"],
                        "MESS_NOT_AVAILABLE" => $arParams["MESS_NOT_AVAILABLE"],
                        "TEMPLATE_THEME" => (isset($arParams["TEMPLATE_THEME"])?$arParams["TEMPLATE_THEME"]:""),
                        "SECTION_USER_FIELDS" => array(
                            0 => "",
                            1 => "",
                        ),
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "AJAX_OPTION_HISTORY" => "N",
                        "SET_META_KEYWORDS" => "Y",
                        "SET_META_DESCRIPTION" => "Y",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "ADD_PROPERTIES_TO_BASKET" => "Y",
                        "PARTIAL_PRODUCT_PROPERTIES" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "COMPONENT_TEMPLATE" => "slider",
                        "HIDE_NOT_AVAILABLE_OFFERS" => "N",
                        "BACKGROUND_IMAGE" => "-",
                        "PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false}]",
                        "ENLARGE_PRODUCT" => "STRICT",
                        "PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
                        "SHOW_SLIDER" => "Y",
                        "SHOW_MAX_QUANTITY" => "N",
                        "SHOW_CLOSE_POPUP" => "N",
                        "RCM_TYPE" => "personal",
                        "RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
                        "SHOW_FROM_SECTION" => "N",
                        "SEF_MODE" => "N",
                        "SET_BROWSER_TITLE" => "Y",
                        "SET_LAST_MODIFIED" => "N",
                        "USE_MAIN_ELEMENT_SECTION" => "N",
                        "ADD_TO_BASKET_ACTION" => "ADD",
                        "USE_ENHANCED_ECOMMERCE" => "N",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "LAZY_LOAD" => "N",
                        "LOAD_ON_SCROLL" => "N",
                        "SHOW_404" => "N",
                        "MESSAGE_404" => "",
                        "COMPATIBLE_MODE" => "Y",
                        "DISABLE_INIT_JS_IN_COMPONENT" => "N",
                        "SLIDER_INTERVAL" => "3000",
                        "SLIDER_PROGRESS" => "N",
                        "PROPERTY_CODE_MOBILE" => array(
                        ),
                        "LABEL_PROP_MOBILE" => "",
                        "LABEL_PROP_POSITION" => "top-left"
                    ),
                    false
                );


                ?>
            </div>
        <? endif; ?>
        <? if ($arResult['PROPERTIES']['RELATED_PRODUCTS']['VALUE']): ?>
            <div class="additional-goods" id="related_goods">
                <? if (!$arResult['PROPERTIES']['ACCESSORIES']['VALUE'] && $arResult['PROPERTIES']['RELATED_PRODUCTS']['VALUE']): ?>
                    <div class="title"><?=GetMessage("ARLIGHT_ARSTORE_AKSESSUARY")?></div>
                <? endif; ?>
                <?php
                global $arRelatedFilter;
                $arRelatedFilter = array("ID" => $arResult['PROPERTIES']['RELATED_PRODUCTS']['VALUE']);
                $APPLICATION->IncludeComponent(
	"bitrix:catalog.section",
	"slider",
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => CATALOG_ID,
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER2" => "desc",
		"PROPERTY_CODE" => array(
			0 => "COLOR_HREF",
			1 => "ARTICLE",
			2 => "DEVELOPER",
			3 => "CASE",
			4 => "PACK",
			5 => "UNIT",
			6 => "COLOR_TITLE",
			7 => "",
		),
		"META_KEYWORDS" => "",
		"META_DESCRIPTION" => "",
		"BROWSER_TITLE" => "-",
		"INCLUDE_SUBSECTIONS" => "N",
		"SHOW_ALL_WO_SECTION" => "Y",
		"BASKET_URL" => $arParams["BASKET_URL"],
		"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
		"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
		"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
		"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
		"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
		"FILTER_NAME" => "arRelatedFilter",
		"USE_FILTER" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "N",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"DISPLAY_COMPARE" => "N",
		"PAGE_ELEMENT_COUNT" => "100",
		"LINE_ELEMENT_COUNT" => "1",
		"PRICE_CODE" => array(
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
		"PRICE_VAT_INCLUDE" => "Y",
		"USE_PRODUCT_QUANTITY" => "Y",
		"PRODUCT_PROPERTIES" => array(
		),
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => $arParams["PAGER_TITLE"],
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_SHOW_ALL" => "N",
		"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
		"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
		"OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
		"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
		"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
		"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
		"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
		"OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"SECTION_URL" => SITE_DIR."catalog/#SECTION_CODE#/",
		"DETAIL_URL" => SITE_DIR."catalog/product/#ELEMENT_CODE#/",
		"CONVERT_CURRENCY" => "N",
		"CURRENCY_ID" => $arParams["CURRENCY_ID"],
		"HIDE_NOT_AVAILABLE" => "N",
		"LABEL_PROP" => array(
		),
		"ADD_PICT_PROP" => "-",
		"PRODUCT_DISPLAY_MODE" => $arParams["PRODUCT_DISPLAY_MODE"],
		"OFFER_ADD_PICT_PROP" => $arParams["OFFER_ADD_PICT_PROP"],
		"OFFER_TREE_PROPS" => $arParams["OFFER_TREE_PROPS"],
		"PRODUCT_SUBSCRIPTION" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_OLD_PRICE" => "N",
		"MESS_BTN_BUY" => $arParams["MESS_BTN_BUY"],
		"MESS_BTN_ADD_TO_BASKET" => $arParams["MESS_BTN_ADD_TO_BASKET"],
		"MESS_BTN_SUBSCRIBE" => $arParams["MESS_BTN_SUBSCRIBE"],
		"MESS_BTN_DETAIL" => $arParams["MESS_BTN_DETAIL"],
		"MESS_NOT_AVAILABLE" => $arParams["MESS_NOT_AVAILABLE"],
		"TEMPLATE_THEME" => (isset($arParams["TEMPLATE_THEME"])?$arParams["TEMPLATE_THEME"]:""),
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "slider",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"BACKGROUND_IMAGE" => "-",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false}]",
		"ENLARGE_PRODUCT" => "STRICT",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"SHOW_SLIDER" => "Y",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_CLOSE_POPUP" => "N",
		"RCM_TYPE" => "personal",
		"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
		"SHOW_FROM_SECTION" => "N",
		"SEF_MODE" => "N",
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"ADD_TO_BASKET_ACTION" => "ADD",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"LAZY_LOAD" => "N",
		"LOAD_ON_SCROLL" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"COMPATIBLE_MODE" => "Y",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"SLIDER_INTERVAL" => "3000",
		"SLIDER_PROGRESS" => "N",
		"PROPERTY_CODE_MOBILE" => array(
		),
		"LABEL_PROP_MOBILE" => "",
		"LABEL_PROP_POSITION" => "top-left"
	),
	false
);


                ?>
            </div>
        <? endif; ?>
        <? if ($arResult['PROPERTIES']['ANALOGUES_PRODUCTS']['VALUE']): ?>
            <div class="additional-goods" id="analogues">
                <div class="title"><?=GetMessage("ARLIGHT_ARSTORE_ANALOGI")?></div>
                <?php
                global $arAnaloguesFilter;
                $arAnaloguesFilter = array("ID" => $arResult['PROPERTIES']['ANALOGUES_PRODUCTS']['VALUE']);
                $APPLICATION->IncludeComponent(
                    "bitrix:catalog.section",
                    "slider",
                    array(
                        "IBLOCK_TYPE" => "catalog",
                        "IBLOCK_ID" => CATALOG_ID,
                        "ELEMENT_SORT_FIELD" => "sort",
                        "ELEMENT_SORT_ORDER" => "asc",
                        "ELEMENT_SORT_FIELD2" => "id",
                        "ELEMENT_SORT_ORDER2" => "desc",
                        "PROPERTY_CODE" => array(
                            0 => "COLOR_HREF",
                            1 => "ARTICLE",
                            2 => "DEVELOPER",
                            3 => "CASE",
                            4 => "PACK",
                            5 => "UNIT",
                            6 => "COLOR_TITLE",
                        ),
                        "META_KEYWORDS" => "",
                        "META_DESCRIPTION" => "",
                        "BROWSER_TITLE" => "-",
                        "INCLUDE_SUBSECTIONS" => "N",
                        "SHOW_ALL_WO_SECTION" => "Y",
                        "BASKET_URL" => $arParams["BASKET_URL"],
                        "ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
                        "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
                        "SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
                        "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
                        "PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
                        "FILTER_NAME" => "arAnaloguesFilter",
                        "USE_FILTER" => "Y",
                        "CACHE_TYPE" => "A",
                        "CACHE_TIME" => $arParams["CACHE_TIME"],
                        "CACHE_FILTER" => "Y",
                        "CACHE_GROUPS" => "N",
                        "SET_TITLE" => "N",
                        "SET_STATUS_404" => "N",
                        "DISPLAY_COMPARE" => "N",
                        "PAGE_ELEMENT_COUNT" => "100",
                        "LINE_ELEMENT_COUNT" => "1",
                        "PRICE_CODE" => array(),
                        "USE_PRICE_COUNT" => "N",
                        "SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
                        "PRICE_VAT_INCLUDE" => "Y",
                        "USE_PRODUCT_QUANTITY" => "Y",
                        "PRODUCT_PROPERTIES" => array(),
                        "DISPLAY_TOP_PAGER" => "N",
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        "PAGER_TITLE" => $arParams["PAGER_TITLE"],
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
                        "PAGER_SHOW_ALL" => "N",
                        "OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
                        "OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
                        "OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
                        "OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
                        "OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
                        "OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
                        "OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
                        "OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],
                        "SECTION_ID" => "",
                        "SECTION_CODE" => "",
                        "SECTION_URL" => SITE_DIR . "catalog/#SECTION_CODE#/",
                        "DETAIL_URL" => SITE_DIR . "catalog/product/#ELEMENT_CODE#/",
                        "CONVERT_CURRENCY" => "N",
                        "CURRENCY_ID" => $arParams["CURRENCY_ID"],
                        "HIDE_NOT_AVAILABLE" => "N",
                        "LABEL_PROP" => array(),
                        "ADD_PICT_PROP" => "-",
                        "PRODUCT_DISPLAY_MODE" => $arParams["PRODUCT_DISPLAY_MODE"],
                        "OFFER_ADD_PICT_PROP" => $arParams["OFFER_ADD_PICT_PROP"],
                        "OFFER_TREE_PROPS" => $arParams["OFFER_TREE_PROPS"],
                        "PRODUCT_SUBSCRIPTION" => "N",
                        "SHOW_DISCOUNT_PERCENT" => "N",
                        "SHOW_OLD_PRICE" => "N",
                        "MESS_BTN_BUY" => $arParams["MESS_BTN_BUY"],
                        "MESS_BTN_ADD_TO_BASKET" => $arParams["MESS_BTN_ADD_TO_BASKET"],
                        "MESS_BTN_SUBSCRIBE" => $arParams["MESS_BTN_SUBSCRIBE"],
                        "MESS_BTN_DETAIL" => $arParams["MESS_BTN_DETAIL"],
                        "MESS_NOT_AVAILABLE" => $arParams["MESS_NOT_AVAILABLE"],
                        "TEMPLATE_THEME" => (isset($arParams["TEMPLATE_THEME"]) ? $arParams["TEMPLATE_THEME"] : ""),
                        "SECTION_USER_FIELDS" => array(
                            0 => "",
                            1 => "",
                        ),
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "AJAX_OPTION_HISTORY" => "N",
                        "SET_META_KEYWORDS" => "Y",
                        "SET_META_DESCRIPTION" => "Y",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "ADD_PROPERTIES_TO_BASKET" => "Y",
                        "PARTIAL_PRODUCT_PROPERTIES" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "COMPONENT_TEMPLATE" => "slider",
                        "HIDE_NOT_AVAILABLE_OFFERS" => "N",
                        "BACKGROUND_IMAGE" => "-",
                        "PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false}]",
                        "ENLARGE_PRODUCT" => "STRICT",
                        "PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
                        "SHOW_SLIDER" => "Y",
                        "SHOW_MAX_QUANTITY" => "N",
                        "SHOW_CLOSE_POPUP" => "N",
                        "RCM_TYPE" => "personal",
                        "RCM_PROD_ID" => '',
                        "SHOW_FROM_SECTION" => "N",
                        "SEF_MODE" => "N",
                        "SET_BROWSER_TITLE" => "Y",
                        "SET_LAST_MODIFIED" => "N",
                        "USE_MAIN_ELEMENT_SECTION" => "N",
                        "ADD_TO_BASKET_ACTION" => "ADD",
                        "USE_ENHANCED_ECOMMERCE" => "N",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "LAZY_LOAD" => "N",
                        "LOAD_ON_SCROLL" => "N",
                        "SHOW_404" => "N",
                        "MESSAGE_404" => "",
                        "COMPATIBLE_MODE" => "Y",
                        "DISABLE_INIT_JS_IN_COMPONENT" => "N",
                        "SLIDER_INTERVAL" => "3000",
                        "SLIDER_PROGRESS" => "N",
                        "PROPERTY_CODE_MOBILE" => array()
                    ),
                    false
                );


                ?>
            </div>
        <? endif; ?>
    </div>
<? endif; ?>
    <div class="container">
    <script>
        BX.message({
            ECONOMY_INFO_MESSAGE: '<?=GetMessageJS('CT_BCE_CATALOG_ECONOMY_INFO2')?>',
            TITLE_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_TITLE_ERROR')?>',
            TITLE_BASKET_PROPS: '<?=GetMessageJS('CT_BCE_CATALOG_TITLE_BASKET_PROPS')?>',
            BASKET_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_BASKET_UNKNOWN_ERROR')?>',
            BTN_SEND_PROPS: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_SEND_PROPS')?>',
            BTN_MESSAGE_BASKET_REDIRECT: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_BASKET_REDIRECT')?>',
            BTN_MESSAGE_CLOSE: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE')?>',
            BTN_MESSAGE_CLOSE_POPUP: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE_POPUP')?>',
            TITLE_SUCCESSFUL: '<?=GetMessageJS('CT_BCE_CATALOG_ADD_TO_BASKET_OK')?>',
            COMPARE_MESSAGE_OK: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_OK')?>',
            COMPARE_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_UNKNOWN_ERROR')?>',
            COMPARE_TITLE: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_TITLE')?>',
            BTN_MESSAGE_COMPARE_REDIRECT: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT')?>',
            PRODUCT_GIFT_LABEL: '<?=GetMessageJS('CT_BCE_CATALOG_PRODUCT_GIFT_LABEL')?>',
            PRICE_TOTAL_PREFIX: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_PRICE_TOTAL_PREFIX')?>',
            RELATIVE_QUANTITY_MANY: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY'])?>',
            RELATIVE_QUANTITY_FEW: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW'])?>',
            SITE_ID: '<?=$component->getSiteId()?>'
        });

        var <?=$obName?> = new JCCatalogElement(<?=CUtil::PhpToJSObject($jsParams, false, true)?>);
    </script>
<?
unset($actualItem, $itemIds, $jsParams);