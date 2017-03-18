-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 19 2017 г., 00:01
-- Версия сервера: 5.5.45-log
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `trafic_limit_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `attributes` text COLLATE utf8_unicode_ci NOT NULL,
  `imgs` text COLLATE utf8_unicode_ci NOT NULL,
  `files` text COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `meta_title` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `article_id`, `name`, `title`, `short_description`, `description`, `attributes`, `imgs`, `files`, `priority`, `date`, `meta_title`, `meta_description`, `meta_keywords`, `active`, `created_at`, `updated_at`) VALUES
(1, 2, 0, '', 'ТУРИСТИЧНА Віза@|;ТУРИСТИЧЕСКАЯ Виза@|;', '<p>Короткий опис</p>@|;<p>авпвапавп</p>@|;', '<p>Текст</p>@|;<p>павпапвп</p>@|;', '{"\\u0426\\u0456\\u043d\\u0430":"450","\\u0421\\u043f\\u0435\\u0446\\u0438\\u0444\\u0456\\u043a\\u0430\\u0446\\u0456\\u044f_ua":"<h4>\\u0421\\u043f\\u0435\\u0446\\u0438\\u0444\\u0456\\u043a\\u0430\\u0446\\u0456\\u044f&nbsp;<\\/h4>\\r\\n","\\u0421\\u043f\\u0435\\u0446\\u0438\\u0444\\u0456\\u043a\\u0430\\u0446\\u0456\\u044f_ru":"<p>\\u0441\\u043f\\u0435\\u0446\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f<\\/p>\\r\\n"}', '[{"full":"upload\\/articles\\/1\\/full\\/viber image.jpg","min":"upload\\/articles\\/1\\/min\\/viber image.jpg"}]', '', 1, '1970-01-30 22:00:00', '@|;@|;', '@|;@|;', '@|;@|;', 0, '0000-00-00 00:00:00', '2017-02-11 20:46:39'),
(5, 2, 0, '', 'Для подорожей@|;Для путешествий@|;', '<p><strong>Lorem Ipsum</strong>&nbsp;- це текст-&quot;риба&quot;, що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною &quot;рибою&quot; аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. &quot;Риба&quot; не тільки успішно пережила п&#39;ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп&#39;ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum</p>@|;<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>@|;', '<p><strong>Lorem Ipsum</strong>&nbsp;- це текст-&quot;риба&quot;, що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною &quot;рибою&quot; аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. &quot;Риба&quot; не тільки успішно пережила п&#39;ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп&#39;ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum</p>@|;<p><strong>Lorem Ipsum</strong>&nbsp;- це текст-&quot;риба&quot;, що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною &quot;рибою&quot; аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. &quot;Риба&quot; не тільки успішно пережила п&#39;ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп&#39;ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;- це текст-&quot;риба&quot;, що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною &quot;рибою&quot; аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. &quot;Риба&quot; не тільки успішно пережила п&#39;ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп&#39;ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum</p>@|;', '{"\\u0426\\u0456\\u043d\\u0430":"999","\\u0421\\u043f\\u0435\\u0446\\u0438\\u0444\\u0456\\u043a\\u0430\\u0446\\u0456\\u044f_ua":"<h5>&quot;\\u041d\\u0435\\u043c\\u0430\\u0454 \\u043d\\u0456\\u043a\\u043e\\u0433\\u043e, \\u0445\\u0442\\u043e \\u043b\\u044e\\u0431\\u0438\\u0432 \\u0431\\u0438 \\u0441\\u0430\\u043c\\u0438\\u0439 \\u0431\\u0456\\u043b\\u044c, \\u0445\\u0442\\u043e \\u0431 \\u0448\\u0443\\u043a\\u0430\\u0432 \\u0439\\u043e\\u0433\\u043e \\u0447\\u0438 \\u0445\\u043e\\u0442\\u0456\\u0432 \\u0431\\u0438 \\u0439\\u043e\\u0433\\u043e \\u0437\\u0430\\u0437\\u043d\\u0430\\u0432\\u0430\\u0442\\u0438 \\u0442\\u0456\\u043b\\u044c\\u043a\\u0438 \\u0447\\u0435\\u0440\\u0435\\u0437 \\u0442\\u0435, \\u0449\\u043e \\u0432\\u0456\\u043d - \\u0431\\u0456\\u043b\\u044c...&quot;<\\/h5>\\r\\n","\\u0421\\u043f\\u0435\\u0446\\u0438\\u0444\\u0456\\u043a\\u0430\\u0446\\u0456\\u044f_ru":"<h4>&quot;Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...&quot;<\\/h4>\\r\\n"}', '[{"full":"upload\\/articles\\/5\\/full\\/viber image123.jpg","min":"upload\\/articles\\/5\\/min\\/viber image123.jpg"}]', '', 0, '0000-00-00 00:00:00', '@|;@|;', '@|;@|;', '@|;@|;', 1, '2017-01-29 20:57:19', '2017-02-11 20:55:50'),
(6, 10, 0, '', 'Ресторан@|;Ресторан@|;', '@|;@|;', '@|;@|;', '', '', '', 0, '0000-00-00 00:00:00', '@|;@|;', '@|;@|;', '@|;@|;', 0, '2017-01-29 20:58:35', '2017-01-29 20:58:35'),
(11, 2, 0, '', 'Шопінг Виза@|;Шопинг Виза@|;', '<h4>Короткий опис</h4>@|;<p>Краткое описание</p>@|;', '<p>Опис</p>@|;<p>Описание</p>@|;', '{"\\u0426\\u0456\\u043d\\u0430":"999","\\u0421\\u043f\\u0435\\u0446\\u0438\\u0444\\u0456\\u043a\\u0430\\u0446\\u0456\\u044f_ua":"<h4>\\u0421\\u043f\\u0435\\u0446\\u0438\\u0444\\u0456\\u043a\\u0430\\u0446\\u0456\\u044f<\\/h4>\\r\\n","\\u0421\\u043f\\u0435\\u0446\\u0438\\u0444\\u0456\\u043a\\u0430\\u0446\\u0456\\u044f_ru":"<p>\\u0421\\u043f\\u0435\\u0446\\u0438\\u0444\\u0438\\u043a\\u0430\\u0446\\u0438\\u044f<\\/p>\\r\\n"}', '[{"full":"upload\\/articles\\/11\\/full\\/viber image123.jpg","min":"upload\\/articles\\/11\\/min\\/viber image123.jpg"}]', '', 100, '2017-02-01 22:00:00', '@|;@|;', '@|;@|;', '@|;@|;', 1, '2017-02-02 16:27:55', '2017-02-02 16:40:59'),
(17, 4, 0, '', 'Готель 1@|;Отель 1@|;', '@|;@|;', '@|;@|;', '{"\\u0426\\u0456\\u043d\\u0430":"1000"}', '[{"full":"upload\\/articles\\/17\\/full\\/01.jpg","min":"upload\\/articles\\/17\\/min\\/01.jpg"}]', '', 0, '0000-00-00 00:00:00', '@|;@|;', '@|;@|;', '@|;@|;', 1, '2017-02-14 09:27:44', '2017-02-14 09:52:45'),
(18, 4, 0, '', 'Готель 2@|;Отель 2@|;', '@|;@|;', '@|;@|;', '{"\\u0426\\u0456\\u043d\\u0430":"999"}', '[{"full":"upload\\/articles\\/18\\/full\\/02.jpg","min":"upload\\/articles\\/18\\/min\\/02.jpg"}]', '', 0, '0000-00-00 00:00:00', '@|;@|;', '@|;@|;', '@|;@|;', 1, '2017-02-14 09:46:42', '2017-02-14 09:48:02'),
(19, 4, 0, '', 'Готель 3@|;Отель 3@|;', '@|;@|;', '@|;@|;', '{"\\u0426\\u0456\\u043d\\u0430":"1999"}', '[{"full":"upload\\/articles\\/19\\/full\\/03.jpg","min":"upload\\/articles\\/19\\/min\\/03.jpg"}]', '', 0, '0000-00-00 00:00:00', '@|;@|;', '@|;@|;', '@|;@|;', 1, '2017-02-14 09:48:52', '2017-02-14 10:09:54'),
(21, 5, 28, '', 'Номер 1@|;Номер 1@|;', '@|;@|;', '@|;@|;', '{"\\u0426\\u0456\\u043d\\u0430":"1000"}', '[]', '', 0, '0000-00-00 00:00:00', '@|;@|;', '@|;@|;', '@|;@|;', 1, '2017-02-14 10:22:18', '2017-02-16 16:26:23'),
(22, 5, 29, '', 'Номер 2@|;Номер 2@|;', '@|;@|;', '@|;@|;', '{"\\u0426\\u0456\\u043d\\u0430":"1050"}', '[]', '', 0, '0000-00-00 00:00:00', '@|;@|;', '@|;@|;', '@|;@|;', 1, '2017-02-14 10:22:48', '2017-02-16 16:26:43'),
(23, 5, 29, '', 'Номер 3@|;Номер 3@|;', '@|;@|;', '@|;@|;', '{"\\u0426\\u0456\\u043d\\u0430":"2999"}', '[]', '', 0, '0000-00-00 00:00:00', '@|;@|;', '@|;@|;', '@|;@|;', 1, '2017-02-14 10:23:06', '2017-02-16 16:26:53'),
(24, 5, 28, '', 'Номер 5@|;НОмер 5@|;', '@|;@|;', '@|;@|;', '{"\\u0426\\u0456\\u043d\\u0430":"1111111"}', '[]', '', 0, '1970-01-01 01:00:00', '@|;@|;', '@|;@|;', '@|;@|;', 1, '2017-02-15 19:55:48', '2017-02-16 16:27:12'),
(25, 6, 17, '', 'Перший корпус готелю "Велика Ведведиця"@|;Первий корпус отеля "Большая Медведица"@|;', '@|;@|;', '@|;@|;', '{"\\u0426\\u0456\\u043d\\u0430":""}', '[]', '', 0, '0000-00-00 00:00:00', '@|;@|;', '@|;@|;', '@|;@|;', 1, '2017-02-16 16:12:02', '2017-02-16 16:13:46'),
(26, 6, 17, '', 'Другий корпус готелю "Велика Ведмедиця"@|;Второй корпус отеля "Большая Медведица"@|;', '@|;@|;', '@|;@|;', '{"\\u0426\\u0456\\u043d\\u0430":""}', '[]', '', 0, '0000-00-00 00:00:00', '@|;@|;', '@|;@|;', '@|;@|;', 1, '2017-02-16 16:13:19', '2017-02-16 16:18:32'),
(27, 6, 0, '', 'У Марка@|;У Марка@|;', '@|;@|;', '@|;@|;', '{"\\u0426\\u0456\\u043d\\u0430":""}', '', '', 0, '0000-00-00 00:00:00', '@|;@|;', '@|;@|;', '@|;@|;', 1, '2017-02-16 16:18:24', '2017-02-16 16:18:24'),
(28, 6, 19, '', 'Перший корпус готелю "Ведмежий двір"@|;Первый корпус отеля "Медвежий двор"@|;', '@|;@|;', '@|;@|;', '{"\\u0426\\u0456\\u043d\\u0430":""}', '', '', 0, '0000-00-00 00:00:00', '@|;@|;', '@|;@|;', '@|;@|;', 1, '2017-02-16 16:19:21', '2017-02-16 16:19:21'),
(29, 6, 19, '', 'Другий корпус готелю "Ведмежий двір"@|;Второй корпус отеля "Медвежий двор"@|;', '@|;@|;', '@|;@|;', '{"\\u0426\\u0456\\u043d\\u0430":""}', '', '', 0, '0000-00-00 00:00:00', '@|;@|;', '@|;@|;', '@|;@|;', 1, '2017-02-16 16:20:07', '2017-02-16 16:20:07'),
(30, 6, 19, '', 'Третій корпус готелю "Ведмежий двір"@|;Третий корпус отеля "Медвежий двор"@|;', '@|;@|;', '@|;@|;', '{"\\u0426\\u0456\\u043d\\u0430":""}', '', '', 0, '0000-00-00 00:00:00', '@|;@|;', '@|;@|;', '@|;@|;', 1, '2017-02-16 16:20:41', '2017-02-16 16:20:41'),
(31, 5, 30, '', 'Номер 6@|;Номер 6@|;', '@|;@|;', '@|;@|;', '{"\\u0426\\u0456\\u043d\\u0430":"888"}', '', '', 0, '0000-00-00 00:00:00', '@|;@|;', '@|;@|;', '@|;@|;', 1, '2017-02-16 20:34:06', '2017-02-16 20:34:06');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `article_parent` int(11) NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` text COLLATE utf8_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `imgs` text COLLATE utf8_unicode_ci NOT NULL,
  `fields` text COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `meta_title` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `article_parent`, `link`, `title`, `img`, `short_description`, `description`, `imgs`, `fields`, `date`, `active`, `meta_title`, `meta_description`, `meta_keywords`, `priority`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 'main', 'Головна@|;Головна@|;', '', '@|;@|;', '@|;@|;', '[]', '{"base":["title","short_description","description"],"attributes":{}}', '0000-00-00 00:00:00', 0, '@|;@|;', '@|;@|;', '@|;@|;', 0, '2017-01-14 20:44:58', '2017-03-07 22:56:43'),
