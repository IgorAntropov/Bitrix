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
<div class="newnews">
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="newnews-item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <div class="newnews-item__img">
                <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                    <? if ($arItem["PREVIEW_PICTURE"]): ?>
                        <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<? echo $arItem["NAME"] ?>">
                    <? else: ?>
                        <img src="<?= SITE_TEMPLATE_PATH ?>/img/default-img.jpg" alt="<? echo $arItem["NAME"] ?>">
                    <? endif; ?>
                </a>
            </div>
            <div class="newnews-item__content">
                <div class="newnews-item__date">
                    <?=GetMessage("ARLIGHT_ARSTORE_NOVOSTQ")?><?= $arItem['ACTIVE_FROM'] ?>
                </div>
                <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"
                   class="newnews-item__title"><? echo $arItem["NAME"] ?></a>
                <? if ($arItem["PREVIEW_TEXT"]): ?>
                    <div class="newnews-item__text"><? echo $arItem["~PREVIEW_TEXT"]; ?></div>
                <? endif; ?>
                <?
                $like = $arItem['PROPERTIES']['LIKE']['VALUE'];
                $dislike = $arItem['PROPERTIES']['DISLIKE']['VALUE'];
                if ($like || $dislike):
                    ?>
                    <div class="like-block">
                        <? if ($like):?>
                            <div class="like-block__item">
                                <i class="icon-ar-like"></i>
                                <span class="like-block__txt" id="like_<?=$arItem['ID']?>"><?= $like ?></span>
                            </div>
                        <? endif; ?>
                        <? if ($dislike):?>
                            <div class="like-block__item">
                                <i class="icon-ar-dislike"></i>
                                <span class="like-block__txt" id="dislike_<?=$arItem['ID']?>"><?= $dislike ?></span>
                            </div>
                        <? endif; ?>
                    </div>
                <? endif; ?>
            </div>
        </div>
    <? endforeach; ?>
    <?= $arResult["NAV_STRING"] ?>
</div>

