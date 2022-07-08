<?
// Проверка на доступ (всегда стоит первой)
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/access.php");

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Редактирование - Способы оплаты");

$arResult = WorkAdmin::addPayment();
?>
<div id="admin" class="personal">
    <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/top_menu.php"); ?>
    <div class="personal__block active_el">
        <div class="row">
            <div class="col-md-2">
                <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/settings/left_menu.php"); ?>
            </div>
            <div class="col-md-10">
                <?php if($arResult['ERROR']){ ?>
                    <div class="alert alert-danger" role="alert">
                        <?=$arResult['ERROR'];?>
                    </div>
                <?php } ?>
                <?php
				$enable_yk = COption::GetOptionString("setting_su", "enable_yk", 'N');
                if ($arResult['PAYMENT_TYPE'] == 'custom' || ($arResult['PAYMENT_TYPE'] == 'YK' && $enable_yk == 'Y')) {
				?>
                    <h2 class="title__text"><?=($arResult['ID']) ? 'Редактирование "'.$arResult['NAME'].'"' : 'Добавить способ оплаты';?></h2>
                    <br>
                    <form action="<?= POST_FORM_ACTION_URI ?>" class="" id="send_delivery" method="POST" enctype="multipart/form-data">
                        <?= bitrix_sessid_post() ?>
                        <input type="hidden" name="field[SITE_ID]" value="<?=SITE_ID;?>">
                        <input type="hidden" name="field[ID]" value="<?=$arResult['ID'];?>">
                        <input type="hidden" name="field[OLD_IMAGE]" value="<?=$arResult['IMAGE'];?>">
                        <div class="row">
                            <?php if($arResult['PAYMENT_TYPE'] != 'custom') { ?>
                                <div class="col-12">
                                    <div class="alert alert-warning" role="alert">
                                        При использовании данной платежной системы Вам необходимо зарегистрировать магазин на площадке платежного агрегатора
                                        <a href="<?= SITE_DIR ?>admin/settings/payment/help/<?=$arResult['PAYMENT_TYPE'];?>/" target="_blank" style="color:#FF0000">по этой инструкции</a>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php
                                    $enable_yk = COption::GetOptionString("setting_su", "enable_yk", 'N');
                                    ?>
                                    <p>Тип платежной системы:</p>
                                    <select <?=($arResult['ID']) ? ' disabled' : '';?> class="form-control" id="payment_type" name="field[PAYMENT_TYPE]">
                                        <option value="custom">Ручной метод (по умолчанию)</option>
                                        <?php if($enable_yk==='Y') { ?>
                                            <option value="YK"<?=($arResult['PAYMENT_TYPE']=='YK') ? ' selected' : '';?>>Яндекс.Касса</option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <p>Название:</p>
                                    <input type="text" required class="form-control" id="name" name="field[NAME]" value="<?=($_GET['PAYMENT_TYPE']=='YK' && !$arResult['NAME']) ? 'Яндекс Касса' : $arResult['NAME'];?>">
                                </div>
                                <div class="form-group">
                                    <p>Сортировка:</p>
                                    <input type="text" class="form-control" id="sort" name="field[SORT]" value="<?=$arResult['SORT'];?>">
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input <?=($arResult['ACTIVE'] || !$arResult['ID'] =='Y') ? ' checked' : '';?> class="form-check-input" name="field[ACTIVE]" type="checkbox" value="Y" id="active">
                                        <label class="form-check-label" for="active">
                                            Активировать
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <?/*
                                <div class="form-group">
                                    <p>Логотип:</p>
                                    <div>
                                        <?php
                                        echo \Bitrix\Main\UI\FileInput::createInstance(array(
                                            "name" => "field[IMAGE]",
                                            "description" => false,
                                            "upload" => true,
                                            "allowUpload" => "I",
                                            "medialib" => false,
                                            "fileDialog" => false,
                                            "cloud" => false,
                                            "delete" => true,
                                            "maxCount" => 1
                                        ))->show($arResult['IMAGE']);
                                        ?>
                                    </div>
                                </div>
                                */?>
                            </div>
                            <div class="col-md-8">
                                <?php if($arResult['PAYMENT_TYPE']=='YK'){ ?>
                                    <div class="form-group">
                                        <p>shopId:</p>
                                        <input type="text" class="form-control" name="field[DATA][shopId]" value="<?=$arResult['DATA']['shopId'];?>">
                                    </div>
                                    <div class="form-group">
                                        <p>Секретный ключ:</p>
                                        <input type="text" class="form-control" name="field[DATA][secretKey]" value="<?=$arResult['DATA']['secretKey'];?>">
                                    </div>
                                    <?php if (preg_match("!test_!si",$arResult['DATA']['secretKey'])) {?>
                                        <div class="alert alert-warning" role="alert">
                                            Вы используете настройки тестового магазина. После перевода магазина в "боевой" режим, не забудьте поменять параметры shopId и Секретный ключ на актуальные.
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                                <p>Описание:</p>
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" name="field[DESCRIPTION]" id="description"><?=$arResult['DESCRIPTION'];?></textarea>
                                </div>
                                <p>Текст сообщения после успешного оформления заказа:</p>
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" name="field[DATA][SUCCESS_MESS]" id="description"><?=$arResult['DATA']['SUCCESS_MESS'];?></textarea>
                                </div>
                            </div>
                        </div>
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
                                    <a href="<?= SITE_DIR ?>admin/settings/payment/" class="btn btn-secondary btn-block">Отменить</a>
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
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#payment_type').change(function () {
            if($(this).val()){
                window.location.href = <?=SITE_DIR?>'admin/settings/payment/edit/?PAYMENT_TYPE='+$(this).val();
            } else {
                window.location.href = <?=SITE_DIR?>'admin/settings/payment/edit/';
            }
        });
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