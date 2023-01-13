-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 01 2022 г., 23:07
-- Версия сервера: 5.5.53
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `airticket`
--

-- --------------------------------------------------------

--
-- Структура таблицы `airplane`
--

CREATE TABLE `airplane` (
  `idairplane` int(11) NOT NULL,
  `count` int(11) DEFAULT NULL,
  `airplane` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `format` varchar(40) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `airplane`
--

INSERT INTO `airplane` (`idairplane`, `count`, `airplane`, `format`) VALUES
(1, 120, 'FY-231', 'aa-bb-cc'),
(2, 100, 'RG-321', 'aa-bbb-cc');

-- --------------------------------------------------------

--
-- Структура таблицы `airport`
--

CREATE TABLE `airport` (
  `idairport` int(11) NOT NULL,
  `town` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `airport` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `code` varchar(40) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `airport`
--

INSERT INTO `airport` (`idairport`, `town`, `airport`, `code`) VALUES
(1, 'Москва', 'Шереметьево', '223112'),
(2, 'Саратов', 'Саратов 1', '423422');

-- --------------------------------------------------------

--
-- Структура таблицы `place`
--

CREATE TABLE `place` (
  `idplace` int(11) NOT NULL,
  `place` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `idtrip` int(11) NOT NULL,
  `status` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `idusersystem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `place`
--

INSERT INTO `place` (`idplace`, `place`, `idtrip`, `status`, `idusersystem`) VALUES
(241, '7---1', 7, 'В продаже', NULL),
(242, '7---2', 7, 'В продаже', NULL),
(243, '7---3', 7, 'В продаже', NULL),
(244, '7---4', 7, 'В продаже', NULL),
(245, '7---5', 7, 'В продаже', NULL),
(246, '7---6', 7, 'В продаже', NULL),
(247, '7---7', 7, 'В продаже', NULL),
(248, '7---8', 7, 'В продаже', NULL),
(249, '7---9', 7, 'В продаже', NULL),
(250, '7---10', 7, 'В продаже', NULL),
(251, '7---11', 7, 'В продаже', NULL),
(252, '7---12', 7, 'В продаже', NULL),
(253, '7---13', 7, 'В продаже', NULL),
(254, '7---14', 7, 'В продаже', NULL),
(255, '7---15', 7, 'В продаже', NULL),
(256, '7---16', 7, 'В продаже', NULL),
(257, '7---17', 7, 'В продаже', NULL),
(258, '7---18', 7, 'В продаже', NULL),
(259, '7---19', 7, 'В продаже', NULL),
(260, '7---20', 7, 'В продаже', NULL),
(261, '7---21', 7, 'В продаже', NULL),
(262, '7---22', 7, 'В продаже', NULL),
(263, '7---23', 7, 'В продаже', NULL),
(264, '7---24', 7, 'В продаже', NULL),
(265, '7---25', 7, 'В продаже', NULL),
(266, '7---26', 7, 'В продаже', NULL),
(267, '7---27', 7, 'В продаже', NULL),
(268, '7---28', 7, 'В продаже', NULL),
(269, '7---29', 7, 'В продаже', NULL),
(270, '7---30', 7, 'В продаже', NULL),
(271, '7---31', 7, 'В продаже', NULL),
(272, '7---32', 7, 'В продаже', NULL),
(273, '7---33', 7, 'В продаже', NULL),
(274, '7---34', 7, 'В продаже', NULL),
(275, '7---35', 7, 'В продаже', NULL),
(276, '7---36', 7, 'В продаже', NULL),
(277, '7---37', 7, 'В продаже', NULL),
(278, '7---38', 7, 'В продаже', NULL),
(279, '7---39', 7, 'В продаже', NULL),
(280, '7---40', 7, 'В продаже', NULL),
(281, '7---41', 7, 'В продаже', NULL),
(282, '7---42', 7, 'В продаже', NULL),
(283, '7---43', 7, 'В продаже', NULL),
(284, '7---44', 7, 'В продаже', NULL),
(285, '7---45', 7, 'В продаже', NULL),
(286, '7---46', 7, 'В продаже', NULL),
(287, '7---47', 7, 'В продаже', NULL),
(288, '7---48', 7, 'В продаже', NULL),
(289, '7---49', 7, 'В продаже', NULL),
(290, '7---50', 7, 'В продаже', NULL),
(291, '7---51', 7, 'В продаже', NULL),
(292, '7---52', 7, 'В продаже', NULL),
(293, '7---53', 7, 'В продаже', NULL),
(294, '7---54', 7, 'В продаже', NULL),
(295, '7---55', 7, 'В продаже', NULL),
(296, '7---56', 7, 'В продаже', NULL),
(297, '7---57', 7, 'В продаже', NULL),
(298, '7---58', 7, 'В продаже', NULL),
(299, '7---59', 7, 'В продаже', NULL),
(300, '7---60', 7, 'В продаже', NULL),
(301, '7---61', 7, 'В продаже', NULL),
(302, '7---62', 7, 'В продаже', NULL),
(303, '7---63', 7, 'В продаже', NULL),
(304, '7---64', 7, 'В продаже', NULL),
(305, '7---65', 7, 'В продаже', NULL),
(306, '7---66', 7, 'В продаже', NULL),
(307, '7---67', 7, 'В продаже', NULL),
(308, '7---68', 7, 'В продаже', NULL),
(309, '7---69', 7, 'В продаже', NULL),
(310, '7---70', 7, 'В продаже', NULL),
(311, '7---71', 7, 'В продаже', NULL),
(312, '7---72', 7, 'В продаже', NULL),
(313, '7---73', 7, 'В продаже', NULL),
(314, '7---74', 7, 'В продаже', NULL),
(315, '7---75', 7, 'В продаже', NULL),
(316, '7---76', 7, 'В продаже', NULL),
(317, '7---77', 7, 'В продаже', NULL),
(318, '7---78', 7, 'В продаже', NULL),
(319, '7---79', 7, 'В продаже', NULL),
(320, '7---80', 7, 'В продаже', NULL),
(321, '7---81', 7, 'В продаже', NULL),
(322, '7---82', 7, 'В продаже', NULL),
(323, '7---83', 7, 'В продаже', NULL),
(324, '7---84', 7, 'В продаже', NULL),
(325, '7---85', 7, 'В продаже', NULL),
(326, '7---86', 7, 'В продаже', NULL),
(327, '7---87', 7, 'В продаже', NULL),
(328, '7---88', 7, 'В продаже', NULL),
(329, '7---89', 7, 'В продаже', NULL),
(330, '7---90', 7, 'В продаже', NULL),
(331, '7---91', 7, 'В продаже', NULL),
(332, '7---92', 7, 'В продаже', NULL),
(333, '7---93', 7, 'В продаже', NULL),
(334, '7---94', 7, 'В продаже', NULL),
(335, '7---95', 7, 'В продаже', NULL),
(336, '7---96', 7, 'В продаже', NULL),
(337, '7---97', 7, 'В продаже', NULL),
(338, '7---98', 7, 'В продаже', NULL),
(339, '7---99', 7, 'В продаже', NULL),
(340, '7---100', 7, 'В продаже', NULL),
(341, '7---101', 7, 'В продаже', NULL),
(342, '7---102', 7, 'В продаже', NULL),
(343, '7---103', 7, 'В продаже', NULL),
(344, '7---104', 7, 'В продаже', NULL),
(345, '7---105', 7, 'В продаже', NULL),
(346, '7---106', 7, 'В продаже', NULL),
(347, '7---107', 7, 'В продаже', NULL),
(348, '7---108', 7, 'В продаже', NULL),
(349, '7---109', 7, 'В продаже', NULL),
(350, '7---110', 7, 'В продаже', NULL),
(351, '7---111', 7, 'В продаже', NULL),
(352, '7---112', 7, 'В продаже', NULL),
(353, '7---113', 7, 'В продаже', NULL),
(354, '7---114', 7, 'В продаже', NULL),
(355, '7---115', 7, 'В продаже', NULL),
(356, '7---116', 7, 'В продаже', NULL),
(357, '7---117', 7, 'В продаже', NULL),
(358, '7---118', 7, 'В продаже', NULL),
(359, '7---119', 7, 'В продаже', NULL),
(360, '7---120', 7, 'В продаже', NULL),
(361, '8---1', 8, 'В продаже', 3),
(362, '8---2', 8, 'В продаже', NULL),
(363, '8---3', 8, 'В продаже', NULL),
(364, '8---4', 8, 'В продаже', NULL),
(365, '8---5', 8, 'В продаже', NULL),
(366, '8---6', 8, 'В продаже', NULL),
(367, '8---7', 8, 'В продаже', NULL),
(368, '8---8', 8, 'В продаже', NULL),
(369, '8---9', 8, 'В продаже', NULL),
(370, '8---10', 8, 'В продаже', NULL),
(371, '8---11', 8, 'В продаже', NULL),
(372, '8---12', 8, 'В продаже', NULL),
(373, '8---13', 8, 'В продаже', NULL),
(374, '8---14', 8, 'В продаже', NULL),
(375, '8---15', 8, 'В продаже', NULL),
(376, '8---16', 8, 'В продаже', NULL),
(377, '8---17', 8, 'В продаже', NULL),
(378, '8---18', 8, 'В продаже', NULL),
(379, '8---19', 8, 'В продаже', NULL),
(380, '8---20', 8, 'В продаже', NULL),
(381, '8---21', 8, 'В продаже', NULL),
(382, '8---22', 8, 'В продаже', NULL),
(383, '8---23', 8, 'В продаже', NULL),
(384, '8---24', 8, 'В продаже', NULL),
(385, '8---25', 8, 'В продаже', NULL),
(386, '8---26', 8, 'В продаже', NULL),
(387, '8---27', 8, 'В продаже', NULL),
(388, '8---28', 8, 'В продаже', NULL),
(389, '8---29', 8, 'В продаже', NULL),
(390, '8---30', 8, 'В продаже', NULL),
(391, '8---31', 8, 'В продаже', NULL),
(392, '8---32', 8, 'В продаже', NULL),
(393, '8---33', 8, 'В продаже', NULL),
(394, '8---34', 8, 'В продаже', NULL),
(395, '8---35', 8, 'В продаже', NULL),
(396, '8---36', 8, 'В продаже', NULL),
(397, '8---37', 8, 'В продаже', NULL),
(398, '8---38', 8, 'В продаже', NULL),
(399, '8---39', 8, 'В продаже', NULL),
(400, '8---40', 8, 'В продаже', NULL),
(401, '8---41', 8, 'В продаже', NULL),
(402, '8---42', 8, 'В продаже', NULL),
(403, '8---43', 8, 'В продаже', NULL),
(404, '8---44', 8, 'В продаже', NULL),
(405, '8---45', 8, 'В продаже', NULL),
(406, '8---46', 8, 'В продаже', NULL),
(407, '8---47', 8, 'В продаже', NULL),
(408, '8---48', 8, 'В продаже', NULL),
(409, '8---49', 8, 'В продаже', NULL),
(410, '8---50', 8, 'В продаже', NULL),
(411, '8---51', 8, 'В продаже', NULL),
(412, '8---52', 8, 'В продаже', NULL),
(413, '8---53', 8, 'В продаже', NULL),
(414, '8---54', 8, 'В продаже', NULL),
(415, '8---55', 8, 'В продаже', NULL),
(416, '8---56', 8, 'В продаже', NULL),
(417, '8---57', 8, 'В продаже', NULL),
(418, '8---58', 8, 'В продаже', NULL),
(419, '8---59', 8, 'В продаже', NULL),
(420, '8---60', 8, 'В продаже', NULL),
(421, '8---61', 8, 'В продаже', NULL),
(422, '8---62', 8, 'В продаже', NULL),
(423, '8---63', 8, 'В продаже', NULL),
(424, '8---64', 8, 'В продаже', NULL),
(425, '8---65', 8, 'В продаже', NULL),
(426, '8---66', 8, 'В продаже', NULL),
(427, '8---67', 8, 'В продаже', NULL),
(428, '8---68', 8, 'В продаже', NULL),
(429, '8---69', 8, 'В продаже', NULL),
(430, '8---70', 8, 'В продаже', NULL),
(431, '8---71', 8, 'В продаже', NULL),
(432, '8---72', 8, 'В продаже', NULL),
(433, '8---73', 8, 'В продаже', NULL),
(434, '8---74', 8, 'В продаже', NULL),
(435, '8---75', 8, 'В продаже', NULL),
(436, '8---76', 8, 'В продаже', NULL),
(437, '8---77', 8, 'В продаже', NULL),
(438, '8---78', 8, 'В продаже', NULL),
(439, '8---79', 8, 'В продаже', NULL),
(440, '8---80', 8, 'В продаже', NULL),
(441, '8---81', 8, 'В продаже', NULL),
(442, '8---82', 8, 'В продаже', NULL),
(443, '8---83', 8, 'В продаже', NULL),
(444, '8---84', 8, 'В продаже', NULL),
(445, '8---85', 8, 'В продаже', NULL),
(446, '8---86', 8, 'В продаже', NULL),
(447, '8---87', 8, 'В продаже', NULL),
(448, '8---88', 8, 'В продаже', NULL),
(449, '8---89', 8, 'В продаже', NULL),
(450, '8---90', 8, 'В продаже', NULL),
(451, '8---91', 8, 'В продаже', NULL),
(452, '8---92', 8, 'В продаже', NULL),
(453, '8---93', 8, 'В продаже', NULL),
(454, '8---94', 8, 'В продаже', NULL),
(455, '8---95', 8, 'В продаже', NULL),
(456, '8---96', 8, 'В продаже', NULL),
(457, '8---97', 8, 'В продаже', NULL),
(458, '8---98', 8, 'В продаже', NULL),
(459, '8---99', 8, 'В продаже', NULL),
(460, '8---100', 8, 'В продаже', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `trip`
--

CREATE TABLE `trip` (
  `idtrip` int(11) NOT NULL,
  `dateout` datetime DEFAULT NULL,
  `datein` datetime DEFAULT NULL,
  `idairplane` int(11) NOT NULL,
  `cost` int(11) DEFAULT NULL,
  `idairportin` int(11) NOT NULL,
  `idairportout` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `trip`
--

INSERT INTO `trip` (`idtrip`, `dateout`, `datein`, `idairplane`, `cost`, `idairportin`, `idairportout`) VALUES
(7, '2022-03-01 21:51:00', '2022-03-01 22:51:00', 1, 2500, 2, 1),
(8, '2022-03-01 21:57:00', '2022-03-01 22:57:00', 2, 2500, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `usersystem`
--

CREATE TABLE `usersystem` (
  `idusersystem` int(11) NOT NULL,
  `usersystem` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `sex` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `info` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `nationality` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `datebirth` date DEFAULT NULL,
  `phone` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `login` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `parol` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `permission` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `mail` varchar(40) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `usersystem`
--

INSERT INTO `usersystem` (`idusersystem`, `usersystem`, `sex`, `info`, `nationality`, `datebirth`, `phone`, `login`, `parol`, `permission`, `mail`) VALUES
(1, 'Антонов ВА', 'Мужской', NULL, 'Русский', '1990-03-09', '23342', 'admin', 'master', 'Администратор', 'wer@ya.ru'),
(2, 'Макаров ВА', 'Мужской', NULL, 'Русский', '1992-03-09', '342211', 'asdf', 'qwer', 'Менеджер', 'erq@ya.ru'),
(3, 'Михайлов ВА', 'Мужской', '1122 3233', 'Русский', '1995-03-09', '233342', 'asdf', 'zxcv', 'Клиент', 'erqsdd@ya.ru'),
(4, 'Аристократов АВ', 'Мужской', '5544 3322', 'Русский', '1998-03-09', '122112', 'qwerty', 'asdfgh', 'Клиент', '356@sf.re');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `airplane`
--
ALTER TABLE `airplane`
  ADD PRIMARY KEY (`idairplane`);

--
-- Индексы таблицы `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`idairport`);

--
-- Индексы таблицы `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`idplace`),
  ADD KEY `idtrip` (`idtrip`),
  ADD KEY `idusersystem` (`idusersystem`);

--
-- Индексы таблицы `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`idtrip`),
  ADD KEY `idairplane` (`idairplane`),
  ADD KEY `idairportin` (`idairportin`),
  ADD KEY `idairportout` (`idairportout`);

--
-- Индексы таблицы `usersystem`
--
ALTER TABLE `usersystem`
  ADD PRIMARY KEY (`idusersystem`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `airplane`
--
ALTER TABLE `airplane`
  MODIFY `idairplane` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `airport`
--
ALTER TABLE `airport`
  MODIFY `idairport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `place`
--
ALTER TABLE `place`
  MODIFY `idplace` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=461;
--
-- AUTO_INCREMENT для таблицы `trip`
--
ALTER TABLE `trip`
  MODIFY `idtrip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `usersystem`
--
ALTER TABLE `usersystem`
  MODIFY `idusersystem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `place`
--
ALTER TABLE `place`
  ADD CONSTRAINT `place_ibfk_1` FOREIGN KEY (`idtrip`) REFERENCES `trip` (`idtrip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `place_ibfk_2` FOREIGN KEY (`idusersystem`) REFERENCES `usersystem` (`idusersystem`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `trip`
--
ALTER TABLE `trip`
  ADD CONSTRAINT `trip_ibfk_3` FOREIGN KEY (`idairportout`) REFERENCES `airport` (`idairport`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trip_ibfk_1` FOREIGN KEY (`idairplane`) REFERENCES `airplane` (`idairplane`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trip_ibfk_2` FOREIGN KEY (`idairportin`) REFERENCES `airport` (`idairport`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
