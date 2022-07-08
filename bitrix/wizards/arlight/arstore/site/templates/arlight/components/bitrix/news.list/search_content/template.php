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
<div class="news <?= ($arResult["NAV_STRING"] ? '' : 'news_mb') ?>">
    <div class="row">
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="<?if($row2):?>col-md-6<?else:?>col-md-4<?endif;?>" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <div class="news-item">
                    <div class="news-item__img">
                        <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"></a>
                        <? if ($arItem["PREVIEW_PICTURE"]): ?>
                            <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<? echo $arItem["NAME"] ?>">
                        <? else: ?>
                            <img src="<?= SITE_TEMPLATE_PATH ?>/img/default-img.jpg" alt="<? echo $arItem["NAME"] ?>">
                        <? endif; ?>
                    </div>
                    <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="news-item__title"><span><? echo $arItem["NAME"] ?></span></a>
                    <? if ($arItem["PREVIEW_TEXT"]): ?>
                        <div class="news-item__text"><? echo mb_strimwidth(strip_tags($arItem["~PREVIEW_TEXT"]), 0, 225, "...");; ?></div>
                    <? endif; ?>
                </div>
            </div>
        <? endforeach; ?>
    </div>
    <?= $arResult["NAV_STRING"] ?>
</div>
