<?

use \Bitrix\Main\Config\Option,
    \Bitrix\Main\Application,
    \Bitrix\Main\Web\Cookie,
    \Bitrix\Main\Type,
    \Itertech\Cart\DiscountTable;

class WorkCart
{
    static public $module_id = 'itertech.cart';

    static public function getOptions($siteId = SITE_ID)
    {
        //$siteId = SITE_ID;
        $options = Option::getForModule(self::$module_id, $siteId);
        return $options;
    }

    static public function getCookie($name, $synch = false, $siteId = SITE_ID)
    {
        global $USER;

        $application = Application::getInstance();
        $context = $application->getContext();
        $data = $context->getRequest()->getCookie($name.'_'.$siteId);
        if($name != 'promocode'){
            $data = (array)json_decode($data, true);
        }

        // ???? ???????????? ???????????
        if($USER->GetID() && $name != 'promocode'){
            $dataOp = Option::get(self::$module_id.'_data', $name.'_'.$USER->GetID().'_'.$siteId);
            $dataOp = (array)json_decode($dataOp, true);

            // ??????? ??????? ?? ???? ? option ? ?????? ?? ?????????
            $newData = array();
            foreach ($data as $key=>$datum) {
                $newData[$key] = $datum;
            }
            foreach ($dataOp as $key=>$datum){
                if(is_array($datum)){
                    $newData[$key] = $datum;
                } else {
                    $newData[$datum] = $datum;
                }
            }
            // ???? ? ????? ???? ?????? ? ???????????? ?????????????, ???????????
            if($data){
                self::setCookie($name, $newData, false, $siteId);
            }
            $data = $newData;
        }

        // ??? ?????? ?? ???????? ?????????, ?????????? ? ?? ???????? ??????????? ??????? ? ?? ? ???????????
        if($synch && $data){
            $data = self::synchCookie($data, $siteId);
            self::setCookie($name, $data, false, $siteId);
        }

        return $data;
    }
    static private function setCookie($name, $data = false, $time = false, $siteId = SITE_ID)
    {
        global $USER;

        if($name == 'promocode'){
            $dataCookie = ($data) ? $data : false;
        } else {
            $dataCookie = ($data) ? json_encode($data) : false;
        }

        if($name == 'userCart'){
            $dataOption = ($data) ? json_encode($data) : false;
        } else {
            $dataOption = ($data) ? json_encode(array_values($data)) : false;
        }

        $application = Application::getInstance();
        $context = $application->getContext();

        // ???? ???????????? ??????????? - ???????? ? option, ????? - ? ??????
        if($USER->GetID() && $name != 'promocode'){
            Option::set(self::$module_id.'_data', $name.'_'.$USER->GetID().'_'.$siteId, $dataOption);
            $cookie = new Cookie($name.'_'.$siteId,  '', -100);
        } else {
            $options = self::getOptions($siteId);
            if ($options['CACHE_TIME_' . $siteId])
                $cacheTime = $options['CACHE_TIME_' . $siteId];
            else $cacheTime = 30;
            $cookie = new Cookie($name.'_'.$siteId, $dataCookie, ($time) ? $time : time() + 60*60*24*$cacheTime);
        }

        $server = $context->getServer()->getHttpHost();
        if (stristr($server, ':'))
            $server = explode(':', $context->getServer()->getHttpHost())[0];
        $cookie->setDomain($server);
        $cookie->setHttpOnly(false);
        $context->getResponse()->addCookie($cookie);
//        $context->getResponse()->flush("");

        return true;
    }
    static public function deleteCookie($name, $siteId = SITE_ID)
    {
        global $USER;
        self::setCookie($name, '', -100, $siteId);
        Option::delete(self::$module_id.'_data', array("name" => $name.'_'.$USER->GetID().'_'.$siteId));
    }

    static private function synchCookie($IDS, $siteId=SITE_ID){
        $options = self::getOptions($siteId);
        $iblockId = $options['IBLOCK_ID_'.$siteId];
        $arSelectSynch = array('ID');
        $arFilterSynch = array('IBLOCK_ID'=>(int)$iblockId, 'ID'=>$IDS, 'ACTIVE_DATE'=>'Y', 'ACTIVE'=>'Y');
        $resSynch = CIBlockElement::GetList(Array(), $arFilterSynch, false, false, $arSelectSynch);
        $data = array();
        while($obSynch = $resSynch->GetNextElement()) {
            $arFieldsSynch = $obSynch->GetFields();
            $data[$arFieldsSynch['ID']] = $arFieldsSynch['ID'];
        }
        return $data;
    }

    // ?????????
    static public function itemsFavorite($id = false, $siteId = SITE_ID)
    {
        $cookieFavorite = self::getCookie('userFavorite', false, $siteId);

        if($id){

            if($id == 'all') { // ?????? ?? ?????????? ??? ????????
                self::deleteCookie('userFavorite', $siteId);
                $result['RELOAD'] = "Y";
            } else {
                /* ???? ? ????? ?????????? ??? ???? ???? ?????, ?????? ??? ?????? ?? ???????? */
                if($cookieFavorite[$id]){
                    $result['DELETE'] = $id;
                    unset($cookieFavorite[$id]);
                } else {
                    $cookieFavorite[$id] = $id;
                }

                // ??????????? ???? ??? ???????, ???? ??????? ? ??????? 0
                if(count($cookieFavorite)>0){
                    self::setCookie('userFavorite', $cookieFavorite, false, $siteId);
                } else {
                    self::deleteCookie('userFavorite', $siteId);
                }
            }
        }
        $result['IDS'] = $cookieFavorite;
        $result['COUNT'] = count($cookieFavorite);
        $result['SITE_ID'] = $siteId;

        return $result;
    }

