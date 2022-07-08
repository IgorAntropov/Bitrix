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
$dealer_id = COption::GetOptionString("main", "dealer_id");
$dealer_status = COption::GetOptionString("main", "dealer_status", '');
?>
<div class="banner-slider--wrapper">
    <? if (count($arResult["ITEMS"]) > 0): ?>
        <? if ($dealer_id != '' && $dealer_status != ''): ?>
            <div class="dealer-sticker--wrapper">
                <div class="dealer-sticker">
                    <div class="dealer-sticker--border">
                        <div class="dealer-sticker--content">
                            <div class="dealer-sticker--img1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 140.28 84.07">
                                    <defs>
                                        <style>.cls-1-logo {
                                                fill: #ff0013;
                                            }</style>
                                    </defs>
                                    <g id="<?=GetMessage("ARLIGHT_ARSTORE_SLOY")?>" data-name="<?=GetMessage("ARLIGHT_ARSTORE_SLOY1")?>">
                                        <g id="<?=GetMessage("ARLIGHT_ARSTORE_SLOY2")?>" data-name="<?=GetMessage("ARLIGHT_ARSTORE_SLOY3")?>">
                                            <path class="cls-1-logo"
                                                  d="M138.32,63.29h0a.81.81,0,0,0,.58-.8.76.76,0,0,0-.24-.59,1.26,1.26,0,0,0-.89-.25,4.26,4.26,0,0,0-.76.06v3.08h.39V63.43h.38c.36,0,.53.17.62.6a3.82,3.82,0,0,0,.2.75H139a6.37,6.37,0,0,1-.23-.86.81.81,0,0,0-.46-.63m-.51-.17h-.41V62a1.62,1.62,0,0,1,.4,0c.42,0,.71.18.71.58s-.27.59-.7.59"/>
                                            <path class="cls-1-logo"
                                                  d="M137.85,60.8a2.46,2.46,0,1,0,2.43,2.46,2.45,2.45,0,0,0-2.43-2.46m0,4.59A2.13,2.13,0,1,1,140,63.26a2.13,2.13,0,0,1-2.11,2.13"/>
                                            <path class="cls-1-logo"
                                                  d="M67.75,61.25a4,4,0,0,0-2.93-1,6.78,6.78,0,0,0-1.79.25c-.84.24-2.82,1-3.2,3-.21,1.15.47,2,1.88,2.45a6.07,6.07,0,0,0,1.59.2c1.85,0,4-.75,4.72-2.61A2.07,2.07,0,0,0,67.75,61.25Z"/>
                                            <path class="cls-1-logo"
                                                  d="M44,66.28a5.74,5.74,0,0,0-1.7-.56h0l-.42-.07-.12,0-.35-.05-2.68-.22-.49,0h-.25c-.52,0-1.08,0-1.63,0h-.23l-.73,0h-.09l-.82,0h-.14l-.74,0h-.09l-1.56.16h-.09c-.51.07-1,.14-1.45.22a14.8,14.8,0,0,0-2,.48,1.86,1.86,0,0,0-1.13,1.1l-4.4,11.64h7.49L32.64,73A7.3,7.3,0,0,1,35.77,69a9.44,9.44,0,0,1,3.92-1,11.27,11.27,0,0,1,2.15.23,4,4,0,0,1,1,.42l.42.22,1-2.5Z"/>
                                            <path class="cls-1-logo"
                                                  d="M65.78,67.81a1.1,1.1,0,0,0-.9-.47H59.32a1.08,1.08,0,0,0-1,.69l-4.25,11h7.82l4-10.26A1.1,1.1,0,0,0,65.78,67.81Z"/>
                                            <path class="cls-1-logo"
                                                  d="M109,65.74a16.7,16.7,0,0,0-7,1.4l2.11-5.33a.83.83,0,0,0-.77-1.13H97.32a.81.81,0,0,0-.77.53l-7,17.88h7.88l2.47-6.25a5.83,5.83,0,0,1,5.47-3.53c1.31,0,2,.31,2,.92a3.33,3.33,0,0,1-.26,1.28l-3,7.58H112l3-7.58a7.51,7.51,0,0,0,.46-2.23C115.42,67.06,113,65.74,109,65.74Z"/>
                                            <path class="cls-1-logo"
                                                  d="M56.79,61.12a.85.85,0,0,0-.69-.36H49.84a.81.81,0,0,0-.77.53l-7,17.79h8.06l6.7-17.19A.84.84,0,0,0,56.79,61.12Z"/>
                                            <path class="cls-1-logo"
                                                  d="M91.26,66.07a.83.83,0,0,0-.69-.36H79.38a26,26,0,0,0-4.22.35c-3.24.72-5.26,2-6.79,4.19-1.5,2.6-1.78,5-.77,6.75a5.14,5.14,0,0,0,4.67,2.33,11.11,11.11,0,0,0,5.32-1.55,12.5,12.5,0,0,0,1.9-1.48L80.9,75c-2,4.89-4.68,5.83-7.51,5.8a15.77,15.77,0,0,1-5.27-1l-.33-.12-1.36,3.41.44.14a26.74,26.74,0,0,0,7.1.79,20,20,0,0,0,8.49-1.48c2.5-1.18,3.47-1.86,4.16-3.7l4.72-12A.84.84,0,0,0,91.26,66.07Zm-8.14,2c-9.9,18.25-18.58-.11,0,0Z"/>
                                            <path class="cls-1-logo"
                                                  d="M24.25,66.07a.82.82,0,0,0-.68-.36H12.37a26,26,0,0,0-4.21.35c-3.24.72-5.26,2-6.79,4.19C-.14,72.85-.41,75.24.6,77a5.14,5.14,0,0,0,4.67,2.33,11.11,11.11,0,0,0,5.32-1.55,12.5,12.5,0,0,0,1.9-1.48l1-1-1.87,3.79h7.9l4.77-12.3A.84.84,0,0,0,24.25,66.07Zm-8.34,2c-9.9,18.25-18.59-.11,0,0Z"/>
                                            <path class="cls-1-logo"
                                                  d="M131.82,60.89H129q-1,0-5.55,1.9t-5.39,2.92l-1.85,2.36h4.15L118,74a4.64,4.64,0,0,0-.28,1.46,2.8,2.8,0,0,0,1.23,2.36q1.74,1.23,5.56,1.23,4,0,6-1.34a4.67,4.67,0,0,0,1.18-1.41v-.67h-4.21c-1.39,0-.85-1.62-.56-2.7l2-4.87h4.43l.95-2.36H129.8Z"/>
                                            <path class="cls-1-logo"
                                                  d="M57.16,8.09a29.57,29.57,0,0,1,40.75,9.37,30,30,0,0,1,2.63,5.29A30.38,30.38,0,1,0,51.42,53.51a28.93,28.93,0,0,1-3.62-4.67A29.57,29.57,0,0,1,57.16,8.09Z"/>
                                            <path class="cls-1-logo"
                                                  d="M52.22,25.85c6-2.34,14-3.83,24.21-3.77C69.19,35.42,62.14,43.36,56,47.54c8.26-.2,20.72-8.38,33.7-32.32C70.57,15.11,58.66,19.91,52.22,25.85Z"/>
                                            <path class="cls-1-logo" d="M56,47.54h0Z"/>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <? if ($dealer_id != '-'): ?>
                                <div class="dealer-sticker--number">
                                    <?=GetMessage("ARLIGHT_ARSTORE_SERTIFICIROVANNYY")?><br><?=GetMessage("ARLIGHT_ARSTORE_INTERNET_MAGAZIN")?><?= $dealer_id ?>
                                </div>
                            <? endif; ?>
                            <div class="dealer-sticker--status">
                                <?= $dealer_status ?></div>
                            <div class="dealer-sticker--img2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 41.44 22">
                                    <defs>
                                        <style>.cls-1 {
                                                fill: #43525a;
                                            }

                                            .cls-2 {
                                                fill: #ff0019;
                                            }</style>
                                    </defs>
                                    <g id="<?=GetMessage("ARLIGHT_ARSTORE_SLOY4")?>">
                                        <g id="<?=GetMessage("ARLIGHT_ARSTORE_SLOY5")?>">
                                            <polygon class="cls-1"
                                                     points="24.62 22 18.46 22 12.31 22 6.15 22 0 22 3.08 17.6 6.15 13.2 9.23 8.8 12.31 4.4 15.39 0 18.46 4.4 21.54 8.8 24.62 13.2 27.69 17.6 30.77 22 24.62 22"/>
                                            <polygon class="cls-2"
                                                     points="32.12 17.59 41.45 4.25 22.79 4.25 32.12 17.59"/>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <? endif; ?>
    <? endif; ?>
    <div class="banner-slider">
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

            $type4 = false;
            if ($arItem["PROPERTIES"]['SLIDE_TEMPLATE']['VALUE_XML_ID'] == 'type_4')
                $type4 = true;
            $previewPict = $arItem["PREVIEW_PICTURE"];
            $prop=$arItem['PROPERTIES'];
            ?>

            <div id="<?= $this->GetEditAreaId($arItem['ID']); ?>"
                 class="slide <?= $arItem["PROPERTIES"]['SLIDE_TEMPLATE']['VALUE_XML_ID'] ?>">
                <div class="slide__img">
                    <? if ($type4): ?>
                    <a href="<?= $arItem["PROPERTIES"]["LINK_2"]["VALUE"] ?>">
                        <? endif; ?>
                        <? if ($previewPict): ?>
                            <?
                            $picMobVId = ($type4 && $prop["PIC_MOBILE_VERTICAL"]["VALUE"]) ? ALResize($prop["PIC_MOBILE_VERTICAL"]["VALUE"], 768) : ALResize($previewPict, 768);
                            $picMobHId = ($type4 && $prop["PIC_MOBILE_HORIZONTAL"]["VALUE"]) ? $prop["PIC_MOBILE_HORIZONTAL"]["VALUE"] : ALResize($previewPict, 768);
                            $picTabVId = ($type4 && $prop["PIC_TABLET_VERTICAL"]["VALUE"]) ? ALResize($prop["PIC_TABLET_VERTICAL"]["VALUE"], 990) : ALResize($previewPict, 990);
                            $picTabHId = ($type4 && $prop["PIC_TABLET_HORIZONTAL"]["VALUE"]) ? ALResize($prop["PIC_TABLET_HORIZONTAL"]["VALUE"], 1200) : ALResize($previewPict, 1200);
                            $picLapHId = ($type4 && $prop["PIC_LAPTOP"]["VALUE"]) ? ALResize($prop["PIC_LAPTOP"]["VALUE"], 1630) : ALResize($previewPict, 1630);
                            ?>
                            <picture
                                    data-srcset="<?= $picMobVId ?>, <?= $picTabVId; ?>, <?= $picTabHId; ?>, <?= $picLapHId; ?>, <? ALResizeH($previewPict, 1920, 756); ?>"
                                    data-src="<? ALResizeH($previewPict, 1920, 756); ?>">
                                <source srcset="/" media="(max-width: 768px)">
                                <source srcset="/" media="(max-width: 990px)">
                                <source srcset="/" media="(max-width: 1200px)">
                                <source srcset="/" media="(max-width: 1630px)">
                                <source srcset="/">
                                <img src="/" alt="<?= $arItem['NAME']; ?>">
                            </picture>
                            <? if (false): ?>
                                <img src="<?= ALResize($previewPict, 1920); ?>" alt="<?= $arItem['NAME']; ?>">
                            <? endif; ?>
                        <? endif; ?>

                        <? if ($type4): ?>
                            </a>
                        <? endif; ?>
                </div>
                <div class="container">
                    <div class="slide__block">
                        <? if ($arItem["DISPLAY_ACTIVE_FROM"] && $arItem["PROPERTIES"]["LINK"]["VALUE"]): ?>
                            <div class="slide__datas">
                                <? $val = $arItem["PROPERTIES"]["LINK"]["VALUE"];
                                if ($arItem["DISPLAY_PROPERTIES"]["LINK"]["LINK_ELEMENT_VALUE"][$val]['IBLOCK_ID'] != '') {
                                    $res = CIBlock::GetByID($arItem["DISPLAY_PROPERTIES"]["LINK"]["LINK_ELEMENT_VALUE"][$val]['IBLOCK_ID']);
                                    if ($ar_res = $res->GetNext())
                                        $section = $ar_res['NAME'];
                                }
                                if (!isset($section)) $section = GetMessage("ARLIGHT_ARSTORE_NOVOSTI");
                                ?>
                                <span class="slide__directory"><?= $section ?></span>
                                <span class="slide__date"><?= $arItem["DISPLAY_ACTIVE_FROM"] ?></span>
                            </div>
                        <? endif; ?>
                        <div class="slide__title">
                            <div class="slide__title-text">
                                <? if ($arItem["PROPERTIES"]["LINK"]["VALUE"] && $arItem["DISPLAY_PROPERTIES"]["LINK"]["LINK_ELEMENT_VALUE"][$val]['DETAIL_PAGE_URL'] != ''): ?>
                                    <a class="slide__link"
                                       href="<?= $arItem["DISPLAY_PROPERTIES"]["LINK"]["LINK_ELEMENT_VALUE"][$val]['DETAIL_PAGE_URL'] ?>"><? echo str_replace('3 ', '3&nbsp;', $arItem["NAME"]) ?></a>
                                <? elseif ($arItem["PROPERTIES"]["LINK_2"]["VALUE"] && $arItem["PROPERTIES"]["LINK_2"]["VALUE"] != ''): ?>
                                    <a class="slide__link"
                                       href="<?= $arItem["PROPERTIES"]["LINK_2"]["VALUE"] ?>"
                                       target="_blank"><? echo $arItem["NAME"] ?></a>
                                <? else: ?>
                                    <span class="slide__span"><? echo $arItem["NAME"] ?></span>
                                <? endif; ?>
                            </div>
                        </div>
                        <div class="slide__description">
                            <p>
                                <? echo $arItem["DETAIL_TEXT"] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <? endforeach; ?>
    </div>
</div>