<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Шоурум");

//проверка доступа к разделу
$permission = false;
$arSelect = ["ID"];
$arFilter = ["IBLOCK_ID" => CONTACTS_ID, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", 'PROPERTY_PROPERTY' => '%"brandshowroom":"Y"%'];
$res = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
while ($ob = $res->GetNextElement()) {
    if ($ob) $permission = true;
}

if (!$permission)
    LocalRedirect("/404.php", "404 Not Found");

$curData = [];
$file = $_SERVER['DOCUMENT_ROOT'] . SITE_DIR . "assets/json/showroom_data.json";
if (file_exists($file))
    $curData = json_decode(json_encode(json_decode(file_get_contents($file))), true);
?>
    <div class="showroom">
<? if (!empty($curData['SLIDER'])): ?>
    <div class="showroom-slider">
        <? foreach ($curData['SLIDER'] as $slide): ?>
            <div class="slide">
                <img src="<?= ALResizeCut($slide, 2000, 780) ?>" alt="">
            </div>
        <? endforeach; ?>
    </div>
<? endif; ?>

    <div class="container">
        <div class="showroom__content">
            <div class="showroom__descr">
                <? require($_SERVER["DOCUMENT_ROOT"]. SITE_DIR . "showroom/include.php"); ?>
            </div>
            <div class="showroom__contacts">
                <h4 class="showroom__contacts-title">Контакты</h4>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "contacts_for_showrooms",
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
                        "DISPLAY_DATE" => "N",
                        "DISPLAY_NAME" => "N",
                        "DISPLAY_PICTURE" => "N",
                        "DISPLAY_PREVIEW_TEXT" => "N",
                        "DISPLAY_TOP_PAGER" => "N",
                        "FIELD_CODE" => array(0 => "", 1 => "",),
                        "FILTER_NAME" => "",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => CONTACTS_ID,
                        "IBLOCK_TYPE" => "content",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "INCLUDE_SUBSECTIONS" => "N",
                        "MESSAGE_404" => "",
                        "NEWS_COUNT" => "20",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => ".default",
                        "PAGER_TITLE" => "Новости",
                        "PARENT_SECTION" => "",
                        "PARENT_SECTION_CODE" => "",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "PROPERTY_CODE" => array(0 => "EMAIL", 1 => "ADDRESS", 2 => "ADDRESS_CITY", 3 => "SCHEDULE", 4 => "PROPERTY", 5 => "PHONE", 6 => "",),
                        "SET_BROWSER_TITLE" => "N",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_META_DESCRIPTION" => "N",
                        "SET_META_KEYWORDS" => "N",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "SORT_BY1" => "SORT",
                        "SORT_BY2" => "ID",
                        "SORT_ORDER1" => "ASC",
                        "SORT_ORDER2" => "ASC",
                        "STRICT_SECTION_CHECK" => "N"
                    )
                ); ?>
            </div>
        </div>
    </div>
    <div class="showroom__social">
        <?
        $SOCIAL_NETWORK = PrepareLinkSocNetwork();

        $SOCIAL_NETWORK_COUNT = 0;
        foreach ($SOCIAL_NETWORK as $key => $value) {
            if (trim($value) !== '') $SOCIAL_NETWORK_COUNT++;
        }
        ?>
        <? if ((int)$SOCIAL_NETWORK_COUNT): ?>
            <?
            $arParamsSoc = array(
                "COMPONENT_TEMPLATE" => "social_network",
            );
            foreach ($SOCIAL_NETWORK as $key => $value) {
                $arParamsSoc[$key] = $value;
            }
            $APPLICATION->IncludeComponent(
                "asd:variable.set",
                "social_network",
                $arParamsSoc,
                false
            ); ?>
        <? endif; ?>
    </div>
<? if ($curData['SHOW_MAP'] == 'on'): ?>
    <div class="map map-main map-inner">
        <div class="map__block ">
            <div class="container">
                <div class="row">
                    <div class=" offset-xl-8 col-xl-4 offset-lg-0 col-lg-12">
                        <div class="map__block-info">
                            <div class="map__title">
                                <span class="map__title-text">Шоурумы</span>
                            </div>
                            <?
                            global $filterShowRoom;
                            $filterShowRoom['PROPERTY_PROPERTY'] = '%"brandshowroom":"Y"%';
                            $APPLICATION->IncludeComponent(
                                "bitrix:news.list",
                                "buy",
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
                                    "DISPLAY_DATE" => "N",
                                    "DISPLAY_NAME" => "N",
                                    "DISPLAY_PICTURE" => "N",
                                    "DISPLAY_PREVIEW_TEXT" => "N",
                                    "DISPLAY_TOP_PAGER" => "N",
                                    "FIELD_CODE" => array(
                                        0 => "",
                                        1 => "",
                                    ),
                                    "FILTER_NAME" => "filterShowRoom",
                                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                    "IBLOCK_ID" => CONTACTS_ID,
                                    "IBLOCK_TYPE" => "content",
                                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                    "INCLUDE_SUBSECTIONS" => "N",
                                    "MESSAGE_404" => "",
                                    "NEWS_COUNT" => "",
                                    "PAGER_BASE_LINK_ENABLE" => "N",
                                    "PAGER_DESC_NUMBERING" => "N",
                                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                    "PAGER_SHOW_ALL" => "N",
                                    "PAGER_SHOW_ALWAYS" => "N",
                                    "PAGER_TEMPLATE" => ".default",
                                    "PAGER_TITLE" => "Новости",
                                    "PARENT_SECTION" => "",
                                    "PARENT_SECTION_CODE" => "",
                                    "PREVIEW_TRUNCATE_LEN" => "",
                                    "PROPERTY_CODE" => array(
                                        0 => "EMAIL",
                                        1 => "ADDRESS",
                                        2 => "ADDRESS_CITY",
                                        3 => "SCHEDULE",
                                        4 => "COORD",
                                        5 => "PHONE",
                                        6 => "",
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
                                    "COMPONENT_TEMPLATE" => "buy"
                                ),
                                false
                            ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="map__wrap">
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
                    "FILTER_NAME" => "filterShowRoom",
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
                    "PAGER_TITLE" => "Новости",
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "",
                    "PREVIEW_TRUNCATE_LEN" => "",
                    "PROPERTY_CODE" => array(
                        0 => "SCHEDULE",
                        1 => "COORD",
                        2 => "",
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
        </div>
    </div>
<? endif; ?>

<? if (!empty($curData['VIDEO'])): ?>
    <div class="container">
        <div class="title">Обзоры новинок Арлайт</div>
        <div class="showroom__video">
            <div class="news ">
                <div class="row">
                    <? foreach ($curData['VIDEO'] as $video):
                        if (empty($video['ID'])) continue;
                        ?>
                        <div class="col-md-4">
                            <div class="news-item">
                                <div class="news-item__img">
                                    <a href="https://youtu.be/<?= $video['ID'] ?>" data-fancybox="gallery"></a>
                                    <img src="//img.youtube.com/vi/<?= $video['ID'] ?>/hqdefault.jpg"
                                         alt="<?= $video['NAME'] ?>" class="fullheight">
                                </div>
                                <a href="https://youtu.be/<?= $video['ID'] ?>" data-fancybox="gallery"
                                   class="news-item__title">
                                    <span><?= $video['NAME'] ?></span></a>
                                <div class="news-item__text">
                                    <?= $video['TEXT'] ?>
                                </div>
                            </div>
                        </div>
                    <? endforeach ?>
                </div>
            </div>

        </div>
    </div>
<? endif; ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>