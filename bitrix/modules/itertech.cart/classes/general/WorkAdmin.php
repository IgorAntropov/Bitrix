<?
// ???????? ?? ?????? (?????? ????? ??????)
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/access.php");

use \Itertech\Cart\DeliveryTable,
    \Bitrix\Main\Type,
    \Itertech\Cart\PaymentTable,
    \Itertech\Cart\StatusTable,
    \Itertech\Cart\DiscountTable,
    \Itertech\Cart\OrdersTable,
    \Itertech\Cart\OrdersItemsTable,
    \Bitrix\Main\Context,
    \Bitrix\Main\Application,
    \Bitrix\Main\IO;


class WorkAdmin
{
    static public $module_id = 'itertech.cart';

    /* ?????? ? ?????????? */
    static public function addDelivery()
    {
        $error = false;

        $request = Context::getCurrent()->getRequest();

        $arDeliveries = WorkOrder::getDelivery(SITE_ID, 'Y');
        $arResult = $arDeliveries[$request['id']];
        if(!$arResult['DELIVERY_TYPE']){
            $arResult['DELIVERY_TYPE'] = ($request['DELIVERY_TYPE']) ? $request['DELIVERY_TYPE'] : 'custom';
        }
        if($arResult['DATA']){
            $arResult['DATA'] = json_decode($arResult['DATA'], true);
        }

//        if((!$request['id'])){
//            $error = 1;
//        }

        if (check_bitrix_sessid() && $request->isPost() && $request['field'] && !$error) {
            $arFields = $request['field'];
            $arFieldsDelete = $request['field_del'];

            if(!$arFields['ACTIVE']){
                $arFields['ACTIVE'] = 'N';
            }

            if($arFields['DATA']){
                if(is_array($arFields['DATA'])){
                    foreach ($arFields['DATA'] as $keyD => $DATUM) {
                        if(!$DATUM){
                            unset($arFields['DATA'][$keyD]);
                        }
                    }
                }
                $arFields['DATA'] = json_encode($arFields['DATA']);
            }

            if(!$arFields['NAME']){
                $error = GetMessage('ERROR').' '.GetMessage("ARLIGHT_ARSTORE_NE_ZAPOLNENO_OBAZATE");
            }

            /* ???????? ? ??????????? ???????????  */
                /* ???? ????? ?????????*/
            if($arFieldsDelete){
                foreach ($arFieldsDelete as $key => $arFieldsDel) {
                    if($arFieldsDel=="Y"){
                        $idFile = $arFields[$key];
                        CFile::Delete($idFile);
                        $arFields[$key] = null;
                    }
                }
            }

                /* ???? ????? ??????????? ??? ?????????? */
            if($arFields['IMAGE']['size'] && !$arFields['IMAGE']['error']){
                $arFields['IMAGE']['tmp_name'] = $_SERVER["DOCUMENT_ROOT"].  '/upload/tmp'.$arFields['IMAGE']['tmp_name'];
                $arFields['IMAGE']['MODULE_ID'] = self::$module_id;
                $arFields['IMAGE']['old_file'] = $arFields['OLD_IMAGE'];
                $arFields['IMAGE']['del'] = 'Y';
                $fileId = CFile::SaveFile($arFields['IMAGE'], self::$module_id);
                if (intval($fileId)>0) {
                    $arFields["IMAGE"] = intval($fileId);
                }
            }
            /* */

            if($arFields['ID']){

                // ??????? ???????
                if($arFields['REMOVE']=='Y'){

                    if($arFields['ID'] != 1){
                        if($arFields['IMAGE']){
                            CFile::Delete($arFields['IMAGE']);
                        }
                        $addSQL = DeliveryTable::delete($arFields['ID']);
                        if (!$addSQL->isSuccess()) {
                            $error = $addSQL->getErrorMessages();
                            $error = GetMessage('ERROR').implode('<p>', $error);
                        }
                    } else {
                        $error = GetMessage('ERROR').GetMessage('ERROR_REMOVE_ID_1');
                    }

                } else {
                    // ????????? ???????
                    $addSQL = DeliveryTable::update($request['field']['ID'], $arFields);
                    if (!$addSQL->isSuccess()) {
                        $error = $addSQL->getErrorMessages();
                        $error = GetMessage('ERROR').implode('<p>', $error);
                    }
                }
            } else {
                // ????????? ???????
                $addSQL = DeliveryTable::add($arFields);
                if (!$addSQL->isSuccess()) {
                    $error = $addSQL->getErrorMessages();
                    $error = GetMessage('ERROR').implode('<p>', $error);
                }
            }
            if(!$error){
                LocalRedirect(SITE_DIR . 'admin/settings/delivery/');
            } else {
                $arResult['ERROR'] = $error;
            }
        }

        return $arResult;

    }

