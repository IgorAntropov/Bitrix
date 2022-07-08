<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2013 Bitrix
 */

/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 */

$bWasSelect = false;

?><input type="hidden" name="<?=$arParams["arUserField"]["FIELD_NAME"]?>" value=""><?

if ($arParams["arUserField"]["SETTINGS"]["DISPLAY"] == "CHECKBOX")
{
	foreach ($arParams["arUserField"]["USER_TYPE"]["FIELDS"] as $key => $val)
	{
		$bSelected = in_array($key, $arResult["VALUE"]) && (
			(!$bWasSelect) ||
			($arParams["arUserField"]["MULTIPLE"] == "Y")
		);
		$bWasSelect = $bWasSelect || $bSelected;

		?><?if($arParams["arUserField"]["MULTIPLE"]=="Y"):?>
        <input
                id="radio_<?echo $key?>"
                type="checkbox"
                value="<?echo $key?>"
                name="<?echo $arParams["arUserField"]["FIELD_NAME"]?>"
                <?echo ($bSelected? "checked" : "")?>
        >
        <label for="radio_<?echo $key?>"><?=$val?></label><br />
		<?else:?>
        <div>
            <input
                id="radio_<?echo $key?>"
                type="radio"
                value="<?echo $key?>"
                name="<?echo $arParams["arUserField"]["FIELD_NAME"]?>"
                class="input__radio input__radio-reverse"
                <?echo ($bSelected? "checked" : "")?>
        >
			<label for="radio_<?echo $key?>"><?=$val?></label>
        </div>
		<?endif;?><?
	}
}
else
{
	?><select
		class="bx-user-field-enum"
		name="<?=$arParams["arUserField"]["FIELD_NAME"]?>"
		<?if($arParams["arUserField"]["SETTINGS"]["LIST_HEIGHT"] > 1):?>
			size="<?=$arParams["arUserField"]["SETTINGS"]["LIST_HEIGHT"]?>"
		<?endif;?>
		<?if ($arParams["arUserField"]["MULTIPLE"]=="Y"):?>
			multiple="multiple"
		<?endif;?>
	>
	<?
	$values = $arResult["VALUE"];
	if(!is_array($values))
		$values = array($values);
	$values = array_map("strval", $values);
	if(count($values) > 1)
		$values = array_filter($values);
	foreach ($arParams["arUserField"]["USER_TYPE"]["FIELDS"] as $key => $val)
	{
		$bSelected = in_array(strval($key), $values, true) && (
			(!$bWasSelect) ||
			($arParams["arUserField"]["MULTIPLE"] == "Y")
		);
		$bWasSelect = $bWasSelect || $bSelected;

		?><option value="<?echo $key?>"<?echo ($bSelected? " selected" : "")?>><?echo $val?></option><?
	}
	?></select><?
}
