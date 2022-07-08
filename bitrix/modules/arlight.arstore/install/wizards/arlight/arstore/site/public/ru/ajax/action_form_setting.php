<?php
define("STOP_STATISTICS", true);
define('NO_AGENT_CHECK', true);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use \Bitrix\Main\Loader;

if (!Loader::includeModule("iblock"))
    return;


if ($_POST) {
    //соцсети
    $s_fb = $_POST['social_fb'];
    $s_vk = $_POST['social_vk'];
    $s_tg = $_POST['social_tg'];
    $s_ig = $_POST['social_ig'];
    $s_pr = $_POST['social_pr'];
    $s_tw = $_POST['social_tw'];
    $s_yt = $_POST['social_yt'];
    $s_ok = $_POST['social_ok'];
    $s_tiktok = $_POST['social_tiktok'];
    $s_whatsapp = $_POST['social_whatsapp'];
    $s_Arr = [];
    if ($s_fb || $s_fb === '')
        $s_Arr['social_fb'] = $s_fb;
    if ($s_vk || $s_vk === '')
        $s_Arr['social_vk'] = $s_vk;
    if ($s_tg || $s_tg === '')
        $s_Arr['social_tg'] = $s_tg;
    if ($s_ig || $s_ig === '')
        $s_Arr['social_ig'] = $s_ig;
    if ($s_pr || $s_pr === '')
        $s_Arr['social_pr'] = $s_pr;
    if ($s_tw || $s_tw === '')
        $s_Arr['social_tw'] = $s_tw;
    if ($s_yt || $s_yt === '')
        $s_Arr['social_yt'] = $s_yt;
    if ($s_ok || $s_ok === '')
        $s_Arr['social_ok'] = $s_ok;
    if ($s_tiktok || $s_tiktok === '')
        $s_Arr['social_tiktok'] = $s_tiktok;
    if ($s_whatsapp || $s_whatsapp === '')
        $s_Arr['social_whatsapp'] = $s_whatsapp;
    if (count($s_Arr)) {
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . SITE_DIR."assets/json/socialNetwork.json", json_encode($s_Arr, JSON_UNESCAPED_UNICODE));
    }

    if($_POST['social_in_header'])
        COption::SetOptionString("header_action", "social_in_header", $_POST['social_in_header']);

    //название компании
    if ($_POST['entity_name'] != "") {
        $entity_name = $_POST['entity_name'];
        COption::SetOptionString("header_action", "entity_name", $entity_name);
    }

    //сохранение настроек суперадмина
    if($_POST['setting_su']){
        COption::SetOptionString("setting_su", "enable_yk", $_POST['setting_su']['enable_yk']);
    }

    //сохранение настроек показа наличия
    if($_POST['setting_show_stock']){
        $showstock = false;
        if ($_POST['setting_show_stock'] == 'Y')
            $showstock = true;
        elseif ($_POST['setting_show_stock'] == 'N')
            $showstock = false;
        COption::SetOptionString("header_action", "showstock", $showstock);
    }

    //выбор типа чата
    if ($_POST['feedback_type'] || $_POST['feedback_type'] === '')
        COption::SetOptionString("header_action", "feedback_type", $_POST['feedback_type']);

    //выбор цветовой схемы сайта
    if ($_POST['data-color-scheme'] || $_POST['data-color-scheme'] === '')
        COption::SetOptionString("header_action", "sch_color", $_POST['data-color-scheme']);

    //выбор шрифта  сайта
    if ($_POST['data-font-scheme'] || $_POST['data-font-scheme'] === '')
        COption::SetOptionString("header_action", "data-font-scheme", $_POST['data-font-scheme']);

    //выбор header  сайта
    if ($_POST['data-header-scheme'] || $_POST['data-header-scheme'] === '')
        COption::SetOptionString("header_action", "data-header-scheme", $_POST['data-header-scheme']);

    //избранные пункты меню в header
    if ($_POST['header_fav_text'] || $_POST['header_fav_text'] === '')
        COption::SetOptionString("header_action", "header_fav_text", $_POST['header_fav_text']);
    if ($_POST['header_fav_link'] || $_POST['header_fav_link'] === '')
        COption::SetOptionString("header_action", "header_fav_link", $_POST['header_fav_link']);
    if ($_POST['header_fav_text_2'] || $_POST['header_fav_text_2'] === '')
        COption::SetOptionString("header_action", "header_fav_text_2", $_POST['header_fav_text_2']);
    if ($_POST['header_fav_link_2'] || $_POST['header_fav_link_2'] === '')
        COption::SetOptionString("header_action", "header_fav_link_2", $_POST['header_fav_link_2']);



    //сообщение об акции в header
    if ($_POST['header_message_text'] || $_POST['header_message_text'] === '')
        COption::SetOptionString("header_action", "mes_text", $_POST['header_message_text']);
    if ($_POST['header_message_color'] || $_POST['header_message_color'] === '')
        COption::SetOptionString("header_action", "mes_color", $_POST['header_message_color']);
    if ($_POST['header_message_icon'] || $_POST['header_message_icon'] === '')
        COption::SetOptionString("header_action", "mes_icon", $_POST['header_message_icon']);

    if (isset($_FILES['header_logo']) && isset($_FILES['header_logo']['tmp_name'])) {
        $extension_file = mb_strtolower(pathinfo($_FILES['header_logo']['name'], PATHINFO_EXTENSION));
        $pathToSave = $_SERVER["DOCUMENT_ROOT"] .SITE_DIR. 'images/header_logo.' . $extension_file;
        $tempPath = $_FILES['header_logo']['tmp_name'];
        move_uploaded_file($tempPath, $pathToSave);
    };

    if (isset($_FILES['footer_logo']) && isset($_FILES['footer_logo']['tmp_name'])) {
        $extension_file = mb_strtolower(pathinfo($_FILES['footer_logo']['name'], PATHINFO_EXTENSION));
        $pathToSave = $_SERVER["DOCUMENT_ROOT"] . '/local/images/footer_logo.' . $extension_file;
        $tempPath = $_FILES['footer_logo']['tmp_name'];
        move_uploaded_file($tempPath, $pathToSave);
    }


    $sitePath = $_SERVER["DOCUMENT_ROOT"] . SITE_DIR;

    if ($_POST['email'] != "") {
        $filenameMail = $sitePath . '/include/header_mail.php';
        $textMail = $_POST['email'];
        file_put_contents($filenameMail, $textMail);
    }
    if ($_POST['phone'] != "") {
        $filenamePhone = $sitePath . '/include/header_phone.php';
        $textPhone = $_POST['phone'];
        file_put_contents($filenamePhone, $textPhone);
    }
    if ($_POST['email-admin'] != "") {
        $textMailAdmin = $_POST['email-admin'];
        COption::SetOptionString("main", "email_from", $textMailAdmin);
    }

    //обновление ИБ контактов
    foreach ((array)$_POST['ShopList'] as $key => $ShopItem) {
        $form_id = $key;
        $el_id = $ShopItem['shop-id'];
        $iblock_id = CONTACTS_ID;
        $name = $ShopItem['shop-name'];
        $sort = $ShopItem['shop-sort'];
        $delete = $ShopItem['delete'];
        $PROP = array();
        if ($ShopItem['shop-address'])
            $PROP['ADDRESS'] = $ShopItem['shop-address'];
        if ($ShopItem['shop-phone'])
            $PROP['PHONE'] = $ShopItem['shop-phone'];
        if ($ShopItem['shop-email'])
            $PROP['EMAIL'] = $ShopItem['shop-email'];
        if ($ShopItem['shop-time-1'] || $ShopItem['shop-time-2'] || $ShopItem['shop-time-3']
            || $ShopItem['shop-days-1'] || $ShopItem['shop-days-2'] || $ShopItem['shop-days-3'])
            $PROP['SCHEDULE'] = $ShopItem['shop-days-1'] . '&' . $ShopItem['shop-time-1'] . ';' . $ShopItem['shop-days-2'] . '&' . $ShopItem['shop-time-2'] . ';' . $ShopItem['shop-days-3'] . '&' . $ShopItem['shop-time-3'];
        if ($ShopItem['shop-geo'])
            $PROP['COORD'] = $ShopItem['shop-geo'];
        if ($ShopItem['shop-city'])
            $PROP['ADDRESS_CITY'] = $ShopItem['shop-city'];
        if ($ShopItem['shop-pickup'])
            $PROP['IS_PICKUPPOINT'] = $ShopItem['shop-pickup'];
        if ($ShopItem['shop-set'])
            $PROP['PROPERTY'] = json_encode($ShopItem['shop-set']);

        //если элемент существует
        if ($el_id) {
            //удаление элемента
            if ($delete === 'true') {
                CIBlockElement::Delete($el_id);
            } else {
                //обновление свойств
                CIBlockElement::SetPropertyValuesEx($el_id, $iblock_id, $PROP);

                //изображение магазина
                $fileImgP = $_FILES['shop-img-prev_' . $form_id];
                $fileImgD = $_FILES['shop-img-d_' . $form_id];

                $pathToSaveP = '';
                $pathToSaveD = '';
                if (isset($fileImgP) && isset($fileImgP['tmp_name'])) {
                    $extension_file = mb_strtolower(pathinfo($fileImgP['name'], PATHINFO_EXTENSION));
                    $pathToSaveP = $_SERVER["DOCUMENT_ROOT"] .  '/upload/iblock/img_shop_prev_' . $el_id . '.' . $extension_file;
                    $tempPath = $fileImgP['tmp_name'];
                    move_uploaded_file($tempPath, $pathToSaveP);
                }
                if (isset($fileImgD) && isset($fileImgD['tmp_name'])) {
                    $extension_file = mb_strtolower(pathinfo($fileImgD['name'], PATHINFO_EXTENSION));
                    $pathToSaveD = $_SERVER["DOCUMENT_ROOT"] .  '/upload/iblock/img_shop_d_' . $el_id . '.' . $extension_file;
                    $tempPath = $fileImgD['tmp_name'];
                    move_uploaded_file($tempPath, $pathToSaveD);
                }

                //обновление имени и картинок
                $el = new CIBlockElement;
                $arLoadProductArray = Array(
                    "MODIFIED_BY" => $USER->GetID(),
                    "IBLOCK_SECTION" => false,
                );
                if ($name)
                    $arLoadProductArray['NAME'] = $name;
                if ($sort)
                    $arLoadProductArray['SORT'] = $sort;
                if ($pathToSaveP)
                    $arLoadProductArray['PREVIEW_PICTURE'] = CFile::MakeFileArray($pathToSaveP);
                if ($pathToSaveD)
                    $arLoadProductArray['DETAIL_PICTURE'] = CFile::MakeFileArray($pathToSaveD);

                $res = $el->Update($el_id, $arLoadProductArray);


            }
        } //иначе добавить новый элемент
        else {
            $arFields = array(
                "ACTIVE" => "Y",
                "IBLOCK_ID" => $iblock_id,
                "IBLOCK_SECTION_ID" => false,
                "NAME" => $name,
                "CODE" => "",
                "SORT" => $sort,
                "DETAIL_TEXT" => "",
                "PROPERTY_VALUES" => $PROP
            );
            $oElement = new CIBlockElement();
            $idElement = $oElement->Add($arFields, false, false, true);

            ////изображение магазина
            $fileImgP = $_FILES['shop-img-prev_' . $form_id];
            $fileImgD = $_FILES['shop-img-d_' . $form_id];
            $pathToSaveP = '';
            $pathToSaveD = '';
            if (isset($fileImgP) && isset($fileImgP['tmp_name'])) {
                $extension_file = mb_strtolower(pathinfo($fileImgP['name'], PATHINFO_EXTENSION));
                $pathToSaveP = $_SERVER["DOCUMENT_ROOT"] .  '/upload/iblock/img_shop_prev_' . $idElement . '.' . $extension_file;
                $tempPath = $fileImgP['tmp_name'];
                move_uploaded_file($tempPath, $pathToSaveP);
            }
            if (isset($fileImgD) && isset($fileImgD['tmp_name'])) {
                $extension_file = mb_strtolower(pathinfo($fileImgD['name'], PATHINFO_EXTENSION));
                $pathToSaveD = $_SERVER["DOCUMENT_ROOT"] .  '/upload/iblock/img_shop_d_' . $idElement . '.' . $extension_file;
                $tempPath = $fileImgD['tmp_name'];
                move_uploaded_file($tempPath, $pathToSaveD);
            }

            //добавление картинок
            $el = new CIBlockElement;
            $arLoadProductArray = Array(
                "MODIFIED_BY" => $USER->GetID(),
                "IBLOCK_SECTION" => false,
            );
            if ($pathToSaveP)
                $arLoadProductArray['PREVIEW_PICTURE'] = CFile::MakeFileArray($pathToSaveP);
            if ($pathToSaveD)
                $arLoadProductArray['DETAIL_PICTURE'] = CFile::MakeFileArray($pathToSaveD);

            $res = $el->Update($idElement, $arLoadProductArray);
        }
    }
}
