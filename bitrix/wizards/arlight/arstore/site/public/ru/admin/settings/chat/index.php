<?
// Проверка на доступ (всегда стоит первой)
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR."admin/access.php");

use Bitrix\Main\Context;
use Bitrix\Main\Page\Asset;

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Подключение дополнительных скриптов");

$script = '';
$requestScript = Context::getCurrent()->getRequest()->get("script");
$filePath = $_SERVER['DOCUMENT_ROOT'] . SITE_DIR . '/include/chat_script_in_footer.php';
if (!empty($requestScript)) {
    file_put_contents($filePath, $requestScript);
    $script = $requestScript;
} elseif (file_exists($filePath))
    $script = file_get_contents($filePath);

//<script data-skip-moving="true" src="//code.jivosite.com/widget/rUYpUDZtgb" async></script>
?>

<div class="personal">
    <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR."admin/top_menu.php"); ?>
    <div class="personal__block active_el">
        <div class="row">
            <div class="col-md-2">
                <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR."admin/settings/left_menu.php"); ?>
            </div>
            <div class="col-md-10">
                <form action="<?= POST_FORM_ACTION_URI ?>" class="" method="POST" enctype="multipart/form-data"
                      id="add_chat_to_footer">
                    <textarea name="script" id="add_chat_to_footer-script" class="form-control" rows="10"
                              placeholder="Вставьте скрипт..."><?= $script ?></textarea>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <button type="submit" class="button button_red btn-block">Сохранить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>

