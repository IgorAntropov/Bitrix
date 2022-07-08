<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();


$userGroupID = "";
$dbGroup = CGroup::GetList($by = "", $order = "", Array("STRING_ID" => "store_admin"));

if($arGroup = $dbGroup -> Fetch())
{
	$userGroupID = $arGroup["ID"];
}
else
{
	$group = new CGroup;
	$arFields = Array(
	  "ACTIVE"       => "Y",
	  "C_SORT"       => 300,
	  "NAME"         => GetMessage("TASK_WIZARD_STORE_ADMIN"),
	  "DESCRIPTION"  => GetMessage("TASK_WIZARD_STORE_ADMIN_DESCR"),
	  "USER_ID"      => array(),
	  "STRING_ID"      => "store_admin",
	  );
	$userGroupID = $group->Add($arFields);
	$DB->Query("INSERT INTO b_sticker_group_task(GROUP_ID, TASK_ID)	SELECT ".intVal($userGroupID).", ID FROM b_task WHERE NAME='stickers_edit' AND MODULE_ID='fileman'", false, "FILE: ".__FILE__."<br> LINE: ".__LINE__);
}
//для модуля корзины установить администраторов
$module_id = 'itertech.cart';

use \Bitrix\Main\Config\Option;

$USER_GROUPS_ADMIN_CURRENT = Option::get($module_id, 'USER_GROUPS_ADMIN_' . WIZARD_SITE_ID);
if (IntVal($userGroupID) > 0) {
    if ($USER_GROUPS_ADMIN_CURRENT && !stristr($USER_GROUPS_ADMIN_CURRENT, $userGroupID))
        Option::set($module_id, 'USER_GROUPS_ADMIN_' . WIZARD_SITE_ID, $USER_GROUPS_ADMIN_CURRENT . ',' . $userGroupID);
    else
        Option::set($module_id, 'USER_GROUPS_ADMIN_' . WIZARD_SITE_ID, '1,' . $userGroupID);


    $SiteDir = "";
    if(WIZARD_SITE_ID != "s1"){
        $SiteDir = "/site_" . WIZARD_SITE_ID;
    }
    WizardServices::SetFilePermission(Array(WIZARD_SITE_ID, $SiteDir . "/admin/"), Array('*' => "D", $userGroupID => "R"));

    CWizardUtil::ReplaceMacros(WIZARD_SITE_ROOT_PATH . "/local/php_interface/".WIZARD_SITE_ID."/init.php", array("STORE_ADMIN_ID" => $userGroupID));
}



if(IntVal($userGroupID) > 0 && false)
{
	WizardServices::SetFilePermission(Array($siteID, "/bitrix/admin"), Array($userGroupID => "R"));
	
	$new_task_id = CTask::Add(array(
	        "NAME" => GetMessage("TASK_WIZARD_STORE_ADMIN"),
	        "DESCRIPTION" => GetMessage("TASK_WIZARD_STORE_ADMIN_DESC"),
	        "LETTER" => "Q",
	        "BINDING" => "module",
	        "MODULE_ID" => "main",
	));
	if($new_task_id)
	{
	  $arOps = array();
	  $rsOp = COperation::GetList(array(), array("NAME"=>"cache_control|view_own_profile|edit_own_profile"));
	  while($arOp = $rsOp->Fetch())
	    $arOps[] = $arOp["ID"];
	  CTask::SetOperations($new_task_id, $arOps);
	}
	
	$rsTasks = CTask::GetList(array(), array("MODULE_ID"=>"main", "SYS"=>"N", "BINDIG"=>"module","LETTER"=>"Q"));
	if($arTask = $rsTasks->Fetch())
	{
	  CGroup::SetModulePermission($userGroupID, $arTask["MODULE_ID"], $arTask["ID"]);
	}
	
	$rsTasks = CTask::GetList(array(), array("MODULE_ID"=>"fileman", "SYS"=>"Y", "BINDIG"=>"module","LETTER"=>"F"));
	if($arTask = $rsTasks->Fetch())
	{
	  CGroup::SetModulePermission($userGroupID, $arTask["MODULE_ID"], $arTask["ID"]);
	}
	
	$SiteDir = "";
	if(WIZARD_SITE_ID != "s1"){
		$SiteDir = "/site_" . WIZARD_SITE_ID;
	}
	WizardServices::SetFilePermission(Array($siteID, $SiteDir . "/index.php"), Array($userGroupID => "W"));
    WizardServices::SetFilePermission(Array($siteID, $SiteDir . "/news/"), Array($userGroupID => "W"));
}
?>