    // ?????????
    static public function itemsCompare($id = false, $siteId = SITE_ID)
    {
        $cookieCompare = self::getCookie('userCompare', false, $siteId);

        if($id){

            if($id == 'all'){ // ?????? ?? ????????? ??? ????????
                self::deleteCookie('userCompare', $siteId);
                $result['RELOAD'] = "Y";
            } else {
                /* ???? ? ????? ?????????? ??? ???? ???? ?????, ?????? ??? ?????? ?? ???????? */
                if($cookieCompare[$id]){
                    $result['DELETE'] = $id;
                    unset($cookieCompare[$id]);
                } else {
                    $cookieCompare[$id] = $id;
                }

                // ??????????? ???? ??? ???????, ???? ??????? ? ??????? 0
                if(count($cookieCompare)>0){
                    self::setCookie('userCompare', $cookieCompare, false, $siteId);
                } else {
                    self::deleteCookie('userCompare', $siteId);
                }
            }

        }
        $result['IDS'] = $cookieCompare;
        $result['COUNT'] = count($cookieCompare);

        return $result;
    }


    static public function addItemToCart($id, $quantity, $params, $func = false, $siteId = SITE_ID)
    {
        $SHOW_MESS_ADD = false;
        $cookieCart = self::getCookie('userCart', false, $siteId);


        $nowCart = array();
        $nowCart[$id] = array(
            'quantity' => $quantity
        );

        if($cookieCart[$id]){
            $cookieCart[$id]['quantity'] = ($func=='U') ? floatval($nowCart[$id]['quantity']) : floatval($cookieCart[$id]['quantity']) + floatval($nowCart[$id]['quantity']);
        } else {
            $SHOW_MESS_ADD = true;
            $cookieCart[$id] = $nowCart[$id];
        }
        if($func=='R'){
            unset($cookieCart[$id]);
        }

        // ??????????? ???? ??? ???????, ???? ??????? ? ??????? 0
        if(count($cookieCart)>0){
            self::setCookie('userCart', $cookieCart, false, $siteId);
        } else {
            self::deleteCookie('userCart', $siteId);
        }

        if(sizeof($cookieCart)<=0){
            return false;
        }

        $cookieCart['SHOW_MESS_ADD'] = $SHOW_MESS_ADD;
        return $cookieCart;
    }
    static public function getItemsFromCart($params = false, $siteId = SITE_ID)
    {
        if($params['IDS_CART']){
            $cookieCart = $params['IDS_CART'];
        } else {
            $cookieCart = self::getCookie('userCart', false, $siteId);
        }

        if(sizeof($cookieCart)<=0 || $cookieCart==1){
            return false;
        }
        $data = self::renderDataCart($cookieCart, $params, $siteId);
        return $data;
    }

