<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? if (!empty($arResult)): ?>
    <div class="header__btn-menu mobile">
        <i class="icon-menu"></i>
    </div>
    <div class="header__nav ">
        <div class="header__btn-close mobile">
            <i class="icon-cart-cross"></i>
        </div>
        <nav>
            <ul>
                <?
                $previousLevel = 0;?>
                <? foreach ($arResult as $arItem): ?>
                <? if ($arItem["TEXT"] == '') continue; ?>
                    <? if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel): ?>
                        <?= str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"])); ?>
                    <? endif ?>
                    <? if ($arItem["LINK"] == SITE_DIR . 'catalog/'): ?>
                        <li class="menu-parent parent parent-catalog <? if ($arItem["SELECTED"]): ?>active_el<? endif ?>">
                        <a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
                        <?php
                        $APPLICATION->IncludeComponent(
                            "bitrix:catalog.section.list",
                            "top_menu_catalog",
                            array(
                                "VIEW_MODE" => "HEADER",
                                "SHOW_PARENT_NAME" => "Y",
                                "IBLOCK_TYPE" => "catalog",
                                "IBLOCK_ID" => "#CATALOG_IBLOCK_ID#",
                                "SECTION_ID" => "",
                                "SECTION_CODE" => "",
                                "SECTION_URL" => "#SITE_DIR#/catalog/#SECTION_CODE#/",
                                "COUNT_ELEMENTS" => "N",
                                "TOP_DEPTH" => "3",
                                "SECTION_FIELDS" => array(
                                    0 => "",
                                    1 => "",
                                ),
                                "SECTION_USER_FIELDS" => array(
                                    0 => "",
                                    1 => "",
                                ),
                                "ADD_SECTIONS_CHAIN" => "N",
                                "CACHE_TYPE" => "A",
                                "CACHE_TIME" => "36000000",
                                "CACHE_NOTES" => "",
                                "CACHE_GROUPS" => "Y",
                                "HIDE_SECTION_NAME" => "N",
                                "COMPONENT_TEMPLATE" => "top_menu_catalog"
                            ),
                            false,
                            array(
                                "ACTIVE_COMPONENT" => "Y"
                            )
                        );
                        ?>
                    </li>
                    <? else: ?>
                        <? if ($arItem["IS_PARENT"]): ?>
                            <? if ($arItem["DEPTH_LEVEL"] == 1): ?>
                                <li class="menu-parent parent <? if ($arItem["SELECTED"]): ?>active_el<? endif ?>">
                                    <span class="link-parrent"><?= $arItem["TEXT"] ?></span>
                                    <ul class="menu-child menu-child_1">
                            <? else: ?>
                                <li class="menu-parent parent <? if ($arItem["SELECTED"]): ?>active_el<? endif ?>">
                                    <a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
                                    <ul class="menu-child menu-child_1">
                            <? endif ?>
                        <? else: ?>
                            <? if ($arItem["PERMISSION"] > "D"): ?>
                                <? if ($arItem["DEPTH_LEVEL"] == 1): ?>
                                    <li class="<? if ($arItem["SELECTED"]): ?>active_el<? endif ?>"><a
                                                href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
                                <? else: ?>
                                    <li class="<? if ($arItem["SELECTED"]): ?>active_el<? endif ?>"><a
                                                href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
                                <? endif ?>
                            <? else: ?>
                                <? if ($arItem["DEPTH_LEVEL"] == 1): ?>
                                    <li class="<? if ($arItem["SELECTED"]): ?>active_el<? endif ?>">
                                        <a href=""
                                           class=""
                                           title="<?= GetMessage("MENU_ITEM_ACCESS_DENIED") ?>">
                                            <?= $arItem["TEXT"] ?>
                                        </a>
                                    </li>
                                <? else: ?>
                                    <li class="<? if ($arItem["SELECTED"]): ?>active_el<? endif ?>">
                                        <a href=""
                                           class="denied"
                                           title="<?= GetMessage("MENU_ITEM_ACCESS_DENIED") ?>">
                                            <?= $arItem["TEXT"] ?>
                                        </a>
                                    </li>
                                 <? endif ?>
                             <? endif ?>
                         <? endif ?>
                        <? $previousLevel = $arItem["DEPTH_LEVEL"]; ?>
                    <? endif ?>
                <? endforeach ?>
                <? if ($previousLevel > 1)://close last item tags?>
                    <?= str_repeat("</ul></li>", ($previousLevel - 1)); ?>
                <? endif ?>
            </ul>
        </nav>
    </div>
<? endif ?>