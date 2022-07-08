<?
// Проверка на доступ (всегда стоит первой)
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/access.php");

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Личные данные");
?>
<div id="admin" class="personal">
    <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/top_menu.php"); ?>
    <div class="personal__block active_el">
        <div class="row">
            <div class="col-md-2">
                <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/settings/left_menu.php"); ?>
            </div>
            <div class="col-md-10">
                <?php
                /**
                 * Форма для смены данных пользователя
                 */
                $APPLICATION->IncludeComponent("bitrix:main.profile", "admin", Array(
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "AJAX_OPTION_HISTORY" => "N",
                    "SET_TITLE" => "N",    // Устанавливать заголовок страницы
                    "USER_PROPERTY" => "",    // Показывать доп. свойства
                    "SEND_INFO" => "N",    // Генерировать почтовое событие
                    "CHECK_RIGHTS" => "N",    // Проверять права доступа
                    "USER_PROPERTY_NAME" => "",    // Название закладки с доп. свойствами
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "COMPONENT_TEMPLATE" => ".default"
                ),
                    false
                );
                ?>
            </div>
        </div>
    </div>
</div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>