<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Восстановление пароля");
?>
<? $APPLICATION->IncludeComponent("bitrix:system.auth.forgotpasswd", ".default", Array(
	
	),
	false
); ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>