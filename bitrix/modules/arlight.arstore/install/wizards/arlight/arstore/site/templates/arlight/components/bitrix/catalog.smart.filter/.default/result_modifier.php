<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (isset($arParams["TEMPLATE_THEME"]) && !empty($arParams["TEMPLATE_THEME"]))
{
	$arAvailableThemes = array();
	$dir = trim(preg_replace("'[\\\\/]+'", "/", dirname(__FILE__)."/themes/"));
	if (is_dir($dir) && $directory = opendir($dir))
	{
		while (($file = readdir($directory)) !== false)
		{
			if ($file != "." && $file != ".." && is_dir($dir.$file))
				$arAvailableThemes[] = $file;
		}
		closedir($directory);
	}

	if ($arParams["TEMPLATE_THEME"] == "site")
	{
		$solution = COption::GetOptionString("main", "wizard_solution", "", SITE_ID);
		if ($solution == "eshop")
		{
			$templateId = COption::GetOptionString("main", "wizard_template_id", "eshop_bootstrap", SITE_ID);
			$templateId = (preg_match("/^eshop_adapt/", $templateId)) ? "eshop_adapt" : $templateId;
			$theme = COption::GetOptionString("main", "wizard_".$templateId."_theme_id", "blue", SITE_ID);
			$arParams["TEMPLATE_THEME"] = (in_array($theme, $arAvailableThemes)) ? $theme : "blue";
		}
	}
	else
	{
		$arParams["TEMPLATE_THEME"] = (in_array($arParams["TEMPLATE_THEME"], $arAvailableThemes)) ? $arParams["TEMPLATE_THEME"] : "blue";
	}
}
else
{
	$arParams["TEMPLATE_THEME"] = "blue";
}

$arParams["FILTER_VIEW_MODE"] = (isset($arParams["FILTER_VIEW_MODE"]) && toUpper($arParams["FILTER_VIEW_MODE"]) == "HORIZONTAL") ? "HORIZONTAL" : "VERTICAL";
$arParams["POPUP_POSITION"] = (isset($arParams["POPUP_POSITION"]) && in_array($arParams["POPUP_POSITION"], array("left", "right"))) ? $arParams["POPUP_POSITION"] : "left";


$sectionId = $arParams['SECTION_ID'];
$sectionsPathInfo = GetIBlockSectionAllPath(CATALOG_ID, $sectionId);
// xml id родительского раздела
$externalID = $sectionsPathInfo[0]['XML_ID'];
$currentExternalID = '';
$level = count($sectionsPathInfo);
// xml id текущего  раздела
$currentExternalID = $sectionsPathInfo[$level - 1]['XML_ID'];
//путь к файлу с настройками
$filePath = getContentFromFilterFile($externalID, $sectionsPathInfo, true);
$file = file_get_contents($filePath, true);

$arResultFilter = json_decode($file, true);

$arResultFilterKey = array_keys($arResultFilter);

$arResult["SELECT_ITEMS"] = [];

foreach ($arResult['ITEMS'] as $key => $arItem) {
    $code = $arItem['CODE'];

    if ($code =='COLOR_HREF') continue;

    if (in_array($code, $arResultFilterKey)) {
        $arItem['SORT'] = $arResultFilter[$code]['sort'];
        $arItem['GROUP'] = $arResultFilter[$code]['group'];
        $arItem['NAME'] = $arResultFilter[$code]['name'];
        $arItem['DESCRIPTION'] = str_replace("\n", '<br>', $arResultFilter[$code]['descript']);

        if ($arResultFilter[$code]['group'] == true)
            $arItem['DISPLAY_TYPE'] = 'K';
        $arItem['VALUES_TEMP'] = [];

        $arResultFilterValueKey = [];
        foreach ((array)$arResultFilter[$code]['props'] as $keyVkey => $arResultFilterItem) {
            if ($arResultFilterItem['show'] == false)
                $arResultFilterValueKey[] = $keyVkey;
        }

        $arValues = $arItem['VALUES'];
        if ('COLOR_HEX_MULTIPLE' == $code) {
            $arValues = array_change_key_case($arValues, CASE_LOWER);
        }

        //массив значений, которые не приходят из Базы. Их не выводить
        foreach ($arValues as $keyVal => $arItemVal) {
            if (!isset($arResultFilter[$code]['props'][$keyVal]))
                $arResultFilterValueKey[] = $keyVal;
        }

        $sortCounter = 1;
        foreach ($arValues as $keyVal => $arItemVal) {
            if (!in_array($keyVal, $arResultFilterValueKey)) {
                $valueKey = str_replace(['>', '<'], ['&gt;', '&lt;'], $arItemVal['VALUE']);
                if ($arResultFilter[$code]['props'][$valueKey]['sort'])
                    $arItemVal['SORT'] = $arResultFilter[$code]['props'][$valueKey]['sort'];
                else {
                    $arItemVal['SORT'] = 500 + $sortCounter;
                    $sortCounter++;
                }
                if ((int)$arItemVal['SORT'] && (int)$arItemVal['SORT'] === 500) {
                    $arItemVal['SORT'] = (int)$arItemVal['SORT'] + $sortCounter;
                    $sortCounter++;
                }
                $oldValue = html_entity_decode($arItemVal['VALUE']);
                if ($code == 'COLOR_HEX_MULTIPLE') $oldValue = mb_strtolower($oldValue);

                if ($arResultFilter[$code]['props'][$oldValue]['name']){
                    if ($code !== 'COLOR_HREF' && $code !== 'COLOR_HEX_MULTIPLE'){
                        $arItemVal['VALUE'] = $arResultFilter[$code]['props'][$oldValue]['name'];
                    } else {
                        $colorName = $arResultFilter[$code]['props'][$oldValue]['name'];
                        $arItemVal['COLOR_NAME'] = $colorName;
                        if ((stristr($colorName, '0K') || stristr($colorName, '0 K'))) {
                            $arItemVal['WHITE'] = true;
                        }
                    }
                } 
                
                $arItem['VALUES_TEMP'][$keyVal] = $arItemVal;
            }
        }

        $sortValTemp = [];
        foreach ($arItem['VALUES_TEMP'] as $keyValTemp => $rowValTemp) {
            $sortValTemp[$keyValTemp] = $rowValTemp['SORT'];
        }
        array_multisort($sortValTemp, SORT_ASC, $arItem['VALUES_TEMP']);
        unset ($sortValTemp);
        unset ($keyValTemp);
        unset ($rowValTemp);

        if (count($arItem['VALUES_TEMP']) > 0 && $arItem['PROPERTY_TYPE'] == 'S') {
            $arItem['VALUES'] = $arItem['VALUES_TEMP'];
            $arItem['VALUES_TEMP'] = [];
        }

        $arResult["SELECT_ITEMS"][$code] = $arItem;
    }
}

$sort = [];
foreach ($arResult["SELECT_ITEMS"] as $key => $row) {
    $sort[$key] = $row['SORT'];
}

array_multisort($sort, SORT_ASC, $arResult["SELECT_ITEMS"]);