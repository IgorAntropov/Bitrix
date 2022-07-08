<?php
define("STOP_STATISTICS", true);
define('NO_AGENT_CHECK', true);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use \Bitrix\Main\Loader;
if(!Loader::includeModule("iblock"))
    return;

if ($_POST['test_input_subscr'] == '' && (isset($_POST["email"]) || isset($_POST["footer__subscribe-email"]))){
    $email = '';
    if (isset($_POST["email"]))
        $email = $_POST["email"];
    elseif (isset($_POST["footer__subscribe-email"]))
        $email = $_POST["footer__subscribe-email"];

    $arFields = array(
        "ACTIVE" => "Y",
        "IBLOCK_ID" => SUBSCRIBE_RESULT_ID,
        "NAME" => htmlentities($email)
    );
    $oElement = new CIBlockElement();
    $idElement = $oElement->Add($arFields, false, false, false);
    echo $idElement;

    $site = Bitrix\Main\Context::getCurrent()->getSite();
    $arEventFields = array(
        "EMAIL" =>htmlentities($email),
    );

    if(CEvent::Send("SUBSCRIBE_FORM", $site, $arEventFields, 'N')){
        echo $idElement;
    }
}