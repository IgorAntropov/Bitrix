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
global $simpleSale;
$simpleSaleProduct = false;
global $simpleNew;
$simpleNew = (file_exists($_SERVER['DOCUMENT_ROOT'] . SITE_DIR . 'assets/json/new_now_articles.json')) ? json_decode(json_encode(json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . SITE_DIR . 'assets/json/new_now_articles.json'))), true) : false;
$simpleNewProduct = false;
$groups = [];
$arPropAll = [];
if (count($arResult["ITEMS"]) > 0):
    foreach ($arResult["ITEMS"] as $key => $arItem):
        $category = GetIBlockSectionId(false, $arItem['IBLOCK_SECTION_ID']);
        if ((int)$category) {
            if (!isset($groups[$category])) $groups[$category] = [];
            $groups[$category][] = $arItem;
        }
        ?>
    <? endforeach; ?>
<? endif; ?>
<script>var compareFunc;</script>
<div class="compare__result">
    <ul class="compare__section">
        <?if (count($groups)>1):?>
        <?
        $number = 0;
        foreach ($groups as $key => $arSectionID):
            $number++;
            $res = CIBlockSection::GetByID($key);
            if ($ar_res = $res->GetNext()):?>
                <li><a href="" class="button button_transparent <?= ($number == 1 ? 'active_el' : ''); ?>"
                       data-item="<?= $number ?>"><?= $ar_res['NAME'] ?></a></li>
            <? endif; ?>
        <? endforeach; ?>
        <?endif;?>
    </ul>
    <div>
        <a class="compare__result-del" href="#" data-id="all" data-slug="ADD_TO_COMPARE">
            <i><?=GetMessage("ARLIGHT_ARSTORE_OCISTITQ")?></i>
            <span class="compare__result-del--count"
                    data-slug="COMPARE_COUNT"> <?= count($arResult["ITEMS"]); ?></span></a>
        <div class="compare__result-txt">
            <span data-slug="COMPARE_COUNT"><?= $arResult['NAV_RESULT']->NavRecordCount ?></span>
            <span data-slug="COMPARE_COUNT_LABEL">
            <?= PluralRules(count($arResult['ITEMS']), array(
                GetMessage("ARLIGHT_ARSTORE_TOVAR"),
                GetMessage("ARLIGHT_ARSTORE_TOVARA"),
                GetMessage("ARLIGHT_ARSTORE_TOVAROV"),
            )) ?>
            </span>
        </div>
    </div>
</div>


<?
$number = 0;
foreach ($groups as $k => $arSectionIdAr):
    $number++;
    ?>
    <? foreach ($arSectionIdAr as $key2 => $arSectionId): ?>
    <? foreach ($arSectionId['DISPLAY_PROPERTIES'] as $pid => $arProp) {
        if ($arProp['VALUE'] != '' && $arProp['VALUE'] != false) {
            $arPropAll[$pid] = $arProp['NAME'];
        }
    } ?>
