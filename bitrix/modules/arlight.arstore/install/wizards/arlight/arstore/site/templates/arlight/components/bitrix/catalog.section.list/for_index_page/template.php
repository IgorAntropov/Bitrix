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

$arViewModeList = $arResult['VIEW_MODE_LIST'];

$arViewStyles = array(
    'TILE' => array(
        'CONT' => 'bx_catalog_tile',
        'TITLE' => 'bx_catalog_tile_category_title',
        'LIST' => 'bx_catalog_tile_ul',
        'EMPTY_IMG' => SITE_TEMPLATE_PATH . '/img/not_img.png'
    )
);

$arCurView = $arViewStyles[$arParams['VIEW_MODE']];
$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

$arPopularSections = [100002, 100011, 100010, 100008, 100006, 100001];
?>
<div class="index-catalog">
    <div class="container">
        <div class="title"><?=GetMessage("ARLIGHT_ARSTORE_KATALOG")?></div>
        <div class="title_sub"><?=GetMessage("ARLIGHT_ARSTORE_POPULARNYE_RAZDELY")?></div>
        <div class="index-catalog--wrap"><?
            if (0 < $arResult["SECTIONS_COUNT"]) {
                ?>
                <div class="row">
                    <?
                    foreach ($arResult['SECTIONS'] as &$arSection) {
                        $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
                        $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

                        if (!in_array($arSection['XML_ID'], $arPopularSections)) continue;

                        $name = $arSection['NAME'];
                        if (stristr($name, GetMessage("ARLIGHT_ARSTORE_SVETODIODNYE")))
                            $name = str_replace(GetMessage("ARLIGHT_ARSTORE_SVETODIODNYE"), '', $name);

                        if (false === $arSection['PICTURE'])
                            $arSection['PICTURE'] = array(
                                'SRC' => $arCurView['EMPTY_IMG'],
                                'ALT' => (
                                '' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
                                    ? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
                                    : $arSection["NAME"]
                                ),
                                'TITLE' => (
                                '' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
                                    ? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
                                    : $arSection["NAME"]
                                )
                            );
                        ?>
                        <div class="col-lg-4 col-md-6" id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
                            <a href="<? echo $arSection['SECTION_PAGE_URL']; ?>"
                               style="background-image:url('<? echo $arSection['PICTURE']['SRC']; ?>');"
                               title="<? echo $arSection['PICTURE']['TITLE']; ?>" class="index-catalog__wrap">
                                <div class="index-catalog__title"><? echo $name; ?></div>
                            </a>
                        </div>
                        <?
                    }
                    ?>
                </div>
                <?
            }
            ?>
        </div>
    </div>
</div>