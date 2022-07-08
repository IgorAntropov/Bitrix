<?
// Проверка на доступ (всегда стоит первой)
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR."admin/access.php");

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Способы доставки");
$arResult = WorkOrder::getDelivery(SITE_ID, 'Y');
?>
<div id="admin" class="personal">
    <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR."admin/top_menu.php"); ?>
    <div class="personal__block active_el">
        <div class="row">
            <div class="col-lg-2">
                <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR."admin/settings/left_menu.php"); ?>
            </div>
            <div class="col-lg-10">
                <div class="row mb-3 align-items-center">
                    <div class="col-md-9">
                        <h1 class="title__text">Способы доставки</h1>
                    </div>
                    <div class="col-md-3">
                            <a class="button button_block" href="<?= SITE_DIR ?>admin/settings/delivery/edit/">Добавить</a>
                    </div>
                </div>
                <div class="personal__order-block-item">
                    <div class="personal__order-block-list" style="">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>№</th>
                                <th>Название</th>
                                <th>Описание</th>
                                <?php // <th>Логотип</th> ?>
                                <th>Сортировка</th>
                                <th>Активность</th>
                                <th>Стоимость</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $cnt = 1;
                            foreach ($arResult as $result) {
                                ?>
                                <tr>
                                    <td><?= $cnt; ?></td>
                                    <td>
                                        <a class="text-danger" href="<?= SITE_DIR ?>admin/settings/delivery/edit/?id=<?= $result['ID']; ?>"><?= $result['NAME']; ?></a>
                                    </td>
                                    <td><?= $result['DESCRIPTION']; ?></td>
                                    <? /*
                                    <td>
                                        <?php
                                        if ($result['IMAGE']) {
                                            $img = CFile::ResizeImageGet($result['IMAGE'], array('width' => 50, 'height' => 50), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                                            echo '<img src="' . $img['src'] . '" alt="' . $result['NAME'] . '">';
                                        }
                                        ?>
                                    </td>
                                    */ ?>
                                    <td><?= $result['SORT']; ?></td>
                                    <td><?= ($result['ACTIVE'] == 'Y') ? 'Да' : 'Нет'; ?></td>
                                    <td><?= $result['PRICE']; ?></td>
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