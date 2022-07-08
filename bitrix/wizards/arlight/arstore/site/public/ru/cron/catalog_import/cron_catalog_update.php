<?php
define("STOP_STATISTICS", true);
define('NO_AGENT_CHECK', true);
set_time_limit(0);

// когда запускаем обновление из под крона - нужно передать аргумент "update"
if (isset($argv[1]) && trim($argv[1]) == 'update') $_SERVER['DOCUMENT_ROOT'] = realpath(dirname(__FILE__) . '/../../');
if (isset($argv[2]) && !defined('SITE_ID')) define('SITE_ID', trim($argv[2]));

require($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "cron/catalog_import/classes.php");

//запуск импорта в один заход
use Bitrix\Main\ArgumentException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;
use CatalogImportJSON\CatalogImportIteratorJSON;

if (defined("CATALOG_ID")) {

    //установка наценок для цен
    $startPercents = COption::GetOptionString("MAIN", "PRICES_INCREASE", 0);
    if ($startPercents < 0 || $startPercents > MAX_PRICE_INCREASE_PERCENTS || $startPercents == 0 || $startPercents == '0' || !$startPercents || BELARUS) $extraPercents = false;
    else $extraPercents = (100 + (int)$startPercents) / 100;

    /*курс валют*/
    $exchangeRate = COption::GetOptionString("main", "EXCHANGE_RATE", 1);
    if ($exchangeRate != 1) {
        if ($extraPercents) $extraPercents = $extraPercents * $exchangeRate;
        else $extraPercents = $exchangeRate;
    }

    $run = new CatalogImportIteratorJSON($extraPercents);
    try {
        $run->Iteration();
    } catch (ObjectPropertyException|ArgumentException|SystemException $e) {
        echo $e;
    }
} else {
    echo "Нет доступа к init.php";
}
