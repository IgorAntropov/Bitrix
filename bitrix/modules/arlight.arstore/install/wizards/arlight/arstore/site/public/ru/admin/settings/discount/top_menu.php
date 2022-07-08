<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
?>
<ul class="nav nav-tabs mb-5">
    <li class="nav-item">
        <a class="nav-link<?=($type == 'group') ? ' active' : '';?>" href="<?= SITE_DIR ?>admin/settings/discount/">Скидка по группам</a>
    </li>
    <li class="nav-item">
        <a class="nav-link<?=($type == 'summ') ? ' active' : '';?>" href="<?= SITE_DIR ?>admin/settings/discount/summ/">Скидка по сумме заказа</a>
    </li>
    <li class="nav-item">
        <a class="nav-link<?=($type == 'promo') ? ' active' : '';?>" href="<?= SITE_DIR ?>admin/settings/discount/promo/">Скидка по промокоду</a>
    </li>
</ul>

