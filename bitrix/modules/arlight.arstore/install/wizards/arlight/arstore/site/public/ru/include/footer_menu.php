<div>
    <div class="title title_footer">О бренде</div>
    <ul>
        <li><a href="<?= SITE_DIR ?>news/">Новости</a></li>
    </ul>
</div>
<div>
    <div class="title title_footer">Поддержка</div>
    <ul>
        <li><a href="<?= SITE_DIR ?>info/documents/">Каталоги</a></li>
        <li><a href="<?= SITE_DIR ?>info/projects/">Проекты</a></li>
        <li><a href="<?= SITE_DIR ?>info/certificates/">Сертификаты</a></li>
        <li><a href="<?= SITE_DIR ?>info/calc/">Калькуляторы</a></li>
    </ul>
</div>
<div>
    <div class="title title_footer">Клиентам</div>
    <ul>
        <li><a href="<?= SITE_DIR ?>contacts/">Контакты</a></li>
        <li><a href="<?= SITE_DIR ?>info/faq/">Частые вопросы</a></li>
        <? if (file_exists($_SERVER['DOCUMENT_ROOT'] . SITE_DIR . 'delivering/index.php')): ?>
            <li><a href="<?= SITE_DIR ?>delivering/">Доставка</a></li>
        <? endif; ?>
        <? if (file_exists($_SERVER['DOCUMENT_ROOT'] . SITE_DIR . 'payment/index.php')): ?>
            <li><a href="<?= SITE_DIR ?>payment/">Оплата</a></li>
        <? endif; ?>
        <?
        $file = $_SERVER['DOCUMENT_ROOT'] . SITE_DIR . "assets/json/showroom_data.json";
        if (file_exists($file))
            $curData = json_decode(json_encode(json_decode(file_get_contents($file))), true);
        if (isset($curData) && $curData['SHOW_PAGE'] == 'on')
            echo '<li><a href="' . SITE_DIR . 'showroom/">Шоу-румы</a></li>';
        ?>
    </ul>
</div>