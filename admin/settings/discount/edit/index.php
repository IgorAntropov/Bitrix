<?
// Проверка на доступ (всегда стоит первой)
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR."admin/access.php");

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Редактирование - Группы");

use \Bitrix\Main\Context;
$request = Context::getCurrent()->getRequest();

$arResult = WorkAdmin::addDiscount(array('GROUPS'=>(($request['id']) ? $request['id'] : '-1')));

?>
<div id="admin" class="personal">
    <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR."admin/top_menu.php"); ?>
    <div class="personal__block active_el">
        <div class="row">
            <div class="col-md-2">
                <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR."admin/settings/left_menu.php"); ?>
            </div>
            <div class="col-md-10">
                <h2 class="title__text"><?=($arResult['ID']) ? 'Редактирование группы "'.$arResult['NAME'].'"' : 'Добавить группу';?></h2>
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
                        <div class="col-12">
                            <div class="form-group">
                                <p>Название группы:</p>
                                <input type="text" required class="form-control" id="name" name="field[NAME]" value="<?=$arResult['NAME'];?>">
                            </div>
                            <div class="form-group">
                                <p>Описание:</p>
                                <textarea class="form-control" rows="5" name="field[DESCRIPTION]" id="description"><?=$arResult['DESCRIPTION'];?></textarea>
                            </div>
                            <div class="form-group">
                                <?//<p>Сортировка:</p>?>
                                <input type="hidden" class="form-control" id="name" name="field[SORT]" value="<?=$arResult['C_SORT'];?>">
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input <?=($arResult['ACTIVE']=='Y' || !$arResult['ID']) ? ' checked' : '';?> class="form-check-input" name="field[ACTIVE]" type="checkbox" value="Y" id="active">
                                    <label class="form-check-label" for="active">
                                        Активировать
                                    </label>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>


                    <br />
                    <br />
                    <h2 class="title__text">Управление скидками:</h2>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Скидка</th>
                                <?//<th style="text-align: center;">В процентах?</th>?>
                                <?//<th style="text-align: center;">Активность</th> ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($arResult['DISCOUNT'] as $key => $discount) {
                            $arDiscountData = json_decode($discount['DATA'], true);
                            ?>
                            <tr style="text-align: center;">
                                <td>
                                    <input type="hidden" name="field[DISCOUNT][ID]" value="<?=$discount['ID'];?>">
                                    <input type="text" id="discount" class="form-control" name="field[DISCOUNT][DISCOUNT]" value="<?=$discount['DISCOUNT'];?>" data-slug="DISCOUNT_ADMIN">
                                </td>
                                <td class="align-middle text-left">
                                    <?/*<input <?=($discount['PERCENT']=='Y') ? ' checked' : '';?> class="form-check-input" name="field[DISCOUNT][PERCENT]" type="checkbox" value="Y">*/?>
                                    <input name="field[DISCOUNT][PERCENT]" type="hidden" value="Y"> %
                                </td>
                                <td>
                                    <?/*<input <?=($discount['ACTIVE']=='Y' || !$arResult['ID']) ? ' checked' : '';?> class="form-check-input" name="field[DISCOUNT][ACTIVE]" type="checkbox" value="Y"> */?>
                                    <input name="field[DISCOUNT][ACTIVE]" type="hidden" value="Y">
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>


                    <br />
                    <br />
                    <h2 class="title__text">Управление пользователями:</h2>
                    <input type="text" class="form-control" id="searchUser" placeholder="Поиск по имени, Email или ID пользователя">
                    <br>
                    <table id="tableUser" class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Имя</th>
                            <th>EMAIL</th>
                            <th style="text-align: center;">Добавить в группу</th>
                            <th style="text-align: center;">Применять скидку<br>по сумме заказа</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($arResult['USERS'] as $gUser) { ?>
                            <tr>
                                <td>
                                    <?=$gUser['ID'];?>
                                </td>
                                <td>
                                    <?=$gUser['NAME'];?><?=($gUser['LAST_NAME']) ? ' '.$gUser['LAST_NAME'] : '';?>
                                </td>
                                <td>
                                    <?=$gUser['EMAIL']?>
                                </td>
                                <td style="text-align: center;">
                                    <input <?=(in_array($arResult['ID'],$gUser['GROUPS'])) ? ' checked' : '';?> class="form-check-input" name="field[USERS][]" type="checkbox" value="<?=$gUser['ID'];?>">
                                </td>
                                <td style="text-align: center;">
                                    <input class="form-check-input" <?=(in_array($gUser['ID'], $arDiscountData['EX_DISC_SUMM_USER'])) ? '' : 'checked';?>
                                           name="field[EXCLUDE_DISCOUNT_SUMM][]" type="checkbox" value="<?=$gUser['ID'];?>">
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <? if (DEMOVERSION != 'true' || $USER->IsAdmin()): ?>
                                    <input type="submit" id="save" class="btn btn-primary btn-block" value="Сохранить">
                                <? else: ?>
                                    <input type="button" id="save-demo" class="btn btn-primary btn-block" value="Сохранить">
                                <? endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <a href="<?= SITE_DIR ?>admin/settings/discount/" class="btn btn-secondary btn-block">Отменить</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <? if (DEMOVERSION != 'true' || $USER->IsAdmin()): ?>
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
        $("#discount").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        }).keyup(function (e) {
            if(e.currentTarget.value > 99){
                e.currentTarget.value = 99;
            }
        });
    });
</script>
<style>
    .errortext {
        display:none !important;
    }
</style>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>