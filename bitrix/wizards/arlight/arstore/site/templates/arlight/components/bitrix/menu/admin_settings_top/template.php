<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)): ?>
    <div class="personal__tabs">
        <?
        foreach ($arResult as $arItem):
            if(!$USER->IsAdmin() && $arItem["TEXT"] == GetMessage("ARLIGHT_ARSTORE_UPRAVLENIE_KONTENTOM")) continue;

            if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                continue;
            ?>
            <? if ($arItem["SELECTED"]): ?>
            <div class="personal__tabs-item">
                <a href="<?= $arItem["LINK"] ?>" class="personal__tabs-link active_el"><?= $arItem["TEXT"] ?></a>
            </div>
        <? else: ?>
            <div class="personal__tabs-item">
                <a href="<?= $arItem["LINK"] ?>" class="personal__tabs-link"><?= $arItem["TEXT"] ?></a>
            </div>
        <? endif ?>
        <? endforeach ?>
    </div>
<? endif ?>


