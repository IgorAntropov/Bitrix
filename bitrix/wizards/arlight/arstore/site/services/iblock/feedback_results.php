<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

if (!CModule::IncludeModule("iblock"))
    return;

$iblockXMLFile = WIZARD_SERVICE_RELATIVE_PATH . "/xml/" . LANGUAGE_ID . "/feedback_results.xml";
$iblockCode = "feedback";
$iblockType = "service";

$rsIBlock = CIBlock::GetList(array(), array("CODE" => $iblockCode, "TYPE" => $iblockType));
$iblockID = false;
if ($arIBlock = $rsIBlock->Fetch()) {
    $iblockID = $arIBlock["ID"];
    if (WIZARD_REINSTALL_DATA) {
        CIBlock::Delete($arIBlock["ID"]);
        $iblockID = false;
    }
}

if ($iblockID == false) {
    $permissions = array(
        "1" => "X",
        "2" => "R"
    );
    $dbGroup = CGroup::GetList($by = "", $order = "", array("STRING_ID" => "content_editor"));
    if ($arGroup = $dbGroup->Fetch()) {
        $permissions[$arGroup["ID"]] = 'W';
    };
    $iblockID = WizardServices::ImportIBlockFromXML(
        $iblockXMLFile,
        "feedback",
        $iblockType,
        WIZARD_SITE_ID,
        $permissions
    );

    if ($iblockID < 1)
        return;

    //IBlock fields
    $iblock = new CIBlock;
    $arFields = array(
        "ACTIVE" => "Y",
        "FIELDS" => array('IBLOCK_SECTION' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',), 'ACTIVE' => array('IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => 'Y',), 'ACTIVE_FROM' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '=today',), 'ACTIVE_TO' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',), 'SORT' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',), 'NAME' => array('IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => '',), 'PREVIEW_PICTURE' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => array('FROM_DETAIL' => 'N', 'SCALE' => 'N', 'WIDTH' => '', 'HEIGHT' => '', 'IGNORE_ERRORS' => 'N',),), 'PREVIEW_TEXT_TYPE' => array('IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => 'text',), 'PREVIEW_TEXT' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',), 'DETAIL_PICTURE' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => array('SCALE' => 'N', 'WIDTH' => '', 'HEIGHT' => '', 'IGNORE_ERRORS' => 'N',),), 'DETAIL_TEXT_TYPE' => array('IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => 'text',), 'DETAIL_TEXT' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',), 'XML_ID' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',), 'CODE' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',), 'TAGS' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',),),
        "CODE" => $iblockCode,
        "XML_ID" => $iblockCode,
        "NAME" => $iblock->GetArrayByID($iblockID, "NAME"),
    );

    $iblock->Update($iblockID, $arFields);
} else {
    $arSites = array();
    $db_res = CIBlock::GetSite($iblockID);
    while ($res = $db_res->Fetch())
        $arSites[] = $res["LID"];
    if (!in_array(WIZARD_SITE_ID, $arSites)) {
        $arSites[] = WIZARD_SITE_ID;
        $iblock = new CIBlock;
        $iblock->Update($iblockID, array("LID" => $arSites));
    }
}

CWizardUtil::ReplaceMacros(WIZARD_SITE_ROOT_PATH . "/local/php_interface/".WIZARD_SITE_ID."/init.php", array("FEEDBACK_RESULT_IBLOCK_ID" => $iblockID));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH . "/admin/feedback/index.php", array("FEEDBACK_RESULT_IBLOCK_ID" => $iblockID));

?>
