<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $item
 * @var array $actualItem
 * @var array $minOffer
 * @var array $itemIds
 * @var array $price
 * @var array $measureRatio
 * @var bool $haveOffers
 * @var bool $showSubscribe
 * @var array $morePhoto
 * @var bool $showSlider
 * @var string $imgTitle
 * @var string $productTitle
 * @var string $buttonSizeClass
 * @var CatalogSectionComponent $component
 */

$stepActionsArr = [];
$pathToStepActions = $_SERVER['DOCUMENT_ROOT'] . SITE_DIR."assets/json/actionArticles.json";
if(file_exists($pathToStepActions) && !BELARUS && !KAZAKHSTAN) $stepActionsArr = json_decode(json_encode(json_decode(file_get_contents($pathToStepActions))), true);
$price = $item['PROPERTIES']['PRICE']['VALUE'];
$article = $item['PROPERTIES']['ARTICLE']['VALUE'];
if(isset($stepActionsArr[$article])){
    $discountPrice = $price;
}else{
    $discountPrice = WorkCart::getMyDiscount($price);
    $discountPrice = $discountPrice['PRICE'];
}
$productsWithComponents = [];
$productsWithComponentsPath = $_SERVER['DOCUMENT_ROOT']. SITE_DIR. 'assets/json/productsWithComponents.json';
if(file_exists($productsWithComponentsPath)){
    $productsWithComponents = json_decode(json_encode(json_decode(file_get_contents($productsWithComponentsPath))), true);
}


$priceOld = false;

if ($item['PROPERTIES']['PROMOTIONAL_PRICE']['VALUE'] && $item['PROPERTIES']['PROMOTIONAL']['VALUE'] && !BELARUS) {
    if ($price != $priceOld) {
        $priceOld = $item['PROPERTIES']['OLD_PRICE']['VALUE'];
    } else {
        $priceOld = false;
    }
    $discountPrice = $price;
}


$wh['stock_data'] = '';
$wh['value'] = $item['PROPERTIES']['STOCK_SUMMARY']['VALUE'];

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
$titleDownload = str_replace('.', ',', str_replace(['_', '~', '#', '%', '&', '*', '{', '}', '\\', '|', '/', ':', ';', '"', '\'', '+', '=', '&', '!', '@', '<', '>', '[', ']'], '', $productTitle));

global $simpleSale;
$simpleSaleProduct = false;
if ($simpleSale && isset($simpleSale[$article])) $simpleSaleProduct = true;