    static public function renderDataCart($data, $params, $siteId = SITE_ID)
    {
        global $USER;

        $stepActionsArr = [];
        $pathToStepActions = $_SERVER['DOCUMENT_ROOT'] . SITE_DIR . "actionArticles.json";
        if(file_exists($pathToStepActions) && !BELARUS) $stepActionsArr = json_decode(json_encode(json_decode(file_get_contents($pathToStepActions))), true);


        $options = self::getOptions($siteId);
        $f_options = array();
        foreach ($options as $key=>$option) {
            $key = str_replace('_'.$siteId,'',trim($key));
            $f_options[$key] = trim($option);
        }

        CModule::IncludeModule('iblock');
        $prodIDS = array();
        foreach ($data as $key=>$item) {
            $prodIDS[] = (int)$key;
        }
        $arSelectDefault = array(
            'ID',
            'NAME',
            'IBLOCK_ID',
            'DETAIL_PAGE_URL'
        );
        $PROPERTIES  = array();

        if($params['LIST_PROPERTY_CODE']){
            foreach ($params['LIST_PROPERTY_CODE'] as $PROPERTY) {
                $PROPERTIES[] = ($PROPERTY=='NAME') ? $PROPERTY : 'PROPERTY_'.$PROPERTY;
            }
        }
        if($f_options['PROPERTY_PRICE']){
            $PROPERTIES[] = 'PROPERTY_'.$f_options['PROPERTY_PRICE'];
        }
        if($f_options['PROPERTY_OLDPRICE']){
//            $PROPERTIES[] = 'PROPERTY_'.$f_options['PROPERTY_OLDPRICE'];
            $PROPERTIES[] = 'PROPERTY_OLD_PRICE';
        }
        if($f_options['FIELD_IMAGE'] != 'NO'){
            $PROPERTIES[] = $f_options['FIELD_IMAGE'];
        } else {
            if($f_options['PROPERTY_IMAGE']){
                $PROPERTIES[] = 'PROPERTY_'.$f_options['PROPERTY_IMAGE'];
            }
        }
        if($f_options['FIELD_DESCRIPTION'] != 'NO'){
            $PROPERTIES[] = $f_options['FIELD_DESCRIPTION'];
        } else {
            if($f_options['PROPERTY_DESCRIPTION']){
                $PROPERTIES[] = 'PROPERTY_'.$f_options['PROPERTY_DESCRIPTION'];
            }
        }
        if($f_options['PROPERTY_ARTNUMBER']){
            $PROPERTIES[] = 'PROPERTY_'.$f_options['PROPERTY_ARTNUMBER'];
        }
        if($f_options['PROPERTY_INSTOCK']){
            $PROPERTIES[] = 'PROPERTY_'.$f_options['PROPERTY_INSTOCK'];
        }
        if($f_options['PROPERTY_PACKAGE']){
            $PROPERTIES[] = 'PROPERTY_'.$f_options['PROPERTY_PACKAGE'];
        }
        if($f_options['PROPERTY_PACKAGE_COUNT']){
            $PROPERTIES[] = 'PROPERTY_'.$f_options['PROPERTY_PACKAGE_COUNT'];
        }
        if($f_options['PROPERTY_UNIT']){
            $PROPERTIES[] = 'PROPERTY_'.$f_options['PROPERTY_UNIT'];
        }
        if($f_options['PROPERTY_LENGTH']){
            $PROPERTIES[] = 'PROPERTY_'.$f_options['PROPERTY_LENGTH'];
        }
        if($f_options['PROPERTY_WIDTH']){
            $PROPERTIES[] = 'PROPERTY_'.$f_options['PROPERTY_WIDTH'];
        }
        if($f_options['PROPERTY_HEIGHT']){
            $PROPERTIES[] = 'PROPERTY_'.$f_options['PROPERTY_HEIGHT'];
        }
        if($f_options['PROPERTY_WEIGHT']){
            $PROPERTIES[] = 'PROPERTY_'.$f_options['PROPERTY_WEIGHT'];
        }
        if($f_options['PROPERTY_VOLUME']){
            $PROPERTIES[] = 'PROPERTY_'.$f_options['PROPERTY_VOLUME'];
        }

        $PROPERTIES[] = 'PROPERTY_PROMOTIONAL_PRICE';

        $arSelect = array_merge($arSelectDefault, $PROPERTIES);

        $arFilter = array('IBLOCK_ID'=>(int)$f_options['IBLOCK_ID'], 'ID'=>$prodIDS, 'ACTIVE_DATE'=>'Y', 'ACTIVE'=>'Y');
        $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

        $TOTALCOUNT = 0;
        $prodInfo = array();
        $inCart = [];
        $discountGroup = false;
        $EX_DISC_SUMM_USER = false;
        while($ob = $res->GetNextElement()){
            $lastPrice = false;
            $DISCOUNT_SUMM = 0;

            $stepAction = false;
            $promoProduct=false;

            $arFields = $ob->GetFields();
            if(isset($inCart[$arFields['ID']])) continue;
            $inCart[$arFields['ID']] = true;
            $oldprice = $arFields['PROPERTY_PRICE_VALUE'];
            if(isset($stepActionsArr[$arFields['PROPERTY_ARTICLE_VALUE']]) && (float)$data[$arFields['ID']]['quantity'] < $stepActionsArr[$arFields['PROPERTY_ARTICLE_VALUE']]){
                $arFields['PROPERTY_PRICE_VALUE'] = $arFields['PROPERTY_OLD_PRICE_VALUE'];
            }
            if(isset($stepActionsArr[$arFields['PROPERTY_ARTICLE_VALUE']]) && (float)$data[$arFields['ID']]['quantity'] >= $stepActionsArr[$arFields['PROPERTY_ARTICLE_VALUE']]) {
                $lastPrice = true;
                $stepAction = true;
            }

            if ($arFields['PROPERTY_PROMOTIONAL_PRICE_VALUE'] && $arFields['PROPERTY_PRICE_VALUE'] != $arFields['PROPERTY_OLD_PRICE_VALUE'] && !$stepAction) {
                //????? ? ????????? ?????
                $lastPrice = true;
                $promoProduct = true;
                $oldprice = $arFields['PROPERTY_OLD_PRICE_VALUE'];
            }

            foreach ($arSelectDefault as $prop){
                $prodInfo['PRODUCTS'][$arFields["ID"]][$prop] = $arFields[$prop];
            }
            foreach ($PROPERTIES as $key=>$prop){

                $propKey = str_replace('PROPERTY_','',$prop);
                $prodInfo['PRODUCTS'][$arFields["ID"]][$propKey] =
                    ($prop == 'NAME' || $prop == 'PREVIEW_PICTURE' || $prop == 'DETAIL_PICTURE' || $prop == 'PREVIEW_TEXT'|| $prop == 'DETAIL_TEXT') ? $arFields[$prop] : $arFields[$prop.'_VALUE'];

                // for photo
                if($f_options['FIELD_IMAGE'] == $propKey || $f_options['PROPERTY_IMAGE'] == $propKey) {
                    $defaultKey = 'IMAGE';
                    $img = CFile::ResizeImageGet($prodInfo['PRODUCTS'][$arFields["ID"]][$propKey], array('width'=>170, 'height'=>170), BX_RESIZE_IMAGE_EXACT, true);
                    $prodInfo['PRODUCTS'][$arFields["ID"]][$defaultKey] = $img['src'];
                    if($defaultKey != $propKey){
                        unset($prodInfo['PRODUCTS'][$arFields["ID"]][$propKey]);
                    }
                }

                // for other properties
                if($f_options['FIELD_DESCRIPTION'] == $propKey || $f_options['PROPERTY_DESCRIPTION'] == $propKey) {
                    $defaultKey = 'DESCRIPTION';
                    $prodInfo['PRODUCTS'][$arFields["ID"]][$defaultKey] = $prodInfo['PRODUCTS'][$arFields["ID"]][$propKey];
                    if($defaultKey != $propKey){
                        unset($prodInfo['PRODUCTS'][$arFields["ID"]][$propKey]);
                    }
                }
                if($f_options['PROPERTY_ARTNUMBER'] == $propKey) {
                    $defaultKey = 'ARTNUMBER';
                    $prodInfo['PRODUCTS'][$arFields["ID"]][$defaultKey] = $prodInfo['PRODUCTS'][$arFields["ID"]][$propKey];
                    if($defaultKey != $propKey){
                        unset($prodInfo['PRODUCTS'][$arFields["ID"]][$propKey]);
                    }
                }
                if($f_options['PROPERTY_INSTOCK'] == $propKey){
                    $defaultKey = 'INSTOCK';
                    $prodInfo['PRODUCTS'][$arFields["ID"]][$defaultKey] = $prodInfo['PRODUCTS'][$arFields["ID"]][$propKey];
                    if($defaultKey != $propKey){
                        unset($prodInfo['PRODUCTS'][$arFields["ID"]][$propKey]);
                    }
                }
                if($f_options['PROPERTY_PACKAGE'] == $propKey){
                    $defaultKey = 'PACKAGE';
                    $prodInfo['PRODUCTS'][$arFields["ID"]][$defaultKey] = $prodInfo['PRODUCTS'][$arFields["ID"]][$propKey];
                    if($defaultKey != $propKey){
                        unset($prodInfo['PRODUCTS'][$arFields["ID"]][$propKey]);
                    }
                }
                if($f_options['PROPERTY_PACKAGE_COUNT'] == $propKey){
                    $defaultKey = 'PACKAGE_COUNT';
                    $prodInfo['PRODUCTS'][$arFields["ID"]][$defaultKey] = $prodInfo['PRODUCTS'][$arFields["ID"]][$propKey];
                    if($defaultKey != $propKey){
                        unset($prodInfo['PRODUCTS'][$arFields["ID"]][$propKey]);
                    }
                }
                if($f_options['PROPERTY_UNIT'] == $propKey){
                    $defaultKey = 'UNIT';
                    $prodInfo['PRODUCTS'][$arFields["ID"]][$defaultKey] = $prodInfo['PRODUCTS'][$arFields["ID"]][$propKey];
                    if($defaultKey != $propKey){
                        unset($prodInfo['PRODUCTS'][$arFields["ID"]][$propKey]);
                    }
                }
                if($f_options['PROPERTY_LENGTH'] == $propKey){
                    $defaultKey = 'LENGTH';
                    $prodInfo['PRODUCTS'][$arFields["ID"]][$defaultKey] = $prodInfo['PRODUCTS'][$arFields["ID"]][$propKey];
                    if($defaultKey != $propKey){
                        unset($prodInfo['PRODUCTS'][$arFields["ID"]][$propKey]);
                    }
                }
                if($f_options['PROPERTY_WIDTH'] == $propKey){
                    $defaultKey = 'WIDTH';
                    $prodInfo['PRODUCTS'][$arFields["ID"]][$defaultKey] = $prodInfo['PRODUCTS'][$arFields["ID"]][$propKey];
                    if($defaultKey != $propKey){
                        unset($prodInfo['PRODUCTS'][$arFields["ID"]][$propKey]);
                    }
                }
                if($f_options['PROPERTY_HEIGHT'] == $propKey){
                    $defaultKey = 'HEIGHT';
                    $prodInfo['PRODUCTS'][$arFields["ID"]][$defaultKey] = $prodInfo['PRODUCTS'][$arFields["ID"]][$propKey];
                    if($defaultKey != $propKey){
                        unset($prodInfo['PRODUCTS'][$arFields["ID"]][$propKey]);
                    }
                }
                if($f_options['PROPERTY_WEIGHT'] == $propKey){
                    $defaultKey = 'WEIGHT';
                    $prodInfo['PRODUCTS'][$arFields["ID"]][$defaultKey] = $prodInfo['PRODUCTS'][$arFields["ID"]][$propKey];
                    if($defaultKey != $propKey){
                        unset($prodInfo['PRODUCTS'][$arFields["ID"]][$propKey]);
                    }
                }
                if($f_options['PROPERTY_VOLUME'] == $propKey){
                    $defaultKey = 'VOLUME';
                    $prodInfo['PRODUCTS'][$arFields["ID"]][$defaultKey] = $prodInfo['PRODUCTS'][$arFields["ID"]][$propKey];
                    if($defaultKey != $propKey){
                        unset($prodInfo['PRODUCTS'][$arFields["ID"]][$propKey]);
                    }
                }

            }

            /* ??? ????? ???????????? ?????????? ?????? !!! */
            if($prodInfo['PRODUCTS'][$arFields["ID"]][$f_options['PROPERTY_OLDPRICE']] && !$lastPrice){
                $oldprice = $oldpriceWithoutDiscount =  $prodInfo['PRODUCTS'][$arFields["ID"]][$f_options['PROPERTY_OLDPRICE']];
                if(self::getMyDiscount($oldprice, $siteId, $params['USER_ID'])){
                    $discountOldPrice = (self::getMyDiscount($oldprice, $siteId, $params['USER_ID']) ? self::getMyDiscount($oldprice,$siteId, $params['USER_ID']) : $oldprice);
                    $oldprice = $discountOldPrice['PRICE'];
                    $OLD_DISCOUNT_SUMM = $discountOldPrice['DISCOUNT_SUMM'];
                }
                $prodInfo['PRODUCTS'][$arFields["ID"]]['OLDPRICE_MATH'] = $oldprice;
                $prodInfo['PRODUCTS'][$arFields["ID"]]['OLDPRICE'] = self::numberFormat($oldprice,$siteId);
            }
            /* */

            $price = $priceWithoutDiscount = $prodInfo['PRODUCTS'][$arFields["ID"]][$f_options['PROPERTY_PRICE']];
            if(self::getMyDiscount($price, $siteId, $params['USER_ID']) && !$params['CUSTOM_DISCOUNT'] && !$lastPrice){
                $discountPrice = self::getMyDiscount($price, $siteId, $params['USER_ID']);
                $price = $discountPrice['PRICE'];
                $DISCOUNT_SUMM = $discountPrice['DISCOUNT_SUMM'];

                $oldprice = $priceWithoutDiscount;
                $prodInfo['PRODUCTS'][$arFields["ID"]]['OLDPRICE_MATH'] = $oldprice;
                $prodInfo['PRODUCTS'][$arFields["ID"]]['OLDPRICE'] = self::numberFormat($oldprice,$siteId);
                $prodInfo['TOTALCART']['DISCOUNT_PERCENT_MATH'] = $discountPrice['DISCOUNT_PERCENT'];
                $prodInfo['TOTALCART']['DISCOUNT_PERCENT'] = $discountPrice['DISCOUNT_PERCENT'].'%';
                $prodInfo['TOTALCART']['DISCOUNT_TYPE'] = 'group';
                $discountGroup = true;
                if(in_array(($params['USER_ID']) ? $params['USER_ID'] : $USER->GetID(), $discountPrice['DATA']['EX_DISC_SUMM_USER'])){
                    $EX_DISC_SUMM_USER = true;
                }
            }

            $prodInfo['PRODUCTS'][$arFields["ID"]]['PRICE_MATH'] = $price;
            $prodInfo['PRODUCTS'][$arFields["ID"]]['PRICE'] = self::numberFormat($price,$siteId);

            if($f_options['PROPERTY_PRICE'] != 'PRICE' && $f_options['PROPERTY_PRICE'] != 'OLDPRICE'){
                unset($prodInfo['PRODUCTS'][$arFields["ID"]][$f_options['PROPERTY_PRICE']]);
            }
            if($f_options['PROPERTY_OLDPRICE'] != 'PRICE' && $f_options['PROPERTY_OLDPRICE'] != 'OLDPRICE'){
                unset($prodInfo['PRODUCTS'][$arFields["ID"]][$f_options['PROPERTY_OLDPRICE']]);
            }
            //


            $TOTALCOUNT++;

            // ????????? ? ???-?? ???????? ??????
            $prodInfo['PRODUCTS'][$arFields["ID"]]['QUANTITY'] = $data[$arFields["ID"]]['quantity'];
            $prodInfo['PRODUCTS'][$arFields["ID"]]['PACKAGE_QUANTITY'] = $data[$arFields["ID"]]['quantity']/$prodInfo['PRODUCTS'][$arFields["ID"]]['PACKAGE_COUNT'];
            $SUMM = $price * $prodInfo['PRODUCTS'][$arFields["ID"]]['QUANTITY'];
            $prodInfo['PRODUCTS'][$arFields["ID"]]['SUMM_MATH'] = $SUMM;
            $prodInfo['PRODUCTS'][$arFields["ID"]]['SUMM'] = self::numberFormat($SUMM,$siteId);

            if ($promoProduct) {
                $DISCOUNT_SUMM = ($arFields['PROPERTY_OLD_PRICE_VALUE'] - $arFields['PROPERTY_PRICE_VALUE']) * $prodInfo['PRODUCTS'][$arFields["ID"]]['QUANTITY'];
            }

            if($DISCOUNT_SUMM > 0){
                $DISCOUNT_SUMM = $DISCOUNT_SUMM *$prodInfo['PRODUCTS'][$arFields["ID"]]['QUANTITY'];
            }

            if($OLD_DISCOUNT_SUMM > 0){
                $OLD_DISCOUNT_SUMM = $OLD_DISCOUNT_SUMM*$prodInfo['PRODUCTS'][$arFields["ID"]]['QUANTITY'];
            }

            if($oldprice){
                $OLDSUMM = $oldprice * $prodInfo['PRODUCTS'][$arFields["ID"]]['QUANTITY'];
                if ($oldprice != $price)
                    $prodInfo['PRODUCTS'][$arFields["ID"]]['OLDSUMM'] = self::numberFormat($OLDSUMM,$siteId);
                $prodInfo['PRODUCTS'][$arFields["ID"]]['OLDSUMM_MATH'] = $OLDSUMM;
            }

            // ????????? ? ???-?? ???? ???????
            $prodInfo['TOTALCART']['SUMM'] += $SUMM;
            $prodInfo['TOTALCART']['DISCOUNT_SUMM'] += $DISCOUNT_SUMM;
            $prodInfo['TOTALCART']['OLDSUMM'] += $OLDSUMM;
            $prodInfo['TOTALCART']['OLD_DISCOUNT_SUMM'] += $OLD_DISCOUNT_SUMM;
            $prodInfo['TOTALCART']['QUANTITY'] = $TOTALCOUNT;

            // ?????? ??? ???????? (???? ?????? ????? ???)
            $prodInfo['TOTALCART']['WEIGHT'] += $prodInfo['PRODUCTS'][$arFields["ID"]]['WEIGHT']*$prodInfo['PRODUCTS'][$arFields["ID"]]['PACKAGE_QUANTITY'];
            $prodInfo['TOTALCART']['PACKAGE_QUANTITY'] += $prodInfo['PRODUCTS'][$arFields["ID"]]['PACKAGE_QUANTITY'];

        }


        // ????????? ??????????
        $p_TOTALCART_SUMM = $prodInfo['TOTALCART']['SUMM'];
        $p_TOTALCART_DISCOUNT_SUMM = $prodInfo['TOTALCART']['DISCOUNT_SUMM'];
        $p_TOTALCART_OLDSUMM = $prodInfo['TOTALCART']['OLDSUMM'];
        $CUSTOM_DISCOUNT = trim($params['CUSTOM_DISCOUNT']);

        // ????????? ?????? ?? ????? ??????
        $arDiscount = self::getDiscount($siteId, '', array('<=SUMM_ORDER'=>($p_TOTALCART_OLDSUMM) ? $p_TOTALCART_OLDSUMM : $p_TOTALCART_SUMM, 'TYPE'=>'summ'));
        $firstArDiscount = array_shift($arDiscount);

        if($firstArDiscount && !$CUSTOM_DISCOUNT && !$EX_DISC_SUMM_USER){
            // ???? ??????? ?????? ?????? ?????? ?? ????? ?????? - ????????
            if($prodInfo['TOTALCART']['DISCOUNT_PERCENT_MATH'] < $firstArDiscount['DISCOUNT']) {

                // ???? ???? ?????? ?? ??????
                if($discountGroup) {
                    $prodInfo['TOTALCART']['DISCOUNT_PERCENT_MATH_DOP'] = $firstArDiscount['DISCOUNT'] - $prodInfo['TOTALCART']['DISCOUNT_PERCENT_MATH'];
                    $prodInfo['TOTALCART']['DISCOUNT_SUMM_DOP_MATH'] = round($p_TOTALCART_OLDSUMM * $prodInfo['TOTALCART']['DISCOUNT_PERCENT_MATH_DOP'] / 100, 2);
                    $prodInfo['TOTALCART']['DISCOUNT_SUMM_DOP'] = self::numberFormat($prodInfo['TOTALCART']['DISCOUNT_SUMM_DOP_MATH'],$siteId);
                    $prodInfo['TOTALCART']['SUMM_PROM_MATH'] = $p_TOTALCART_OLDSUMM - $prodInfo['TOTALCART']['DISCOUNT_SUMM'];
                    $prodInfo['TOTALCART']['SUMM_PROM'] = self::numberFormat($prodInfo['TOTALCART']['SUMM_PROM_MATH'],$siteId);
                    $prodInfo['TOTALCART']['SUMM'] = $p_TOTALCART_SUMM - $prodInfo['TOTALCART']['DISCOUNT_SUMM_DOP_MATH'];
                    $prodInfo['TOTALCART']['DISCOUNT_TYPE'] = 'group+summ';
                }

                else {
                    $prodInfo['TOTALCART']['DISCOUNT_SUMM'] = $p_TOTALCART_SUMM * $firstArDiscount['DISCOUNT'] / 100;
                    $prodInfo['TOTALCART']['DISCOUNT_PERCENT_MATH'] = $firstArDiscount['DISCOUNT'];
                    $prodInfo['TOTALCART']['DISCOUNT_PERCENT'] = $firstArDiscount['DISCOUNT']. '%';
                    $prodInfo['TOTALCART']['OLDSUMM'] = $p_TOTALCART_SUMM;
                    $prodInfo['TOTALCART']['SUMM'] = $p_TOTALCART_SUMM - $prodInfo['TOTALCART']['DISCOUNT_SUMM'];
                    $prodInfo['TOTALCART']['DISCOUNT_TYPE'] = 'summ';
                }

                $prodInfo['TOTALCART']['DISCOUNT_FROM_SUMM_ORDER'] = $firstArDiscount['SUMM_ORDER'];

            }
        }


        // ????????? ?????? ?? ?????????
        if((self::getCookie('promocode', false, $siteId) || $params['PROMOCODE']) && !$CUSTOM_DISCOUNT){
            $promocode = self::promocode(trim(self::getCookie('promocode', false, $siteId)), false, false, $siteId);
            if($params['PROMOCODE']){
                $promocode = self::promocode(trim($params['PROMOCODE']), false, true, $siteId);
            }

            $dateActivePromo = true;
            if($promocode['DATE_TO'] && !$params['PROMOCODE']){
                $DATE_NOW = new Type\DateTime();
                if($DATE_NOW < $promocode['DATE_FROM'] || $DATE_NOW > $promocode['DATE_TO']){
                    $dateActivePromo = false;
                }
            }

            if($promocode['ID'] && $dateActivePromo){
                // ???? ??????? ?????? ?????? ?????? ?? ????????? - ????????
                if($prodInfo['TOTALCART']['DISCOUNT_PERCENT_MATH'] < $promocode['DISCOUNT'] && $firstArDiscount['DISCOUNT'] < $promocode['DISCOUNT']){

                    if($discountGroup){

                        $prodInfo['TOTALCART']['SUMM_PROM_MATH'] = $p_TOTALCART_OLDSUMM - $prodInfo['TOTALCART']['DISCOUNT_SUMM'];
                        $prodInfo['TOTALCART']['SUMM_PROM'] = self::numberFormat($prodInfo['TOTALCART']['SUMM_PROM_MATH'],$siteId);

                        $prodInfo['TOTALCART']['DISCOUNT_PERCENT_MATH_DOP'] = $promocode['DISCOUNT'] - $prodInfo['TOTALCART']['DISCOUNT_PERCENT_MATH'];

                        $prodInfo['TOTALCART']['DISCOUNT_SUMM_DOP_MATH'] = round( $p_TOTALCART_OLDSUMM * $prodInfo['TOTALCART']['DISCOUNT_PERCENT_MATH_DOP'] / 100, 2);
                        $prodInfo['TOTALCART']['DISCOUNT_SUMM_DOP'] = self::numberFormat($prodInfo['TOTALCART']['DISCOUNT_SUMM_DOP_MATH'],$siteId);

                        $prodInfo['TOTALCART']['SUMM'] = $p_TOTALCART_OLDSUMM - $prodInfo['TOTALCART']['DISCOUNT_SUMM'] - $prodInfo['TOTALCART']['DISCOUNT_SUMM_DOP_MATH'];
                        $prodInfo['TOTALCART']['DISCOUNT_TYPE'] = 'group+promo';

                    } else {
                        $prodInfo['TOTALCART']['DISCOUNT_SUMM'] = $p_TOTALCART_SUMM * $promocode['DISCOUNT'] / 100;
                        $prodInfo['TOTALCART']['DISCOUNT_PERCENT_MATH'] = $promocode['DISCOUNT'];
                        $prodInfo['TOTALCART']['DISCOUNT_PERCENT'] = $promocode['DISCOUNT']. '%';
                        $prodInfo['TOTALCART']['OLDSUMM'] = $p_TOTALCART_SUMM;
                        $prodInfo['TOTALCART']['SUMM'] = $p_TOTALCART_SUMM - $prodInfo['TOTALCART']['DISCOUNT_SUMM'];
                        $prodInfo['TOTALCART']['DISCOUNT_TYPE'] = 'promo';
                    }

                    $prodInfo['TOTALCART']['DISCOUNT_MULTI'] = $promocode['MULTI'];
                    $prodInfo['TOTALCART']['DISCOUNT_ID'] = $promocode['ID'];
                    $prodInfo['TOTALCART']['PROMOCODE'] = $promocode['PROMOCODE'];


                } else {
                    $prodInfo['TOTALCART']['ERROR_PROMOCODE'] = GetMessage("ARLIGHT_ARSTORE_VASA_TEKUSAA_SKIDKA");
                    self::deleteCookie('promocode', $siteId);
                }
            } else {
                if(self::getCookie('promocode', false, $siteId) != '-1N'){
                    $prodInfo['TOTALCART']['ERROR_PROMOCODE'] = GetMessage("ARLIGHT_ARSTORE_DANNYY_PROMOKOD_NE_D");
                }
                self::deleteCookie('promocode', $siteId);
            }
        }

        if($CUSTOM_DISCOUNT){
            $prodInfo['TOTALCART']['DISCOUNT_SUMM'] = $p_TOTALCART_SUMM * $CUSTOM_DISCOUNT / 100;
            $prodInfo['TOTALCART']['DISCOUNT_PERCENT_MATH'] = $CUSTOM_DISCOUNT;
            $prodInfo['TOTALCART']['DISCOUNT_PERCENT'] = $CUSTOM_DISCOUNT. '%';
            $prodInfo['TOTALCART']['OLDSUMM'] = $p_TOTALCART_SUMM;
            $prodInfo['TOTALCART']['SUMM'] = $p_TOTALCART_SUMM - $prodInfo['TOTALCART']['DISCOUNT_SUMM'];
            $prodInfo['TOTALCART']['DISCOUNT_TYPE'] = 'custom';
        }

        $prodInfo['TOTALCART']['SUMM_MATH'] = $prodInfo['TOTALCART']['SUMM'];
        $prodInfo['TOTALCART']['SUMM'] = self::numberFormat($prodInfo['TOTALCART']['SUMM'],$siteId);
        $prodInfo['TOTALCART']['DISCOUNT_SUMM_MATH'] = $prodInfo['TOTALCART']['DISCOUNT_SUMM'];
        $prodInfo['TOTALCART']['DISCOUNT_SUMM'] = self::numberFormat($prodInfo['TOTALCART']['DISCOUNT_SUMM'],$siteId);

        $prodInfo['TOTALCART']['OLDSUMM_MATH'] = $prodInfo['TOTALCART']['OLDSUMM'];
        $prodInfo['TOTALCART']['OLDSUMM'] = self::numberFormat($prodInfo['TOTALCART']['OLDSUMM'],$siteId);
        $prodInfo['TOTALCART']['OLD_DISCOUNT_SUMM_MATH'] = $prodInfo['TOTALCART']['OLD_DISCOUNT_SUMM'];
        $prodInfo['TOTALCART']['OLD_DISCOUNT_SUMM'] = self::numberFormat($prodInfo['TOTALCART']['OLD_DISCOUNT_SUMM'],$siteId);

        // ????????? ????? ????? ????????? ??? ?????????? 1, 2, 5. ????????: ?????, ??????, ???????
        $f_options['FORMS_PLURAL'] = explode(',', $f_options['FORMS_PLURAL']);
        $f_options['FORMS_PLURAL'] = array_map('trim', $f_options['FORMS_PLURAL']);
        $prodInfo['TOTALCART']['QUANTITY_NAME'] =  self::plural_form($prodInfo['TOTALCART']['QUANTITY'], $f_options['FORMS_PLURAL']);
        $prodInfo['TOTALCART']['CURRENCY'] = $options['CURRENCY_'.$siteId];
        $prodInfo['TOTALCART']['DISCOUNT_TYPE_TEXT'] = WorkOrder::getDiscountType($prodInfo['TOTALCART']['DISCOUNT_TYPE'], (($prodInfo['TOTALCART']['PROMOCODE']) ? $prodInfo['TOTALCART']['PROMOCODE'] : $prodInfo['TOTALCART']['DISCOUNT_FROM_SUMM_ORDER']));
        $prodInfo['TOTALCART']['SITE_ID'] = $siteId;

        return $prodInfo;
    }


