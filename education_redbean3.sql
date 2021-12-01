-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 01 2021 г., 09:32
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
(1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `complex_rules`
--

CREATE TABLE `complex_rules` (
  `id` int(11) NOT NULL,
  `if1_atr` varchar(255) NOT NULL,
  `if1_value` varchar(255) NOT NULL,
  `if2_atr` varchar(255) NOT NULL,
  `if2_value` varchar(255) NOT NULL,
  `then_atr` varchar(255) NOT NULL,
  `then_value` varchar(255) NOT NULL,
  `used` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `complex_rules`
--

INSERT INTO `complex_rules` (`id`, `if1_atr`, `if1_value`, `if2_atr`, `if2_value`, `then_atr`, `then_value`, `used`) VALUES
(1, 'is_colledge', 'Да', 'city', 'Москва', 'type2', 'Московский Колледж', 'false');

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
(15, 17, 'Да', NULL, 18, 17),
(16, 99, '200', NULL, 888, 888);

-- --------------------------------------------------------

--
-- Структура таблицы `simple_rules`
--

CREATE TABLE `simple_rules` (
  `id` int(11) NOT NULL,
  `if_atr` varchar(255) NOT NULL,
  `if_value` varchar(255) NOT NULL,
  `then_atr` varchar(255) NOT NULL,
  `then_value` varchar(255) NOT NULL,
  `used` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `simple_rules`
--

INSERT INTO `simple_rules` (`id`, `if_atr`, `if_value`, `then_atr`, `then_value`, `used`) VALUES
(1, 'age', '18', 'age', 'Да', 'false'),
(2, 'is_licei', 'Да', 'type', 'Лицей/Училище', 'false'),
(3, 'stepen', 'Бакалавриат', 'stepen', 'Бакалавриат', 'false'),
(4, 'stepen', 'Специалитет', 'stepen', 'Специалитет', 'false'),
(5, 'stepen', 'Магистратура', 'stepen', 'Магистратура', 'false'),
(6, 'stepen', 'Аспирантура', 'stepen', 'Аспирантура', 'false'),
(7, 'is_colledge', 'Да', 'type', 'Колледж', 'false'),
(8, 'is_colledge', 'Нет', 'type', 'Техникум', 'false'),
(9, 'gender', 'Муж', 'gender', 'gender', 'false'),
(10, 'gender', 'Жен', 'gender', 'Жен', 'false'),
(11, 'forma', 'Очная', 'forma', 'forma', 'false'),
(12, 'forma', 'Заочная', 'forma', 'Заочная', 'false'),
(13, 'forma', 'Очно-заочная', 'forma', 'Очно-заочная', 'false'),
(14, 'sovet', 'Да', 'sovet', 'Да', 'false'),
(15, 'sovet', 'Нет', 'sovet', 'Нет', 'false'),
(16, 'forma2', 'Очная', 'forma', 'Очная', 'false'),
(17, 'forma2', 'Заочная', 'forma', 'Заочная', 'false'),
(18, 'forma2', 'Очно-Заочная', 'forma', 'Очно-Заочная', 'false'),
(19, 'subjects', 'Информатика/Математика', 'subjects', 'Информатика/Математика', 'false'),
(20, 'subjects', 'Физика/Математика', 'subjects', 'Физика/Математика', 'false'),
(21, 'subjects', 'Биология/Химия', 'subjects', 'Биология/Химия', 'false'),
(22, 'subjects', 'Обществознание/История', 'subjects', 'Обществознание/История', 'false'),
(23, 'vstypit', 'Да', 'vstypit', 'Да', 'false'),
(24, 'vstypit', 'Нет', 'vstypit', 'Нет', 'false'),
(25, 'naprav', 'Информатика', 'naprav', 'Информатика', 'false'),
(26, 'naprav', 'Медицина', 'naprav', 'Медицина', 'false'),
(27, 'naprav', 'Строительство', 'naprav', 'Строительство', 'false'),
(28, 'naprav', 'Журналистика', 'naprav', 'Журналистика', 'false'),
(32, 'city', 'Москва', 'city', 'Москва', 'false'),
(33, 'city', 'Санкт-Петербург', 'city', 'Санкт-Петербург', 'false'),
(34, 'city', 'Казань', 'city', 'Казань', 'false'),
(35, 'is_home', 'Да', 'is_home', 'Да', 'false'),
(36, 'is_home', 'Нет', 'is_home', 'Нет', 'false'),
(37, 'is_active', 'Да', 'is_active', 'Да', 'false'),
(38, 'is_active', 'Нет', 'is_active', 'Нет', 'false'),
(39, 'is_lgoti', 'Да', 'is_lgoti', 'Да', 'false'),
(40, 'is_lgoti', 'Нет', 'is_lgoti', 'Нет', 'false'),
(41, 'is_budget', 'Да', 'is_budget', 'Да', 'false'),
(43, 'budget', '200', 'budget', '200', 'false'),
(45, 'ball', '200', 'ball', '200', 'false'),
(46, 'is_budget', 'Нет', 'is_budget', 'Нет', 'false');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `complex_rules`
--
ALTER TABLE `complex_rules`
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
-- Индексы таблицы `simple_rules`
--
ALTER TABLE `simple_rules`
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
-- AUTO_INCREMENT для таблицы `complex_rules`
--
ALTER TABLE `complex_rules`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `simple_rules`
--
ALTER TABLE `simple_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
