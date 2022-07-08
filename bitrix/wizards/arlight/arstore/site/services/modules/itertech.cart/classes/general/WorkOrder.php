<?

use \Bitrix\Main\Config\Option,
    \Bitrix\Main\Type,
    \Itertech\Cart\OrdersTable,
    \Itertech\Cart\OrdersItemsTable,
    \Itertech\Cart\DeliveryTable,
    \Itertech\Cart\PaymentTable,
    \Itertech\Cart\StatusTable,
	\Itertech\Cart\DiscountTable,
    \Bitrix\Main\Application,
    \Bitrix\Main\IO;


class WorkOrder
{
    static public $module_id = 'itertech.cart';

    /* Добавление заказа */
    static public function addOrder($data)
    {
        if ($data['TOTALCART']['QUANTITY'] <= 0) {
            $arResult["STATUS"] = false;
            $arResult["ERROR"] = 'ERROR'; // Добавить языковую переменную с сообщением что корзина пуста!
        }

        $arFields = $data['FIELDS'];

        $arResult = array();

        // Валидация полей
        foreach ($arFields['USER'] as $key=>$uf) {
            $arFields['USER'][$key] = strip_tags(trim($uf));
        }
        $error = false;
        if(!$arFields['USER']['NAME']){
            $error[] = GetMessage('USER_ERROR_NAME');
        }
        if(!$arFields['USER']['PHONE']){
            $error[] = GetMessage('USER_ERROR_PHONE');
        }

        // Если выбран самовывоз - получим данные из ИБ
        if($arFields['USER']['PICKUPPOINT_ID']){
            $arSelect = Array("ID", "IBLOCK_ID", "NAME", "PROPERTY_ADDRESS");
            $arFilter = Array("ID"=>IntVal($arFields['USER']['PICKUPPOINT_ID']), "ACTIVE"=>"Y");
            $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect)->Fetch();
            $arFields['USER']['CITY'] = $res['NAME'].', '.$res['PROPERTY_ADDRESS_VALUE'];
            $arResult['USER_PICKUPPOINT_ID'] = $arFields['USER']['PICKUPPOINT_ID'];
        }
		
		
		
        if(!filter_var($arFields['USER']['EMAIL'], FILTER_VALIDATE_EMAIL)){
            $error[] = GetMessage('USER_ERROR_EMAIL');
        }
        if($error){
            $arResult["ERROR"] = implode('<p>', $error);
        }