    /* ?????? ? ????????? */
    static public function addPayment()
    {
        $error = false;

        $request = Context::getCurrent()->getRequest();

        $arPayments = WorkOrder::getPayment(SITE_ID, 'Y');
        $arResult = $arPayments[$request['id']];
        if(!$arResult['PAYMENT_TYPE']){
            $arResult['PAYMENT_TYPE'] = ($request['PAYMENT_TYPE']) ? $request['PAYMENT_TYPE'] : 'custom';
        }
        if($arResult['DATA']){
            $arResult['DATA'] = json_decode($arResult['DATA'], true);
        }


        if (check_bitrix_sessid() && $request->isPost() && $request['field'] && !$error) {

            $arFields = $request['field'];
            $arFieldsDelete = $request['field_del'];
            if(!$arFields['ACTIVE']){
                $arFields['ACTIVE'] = 'N';
            }
            if($arFields['DATA']){
                if(is_array($arFields['DATA'])){
                    foreach ($arFields['DATA'] as $keyD => $DATUM) {
                        if(!$DATUM){
                            unset($arFields['DATA'][$keyD]);
                        }
                    }
                }
                $arFields['DATA'] = json_encode($arFields['DATA']);
            }

            if(!$arFields['NAME']){
                $error = GetMessage('ERROR').' '.GetMessage("ARLIGHT_ARSTORE_NE_ZAPOLNENO_OBAZATE");
            }

            /* ???????? ? ??????????? ???????????  */
            /* ???? ????? ?????????*/
            if($arFieldsDelete){
                foreach ($arFieldsDelete as $key => $arFieldsDel) {
                    if($arFieldsDel=="Y"){
                        $idFile = $arFields[$key];
                        CFile::Delete($idFile);
                        $arFields[$key] = null;
                    }
                }
            }

            /* ???? ????? ??????????? ??? ?????????? */
            if($arFields['IMAGE']['size'] && !$arFields['IMAGE']['error']){
                $arFields['IMAGE']['tmp_name'] = $_SERVER["DOCUMENT_ROOT"].  '/upload/tmp'.$arFields['IMAGE']['tmp_name'];
                $arFields['IMAGE']['MODULE_ID'] = self::$module_id;
                $arFields['IMAGE']['old_file'] = $arFields['OLD_IMAGE'];
                $arFields['IMAGE']['del'] = 'Y';
                $fileId = CFile::SaveFile($arFields['IMAGE'], self::$module_id);
                if (intval($fileId)>0) {
                    $arFields["IMAGE"] = intval($fileId);
                }
            }
            /* */


            if($request['field']['ID']){
                // ??????? ???????
                if($arFields['REMOVE']=='Y'){

                    if($arFields['IMAGE']){
                        CFile::Delete($arFields['IMAGE']);
                    }
                    $addSQL = PaymentTable::delete($arFields['ID']);
                    if (!$addSQL->isSuccess()) {
                        $error = $addSQL->getErrorMessages();
                        $error = GetMessage('ERROR').implode('<p>', $error);
                    }
                } else {
                    // ????????? ???????
                    $addSQL = PaymentTable::update($request['field']['ID'], $arFields);
                    if (!$addSQL->isSuccess()) {
                        $error = $addSQL->getErrorMessages();
                        $error = GetMessage('ERROR').implode('<p>', $error);
                    }
                }
            } else {
                // ????????? ???????
                $addSQL = PaymentTable::add($arFields);
                if (!$addSQL->isSuccess()) {
                    $error = $addSQL->getErrorMessages();
                    $error = GetMessage('ERROR').implode('<p>', $error);
                }
            }
            if(!$error){
                LocalRedirect(SITE_DIR . 'admin/settings/payment/');
            } else {
                $arResult['ERROR'] = $error;
            }

        }

        return $arResult;

    }

