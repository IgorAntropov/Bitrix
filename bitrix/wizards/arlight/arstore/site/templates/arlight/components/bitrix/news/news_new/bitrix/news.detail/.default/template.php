<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var array $templateData */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$like = $arResult['PROPERTIES']['LIKE']['VALUE'];
$dislike = $arResult['PROPERTIES']['DISLIKE']['VALUE'];
global $arFilterForLastNews;
$isBrand = $arResult['PROPERTIES']['TYPE_NEWS']['VALUE_XML_ID'] == 'brand_news';

?>
<div class="content content--block news-detail news-detail--new" itemscope itemtype="http://schema.org/NewsArticle">
    <meta itemprop="description" content="<?= strip_tags($arResult['PREVIEW_TEXT']) ?>">
    <meta itemprop="datePublished" content="<? $date = date_create($arResult['ACTIVE_FROM']);
    echo date_format($date, 'Y-m-d'); ?>">
    <? if(!$isBrand) :?>
        <div class="row">
            <div class="col-lg-9">
                <div class="title title-page">
                    <div class="title__date"><?= GetMessage("ARLIGHT_ARSTORE_NOVOSTQ") ?><?= $arResult['ACTIVE_FROM'] ?></div>
                    <div class="title__text" itemprop="headline"><h1><?= $arResult["NAME"] ?></h1></div>
                </div>
                <div>
                    <? if ($arResult['DISPLAY_PROPERTIES']['PICTURES']): ?>
                        <? $arImg = $arResult['DISPLAY_PROPERTIES']['PICTURES']['FILE_VALUE']; ?>
                        <div class="content__slider">
                            <? foreach ($arImg as $img) : ?>
                                <div class="slide">
                                    <div class="slide__img">
                                        <a href="<?= $img['SRC'] ?>" data-fancybox="gallery">
                                            <img src="<?= $img['SRC'] ?>" alt="">
                                        </a>
                                    </div>
                                </div>
                            <? endforeach; ?>
                        </div>
                        <div class="content__slider-nav">
                            <? foreach ($arImg as $img) : ?>
                                <div class="slide">
                                    <div class="slide__img">
                                        <img src="<?= ALResize($img, 90) ?>" alt="">
                                    </div>
                                </div>
                            <? endforeach; ?>
                        </div>
                    <? endif; ?>

                    <? if ($arResult['DISPLAY_PROPERTIES']['VIDEO_ON_YOUTUBE']): ?>
                        <div class="content__video">
                            <div class="js-player" data-plyr-provider="youtube"
                                 data-plyr-embed-id="<?= $arResult['DISPLAY_PROPERTIES']['VIDEO_ON_YOUTUBE']['VALUE'] ?>"></div>
                        </div>
                    <? endif; ?>

                    <div class="content__text" itemprop="articleBody">
                        <? echo $arResult["DETAIL_TEXT"]; ?>
                    </div>
                    <div class="row align-items-center news__socblock">
                        <div class="col-sm-4">
                            <div class="like-block" data-newsId="<?= $arResult['ID'] ?>"
                                 data-iblock="<?= $arResult['IBLOCK_ID'] ?>">
                                <div class="like-block__item like-link"
                                     title="<?= GetMessage("ARLIGHT_ARSTORE_NRAVITSA") ?>" data-like="like">
                                    <i class="icon-ar-like"></i>
                                    <span class="like-block__txt" id="like_<?= $arResult['ID'] ?>"><?= $like ?></span>
                                </div>
                                <div class="like-block__item like-link"
                                     title="<?= GetMessage("ARLIGHT_ARSTORE_NE_NRAVITSA") ?>" data-like="dislike">
                                    <i class="icon-ar-dislike"></i>
                                    <span class="like-block__txt"
                                          id="dislike_<?= $arResult['ID'] ?>"><?= $dislike ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <? //share?>
                            <script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                            <script src="//yastatic.net/share2/share.js"></script>
                            <div class="news__share">
                                <span class="news__share-text"><?= GetMessage("ARLIGHT_ARSTORE_PODELITQSA") ?></span>
                                <div class="ya-share2"
                                    <? $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
                                    $url = $protocol . $_SERVER['HTTP_HOST'] ?>
                                     data-image="<?= $url . ALResize($arResult['PREVIEW_PICTURE']['ID'], 350) ?>"
                                     data-description="<?= strip_tags($arResult['PREVIEW_TEXT']) ?>"
                                     data-services="facebook,vkontakte,gplus,twitter,viber,whatsapp,telegram"></div>
                            </div>
                            <? //share?>
                        </div>
                    </div>

                </div>


                <? if ($arResult['PROPERTIES']['PRODUCTS']['VALUE'] || $arResult['PROPERTIES']['PRODUCTS_ART']['VALUE']): ?>
                    <div class="additional-goods">
                        <div class="title"><?= GetMessage("ARLIGHT_ARSTORE_SVAZANNYE_TOVARY") ?></div>
                        <?php
                        global $arRelList;
                        $arRelList = [
                            [
                                "LOGIC" => "OR",
                                "ID" => $arResult['PROPERTIES']['PRODUCTS']['VALUE'],
                                "PROPERTY_ARTICLE" => $arResult['PROPERTIES']['PRODUCTS_ART']['VALUE'],
                            ]];
                        $APPLICATION->IncludeComponent(
                            "bitrix:catalog.section",
                            "slider3",
                            array(
                                "IBLOCK_TYPE" => "catalog",
                                "IBLOCK_ID" => CATALOG_ID,
                                "ELEMENT_SORT_FIELD" => "sort",
                                "ELEMENT_SORT_ORDER" => "asc",
                                "ELEMENT_SORT_FIELD2" => "id",
                                "ELEMENT_SORT_ORDER2" => "desc",
                                "PROPERTY_CODE" => array(
                                    0 => "ARTICLE",
                                    1 => "DEVELOPER",
                                    2 => "CASE",
                                    3 => "PACK",
                                    4 => "UNIT",
                                    5 => "",
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
                                "FILTER_NAME" => "arRelList",
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
                                "COMPONENT_TEMPLATE" => "slider3",
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
                                "CUSTOM_FILTER" => "",
                                "PROPERTY_CODE_MOBILE" => array(),
                                "LABEL_PROP_MOBILE" => "",
                                "LABEL_PROP_POSITION" => "top-left"
                            ),
                            false
                        );
                        ?>
                    </div>
                <? endif; ?>
            </div>
            <div class="col-lg-3 mt-xl-30">
                <div class="news-detail__sidebar">
                    <? if ($arResult['IBLOCK_ID'] == NEWS_ID): ?>
                        <div class="title title--content"><?= GetMessage("ARLIGHT_ARSTORE_POSLEDNIE_NOVOSTI") ?></div>
                        <div class="news-last">
                            <? $APPLICATION->IncludeComponent("bitrix:news.list", "last-news", array(
                                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                "ADD_SECTIONS_CHAIN" => "N",
                                "AJAX_MODE" => "N",
                                "AJAX_OPTION_ADDITIONAL" => "",
                                "AJAX_OPTION_HISTORY" => "N",
                                "AJAX_OPTION_JUMP" => "N",
                                "AJAX_OPTION_STYLE" => "Y",
                                "CACHE_FILTER" => "N",
                                "CACHE_GROUPS" => "Y",
                                "CACHE_TIME" => "36000000",
                                "CACHE_TYPE" => "A",
                                "CHECK_DATES" => "Y",
                                "DETAIL_URL" => "",
                                "DISPLAY_BOTTOM_PAGER" => "N",
                                "DISPLAY_DATE" => "N",
                                "DISPLAY_NAME" => "Y",
                                "DISPLAY_PICTURE" => "N",
                                "DISPLAY_PREVIEW_TEXT" => "N",
                                "DISPLAY_TOP_PAGER" => "N",
                                "FIELD_CODE" => array(
                                    0 => "",
                                    1 => "",
                                ),
                                "FILTER_NAME" => "arFilterForLastNews",
                                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                "IBLOCK_ID" => NEWS_ID,
                                "IBLOCK_TYPE" => "content",
                                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                "INCLUDE_SUBSECTIONS" => "Y",
                                "MESSAGE_404" => "",
                                "NEWS_COUNT" => "3",
                                "PAGER_BASE_LINK_ENABLE" => "N",
                                "PAGER_DESC_NUMBERING" => "N",
                                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                "PAGER_SHOW_ALL" => "N",
                                "PAGER_SHOW_ALWAYS" => "N",
                                "PAGER_TEMPLATE" => ".default",
                                "PAGER_TITLE" => GetMessage("ARLIGHT_ARSTORE_SLAYDER"),
                                "PARENT_SECTION" => "",
                                "PARENT_SECTION_CODE" => "",
                                "PREVIEW_TRUNCATE_LEN" => "",
                                "PROPERTY_CODE" => array(
                                    0 => "",
                                    1 => "LINK",
                                    2 => "",
                                ),
                                "SET_BROWSER_TITLE" => "N",
                                "SET_LAST_MODIFIED" => "N",
                                "SET_META_DESCRIPTION" => "N",
                                "SET_META_KEYWORDS" => "N",
                                "SET_STATUS_404" => "N",
                                "SET_TITLE" => "N",
                                "SHOW_404" => "N",
                                "SORT_BY1" => "ACTIVE_FROM",
                                "SORT_BY2" => "SORT",
                                "SORT_ORDER1" => "DESC",
                                "SORT_ORDER2" => "ASC",
                                "STRICT_SECTION_CHECK" => "N",
                                "COMPONENT_TEMPLATE" => "slider-main"
                            ),
                                false
                            ); ?>
                        </div>
                    <? endif; ?>
                    <? if ($arResult['IBLOCK_ID'] == PROJECTS_ID): ?>
                        <div class="title title--content"><?= GetMessage("ARLIGHT_ARSTORE_POSLEDNIE_PROEKTY") ?></div>
                        <div class="news-last">
                            <? $APPLICATION->IncludeComponent(
                                "bitrix:news.list",
                                "last-news",
                                array(
                                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                    "ADD_SECTIONS_CHAIN" => "N",
                                    "AJAX_MODE" => "N",
                                    "AJAX_OPTION_ADDITIONAL" => "",
                                    "AJAX_OPTION_HISTORY" => "N",
                                    "AJAX_OPTION_JUMP" => "N",
                                    "AJAX_OPTION_STYLE" => "Y",
                                    "CACHE_FILTER" => "N",
                                    "CACHE_GROUPS" => "Y",
                                    "CACHE_TIME" => "36000000",
                                    "CACHE_TYPE" => "A",
                                    "CHECK_DATES" => "Y",
                                    "DETAIL_URL" => "",
                                    "DISPLAY_BOTTOM_PAGER" => "N",
                                    "DISPLAY_DATE" => "N",
                                    "DISPLAY_NAME" => "Y",
                                    "DISPLAY_PICTURE" => "N",
                                    "DISPLAY_PREVIEW_TEXT" => "N",
                                    "DISPLAY_TOP_PAGER" => "N",
                                    "FIELD_CODE" => array(
                                        0 => "",
                                        1 => "",
                                    ),
                                    "FILTER_NAME" => "arFilterForLastNews",
                                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                    "IBLOCK_ID" => PROJECTS_ID,
                                    "IBLOCK_TYPE" => "content",
                                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                    "INCLUDE_SUBSECTIONS" => "Y",
                                    "MESSAGE_404" => "",
                                    "NEWS_COUNT" => "3",
                                    "PAGER_BASE_LINK_ENABLE" => "N",
                                    "PAGER_DESC_NUMBERING" => "N",
                                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                    "PAGER_SHOW_ALL" => "N",
                                    "PAGER_SHOW_ALWAYS" => "N",
                                    "PAGER_TEMPLATE" => ".default",
                                    "PAGER_TITLE" => GetMessage("ARLIGHT_ARSTORE_SLAYDER"),
                                    "PARENT_SECTION" => "",
                                    "PARENT_SECTION_CODE" => "",
                                    "PREVIEW_TRUNCATE_LEN" => "",
                                    "PROPERTY_CODE" => array(
                                        0 => "",
                                        1 => "LINK",
                                        2 => "",
                                    ),
                                    "SET_BROWSER_TITLE" => "N",
                                    "SET_LAST_MODIFIED" => "N",
                                    "SET_META_DESCRIPTION" => "N",
                                    "SET_META_KEYWORDS" => "N",
                                    "SET_STATUS_404" => "N",
                                    "SET_TITLE" => "N",
                                    "SHOW_404" => "N",
                                    "SORT_BY1" => "ACTIVE_FROM",
                                    "SORT_BY2" => "SORT",
                                    "SORT_ORDER1" => "DESC",
                                    "SORT_ORDER2" => "ASC",
                                    "STRICT_SECTION_CHECK" => "N",
                                    "COMPONENT_TEMPLATE" => "last-news"
                                ),
                                false
                            ); ?>
                        </div>
                    <? endif; ?>

                    <? if ($arResult['IBLOCK_ID'] == ARTICLES_ID): ?>
                        <div class="title title--content"><?= GetMessage("ARLIGHT_ARSTORE_POSLEDNIE_STATQI") ?></div>
                        <div class="news-last">
                            <? $APPLICATION->IncludeComponent(
                                "bitrix:news.list",
                                "last-news",
                                array(
                                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                    "ADD_SECTIONS_CHAIN" => "N",
                                    "AJAX_MODE" => "N",
                                    "AJAX_OPTION_ADDITIONAL" => "",
                                    "AJAX_OPTION_HISTORY" => "N",
                                    "AJAX_OPTION_JUMP" => "N",
                                    "AJAX_OPTION_STYLE" => "Y",
                                    "CACHE_FILTER" => "N",
                                    "CACHE_GROUPS" => "Y",
                                    "CACHE_TIME" => "36000000",
                                    "CACHE_TYPE" => "A",
                                    "CHECK_DATES" => "Y",
                                    "DETAIL_URL" => "",
                                    "DISPLAY_BOTTOM_PAGER" => "N",
                                    "DISPLAY_DATE" => "N",
                                    "DISPLAY_NAME" => "Y",
                                    "DISPLAY_PICTURE" => "N",
                                    "DISPLAY_PREVIEW_TEXT" => "N",
                                    "DISPLAY_TOP_PAGER" => "N",
                                    "FIELD_CODE" => array(
                                        0 => "",
                                        1 => "",
                                    ),
                                    "FILTER_NAME" => "arFilterForLastNews",
                                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                    "IBLOCK_ID" => ARTICLES_ID,
                                    "IBLOCK_TYPE" => "content",
                                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                    "INCLUDE_SUBSECTIONS" => "Y",
                                    "MESSAGE_404" => "",
                                    "NEWS_COUNT" => "3",
                                    "PAGER_BASE_LINK_ENABLE" => "N",
                                    "PAGER_DESC_NUMBERING" => "N",
                                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                    "PAGER_SHOW_ALL" => "N",
                                    "PAGER_SHOW_ALWAYS" => "N",
                                    "PAGER_TEMPLATE" => ".default",
                                    "PAGER_TITLE" => GetMessage("ARLIGHT_ARSTORE_SLAYDER"),
                                    "PARENT_SECTION" => "",
                                    "PARENT_SECTION_CODE" => "",
                                    "PREVIEW_TRUNCATE_LEN" => "",
                                    "PROPERTY_CODE" => array(
                                        0 => "",
                                        1 => "LINK",
                                        2 => "",
                                    ),
                                    "SET_BROWSER_TITLE" => "N",
                                    "SET_LAST_MODIFIED" => "N",
                                    "SET_META_DESCRIPTION" => "N",
                                    "SET_META_KEYWORDS" => "N",
                                    "SET_STATUS_404" => "N",
                                    "SET_TITLE" => "N",
                                    "SHOW_404" => "N",
                                    "SORT_BY1" => "ACTIVE_FROM",
                                    "SORT_BY2" => "SORT",
                                    "SORT_ORDER1" => "DESC",
                                    "SORT_ORDER2" => "ASC",
                                    "STRICT_SECTION_CHECK" => "N",
                                    "COMPONENT_TEMPLATE" => "last-news"
                                ),
                                false
                            ); ?>
                        </div>
                    <? endif; ?>

                    <? if ($arResult['IBLOCK_ID'] == VIDEO_ID): ?>
                        <div class="title title--content"><?= GetMessage("ARLIGHT_ARSTORE_POSLEDNIE_VIDEO") ?></div>
                        <div class="news-last">
                            <? $APPLICATION->IncludeComponent(
                                "bitrix:news.list",
                                "last-news",
                                array(
                                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                    "ADD_SECTIONS_CHAIN" => "N",
                                    "AJAX_MODE" => "N",
                                    "AJAX_OPTION_ADDITIONAL" => "",
                                    "AJAX_OPTION_HISTORY" => "N",
                                    "AJAX_OPTION_JUMP" => "N",
                                    "AJAX_OPTION_STYLE" => "Y",
                                    "CACHE_FILTER" => "N",
                                    "CACHE_GROUPS" => "Y",
                                    "CACHE_TIME" => "36000000",
                                    "CACHE_TYPE" => "A",
                                    "CHECK_DATES" => "Y",
                                    "DETAIL_URL" => "",
                                    "DISPLAY_BOTTOM_PAGER" => "N",
                                    "DISPLAY_DATE" => "N",
                                    "DISPLAY_NAME" => "Y",
                                    "DISPLAY_PICTURE" => "N",
                                    "DISPLAY_PREVIEW_TEXT" => "N",
                                    "DISPLAY_TOP_PAGER" => "N",
                                    "FIELD_CODE" => array(
                                        0 => "",
                                        1 => "",
                                    ),
                                    "FILTER_NAME" => "arFilterForLastNews",
                                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                    "IBLOCK_ID" => VIDEO_ID,
                                    "IBLOCK_TYPE" => "content",
                                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                    "INCLUDE_SUBSECTIONS" => "Y",
                                    "MESSAGE_404" => "",
                                    "NEWS_COUNT" => "3",
                                    "PAGER_BASE_LINK_ENABLE" => "N",
                                    "PAGER_DESC_NUMBERING" => "N",
                                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                    "PAGER_SHOW_ALL" => "N",
                                    "PAGER_SHOW_ALWAYS" => "N",
                                    "PAGER_TEMPLATE" => ".default",
                                    "PAGER_TITLE" => GetMessage("ARLIGHT_ARSTORE_SLAYDER"),
                                    "PARENT_SECTION" => "",
                                    "PARENT_SECTION_CODE" => "",
                                    "PREVIEW_TRUNCATE_LEN" => "",
                                    "PROPERTY_CODE" => array(
                                        0 => "",
                                        1 => "LINK",
                                        2 => "",
                                    ),
                                    "SET_BROWSER_TITLE" => "N",
                                    "SET_LAST_MODIFIED" => "N",
                                    "SET_META_DESCRIPTION" => "N",
                                    "SET_META_KEYWORDS" => "N",
                                    "SET_STATUS_404" => "N",
                                    "SET_TITLE" => "N",
                                    "SHOW_404" => "N",
                                    "SORT_BY1" => "ACTIVE_FROM",
                                    "SORT_BY2" => "SORT",
                                    "SORT_ORDER1" => "DESC",
                                    "SORT_ORDER2" => "ASC",
                                    "STRICT_SECTION_CHECK" => "N",
                                    "COMPONENT_TEMPLATE" => "last-news"
                                ),
                                false
                            ); ?>
                        </div>
                    <? endif; ?>

                    <? if ($arResult['IBLOCK_ID'] == SCHEME_ID): ?>
                        <div class="title title--content"><?= GetMessage("ARLIGHT_ARSTORE_POSLEDNIE_SHEMY_MONT") ?></div>
                        <div class="news-last">
                            <? $APPLICATION->IncludeComponent(
                                "bitrix:news.list",
                                "last-news",
                                array(
                                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                    "ADD_SECTIONS_CHAIN" => "N",
                                    "AJAX_MODE" => "N",
                                    "AJAX_OPTION_ADDITIONAL" => "",
                                    "AJAX_OPTION_HISTORY" => "N",
                                    "AJAX_OPTION_JUMP" => "N",
                                    "AJAX_OPTION_STYLE" => "Y",
                                    "CACHE_FILTER" => "N",
                                    "CACHE_GROUPS" => "Y",
                                    "CACHE_TIME" => "36000000",
                                    "CACHE_TYPE" => "A",
                                    "CHECK_DATES" => "Y",
                                    "DETAIL_URL" => "",
                                    "DISPLAY_BOTTOM_PAGER" => "N",
                                    "DISPLAY_DATE" => "N",
                                    "DISPLAY_NAME" => "Y",
                                    "DISPLAY_PICTURE" => "N",
                                    "DISPLAY_PREVIEW_TEXT" => "N",
                                    "DISPLAY_TOP_PAGER" => "N",
                                    "FIELD_CODE" => array(
                                        0 => "",
                                        1 => "",
                                    ),
                                    "FILTER_NAME" => "arFilterForLastNews",
                                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                    "IBLOCK_ID" => SCHEME_ID,
                                    "IBLOCK_TYPE" => "content",
                                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                    "INCLUDE_SUBSECTIONS" => "Y",
                                    "MESSAGE_404" => "",
                                    "NEWS_COUNT" => "3",
                                    "PAGER_BASE_LINK_ENABLE" => "N",
                                    "PAGER_DESC_NUMBERING" => "N",
                                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                    "PAGER_SHOW_ALL" => "N",
                                    "PAGER_SHOW_ALWAYS" => "N",
                                    "PAGER_TEMPLATE" => ".default",
                                    "PAGER_TITLE" => GetMessage("ARLIGHT_ARSTORE_SLAYDER"),
                                    "PARENT_SECTION" => "",
                                    "PARENT_SECTION_CODE" => "",
                                    "PREVIEW_TRUNCATE_LEN" => "",
                                    "PROPERTY_CODE" => array(
                                        0 => "",
                                        1 => "LINK",
                                        2 => "",
                                    ),
                                    "SET_BROWSER_TITLE" => "N",
                                    "SET_LAST_MODIFIED" => "N",
                                    "SET_META_DESCRIPTION" => "N",
                                    "SET_META_KEYWORDS" => "N",
                                    "SET_STATUS_404" => "N",
                                    "SET_TITLE" => "N",
                                    "SHOW_404" => "N",
                                    "SORT_BY1" => "ACTIVE_FROM",
                                    "SORT_BY2" => "SORT",
                                    "SORT_ORDER1" => "DESC",
                                    "SORT_ORDER2" => "ASC",
                                    "STRICT_SECTION_CHECK" => "N",
                                    "COMPONENT_TEMPLATE" => "last-news"
                                ),
                                false
                            ); ?>
                        </div>
                    <? endif; ?>
                </div>
            </div>
        </div>
    <? else: ?>
    <div class="weeknews">
        <? echo $arResult["DETAIL_TEXT"]; ?>
        <div class="container" style="max-width: 1170px;">
            <? if ($arResult['PROPERTIES']['PRODUCTS']['VALUE']): ?>
                        <div class="additional-goods">
                            <div class="title"><?= GetMessage("ARLIGHT_ARSTORE_SVAZANNYE_TOVARY") ?></div>
                            <?php
                            global $arRelList;
                            $arRelList = array("ID" => $arResult['PROPERTIES']['PRODUCTS']['VALUE']);
                            $APPLICATION->IncludeComponent(
                                "bitrix:catalog.section",
                                "slider3",
                                array(
                                    "IBLOCK_TYPE" => "catalog",
                                    "IBLOCK_ID" => CATALOG_ID,
                                    "ELEMENT_SORT_FIELD" => "sort",
                                    "ELEMENT_SORT_ORDER" => "asc",
                                    "ELEMENT_SORT_FIELD2" => "id",
                                    "ELEMENT_SORT_ORDER2" => "desc",
                                    "PROPERTY_CODE" => array(
                                        0 => "ARTICLE",
                                        1 => "DEVELOPER",
                                        2 => "CASE",
                                        3 => "PACK",
                                        4 => "UNIT",
                                        5 => "",
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
                                    "FILTER_NAME" => "arRelList",
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
                                    "COMPONENT_TEMPLATE" => "slider3",
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
                                    "CUSTOM_FILTER" => "",
                                    "PROPERTY_CODE_MOBILE" => array(),
                                    "LABEL_PROP_MOBILE" => "",
                                    "LABEL_PROP_POSITION" => "top-left"
                                ),
                                false
                            );


                            ?>
                        </div>
                    <? endif; ?>
        </div>

    <? endif;?>
</div>
