<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use \Bitrix\Main\Localization\Loc;
Loc::loadLanguageFile(__FILE__);


return array(
	'name' => Loc::getMessage('LANDING_DEMO_EVENTS_TITLE'),
	'description' => Loc::getMessage('LANDING_DEMO_EVENTS_DESCRIPTION'),
	'fields' => array(
		'ADDITIONAL_FIELDS' => array(
			'THEME_CODE' => 'event',
			'THEMEFONTS_CODE' => 'Open Sans',
			'THEMEFONTS_CODE_H' => 'Open Sans',
			'THEMEFONTS_SIZE' => '1.14286',
			'THEMEFONTS_USE' => 'Y',
			'UP_SHOW' => 'Y',
		)
	),
	'items' => array (
	)
);