    /* ?????? ?? ????????? */
    static public function addStatus()
    {
        $request = Context::getCurrent()->getRequest();

        $arStatus = WorkOrder::getStatus(SITE_ID, 'Y');
        $arResult = $arStatus[$request['id']];


        if (check_bitrix_sessid() && $request->isPost() && $request['field']) {
            $error = false;

            $arFields = $request['field'];

            if(!$arFields['ACTIVE']){
                $arFields['ACTIVE'] = 'N';
            }
            if(!$arFields['SEND_MESSAGE']){
                $arFields['SEND_MESSAGE'] = 'N';
            }
            if(!$arFields['DEFAULT']){
                $arFields['DEFAULT'] = 'N';
            }
            if(!$arFields['FOR_PAYMENT']){
                $arFields['FOR_PAYMENT'] = 'N';
            }
            if(!$arFields['NAME']){
                $error = GetMessage('ERROR').' '.GetMessage("ARLIGHT_ARSTORE_NE_ZAPOLNENO_OBAZATE");
            }

            // ???? ? ?????? ?? ???????? ?????????? ???????? "?? ?????????" - ???????
            foreach ($arStatus as $status) {
                if($status['DEFAULT']=='Y' && $arFields['DEFAULT']=='Y'){
                    StatusTable::update($status['ID'], array('DEFAULT'=>'N'));
                }
            }

            if($arFields['ID']){
                // ??????? ???????
                if($arFields['REMOVE']=='Y'){
                    $addSQL = StatusTable::delete($arFields['ID']);
                    if (!$addSQL->isSuccess()) {
                        $error = $addSQL->getErrorMessages();
                        $error = GetMessage('ERROR').implode('<p>', $error);
                    }
                } else {
                    // ????????? ???????
                    $addSQL = StatusTable::update($arFields['ID'], $arFields);
                    if (!$addSQL->isSuccess()) {
                        $error = $addSQL->getErrorMessages();
                        $error = GetMessage('ERROR').implode('<p>', $error);
                    }
                }
            } else {
                // ????????? ???????
                $addSQL = StatusTable::add($arFields);
                if (!$addSQL->isSuccess()) {
                    $error = $addSQL->getErrorMessages();
                    $error = GetMessage('ERROR').implode('<p>', $error);
                }
            }
            if(!$error){
                LocalRedirect(SITE_DIR . 'admin/settings/status/');
            } else {
                $arResult['ERROR'] = $error;
            }

        }

        return $arResult;

    }

