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

<?
$arParamsTr = array("replace_space" => "-", "replace_other" => "-");
?>

<div class="contacts delivery-page">
    <div class="contacts__block" itemscope itemtype="http://schema.org/Organization">
        <? foreach ($arResult["ITEMS"] as $key=>$arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            $city = trim($arItem['PROPERTIES']['ADDRESS_CITY']['VALUE']);
            ?>
            <div class="contacts__item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>" >
                <div class="contacts__item-info">
                    <div class="contacts__item-block">
                        <a href="#" class="contacts__text-big" itemprop="name"
                           data-coords="<?= $arItem['PROPERTIES']['COORD']['VALUE'] ?>"><?=$key+1?>. <? echo $arItem["NAME"] ?></a>
                    </div>
                    <br>
                    <div class="contacts__item-block contacts__item-block--row">
                        <div class="contacts__item-col contacts__item-col--address">
<!--                            <div class="contacts__item-title"><?=GetMessage("ARLIGHT_ARSTORE_ADRES")?></div>-->
                            <div class="contacts__item-content" itemprop="address" itemscope
                                 itemtype="http://schema.org/PostalAddress">
                                <span itemprop="addressLocality"><?=GetMessage("ARLIGHT_ARSTORE_G")?><?= $arItem['PROPERTIES']['ADDRESS_CITY']['VALUE'] ?></span>,
                                <span itemprop="streetAddress"><?= $arItem['PROPERTIES']['ADDRESS']['VALUE'] ?></span>
                            </div>
                        </div>
                        <div class="contacts__item-col">
<!--                            <div class="contacts__item-title"><?=GetMessage("ARLIGHT_ARSTORE_TELEFON")?></div>-->
                            <div class="contacts__item-content">
                                <?
                                $value = array_shift($arItem['PROPERTIES']['PHONE']['VALUE']);
                                $val = GetArrayOrString($value);
                                if (is_array($val)) {
                                    ?>
                                    <? foreach ($val as $value): ?>
                                        <p>
                                            <a
                                                    href="tel:+<?= preg_replace('/[^0-9]/', '', strip_tags($value)) ?>"
                                                    itemprop="telephone"><?= $value ?></a>
                                        </p>
                                    <? endforeach; ?>
                                    <?
                                } else {
                                    ?>
                                    <p><a href="tel:+<?= preg_replace('/[^0-9]/', '', strip_tags($value)) ?>"
                                          itemprop="telephone"><?= $val ?></a></p>
                                    <?
                                }
                                ?>

                            </div>
                        </div>
                        <div class="contacts__item-col">
                            <? if ($arItem['PROPERTIES']['EMAIL']['VALUE']): ?>
<!--                                <div class="contacts__item-title">Email</div>-->
                                <div class="contacts__item-content">
                                    <?
                                    $value = array_shift($arItem['PROPERTIES']['EMAIL']['VALUE']);
                                    $val = GetArrayOrString($value);
                                    if (is_array($val)) {
                                        ?>
                                        <? foreach ($val as $value): ?>
                                            <p><a href="mailto:<?= $value ?>" itemprop="email"><?= $value ?></a></p>
                                        <? endforeach; ?>
                                        <?
                                    } else {
                                        ?>
                                        <p><a href="mailto:<?= $value ?>" itemprop="email"><?= $val ?></a></p>
                                        <?
                                    }
                                    ?>
                                </div>
                            <? endif; ?>
                        </div>
                    </div>
                    <div class="contacts__item-block contacts__item-time">
                        <?=GetMessage("ARLIGHT_ARSTORE_VREMA_RABOTY")?><br>
                        <?
                        //строку графика работы в массив
                        $shopTimeArr = explode(';', $arItem['PROPERTIES']['SCHEDULE']['VALUE']);
                        ?>
                        <? foreach ($shopTimeArr as $shopTimeItem): ?>
                            <? if ($shopTimeItem): ?>
                                <div class="contacts__item-time--item">
                                    <? $timeAr = explode('&', $shopTimeItem) ?>
                                    <span><?= $timeAr[0] ?></span>
                                    <span><?= $timeAr[1] ?></span>
                                </div>
                            <? endif; ?>
                        <? endforeach; ?>
                    </div>
                </div>
            </div>
        <? endforeach; ?>
    </div>
</div>
