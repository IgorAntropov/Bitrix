<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();
global $APPLICATION;
global $USER;
CJSCore::Init(array("fx"));

use Bitrix\Main\Page\Asset;

$currPage = $APPLICATION->GetCurPage(false);
$mainPage = $currPage == SITE_DIR;
global $pageWithTitle;
$pageWithTitleAr = [
    SITE_DIR . 'info/projects/',
    SITE_DIR . 'news/',
    SITE_DIR . 'info/video/',
    SITE_DIR . 'info/articles/',
    SITE_DIR . 'info/faq/',
    SITE_DIR . 'info/documents/',
    SITE_DIR . 'info/certificates/',
    SITE_DIR . 'info/arrangement/',
    SITE_DIR . 'info/calc/',
    SITE_DIR . 'contacts/',
    SITE_DIR . 'info/webarchive/',
    SITE_DIR . 'delivering/',
    SITE_DIR . 'payment/',
];
$pageWithMarginBottomAr = [
    SITE_DIR . 'delivering/',
    SITE_DIR . 'payment/'
];
$pageWithTitle = in_array($currPage, $pageWithTitleAr);
global $pageWithMarginBottom;
$pageWithMarginBottom = in_array($currPage, $pageWithMarginBottomAr);
$templatePath = SITE_TEMPLATE_PATH;
$siteUrl = $_SERVER['SERVER_NAME'];
$GLOBALS['USE_WATERMARK'] = false;
global $goalCurrent;
$goalCurrent = [];
if (file_exists($_SERVER['DOCUMENT_ROOT'] . SITE_DIR . "assets/json/reach_goal.json"))
    $goalCurrent = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . SITE_DIR . "assets/json/reach_goal.json"), true);
global $simpleSale;
$simpleSale = ((stristr($currPage, '/catalog/') || stristr($currPage, '/search/') || stristr($currPage, '/compare/') || stristr($currPage, '/favorite/')) && file_exists($_SERVER['DOCUMENT_ROOT'] . SITE_DIR . 'assets/json/sale_now_articles.json')) ? json_decode(json_encode(json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . SITE_DIR . 'assets/json/sale_now_articles.json'))), true) : false;

?>

    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <? $APPLICATION->ShowHead(); ?>
        <title><? $APPLICATION->ShowTitle(); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
        <!-- saved from url=(0014)about:internet -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="apple-mobile-web-app-capable" content="yes"/>
        <meta name="HandheldFriendly" content="True"/>
        <meta name="format-detection" content="telephone=no"/>
        <meta name="format-detection" content="address=no"/>
        <meta name="x-rim-auto-match" content="none"/>
        <!--    favicon-->
        <?php require($_SERVER['DOCUMENT_ROOT'] . SITE_DIR . "/include/favicon.php"); ?>
        <!--    favicon-->
        <!-- OG Meta -->
        <meta property="og:title" content="<? $APPLICATION->ShowTitle() ?>"/>
        <meta property="og:type" content="website"/>
        <meta property="og:url" content="https://<?= $_SERVER['HTTP_HOST'] . $currPage ?>"/>
        <? global $customOgImg;
        $customOgImg = false;
        global $customOgDescr;
        $customOgDescr = false;
        ?>
        <meta property="og:image:width" content="201"/>
        <meta property="og:image:height" content="201"/>
        <!-- OG Meta -->
        <?
        if (stristr($currPage, 'admin/settings') || stristr($currPage, 'admin/section'))
            Asset::getInstance()->addCss(SITE_DIR . "admin/settings/bootstrap.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/bootstrap-reboot.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/bootstrap-grid.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/bootstrap-table.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/slick.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/slick-theme.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/plyr.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/jquery.fancybox.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/jquery-ui.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/jquery.scrollbar.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/tooltipster.bundle.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/tooltipster-sideTip-shadow.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/style.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/responsive.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/developer.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/custom-file.css");

        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery-3.1.1.min.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery-ui.min.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/datepicker-ru.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.fancybox.min.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/slick.min.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/plyr.polyfilled.min.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.validate.min.js");
        Asset::getInstance()->addJs(SITE_DIR . "assets/json/messages_ru.json");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/messages_ru.min.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.scrollbar.min.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.mask.min.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.hyphenate.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.tablesorter.min.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.tablesorter.widgets.min.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.inputmask.bundle.min.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.inputmask-multi.min.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/tooltipster.bundle.min.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/script.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/custom-file.js");
        ?>
        <?php require($_SERVER['DOCUMENT_ROOT'] . SITE_DIR . "include/metrika.php"); ?>
    </head>
