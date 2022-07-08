<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */

/** @var CBitrixComponent $component */

use Bitrix\Main\Loader; ?>
<div class="search-page">
    <br>
    <form action="" method="get" class="form form-search find-form">
        <? if ($arParams["USE_SUGGEST"] === "Y"):
            if (strlen($arResult["REQUEST"]["~QUERY"]) && is_object($arResult["NAV_RESULT"])) {
                $arResult["FILTER_MD5"] = $arResult["NAV_RESULT"]->GetFilterMD5();
                $obSearchSuggest = new CSearchSuggest($arResult["FILTER_MD5"], $arResult["REQUEST"]["~QUERY"]);
                $obSearchSuggest->SetResultCount($arResult["NAV_RESULT"]->NavRecordCount);
            }
            ?>
            <? $APPLICATION->IncludeComponent(
            "bitrix:search.suggest.input",
            "",
            array(
                "NAME" => "q",
                "VALUE" => $arResult["REQUEST"]["~QUERY"],
                "INPUT_SIZE" => 40,
                "DROPDOWN_SIZE" => 10,
                "FILTER_MD5" => $arResult["FILTER_MD5"],
            ),
            $component, array("HIDE_ICONS" => "Y")
        ); ?>
        <? else: ?>
            <input type="text" name="q" value="<?= $arResult["REQUEST"]["QUERY"] ?>" size="40"
                   class="input input-simple" autocomplete="off"/>
        <? endif; ?>
        <button type="submit" value="<?= GetMessage("SEARCH_GO") ?>"><i class="icon-search"></i></button>
        <input type="hidden" name="how" value="<? echo $arResult["REQUEST"]["HOW"] == "d" ? "d" : "r" ?>"/>
    </form>



<? if ($arResult["SEARCH"]): ?>
    <div class="navigation-block navigation-block_border">
        <ul class="compare__section">
            <? $j = 0; ?>
            <? foreach ($arResult["SEARCH"] as $key => $group): ?>
                <? $res = CIBlock::GetByID($group['0']['PARAM2']);
                if ($ar_res = $res->GetNext()) {
                    $clActive = ($j == 0) ? 'active_el' : '';
                    echo "<li><span class='button button_transparent " . $clActive . "' data-search=" . $j . ">" . $ar_res["NAME"] . "</span></li>";
                }
                $j++;
                ?>
            <? endforeach; ?>
        </ul>
    </div>
<? endif; ?>
<? if (isset($arResult["REQUEST"]["ORIGINAL_QUERY"])): ?>
    <div class="search-language-guess">
        <?
        echo GetMessage("CT_BSP_KEYBOARD_WARNING", array("#query#" => '<a href="' . $arResult["ORIGINAL_QUERY_URL"] . '">' . $arResult["REQUEST"]["ORIGINAL_QUERY"] . '</a>')) ?>
    </div><br/>
<? endif; ?>

<? if ($arResult["REQUEST"]["QUERY"] === false && $arResult["REQUEST"]["TAGS"] === false): ?>
<? elseif ($arResult["ERROR_CODE"] != 0): ?>
    <p><?= GetMessage("SEARCH_ERROR") ?></p>
    <? ShowError($arResult["ERROR_TEXT"]); ?>
    <p><?= GetMessage("SEARCH_CORRECT_AND_CONTINUE") ?></p>
    <br/><br/>
    <p><?= GetMessage("SEARCH_SINTAX") ?><br/><b><?= GetMessage("SEARCH_LOGIC") ?></b></p>
    <table border="0" cellpadding="5">
        <tr>
            <td align="center" valign="top"><?= GetMessage("SEARCH_OPERATOR") ?></td>
            <td valign="top"><?= GetMessage("SEARCH_SYNONIM") ?></td>
            <td><?= GetMessage("SEARCH_DESCRIPTION") ?></td>
        </tr>
        <tr>
            <td align="center" valign="top"><?= GetMessage("SEARCH_AND") ?></td>
            <td valign="top">and, &amp;, +</td>
            <td><?= GetMessage("SEARCH_AND_ALT") ?></td>
        </tr>
        <tr>
            <td align="center" valign="top"><?= GetMessage("SEARCH_OR") ?></td>
            <td valign="top">or, |</td>
            <td><?= GetMessage("SEARCH_OR_ALT") ?></td>
        </tr>
        <tr>
            <td align="center" valign="top"><?= GetMessage("SEARCH_NOT") ?></td>
            <td valign="top">not, ~</td>
            <td><?= GetMessage("SEARCH_NOT_ALT") ?></td>
        </tr>
        <tr>
            <td align="center" valign="top">( )</td>
            <td valign="top">&nbsp;</td>
            <td><?= GetMessage("SEARCH_BRACKETS_ALT") ?></td>
        </tr>
    </table>
