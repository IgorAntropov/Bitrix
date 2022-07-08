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

$price = $item['PROPERTIES']['PRICE']['VALUE'];
$article = $item['PROPERTIES']['ARTICLE']['VALUE'];
global $simpleSale;
$simpleSaleProduct = false;
if ($simpleSale && isset($simpleSale[$article])) $simpleSaleProduct = true;
$imgSrc = SITE_TEMPLATE_PATH .'/img/not_img.png';
if($item['PREVIEW_PICTURE']['ID'])
    $imgSrc = ALResizeWatermark($item['PREVIEW_PICTURE']['ID'], 340);

global $simpleNew;
$simpleNew = (file_exists($_SERVER['DOCUMENT_ROOT'] . SITE_DIR . 'assets/json/new_now_articles.json')) ? json_decode(json_encode(json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . SITE_DIR . 'assets/json/new_now_articles.json'))), true) : false;
$simpleNewProduct = false;
if ($simpleNew && isset($simpleNew[$article])) $simpleNewProduct = true;

?>

<div class="additional-goods__item">
    <a href="<?= $item['DETAIL_PAGE_URL'] ?>" class="additional-goods__img">
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
        <img src="<?= $imgSrc ?>" alt="<?= $productTitle ?>">
        <div class="additional-goods__color">
            <? if ($item['DISPLAY_PROPERTIES']['COLOR_TITLE']['VALUE']): ?>
                <div class="item__colors-tooltip">
                    <span><?= $item['DISPLAY_PROPERTIES']['COLOR_TITLE']['VALUE'] ?></span>
                </div>
            <? endif; ?>
            <?if($item['DISPLAY_PROPERTIES']['COLOR_HREF']['VALUE']):?>
            <? $COLOR = $item['DISPLAY_PROPERTIES']['COLOR_HREF']['VALUE'];
            $arColors = ALColor2($COLOR);
            foreach ($arColors as $colorItem): ?>
            <div class="color color--radial color--indent-left"
                <? if ($colorItem): ?>
                    style="background:<?=$colorItem?>"
                <? endif; ?>
                 title=""></div>
            <? endforeach; ?>
            <?endif;?>
        </div>
    </a>
    <a href="<?= $item['DETAIL_PAGE_URL'] ?>" class="additional-goods__art"
       title="<?= $productTitle ?>"><?= $article ?></a>
    <a href="<?= $item['DETAIL_PAGE_URL'] ?>" class="additional-goods__title"><?= $productTitle ?></a>
    <? if ($price): ?>
        <div class="additional-goods__price">
            <? PriceFormat($price) ?>
            <?= CURRENCY; ?>/<?= $item['PROPERTIES']['UNIT']['VALUE'] ?>
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
                    <?
                    $yaMetrica = '';
                    global $goalCurrent;
                    if ($goalCurrent['add-to-cart']['name'] && $goalCurrent['add-to-cart']['id'])
                        $yaMetrica = 'onclick="ym(' . $goalCurrent['add-to-cart']['id'] . ', \'reachGoal\', \'' . $goalCurrent['add-to-cart']['name'] . '\'); return true;"';
                    ?>
                    <a class="buy-block__button buy-block__button--favorite"
                       data-empty="<?=GetMessage("ARLIGHT_ARSTORE_V_KORZINU")?>"
                       data-sendorder="<?=GetMessage("ARLIGHT_ARSTORE_OFORMITQ")?>"
                       href="javascript:void(0);"
                       data-id="<?= $item['ID'] ?>"
                       data-url="<?= $item['DETAIL_PAGE_URL'] ?>"
                       data-slug="ADD_TO_CART"
                        <?= $yaMetrica; ?>
                    >
                        <i class="icon-cart-empty"></i>
                    </a>
                <? endif; ?>

            </div>
        </form>
    <? endif; ?>
</div>
