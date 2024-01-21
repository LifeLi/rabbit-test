CREATE TABLE `portalpozh_telegram_bot_settings` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DATE_CREATE` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `DATE_UPDATE` datetime NOT NULL,
  `BOT_NAME` char(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Название бота',
  `BOT_TOKEN` char(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Токен ',
  `BOT_DESCRIPTION` char(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Предназначение бота',
  `BOT_TYPE` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Тип бота',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `portalpozh_telegram_bot_types` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NAME` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `DATE_CREATE` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `DATE_UPDATE` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `portalpozh_telegram_bot_users` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `USER_ID` int(10) unsigned NOT NULL COMMENT 'Пользователь',
  `BOT_ID` int(18) NOT NULL COMMENT 'Бот',
  PRIMARY KEY (`ID`),
  KEY `BOT_ID` (`BOT_ID`),
  CONSTRAINT `portalpozh_telegram_bot_users_ibfk_1` FOREIGN KEY (`BOT_ID`) REFERENCES `b_im_bot` (`BOT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `portalpozh_telegram_bot_types` (`NAME`, `DATE_CREATE`, `DATE_UPDATE`) VALUES
('Коннектор для связи',	'2024-01-01 23:59:59',	'0000-00-00 00:00:00');