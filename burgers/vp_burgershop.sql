-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 06 2019 г., 08:29
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
  `number_of_order` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `details`
--

INSERT INTO `details` (`user_id`, `street`, `home`, `part`, `appt`, `floor`, `comment`, `payment`, `callback`, `number_of_order`) VALUES
(1, 'Якуба Коласа', '6б', '', 87, 12, 'Очень голоден', 'need Rest', 'call', 1),
(1, 'Якуба Коласа', '6б', '', 87, 12, 'Очень голоден', 'need Rest', 'call', 2),
(2, 'Пушкина', '1', '', 100, 16, 'Пожалуйста не опаздывайте', 'card Pay', 'don\'t', 1),
(3, 'Космонавтов', '3в', '2', 13, 2, 'Код в подъезд 38', 'card Pay', 'call', 1),
(2, 'Пушкина', '1', '', 100, 16, 'Побольше соуса', 'card Pay', 'don\'t', 2),
(2, 'Пушкина', '1', '', 100, 16, 'Побольше соуса', 'card Pay', 'don\'t', 3),
(3, 'Космонавтов', '3в', '2', 13, 2, 'На вахте скажите, что вы к Вано, сегодня там злая бабуля', 'need Rest', 'don\'t', 2);

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
(1, 'Макс', 'koldmax@ukr.net', '+7 (063) 348 32 05'),
(2, 'Марина', 'marina@mail.ru', '+7 (538) 988 7_ __'),
(3, 'Ваня', 'vano@mailer.ru', '+7 (456) 776 53 53');

--
-- Индексы сохранённых таблиц
--

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
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
