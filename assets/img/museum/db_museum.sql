-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 29 2024 г., 19:29
-- Версия сервера: 10.8.4-MariaDB
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_museum`
--

-- --------------------------------------------------------

--
-- Структура таблицы `artists`
--

CREATE TABLE `artists` (
  `id_artist` int(11) NOT NULL,
  `fio` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `artists`
--

INSERT INTO `artists` (`id_artist`, `fio`) VALUES
(1, 'Винсент ван Гог'),
(2, 'Константин Бранкузи'),
(3, 'Пабло Пикассо'),
(4, 'Сальвадор Дали'),
(5, 'Пабло Пикассо'),
(6, 'Сальвадор Дали');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `ID_Category` int(18) NOT NULL,
  `Naimenovanie` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`ID_Category`, `Naimenovanie`) VALUES
(1, 'Индивидуальный'),
(2, 'Групповой');

-- --------------------------------------------------------

--
-- Структура таблицы `exhibits`
--

CREATE TABLE `exhibits` (
  `id_exhibit` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_exhibit_type` int(11) NOT NULL,
  `id_aryist` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `exhibits`
--

INSERT INTO `exhibits` (`id_exhibit`, `name`, `id_exhibit_type`, `id_aryist`) VALUES
(1, 'Море в ночи', 1, 1),
(2, 'Геркулес', 2, 2),
(3, 'Лес днем', 1, 1),
(4, 'Афина', 2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `exhibit_type`
--

CREATE TABLE `exhibit_type` (
  `id_exhibit_type` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `exhibit_type`
--

INSERT INTO `exhibit_type` (`id_exhibit_type`, `name`) VALUES
(1, 'Картина'),
(2, 'Скульптура');

-- --------------------------------------------------------

--
-- Структура таблицы `korzina`
--

CREATE TABLE `korzina` (
  `ID_Korzina` int(18) NOT NULL,
  `Data` datetime NOT NULL DEFAULT current_timestamp(),
  `ID_User` int(18) NOT NULL,
  `Status` varchar(120) NOT NULL,
  `ID_Tovar` int(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `korzina`
--

INSERT INTO `korzina` (`ID_Korzina`, `Data`, `ID_User`, `Status`, `ID_Tovar`) VALUES
(7, '2024-05-27 21:17:19', 1, 'order', 1),
(14, '2024-05-28 21:20:03', 1, 'order', 3),
(15, '2024-05-28 21:20:09', 1, 'order', 1),
(18, '2024-09-29 19:10:29', 1, 'order', 1),
(19, '2024-09-29 19:17:09', 1, 'cart', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `ID_Role` int(18) NOT NULL,
  `Naimenovanie` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`ID_Role`, `Naimenovanie`) VALUES
(1, 'Не зарегистрированный '),
(2, 'Зарегистрированный '),
(3, 'админ');

-- --------------------------------------------------------

--
-- Структура таблицы `schedule`
--

CREATE TABLE `schedule` (
  `id_schedule` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `schedule`
--

INSERT INTO `schedule` (`id_schedule`, `name`, `data`) VALUES
(1, 'Выставка современного искусства', '2024-09-01'),
(2, 'Выставка древнего искусства', '2024-09-02'),
(3, 'Выставка средневекового искусс4тва', '2024-09-03');

-- --------------------------------------------------------

--
-- Структура таблицы `tovari`
--

CREATE TABLE `tovari` (
  `ID_Tovar` int(18) NOT NULL,
  `Naimenovanie` varchar(120) NOT NULL,
  `ID_Category` int(18) NOT NULL,
  `Discription` text NOT NULL,
  `Cena` float(10,2) NOT NULL,
  `Photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `tovari`
--

INSERT INTO `tovari` (`ID_Tovar`, `Naimenovanie`, `ID_Category`, `Discription`, `Cena`, `Photo`) VALUES
(1, 'Стандартный билет', 1, 'Это базовый вариант, который позволяет посетить все постоянные экспозиции музея без ограничений. Это отличный выбор для тех, кто хочет познакомиться с основными коллекциями и выставками музея.', 1000.00, 'standart.png'),
(2, 'Семейный билет', 1, 'Предназначен для семей с детьми. Он даёт право на посещение музея двум взрослым и трём детям до 16 лет. Этот билет позволит сэкономить на стоимости посещения и провести время в музее всей семьёй.', 2000.00, 'family.png'),
(3, 'Билет «Студенческий»', 1, 'предоставляет студентам очной формы обучения скидку на входной билет. Этот билет подойдёт тем, кто интересуется культурой и искусством и хочет сэкономить на посещении музея.', 500.00, 'student.png');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID_User` int(18) NOT NULL,
  `Email` varchar(32) CHARACTER SET utf8mb3 NOT NULL,
  `Password_hash` varchar(200) CHARACTER SET utf8mb3 NOT NULL,
  `ID_Role` int(18) NOT NULL,
  `Login` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID_User`, `Email`, `Password_hash`, `ID_Role`, `Login`) VALUES
(1, 'user@mpt.ru', 'user', 2, 'user'),
(7, 'admin@mpt.ru', 'admin', 3, 'admin'),
(11, '111@yandex.ru', '111', 2, 'user111'),
(12, '111@yandex.ru', '111', 2, 'user111');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id_artist`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID_Category`);

--
-- Индексы таблицы `exhibits`
--
ALTER TABLE `exhibits`
  ADD PRIMARY KEY (`id_exhibit`),
  ADD KEY `id_exhibit_type` (`id_exhibit_type`),
  ADD KEY `id_aryist` (`id_aryist`);

--
-- Индексы таблицы `exhibit_type`
--
ALTER TABLE `exhibit_type`
  ADD PRIMARY KEY (`id_exhibit_type`);

--
-- Индексы таблицы `korzina`
--
ALTER TABLE `korzina`
  ADD PRIMARY KEY (`ID_Korzina`),
  ADD KEY `ID_User` (`ID_User`),
  ADD KEY `ID_Tovar` (`ID_Tovar`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID_Role`);

--
-- Индексы таблицы `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id_schedule`);

--
-- Индексы таблицы `tovari`
--
ALTER TABLE `tovari`
  ADD PRIMARY KEY (`ID_Tovar`),
  ADD KEY `ID_Category` (`ID_Category`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_User`),
  ADD KEY `ID_Role` (`ID_Role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `artists`
--
ALTER TABLE `artists`
  MODIFY `id_artist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `ID_Category` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `exhibits`
--
ALTER TABLE `exhibits`
  MODIFY `id_exhibit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `exhibit_type`
--
ALTER TABLE `exhibit_type`
  MODIFY `id_exhibit_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `korzina`
--
ALTER TABLE `korzina`
  MODIFY `ID_Korzina` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `ID_Role` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id_schedule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `tovari`
--
ALTER TABLE `tovari`
  MODIFY `ID_Tovar` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID_User` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `exhibits`
--
ALTER TABLE `exhibits`
  ADD CONSTRAINT `exhibits_ibfk_1` FOREIGN KEY (`id_aryist`) REFERENCES `artists` (`id_artist`),
  ADD CONSTRAINT `exhibits_ibfk_2` FOREIGN KEY (`id_exhibit_type`) REFERENCES `exhibit_type` (`id_exhibit_type`);

--
-- Ограничения внешнего ключа таблицы `korzina`
--
ALTER TABLE `korzina`
  ADD CONSTRAINT `korzina_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `users` (`ID_User`),
  ADD CONSTRAINT `korzina_ibfk_2` FOREIGN KEY (`ID_Tovar`) REFERENCES `tovari` (`ID_Tovar`);

--
-- Ограничения внешнего ключа таблицы `tovari`
--
ALTER TABLE `tovari`
  ADD CONSTRAINT `tovari_ibfk_1` FOREIGN KEY (`ID_Category`) REFERENCES `categories` (`ID_Category`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`ID_Role`) REFERENCES `role` (`ID_Role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
