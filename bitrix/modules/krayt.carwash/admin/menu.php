<?php
/**
 * Created by PhpStorm.
 * User: aleksander
 * Date: 27.02.2017
 * Time: 16:01
 */

IncludeModuleLangFile(__FILE__);

$MODULE_ID = 'krayt.carwash';
$MODULE_CODE = 'krayt.carwash';
$moduleSort = 10000;

$aModuleMenu[] = array(
    "parent_menu" => "global_menu_krayt",
    "sort"        => $moduleSort,
    "section"     => "k_notif", 
    "url"         => '/bitrix/admin/k_page_install_carwash.php?lang=' . LANGUAGE_ID,
    "text"        => GetMessage("K_NOT_PAGE")." carwash",
    "title"       => GetMessage("K_NOT_PAGE")." carwash",
);


return $aModuleMenu;