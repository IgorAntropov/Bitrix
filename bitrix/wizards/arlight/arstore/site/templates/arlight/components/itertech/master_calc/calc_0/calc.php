<?php
if (defined("B_PROLOG_INCLUDED")) {
    define('IS_AJAX', false);
} else {
    define('IS_AJAX', true);
}

global $APPLICATION;
if ($APPLICATION) {
    $currentPage = $APPLICATION->GetCurPage(false);
}

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true && $_REQUEST['m-c']) {
    /* если AJAX */
    define('LANG', 's1');
    define('SITE_ID', 's1');
    define("NO_KEEP_STATISTIC", true);
    require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
    CModule::IncludeModule('main');

    $calc_id = basename($_REQUEST['uniqueCalcId']);
    $componentPath = '/bitrix/components/itertech/master_calc';
    $templatePath = SITE_TEMPLATE_PATH.'/components/itertech/master_calc/' . $calc_id;

    if (isset($_REQUEST['currentPage'])) {
        $currentPage = htmlspecialcharsbx($_REQUEST['currentPage']);
    }
} else {
    $templatePath = $templateFolder;
}

include $_SERVER['DOCUMENT_ROOT'] . $componentPath . '/functions.php';

global $GRPS;


$masterCalcConfiguration = array();
include 'configuration.php';

/* event onStart */
$conf = $masterCalcConfiguration;
foreach ($conf['items'] as $k => $item) {
    if (isset($item['onStart']) && !empty($item['onStart']) && function_exists($item['onStart'])) {
        $item['onStart']($k, $conf['items']);
        //$evCode = $item['onStart'] . '($k, $conf[\'items\']);';
        //@eval($evCode);
    }
}
$masterCalcConfiguration = $conf;

$calcData = false;
if (isset($_REQUEST['m-c']) && isset($_REQUEST['uniqueCalcId']) && ($_REQUEST['uniqueCalcId'] == $masterCalcConfiguration['uniqueCalcId'])) {
    $calcData = $_REQUEST['m-c'];
}

/*
 * отображать/скрывать поля у которых установлен флаг showHideFlag
 */
$showHideStatus = 1;
if (isset($calcData['showHideStatus'])) {
    $showHideStatus = (int)$calcData['showHideStatus'];
}

//if (!TECH_MODE) {
//    $showHideStatus = 0;
//}

$showHideButton = false;

if ($calcData) {
    $conf = $masterCalcConfiguration;
    /* просчет данных */
    foreach ($conf['items'] as $k => $item) {
        if ($item['type'] == 'field' && in_array($item['fieldType'], array('search_product', 'text', 'select', 'radio'))) {
            if (isset($calcData[$item['name']]) && $calcData[$item['name']] != '') {
                $tmpResult = str_replace(',', '.', $calcData[$item['name']]);
                if($item['fieldType'] != 'select' && $item['fieldType'] != 'search_product'){
                    $tmpResult = (float)$tmpResult;
                }
                $conf['items'][$k]['result'] = $tmpResult;
            }
        }
    }

    foreach ($conf['items'] as $k => $item) {
        if ($item['type'] == 'formula') {
            $conf['items'][$k]['originalFormula'] = $conf['items'][$k]['formula'];
            foreach ($conf['items'] as $k2 => $item2) {
                if (isset($item2['name']) && isset($item2['result']) && $item2['result'] != '') {
                    $conf['items'][$k]['formula'] = str_replace('[' . $item2['name'] . ']', $item2['result'], $conf['items'][$k]['formula']);
                }
            }
            $conf['items'][$k]['formula'] = str_replace(',', '.', $conf['items'][$k]['formula']);

            if (stripos($conf['items'][$k]['formula'], '[') === false && stripos($conf['items'][$k]['formula'], ']') === false) {
                $evCode = '$conf[\'items\'][' . $k . '][\'result\'] = ' . $conf['items'][$k]['formula'] . ';';
                @eval($evCode);
            } else {
            }
        }

        if (isset($item['onCalculation']) && !empty($item['onCalculation']) && function_exists($item['onCalculation'])) {
            $item['onCalculation']($k, $conf['items']);
            //$evCode = $item['onCalculation'] . '($k, $conf[\'items\']);';
            //@eval($evCode);
        }
    }
    /* /просчет данных */

    include $_SERVER['DOCUMENT_ROOT'] . $componentPath . '/MCValidator.php';

    /* валидация данных */
    foreach ($conf['items'] as $k => $item) {
        if ($item['type'] == 'field' && in_array($item['fieldType'], array('search_product', 'text', 'select', 'radio'))) {

            if (!isset($conf['items'][$k]['validation']) || !count($conf['items'][$k]['validation'])) {
                $conf['items'][$k]['validation'][] = 'required';
            }

            foreach ($conf['items'][$k]['validation'] as $validationKey => $validationInfo) {
                if (is_array($validationInfo)) {
                    $vRes = MCValidator::check($conf['items'][$k]['result'], $validationKey, $validationInfo);
                } else {
                    $vRes = MCValidator::check($conf['items'][$k]['result'], $validationInfo);
                }
                if (!isset($conf['items'][$k]['errors'])) $conf['items'][$k]['errors'] = array();
                $conf['items'][$k]['errors'] = array_merge($conf['items'][$k]['errors'], $vRes['errors']);
                if (!isset($conf['items'][$k]['messages'])) $conf['items'][$k]['messages'] = array();
                $conf['items'][$k]['messages'] = array_merge($conf['items'][$k]['messages'], $vRes['messages']);
            }
        }

        if ($item['type'] == 'formula') {
            if (stripos($conf['items'][$k]['formula'], '[') !== false || stripos($conf['items'][$k]['formula'], ']') !== false) {
                $conf['items'][$k]['errors'][] = GetMessage("ARLIGHT_ARSTORE_NET_NEKOTORYH_DANNYH");
            }
        }
    }
    /* /валидация данных */

    $masterCalcConfiguration = $conf;
    $arResult['CONFIGURATION'] = $masterCalcConfiguration;
}

$masterCalcConfiguration = masterCalcHtmlGenerate($masterCalcConfiguration);
?>