    /* ?????? ?? ????????, ??????????????, ???????? */
    static public function addDiscount($filterDiscount = false)
    {
        $request = Context::getCurrent()->getRequest();
        $isEditPage = (preg_match("!/edit/!si",$request->getRequestUri())) ? true : false;
        $type = 'group';
        if (preg_match("!/summ/!si",$request->getRequestUri())) {
            $type = 'summ';
        }
        if (preg_match("!/promo/!si",$request->getRequestUri())) {
            $type = 'promo';
        }

        $arResult = array();

        /* ??????? ????? ?? ??????? */
        if($type == 'group'){
            $rsGroups = CGroup::GetList($by = "c_sort", $order = "asc");
            $USER_GROUPS = array();
            while($arGroups = $rsGroups->Fetch())
            {
                if (!preg_match("!front!si",$arGroups['STRING_ID']))
                    continue;
                $USER_GROUPS[$arGroups['ID']] = $arGroups;
            }
            if($request['id']){
                $arResult = $USER_GROUPS[$request['id']];
            } else {
                $arResult['GROUPS'] = $USER_GROUPS;
            }

            /* ??????? ????????????? */
            if($request['id'] || $isEditPage){
                $rsUsers = CUser::GetList($by = "date_register", $order = "desc", array(), array('FIELDS'=>array('ID', 'NAME', 'LAST_NAME', 'EMAIL')));
                while($arUsers = $rsUsers->Fetch())
                {
                    $arUsers['GROUPS'] = CUser::GetUserGroup($arUsers['ID']);
                    $arResult['USERS'][] = $arUsers;
                    $arResult['USERS_IDS'][] = $arUsers['ID'];
                }
            }
        }


        $arResult['DISCOUNT'] = WorkCart::getDiscount(SITE_ID, 'Y', $filterDiscount);
        if($isEditPage && !$arResult['DISCOUNT']) {
            $arResult['DISCOUNT'] = array('DISCOUNT'=>10);
            $needFixDiscount = true;
        }


        if (check_bitrix_sessid() && $request->isPost() && $request['field']) {
            $error = false;

            $arFields = $request['field'];

            if(!$arFields['ACTIVE']){
                $arFields['ACTIVE'] = 'N';
            }
            if(!$arFields['USERS']){
                $arFields['USERS'] = array();
            }

            if(!$arFields['DISCOUNT']['TYPE']){
                $arFields['DISCOUNT']['TYPE'] = 'group';
            }

            if(($arFields['DISCOUNT']['TYPE']=='summ' || $arFields['DISCOUNT']['TYPE']=='promo') && !$arFields['NAME']){
                $arFields['SORT'] = 0;
            }

            if(!$arFields['NAME'] && $type == 'group'){
                $error = GetMessage('ERROR').' '.GetMessage("ARLIGHT_ARSTORE_NE_ZAPOLNENO_OBAZATE");
            }

            if($arFields['DISCOUNT']['DISCOUNT'] > 25){
                $error = GetMessage('ERROR').' '.GetMessage("ARLIGHT_ARSTORE_SKIDKA_NE_MOJET_BYTQ");
            }

            if(!$arFields['DISCOUNT']['PERCENT']){
                $arFields['DISCOUNT']['PERCENT'] = 'N';
            }
            if(!$arFields['DISCOUNT']['ACTIVE']){
                $arFields['DISCOUNT']['ACTIVE'] = 'N';
            }
            if($arFields['ACTIVE'] == 'N' && $type == 'group'){
                $arFields['DISCOUNT']['ACTIVE'] = 'N';
            }

            if($arFields['DISCOUNT']['DATE_FROM']){
                $arFields['DISCOUNT']['DATE_FROM'] = new \Bitrix\Main\Type\DateTime($arFields['DISCOUNT']['DATE_FROM']. '00:00:00');
            }
            if($arFields['DISCOUNT']['DATE_TO']){
                $arFields['DISCOUNT']['DATE_TO'] = new \Bitrix\Main\Type\DateTime($arFields['DISCOUNT']['DATE_TO']. '00:00:00');
            }
            if(!$arFields['DISCOUNT']['DATE_FROM'] && $arFields['DISCOUNT']['DATE_TO']){
                $arFields['DISCOUNT']['DATE_FROM'] = new Type\DateTime();
            }

            if($arFields['DISCOUNT']['PERIOD'] == 'all'){
                $arFields['DISCOUNT']['DATE_FROM'] = '';
                $arFields['DISCOUNT']['DATE_TO'] = '';
            }

            // ID ?????????????, ??????? ?? ????????? ?????? ?? ?????
            $arFields['EXCLUDE_DISCOUNT_SUMM'] = array_diff($arResult['USERS_IDS'], $arFields['EXCLUDE_DISCOUNT_SUMM']);
            if($arFields['EXCLUDE_DISCOUNT_SUMM']){
                $DATA['EX_DISC_SUMM_USER'] = array_values($arFields['EXCLUDE_DISCOUNT_SUMM']);
            }

            $group = new CGroup;
            $arGroupFields = Array(
                "C_SORT"       => $arFields['SORT'],
                "NAME"         => $arFields['NAME'],
                "DESCRIPTION"  => $arFields['DESCRIPTION'],
                "USER_ID"      => $arFields['USERS'],
                "ACTIVE"      => $arFields['ACTIVE']
            );

            $arDiscountFields = array(
                'SITE_ID' => $arFields['SITE_ID'],
                'NAME' => GetMessage("ARLIGHT_ARSTORE_SKIDKA").(($arFields['DISCOUNT']['PERCENT']=='Y') ? $arFields['DISCOUNT']['DISCOUNT'].'%' : $arFields['DISCOUNT']['DISCOUNT']),
                'DISCOUNT' => $arFields['DISCOUNT']['DISCOUNT'],
                'DESCRIPTION' => $arFields['DISCOUNT']['DESCRIPTION'],
                'PERCENT' => $arFields['DISCOUNT']['PERCENT'],
                'GROUPS' => ($type=='group') ? $arFields['ID'] : 0,
                'ACTIVE' => $arFields['DISCOUNT']['ACTIVE'],
                'TYPE' => $arFields['DISCOUNT']['TYPE'],
                'SUMM_ORDER' => $arFields['DISCOUNT']['SUMM_ORDER'],
                'MULTI' => $arFields['DISCOUNT']['MULTI'],
                'PROMOCODE' => $arFields['DISCOUNT']['PROMOCODE'],
                'DATE_FROM' => $arFields['DISCOUNT']['DATE_FROM'],
                'DATE_TO' => $arFields['DISCOUNT']['DATE_TO'],
                'DATA' => json_encode($DATA),
                'SORT' => $arFields['SORT'] // ?????????? ?????? ????? ?? ??? ? ? ?????
            );

            if($request['field']['ID']){
                // ????????? ?????? ? ????????
                if($arFields['DISCOUNT']['TYPE']=='group'){
                    // ??????? ?????? ? ??????
                    if($arFields['REMOVE']=='Y'){
                        if($group->Delete($arFields['ID']))
                        {
                            $error = self::DiscountTableDelete($arFields['DISCOUNT']['ID']);
                        }
                    } else {
                        // ????????? ??????
                        $group->Update($arFields['ID'], $arGroupFields);
                        if (strlen($group->LAST_ERROR)>0) {
                            ShowError($group->LAST_ERROR);
                        } else {
                            // ????????? ?????? ??? ??????
                            $error = self::DiscountTableUpdate($arFields['DISCOUNT']['ID'], $arDiscountFields);
                            // ???? ?? ????? ?? ??????? ?????? ??? ????, ? ?????? ???? ???? - ??????? ??????
                            if($needFixDiscount) {
                                $arDiscountFields['GROUPS'] = $arFields['ID'];
                                $error = self::DiscountTableAdd($arDiscountFields);
                            }
                        }
                    }
                } else {
                    // ????????? ?????? ?? ????? ?????? ? ??????????
                    if($arFields['REMOVE']=='Y'){
                        // ??????? ??????
                        $error .= self::DiscountTableDelete($arFields['DISCOUNT']['ID']);
                    } else {
                        // ????????? ??????
                        $error .= self::DiscountTableUpdate($arFields['DISCOUNT']['ID'], $arDiscountFields);
                    }
                }

            } else {

                // ????????? ?????? ? ????????
                if($arFields['DISCOUNT']['TYPE']=='group') {
                    // ????????? ??????
                    $arGroupFields['STRING_ID'] = 'front_'.getmicrotime();
                    $NEW_GROUP_ID = $group->Add($arGroupFields);
                    if (strlen($group->LAST_ERROR)>0){
                        ShowError($group->LAST_ERROR);
                    } else {
                        // ????????? ?????? ??? ??????
                        $arDiscountFields['GROUPS'] = $NEW_GROUP_ID;
                        $error = self::DiscountTableAdd($arDiscountFields);
                    }
                }
                // ????????? ?????? ?? ????? ?????? ? ??????????
                else {
                    // ????????? ??????
                    $error .= self::DiscountTableAdd($arDiscountFields);
                }
            }
            if(!$error){
                LocalRedirect(SITE_DIR . 'admin/settings/discount/'.(($type!='group') ? $type.'/' : ''));
            } else {
                $arResult['ERROR'] = $error;
            }

        }

        return $arResult;

    }
    static private function DiscountTableDelete($ID){
        $error = '';
        $addSQL = DiscountTable::delete($ID);
        if (!$addSQL->isSuccess()) {
            $error = $addSQL->getErrorMessages();
            $error = GetMessage('ERROR').implode('<p>', $error);
        }
        return $error;
    }
    static private function DiscountTableUpdate($ID, $FIELDS){
        $error = '';
        $addSQL = DiscountTable::update($ID, $FIELDS);
        if (!$addSQL->isSuccess()) {
            $error = $addSQL->getErrorMessages();
            $error = GetMessage('ERROR').implode('<p>', $error);
        }
        return $error;
    }
    static private function DiscountTableAdd($FIELDS){
        $error = '';
        $addSQL = DiscountTable::add($FIELDS);
        if (!$addSQL->isSuccess()) {
            $error = $addSQL->getErrorMessages();
            $error = GetMessage('ERROR').implode('<p>', $error);
        }
        return $error;
    }


