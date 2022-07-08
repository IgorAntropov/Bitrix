<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Шоурум - редактирование");
require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/section/functions.php");

use \Bitrix\Main\Context;
use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(SITE_DIR . "admin/section/showroom/script.js");


$permission = false;

$arSelect = ["ID"];
$arFilter = ["IBLOCK_ID" => CONTACTS_ID, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", 'PROPERTY_PROPERTY' => '%"brandshowroom":"Y"%'];
$res = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
while ($ob = $res->GetNextElement()) {
    if ($ob) $permission = true;
}
$update = false;
$request = Context::getCurrent()->getRequest();

$file = $_SERVER['DOCUMENT_ROOT'] . SITE_DIR . "assets/json/showroom_data.json";
$curData = [];
if (file_exists($file))
    $curData = json_decode(json_encode(json_decode(file_get_contents($file))), true);
if ($request['SLIDER_FILES_DEL'] && !empty($request['SLIDER_FILES_DEL'])) {
    foreach (array_keys($request['SLIDER_FILES_DEL']) as $delPict) {
        CFile::Delete($delPict);
    }
    $curData['SLIDER'] = array_values(array_diff($curData['SLIDER'], array_keys($request['SLIDER_FILES_DEL'])));
}
$data = $curData;
if ($request['SLIDER_FILES'] && !empty($request['SLIDER_FILES'])) {
    $update = true;
    if (!empty($data['SLIDER'])) $data['SLIDER'] = array_merge($data['SLIDER'], $request['SLIDER_FILES']);
    else $data['SLIDER'] = $request['SLIDER_FILES'];
}
if ($request['VIDEO'] && !empty($request['VIDEO'])) {
    $update = true;
    $data['VIDEO'] = [];
    $i = 0;
    foreach ($request['VIDEO'] as $videoItem) {
        if ($videoItem['ID']) {
            $i++;
            $data['VIDEO'][$i] = $videoItem;
        }
    }
    unset($videoItem);
}
$showPage = false;
if ($curData['SHOW_PAGE'] == 'on') $showPage = true;

$showMap = false;
if ($curData['SHOW_MAP'] == 'on') $showMap = true;

if ($request['sessid']) {
    if ($request['SHOW_PAGE'] == 'on') {
        $showPage = true;
        $update = true;
        $data['SHOW_PAGE'] = $request['SHOW_PAGE'];
        MYChangeSectionToMenu('showroom', 'Шоу-румы');
    } else {
        $showPage = false;
        $data['SHOW_PAGE'] = 'off';
        $update = true;
        MYChangeSectionToMenu('showroom', 'Шоу-румы', 'remove');
    }
    if ($request['SHOW_MAP'] == 'on') {
        $showMap = true;
        $update = true;
        $data['SHOW_MAP'] = $request['SHOW_MAP'];
    } else {
        $showMap = false;
        $data['SHOW_MAP'] = 'off';
        $update = true;
    }
}

$content = '';
$fileForContent = $_SERVER['DOCUMENT_ROOT'] . SITE_DIR . "showroom/include.php";
if (file_exists($fileForContent)) {
    $content = file_get_contents($fileForContent);
}
if ($request['CONTENT']) {
    $content = $request['CONTENT'];
    file_put_contents($fileForContent, $content);
}

if ($update)
    file_put_contents($file, json_encode($data, JSON_UNESCAPED_UNICODE));
?>
    <div class="wrap-mb">
        <? if ($permission): ?>
            <form action="<?= POST_FORM_ACTION_URI ?>" name="showroom_edit" id="showroom_edit" method="POST"
                  enctype="multipart/form-data">
                <?= bitrix_sessid_post() ?>
                <br>
                <h2>Вывод страницы</h2>
                <br>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="showPage"
                           name="SHOW_PAGE" <?= $showPage ? 'checked' : '' ?>>
                    <label class="form-check-label" for="showPage">
                        Выводить ссылку в меню
                    </label>
                </div>
                <hr>
                <h2>Файлы для слайдера</h2>
                <? $APPLICATION->IncludeComponent("bitrix:main.file.input", "drag_n_drop",
                    array(
                        "INPUT_NAME" => "SLIDER_FILES",
                        "MULTIPLE" => "Y",
                        "MODULE_ID" => "main",
                        "MAX_FILE_SIZE" => "",
                        "ALLOW_UPLOAD" => "I",
                        "ALLOW_UPLOAD_EXT" => ""
                    ),
                    false
                ); ?>
                <div class="row">
                    <? foreach ($data['SLIDER'] as $slide): ?>
                        <div class="col-md-3">
                            <div class="showroom-edit__slider-img">
                                <?= CFile::ShowImage($slide, 700, 700, "", "", false) ?>
                            </div>
                            <br>
                            <label for="del_<?= $slide ?>">
                                <input type="checkbox" name="SLIDER_FILES_DEL[<?= $slide ?>]" id="del_<?= $slide ?>">
                                Удалить
                            </label>
                        </div>
                    <? endforeach; ?>
                </div>
                <br>
                <hr>
                <br>
                <h2>Текстовый блок</h2>
                <div class="row">
                    <div class="col-12">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:fileman.light_editor",
                            "",
                            array(
                                "AUTO_RESIZE" => "Y",
                                "CONTENT" => $content,
                                "HEIGHT" => "300px",
                                "ID" => "",
                                "INPUT_ID" => "",
                                "INPUT_NAME" => "CONTENT",
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
                </div>
                <br>
                <hr>
                <br>
                <h2>Карта</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="showMap"
                                   name="SHOW_MAP" <?= $showMap ? 'checked' : '' ?>>
                            <label class="form-check-label" for="showMap">
                                Выводить карту с контактами на страницу
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <hr>
                <br>
                <h2>Видео</h2>
                <div class="row" id="row-video">
                    <? for ($i = 1; $i <= count($data['VIDEO']); $i++): ?>
                        <div class="col-md-4 video_field" data-count="<?= $i; ?>">
                            <div class="form-group">
                                <label for="video_name_<?= $i; ?>">Название видео</label>
                                <input type="text" class="form-control" id="video_name_<?= $i; ?>"
                                       placeholder="Название видео"
                                       value="<?= $data['VIDEO'][$i]['NAME'] ?>"
                                       name="VIDEO[<?= $i ?>][NAME]">
                            </div>
                            <div class="form-group">
                                <label for="video_id_<?= $i; ?>">ID видео на YouTube (<a data-fancybox="help"
                                                                                         href="help.png">?</a>)</label>
                                <input type="text" class="form-control" id="video_id_<?= $i; ?>"
                                       placeholder="ID видео"
                                       value="<?= $data['VIDEO'][$i]['ID'] ?>"
                                       name="VIDEO[<?= $i ?>][ID]">
                            </div>
                            <div class="form-group">
                                <label for="video_descr_<?= $i; ?>">Описание</label>
                                <textarea class="form-control" id="video_descr_<?= $i; ?>"
                                          placeholder="Описание к видео"
                                          name="VIDEO[<?= $i ?>][TEXT]"><?= $data['VIDEO'][$i]['TEXT'] ?></textarea>
                            </div>
                            <hr>
                        </div>
                    <? endfor; ?>
                </div>
                <div class="col-md-4 video_field" hidden id="empty_video_field">
                    <div class="form-group">
                        <label>Название видео</label>
                        <input type="text" class="form-control"
                               placeholder="Название видео"
                               name="VIDEO[*][NAME]">
                    </div>
                    <div class="form-group">
                        <label>ID видео на YouTube (<a data-fancybox="help" href="help.png">?</a>)</label>
                        <input type="text" class="form-control"
                               placeholder="ID видео"
                               value=""
                               name="VIDEO[*][ID]">
                    </div>
                    <div class="form-group">
                        <label>Описание</label>
                        <textarea class="form-control"
                                  placeholder="Описание к видео"
                                  name="VIDEO[*][TEXT]"></textarea>
                    </div>
                    <hr>
                </div>
                <a href="javascript:void(0)" class="btn btn-success" id="add_video_field">+</a>
                <br>
                <br>
                <hr>
                <button type="submit" class="btn btn-primary">Сохранить</button>
                <button class="btn btn-danger">Отмена</button>
            </form>
        <? else: ?>
            <br>
            <div class="alert alert-danger" role="alert">У вас нет доступа к этому разделу! Один из ваших магазинов
                должен быть фиремнным шоу-румом.
            </div>
        <? endif; ?>
    </div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>