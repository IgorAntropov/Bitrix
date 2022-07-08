<?php
$jsonArticlesToIDs = [];
if (file_exists($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . 'cron/catalog_import/data/json/product_ids.json'))
    $jsonArticlesToIDs = json_decode(json_encode(json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . 'cron/catalog_import/data/json/product_ids.json'))), true);
$IDsToArticles = array_flip((array)$jsonArticlesToIDs);
//список новинок из последних новостей
$newIdsAr = [];
$arResNewPr = [];
$arResNewPrArt = [];
$arSelectNewPr = array("ID", "IBLOCK_ID", "PROPERTY_PRODUCTS");
$arFilterNewPr = array("IBLOCK_ID" => NEWS_ID, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", ["LOGIC" => "OR", "!PROPERTY_PRODUCTS" => false, "!PROPERTY_PRODUCTS_ART" => false]);
$res = CIBlockElement::GetList(['active_from' => 'desc'], $arFilterNewPr, false, array("nTopCount" => 10), $arSelectNewPr);
while ($ob = $res->GetNextElement()) {
    $arFields = $ob->GetFields();
    $arProps = $ob->GetProperties(false, ['CODE' => 'PRODUCTS']);
    $arProps2 = $ob->GetProperties(false, ['CODE' => 'PRODUCTS_ART']);
    $arResNewPr[$arFields['ID']] = $arProps['PRODUCTS']['VALUE'];
    $arResNewPrArt[$arFields['ID']] = $arProps2['PRODUCTS_ART']['VALUE'];
}
foreach ($arResNewPr as $arResItem) {
    foreach ((array)$arResItem as $arResItem2) {
        if ($arResItem2!='')
            $newIdsAr[] = $arResItem2;
    }
}
unset($arResItem, $arResItem2);

foreach ($arResNewPrArt as $arResItem) {
    foreach ((array)$arResItem as $arResItem2) {
        if (isset($jsonArticlesToIDs[$arResItem2]) && $jsonArticlesToIDs[$arResItem2]!='')
            $newIdsAr[] = $jsonArticlesToIDs[$arResItem2];
    }
}
unset($arResItem, $arResItem2);
if (!empty($newIdsAr)):
    $GLOBALS['arNewFilter']["!PROPERTY_OBSOLETE"] = -1;
    $GLOBALS['arNewFilter']["ID"] = $newIdsAr;
    ?>
    <div class="additional-goods--mainsliders">
        <div class="additional-goods" id="related_goods">
            <div class="title"><?= GetMessage("ARLIGHT_ARSTORE_NOVINKI") ?></div>
            <div class="title_sub"><?= GetMessage("ARLIGHT_ARSTORE_MY_OTOBRALI_DLA_VAS") ?></div>
            <?php
            if (!empty($newIdsAr)) {
                $APPLICATION->IncludeComponent(
                    "bitrix:catalog.section",
                    "slider",
                    array(
                        "IBLOCK_TYPE" => "catalog",
                        "IBLOCK_ID" => "#CATALOG_IBLOCK_ID#",
                        "ELEMENT_SORT_FIELD" => "timestamp_x",
                        "ELEMENT_SORT_ORDER" => "asc",
                        "ELEMENT_SORT_FIELD2" => "sort",
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
                        "FILTER_NAME" => "arNewFilter",
                        "USE_FILTER" => "Y",
                        "CACHE_TYPE" => "A",
                        "CACHE_TIME" => $arParams["CACHE_TIME"],
                        "CACHE_FILTER" => "Y",
                        "CACHE_GROUPS" => "N",
                        "SET_TITLE" => "N",
                        "SET_STATUS_404" => "N",
                        "DISPLAY_COMPARE" => "N",
                        "PAGE_ELEMENT_COUNT" => "15",
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
                        "PROPERTY_CODE_MOBILE" => array(),
                        "LABEL_PROP_MOBILE" => "",
                        "LABEL_PROP_POSITION" => "top-left"
                    ),
                    false
                );
            }
            ?>
        </div>
    </div>
<?php endif; ?>