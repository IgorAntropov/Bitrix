<?
Use \Bitrix\Main\Context,
    \Bitrix\Main\Config\Option,
    \Bitrix\Main\Localization\Loc,
    \Bitrix\Main\Loader;

$module_id = 'itertech.cart';

IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/options.php");

Loader::IncludeModule('iblock');
Loader::includeModule($module_id);
Loader::IncludeModule("fileman");

$BC_RIGHT = $APPLICATION->GetGroupRight($module_id);

if ($BC_RIGHT < "R")
    return;

$request = Context::getCurrent()->getRequest();

// GET IBLOCK LIST
$res = CIBlock::GetList(
    Array(),
    Array(),
true
);
$arIblock = array();
while($ar_res = $res->Fetch())
{
    $arIblock[$ar_res['ID']] = $ar_res['NAME'];
}

$arOptions = array();
$arOptions['common'][] = array(
    "IBLOCK_ID",
    Loc::GetMessage("DC_PROPERTY_IBLOCK_ID"),
    CATALOG_ID,
    array('selectbox', $arIblock)
);
$arOptions['common'][] = array(
    "PROPERTY_PRICE",
    Loc::GetMessage("DC_PROPERTY_PRICE_NAME"),
    "PRICE",
    array("text", 50)
);
$arOptions['common'][] = array(
    "PROPERTY_OLDPRICE",
    Loc::GetMessage("DC_PROPERTY_OLDPRICE_NAME"),
    "OLDPRICE",
    array("text", 50)
);
$arOptions['common'][] = array(
    "THOUSANDS_SEPARATOR",
    Loc::GetMessage("DC_THOUSANDS_SEPARATOR"),
    "",
    array("text", 50)
);
$arOptions['common'][] = array(
    "CURRENCY",
    Loc::GetMessage("DC_CURRENCY"),
    "руб.",
    array("text", 50)
);
$arOptions['common'][] = array(
    "DECIMALS",
    Loc::GetMessage("DC_DECIMALS"),
    "Y",
    array("checkbox")
);
$arOptions['common'][] = array(
    "DELIMITER_DECIMALS",
    Loc::GetMessage("DC_DELIMITER_DECIMALS"),
    "<sup>*</sup>",
    array("text", 50)
);
$arOptions['common'][] = array(
    "PROPERTY_ARTNUMBER",
    Loc::GetMessage("DC_PROPERTY_ARTNUMBER_NAME"),
    "ARTICLE",
    array("text", 50)
);
$arOptions['common'][] = array(
    "PROPERTY_INSTOCK",
    Loc::GetMessage("DC_PROPERTY_INSTOCK"),
    "STOCK_SUMMARY",
    array("text", 50)
);
$arOptions['common'][] = array(
    "PROPERTY_PACKAGE",
    Loc::GetMessage("DC_PROPERTY_PACKAGE"),
    "PACK",
    array("text", 50)
);
$arOptions['common'][] = array(
    "PROPERTY_PACKAGE_COUNT",
    Loc::GetMessage("DC_PROPERTY_PACKAGE_COUNT"),
    "PACKNORM",
    array("text", 50)
);
$arOptions['common'][] = array(
    "PROPERTY_UNIT",
    Loc::GetMessage("DC_PROPERTY_UNIT"),
    "UNIT",
    array("text", 50)
);
$arOptions['common'][] = array(
    "PROPERTY_LENGTH",
    Loc::GetMessage("DC_PROPERTY_LENGTH"),
    "PACKAGE_LENGTH",
    array("text", 50)
);
$arOptions['common'][] = array(
    "PROPERTY_WIDTH",
    Loc::GetMessage("DC_PROPERTY_WIDTH"),
    "PACKAGE_WIDTH",
    array("text", 50)
);
$arOptions['common'][] = array(
    "PROPERTY_HEIGHT",
    Loc::GetMessage("DC_PROPERTY_HEIGHT"),
    "PACKAGE_HEIGHT",
    array("text", 50)
);
$arOptions['common'][] = array(
    "PROPERTY_WEIGHT",
    Loc::GetMessage("DC_PROPERTY_WEIGHT"),
    "PACKAGE_WEIGHT",
    array("text", 50)
);
$arOptions['common'][] = array(
    "PROPERTY_VOLUME",
    Loc::GetMessage("DC_PROPERTY_VOLUME"),
    "PACKAGE_VOLUME",
    array("text", 50)
);
$arOptions['common'][] = array(
    "FIELD_IMAGE",
    Loc::GetMessage("DC_FIELD_IMAGE"),
    "PREVIEW_PICTURE",
    array('selectbox',
        array("NO" => Loc::GetMessage("DC_NO"),
            "PREVIEW_PICTURE" => Loc::GetMessage("DC_PREVIEW_PICTURE"),
            "DETAIL_PICTURE" => Loc::GetMessage("DC_DETAIL_PICTURE")
        )
));
$arOptions['common'][] = array(
    "PROPERTY_IMAGE",
    Loc::GetMessage("DC_PROPERTY_IMAGE"),
    "",
    array("text", 50)
);
$arOptions['common'][] = array(
    "FIELD_DESCRIPTION",
    Loc::GetMessage("DC_FIELD_DESCRIPTION"),
    "NO",
    array('selectbox',
        array("NO" => Loc::GetMessage("DC_NO"),
            "PREVIEW_TEXT" => Loc::GetMessage("DC_PREVIEW_TEXT"),
            "DETAIL_TEXT" => Loc::GetMessage("DC_DETAIL_TEXT")
        )
));
$arOptions['common'][] = array(
    "PROPERTY_DESCRIPTION",
    Loc::GetMessage("DC_PROPERTY_DESCRIPTION"),
    "DESCRIPTION",
    array("text", 50)
);
/*
$arOptions['common'][] = array(
    "MINIMAL_QUANTITY",
    Loc::GetMessage("DC_MINIMAL_QUANTITY"),
    "1",
    array("text", 50)
);
*/
$arOptions['common'][] = array(
    "CACHE_TIME",
    Loc::GetMessage("DC_CACHE_TIME"),
    "30",
    array("text", 50)
);
$arOptions['common'][] = array(
    "CHANGE_BUTTON_TEXT",
    Loc::GetMessage("DC_CHANGE_BUTTON_TEXT"),
    Loc::GetMessage("DC_CHANGE_BUTTON_TEXT_DEFAULT"),
    array("text", 50)
);
$arOptions['common'][] = array(
    "FORMS_PLURAL",
    Loc::GetMessage("DC_FORMS_PLURAL"),
    Loc::GetMessage("DC_FORMS_PLURAL_DEFAULT"),
    array("text", 50)
);

