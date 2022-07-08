<?php
$arEvents = array(
    'ITERTECH_CREATE_USER',
    'ITERTECH_CREATE_ORDER',
    'ITERTECH_CHANGE_ORDER_STATUS',
    'ITERTECH_CHANGE_ORDER'
);

foreach ($arEvents as $event){
    evRemover($event);
}

function evRemover($event){
    // удаляем почтовые шаблоны
    $arEventTemplate = CEventMessage::GetList($by="site_id", $order="desc", array("TYPE_ID" => array($event)));
    while($arTmpl = $arEventTemplate->GetNext())
    {
        $em = new CEventMessage;
        $em->Delete(intval($arTmpl["ID"]));
    }
    // удаляем события
    $et = new CEventType;
    $et->Delete($event);
}
