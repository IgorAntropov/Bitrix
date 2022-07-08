<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if (!defined("WIZARD_SITE_ID"))
	return;

if (!defined("WIZARD_SITE_DIR"))
	return;

// Добавляем почтовые события и шаблоны

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
function newEventTemplate($EVENT_NAME, $LID, $EMAIL_FROM, $EMAIL_TO, $SUBJECT, $MESSAGE, $HIDE_COPY='')
{

    $arFilter = ["EVENT_NAME" => $EVENT_NAME, "SUBJECT" => $SUBJECT];
    $rsMess = CEventMessage::GetList($by = "site_id", $order = "desc", $arFilter);
    $arMess = $rsMess->Fetch();
    if(!isset($arMess) || empty($arMess)){
        $em = new CEventMEssage;
        $newEventFields = array(
            "ACTIVE" => 'Y',
            "EVENT_NAME"    => $EVENT_NAME,
            "LID"           => $LID,
            "EMAIL_FROM"          => $EMAIL_FROM,
            "EMAIL_TO"   => $EMAIL_TO,
            "BCC" => $HIDE_COPY,
            "SUBJECT"   => $SUBJECT,
            "BODY_TYPE" => 'html',
            "MESSAGE" => $MESSAGE,
            "SITE_TEMPLATE_ID" => 'mail_arlight'
        );
        $EVENT_TEMPLATE_ID = $em->Add($newEventFields);
        if (intval($EVENT_TEMPLATE_ID) <= 0){
            die('ERROR CREATE EVENT TEMPLATE ' . $EVENT_NAME . $EVENT_TEMPLATE_ID->LAST_ERROR);
        }
    }
}

global $DB;
$strSql = "SELECT count(*) as C FROM b_event_type WHERE EVENT_NAME = 'CUSTOM_PRODUCTS_ORDER'";
$res = $DB->Query($strSql)->Fetch();
if($res['C']<=0){
    newEvent('ru', 'CUSTOM_PRODUCTS_ORDER', GetMessage('CUSTOM_PRODUCTS_ORDER'));
    newEvent('en', 'CUSTOM_PRODUCTS_ORDER', GetMessage('CUSTOM_PRODUCTS_ORDER'));
}

$strSql = "SELECT count(*) as C FROM b_event_type WHERE EVENT_NAME = 'FEEDBACK_FORM_CONTACT'";
$res = $DB->Query($strSql)->Fetch();
if($res['C']<=0){
    newEvent('ru', 'FEEDBACK_FORM_CONTACT', GetMessage('FEEDBACK_FORM_CONTACT'));
    newEvent('en', 'FEEDBACK_FORM_CONTACT', GetMessage('FEEDBACK_FORM_CONTACT'));
}

$strSql = "SELECT count(*) as C FROM b_event_type WHERE EVENT_NAME = 'FEEDBACK_FORM_DEVELOPER'";
$res = $DB->Query($strSql)->Fetch();
if($res['C']<=0){
    newEvent('ru', 'FEEDBACK_FORM_DEVELOPER', GetMessage('FEEDBACK_FORM_DEVELOPER'));
    newEvent('en', 'FEEDBACK_FORM_DEVELOPER', GetMessage('FEEDBACK_FORM_DEVELOPER'));
}

$strSql = "SELECT count(*) as C FROM b_event_type WHERE EVENT_NAME = 'FEEDBACK_FORM'";
$res = $DB->Query($strSql)->Fetch();
if($res['C']<=0){
    newEvent('ru', 'FEEDBACK_FORM', GetMessage('FEEDBACK_FORM'));
    newEvent('en', 'FEEDBACK_FORM', GetMessage('FEEDBACK_FORM'));
}

$strSql = "SELECT count(*) as C FROM b_event_type WHERE EVENT_NAME = 'FEEDBACK_FORM_USER'";
$res = $DB->Query($strSql)->Fetch();
if($res['C']<=0){
    newEvent('ru', 'FEEDBACK_FORM_USER', GetMessage('FEEDBACK_FORM_USER'));
    newEvent('en', 'FEEDBACK_FORM_USER', GetMessage('FEEDBACK_FORM_USER'));
}

$strSql = "SELECT count(*) as C FROM b_event_type WHERE EVENT_NAME = 'SUBSCRIBE_FORM'";
$res = $DB->Query($strSql)->Fetch();
if($res['C']<=0){
    newEvent('ru', 'SUBSCRIBE_FORM', GetMessage('SUBSCRIBE_FORM'));
    newEvent('en', 'SUBSCRIBE_FORM', GetMessage('SUBSCRIBE_FORM'));
}

$arSites = CSite::GetList($by="sort", $order="desc", array("ACTIVE" => "Y"));
while ($arSite = $arSites->Fetch())
{
    $arSitesLIDs[] = $arSite["LID"];
}