<? $color_scheme = COption::GetOptionString("header_action", "sch_color", '');
$font_scheme = COption::GetOptionString("header_action", "data-font-scheme", '');
$header_scheme = COption::GetOptionString("header_action", "data-header-scheme", ''); ?>
<body data-color="<?= $color_scheme ?>" data-font="<?= $font_scheme ?>" data-header="<?= $header_scheme ?>"
      data-blocking="<?= BLOCKING ?>" data-demo="<?= DEMOVERSION ?>">
<?php require($_SERVER['DOCUMENT_ROOT'] . SITE_DIR . "include/metrika_b.php"); ?>
    <noscript>
        <div class="noscript"><?= GetMessage("ARLIGHT_ARSTORE_K_SOJALENIU_VAS_BRA") ?></div>
    </noscript>
    <div id="panel">
        <? $APPLICATION->ShowPanel(); ?>
    </div>
    <div class="preloader_block preloader_block_2" id="preloader_block">
        <div class="lds-css ng-scope">
            <div style="width:100%;height:100%" class="lds-flickr">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <div class="preloader_block">
        <div class="lds-css ng-scope">
            <div style="width:100%;height:100%" class="lds-flickr">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
<div class="wrapper">
    <header class="header">
        <? if (BLOCKING != 'true'): ?>
            <div class="header__admin">
                <?= $APPLICATION->ShowViewContent('ADMIN_LINK'); ?>
            </div>
        <? endif; ?>
        <div class="header__top">
            <div class="header__message">
                <?
                $text = COption::GetOptionString("header_action", "mes_text", '');
                $color = COption::GetOptionString("header_action", "mes_color", '#ef172f');
                $icon = COption::GetOptionString("header_action", "mes_icon", '');
                if (!$text && $dealer_status = COption::GetOptionString("main", "dealer_status", '')) {
                    $text = GetMessage("ARLIGHT_ARSTORE_OF") . ' ' . mb_strtolower($dealer_status) . ' Arlight';
                }
                ?>
                <? if ($color != '' && $text != ''): ?>
                    <i class="" style="border-color: transparent transparent transparent <?= $color ?>;"></i>
                    <span class="header__message-txt" <?= 'style="color:' . $color . '"' ?>><?= $text ?></span>
                <? endif; ?>
            </div>

            <div>
                <?php
                $SOCIAL_NETWORK = array_filter(PrepareLinkSocNetwork());
                ?>
                <? if ($SOCIAL_NETWORK['social_whatsapp']): ?>
                    <a href="https://wa.me/<?= $SOCIAL_NETWORK['social_whatsapp'] ?>" target="_blank" rel="nofollow" class="header__whatsapp">
                        <svg xmlns="http://www.w3.org/2000/svg" width="2489" height="2500" viewBox="0 0 737.509 740.824" >
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M630.056 107.658C560.727 38.271 468.525.039 370.294 0 167.891 0 3.16 164.668 3.079 367.072c-.027 64.699 16.883 127.855 49.016 183.523L0 740.824l194.666-51.047c53.634 29.244 114.022 44.656 175.481 44.682h.151c202.382 0 367.128-164.689 367.21-367.094.039-98.088-38.121-190.32-107.452-259.707m-259.758 564.8h-.125c-54.766-.021-108.483-14.729-155.343-42.529l-11.146-6.613-115.516 30.293 30.834-112.592-7.258-11.543c-30.552-48.58-46.689-104.729-46.665-162.379C65.146 198.865 202.065 62 370.419 62c81.521.031 158.154 31.81 215.779 89.482s89.342 134.332 89.311 215.859c-.07 168.242-136.987 305.117-305.211 305.117m167.415-228.514c-9.176-4.591-54.286-26.782-62.697-29.843-8.41-3.061-14.526-4.591-20.644 4.592-6.116 9.182-23.7 29.843-29.054 35.964-5.351 6.122-10.703 6.888-19.879 2.296-9.175-4.591-38.739-14.276-73.786-45.526-27.275-24.32-45.691-54.36-51.043-63.542-5.352-9.183-.569-14.148 4.024-18.72 4.127-4.11 9.175-10.713 13.763-16.07 4.587-5.356 6.116-9.182 9.174-15.303 3.059-6.122 1.53-11.479-.764-16.07-2.294-4.591-20.643-49.739-28.29-68.104-7.447-17.886-15.012-15.466-20.644-15.746-5.346-.266-11.469-.323-17.585-.323-6.117 0-16.057 2.296-24.468 11.478-8.41 9.183-32.112 31.374-32.112 76.521s32.877 88.763 37.465 94.885c4.587 6.122 64.699 98.771 156.741 138.502 21.891 9.45 38.982 15.093 52.307 19.323 21.981 6.979 41.983 5.994 57.793 3.633 17.628-2.633 54.285-22.19 61.932-43.616 7.646-21.426 7.646-39.791 5.352-43.617-2.293-3.826-8.41-6.122-17.585-10.714"/>
                        </svg>
                    </a>
                <? endif; ?>
                <div class="header__tel">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "header_phone",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => SITE_DIR . "include/header_phone.php",
                            "COMPONENT_TEMPLATE" => "header_phone"
                        ),
                        false
                    ); ?>
                </div>
                <div class="header__mail">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "header_mail",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => SITE_DIR . "include/header_mail.php",
                            "COMPONENT_TEMPLATE" => "header_mail"
                        ),
                        false
                    ); ?>
                </div>
                <?
                if (COption::GetOptionString("header_action", "social_in_header", 'N') == 'Y' && !empty($SOCIAL_NETWORK)): ?>
                    <div class="header__social">
                        <?
                        $arParamsSoc = array(
                            "COMPONENT_TEMPLATE" => "social_network",
                        );
                        $arParamsSoc = array_merge($arParamsSoc, $SOCIAL_NETWORK);
                        ?>
                        <?
                        $APPLICATION->IncludeComponent(
                            "asd:variable.set",
                            "social_network",
                            $arParamsSoc,
                            false
                        ); ?>
                    </div>
                <? endif; ?>
                <div class="header__sign">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => SITE_DIR . "include/header_favorite_link.php"
                        )
                    ); ?>
                    <?
                    if (BLOCKING != 'true'):
                        if ($USER->IsAuthorized()): ?>
                            <a href="<?= SITE_DIR ?>personal/" class="hover-border">
                                <? if ($USER->GetFullName()): ?>
                                    <?= $USER->GetFullName() ?>
                                <? else: ?>
                                    <?= $USER->GetLogin() ?>
                                <? endif; ?>
                            </a>
                            <a href="<? echo $APPLICATION->GetCurPageParam("logout=yes"); ?>&<?= bitrix_sessid_get() ?>"
                               class="hover-border"><?= GetMessage("ARLIGHT_ARSTORE_VYYTI") ?></a>
                        <? else: ?>
                            <a href="#popup-auth" data-fancybox class="hover-border"
                               data-name="register-form"><?= GetMessage("ARLIGHT_ARSTORE_REGISTRACIA") ?></a>
                            <a href="#popup-auth" data-fancybox class="hover-border"
                               data-name="auth-form"><?= GetMessage("ARLIGHT_ARSTORE_VHOD") ?></a>
                        <? endif; ?>
                    <? endif; ?>
                </div>
            </div>
        </div>
        <div class="header__centerlogo">
            <a href="<?= SITE_DIR ?>">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => SITE_DIR . "include/header_logo.php"
                    )
                ); ?>
            </a>
        </div>
        <div class="header__menu">
            <a href="<?= SITE_DIR ?>" class="header__logo">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => SITE_DIR . "include/header_logo.php"
                    )
                ); ?>
            </a>

            <?php $APPLICATION->IncludeComponent(
                "bitrix:menu",
                "top_menu",
                array(
                    "ALLOW_MULTI_SELECT" => "N",
                    "CHILD_MENU_TYPE" => "left",
                    "DELAY" => "N",
                    "MAX_LEVEL" => "3",
                    "MENU_CACHE_GET_VARS" => array(""),
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_TYPE" => "N",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "ROOT_MENU_TYPE" => "main",
                    "USE_EXT" => "N"
                )
            ); ?>

            <?php
            CModule::IncludeModule("itertech.cart");
            $compareCount = WorkCart::itemsCompare();
            $compareCount = $compareCount['COUNT'];
            $favoriteCount = WorkCart::itemsFavorite();
            $favoriteCount = $favoriteCount['COUNT'];
            $cartCount = WorkCart::getItemsFromCart();
            $cartCount = $cartCount['TOTALCART']['QUANTITY'];

            if (!BELARUS && defined("CUSTOM_PRODUCTS") && !KAZAKHSTAN) {
                $customProdCnt = 0;
                $userID = GetUserID();
                if ($userID && $userID !== '') {
                    $userFileName = $_SERVER["DOCUMENT_ROOT"] . '/upload/custom-lamps-orders/' . $userID . '.json';
                    if (file_exists($userFileName)) {
                        $dataProduct = json_decode(json_encode(json_decode(file_get_contents($userFileName))), true);
                        if (count($dataProduct)) $customProdCnt = count($dataProduct);
                    }
                }
            }

            ?>
            <div class="header__btns">
                <div class="header__search" title="<?= GetMessage("ARLIGHT_ARSTORE_POISK") ?>">
                    <i class="icon-search"></i>
                </div>
                <div class="header__compare" title="<?= GetMessage("ARLIGHT_ARSTORE_SRAVNENIE") ?>">
                    <a href="<?= SITE_DIR ?>compare/">
                        <span data-slug="COMPARE_COUNT" class="header__count"><?= ($compareCount) ? $compareCount : 0; ?></span></a>
                </div>
                <div class="header__favorite" title="<?= GetMessage("ARLIGHT_ARSTORE_IZBRANNOE") ?>">
                    <a href="<?= SITE_DIR ?>favorite/">
                        <span data-slug="FAVORITE_COUNT" class="header__count"><?= ($favoriteCount) ? $favoriteCount : 0; ?></span></a>
                </div>
                <? if (BLOCKING != 'true'): ?>
                    <div class="header__cart">
                        <a href="" data-slug="CART_LINK">
                            <i class="icon-cart-empty"></i>
                            <span data-slug="CART_LINK_COUNT"
                                  class="header__count"><?= ($cartCount) ? $cartCount : 0; ?></span>
                        </a>
                    </div>
                <? endif; ?>

                <? if (!BELARUS && defined("CUSTOM_PRODUCTS") && !KAZAKHSTAN): ?>
                    <div class="header__custom">
                        <a href="">
                            <i class="icon-ar_clamps"></i>
                            <span data-slug="CART_CUSTOM_COUNT"
                                  class="header__count"><?= (isset($customProdCnt) && $customProdCnt) ? $customProdCnt : 0; ?></span>
                        </a>
                    </div>
                <? endif; ?>
            </div>
            <div class="accept-buy--wrap">
                <div class="accept-buy">
                    <div class="accept-buy__icon"><i class="icon-checkboxchecked"></i></div>
                    <div class="accept-buy__text"><?= GetMessage("ARLIGHT_ARSTORE_TOVAR_DOBAVLEN") ?></div>
                </div>
            </div>
        </div>
        <? $APPLICATION->IncludeComponent("bitrix:search.form", "search_form_header", array(
            "PAGE" => "#SITE_DIR#search/",
            "USE_SUGGEST" => "N",
        ),
            false
        ); ?>
        <?
        $APPLICATION->IncludeComponent("itertech:smallcart", ".default", array(
            "LIST_PROPERTY_CODE" => "",
            "COMPONENT_TEMPLATE" => ".default",
            "SITE_ID" => SITE_ID
        ),
            false
        );
        ?>

        <? if (!BELARUS && defined("CUSTOM_PRODUCTS") && !KAZAKHSTAN): ?>
            <div class="header__clamp">
                <div class="header__clamp-header">
                    <?= GetMessage("ARLIGHT_ARSTORE_SVETILQNIKI_IZ_PROFI") ?><span class="header__clamp-header-number"
                                                                                   data-service="CUSTOMCOUNT"><?= $customProdCnt ?></span>
                </div>
                <? if ($customProdCnt > 0): ?>
                    <a class="button"
                       href="<?= SITE_DIR ?>catalog/custom-lamps/my-lamps.php"><?= GetMessage("ARLIGHT_ARSTORE_PEREYTI_K_SPISKU") ?></a>

                <? endif; ?>
            </div>
        <? endif; ?>
    </header>