    /* ??????????? ????? ??????? */
    static public function editOrder()
    {
        $request = Context::getCurrent()->getRequest();
        if (check_bitrix_sessid() && $request->isPost() && $request['field']) {

            $orderId = $request['order'];

            $arFields = $request['field'];

            $arFields['SITE_ID'] = SITE_ID;
            $arFields['DATE_CHANGE'] = new Type\DateTime();

            $arDelivery = DeliveryTable::getById($arFields['DELIVERY_ID'])->fetch();
            $arPayment = PaymentTable::getById($arFields['PAYMENT_ID'])->fetch();
            $arStatus = StatusTable::getById($arFields['STATUS'])->fetch();

            $arFields['DELIVERY'] = $arDelivery['NAME'];
            $arFields['DELIVERY_PRICE'] = $arDelivery['PRICE'];
            $arFields['PAYMENT_ID'] = $arPayment['NAME'];
            $arFields['STATUS'] = $arStatus['ID'];

            if($arFields['PAYMENT']=='Y'){
                $arFields['PAYMENT_DATE'] = new Type\DateTime();
            } else {
                $arFields['PAYMENT_DATE'] = null;
            }

            if($arFields['REMOVE']=='Y'){

                 // ??????? ?????? ?? ??????
                foreach ($arFields['PRODUCTS'] as $PRODUCT) {
                    $addSQL = OrdersItemsTable::delete($PRODUCT);
                    if (!$addSQL->isSuccess()) {
                        $error = $addSQL->getErrorMessages();
                        $arResult["ERROR"] = 'ERROR <pre>' . var_export($error, true) . '</pre>';
                        die($arResult["ERROR"]);
                    }
                }
                // ??????? ?????
                $addSQL = OrdersTable::delete($orderId);
                if (!$addSQL->isSuccess()) {
                    $error = $addSQL->getErrorMessages();
                    $arResult["ERROR"] = 'ERROR <pre>' . var_export($error, true) . '</pre>';
                    die($arResult["ERROR"]);
                }

                LocalRedirect(SITE_DIR.'admin/');

            } else {

                // ?????? ?????????? ?? ???????? ??????
                $orderInfo = WorkOrder::getOrders(SITE_ID, array('ID'=>$orderId));

                // ???????? ???? ?? ?????????????????/?????????? ???????
                $arProducts = $arProductsUpd = WorkCart::getItemsFromCart(
                    array(
                        'IDS_CART'=>$arFields['PRODUCTS_NEW'],
                        'USER_ID'=>$orderInfo['ORDERS'][$orderId]['USER_ID'],
                        'CUSTOM_DISCOUNT'=>trim($arFields['CUSTOM_DISCOUNT'])
                    )
                );

                // ?????????? ???-?? ?????? ? ?????? ? ? ????????????????? ??????. ???? ??????????, ???? ????????? ?????? ?? ????????
                foreach ($orderInfo['ORDERS'][$orderId]['PRODUCTS']  as $orderProduct) {
                    if($orderProduct['QUANTITY'] != $arProductsUpd['PRODUCTS'][$orderProduct['PRODUCT_ID']]['QUANTITY'] || $arFields['UPDATE_PRODUCTS']){
                        $arProductsUpd['REMOVE'][] = $orderProduct['ID'];
                    } else {
                        unset($arProductsUpd['PRODUCTS'][$orderProduct['PRODUCT_ID']]);
                    }
                }

                $arFields['SUMM'] = $arProductsUpd['TOTALCART']['SUMM_MATH'];
                $arFields['QUANTITY'] = $arProductsUpd['TOTALCART']['QUANTITY'];
                $arFields['DISCOUNT'] = $arProductsUpd['TOTALCART']['DISCOUNT_SUMM_MATH']+$arProductsUpd['TOTALCART']['DISCOUNT_SUMM_DOP_MATH'];
                $arFields['DISCOUNT_PERCENT'] = $arProductsUpd['TOTALCART']['DISCOUNT_PERCENT_MATH'].(($arProductsUpd['TOTALCART']['DISCOUNT_PERCENT_MATH_DOP']) ? '+'.$arProductsUpd['TOTALCART']['DISCOUNT_PERCENT_MATH_DOP'] : '');
                $arFields['DISCOUNT_TYPE'] = $arProductsUpd['TOTALCART']['DISCOUNT_TYPE'];
                if($arFields['DISCOUNT_TYPE']=='summ' || $arFields['DISCOUNT_TYPE']=='group+summ'){
                    $arFields['PROMOCODE_OR_SUMM'] = $arProductsUpd['TOTALCART']['DISCOUNT_FROM_SUMM_ORDER'];
                }
                if($arFields['DISCOUNT_TYPE']=='promo' || $arFields['DISCOUNT_TYPE']=='group+promo'){
                    $arFields['PROMOCODE_OR_SUMM'] = $arProductsUpd['TOTALCART']['PROMOCODE'];
                }


                // ????????? ?????
                $addSQL = OrdersTable::update($orderId, $arFields);
                if (!$addSQL->isSuccess()) {
                    $error = $addSQL->getErrorMessages();
                    $arResult["ERROR"] = 'ERROR <pre>' . var_export($error, true) . '</pre>';
                    die($arResult["ERROR"]);
                } else {

                    // ??????? ?????? ?? ??????, ???? ???????? ?????????
                    if($arProductsUpd['REMOVE']){
                        foreach ($arProductsUpd['REMOVE'] as $PRODUCT) {
                            OrdersItemsTable::delete($PRODUCT);
                        }
                    }
                    // ????????? ?????? ? ?????
                    WorkOrder::addOrderItem($orderId, $arProductsUpd['PRODUCTS']);

                    // ??????? ???? ??? ???????????
                    $arTotalCart = $arProducts['TOTALCART'];
                    if($arTotalCart['DISCOUNT_TYPE']=='summ' || $arTotalCart['DISCOUNT_TYPE']=='group+summ'){
                        $arTotalCart['PROMOCODE'] = $arTotalCart['DISCOUNT_FROM_SUMM_ORDER'];
                    }
                    $arProducts = $arProducts['PRODUCTS'];
                    $arFieldsOrder = $arFields;
                    $arFieldsOrder['ORDER_ID'] = $orderId;
                    $arFieldsOrder['DATE_CREATE'] = $orderInfo['ORDERS'][$orderId]['DATE_CREATE'];
                    $arFieldsOrder['EMAIL'] = $arFields['USER_EMAIL'];

                    $arFieldsOrder['USER_ADDRESS'] = ($arFields['USER_INDEX']) ? $arFields['USER_INDEX'].', ' :'';
                    $arFieldsOrder['USER_ADDRESS'] .= ($arFields['USER_CITY']) ? $arFields['USER_CITY'].',' : '';
                    $arFieldsOrder['USER_ADDRESS'] .= ($arFields['USER_STREET']) ? $arFields['USER_STREET'].',' : '';
                    $arFieldsOrder['USER_ADDRESS'] .= $arFields['USER_HOUSE'];
                    $arFieldsOrder['USER_ADDRESS'] .= ($arFields['USER_APP']) ? ', '.GetMessage("ARLIGHT_ARSTORE_KV_OF").$arFields['USER_APP'] : '';

                    /*
                        ?????? ??????? ??? ????????? ???????
                        ???? ?????????? ?????????????? ??????? ? ???????? ???????? ???? product_list_for_email_message_default.php
                        ? ??????????????? ? product_list_for_email_message.php - ????? ????? ????????? ?? ????????
                    */
                    $file = new IO\File(Application::getDocumentRoot() . '/bitrix/components/itertech/checkout/product_list_for_email_message.php');
                    if(!$file->isExists()){
                        $file = new IO\File(Application::getDocumentRoot() . '/bitrix/components/itertech/checkout/product_list_for_email_message_default.php');
                    }
                    $ORDER_LIST = require_once($file->getPath());
                    // END

                    $arFieldsOrder['ORDER_LIST'] = $ORDER_LIST;

                    // ???? ????????????? ?????? - ???????? ?????? ? ?????? ????????????
                    if($arProductsUpd['REMOVE']){
                        CEvent::Send("ITERTECH_CHANGE_ORDER", SITE_ID, $arFieldsOrder);
                    }
                    // ???? ????????? ?????? ?????? - ???????? ??????????? ?????? ? ????? ???????
                    else {
                        if($arFields['STATUS'] != $orderInfo['ORDERS'][$orderId]['STATUS']['ID']){
                            $arFieldsSend = array(
                                'EMAIL' => $arFields['USER_EMAIL'],
                                'NAME' => $arFields['USER_NAME'],
                                'ORDER_STATUS' => $arStatus['NAME'],
                                'ORDER_ID' => $orderId,
                            );
                            CEvent::Send("ITERTECH_CHANGE_ORDER_STATUS", SITE_ID, $arFieldsSend);
                        }
                    }

                    LocalRedirect(SITE_DIR.'admin/order/?order='.$orderId);
                }
            }

        }

    }

}