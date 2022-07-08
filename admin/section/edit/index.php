<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/section/functions.php");
$APPLICATION->SetTitle("Редактирование");

use \Bitrix\Main\Context;

$request = Context::getCurrent()->getRequest();
$sectionName = $request['section'];
$pageTitle = '';
$error = false;
if ($sectionName == 'payment' || $sectionName == 'delivering') {
    if ($request['PAGE_TITLE'] && $request['REMOVE'] != 'Y')
        $pageTitle = $request['PAGE_TITLE'];
    if ($pageTitle == '' && getPageTitle($sectionName) != '')
        $pageTitle = getPageTitle($sectionName);
    if ($request['REMOVE'] == 'Y') {
        MYRemoveSection($sectionName, $pageTitle);
        $pageTitle = '';
    }
    $content = MYGetContentFromFile($sectionName);
    if ($request['PAGE_TEXT'] && $request['PAGE_TEXT'] != '' && $request['REMOVE'] != 'Y') {
        $content = $request['PAGE_TEXT'];
        MYCreateSection($sectionName, $pageTitle);
        MYSaveContentToFile($request, $sectionName);
    }
} else $error = true;
?>
<?php if ($error): ?>
    <div class="alert alert-danger" role="alert">
        Ошибка доступа к разделу!
    </div>
<?php endif; ?>
    <div class="form-add-section">
        <form action="<?= POST_FORM_ACTION_URI ?>" name="send_page" id="send_page" method="POST"
              enctype="multipart/form-data">
            <div class="form-group">
                <p><label for="page_title">Заголовок страницы*</label></p>
                <input type="text" class="form-control" id="page_title" name="PAGE_TITLE"
                       placeholder="Заголовок страницы*"
                       required value="<?= $pageTitle; ?>">
                <small class="form-text text-muted">* - поле обязательно для заполнения</small>
            </div>
            <br>
            <div class="form-group">
                <p><label>Контент страницы</label></p>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:fileman.light_editor",
                    "",
                    array(
                        "AUTO_RESIZE" => "Y",
                        "CONTENT" => $content,
                        "HEIGHT" => "300px",
                        "ID" => "",
                        "INPUT_ID" => "",
                        "INPUT_NAME" => "PAGE_TEXT",
                        "JS_OBJ_NAME" => "",
                        "RESIZABLE" => "Y",
                        "USE_FILE_DIALOGS" => "N",
                        "VIDEO_ALLOW_VIDEO" => "N",
                        "VIDEO_BUFFER" => "20",
                        "VIDEO_LOGO" => "",
                        "VIDEO_MAX_HEIGHT" => "480",
                        "VIDEO_MAX_WIDTH" => "640",
                        "VIDEO_SKIN" => "/bitrix/components/bitrix/player/mediaplayer/skins/bitrix.swf",
                        "VIDEO_WINDOWLESS" => "Y",
                        "VIDEO_WMODE" => "transparent",
                        "WIDTH" => "100%"
                    )
                ); ?>
            </div>
            <button id="save" type="submit" class="btn btn-primary">Сохранить</button>
            <a href="<?= SITE_DIR ?>admin/section/" type="button" class="btn btn-secondary">Отменить</a>
            <button id="del_section" type="button" class="btn btn-danger">Удалить раздел с сайта</button>
            <input type="hidden" id="remove" name="REMOVE" value="">
        </form>
    </div>

    <script>
        $(document).ready(function () {
            $('#del_section').click(function () {
                if (confirm("Вы уверены, что хотите удалить данный раздел с сайта? Это действие необратимо!")) {
                    $('#remove').val('Y');
                    $('#save').click();
                    return false;
                } else {
                    return false;
                }
            });
        });
    </script>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>