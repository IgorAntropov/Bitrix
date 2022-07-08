<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Личные данные");
$APPLICATION->AddChainItem("Личные данные", SITE_DIR . "personal/");
?>
<? if (BLOCKING != 'true'): ?>
    <? if ($USER->IsAuthorized()): ?>
        <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "personal/top_menu.php"); ?>
    <? endif; ?>
    <div class="title title-page">
        <div class="title__text"><?$APPLICATION->ShowTitle()?></div>
        <? if ($USER->IsAuthorized()): ?>
            <div class="title__logout">
                <i class="icon-logout"></i>
                <a href="?logout=yes&<?=bitrix_sessid_get()?>">ВЫЙТИ</a>
            </div>
        <? endif; ?>
    </div>
    <br>
<?php
if ($USER->IsAuthorized()) {
    ?>
    <div id="personal_new" class="personal" data-block="2">
        <div class="personal__block active_el" data-block="1">
            <?php
            /**
             * Форма для смены данных пользователя
             */
            $APPLICATION->IncludeComponent(
	"bitrix:main.profile", 
	".default", 
	array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"SET_TITLE" => "N",
		"USER_PROPERTY" => array(
			0 => "UF_TYPEPAYER",
		),
		"SEND_INFO" => "N",
		"CHECK_RIGHTS" => "N",
		"USER_PROPERTY_NAME" => "",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);
            ?>
        </div>
    </div>
    <?php
} else {
    ?>
    <div class="personal">
        <div class="personal__auth-block">
            <br>
            <p>Для доступа к данным необходимо авторизоваться.</p>
            <span style="display: inline-block;">
                <a href="#popup-auth" data-fancybox="" class="button" data-name="auth-form">Авторизоваться</a>
            </span>
        </div>
        <br>
        <br>
        <br>
    </div>
    <?php
}
?>
<? endif; ?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>