    // ?????????????? ???
    static public function numberFormat($data, $siteId = SITE_ID, $math = false)
    {
        $options = self::getOptions($siteId);
        $THOUSANDS_SEPARATOR = $options['THOUSANDS_SEPARATOR_'.$siteId];
        $DECIMALS = $options['DECIMALS_'.$siteId];
        $CURRENCY = $options['CURRENCY_'.$siteId];
        $DELIMITER_DECIMALS = $options['DELIMITER_DECIMALS_'.$siteId];

        $data = number_format($data, ($DECIMALS == 'Y') ? 2 : 0, '.', ($THOUSANDS_SEPARATOR) ? $THOUSANDS_SEPARATOR : ' ');

        if($DECIMALS=="Y" && !$math){
            $data = explode('.', $data);
            $data[1] = str_replace('*',$data[1],$DELIMITER_DECIMALS);
            $data = join(' ', $data);
        }
        $data = $data.' '.$CURRENCY;
        return $data;
    }

    static public function numberFormatWithDot($data, $math = false)
    {
        $options = self::getOptions();
        $THOUSANDS_SEPARATOR = $options['THOUSANDS_SEPARATOR_'.SITE_ID];
        $DECIMALS = $options['DECIMALS_'.SITE_ID];
        $CURRENCY = $options['CURRENCY_'.SITE_ID];
        $DELIMITER_DECIMALS = '.*';

        $data = number_format($data, ($DECIMALS == 'Y') ? 2 : 0, '.', ($THOUSANDS_SEPARATOR) ? $THOUSANDS_SEPARATOR : ' ');

        if($DECIMALS=="Y" && !$math){
            $data = explode('.', $data);
            $data[1] = str_replace('*',$data[1],$DELIMITER_DECIMALS);
            $data = join('', $data);
        }
        $data = $data.' '.$CURRENCY;
        return $data;
    }


