<?php

use Bitrix\Main\Localization\CultureTable;
use Bitrix\Main\Service\GeoIp;

IncludeModuleLangFile(__FILE__);

class mycommentsmod extends CModule
{
	var $MODULE_ID = "mycommentsmod";
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_CSS;

	public function __construct()
	{
		$arModuleVersion = array();

		include(__DIR__.'/../classes/general/version.php');

        $this->MODULE_VERSION = '0.0.0.1';
        $this->MODULE_VERSION_DATE = '2022-07-09 10:15:00';

		$this->MODULE_NAME = 'Personal comments module';
		$this->MODULE_DESCRIPTION = 'Module for comments';
	}

	function InstallDB()
	{
        RegisterModule("mycommentsmod");

		return true;
	}

	function UnInstallDB()
	{
        UnRegisterModule("mycommentsmod");

		return true;
	}

	function InstallEvents()
	{
		return true;
	}

	function UnInstallEvents()
	{
		return true;
	}

	function InstallFiles()
	{
		return true;
	}

	function UnInstallFiles()
	{
		return true;
	}

	function DoInstall()
	{
        $this->InstallDB();
	}

	function DoUninstall()
	{
        $this->UnInstallDB();
	}
}
