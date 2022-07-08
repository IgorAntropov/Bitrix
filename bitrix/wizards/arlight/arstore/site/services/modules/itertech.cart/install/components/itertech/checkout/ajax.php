<?
define("STOP_STATISTICS", true);
define('NO_AGENT_CHECK', true);

global $APPLICATION, $USER;

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main\Loader;
use Bitrix\Main\Context;

$module_id = 'itertech.cart';

if (!Loader::includeModule($module_id)){
    die('Module '.$module_id.' not installed!');
}

$request = Context::getCurrent()->getRequest();
$response = array();
if (!check_bitrix_sessid() || !$request->isPost()) {
    $response['result'] = 'error';
    $response['result_mess'] = 'ERROR AJAX';
    header('Content-Type: application/json; charset='.LANG_CHARSET);
}
if($request["method"] == "addItemToCart"){
    $response = WorkCart::addItemToCart($request["id"], $request["quantity"], $request["params"], $request["func"]);
    header('Content-Type: application/json; charset='.LANG_CHARSET);
}
if($request["method"] == "getItemsFromCart"){
    $response = WorkCart::getItemsFromCart($request["params"], $request["siteId"]);
    header('Content-Type: application/json; charset='.LANG_CHARSET);
}
$APPLICATION->RestartBuffer();
header('Content-Type: application/json; charset='.LANG_CHARSET);
echo \Bitrix\Main\Web\Json::encode($response);
die();