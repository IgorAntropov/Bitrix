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
use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;

$this->setFrameMode(true);
//$this->addExternalCss("/bitrix/css/main/bootstrap.css");

if (!isset($arParams['FILTER_VIEW_MODE']) || (string)$arParams['FILTER_VIEW_MODE'] == '')
    $arParams['FILTER_VIEW_MODE'] = 'VERTICAL';
$arParams['USE_FILTER'] = (isset($arParams['USE_FILTER']) && $arParams['USE_FILTER'] == 'Y' ? 'Y' : 'N');

$isVerticalFilter = ('Y' == $arParams['USE_FILTER'] && $arParams["FILTER_VIEW_MODE"] == "VERTICAL");
$isSidebar = ($arParams["SIDEBAR_SECTION_SHOW"] == "Y" && isset($arParams["SIDEBAR_PATH"]) && !empty($arParams["SIDEBAR_PATH"]));
$isFilter = ($arParams['USE_FILTER'] == 'Y');

$arResult["SECTION_ID"] = CIBlockFindTools::GetSectionID(
    $arResult["VARIABLES"]["SECTION_ID"],
    $arResult["VARIABLES"]["SECTION_CODE"],
    array("IBLOCK_ID" => $arParams["IBLOCK_ID"])
);


$sResult = CIBlockSection::GetByID($arResult["SECTION_ID"]);
if($sArResult = $sResult->GetNext())

if ($isFilter) {
    $arFilter = array(
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "ACTIVE" => "Y",
        "GLOBAL_ACTIVE" => "Y",
    );
    if (0 < intval($arResult["VARIABLES"]["SECTION_ID"]))
        $arFilter["ID"] = $arResult["VARIABLES"]["SECTION_ID"];
    elseif ('' != $arResult["VARIABLES"]["SECTION_CODE"])
        $arFilter["=CODE"] = $arResult["VARIABLES"]["SECTION_CODE"];

    $obCache = new CPHPCache();
    if ($obCache->InitCache(36000, serialize($arFilter), "/iblock/catalog")) {
        $arCurSection = $obCache->GetVars();
    } elseif ($obCache->StartDataCache()) {
        $arCurSection = array();
        if (Loader::includeModule("iblock")) {
            $dbRes = CIBlockSection::GetList(array(), $arFilter, false, array("ID"));

            if (defined("BX_COMP_MANAGED_CACHE")) {
                global $CACHE_MANAGER;
                $CACHE_MANAGER->StartTagCache("/iblock/catalog");

                if ($arCurSection = $dbRes->Fetch())
                    $CACHE_MANAGER->RegisterTag("iblock_id_" . $arParams["IBLOCK_ID"]);

                $CACHE_MANAGER->EndTagCache();
            } else {
                if (!$arCurSection = $dbRes->Fetch())
                    $arCurSection = array();
            }
        }
        $obCache->EndDataCache($arCurSection);
    }
    if (!isset($arCurSection))
        $arCurSection = array();
}
?>
<? if (SITE_DIR . 'catalog/' == $APPLICATION->GetCurPage(false)): ?>
    <? $APPLICATION->IncludeComponent("bitrix:catalog.section.list", "main", Array(
        "ADD_SECTIONS_CHAIN" => "N",    // �������� ������ � ������� ���������
        "CACHE_GROUPS" => "Y",    // ��������� ����� �������
        "CACHE_TIME" => "36000000",    // ����� ����������� (���.)
        "CACHE_TYPE" => "A",    // ��� �����������
        "COUNT_ELEMENTS" => "Y",    // ���������� ���������� ��������� � �������
        "IBLOCK_ID" => "#CATALOG_IBLOCK_ID#",    // ��������
        "IBLOCK_TYPE" => "",    // ��� ���������
        "SECTION_CODE" => "",    // ��� �������
        "SECTION_FIELDS" => array(    // ���� ��������
            0 => "",
            1 => "",
        ),
        "SECTION_ID" => "",    // ID �������
        "SECTION_URL" => "",    // URL, ������� �� �������� � ���������� �������
        "SECTION_USER_FIELDS" => array(    // �������� ��������
            0 => "",
            1 => "",
        ),
        "SHOW_PARENT_NAME" => "Y",    // ���������� �������� �������
        "TOP_DEPTH" => "1",    // ������������ ������������ ������� ��������
        "VIEW_MODE" => "LINE",    // ��� ������ �����������
    ),
        false
    ); ?>
<? else: ?>
    <div class="title title-page">
        <div class="title__text"><h1><? $APPLICATION->ShowProperty('seo_title'); ?></h1></div>
        <div class="title__backlink">
            <i class="icon-arrow-left"></i>
            <a href=""><?=GetMessage("ARLIGHT_ARSTORE_VERNUTQSA")?></a>
        </div>
    </div>
    <div class="catalog">
        <?
        if ($isVerticalFilter)
            include($_SERVER["DOCUMENT_ROOT"] . "/" . $this->GetFolder() . "/section_vertical.php");
        else
            include($_SERVER["DOCUMENT_ROOT"] . "/" . $this->GetFolder() . "/section_horizontal.php");
        ?>
    </div>
<? endif; ?>

