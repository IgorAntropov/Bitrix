<?php
define("STOP_STATISTICS", true);
define('NO_AGENT_CHECK', true);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

$content = '';
if (isset($_FILES['fileInput']) && isset($_FILES['fileInput']['tmp_name'])) {
    $extension_file = mb_strtolower(pathinfo($_FILES['fileInput']['name'], PATHINFO_EXTENSION));
    $pathToSave = $_SERVER["DOCUMENT_ROOT"]. SITE_DIR . 'assets/articles_for_coupon.' . $extension_file;
    $tempPath = $_FILES['fileInput']['tmp_name'];
    move_uploaded_file($tempPath, $pathToSave);
    $content = file_get_contents($pathToSave);
    $arContent = explode(';', $content);
    foreach ($arContent as &$arContentItem) {
        $arContentItem = trim($arContentItem, $characters = "\n\r\t\v");
    }
    $content = implode(';', $arContent);
    echo $content;
};