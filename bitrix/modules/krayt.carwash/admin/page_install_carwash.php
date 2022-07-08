<?php define('ADMIN_MODULE_NAME', 'krayt.carwash');

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Application;

require_once $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_before.php';
CModule::IncludeModule("iblock");

global $APPLICATION, $USER, $USER_FIELD_MANAGER;

Loc::loadMessages(__FILE__);


if (!$USER->IsAdmin())
{
    if($APPLICATION->GetUserRight("krayt.carwash") == "D")
        $APPLICATION->AuthForm(GetMessage("ACCESS_DENIED"));
}

if (!CModule::IncludeModule(ADMIN_MODULE_NAME))
{
    $APPLICATION->AuthForm(GetMessage("ACCESS_DENIED"));
}
// get row
$row = null;
$request = Application::getInstance()->getContext()->getRequest();

$APPLICATION->SetTitle(Loc::getMessage('TITLE_PAGE'));

require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");?>
<?$APPLICATION->IncludeComponent(
    "krayt:install_page",
    "",
    Array(
    "PAGE_CODE"=> "carwash"
    ),
    false,
    array(
        "HIDE_ICONS" => "Y"
    )
);?>

<?

require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");