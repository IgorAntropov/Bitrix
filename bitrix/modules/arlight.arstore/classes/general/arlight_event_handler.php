<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Main\Server;
use Bitrix\Main\Localization\Loc;


class ArlightEvents{
    public function OnBuildGlobalMenuHandler(&$arGlobalMenu, &$arModuleMenu){
        $arGlobalMenu['global_menu_custom'] = [
            'menu_id' => 'arstore',
            'text' => 'Arlight Arstore',
            'title' => 'Arlight Arstore',
            'url' => 'arstore_doc.php?lang=ru',
            'sort' => 1000,
            'items_id' => 'global_menu_custom',
            'help_section' => 'arstore',
            'items' => [
                [
                    'parent_menu' => 'global_menu_custom',
                    'sort'        => 10,
                    'url'         => 'arstore_doc.php?lang=ru',
                    'text'        => Loc::getMessage('ARSTORE_knowledge_base_title'),
                    'title'       => Loc::getMessage('ARSTORE_knowledge_base_text'),
                    'icon'        => 'search_menu_icon',
                    'page_icon'   => 'search_menu_icon',
                    'items_id'    => 'menu_custom',
                ]
            ],
        ];
    }
}
?>

