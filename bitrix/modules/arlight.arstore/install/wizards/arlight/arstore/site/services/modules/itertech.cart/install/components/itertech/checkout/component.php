<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Localization\Loc,
    \Bitrix\Main\Loader,
    \Bitrix\Main\Context,
    \Itertech\Cart\PaymentTable,
    \Itertech\Cart\OrdersTable;

$module_id = 'itertech.cart';

if (!Loader::includeModule($module_id)) {
    ShowError(Loc::getMessage('ITERTECH_CART_NOT_INSTALLED'));
    return false;
}

$request = Context::getCurrent()->getRequest();
$order = (int)$request['order'];

$rsUser = CUser::GetByID($USER->GetID());
$arUser = $rsUser->Fetch();
$phone = $arUser["PERSONAL_PHONE"];
$typePayer = GetMessage("ARLIGHT_ARSTORE_FIZ_LICO");

$rsEnum = CUserFieldEnum::GetList([], ["USER_FIELD_NAME" => "UF_TYPEPAYER", "ID" => $arUser['UF_TYPEPAYER']]);
$arEnum = $rsEnum->GetNext();
if ($arEnum['VALUE'] != '')
    $typePayer = $arEnum['VALUE'];

$arAddress = explode('|', $arUser["PERSONAL_STREET"]);

$arResult['USER_NAME'] = ($request['field']['USER']['NAME']) ? $request['field']['USER']['NAME'] : $USER->GetFullName();
$arResult['USER_EMAIL'] = ($request['field']['USER']['EMAIL']) ? $request['field']['USER']['EMAIL'] : $USER->GetEmail();
$arResult['USER_PHONE'] = ($request['field']['USER']['PHONE']) ? $request['field']['USER']['PHONE'] : $phone;
$arResult['USER_CITY'] = ($request['field']['USER']['CITY']) ? $request['field']['USER']['CITY'] : $arUser["PERSONAL_CITY"];
$arResult['USER_STREET'] = ($request['field']['USER']['STREET']) ? $request['field']['USER']['STREET'] : $arAddress[0];
$arResult['USER_HOUSE'] = ($request['field']['USER']['HOUSE']) ? $request['field']['USER']['HOUSE'] : $arAddress[1];
$arResult['USER_APP'] = ($request['field']['USER']['APP']) ? $request['field']['USER']['APP'] : $arAddress[2];
//$arResult['USER_ADDRESS'] = ($request['field']['USER']['ADDRESS']) ? $request['field']['USER']['ADDRESS'] : '';
$arResult['USER_COMMENT'] = ($request['field']['USER']['COMMENT']) ? $request['field']['USER']['COMMENT'] : '';
$arResult['DELIVERY_ID'] = ($request['field']['DELIVERY_ID']) ? $request['field']['DELIVERY_ID'] : '';
$arResult['PAYMENT_ID'] = ($request['field']['PAYMENT_ID']) ? $request['field']['PAYMENT_ID'] : '';

$userId = $USER->GetID();

$arCart = WorkCart::getItemsFromCart();

$arResult['CART_EMPTY'] = ((int)$arCart['TOTALCART']['QUANTITY']<=0) ? 'Y' : '';

