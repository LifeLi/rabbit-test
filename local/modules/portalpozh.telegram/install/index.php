<?php
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Application;
use Bitrix\Main\Diag\Debug;

Loc::loadMessages(__FILE__);

if(class_exists("portalpozh_telegram")) return;

class portalpozh_telegram extends CModule
{
    public const MODULE_ID = 'portalpozh.telegram';
    public $MODULE_ID = 'portalpozh.telegram';
    public $MODULE_VERSION;
    public $MODULE_VERSION_DATE;
    public $MODULE_NAME;
    public $MODULE_DESCRIPTION;
    public $errors;

    public function __construct()
    {
        $arModuleVersion = [];
        include(dirname(__FILE__) . "/version.php");
        $this->MODULE_VERSION = $arModuleVersion["VERSION"];
        $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        $this->MODULE_NAME = Loc::getMessage("PORTALPOZH_TELEGRAM_MODULE_NAME");
        $this->MODULE_DESCRIPTION = Loc::getMessage("PORTALPOZH_TELEGRAM_MODULE_DESCRIPTION");
        $this->PARTNER_NAME = Loc::getMessage("PORTALPOZH_TELEGRAM_PARTER_NAME");
        $this->PARTNER_URI = "https://tg.org";
    }

    public function InstallDB($arParams = [])
    {
        global $DB;

        if(!$DB->Query("SELECT `ID` FROM `portalpozh_telegram_bot_settings`", true))
        {
            $this->errors = $DB->RunSQLBatch($_SERVER['DOCUMENT_ROOT'] . "/local/modules/".$this->MODULE_ID."/install/db/install.sql");
        }

        if (!$this->errors)
        {
            return true;
        }
        else
        {
            return $this->errors;
        }
    }

    public function UnInstallDB($arParams = [])
    {
        global $DB;

        $this->errors = $DB->RunSQLBatch($_SERVER['DOCUMENT_ROOT'] . "/local/modules/".$this->MODULE_ID."/install/db/uninstall.sql");

        if (!$this->errors)
        {
            return true;
        }
        else
        {
            return $this->errors;
        }
    }

    public function InstallEvents()
    {
        return true;
    }

    public function UnInstallEvents()
    {
        return true;
    }

    public function InstallFiles($arParams = [])
    {
        return true;
    }

    public function UnInstallFiles()
    {
        return true;
    }

    public function DoInstall()
    {
        global $APPLICATION;
        $this->InstallFiles();
        $this->InstallDB();
        RegisterModule(self::MODULE_ID);
    }

    public function DoUninstall()
    {
        global $APPLICATION;
        UnRegisterModule(self::MODULE_ID);
        $this->UnInstallDB();
        $this->UnInstallFiles();
    }
}