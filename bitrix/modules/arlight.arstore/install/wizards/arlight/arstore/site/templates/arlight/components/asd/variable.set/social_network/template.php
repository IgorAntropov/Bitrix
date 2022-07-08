<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="footer-social">
    <ul>
        <? if ($arParams['social_fb']): ?>
            <li class="footer-social_fb"><a href="<?= $arParams['social_fb'] ?>" target="_blank" rel="nofollow"></a></li>
        <? endif; ?>
        <? if ($arParams['social_vk']): ?>
            <li class="footer-social_vk"><a href="<?= $arParams['social_vk'] ?>" target="_blank" rel="nofollow"></a></li>
        <? endif; ?>
        <? if ($arParams['social_ig']): ?>
            <li class="footer-social_ig"><a href="<?= $arParams['social_ig'] ?>" target="_blank" rel="nofollow"></a></li>
        <? endif; ?>
        <? if ($arParams['social_pr']): ?>
            <li class="footer-social_pr"><a href="<?= $arParams['social_pr'] ?>" target="_blank" rel="nofollow"></a></li>
        <? endif; ?>
        <? if ($arParams['social_tw']): ?>
            <li class="footer-social_tw"><a href="<?= $arParams['social_tw'] ?>" target="_blank" rel="nofollow"></a></li>
        <? endif; ?>
        <? if ($arParams['social_yt']): ?>
            <li class="footer-social_yt"><a href="<?= $arParams['social_yt'] ?>" target="_blank" rel="nofollow"></a></li>
        <? endif; ?>
        <? if ($arParams['social_ok']): ?>
            <li class="footer-social_ok"><a href="<?= $arParams['social_ok'] ?>" target="_blank" rel="nofollow"></a></li>
        <? endif; ?>
        <? if ($arParams['social_tg']): ?>
            <li class="footer-social_tg"><a href="<?= $arParams['social_tg'] ?>" target="_blank" rel="nofollow"></a></li>
        <? endif; ?>
        <? if ($arParams['social_tiktok']): ?>
            <li class="footer-social_tik"><a href="<?= $arParams['social_tiktok'] ?>" target="_blank" rel="nofollow"></a></li>
        <? endif; ?>
    </ul>
</div>