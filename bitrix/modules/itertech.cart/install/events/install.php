<?php
use Bitrix\Main\Localization\Loc;
function newEvent($LID, $EVENT_NAME, $NAME, $DESCRIPTION = false)
{
    $et = new CEventType;
    $newEventFields = array(
        "LID"           => $LID,
        "EVENT_NAME"    => $EVENT_NAME,
        "NAME"          => $NAME,
        "DESCRIPTION"   => $DESCRIPTION
    );
    $EVENT_ID = $et->Add($newEventFields);
    if (intval($EVENT_ID) <= 0){
        die('ERROR CREATE EVENT '.$EVENT_ID->LAST_ERROR);
    }
}
function newEventTemplate($EVENT_NAME, $LID, $EMAIL_FROM, $EMAIL_TO, $SUBJECT, $MESSAGE, $BCC='')
{
    $em = new CEventMEssage;
    $newEventFields = array(
        "ACTIVE" => 'Y',
        "EVENT_NAME"    => $EVENT_NAME,
        "LID"           => $LID,
        "EMAIL_FROM"          => $EMAIL_FROM,
        "EMAIL_TO"   => $EMAIL_TO,
        "BCC" => $BCC,
        "SUBJECT"   => $SUBJECT,
        "BODY_TYPE" => 'html',
        "MESSAGE" => $MESSAGE,
        "SITE_TEMPLATE_ID" => 'mail_arlight'
    );
    $EVENT_TEMPLATE_ID = $em->Add($newEventFields);
    if (intval($EVENT_TEMPLATE_ID) <= 0){
        die('ERROR CREATE EVENT TEMPLATE '.$EVENT_TEMPLATE_ID->LAST_ERROR);
    }
}


// ƒобавл€ем почтовые событи€
global $DB;
$strSql = "SELECT count(*) as C FROM b_event_type WHERE EVENT_NAME = 'ITERTECH_CREATE_USER'";
$res = $DB->Query($strSql)->Fetch();
if($res['C']<=0){
    newEvent('ru', 'ITERTECH_CREATE_USER', GetMessage('EVENT_CREATE_USER'));
    newEvent('en', 'ITERTECH_CREATE_USER', GetMessage('EVENT_CREATE_USER'));
}

$strSql = "SELECT count(*) as C FROM b_event_type WHERE EVENT_NAME = 'ITERTECH_CREATE_ORDER'";
$res = $DB->Query($strSql)->Fetch();
if($res['C']<=0){
    newEvent('ru', 'ITERTECH_CREATE_ORDER', GetMessage('EVENT_CREATE_ORDER'));
    newEvent('en', 'ITERTECH_CREATE_ORDER', GetMessage('EVENT_CREATE_ORDER'));
}

$strSql = "SELECT count(*) as C FROM b_event_type WHERE EVENT_NAME = 'ITERTECH_CHANGE_ORDER_STATUS'";
$res = $DB->Query($strSql)->Fetch();
if($res['C']<=0){
    newEvent('ru', 'ITERTECH_CHANGE_ORDER_STATUS', GetMessage('EVENT_ITERTECH_CHANGE_ORDER_STATUS'));
    newEvent('en', 'ITERTECH_CHANGE_ORDER_STATUS', GetMessage('EVENT_ITERTECH_CHANGE_ORDER_STATUS'));
}

$strSql = "SELECT count(*) as C FROM b_event_type WHERE EVENT_NAME = 'ITERTECH_CHANGE_ORDER'";
$res = $DB->Query($strSql)->Fetch();
if ($res['C'] <= 0) {
    newEvent('ru', 'ITERTECH_CHANGE_ORDER', GetMessage('ITERTECH_CHANGE_ORDER'));
    newEvent('en', 'ITERTECH_CHANGE_ORDER', GetMessage('ITERTECH_CHANGE_ORDER'));
}

// ƒобавл€ем почтовые шаблоны
$arSites = CSite::GetList($by="sort", $order="desc", Array("ACTIVE"=>"Y"));
while ($arSite = $arSites->Fetch())
{
    $arSitesLIDs[] = $arSite["LID"];
}