        if (!$arResult["ERROR"]) {

            global $USER;
            $arProducts = $data['PRODUCTS'];
            $arTotalCart = $data['TOTALCART'];
            $arDelivery = DeliveryTable::getById($arFields['DELIVERY_ID'])->fetch();
            $arPayment = PaymentTable::getById($arFields['PAYMENT_ID'])->fetch();

            if($arFields['YD']['PRICE'] && (int)$arFields['YD']['PRICE']>0){
                $arDelivery['PRICE'] =  $arFields['YD']['PRICE'];
            }
            if($arFields['YD']['DELIVERY']){
                $arDelivery['NAME'] =  $arDelivery['NAME'].' - '.$arFields['YD']['DELIVERY'];
            }																 
            $SITE_ID = SITE_ID;
            $USER_ID = $arFields['USER']['USER_ID'];


            // Если нет ID пользователя - регистрируем
            if (!$USER_ID) {

                $USER_GROUPS = Option::get(self::$module_id, "ADD_USER_GROUPS_" . $SITE_ID);
                $USER_PASSWORD = randString(6);

                $arFieldsUser = Array(
                    "NAME" => $arFields['USER']['NAME'],
                    "EMAIL" => $arFields['USER']['EMAIL'],
                    "LOGIN" => $arFields['USER']['EMAIL'],
                    "ACTIVE" => "Y",
                    "GROUP_ID" => explode(',', $USER_GROUPS),
                    "PASSWORD" => $USER_PASSWORD,
                    "CONFIRM_PASSWORD" => $USER_PASSWORD,
                    "PERSONAL_PHONE" => $arFields['USER']['PHONE'],
                    "PERSONAL_CITY" => $arFields['USER']['CITY'],
                    "PERSONAL_ZIP" => $arFields['USER']['INDEX'],
                    "PERSONAL_STREET" => $arFields['USER']['STREET'].'|'.$arFields['USER']['HOUSE'].($arFields['USER']['APP'] ? '|'.$arFields['USER']['APP'] : ''),
                );
                $USER_ID = $USER->Add($arFieldsUser);
                if (intval($USER_ID) > 0) {
                    $USER->Authorize($USER_ID);
                    $arResult['USER_ID'] = $USER_ID;
                    CEvent::Send("ITERTECH_CREATE_USER", $SITE_ID, $arFieldsUser);
                } else {
                    $arResult["ERROR"] = $USER->LAST_ERROR . ' ' . GetMessage('USER_ERROR_DUBLE');
                    return $arResult;
                }
            } else {
                $arFieldsUser = Array(
                    "EMAIL" => $arFields['USER']['EMAIL'],
                    "PERSONAL_PHONE" => $arFields['USER']['PHONE'],
                    "PERSONAL_CITY" => $arFields['USER']['CITY'],
                    "PERSONAL_ZIP" => $arFields['USER']['INDEX'],
                    "PERSONAL_STREET" => $arFields['USER']['STREET'].'|'.$arFields['USER']['HOUSE'].($arFields['USER']['APP'] ? '|'.$arFields['USER']['APP'] : ''),
                );
                $USER->Update($USER_ID, $arFieldsUser);
            }


            /** @var \Bitrix\Main\DB\Connection $connection */
            $connection = \Bitrix\Main\Application::getConnection();
            /** @var \Bitrix\Main\DB\SqlHelper $sqlHelper */
            $sqlHelper = $connection->getSqlHelper();

            $orderStatus = self::getStatus($SITE_ID, 'Y', array('DEFAULT'=>'Y'));
            $orderStatus = array_values($orderStatus);
            if(!$orderStatus[0]['ID']){
                $orderStatus[0]['ID'] = 1;
            }

            $DATA = array();
            $DATA['PID'] = $arPayment['ID'];

            $orderFileldsAdd = array(
                "SITE_ID" => $SITE_ID,
                "DATE_CREATE" => new Type\DateTime(),
                "DATE_CHANGE" => new Type\DateTime(),
                "STATUS" => trim($orderStatus[0]['ID']),
                "CURRENCY" => "RUB", // вынести в настройки
                "SUMM" => $arTotalCart['SUMM_MATH'],
                "DISCOUNT" => $arTotalCart['DISCOUNT_SUMM_MATH']+$arTotalCart['DISCOUNT_SUMM_DOP_MATH'],
                "DISCOUNT_TYPE" => $arTotalCart['DISCOUNT_TYPE'],
                "DISCOUNT_PERCENT" => $arTotalCart['DISCOUNT_PERCENT_MATH'].(($arTotalCart['DISCOUNT_PERCENT_MATH_DOP']) ? '+'.$arTotalCart['DISCOUNT_PERCENT_MATH_DOP'] : ''),
                "PROMOCODE_OR_SUMM" => ($arTotalCart['PROMOCODE']) ? $arTotalCart['PROMOCODE'] : $arTotalCart['DISCOUNT_FROM_SUMM_ORDER'],
                "QUANTITY" => floatval($arTotalCart['QUANTITY']),
                "PAYMENT" => 'N', // всегда 0 по умолчанию. Меняется после оплаты, либо вручную администратором
                //"PAYMENT_DATE" => '',
                "PAYMENT_ID" => $arPayment['NAME'],
                "PAYMENT_TYPE" => $arPayment['PAYMENT_TYPE'],
                "CANCELED" => 0,
                //"CANCELED_DATE" => '',
                "DELIVERY" => $arDelivery['NAME'],
                "DELIVERY_PRICE" => $arDelivery['PRICE'],
                "USER_ID" => $USER_ID,
                "USER_NAME" => $sqlHelper->forSql($arFields['USER']['NAME']),
                "USER_EMAIL" => $sqlHelper->forSql($arFields['USER']['EMAIL']),
                "USER_PHONE" => $sqlHelper->forSql($arFields['USER']['PHONE']),
                "USER_INDEX" => $arFields['USER']['INDEX'],
                "USER_CITY" => $arFields['USER']['CITY'],
                "USER_STREET" => $arFields['USER']['STREET'],
                "USER_HOUSE" => $arFields['USER']['HOUSE'],
                "USER_APP" => $arFields['USER']['APP'],
                //"USER_ADDRESS" => $sqlHelper->forSql($arFields['USER']['ADDRESS']),
                "USER_COMMENT" => $sqlHelper->forSql($arFields['USER']['COMMENT']),
                "USER_TYPE" => $sqlHelper->forSql($arFields['USER']['USER_TYPE']),
                "DATA" => json_encode($DATA), // Зарезервировано
            );

            $addSQL = OrdersTable::add($orderFileldsAdd);
            if ($addSQL->isSuccess()) {
                $arResult["ORDER_ID"] = $addSQL->getId();

                self::addOrderItem($arResult["ORDER_ID"], $arProducts);
                WorkCart::deleteCookie('userCart');

                if($arTotalCart['DISCOUNT_MULTI']=='N'){
                    DiscountTable::update($arTotalCart['DISCOUNT_ID'], array('ACTIVE'=>'N'));
                }

                $arFieldsOrder = $orderFileldsAdd;
                $arFieldsOrder['ORDER_ID'] = $arResult["ORDER_ID"];
                $arFieldsOrder['EMAIL'] = $arFields['USER']['EMAIL'];

                $arFieldsOrder['USER_ADDRESS'] = ($orderFileldsAdd['USER_INDEX']) ? $orderFileldsAdd['USER_INDEX'].', ' :'';
                $arFieldsOrder['USER_ADDRESS'] .= ($orderFileldsAdd['USER_CITY']) ? $orderFileldsAdd['USER_CITY'].',' : '';
                $arFieldsOrder['USER_ADDRESS'] .= ($orderFileldsAdd['USER_STREET']) ? $orderFileldsAdd['USER_STREET'].',' : '';
                $arFieldsOrder['USER_ADDRESS'] .= $orderFileldsAdd['USER_HOUSE'];
                $arFieldsOrder['USER_ADDRESS'] .= ($orderFileldsAdd['USER_APP']) ? ', '.GetMessage("ARLIGHT_ARSTORE_KV_OF").$orderFileldsAdd['USER_APP'] : '';

                /*
                    Список товаров для почтового события
                    Если необходимо модифицировать таблицу с товарами копируем файл product_list_for_email_message_default.php
                    и переименовываем в product_list_for_email_message.php - после этого изменения не затрутся
                */
                $file = new IO\File(Application::getDocumentRoot() . '/bitrix/components/itertech/checkout/product_list_for_email_message.php');
                if(!$file->isExists()){
                    $file = new IO\File(Application::getDocumentRoot() . '/bitrix/components/itertech/checkout/product_list_for_email_message_default.php');
                }
                $ORDER_LIST = require_once($file->getPath());
                // END

                $arFieldsOrder['ORDER_LIST'] = $ORDER_LIST;
                CEvent::Send("ITERTECH_CREATE_ORDER", $SITE_ID, $arFieldsOrder);

            } else {
                $arResult["STATUS"] = false;
                $error = $addSQL->getErrorMessages();
                $arResult["ERROR"] = 'ERROR <pre>' . var_export($error, true) . '</pre>';  // Добавить языковую переменную с сообщением об ошибках
            }
        }

