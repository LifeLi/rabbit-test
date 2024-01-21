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

class BotTypeTable extends Data\DataManager
{

    public static function getTableName()
    {
        return 'portalpozh_telegram_bot_types';
    }

    public static function getMap()
    {
        return [
            new Fields\IntegerField('ID', [
                "primary" => true,
                "unique" => true,
                "autocomplete" => true,
                "title" => Loc::getMessage('PORTALPOZH_TELEGRAM_LIB_MODELS_BOTTYPE_ID'),
            ]),
            new Fields\DatetimeField('DATE_CREATE', [
                "nullable" => false,
                "required" => true,
                "title" => Loc::getMessage('PORTALPOZH_TELEGRAM_LIB_MODELS_BOTTYPE_DATE_CREATE')
            ]),
            new Fields\DatetimeField('DATE_UPDATE', [
                "nullable" => false,
                "required" => true,
                "title" => Loc::getMessage('PORTALPOZH_TELEGRAM_LIB_MODELS_BOTTYPE_DATE_UPDATE')
            ]),
            new Fields\StringField('NAME', [
                "nullable"=>false,
                "required"=>true,
                "size" => 128,
                "title"=>Loc::getMessage('PORTALPOZH_TELEGRAM_LIB_MODELS_BOTTYPE_NAME'),
            ])
        ];
    }

}