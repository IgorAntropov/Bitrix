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

use Bitrix\Main\Loader;
use Bitrix\Main\Config\Option;
if (!Loader::includeModule("iblock")) return;
set_time_limit(0);
ini_set('memory_limit', '2000M');
ini_set( 'serialize_precision', -1 );

$stopper1 = Option::get('CATALOG_IMPORT', 'ITERATION_STOPPER', false);
$stopper2 = Option::get('MAIN', 'STOPPER_RESIZE_CACHE_CLEANER', false);
if($stopper1 || $stopper2) return;

//установим стоппер
Option::set('MAIN', 'STOPPER_RESIZE_CACHE_CLEANER', true);

function LogNow($data){
    $logPath = $_SERVER["DOCUMENT_ROOT"] . SITE_DIR. 'cron/catalog_import/log/cache_cleaner_' . date("d-m-Y") . '.txt';
    if (file_exists($logPath)) file_put_contents($logPath, $data, FILE_APPEND);
    else file_put_contents($logPath, $data);
}
LogNow(date('d-m-Y H:i:s') . " \n" . "Запускаем чистку resize_cache" . " \n");

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
Option::set('MAIN', 'STOPPER_RESIZE_CACHE_CLEANER', false);
LogNow(date('d-m-Y H:i:s') . " \n" . "*****************************************" . " \n");