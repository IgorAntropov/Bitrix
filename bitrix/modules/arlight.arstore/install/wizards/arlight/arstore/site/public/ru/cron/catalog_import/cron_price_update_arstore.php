<?php
define("STOP_STATISTICS", true);
define('NO_AGENT_CHECK', true);

// когда запускаем обновление из под крона - нужно передать аргумент "update"
if(isset($argv[1]) && trim($argv[1]) == 'update'){
    $root = $_SERVER['DOCUMENT_ROOT'] = realpath(dirname(__FILE__) . '/../../');
}
require($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

global $USER;
if((!isset($argv[1]) || trim($argv[1]) !== 'update') && !$USER->isAdmin()) return;
if(BELARUS) return;
if(KAZAKHSTAN) return;

use Bitrix\Main\Loader;
use Bitrix\Main\Config\Option;
use Bitrix\Iblock\PropertyIndex\Manager;
if (!Loader::includeModule("iblock")) return;
set_time_limit(0);
ini_set('memory_limit', '2000M');
ini_set( 'serialize_precision', -1 );

$stopper1 = Option::get('CATALOG_IMPORT', 'ITERATION_STOPPER', false);
$stopper2 = Option::get('CATALOG_IMPORT', 'ITERATION_STOPPER_PRICE_QNT_UPDATER', false);
if($stopper1 || $stopper2) return;

//установим стоппер
Option::set('CATALOG_IMPORT', 'ITERATION_STOPPER_PRICE_QNT_UPDATER', true);

$accessAr = unserialize(Option::get('arlight.assets', 'access'));

$folderPath = $_SERVER['DOCUMENT_ROOT']. SITE_DIR.'cron/updater/';
if(!file_exists($folderPath)) mkdir($folderPath);
$auth = base64_encode($accessAr['login'].':'.$accessAr['password']);
$context = stream_context_create([
    "http" => [
        "header"=>"Authorization: Basic $auth"
    ]
]);
function LogNow($data){
    $logPath = $_SERVER["DOCUMENT_ROOT"]. SITE_DIR . 'cron/catalog_import/log/updater_' . date("d-m-Y") . '.txt';
    if (file_exists($logPath)) file_put_contents($logPath, $data, FILE_APPEND);
    else file_put_contents($logPath, $data);
}
LogNow(date('d-m-Y H:i:s') . " \n" . "Запускаем обновление остатков и цен" . " \n");

if ($accessAr['login'] == '' || $accessAr['password'] == '') {
    LogNow(date('d-m-Y H:i:s') . " \n" . "Не настроен доступ к assets.transistor.ru." . " \n");
    die();
}

if(file_put_contents($folderPath.'products.json', file_get_contents('https://assets.transistor.ru/catalog/v3/sites/products.json', false, $context))){
    LogNow(date('d-m-Y H:i:s') . " \n" . "Инфу о товарах скачали" . " \n");
    $prodData = [];
    if($contentProds = json_decode(json_encode(json_decode(file_get_contents($folderPath.'products.json'))), true)){
        if(is_array($contentProds) && isset($contentProds['data']) && is_array($contentProds['data']) && isset($contentProds['data']['products']) && is_array($contentProds['data']['products']) && count($contentProds['data']['products'])){
            $actionArticles = [];
            $actionArticlesPath = $_SERVER['DOCUMENT_ROOT']. SITE_DIR.'assets/json/actionArticles.json';
            $percents10 = false;
            $startPercents = COption::GetOptionString("MAIN", "PRICES_INCREASE", 0);
            if ($startPercents > 0)
                $percents10 = (100 + (int)$startPercents) / 100;

            if(file_exists($actionArticlesPath)) $actionArticles = json_decode(json_encode(json_decode(file_get_contents($actionArticlesPath))), true);
            foreach ($contentProds['data']['products'] as $currProd){
                if($currProd['obsolete'] !== '-1' && isset($currProd['prices']['retail']) && (float)$currProd['prices']['retail'] && !isset($actionArticles[$currProd['article']])){
                    $currPrice = $currProd['prices']['retail'];
                    if ($percents10 && (float)$percents10)
                        $currPrice = round((float)$currPrice * (float)$percents10, 2);
                    $prodData[$currProd['article']] = [
                        'price' => $currPrice
                    ];
                }
            }
        }
        unset($contentProds);
    }
    if(count($prodData)){
        $dataFromBase = [];
        $arSelect = ['ID', 'PROPERTY_ARTICLE', 'PROPERTY_PRICE', 'PROPERTY_OBSOLETE'];
        $arFilter = ['IBLOCK_ID' => CATALOG_ID, 'ACTIVE' => 'Y'];
        $res = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
        while ($ob = $res->GetNext()) {
            $dataFromBase[$ob['PROPERTY_ARTICLE_VALUE']] = [
                'ID' => (int)$ob['ID'],
                'PRICE' => (float)$ob['PROPERTY_PRICE_VALUE'],
                'OBSOLETE' => $ob['PROPERTY_OBSOLETE_VALUE']
            ];
        }
        if(count($dataFromBase)){
            $diffArray = [];
            foreach ($prodData as $currArticle=>$currData){
                if(isset($dataFromBase[$currArticle])){
                    $currDataClean = [];
                    $currDataClean['PRICE'] = (float)$currData['price'];

                    $currDataOld = $dataFromBase[$currArticle];

                    if($currDataOld['PRICE'] !== $currDataClean['PRICE']){
                        $currDiff = [];
                        $currDiff['PRICE'] = $currDataClean['PRICE'];
                        $currDiff['PRICE_FILTER'] = $currDataClean['PRICE'];
                        $diffArray[$currDataOld['ID']] = $currDiff;
                    }
                }
            }

            if(count($diffArray)){
                LogNow("Различия в ".count($diffArray)." товарах." . " \n");
                foreach ($diffArray as $prodID=>$newProps){
                    $propsString = '';
                    foreach ($newProps as $propCode=>$propData){
                        $propsString.=$propCode.'/';
                    }
                    LogNow("У товара с ID ".$prodID." обновляем свойства: " . $propsString . " \n");
                    CIBlockElement::SetPropertyValuesEx((int)$prodID, CATALOG_ID, $newProps);
                }
                LogNow(date('d-m-Y H:i:s') . " \n" . "Обновили" . " \n");
            }
        }
    }
}

//чистим resize_cache
if(true){
    $resizeCacheDir = $_SERVER["DOCUMENT_ROOT"].'/upload/resize_cache/iblock';
    if(file_exists($resizeCacheDir)){
        $resizeCacheMaxSize = 536870912;
        $sizeCache = 0;
        function removeCache($dir) {
            if ($objects = glob($dir."/*")) {
                foreach($objects as $obj) {
                    is_dir($obj) ? removeCache($obj) : unlink($obj);
                }
            }
            rmdir($dir);
        }
        foreach(new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($resizeCacheDir.'/')) as $file){
            $filename = $file->getFilename();
            if($filename !== '.' && $filename !== '..'){
                $sizeCache+=$file->getSize();
            }
        }
        if($sizeCache > $resizeCacheMaxSize){
            removeCache($resizeCacheDir);
            \BXClearCache(true);
            LogNow(date('d-m-Y H:i:s') . " \n" . "Почистили resize_cache" . " \n");
        }else{
            LogNow(date('d-m-Y H:i:s') . " \n" . "Не нуждается в чистке resize_cache" . " \n");
        }
    }else{
        LogNow(date('d-m-Y H:i:s') . " \n" . "Нету папки resize_cache" . " \n");
    }
}

//чистим кэш битрикса
if(true){
    $resizeCacheDir = $_SERVER["DOCUMENT_ROOT"].'/bitrix/cache';
    if(file_exists($resizeCacheDir)){
        $resizeCacheMaxSize = 536870912;
        $sizeCache = 0;
        foreach(new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($resizeCacheDir.'/')) as $file){
            $filename = $file->getFilename();
            if($filename !== '.' && $filename !== '..'){
                $sizeCache+=$file->getSize();
            }
        }
        if($sizeCache > $resizeCacheMaxSize){
            \BXClearCache(true);
            LogNow(date('d-m-Y H:i:s') . " \n" . "Почистили bitrix_cache" . " \n");
        }else{
            LogNow(date('d-m-Y H:i:s') . " \n" . "Не нуждается в чистке bitrix_cache" . " \n");
        }
    }
}
//снимем стоппер
Option::set('CATALOG_IMPORT', 'ITERATION_STOPPER_PRICE_QNT_UPDATER', false);
LogNow(date('d-m-Y H:i:s') . " \n" . "*****************************************" . " \n");