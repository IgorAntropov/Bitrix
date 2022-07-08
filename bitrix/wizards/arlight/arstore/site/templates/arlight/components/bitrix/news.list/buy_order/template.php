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
<div class="map__list">
    <div class="map__list-block">
        <? foreach ($arResult["ITEMS"] as $key =>$arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="map__list-item" data-linum="<?=$key+1?>" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <div class="map__list-link-block">
                    <input type="radio" id="map_store_<?=$key+1?>" class="input__radio" name="map_store">
                    <label for="map_store_<?=$key+1?>">
                    <span class=" "
                       data-coords="<?= $arItem['PROPERTIES']['COORD']['VALUE'] ?>"><?=GetMessage("ARLIGHT_ARSTORE_G")?><?= $arItem['PROPERTIES']['ADDRESS_CITY']['VALUE'] ?>
                        , <?= $arItem['PROPERTIES']['ADDRESS']['VALUE'] ?></span>
                    </label>
                </div>
                <div class="">
                    <? foreach ($arItem['PROPERTIES']['PHONE']['VALUE'] as $value): ?>
                        <a href="tel:+<?= preg_replace('/[^0-9]/', '', strip_tags($value)) ?>"
                           class="map__link-phone hover-border"><?= $value ?></a><br>
                    <? endforeach; ?>
                </div>
            </div>
        <? endforeach; ?>
    </div>
</div>