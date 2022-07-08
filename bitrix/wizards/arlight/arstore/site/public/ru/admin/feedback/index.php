<?
// Проверка на доступ (всегда стоит первой)
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR."admin/access.php");

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Обратная связь");

use Bitrix\Main\Page\Asset,
    \Bitrix\Main\Type;


Asset::getInstance()->addCss(SITE_DIR . "admin/settings/bootstrap.min.css");

$arResult = [];
$arSelect = Array("ID", "NAME", "DATE_CREATE", 'PROPERTY_NAME', 'PROPERTY_TYPE_MSG', 'PROPERTY_EMAIL', 'PROPERTY_MESSAGE', 'PROPERTY_PHONE', 'PROPERTY_STATUS', 'PROPERTY_MESSAGE', 'PROPERTY_TYPE');
$arFilter = Array("IBLOCK_ID" => FEEDBACK_RESULT_ID, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");

// фильтрация
if ($_GET['from']) {
    $arFilter['>=DATE_CREATE'] = new Type\DateTime($_GET['from'] . ' 00:00:00');
}
if ($_GET['to']) {
    $arFilter['<=DATE_CREATE'] = new Type\DateTime($_GET['to'] . ' 00:00:00');
}
if ($_GET['type']) {
    $arFilter['PROPERTY_TYPE_MSG'] = $_GET['type'];
}
if ($_GET['status']) {
    $arFilter['PROPERTY_STATUS'] = strval($_GET['status']);
}
if ($_GET['findall']) {
    $findall = htmlspecialcharsbx(trim($_GET['findall']));
    $arFilter[] = array(
        "LOGIC" => "OR",
        array("?PROPERTY_NAME" => $findall),
        array("?PROPERTY_EMAIL" => $findall),
        array("?PROPERTY_PHONE" => $findall),
    );
}

$res = CIBlockElement::GetList(Array("DATE_CREATE" => "DESC"), $arFilter, false, Array("nPageSize" => 50), $arSelect);
while ($ob = $res->GetNextElement()) {
    $arFields = $ob->GetFields();
    $arResult[] = $arFields;
}
?>
    <div id="admin" class="personal" data-block="2">
        <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR."admin/top_menu.php"); ?>
        <div class="personal__block active_el">
            <div class="personal__order-list">
                <div class=" personal__order-block personal__order-block--filter ">
                    <form action="<?= POST_FORM_ACTION_URI ?>" class="" method="GET" enctype="multipart/form-data">
                        <div class="row">
                            <div class="personal__order-col personal__order-col-v  col-xl-4 col-lg-12">
                                <p><b>Поиск по дате обращения</b></p>
                                <div class="personal__order-date">
                                    <div class="personal__order-date-block">
                                        <div class="personal__order-text">от</div>
                                        <div class="personal__order-date-wrap">
                                            <input type="text" name="from" id="from" class=""
                                                   value="<?= htmlspecialcharsbx($_GET['from']); ?>" autocomplete="off">
                                        </div>
                                        <div class="personal__order-text">до</div>
                                        <div class="personal__order-date-wrap">
                                            <input type="text" name="to" id="to" class="" value="<?= htmlspecialcharsbx($_GET['to']); ?>"
                                                   autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="personal__order-col personal__order-col-v  col-xl-2 col-lg-4">
                                <p><b>Поиск по типу обращения</b></p>
                                <div class="personal__order-col-form">
                                    <select name="type" class="personal__order-select" id="status_filter">
                                        <option value="">Тип обращения</option>
                                        <option
                                            <?= ($_GET['type'] == 'quest_1') ? 'selected' : ''; ?> value="quest_1">
                                            Консультация по товару
                                        </option>
                                        <option
                                            <?= ($_GET['type'] == 'quest_2') ? 'selected' : ''; ?> value="quest_2">
                                            Вопрос
                                            по работе магазина
                                        </option>
                                        <option
                                            <?= ($_GET['type'] == 'quest_3') ? 'selected' : ''; ?> value="quest_3">
                                            Сообщить об ошибке
                                        </option>
                                        <option
                                            <?= ($_GET['type'] == 'quest_4') ? 'selected' : ''; ?> value="quest_4">
                                            Вопрос со страницы "Контакты"
                                        </option>

                                    </select>
                                </div>
                            </div>
                            <div class="personal__order-col personal__order-col-v  col-xl-2 col-lg-4">
                                <p><b>Поиск по статусу ответа</b></p>
                                <div class="personal__order-col-form">
                                    <select name="status" class="personal__order-select" id="status_filter">
                                        <option value="">Статус ответа</option>
                                        <option
                                            <?= ($_GET['status'] == 'Y') ? 'selected' : ''; ?> value="Y">
                                            Ответ отправлен
                                        </option>
                                        <option
                                            <?= ($_GET['status'] == 'N') ? 'selected' : ''; ?> value="N">Новый
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="personal__order-col personal__order-col-v  col-xl-2 col-lg-4">
                                <p><b>Поиск по имени, e-mail, телефону</b></p>
                                <div class="personal__order-col-form">
                                    <input name="findall" class="personal__order-select"
                                           value="<?= $findall; ?>" placeholder="Имя, email, телефон"
                                           id="status_filter">
                                </div>
                            </div>
                            <div class="personal__order-col personal__order-col-v  col-xl-2 col-lg-12 personal__order-list-col--center">
                                <p><input type="submit" class="button" value="Применить"></p>
                                <a href="<?= SITE_DIR ?>admin/feedback/" class="button button_red">Сбросить</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class=" personal__order-block">
                    <div class=" personal__order-block">
                        <div class=" personal__order-block-item">
                            <table class="personal__order-block-list table table-striped table-hover">
                                <?php if ($arResult) { ?>
                                    <thead>
                                    <tr class="personal__order-list-item--title">
                                        <th class="personal__order-list-col">Дата создания</th>
                                        <th class="personal__order-list-col personal__order-list-col--center">№</th>
                                        <th class="personal__order-list-col">Пользователь</th>
                                        <th class="personal__order-list-col">Имя</th>
                                        <th class="personal__order-list-col">Телефон</th>
                                        <th class="personal__order-list-col">E-mail</th>
                                        <th class="personal__order-list-col">Статус</th>
                                        <th class="personal__order-list-col">Тип вопроса</th>
                                        <th class="personal__order-list-col">Сообщение</th>
                                    </tr>
                                    </thead>
                                <?php } else { ?>
                                    <div class="personal__order-list-item personal__order-list-item--title no_orders">
                                        <p>По вашему запросу обращений не найдено!</p>
                                    </div>
                                <?php } ?>
                                <?php foreach ($arResult as $order) {
                                    switch ($order['PROPERTY_TYPE_MSG_VALUE']) {
                                        case 'quest_1':
                                            $msg = 'Консультация по товару';
                                            break;
                                        case 'quest_2':
                                            $msg = 'Вопрос по работе магазина';
                                            break;
                                        case 'quest_3':
                                            $msg = 'Сообщить об ошибке';
                                            break;
                                        case 'quest_4':
                                            $msg = 'Вопрос со страницы "Контакты"';
                                            break;
                                        default:
                                            $msg = 'Консультация';
                                    }
                                    switch ($order['PROPERTY_STATUS_VALUE']) {
                                        case 'N':
                                            $status = '<div class="alert alert-success" role="alert">Новый</div>';
                                            break;
                                        case 'Y':
                                            $status = '<div class="alert alert-info" role="alert">Ответ отправлен</div>';
                                            break;
                                        default:
                                            $status = '<div class="alert alert-success" role="alert">Новый</div>';
                                    }

                                    //проверяем, есть ли пользователь среди зарегистрированных
                                    $arSpecUser = [];
                                    $filterU = ["EMAIL" => $order['PROPERTY_EMAIL_VALUE']];
                                    $orderU = ['sort' => 'asc'];
                                    $tmpU = 'sort';
                                    $rsUsers = CUser::GetList($orderU, $tmpU, $filterU);

                                    while ($arUser = $rsUsers->Fetch()) {
                                        $arSpecUser[] = $arUser;
                                    }
                                    $user = $arSpecUser[0];
                                    ?>

                                    <tr class="">
                                        <td class="personal__order-list-col ">
<!--                                            <a href="/admin/feedback/edit/?id=--><?//= $order['ID']; ?><!--">--><?//= $order['DATE_CREATE']; ?><!--</a>-->
                                            <?= $order['DATE_CREATE']; ?>
                                        </td>
                                        <td class="personal__order-list-col  personal__order-list-col--center"><?= $order['ID']; ?></td>
                                        <td class="personal__order-list-col ">
                                            <? if ($user): ?>
                                                Пользователь <?= $user['ID'] ?>
                                                <br><i>имя</i>: <?= $user['NAME'] ?>
                                                <br><i>логин</i>: <?= $user['LOGIN'] ?>
                                                <br><i>email</i>: <?= $user['EMAIL'] ?>
                                            <? else: ?>
                                                Пользователь не зарегистрирован
                                            <? endif; ?>
                                            <? if ($order['PROPERTY_TYPE_VALUE']): ?>
                                                <br><br><i>Тип плательщика</i>: <?= $order['PROPERTY_TYPE_VALUE'] ?>
                                            <? endif; ?>
                                        </td>
                                        <td class="personal__order-list-col "><?= $order['PROPERTY_NAME_VALUE']; ?></td>
                                        <td class="personal__order-list-col nowrap"><a
                                                    href="tel:<?= $order['PROPERTY_PHONE_VALUE']; ?>"><?= $order['PROPERTY_PHONE_VALUE']; ?></a>
                                        </td>
                                        <td class="personal__order-list-col "><a
                                                    href="mailto:<?= $order['PROPERTY_EMAIL_VALUE']; ?>"><?= $order['PROPERTY_EMAIL_VALUE']; ?></a>
                                        </td>
                                        <td class="personal__order-list-col ">
                                            <div class="change-status--feedback" title="Сменить статус">
                                                <?= $status; ?>
                                            </div>
                                            <form action="javascript:void(0);" class="change-status--feedback---form"
                                                  data-ibid="<?= FEEDBACK_RESULT_ID ?>">
                                                <input type="hidden" name="el-id" value="<?= $order['ID']; ?>">
                                                <select class="form-control" name="status_filter_select">
                                                    <option <?= ($order['PROPERTY_STATUS_VALUE'] == 'Y') ? 'selected' : ''; ?>
                                                            value="Y">Ответ отправлен
                                                    </option>
                                                    <option <?= ($order['PROPERTY_STATUS_VALUE'] == "N") ? 'selected' : ''; ?>
                                                            value="N">Новый
                                                    </option>
                                                </select>
                                            </form>

                                        </td>
                                        <td class="personal__order-list-col "><?= $msg; ?></td>
                                        <td class="personal__order-list-col personal__order-list-col-answer"><?= $order['PROPERTY_MESSAGE_VALUE']; ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
                <?
                $APPLICATION->IncludeComponent(
                    "bitrix:main.pagenavigation",
                    "",
                    array(
                        "NAV_OBJECT" => $arResult['NAV'],
                        "SEF_MODE" => "N",
                    ),
                    false
                );
                ?>
            </div>
        </div>
    </div>

    <style>
        .personal__order-list-col--center {
            text-align: center;
        }
    </style>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>