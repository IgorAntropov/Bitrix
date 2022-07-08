<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

//$pictAr = [];
foreach ($arResult["ITEMS"] as &$arItem) {
    $arItem['IMAGES']=[];
    if ($arItem["PREVIEW_PICTURE"]["SRC"]) {
        $pict = $arItem["PREVIEW_PICTURE"]["ID"];
        $arItem['IMAGES'][$pict]['SMALL'] = ALResizeCut($pict, 520, 350);
        $arItem['IMAGES'][$pict]['BIG'] = ALResize($pict, 2000);
    }
    if (isset($arItem['PROPERTIES']['IMAGES']['VALUE'])) {
        foreach ($arItem['PROPERTIES']['IMAGES']['VALUE'] as $pict) {
            $arItem['IMAGES'][$pict]['SMALL'] = ALResizeCut($pict, 520, 350);
            $arItem['IMAGES'][$pict]['BIG'] = ALResize($pict, 2000);
        }
    }
}