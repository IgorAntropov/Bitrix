<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */
use Bitrix\Main\Grid\Declension;
$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

$docFile = false;

foreach((array)$arResult['PROPERTIES']['FILES']['DESCRIPTION'] as $pdfK => $pdfV) {
    $fileTypeAr = explode(';', $pdfV);
    if ($fileTypeAr[count($fileTypeAr) - 1] == 'datasheet') {
        $docFile = CFile::GetFileArray($arResult['PROPERTIES']['FILES']['VALUE'][$pdfK]);
    }
}
$arResult['DOC_FILE'] = $docFile;


$imgFormats = array('photo-main', 'photo', 'photo-applications', 'draw', 'photo-pack');
$galleryImages = array();

foreach ((array)$arResult['FILES'] as $value) {
    if (in_array($value['type'], $imgFormats)) {
        $galleryImages[] = $value['SRC'];
    }

}

if (!$galleryImages && $arResult['DETAIL_PICTURE']) {
    $galleryImages[] = $arResult['DETAIL_PICTURE']['SRC'];
}

$arResult['GALLERY_IMAGES'] = $galleryImages;


//выборка свойств для вывода
$filterSection = [
    SECTION_SL_XML_ID => ['T_62', 'COLOR_HREF', 'T_1', 'T_25', 'T_63', 'T_5', 'T_45', 'T_46', 'T_23', 'T_94', 'T_8', 'T_95', 'T_271','T_272',
        'T_35', 'T_75', 'T_20', 'T_4', 'T_3', 'T_67', 'T_59', 'T_41', 'T_44', 'T_6', 'T_33', 'T_96', 'MY_6',
        'MY_7', 'MY_8', 'PACKNORM', 'PACKAGE_NAME','WEIGHT', 'T_89'],

    SECTION_BP_XML_ID => ['T_62', 'T_13','T_43','T_38', 'T_37', 'T_92', 'T_76', 'T_3', 'T_86', 'T_85',
        'T_136', 'T_137', 'T_87', 'T_88', 'T_150', 'T_133', 'T_67', 'T_44', 'CASE', 'T_91', 'T_6', 'MY_6', 'MY_7',
        'MY_8', 'PACKNORM', 'PACKAGE_NAME', 'WEIGHT', 'T_89'],

    SECTION_US_XML_ID => ['T_62', 'T_53', 'T_72', 'T_145', 'T_5', 'T_67', 'T_65', 'T_28', 'T_59', 'T_118', 'T_124', 'T_68', 'T_69',
        'T_73', 'T_61', 'T_81', 'T_112', 'T_82', 'T_78', 'T_77', 'T_80', 'T_37', 'T_20', 'T_38', '', 'T_71', 'T_43',
        'T_13', 'T_134', 'T_58', 'T_51', 'T_57', 'T_44', 'T_22', 'MY_6', 'MY_7', 'MY_8', 'PACKNORM', 'PACKAGE_NAME', 'WEIGHT', 'T_89'],

    SECTION_AP_XML_ID => ['T_62', 'T_53', 'T_96', 'T_2', 'T_58', 'T_51', 'T_52', 'T_146', 'T_9', 'T_57', 'MY_6', 'MY_7',
        'MY_8', 'PACKNORM', 'PACKAGE_NAME', 'WEIGHT', 'T_89'],

    SECTION_SS_XML_ID => ['T_62', 'T_96', 'COLOR_HREF', 'T_25', 'T_8', 'T_63', 'T_5', 'T_20', 'T_35', 'T_37', 'T_38', 'T_43',
        'T_13', 'T_76', 'T_86', 'T_87',  'T_85', 'T_136', 'T_170', 'T_45', 'T_23', 'T_58', 'T_93', 'T_57', 'T_88', 'T_51', 'CASE', 'T_42', 'T_44', 'T_171',
        'T_50', 'T_54', 'T_55', 'T_83', 'T_40', 'MY_6', 'MY_7', 'MY_8', 'PACKNORM', 'PACKAGE_NAME', 'WEIGHT', 'T_89'],

    SECTION_SP_XML_ID => ['T_62', 'T_96', 'COLOR_HREF', 'T_25', 'T_8', 'T_63', 'T_5', 'T_34', 'T_35', 'T_37', 'T_23', 'T_59',
        'T_73', 'T_61', 'T_58', 'T_57', 'T_51', 'T_44', 'T_22', 'MY_6', 'MY_7', 'MY_8', 'PACKNORM', 'PACKAGE_NAME',
        'WEIGHT', 'T_89'],

    SECTION_SD_XML_ID => ['T_62', 'T_96', 'COLOR_HREF', 'T_25', 'T_63', 'T_94', 'T_5', 'T_45', 'T_23', 'T_46', 'T_33', 'T_20',
        'T_35', 'T_13', 'T_95', 'T_71', 'T_59', 'T_65', 'T_73', 'T_44', 'T_87', 'T_97', 'T_135', 'T_41', 'T_57', 'T_40',
        'T_22', 'MY_6', 'MY_7', 'MY_8', 'PACKNORM', 'PACKAGE_NAME', 'WEIGHT', 'T_89'],

    SECTION_KP_XML_ID => ['T_62', 'T_96', 'T_99', 'T_101', 'T_138', 'T_100', 'T_98', 'T_103', 'T_102', 'T_104', 'T_139',
        'T_109', 'T_110', 'T_105', 'T_106', 'T_107', 'T_108', 'T_113', 'T_112', 'T_87', 'T_114', 'T_71', 'T_56', 'T_111',
        'WEIGHT', 'PACKNORM', 'PACKAGE_NAME', 'T_89'],

    SECTION_SM_XML_ID => ['T_62', 'T_96', 'COLOR_HREF', 'T_1', 'T_25',  'T_8', 'T_7', 'T_5', 'T_66', 'T_2', 'T_144', 'T_143',
        'T_23', 'T_45', 'T_20', 'T_4', 'T_35', 'T_13', 'T_64', 'T_3', 'T_18', 'T_70', 'T_14', 'T_67', 'T_59', 'T_44',
        'T_57', 'T_140', 'T_141', 'T_40', 'T_22', 'MY_6', 'MY_7', 'MY_8', 'PACKNORM', 'PACKAGE_NAME', 'WEIGHT', 'T_89'],

    SECTION_RM_XML_ID => ['T_62', 'MY_6', 'MY_7', 'MY_8', 'PACKNORM', 'PACKAGE_NAME', 'WEIGHT', 'T_89']
];

