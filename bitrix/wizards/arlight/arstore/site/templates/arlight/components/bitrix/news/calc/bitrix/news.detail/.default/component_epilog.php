<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
global $lastModifiedDateTime;
if (!$lastModifiedDateTime) {
    $lastModifiedDateTime = MakeTimeStamp($arResult['TIMESTAMP_X']);
} else {
    $lastModifiedDateTime = max($lastModifiedDateTime, MakeTimeStamp($arResult['TIMESTAMP_X']));
}



$APPLICATION->AddChainItem($arResult["NAME"]);
?>