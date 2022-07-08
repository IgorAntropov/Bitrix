<?
define("STOP_STATISTICS", true);
define('NO_AGENT_CHECK', true);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
use \Bitrix\Main\Loader;
if (!Loader::includeModule("iblock")) return;

if(isset($_GET['article'])){
    $arSelect = ['ID', 'CODE'];
    $arFilter = ['IBLOCK_ID' => CATALOG_ID, 'ACTIVE' => 'Y', 'PROPERTY_ARTICLE' => $_GET['article']];
    $res = CIBlockElement::GetList([], $arFilter, false, ['nPageSize' => 1], $arSelect);
    while($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();
        if(isset($arFields['CODE']) && $arFields['CODE'] !== ''){
            $href = SITE_DIR.'catalog/product/'.$arFields['CODE'].'/';
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$href);
            exit();
        }
    }
}