<?
// Проверка на доступ (всегда стоит первой)
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/access.php");

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Редактирование - Скидка по сумме заказа");

use \Bitrix\Main\Context;
$request = Context::getCurrent()->getRequest();

$arResult = WorkAdmin::addDiscount(array('TYPE'=>'summ', 'ID'=>(($request['id']) ? $request['id'] : '')));
$arResult['DISCOUNT'] = $arResult['DISCOUNT'][$request['id']];

?>
<div id="admin" class="personal">
    <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/top_menu.php"); ?>
    <div class="personal__block active_el">
        <div class="row">
            <div class="col-md-2">
                <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/settings/left_menu.php"); ?>
            </div>
            <div class="col-md-10">
                <h2 class="title__text"><?=($arResult['DISCOUNT']['ID']) ? 'Редактирование скидки "'.$arResult['DISCOUNT']['NAME'].'"' : 'Добавить скидку по сумме заказа';?></h2>
                <br>
                <?php if($arResult['ERROR']){ ?>
                    <div class="alert alert-danger" role="alert">
                        <?=$arResult['ERROR'];?>
                    </div>
                <?php } ?>
                <form action="<?= POST_FORM_ACTION_URI ?>" class="" id="send_delivery" method="POST" enctype="multipart/form-data">
                    <?= bitrix_sessid_post() ?>
                    <input type="hidden" name="field[SITE_ID]" value="<?=SITE_ID;?>">
                    <input type="hidden" name="field[ID]" value="<?=$arResult['DISCOUNT']['ID'];?>">
                    <input type="hidden" name="field[DISCOUNT][ID]" value="<?=$arResult['DISCOUNT']['ID'];?>">
                    <input type="hidden" name="field[DISCOUNT][PERCENT]" value="Y">
                    <input type="hidden" name="field[DISCOUNT][TYPE]" value="summ">
                    <input type="hidden" name="field[DISCOUNT][DESCRIPTION]" value="summ">

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <p>Сумма заказа:</p>
                                <input type="text" required class="form-control" name="field[DISCOUNT][SUMM_ORDER]" value="<?=$arResult['DISCOUNT']['SUMM_ORDER'];?>">
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input <?=($arResult['DISCOUNT']['ACTIVE']=='Y' || !$arResult['DISCOUNT']['ID']) ? ' checked' : '';?> class="form-check-input" name="field[DISCOUNT][ACTIVE]" type="checkbox" value="Y" id="active">
                                    <label class="form-check-label" for="active">
                                        Активировать
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <p>Скидка, в %:</p>
                                <input type="text" id="discount" required class="form-control" name="field[DISCOUNT][DISCOUNT]" value="<?=$arResult['DISCOUNT']['DISCOUNT'];?>" data-slug="DISCOUNT_ADMIN">
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
                                <a href="<?= SITE_DIR ?>admin/settings/discount/summ/" class="btn btn-secondary btn-block">Отменить</a>
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
<style>
    .errortext {
        display:none !important;
    }
</style>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>