<div class="content-wrapper <? $APPLICATION->ShowProperty("err_404") ?>">

<? if (!$mainPage && $currPage != '/buy/' && $currPage != '/catalog/' && $currPage != '/showroom/'): ?>
    <? if (stripos($currPage, '/news/') > -1 && $currPage != '/news/') :?>
    <? else: ?>
        <div class="container">
            <div class="breadcrumbs">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:breadcrumb",
                    "breadcrumb",
                    array(
                        "PATH" => "",
                        "SITE_ID" => "#SITE_ID#",
                        "START_FROM" => "0",
                        "COMPONENT_TEMPLATE" => "breadcrumb"
                    ),
                    false
                ); ?>
            </div>
        </div>
        <div class="container">
        <?
        $GLOBALS['sorting'] = 'SORT';
        $GLOBALS['ordering'] = 'asc';
        if (isset($_GET['catSortOrder'])) {
            if ($_GET['catSortOrder'] == 'sort') {
                $GLOBALS['sorting'] = 'SORT';
                $GLOBALS['ordering'] = 'asc';
            } elseif ($_GET['catSortOrder'] == 'price_asc') {
                $GLOBALS['sorting'] = 'PROPERTY_PRICE';
                $GLOBALS['ordering'] = 'asc';
            } elseif ($_GET['catSortOrder'] == 'price_desc') {
                $GLOBALS['sorting'] = 'PROPERTY_PRICE';
                $GLOBALS['ordering'] = 'desc';
            } elseif ($_GET['catSortOrder'] == 'stock') {
                $GLOBALS['sorting'] = 'PROPERTY_STOCK_SUMMARY_NUMBER';
                $GLOBALS['ordering'] = 'asc';
            } elseif ($_GET['catSortOrder'] == 'new') {
                $GLOBALS['sorting'] = 'id';
                $GLOBALS['ordering'] = 'desc';
            }
        }
        ?>
        <? if ($pageWithTitle): ?>
        <? if ($currPage == SITE_DIR . 'news/'): ?>
            <div class="title title-page title-page--news">
                <div class="title__text"><h1><? $APPLICATION->ShowTitle(); ?></h1></div>
                <div class="title__subtext"><?= GetMessage("ARLIGHT_ARSTORE_AKTUALQNO_I_POLEZNO") ?></div>
            </div>
        <? elseif ($currPage == SITE_DIR . 'info/webarchive/' && false) : ?>
        <div class="webarchive">
        <div class="title title-page">
            <div class="title__text"><h1><? $APPLICATION->ShowTitle(); ?></h1></div>
        </div>
        <? elseif (stristr($currPage, SITE_DIR . 'info/')) : ?>
        <div class="webarchive">
        <div class="title title-page">
            <div class="title__text"><h1><? $APPLICATION->ShowTitle(); ?></h1></div>
            <div class="title__backlink">
                <i class="icon-arrow-left"></i>
                <a href=""><?= GetMessage("ARLIGHT_ARSTORE_VERNUTQSA") ?></a>
            </div>
        </div>
        <? else: ?>
            <div class="title title-page">
                <div class="title__text"><h1><? $APPLICATION->ShowTitle(); ?></h1></div>
                <div class="title__backlink">
                    <i class="icon-arrow-left"></i>
                    <a href=""><?= GetMessage("ARLIGHT_ARSTORE_VERNUTQSA") ?></a>
                </div>
            </div>
        <? endif; ?>
        <? endif; ?>
        <? if ($pageWithMarginBottom): ?>
            <div class="wrap-mb">
        <? endif; ?>
    <? endif; ?>