(2, 0, 0, 'visas', 'Візи@|;Візи@|;', '', '<p>Короткий опис категорії візи</p>@|;<p>Короткий опис категорії візи</p>@|;', '<p>Повний опис категорій віз</p>@|;<p>Повний опис категорій віз</p>@|;', '[{"full":"upload\\/categories\\/2\\/full\\/viber image.jpg","min":"upload\\/categories\\/2\\/min\\/viber image.jpg"}]', '{"base":["title","short_description","description","gallery","date","priority","active","meta_title","meta_description","meta_keywords"],"attributes":{"Ціна":{"type":"input","lang_active":false,"active":false}}}', '0000-00-00 00:00:00', 1, 'meta_title@|;meta_title@|;', 'meta_description@|;meta_description@|;', 'meta_keywords@|;meta_keywords@|;', 1, '2017-01-14 20:44:58', '2017-03-10 15:55:52'),
(4, 0, 0, 'hotels', 'Готели@|;Отели@|;', 'upload/categories/4/main/hotels-1489073079.jpg', '@|;@|;', '@|;@|;', '[{"full":"upload\\/categories\\/4\\/full\\/hilton_kiev.jpg","min":"upload\\/categories\\/4\\/min\\/hilton_kiev.jpg"}]', '{"base":["title","short_description","description","gallery","priority","active","article_parent"],"attributes":{"Ціна":{"type":"input","lang_active":false,"active":false}}}', '2017-01-08 22:00:00', 1, '@|;@|;', '@|;@|;', '@|;@|;', 0, '2017-02-13 13:04:19', '2017-03-09 15:24:39'),
(5, 0, 6, 'rooms', 'Номери@|;Номера@|;', '', '@|;@|;', '@|;@|;', '[]', '{"base":["title","short_description","description","gallery","priority","active","article_parent"],"attributes":{"Ціна":{"type":"input","lang_active":false,"active":false}}}', '0000-00-00 00:00:00', 1, '@|;@|;', '@|;@|;', '@|;@|;', 0, '2017-02-14 09:21:31', '2017-03-10 14:59:58'),
(6, 0, 4, 'сorps', 'Корпуси@|;Корпусы@|;', '', '@|;@|;', '@|;@|;', '[]', '{"base":["title","short_description","description","gallery","priority","active","article_parent"],"attributes":{"Ціна":{"type":"input","lang_active":false,"active":false}}}', '0000-00-00 00:00:00', 1, '@|;@|;', '@|;@|;', '@|;@|;', 0, '2017-02-16 15:27:58', '2017-02-16 16:07:31'),
(7, 0, 0, 'ex', 'Тестова@|;Тестовая@|;', '', '@|;@|;', '@|;@|;', '', '{"base":[],"attributes":{}}', '1970-01-01 01:00:00', 0, '@|;@|;', '@|;@|;', '@|;@|;', 0, '2017-03-13 15:38:37', '2017-03-13 15:38:37');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `rate` double(8,2) NOT NULL,
  `user_name` text COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_email` text COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `langs`
--

CREATE TABLE IF NOT EXISTS `langs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `langs`
--

