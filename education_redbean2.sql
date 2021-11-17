-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 17 2021 г., 19:52
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
-- База данных: `education_redbean`
--

-- --------------------------------------------------------

--
-- Структура таблицы `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `age` varchar(255) DEFAULT NULL,
  `is_licei` varchar(255) DEFAULT NULL,
  `stepen` varchar(255) DEFAULT NULL,
  `is_colledge` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `forma` varchar(255) DEFAULT NULL,
  `sovet` varchar(255) DEFAULT NULL,
  `forma2` varchar(255) DEFAULT NULL,
  `subjects` varchar(255) DEFAULT NULL,
  `vstypit` varchar(255) DEFAULT NULL,
  `naprav` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `is_home` varchar(255) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT NULL,
  `is_lgoti` varchar(255) DEFAULT NULL,
  `is_budget` varchar(255) DEFAULT NULL,
  `budget` varchar(255) DEFAULT NULL,
  `ball` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `answers`
--

INSERT INTO `answers` (`id`, `age`, `is_licei`, `stepen`, `is_colledge`, `gender`, `forma`, `sovet`, `forma2`, `subjects`, `vstypit`, `naprav`, `city`, `is_home`, `is_active`, `is_lgoti`, `is_budget`, `budget`, `ball`) VALUES
(1, '119', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `answer1` varchar(255) DEFAULT NULL,
  `answer2` varchar(255) DEFAULT NULL,
  `answer3` varchar(255) DEFAULT NULL,
  `answer4` varchar(255) DEFAULT NULL,
  `parametr` varchar(255) NOT NULL,
  `id_rule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `text`, `type`, `answer1`, `answer2`, `answer3`, `answer4`, `parametr`, `id_rule`) VALUES
(1, 'Укажите ваш возраст?', 0, NULL, NULL, NULL, NULL, 'age', 1),
(2, 'Вас интересует начальное профессиональное образование (училище, лицей)?', 2, 'Да', 'Нет', NULL, NULL, 'is_licei', 2),
(3, 'Какая степень обучения вас интересует?', 4, 'Бакалавриат', 'Специалитет', 'Магистратура', 'Аспирантура', 'stepen', 3),
(4, 'Вас интересует среднее профессиональное образование (колледж, техникум) ?', 2, 'Колледж', 'Техникум', NULL, NULL, 'is_colledge', 4),
(5, 'Укажите ваш пол?', 2, 'Муж', 'Жен', NULL, NULL, 'gender', 5),
(6, 'Какая форма обучения вам подходит?', 3, 'Очная', 'Заочная', 'Очно-заочная', NULL, 'forma', 6),
(7, 'Наличие диссертационного совета?', 2, 'Да', 'Нет', NULL, NULL, 'sovet', 10),
(8, 'Какая форма обучения вам подходит?', 3, 'Очная', 'Заочная', 'Очно-Заочная', NULL, 'forma2', 11),
(9, 'Предметы поступления?', 4, 'Информатика/Математика', 'Физика/Математика', 'Биология/Химия', 'Обществознание/История', 'subjects', 11),
(10, 'Вступительные испытания', 2, 'Да', 'Нет', NULL, NULL, 'vstypit', 11),
(11, 'Какое направление обучения?', 4, 'Информатика', 'Медицина', 'Строительство', 'Журналистика', 'naprav', 12),
(12, 'В каком городе хотите учиться?', 3, 'Москва', 'Санкт-Петербург', 'Казань', NULL, 'city', 13),
(13, 'Нужно ли вам место проживания?', 2, 'Да', 'Нет', NULL, NULL, 'is_home', 14),
(14, 'Наличие активной внеучебной деятельности?', 2, 'Да', 'Нет', NULL, NULL, 'is_active', 15),
(15, 'Имеются ли льготы?', 2, 'Да', 'Нет', NULL, NULL, 'is_lgoti', 16),
(16, 'Рассматриваете только бюджет?', 2, 'Да', 'Нет', NULL, NULL, 'is_budget', 17),
(17, 'Бюджет от ?', 0, NULL, NULL, NULL, NULL, 'budget', 777),
(18, 'Средний балл?', 0, NULL, NULL, NULL, NULL, 'ball', 777);

-- --------------------------------------------------------

--
-- Структура таблицы `rules`
--

CREATE TABLE `rules` (
  `id` int(11) NOT NULL,
  `id_rule` int(11) NOT NULL,
  `value_str` varchar(255) DEFAULT NULL,
  `value_int` varchar(250) DEFAULT NULL,
  `true_quest` int(50) NOT NULL,
  `false_quest` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rules`
--

INSERT INTO `rules` (`id`, `id_rule`, `value_str`, `value_int`, `true_quest`, `false_quest`) VALUES
(1, 1, NULL, '18', 3, 2),
(2, 2, 'Да', NULL, 5, 4),
(3, 3, 'Аспирантура', NULL, 7, 6),
(4, 3, 'Колледж', NULL, 8, 8),
(5, 5, 'Муж', NULL, 8, 8),
(6, 6, 'Очная', NULL, 9, 9),
(7, 10, 'Да', NULL, 10, 10),
(8, 11, 'Очная', NULL, 11, 11),
(9, 12, 'Информатика', NULL, 12, 12),
(10, 13, 'Москва', NULL, 13, 13),
(11, 14, 'Да', NULL, 14, 14),
(12, 15, 'Да', NULL, 15, 15),
(13, 16, 'Да', NULL, 16, 16),
(14, 4, 'Колледж', NULL, 8, 8),
(15, 17, 'Да', NULL, 18, 17);

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
-- Индексы таблицы `rules`
--
ALTER TABLE `rules`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `rules`
--
ALTER TABLE `rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