        return $arResult;
    }


    /* Добавление товара к заказу */
    static public function addOrderItem($orderId, $arProducts)
    {
        $arResult = array();
        foreach ($arProducts as $product) {


            $addSQL = OrdersItemsTable::add(array(
                "ORDER_ID" => $orderId,
                "PRODUCT_ID" => (int)$product["ID"],
                "ARTNUMBER" => $product["ARTNUMBER"],
                "QUANTITY" => floatval($product["QUANTITY"]),
                "PRICE" => $product["PRICE_MATH"],
                "DISCOUNT" => $product["OLDPRICE_MATH"]-$product["PRICE_MATH"],
                "CURRENCY" => "RUB", // вынести в настройки
                "NAME" => $product["NAME"],
                "DESCRIPTION" => $product["DESCRIPTION"],
                "URL" => $product["DETAIL_PAGE_URL"],
                "IMAGE" => $product["IMAGE"],
                "INSTOCK" => $product["INSTOCK"],
                "PACKAGE" => $product["PACKAGE"],
                "PACKAGE_COUNT" => $product["PACKAGE_COUNT"],
                "UNIT" => $product["UNIT"],
                "DATA" => "", // Зарезервировано
            ));
            if ($addSQL->isSuccess()) {
                $arResult["ID"] = $addSQL->getId();
            } else {
                $arResult["ID"] = false;
                $error = $addSQL->getErrorMessages();
                $arResult["ERROR"] = 'ERROR <pre>' . var_export($error, true) . '</pre>';
            }
        }
        return $arResult;
    }

    /* Получаем список заказов */
    static public function getOrders($SITE_ID, $filter = false)
    {

        $arFilter = array('SITE_ID' => $SITE_ID);
        if($filter){
            $arFilter = array_merge ($arFilter, $filter);
        }

        $setPageSize = Option::get(self::$module_id, 'PAGENAV_'.$SITE_ID);

        $nav = new \Bitrix\Main\UI\PageNavigation("p");
        $nav->allowAllRecords(true)
            ->setPageSize($setPageSize)
            ->initFromUri();

        $arOrders = array();

        $arOrders['STATUSES'] = self::getStatus($SITE_ID);

        $resOrders = OrdersTable::getList(
            array(
                'select' => array('*'),
                'filter' => $arFilter,
                'order' => array('ID' => 'DESC'),
                "count_total" => true,
                "offset" => $nav->getOffset(),
                "limit" => $nav->getLimit(),
            ));

        $nav->setRecordCount($resOrders->getCount());

        while ($ob = $resOrders->fetch()) {
            $arOrders['ORDERS'][$ob['ID']] = $ob;
            $arOrders['ORDERS'][$ob['ID']]['STATUS'] = ($arOrders['STATUSES'][$ob['STATUS']]) ? $arOrders['STATUSES'][$ob['STATUS']] : array('NAME'=>$ob['STATUS']);
            $orderIds[] = $ob['ID'];
        }


        // Готовим массив с товарами в заказе
        $resProducts = OrdersItemsTable::getList(
            array(
                'select' => array('*'),
                'filter' => array('ORDER_ID' => $orderIds),
                'order' => array('ID' => 'ASC'),
            ));
        // добавим в массив заказов подмассив с товарами заказа
        while ($pb = $resProducts->fetch()) {
            $arOrders['ORDERS'][$pb['ORDER_ID']]['PRODUCTS'][] = $pb;
        }
        $arOrders['NAV'] = $nav;

        return $arOrders;
    }


    /* Способы доставки */
    static public function getDelivery($SITE_ID, $returnAll = false){
        $arFilter = array('SITE_ID' => $SITE_ID);
        if(!$returnAll){
            $arFilter['ACTIVE'] = 'Y';
        }
        $res = DeliveryTable::getList(
            array(
                'select' => array('*'),
                'filter' => $arFilter,
                'order' => array('SORT' => 'ASC'),
            ));
        while ($ob = $res->fetch())
        {
            $result[$ob['ID']] = $ob;
        }
        return $result;
    }

    /* Способы оплаты */
    static public function getPayment($SITE_ID, $returnAll = false, $filter = false){
        $arFilter = array('SITE_ID' => $SITE_ID);
        if(!$returnAll){
            $arFilter['ACTIVE'] = 'Y';
        }
        if($filter){
            $arFilter = array_merge ($arFilter, $filter);
        }
        $res = PaymentTable::getList(
            array(
                'select' => array('*'),
                'filter' => $arFilter,
                'order' => array('SORT' => 'ASC'),
            ));
        while ($ob = $res->fetch())
        {
            $arResult[$ob['ID']] = $ob;
        }
        return $arResult;
    }

    /* Статусы */
    static public function getStatus($SITE_ID, $returnAll = false, $filter = false){
        $arFilter = array('SITE_ID' => $SITE_ID);
        if(!$returnAll){
            $arFilter['ACTIVE'] = 'Y';
        }
        if($filter){
            $arFilter = array_merge ($arFilter, $filter);
        }
        $res = StatusTable::getList(
            array(
                'select' => array('*'),
                'filter' => $arFilter,
                'order' => array('SORT' => 'ASC'),
            ));
        while ($ob = $res->fetch())
        {
            $arResult[$ob['ID']] = $ob;
        }
        return $arResult;
    }

    /* Список типов скидок */
    static public function getDiscountType($DISCOUNT_TYPE, $PROMOCODE_OR_SUMM = false)
    {
        $discountTypeText = '';
        switch ($DISCOUNT_TYPE) {
            case 'summ':
                $discountTypeText = GetMessage("ARLIGHT_ARSTORE_OT_SUMMY").$PROMOCODE_OR_SUMM;
                break;
            case 'promo':
                $discountTypeText = GetMessage("ARLIGHT_ARSTORE_PROMOKOD").$PROMOCODE_OR_SUMM;
                break;
            case 'group+summ':
                $discountTypeText = GetMessage("ARLIGHT_ARSTORE_GRUPPOVAA_OT_SUMMY").$PROMOCODE_OR_SUMM;
                break;
            case 'group+promo':
                $discountTypeText = GetMessage("ARLIGHT_ARSTORE_GRUPPOVAA_PROMOKOD").$PROMOCODE_OR_SUMM;
                break;
            case 'group':
                $discountTypeText = GetMessage("ARLIGHT_ARSTORE_GRUPPOVAA");
                break;
            case 'custom':
                $discountTypeText = GetMessage("ARLIGHT_ARSTORE_INDIVIDUALQNAA");
                break;
        }
        return $discountTypeText;
    }											  


}