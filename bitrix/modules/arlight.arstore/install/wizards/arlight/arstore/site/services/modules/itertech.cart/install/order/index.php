<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle(GetMessage("ARLIGHT_ARSTORE_OFORMLENIE_ZAKAZA"));
?>
<?
$APPLICATION->IncludeComponent(
    "itertech:smallcart",
    "fullcart",
    array(
        "LIST_PROPERTY_CODE" => array()
    ),
    false
);
?>
<?$APPLICATION->IncludeComponent(
	"itertech:checkout",
	"",
	Array(),
	false
);?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>