<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();

use Bitrix\Main\Page\Asset;

global $USER;
$APPLICATION->SetPageProperty('seo_title', $APPLICATION->GetTitle());
$currPage = $APPLICATION->GetCurPage(false);
$mainPage = $currPage == SITE_DIR;
global $pageWithMarginBottom;

global $customOgImg;
if ($customOgImg != true) {
    Asset::getInstance()->addString('<meta property="og:image" content="https://' . SITE_SERVER_NAME . '/images/header_logo.png"/>');
}
global $customOgDescr;
if ($customOgDescr != true) {
    Asset::getInstance()->addString('<meta property="og:description" content="' . $APPLICATION->GetProperty("Description") . '"/> ');
}
?>
<? if (!$mainPage && $currPage != SITE_DIR . 'buy/' && $currPage != SITE_DIR . 'catalog/' ): ?>
    <? if ($pageWithMarginBottom): ?>
        </div>
    <? endif; ?>
    </div>
<? endif; ?>
<? if ($currPage == SITE_DIR . 'contacts/'): ?>
    <? $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "map",
        array(
            "ACTIVE_DATE_FORMAT" => "d.m.Y",
            "ADD_SECTIONS_CHAIN" => "N",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "N",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "CHECK_DATES" => "Y",
            "DETAIL_URL" => "",
            "DISPLAY_BOTTOM_PAGER" => "N",
            "DISPLAY_DATE" => "Y",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "DISPLAY_TOP_PAGER" => "N",
            "FIELD_CODE" => array(
                0 => "",
                1 => "",
            ),
            "FILTER_NAME" => "",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => CONTACTS_ID,
            "IBLOCK_TYPE" => "content",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "INCLUDE_SUBSECTIONS" => "Y",
            "MESSAGE_404" => "",
            "NEWS_COUNT" => "200",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => ".default",
            "PAGER_TITLE" => GetMessage("ARLIGHT_ARSTORE_NOVOSTI"),
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "PREVIEW_TRUNCATE_LEN" => "",
            "PROPERTY_CODE" => array(
                0 => "SCHEDULE",
                1 => "COORD",
                2 => "PROPERTY",
            ),
            "SET_BROWSER_TITLE" => "N",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "N",
            "SET_META_KEYWORDS" => "N",
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "N",
            "SHOW_404" => "N",
            "SORT_BY1" => "ACTIVE_FROM",
            "SORT_BY2" => "SORT",
            "SORT_ORDER1" => "DESC",
            "SORT_ORDER2" => "ASC",
            "STRICT_SECTION_CHECK" => "N",
            "COMPONENT_TEMPLATE" => "map"
        ),
        false
    ); ?>
    <div class="subscribe__form">
        <div class="subscribe__form-title"><?= GetMessage("ARLIGHT_ARSTORE_PODPISATQSA_NA_NOVOS") ?>
            <br> <?= GetMessage("ARLIGHT_ARSTORE_V_ODIN_KLIK") ?></div>
        <form method="POST" action="javascript:void(null);">
            <div class="row">
                <div class="col-xl-12">
                    <input type="email" name="email" class="input " required
                           placeholder="<?= GetMessage("ARLIGHT_ARSTORE_VVEDITE_VAS") ?>">
                </div>
                <div class="col-xl-12">
                    <input type="text" name="test_input_subscr" id="test_input_subscr" class="input hidden" hidden>
                    <span class="form__policy"><?= GetMessage("ARLIGHT_ARSTORE_NAJIMAA_KNOPKU_PODP") ?><a
                                href="<?= SITE_DIR ?>policy"
                                target="_blank"><?= GetMessage("ARLIGHT_ARSTORE_POLITIKOY_OBRABOTKI") ?></a>.</span>
                    <button class="button button_transparent-red"
                            type="submit"><?= GetMessage("ARLIGHT_ARSTORE_PODPISATQSA") ?></button>
                </div>
            </div>
        </form>
    </div>
