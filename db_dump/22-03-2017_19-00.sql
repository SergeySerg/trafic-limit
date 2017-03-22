-- phpMyAdmin SQL Dump
-- version 4.0.10.12
-- http://www.phpmyadmin.net
--
-- Хост: citymoto.mysql.ukraine.com.ua
-- Время создания: Мар 22 2017 г., 19:11
-- Версия сервера: 5.6.27-75.0-log
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `citymoto_traloc`
--

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
  `name` text CHARACTER SET utf8 NOT NULL,
  `type` text CHARACTER SET utf8 NOT NULL,
  `limit` int(11) NOT NULL,
  `reported` tinyint(1) NOT NULL DEFAULT '0',
  `comparison` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Дамп данных таблицы `monitorings`
--

INSERT INTO `monitorings` (`id`, `company_id`, `name`, `type`, `limit`, `reported`, `comparison`, `created_at`, `updated_at`) VALUES
(19, 2, 'Тест ID=2', 'cost', 25, 1, 1, '2017-03-18 18:36:18', '2017-03-21 23:18:59'),
(20, 2, 'Тест ID=2', 'sales', 4, 0, 1, '2017-03-20 20:14:22', '2017-03-22 16:27:34'),
(22, 2, 'Тест ID=2', 'cost', 100, 0, 0, '2017-03-21 22:57:35', '2017-03-22 17:54:14');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `name`, `title`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'DB_HOST', 'DB_HOST', 'citymoto.mysql.ukraine.com.ua', '0000-00-00 00:00:00', '2017-03-21 22:56:46', NULL),
(11, 'DB_DATABASE', 'DB_DATABASE', 'citymoto_trafic', '2017-03-18 11:25:08', '2017-03-18 21:02:18', NULL),
(12, 'DB_USERNAME', 'DB_USERNAME', 'citymoto_trafic', '2017-03-18 11:26:37', '2017-03-18 11:26:37', NULL),
(14, 'DB_PASSWORD', 'DB_PASSWORD', '2eads59b', '2017-03-18 11:29:11', '2017-03-19 22:32:11', NULL),
(15, 'Email', '', 'vor.ser87@gmail.com', '2017-03-20 23:34:25', '2017-03-21 23:51:03', NULL);

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
(3, 'admin', 'webtestingstudio@gmail.com', '$2y$10$8s4PflQn/layvmmljWdBl.NtLnCIpwsykNeEDaMID.94K4haglNli', 'aYmDkDZ6aV1WQHzYN2JeP3ZNDFU4jpWss7TRz5njfXYjLMwUT4HukgHOLQ39', '2017-03-17 11:09:25', '2017-03-21 23:12:51');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
