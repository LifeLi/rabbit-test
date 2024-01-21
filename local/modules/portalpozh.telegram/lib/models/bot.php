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

class BotTable extends Data\DataManager
{

    public static function getTableName()
    {
        return 'portalpozh_telegram_bot_settings';
    }

    public static function getMap()
    {
        return [
            new Fields\IntegerField('ID', [
                "primary" => true,
                "autocomplete" => true,
                "title" => Loc::getMessage('PORTALPOZH_TELEGRAM_LIB_MODELS_BOT_ID'),
            ]),
            new Fields\DatetimeField('DATE_CREATE', [
                "nullable" => false,
                "required" => true,
                "title" => Loc::getMessage('PORTALPOZH_TELEGRAM_LIB_MODELS_BOT_DATE_CREATE')
            ]),
            new Fields\DatetimeField('DATE_UPDATE', [
                "nullable" => false,
                "required" => true,
                "title" => Loc::getMessage('PORTALPOZH_TELEGRAM_LIB_MODELS_BOT_DATE_UPDATE')
            ]),
            new Fields\StringField('BOT_NAME', [
                "nullable"=>false,
                "required"=>true,
                'validation' => function()
                {
                    return[
                        new Validators\LengthValidator\LengthValidator(null, 255),
                    ];
                },
                "title"=>Loc::getMessage('PORTALPOZH_TELEGRAM_LIB_MODELS_BOT_BOT_NAME'),
            ]),
            new Fields\StringField('BOT_TOKEN', [
                "nullable"=>false,
                "required"=>true,
                'validation' => function()
                {
                    return[
                        new Validators\LengthValidator\LengthValidator(null, 255),
                    ];
                },
                "title"=>Loc::getMessage('PORTALPOZH_TELEGRAM_LIB_MODELS_BOT_BOT_TOKEN'),
            ]),
            new Fields\StringField('BOT_DESCRIPTION', [
                "nullable"=>true,
                "required"=>true,
                'validation' => function()
                {
                    return[
                        new Validators\LengthValidator\LengthValidator(null, 255),
                    ];
                },
                "title"=>Loc::getMessage('PORTALPOZH_TELEGRAM_LIB_MODELS_BOT_BOT_DESCRIPTION'),
            ]),
            new Reference(
                'BOT_TYPE',
                BotTypeTable::class,
                ['=this.BOT_TYPE' => 'ref.ID']
            )
        ];
    }

}