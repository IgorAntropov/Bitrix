<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Регистрация пользователя");
?>
    <br>
    <br>
<?$APPLICATION->IncludeComponent(
	"bitrix:main.register", 
	"register_on_page", 
	array(
		"AUTH" => "Y",
		"REQUIRED_FIELDS" => array(
            0 => "NAME",
            1 => "EMAIL",
            2 => "PERSONAL_PHONE",
		),
		"SET_TITLE" => "Y",
		"SHOW_FIELDS" => array(
            0 => "NAME",
            1 => "EMAIL",
            2 => "PERSONAL_PHONE",
		),
		"SUCCESS_PAGE" => SITE_DIR,
		"USER_PROPERTY" => array(
			0 => "UF_TYPEPAYER",
		),
		"USER_PROPERTY_NAME" => "",
		"USE_BACKURL" => "Y",
		"COMPONENT_TEMPLATE" => "register_on_page"
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>