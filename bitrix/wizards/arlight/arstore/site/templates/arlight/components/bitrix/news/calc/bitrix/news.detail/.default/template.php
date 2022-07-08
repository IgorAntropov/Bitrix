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
$this->setFrameMode(true);
?>
<div class="news-detail">
    <div class="title title-page">
        <div class="title__text"><h1><?= $arResult["NAME"] ?></h1></div>
    </div>
    <?
    //цель яндекс.метрики для калькуляторов
    global $yaMetricaCalc;
    $yaMetricaCalc = '';
    global $goalCurrent;
    if ($goalCurrent['result-calc']['name'] && $goalCurrent['result-calc']['id'])
        $yaMetricaCalc = 'onsubmit="ym(' . $goalCurrent['result-calc']['id'] . ',\'reachGoal\',\'' . $goalCurrent['result-calc']['name'] . '\'); return true;"';

    $db_props = CIBlockElement::GetProperty($arResult['IBLOCK_ID'], $arResult['ID'], array(), array('CODE' =>  'CALC_ID'));
    if($ar_prop = $db_props->getNext()){
        $calcId = $ar_prop['VALUE'];
    }

    if (isset($calcId) && $calcId != '') {
        $APPLICATION->IncludeComponent(
            "itertech:master_calc",
            $calcId,
            array()
        );
    }
    ?>
</div>