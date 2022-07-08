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
?>
<div class="news ">
    <div class="row">
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="col-md-4" data-calc-id="<?= $arItem['PROPERTIES']['CALC_ID']['VALUE'] ?>"
                 id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <div class="news-item">
                    <div class="news-item__img calc__img-wrap">
                        <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="info__img-link" data-service="OPEN_CALC"></a>
                        <? if ($arItem["PREVIEW_PICTURE"]): ?>
                            <img src="<?= ALResize($arItem["PREVIEW_PICTURE"]['ID'], 503) ?>"
                                 alt="<? echo $arItem["NAME"] ?>">
                        <? else: ?>
                            <img src="<?= SITE_TEMPLATE_PATH ?>/img/not_img.png"
                                 alt="<? echo $arItem["NAME"] ?>">
                        <? endif; ?>
                    </div>
                    <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="news-item__title">
                        <span> <? echo $arItem["NAME"] ?></span>
                    </a>
                </div>
            </div>
        <? endforeach; ?>
    </div>
    <?= $arResult["NAV_STRING"] ?>
</div>

