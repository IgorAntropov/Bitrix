<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
use Bitrix\Main\Loader;

if (!Loader::includeModule('iblock'))
    return;

$arComponentParameters = array(
    "GROUPS" => array(),
    "PARAMETERS" => array(
        "ADD_IMAGE_DELIVERY" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("ADD_IMAGE_DELIVERY"),
            "TYPE" => "CHECKBOX",
            "MULTIPLE" => "N",
            "REFRESH" => "N",
            "DEFAULT" => "",
        ),
        "IMAGE_WIDTH_DELIVERY" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("IMAGE_WIDTH_DELIVERY"),
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "REFRESH" => "N",
            "DEFAULT" => "70",
        ),
        "IMAGE_HEIGHT_DELIVERY" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("IMAGE_HEIGHT_DELIVERY"),
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "REFRESH" => "N",
            "DEFAULT" => "70",
        ),
        "ADD_IMAGE_PAYMENT" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("ADD_IMAGE_PAYMENT"),
            "TYPE" => "CHECKBOX",
            "MULTIPLE" => "N",
            "REFRESH" => "N",
            "DEFAULT" => "",
        ),
        "IMAGE_WIDTH_PAYMENT" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("IMAGE_WIDTH_PAYMENT"),
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "REFRESH" => "N",
            "DEFAULT" => "70",
        ),
        "IMAGE_HEIGHT_PAYMENT" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("IMAGE_HEIGHT_PAYMENT"),
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "REFRESH" => "N",
            "DEFAULT" => "70",
        ),
    ),
);
?>