<?
// Проверка на доступ (всегда стоит первой)
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/access.php");

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Скидка по сумме заказа");
$arResult = WorkAdmin::addDiscount();
$type = 'summ';
?>
<div id="admin" class="personal">
    <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/top_menu.php"); ?>
    <div class="personal__block active_el">
        <div class="row">
            <div class="col-md-2">
                <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/settings/left_menu.php"); ?>
            </div>
            <div class="col-md-10">

                <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/settings/discount/top_menu.php"); ?>

                <div class="row mb-3 align-items-center">
                    <div class="col-md-9">
                        <h1 class="title__text">Скидка по сумме заказа</h1>
                    </div>
                    <div class="col-md-3">
                        <a class="button button_block" href="<?= SITE_DIR ?>admin/settings/discount/summ/edit/">Добавить</a>
                    </div>
                </div>
                <div class=" personal__order-block-item">
                    <div class="personal__order-block-list" style="margin:0">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Сумма заказа</th>
                                <th>Скидка, в %</th>
                                <th>Активность</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($arResult['DISCOUNT'] as $discount) {
                                if($discount['TYPE'] != $type)
                                    continue;
                                ?>
                                <tr>
                                    <td><a class="text-danger" href="<?= SITE_DIR ?>admin/settings/discount/summ/edit/?id=<?= $discount['ID']; ?>"><?=WorkCart::numberFormat($discount['SUMM_ORDER']);?></a></td>
                                    <td><?=$discount['DISCOUNT'];?></td>
                                    <td><?= ($discount['ACTIVE'] == 'Y') ? 'Да' : 'Нет'; ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>