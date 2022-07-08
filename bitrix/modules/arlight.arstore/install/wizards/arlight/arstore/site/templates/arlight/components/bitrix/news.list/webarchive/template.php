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

<div class="news news_catalog <?= ($arResult["NAV_STRING"] ? '' : 'news_mb') ?>">
    <div class="row">
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <div class="col-lg-4 col-xl-3 col-md-6" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <div class="news-item">
                    <div class="news-item__img">
                        <? if ($USER->IsAuthorized()): ?>
                            <a href="<?= $arItem['PROPERTIES']['EVENT_VIDEO']['VALUE'][0] ?>" data-fancybox="gallery"></a>
                        <? else :?>
                            <a data-fancybox href="#popup-auth" data-name="auth-form"></a>
                        <? endif; ?>
                        <?
                        $resImage['src'] = SITE_TEMPLATE_PATH.'/img/default-img.jpg';
                        if ($arItem["PREVIEW_PICTURE"])
                            $resImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width' => 420, 'height' => 420), BX_RESIZE_IMAGE_EXACT, true);
                        ?>
                        <img src="<?= $resImage['src'] ?>" alt="<? echo $arItem["NAME"] ?>">
                    </div>
                    <? if ($USER->IsAuthorized()): ?>
                    <a href="<?= $arItem['PROPERTIES']['EVENT_VIDEO']['VALUE'][0] ?>" data-fancybox="gallery" class="news-item__title">
                    <? else :?>
                    <a data-fancybox href="#popup-auth" data-name="auth-form" class="news-item__title">
                    <? endif; ?>
                        <span><? echo $arItem["NAME"] ?></span></a>
                    <div class="news-item__text"><?= $arItem["PREVIEW_TEXT"] ?></div>
                </div>
            </div>
        <? endforeach; ?>
        <div class="col-12">
            <?= $arResult["NAV_STRING"] ?>
        </div>
    </div>
</div>
