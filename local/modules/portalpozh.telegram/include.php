<?php
global $DB, $MESS, $APPLICATION;
\Bitrix\Main\Loader::includeModule('portalpozh.telegram');

//\CModule::AddAutoloadClasses(
//    "portalpozh.telegram",
//    [
//        "\PORTALPOZH\TELEGRAM\Events\Tasks" => "lib/events/tasks.php",
//        "\PORTALPOZH\TELEGRAM\Events\Messages" => "lib/events/messages.php",
//        "\PORTALPOZH\TELEGRAM\Events\Comments" => "lib/events/comments.php",
//        "\PORTALPOZH\TELEGRAM\Events\Leads" => "lib/events/leads.php",
//
//        "\PORTALPOZH\TELEGRAM\Controllers\Bot" => "lib/controllers/bot.php",
//        "\PORTALPOZH\TELEGRAM\Controllers\BotType" => "lib/controllers/bottype.php",
//        "\PORTALPOZH\TELEGRAM\Controllers\BotUser" => "lib/controllers/botuser.php",
//        "\PORTALPOZH\TELEGRAM\Controllers\Bitrix" => "lib/controllers/bitrix.php",
//
//        "\PORTALPOZH\TELEGRAM\Models\Bot" => "lib/models/bot.php",
//        "\PORTALPOZH\TELEGRAM\Models\BotType" => "lib/models/bottype.php",
//        "\PORTALPOZH\TELEGRAM\Models\BotUser" => "lib/models/botuser.php",
//    ]
//);

//$arJsConfig = [
//    'gpbl.ipr.main' => [
//        'js' => '/local/js/ipr/main/main.js',
//        'rel' => ['jquery'],
//        'lang' => '/local/js/ipr/main/lang/' . LANGUAGE_ID . '/main.php',
//    ]
//];
//
//foreach ($arJsConfig as $ext => $arExt) {
//    \CJSCore::RegisterExt($ext, $arExt);
//}