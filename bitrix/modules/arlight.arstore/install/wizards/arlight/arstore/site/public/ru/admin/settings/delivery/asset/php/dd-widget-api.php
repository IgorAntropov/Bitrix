<?php

include_once "DDeliveryWidgetApi.php";


$widgetApi = new DDeliveryWidgetApi();

// Передайте здесь свой API-key
$widgetApi->setApiKey('1qmcgbswqodv_y8-g1yujbqesxvnfke1');

$widgetApi->setMethod($_SERVER['REQUEST_METHOD']);
$widgetApi->setData(isset($_REQUEST['data']) ? $_REQUEST['data'] : []);

echo $widgetApi->submit($_REQUEST['url']);