global $simpleNew;
$simpleNew = (file_exists($_SERVER['DOCUMENT_ROOT'] . SITE_DIR . 'assets/json/new_now_articles.json')) ? json_decode(json_encode(json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . SITE_DIR . 'assets/json/new_now_articles.json'))), true) : false;
$simpleNewProduct = false;
if ($simpleNew && isset($simpleNew[$article])) $simpleNewProduct = true;
?>
<div class="item__img">
    <div class="item__img-wrap">
        <a href="<?= $item['DETAIL_PAGE_URL'] ?>" title="<?= $productTitle ?>" class="item__img-link"
           id="<?= $itemIds['PICT'] ?>">
            <?
            $imgSrc = SITE_TEMPLATE_PATH . '/img/not-img.jpg';
            if ($item['PREVIEW_PICTURE']['ID'])
                $imgSrc = ALResizeWatermark($item['PREVIEW_PICTURE']['ID'], 315);
            ?>
            <img src="<?= $imgSrc ?>" itemprop="image" alt="<?= $productTitle ?>">
        </a>
    </div>
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
</div>
<div class="item__main">
    <div class="item__info">
        <div class="item__colors">
            <? if ($item['PROPERTIES']['COLOR_TITLE']['VALUE']): ?>
                <div class="item__colors-tooltip"><span><?= $item['DISPLAY_PROPERTIES']['COLOR_TITLE']['VALUE'] ?></span></div>
            <? endif; ?>
            <? if ($item['DISPLAY_PROPERTIES']['COLOR_HREF']['VALUE']): ?>
                <? $COLOR = $item['DISPLAY_PROPERTIES']['COLOR_HREF']['VALUE'];
                $arColors = ALColor2($COLOR);
                foreach ($arColors as $colorItem): ?>
                    <div class="color color--radial color--indent-left"
                        <? if ($colorItem): ?>
                            style="background:<?= $colorItem ?>"
                        <? endif; ?>
                         title=""></div>
                <? endforeach; ?>
            <? endif; ?>
        </div>
        <a href="<?= $item['DETAIL_PAGE_URL'] ?>" title="<?= $productTitle ?>" class="item__vendor">
            <?= $article ?>
        </a>
        <div class="item__name" itemprop="name">
            <a href="<?= $item['DETAIL_PAGE_URL'] ?>" title="<?= $productTitle ?>"><span><?= $productTitle ?></span></a>
        </div>
        <div class="item__description text-wrap" itemprop="description">
            <p><?= $item['DISPLAY_PROPERTIES']['DESCRIPTION']['VALUE'] ?></p>
        </div>
    </div>
    <div class="item__sale">
        <? if ($item['PROPERTIES']['OBSOLETE']['VALUE'] == '-1'): ?>
            <div class="item__sale-block">
                <div class="item__archive-text">
                    <span class="item__archive-text-title"><?=GetMessage("ARLIGHT_ARSTORE_TOVAR_V_ARHIVE")?></span>
                    <span><?=GetMessage("ARLIGHT_ARSTORE_NEDOSTUPEN_DLA_ZAKAZ")?></span>
                </div>
            </div>
        <? else: ?>
            <div class="item__sale-block <? if ($discountPrice || $priceOld): ?>two-price<? endif; ?>" itemprop="offers" itemscope
                 itemtype="http://schema.org/Offer">
                <div class="item__sale-price">
                    <span class="item__sale-price-text">
                         <? if ($price): ?>
                             <span class="<? if ($discountPrice || $priceOld): ?>old-price<? endif; ?>">
                                 <?
                                 $priceValue = $price;
                                 if ($priceOld) $priceValue = $priceOld;
                                 PriceFormat($priceValue);
                                 ?>
                                 <span class="unit">
                                 <?= CURRENCY; ?>/<?= $item['PROPERTIES']['UNIT']['VALUE'] ?>
                                 </span>
                            </span>
                         <? endif; ?>
                        <? if ($discountPrice || $priceOld): ?>
                            <span class="new-price">
                                <?
                                $discountPriceValue = $discountPrice;
                                if ($priceOld && !$discountPrice) $discountPriceValue = $price;
                                PriceFormat($discountPriceValue) ?>
                                <span class="unit">
                                <?= CURRENCY; ?>/<?=$item['PROPERTIES']['UNIT']['VALUE']?>
                                </span>
                                <? if (isset($stepActionsArr[$article])): ?>*<? endif; ?>
                                <? if (isset($stepActionsArr[$article])): ?><i style="white-space: nowrap;">* <?=GetMessage("ARLIGHT_ARSTORE_CENA_PRI_POKUPKE_OT")?><?= $stepActionsArr[$article]; ?> <?= $item['PROPERTIES']['UNIT']['VALUE'] ?></i><? endif; ?>
                            </span>
                        <? endif; ?>
                    </span>
                    <meta itemprop="price" content="<?= ($discountPrice) ? $discountPrice : $price ?>">
                    <meta itemprop="priceCurrency" content="<?= $item['PROPERTIES']['CURRENCY']['VALUE'] ?>">
                </div>
                <div class="item__sale-stock">
                    <?
                    $stock = '';
                    if (CSite::InGroup(array(GR_SADM_ID, GR_ADM_ID)) || (SHOW_STOCK && $USER->IsAuthorized())) {
                        if ($item['PROPERTIES']['STOCK_QNT']['VALUE'] > 0)
                            $stock = $item['PROPERTIES']['STOCK_QNT']['VALUE'] . ' ' . $item['PROPERTIES']['UNIT']['VALUE'];
                    }
                    ?>
                    <? if($wh['value'] == GetMessage("ARLIGHT_ARSTORE_SBORKA")): ?>
                        <div class="item__stock tooltip_status" data-stock="<?= $wh['stock_data'] ?>" title="<?= STATUS_TOOLTIP ?>" style="cursor: help;"><?= $wh['value'] ?>  <?=$stock?></div>
                    <? else: ?>
                        <div class="item__stock" data-stock="<?= $wh['stock_data'] ?>" title="<?= $wh['value'] ?>"><?= $wh['value'] ?>  <?=$stock?></div>
                    <? endif; ?>

                    <? if ($wh['stock_data'] == 'available'): ?>
                        <link itemprop="availability" href="http://schema.org/InStock">
                    <? endif; ?>
                </div>
            </div>
        <? endif; ?>

        <? if ($item['PROPERTIES']['OBSOLETE']['VALUE'] !== '-1'): ?>
            <form class="buy-block" data-type="cart" data-slug="BUY_BLOCK">
                <div class="item__buy-block-accept" data-slug="ACCEPT_BUY">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/accept-desktop.svg" alt="">
                </div>

                <? if (BLOCKING != 'true'): ?>
                    <div class="buy-block__wrap">
                        <div class="buy-block__items">
                            <button class="buy-block__button">-</button>
                            <input type="text" class="buy-block__input" name="quantity"
                                   value="0"
                                   maxlength="18"
                                   data-type="input" data-price=""
                                   data-packnorm="<? if ($item['PROPERTIES']['PACKNORM']['VALUE']): ?><?= $item['PROPERTIES']['PACKNORM']['VALUE'] ?><? else: ?>1<? endif; ?>"
                                   data-slug="QUANTITY"
                                   autocomplete="off"
                            >
                            <button class="buy-block__button">+</button>
                        </div>
                        <div class="buy-block__item-packnorm">
                            <? if ($item['PROPERTIES']['PACK']['VALUE'] && $item['PROPERTIES']['PACKNORM']['VALUE']): ?>
                                <? $pack = $item['PROPERTIES']['PACK']['VALUE'];
                                echo($pack === '-' ? GetMessage("ARLIGHT_ARSTORE_ED_IZM") : $pack)
                                ?>
                                : <?= $item['PROPERTIES']['PACKNORM']['VALUE'] ?> <?= $item['PROPERTIES']['UNIT']['VALUE'] ?>
                            <? endif; ?>
                        </div>
                    </div>
                <? endif; ?>
                <div class="buy-block__button-wrap">
                    <? //Для активной кнопки - in_cart?>
                    <a class="buy-block__button buy-block__button--compare" href="#" data-id="<?= $item['ID'] ?>"
                       data-slug="ADD_TO_COMPARE" title="<?=GetMessage("ARLIGHT_ARSTORE_SRAVNENIE")?>">
                        <i class="icon-ar_head_vs"></i>
                    </a>
                    <? //Для активной кнопки скриптом добавится класс in_cart, который может использоваться для подсветки активного элемента?>
                    <a class="buy-block__button buy-block__button--favorite" href="#" data-id="<?= $item['ID'] ?>"
                       data-slug="ADD_TO_FAVORITE" title="<?=GetMessage("ARLIGHT_ARSTORE_IZBRANNOE")?>">
                        <i class="icon-ar_head_fav"></i>
                    </a>
                    <? if (BLOCKING != 'true'): ?>
                        <a class="buy-block__button buy-block__button--submit"
                           data-empty="<?=GetMessage("ARLIGHT_ARSTORE_V_KORZINU")?>"
                           data-sendorder="<?=GetMessage("ARLIGHT_ARSTORE_OFORMITQ")?>"
                           href="javascript:void(0);"
                           data-id="<?= $item['ID'] ?>"
                           data-url="<?= $item['DETAIL_PAGE_URL'] ?>"
                           data-slug="ADD_TO_CART"><?=GetMessage("ARLIGHT_ARSTORE_V_KORZINU")?></a>
                    <? endif; ?>
                </div>
            </form>
        <? endif; ?>
    </div>
    <div class="item__file">
        <?php if ($item['PROPERTIES']['INSTRUCTION']['VALUE']) {
            $item['PROPERTIES']['INSTRUCTION']['PATH'] = CFile::GetPath($item['PROPERTIES']['INSTRUCTION']['VALUE']); ?>
            <div class="item__file-wrap">
                <a href="<?= $item['PROPERTIES']['INSTRUCTION']['PATH'] ?>" class="item__file-link"
                   target="_blank" rel="nofollow, noindex"
                   download="<?=GetMessage("ARLIGHT_ARSTORE_INSTRUKCIA_K_TOVARU")?><?= $titleDownload; ?>">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/img/pdf.svg"
                         alt="PDF <?=GetMessage("ARLIGHT_ARSTORE_FAYL")?>" class="item__file-image">
                    <span class="item__file-text"><?=GetMessage("ARLIGHT_ARSTORE_INSTRUKCIA")?></span>
                </a>
            </div>
        <?php } ?>
    </div>
</div>