<? endif; ?>
<? if ($mainPage): ?>
    <? /*slider*/?>
    <? $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "slider-main",
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
            "CACHE_TIME" => "3",
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
            "FILTER_NAME" => "",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => BANNERS_ID,
            "IBLOCK_TYPE" => "content",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "INCLUDE_SUBSECTIONS" => "Y",
            "MESSAGE_404" => "",
            "NEWS_COUNT" => "20",
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
                0 => "LINK_2",
                1 => "SLIDE_TEMPLATE",
                2 => "LINK",
                3 => "",
            ),
            "SET_BROWSER_TITLE" => "N",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "N",
            "SET_META_KEYWORDS" => "N",
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "N",
            "SHOW_404" => "N",
            "SORT_BY1" => "SORT",
            "SORT_BY2" => "ACTIVE_FROM",
            "SORT_ORDER1" => "ASC",
            "SORT_ORDER2" => "DESC",
            "STRICT_SECTION_CHECK" => "N",
            "COMPONENT_TEMPLATE" => "slider-main"
        ),
        false
    ); ?>
    <? /*catalog*/?>
    <? $APPLICATION->IncludeComponent(
        "bitrix:catalog.section.list",
        "for_index_page",
        array(
            "ADD_SECTIONS_CHAIN" => "N",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "COUNT_ELEMENTS" => "N",
            "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
            "FILTER_NAME" => "sectionsFilter",
            "HIDE_SECTION_NAME" => "N",
            "IBLOCK_ID" => CATALOG_ID,
            "IBLOCK_TYPE" => "catalog",
            "SECTION_CODE" => "",
            "SECTION_FIELDS" => array("", ""),
            "SECTION_ID" => "",
            "SECTION_URL" => "",
            "SECTION_USER_FIELDS" => array("", ""),
            "SHOW_PARENT_NAME" => "Y",
            "TOP_DEPTH" => "1",
            "VIEW_MODE" => "TILE"
        )
    ); ?>
    <? /*hits*/?>
    <? $APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "inc",
            "EDIT_TEMPLATE" => "",
            "PATH" => SITE_DIR . "include/index_hit.php"
        )
    ); ?>
    <? /*new*/?>
    <? $APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "inc",
            "EDIT_TEMPLATE" => "",
            "PATH" => SITE_DIR . "include/index_new.php"
        )
    ); ?>
    <? /*about*/?>
    <? $APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "inc",
            "EDIT_TEMPLATE" => "",
            "PATH" => SITE_DIR . "include/index_about.php"
        )
    ); ?>

<? endif; ?>