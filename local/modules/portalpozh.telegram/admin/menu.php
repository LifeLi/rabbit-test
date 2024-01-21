<?php
defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
$aMenu = array(
    array(
        'parent_menu' => 'global_menu_content',
        'sort' => 10000,
        'text' => Loc::getMessage('PORTALPOZH_TELEGRAM_MODULE_ADMIN_NAME'),
        'title' => Loc::getMessage('PORTALPOZH_TELEGRAM_MODULE_ADMIN_NAME'),
        'url' => 'perfmon_tables.php?orm=y#portalpozh',
        'items_id' => 'menu_telegram'
    )
);
return $aMenu;