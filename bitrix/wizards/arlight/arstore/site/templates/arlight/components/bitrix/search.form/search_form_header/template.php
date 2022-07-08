<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true); ?>
<div class="search-form header__search-form">
    <form action="<?= $arResult["FORM_ACTION"] ?>">
        <div class=" header__search-form-close">
            <i class="icon-close"></i>
        </div>
        <? if ($arParams["USE_SUGGEST"] === "Y"): ?>
            <? $APPLICATION->IncludeComponent(
                "bitrix:search.suggest.input",
                "",
                array(
                    "NAME" => "q",
                    "VALUE" => "",
                    "INPUT_SIZE" => 15,
                    "DROPDOWN_SIZE" => 10,
                ),
                $component, array("HIDE_ICONS" => "Y")
            ); ?>
        <? else: ?>
            <div class="header__search-form-block">
                <input type="text" name="q" value="" class="header__search-form-input" placeholder="<?=GetMessage("ARLIGHT_ARSTORE_POISK_PO_SAYTU")?>" autocomplete="off"/>
            </div>
        <? endif; ?>
        <div class=" header__search-form-button">
            <button name="s" type="submit">
                <i class="icon-search"></i>
            </button>
        </div>
    </form>
</div>