<? endif; ?>
</div>
<footer class="footer">
    <div class="container container-main">
        <div class="footer__top">
            <div class="row">
                <div class="col-lg-7">
                    <div class="footer__menu">
                        <?
                        require($_SERVER['DOCUMENT_ROOT'] . SITE_DIR . 'include/footer_menu.php');
                        ?>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="footer__info">
                        <?
                        $shopAddress = [];
                        $arSelect = array("ID", "NAME", "PROPERTY_ADDRESS_CITY", "PROPERTY_ADDRESS", "PROPERTY_SCHEDULE", "PROPERTY_PHONE", "PROPERTY_PROPERTY");
                        $arFilter = array("IBLOCK_ID" => CONTACTS_ID, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
                        $res = CIBlockElement::GetList(array("SORT" => "ASC"), $arFilter, false, false, $arSelect);
                        while ($ob = $res->GetNextElement()) {
                            $shopAddress[] = $ob->GetFields();
                        }
                        $firstShop = $shopAddress[0];
                        $propValueAr = json_decode($firstShop['~PROPERTY_PROPERTY_VALUE'], true);
                        ?>
                        <? if ($propValueAr['show-name'] === "Y"): ?>
                            <p class="footer__info-n"><?= $firstShop['NAME'] ?></p>
                        <? endif; ?>
                        <div class="footer__info-b">
                            <?
                            $shopTel = explode(';', $firstShop['PROPERTY_PHONE_VALUE']);
                            if (is_array($shopTel)):
                                //строку телефонов магазина в массив
                                $shopTel = explode(';', $firstShop['PROPERTY_PHONE_VALUE']);
                                foreach ($shopTel as $tel) {
                                    ?><a href="tel:<?= clearPhoneNumber($tel) ?>"><?= $tel ?></a><br><?
                                }
                            else:?>
                                <? $APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    "header_phone",
                                    array(
                                        "AREA_FILE_SHOW" => "file",
                                        "AREA_FILE_SUFFIX" => "inc",
                                        "EDIT_TEMPLATE" => "",
                                        "PATH" => SITE_DIR . "include/header_phone.php",
                                        "COMPONENT_TEMPLATE" => "header_phone"
                                    ),
                                    false
                                );
                                ?>
                            <? endif; ?>
                        </div>
                        <?
                        $addressForPrint = $firstShop['PROPERTY_ADDRESS_CITY_VALUE'];
                        if ($firstShop['PROPERTY_ADDRESS_VALUE'])
                            $addressForPrint = $addressForPrint . ', ' . $firstShop['PROPERTY_ADDRESS_VALUE'];
                        if ($addressForPrint != ''):
                            ?>
                            <p class="footer__info-n">
                                <?= $addressForPrint; ?>
                            </p>
                        <? endif; ?>
                        <div class="footer__info-n">
                            <? $APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "header_mail",
                                array(
                                    "AREA_FILE_SHOW" => "file",
                                    "AREA_FILE_SUFFIX" => "inc",
                                    "EDIT_TEMPLATE" => "",
                                    "PATH" => SITE_DIR . "include/header_mail.php",
                                    "COMPONENT_TEMPLATE" => "header_mail"
                                ),
                                false
                            ); ?>
                        </div>
                        <br>
                        <br>
                        <?
                        //строку графика работы в массив
                        $shopTimeArr = explode(';', $firstShop['PROPERTY_SCHEDULE_VALUE']);
                        ?>
                        <? if (count($shopTimeArr) > 0 && $shopTimeArr[0]): ?>
                            <p class="footer__info-b footer__time"><span
                                        style="white-space: nowrap"><?= GetMessage("ARLIGHT_ARSTORE_VREMA_RABOTY") ?></span>
                                <span>
                                <? foreach ($shopTimeArr as $shopTimeItem): ?>
                                    <? if ($shopTimeItem): ?>
                                        <span class="line">
                                        <? $timeAr = explode('&', $shopTimeItem) ?>
                                        <span class="line-item"><?= $timeAr[0] ?></span>
                                        <span class="line-item"><?= $timeAr[1] ?></span>
                                    </span>
                                    <? endif; ?>
                                <? endforeach; ?>
                                </span>
                            </p>
                        <? endif; ?>
                        <? if (count($shopAddress) > 1): ?>
                            <p class="footer__info-tr">
                                <a href="<?= SITE_DIR ?>contacts/"><?= GetMessage("ARLIGHT_ARSTORE_POKAZATQ_VSE_MAGAZIN") ?></a>
                            </p>
                        <? endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container container-main">
        <div class="footer__b">
            <div class="row">
                <div class="col-lg-7">
                    <div class="footer__b-wr">
                        <div class="footer__copyright">
                            <div class="">
                                <p>&copy; <? echo date("Y") ?>
                                    <?= GetMessage("ARLIGHT_ARSTORE_RAZRABOTANO_V") ?>
                                    <a href="https://it.arlight.ru/"
                                       target="_blank"
                                       rel="nofollow">Arlight</a>.</p>
                            </div>
                        </div>
                        <?
                        $SOCIAL_NETWORK = PrepareLinkSocNetwork();

                        $SOCIAL_NETWORK_COUNT = 0;
                        foreach ($SOCIAL_NETWORK as $key => $value) {
                            if (trim($value) !== '') $SOCIAL_NETWORK_COUNT++;
                        }
                        ?>
                        <? if ((int)$SOCIAL_NETWORK_COUNT): ?>
                            <div class="footer__social">
                                <p><?= GetMessage("ARLIGHT_ARSTORE_MY_V_SOCSETAH") ?></p>
                                <?
                                $arParamsSoc = array(
                                    "COMPONENT_TEMPLATE" => "social_network",
                                );
                                foreach ($SOCIAL_NETWORK as $key => $value) {
                                    $arParamsSoc[$key] = $value;
                                } ?>
                                <?
                                $APPLICATION->IncludeComponent(
                                    "asd:variable.set",
                                    "social_network",
                                    $arParamsSoc,
                                    false
                                ); ?>
                            </div>
                        <? endif; ?>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="footer__subscribe">
                        <p><?= GetMessage("ARLIGHT_ARSTORE_HOTITE_POLUCATQ_INFO") ?></p>
                        <form action="javascript:void(0)">
                            <input type="email" name="footer__subscribe-email" id="footer__subscribe-email"
                                   placeholder="email <?= GetMessage("ARLIGHT_ARSTORE_ADRES") ?>" required>
                            <input type="text" name="test_input_subscr" id="test_input_subscr2" class="input hidden"
                                   hidden="">
                            <button type="submit"
                                    class="button button_red"><?= GetMessage("ARLIGHT_ARSTORE_PODPISATQSA") ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-control">
        <div class="to-top">
            <i class="icon-list-arrow-up"></i>
        </div>
        <?
        $feedback_type = COption::GetOptionString("header_action", "feedback_type", 'feedback_type_form'); ?>
        <? if ($feedback_type == 'feedback_type_form'): ?>
            <div class="question">
                <div class="question__button">
                    <i class="icon-quest2"></i>
                    <div class="question__text"><?= GetMessage("ARLIGHT_ARSTORE_SPROSITQ") ?></div>
                </div>
                <div class="question__block">
                    <div class="question__close">
                        <i class="icon-cart-cross"></i>
                    </div>
                    <form method="POST" action="javascript:void(null);">
                        <div class="question__col question__col-text">
                            <?= GetMessage("ARLIGHT_ARSTORE_ZADAYTE_VOPROS_I") ?></div>
                        <div class="question__col question__col-center">
                            <div class="question__col-block">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div>
                                            <input class="input__radio" type="radio" checked name="type"
                                                   id="quest_1" value="quest_1">
                                            <label for="quest_1"><?= GetMessage("ARLIGHT_ARSTORE_KONSULQTACIA_PO_TOVA") ?></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div>
                                            <input class="input__radio" type="radio" name="type"
                                                   id="quest_2" value="quest_2">
                                            <label for="quest_2"><?= GetMessage("ARLIGHT_ARSTORE_VOPROS_PO_RABOTE_MAG") ?></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div>
                                            <input class="input__radio" type="radio" name="type"
                                                   id="quest_3" value="quest_3">
                                            <label for="quest_3"><?= GetMessage("ARLIGHT_ARSTORE_SOOBSITQ_OB_OSIBKE") ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="question__col-block">
                                <div class="question__col-title"><?= GetMessage("ARLIGHT_ARSTORE_IMA") ?></div>
                                <div class="question__col-fill">
                                    <input type="text" name="name" class="input " required>
                                </div>
                            </div>
                            <div class="question__col-block">
                                <div class="question__col-title">Email*</div>
                                <div class="question__col-fill">
                                    <input type="email" name="email" class="input " required>
                                </div>
                            </div>
                            <div class="question__col-block">
                                <div class="question__col-title"><?= GetMessage("ARLIGHT_ARSTORE_TELEFON_FAKS") ?></div>
                                <div class="question__col-fill">
                                    <input type="tel" name="phone" class="input " required>
                                </div>
                            </div>
                            <div class="question__col-block">
                                <div class="question__col-title"><?= GetMessage("ARLIGHT_ARSTORE_SOOBSENIE") ?></div>
                                <div class="question__col-fill">
                                    <textarea name="msg" cols="30" rows="1" class="input " required></textarea>
                                </div>
                            </div>
                            <br>
                            <span class="form__policy"><?= GetMessage("ARLIGHT_ARSTORE_NAJIMAA_KNOPKU_OTPR") ?><a
                                        href="<?= SITE_DIR ?>policy"
                                        target="_blank"><?= GetMessage("ARLIGHT_ARSTORE_POLITIKOY_OBRABOTKI") ?></a>.</span>
                        </div>
                        <div class="question__col">
                            <div>
                                <input type="text" name="test_input" id="test_input" class="input hidden" hidden>
                                <button class="question__submit hover-border hover-border_white"
                                        type="submit"><?= GetMessage("ARLIGHT_ARSTORE_OTPRAVITQ") ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <? else: ?>
            <?
            require($_SERVER['DOCUMENT_ROOT'] . SITE_DIR . 'include/chat_script_in_footer.php');
            ?>
        <? endif; ?>
    </div>
    <? if (!$USER->IsAuthorized()): ?>
        <div id="popup-auth" class="popup popup-auth lity-hide">
            <div class="popup-close"></div>
            <div class="popup__title">
                <div class="popup__button">
                    <span class="popup__title-name"
                          data-name="auth-form"><?= GetMessage("ARLIGHT_ARSTORE_VHOD") ?></span>
                </div>
                <div class="popup__button">
                    <span class="popup__title-name"
                          data-name="register-form"><?= GetMessage("ARLIGHT_ARSTORE_REGISTRACIA") ?></span>
                </div>

            </div>
            <div class="form form--modal popup__block" data-name="auth-form">
                <div class="container">
                    <? $APPLICATION->IncludeComponent("bitrix:system.auth.form", ".default", array(
                        "FORGOT_PASSWORD_URL" => "/registration/forgot_password/",    // Страница забытого пароля
                        "PROFILE_URL" => "/personal/profile",    // Страница профиля
                        "REGISTER_URL" => "/registration/",    // Страница регистрации
                        "SHOW_ERRORS" => "N",    // Показывать ошибки
                    ),
                        false
                    ); ?>
                </div>
            </div>
            <div class="form form--modal popup__block" data-name="register-form">
                <div class="container">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.register",
                        "register_on_popup",
                        array(
                            "AUTH" => "Y",
                            "REQUIRED_FIELDS" => array(
                                0 => "NAME",
                                1 => "EMAIL",
                                2 => "PERSONAL_PHONE",
                            ),
                            "SET_TITLE" => "N",
                            "SHOW_FIELDS" => array(
                                0 => "NAME",
                                1 => "EMAIL",
                                2 => "PERSONAL_PHONE",
                            ),
                            "SUCCESS_PAGE" => SITE_DIR,
                            "USER_PROPERTY" => array(
                                0 => "UF_TYPEPAYER",
                            ),
                            "USER_PROPERTY_NAME" => "",
                            "USE_BACKURL" => "Y",
                            "COMPONENT_TEMPLATE" => ".default"
                        ),
                        false
                    ); ?>
                </div>
            </div>
            <div class="form form--modal popup__block" data-name="forgot-form">
                <div class="container">
                    <? $APPLICATION->IncludeComponent("bitrix:system.auth.forgotpasswd", ".default", array(),
                        false
                    ); ?>
                </div>
            </div>
        </div>
    <? endif; ?>
