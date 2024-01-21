<?php

namespace PORTALPOZH\TELEGRAM\Models;

use Bitrix\Main\ObjectException;
use Bitrix\Main\ORM\Data;
use Bitrix\Main\ORM\Event;
use Bitrix\Main\ORM\EventResult;
use Bitrix\Main\ORM\Fields;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Query\Query;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
CModule::IncludeModule('crm');

class BotUserTable extends Data\DataManager
{

    public static function getTableName()
    {
        return 'portalpozh_telegram_bot_users';
    }

    public static function getMap()
    {
        return [
            new Fields\IntegerField('ID', [
                "primary" => true,
                "unique" => true,
                "autocomplete" => true,
                "title" => Loc::getMessage('PORTALPOZH_TELEGRAM_LIB_MODELS_BOT_ID'),
            ]),
            new Reference(
                'BOT_ID',
                BotTable::class,
                ['=this.BOT_ID' => 'ref.ID']
            ),
            new Reference(
                'USER_ID',
                CUser::class,
                ['=this.BOT_ID' => 'ref.ID']
            )
        ];
    }

}