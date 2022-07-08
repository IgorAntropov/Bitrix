<?php
define("STOP_STATISTICS", true);
define('NO_AGENT_CHECK', true);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use \Bitrix\Main\Loader;

if (!Loader::includeModule("iblock"))
    return;


if(isset($_POST['type']) && isset($_POST['id'])&& isset($_POST['ibId'])){
    $type = $_POST['type'];
    $newsId = $_POST['id'];
    $PROP = array();
    $iblock_id = $_POST['ibId'];


    if ($type == 'like') {
        $db_props = CIBlockElement::GetProperty($iblock_id, $newsId, array("sort" => "asc"), Array("CODE" => "LIKE"));
    } elseif ($type == 'dislike') {
        $db_props = CIBlockElement::GetProperty($iblock_id, $newsId, array("sort" => "asc"), Array("CODE" => "DISLIKE"));
    }
    if ($ar_props = $db_props->Fetch())
        $value = IntVal($ar_props["VALUE"]);
    else
        $value = 0;

    $value++;
    if ($type == 'like') {
        $PROP['LIKE'] = $value;
    } elseif ($type == 'dislike') {
        $PROP['DISLIKE'] = $value;
    }

    CIBlockElement::SetPropertyValuesEx($newsId, $iblock_id, $PROP);
    echo $value;
}

