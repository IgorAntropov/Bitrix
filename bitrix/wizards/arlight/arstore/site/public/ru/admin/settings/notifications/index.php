<?
// Проверка на доступ (всегда стоит первой)
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/access.php");

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle("Настройки почтовых уведомлений");


//получение списка пользователей из группы администраторы магазина
$arSpecUser = [];
$filterU = ["GROUPS_ID" => 7];
$orderU = ['sort' => 'asc'];
$tmpU = 'sort';
$rsUsers = CUser::GetList($orderU, $tmpU, $filterU);

while ($arUser = $rsUsers->Fetch()) {
    $arSpecUser[] = $arUser;
}

$emailOrderList = trim(COption::GetOptionString("header_action", "emailOrderList", ''));
$emailFeedbackList = trim(COption::GetOptionString("header_action", "emailFeedbackList", ''));
?>
    <div id="admin" class="personal">
        <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/top_menu.php"); ?>
        <div class="personal__block active_el">
            <div class="row">
                <div class="col-md-2">
                    <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/settings/left_menu.php"); ?>
                </div>
                <div class="col-md-10">
                    <h4>Настройка отправки копий уведомлений сотрудникам компании</h4>
                    <br>
                    <form action="javascript:void(0);" id="notifications_user">
<!--                        <table class="table">-->
<!--                            <thead>-->
<!--                            <tr>-->
<!--                                <th scope="col">#</th>-->
<!--                                <th scope="col">Пользователь</th>-->
<!--                                <th scope="col">Отправлять уведомления, связанные с заказами</th>-->
<!--                                <th scope="col">Отправлять уведомления, связанные с формой обратной связи</th>-->
<!--                            </tr>-->
<!--                            </thead>-->
<!--                            <tbody>-->
<!--                            --><?//
//                            foreach ($arSpecUser as $key => $user): ?>
<!--                                <tr>-->
<!--                                    <th scope="row">--><?//= $key + 1 ?><!--</th>-->
<!--                                    <td>-->
<!--                                        <p>Логин: --><?//= $user['LOGIN'] ?><!--</p>-->
<!--                                        <p>E-mail: --><?//= $user['EMAIL'] ?><!--</p>-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        --><?// if (stristr($emailOrderList, $user['EMAIL'])): ?>
<!--                                            <input type="checkbox" name="note_order" checked-->
<!--                                                   data-email="--><?//= $user['EMAIL'] ?><!--">-->
<!--                                        --><?// else: ?>
<!--                                            <input type="checkbox" name="note_order" data-email="--><?//= $user['EMAIL'] ?><!--">-->
<!--                                        --><?// endif; ?>
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        --><?// if (stristr($emailFeedbackList, $user['EMAIL'])): ?>
<!--                                            <input type="checkbox" name="note_feedback" checked-->
<!--                                                   data-email="--><?//= $user['EMAIL'] ?><!--">-->
<!--                                        --><?// else: ?>
<!--                                            <input type="checkbox" name="note_feedback"-->
<!--                                                   data-email="--><?//= $user['EMAIL'] ?><!--">-->
<!--                                        --><?// endif; ?>
<!--                                    </td>-->
<!--                                </tr>-->
<!--                            --><?// endforeach; ?>
<!--                            </tbody>-->
<!--                        </table>-->
                        <div class="form-group">
                            <p>Отправлять уведомления, связанные с заказами</p>
                            <? if ($emailOrderList): ?>
                                <? $emailOrderListAr = explode(', ', $emailOrderList); ?>
                                <? foreach ($emailOrderListAr as $email): ?>
                                    <p><input type="email"  class="form-control" name="note_order" value="<?=$email?>" placeholder="E-mail" autocomplete="off"></p>
                                <? endforeach; ?>
                                <p><input type="email"  class="form-control" name="note_order" value="" placeholder="E-mail" autocomplete="off"></p>
                            <? else: ?>
                                <p><input type="email"  class="form-control" name="note_order" value="" placeholder="E-mail" autocomplete="off"></p>
                            <? endif; ?>
                            <button class="button note_order_add" >Добавить</button>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <p>Отправлять уведомления, связанные с формой обратной связи</p>
                            <? if ($emailFeedbackList): ?>
                                <? $emailFeedbackAr = explode(', ', $emailFeedbackList); ?>
                                <? foreach ($emailFeedbackAr as $email): ?>
                                    <p><input type="email"  class="form-control" name="note_feedback" value="<?=$email?>" placeholder="E-mail" autocomplete="off"></p>
                                <? endforeach; ?>
                                <p><input type="email"  class="form-control" name="note_feedback" value="" placeholder="E-mail" autocomplete="off"></p>
                            <? else: ?>
                                <p><input type="email"  class="form-control" name="note_feedback" value="" placeholder="E-mail" autocomplete="off"></p>
                            <? endif; ?>
                            <button class="button note_order_add">Добавить</button>
                        </div>
                        <br>
                        <br>
                        <input type="submit" value="Сохранить" class="button button_red">
                        <br>
                        <br>
                        <p>* Если вам необходимо добавить новых пользователей в группу администраторов магазина, обратитесь в
                            <a href="<?= SITE_DIR ?>admin/settings/support/" class="theme-link">техническую поддержку</a></p>

                    </form>
                </div>
            </div>
        </div>
    </div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>