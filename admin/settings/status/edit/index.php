<?
// Проверка на доступ (всегда стоит первой)
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/access.php");

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Редактирование - Статусы заказов");

$arResult = WorkAdmin::addStatus();

?>
<div id="admin" class="personal">
    <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/top_menu.php"); ?>
    <div class="personal__block active_el">
        <div class="row">
            <div class="col-md-2">
                <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/settings/left_menu.php"); ?>
            </div>
            <div class="col-md-10">
                <h2 class="title__text"><?=($arResult['ID']) ? 'Редактирование "'.$arResult['NAME'].'"' : 'Добавить статус заказа';?></h2>
                <br>
                <?php if($arResult['ERROR']){ ?>
                    <div class="alert alert-danger" role="alert">
                        <?=$arResult['ERROR'];?>
                    </div>
                <?php } ?>
                <form action="<?= POST_FORM_ACTION_URI ?>" class="" id="send_delivery" method="POST" enctype="multipart/form-data">
                    <?= bitrix_sessid_post() ?>
                    <input type="hidden" name="field[SITE_ID]" value="<?=SITE_ID;?>">
                    <input type="hidden" name="field[ID]" value="<?=$arResult['ID'];?>">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <p>Название:</p>
                                <input required type="text" class="form-control" id="name" name="field[NAME]" value="<?=$arResult['NAME'];?>">
                            </div>
                            <div class="form-group">
                                <p>Сортировка:</p>
                                <input type="text" class="form-control" id="sort" name="field[SORT]" value="<?=$arResult['SORT'];?>">
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input <?=($arResult['ACTIVE']=='Y' || !$arResult['ID']) ? ' checked' : '';?> class="form-check-input" name="field[ACTIVE]" type="checkbox" value="Y" id="active">
                                    <label class="form-check-label" for="active">
                                        Активировать
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input <?=($arResult['SEND_MESSAGE']=='Y' || !$arResult['ID']) ? ' checked' : '';?> class="form-check-input" name="field[SEND_MESSAGE]" type="checkbox" value="Y" id="send_message">
                                    <label class="form-check-label" for="send_message">
                                        Отправлять почтовое уведомление пользователю при переходе заказа в этот статус
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input <?=($arResult['DEFAULT']=='Y') ? ' checked' : '';?> class="form-check-input" name="field[DEFAULT]" type="checkbox" value="Y" id="default">
                                    <label class="form-check-label" for="default">
                                        Присваивать по умолчанию этот статус заказу при оформлении
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input <?=($arResult['FOR_PAYMENT']=='Y') ? ' checked' : '';?> class="form-check-input" name="field[FOR_PAYMENT]" type="checkbox" value="Y" id="for_payment">
                                    <label class="form-check-label" for="for_payment">
                                        Присваивать по умолчанию этот статус заказу при успешной оплате
                                    </label>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-md-8">
                            <p>Описание:</p>
                            <div class="form-group">
                                <textarea class="form-control" rows="15" name="field[DESCRIPTION]" id="description"><?=$arResult['DESCRIPTION'];?></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <? if (DEMOVERSION != 'true'): ?>
                                    <input type="submit" id="save" class="btn btn-primary btn-block" value="Сохранить">
                                <? else: ?>
                                    <input type="button" id="save-demo" class="btn btn-primary btn-block" value="Сохранить">
                                <? endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <a href="<?= SITE_DIR ?>admin/settings/status/" class="btn btn-secondary btn-block">Отменить</a>
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
       $('#for_payment').click(function () {
           $('#default').prop('checked', false);
       });
       $('#default').click(function () {
           $('#for_payment').prop('checked', false);
       });
    });
</script>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>