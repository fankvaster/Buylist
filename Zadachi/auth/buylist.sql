-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 09 2020 г., 00:22
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `buylist`
--

-- --------------------------------------------------------

--
-- Структура таблицы `alcohol`
--

CREATE TABLE `alcohol` (
  `id` int(11) NOT NULL,
  `product` tinytext NOT NULL,
  `category` tinytext NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `backaleya`
--

CREATE TABLE `backaleya` (
  `id` int(11) NOT NULL,
  `product` tinytext NOT NULL,
  `category` tinytext NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `bird`
--

CREATE TABLE `bird` (
  `id` int(11) NOT NULL,
  `product` tinytext NOT NULL,
  `category` tinytext NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `bread`
--

CREATE TABLE `bread` (
  `id` int(11) NOT NULL,
  `product` tinytext NOT NULL,
  `category` tinytext NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` tinytext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `chancellery`
--

CREATE TABLE `chancellery` (
  `id` int(11) NOT NULL,
  `product` tinytext NOT NULL,
  `category` tinytext NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `content`
--

INSERT INTO `content` (`id`, `content`, `role`) VALUES
(1, 'Добавление товара', '1'),
(2, 'Список покупок', '1,2');

-- --------------------------------------------------------

--
-- Структура таблицы `eggs`
--

CREATE TABLE `eggs` (
  `id` int(11) NOT NULL,
  `product` tinytext NOT NULL,
  `category` tinytext NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `fish`
--

CREATE TABLE `fish` (
  `id` int(11) NOT NULL,
  `product` tinytext NOT NULL,
  `category` tinytext NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `fruits`
--

CREATE TABLE `fruits` (
  `id` int(11) NOT NULL,
  `product` tinytext NOT NULL,
  `category` tinytext NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `household`
--

CREATE TABLE `household` (
  `id` int(11) NOT NULL,
  `product` tinytext NOT NULL,
  `category` tinytext NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` int(11) NOT NULL,
  `product` tinytext NOT NULL,
  `category` tinytext NOT NULL,
  `manufacturer` tinytext NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `meaty`
--

CREATE TABLE `meaty` (
  `id` int(11) NOT NULL,
  `product` tinytext NOT NULL,
  `category` tinytext NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `milkys`
--

CREATE TABLE `milkys` (
  `id` int(11) NOT NULL,
  `product` tinytext NOT NULL,
  `category` tinytext NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `modify`
--

CREATE TABLE `modify` (
  `id` int(11) NOT NULL,
  `name` enum('viewed','edited','changed_status') NOT NULL DEFAULT 'viewed',
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `prices`
--

CREATE TABLE `prices` (
  `id` int(11) NOT NULL,
  `product` tinytext NOT NULL,
  `category` tinytext NOT NULL,
  `uid` int(11) NOT NULL,
  `price` varchar(244) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `name` varchar(244) NOT NULL,
  `surname` varchar(244) NOT NULL,
  `middlename` varchar(244) NOT NULL,
  `status` int(1) NOT NULL,
  `role` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`id`, `name`, `surname`, `middlename`, `status`, `role`) VALUES
(1, 'Алексей', 'Сергадеев', 'Львович', 1, 1),
(2, 'Василий', 'Иванов', 'Петрович', 1, 2),
(3, 'Иван', 'Иванов', 'Иванович', 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id_role` tinyint(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `permission` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id_role`, `name`, `permission`) VALUES
(1, 'Администратор', 'Полный доступ'),
(2, 'Пользователь', 'Ограниченный доступ');

-- --------------------------------------------------------

--
-- Структура таблицы `sausages`
--

CREATE TABLE `sausages` (
  `id` int(11) NOT NULL,
  `product` tinytext NOT NULL,
  `category` tinytext NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` enum('approved','disapproved') NOT NULL DEFAULT 'disapproved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `sweets`
--

CREATE TABLE `sweets` (
  `id` int(11) NOT NULL,
  `product` tinytext NOT NULL,
  `category` tinytext NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tea`
--

CREATE TABLE `tea` (
  `id` int(11) NOT NULL,
  `product` tinytext NOT NULL,
  `category` tinytext NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(244) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salt` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_hex` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `role` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `salt`, `active_hex`, `status`, `role`) VALUES
(1, 'blazegold228@gmail.com', '68d342bbd33fa5fc72f7b23979f62adc', 'a1653c4b', 'e87e1e7918731c0d1133789ae327cd75', 1, 1),
(2, 'persik.sergadeev2013@yandex.ru', 'f67fa75339461ab2b898c6f1b084fcaf', '219984e1', '4509b9fccf3fdd71a85eb95671da0410', 1, 2),
(3, 'animekruto@mail.ru', '007c51b30f494013834f1159483f3c95', 'b5a0bfcb', '19775563ef216e993b4aba98d4116d5f', 1, 0),
(4, 'usgfgsydf@ayasd.ur', '0369a420bc3d8b68b983d888b8bb65bd', 'e91927f9', 'f85b6a5826c8e2a6f5ebc88ec7709e1a', 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user_role`
--

CREATE TABLE `user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `vegetables`
--

CREATE TABLE `vegetables` (
  `id` int(11) NOT NULL,
  `product` tinytext NOT NULL,
  `category` tinytext NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `alcohol`
--
ALTER TABLE `alcohol`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Индексы таблицы `backaleya`
--
ALTER TABLE `backaleya`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Индексы таблицы `bird`
--
ALTER TABLE `bird`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Индексы таблицы `bread`
--
ALTER TABLE `bread`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `chancellery`
--
ALTER TABLE `chancellery`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Индексы таблицы `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `eggs`
--
ALTER TABLE `eggs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Индексы таблицы `fish`
--
ALTER TABLE `fish`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Индексы таблицы `fruits`
--
ALTER TABLE `fruits`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Индексы таблицы `household`
--
ALTER TABLE `household`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Индексы таблицы `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Индексы таблицы `meaty`
--
ALTER TABLE `meaty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Индексы таблицы `milkys`
--
ALTER TABLE `milkys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Индексы таблицы `modify`
--
ALTER TABLE `modify`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Индексы таблицы `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Индексы таблицы `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `sausages`
--
ALTER TABLE `sausages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Индексы таблицы `sweets`
--
ALTER TABLE `sweets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Индексы таблицы `tea`
--
ALTER TABLE `tea`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Индексы таблицы `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `fk_user_role_role1_idx` (`role_id`),
  ADD KEY `fk_user_role_user1_idx` (`user_id`);

--
-- Индексы таблицы `vegetables`
--
ALTER TABLE `vegetables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `alcohol`
--
ALTER TABLE `alcohol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `backaleya`
--
ALTER TABLE `backaleya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `bird`
--
ALTER TABLE `bird`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `bread`
--
ALTER TABLE `bread`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `chancellery`
--
ALTER TABLE `chancellery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `eggs`
--
ALTER TABLE `eggs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `fish`
--
ALTER TABLE `fish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `fruits`
--
ALTER TABLE `fruits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `household`
--
ALTER TABLE `household`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `meaty`
--
ALTER TABLE `meaty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `milkys`
--
ALTER TABLE `milkys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `modify`
--
ALTER TABLE `modify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id_role` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `sausages`
--
ALTER TABLE `sausages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `sweets`
--
ALTER TABLE `sweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `tea`
--
ALTER TABLE `tea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `vegetables`
--
ALTER TABLE `vegetables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
