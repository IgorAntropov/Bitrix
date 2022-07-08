<?
// Проверка на доступ (всегда стоит первой)
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR."admin/access.php");

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Группы пользователей и скидки");
$arResult = WorkAdmin::addDiscount();
$type = 'group';
?>
<div id="admin" class="personal">
    <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR."admin/top_menu.php"); ?>
    <div class="personal__block active_el">
        <div class="row">
            <div class="col-md-2">
                <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR."admin/settings/left_menu.php"); ?>
            </div>
            <div class="col-md-10">

                <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR."admin/settings/discount/top_menu.php"); ?>
                <div class="row mb-3 align-items-center">
                    <div class="col-md-9">
                        <h1 class="title__text">Скидка по группам</h1>
                    </div>
                    <div class="col-md-3">
                        <a class="button button_block" href="<?= SITE_DIR ?>admin/settings/discount/edit/">Добавить</a>
                    </div>
                </div>
                <div class=" personal__order-block-item">
                    <div class="personal__order-block-list" style="margin:0">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Группа</th>
                                <th>Описание</th>
                                <th>Скидка</th>
                                <?//<th>Сортировка</th>?>
                                <th>Активность</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($arResult['GROUPS'] as $group) { ?>
                                <tr>
                                    <td><a class="text-danger" href="<?= SITE_DIR ?>admin/settings/discount/edit/?id=<?= $group['ID']; ?>"><?=$group['NAME'];?></a></td>
                                    <td><?=$group['DESCRIPTION'];?></td>
                                    <td>
                                        <?php foreach ($arResult['DISCOUNT'] as $discount) {
                                            if($discount['GROUPS'] != $group['ID'])
                                                continue;
                                            ?>
                                            <?=(($discount['PERCENT']=='Y') ? $discount['DISCOUNT'].'%' :  WorkCart::numberFormat($discount['DISCOUNT']));?>
                                            <?=(($discount['ACTIVE']!='Y') ? '- <span style="color:#FF0000">неактивна</span>' : '');?>
                                        <?php } ?>
                                    </td>
                                    <?/*<td><?=$group['C_SORT']; ?></td>*/?>
                                    <td><?= ($group['ACTIVE'] == 'Y') ? 'Да' : 'Нет'; ?></td>
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