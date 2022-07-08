<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Loader;
if (!Loader::includeModule('iblock'))
    return;

$arComponentParameters = array(
    "GROUPS" => array(),
    "PARAMETERS" => array(
        "LIST_PROPERTY_CODE" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("SMALL_CART_IBLOCK_PROPERTY"),
            "TYPE" => "STRING",
            "MULTIPLE" => "Y",
            "REFRESH" => "N",
            "DEFAULT" => "",
        ),
        "SITE_ID" => SITE_ID
    ),
);
?>