<?php
define("STOP_STATISTICS", true);
define('NO_AGENT_CHECK', true);
use Bitrix\Main\Config\Option;
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

if((isset($_POST['exchange'])) || (isset($_POST['newValue']) && ($_POST['newValue'] == '0' || (int)$_POST['newValue']))){
    global $USER;
    if($USER->isAuthorized() && CSite::InGroup(array(GR_SADM_ID, GR_ADM_ID))){
        $newValue = (int)$_POST['newValue'];
        $oldValue = COption::GetOptionString("MAIN", "PRICES_INCREASE", 0);
        if($oldValue == $newValue && !isset($_POST['exchange'])){
            echo 'Значение не изменилось!';
        }elseif ($newValue < 0 &&!isset($_POST['exchange'])){
            echo 'Значение не должно быть отрицательным!';
        }elseif ($newValue > MAX_PRICE_INCREASE_PERCENTS && !isset($_POST['exchange'])){
            echo 'Значение не должно быть более '.MAX_PRICE_INCREASE_PERCENTS.'%!';
        }elseif (BELARUS){
            echo 'Для сайтов в Республике Беларусь данный функционал не доступен!';
        }else{
            $exchangeRate = Option::get("main", "EXCHANGE_RATE", 1);
            if (isset($_POST['exchange'])) {
                $exchangeRate = (float)$_POST['exchange'];
                Option::set("main", "EXCHANGE_RATE", $exchangeRate);
                $newValue = Option::get('MAIN', 'PRICES_INCREASE', 0);
            }

            Option::set('MAIN', 'PRICES_INCREASE', $newValue);
            $newValueCof = (100+$newValue)/100*$exchangeRate;

            //возвращаем все цены к оригиналу mrc
            if(true){
                $articlesToID = [];
                $arSelect = ['ID', 'PROPERTY_ARTICLE'];
                $arFilterEl = ['IBLOCK_ID' => CATALOG_ID];
                $res = CIBlockElement::GetList(['ID'=>'ASC'], $arFilterEl, false, false, $arSelect);
                while($elIb = $res->GetNext()) {
                    $articlesToID[$elIb['PROPERTY_ARTICLE_VALUE']] = $elIb['ID'];
                }
                $newPricesArr = [];
                $dir = $_SERVER["DOCUMENT_ROOT"] . SITE_DIR. 'cron/catalog_import/data/categories/';
                if ($handle = opendir($dir)) {
                    while (false !== ($file = readdir($handle))) {
                        if ($file != "." && $file != "..") {
                            if (stristr($file, 'group_')) {
                                $xmlArray = simplexml_load_file($dir . $file);
                                foreach ($xmlArray->catalog->product as $product) {
                                    $article = (string)$product->article;
                                    foreach ($product->prices as $prices) {
                                        foreach ($prices as $price) {
                                            if ($price->attributes()->type == 'smallwholesale') {
                                                $originalPrice = (string)$price;
                                                if((float)$originalPrice){
                                                    $originalPrice = (float)$originalPrice;
                                                    $newPrice = $originalPrice*$newValueCof;
                                                    $newPrice = number_format((float)$newPrice, 2, '.', '');
                                                    $newPrice = (float)$newPrice;
                                                    if(isset($articlesToID[$article]) && (int)$articlesToID[$article]){
                                                        $prodID = (int)$articlesToID[$article];
                                                        $newPricesArr[$prodID] = ['PRICE' => $newPrice];
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                if(count($newPricesArr)){
                    foreach ($newPricesArr as $prodID=>$propUpdate){
                        \CIBlockElement::SetPropertyValuesEx((int)$prodID, CATALOG_ID, $propUpdate);
                    }
                }
                echo 'ok';
            }
        }
    }
}