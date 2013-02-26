-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Фев 26 2013 г., 13:10
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `pesennik_psn`
--

-- --------------------------------------------------------

--
-- Структура таблицы `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `searchName` text NOT NULL,
  `date` date NOT NULL,
  `url` text NOT NULL,
  `description` longtext NOT NULL,
  `artistId` bigint(20) NOT NULL,
  `albumTypeId` tinyint(4) NOT NULL,
  `userId` int(11) NOT NULL,
  `info` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `albumnode`
--

CREATE TABLE IF NOT EXISTS `albumnode` (
  `songId` bigint(20) NOT NULL,
  `songNo` tinyint(4) NOT NULL,
  `albumId` bigint(20) NOT NULL,
  PRIMARY KEY (`songNo`,`albumId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `albumtype`
--

CREATE TABLE IF NOT EXISTS `albumtype` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `artist`
--

CREATE TABLE IF NOT EXISTS `artist` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `url` text NOT NULL,
  `searchName` text NOT NULL,
  `photo` tinyint(1) NOT NULL,
  `band` tinyint(1) NOT NULL,
  `bio` longtext NOT NULL,
  `birthDate` date NOT NULL,
  `deathDate` date NOT NULL,
  `countryId` tinyint(4) NOT NULL,
  `birthplace` text NOT NULL,
  `info` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `artist`
--

INSERT INTO `artist` (`id`, `name`, `url`, `searchName`, `photo`, `band`, `bio`, `birthDate`, `deathDate`, `countryId`, `birthplace`, `info`) VALUES
(1, 'Ани Лорак', 'ani_lorak', '', 0, 1, '', '2013-02-05', '2013-02-03', 1, '', ''),
(2, 'Пугачева', 'alla', '', 0, 0, '', '2013-02-05', '2013-02-03', 1, '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `artistsite`
--

CREATE TABLE IF NOT EXISTS `artistsite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `artistsitenode`
--

CREATE TABLE IF NOT EXISTS `artistsitenode` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `artistSiteId` int(11) NOT NULL,
  `url` text NOT NULL,
  `artistId` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `artistsong`
--

CREATE TABLE IF NOT EXISTS `artistsong` (
  `id` tinyint(4) NOT NULL,
  `artistId` bigint(20) NOT NULL,
  `songId` bigint(20) NOT NULL,
  `no` tinyint(4) NOT NULL,
  PRIMARY KEY (`artistId`,`songId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `artistsong`
--

INSERT INTO `artistsong` (`id`, `artistId`, `songId`, `no`) VALUES
(0, 1, 1, 0),
(0, 1, 2, 0),
(0, 2, 1, 1),
(0, 2, 3, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`id`, `name`, `url`) VALUES
(1, '', 'ua'),
(2, 'Russia', 'rusland');

-- --------------------------------------------------------

--
-- Структура таблицы `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `language`
--

INSERT INTO `language` (`id`, `name`, `url`) VALUES
(1, '', 'ua'),
(2, 'Russ', 'ru');

-- --------------------------------------------------------

--
-- Структура таблицы `song`
--

CREATE TABLE IF NOT EXISTS `song` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `searchName` text NOT NULL,
  `url` text NOT NULL,
  `lyrics` text NOT NULL,
  `flags` smallint(4) NOT NULL DEFAULT '0',
  `languageId` tinyint(4) NOT NULL DEFAULT '0',
  `userId` bigint(20) NOT NULL,
  `info` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `song`
--

INSERT INTO `song` (`id`, `name`, `searchName`, `url`, `lyrics`, `flags`, `languageId`, `userId`, `info`) VALUES
(1, 'первая песня', '', 'linka', 'бла-бла-бла-бла-бла-бла-бла-бла-бла-бла-бла-бла-', 1, 1, 1, ''),
(2, 'вторая', '', 'hitNo1', 'ля-ля-ля-ля-ля-ля-ля-ля-ля-ля-ля-ля-ля-ля-ля-ля-ля-ля-ля-ля-', 3, 1, 2, '0'),
(3, 'третья', '', 'no3song', 'йо-йо-йо-йо-йо-йо-йо-йо-йо-йо-йо-йо-йо-йо-йо-йо-йо-', 2, 2, 3, '0');

-- --------------------------------------------------------

--
-- Структура таблицы `translate`
--

CREATE TABLE IF NOT EXISTS `translate` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `songId` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `lyrics` text NOT NULL,
  `languageId` tinyint(4) NOT NULL DEFAULT '0',
  `userId` bigint(20) NOT NULL,
  `info` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `translate`
--

INSERT INTO `translate` (`id`, `songId`, `name`, `lyrics`, `languageId`, `userId`, `info`) VALUES
(1, 1, 'рус название', '', 1, 1, ''),
(2, 2, 'укр назва', '', 2, 2, '');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `url` text NOT NULL,
  `birthday` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `url`, `birthday`) VALUES
(1, 'Admin', 'admin', '2013-02-20');

-- --------------------------------------------------------

--
-- Структура таблицы `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `songId` bigint(20) NOT NULL,
  `videoSiteId` int(11) NOT NULL,
  `url` text NOT NULL,
  `videoTypeId` tinyint(4) NOT NULL,
  `userId` int(11) NOT NULL,
  `info` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `video`
--

INSERT INTO `video` (`id`, `songId`, `videoSiteId`, `url`, `videoTypeId`, `userId`, `info`) VALUES
(1, 1, 2, 'kfvH3ZBOeAM', 3, 3, 'вавававававав');

-- --------------------------------------------------------

--
-- Структура таблицы `videosite`
--

CREATE TABLE IF NOT EXISTS `videosite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `videosite`
--

INSERT INTO `videosite` (`id`, `data`) VALUES
(1, '<iframe width="560" height="315" src="http://www.youtube.com/embed/URL" frameborder="0" allowfullscreen></iframe>'),
(2, '<iframe width="XXX" height="YYY" src="http://www.youtube.com/embed/URL" frameborder="0" allowfullscreen></iframe>'),
(3, '<iframe width="560" height="315" src="http://www.youtube.com/embed/URL" frameborder="0" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Структура таблицы `videotype`
--

CREATE TABLE IF NOT EXISTS `videotype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `videotype`
--

INSERT INTO `videotype` (`id`, `name`, `description`) VALUES
(1, 'off', 'saf daf dsgfsd g'),
(2, 'parody', '22222222222');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