</footer>
</div>
<? if (stripos($APPLICATION->GetCurPage(), '/video/')): ?>
    <script src='<?= SITE_TEMPLATE_PATH ?>/js/plyr.min.js'></script>
<? endif; ?>
<?php
//добавить метрики
global $goalCurrent;
if ($goalCurrent['add-new-user']['id'] && $goalCurrent['add-new-user']['name']) {
    if (isset($_SESSION['ADD_NEW_USER']) && !empty($_SESSION['ADD_NEW_USER'])) {
        unset($_SESSION['ADD_NEW_USER']);
//        YM на регистрацию пользователя
        ?>
        <script data-skip-moving="true">
            window.addEventListener('load', function () {
                if (window.ym) {
                    ym(arGoalsYM['add-new-user']['id'], 'reachGoal', arGoalsYM['add-new-user']['name']);
                }
            })
        </script>
        <?php
    }
}
?>

<script>
    var siteDir = '<?=SITE_DIR?>';
    var SITE_ID = '<?=SITE_ID?>';
    var arGoalsYM = <?=CUtil::PhpToJSObject($goalCurrent)?>;

    var LangConst = {
        "ARLIGHT_ARSTORE_ZNACENIE_NE_IZMENILO": "<?=GetMessage("ARLIGHT_ARSTORE_ZNACENIE_NE_IZMENILO");?>",
        "ARLIGHT_ARSTORE_ZNACENIE_NE_MOJET_BY": "<?=GetMessage("ARLIGHT_ARSTORE_ZNACENIE_NE_MOJET_BY");?>",
        "ARLIGHT_ARSTORE_ZNACENIE_NE_MOJET_BY1": "<?=GetMessage("ARLIGHT_ARSTORE_ZNACENIE_NE_MOJET_BY1");?>",
        "ARLIGHT_ARSTORE_CENY_IMENENY": "<?=GetMessage("ARLIGHT_ARSTORE_CENY_IMENENY");?>",
        "ARLIGHT_ARSTORE_POISK": "<?=GetMessage("ARLIGHT_ARSTORE_POISK");?>",
        "ARLIGHT_ARSTORE_V_VASEY_KORZINE_ESTQ": "<?=GetMessage("ARLIGHT_ARSTORE_V_VASEY_KORZINE_ESTQ");?>",
        "ARLIGHT_ARSTORE_TOVAR": "<?=GetMessage("ARLIGHT_ARSTORE_TOVAR");?>",
        "ARLIGHT_ARSTORE_V_DANNYY_MOMENT_NE_D": "<?=GetMessage("ARLIGHT_ARSTORE_V_DANNYY_MOMENT_NE_D");?>",
        "ARLIGHT_ARSTORE_UBRATQ_IZ_IZBRANNOGO": "<?=GetMessage("ARLIGHT_ARSTORE_UBRATQ_IZ_IZBRANNOGO");?>",
        "ARLIGHT_ARSTORE_DOBAVITQ_V_IZBRANNOE": "<?=GetMessage("ARLIGHT_ARSTORE_DOBAVITQ_V_IZBRANNOE");?>",
        "ARLIGHT_ARSTORE_PEREYTI_V_KORZINU": "<?=GetMessage("ARLIGHT_ARSTORE_PEREYTI_V_KORZINU");?>",
        "ARLIGHT_ARSTORE_DOBAVITQ_V_KORZINU": "<?=GetMessage("ARLIGHT_ARSTORE_DOBAVITQ_V_KORZINU");?>",
        "ARLIGHT_ARSTORE_VOZNIKLA_OSIBKA": "<?=GetMessage("ARLIGHT_ARSTORE_VOZNIKLA_OSIBKA");?>",
        "ARLIGHT_ARSTORE_NOVYY": "<?=GetMessage("ARLIGHT_ARSTORE_NOVYY");?>",
        "ARLIGHT_ARSTORE_OTVET_OTPRAVLEN": "<?=GetMessage("ARLIGHT_ARSTORE_OTVET_OTPRAVLEN");?>",
        "ARLIGHT_ARSTORE_VASE_SOOBSENIE_OTPRA": "<?=GetMessage("ARLIGHT_ARSTORE_VASE_SOOBSENIE_OTPRA");?>",
        "ARLIGHT_ARSTORE_PODPISKA_OFORMLENA": "<?=GetMessage("ARLIGHT_ARSTORE_PODPISKA_OFORMLENA");?>",
        "ARLIGHT_ARSTORE_NAIMENOVANIE": "<?=GetMessage("ARLIGHT_ARSTORE_NAIMENOVANIE");?>",
        "ARLIGHT_ARSTORE_ARTICUL": "<?=GetMessage("ARLIGHT_ARSTORE_ARTICUL");?>",
        "ARLIGHT_ARSTORE_MAGAZIN_BUDET_UDALEN": "<?=GetMessage("ARLIGHT_ARSTORE_MAGAZIN_BUDET_UDALEN");?>",
        "ARLIGHT_ARSTORE_OTMENITQ_UDALENIE": "<?=GetMessage("ARLIGHT_ARSTORE_OTMENITQ_UDALENIE");?>",
        "ARLIGHT_ARSTORE_VVEDITE_VERNOE_ZNACE": "<?=GetMessage("ARLIGHT_ARSTORE_VVEDITE_VERNOE_ZNACE");?>",
        "ARLIGHT_ARSTORE_ETO_POLE_DOLJNO_BYTQ": "<?=GetMessage("ARLIGHT_ARSTORE_ETO_POLE_DOLJNO_BYTQ");?>",
        "ARLIGHT_ARSTORE_IZOBRAJENIE_NE_DOLJN": "<?=GetMessage("ARLIGHT_ARSTORE_IZOBRAJENIE_NE_DOLJN");?>",
        "ARLIGHT_ARSTORE_IZOBRAJENIE_PNG": "<?=GetMessage("ARLIGHT_ARSTORE_IZOBRAJENIE_PNG");?>",
        "ARLIGHT_ARSTORE_VASA_ZAAVKA_USPESNO": "<?=GetMessage("ARLIGHT_ARSTORE_VASA_ZAAVKA_USPESNO");?>",
        "ARLIGHT_ARSTORE_SPASIBO_VASE_SOOBSE": "<?=GetMessage("ARLIGHT_ARSTORE_SPASIBO_VASE_SOOBSE");?>",
        "ARLIGHT_ARSTORE_NE_ZAPOLNENO_IMA": "<?=GetMessage("ARLIGHT_ARSTORE_NE_ZAPOLNENO_IMA");?>",
        "ARLIGHT_ARSTORE_NE_ZAPOLNENA_FAMILIA": "<?=GetMessage("ARLIGHT_ARSTORE_NE_ZAPOLNENA_FAMILIA");?>",
        "ARLIGHT_ARSTORE_NE_ZAPOLNEN_NOMER_TE": "<?=GetMessage("ARLIGHT_ARSTORE_NE_ZAPOLNEN_NOMER_TE");?>",
        "ARLIGHT_ARSTORE_TELEFON_ZAPOLNEN_NEK": "<?=GetMessage("ARLIGHT_ARSTORE_TELEFON_ZAPOLNEN_NEK");?>",
        "ARLIGHT_ARSTORE_NE_ZAPOLNEN": "<?=GetMessage("ARLIGHT_ARSTORE_NE_ZAPOLNEN");?>",
        "ARLIGHT_ARSTORE_ZAPOLNEN_NEKORREKTNO": "<?=GetMessage("ARLIGHT_ARSTORE_ZAPOLNEN_NEKORREKTNO");?>",
        "ARLIGHT_ARSTORE_NEOBHODIMO_ZAPOLNITQ": "<?=GetMessage("ARLIGHT_ARSTORE_NEOBHODIMO_ZAPOLNITQ");?>",
        "ARLIGHT_ARSTORE_VAS_ZAKAZ": "<?=GetMessage("ARLIGHT_ARSTORE_VAS_ZAKAZ");?>",
        "ARLIGHT_ARSTORE_PRINAT_V_TECENII": "<?=GetMessage("ARLIGHT_ARSTORE_PRINAT_V_TECENII");?>",
        "ARLIGHT_ARSTORE_VEROATNO_CTO_TO_POS": "<?=GetMessage("ARLIGHT_ARSTORE_VEROATNO_CTO_TO_POS");?>",
        "ARLIGHT_ARSTORE_POPROBUYTE_ESE_RAZ_P": "<?=GetMessage("ARLIGHT_ARSTORE_POPROBUYTE_ESE_RAZ_P");?>",
        "ARLIGHT_ARSTORE_SAG_MOI_SVETILQN": "<?=GetMessage("ARLIGHT_ARSTORE_SAG_MOI_SVETILQN");?>",
        "ARLIGHT_ARSTORE_SOZDANIU_SVOEGO_SVET": "<?=GetMessage("ARLIGHT_ARSTORE_SOZDANIU_SVOEGO_SVET");?>",
        "ARLIGHT_ARSTORE_ST": "<?=GetMessage("ARLIGHT_ARSTORE_ST");?>",
        "ARLIGHT_ARSTORE_V_DEMO": "<?=GetMessage("ARLIGHT_ARSTORE_V_DEMO");?>",
        "ARLIGHT_ARSTORE_OSTALOS_VVESTI": "<?=GetMessage("ARLIGHT_ARSTORE_OSTALOS_VVESTI");?>",
        "ARLIGHT_ARSTORE_BOLSCHE_SIMV": "<?=GetMessage("ARLIGHT_ARSTORE_BOLSCHE_SIMV");?>",
        "ARLIGHT_ARSTORE_VOMONO_IMENENIA": "<?=GetMessage("ARLIGHT_ARSTORE_VOMONO_IMENENIA");?>",
    }

</script>
</body>
</html>