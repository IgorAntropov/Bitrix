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
<div class="map__list scrollbar-macosx" id="map__list">
    <div class="map__list-block ">
        <? foreach ($arResult["ITEMS"] as $key => $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="map__list-item" data-linum="<?= $key + 1 ?>" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <div class="map__list-link-block">
                    <a class=" map__link" href="#"
                       data-coords="<?= $arItem['PROPERTIES']['COORD']['VALUE'] ?>"><?=GetMessage("ARLIGHT_ARSTORE_G")?><?= $arItem['PROPERTIES']['ADDRESS_CITY']['VALUE'] ?>
                        , <?= $arItem['PROPERTIES']['ADDRESS']['VALUE'] ?></a>
                </div>
                <div class="">
                    <? $value = array_shift($arItem['PROPERTIES']['PHONE']['VALUE']);
                    $val = GetArrayOrString($value);
                    if (is_array($val)) {
                        foreach ($val as $value): ?>  <a class="map__link-phone hover-border"
                                                         href="tel:+<?= preg_replace('/[^0-9]/', '', strip_tags($value)) ?>"><?= $value ?></a>
                            <br>
                        <? endforeach;
                    } else { ?>    <a class="map__link-phone hover-border"
                                      href="tel:+<?= preg_replace('/[^0-9]/', '', strip_tags($value)) ?>"><?= $val ?></a>
                    <? } ?>
                </div>
                <div class="map__link-email--list">
                <?php if ($arItem['PROPERTIES']['EMAIL']['VALUE']) { ?>
                    <? $value = array_shift($arItem['PROPERTIES']['EMAIL']['VALUE']);
                    $val = GetArrayOrString($value);
                    if (is_array($val)) {
                        foreach ($val as $value): ?>
                            <a class="map__link-email hover-border" href="mailto:<?= $value ?>"><?= $value ?></a>
                            <br> <? endforeach; ?><? } else { ?>
                        <a class="map__link-email hover-border" href="mailto:<?= $value ?>"><?= $val ?></a> <? } ?>
                <?php } ?>
                </div>
            </div>
        <? endforeach; ?>
    </div>
</div>
<div class="map__list-more ">
    <a href="javascript:void(0)" class="">
        <i class="icon-arrow-down-double"></i>
    </a>
</div>