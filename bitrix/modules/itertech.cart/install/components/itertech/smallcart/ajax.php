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

function ItemsFromCart($data, $idsCart = false, $siteId=SITE_ID){
    global $APPLICATION;
    $data['IDS_CART'] = $idsCart;
    $response = WorkCart::getItemsFromCart($data, $siteId);
    $_SESSION['currentSmallCart'] = $response;
    if($response){
        $data['SITE_ID'] = $siteId;
        ob_start();
        $APPLICATION->IncludeComponent(
            "itertech:smallcart",
            $data["TEMPLATE_NAME"],
            $data
        );
        $response['HTML'] = ob_get_contents();
        ob_end_flush();
    }
    return $response;
}

$request = Context::getCurrent()->getRequest();
$response = array();
if (!check_bitrix_sessid() || !$request->isPost() || !$request->isAjaxRequest()) {
    $response['result'] = 'error';
    $response['result_mess'] = 'ERROR AJAX';
    header('Content-Type: application/json; charset='.LANG_CHARSET);
}
if($request["method"] == "addItemToCart"){
    $idsCart = WorkCart::addItemToCart($request["id"], $request["quantity"], $request["params"], $request["func"], $request["siteId"]);
    if(!$idsCart)
        $idsCart = true;
    $response = ItemsFromCart($request["params"], $idsCart, $request["siteId"]);
    if($idsCart['SHOW_MESS_ADD']){
        $response['SHOW_MESS_ADD'] = $idsCart['SHOW_MESS_ADD'];
    }
    header('Content-Type: application/json; charset='.LANG_CHARSET);
}
if($request["method"] == "getItemsFromCart"){
    $response = ItemsFromCart($request["params"], false, $request["siteId"]);
    header('Content-Type: application/json; charset='.LANG_CHARSET);
}
if($request["method"] == "itemsFavorite"){
    $response = WorkCart::itemsFavorite($request["id"], $request["siteId"]);
    header('Content-Type: application/json; charset='.LANG_CHARSET);
}
if($request["method"] == "itemsCompare"){
    $response = WorkCart::itemsCompare($request["id"], $request["siteId"]);
    header('Content-Type: application/json; charset='.LANG_CHARSET);
}
if($request["method"] == "promocode"){
    $response = WorkCart::promocode(trim($request['params']), true, false, $request["siteId"]);
    header('Content-Type: application/json; charset='.LANG_CHARSET);
}
if($request["method"] == "getItemsFromOrderAdminEdit"){
    $response = WorkCart::getItemsFromCart($request["params"], $request["siteId"]);
    header('Content-Type: application/json; charset='.LANG_CHARSET);
}

$APPLICATION->RestartBuffer();
header('Content-Type: application/json; charset='.LANG_CHARSET);
echo \Bitrix\Main\Web\Json::encode($response);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_after.php");
die();