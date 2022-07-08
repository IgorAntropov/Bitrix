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
    'LIST' => array(
        'CONT' => 'bx_sitemap',
        'TITLE' => 'bx_sitemap_title',
        'LIST' => 'bx_sitemap_ul',
    ),
    'LINE' => array(
        'CONT' => 'bx_catalog_line',
        'TITLE' => 'bx_catalog_line_category_title',
        'LIST' => 'bx_catalog_line_ul',
        'EMPTY_IMG' => $this->GetFolder() . '/images/line-empty.png'
    ),
    'TEXT' => array(
        'CONT' => 'bx_catalog_text',
        'TITLE' => 'bx_catalog_text_category_title',
        'LIST' => 'bx_catalog_text_ul'
    ),
    'TILE' => array(
        'CONT' => 'bx_catalog_tile',
        'TITLE' => 'bx_catalog_tile_category_title',
        'LIST' => 'bx_catalog_tile_ul',
        'EMPTY_IMG' => $this->GetFolder() . '/images/tile-empty.png'
    )
);
$arCurView = $arViewStyles[$arParams['VIEW_MODE']];

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));
?>

<div class="catalog-main">
    <div class="categories categories-main">
        <div class="">
            <?
            if ('Y' == $arParams['SHOW_PARENT_NAME'] && 0 < $arResult['SECTION']['ID']) {
                $this->AddEditAction($arResult['SECTION']['ID'], $arResult['SECTION']['EDIT_LINK'], $strSectionEdit);
                $this->AddDeleteAction($arResult['SECTION']['ID'], $arResult['SECTION']['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

                ?>
                <div class="title title-page <? echo $arCurView['TITLE']; ?>"
                     id="<? echo $this->GetEditAreaId($arResult['SECTION']['ID']); ?>">
                    <div class="title__text">
                        <?= $arResult['SECTION']['NAME'] ?>
                    </div>
                    <div class="title__backlink">
                        <i class="icon-arrow-left"></i>
                        <a href=""><?=GetMessage("ARLIGHT_ARSTORE_VERNUTQSA")?></a>
                    </div>
                </div>
                <?
            }
            if (0 < $arResult["SECTIONS_COUNT"]) {
                $count = count($arResult['SECTIONS']);
                $residue = $count % 4;
                ?>
                <div class="row">
                    <?
                    switch ($residue) {
                        case 0:
                            ?>
                            <?
                            foreach ($arResult['SECTIONS'] as $key => &$arSection) {
                                $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
                                $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

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
                                <div class="<?= ($count == 4) ? 'col-md-6' : 'col-md-3' ?>">
                                    <div id="<? echo $this->GetEditAreaId($arSection['ID']); ?>"
                                         class="categories__item ">
                                        <div class="categories__img"
                                             style="background-image: url('<? echo $arSection['PICTURE']['SRC']; ?>')"></div>
                                        <a href="<? echo $arSection['SECTION_PAGE_URL']; ?>" class="categories__link">
                                            <div class="categories__title">
                                                <div class="categories__link-block">
                                                    <? echo $arSection['NAME']; ?>
                                                </div>
                                                <span class="categories__link-count">
                                                        <?CountElementInSection($arSection['ID'])?>
                                                    </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <?
                            }
                            ?>
                            <?
                            break;
                        case 1:
                            ?>
                            <? $arrAll = $arResult['SECTIONS'];
                            $lastEl = array_pop($arrAll);
                            ?>
                            <?
                            foreach ($arResult['SECTIONS'] as $key => &$arSection) {
                                $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
                                $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

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
                                <? if ($key + 1 == $count): ?>
                                    <div class="col-md-12">
                                        <div id="<? echo $this->GetEditAreaId($arSection['ID']); ?>"
                                             class="categories__item ">
                                            <div class="categories__img"
                                                 style="background-image: url('<? echo $arSection['PICTURE']['SRC']; ?>')"></div>
                                            <a href="<? echo $arSection['SECTION_PAGE_URL']; ?>"
                                               class="categories__link">
                                                <div class="categories__title">
                                                    <div class="categories__link-block">
                                                        <? echo $arSection['NAME']; ?>
                                                    </div>
                                                    <span class="categories__link-count">
                                                        <?CountElementInSection($arSection['ID'])?>
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <? else: ?>
                                    <div class="col-md-3">
                                        <div id="<? echo $this->GetEditAreaId($arSection['ID']); ?>"
                                             class="categories__item ">
                                            <div class="categories__img"
                                                 style="background-image: url('<? echo $arSection['PICTURE']['SRC']; ?>')"></div>
                                            <a href="<? echo $arSection['SECTION_PAGE_URL']; ?>"
                                               class="categories__link">
                                                <div class="categories__title">
                                                    <div class="categories__link-block">
                                                        <? echo $arSection['NAME']; ?>
                                                    </div>
                                                    <span class="categories__link-count">
                                                        <?CountElementInSection($arSection['ID'])?>
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <? endif; ?>
                                <?
                            }
                            ?>
                            <?
                            break;
                        case 2:
                            ?>
                            <?
                            foreach ($arResult['SECTIONS'] as $key => &$arSection) {
                                $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
                                $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

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
                                <? if ($key == 0 || $key == 1): ?>

                                    <div class="col-md-6">
                                        <div id="<? echo $this->GetEditAreaId($arSection['ID']); ?>"
                                             class="categories__item ">
                                            <div class="categories__img"
                                                 style="background-image: url('<? echo $arSection['PICTURE']['SRC']; ?>')"></div>
                                            <a href="<? echo $arSection['SECTION_PAGE_URL']; ?>"
                                               class="categories__link">
                                                <div class="categories__title">
                                                    <div class="categories__link-block">
                                                        <? echo $arSection['NAME']; ?>
                                                    </div>
                                                    <span class="categories__link-count">
                                                        <?CountElementInSection($arSection['ID'])?>
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <?
                                else: ?>
                                    <div class="col-md-3">
                                        <div id="<? echo $this->GetEditAreaId($arSection['ID']); ?>"
                                             class="categories__item ">
                                            <div class="categories__img"
                                                 style="background-image: url('<? echo $arSection['PICTURE']['SRC']; ?>')"></div>
                                            <a href="<? echo $arSection['SECTION_PAGE_URL']; ?>"
                                               class="categories__link">
                                                <div class="categories__title">
                                                    <div class="categories__link-block">
                                                        <? echo $arSection['NAME']; ?>
                                                    </div>
                                                    <span class="categories__link-count">
                                                        <?CountElementInSection($arSection['ID'])?>
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <? endif; ?>
                                <?
                            }
                            unset($arSection);
                            ?>
                            <?
                            break;
                        case 3:
                            ?>
                            <?
                            foreach ($arResult['SECTIONS'] as $key => &$arSection) {
                                $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
                                $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

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
                                <? if ($key == 0 || $key == 1 || $key == 2): ?>
                                    <div class="col-md-4">
                                        <div id="<? echo $this->GetEditAreaId($arSection['ID']); ?>"
                                             class="categories__item ">
                                            <div class="categories__img"
                                                 style="background-image: url('<? echo $arSection['PICTURE']['SRC']; ?>')"></div>
                                            <a href="<? echo $arSection['SECTION_PAGE_URL']; ?>"
                                               class="categories__link">
                                                <div class="categories__title">
                                                    <div class="categories__link-block">
                                                        <? echo $arSection['NAME']; ?>
                                                    </div>
                                                    <span class="categories__link-count">
                                                        <?CountElementInSection($arSection['ID'])?>
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <?
                                else: ?>
                                    <div class="col-md-3">
                                        <div id="<? echo $this->GetEditAreaId($arSection['ID']); ?>"
                                             class="categories__item ">
                                            <div class="categories__img"
                                                 style="background-image: url('<? echo $arSection['PICTURE']['SRC']; ?>')"></div>
                                            <a href="<? echo $arSection['SECTION_PAGE_URL']; ?>"
                                               class="categories__link">
                                                <div class="categories__title">
                                                    <div class="categories__link-block">
                                                        <? echo $arSection['NAME']; ?>
                                                    </div>
                                                    <span class="categories__link-count">
                                                        <?CountElementInSection($arSection['ID'])?>
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <? endif; ?>
                                <?
                            }
                            unset($arSection);
                            ?>
                            <?
                            break;
                    }
                    ?>

                </div>
                <?
                echo('LINE' != $arParams['VIEW_MODE'] ? '<div style="clear: both;"></div>' : '');
            }
            else{
                ?>
                <div class="catalog-main-empty">
                    <br><br>
                    <p class=""><?=GetMessage("ARLIGHT_ARSTORE_TOVARY_NE_NAYDENY")?></p>
<!--                    <a href="" class="button button_red"><?=GetMessage("ARLIGHT_ARSTORE_NAPOLNITQ_KATALOG_TO")?></a>-->
                    <br><br>
                </div>
                <?
            }
            ?>
        </div>
    </div>
</div>
