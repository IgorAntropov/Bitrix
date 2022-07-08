<?
// Проверка на доступ (всегда стоит первой)
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR."admin/access.php");

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Редактирование - Промокоды");

use \Bitrix\Main\Page\Asset,
    \Bitrix\Main\Context;
$request = Context::getCurrent()->getRequest();

$arResult = WorkAdmin::addDiscount(array('TYPE'=>'promo', 'ID'=>(($request['id']) ? $request['id'] : '')));
$arResult['DISCOUNT'] = $arResult['DISCOUNT'][$request['id']];

Asset::getInstance()->addCss(SITE_DIR . "admin/settings/bootstrap.min.css");
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/custom.css");
Asset::getInstance()->addJs(SITE_DIR . "admin/settings/discount/promo/edit/script.js");

?>
<div id="admin" class="personal">
    <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR."admin/top_menu.php"); ?>
    <div class="personal__block active_el">
        <div class="row">
            <div class="col-md-2">
                <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR."admin/settings/left_menu.php"); ?>
            </div>
            <div class="col-md-10">
                <h2 class="title__text"><?=($arResult['DISCOUNT']['ID']) ? 'Редактирование промокода '.$arResult['DISCOUNT']['PROMOCODE'] : 'Добавить промокод';?></h2>
                <br>
                <?php if($arResult['ERROR']){ ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $arResult['ERROR']; ?>
                    </div>
                <?php } ?>
                <form action="<?= POST_FORM_ACTION_URI ?>" class="" id="send_delivery" method="POST" enctype="multipart/form-data">
                    <?= bitrix_sessid_post() ?>
                    <input type="hidden" name="field[SITE_ID]" value="<?=SITE_ID;?>">
                    <input type="hidden" name="field[ID]" value="<?=$arResult['DISCOUNT']['ID'];?>">
                    <input type="hidden" name="field[DISCOUNT][ID]" value="<?=$arResult['DISCOUNT']['ID'];?>">
                    <input type="hidden" name="field[DISCOUNT][PERCENT]" value="Y">
                    <input type="hidden" name="field[DISCOUNT][TYPE]" value="promo">

                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <p>Промокод:</p>
                                <input type="text" required class="form-control" id="promocode" name="field[DISCOUNT][PROMOCODE]" value="<?=$arResult['DISCOUNT']['PROMOCODE'];?>">
                                <a href="#" id="gen_password" title="Генерировать промокод"><img alt="Генерировать промокод" title="Генерировать промокод" src="<?=SITE_DIR?>admin/settings/discount/promo/update.png"></a>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <p>Скидка, в %:</p>
                                <input type="text" id="discount" required class="form-control" name="field[DISCOUNT][DISCOUNT]" value="<?=$arResult['DISCOUNT']['DISCOUNT'];?>" data-slug="DISCOUNT_ADMIN">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <p>Применимость:</p>
                                <select name="field[DISCOUNT][MULTI]" class="form-control">
                                    <option value="Y">Многоразовый</option>
                                    <option <?=($arResult['DISCOUNT']['MULTI'] == 'N') ? ' selected' : '';?> value="N">Одноразовый</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <p>Период использования:</p>
                                <select name="field[DISCOUNT][PERIOD]" class="form-control" id="period">
                                    <option value="all">Бессрочно</option>
                                    <option <?=($arResult['DISCOUNT']['DATE_TO']) ? ' selected' : '';?> value="period">От даты до даты</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row row_period mb-3"<?=(!$arResult['DISCOUNT']['DATE_TO']) ? ' style="display: none;"' : '';?>>
                        <div class="col-3">
                            <p>Период использования:</p>
                            <div class="personal__order-date">
                                <div class="personal__order-date-block">
                                    <div class="personal__order-text">от</div>
                                    <div class="personal__order-date-wrap">
                                        <input type="text" name="field[DISCOUNT][DATE_FROM]" id="from" class=""
                                               value="<?=($arResult['DISCOUNT']['DATE_FROM']) ? $arResult['DISCOUNT']['DATE_FROM']->format('d.m.Y') : date('d.m.Y');?>" autocomplete="off">
                                    </div>
                                    <div class="personal__order-text">до</div>
                                    <div class="personal__order-date-wrap">
                                        <input type="text" name="field[DISCOUNT][DATE_TO]" id="to" class=""
                                               value="<?=($arResult['DISCOUNT']['DATE_TO']) ? $arResult['DISCOUNT']['DATE_TO']->format('d.m.Y') : '';?>" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <?
                        $sections = [];
                        $json = $arResult['DISCOUNT']['DESCRIPTION'];
                        $obj = json_decode($json);
                        $sections = $obj->{'sections'};
                        $articles = $obj->{'articles'};
                        $strTitleArticles = '';
                        if (!empty($articles)) $strTitleArticles = implode(', ', $articles);
                        $strTitleSection = '';
                        ?>
                        <div class="col-6">
                            <h3>Условие по группе товаров</h3>
                            <? $l = CIBlockSection::GetTreeList(array("IBLOCK_ID" => CATALOG_ID), array("ID", "NAME", "DEPTH_LEVEL")); ?>
                            <select name="IBLOCK_SECTION[]" size="14" multiple onchange="onSectionChanged(this)">
                                <?
                                while ($ar_l = $l->GetNext()):
                                    if (!empty($sections) && in_array($ar_l["ID"], $sections)) {
                                        if ($strTitleSection != '')
                                            $strTitleSection .= ', ' . $ar_l["NAME"];
                                        else $strTitleSection = $ar_l["NAME"];
                                    };
                                    ?>
                                    <option value="<? echo $ar_l["ID"] ?>"
                                    <? if (!empty($sections) && in_array($ar_l["ID"], $sections)) echo " selected" ?>><? echo str_repeat(" . ", $ar_l["DEPTH_LEVEL"]) ?><? echo $ar_l["NAME"] ?></option><?
                                endwhile;
                                ?>
                            </select>
                            <?
                            $text = 'Ничего не выбрано';
                            if ($strTitleSection != '') $text = 'Выбрано: ' . $strTitleSection;
                            ?>
                            <div class="alert alert-info text coupon-alert" role="alert"><?= $text; ?></div>
                        </div>
                        <div class="col-6">
                            <h3>Условие по артикулу товара</h3>
                            <label class="" for="fileInput">Загрузить файл в формате csv*</label><br><br>
                            <input id="fileInput" type="file" onchange="processFiles(this)">
                            <?
                            $text = 'Ничего не выбрано';
                            if ($strTitleArticles != '') $text = 'Выбрано: ' . $strTitleArticles;
                            ?>
                            <div class="alert alert-info text coupon-alert coupon-alert--article"
                                 role="alert"> <?= $text; ?></div>
                            <p><small>* - пример файла можно скачать по <a href="<?= SITE_DIR ?>assets/static/promo/art.csv" download=""> ссылке</a></small></p>
                            <a href="javascript:void(0)" class="" id="del-coupon-article">Удалить условие по артикулу
                                товара</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="form-check">
                                    <input <?=($arResult['DISCOUNT']['ACTIVE']=='Y' || !$arResult['DISCOUNT']['ID']) ? ' checked' : '';?> class="form-check-input" name="field[DISCOUNT][ACTIVE]" type="checkbox" value="Y" id="active">
                                    <label class="form-check-label" for="active">
                                        Активировать
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <? $valInput = ($arResult['DISCOUNT']['DESCRIPTION']) ?: '{"sections":[],"articles":[]}' ?>
                    <input type="text" id="discount-descr" required class="form-control" <?= !$USER->IsAdmin() ? 'hidden' : ''; ?>
                           name="field[DISCOUNT][DESCRIPTION]"
                           value="<?= htmlspecialchars($valInput); ?>">
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
                                <a href="<?= SITE_DIR ?>admin/settings/discount/promo/" class="btn btn-secondary btn-block">Отменить</a>
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
    function generatePassword() {
        var length = 10,
            charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
            retVal = "";
        for (var i = 0, n = charset.length; i < length; ++i) {
            retVal += charset.charAt(Math.floor(Math.random() * n));
        }
        return retVal;
    }
    $(document).ready(function () {
        $('#period').change(function () {
            if($(this).val()==='period'){
                $('.row_period').show();
            } else {
                $('.row_period').hide();
            }
        });
        $('#gen_password').click(function () {
            $('#promocode').val(generatePassword());
            return false;
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
<style>
    .errortext {
        display:none !important;
    }
    #gen_password {
        position: absolute;
        right: 10px;
        top: 33px;
        width: 20px;
        height: 20px;
    }
    #gen_password img {
        width: 100%;
    }
    .coupon-alert{
        margin-top: 1rem;
    }
    #del-coupon-article{
        color: red;
        text-decoration: underline;
    }
</style>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>