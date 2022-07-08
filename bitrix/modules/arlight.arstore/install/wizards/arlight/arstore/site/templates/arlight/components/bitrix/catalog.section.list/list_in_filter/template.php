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
$this->setFrameMode(true);

$strTitle = "";
$curPage = $APPLICATION->GetCurPage();
$cSect = $arSection['SECTION_PAGE_URL'];
?>

<h3 class="title title--additional title--indent-bottom"><?=GetMessage("ARLIGHT_ARSTORE_KATEGORII")?></h3>

<?
$TOP_DEPTH = $arResult["SECTION"]["DEPTH_LEVEL"];
$CURRENT_DEPTH = $TOP_DEPTH;

foreach ($arResult["SECTIONS"] as &$arSection)
{
$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));

//if ($arSection['SECTION_PAGE_URL'] == $curPage) {
if (strripos($curPage, $arSection['SECTION_PAGE_URL'])===0) {
    $cat_item_data_active = 'active_el';
    ?>

    <?
    $navChain = CIBlockSection::GetNavChain(CATALOG_ID, $arSection['ID']);
    while ($arNav = $navChain->GetNext()):
        $APPLICATION->AddChainItem($arNav["NAME"], $arNav["SECTION_PAGE_URL"]);
    endwhile;
} else {
    $cat_item_data_active = '';
}

if ($CURRENT_DEPTH < $arSection["DEPTH_LEVEL"]) {
    if ($arSection["DEPTH_LEVEL"] > 1) {
        echo "\n", str_repeat("\t", $arSection["DEPTH_LEVEL"] - $TOP_DEPTH), "<ul class='categories-list categories-list--sub'>";
    } else {
        echo "\n", str_repeat("\t", $arSection["DEPTH_LEVEL"] - $TOP_DEPTH), "<ul class='categories-list '>";
    }
} elseif ($CURRENT_DEPTH == $arSection["DEPTH_LEVEL"]) {
    echo "</li>";
} else {
    while ($CURRENT_DEPTH > $arSection["DEPTH_LEVEL"]) {
        echo "</li>";
        echo "\n", str_repeat("\t", $CURRENT_DEPTH - $TOP_DEPTH), "</ul>", "\n", str_repeat("\t", $CURRENT_DEPTH - $TOP_DEPTH - 1);
        $CURRENT_DEPTH--;
    }
    echo "\n", str_repeat("\t", $CURRENT_DEPTH - $TOP_DEPTH), "</li>";
}

$count = $arParams["COUNT_ELEMENTS"] && $arSection["ELEMENT_CNT"] ? "&nbsp;(" . $arSection["ELEMENT_CNT"] . ")" : "";

$link = '<a class="categories-list__link ' . $cat_item_data_active . '" href="' . $arSection["SECTION_PAGE_URL"] . '">' . $arSection["NAME"] . $count . '</a>';

echo "\n", str_repeat("\t", $arSection["DEPTH_LEVEL"] - $TOP_DEPTH);
?>
<li id="<?= $this->GetEditAreaId($arSection['ID']); ?>" class="categories-list__item">
    <?= $link ?>
    <?
    $CURRENT_DEPTH = $arSection["DEPTH_LEVEL"];
    }
    while ($CURRENT_DEPTH > $TOP_DEPTH) {
        echo "</li>";
        echo "\n", str_repeat("\t", $CURRENT_DEPTH - $TOP_DEPTH), "</ul>", "\n", str_repeat("\t", $CURRENT_DEPTH - $TOP_DEPTH - 1);
        $CURRENT_DEPTH--;
    }
    ?>


