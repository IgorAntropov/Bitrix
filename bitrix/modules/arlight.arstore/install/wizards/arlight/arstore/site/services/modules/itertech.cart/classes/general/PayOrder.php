<?
require $_SERVER["DOCUMENT_ROOT"] . '/bitrix/modules/itertech.cart/classes/api/yandex.kassa/autoload.php';
use YandexCheckout\Client,
    \Itertech\Cart\OrdersTable,
    \Bitrix\Main\Type;

class PayOrder
{
    static public function Pay($order, $request = false){
        $arPayment = WorkOrder::getPayment(SITE_ID, false, array('PAYMENT_TYPE'=>$order['PAYMENT_TYPE']));
        $arPayment = array_shift($arPayment);
        $description = GetMessage("ARLIGHT_ARSTORE_ZAKAZ").$order['ID'];

        if($arPayment['PAYMENT_TYPE']=='YK'){
            $returnUrl = 'http://'.$_SERVER['SERVER_NAME'].SITE_DIR.'personal/orders/order/?order='.$order['ID'];
            $arPayment['DATA'] = json_decode($arPayment['DATA'], true);
            $allPrice = $order['SUMM'] + $order['DELIVERY_PRICE'];
            if($order['PAYMENT_DATE']){
                $order['PAYMENT_DATE'] = new Type\DateTime($order['PAYMENT_DATE']);
            }
            $idempotenceKey = md5($order['ID'].$order['USER_ID'].$order['PAYMENT_DATE']);

            $client = new Client();
            $client->setAuth($arPayment['DATA']['shopId'], $arPayment['DATA']['secretKey']);
            $response = $client->createPayment(
                array(
                    'amount' => array(
                        'value' => $allPrice,
                        'currency' => $order['CURRENCY'],
                    ),
                    'confirmation' => array(
                        'type' => 'redirect',
                        'return_url' => $returnUrl,
                    ),
                    'description' => $description,
                    'capture' => true,
                ),
                $idempotenceKey
            );
            if($request['payorder']) {
                $confirmation = $response->getConfirmation()->jsonSerialize();
                LocalRedirect($confirmation['confirmation_url']);
            } else {
                $status = $response->getStatus();
                if($status=='succeeded' || $status == 'canceled'){
                    $date = new Type\DateTime();
                    $date = $date::createFromTimestamp($response->getCreatedAt()->getTimestamp());
                    $order['PAYMENT_DATE'] = $date;
                    if($status=='succeeded'){
                        self::updateStatus($order);
                        LocalRedirect(SITE_DIR . 'personal/orders/order/?order='.$order['ID'].'&statusPay=1');
                    } else {
                        self::updateStatus($order, true);
                    }
                }

            }




        }
    }

    static private function updateStatus($order, $error = false){
        if(!$error){
            $arStatus = WorkOrder::getStatus(SITE_ID, false, array('FOR_PAYMENT'=>'Y'));
            $arStatus = array_shift($arStatus);
            $arFields['STATUS'] = $arStatus['ID'];
            $arFields['PAYMENT'] = 'Y';
        }
        $arFields['PAYMENT_DATE'] = $order['PAYMENT_DATE'];
        $addSQL = OrdersTable::update($order['ID'], $arFields);
        if (!$addSQL->isSuccess()) {
            $error = $addSQL->getErrorMessages();
            $arResult["ERROR"] = 'ERROR <pre>' . var_export($error, true) . '</pre>';
            die($arResult["ERROR"]);
        } else {
            if(!$error){
                $arFieldsSend = array(
                    'EMAIL' => $order['USER_EMAIL'],
                    'NAME' => $order['USER_NAME'],
                    'ORDER_STATUS' => $arStatus['NAME'],
                    'ORDER_ID' => $order['ID'],
                );
                CEvent::Send("ITERTECH_CHANGE_ORDER_STATUS", SITE_ID, $arFieldsSend);
            }
        }

    }
}