    // ???????? ????????? ? ?????? ? ??????
    static public function promocode($data, $setSession = false, $returnAll = false, $siteId = SITE_ID)
    {
        $arDiscount = self::getDiscount($siteId, $returnAll, array('TYPE'=>'promo', 'PROMOCODE'=>$data));
        $firstArDiscount = array_shift($arDiscount);
        if($setSession && $data){
            self::setCookie('promocode', $data, false, $siteId);
        }
        if($firstArDiscount){
            $data = $firstArDiscount;
        } else {
            $data = false;
        }
        return $data;
    }

    /* ?????? */
    static public function getDiscount($SITE_ID, $returnAll = false, $filter = false){
        $arResult=[];
        $arFilter = array('SITE_ID' => $SITE_ID);
        if(!$returnAll){
            $arFilter['ACTIVE'] = 'Y';
        }
        if($filter){
            $arFilter = array_merge ($arFilter, $filter);
        }
        $res = DiscountTable::getList(
            array(
                'select' => array('*'),
                'filter' => $arFilter,
                'order' => array('DISCOUNT' => 'DESC'), // ?????????? ?? ?????? ?? ????????. ??? ????? ?????! ??????? ?????????, ????????? ?????? ?? ?????
            ));
        while ($ob = $res->fetch())
        {
            $ob['GROUPS'] = json_decode($ob['GROUPS'], true);
            $arResult[$ob['ID']] = $ob;
        }
        return (array)$arResult;
    }

