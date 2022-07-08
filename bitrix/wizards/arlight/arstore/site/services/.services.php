<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arServices = Array(
    "main" => Array(
        "NAME" => GetMessage("SERVICE_MAIN_SETTINGS"),
        "STAGES" => Array(
            "files.php", // Copy bitrix files
            "template.php", // Install template
            //"theme.php", // Install theme
            "group.php", // Install group
            "templates_mail.php",
            "settings.php",
        ),
    ),

    "iblock" => Array(
        "NAME" => GetMessage("SERVICE_IBLOCK"),
        "STAGES" => Array(
            "types.php", //IBlock types
            "news.php",
            "article.php",
            "slider.php",
            "documents.php",
            "contacts.php",
            "faq.php",
            "project.php",
            "scheme.php",
            "video.php",
            "certificate.php",
            "events.php",
            "subscribe_results.php",
            "feedback_results.php",
            "calcs.php",
            "catalog.php"
        ),
    ),
);
?>
