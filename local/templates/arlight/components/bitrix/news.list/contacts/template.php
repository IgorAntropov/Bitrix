<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

$arParamsTr = array("replace_space" => "-", "replace_other" => "-");

$arCity = [];
foreach ($arResult["ITEMS"] as $arItem) {
    $arCity[] = trim($arItem['PROPERTIES']['ADDRESS_CITY']['VALUE']);
}
$arCity = array_unique($arCity);
?>

<?php if (count($arCity) > 1): ?>
    <ul class="info__menu-list info__menu-list--contact">
        <li><a href="" data-href="all" class="active_el"><?= GetMessage("ARLIGHT_ARSTORE_VSE") ?></a></li>
        <?php foreach ($arCity as $city): ?>
            <li><a href="" data-href="<?= $trans = Cutil::translit($city, "ru", $arParamsTr); ?>"><?= $city ?></a></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<div class="contacts">
    <div class="contacts__block" itemscope itemtype="http://schema.org/Organization">
        <?php foreach ((array)$arResult["ITEMS"] as $arItem): ?>
            <?php
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            $city = trim($arItem['PROPERTIES']['ADDRESS_CITY']['VALUE']);
            //разберем дополнительные свойства
            $propValueStr = $arItem['PROPERTIES']['PROPERTY']['~VALUE'];
            $propValueAr = json_decode($propValueStr, true);

            $videoAr = $arItem['PROPERTIES']['VIDEO']['VALUE'];
            $slider = false;
            if ((count((array)$arItem['IMAGES']) + count((array)$videoAr)) > 2) $slider = true;
            ?>
            <div class="contacts__item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>"
                 data-href="<?= $trans = Cutil::translit($city, "ru", $arParamsTr); ?>">
                <div class="contacts__item-image">
                    <?php if (count((array)$arItem['IMAGES']) > 0 || (is_array($videoAr) && !empty($videoAr))): ?>
                        <?php if ($slider): ?><div class="contacts__item-image--slider"><?php endif; ?>
                        <?php foreach ($arItem['IMAGES'] as $img): ?>
                            <a href="<?= $img['BIG'] ?>" data-fancybox="store-<?= $arItem['ID'] ?>">
                                <img src="<?= $img['SMALL'] ?>" alt="<?php echo $arItem["NAME"] ?>">
                            </a>
                        <?php endforeach; ?>
                        <?php foreach ((array)$videoAr as $videoId): ?>
                            <? if ($videoId != ''): ?>
                                <a data-fancybox="store-<?= $arItem['ID'] ?>"
                                   href="https://www.youtube.com/watch?v=<?= $videoId; ?>">
                                    <img src="https://img.youtube.com/vi/<?= $videoId; ?>/sddefault.jpg">
                                </a>
                            <? endif; ?>
                        <?php endforeach; ?>
                        <?php if ($slider): ?></div><?php endif; ?>
                    <?php else: ?>
                        <img src="<?= SITE_TEMPLATE_PATH ?>/img/default-img.jpg" alt="<?php echo $arItem["NAME"] ?>">
                    <?php endif; ?>
                    <?php if ($arItem["DETAIL_PICTURE"]): ?>
                        <a href="<?= $arItem["DETAIL_PICTURE"]["SRC"] ?>" data-fancybox="" data-test
                           data-caption="<?= GetMessage("ARLIGHT_ARSTORE_SHEMA_PROEZDA_K") ?><?php echo $arItem["NAME"] ?>"
                           class="contacts__item-image-link"><?= GetMessage("ARLIGHT_ARSTORE_SHEMA_PROEZDA") ?></a>
                    <?php endif; ?>
                </div>
                <div class="contacts__item-info">
                    <?php $showType = false;
                    foreach ((array)$propValueAr['type'] as $typeItem) {
                        if ($typeItem == 'Y')
                            $showType = true;
                    } ?>
                    <?php if ($showType): ?>
                        <div class="contacts__item-block contacts__item-type">
                            <ul>
                                <?php if ($propValueAr['type']['office'] == 'Y'): ?>
                                    <li><?= GetMessage("ARLIGHT_ARSTORE_OFIS_PRODAJ") ?></li>
                                <?php endif; ?>
                                <?php if ($propValueAr['type']['retail'] == 'Y'): ?>
                                    <li><?= GetMessage("ARLIGHT_ARSTORE_ROZNICNYY_MAGAZIN") ?></li>
                                <?php endif; ?>
                                <?php if ($propValueAr['type']['showroom'] == 'Y'): ?>
                                    <li><?= GetMessage("ARLIGHT_ARSTORE_SOU_RUM") ?></li>
                                <?php endif; ?>
                                <?php if ($propValueAr['type']['brandshowroom'] == 'Y'): ?>
                                    <li><?= GetMessage("ARLIGHT_ARSTORE_FIRMENNYY_SOU_RUM") ?></li>
                                <?php endif; ?>
                                <?php if ($propValueAr['type']['designstudio'] == 'Y'): ?>
                                    <li><?= GetMessage("ARLIGHT_ARSTORE_DIZAYN_STUDIA") ?></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="contacts__item-block contacts__item-all">
                        <div>
                            <?php if ($propValueAr['show-name'] === "Y"): ?>
                                <p><?= $arItem['NAME'] ?></p>
                            <?php endif; ?>
                            <?php if ($propValueAr['metro']): ?>
                                <div class="contacts__item-metro"><?= GetMessage("ARLIGHT_ARSTORE_M") ?><?= $propValueAr['metro'] ?></div>
                            <?php endif; ?>
                            <div class="contacts__item-address" itemprop="address" itemscope
                                 itemtype="http://schema.org/PostalAddress">
                                <span itemprop="addressLocality"><?= GetMessage("ARLIGHT_ARSTORE_G") ?><?= $arItem['PROPERTIES']['ADDRESS_CITY']['VALUE'] ?></span>,
                                <span itemprop="streetAddress"><?= $arItem['PROPERTIES']['ADDRESS']['VALUE'] ?></span>
                                <?php if ($propValueAr['mall']): ?>
                                    <br>
                                    <span><?= $propValueAr['mall'] ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="contacts__item-phone">
                                <?php
                                $phoneValues = (array)$arItem['PROPERTIES']['PHONE']['VALUE'];
                                $value = array_shift($phoneValues);
                                $val = GetArrayOrString($value);
                                if (is_array($val)) {
                                    ?>
                                    <?php foreach ((array)$val as $value): ?>
                                        <a href="tel:+<?= preg_replace('/[^0-9]/', '', strip_tags($value)) ?>"
                                           itemprop="telephone"><?= $value ?></a>
                                    <?php endforeach; ?>
                                    <?php
                                } else {
                                    ?>
                                    <a href="tel:+<?= preg_replace('/[^0-9]/', '', strip_tags($value)) ?>"
                                       itemprop="telephone"><?= $val ?></a>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="contacts__item-email">
                                <?php
                                $emailValues = (array)$arItem['PROPERTIES']['EMAIL']['VALUE'];
                                $value = array_shift($emailValues);
                                $val = GetArrayOrString($value);
                                if (is_array($val)) {
                                    ?>
                                    <?php foreach ((array)$val as $value): ?>
                                        <a href="mailto:<?= $value ?>" itemprop="email"><?= $value ?></a>
                                    <?php endforeach; ?>
                                    <?php
                                } else {
                                    ?>
                                    <a href="mailto:<?= $value ?>" itemprop="email"><?= $val ?></a>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php if ($arItem['PROPERTIES']['SCHEDULE']['VALUE']): ?>
                            <div class="contacts__item-time">
                                <div class="contacts__item-time--title"><?= GetMessage("ARLIGHT_ARSTORE_VREMA_RABOTY") ?></div>
                                <?php
                                //строку графика работы в массив
                                $shopTimeArr = explode(';', $arItem['PROPERTIES']['SCHEDULE']['VALUE']);
                                ?>
                                <?php foreach ((array)$shopTimeArr as $shopTimeItem): ?>
                                    <?php if ($shopTimeItem): ?>
                                        <div class="contacts__item-time--item">
                                            <?php $timeAr = explode('&', $shopTimeItem) ?>
                                            <span><?= $timeAr[0] ?></span>
                                            <span><?= $timeAr[1] ?></span>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="contacts__item-additional">
                        <ul>
                            <?php if ($propValueAr['delivery']): ?>
                                <li>
                                    <div class="icon">
                                        <span class="icon-set_del"></span>
                                    </div>
                                    <div><?= $propValueAr['delivery'] ?></div>
                                </li>
                            <?php endif; ?>
                            <?php if ($propValueAr['pay']['cash']['cash'] == 'Y' || $propValueAr['pay']['cash']['req'] == 'Y'): ?>
                                <li>
                                    <div class="icon">
                                        <span class="icon-set_pay"></span>
                                    </div>
                                    <div>
                                        <?php if ($propValueAr['pay']['cash']['cash'] == 'Y'): ?>
                                            <span><?= GetMessage("ARLIGHT_ARSTORE_NALICNYE") ?></span>
                                        <?php endif; ?>
                                        <?php if ($propValueAr['pay']['cash']['req'] == 'Y'): ?>
                                            <span><?= GetMessage("ARLIGHT_ARSTORE_PO_REKVIZITAM") ?></span>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endif; ?>
                            <?php if ($propValueAr['pay']['card']['online'] == 'Y' || $propValueAr['pay']['card']['shop'] == 'Y'): ?>
                                <li>
                                    <div class="icon">
                                        <span class="icon-set_pay_card"></span>
                                    </div>
                                    <div>
                                        <?php if ($propValueAr['pay']['card']['online'] == 'Y'): ?>
                                            <span><?= GetMessage("ARLIGHT_ARSTORE_KARTOY_ONLAYN") ?></span>
                                        <?php endif; ?>
                                        <?php if ($propValueAr['pay']['card']['shop'] == 'Y'): ?>
                                            <span><?= GetMessage("ARLIGHT_ARSTORE_KARTOY_V_MAGAZINE") ?></span>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endif; ?>

                            <?php if ($propValueAr['individual']['jur'] == 'Y' || $propValueAr['individual']['phis'] == 'Y'): ?>
                                <li>
                                    <div class="icon">
                                        <span class="icon-set_user"></span>
                                    </div>
                                    <div>
                                        <?php if ($propValueAr['individual']['jur'] == 'Y' && $propValueAr['individual']['phis'] == 'Y'): ?>
                                            <span><?= GetMessage("ARLIGHT_ARSTORE_URIDICESKIM") ?></span>
                                            <span><?= GetMessage("ARLIGHT_ARSTORE_CASTNYM_LICAM") ?></span>
                                        <?php else: ?>
                                            <?php if ($propValueAr['individual']['jur'] == 'Y'): ?>
                                                <span><?= GetMessage("ARLIGHT_ARSTORE_URIDICESKIM_LICAM") ?></span>
                                            <?php endif; ?>
                                            <?php if ($propValueAr['individual']['phis'] == 'Y'): ?>
                                                <span><?= GetMessage("ARLIGHT_ARSTORE_CASTNYM_LICAM1") ?></span>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                    </div>
                                </li>
                            <?php endif; ?>


                            <?php if ($propValueAr['equip']['calc'] == 'Y' || $propValueAr['equip']['mounting'] == 'Y'): ?>
                                <li>
                                    <div class="icon">
                                        <span class="icon-set_serv"></span>
                                    </div>
                                    <div>
                                        <?php if ($propValueAr['equip']['calc'] == 'Y'): ?>
                                            <span><?= GetMessage("ARLIGHT_ARSTORE_RASCET_OBORUDOVANIA") ?></span>
                                        <?php endif; ?>
                                        <?php if ($propValueAr['equip']['mounting'] == 'Y'): ?>
                                            <span><?= GetMessage("ARLIGHT_ARSTORE_MONTAJ_OBORUDOVANIA") ?></span>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endif; ?>
                            <?php if ($propValueAr['spec']['arl'] == 'Y'): ?>
                                <li>
                                    <div class="icon">
                                        <span class="icon-set_serv_arl"></span>
                                    </div>
                                    <div>
                                        <?= GetMessage("ARLIGHT_ARSTORE_SPECIALISTY_PO_OBORU") ?></div>
                                </li>
                            <?php endif; ?>

                            <?php if ($propValueAr['spec']['knx'] == 'Y'): ?>
                                <li>
                                    <div class="icon">
                                        <span class="icon-set_serv_knx"></span>
                                    </div>
                                    <div>
                                        <?= GetMessage("ARLIGHT_ARSTORE_SPECIALISTY") ?></div>
                                </li>
                            <?php endif; ?>
                            <?php if ($propValueAr['spec']['dali'] == 'Y'): ?>
                                <li>
                                    <div class="icon">
                                        <span class="icon-set_serv_dali"></span>
                                    </div>
                                    <div>
                                        <?= GetMessage("ARLIGHT_ARSTORE_SPECIALISTY1") ?></div>
                                </li>
                            <?php endif; ?>
                            <?php if ($propValueAr['spec']['room'] == 'Y'): ?>
                                <li>
                                    <div class="icon">
                                                            <span class="icon-set_sroom"><span
                                                                        class="path1"></span><span class="path2"></span><span
                                                                        class="path3"></span><span class="path4"></span><span
                                                                        class="path5"></span><span class="path6"></span><span
                                                                        class="path7"></span><span class="path8"></span><span
                                                                        class="path9"></span><span
                                                                        class="path10"></span></span>
                                    </div>
                                    <div>
                                        <?= GetMessage("ARLIGHT_ARSTORE_SOU_RUM1") ?></div>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="contacts__item-btn">
                        <a href="#"
                           class="button button_transparent-red"
                           data-serv="TO_MAP"
                           data-coords="<?= $arItem['PROPERTIES']['COORD']['VALUE'] ?>"><?= GetMessage("ARLIGHT_ARSTORE_POKAZATQ_NA_KARTE") ?></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
