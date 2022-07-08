<?php
$GLOBALS['arHitFilter']["!PROPERTY_OBSOLETE"] = -1;
$GLOBALS['arHitFilter']["PROPERTY_ARTICLE"] = [];
if (file_exists($_SERVER['DOCUMENT_ROOT'] . SITE_DIR . "assets/json/hitProducts.json")) {
    $GLOBALS['arHitFilter']["PROPERTY_ARTICLE"] = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . SITE_DIR . "assets/json/hitProducts.json"), true);
}
if (!empty($GLOBALS['arHitFilter']["PROPERTY_ARTICLE"]) && count($GLOBALS['arHitFilter']["PROPERTY_ARTICLE"]) > 1):
?>
<div class="additional-goods--mainsliders">
    <div class="additional-goods" id="related_goods_2">
        <div class="title"><?=GetMessage("ARLIGHT_ARSTORE_HITY_PRODAJ")?></div>
        <div class="title_sub"><?=GetMessage("ARLIGHT_ARSTORE_MY_OTOBRALI_DLA_VAS")?></div>
        <?php
        $APPLICATION->IncludeComponent(
            "bitrix:catalog.section",
            "slider",
            Array(
                "ACTION_VARIABLE" => "action",
                "ADD_PICT_PROP" => "-",
                "ADD_PROPERTIES_TO_BASKET" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "BACKGROUND_IMAGE" => "-",
                "BASKET_URL" => "/personal/basket.php",
                "BROWSER_TITLE" => "-",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "COMPATIBLE_MODE" => "N",
                "DETAIL_URL" => "#SITE_DIR#catalog/product/#ELEMENT_CODE#/",
                "DISABLE_INIT_JS_IN_COMPONENT" => "N",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "DISPLAY_COMPARE" => "N",
                "DISPLAY_TOP_PAGER" => "N",
                "ELEMENT_SORT_FIELD" => "sort",
                "ELEMENT_SORT_FIELD2" => "id",
                "ELEMENT_SORT_ORDER" => "asc",
                "ELEMENT_SORT_ORDER2" => "desc",
                "ENLARGE_PRODUCT" => "STRICT",
                "FILTER_NAME" => "arHitFilter",
                "IBLOCK_ID" => "15",
                "IBLOCK_TYPE" => "catalog",
                "INCLUDE_SUBSECTIONS" => "Y",
                "LABEL_PROP" => array(),
                "LAZY_LOAD" => "N",
                "LINE_ELEMENT_COUNT" => "3",
                "LOAD_ON_SCROLL" => "N",
                "MESSAGE_404" => "",
                "MESS_BTN_ADD_TO_BASKET" => GetMessage("ARLIGHT_ARSTORE_V_KORZINU"),
                "MESS_BTN_BUY" => GetMessage("ARLIGHT_ARSTORE_KUPITQ"),
                "MESS_BTN_DETAIL" => GetMessage("ARLIGHT_ARSTORE_PODROBNEE"),
                "MESS_BTN_SUBSCRIBE" => GetMessage("ARLIGHT_ARSTORE_PODPISATQSA"),
                "MESS_NOT_AVAILABLE" => GetMessage("ARLIGHT_ARSTORE_NET_V_NALICII"),
                "META_DESCRIPTION" => "-",
                "META_KEYWORDS" => "-",
                "OFFERS_LIMIT" => "0",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => ".default",
                "PAGER_TITLE" => GetMessage("ARLIGHT_ARSTORE_TOVARY"),
                "PAGE_ELEMENT_COUNT" => "15",
                "PARTIAL_PRODUCT_PROPERTIES" => "N",
                "PRICE_CODE" => array(),
                "PRICE_VAT_INCLUDE" => "Y",
                "PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
                "PRODUCT_ID_VARIABLE" => "id",
                "PRODUCT_PROPS_VARIABLE" => "prop",
                "PRODUCT_QUANTITY_VARIABLE" => "quantity",
                "PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
                "RCM_PROD_ID" => "",
                "RCM_TYPE" => "personal",
                "SECTION_CODE" => "",
                "SECTION_CODE_PATH" => "",
                "SECTION_ID" => "",
                "SECTION_ID_VARIABLE" => "SECTION_ID",
                "SECTION_URL" => "#SITE_DIR#/catalog/#SECTION_CODE#/",
                "SECTION_USER_FIELDS" => array("",""),
                "SEF_MODE" => "Y",
                "SEF_RULE" => "",
                "SET_BROWSER_TITLE" => "N",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SHOW_ALL_WO_SECTION" => "N",
                "SHOW_FROM_SECTION" => "N",
                "SHOW_PRICE_COUNT" => "1",
                "SHOW_SLIDER" => "N",
                "SLIDER_INTERVAL" => "3000",
                "SLIDER_PROGRESS" => "N",
                "TEMPLATE_THEME" => "blue",
                "USE_ENHANCED_ECOMMERCE" => "N",
                "USE_MAIN_ELEMENT_SECTION" => "N",
                "USE_PRICE_COUNT" => "N",
                "USE_PRODUCT_QUANTITY" => "N"
            )
        );
        ?>
    </div>
</div>
<?php endif;?>