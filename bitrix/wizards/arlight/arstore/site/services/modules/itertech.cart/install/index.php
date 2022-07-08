<?

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;

class itertech_cart extends \CModule
{
    public $MODULE_ID = 'itertech.cart';
    public $MODULE_VERSION;
    public $MODULE_VERSION_DATE;
    public $MODULE_NAME;
    public $MODULE_DESCRIPTION;
    public $ERRORS;

    public function __construct()
    {
        $arModuleVersion = array();

        $path = str_replace('\\', '/', __FILE__);
        $path = substr($path, 0, strlen($path) - strlen("/index.php"));
        include($path."/version.php");

        if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion))
        {
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        }

        $this->MODULE_NAME = GetMessage('DC_MODULE_NAME');
        $this->MODULE_DESCRIPTION = GetMessage('DC_MODULE_NAME');
        $this->PARTNER_NAME = GetMessage('DC_PARTNER_NAME');
        $this->PARTNER_URI = GetMessage('DC_PARTNER_URL');

    }

    function doInstall()
    {
        $this->installEvents();

        global $APPLICATION;
        if($this->installDB() != true){
            $APPLICATION->ThrowException($this->ERRORS);
            return false;
        }
        if($this->installFiles() != true){
            $APPLICATION->ThrowException($this->ERRORS);
            return false;
        }

        RegisterModule($this->MODULE_ID);
        return true;

    }
    function doUninstall()
    {
        $this->uninstallEvents();
        $this->uninstallFiles();
        global $APPLICATION;
        if($this->uninstallDB() != true){
            $APPLICATION->ThrowException($this->ERRORS);
            return false;
        }
        UnRegisterModule($this->MODULE_ID);
        return true;
    }

    function installFiles()
    {
        CopyDirFiles(
            $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/components",
            $_SERVER["DOCUMENT_ROOT"]."/bitrix/components", true, true
        );
        /*
        CopyDirFiles(
            $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/admin",
            $_SERVER["DOCUMENT_ROOT"]."/bitrix/admin", true, true
        );
        CopyDirFiles(
            $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/order",
            $_SERVER["DOCUMENT_ROOT"]."/order", true, true
        );
        CopyDirFiles(
            $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/personal",
            $_SERVER["DOCUMENT_ROOT"]."/personal", true, true
        );
        CopyDirFiles(
            $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/favorite",
            $_SERVER["DOCUMENT_ROOT"]."/favorite", true, true
        );
        */
        return true;
    }

    function installDB()
    {
        global $DB;
        $errors = $DB->RunSQLBatch($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/'.$this->MODULE_ID.'/install/db/install.sql');
        if (!$errors) {
            $this->ERRORS = false;
            return true;
        } else {
            $this->ERRORS = implode("<br>", $errors);
            return false;
        }
    }

    function installEvents()
    {
        include($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.$this->MODULE_ID.'/install/events/install.php');
        return true;
    }

    function uninstallDB()
    {
        global $DB;
        $errors = $DB->RunSQLBatch($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/'.$this->MODULE_ID.'/install/db/uninstall.sql');
        if (!$errors) {
            $this->ERRORS = false;
            return true;
        } else {
            $this->ERRORS = implode("<br>", $errors);
            return false;
        }
    }

    function uninstallEvents()
    {
        include($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.$this->MODULE_ID.'/install/events/uninstall.php');
        return true;
    }

    function uninstallFiles()
    {
        DeleteDirFilesEx("/bitrix/components/itertech");

        /*
        DeleteDirFilesEx("/order");
        DeleteDirFilesEx("/personal");
        DeleteDirFilesEx("/favorite");
        DeleteDirFiles(
            $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/admin",
            $_SERVER["DOCUMENT_ROOT"]."/bitrix/admin"
        );
        */
        return true;
    }

}