<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle(GetMessage("ARLIGHT_ARSTORE_RASCET_SVETILQNIKA"));
global $USER;
if (!BELARUS && !KAZAKHSTAN){
?>


<div class="container container-catalog lamp-page">

    <?
    $customProdData = [];
    $pathToFSON = $_SERVER["DOCUMENT_ROOT"]. SITE_DIR.'assets/json/customProductsInfo.json';
    if(file_exists($pathToFSON)) $customProdData = json_decode(json_encode(json_decode(file_get_contents($pathToFSON))), true);
    if(isset($customProdData['products']) && count($customProdData['products']) && isset($_GET['article']) && isset($customProdData['products'][trim($_GET['article'])])):

        $currentProduct = $customProdData['products'][trim($_GET['article'])];
        $images = [];
        $images[] = $currentProduct['image'];
        if(isset($currentProduct['images']) && count($currentProduct['images'])){
            foreach ($currentProduct['images'] as $moreImage){
                $images[] = $moreImage;
            }
        }
        $article = htmlspecialcharsbx(trim($_GET['article']));
        $pricesFrom = [];
        $pathToPrices = $_SERVER["DOCUMENT_ROOT"]. SITE_DIR.'assets/json/customProductsPricesFrom.json';
        if(file_exists($pathToPrices)) $pricesFrom = json_decode(json_encode(json_decode(file_get_contents($pathToPrices))), true);

        $editPage = false;
        $editData = [];
        $orderID = false;
        if(isset($_GET['order']) && $_GET['order'] !== ''){
            $orderID = htmlspecialcharsbx($_GET['order']);
            $userID = GetUserID();
            if($userID && $userID !== ''){
                $storeDir = $_SERVER["DOCUMENT_ROOT"] .  '/upload/custom-lamps-orders';
                $userFileName = $storeDir.'/'.$userID.'.json';
                if(file_exists($userFileName)){
                    $dataProduct = json_decode(json_encode(json_decode(file_get_contents($userFileName))), true);
                    if(isset($dataProduct[$orderID])){
                        $editData = $dataProduct[$orderID];
                        $editPage = true;
                    }
                }
            }
        }
    ?>
        <div class="lamp-card">
            <div class="lamp-page-title"><?=GetMessage("ARLIGHT_ARSTORE_SAG_RASCET_SVETI")?></div>

            <div class="title title-page title-page--lamp">
                <div class="title__text">
                    <h1 itemprop="name"><?= $currentProduct['name']; ?></h1>
                </div>
                <div class="title__backlink">
                    <i class="icon-arrow-left"></i>
                    <a href=""><?=GetMessage("ARLIGHT_ARSTORE_VERNUTQSA")?></a>
                </div>
            </div>
            <div class="lamp-card__picture">
                <div class="product__sliders">
                    <div class="card__slider">
                        <div class="card__slider-for">
                            <? foreach ($images as $currImg): ?>
                            <div class="slide">
                                <div>
                                    <img src="<?= $currImg; ?>"
                                         alt="<?= $currentProduct['name']; ?>">
                                </div>
                            </div>
                            <? endforeach; ?>
                        </div>
                        <div class="card__slider-nav">
                            <? foreach ($images as $currImg): ?>
                            <div class="slide">
                                <img src="<?= $currImg; ?>"
                                     alt="<?= $currentProduct['name']; ?>">
                            </div>
                            <? endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lamp-card__content">
                <div class="card__article"><span><?= $article; ?></span><span><?=GetMessage("ARLIGHT_ARSTORE_ARTIKUL")?></span></div>
                <div class="card__description">
                    <?= $currentProduct['description']; ?>
                    <span><?= $currentProduct['comments']; ?></span>
                </div>
                <div class="lamp-card__price lamp-calc__result-summ">
                    <div class="lamp-calc__result-price">
                        <div class="card__price-now">
                            <? if(isset($pricesFrom[$article])):
                                $allPrice = $pricesFrom[$article];
                                $priceArr = explode('.', $allPrice);
                                $cents = false;
                                $priceHTML = number_format($priceArr[0], 0, '', ' ');
                                if(count($priceArr) == 2) {
                                    if(strlen((string)$priceArr[1]) == 1) $priceArr[1] = (string)$priceArr[1].'0';
                                    $priceHTML.= ' <sup>'.$priceArr[1].'</sup>';
                                }else{
                                    $priceHTML.= '<sup></sup>';
                                }
                                ?>
                                <span class="price"> <?= $priceHTML ?></span>
                                <span class="currency"><?= CURRENCY ?></span>
                            <? endif; ?>
                        </div>
                    </div>
                    <div class="lamp-calc__result-input">
                        <div class="product__add">
                            <div class="buy-block__wrap">
                                <div class="buy-block__items">
                                    <span class="buy-block__button lamp_page_qnt lamp_page_qnt_minus">-</span>
                                    <input type="text" class="buy-block__input lamp_page_qnt_input"
                                           value="<?= ($editPage && (int)$editData['quantity']) ? (int)$editData['quantity'] : 1 ?>"
                                           data-article="<?= $article; ?>"
                                           data-packnorm="1"
                                           autocomplete="off">
                                    <span class="buy-block__button lamp_page_qnt lamp_page_qnt_plus">+</span>
                                </div>
                            </div>
                            <? if($editPage): ?>
                                <div class="button product__add-btn lamp_page_add_button lamp_page_edit_button" data-id="<?= $orderID ?>">
                                    <?=GetMessage("ARLIGHT_ARSTORE_SOHRANITQ")?></div>
                            <? else: ?>
                                <div class="button product__add-btn lamp_page_add_button">
                                    <?=GetMessage("ARLIGHT_ARSTORE_DOBAVITQ")?></div>
                            <? endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lamp-calc">
            <div class="lamp-calc__title title"><?=GetMessage("ARLIGHT_ARSTORE_KALQKULATOR_DLA_INDI")?></div>
            <div class="lamp-calc__product"><?= $currentProduct['name']; ?></div>
            <script>
                var customPricesData = {};
            </script>
            <?
            //Построим селект для группы главный
            $prices = $currentProduct['prices'];
            $keys = array_keys($prices);
            $groupKey = $keys[0];
            $groupID = $customProdData['groupOptionsToSelects'][$groupKey];
            $groupName = $customProdData['groupSelectNames'][$groupID];
            $groupValues = [];
            foreach ($customProdData['groupSelectContainsOptions'][$groupID] as $grOp){
                $groupValues[$grOp] = $customProdData['groupOptionNames'][$grOp];
            }

            ?>
            <script>
                customPricesData[<?= $article ?>] = <?echo CUtil::PhpToJSObject($prices)?>;
            </script>
            <div class="lamp-calc__prop-list">
                <div class="lamp-calc__prop-item lamp_select_group lamp_result_select_length" data-id="<?= $groupID; ?>" data-name="<?= $groupName ?>" data-article="<?= $article ?>">
                    <div class="lamp-calc__prop-name"><?= $groupName ?>:</div>
                    <?
                    $cnt = 1;
                    foreach ($groupValues as $grKey=>$grVal):
                        $checked = '';
                        if($editPage && $editData['group_select']['value_id'] == $grKey) $checked = 'checked="checked"';
                        ?>
                        <div class="lamp-calc__prop-check">
                            <label>
                                <input <?= $checked ?> data-counter="<?= $cnt++; ?>" data-id="<?= $grKey ?>" data-name="<?= $grVal ?>" type="radio" name="radio_group_<?= $groupID; ?>">
                                <span><?= $grVal ?></span>
                            </label>
                        </div>
                    <? endforeach; ?>
                </div>
                <?
                //построим селекты
                $relations = [];
                foreach ($prices[$groupKey] as $optID=>$price){
                    $relations[$customProdData['optionsToSelects'][$optID]][] = $optID;
                }
                ?>
                <? foreach ($relations as $selID=>$optArr):
                    $nameLower = mb_strtolower($customProdData['selectNames'][$selID]);
                    $classForCounter = '';
                    if (stristr($nameLower, GetMessage("ARLIGHT_ARSTORE_LINEYNAA_MOSNOSTQ")) || stristr($nameLower, GetMessage("ARLIGHT_ARSTORE_MOSNOSTQ")) || stristr($nameLower, GetMessage("ARLIGHT_ARSTORE_MOSNOSTQ1")) || stristr($nameLower, GetMessage("ARLIGHT_ARSTORE_MOSNOSTQ2")) || stristr($nameLower, GetMessage("ARLIGHT_ARSTORE_MOSNOSTQ3")) || stristr($nameLower, GetMessage("ARLIGHT_ARSTORE_MOSNOSTQ4"))) $classForCounter = 'lamp_result_select_power';
                    ?>
                    <div class="lamp-calc__prop-item lamp_select_option <?= $classForCounter ?>" data-id="<?= $selID ?>" data-name="<?= $customProdData['selectNames'][$selID] ?>">
                        <div class="lamp-calc__prop-name"><?= $customProdData['selectNames'][$selID] ?>:</div>
                        <?
                        $cnt = 1;
                        foreach ($optArr as $optID):
                            $checked = '';
                            if($editPage && $editData['selects'][$selID]['value_id'] == $optID) $checked = 'checked="checked"';
                            ?>
                            <div class="lamp-calc__prop-check">
                                <label>
                                    <input <?= $checked ?> data-counter="<?= $cnt++; ?>" type="radio" data-id="<?= $optID ?>" data-price="<?= $prices[$groupKey][$optID] ?>" data-name="<?= $customProdData['optionNames'][$optID] ?>" name="radio_<?= $selID ?>">
                                    <span><?= $customProdData['optionNames'][$optID] ?></span>
                                </label>
                            </div>
                        <? endforeach; ?>
                    </div>
                <? endforeach; ?>



                <div class="lamp-calc__prop-item">
                    <div class="lamp-calc__prop-name"><?=GetMessage("ARLIGHT_ARSTORE_DOP_OPCII")?></div>
                    <div class="lamp-calc__prop-check">
                        <label>
                            <?
                            $checked = '';
                            if($editPage && $editData['add']['cri']) $checked = 'checked="checked"';
                            ?>
                            <input <?= $checked ?> type="checkbox" class="lamp_additional" data-key="lamp_add_cri">
                            <span>CRI 98</span>
                        </label>
                    </div>
                    <div class="lamp-calc__prop-check">
                        <label>
                            <?
                            $checked = '';
                            if($editPage && $editData['add']['control']) $checked = 'checked="checked"';
                            ?>
                            <input <?= $checked ?> type="checkbox" class="lamp_additional" data-key="lamp_add_control">
                            <span><?=GetMessage("ARLIGHT_ARSTORE_UPRAVLENIE_SVETOM")?></span>
                        </label>
                    </div>
                    <div class="lamp-calc__prop-check">
                        <label>
                            <?
                            $checked = '';
                            if($editPage && $editData['add']['power']) $checked = 'checked="checked"';
                            ?>
                            <input <?= $checked ?> type="checkbox" class="lamp_additional" data-key="lamp_add_power">
                            <span><?=GetMessage("ARLIGHT_ARSTORE_BEZ_BLOKA_PITANIA")?></span>
                        </label>
                    </div>
                    <div class="add_options_comment">* <?=GetMessage("ARLIGHT_ARSTORE_V_STOIMOSTQ_NE_VKLUC")?><br><?=GetMessage("ARLIGHT_ARSTORE_RASSCITYVAETSA_INDIV")?><br><?=GetMessage("ARLIGHT_ARSTORE_S_MENEDJEROM")?></div>
                </div>
            </div>

            <div class="lamp-calc__result">
                <div class="lamp-calc__result-text">
                    <div><?=GetMessage("ARLIGHT_ARSTORE_MOSNOSTQ_SVETILQNIKA")?><span class="lamp_result_power">0</span></div>
                    <div><?=GetMessage("ARLIGHT_ARSTORE_SVETOVOY_POTOK_LM")?>
                        <i style="width: 15px;height: 15px;display: inline-block;text-align: center;padding: 2px;font-size: 9px;border-radius: 50%;border: 1px solid #adadad;color: #9a9a9a;font-weight: 600;cursor: pointer;position: relative;top: -8px;margin-left: 3px;" class="item_title_hint font_style_normal tooltip_status" title="<?=GetMessage("ARLIGHT_ARSTORE_SVETOVOY_POTOK_LM_HELPER")?>">?</i>
                        <span class="lamp_result_flow">0</span>
                    </div>
                </div>
                <div class="lamp-calc__result-form">
                    <div class="lamp-calc__result-comment">
                        <textarea placeholder="<?=GetMessage("ARLIGHT_ARSTORE_DOBAVITQ_KOMMENTARIY")?>"><? if($editPage && $editData['comment'] && $editData['comment'] !== '') echo trim($editData['comment']); ?></textarea>
                    </div>
                    <div class="lamp-calc__result-summ">
                        <div class="lamp-calc__result-price">
                            <div class="card__price-now">
                                <span class="price"></span>
                                <span class="currency"><?= CURRENCY ?></span>
                            </div>
                        </div>
                        <div class="lamp-calc__result-input">
                            <div class="product__add">
                                <div class="buy-block__wrap">
                                    <div class="buy-block__items">
                                        <span class="buy-block__button lamp_page_qnt lamp_page_qnt_minus">-</span>
                                        <input type="text" class="buy-block__input lamp_page_qnt_input"
                                               value="<?= ($editPage && (int)$editData['quantity']) ? (int)$editData['quantity'] : 1 ?>"
                                               data-article="<?= $article; ?>"
                                               data-packnorm="1"
                                               autocomplete="off">
                                        <span class="buy-block__button lamp_page_qnt lamp_page_qnt_plus">+</span>
                                    </div>
                                </div>
                                <? if($editPage): ?>
                                    <div class="button product__add-btn lamp_page_add_button lamp_page_edit_button" data-id="<?= $orderID ?>">
                                        <?=GetMessage("ARLIGHT_ARSTORE_SOHRANITQ1")?></div>
                                <? else: ?>
                                    <div class="button product__add-btn lamp_page_add_button">
                                        <?=GetMessage("ARLIGHT_ARSTORE_DOBAVITQ1")?></div>
                                <? endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="lamp-nav">
            <a href="<?= SITE_DIR ?>catalog/custom-lamps/">
                <div class="lamp-nav__btn prev">
                    <i class="icon-arrow-left"></i>
                    <span><?=GetMessage("ARLIGHT_ARSTORE_SPISOK_SERIY")?></span>
                </div>
            </a>
            <a href="<?= SITE_DIR ?>catalog/custom-lamps/my-lamps.php">
                <div class="lamp-nav__btn next">
                    <span><?=GetMessage("ARLIGHT_ARSTORE_SPISOK_PROEKTOV")?></span>
                    <i class="icon-arrow-right"></i>
                </div>
            </a>
        </div>

    <? endif; ?>
</div>

    <script>
        var bread = '';
        bread = bread + '<li class="breadcrumbs__item" id="bx_breadcrumb_0" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="<?=SITE_DIR?>" class="breadcrumbs__link" title="<?=GetMessageJS("ARLIGHT_ARSTORE_GLAVNAA")?>" itemprop="item"><span itemprop="name" class="breadcrumbs__text"><?=GetMessageJS("ARLIGHT_ARSTORE_GLAVNAA")?></span></a><meta itemprop="position" content="1"></li>';
        bread = bread + '<li class="breadcrumbs__item" id="bx_breadcrumb_1" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="<?=SITE_DIR?>catalog/" class="breadcrumbs__link" title="<?=GetMessageJS("ARLIGHT_ARSTORE_KATALOG")?>" itemprop="item"><span itemprop="name" class="breadcrumbs__text"><?=GetMessageJS("ARLIGHT_ARSTORE_KATALOG")?></span></a><meta itemprop="position" content="2"></li>';
        bread = bread + '<li class="breadcrumbs__item" id="bx_breadcrumb_2" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="<?=SITE_DIR?>catalog/custom-lamps/" class="breadcrumbs__link" title="<?=GetMessageJS("ARLIGHT_ARSTORE_KATALOG")?>" itemprop="item"><span itemprop="name" class="breadcrumbs__text"><?=GetMessageJS("ARLIGHT_ARSTORE_SAG_SVETILQNIKI")?></span></a><meta itemprop="position" content="2"></li>';
        bread = bread + '<li class="breadcrumbs__item" id="bx_breadcrumb_3" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><span itemprop="name" class="breadcrumbs__text"><?=GetMessageJS("ARLIGHT_ARSTORE_SAG_RASCET_SVETI1")?></span><meta itemprop="position" content="2"></li>';
        $('.breadcrumbs__list').html(bread);
    </script>

<? } ?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