/* Настройка выбора групп пользователей */
$rsGroups = CGroup::GetList($by = "c_sort", $order = "asc", Array("ACTIVE" => "Y"));
while($arGroups = $rsGroups->Fetch())
{
    $arUsersGroupsAdmin[$arGroups['ID']] = $arGroups['REFERENCE'];
    if($arGroups['ID']==1)
        continue;
    $arUsersGroups[$arGroups['ID']] = $arGroups['REFERENCE'];
}
$arOptions['common'][] = array(
    "ADD_USER_GROUPS",
    Loc::GetMessage("DC_ADD_USER_GROUPS"),
    '3,4',
    array('multiselectbox',$arUsersGroups)
);
$arOptions['common'][] = array(
    "USER_GROUPS_ADMIN",
    Loc::GetMessage("DC_USER_GROUPS_ADMIN"),
    '1',
    array('multiselectbox',$arUsersGroupsAdmin)
);

$arOptions['common'][] = array(
    "PAGENAV",
    Loc::GetMessage("DC_PAGENAV"),
    "20",
    array("text", 50)
);
$arOptions['common'][] = array(
    "DEBUG",
    Loc::GetMessage("DC_DEBUG"),
    "",
    array("checkbox")
);
$arOptions['common'][] = array(
    "REQ_ADRES",
    Loc::GetMessage("DC_REQ_ADRES"),
    "Y",
    array("checkbox")
);



$siteList = array();
$rsSites = CSite::GetList($by = "SORT", $order = "ASC", array());
while ($arSite = $rsSites->Fetch()) {
    foreach ($arOptions as $group => $groupOptions){
        $arAllOptions[$group][] = Loc::GetMEssage("DC_SETTING_SITE") . " ".$arSite["NAME"]." - ".$arSite["ID"];
        foreach ($groupOptions as $value){
            $value[0] .= "_".$arSite["ID"];
            $arAllOptions[$group][] = $value;
        }
    }
}

$aTabs = array(
    array("DIV" => "edit1", "TAB" => Loc::GetMessage("MAIN_TAB_SET"), "ICON" => "translate_settings", "TITLE" => Loc::GetMessage("MAIN_TAB_TITLE_SET")),
    array("DIV" => "edit2", "TAB" => Loc::GetMessage("MAIN_TAB_RIGHTS"), "ICON" => "translate_settings", "TITLE" => Loc::GetMessage("MAIN_TAB_TITLE_RIGHTS")),
);

