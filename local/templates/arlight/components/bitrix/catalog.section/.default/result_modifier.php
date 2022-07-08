<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();


$arSection = CIblockSection::GetById($arResult["ID"])->GetNext();
$arResult['SECTION_PAGE_URL'] = $arSection['SECTION_PAGE_URL'];
$cp = $this->__component;
if (is_object($cp))
    $cp->SetResultCacheKeys(array('SECTION_PAGE_URL'));


$db_list = CIBlockSection::GetList(Array($by => $order), $arFilter = Array("IBLOCK_ID" => $arResult["IBLOCK_ID"], "ID" => $arResult["ID"]), true, $arSelect = Array("UF_SEO_DESCR"));

while ($ar_result = $db_list->GetNext()) {
    $arResult['UF_SEO_DESCR'] = $ar_result["UF_SEO_DESCR"];
    $arResult['~UF_SEO_DESCR'] = $ar_result["~UF_SEO_DESCR"];
}
