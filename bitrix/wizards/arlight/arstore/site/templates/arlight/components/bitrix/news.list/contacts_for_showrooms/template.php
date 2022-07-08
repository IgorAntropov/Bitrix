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
$addLine = false;
if (count($arResult["ITEMS"]) > 1) $addLine = true;
?>

<? foreach ($arResult["ITEMS"] as $arItem): ?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    $propValueStr = $arItem['PROPERTIES']['PROPERTY']['~VALUE'];
    $propValueAr = json_decode($propValueStr, true);
    $emailStr = $arItem["DISPLAY_PROPERTIES"]['EMAIL']["DISPLAY_VALUE"];
    $address = $arItem["DISPLAY_PROPERTIES"]["ADDRESS_CITY"]["VALUE"] . ', ' . $arItem["DISPLAY_PROPERTIES"]["ADDRESS"]["VALUE"];
    $phoneStr = $arItem["DISPLAY_PROPERTIES"]["PHONE"]["DISPLAY_VALUE"];
    $schedule = $arItem["DISPLAY_PROPERTIES"]["SCHEDULE"]["VALUE"];
    $phoneAr = explode(';', $phoneStr);
    $emailAr = explode(';', $emailStr);
    $scheduleAr = explode(';', $schedule);
    ?>
    <?php if ($propValueAr['type']['brandshowroom'] == 'Y'): ?>
        <div>
            <? foreach ($phoneAr as $phone): ?>
                <a class="showroom__contacts-phone" href="tel:<?= $phone ?>"><?= $phone ?></a>
            <? endforeach; ?>
            <? foreach ($emailAr as $email): ?>
                <a class="showroom__contacts-email" href="tel:<?= $email ?>"><?= $email ?></a>
            <? endforeach; ?>
            <p class="showroom__contacts-address"><?= $address ?></p>
            <p class="showroom__contacts-work"><?=GetMessage("ARLIGHT_ARSTORE_VREMA_RABOTY")?><? foreach ($scheduleAr as $scheduleItem) {
                    $scheduleItem = trim(str_replace('&', ': ', $scheduleItem));
                    if ($scheduleItem != ':') echo '<span>' . $scheduleItem . '</span>';
                }
                ?>
            </p>
        </div>
        <?php if ($addLine): ?>
            <br>
        <?php endif; ?>
    <?php endif; ?>
<?php endforeach; ?>