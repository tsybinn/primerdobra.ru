-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Сен 11 2019 г., 20:56
-- Версия сервера: 5.7.27-0ubuntu0.18.04.1
-- Версия PHP: 7.1.31-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `HelpPeople`
--

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(30) NOT NULL,
  `prevText` varchar(1000) NOT NULL,
  `detailText` text NOT NULL,
  `foto1` varchar(100) NOT NULL,
  `foto2` varchar(100) DEFAULT NULL,
  `foto3` varchar(100) DEFAULT NULL,
  `foto4` varchar(100) DEFAULT NULL,
  `date` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `prevText`, `detailText`, `foto1`, `foto2`, `foto3`, `foto4`, `date`) VALUES
(15, 'Дорогие друзья, вот такие пинеточки и носочки связались мною, для малыша Ольги Раус, спасибо огромное Ирине Широкожуховой за пряжу и помощь', 'Дорогие друзья, вот такие пинеточки и носочки связались мною, для малыша Ольги Раус, спасибо огромное Ирине Широкожуховой за пряжу и помощьДорогие друзья, вот такие пинеточки и носочки связались мною, для малыша Ольги Раус, спасибо огромное Ирине Широкожуховой за пряжу и помощьДорогие друзья, вот такие пинеточки и носочки связались мною, для малыша Ольги Раус, спасибо огромное Ирине Широкожуховой за пряжу и помощь', 'img/3946H4buulEVmgc.jpg', '', '', NULL, '11:09:2019'),
(16, 'Дорогие друзья, вот такие пинеточки и носочки связались мною, для малыша Ольги Раус, спасибо огромное Ирине Широкожуховой за пряжу и помощь', 'Дорогие друзья, вот такие пинеточки и носочки связались мною, для малыша Ольги Раус, спасибо огромное Ирине Широкожуховой за пряжу и помощьДорогие друзья, вот такие пинеточки и носочки связались мною, для малыша Ольги Раус, спасибо огромное Ирине Широкожуховой за пряжу и помощьДорогие друзья, вот такие пинеточки и носочки связались мною, для малыша Ольги Раус, спасибо огромное Ирине Широкожуховой за пряжу и помощьДорогие друзья, вот такие пинеточки и носочки связались мною, для малыша Ольги Раус, спасибо огромное Ирине Широкожуховой за пряжу и помощь', 'img/8414g1KSh9QkQYU.jpg', NULL, NULL, NULL, '11:09:2019'),
(19, 'орогие друзья, вот такие пинеточки и носочки связались мною, для малыша Ольги Раус, спасибо огромное Ирине Широкожуховой за пряжу и помощь', 'орогие друзья, вот такие пинеточки и носочки связались мною, для малыша Ольги Раус, спасибо огромное Ирине Широкожуховой за пряжу и помощьорогие друзья, вот такие пинеточки и носочки связались мною, для малыша Ольги Раус, спасибо огромное Ирине Широкожуховой за пряжу и помощьорогие друзья, вот такие пинеточки и носочки связались мною, для малыша Ольги Раус, спасибо огромное Ирине Широкожуховой за пряжу и помощь', 'img/273g1KSh9QkQYU.jpg', '', NULL, NULL, '11:09:2019'),
(20, 'орогие друзья, вот такие пинеточки и носочки связались мною, для малыша Ольги Раус, спасибо огромное Ирине Широкожуховой за пряжу и помощь', 'орогие друзья, вот такие пинеточки и носочки связались мною, для малыша Ольги Раус, спасибо огромное Ирине Широкожуховой за пряжу и помощьорогие друзья, вот такие пинеточки и носочки связались мною, для малыша Ольги Раус, спасибо огромное Ирине Широкожуховой за пряжу и помощьорогие друзья, вот такие пинеточки и носочки связались мною, для малыша Ольги Раус, спасибо огромное Ирине Широкожуховой за пряжу и помощь', 'img/5223642656.png', '', 'img/8881vov.jpg', 'img/7234win.jpeg', '11:09:2019');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;