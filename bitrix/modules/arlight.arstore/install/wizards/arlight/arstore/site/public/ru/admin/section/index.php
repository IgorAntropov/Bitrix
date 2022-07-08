<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Управление индивидуальными разделами");
require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR."admin/top_menu.php"); ?>
<? $APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"admin_settings", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"COMPONENT_TEMPLATE" => "admin_settings",
		"ROOT_MENU_TYPE" => "left",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"USE_EXT" => "N",
		"MENU_THEME" => "site"
	),
	false
); ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>