<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Серии светильников");
global $USER;
$request = Bitrix\Main\Context::getCurrent()->getRequest();
$section = $request->get("section");
?>

<? if(!BELARUS && defined("CUSTOM_PRODUCTS")  && !KAZAKHSTAN) :?>

<div class="container container-catalog  lamp-page">
    <?
    $customProdData = [];
    $pathToFSON = $_SERVER["DOCUMENT_ROOT"]. SITE_DIR . 'assets/json/customProductsInfo.json';
    if (file_exists($pathToFSON)) $customProdData = json_decode(json_encode(json_decode(file_get_contents($pathToFSON))), true);
    if (isset($customProdData['products']) && count($customProdData['products'])):
        $pricesFrom = [];
        $pathToPrices = $_SERVER["DOCUMENT_ROOT"] . SITE_DIR. 'assets/json/customProductsPricesFrom.json';
        if (file_exists($pathToPrices)) $pricesFrom = json_decode(json_encode(json_decode(file_get_contents($pathToPrices))), true);
        ?>
        <div class="lamp-page-title">Шаг 1 | Серии светильников</div>
        <!--    список-->
        <div class="lamp__nav">
            <ul class="info__menu-list">
                <li><a href="javacsript:" class="active" data-section="all">Все</a></li>
                <li><a href="javacsript:" data-section="900">Линия</a></li>
                <li><a href="javacsript:" data-section="901">Квадрат, ромб</a></li>
                <li><a href="javacsript:" data-section="902">Треугольник</a></li>
                <li><a href="javacsript:" data-section="903">Гексагон</a></li>
                <li><a href="javacsript:" data-section="904">3 луча</a></li>
                <li><a href="javacsript:" data-section="905">4 луча</a></li>
                <li><a href="javacsript:" data-section="906">Зигзаг 4 линии</a></li>
                <li><a href="javacsript:" data-section="907">Зигзаг 5 линий</a></li>
                <li><a href="javacsript:" data-section="908">Угол</a></li>
            </ul>
        </div>
        <div class="lamp__list ">
            <? foreach ($customProdData['products'] as $article => $product): ?>
                <div class="lamp__item" data-section="<?= substr($article, 0, 3) ?>">
                    <div class="lamp__img item__img">
                        <a class="item__img-link" href="<?= SITE_DIR ?>catalog/custom-lamps/custom-own-lamp.php?article=<?= $article; ?>">
                            <img src="<?= $product['image']; ?>"
                                 alt="<?= $product['name']; ?>">
                        </a>
                    </div>
                    <div class="lamp__content">
                        <div class="lamp__article"><?= $article; ?></div>
                        <div class="lamp__name"><?= $product['name']; ?></div>
                        <div class="lamp__description">
                            <?= $product['description']; ?>
                            <span><?= $product['comments']; ?></span>
                        </div>
                    </div>
                    <div class="lamp__result">
                        <div class="lamp__price">
                            <? if (isset($pricesFrom[$article])):
                                $allPrice = $pricesFrom[$article];
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

                                <div class=" card__price-now ">
                                    <span class="price">от <?= $priceHTML ?></span>
                                    <span class="currency"><?= CURRENCY ?></span>
                                </div>
                            <? endif; ?>
                        </div>
                        <a href="<?= SITE_DIR ?>catalog/custom-lamps/custom-own-lamp.php?article=<?= $article; ?>">
                            <div class="lamp__button">рассчитать</div>
                        </a>
                    </div>
                </div>
            <? endforeach; ?>
        </div>
        <!--    список-->
    <? endif; ?>
</div>

<?if($section):?>
    <script>
        $(document).ready(function () {
            $('.lamp__nav a[data-section="<?=$section?>"]').click();
        })
    </script>
<?endif;?>

    <script>
        var bread = '';
        bread = bread + '<li class="breadcrumbs__item" id="bx_breadcrumb_0" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="<?=SITE_DIR?>" class="breadcrumbs__link" title="Главная" itemprop="item"><span itemprop="name" class="breadcrumbs__text">Главная</span></a><meta itemprop="position" content="1"></li>';
        bread = bread + '<li class="breadcrumbs__item" id="bx_breadcrumb_1" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="<?=SITE_DIR?>catalog/" class="breadcrumbs__link" title="Каталог" itemprop="item"><span itemprop="name" class="breadcrumbs__text">Каталог</span></a><meta itemprop="position" content="2"></li>';
        bread = bread + '<li class="breadcrumbs__item" id="bx_breadcrumb_2" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><span itemprop="name" class="breadcrumbs__text">Шаг 1 - Серии светильников</span><meta itemprop="position" content="2"></li>';
        $('.breadcrumbs__list').html(bread);
    </script>

<? endif; ?>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
