<?php
define("STOP_STATISTICS", true);
define('NO_AGENT_CHECK', true);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use \Bitrix\Main\Loader;

if (!Loader::includeModule("iblock"))
    return;

if (isset($_POST['status']) && isset($_POST['id']) && isset($_POST['ibId'])) {
    $status = htmlspecialcharsbx($_POST['status']);
    $messId = $_POST['id'];
    $iblock_id = $_POST['ibId'];
    $PROP = [];
    $PROP['STATUS'] = $status;
    CIBlockElement::SetPropertyValuesEx($messId, $iblock_id, $PROP);
    echo $status;
}

