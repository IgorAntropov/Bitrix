<?php
define("STOP_STATISTICS", true);
define('NO_AGENT_CHECK', true);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use \Bitrix\Main\Loader;

if (!Loader::includeModule("iblock"))
    return;

if ($_POST['test_input'] == '' && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["msg"])&& isset($_POST["name"])) {

    $testmssg = $_POST["msg"];
    $testemail = $_POST["email"];
    $arFieldsAll = [];
    $arSelect = Array("ID", "IBLOCK_ID", "PROPERTY_EMAIL");
    $arFilter = Array(
        "IBLOCK_ID" => FEEDBACK_RESULT_ID,
        'PROPERTY_EMAIL' => $testemail,
        'PROPERTY_MESSAGE' => $testmssg
    );
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 1), $arSelect);
    while ($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();
        $arFieldsAll[] = $arFields;
    }

    if (!count($arFieldsAll)) {
        $name = ($_POST['surname']) ? htmlentities($_POST['name'] ." ".$_POST['surname']) : htmlentities($_POST['name']);

        $arFields = array(
            "ACTIVE" => "Y",
            "IBLOCK_ID" => FEEDBACK_RESULT_ID,
            "NAME" => "Сообщение от " . htmlentities($_POST['email']),
            "PROPERTY_VALUES" => array(
                "NAME" => $name,
                "EMAIL" => htmlentities($_POST['email']),
                "PHONE" => htmlentities($_POST['phone']),
                "MESSAGE" => htmlentities($_POST['msg']),
                "TYPE_MSG" => htmlentities($_POST['type']),
                "STATUS" => 'N'
            )
        );
        $oElement = new CIBlockElement();
        $idElement = $oElement->Add($arFields, false, false, false);

        if ($_POST['type'] == 'quest_1') {
            $msg = 'Консультация по товару';
        }
        if ($_POST['type'] == 'quest_2') {
            $msg = 'Вопрос по работе магазина';
        }
        if ($_POST['type'] == 'quest_3') {
            $msg = 'Сообщить об ошибке';
        }
        if ($_POST['type'] == 'quest_4') {
            $msg = 'Расчет профильного светильника';
        }

        $site = Bitrix\Main\Context::getCurrent()->getSite();
        $arEventFields = array(
            "TYPE_MSG" => htmlentities($msg),
            "EMAIL" => htmlentities($_POST['email']),
            "NAME" => htmlentities($_POST['name']),
            "PHONE" => htmlentities($_POST['phone']),
            "MESSAGE" => htmlentities($_POST['msg']),
            "URL" => 'http://' . $_SERVER['SERVER_NAME'] . htmlentities($_POST['page_url'])
        );
        if (CEvent::Send("FEEDBACK_FORM", $site, $arEventFields, 'N')) {
            echo $idElement;
        }
        if (CEvent::Send("FEEDBACK_FORM_USER", $site, $arEventFields, 'N')) {
            echo $idElement;
        }
        if ($_POST['type']=='quest_3'){
            if (CEvent::Send("FEEDBACK_FORM_DEVELOPER", $site, $arEventFields, 'N')) {
                echo 'ok';
            }
        }
    } else {
        echo '0';
    }


}