<? elseif (count($arResult["SEARCH"]) > 0): ?>
    <br/>
    <? $i = 0; ?>
    <? foreach ($arResult["SEARCH"] as $key => $group): ?>
        <? $res = CIBlock::GetByID($group['0']['PARAM2']);
        ?>
        <?
        $clActive = ($i == 0) ? 'active_el' : '';
        $keyGr = $group['0']['PARAM2']; ?>
        <? if ($keyGr == CATALOG_ID): ?>
            <?
            $idFilterArr = [];
            $idFilterArrSection = [];
            foreach ($arResult["SEARCH"][$group['0']['PARAM2']] as $arItem): ?>
                <?
                if ((int)$arItem['ELEMENT']['ID']) {
                    $idFilterArr[] = $arItem['ELEMENT']['ID'];
                } else {
                    $idFilterArrSection[] = $arItem;
                }
                ?>
            <? endforeach; ?>
            <div class="search-section <?= $clActive ?>" data-search="<?= $i ?>">
                <? if (count($idFilterArrSection)): ?>
                    <div class="search-section-title"><?=GetMessage("ARLIGHT_ARSTORE_RAZDELY_KATALOGA")?></div>
                    <ul class="search-section-result">
                        <? foreach ($idFilterArrSection as $arItemSection): ?>
                            <li><a href="<?= $arItemSection['URL_WO_PARAMS'] ?>"
                                   class="button button_transparent"><?= $arItemSection['TITLE'] ?></a></li>
                        <? endforeach; ?>
                    </ul>
                <? endif; ?>
                <br>
                <br>
                <div class="search-section-title"><?=GetMessage("ARLIGHT_ARSTORE_TOVARY")?></div>

                <? if (!count($idFilterArr)): ?>
                    <br>
                    <p><?=GetMessage("ARLIGHT_ARSTORE_PO_DANNOMU_ZAPROSU_N")?></p>
                <? else:
                    global $arrFilterSearchIDs;
                    $arrFilterSearchIDs['ID'] = $idFilterArr;
                    ?>
                    <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	".default", 
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
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
		"DETAIL_URL" => SITE_DIR."catalog/product/#ELEMENT_CODE#/",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_COMPARE" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"ENLARGE_PRODUCT" => "STRICT",
		"FILTER_NAME" => "arrFilterSearchIDs",
		"IBLOCK_ID" => "#CATALOG_IBLOCK_ID#",
		"IBLOCK_TYPE" => "catalog",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LABEL_PROP" => array(
		),
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
		"OFFERS_LIMIT" => "5",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => GetMessage("ARLIGHT_ARSTORE_TOVARY1"),
		"PAGE_ELEMENT_COUNT" => "10",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array(
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array(
		),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false},{'VARIANT':'0','BIG_DATA':false}]",
		"PROPERTY_CODE" => array(
			0 => "PRICE",
			1 => "COLOR_HREF",
			2 => "ARTICLE",
			3 => "DESCRIPTION",
			4 => "COLOR_TITLE",
			5 => "",
		),
		"PROPERTY_CODE_MOBILE" => array(
		),
		"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
		"RCM_TYPE" => "personal",
		"SECTION_CODE" => "",
		"SECTION_CODE_PATH" => "",
		"SECTION_ID" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => SITE_DIR."catalog/#SECTION_CODE#/",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SEF_MODE" => "Y",
		"SEF_RULE" => "",
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SHOW_ALL_WO_SECTION" => "Y",
		"SHOW_FROM_SECTION" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_SLIDER" => "Y",
		"SLIDER_INTERVAL" => "3000",
		"SLIDER_PROGRESS" => "N",
		"TEMPLATE_THEME" => "blue",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>
                <? endif; ?>
            </div>
        <? elseif ($keyGr == ARTICLES_ID || $keyGr == NEWS_ID || $keyGr == PROJECTS_ID || $keyGr == SCHEME_ID || $keyGr == VIDEO_ID): ?>
            <div class="search-section <?= $clActive ?>" data-search="<?= $i ?>">
                <div class="info-block info-block__news" data-service="SHOW_MORE_BLOCK">
                    <?
                    global $arrFilterSearchIDs;
                    $arrFilterSearchIDs['ID'] = '';
                    $idFilterArr9 = [];
                    foreach ($arResult["SEARCH"][$group['0']['PARAM2']] as $arItem) {
                        if ((int)$arItem['ELEMENT']['ID']) {
                            $idFilterArr9[] = $arItem['ELEMENT']['ID'];
                        }
                    } ?>

                    <?
                    if (!count($idFilterArr9)): ?>
                        <br>
                        <p><?=GetMessage("ARLIGHT_ARSTORE_PO_DANNOMU_ZAPROSU_N1")?></p>
                    <? else:
                        $arrFilterSearchIDs['ID'] = $idFilterArr9;
                        ?>
                        <? $APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"search_content", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILE_404" => "",
		"FILTER_NAME" => "arrFilterSearchIDs",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => $keyGr,
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "12",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_TITLE" => GetMessage("ARLIGHT_ARSTORE_NOVOSTI"),
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "N",
		"SHOW_404" => "Y",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "search_content"
	),
	false
); ?>

                    <? endif; ?>


                </div>
            </div>
        <? endif; ?>
        <? $i++; ?>
    <? endforeach; ?>
<? else: ?>
    <br>
    <? ShowNote(GetMessage("SEARCH_NOTHING_TO_FOUND")); ?>
<? endif; ?>
</div>