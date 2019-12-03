-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 03 2019 г., 22:18
-- Версия сервера: 5.6.43
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `vp_burgershop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `details`
--

CREATE TABLE `details` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `street` varchar(255) NOT NULL,
  `home` varchar(255) NOT NULL,
  `part` varchar(255) NOT NULL,
  `appt` tinyint(3) NOT NULL,
  `floor` tinyint(2) NOT NULL,
  `comment` text NOT NULL,
  `payment` char(9) NOT NULL,
  `callback` varchar(5) NOT NULL,
  `number_of_order` smallint(5) NOT NULL,
  `count` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `details`
--

INSERT INTO `details` (`user_id`, `street`, `home`, `part`, `appt`, `floor`, `comment`, `payment`, `callback`, `number_of_order`, `count`) VALUES
(1, 'Якуба Коласа ', '6в', '1', 8, 12, 'Побольше соуса', 'need Rest', 'don\'t', 1, 1),
(1, 'Якуба Коласа ', '6в', '1', 8, 12, 'Дайте два', 'card Pay', 'don\'t', 2, 2),
(1, 'Якуба Коласа ', '6в', '1', 8, 12, 'Оставьте под дверью', 'card Pay', 'call', 3, 3),
(2, 'Пушкина', '4', '2', 120, 16, 'Трололо', 'card Pay', 'don\'t', 1, 4),
(2, 'Пушкина', '4', '2', 120, 16, 'И погорячее!', 'need Rest', 'call', 2, 5),
(1, 'Якуба Коласа', '6в', '1', 88, 11, 'Добавки бы', 'need Rest', 'don\'t', 4, 6),
(3, 'Космонавтов', '2а', '3', 14, 3, 'Побольше салфеток', 'card Pay', 'call', 1, 7),
(3, 'Брежнева', '3в', '', 5, 1, 'Это для моей бабушки', 'card Pay', 'call', 2, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` char(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `phone`) VALUES
(1, 'Максим', 'koldmax@ukr.net', '+7 (053) 444 33 32'),
(2, 'Максим', 'marina@ukr.net', '+7 (053) 444 33 32'),
(3, 'Иван', 'vano@mailer.ru', '+7 (033) 456 78 90');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`count`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `details`
--
ALTER TABLE `details`
  MODIFY `count` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
