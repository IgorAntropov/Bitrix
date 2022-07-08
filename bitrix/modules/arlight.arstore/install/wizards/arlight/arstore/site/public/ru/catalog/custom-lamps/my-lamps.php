<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle(GetMessage("ARLIGHT_ARSTORE_SPISOK_SVETILQNIKOV"));

use Bitrix\Main\Grid\Declension;
global $USER;

if (!BELARUS && !KAZAKHSTAN){
$dataProduct = [];
$customProdData = [];
$userID = GetUserID();
if ($userID && $userID !== '') {
    $storeDir = $_SERVER["DOCUMENT_ROOT"] .  '/upload/custom-lamps-orders';
    $userFileName = $storeDir . '/' . $userID . '.json';
    if (file_exists($userFileName)) {
        $dataProduct = json_decode(json_encode(json_decode(file_get_contents($userFileName))), true);
    }
    $pathToFSON = $_SERVER["DOCUMENT_ROOT"]. SITE_DIR . 'assets/json/customProductsInfo.json';
    if (file_exists($pathToFSON)) {
        $customProdDataTemp = json_decode(json_encode(json_decode(file_get_contents($pathToFSON))), true);
        if (isset($customProdDataTemp['products'])) $customProdData = $customProdDataTemp['products'];
    }
}
$productDeclension = new Declension(GetMessage("ARLIGHT_ARSTORE_TOVAR"), GetMessage("ARLIGHT_ARSTORE_TOVARA"), GetMessage("ARLIGHT_ARSTORE_TOVAROV"));
?>

<div class="container container-catalog lamp-page">
    <? if (count($dataProduct)): ?>
        <div class="navigation-block navigation-block_basket navigation-block_border">
            <div class="basket-navigation">
                <div class="basket-navigation-name"><?=GetMessage("ARLIGHT_ARSTORE_MOI_SVETILQNIKI")?></div>
                <div class="basket-navigation-count"><span id="itemCountAll">
                    <?= count($dataProduct) ?> <?= $productDeclension->get(count($dataProduct)) ?>
                </span>
                </div>
                <div class="basket-navigation-price">
                <span class="custom_prod_order_sum_content">
                    <span class="custom_prod_piece_price_total">0</span>
                    <span class="custom_prod_piece_currency"> <?= CURRENCY ?></span>
                </span>
                </div>
            </div>
            <div class="button button_gray change-text" data-service="HIDE_CART">
                <span><?=GetMessage("ARLIGHT_ARSTORE_SVERNUTQ")?></span><span><?=GetMessage("ARLIGHT_ARSTORE_POKAZATQ")?></span>
            </div>
        </div>
    <? endif; ?>
    <div class="lamp-order order-cart__item-wrap">
        <div class="lamp-page-title"><?=GetMessage("ARLIGHT_ARSTORE_SAG_MOI_SVETILQN")?></div>
        <? if (!count($dataProduct)): ?>
            <br>
            <br>
            <?=GetMessage("ARLIGHT_ARSTORE_U_VAS_POKA_NET_SOHRA")?>
            <a href="<?= SITE_DIR ?>catalog/custom-lamps/" style="text-decoration: underline"><?=GetMessage("ARLIGHT_ARSTORE_SOZDANIU_SVOEGO")?></a>.
        <? else: ?>
            <div class="lamp__item-header order-cart__item order-cart__item--title">
                <div class="order-cart__item-title--name"><?=GetMessage("ARLIGHT_ARSTORE_TOVARY")?></div>
                <div class="order-cart__item-title--order"><?=GetMessage("ARLIGHT_ARSTORE_CENA_KOLICESTVO")?></div>
                <div class="order-cart__item-title--price"><?=GetMessage("ARLIGHT_ARSTORE_SUMMA")?></div>
            </div>
            <? foreach ($dataProduct as $date => $product): ?>
                <? if (isset($customProdData[$product['article']])):
                    $name = $customProdData[$product['article']]['name'];
                    $image = $customProdData[$product['article']]['image'];
                    ?>
                    <div class="lamp__item order-cart__item">
                        <div class="order-cart__wrap">
                            <div class="lamp__img order-cart__thumb">
                                <a href="<?= SITE_DIR ?>catalog/custom-lamps/custom-own-lamp.php?article=<?= $product['article'] ?>&order=<?= $date ?>">
                                    <img src="<?= $image ?>"
                                         alt="<?= $name ?>">
                                </a>
                            </div>
                            <div class="lamp__content order-cart__item-block--name">
                                <a class="lamp__article" title="<?=GetMessage("ARLIGHT_ARSTORE_REDAKTIROVATQ")?>"
                                   href="<?= SITE_DIR ?>catalog/custom-lamps/custom-own-lamp.php?article=<?= $product['article'] ?>&order=<?= $date ?>"
                                ><?= $product['article'] ?></a>
                                <div class="lamp__name"><?= $name ?></div>
                                <div class="lamp__properties" hidden>

                                    <? $arForMobile = [];
                                    $arForMobile[explode('(', $product['group_select']['name'])[0]] = $product['group_select']['value'];
                                    ?>
                                    <div class="lamp__properties-item">
                                        <span><?= explode('(', $product['group_select']['name'])[0] ?></span>
                                        <?= $product['group_select']['value'] ?>
                                    </div>
                                    <? foreach ($product['selects'] as $select): ?>
                                        <? $arForMobile[$select['name']] = $select['value'] ?>
                                        <div class="lamp__properties-item">
                                            <span><?= $select['name'] ?></span>
                                            <?= $select['value'] ?>
                                        </div>
                                    <? endforeach; ?>
                                    <? if ((float)$product['power']): ?>
                                        <? $arForMobile[GetMessage("ARLIGHT_ARSTORE_MOSNOSTQ_SVETILQNIKA")] = $product['power'] ?>
                                        <div class="lamp__properties-item lamp_project_item_power"
                                             data-value="<?= $product['power'] ?>">
                                            <span><?=GetMessage("ARLIGHT_ARSTORE_MOSNOSTQ_SVETILQNIKA")?></span>
                                            <?= $product['power'] ?>
                                        </div>
                                    <? endif; ?>
                                    <? if ((float)$product['flow']): ?>
                                        <? $arForMobile[GetMessage("ARLIGHT_ARSTORE_SVETOVOY_POTOK_LM")] = $product['flow'] ?>
                                        <div class="lamp__properties-item">
                                            <span><?=GetMessage("ARLIGHT_ARSTORE_SVETOVOY_POTOK_LM")?></span>
                                            <?= $product['flow'] ?>
                                        </div>
                                    <? endif; ?>
                                    <?
                                    $additions = '';
                                    if ($product['add']['cri']) $additions .= 'CRI 98';
                                    if ($product['add']['control']) {
                                        if ($additions !== '') $additions .= '<br>';
                                        $additions .= GetMessage("ARLIGHT_ARSTORE_UPRAVLENIE_SVETOM");
                                        $arForMobile[] = GetMessage("ARLIGHT_ARSTORE_UPRAVLENIE_SVETOM");
                                    }
                                    if ($product['add']['power']) {
                                        if ($additions !== '') $additions .= '<br>';
                                        $additions .= GetMessage("ARLIGHT_ARSTORE_BEZ_BLOKA_PITANIA");
                                        $arForMobile[] = GetMessage("ARLIGHT_ARSTORE_BEZ_BLOKA_PITANIA");
                                    }
                                    if ($additions !== ''):
                                        ?>
                                        <div class="lamp__properties-item">
                                            <?= $additions ?>
                                        </div>
                                    <? endif; ?>
                                </div>
                                <div class="lamp__properties">
                                    <? foreach ($arForMobile as $arForMobileName => $arForMobileValue) {
                                        if (!is_int($arForMobileName)) echo $arForMobileName . ': ' . $arForMobileValue . '; ';
                                    } ?>
                                </div>
                            </div>
                        </div>

                        <div class="lamp__result order-cart__item-block order-cart__item-block--order order-cart__block-wrap">
                            <div class="lamp__price">
                                <div class="card__price-now" data-piece-price="<?= $product['lampPrice'] ?>">
                                    <?
                                    $allPrice = $product['lampPrice'];
                                    $priceArr = explode('.', $allPrice);
                                    $cents = false;
                                    $priceHTML = number_format($priceArr[0], 0, '', ' ');
                                    if (count($priceArr) == 2) {
                                        if(strlen((string)$priceArr[1]) == 1) $priceArr[1] = (string)$priceArr[1].'0';
                                        $priceHTML .= ' <sup>' . $priceArr[1] . '</sup>';
                                    } else {
                                        $priceHTML .= ' <sup></sup>';
                                    }
                                    ?>
                                    <span class="price  order-cart__item-price"><?= $priceHTML ?></span>
                                    <span class="currency"><?= CURRENCY ?></span>
                                </div>
                            </div>
                            <div class="product__add">
                                <div class="buy-block__wrap">
                                    <div class="buy-block__items">
                                        <span class="buy-block__button lamp_page_qnt lamp_projects_qnt_minus"
                                              data-id="<?= $date ?>">-</span>
                                        <input type="text" class="buy-block__input lamp_page_qnt_input"
                                               value="<?= $product['quantity'] ?>" data-packnorm="1"
                                               autocomplete="off" readonly data-id="<?= $date ?>">
                                        <span class="buy-block__button lamp_page_qnt lamp_projects_qnt_plus"
                                              data-id="<?= $date ?>">+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lamp__result lamp__result-all order-cart__item-block order-cart__item-block--price">
                            <div class="lamp__price">
                                <div class="card__price-now" data-piece-price="<?= $product['lampPrice'] ?>">
                                    <?
                                    $allPrice = $product['totalPrice'];
                                    $priceArr = explode('.', $allPrice);
                                    $cents = false;
                                    $priceHTML = number_format($priceArr[0], 0, '', ' ');
                                    if (count($priceArr) == 2) {
                                        if(strlen((string)$priceArr[1]) == 1) $priceArr[1] = (string)$priceArr[1].'0';
                                        $priceHTML .= ' <sup>' . $priceArr[1] . '</sup>';
                                    } else {
                                        $priceHTML .= ' <sup></sup>';
                                    }
                                    ?>
                                    <span class="price"><?= $priceHTML ?></span>
                                    <span class="currency"><?= CURRENCY ?></span>
                                </div>
                            </div>
                            <div class="lamp__controls">
                                <div title="<?=GetMessage("ARLIGHT_ARSTORE_REDAKTIROVATQ1")?>" class="lamp__controls-edit">
                                    <a href="<?= SITE_DIR ?>catalog/custom-lamps/custom-own-lamp.php?article=<?= $product['article'] ?>&order=<?= $date ?>">
                                        <i class="icon-ar_copy"></i>
                                    </a>
                                </div>
                                <div title="<?=GetMessage("ARLIGHT_ARSTORE_UDALITQ")?>" class="lamp__controls-del lamp_delete_from_order"
                                     data-id="<?= $date ?>">
                                    <i class="icon-garbage"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                <? endif; ?>
            <? endforeach; ?>
            <div class="lamp-calc__result-text">
                <?=GetMessage("ARLIGHT_ARSTORE_OBSAA_MOSNOSTQ_PROEK")?><span class="lamp_result_power">0</span>
            </div>
        <? endif; ?>
    </div>
    <? if (count($dataProduct)): ?>
        <div class="lamp-form">
            <?
            global $USER;
            if ($USER->IsAuthorized()) {
                $name = $USER->GetFirstName();
                $surname = $USER->GetLastName();
                $email = $USER->GetEmail();

                $rsUser = CUser::GetByID($USER->GetParam('USER_ID'));
                $arUser = $rsUser->Fetch();
                $phone = $arUser['PERSONAL_PHONE'];
            } else {
                $name = '';
                $surname = '';
                $email = '';
                $phone = '';
            }
            ?>
            <form action="" class="" id="lamp_order" method="POST" enctype="multipart/form-data">
                <div class="custom_prod_summary-wrap row">
                    <div class="custom_prod_order_form col-md-8">
                        <div class="custom_prod_order_form_title order-title"><?=GetMessage("ARLIGHT_ARSTORE_ZAKAZATQ_IZDELIE")?></div>
                        <br>
                        <div class="order__form row">
                            <div class="col-md-6 order__form-input">
                                <div class="order__form-input-title"><?=GetMessage("ARLIGHT_ARSTORE_IMA")?></div>
                                <input class="input input--indefinite" type="text" name="order-name" value="<?= $name ?>" placeholder="<?=GetMessage("ARLIGHT_ARSTORE_IMA1")?>" required="" data-ip="<?= GetIP(); ?>">
                            </div>
                            <div class="col-md-6 order__form-input">
                                <div class="order__form-input-title"><?=GetMessage("ARLIGHT_ARSTORE_FAMILIA")?></div>
                                <input class="input input--indefinite" type="text" name="order-surname" value="<?= $surname ?>" placeholder="<?=GetMessage("ARLIGHT_ARSTORE_FAMILIA1")?>" required="">
                            </div>
                            <div class="col-md-6 order__form-input">
                                <div class="order__form-input-title">E-Mail*</div>
                                <input class="input input--indefinite"  type="email" name="order-email" value="<?= $email ?>" placeholder="EMAIL" required="" data-placeholder="EMAIL">
                            </div>
                            <div class="col-md-6 order__form-input">
                                <div class="order__form-input-title"><?=GetMessage("ARLIGHT_ARSTORE_TELEFON")?></div>
                                <input class="input input--indefinite" type="text" name="order-phone" value="<?= $phone ?>" placeholder="<?=GetMessage("ARLIGHT_ARSTORE_TELEFON1")?>" required="" maxlength="18">
                            </div>
                        </div>
                    </div>

                    <div class="custom_prod_total col-md-4">
                        <div class="custom_prod_order_form_title order-title"><?=GetMessage("ARLIGHT_ARSTORE_OPLATA")?></div>
                        <br>
                        <div class="custom_prod_order_sum_block order__pay-col">
                            <span class="custom_prod_order_sum_subtitle"><?=GetMessage("ARLIGHT_ARSTORE_SUMMA")?></span>
                            <span class="custom_prod_order_sum_content">
                                <span class="custom_prod_piece_price_total">0</span>
                                <span class="custom_prod_piece_currency"> <?= CURRENCY ?></span>
                            </span>
                        </div>
                        <div class="custom_prod_total_btns order__pay-col">
                            <div class="custom_prod_order_submit button button_red button--main button_full"><?=GetMessage("ARLIGHT_ARSTORE_OTPRAVITQ_PROEKTY")?></div>
                            <div class="custom_prod_order_text">
                                <?=GetMessage("ARLIGHT_ARSTORE_POSLE_NAJATIA_KNOPKI")?></div>
                            <div data-href="<?= SITE_DIR ?>catalog/custom-lamps/" class="custom_prod_order_return button button_transparent-red"><?=GetMessage("ARLIGHT_ARSTORE_PRODOLJITQ_VYBOR")?></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <? endif; ?>

</div>

    <script>
        var bread = '';
        bread = bread + '<li class="breadcrumbs__item" id="bx_breadcrumb_0" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="<?=SITE_DIR?>" class="breadcrumbs__link" title="<?=GetMessageJS("ARLIGHT_ARSTORE_GLAVNAA")?>" itemprop="item"><span itemprop="name" class="breadcrumbs__text"><?=GetMessageJS("ARLIGHT_ARSTORE_GLAVNAA")?></span></a><meta itemprop="position" content="1"></li>';

        bread = bread + '<li class="breadcrumbs__item" id="bx_breadcrumb_1" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="<?=SITE_DIR?>catalog/" class="breadcrumbs__link" title="<?=GetMessageJS("ARLIGHT_ARSTORE_KATALOG")?>" itemprop="item"><span itemprop="name" class="breadcrumbs__text"><?=GetMessageJS("ARLIGHT_ARSTORE_KATALOG")?></span></a><meta itemprop="position" content="2"></li>';

        bread = bread + '<li class="breadcrumbs__item" id="bx_breadcrumb_2" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="<?=SITE_DIR?>catalog/custom-lamps/" class="breadcrumbs__link" title="<?=GetMessageJS("ARLIGHT_ARSTORE_SAG_SVETILQNIKI")?>" itemprop="item"><span itemprop="name" class="breadcrumbs__text"><?=GetMessageJS("ARLIGHT_ARSTORE_SAG_SVETILQNIKI_2")?></span></a><meta itemprop="position" content="2"></li>';

        bread = bread + '<li class="breadcrumbs__item" id="bx_breadcrumb_3" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><span itemprop="name" class="breadcrumbs__text"><?=GetMessageJS("ARLIGHT_ARSTORE_SAG_RASCET_SVETI")?></span><meta itemprop="position" content="2"></li>';

        bread = bread + '<li class="breadcrumbs__item" id="bx_breadcrumb_4" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><span itemprop="name" class="breadcrumbs__text"><?=GetMessageJS("ARLIGHT_ARSTORE_SAG_SPISOK_SVETI")?></span><meta itemprop="position" content="2"></li>';

        $('.breadcrumbs__list').html(bread);

    </script>
<? } ?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
