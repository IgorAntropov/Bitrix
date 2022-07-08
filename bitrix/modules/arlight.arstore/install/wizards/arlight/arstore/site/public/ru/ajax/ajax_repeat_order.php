<?
define("STOP_STATISTICS", true);
define('NO_AGENT_CHECK', true);
global $APPLICATION, $USER;
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
use \Bitrix\Main\Loader;
if($USER->IsAuthorized() && isset($_POST['check']) && isset($_POST['data'])){
    $siteId = SITE_ID;
    $module_id = 'itertech.cart';
    if (!Loader::includeModule($module_id)) {
        ShowError('Module '.$module_id.' not install');
        die();
    }
    if($_POST['check'] == 'yes'){
        $json = json_decode($_POST['data'], true);
        if(count($json)){
            $articles = [];
            foreach ($json as $article=>$quantity){
                $articles[] = $article;
            }
            $arSelect = ['ID', 'NAME', 'PROPERTY_ARTICLE'];
            $arFilter = [
                "IBLOCK_ID" => CATALOG_ID,
                "ACTIVE" => "Y",
                "PROPERTY_ARTICLE" => $articles,
                "!PROPERTY_OBSOLETE" => '-1'
            ];
            $res = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
            $products = [];
            $prodIDs = [];
            while($ob = $res->GetNextElement()) {
                $arFields = $ob->GetFields();
                $products[$arFields['PROPERTY_ARTICLE_VALUE']] = $arFields;
                $prodIDs[$arFields['PROPERTY_ARTICLE_VALUE']] = $arFields['ID'];
            }
            $_SESSION['repeat_order_ids'] = $prodIDs;
            if(count($products) == count($articles)){
                echo 'ok';
            }else{
                $unavailable = [];
                foreach ($articles as $article){
                    if(!isset($products[$article])){
                        $unavailable[] = $article;
                    }
                }
                echo json_encode($unavailable);
            }
        }
    }elseif($_POST['check'] == 'no'){
        require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/itertech.cart/classes/general/WorkCart.php");
        require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/itertech.cart/lib/discount.php");
        $json = json_decode($_POST['data'], true);
        if(count($json)){
            $arResult = WorkCart::getItemsFromCart();
            if(isset($arResult['PRODUCTS']) && count($arResult['PRODUCTS'])){
                foreach ($arResult['PRODUCTS'] as $product){
                    WorkCart::addItemToCart((int)$product['ID'], 0, [], 'R', $siteId);
                }
            }
            $prodIDs = $_SESSION['repeat_order_ids'];
            foreach ($json as $article=>$quantity){
                WorkCart::addItemToCart((int)$prodIDs[$article], $quantity, '', false, $siteId);
            }
            echo 'ok';
        }
    }
}