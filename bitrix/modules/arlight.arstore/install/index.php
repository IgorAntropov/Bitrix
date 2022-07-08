<?
use \Bitrix\Main\ModuleManager;

global $MESS;
IncludeModuleLangFile(str_replace("\\", "/", __FILE__));

if(class_exists('arlight_arstore'))
	return;

class arlight_arstore extends CModule
{
    var $MODULE_ID = 'arlight.arstore';
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;

	function arlight_arstore()
	{
		$arModuleVersion = array();

        $path = str_replace("\\", "/", __FILE__);
        $path = substr($path, 0, strlen($path) - 10);
        include($path.'/version.php');

        $this->MODULE_NAME = GetMessage('NAS_ARSTORE_NAME');
        $this->MODULE_DESCRIPTION = GetMessage("NAS_ARSTORE_DESCRIPTION");
		$this->PARTNER_NAME = GetMessage('NAS');
		$this->PARTNER_URI = GetMessage('NAS_URI');

        if (is_array($arModuleVersion) && array_key_exists('VERSION', $arModuleVersion))
        {
            $this->MODULE_VERSION = $arModuleVersion['VERSION'];
            $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        }
	}

	function DoInstall()
	{
        $this->InstallEvents();
		$this->InstallFiles();
        $this->InstallDB();
	}

	function InstallEvents()
	{
        RegisterModuleDependences("main", "OnBuildGlobalMenu", $this->MODULE_ID, 'ArlightEvents', 'OnBuildGlobalMenuHandler');

        return true;
	}

	function InstallFiles()
	{
		CopyDirFiles($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.$this->MODULE_ID.'/install/wizards/arlight/arstore', $_SERVER['DOCUMENT_ROOT'].'/bitrix/wizards/arlight/arstore', true, true);
		return true;
	}

	function UnInstallEvents()
	{
        UnRegisterModuleDependences("main", "OnBuildGlobalMenu", $this->MODULE_ID, 'ArlightEvents', 'OnBuildGlobalMenuHandler');
		return true;
	}

 	function InstallDB()
    {
        RegisterModule($this->MODULE_ID);
        return true;
    }

    function InstallPublic()
	{
		return true;
	}

	function UnInstallDB()
	{
        UnRegisterModule($this->MODULE_ID);
        return true;
    }

	function UnInstallFiles()
	{
		return true;
	}

	function DoUninstall()
	{
		DeleteDirFilesEx('/bitrix/wizards/arlight/arstore');
        $this->UnInstallDB();
        $this->UnInstallEvents();
    }
}
?>