<?
$module_id = 'itertech.cart';
use \Bitrix\Main\Config\Option;

global $USER;
$USER_GROUPS_ADMIN = Option::get($module_id, 'USER_GROUPS_ADMIN_'.SITE_ID);
$USER_GROUPS_ADMIN = explode(',', $USER_GROUPS_ADMIN);
$myGroups = $USER->GetUserGroupArray();
$resArr = array_intersect($myGroups, $USER_GROUPS_ADMIN);
if(!empty($resArr)){
    define('IS_ADMIN_CATALOG', 'Y');
    global $APPLICATION;
    $APPLICATION->AddViewContent('ADMIN_LINK', '<a href="' . SITE_DIR . 'admin/">'.GetMessage("ARLIGHT_ARSTORE_ADMINISTRIROVANIE").'</a>');
}

CModule::AddAutoloadClasses($module_id, array(
    "WorkCart" => "classes/general/WorkCart.php",
    "WorkOrder" => "classes/general/WorkOrder.php",
    "WorkAdmin" => "classes/general/WorkAdmin.php",
    "PayOrder" => "classes/general/PayOrder.php",
));
?>