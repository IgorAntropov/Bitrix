<?
include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404", "Y");

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle(GetMessage("ARLIGHT_ARSTORE_STRANICA_NE_NAYDENA"));
$APPLICATION->SetPageProperty("err_404", "err_404Y");
?>
    <div class="block-404 block-404--indent">
        <div class="block-404__main">
            <div class="block-404__section block-404__section--cols">
                <div class="block-404__num"><img src="<?= SITE_TEMPLATE_PATH ?>/img/4.svg" class="image" alt="4"></div>
                <div class="block-404__pic-wrap">
                    <div class="block-404__pic"></div>
                </div>
                <div class="block-404__num"><img src="<?= SITE_TEMPLATE_PATH ?>/img/4.svg" class="image" alt="4"></div>
            </div>
            <div class="block-404__section block-404__section--button">
                <a href="<?= SITE_DIR ?>" class="button button--additional"><?=GetMessage("ARLIGHT_ARSTORE_NA_GLAVNUU")?></a>
            </div>
        </div>
    </div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>