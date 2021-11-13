-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 13 2021 г., 11:17
-- Версия сервера: 10.3.16-MariaDB
-- Версия PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `education_selection_origin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `isShow` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `licei` varchar(50) NOT NULL,
  `colledge` varchar(50) NOT NULL,
  `forma` varchar(250) NOT NULL,
  `naprav` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `home` varchar(250) NOT NULL,
  `activ` varchar(250) NOT NULL,
  `lgoti` varchar(250) NOT NULL,
  `isbudget` varchar(250) NOT NULL,
  `budget` int(250) NOT NULL,
  `ball` int(250) NOT NULL,
  `gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `answers`
--

INSERT INTO `answers` (`id`, `isShow`, `name`, `age`, `licei`, `colledge`, `forma`, `naprav`, `city`, `home`, `activ`, `lgoti`, `isbudget`, `budget`, `ball`, `gender`) VALUES
(1, 'True', 'Московский Политех', 19, 'Да', 'Да', 'Очная', 'Информатика', 'Москва', 'Да', 'Да', 'Да', 'Да', 200, 150, 'Муж');

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `isFurst` varchar(11) NOT NULL,
  `answer1` varchar(255) DEFAULT NULL,
  `answer2` varchar(255) DEFAULT NULL,
  `answer3` varchar(255) DEFAULT NULL,
  `answer4` varchar(255) DEFAULT NULL,
  `parametr` varchar(255) NOT NULL,
  `ruleId` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `text`, `type`, `isFurst`, `answer1`, `answer2`, `answer3`, `answer4`, `parametr`, `ruleId`) VALUES
(1, 'Укажите ваш возраст:', 1, 'True', NULL, NULL, NULL, NULL, 'age', 1),
(2, 'Вас интересует начальное профессиональное образование (училище, лицей)?', 0, 'False', '', '', NULL, NULL, 'licei', 2),
(3, 'Вас интересует среднее профессиональное образование (колледж, техникум) ?', 0, 'False', 'Да', 'Нет', NULL, NULL, 'colledge', 3),
(4, 'Какая форма обучения вам подходит?', 2, 'False', 'Очная', 'Заочная', 'Очно-Заочная', NULL, 'forma', 4),
(5, 'Какое направление обучения?', 3, 'False', 'Информатика', 'Психология', 'Медицина', 'Строительство', 'naprav', 5),
(6, 'В каком городе хотите учиться?', 3, 'False', 'Москва', 'Санкт-Петербург', 'Казань', 'Владивосток', 'city', 6),
(7, 'Нужно ли вам место проживания?', 0, 'False', 'Да', 'Нет', NULL, NULL, 'home', 7),
(8, 'Наличие активной внеучебной деятельности?', 0, 'False', 'Да', 'Нет', NULL, NULL, 'activ', 8),
(9, 'Имеются ли льготы?', 0, 'False', 'Да', 'Нет', NULL, NULL, 'lgoti', 9),
(10, 'Рассматриваете только бюджет?', 0, 'False', 'Да', 'Нет', NULL, NULL, 'isbudget', 10),
(11, 'Бюджет от ?', 1, 'False', NULL, NULL, NULL, NULL, 'budget', 11),
(13, 'Средний балл аттестата', 1, 'False', NULL, NULL, NULL, NULL, 'ball', 12),
(14, 'Укажите ваш пол?', 1, 'False', 'Муж', 'Жен', NULL, NULL, 'gender', 13);

-- --------------------------------------------------------

--
-- Структура таблицы `quest_rules`
--

CREATE TABLE `quest_rules` (
  `id` int(11) NOT NULL,
  `if_ValueStr` varchar(255) NOT NULL,
  `if_ValueInt` varchar(255) NOT NULL,
  `trueQuest` int(11) NOT NULL,
  `falseQuest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `quest_rules`
--

INSERT INTO `quest_rules` (`id`, `if_ValueStr`, `if_ValueInt`, `trueQuest`, `falseQuest`) VALUES
(1, '', '18', 2, 2),
(2, 'Да', '0', 13, 3),
(3, 'Да', '0', 4, 4),
(4, 'Очная', '0', 5, 5),
(5, 'Информатика', '0', 6, 6),
(6, 'Москва', '0', 7, 7),
(7, 'Да', '0', 8, 8),
(8, 'Да', '0', 9, 9),
(9, 'Да', '0', 10, 10),
(10, '', '', 11, 12);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `quest_rules`
--
ALTER TABLE `quest_rules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `quest_rules`
--
ALTER TABLE `quest_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