$tabControl = new CAdminTabControl("tabControl", $aTabs);

if($_SERVER["REQUEST_METHOD"]=="POST" && strlen($Update.$Apply.$RestoreDefaults)>0 && $BC_RIGHT=="W" && check_bitrix_sessid())
{
    if(strlen($RestoreDefaults)>0)
    {
        Option::delete($module_id);
        $z = CGroup::GetList($v1="id",$v2="asc", array("ACTIVE" => "Y", "ADMIN" => "N"));
        while($zr = $z->Fetch())
            $APPLICATION->DelGroupRight($module_id, array($zr["ID"]));

    }
    else
    {
        foreach($arAllOptions as $group => $groupOptions)
        {
            foreach ($groupOptions as $option){
                if(!is_array($option))
                    continue;

                $name = $option[0];
                if (!isset($_POST[$name]) && $option[3][0] != "checkbox")
                    continue;

                if ($option[3][0] == "multiselectbox")
                {
                    if (!is_array($_POST[$name]))
                        continue;
                    $val = implode(",", $_POST[$name]);
                }
                else
                {
                    $val = (isset($_POST[$name]) ? (string)$_POST[$name] : '');
                    if($option[3][0] == "checkbox" && $val != "Y")
                        $val = "N";
                }

                COption::SetOptionString($module_id, $name, $val);
            }
            unset($option);
        }
    }


    $Update = $Update.$Apply;
    ob_start();
    require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/admin/group_rights.php");
    ob_end_clean();

    if(strlen($_REQUEST["back_url_settings"]) > 0)
    {
        if((strlen($Apply) > 0) || (strlen($RestoreDefaults) > 0))
            LocalRedirect($APPLICATION->GetCurPage()."?mid=".urlencode($mid)."&lang=".LANGUAGE_ID."&back_url_settings=".urlencode($_REQUEST["back_url_settings"])."&".$tabControl->ActiveTabParam());
        else
            LocalRedirect($_REQUEST["back_url_settings"]);
    }
    else
    {
        LocalRedirect($APPLICATION->GetCurPage()."?mid=".urlencode($mid)."&lang=".LANGUAGE_ID."&".$tabControl->ActiveTabParam());
    }
}


$tabControl->Begin();
?>
<form method="POST" action="<?echo $APPLICATION->GetCurPage()?>?mid=<?=htmlspecialcharsbx($mid)?>&amp;lang=<?=LANGUAGE_ID?>" enctype="multipart/form-data"><?
    $tabControl->BeginNextTab();
    __AdmSettingsDrawList($module_id, $arAllOptions['common']);

    $tabControl->BeginNextTab();
    require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/admin/group_rights.php");
    $tabControl->Buttons();?>
    <input <?if ($BC_RIGHT<"W") echo "disabled" ?> type="submit" name="Update" value="<?=Loc::GetMessage("MAIN_SAVE")?>" title="<?=Loc::GetMessage("MAIN_OPT_SAVE_TITLE")?>">
    <input <?if ($BC_RIGHT<"W") echo "disabled" ?> type="submit" name="Apply" value="<?=Loc::GetMessage("MAIN_OPT_APPLY")?>" title="<?=Loc::GetMessage("MAIN_OPT_APPLY_TITLE")?>">
    <?if(strlen($_REQUEST["back_url_settings"])>0):?>
        <input <?if ($BC_RIGHT<"W") echo "disabled" ?> type="button" name="Cancel" value="<?=Loc::GetMessage("MAIN_OPT_CANCEL")?>" title="<?=Loc::GetMessage("MAIN_OPT_CANCEL_TITLE")?>" onclick="window.location='<?echo htmlspecialcharsbx(CUtil::addslashes($_REQUEST["back_url_settings"]))?>'">
        <input type="hidden" name="back_url_settings" value="<?=htmlspecialcharsbx($_REQUEST["back_url_settings"])?>">
    <?endif?>
    <input <?if ($BC_RIGHT<"W") echo "disabled" ?> type="submit" name="RestoreDefaults" title="<?echo Loc::GetMessage("MAIN_HINT_RESTORE_DEFAULTS")?>" onclick="return confirm('<?echo AddSlashes(Loc::GetMessage("MAIN_HINT_RESTORE_DEFAULTS_WARNING"))?>')" value="<?echo Loc::GetMessage("MAIN_RESTORE_DEFAULTS")?>">
    <?=bitrix_sessid_post();?>
    <?$tabControl->End();?>
</form>