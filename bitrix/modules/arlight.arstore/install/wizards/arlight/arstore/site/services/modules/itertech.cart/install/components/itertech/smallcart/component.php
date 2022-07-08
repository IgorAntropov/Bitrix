<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use \Bitrix\Main\Loader,
    \Bitrix\Main\Context,
    \Bitrix\Main\Localization\Loc;

$module_id = 'itertech.cart';

if (!Loader::includeModule($module_id)) {
    ShowError(Loc::getMessage('CART_NOT_INSTALLED'));
    return false;
}

$arParams['LIST_PROPERTY_CODE'] = array_diff((array)$arParams['LIST_PROPERTY_CODE'], array(''));
$arParams['TEMPLATE_NAME'] = $this->GetTemplateName();

//$arResult = WorkCart::getItemsFromCart($arParams);
$arResult = $_SESSION['currentSmallCart'];

$request = Context::getCurrent()->getRequest();
$order = (int)$request['order'];
$arResult['ORDER_ID'] = $order;

$this->IncludeComponentTemplate();
