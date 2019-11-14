-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 14 2019 г., 03:31
-- Версия сервера: 5.6.43
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products_desc`
--

CREATE TABLE `products_desc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prod_brand` varchar(255) DEFAULT NULL,
  `prod_name` varchar(255) DEFAULT NULL,
  `prod_desc` text,
  `prod_price` decimal(20,2) DEFAULT NULL,
  `prod_hurl` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products_desc`
--

INSERT INTO `products_desc` (`id`, `prod_brand`, `prod_name`, `prod_desc`, `prod_price`, `prod_hurl`) VALUES
(1, 'Туполев', 'Ту-22М3', '{ \"Длина\": \"42,5 метра\", \"Размах крыла\": \"34,3 метра\", \"Высота\": \"11,1 метра\", \"Максимальная взлетная масса\": \"126 тонн\", \"Максимальная скорость\": \"2300 км/ч\", \"Дальность\": \"6800 км\" }', '12800000000.00', 'tu22m3'),
(2, 'Туполев', 'Ту-95МС', '{ \"Длина\": \"49,1 метра\", \"Размах крыла\": \"50 метров\", \"Высота\": \"12,1 метра\", \"Максимальная взлетная масса\": \"188 тонн\", \"Максимальная скорость\": \"830 км/ч\", \"Дальность\": \"15000 км\" }', '14000000000.00', 'tu95ms'),
(3, 'Туполев', 'Ту-160М', '{ \"Длина\": \"54,1 метра\", \"Размах крыла\": \"55,7 метра\", \"Высота\": \"13,1 метра\", \"Максимальная взлетная масса\": \"275 тонн\", \"Максимальная скорость\": \"2220 км/ч\", \"Дальность\": \"12300 км\" }', '16000000000.00', 'tu160m'),
(4, 'Сухой', 'Су-30СМ', '{ \"Длина\": \"21,9 метра\", \"Размах крыла\": \"14,7 метра\", \"Высота\": \"6,4 метра\", \"Максимальная взлетная масса\": \"34,5 тонны\", \"Максимальная скорость\": \"2125 км/ч\", \"Дальность\": \"3000 км\" }', '3200000000.00', 'su30sm'),
(5, 'Сухой', 'Су-57', '{ \"Длина\": \"19,4 метра\", \"Размах крыла\": \"14 метра\", \"Высота\": \"4,8 метра\", \"Максимальная взлетная масса\": \"35,5 тонн\", \"Максимальная скорость\": \"2800 км/ч\", \"Дальность\": \"4300 км\" }', '2236000000.00', 'su57'),
(6, 'МиГ', 'МиГ-35', '{ \"Длина\": \"17,3 метра\", \"Размах крыла\": \"12 метра\", \"Высота\": \"4,4 метра\", \"Максимальная взлетная масса\": \"29,7 тонн\", \"Максимальная скорость\": \"2560 км/ч\", \"Дальность\": \"3500 км\" }', '2880000000.00', 'mig35');

-- --------------------------------------------------------

--
-- Структура таблицы `products_pics`
--

CREATE TABLE `products_pics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prod_id` bigint(20) UNSIGNED DEFAULT NULL,
  `file_name` varchar(255) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products_pics`
--

INSERT INTO `products_pics` (`id`, `prod_id`, `file_name`, `image_name`) VALUES
(1, 1, 'tu22m3.jpg', 'Ту-22М3'),
(2, 2, 'tu95ms.jpg', 'Ту-95МС'),
(3, 2, 'tu95ms-2.jpg', 'Ту-95МС'),
(4, 3, 'tu160m.jpg', 'Ту-160М'),
(5, 4, 'su30sm.jpg', 'Су-30СМ'),
(6, 5, 'su57.jpg', 'Су-57'),
(7, 6, 'mig35.jpg', 'МиГ-35');

-- --------------------------------------------------------

--
-- Структура таблицы `users_table`
--

CREATE TABLE `users_table` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `login` varchar(64) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_table`
--

INSERT INTO `users_table` (`id`, `email`, `login`, `name`, `password`, `admin`) VALUES
(8, 'konvwolf@post.ru', 'konvwolf', 'Василий', '$2y$10$wxtpNCDs4566i3PwPTKXiulRHhstN3opuCnNHz2dHxfb9AdZ6Q7AW', 1),
(10, 'gromoslav@inbox.ru', 'gromoslav', 'Василий', '$2y$10$RphfBuRfr/JLFPxf0kkf.uQHsbYiP970tf94E5YfQs54a9DgPRyrm', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user_carts`
--

CREATE TABLE `user_carts` (
  `id` int(11) NOT NULL,
  `shopping_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `login` varchar(64) DEFAULT NULL,
  `prod_name` varchar(255) DEFAULT NULL,
  `prod_id` int(20) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_carts`
--

INSERT INTO `user_carts` (`id`, `shopping_date`, `login`, `prod_name`, `prod_id`, `quantity`, `status`) VALUES
(1, '2019-11-05 09:36:02', 'konvwolf', 'Ту-160М', 3, 1, 2),
(2, '2019-11-05 09:36:02', 'konvwolf', 'Ту-95МС', 2, 1, 0),
(3, '2019-11-05 12:07:54', 'konvwolf', 'Ту-160М', 3, 3, 0),
(4, '2019-11-13 19:38:00', '', 'Ту-22М3', 1, 3, 0),
(5, '2019-11-13 19:38:28', '', 'Ту-22М3', 1, 1, 1),
(6, '2019-11-13 19:38:28', '', 'Ту-95МС', 2, 1, 0),
(7, '2019-11-13 19:38:28', '', 'Ту-160М', 3, 1, 0),
(8, '2019-11-13 19:38:28', '', 'Су-30СМ', 4, 1, 0),
(9, '2019-11-13 19:50:56', 'konvwolf', 'Ту-22М3', 1, 2, 0),
(10, '2019-11-13 23:25:21', 'konvwolf', 'Ту-22М3', 1, 2, 0),
(11, '2019-11-13 23:25:21', 'konvwolf', 'Ту-95МС', 2, 2, 0),
(12, '2019-11-13 23:40:24', 'konvwolf', 'Ту-22М3', 1, 1, 2),
(13, '2019-11-13 23:40:33', 'konvwolf', 'Ту-22М3', 1, 1, 2),
(14, '2019-11-13 23:41:05', 'konvwolf', 'Ту-95МС', 2, 1, 2),
(15, '2019-11-13 23:42:32', 'konvwolf', 'Ту-95МС', 2, 1, 2),
(16, '2019-11-13 23:53:57', 'konvwolf', 'Ту-95МС', 2, 2, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products_desc`
--
ALTER TABLE `products_desc`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `products_pics`
--
ALTER TABLE `products_pics`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Индексы таблицы `users_table`
--
ALTER TABLE `users_table`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `user_carts`
--
ALTER TABLE `user_carts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products_desc`
--
ALTER TABLE `products_desc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `products_pics`
--
ALTER TABLE `products_pics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `user_carts`
--
ALTER TABLE `user_carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `products_pics`
--
ALTER TABLE `products_pics`
  ADD CONSTRAINT `products_pics_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `products_desc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
