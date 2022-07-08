<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->setFrameMode(true);
$strTitle = "";

    if (!BELARUS && defined("CUSTOM_PRODUCTS") && !KAZAKHSTAN) {
        $customLightSectionAr = [
            [
                'NAME' => GetMessage("ARLIGHT_ARSTORE_SOBERI_SVETILQNIK_IZ"),
                'ID' => '999',
                'DEPTH_LEVEL' => 1,
                'RELATIVE_DEPTH_LEVEL' => '',
                'SECTION_PAGE_URL' => SITE_DIR . 'catalog/aluprofile-luminaires/',
                'CODE' => 'aluprofile-luminaires',
                'EXTERNAL_ID' => '',
                'ELEMENT_CNT' => '',
                'IBLOCK_SECTION_ID' => ''
            ], [
                'NAME' => GetMessage("ARLIGHT_ARSTORE_LINIA"),
                'ID' => '900',
                'DEPTH_LEVEL' => 2,
                'RELATIVE_DEPTH_LEVEL' => '',
                'SECTION_PAGE_URL' => SITE_DIR . 'catalog/custom-lamps/?section=900',
            ], [
                'NAME' => GetMessage("ARLIGHT_ARSTORE_KVADRAT_ROMB"),
                'ID' => '901',
                'DEPTH_LEVEL' => 2,
                'RELATIVE_DEPTH_LEVEL' => '',
                'SECTION_PAGE_URL' => SITE_DIR . 'catalog/custom-lamps/?section=901',
            ], [
                'NAME' => GetMessage("ARLIGHT_ARSTORE_TREUGOLQNIK"),
                'ID' => '902',
                'DEPTH_LEVEL' => 2,
                'RELATIVE_DEPTH_LEVEL' => '',
                'SECTION_PAGE_URL' => SITE_DIR . 'catalog/custom-lamps/?section=902',
            ], [
                'NAME' => GetMessage("ARLIGHT_ARSTORE_GEKSAGON"),
                'ID' => '903',
                'DEPTH_LEVEL' => 2,
                'RELATIVE_DEPTH_LEVEL' => '',
                'SECTION_PAGE_URL' => SITE_DIR . 'catalog/custom-lamps/?section=903',
            ], [
                'NAME' => '3 '.GetMessage("ARLIGHT_ARSTORE_LUCA"),
                'ID' => '904',
                'DEPTH_LEVEL' => 2,
                'RELATIVE_DEPTH_LEVEL' => '',
                'SECTION_PAGE_URL' => SITE_DIR . 'catalog/custom-lamps/?section=904',
            ], [
                'NAME' => '4 '.GetMessage("ARLIGHT_ARSTORE_LUCA"),
                'ID' => '905',
                'DEPTH_LEVEL' => 2,
                'RELATIVE_DEPTH_LEVEL' => '',
                'SECTION_PAGE_URL' => SITE_DIR . 'catalog/custom-lamps/?section=905',
            ], [
                'NAME' => GetMessage("ARLIGHT_ARSTORE_ZIGZAG_LINII"),
                'ID' => '906',
                'DEPTH_LEVEL' => 2,
                'RELATIVE_DEPTH_LEVEL' => '',
                'SECTION_PAGE_URL' => SITE_DIR . 'catalog/custom-lamps/?section=906',
            ], [
                'NAME' => GetMessage("ARLIGHT_ARSTORE_ZIGZAG_LINIY"),
                'ID' => '907',
                'DEPTH_LEVEL' => 2,
                'RELATIVE_DEPTH_LEVEL' => '',
                'SECTION_PAGE_URL' => SITE_DIR . 'catalog/custom-lamps/?section=907',
            ], [
                'NAME' => GetMessage("ARLIGHT_ARSTORE_UGOL"),
                'ID' => '908',
                'DEPTH_LEVEL' => 2,
                'RELATIVE_DEPTH_LEVEL' => '',
                'SECTION_PAGE_URL' => SITE_DIR . 'catalog/custom-lamps/?section=908',
            ],

        ];

        $customLightSectionAr = array_reverse($customLightSectionAr);
        foreach ($customLightSectionAr as $customLightSection)
            array_unshift($arResult["SECTIONS"], $customLightSection);
    }


    $TOP_DEPTH = $arResult["SECTION"]["DEPTH_LEVEL"];
	$CURRENT_DEPTH = $TOP_DEPTH;

	foreach($arResult["SECTIONS"] as $arSection)
	{
		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
		if($CURRENT_DEPTH < $arSection["DEPTH_LEVEL"])
		{
			echo "\n",str_repeat("\t", $arSection["DEPTH_LEVEL"]-$TOP_DEPTH),"<ul class='menu-child menu-child_".($CURRENT_DEPTH+1)."'>";
		}
		elseif($CURRENT_DEPTH == $arSection["DEPTH_LEVEL"])
		{
			echo "</li>";
		}
		else
		{
			while($CURRENT_DEPTH > $arSection["DEPTH_LEVEL"])
			{
				echo "</li>";

				echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</ul>","\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH-1);
				$CURRENT_DEPTH--;
			}
			echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</li>";
		}


		$count = $arParams["COUNT_ELEMENTS"] && $arSection["ELEMENT_CNT"] ? "&nbsp;(".$arSection["ELEMENT_CNT"].")" : "";

		if ($arSection['ID'] && $_REQUEST['SECTION_ID']==$arSection['ID'])
		{
			$link = '<b>'.$arSection["NAME"].$count.'</b>';
			$strTitle = $arSection["NAME"];
		}
		else
		{
			$link = '<a href="'.$arSection["SECTION_PAGE_URL"].'" data-code="'.$arSection["CODE"].'">'.$arSection["NAME"].$count.'</a>';
		}
		echo "\n",str_repeat("\t", $arSection["DEPTH_LEVEL"]-$TOP_DEPTH);
		?><li <?=($arSection['ID']!='')?'id="'.$this->GetEditAreaId($arSection['ID']).'"':''?>><?=$link?><?

		$CURRENT_DEPTH = $arSection["DEPTH_LEVEL"];
	}

	while($CURRENT_DEPTH > $TOP_DEPTH)
	{
		echo "</li>";
		echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</ul>","\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH-1);
		$CURRENT_DEPTH--;
	}
	?>