/*Светильники под заказ [CUSTOM_PRODUCTS_ORDER]*/
newEventTemplate(
    'CUSTOM_PRODUCTS_ORDER',
    $arSitesLIDs,
    'no-reply@#SERVER_NAME#',
    '#CLIENT_MAIL#',
    '#SITE_NAME#: '.GetMessage('CUSTOM_PRODUCTS_ORDER_NOTE').'#ORDER_NUM#',
    GetMessage('CUSTOM_PRODUCTS_ORDER_MESS_CLIENT'),
    '#DEFAULT_EMAIL_FROM#'
);
newEventTemplate(
    'CUSTOM_PRODUCTS_ORDER',
    $arSitesLIDs,
    'no-reply@#SERVER_NAME#',
    '#SALE_MAIL#',
    '#SITE_NAME#: '.GetMessage('CUSTOM_PRODUCTS_ORDER_NOTE_ADMIN').'#ORDER_NUM#',
    GetMessage('CUSTOM_PRODUCTS_ORDER_MESS_ADMIN')
);
/*Отправка сообщения через форму обратной связи [FEEDBACK_FORM]*/
newEventTemplate(
    'FEEDBACK_FORM',
    $arSitesLIDs,
    'no-reply@#SERVER_NAME#',
    '#DEFAULT_EMAIL_FROM#',
    '#SITE_NAME#: #TYPE_MSG# - '.GetMessage('FEEDBACK_FORM_NOTE'),
    GetMessage('FEEDBACK_FORM_MESS'),
    '#USER_FEEDBACK_MAIL#'
);

/*	Отправка сообщения через форму обратной на странице Контакты [FEEDBACK_FORM_CONTACT]*/
newEventTemplate(
    'FEEDBACK_FORM_CONTACT',
    $arSitesLIDs,
    'no-reply@#SERVER_NAME#',
    '#DEFAULT_EMAIL_FROM#',
    '#SITE_NAME#: - '.GetMessage('FEEDBACK_FORM_NOTE'),
    GetMessage('FEEDBACK_FORM_CONTACT_MESS'),
    '#USER_FEEDBACK_MAIL#'
);

/*Отправка сообщения через форму обратной связи - сообщить об ошибке [FEEDBACK_FORM_DEVELOPER]*/
newEventTemplate(
    'FEEDBACK_FORM_DEVELOPER',
    $arSitesLIDs,
    'no-reply@#SERVER_NAME#',
    'service@transistor.ru',
    '#SITE_NAME#: - ' . GetMessage('FEEDBACK_FORM_NOTE_DEVELOPER'),
    GetMessage('FEEDBACK_FORM_DEVELOPER_MESS')
);

/*Отправка сообщения через форму обратной связи для пользователя [FEEDBACK_FORM_USER]*/
newEventTemplate(
    'FEEDBACK_FORM_USER',
    $arSitesLIDs,
    'no-reply@#SERVER_NAME#',
    '#EMAIL#',
    GetMessage('FEEDBACK_FORM_NOTE_USER').'#SERVER_NAME#',
    GetMessage('FEEDBACK_FORM_USER_MESS')
);

/*Отправка сообщения через форму обратной связи для пользователя [SUBSCRIBE_FORM]*/
newEventTemplate(
    'SUBSCRIBE_FORM',
    $arSitesLIDs,
    'no-reply@#SERVER_NAME#',
    '#EMAIL#',
    '#SITE_NAME#: ' . GetMessage('SUBSCRIBE_FORM_NOTE'),
    GetMessage('SUBSCRIBE_FORM_MESS'),
    '#DEFAULT_EMAIL_FROM#'
);

//отредактировать стандартные шаблоны
$arTempl = ['NEW_USER', 'USER_INFO', 'USER_PASS_CHANGED', 'USER_PASS_REQUEST'];
foreach ($arTempl as $item) {
    $rsMess = CEventMessage::GetList($by = "site_id", $order = "desc", ["TYPE_ID" => [$item]]);
    while ($arMess = $rsMess->GetNext()) {
        $ID = $arMess['ID'];
        $em = new CEventMessage;
        $arFields = array(
            "EMAIL_FROM" => 'no-reply@#SERVER_NAME#',
            "BODY_TYPE" => 'html',
            "SITE_TEMPLATE_ID" => 'mail_arlight'
        );
        if ($ID > 0) {
            $res = $em->Update($ID, $arFields);
        }
    }
}
unset($arTempl, $item);

//add new site_id for templates
if (WIZARD_INSTALL_DEMO_DATA) {
//    $arSitesLIDs[] = WIZARD_SITE_ID;
    $rsMess = CEventMessage::GetList($by = "site_id", $order = "desc", []);
    $res = [];
    while ($arMess = $rsMess->GetNext()) {
        if ($ID = $arMess['ID']) {
            $em = new CEventMessage;
            $arFields = ['LID' => $arSitesLIDs];
            $em->Update($ID, $arFields);
        }
    }
}