INSERT INTO `langs` (`id`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'ua', '2017-01-14 20:44:58', '2017-01-14 20:44:58'),
(2, 'ru', '2017-01-14 20:44:58', '2017-01-14 20:44:58');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_09_14_124503_create_articles_table', 1),
('2016_09_14_124813_create_categories_table', 1),
('2016_09_14_124942_create_langs_table', 1),
('2016_10_06_124518_create_texts_table', 1),
('2016_11_04_094627_create_comments_table', 1),
('2016_12_26_140118_change_text_table_soft', 1),
('2017_01_02_155628_create_orders_table', 1),
('2017_02_06_120655_create_settings_table', 2),
('2017_02_13_144141_add_parent_id_categories', 3),
('2017_02_13_174128_add_article_id', 4),
('2017_02_13_174631_add_article_id', 5),
('2017_02_14_110847_add_article_parrent_category', 6),
('2017_02_14_111446_add_article_parrent_category', 7),
('2017_02_24_163342_add_field_img', 8),
('2017_03_17_182118_create_monitorings_table', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `monitorings`
--

CREATE TABLE IF NOT EXISTS `monitorings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `limit` int(11) NOT NULL,
  `reported` tinyint(1) NOT NULL DEFAULT '0',
  `comparison` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `monitorings`
--

INSERT INTO `monitorings` (`id`, `company_id`, `name`, `type`, `limit`, `reported`, `comparison`, `created_at`, `updated_at`) VALUES
(16, 3, 'Тест ID=3', 'Расход', 10, 1, 0, '2017-03-18 18:31:12', '2017-03-18 18:34:53'),
(17, 5, 'Тест ID=5', 'Расход', 20, 1, 0, '2017-03-18 18:32:58', '2017-03-18 18:33:23'),
(18, 6, 'Компания ID=6', 'Продажи', 200, 1, 1, '2017-03-18 18:33:56', '2017-03-18 18:35:29'),
(19, 2, 'Тест ID=2', 'Продажи', 5000, 1, 0, '2017-03-18 18:36:18', '2017-03-18 18:36:18');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('webdesignstudio@gmail.com', 'fbde7c2090b1432792a7b0caee4dcfa185c155d6cc24beff39508ff5271224ba', '2017-02-06 14:40:36');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `name`, `title`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'DB_HOST', 'DB_HOST', 'citymoto.mysql.ukraine.com.ua', '0000-00-00 00:00:00', '2017-03-18 20:50:20', NULL),
(11, 'DB_DATABASE', 'DB_DATABASE', 'citymoto_trafic', '2017-03-18 11:25:08', '2017-03-18 21:02:18', NULL),
(12, 'DB_USERNAME', 'DB_USERNAME', 'citymoto_trafic', '2017-03-18 11:26:37', '2017-03-18 11:26:37', NULL),
(14, 'DB_PASSWORD', 'DB_PASSWORD', '2eads59b', '2017-03-18 11:29:11', '2017-03-18 21:35:48', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `texts`
--

CREATE TABLE IF NOT EXISTS `texts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL DEFAULT '0',
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '0',
  `lang_active` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `texts`
--

INSERT INTO `texts` (`id`, `page_id`, `name`, `type`, `title`, `description`, `priority`, `lang_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 'header.tel1', 'input', 'Контактний номер телефону 1', '+3809912345', 3, 0, '2017-01-14 20:44:58', '2017-01-14 20:44:58', NULL),
(2, 0, 'header.tel2', 'input', 'Контактний номер телефону 2', '+3809854321', 3, 0, '2017-01-14 20:44:58', '2017-03-10 15:52:37', NULL),
(3, 0, 'header.address', 'input', 'Адреса', 'м.Львів', 2, 1, '2017-01-14 20:44:58', '2017-03-10 15:51:53', NULL),
(4, 0, 'header.mail', 'input', 'Пошта', 'exampl@gmail.com', 1, 0, '2017-01-14 20:44:58', '2017-03-10 15:51:53', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'root', 'exampl.com.ua', '$2y$10$v7S1rpn5qfZ/th2wu49sAe6QEn5kE8yTICSiZU7.ICC.LaPUUdSFS', 'iKraXadtIPH08kbTUUycBlDhSlKetbxmJbHsQVvoMFDuohjIcq5TEwzIb6j7', '2017-01-14 20:44:58', '2017-02-06 15:39:43'),
(3, 'admin', 'webtestingstudio@gmail.com', '$2y$10$8s4PflQn/layvmmljWdBl.NtLnCIpwsykNeEDaMID.94K4haglNli', NULL, '2017-03-17 11:09:25', '2017-03-17 11:09:25');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
