<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Настройки оформления заказа");

use Bitrix\Main\Context;

//Справочный текст, который может выводиться на странице оформления заказа
$currTextForOrderPage = '';
if (file_exists($_SERVER['DOCUMENT_ROOT'] . SITE_DIR . "/include/textForSendOrderPage"))
    $currTextForOrderPage = file_get_contents($_SERVER['DOCUMENT_ROOT'] . SITE_DIR . "/include/textForSendOrderPage");
$textForOrderPage = Context::getCurrent()->getRequest()->get("text_for_send_order");
if ($textForOrderPage) {
    $textForOrderPage = str_replace('script', 'sc ript', $textForOrderPage);
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . SITE_DIR . "/include/textForSendOrderPage", $textForOrderPage);
    $currTextForOrderPage = $textForOrderPage;
}
?>
    <div id="admin" class="personal">
        <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/top_menu.php"); ?>
        <div class="personal__block active_el">
            <div class="row">
                <div class="col-md-2">
                    <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/settings/left_menu.php"); ?>
                </div>
                <div class="col-md-10">
                    <h2>Справочный текст, который может выводиться на странице оформления заказа</h2><br>
                    <div class="row">
                        <div class="col-md-4">
                            <form action="<?= POST_FORM_ACTION_URI ?>" class="" method="GET"
                                  enctype="multipart/form-data">
                                <div class="form-group">
                                    <textarea class="form-control" rows="3"
                                              name="text_for_send_order"><?= $currTextForOrderPage ?></textarea>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-danger">Сохранить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>