// Если корзина пуста и в запросе нет номера заказа - выведем уведомление
if($arResult['CART_EMPTY']=='Y' && !$order){

    $arResult['ERROR'] = Loc::getMessage('CART_EMPTY');
    $arResult['ERROR_SHOW_CATALOGUE_LINK'] = "Y";

}
else {

    $arResult['DELIVERY'] = WorkOrder::getDelivery(SITE_ID);
    if($arParams['ADD_IMAGE_DELIVERY']=="Y"){
        if(!$arParams['IMAGE_WIDTH_DELIVERY']){
            $arParams['IMAGE_WIDTH_DELIVERY'] = 70;
        }
        if(!$arParams['IMAGE_HEIGHT_DELIVERY']){
            $arParams['IMAGE_HEIGHT_DELIVERY'] = 70;
        }
    }
    foreach ($arResult['DELIVERY'] as $key => $delivery) {
        if($delivery['DATA']){
																																																	  
            $arResult['DELIVERY'][$key]['DATA'] = json_decode($delivery['DATA'], true);
			 
        }
        if($delivery['IMAGE']){
            $img = CFile::ResizeImageGet($delivery['IMAGE'], array('width'=>$arParams['IMAGE_WIDTH_DELIVERY'], 'height'=>$arParams['IMAGE_HEIGHT_DELIVERY']), BX_RESIZE_IMAGE_PROPORTIONAL, true);
            $arResult['DELIVERY'][$key]['IMAGE'] = $img['src'];
        }
    }
    $enable_yd = COption::GetOptionString("setting_su", "enable_yd", 'N');
    foreach ($arResult['DELIVERY'] as $key => $delivery) {
        // todo удалить после тестирования ЯД
        if($enable_yd !='Y' && $delivery['DELIVERY_TYPE']=='YD'){
            unset($arResult['DELIVERY'][$key]);
        }
        //

        if($delivery['DELIVERY_TYPE']=='YD'){
            unset($arResult['DELIVERY'][$key]);
        }

    }

    $arResult['PAYMENT'] = WorkOrder::getPayment(SITE_ID);
    $arResult['PROMOCODE'] = (WorkCart::getCookie('promocode')) ? WorkCart::getCookie('promocode') : false;
    if($arParams['ADD_IMAGE_PAYMENT']=="Y"){
        if(!$arParams['IMAGE_WIDTH_PAYMENT']){
            $arParams['IMAGE_WIDTH_PAYMENT'] = 70;
        }
        if(!$arParams['IMAGE_HEIGHT_PAYMENT']){
            $arParams['IMAGE_HEIGHT_PAYMENT'] = 70;
        }
        foreach ($arResult['PAYMENT'] as $key => $payment) {
            if($payment['IMAGE']){
                $img = CFile::ResizeImageGet($payment['IMAGE'], array('width'=>$arParams['IMAGE_WIDTH_PAYMENT'], 'height'=>$arParams['IMAGE_HEIGHT_PAYMENT']), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                $arResult['PAYMENT'][$key]['IMAGE'] = $img['src'];
            }
        }
    }
    $enable_yk = COption::GetOptionString("setting_su", "enable_yk", 'N');
    foreach ($arResult['PAYMENT'] as $key => $payment) {
		if($payment['PAYMENT_TYPE']=='YK' && $enable_yk !=='Y'){
		    unset($arResult['PAYMENT'][$key]);
		}
    }


    // Добавляем заказ
    if (check_bitrix_sessid() && $request->isPost()) {
        $arCart['FIELDS'] = $request['field'];
        $arCart['FIELDS']['USER']['USER_ID'] = $userId;
        $arCart['FIELDS']['USER']['USER_TYPE'] = $typePayer;
        $resAddOrder = WorkOrder::addOrder($arCart);
        if($resAddOrder['ERROR']){
            $arResult = array_merge($arResult, $resAddOrder);
        } else {
            if($resAddOrder['USER_ID']){
                $userId = $resAddOrder['USER_ID'];
            }
        }
    }


    if($userId > 0 && !$resAddOrder['ERROR']){
        if($resAddOrder['ORDER_ID']){
            // Если способ оплаты онлайн
            $paymentType = $arResult['PAYMENT'][$arCart['FIELDS']['PAYMENT_ID']]['PAYMENT_TYPE'];
            if($paymentType != 'custom' && $paymentType){
                // Получаем информацию по текущему заказу уже из БД, чтобы избежать подмен
                $arOrder = WorkOrder::getOrders(SITE_ID, array('ID' => $resAddOrder['ORDER_ID']));
                $order = $arOrder['ORDERS'][$resAddOrder['ORDER_ID']];
                $req['payorder'] = $paymentType;
                PayOrder::Pay($order, array('payorder'=>$paymentType));
            }
            // Если наличными
            else {
                LocalRedirect(SITE_DIR . "order/?order=" . $resAddOrder['ORDER_ID']);
            }
        }
        $res = OrdersTable::getById($order)->fetch();
        if($userId == $res['USER_ID']){
            $arResult['ORDER_ID'] = $res['ID'];
            $arResult['ORDER_DATE'] = $res['DATE_CREATE'];
            $arResult['PAYMENT_TYPE'] = $res['PAYMENT_TYPE'];
            $arResult['PAYMENT_ID'] = $res['PAYMENT_ID'];
            $arResult['PAYMENT'] = $res['PAYMENT'];
            if($res['DATA']){
                $res['DATA'] = json_decode($res['DATA'], true);
                foreach ($res['DATA'] as $keyD => $DATUM) {
                    if($keyD=='PID'){
                        $pidInfo = PaymentTable::getById($DATUM)->fetch();
                        $arResult['PAYMENT_DATA'] = json_decode($pidInfo['DATA'], true);
                    }
                }
            }


        } else {

            // если в адресной строке есть номер заказа, но это не заказ текущего пользователя - уведомление
            if($order){
                $arResult['ERROR'] = Loc::getMessage('ORDER_NOT_FOUND');
                $arResult['CART_EMPTY'] = 'Y';
            }

        }

    }
}

$this->IncludeComponentTemplate();
?>

