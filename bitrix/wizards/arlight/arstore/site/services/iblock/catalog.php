<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

if (!CModule::IncludeModule("iblock"))
    return;

$iblockXMLFile = WIZARD_SERVICE_RELATIVE_PATH . "/xml/" . LANGUAGE_ID . "/catalog.xml";
$iblockCode = "catalog";
$iblockType = "catalog";

$rsIBlock = CIBlock::GetList(array(), array("CODE" => $iblockCode, "TYPE" => $iblockType));
$iblockID = false;
if ($arIBlock = $rsIBlock->Fetch()) {
    $iblockID = $arIBlock["ID"];
    if (WIZARD_REINSTALL_DATA) {
        CIBlock::Delete($arIBlock["ID"]);
        $iblockID = false;
    }
}


if ($iblockID == false) {
    $permissions = array(
        "1" => "X",
        "2" => "R"
    );
    $dbGroup = CGroup::GetList($by = "", $order = "", array("STRING_ID" => "content_editor"));
    if ($arGroup = $dbGroup->Fetch()) {
        $permissions[$arGroup["ID"]] = 'W';
    };
    $iblockID = WizardServices::ImportIBlockFromXML(
        $iblockXMLFile,
        "catalog",
        $iblockType,
        WIZARD_SITE_ID,
        $permissions
    );

    if ($iblockID < 1)
        return;

    //IBlock fields
    $iblock = new CIBlock;
    $arFields = array(
        "ACTIVE" => "Y",
        "FIELDS" => array('IBLOCK_SECTION' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',), 'ACTIVE' => array('IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => 'Y',), 'ACTIVE_FROM' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '=today',), 'ACTIVE_TO' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',), 'SORT' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',), 'NAME' => array('IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => '',), 'PREVIEW_PICTURE' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => array('FROM_DETAIL' => 'N', 'SCALE' => 'N', 'WIDTH' => '', 'HEIGHT' => '', 'IGNORE_ERRORS' => 'N',),), 'PREVIEW_TEXT_TYPE' => array('IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => 'text',), 'PREVIEW_TEXT' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',), 'DETAIL_PICTURE' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => array('SCALE' => 'N', 'WIDTH' => '', 'HEIGHT' => '', 'IGNORE_ERRORS' => 'N',),), 'DETAIL_TEXT_TYPE' => array('IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => 'text',), 'DETAIL_TEXT' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',), 'XML_ID' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',), 'CODE' => array('IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => ['UNIQUE' => 'Y', 'TRANSLITERATION' => 'Y']), 'TAGS' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',),),
        "CODE" => $iblockCode,
        "XML_ID" => $iblockCode,
        "NAME" => $iblock->GetArrayByID($iblockID, "NAME"),
    );

    $iblock->Update($iblockID, $arFields);
} else {
    $arSites = array();
    $db_res = CIBlock::GetSite($iblockID);
    while ($res = $db_res->Fetch())
        $arSites[] = $res["LID"];
    if (!in_array(WIZARD_SITE_ID, $arSites)) {
        $arSites[] = WIZARD_SITE_ID;
        $iblock = new CIBlock;
        $iblock->Update($iblockID, array("LID" => $arSites));
    }
}

$bitrixTemplateDir = $_SERVER["DOCUMENT_ROOT"] . "/local/templates/";
$arPathReplace = [
    WIZARD_SITE_ROOT_PATH . "/local/php_interface/".WIZARD_SITE_ID."/init.php",
    WIZARD_SITE_PATH . '/catalog/index.php',
    WIZARD_SITE_PATH . '/compare/index.php',
    WIZARD_SITE_PATH . '/favorite/index.php',
    WIZARD_SITE_PATH . '/search/index.php',
    WIZARD_SITE_PATH . '/include/index_new.php',
    WIZARD_SITE_PATH . '/include/index_hit.php',
    $bitrixTemplateDir . 'arlight/header.php',
    $bitrixTemplateDir . 'arlight/components/bitrix/menu/bottom_menu/template.php',
    $bitrixTemplateDir . 'arlight/components/bitrix/search.page/.default/template.php',
    $bitrixTemplateDir . 'arlight/components/bitrix/menu/top_menu/template.php',
    $bitrixTemplateDir . 'arlight/components/bitrix/catalog/.default/section.php',
    $bitrixTemplateDir . 'arlight/components/bitrix/news/news/bitrix/news.detail/.default/template.php',
    $bitrixTemplateDir . 'arlight/components/bitrix/search.page/template1/template.php',
    $bitrixTemplateDir . 'arlight/components/bitrix/catalog.element/.default/template.php',
    $bitrixTemplateDir . 'arlight/components/bitrix/news/news_new/bitrix/news.detail/.default/template.php',
    $bitrixTemplateDir . 'arlight/components/bitrix/catalog/.default/section_vertical.php'
];


foreach ($arPathReplace as $path)
    CWizardUtil::ReplaceMacros($path, array("CATALOG_IBLOCK_ID" => $iblockID));

unset($path);

//настройки для модуля корзины
$module_id = 'itertech.cart';

use \Bitrix\Main\Config\Option;

global $USER;
Option::set($module_id, 'IBLOCK_ID_' . WIZARD_SITE_ID, $iblockID);

//установить настройки для свойств, которые будут выводиться на странице списка товаров
$arPropToList = ['ARTICLE', 'DESCRIPTION', 'COLOR_HREF', 'COLOR_TITLE'];
foreach ($arPropToList as $code) {
    $idProp = '';
    $res = CIBlockProperty::GetByID($code, $iblockID, "catalog");
    if ($ar_res = $res->GetNext())
        $idProp = $ar_res['ID'];

    if ($idProp > 0) {
        $arFields = array(
            'FEATURES' => [
                [
                    'IS_ENABLED' => 'Y',
                    'MODULE_ID' => 'iblock',
                    'FEATURE_ID' => 'LIST_PAGE_SHOW'
                ]
            ]
        );
        $ibp = new CIBlockProperty;
        $ibp->Update($idProp, $arFields);
    }
}
unset($code, $idProp, $arFields);
?>
