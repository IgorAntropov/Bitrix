<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="row">
<div class="col-md-4 col-6">
    <div class="footer__menu-block">
        <?php
        $APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list", 
	"tree", 
	array(
		"VIEW_MODE" => "HEADER",
		"SHOW_PARENT_NAME" => "Y",
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "15",
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"SECTION_URL" => "#SITE_DIR#/catalog/#SECTION_CODE#/",
		"COUNT_ELEMENTS" => "N",
		"TOP_DEPTH" => "1",
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
		"COMPONENT_TEMPLATE" => "tree"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "Y"
	)
);
        ?>
    </div>
</div>
<div class="col-md-4 col-6">
    <div class="footer__menu-block">
        <div class="">
            <div class="menu__block">
                <? if (!empty($arResult)): ?>
                    <nav class="menu__navigation">
                        <ul>
                            <?
                            foreach ($arResult as $arItem):?>
                                <? if ($arItem["DEPTH_LEVEL"] == 1): ?>
                                    <?if($arItem["LINK"] == SITE_DIR . 'info/')
                                    continue;?>
                                    <li><a href="<?= $arItem["LINK"] ?>"
                                           class="title title_footer"><?= $arItem["TEXT"] ?></a></li>
                                <? endif; ?>
                            <? endforeach ?>
                        </ul>
                    </nav>
                <? endif ?>
            </div>
        </div>
    </div>
</div>
<div class="col-md-4 col-6">
    <div class="footer__menu-block">
        <h3 class="title title_footer"><?=GetMessage("ARLIGHT_ARSTORE_INTERESNOE")?></h3>
        <nav class="">
            <ul>
                <? foreach ($arResult as $arItem): ?>
                    <? if ($arItem["DEPTH_LEVEL"] > 1 && $arItem['CHAIN'][0] == GetMessage("ARLIGHT_ARSTORE_INFORMACIA")): ?>
                        <li><a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
                    <? endif; ?>
                <? endforeach ?>
            </ul>
        </nav>
    </div>
</div>
</div>
