<?php
define("STOP_STATISTICS", true);
define('NO_AGENT_CHECK', true);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

use \Bitrix\Main\Loader;
if(!Loader::includeModule("iblock"))
    return;

if ($_POST['test_input_contact'] == '' && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["msg"]) ){
    $arFields = array(
        "ACTIVE" => "Y",
        "IBLOCK_ID" => FEEDBACK_RESULT_ID,
        "NAME" => "Сообщение от ".htmlentities($_POST['fio']),
        "PROPERTY_VALUES" => array(
            "NAME" =>htmlentities($_POST['fio']),
            "EMAIL" =>htmlentities($_POST['email']),
            "PHONE" =>htmlentities($_POST['phone']),
            "MESSAGE" =>htmlentities($_POST['msg']),
            "TYPE"=>htmlentities($_POST['type']),
            "TYPE_MSG" => "quest_4",
            "STATUS" => 'N'

        )
    );
    $oElement = new CIBlockElement();
    $idElement = $oElement->Add($arFields, false, false, false);

    $site = Bitrix\Main\Context::getCurrent()->getSite();
    $arEventFields = array(
        "NAME" =>htmlentities($_POST['fio']),
        "EMAIL" =>htmlentities($_POST['email']),
        "PHONE" =>htmlentities($_POST['phone']),
        "MESSAGE" =>htmlentities($_POST['msg']),
        "TYPE"=>htmlentities($_POST['type']),
        "URL" => 'http://'.$_SERVER['SERVER_NAME'].htmlentities($_POST['page_url'])
    );
    if(CEvent::Send("FEEDBACK_FORM_CONTACT", $site, $arEventFields, 'N')){
        echo $idElement;
    }
    if(CEvent::Send("FEEDBACK_FORM_USER", $site, $arEventFields, 'N')){
        echo $idElement;
    }
}