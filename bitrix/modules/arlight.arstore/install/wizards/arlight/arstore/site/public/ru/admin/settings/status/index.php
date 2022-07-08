<?
// Проверка на доступ (всегда стоит первой)
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/access.php");

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Статусы заказов");
$arResult = WorkOrder::getStatus(SITE_ID, 'Y');
?>
<div id="admin" class="personal">
    <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/top_menu.php"); ?>
    <div class="personal__block active_el">
        <div class="row">
            <div class="col-md-2">
                <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/settings/left_menu.php"); ?>
            </div>
            <div class="col-md-10">
                <div class="row mb-3 align-items-center">
                    <div class="col-md-9">
                        <h1 class="title__text">Статусы заказов</h1>
                    </div>
                    <div class="col-md-3">
                        <a class="button button_block" href="<?= SITE_DIR ?>admin/settings/status/edit/">Добавить</a>
                    </div>
                </div>
                <div class="personal__order-block-item">
                    <div class="personal__order-block-list" >

                        <?php
                        $errorDefault = true;
                        $errorForPayment = true;
                        foreach ($arResult as $result) {
                            if ($result['DEFAULT'] == 'Y' && $errorDefault) {
                                $errorDefault = false;
                            }
                            if ($result['FOR_PAYMENT'] == 'Y' && $errorForPayment) {
                                $errorForPayment = false;
                            }
                        }
                        ?>
                        <?php if($errorDefault) { ?>
                            <div class="alert alert-danger" role="alert">
                                Необходимо выбрать статус для нового заказа. В противном случае корректная работа магазина невозможна!
                            </div>
                        <?php } ?>
                        <?php if($errorForPayment) { ?>
                            <div class="alert alert-danger" role="alert">
                                Необходимо выбрать статус для оплаченного заказа. В противном случае корректная работа магазина невозможна!
                            </div>
                        <?php } ?>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Название</th>
                                    <th>Описание</th>
                                    <th>Сортировка</th>
                                    <th>Отправлять уведомление</th>
                                    <th>Активность</th>
                                    <th>По умолчанию</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $cnt = 1;
                            foreach ($arResult as $result) {?>
                                <tr>
                                    <td><?= $cnt; ?></td>
                                    <td>
                                        <a class="text-danger" href="<?= SITE_DIR ?>admin/settings/status/edit/?id=<?= $result['ID']; ?>"><?= $result['NAME']; ?></a>
                                    </td>
                                    <td><?= $result['DESCRIPTION']; ?></td>
                                    <td><?= $result['SORT']; ?></td>
                                    <td><?= ($result['SEND_MESSAGE'] == 'Y') ? 'Да' : 'Нет'; ?></td>
                                    <td><?= ($result['ACTIVE'] == 'Y') ? 'Да' : 'Нет'; ?></td>
                                    <td><?= ($result['DEFAULT'] == 'Y') ? 'Для нового заказа' : ''; ?><?= ($result['FOR_PAYMENT'] == 'Y') ? 'Для оплаченного заказа' : ''; ?></td>
                                </tr>
                            <?php
                                $cnt++;
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>