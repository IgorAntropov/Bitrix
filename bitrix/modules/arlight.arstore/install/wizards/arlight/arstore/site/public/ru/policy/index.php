<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Политика обработки персональных данных");

$name = COption::GetOptionString("header_action", "entity_name", '');
$site = '<a class="theme-link" href="' . 'http://' . $_SERVER['HTTP_HOST'] . '" style="text-decoration: underline;">' . $_SERVER['HTTP_HOST'] . '</a>';
$policy = '<a class="theme-link" href="' . 'http://' . $_SERVER['HTTP_HOST'] . '/policy/" style="text-decoration: underline;">' . $_SERVER['HTTP_HOST'] . '/policy/</a>';
$email = '<a class="theme-link" href="mailto:' . COption::GetOptionString("main", "email_from") . '" style="text-decoration: underline;">' . COption::GetOptionString("main", "email_from") . '</a>';
?>

    <div class="title title-page">
        <div class="title__text"><h1><? $APPLICATION->ShowTitle(false) ?></div>
    </div>
    <div class="text-wrap policy-content">


    </div>
    <br>
    <br>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>