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

if (!$arResult["NavShowAlways"]) {
    if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
        return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"] . "&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?" . $arResult["NavQueryString"] : "");
$showByStr = '';

if (stristr($arResult['sUrlPath'], '/catalog/')) {
    $showByAr = [20, 40, 60];
    $showByStr = '<div class="pagenavi-showby">'. GetMessage("nav_show");;
    $sizen = $arResult['NavPageSize'];
    foreach ($showByAr as $val) {
        $active = ($val == $sizen) ? 'active' : '';
        $showByStr .= '<a href="' . $APPLICATION->GetCurPageParam("SIZEN=" . $val, ['SIZEN']) . '" class="pagenavi-showby--number ' . $active . '">' . $val . '</a>';
    }
    $showByStr .= '</div>';
}
?>

<div class="pagenavi-block pagenavi-block--indent">
    <div class="pagenavi ">
        <?= $showByStr ?>
        <ul class="pagenavi__block">
            <? if ($arResult["NavPageNomer"] > 1): ?>
                <? if ($arResult["bSavePage"]): ?>
                    <li class="pagenavi__item pagenavi__item-arrow">
                        <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=1"
                           title="<?= GetMessage("nav_begin") ?>" class="pagenavi__link">
                            <i class="icon-arrow-left-double"></i>
                        </a>
                    </li>
                    <li class="pagenavi__item pagenavi__item-arrow">
                        <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] - 1) ?>"
                           title="<?= GetMessage("nav_prev") ?>" class="pagenavi__link">
                            <i class="icon-arrow-left"></i>
                        </a>
                    </li>
                <? else: ?>
                    <li class="pagenavi__item pagenavi__item-arrow">
                        <a href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"
                           title="<?= GetMessage("nav_begin") ?>" class="pagenavi__link">
                            <i class="icon-arrow-left-double"></i>
                        </a>
                    </li>
                    <? if ($arResult["NavPageNomer"] > 2): ?>
                        <li class="pagenavi__item pagenavi__item-arrow">
                            <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] - 1) ?>"
                               title="<?= GetMessage("nav_prev") ?>" class="pagenavi__link">
                                <i class="icon-arrow-left"></i>
                            </a>
                        </li>
                    <? else: ?>
                        <li class="pagenavi__item pagenavi__item-arrow">
                            <a href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"
                               title="<?= GetMessage("nav_prev") ?>" class="pagenavi__link">
                                <i class="icon-arrow-left"></i>
                            </a>
                        </li>
                    <? endif ?>
                <? endif ?>

            <? else: ?>
                <li class="pagenavi__item pagenavi__item-arrow disabled">
                    <a href="#" class="pagenavi__link" title="<?= GetMessage("nav_begin") ?>">
                        <i class="icon-arrow-left-double"></i>
                    </a>
                </li>
                <li class="pagenavi__item pagenavi__item-arrow disabled">
                    <a href="#" class="pagenavi__link" title="<?= GetMessage("nav_prev") ?>">
                        <i class="icon-arrow-left"></i>
                    </a>
                </li>
            <? endif ?>
            <? while ($arResult["nStartPage"] <= $arResult["nEndPage"]): ?>

                <? if ($arResult["nStartPage"] == $arResult["NavPageNomer"]): ?>
                    <li class="pagenavi__item">
                        <a href="" class="pagenavi__link active_el"><?= $arResult["nStartPage"] ?></a>
                    </li>
                <? elseif ($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false): ?>
                    <li class="pagenavi__item">
                        <a href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"
                           class="pagenavi__link"><?= $arResult["nStartPage"] ?></a>
                    </li>
                <? else: ?>
                    <li class="pagenavi__item">
                        <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>"
                           class="pagenavi__link"><?= $arResult["nStartPage"] ?></a>
                    </li>
                <? endif ?>
                <? $arResult["nStartPage"]++ ?>
            <? endwhile ?>
            <? if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]): ?>
                <li class="pagenavi__item pagenavi__item-arrow">
                    <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] + 1) ?>"
                       title="<?= GetMessage("nav_next") ?>" class="pagenavi__link">
                        <i class="icon-arrow-right"></i>
                    </a>
                </li>
                <li class="pagenavi__item pagenavi__item-arrow">
                    <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["NavPageCount"] ?>"
                       title="<?= GetMessage("nav_end") ?>" class="pagenavi__link">
                        <i class="icon-arrow-right-double"></i>
                    </a>
                </li>
            <? else: ?>
                <li class="pagenavi__item pagenavi__item-arrow disabled">
                    <a href="" class="pagenavi__link" title="<?= GetMessage("nav_next") ?>">
                        <i class="icon-arrow-right"></i>
                    </a>
                </li>
                <li class="pagenavi__item pagenavi__item-arrow disabled">
                    <a href="" class="pagenavi__link" title="<?= GetMessage("nav_end") ?>">
                        <i class="icon-arrow-right-double"></i>
                    </a>
                </li>
            <? endif ?>
        </ul>
        <div class="pagenavi__info">
            <div class="pagenavi__info-text"><?= $arResult["NavFirstRecordShow"] ?> <?= GetMessage("nav_to") ?> <?= $arResult["NavLastRecordShow"] ?> <?= GetMessage("nav_of") ?> <?= $arResult["NavRecordCount"] ?>
            </div>
        </div>
    </div>
</div>