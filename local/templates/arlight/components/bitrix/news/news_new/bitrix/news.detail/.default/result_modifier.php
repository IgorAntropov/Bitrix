<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$this->__component->arResult["OG_IMG"] = $arResult['PREVIEW_PICTURE']['SRC'];
$this->__component->SetResultCacheKeys(array("OG_IMG"));
$this->__component->arResult["OG_TEXT"] = strip_tags($arResult['PREVIEW_TEXT']);
$this->__component->SetResultCacheKeys(array("OG_TEXT"));

global $arFilterForLastNews;
$arFilter = [];

$iblockID = $arResult['IBLOCK_ID'];
$res = CIBlockElement::GetList(
    Array("date_active_from" => "DESC", "ID" => "DESC"),
    Array("IBLOCK_ID" => $iblockID, "ACTIVE" => "Y"),
    false,
    Array('nTopCount' => 4),
    Array('ID')
);
while ($arItem = $res->GetNext()) {
    $arFilter[] = $arItem['ID'];
}
$elId = $arResult['ID'];
if (in_array($elId, $arFilter)) {
    if (($key = array_search($elId, $arFilter)) !== FALSE) {
        unset($arFilter[$key]);
    }
} else
    unset($arFilter[3]);

$arFilterForLastNews = ['ID' => array_values($arFilter)];

unset($arFilter);