global $propertyAr;
$parentSectionXml = $arResult['SECTION']['PATH'][0]['XML_ID'];
$propertyAr = $filterSection[$parentSectionXml];

if(!empty($arResult['PROPERTIES']['TECH_PROPS_ORDER']['VALUE'])){
    $propertyAr = $arResult['PROPERTIES']['TECH_PROPS_ORDER']['VALUE'];
}

if(isset($arResult['PROPERTIES']['T_89']['VALUE'][0])){
    $years = (float)$arResult['PROPERTIES']['T_89']['VALUE'][0];
    if($years > 10) $years = $years/12;
    $pluralYears = ($years === 1.5) ? 2 : $years;
    $yearDeclension = new Declension(GetMessage("ARLIGHT_ARSTORE_GOD"), GetMessage("ARLIGHT_ARSTORE_GODA"), GetMessage("ARLIGHT_ARSTORE_LET"));
    $arResult['PROPERTIES']['T_89']['VALUE'][0] = $years.' '.$yearDeclension->get($pluralYears);
    $arResult['DISPLAY_PROPERTIES']['T_89']['VALUE'][0] = $years.' '.$yearDeclension->get($pluralYears);
    $arResult['DISPLAY_PROPERTIES']['T_89']['DISPLAY_VALUE'] = $years.' '.$yearDeclension->get($pluralYears);
}

//определение размера и расположения файлов
function AddSizeInArResult($docProp)
{
    $rsFile = CFile::GetByID($docProp['VALUE']);
    $arTemp = $rsFile->Fetch();
//    $docProp['SIZE'] = CFile::FormatSize($arTemp['FILE_SIZE']);
    $docProp['PATH'] = CFile::GetPath($docProp['VALUE']);
    $docProp['FILE_TYPE'] = explode('.', $arTemp['FILE_NAME'])[1];
    return ($docProp);
}
if ($arResult['PROPERTIES']['FILE_CONFIG']['VALUE'])
    $arResult['PROPERTIES']['FILE_CONFIG'] = AddSizeInArResult($arResult['PROPERTIES']['FILE_CONFIG']);
if ($arResult['PROPERTIES']['FILE_3D']['VALUE'])
    $arResult['PROPERTIES']['FILE_3D'] = AddSizeInArResult($arResult['PROPERTIES']['FILE_3D']);
if ($arResult['PROPERTIES']['FILE_IES']['VALUE'])
    $arResult['PROPERTIES']['FILE_IES'] = AddSizeInArResult($arResult['PROPERTIES']['FILE_IES']);
if ($arResult['PROPERTIES']['INSTRUCTION']['VALUE'])
    $arResult['PROPERTIES']['INSTRUCTION'] = AddSizeInArResult($arResult['PROPERTIES']['INSTRUCTION']);
if ($arResult['PROPERTIES']['FILE_DIALUX']['VALUE'])
    $arResult['PROPERTIES']['FILE_DIALUX'] = AddSizeInArResult($arResult['PROPERTIES']['FILE_DIALUX']);
if ($arResult['PROPERTIES']['FILE_SOFTWARE']['VALUE'])
    $arResult['PROPERTIES']['FILE_SOFTWARE'] = AddSizeInArResult($arResult['PROPERTIES']['FILE_SOFTWARE']);
if ($arResult['PROPERTIES']['FILE_RECOMMENDATION_LETTER']['VALUE'])
    $arResult['PROPERTIES']['FILE_RECOMMENDATION_LETTER'] = AddSizeInArResult($arResult['PROPERTIES']['FILE_RECOMMENDATION_LETTER']);
if ($arResult['PROPERTIES']['MANUAL']['VALUE']){
    foreach ($arResult['PROPERTIES']['MANUAL']['VALUE'] as $manualID){
        $ar['VALUE'] = (int)$manualID;
        $arResult['PROPERTIES']['MANUAL']['VALUES_ARR'][] = AddSizeInArResult($ar);
    }
}

$this->__component->arResult["OG_IMG"] = $arResult['PREVIEW_PICTURE']['SRC'];
$this->__component->SetResultCacheKeys(array("OG_IMG"));
$this->__component->arResult["OG_TEXT"] = $arResult['PROPERTIES']['DESCRIPTION']['VALUE'];
$this->__component->SetResultCacheKeys(array("OG_TEXT"));