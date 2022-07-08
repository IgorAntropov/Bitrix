<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

if ($arResult["FILE"] <> '') {
    $content = get_include_contents($arResult["FILE"]);
    $firstSymb = substr($content, 0, 1);
    if ($firstSymb == 8)
        $phone = preg_replace('/[^0-9]/', '', strip_tags($content));
    else
        $phone = '+' . preg_replace('/[^0-9]/', '', strip_tags($content));
    $phoneCut = '';
    echo '<a class="link-icon" href="tel:' . $phone . '"><i class="icon-phone"></i><div>' . $content . '</div></a>';
}
