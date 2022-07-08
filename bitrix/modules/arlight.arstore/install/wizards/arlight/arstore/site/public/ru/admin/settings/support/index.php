<?
// Проверка на доступ (всегда стоит первой)
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/access.php");

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Обращение в тех.поддержку");

$email = '<a class="theme-link" href="mailto:' . COption::GetOptionString("main", "email_from") . '" style="text-decoration: underline;">' . COption::GetOptionString("main", "email_from") . '</a>';
?>
    <div id="admin" class="personal">
        <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/top_menu.php"); ?>
        <div class="personal__block active_el">
            <div class="row">
                <div class="col-md-2">
                    <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/settings/left_menu.php"); ?>
                </div>
                <div class="col-md-10">
                    <h2>Техническая поддержка</h2>
                    Для обращения в службу тех.поддержки отправьте письмо через форму обратной связи, указав вопрос обращения "Сообщить об ошибке".
                </div>
            </div>
        </div>
    </div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>