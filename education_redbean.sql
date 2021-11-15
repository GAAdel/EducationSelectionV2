-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 15 2021 г., 19:28
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
(2, 'Вас интересует начальное профессиональное образование (училище, лицей)?', 2, 'Да', 'Нет', NULL, NULL, 'isLicei', 2),
(3, 'Какая степень обучения вас интересует?', 4, 'Бакалавриат', 'Специалитет', 'Магистратура', 'Аспирантура', 'stepen', 3),
(4, 'Вас интересует среднее профессиональное образование (колледж, техникум) ?', 2, 'Колледж', 'Техникум', NULL, NULL, 'isColledge', 4),
(5, 'Укажите ваш пол?', 2, 'Муж', 'Жен', NULL, NULL, 'gender', 5),
(6, 'Какая форма обучения вам подходит?', 3, 'Очная', 'Заочная', 'Очно-заочная', NULL, 'forma', 6),
(7, 'Наличие диссертационного совета?', 2, 'Да', 'Нет', NULL, NULL, 'sovet', 10),
(8, 'Какая форма обучения вам подходит?', 3, 'Очная', 'Заочная', 'Очно-Заочная', NULL, 'forma', 11),
(9, 'Предметы поступления?', 4, 'Информатика/Математика', 'Физика/Математика', 'Биология/Химия', 'Обществознание/История', 'subjects', 0);

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
(7, 10, 'Да', NULL, 11, 11),
(8, 11, 'Очная', NULL, 11, 11);

--
-- Индексы сохранённых таблиц
--

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
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `rules`
--
ALTER TABLE `rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
