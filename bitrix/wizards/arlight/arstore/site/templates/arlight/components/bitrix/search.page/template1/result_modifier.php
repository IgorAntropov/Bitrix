<?php

if (count($arResult["SEARCH"]) > 0) {

    $arIDs = array();
    foreach ($arResult["SEARCH"] as $si => $arItem) {


        if ($arItem["MODULE_ID"] == "iblock" && substr($arItem["ITEM_ID"], 0, 1) !== "S") {
            // סגÿחü: iblock_id => id : search_id
            $arIDs[$arItem['PARAM2']][$arItem["ITEM_ID"]] = $si;
        }
    }

    CModule::IncludeModule('iblock');

    foreach ($arIDs as $iblockId => $searchIds) {

        $grab = CIBlockElement::GetList(array(), array(
            "IBLOCK_ID" => $iblockId,
            "ID" => array_keys($searchIds)
        ), false, false, array(
            "ID",
            "IBLOCK_ID",
            "PREVIEW_TEXT",
            "PREVIEW_PICTURE",
            "PROPERTY_LIKE",
            "PROPERTY_DISLIKE",
            "PROPERTY_PREVIEW_IMAGE"));
        while ($ar = $grab->Fetch()) {
            $ar['PICTURE'] = CFile::GetFileArray($ar["PREVIEW_PICTURE"]);
            $ar['PROPERTY_PREVIEW_IMAGE'] = CFile::GetFileArray($ar["PROPERTY_PREVIEW_IMAGE_VALUE"]);

            $si = $arIDs[$iblockId][$ar["ID"]];
            $arResult["SEARCH"][$si]["ELEMENT"] = $ar;

        }
    }
}

$items = [];
$catalog = false;
foreach ($arResult["SEARCH"] as $keyS => $product_filter) {
    $product_filter["SORT"] = $product_filter["PARAM2"];
    if ($product_filter["PARAM2"] == CATALOG_ID) {
//        $product_filter["SORT"] = 9999;
        $catalog = true;
    }
    $items[$product_filter["PARAM2"]][] = $product_filter;
}
//krsort($items);
//$arResult["SEARCH"] = $items;
//$volume = array_column($arResult["SEARCH"], 'SORT');
//array_multisort($volume, SORT_DESC, $arResult["SEARCH"]);

if ($catalog) {
    $arResult["SEARCH"] = [];
    $catalogRes = $items[CATALOG_ID];
    unset ($items[CATALOG_ID]);

    $arResult["SEARCH"][CATALOG_ID] = $catalogRes;
    foreach ($items as $keyItems => $item) {
        $arResult["SEARCH"][$keyItems] = $item;
    }
} else {
    $arResult["SEARCH"] = $items;
}
