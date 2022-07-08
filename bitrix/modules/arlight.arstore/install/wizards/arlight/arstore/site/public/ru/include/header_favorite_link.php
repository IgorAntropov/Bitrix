<?
$header_fav_text1 = COption::GetOptionString("header_action", "header_fav_text", GetMessage("ARLIGHT_ARSTORE_VOPROS_OTVET"));
$header_fav_link1 = COption::GetOptionString("header_action", "header_fav_link", SITE_DIR . 'info/faq/');
$header_fav_text2 = COption::GetOptionString("header_action", "header_fav_text_2", GetMessage("ARLIGHT_ARSTORE_O_KOMPANII"));
$header_fav_link2 = COption::GetOptionString("header_action", "header_fav_link_2", SITE_DIR . 'about/');
?>
<div class="header__linkfav">
    <ul>
        <? if ($header_fav_text1 && $header_fav_link1): ?>
            <li><a href="<?= $header_fav_link1 ?>" title="<?= $header_fav_text1 ?>"><?= $header_fav_text1 ?></a></li>
        <? endif; ?>
        <? if ($header_fav_text2 && $header_fav_link2): ?>
            <li><a href="<?= $header_fav_link2 ?>" title="<?= $header_fav_text2 ?>"><?= $header_fav_text2 ?></a></li>
        <? endif; ?>
    </ul>
</div>