<? endforeach; ?>
    <div class="compare__table-wrap2" data-item="<?= $number ?>">
        <div class="compare__table-wrap compare__table-wrap-<?= $number ?>">
            <div class="compare__table compare__table-left">
                <div class="compare__head">
                    <div class="compare__row">
                        <div class="compare__td"><?=GetMessage("ARLIGHT_ARSTORE_PARAMETRY_TOVAROV")?></div>
                    </div>
                </div>
                <div class="compare__body">
                    <div class="compare__row">
                        <div class="compare__td"><?=GetMessage("ARLIGHT_ARSTORE_NAIMENOVANIE")?></div>
                    </div>
                    <? foreach ($arPropAll as $key => $arProperty): ?>
                        <div class="compare__row">
                            <div class="compare__td"><?= $arProperty ?></div>
                        </div>
                    <? endforeach; ?>
                </div>
            </div>
            <div class="compare__table compare__table-main scrollbar-outer">
                <div class="compare__head">
                    <div class="compare__row">
                        <? foreach ($arSectionIdAr as $arElement): ?>
                            <?
                            $article = $arElement['PROPERTIES']['ARTICLE']['VALUE'];
                            if ($simpleSale && isset($simpleSale[$article])) $simpleSaleProduct = true;
                            if ($simpleNew && isset($simpleNew[$article])) $simpleNewProduct = true;
                            ?>
                            <div data-id="<?= $arElement["ID"] ?>" data-slug="COMPARE_TD"
                                 class="compare__td compare__td-img">
                                <div class="compare__img">
                                    <? if ($simpleSaleProduct || $simpleNewProduct): ?>
                                        <div class="sale-sticker">
                                            <? if ($simpleSaleProduct): ?>
                                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/sale-sticker.svg?v=1" alt="SALE">
                                            <? endif; ?>
                                            <? if ($simpleNewProduct): ?>
                                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/new-sticker.svg" alt="NEW">
                                            <? endif; ?>
                                        </div>
                                    <? endif; ?>
                                    <? if (is_array($arElement["PREVIEW_PICTURE"])): ?>
                                        <a href="<?= $arElement["DETAIL_PAGE_URL"] ?>">
                                            <img
                                                src="<? ALResizeH($arElement["PREVIEW_PICTURE"]["ID"], 250, 250) ?>"
                                                alt="<?= $arElement["PREVIEW_PICTURE"]["ALT"] ?>"
                                                title="<?= $arElement["PREVIEW_PICTURE"]["TITLE"] ?>"
                                            />
                                        </a>
                                    <? elseif (is_array($arElement["DETAIL_PICTURE"])): ?>
                                        <a href="<?= $arElement["DETAIL_PAGE_URL"] ?>">
                                            <img
                                                src="<? ALResizeH($arElement["DETAIL_PICTURE"]["ID"], 250, 250)?>"
                                                alt="<?= $arElement["DETAIL_PICTURE"]["ALT"] ?>"
                                                title="<?= $arElement["DETAIL_PICTURE"]["TITLE"] ?>"
                                            />
                                        </a>
                                    <? else: ?>
                                        <a href="<?= $arElement["DETAIL_PAGE_URL"] ?>">
                                            <img
                                                src="<?= SITE_TEMPLATE_PATH ?>/img/not_img.png"
                                                alt="<?= $arElement["NAME"]?>"
                                                class="full-width">
                                        </a>
                                    <? endif ?>
                                </div>
                                <? if ($arElement['PROPERTIES']['OBSOLETE']['VALUE'] !== '-1'): ?>
                                    <form class="buy-block" data-type="cart" data-slug="BUY_BLOCK">
                                        <div class="item__buy-block-accept" data-slug="ACCEPT_BUY">
                                            <img src="<?= SITE_TEMPLATE_PATH ?>/img/accept-desktop.svg" alt="">
                                        </div>

                                        <? if (BLOCKING != 'true'): ?>
                                            <div class="buy-block__wrap">
                                                <div class="buy-block__items">
                                                    <button class="buy-block__button">-</button>
                                                    <input type="text" class="buy-block__input" name="quantity"
                                                           value="0"
                                                           maxlength="18"
                                                           data-type="input" data-price=""
                                                           data-packnorm="<? if ($arElement['PROPERTIES']['PACKNORM']['VALUE']): ?><?= $arElement['PROPERTIES']['PACKNORM']['VALUE'] ?><? else: ?>1<? endif; ?>"
                                                           data-slug="QUANTITY"
                                                           autocomplete="off"
                                                    >
                                                    <button class="buy-block__button">+</button>
                                                </div>
                                                <div class="buy-block__item-packnorm">
                                                    <? if ($arElement['PROPERTIES']['PACK']['VALUE'] && $arElement['PROPERTIES']['PACKNORM']['VALUE']): ?>
                                                        <? $pack = $arElement['PROPERTIES']['PACK']['VALUE'];
                                                        echo($pack === '-' ? GetMessage("ARLIGHT_ARSTORE_ED_IZM") : $pack)
                                                        ?>
                                                        : <?= $arElement['PROPERTIES']['PACKNORM']['VALUE'] ?> <?= $arElement['PROPERTIES']['UNIT']['VALUE'] ?>
                                                    <? endif; ?>
                                                </div>
                                            </div>
                                        <? endif; ?>
                                        <div class="buy-block__button-wrap">
                                            <? //Для активной кнопки скриптом добавится класс in_cart, который может использоваться для подсветки активного элемента?>
                                            <a class="buy-block__button buy-block__button--favorite" href="javascript:void(0);" data-id="<?= $arElement['ID'] ?>"
                                               data-slug="ADD_TO_FAVORITE" title="<?=GetMessage("ARLIGHT_ARSTORE_IZBRANNOE")?>">
                                                <i class="icon-ar_head_fav"></i>
                                            </a>
                                            <? if (BLOCKING != 'true'): ?>
                                                <a class="buy-block__button buy-block__button--favorite"
                                                   data-empty="<?=GetMessage("ARLIGHT_ARSTORE_V_KORZINU")?>"
                                                   data-sendorder="<?=GetMessage("ARLIGHT_ARSTORE_OFORMITQ")?>"
                                                   href="javascript:void(0);"
                                                   data-id="<?= $arElement['ID'] ?>"
                                                   data-url="<?= $arElement['DETAIL_PAGE_URL'] ?>"
                                                   data-slug="ADD_TO_CART"
                                                >
                                                    <i class="icon-cart-empty"></i>
                                                </a>
                                            <? endif; ?>
                                            <? //Для активной кнопки - in_cart?>
                                            <a class="buy-block__button buy-block__button--compare" href="javascript:void(0);" data-id="<?= $arElement['ID'] ?>"
                                               data-slug="ADD_TO_COMPARE" title="<?=GetMessage("ARLIGHT_ARSTORE_UDALITQ_IZ_SRAVNENIA")?>">
                                                <i class="icon-cart-cross"></i>
                                            </a>
                                        </div>
                                    </form>
                                <? endif; ?>
                            </div>
                        <? endforeach; ?>
                    </div>
                </div>
                <div class="compare__body">
                    <div class="compare__row">
                        <? foreach ($arSectionIdAr as $arElement): ?>
                            <div data-id="<?= $arElement["ID"] ?>" data-slug="COMPARE_TD"
                                 class="compare__td compare__td-title">
                                <a href="<?= $arElement["DETAIL_PAGE_URL"] ?>"><?= $arElement["NAME"] ?></a>
                            </div>
                        <? endforeach; ?>
                    </div>
                    <? if (count($arSectionIdAr) > 0):
                        foreach ($arPropAll as $key => $arProperty):?>
                            <div class="compare__row">
                                <?
                                foreach ($arSectionIdAr as $arElement):?>
                                    <div data-id="<?= $arElement["ID"] ?>" data-slug="COMPARE_TD" class="compare__td">
                                        <div class="compare__td-border">
                                            <? if ($key === 'COLOR_HREF') {
                                                $COLOR = $arElement["DISPLAY_PROPERTIES"][$key]["DISPLAY_VALUE"]; ?>
                                                <? if ($COLOR): ?>
                                                    <div class="color color--radial color--indent-left"
                                                         style="background:<? ALColor($COLOR) ?>" title=""></div>
                                                <? endif; ?>
                                                <?
                                            } else { ?>
                                                <? $prop = $arElement["DISPLAY_PROPERTIES"][$key]["DISPLAY_VALUE"];
                                                if (is_array($prop))
                                                    echo implode("&nbsp;/&nbsp;", $prop);
                                                elseif ($prop === false || $prop === '')
                                                    echo "&nbsp;";
                                                else
                                                    echo $prop; ?>
                                            <? } ?>
                                        </div>
                                    </div>
                                <? endforeach; ?>
                            </div>
                        <?endforeach;
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
<? endforeach; ?>