    // ??????????? ?????? ?? ??????
    static public function getMyDiscount($price, $siteId = SITE_ID, $userId = false){
        if(!$userId){
            global $USER;
            $userId = $USER->GetID();
        }
        if($userId<=0){
            return false;
        }
        $arGroups = CUser::GetUserGroup($userId);
        $arDiscount = self::getDiscount($siteId, '', array('GROUPS'=>$arGroups));
        $discountPrice = false;
        if($arDiscount){
            $arDiscount = array_values($arDiscount);
            $myDiscount = $arDiscount[0];
            $discountPrice['PRICE'] = ($myDiscount['PERCENT']=='Y') ? $price-($price/100*$myDiscount['DISCOUNT']) : $price-$myDiscount['DISCOUNT'];
            $discountPrice['PRICE'] = round($discountPrice['PRICE'],2);
            $discountPrice['DISCOUNT_VALUE'] = ($myDiscount['PERCENT']=='Y') ? $myDiscount['DISCOUNT'].'%' : self::numberFormat($myDiscount['DISCOUNT'], $siteId) ;
            $discountPrice['DISCOUNT_SUMM'] = round($price-$discountPrice['PRICE'], 2);
            $discountPrice['DISCOUNT_PERCENT'] = $myDiscount['DISCOUNT'];
            $discountPrice['DATA'] = json_decode($myDiscount['DATA'], true);
        }
        return $discountPrice;
    }

    // ????????? ????????????
    static public function plural_form($number, $after) {
        $cases = array (2, 0, 1, 1, 1, 2);
        return $after[ ($number%100>4 && $number%100<20)? 2: $cases[min($number%10, 5)]];
    }

}