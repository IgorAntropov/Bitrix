<?
// Проверка на доступ (всегда стоит первой)
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/access.php");

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

use  Bitrix\Main\Context,
    Bitrix\Main\Page\Asset;

Asset::getInstance()->addCss(SITE_DIR . "admin/settings/bootstrap.min.css");

$request = Context::getCurrent()->getRequest();
if (!$request['id']) {
    LocalRedirect(SITE_DIR."admin/");
}

$orderId = (int)$request['id'];
$APPLICATION->SetTitle('Обращение №' . $orderId);

$arSelect = Array("ID", "NAME", "DATE_CREATE", 'PROPERTY_NAME', 'PROPERTY_TYPE_MSG', 'PROPERTY_EMAIL', 'PROPERTY_MESSAGE', 'PROPERTY_PHONE', 'PROPERTY_STATUS', 'PROPERTY_MESSAGE');
$arFilter = Array("IBLOCK_ID" => FEEDBACK_RESULT_ID, "ID" => $orderId, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 50), $arSelect);
while ($ob = $res->GetNextElement()) {
    $arResult = $ob->GetFields();
}
switch ($arResult['PROPERTY_TYPE_MSG_VALUE']) {
    case 'quest_1':
        $msg = 'Консультация по товару';
        break;
    case 'quest_2':
        $msg = 'Вопрос по работе магазина';
        break;
    case 'quest_3':
        $msg = 'Сообщить об ошибке';
        break;
}
switch ($arResult['PROPERTY_STATUS_VALUE']) {
    case '0':
        $status = '<div class="alert alert-success" role="alert">Новый</div>';
        break;
    case '1':
        $status = '<div class="alert alert-info" role="alert">Ответ отправлен</div>';
        break;
}

//проверяем, есть ли пользователь среди зарегистрированных
$arSpecUser = [];
$filterU = ["EMAIL" => $arResult['PROPERTY_EMAIL_VALUE']];
$orderU = ['sort' => 'asc'];
$tmpU = 'sort';
$rsUsers = CUser::GetList($orderU, $tmpU, $filterU);

while ($arUser = $rsUsers->Fetch()) {
    $arSpecUser[] = $arUser;
}
$user = $arSpecUser[0];
?>

    <div id="admin" class="personal">
        <? require($_SERVER["DOCUMENT_ROOT"] .  SITE_DIR . "admin/top_menu.php"); ?>
        <div class="personal__block active_el">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="title__text"><?= $arResult['NAME'] . ' №' . $orderId ?></h2>
                    <br>
                    <?php if ($arResult['ERROR']) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $arResult['ERROR']; ?>
                        </div>
                    <?php } ?>
                    <pre>
                        <?
//                                                print_r($arResult);
                        ?>
                    </pre>
                    <form action="<?= POST_FORM_ACTION_URI ?>" class="" id="send_delivery" method="POST"
                          enctype="multipart/form-data">
                        <?= bitrix_sessid_post() ?>
                        <input type="hidden" name="field[SITE_ID]" value="<?= SITE_ID; ?>">
                        <input type="hidden" name="field[ID]" value="<?= $arResult['ID']; ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p>Статус ответа</p>
                                    <select class="form-control" id="status_filter" name="field[PROPERTIES][STATUS]">
                                        <option value="">Статус ответа</option>
                                        <option
                                            <?= ($arResult['PROPERTY_STATUS_VALUE'] == 1) ? 'selected' : ''; ?> value="1">
                                            Ответ отправлен
                                        </option>
                                        <option
                                            <?= ($arResult['PROPERTY_STATUS_VALUE'] == 0) ? 'selected' : ''; ?>value="0">Новый
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p>Тип обращения</p>
                                    <input type="text" class="form-control" readonly value="<?= $msg; ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p>Дата</p>
                                    <input type="text" class="form-control" readonly value="<?= $arResult['DATE_CREATE']; ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p>Имя</p>
                                    <input type="text" class="form-control" readonly value="<?= $arResult['PROPERTY_NAME_VALUE']; ?>">
                                    <p>
                                        <? if ($user): ?>
                                            Пользователь <?= $user['ID'] ?>
                                            <br><i>имя</i>: <?= $user['NAME'] ?>
                                            <br><i>логин</i>: <?= $user['LOGIN'] ?>
                                            <br><i>email</i>: <?= $user['EMAIL'] ?>
                                        <? else: ?>
                                            Пользователь не зарегистрирован
                                        <? endif; ?>
                                    </p>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p>Телефон</p>
                                    <input type="text" class="form-control" readonly value="<?= $arResult['PROPERTY_PHONE_VALUE']; ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p>Email (<a href="mailto:<?= $arResult['PROPERTY_EMAIL_VALUE']; ?>">Написать ответ</a>)</p>
                                    <input type="text" class="form-control" readonly value="<?= $arResult['PROPERTY_EMAIL_VALUE']; ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p>Сообщение</p>
                                    <textarea type="text" class="form-control" readonly ><?= trim ($arResult['PROPERTY_MESSAGE_VALUE']); ?>
                                    </textarea>
                                </div>
                            </div>

                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <? if (DEMOVERSION != 'true'): ?>
                                        <input type="submit" id="save" class="btn btn-primary btn-block"
                                               value="Сохранить">
                                    <? else: ?>
                                        <input type="button" id="save-demo" class="btn btn-primary btn-block"
                                               value="Сохранить">
                                    <? endif; ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <a href="<?= SITE_DIR ?>admin/feedback/" class="btn btn-secondary btn-block">Отменить</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <? if (DEMOVERSION != 'true'): ?>
                                        <a href="" class="btn btn-danger float-right" id="remove_btn">Удалить</a>
                                        <input type="hidden" id="remove" name="field[REMOVE]" value="">
                                    <? else: ?>
                                        <a href="" class="btn btn-danger float-right" id="save-demo">Удалить</a>
                                    <? endif; ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#remove_btn').click(function () {
                if (confirm("Вы уверены, что хотите удалить данный элемент? Это действие необратимо!")) {
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