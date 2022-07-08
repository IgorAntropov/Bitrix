<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use \Bitrix\Main\Loader;
$module_id = 'itertech.cart';
if (!Loader::includeModule($module_id)) {
    ShowError('Module '.$module_id.' not install');
    die();
}
if(IS_ADMIN_CATALOG != 'Y'){
    LocalRedirect('/');
}
if(BLOCKING == 'true'){
    LocalRedirect('/');
}