// регистраци€ пользовател€
newEventTemplate(
    'ITERTECH_CREATE_USER',
    $arSitesLIDs,
    'no-reply@#SERVER_NAME#',
    '#DEFAULT_EMAIL_FROM#',
    '#SITE_NAME#: '.GetMessage('EVENT_REGISTER_NOTE'),
    GetMessage('EVENT_TEMPLATE_CREATE_USER_FOR_ADMIN')
);
// регистраци€ пользовател€ - пользователю
newEventTemplate(
    'ITERTECH_CREATE_USER',
    $arSitesLIDs,
    'no-reply@#SERVER_NAME#',
    '#EMAIL#',
    '#SITE_NAME#: '.GetMessage('EVENT_REGISTER_NOTE'),
    GetMessage('EVENT_TEMPLATE_CREATE_USER')
);

// отправка уведомлени€ о заказе пользователю
newEventTemplate(
    'ITERTECH_CREATE_ORDER',
    $arSitesLIDs,
    'no-reply@#SERVER_NAME#',
    '#EMAIL#',
    '#SITE_NAME#: '.GetMessage('EVENT_CREATE_ORDER_NOTE_USER'),
    GetMessage('EVENT_TEMPLATE_CREATE_ORDER_USER')
);

// отправка уведомлени€ о заказе админу
newEventTemplate(
    'ITERTECH_CREATE_ORDER',
    $arSitesLIDs,
    'no-reply@#SERVER_NAME#',
    '#DEFAULT_EMAIL_FROM#',
    '#SITE_NAME#: '.GetMessage('EVENT_CREATE_ORDER_NOTE_ADMIN'),
    GetMessage('EVENT_TEMPLATE_CREATE_ORDER_ADMIN'),
    '#USER_ORDER_MAIL#'
);

// отправка уведомлени€ пользователю о смене статуса
newEventTemplate(
    'ITERTECH_CHANGE_ORDER_STATUS',
    $arSitesLIDs,
    'no-reply@#SERVER_NAME#',
    '#EMAIL#',
    '#SITE_NAME#: '.GetMessage('EVENT_ITERTECH_CHANGE_ORDER_STATUS_NOTE'),
    GetMessage('EVENT_TEMPLATE_CHANGE_ORDER_STATUS')
);
// отправка уведомлени€ о смене статуса и оплате админу
newEventTemplate(
    'ITERTECH_CHANGE_ORDER_STATUS',
    $arSitesLIDs,
    'no-reply@#SERVER_NAME#',
    '#DEFAULT_EMAIL_FROM#',
    '#SITE_NAME#: '.GetMessage('EVENT_ITERTECH_CHANGE_ORDER_STATUS_NOTE_ADMIN'),
    GetMessage('EVENT_TEMPLATE_CHANGE_ORDER_STATUS_ADMIN'),
    '#USER_ORDER_MAIL#'
);

// отправка уведомлени€ пользователю о редактировании заказа
newEventTemplate(
    'ITERTECH_CHANGE_ORDER',
    $arSitesLIDs,
    'no-reply@#SERVER_NAME#',
    '#EMAIL#',
    '#SITE_NAME#: '.GetMessage('EVENT_ITERTECH_CHANGE_ORDER_NOTE'),
    GetMessage('EVENT_TEMPLATE_CHANGE_ORDER')
);
// отправка уведомлени€ о о редактировании заказа  админу
newEventTemplate(
    'ITERTECH_CHANGE_ORDER',
    $arSitesLIDs,
    'no-reply@#SERVER_NAME#',
    '#DEFAULT_EMAIL_FROM#',
    '#SITE_NAME#: '.GetMessage('EVENT_ITERTECH_CHANGE_ORDER_NOTE_ADMIN'),
    GetMessage('EVENT_TEMPLATE_CHANGE_ORDER_ADMIN'),
    '#USER_ORDER_MAIL#'
);

